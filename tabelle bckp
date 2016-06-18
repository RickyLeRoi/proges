<?php

// Credenziali
include_once("config.php");

// Creo tabella Articoli
$sql_art = "CREATE TABLE articoli (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
cod_int VARCHAR(6) NOT NULL,
descr VARCHAR(200) NOT NULL,
misura VARCHAR(50) NULL,
cod_barre BIGINT NULL,
prezzo INT NOT NULL,
note VARCHAR(200) NULL,
UNIQUE (cod_int)
) DEFAULT CHARACTER SET utf8";

if (mysqli_query($conndb, $sql_art)) {
    echo "Tabella articoli creata con successo <br/>";
} else {
    echo "C'e' stato un errore creando la tabella articoli: " . mysqli_error($conndb) . "<br/>";
}

// Creo tabella Causale
$sql_cau = "CREATE TABLE ck_causale (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
descr VARCHAR(200) NOT NULL,
UNIQUE (descr)
) DEFAULT CHARACTER SET utf8";

if (mysqli_query($conndb, $sql_cau)) {
    echo "Tabella Causale creata con successo <br/>";
} else {
    echo "C'e' stato un errore creando la tabella Causale: " . mysqli_error($conndb) . "<br/>";
}

// Creo tabella Imballo
$sql_imb = "CREATE TABLE ck_imballo (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
descr VARCHAR(200) NOT NULL,
UNIQUE (descr)
) DEFAULT CHARACTER SET utf8";

if (mysqli_query($conndb, $sql_imb)) {
    echo "Tabella imballo creata con successo <br/>";
} else {
    echo "C'e' stato un errore creando la tabella imballo: " . mysqli_error($conndb) . "<br/>";
}

// Creo tabella IVA
$sql_iva = "CREATE TABLE ck_iva (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
aliquota INT NOT NULL,
descr VARCHAR(200) NULL,
UNIQUE (aliquota)
) DEFAULT CHARACTER SET utf8";

if (mysqli_query($conndb, $sql_iva)) {
    echo "Tabella IVA creata con successo <br/>";
} else {
    echo "C'e' stato un errore creando la tabella IVA: " . mysqli_error($conndb) . "<br/>";
}

// Creo tabella Mezzo
$sql_mezzo = "CREATE TABLE ck_mezzo (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
tipo VARCHAR(20) NOT NULL,
descr VARCHAR(200) NULL,
UNIQUE (tipo)
) DEFAULT CHARACTER SET utf8";

if (mysqli_query($conndb, $sql_mezzo)) {
    echo "Tabella mezzo creata con successo <br/>";
} else {
    echo "C'e' stato un errore creando la tabella mezzo: " . mysqli_error($conndb) . "<br/>";
}

// Creo tabella Pagamento
$sql_pag = "CREATE TABLE ck_pagam (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
descr VARCHAR(200) NOT NULL,
UNIQUE (descr)
) DEFAULT CHARACTER SET utf8";

if (mysqli_query($conndb, $sql_pag)) {
    echo "Tabella Pagamento creata con successo <br/>";
} else {
    echo "C'e' stato un errore creando la tabella Pagamento: " . mysqli_error($conndb) . "<br/>";
}

// Creo tabella Spese Aggiuntive
$sql_sp = "CREATE TABLE ck_spese (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
descr VARCHAR(200) NOT NULL,
prezzo INT NOT NULL,
UNIQUE (descr)
) DEFAULT CHARACTER SET utf8";

if (mysqli_query($conndb, $sql_sp)) {
    echo "Tabella Spese Aggiunte creata con successo <br/>";
} else {
    echo "C'e' stato un errore creando la tabella Spese Aggiunte: " . mysqli_error($conndb) . "<br/>";
}

//creo tabella clienti
$sql_c = "CREATE TABLE clienti (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nomeC VARCHAR(50) NOT NULL,
cognomeC VARCHAR(50) NULL,
codC VARCHAR(6) NOT NULL,
indirizzoLC VARCHAR(100) NULL,
cittaLC VARCHAR(50) NULL,
capLC INT NULL,
provLC VARCHAR(2) NULL,
telLC VARCHAR(20) NULL,
faxLC VARCHAR(20) NULL,
statoLC VARCHAR(20) NULL,
emailLC VARCHAR(50) NULL,
urlLC VARCHAR(100) NULL,
indirizzoAC VARCHAR(100) NULL,
cittaAC VARCHAR(50) NULL,
capAC INT NULL,
provAC VARCHAR(2) NULL,
telAC VARCHAR(20) NULL,
cellAC VARCHAR(20) NULL,
statoAC VARCHAR(20) NULL,
emailAC VARCHAR(50) NULL,
urlAC VARCHAR(100) NULL,
PIVAC BIGINT NULL,
CFC VARCHAR(20) NULL,
IBANC VARCHAR(30) NULL,
bancaC VARCHAR(100) NULL,
descrC VARCHAR(200) NULL,
noteC VARCHAR(200) NULL,
reg_date TIMESTAMP,
UNIQUE (codC, PIVAC)
) DEFAULT CHARACTER SET utf8";

