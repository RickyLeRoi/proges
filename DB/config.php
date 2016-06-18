<?php

error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

$debug = true;
$oldLocale = setlocale(LC_TIME, 'it_IT');
setlocale(LC_TIME, $oldLocale);

// Credenziali
include_once("data.php");

// Connetto
$conndb = mysqli_connect($host, $userDB, $pswdDB, $database);
// Controlla connessione
if (!$conndb) {
    die("DB inesistente o connessione fallita: " . mysqli_connect_error());
}
?>
