<?php
session_start();
if (!isset($_SESSION["SID"]))
    header("Location: login.php?login=required");

require_once 'dbconfig.php';
$result = $db->query("select restaurant from party where pid = {$_GET['pid']}");
$restaurant = $result->fetch_row();
$restaurant = $restaurant[0]
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title><?php echo $restaurant ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/jquery-2.1.3.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>
    <script>
        var pid = <?php echo json_encode($_GET['pid']) ?>;
        var restaurant = <?php echo json_encode($restaurant) ?>;

        var lastid;

        function addMessage(data) {
            msg.find('li.new').remove();
            lastid = data[data.length - 1].id;
            for (var i = 0; i < data.length; i++) {
                var item = data[i];
                msg.append($('<li class="list-group-item"></li>')
                    .append($('<label class="list-group-item-heading"></label>')
                        .text(item.uname + ' at ' + item.time))
                    .append($('<p class="list-group-item-text"></p>')
                        .text(item.msg)));
            }
            scrollToBottom();
        }

        function loadChat(from) {
            from = from ? from : lastid;
            xhr = $.ajax({
                url: 'getChat.php?timeout=30&pid=' + pid + '&from=' + (from ? from : ''),
                success: function (data) {
                    if (data.length > 0) {
                        addMessage(data);
                        setTimeout(loadChat, 1000);
                    } else {
                        loadChat();
                    }
                }
            });
        }

        function sendChat() {
            var temp = $('#input').val()
            if (temp.trim() == '') {
                return;
            }
            $.ajax({
                url: 'sendChat.php?pid=' + pid + '&from=' + (lastid ? lastid : ''),
                method: 'POST',
                data: { msg: temp },
                success: function () {
                },
                error: function (xhr, status, error) {
                    alert('cannot send your message:\n' + (xhr.responseText ? xhr.responseText : error));
                }
            });
            msg.append($('<li class="list-group-item new"></li>')
                .append($('<label class="list-group-item-heading"></label>')
                    .text('sending...'))
                .append($('<p class="list-group-item-text"></p>')
                    .text(temp)));
            scrollToBottom(true);
            $('#input').val('');
        }
    </script>

    <style>
        body, html {
            padding : 0;
            height  : 100%;
        }

        li label {
            color         : silver;
            font-size     : smaller;
            font-weight   : normal;
            text-align    : right;
            display       : block;
            margin-bottom : 0 !important;
        }

        #msg li {
            padding-top    : 3px;
            padding-bottom : 3px;;
        }
    </style>
</head>
<body>
    <div class="panel panel-default" style="height: 100%; margin: 0; position:relative">
        <div class="panel-heading" style="height: 60px">
            <h4>Chat room - <?php echo $restaurant ?></h4>
        </div>
        <ol id="msg" class="list-group"
            style="overflow-y: auto; position: absolute; bottom: 34px; left:0;right:0;top:60px">
        </ol>
        <div class="panel-footer"
             style="padding: 0; margin: -1px; margin-top: 0; height: 34px; position: absolute;left:0;right:0;bottom: 0">
            <form style="margin: 0; height: 100%" action="javascript:sendChat()">
                <input type="submit" class="form-control" value="GO"
                       style="text-align: center; float: right; width: 40px; padding: 0; border-radius: 0;" />

                <div style="margin-right: 40px">
                    <input id="input" autocomplete="off" autofocus type="text" class="form-control"
                           placeholder="Say something!"
                           style="background: none; border-radius: 0;" />
                </div>
            </form>
        </div>
    </div>
    <script>
        var scrolled = false;

        var detectScroll = (function () {
            var t;
            return function () {
                clearTimeout(t);
                t = setTimeout(function () {
                    scrolled = msg.scrollTop() < msg[0].scrollHeight - msg.height();
                }, 200);
            };
        })();
        var scrollToBottom = function (force, noanimate) {
            if (force || !scrolled) {
                if (!noanimate)
                    msg.animate({ scrollTop: msg[0].scrollHeight }, 200);
                else
                    msg[0].scrollTop = msg[0].scrollHeight;
            }
        };
        var msg = $('#msg').on('scroll', function () {
            detectScroll();
        });
        $(window).on('resize', function () {
            scrollToBottom(false, true);
        });
        loadChat();
    </script>
</body>
</html>