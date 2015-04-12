var partyList;
var ownerId="12345678d";
var pid;

function loadPartyList(){
  xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      text=xmlhttp.responseText;
      $("tbody").html("");
      var partyList = JSON.parse(text);
      for (i=0;i<partyList.length;i++){
        $("tbody").append('<tr><td class="time">'+partyList[i].time+'</td><td>'+partyList[i].restaurant+'</td><td>'+partyList[i].current+'/'+partyList[i].target+'</td><td><a class="btn btn-primary" href="partyRoom.php?pid='+partyList[i].pid+'" role="button">Join</a></td></tr>')
      }
      playTime();
    }
  }
  xmlhttp.open("GET","getPartyList.php",true);
  xmlhttp.send();
}

function newParty(){
  var time=$("#inputTime").val();
  var res=$("#inputRes").val();
  var goal=$("#inputGoal").val();
  $('.time').countdown('destroy');
  xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) loadPartyList();
  }
  url="newParty.php?time="+time+"&res="+res+"&goal="+goal+"&ownerId="+ownerId;
  xmlhttp.open("GET",url,true);
  xmlhttp.send();
}
function playTime(){
  $('.time').each(function(){
    date=new Date($(this).text());
    console.log(date);
    $(this).countdown({until: date, format: 'MS',compact: true, description: ''});
  })
}
function getUrlParameter(sParam)
{
  var sPageURL = window.location.search.substring(1);
  var sURLVariables = sPageURL.split('&');
  for (var i = 0; i < sURLVariables.length; i++) 
  {
    var sParameterName = sURLVariables[i].split('=');
    if (sParameterName[0] == sParam) 
    {
      return sParameterName[1];
    }
  }
}  

function init_for_partyRoom(){
  pid=getUrlParameter('pid');
  getPartyDetails(pid);
  getPartyMember(pid);
}
function getPartyMember(pid){
  xmlhttp1=new XMLHttpRequest();
  xmlhttp1.onreadystatechange=function()
  {
    if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
    {
      text=xmlhttp1.responseText;
      var current=0;
      $("tbody").html("");
      var partyMember = JSON.parse(text);
      for (i=0;i<partyMember.length;i++){
        $("tbody").append('<tr><td>'+partyMember[i].uname+'</td><td>'+partyMember[i].food+'</td><td>'+partyMember[i].amount+'</td><td><button class="btn btn-danger">Cancel</button></td></tr>');
        current=parseFloat(current)+parseFloat(partyMember[i].amount);
      }
      $('#current').text("current: "+current);
    }
  }
  xmlhttp1.open("GET","getPartyMember.php?pid="+pid,true);
  xmlhttp1.send();
}


function getPartyDetails(pid){
  xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      text=xmlhttp.responseText;
      var partyDetails = JSON.parse(text);
      $('#time').html('Time: <span class="time">'+partyDetails[0].time+'</span>');
      $('#res').text('Restaurant: '+partyDetails[0].res);
      $('#goal').text('Goal: '+partyDetails[0].target);
      ownerId = partyDetails[0].ownerId;
      playTime();
    }
  }
  xmlhttp.open("GET","getPartyDetails.php?pid="+pid,true);
  xmlhttp.send();
}

function newFoodRequest(pid){
  xmlhttp2=new XMLHttpRequest();
  xmlhttp2.onreadystatechange=function()
  {
    if (xmlhttp2.readyState==4 && xmlhttp2.status==200)
    {
      getPartyMember(pid);
    }
  }
  food=$('#inputFood').val();
  amount=$('#inputMoney').val();
  sid="13456789d";
  url="newFoodRequest.php?pid="+pid+"&food="+food+"&amount="+amount+"&sid="+sid;
  xmlhttp2.open("GET",url,true);
  xmlhttp2.send();
}

function register(){
  event.stopPropagation()
  if ($('.register').css('display') == 'block') {
  } else $('.register').css('display', 'block');
}

function post(path, params, method) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
         }
    }

    document.body.appendChild(form);
    form.submit();
}