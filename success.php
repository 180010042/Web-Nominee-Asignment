<?php
session_start();
session_destroy();
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
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6 jumbotron">
                    <p>Your response has been saved.</p>
                </div>
            </div>
        </div>
    </body>
</html>

