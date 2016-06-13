<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['confirm'] == 'Yes') {

// Elimino tabella Articoli
$sql_art = "DROP TABLE articoli";

if (mysqli_query($conndb, $sql_art)) {
    echo "Tabella articoli eliminata con successo <br/>";
} else {
    echo "C'e' stato un errore eliminando la tabella articoli: " . mysqli_error($conndb) . "<br/>";
}

// Elimino tabella Causale
$sql_cau = "DROP TABLE ck_causale";

if (mysqli_query($conndb, $sql_cau)) {
    echo "Tabella Causale eliminata con successo <br/>";
} else {
    echo "C'e' stato un errore eliminando la tabella Causale: " . mysqli_error($conndb) . "<br/>";
}

// Elimino tabella Imballo
$sql_imb = "DROP TABLE ck_imballo";

if (mysqli_query($conndb, $sql_imb)) {
    echo "Tabella imballo eliminata con successo <br/>";
} else {
    echo "C'e' stato un errore eliminando la tabella imballo: " . mysqli_error($conndb) . "<br/>";
}

// Elimino tabella IVA
$sql_iva = "DROP TABLE ck_iva";

if (mysqli_query($conndb, $sql_iva)) {
    echo "Tabella IVA eliminata con successo <br/>";
} else {
    echo "C'e' stato un errore eliminando la tabella IVA: " . mysqli_error($conndb) . "<br/>";
}

// Elimino tabella Mezzo
$sql_mezzo = "DROP TABLE ck_mezzo";

if (mysqli_query($conndb, $sql_mezzo)) {
    echo "Tabella mezzo eliminata con successo <br/>";
} else {
    echo "C'e' stato un errore eliminando la tabella mezzo: " . mysqli_error($conndb) . "<br/>";
}

// Elimino tabella Pagamento
$sql_pag = "DROP TABLE ck_pagam";

if (mysqli_query($conndb, $sql_pag)) {
    echo "Tabella Pagamento eliminata con successo <br/>";
} else {
    echo "C'e' stato un errore eliminando la tabella Pagamento: " . mysqli_error($conndb) . "<br/>";
}

// Elimino tabella Spese Aggiuntive
$sql_sp = "DROP TABLE ck_spese";

if (mysqli_query($conndb, $sql_sp)) {
    echo "Tabella Spese Aggiunte eliminata con successo <br/>";
} else {
    echo "C'e' stato un errore eliminando la tabella Spese Aggiunte: " . mysqli_error($conndb) . "<br/>";
}

//Elimino tabella clienti
$sql_c = "DROP TABLE clienti";

if (mysqli_query($conndb, $sql_c)) {
    echo "Tabella clienti eliminata con successo <br/>";
} else {
    echo "C'e' stato un errore eliminando la tabella clienti: " . mysqli_error($conndb) . "<br/>";
}

//Elimino tabella fornitori
$sql_f = "DROP TABLE fornitori";

if (mysqli_query($conndb, $sql_f)) {
    echo "Tabella fornitori eliminata con successo <br/>";
} else {
    echo "C'e' stato un errore eliminando la tabella fornitori: " . mysqli_error($conndb) . "<br/>";
}

//Elimino tabella ddt
$sql_ddt = "DROP TABLE doc_ddt";

if (mysqli_query($conndb, $sql_ddt)) {
    echo "Tabella DdT eliminata con successo <br/>";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore eliminando la tabella DdT: " . mysqli_error($conndb) . "<br/>";
}

//Elimino tabella numerazione DocumentoDiTrasporto
$sql_nd = "DROP TABLE doc_ddt_num";

if (mysqli_query($conndb, $sql_nd)) {
    echo "Tabella numerazione DDT eliminata con successo <br/>";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore eliminando la tabella numerazione DDT: " . mysqli_error($conndb) . "<br/>";
}

//Elimino tabella fattura
$sql_fatt = "DROP TABLE doc_fatt";

if (mysqli_query($conndb, $sql_fatt)) {
    echo "Tabella fatture eliminata con successo <br/>";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore eliminando la tabella fatture: " . mysqli_error($conndb) . "<br/>";
}

//Elimino tabella numerazione fattura
$sql_nf = "DROP TABLE doc_fatt_num";

if (mysqli_query($conndb, $sql_nf)) {
    echo "Tabella numerazione fattura eliminata con successo <br/>";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore eliminando la tabella numerazione fattura: " . mysqli_error($conndb) . "<br/>";
}

//Elimino tabella NdC
$sql_ndc = "DROP TABLE doc_ndc";

if (mysqli_query($conndb, $sql_ndc)) {
    echo "Tabella NdC eliminata con successo <br/>";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore eliminando la tabella NdC: " . mysqli_error($conndb) . "<br/>";
}

//Elimino tabella numerazione NdC
$sql_nn = "DROP TABLE doc_ndc_num";

if (mysqli_query($conndb, $sql_nn)) {
    echo "Tabella numerazione NdC eliminata con successo <br/>";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore eliminando la tabella numerazione NdC: " . mysqli_error($conndb) . "<br/>";
}

//Elimino tabella preventivi
$sql_prev = "DROP TABLE doc_prev";

if (mysqli_query($conndb, $sql_prev)) {
    echo "Tabella preventivi eliminata con successo <br/>";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore eliminando la tabella preventivi: " . mysqli_error($conndb) . "<br/>";
}

//Elimino tabella numerazione preventivi
$sql_np = "DROP TABLE doc_prev_num";

if (mysqli_query($conndb, $sql_np)) {
    echo "Tabella numerazione preventivi eliminata con successo <br/>";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore eliminando la tabella numerazione preventivi: " . mysqli_error($conndb) . "<br/>";
}

//Elimino tabella settaggi
$sql_settings = "DROP TABLE settings";

if (mysqli_query($conndb, $sql_settings)) {
    echo "Tabella settaggi eliminata con successo <br/>";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore eliminando la tabella settaggi: " . mysqli_error($conndb) . "<br/>";
}

//Elimino tabella users per login
$sql_us = "DROP TABLE users";

if (mysqli_query($conndb, $sql_us)) {
    echo "Tabella users eliminata con successo <br/>";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore eliminando la tabella users: " . mysqli_error($conndb) . "<br/>";
}

// Elimino tabella db fatture
$sql_fdb = "DROP TABLE stampa_fattura";

if (mysqli_query($conndb, $sql_fdb)) {
    echo "Tabella db fatture eliminata con successo <br/>";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore eliminando la tabella db fatture: " . mysqli_error($conndb) . "<br/>";
}

mysqli_close($conndb);
?>

<form method="POST">
    Sei sicuro/a?
    <input type="submit" name="confirm" value="Yes">
    <input type="submit" name="confirm" value="No">
</form>

