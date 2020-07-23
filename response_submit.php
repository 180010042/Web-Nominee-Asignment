<?php
    session_start();
    $data  = array(180010066 => 2, 180010067 => 3, 180010068 => 4, 180040023 => 5, 180040024 => 6, 180040025 => 7, 180050018 => 8, 180050019 => 9, 180050020 => 10,);
    $name = $_POST['name'];
    $roll_number = $_SESSION['id'];
    $department = $_POST['department'];
    $date = date('m/d/Y');
    $symptom1 = (isset($_POST['symptom1'])) ? $_POST['symptom1']: "";
    $symptom2 = (isset($_POST['symptom2'])) ? $_POST['symptom2']: "";
    $symptom3 = (isset($_POST['symptom3'])) ? $_POST['symptom3']: "";
    $symptoms = array($symptom1, $symptom2, $symptom3);
    $symptoms2 = "";
    $symptoms3 = array();
    if($symptom1 != ""){
        array_push($symptoms3, $symptom1);
       } 
    if($symptom2 != ""){
        array_push($symptoms3, $symptom2);
       } 
    if($symptom3 != ""){
        array_push($symptoms3, $symptom3);
       } 
    for($i = 0;$i < 3; $i++){
       if($symptoms[$i] != ""){
           $symptoms2 .= $symptoms[$i]." \n";
       } 
    }
    if(count($symptoms3) != 0){
        $body = "Respected sir,\n\nThe student with roll number $roll_number has the following symptoms - \n$symptoms2\nPlease take the necessary actions.\n\nRegards\nPriya Singh\n\n(Web Nominee, Hostel Affairs)";
        $body2 = wordwrap($body,70);
        mail("email2@localhost.com","Student Response - COVID Symptoms Inquiry Form",$body2);
    }
    require_once 'Classes/PHPExcel.php';
    require_once 'Classes/PHPExcel/IOFactory.php';

    $objPHPExcel = PHPExcel_IOFactory::load("Student Details and Responses.xlsx");
    $objPHPExcel->setActiveSheetIndex(0);
    $row = $data[$roll_number];

    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$row, $name);
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$row, $roll_number);
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$row, $date);
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$row, $department);
    if(count($symptoms3) != 0){
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$row, $symptoms2);
    }
    else{
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$row, 'No Symptoms');
    }
   
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter->save('Student Details and Responses.xlsx');
    header('Location:success.php');
    
