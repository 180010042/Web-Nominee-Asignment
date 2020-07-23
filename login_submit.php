<?php
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = md5("$password");
// Data in Arrays
    $array = array(
        180010066 => 'd2dd904c638eba54d4782bf25c08bbf7',
        180010067 => '09f7859013d7aa0fdb0cbabaff62b22b', 
        180010068 => 'd9dd23a1a6fd747dc259e63474c65117', 
        180040023 => 'c6ae63e99141d360393fef7c29bee19c', 
        180040024 => 'cf3a32de7694f8176a7f98dd8ab3abe5', 
        180040025 => '757fcd79747e83749a29fa6da925b061', 
        180050018 => '18799e8204d7de57e882bfdc00cda9ba', 
        180050019 => '24cd97d29c2859dfa47c6ae0af35340e',
        180050020 => 'bfc190462f88e08bbefad422f2d70898');
// Backend Validations
    if (array_key_exists($username, $array) != 1){
        echo "<script>alert('No such roll number registered')</script>";
        echo ("<script>location.href='index.php'</script>");
        } 
    else if ($array[$username] != $password2){
        echo "<script>alert('Entered password is incorrect')</script>";
        echo ("<script>location.href='index.php'</script>");
        } 
    else{
        $_SESSION['id'] = $username;
        header('Location:home.php');
        }


