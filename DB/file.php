<?php
include_once("config.php");
// Name of the file
$file = $_FILES['bckp']['tmp_name'];

$temp = "";
// leggi tutto il file
$righe = file($file);
// Loop tra tutte le righe
foreach ($righe as $riga) {
// Salta se è commento
    if (substr($riga, 0, 2) == "--" || $riga == "")
        continue;

// Add this line to the current segment
    $temp .= $riga;
// If it has a semicolon at the end, it's the end of the query
    if (substr(trim($riga), -1, 1) == ";") {
        // Perform the query
        mysqli_query($conndb, $temp) or print("C'e' stato un errore durante l'inserimento" . $temp . ": " . mysqli_error($conndb) . "<br/><br/>");
        // Reset temp variable to empty
        $temp = '';
    }
}
echo "<strong>Fine importazione.</strong>";
?>