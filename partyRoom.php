<?php
session_start();
if (!isset($_SESSION["SID"]))
    header("Location: login.php?login=required");
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/jquery-2.1.3.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.countdown.css">
    <script type="text/javascript" src="js/jquery.plugin.min.js"></script>
    <script type="text/javascript" src="js/jquery.countdown.js"></script>
    <script type="text/javascript">
        var sid = <?php echo json_encode($_SESSION["SID"]) ?>;
        var ownerId;
    </script>
</head>
<body onload="init_for_partyRoom()">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="navbar-brand">MidNight Snack Party</span>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="myParty.php">My Party</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="signOut.php">Sign Out</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div class="container">
        <div class="row">
            <div class="jumbotron">
                <h1>Party Room</h1>
                <p id="time"></p>
                <p id="res"></p>
                <p id="goal"></p>
                <p id="current"></p>
                <button type="button" class="btn btn-primary" style="float: right; width: inherit"
                        onclick="open('chatroom.php'+ window.location.search, '', 'width=400, height=500')">Open Chat
                    room
                </button>
            </div>
            <div class="form-inline">
                <div class="form-group">
                    <label for="inputFood">Food</label>
                    <input type="text" class="form-control" id="inputFood" placeholder="set meal 1">
                </div>
                <div class="form-group">
                    <label for="inputMoney">Amount</label>
                    $<input type="text" class="form-control" id="inputMoney" placeholder="50">
                </div>
                <button onclick="newFoodRequest(pid)" href="#" class="btn btn-primary">Add</button>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>User</th>
                    <th>Food</th>
                    <th>Amount</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>