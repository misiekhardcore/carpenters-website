<?php
session_start();
if((isset($_POST['login'])) && (isset($_POST['pass']))){
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    @require_once "logdb.php";
    $conn = @new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_errno!=0){
        echo "error".$conn->connect_error;
    } else {

        $query = "SELECT * FROM users WHERE login='$login' AND pass = '$pass'";
    if($result = $conn->query($query)){
        $row = $result->fetch_assoc();
        if($row['login'] == $login && $row['pass'] == $pass){
            $_SESSION['logged'] = true;
            $result->free_result();
            $_SESSION['logged'] = true;
        } else {
            session_unset();
            header('Location: ../upload.php?log=fail');
            exit();
        }
    } else {
        echo "error";
        exit();
    }

    
    $conn->close();
    header('Location: ../upload.php');
    }
    
}