if (mysqli_query($conndb, $sql_c)) {
    echo "Tabella clienti creata con successo <br/>";
} else {
    echo "C'e' stato un errore creando la tabella clienti: " . mysqli_error($conndb) . "<br/>";
}

//creo tabella fornitori
$sql_f = "CREATE TABLE fornitori (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nomeF VARCHAR(50) NOT NULL,
cognomeF VARCHAR(50) NULL,
codF VARCHAR(6) NOT NULL,
indirizzoLF VARCHAR(100) NULL,
cittaLF VARCHAR(50) NULL,
capLF INT NULL,
provLF VARCHAR(2) NULL,
telLF VARCHAR(20) NULL,
faxLF VARCHAR(20) NULL,
statoLF VARCHAR(20) NULL,
emailLF VARCHAR(50) NULL,
urlLF VARCHAR(100) NULL,
PIVAF BIGINT NULL,
CFF VARCHAR(20) NULL,
IBANF VARCHAR(30) NULL,
bancaF VARCHAR(100) NULL,
descrF VARCHAR(200) NULL,
noteF VARCHAR(200) NULL,
reg_date TIMESTAMP,
UNIQUE (codF, PIVAF)
) DEFAULT CHARACTER SET utf8";

if (mysqli_query($conndb, $sql_f)) {
    echo "Tabella fornitori creata con successo <br/>";
} else {
    echo "C'e' stato un errore creando la tabella fornitori: " . mysqli_error($conndb) . "<br/>";
}

//creo tabella ddt
$sql_ddt = "CREATE TABLE doc_ddt (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_doc INT NOT NULL,
id_art INT NOT NULL,
qta INT NOT NULL,
id_mezzo INT NULL,
id_causale INT NULL,
id_imballo INT NULL,
note VARCHAR(200) NULL,
reg_date TIMESTAMP
) DEFAULT CHARACTER SET utf8";

if (mysqli_query($conndb, $sql_ddt)) {
    echo "Tabella DdT creata con successo <br/>";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore creando la tabella DdT: " . mysqli_error($conndb) . "<br/>";
}

//creo tabella numerazione DocumentoDiTrasporto
$sql_nd = "CREATE TABLE doc_ddt_num (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
num INT NOT NULL,
id_cliente INT NOT NULL,
link VARCHAR(255) NULL,
reg_date TIMESTAMP,
UNIQUE (link)
) DEFAULT CHARACTER SET utf8";

if (mysqli_query($conndb, $sql_nd)) {
    echo "Tabella numerazione DDT creata con successo <br/>";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore creando la tabella numerazione DDT: " . mysqli_error($conndb) . "<br/>";
}

//creo tabella fattura
$sql_fatt = "CREATE TABLE doc_fatt (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_doc INT NOT NULL,
id_art INT NOT NULL,
qta_art INT NOT NULL,
id_spese INT NULL,
qta_spese INT NULL,
id_pagam INT NULL,
id_iva INT NULL,
note VARCHAR(200) NULL,
reg_date TIMESTAMP
) DEFAULT CHARACTER SET utf8";

if (mysqli_query($conndb, $sql_fatt)) {
    echo "Tabella fatture creata con successo <br/>";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore creando la tabella fatture: " . mysqli_error($conndb) . "<br/>";
}

//creo tabella numerazione fattura
$sql_nf = "CREATE TABLE doc_fatt_num (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
num INT NOT NULL,
id_cliente INT NOT NULL,
link VARCHAR(255) NULL,
reg_date TIMESTAMP,
UNIQUE (link)
) DEFAULT CHARACTER SET utf8";

if (mysqli_query($conndb, $sql_nf)) {
    echo "Tabella numerazione fattura creata con successo <br/>";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore creando la tabella numerazione fattura: " . mysqli_error($conndb) . "<br/>";
}

