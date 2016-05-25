<?php

// Credenziali
include_once("config.php");

// Creo tabella IVA
$sql_iva = "CREATE TABLE iva (
id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
aliquota INT(3) NOT NULL,
descr VARCHAR(100) NULL,
reg_date TIMESTAMP,
UNIQUE (id)
)";

if (mysqli_query($conndb, $sql_iva)) {
    echo "Tabella IVA creata con successo <br/>";
} else {
    echo "C'e' stato un errore creando la tabella IVA: " . mysqli_error($conndb) . '<br/>';
}

// Creo tabella Imballo
$sql_imb = "CREATE TABLE imballo (
id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
tipo VARCHAR(20) NOT NULL,
descr VARCHAR(100) NULL,
reg_date TIMESTAMP,
UNIQUE (tipo)
)";

if (mysqli_query($conndb, $sql_imb)) {
    echo "Tabella imballo creata con successo <br/>";
} else {
    echo "C'e' stato un errore creando la tabella imballo: " . mysqli_error($conndb) . '<br/>';
}

// Creo tabella Articoli
$sql_art = "CREATE TABLE articoli (
id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
cod_int VARCHAR(6) NOT NULL,
nome VARCHAR(50) NOT NULL,
descr VARCHAR(100) NULL,
cod_barre BIGINT(30) NOT NULL,
prezzo INT(5) NULL,
note VARCHAR(100) NULL,
reg_date TIMESTAMP,
UNIQUE (cod_barre)
)";

if (mysqli_query($conndb, $sql_art)) {
    echo "Tabella articoli creata con successo'<br/>'";
} else {
    echo "C'e' stato un errore creando la tabella articoli: " . mysqli_error($conndb) . '<br/>';
}

//creo tabella clienti
$sql_c = "CREATE TABLE clienti (
id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nomeC VARCHAR(40) NOT NULL,
cognomeC VARCHAR(20) NULL,
codC VARCHAR(4) NOT NULL,
descrC VARCHAR(100) NULL,
noteC VARCHAR(100) NULL,
indirizzoLC VARCHAR(50) NULL,
cittaLC VARCHAR(20) NULL,
capLC INT(5) NULL,
provLC VARCHAR(2) NULL,
telLC VARCHAR(16) NULL,
faxLC VARCHAR(16) NULL,
statoLC VARCHAR(30) NULL,
emailLC VARCHAR(40) NULL,
urlLC VARCHAR(100) NULL,
indirizzoAC VARCHAR(50) NULL,
cittaAC VARCHAR(20) NULL,
capAC INT(5) NULL,
provAC VARCHAR(2) NULL,
telAC VARCHAR(16) NULL,
cellAC INT(11) NULL,
statoAC VARCHAR(30) NULL,
emailAC VARCHAR(40) NULL,
urlAC VARCHAR(100) NULL,
PIVAC INT(11) NULL,
CFC VARCHAR(16) NULL,
IBANC VARCHAR(27) NULL,
bancaC VARCHAR(100) NULL,
reg_date TIMESTAMP,
UNIQUE (codC, emailAC, PIVAC, CFC)
)";

if (mysqli_query($conndb, $sql_c)) {
    echo "Tabella clienti creata con successo'<br/>'";
} else {
    echo "C'e' stato un errore creando la tabella clienti: " . mysqli_error($conndb) . '<br/>';
}

// Creo tabella Causale
$sql_cau = "CREATE TABLE causale (
id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
tipo VARCHAR(20) NOT NULL,
descr VARCHAR(100) NULL,
reg_date TIMESTAMP,
UNIQUE (tipo)
)";

if (mysqli_query($conndb, $sql_cau)) {
    echo "Tabella Causale creata con successo'<br/>'";
} else {
    echo "C'e' stato un errore creando la tabella Causale: " . mysqli_error($conndb) . '<br/>';
}

// Creo tabella Mezzo
$sql_mezzo = "CREATE TABLE mezzo (
id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
tipo VARCHAR(20) NOT NULL,
descr VARCHAR(100) NULL,
reg_date TIMESTAMP,
UNIQUE (tipo)
)";

