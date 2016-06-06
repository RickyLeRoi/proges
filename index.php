<?php

// Credenziali
include_once('DB/data.php');

// Connetto
$conndb = mysqli_connect($host, $userDB, $pswdDB, $database);

// Controlla connessione
if (!$conndb) {
    header("location:DB/homeDB.php");
}  else {
        session_start();
        if(!isset($_SESSION['login_user'])){
            header("location:function/login.php");
            exit;
        } else {
            header("location:home.php");
        }
}

?>
