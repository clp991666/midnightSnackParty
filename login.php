<?php
session_start();
if (isset($_SESSION["SID"]))
  header( "Location: http://localhost/comp3121Project/dashboard.php" );
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
</head>
<body>
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
        <span class="navbar-brand" >MidNight Snack Party</span>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="dashboard.php">Dashboard</a></li>
          <li><a href="#">Your Party</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="signOut.php">Sign Out</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <div class="container">
    <div class="row">
      <?php
      if ($_GET["login"]=='fail') echo '<div class="alert alert-danger" role="alert">Student ID or password is incorrect! </div>';
      ?>
      <div class="jumbotron">
       <h1>Midnight Snack Party </h1>
       <p>Login here!!</p>
     </div>
     <form class="form-signin" action="signIn.php" method="POST">
      <label for="inputSID" class="sr-only">ID</label>
      <input type="text" id="inputSID" name="inputSID" class="form-control" placeholder="Student ID" required autofocus>

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>

      <label for="inputPassword2" class="sr-only">rePassword</label>
      <input type="password" id="inputPassword2" name="inputPassword2" class="form-control register" placeholder="Confirm Password">

      <label for="inputName" class="sr-only">rePassword</label>
      <input type="password" id="inputName" name="inputName" class="form-control register" placeholder="Name">

      <select class="form-control register" id="inputU" name="inputU">
        <option value="HKU">HKU</option>
        <option value="CUHK">CUHK</option>
        <option value="HKUST">HKUST</option>
        <option value="POLYU">POLYU</option>
        <option value="CITYU">CITYU</option>
        <option value="BU">BU</option>
        <option value="HKIED">HKIED</option>
      </select>
      <div>&nbsp;</div>
      <button class="btn btn-lg btn-primary" type="submit">Sign in</button>
      <a class="btn btn-lg btn-primary" onclick=register() style="float:right;" role="button">Register</a>
      
    </form>
  </div>
</div>
</body>
</html>