if (mysqli_query($conndb, $sql_mezzo)) {
    echo "Tabella mezzo creata con successo'<br/>'";
} else {
    echo "C'e' stato un errore creando la tabella mezzo: " . mysqli_error($conndb) . '<br/>';
}

// Creo tabella Spese Aggiuntive
$sql_sag = "CREATE TABLE sp_agg (
id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
tipo VARCHAR(20) NOT NULL,
prezzo INT(5) NOT NULL,
descr VARCHAR(100) NULL,
UNIQUE (tipo)
)";

if (mysqli_query($conndb, $sql_sag)) {
    echo "Tabella Spese Aggiunte creata con successo'<br/>'";
} else {
    echo "C'e' stato un errore creando la tabella Spese Aggiunte: " . mysqli_error($conndb) . '<br/>';
}

// Creo tabella Pagamento
$sql_pag = "CREATE TABLE pagam (
id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
tipo VARCHAR(20) NOT NULL,
descr VARCHAR(100) NULL,
UNIQUE (tipo)
)";

if (mysqli_query($conndb, $sql_pag)) {
    echo "Tabella Pagamento creata con successo'<br/>'";
} else {
    echo "C'e' stato un errore creando la tabella Pagamento: " . mysqli_error($conndb) . '<br/>';
}

//creo tabella fornitori generale
$sql_f = "CREATE TABLE fornitori (
id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nomeF VARCHAR(40) NOT NULL,
cognomeF VARCHAR(20) NULL,
codF VARCHAR(4) NOT NULL,
descrF VARCHAR(100) NULL,
noteF VARCHAR(100) NULL,
indirizzoLF VARCHAR(50) NULL,
cittaLF VARCHAR(20) NULL,
capLF INT(5) NULL,
provLF VARCHAR(2) NULL,
telLF VARCHAR(16) NULL,
faxLF VARCHAR(16) NULL,
statoLF VARCHAR(30) NULL,
emailLF VARCHAR(40) NULL,
urlLF VARCHAR(100) NULL,
PIVAF INT(11) NULL,
CFF VARCHAR(16) NULL,
IBANF VARCHAR(27) NULL,
bancaF VARCHAR(100) NULL,
reg_date TIMESTAMP,
UNIQUE (codF, emailLF, PIVAF, CFF)
)";

if (mysqli_query($conndb, $sql_f)) {
    echo "Tabella fornitori creata con successo'<br/>'";
} else {
    echo "C'e' stato un errore creando la tabella fornitori: " . mysqli_error($conndb) . '<br/>';
}

//creo tabella login
$sql_log = "CREATE TABLE login (
id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
tipoLOG VARCHAR(9) NOT NULL,
userLOG VARCHAR(20) NOT NULL,
pswdLOG VARCHAR(10),
reg_date TIMESTAMP,
UNIQUE (userLOG)
)";

if (mysqli_query($conndb, $sql_log)) {
    echo "Tabella login creata con successo'<br/>'";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore creando la tabella login: " . mysqli_error($conndb) . '<br/>';
}

//creo tabella numerazione fattura
$sql_nf = "CREATE TABLE numerazione_ftt (
id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
num INT(5) NOT NULL,
dest VARCHAR(50) NOT NULL,
link VARCHAR(250) NULL,
reg_date TIMESTAMP
)";

if (mysqli_query($conndb, $sql_nf)) {
    echo "Tabella numerazione fattura creata con successo'<br/>'";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore creando la tabella numerazione fattura: " . mysqli_error($conndb) . '<br/>';
}

//creo tabella fattura
$sql_fatt = "CREATE TABLE fatt (
id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_doc INT(5) NOT NULL,
id_art INT(5) NOT NULL,
qta INT(5) NOT NULL,
id_iva INT(3) NOT NULL,
id_mezzo INT(3) NULL,
id_caus INT(3) NULL,
id_imb INT(3) NULL,
note VARCHAR(100) NULL,
reg_date TIMESTAMP
)";

if (mysqli_query($conndb, $sql_fatt)) {
    echo "Tabella fatture creata con successo'<br/>'";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore creando la tabella fatture: " . mysqli_error($conndb) . '<br/>';
}

