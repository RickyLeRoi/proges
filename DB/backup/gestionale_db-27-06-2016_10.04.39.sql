DROP TABLE articoli;
/**/
CREATE TABLE `articoli` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_int` varchar(6) NOT NULL,
  `cliente` varchar(30) DEFAULT NULL,
  `descr` varchar(200) NOT NULL,
  `misura` varchar(50) DEFAULT NULL,
  `cod_barre` bigint(20) DEFAULT NULL,
  `prezzo` float(6,2) NOT NULL,
  `note` varchar(200) DEFAULT NULL,
  `tipologia` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cod_int` (`cod_int`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/**/
INSERT INTO articoli VALUES("1","001","FLOTT","et. FLOTT filetti di acciughe girasole 78g - 10000pz","110x30 mm","80315834","210.80","acciughe","Stock");
/**/
INSERT INTO articoli VALUES("2","002","FLOTT","et. FLOTT vongole naturali 130g","141x50 mm","80315835","273.80","","Normale");
/**/
INSERT INTO articoli VALUES("3","001A","FLOTT","et. FLOTT filetti di acciughe girasole 78g - fino a 18000pz","110x30 mm","80315834","210.80","","Stock");
/**/
INSERT INTO articoli VALUES("4","001B","FLOTT","et. FLOTT filetti di acciughe girasole 78g - fino a 25000pz","110x30 mm","80315834","11.64","","Scaglione");
/**/
INSERT INTO articoli VALUES("5","001C","FLOTT","et. FLOTT filetti di acciughe girasole 78g - fino a 50000pz","110x30 mm","80315834","10.80","","Scaglione");
/**/
INSERT INTO articoli VALUES("6","003","ICONSITT","etichette La Perla 80gr - 10000pz","76 x 28 mm","561415515158","200.00","","Stock");
/**/
INSERT INTO articoli VALUES("7","004","COOP. RINASCITA","etichette TOP Esselunga - salsa 410gr - fino a 10000pz","210x60 mm","587584784","630.00","","Stock");
/**/
DROP TABLE ck_causale;
/**/
CREATE TABLE `ck_causale` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descr` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descr` (`descr`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/**/
INSERT INTO ck_causale VALUES("3","campionatura");
/**/
INSERT INTO ck_causale VALUES("1","conto vendita");
/**/
INSERT INTO ck_causale VALUES("2","reso");
/**/
DROP TABLE ck_imballo;
/**/
CREATE TABLE `ck_imballo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descr` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descr` (`descr`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/**/
INSERT INTO ck_imballo VALUES("2","articoli in pedana");
/**/
INSERT INTO ck_imballo VALUES("3","aspetto proprio");
/**/
INSERT INTO ck_imballo VALUES("1","pacchi o scatole");
/**/
DROP TABLE ck_iva;
/**/
CREATE TABLE `ck_iva` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aliquota` int(11) NOT NULL,
  `descr` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `aliquota` (`aliquota`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/**/
INSERT INTO ck_iva VALUES("1","22","aliquota ordinaria");
/**/
INSERT INTO ck_iva VALUES("2","10","aliquota ridotta");
/**/
INSERT INTO ck_iva VALUES("3","4","aliquota minima");
/**/
INSERT INTO ck_iva VALUES("4","0","dichiarazione intenti");
/**/
DROP TABLE ck_mezzo;
/**/
CREATE TABLE `ck_mezzo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  `descr` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipo` (`tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/**/
INSERT INTO ck_mezzo VALUES("1","mittente","carico del mittente");
/**/
INSERT INTO ck_mezzo VALUES("2","destinatario","carico del destinatario");
/**/
INSERT INTO ck_mezzo VALUES("3","vettore","corriere");
/**/
INSERT INTO ck_mezzo VALUES("4","corriere italia","SDA, bagheria, nazionali");
/**/
INSERT INTO ck_mezzo VALUES("5","corriere estero","DHL, bagheria, internazionali");
/**/
DROP TABLE ck_pagam;
/**/
CREATE TABLE `ck_pagam` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descr` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descr` (`descr`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/**/
INSERT INTO ck_pagam VALUES("2","30 giorni data fattura");
/**/
INSERT INTO ck_pagam VALUES("5","30 giorni fine mese");
/**/
INSERT INTO ck_pagam VALUES("3","60 giorni data fattura");
/**/
INSERT INTO ck_pagam VALUES("6","60 giorni fine mese");
/**/
INSERT INTO ck_pagam VALUES("4","90 giorni data fattura");
/**/
INSERT INTO ck_pagam VALUES("7","90 giorni fine mese");
/**/
INSERT INTO ck_pagam VALUES("1","rimessa diretta");
/**/
DROP TABLE ck_spese;
/**/
CREATE TABLE `ck_spese` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descr` varchar(200) NOT NULL,
  `prezzo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descr` (`descr`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/**/
INSERT INTO ck_spese VALUES("1","impianto stampa","10");
/**/
INSERT INTO ck_spese VALUES("2","impianto stampa a caldo","15");
/**/
INSERT INTO ck_spese VALUES("3","fustella","20");
/**/
INSERT INTO ck_spese VALUES("4","telaio serigrafico","25");
/**/
INSERT INTO ck_spese VALUES("5","spedizione","5");
/**/
INSERT INTO ck_spese VALUES("6","contributo spedizioni","10");
/**/
DROP TABLE clienti;
/**/
CREATE TABLE `clienti` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomeC` varchar(50) NOT NULL,
  `cognomeC` varchar(50) DEFAULT NULL,
  `codC` varchar(6) NOT NULL,
  `indirizzoLC` varchar(100) DEFAULT NULL,
  `cittaLC` varchar(50) DEFAULT NULL,
  `capLC` int(11) DEFAULT NULL,
  `provLC` varchar(2) DEFAULT NULL,
  `telLC` varchar(20) DEFAULT NULL,
  `faxLC` varchar(20) DEFAULT NULL,
  `statoLC` varchar(20) DEFAULT NULL,
  `emailLC` varchar(50) DEFAULT NULL,
  `urlLC` varchar(100) DEFAULT NULL,
  `indirizzoAC` varchar(100) DEFAULT NULL,
  `cittaAC` varchar(50) DEFAULT NULL,
  `capAC` int(11) DEFAULT NULL,
  `provAC` varchar(2) DEFAULT NULL,
  `telAC` varchar(20) DEFAULT NULL,
  `cellAC` varchar(20) DEFAULT NULL,
  `statoAC` varchar(20) DEFAULT NULL,
  `emailAC` varchar(50) DEFAULT NULL,
  `urlAC` varchar(100) DEFAULT NULL,
  `PIVAC` bigint(20) DEFAULT NULL,
  `CFC` varchar(20) DEFAULT NULL,
  `IBANC` varchar(30) DEFAULT NULL,
  `bancaC` varchar(100) DEFAULT NULL,
  `descrC` varchar(200) DEFAULT NULL,
  `noteC` varchar(200) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codC` (`codC`,`PIVAC`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/**/
INSERT INTO clienti VALUES("1","Daniele","Irsuti","001C1","via daniele","Danielopoli","90100","PA","091234567","091234567","Italia","daniele@email.it","","","","0","","","","","","","335252542525","","","Letto","Danielo","","2016-06-22 12:46:40");
/**/
INSERT INTO clienti VALUES("2","Riccardo","Giordano","002C2","via riccardo","Riccardopoli","90100","PA","091456789","091456789","Italia","riccardo@email.it","riccardogiordano.space","","","0","","","","","","","","GRDRCR00A00G273A","IT3A89151651615615615615566","UniCredit Filiale Ficarazzi","Riccardo","","2016-06-22 12:44:33");
/**/
INSERT INTO clienti VALUES("3","nome","cognome","003C3","indirizzo","citta\'","12345","PR","091408509","12315151","stato","email@email.dom","urldimunch.it","indirizzo","citta\'","12345","PR","12315151","2147483647","stato","email@email.dom","urldimunch.it","2147483647","fefrgreg45654tgr","235235235345435435","banca","descrizione","note","2016-06-06 11:40:36");
/**/
INSERT INTO clienti VALUES("4","Marco","P","004C4","via sua","Ficarazzi","90010","PA","091992255","","Italia","marco.p@email.it","","","","0","","","","","","","76767898927676735","frfrccv456456vc15r","it84z4548945615648456","sella palermo","nipote","","2016-06-26 12:45:46");
/**/
DROP TABLE fornitori;
/**/
CREATE TABLE `fornitori` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomeF` varchar(50) NOT NULL,
  `cognomeF` varchar(50) DEFAULT NULL,
  `codF` varchar(6) NOT NULL,
  `indirizzoLF` varchar(100) DEFAULT NULL,
  `cittaLF` varchar(50) DEFAULT NULL,
  `capLF` int(11) DEFAULT NULL,
  `provLF` varchar(2) DEFAULT NULL,
  `telLF` varchar(20) DEFAULT NULL,
  `faxLF` varchar(20) DEFAULT NULL,
  `statoLF` varchar(20) DEFAULT NULL,
  `emailLF` varchar(50) DEFAULT NULL,
  `urlLF` varchar(100) DEFAULT NULL,
  `PIVAF` bigint(20) DEFAULT NULL,
  `CFF` varchar(20) DEFAULT NULL,
  `IBANF` varchar(30) DEFAULT NULL,
  `bancaF` varchar(100) DEFAULT NULL,
  `descrF` varchar(200) DEFAULT NULL,
  `noteF` varchar(200) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codF` (`codF`,`PIVAF`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/**/
INSERT INTO fornitori VALUES("1","Fornitore","Di Prova","001F2","via del fornitore","Sua","12345","PR","091123456","091123456","Italia","suaemail@dom.it","","2147483647","CFFCCF55C155C152","","Banca sua - Palermo","descrizione","","2016-06-26 12:47:52");
/**/
DROP TABLE settings;
/**/
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `max_fatt` int(11) NOT NULL DEFAULT '20',
  `max_ndc` int(11) NOT NULL DEFAULT '20',
  `max_ddt` int(11) NOT NULL DEFAULT '20',
  `max_prev` int(11) NOT NULL DEFAULT '20',
  `max_clienti` int(11) NOT NULL DEFAULT '10',
  `max_fornitori` int(11) NOT NULL DEFAULT '10',
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/**/
INSERT INTO settings VALUES("1","10","10","10","10","10","10","1");
/**/
INSERT INTO settings VALUES("2","30","20","30","30","30","20","3");
/**/
INSERT INTO settings VALUES("3","20","20","20","20","20","20","2");
/**/
DROP TABLE stampa_ddt;
/**/
CREATE TABLE `stampa_ddt` (
  `id` int(10) unsigned NOT NULL,
  `data_doc` date NOT NULL,
  `mezzo` varchar(200) NOT NULL,
  `cliente` varchar(200) NOT NULL,
  `Piva` varchar(200) DEFAULT NULL,
  `cf` varchar(200) DEFAULT NULL,
  `indirizzo` varchar(200) NOT NULL,
  `citta` varchar(200) NOT NULL,
  `prov` varchar(5) NOT NULL,
  `cap` varchar(10) NOT NULL,
  `causale` varchar(200) NOT NULL,
  `imballo` varchar(200) NOT NULL,
  `n_colli` int(11) DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `data_rit` datetime NOT NULL,
  `arr_qta` longtext NOT NULL,
  `arr_beni` longtext NOT NULL,
  `arr_misure` longtext,
  `arr_imp_uni` longtext NOT NULL,
  `vettore` varchar(200) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `data_consegna` datetime DEFAULT NULL,
  `arr_tipologia` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/**/
DROP TABLE stampa_fattura;
/**/
CREATE TABLE `stampa_fattura` (
  `id` int(10) unsigned NOT NULL,
  `data_doc` date NOT NULL,
  `pagamento` varchar(200) NOT NULL,
  `cliente` varchar(200) NOT NULL,
  `Piva` varchar(200) DEFAULT NULL,
  `cf` varchar(200) DEFAULT NULL,
  `indirizzo` varchar(200) NOT NULL,
  `citta` varchar(200) NOT NULL,
  `prov` varchar(5) NOT NULL,
  `cap` varchar(10) NOT NULL,
  `arr_qta` longtext NOT NULL,
  `arr_beni` longtext NOT NULL,
  `arr_misure` longtext,
  `arr_imp_uni` longtext NOT NULL,
  `arr_importo` longtext NOT NULL,
  `tot_parziale` float(10,2) NOT NULL,
  `iva` int(11) NOT NULL,
  `tot_dovuto` float(10,2) NOT NULL,
  `esente_num` int(11) DEFAULT NULL,
  `esente_dal` date DEFAULT NULL,
  `all_ddt` text,
  `esente_al` date DEFAULT NULL,
  `tipologia` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/**/
DROP TABLE stampa_ndc;
/**/
CREATE TABLE `stampa_ndc` (
  `id` int(10) unsigned NOT NULL,
  `data_doc` date NOT NULL,
  `pagamento` varchar(200) NOT NULL,
  `cliente` varchar(200) NOT NULL,
  `Piva` varchar(200) DEFAULT NULL,
  `cf` varchar(200) DEFAULT NULL,
  `indirizzo` varchar(200) NOT NULL,
  `citta` varchar(200) NOT NULL,
  `prov` varchar(5) NOT NULL,
  `cap` varchar(10) NOT NULL,
  `arr_qta` longtext NOT NULL,
  `arr_beni` longtext NOT NULL,
  `arr_misure` longtext,
  `arr_imp_uni` longtext NOT NULL,
  `arr_importo` longtext NOT NULL,
  `tot_parziale` float(10,2) NOT NULL,
  `iva` int(11) NOT NULL,
  `tot_dovuto` float(10,2) NOT NULL,
  `esente_num` int(11) DEFAULT NULL,
  `esente_dal` date DEFAULT NULL,
  `esente_al` date DEFAULT NULL,
  `arr_tipologia` longtext,
  `doc_fatt` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/**/
DROP TABLE stampa_preventivo;
/**/
CREATE TABLE `stampa_preventivo` (
  `id` int(10) unsigned NOT NULL,
  `data_doc` date NOT NULL,
  `pagamento` varchar(200) NOT NULL,
  `cliente` varchar(200) NOT NULL,
  `Piva` varchar(200) DEFAULT NULL,
  `cf` varchar(200) DEFAULT NULL,
  `indirizzo` varchar(200) NOT NULL,
  `citta` varchar(200) NOT NULL,
  `prov` varchar(5) NOT NULL,
  `cap` varchar(10) NOT NULL,
  `arr_qta` longtext NOT NULL,
  `arr_beni` longtext NOT NULL,
  `arr_misure` longtext,
  `arr_imp_uni` longtext NOT NULL,
  `arr_importo` longtext NOT NULL,
  `tot_parziale` float(10,2) NOT NULL,
  `iva` int(11) NOT NULL,
  `tot_dovuto` float(10,2) NOT NULL,
  `tipologia` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/**/
DROP TABLE users;
/**/
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipoLOG` varchar(10) NOT NULL,
  `userLOG` varchar(25) NOT NULL,
  `pswdLOG` varchar(25) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userLOG` (`userLOG`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/**/
INSERT INTO users VALUES("1","Tecnico","Riccardo","diplo","2016-06-06 11:37:37");
/**/
INSERT INTO users VALUES("2","Operatore","Mattea","demo","2016-06-06 11:37:46");
/**/
INSERT INTO users VALUES("3","Tecnico","Daniele","diplo","2016-06-06 11:37:54");
/**/
