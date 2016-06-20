<?php

// Credenziali
include_once("config.php");

//lettura input
$query = $_POST["query"];

// negativo (dal PHP 5.1)
$elem = explode('/**/', $query);

for ($c = 0; $c < count($elem); $c++) {
    //echo $elem[$c]."<br/>";
    //controllo inserimento
    if ($conndb->query($elem[$c]) === TRUE) {
        echo "Query eseguita con successo<br/>";
    } else {
        echo "Errore durante l'inserimento: " . $elem[$c] . "<br/>" . $conndb->error . "<br/>";
    }
}

mysqli_close($conndb);
?>
