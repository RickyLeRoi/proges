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

// creo tabella db fatture
$sql_fdb = "CREATE TABLE stampa_fattura (
id INT UNSIGNED PRIMARY KEY NOT NULL,
data_doc DATE NOT NULL,
pagamento VARCHAR(200) NOT NULL,
cliente VARCHAR(200) NOT NULL,
Piva VARCHAR(200) NULL,
cf VARCHAR(200) NULL,
indirizzo VARCHAR(200) NOT NULL,
citta VARCHAR(200) NOT NULL,
prov VARCHAR(5) NOT NULL,
cap VARCHAR(10) NOT NULL,
arr_qta LONGTEXT NOT NULL,
arr_beni LONGTEXT NOT NULL,
arr_misure LONGTEXT NULL,
arr_imp_uni LONGTEXT NOT NULL,
arr_importo LONGTEXT NOT NULL,
tot_parziale INT NOT NULL,
iva INT NOT NULL,
tot_dovuto INT NOT NULL,
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

// creo tabella db ddt
$sql_ddb = "CREATE TABLE stampa_ddt (
id INT UNSIGNED PRIMARY KEY NOT NULL,
data_doc DATE NOT NULL,
mezzo VARCHAR(200) NOT NULL,
cliente VARCHAR(200) NOT NULL,
Piva VARCHAR(200) NULL,
cf VARCHAR(200) NULL,
indirizzo VARCHAR(200) NOT NULL,
citta VARCHAR(200) NOT NULL,
prov VARCHAR(5) NOT NULL,
cap VARCHAR(10) NOT NULL,
causale VARCHAR(200) NOT NULL,
imballo VARCHAR(200) NOT NULL,
n_colli INT NULL,
peso INT NULL,
data_rit DATE NOT NULL,
arr_qta LONGTEXT NOT NULL,
arr_beni LONGTEXT NOT NULL,
arr_misure LONGTEXT NULL,
vettore VARCHAR(200) NULL,
note VARCHAR(255) NULL
) DEFAULT CHARACTER SET utf8";

if (mysqli_query($conndb, $sql_ddb)) {
    echo "Tabella db DdT creata con successo <br/>";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore creando la tabella db DdT: " . mysqli_error($conndb) . "<br/>";
}

// creo tabella db preventivo
$sql_pdb = "CREATE TABLE stampa_preventivo (
id INT UNSIGNED PRIMARY KEY NOT NULL,
data_doc DATE NOT NULL,
pagamento VARCHAR(200) NOT NULL,
cliente VARCHAR(200) NOT NULL,
Piva VARCHAR(200) NULL,
cf VARCHAR(200) NULL,
indirizzo VARCHAR(200) NOT NULL,
citta VARCHAR(200) NOT NULL,
prov VARCHAR(5) NOT NULL,
cap VARCHAR(10) NOT NULL,
arr_qta LONGTEXT NOT NULL,
arr_beni LONGTEXT NOT NULL,
arr_misure LONGTEXT NULL,
arr_imp_uni LONGTEXT NOT NULL,
arr_importo LONGTEXT NOT NULL,
tot_parziale INT NOT NULL,
iva INT NOT NULL,
tot_dovuto INT NOT NULL
) DEFAULT CHARACTER SET utf8";

if (mysqli_query($conndb, $sql_pdb)) {
    echo "Tabella db preventivo creata con successo <br/>";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore creando la tabella db preventivo: " . mysqli_error($conndb) . "<br/>";
}

// creo tabella db ndc
$sql_ndb = "CREATE TABLE stampa_ndc (
id INT UNSIGNED PRIMARY KEY NOT NULL,
data_doc DATE NOT NULL,
pagamento VARCHAR(200) NOT NULL,
cliente VARCHAR(200) NOT NULL,
Piva VARCHAR(200) NULL,
cf VARCHAR(200) NULL,
indirizzo VARCHAR(200) NOT NULL,
citta VARCHAR(200) NOT NULL,
prov VARCHAR(5) NOT NULL,
cap VARCHAR(10) NOT NULL,
arr_qta LONGTEXT NOT NULL,
arr_beni LONGTEXT NOT NULL,
arr_misure LONGTEXT NULL,
arr_imp_uni LONGTEXT NOT NULL,
arr_importo LONGTEXT NOT NULL,
tot_parziale INT NOT NULL,
iva INT NOT NULL,
tot_dovuto INT NOT NULL,
esente_num INT NULL,
esente_dal DATE DEFAULT NULL,
esente_al DATE DEFAULT NULL
) DEFAULT CHARACTER SET utf8";

if (mysqli_query($conndb, $sql_ndb)) {
    echo "Tabella db NdC creata con successo <br/>";
    header('Refresh: 3; URL = homeDB.php');
} else {
    echo "C'e' stato un errore creando la tabella db NdC: " . mysqli_error($conndb) . "<br/>";
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

mysqli_close($conndb);

?>
