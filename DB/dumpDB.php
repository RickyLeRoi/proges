<?php
include_once("config.php");

$table_name = "*";
$backup_file = "/backup/gestionale_db.sql";
$sql = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";

$retval = mysqli_query($sql, $conndb);

if (!$retval) {
    die('Could not take data backup: ' . mysqli_error());
}

echo "Backup eseguito con successo<br/>";

mysqli_close($conn);
?>