//creo tabella NdC
$sql_ndc = "CREATE TABLE doc_ndc (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_doc INT NOT NULL,
id_art INT NOT NULL,
qta_art INT NOT NULL,
id_spese INT NULL,
qta_spese INT NULL,
id_pagam INT NULL,
id_iva INT NULL,
note VARCHAR(200) NULL,
reg_date TIMESTAMP
) DEFAULT CHARACTER SET utf8";

if (mysqli_query($conndb, $sql_ndc)) {
    echo "Tabella NdC creata con successo <br/>";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore creando la tabella NdC: " . mysqli_error($conndb) . "<br/>";
}

//creo tabella numerazione NdC
$sql_nn = "CREATE TABLE doc_ndc_num (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
num INT NOT NULL,
id_cliente INT NOT NULL,
link VARCHAR(255) NULL,
reg_date TIMESTAMP,
UNIQUE (link)
) DEFAULT CHARACTER SET utf8";

if (mysqli_query($conndb, $sql_nn)) {
    echo "Tabella numerazione NdC creata con successo <br/>";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore creando la tabella numerazione NdC: " . mysqli_error($conndb) . "<br/>";
}

//creo tabella preventivi
$sql_prev = "CREATE TABLE doc_prev (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_doc INT NOT NULL,
id_art INT NOT NULL,
qta_art INT NOT NULL,
id_spese INT NULL,
qta_spese INT NULL,
id_pagam INT NULL,
id_iva INT NULL,
note VARCHAR(200) NULL,
reg_date TIMESTAMP
) DEFAULT CHARACTER SET utf8";

if (mysqli_query($conndb, $sql_prev)) {
    echo "Tabella preventivi creata con successo <br/>";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore creando la tabella preventivi: " . mysqli_error($conndb) . "<br/>";
}

//creo tabella numerazione preventivi
$sql_np = "CREATE TABLE doc_prev_num (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
num INT NOT NULL,
id_cliente INT NOT NULL,
link VARCHAR(255) NULL,
reg_date TIMESTAMP,
UNIQUE (link)
) DEFAULT CHARACTER SET utf8";

if (mysqli_query($conndb, $sql_np)) {
    echo "Tabella numerazione preventivi creata con successo <br/>";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore creando la tabella numerazione preventivi: " . mysqli_error($conndb) . "<br/>";
}

//creo tabella settaggi
$sql_settings = "CREATE TABLE settings (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
max_fatt INT NOT NULL DEFAULT 20,
max_ndc INT NOT NULL DEFAULT 20,
max_ddt INT NOT NULL DEFAULT 20,
max_prev INT NOT NULL DEFAULT 20,
max_clienti INT NOT NULL DEFAULT 10,
max_fornitori INT NOT NULL DEFAULT 10,
id_user INT NOT NULL
) DEFAULT CHARACTER SET utf8";

if (mysqli_query($conndb, $sql_settings)) {
    echo "Tabella settaggi creata con successo <br/>";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore creando la tabella settaggi: " . mysqli_error($conndb) . "<br/>";
}

//creo tabella users per login
$sql_us = "CREATE TABLE users (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
tipoLOG VARCHAR(10) NOT NULL,
userLOG VARCHAR(25) NOT NULL,
pswdLOG VARCHAR(25) NULL,
reg_date TIMESTAMP,
UNIQUE (userLOG)
) DEFAULT CHARACTER SET utf8";

if (mysqli_query($conndb, $sql_us)) {
    echo "Tabella users creata con successo <br/>";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore creando la tabella users: " . mysqli_error($conndb) . "<br/>";
}

// creo tabella db fatture
$sql_fdb = "CREATE TABLE stampa_fattura (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pagamento VARCHAR(200) NOT NULL,
cliente VARCHAR(100) NOT NULL,
iva VARCHAR(200) NOT NULL,
indirizzo VARCHAR(200) NOT NULL,
citta VARCHAR(100) NOT NULL,
prov VARCHAR(5) NOT NULL,
cap VARCHAR(10) NULL,
quantita LONGTEXT NOT NULL,
prodotti LONGTEXT NOT NULL,
prezziCad LONGTEXT NOT NULL,
prezzi LONGTEXT NOT NULL,
parziale INT NOT NULL,
totale INT NOT NULL,
esente_num INT NULL,
esente_dal DATE DEFAULT NULL,
esente_al DATE DEFAULT NULL
) DEFAULT CHARACTER SET utf8";

if (mysqli_query($conndb, $sql_fdb)) {
    echo "Tabella db fatture creata con successo <br/>";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore creando la tabella db fatture: " . mysqli_error($conndb) . "<br/>";
}

mysqli_close($conndb);

?>
