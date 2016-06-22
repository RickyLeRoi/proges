<?php

// Credenziali
$host = $_POST["host"];
$userDB = $_POST["userDB"];
$pswdDB = $_POST["pswdDB"];
$database = $_POST["database"];

// Connetto
$conn = mysqli_connect($host, $userDB, $pswdDB);
// Check connection
if (!$conn) {
    die("Connessione fallita: " . mysqli_connect_error());
}

// Crea database
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if (mysqli_query($conn, $sql)) {
    echo "Database creato con successo";
    header('Refresh: 3; URL = homeDB.php');
  $fp = fopen('data.php', 'w');
    fwrite($fp,
'<?php
$host = "'.$host.'";
$userDB = "'.$userDB.'";
$pswdDB = "'.$pswdDB.'";
$database = "'.$database.'";
?>'  ); } else {
    echo "C'e' stato un errore creando il database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
