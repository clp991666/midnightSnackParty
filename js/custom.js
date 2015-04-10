var partyList;
var ownerId="12345678d";


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
        $("tbody").append('<tr><td class="time">'+partyList[i].time+'</td><td>'+partyList[i].restaurant+'</td><td>'+partyList[i].current+'/'+partyList[i].target+'</td><td><a class="btn btn-primary" href="partyRoom.html?pid='+partyList[i].pid+'" role="button">Join</a></td></tr>')
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
      $(this).countdown({until: date, format: 'MS',compact: true, 
        description: ''});
    })
}