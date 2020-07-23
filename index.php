<?php
session_start();
if (isset($_SESSION['id']))
  {   header('location: home.php'); } 
?>
<html>
    <head>
        <title>IIT Bombay Portal</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div id="header">
            <img src="css/header.jpg" alt="IIT Bombay Portal">
        </div>
        <hr>
        <div class="container">
            <div class="row row_styling">
                <div class="col-sm-3"></div>
                <div class="col-sm-5 col-xs-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <center><h4>LDAP Login</h4></center>
                        </div> 
                        <div class="panel-body">
                            <form method="POST" action="login_submit.php">
                                <div class="form-element">
                                    <label for="username">LDAP USER</label>
                                    <input type="text" class="form-control input-sm" placeholder="LDAP Username" name="username" required='true'>
                                </div>
                                <div class="form-element">
                                    <label for="password">PASSWORD</label>
                                    <input type="password" class="form-control input-sm" placeholder="Password" name="password" required='true'>
                                </div>
                                <center><button type="submit" class="btn btn-primary btn-md" style="width: 70%;">Login</button></center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>





