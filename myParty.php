<?php 
session_start();
require_once 'server_setting.php';
if (!isset($_SESSION["SID"]))
  header( "Location: ".$server_root."login.php?login=required" );
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
    var sid=<?php echo "'".$_SESSION["SID"]."'"; echo "\n";?>
  </script>

</head>
<body onload=loadMyPartyList()>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
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
          <li class="active"><a href="#">My Party</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="signOut.php">Sign Out</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <div class="container">
    <div class="row">

      <div class="jumbotron">
       <h1>My party</h1>
       <p>All your joined party is here!!</p>
     </div>
     <div class="page-header">
      <h3>Active</h3>
    </div>
    <table class="table">
     <thead><tr><th>Time</th><th>Restuarant</th><th>Goal</th><th></th></tr></thead>
     <tbody id="active">
     </tbody>
   </table>
   <div class="page-header">
      <h3>Past</h3>
    </div>
    <table class="table">
     <thead><tr><th>Time</th><th>Restuarant</th><th>Goal</th><th></th></tr></thead>
     <tbody id="outdated">
     </tbody>
   </table>
 </div>
</div>
</body>
</html>