//creo tabella numerazione DocumentoDiTrasporto
$sql_nd = "CREATE TABLE numerazione_ddt (
id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
num INT(5) NOT NULL,
dest VARCHAR(50) NOT NULL,
link VARCHAR(250) NULL,
reg_date TIMESTAMP
)";

if (mysqli_query($conndb, $sql_nd)) {
    echo "Tabella numerazione DDT creata con successo'<br/>'";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore creando la tabella numerazione DDT: " . mysqli_error($conndb) . '<br/>';
}

//creo tabella ddt
$sql_ddt = "CREATE TABLE ddt (
id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_doc INT(5) NOT NULL,
id_art INT(5) NOT NULL,
qta INT(5) NOT NULL,
id_mezzo INT(3) NULL,
id_caus INT(3) NULL,
id_imb INT(3) NULL,
note VARCHAR(100) NULL,
reg_date TIMESTAMP
)";

if (mysqli_query($conndb, $sql_ddt)) {
    echo "Tabella DdT creata con successo'<br/>'";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore creando la tabella DdT: " . mysqli_error($conndb) . '<br/>';
}

//creo tabella numerazione NotaDiCredito
$sql_nn = "CREATE TABLE numerazione_ndc (
id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
num INT(5) NOT NULL,
dest VARCHAR(50) NOT NULL,
link VARCHAR(250) NULL,
reg_date TIMESTAMP
)";

if (mysqli_query($conndb, $sql_nn)) {
    echo "Tabella numerazione NDC creata con successo'<br/>'";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore creando la tabella numerazione NDC: " . mysqli_error($conndb) . '<br/>';
}

//creo tabella ndc
$sql_ndc = "CREATE TABLE ndc (
id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_doc INT(5) NOT NULL,
id_art INT(5) NOT NULL,
qta INT(5) NOT NULL,
id_iva INT(3) NOT NULL,
id_mezzo INT(3) NULL,
id_caus INT(3) NULL,
id_imb INT(3) NULL,
note VARCHAR(100) NULL,
reg_date TIMESTAMP
)";

if (mysqli_query($conndb, $sql_ndc)) {
    echo "Tabella NdC creata con successo'<br/>'";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore creando la tabella NdC: " . mysqli_error($conndb) . '<br/>';
}

//creo tabella numerazione preventivi
$sql_np = "CREATE TABLE numerazione_p (
id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
num INT(5) NOT NULL,
dest VARCHAR(50) NOT NULL,
link VARCHAR(250) NULL,
reg_date TIMESTAMP
)";

if (mysqli_query($conndb, $sql_np)) {
    echo "Tabella numerazione preventivi creata con successo'<br/>'";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore creando la tabella numerazione preventivi: " . mysqli_error($conndb) . '<br/>';
}

//creo tabella preventivi
$sql_prev = "CREATE TABLE prev (
id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_doc INT(5) NOT NULL,
id_art INT(5) NOT NULL,
qta INT(5) NOT NULL,
id_iva INT(3) NOT NULL,
id_mezzo INT(3) NULL,
id_caus INT(3) NULL,
id_imb INT(3) NULL,
note VARCHAR(100) NULL,
reg_date TIMESTAMP
)";

if (mysqli_query($conndb, $sql_prev)) {
    echo "Tabella preventivi creata con successo'<br/>'";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore creando la tabella preventivi: " . mysqli_error($conndb) . '<br/>';
}

mysqli_close($conndb);

//creo tabella custom settings
$sql_custom_settings = "CREATE TABLE `custom_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `max_fatt` int(11) NOT NULL DEFAULT '30',
  `max_ndc` int(11) NOT NULL DEFAULT '30',
  `max_ddt` int(11) NOT NULL DEFAULT '30',
  `max_prev` int(11) NOT NULL DEFAULT '30',
  `max_listini` int(11) NOT NULL DEFAULT '30',
  `max_clienti` int(11) NOT NULL DEFAULT '30',
  `max_fornitori` int(11) NOT NULL DEFAULT '30',
  `id_user` int(5) NOT NULL,
  PRIMARY KEY (`id`)
)";

if (mysqli_query($conndb, $sql_prev)) {
    echo "Tabella settaggi creata con successo'<br/>'";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore creando la tabella settaggi: " . mysqli_error($conndb) . '<br/>';
}

?>
