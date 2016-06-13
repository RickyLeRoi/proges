<?php

// Credenziali
include_once("config.php");

//lettura input
$tipoFORM = $_POST["tipoFORM"];
$nomeFORM = $_POST["nomeFORM"];
$userFORM = $_POST["userFORM"];
$pswdFORM = $_POST["pswdFORM"];

//inserisci dati in tabella login
$sql = "INSERT INTO users (tipoLOG, userLOG, pswdLOG) VALUES ('$tipoFORM', '$userFORM', '$pswdFORM')";

//controllo inserimento
if ($conndb->query($sql) === TRUE) {
    echo "Utente creato con successo";
    header('Refresh: 2; URL = homeDB.php');
} else {
    echo "Errore durante l'inserimento: " . $sql . "<br>" . $conndb->error;
}

mysqli_close($conndb);
?>
