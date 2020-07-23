<?php
    session_start();
    $roll_number = $_SESSION['id'];
    $data  = array(180010066 => 2, 180010067 => 3, 180010068 => 4, 180040023 => 5, 180040024 => 6, 180040025 => 7, 180050018 => 8, 180050019 => 9, 180050020 => 10,);
    require_once 'Classes/PHPExcel.php';
    require_once 'Classes/PHPExcel/IOFactory.php';

    $objPHPExcel = PHPExcel_IOFactory::load("Student Details and Responses.xlsx");
    $objPHPExcel->setActiveSheetIndex(0);
    $row = $data[$roll_number];
    $date = $objPHPExcel->getActiveSheet()->getCell('C'.$row)->getValue();
    $date1 = date('m/d/Y');
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
                <?php if($date1 = $date){ session_destroy(); ?>
                <div class="col-sm-3"></div>
                <div class="col-sm-6 jumbotron">
                    <p>You have already filled the form.</p>
                </div>
                <?php  } else { ?>
                <div class="col-sm-5 jumbotron">
                    <hr>
                    <p>In this period of pandemic, this portal is created as an initiative to check whether the students are safe from any COVID symptoms.
                    <br>Fill the given inquiry form with your appropriate details and let us know whether you are safe or not.You have to fill this form once a day, you are not allowed to fill it again after submission.</p>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-5 col-xs-12">
                    <form action="response_submit.php?id=<?php echo $_SESSION['id'] ?>" method="POST" enctype="multipart/form-data">
                        <div class="panel" style="background-color: #4863A0">
                            <div class="panel-heading" style="border-bottom: none; color:#fff;">
                                <center><h3>Inquiry Form</h3></center>
                            </div>
                            <div class="panel-body" style="background-color: #fff;">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control input-sm" placeholder="Name" name="name" required="true">
                                </div>
                                <div class="form-group">
                                    <label for="user">Roll Number:</label>
                                    <input type="text" class="form-control input-sm" value="<?php echo "{$_SESSION['id']}"; ?>" name="user" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="department">Department:</label>
                                    <input type="text" class="form-control input-sm" placeholder="Department" name="department" required="true">
                                </div>
                                <div class="form-group">
                                    <label for="date">Date:</label>
                                    <input type="text" class="form-control input-sm" value="<?php echo date('m/d/Y'); ?>" name="date" disabled>
                                </div>           
                                <div class="form-group">
                                    <label for="symptoms">Symptoms:</label>
                                    <label>
                                        <input type="checkbox" value="dry cough" name="symptom1"> I have dry cough.
                                    </label>
                                    <label>
                                        <input type="checkbox" value="fever" name="symptom2"> I have slight fever.
                                    </label>
                                    <label>
                                        <input type="checkbox" value="shortness of breath" name="symptom3"> I am facing difficulty in breathing. 
                                    </label>
                                </div>
                                <center><input type="submit" class="btn btn-block" style="background-color: #4863A0; color: #fff;" value="submit"></center>
                            </div>
                        </div>
                    </form>
                </div> <?php } ?>
            </div>
        </div>
    </body>
</html>

