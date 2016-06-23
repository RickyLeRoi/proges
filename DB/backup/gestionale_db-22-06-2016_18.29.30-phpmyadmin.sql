-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generato il: Giu 22, 2016 alle 16:29
-- Versione del server: 5.6.13
-- Versione PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gestionale_db`
--
CREATE DATABASE IF NOT EXISTS `gestionale_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gestionale_db`;

-- --------------------------------------------------------

--
-- Struttura della tabella `articoli`
--

CREATE TABLE IF NOT EXISTS `articoli` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_int` varchar(6) NOT NULL,
  `descr` varchar(200) NOT NULL,
  `misura` varchar(50) DEFAULT NULL,
  `cod_barre` bigint(20) DEFAULT NULL,
  `prezzo` int(11) NOT NULL,
  `note` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cod_int` (`cod_int`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dump dei dati per la tabella `articoli`
--

INSERT INTO `articoli` (`id`, `cod_int`, `descr`, `misura`, `cod_barre`, `prezzo`, `note`) VALUES
(1, '001A1', 'Articolo ', '200cm', 52656264644, 30, '6'),
(2, '002A2', 'piselli surgelati Findus', '5 kg', 3215642361523, 28, 'sono duri'),
(3, '003A3', 'piselli non surgelati', 'enormi', 5453215632556, 426, 'piacciono a Daniele'),
(4, '004A4', 'etichette sardine 10000pz', '120x30 mm', 4545616121654, 2, 'fino a 10k pezzi'),
(5, '005A5', 'etichette sardine 20000pz', '120x30 mm', 4545616121654, 2, 'fino a 20k pezzi');

-- --------------------------------------------------------

--
-- Struttura della tabella `ck_causale`
--

CREATE TABLE IF NOT EXISTS `ck_causale` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descr` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descr` (`descr`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dump dei dati per la tabella `ck_causale`
--

INSERT INTO `ck_causale` (`id`, `descr`) VALUES
(3, 'campionatura'),
(1, 'conto vendita'),
(2, 'reso');

-- --------------------------------------------------------

--
-- Struttura della tabella `ck_imballo`
--

CREATE TABLE IF NOT EXISTS `ck_imballo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descr` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descr` (`descr`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dump dei dati per la tabella `ck_imballo`
--

INSERT INTO `ck_imballo` (`id`, `descr`) VALUES
(2, 'articoli in pedana'),
(3, 'aspetto proprio'),
(1, 'pacchi o scatole');

-- --------------------------------------------------------

--
-- Struttura della tabella `ck_iva`
--

CREATE TABLE IF NOT EXISTS `ck_iva` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aliquota` int(11) NOT NULL,
  `descr` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `aliquota` (`aliquota`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dump dei dati per la tabella `ck_iva`
--

INSERT INTO `ck_iva` (`id`, `aliquota`, `descr`) VALUES
(1, 22, 'aliquota ordinaria'),
(2, 10, 'aliquota ridotta'),
(3, 4, 'aliquota minima'),
(4, 0, 'dichiarazione intenti');

-- --------------------------------------------------------

--
-- Struttura della tabella `ck_mezzo`
--

CREATE TABLE IF NOT EXISTS `ck_mezzo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  `descr` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipo` (`tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dump dei dati per la tabella `ck_mezzo`
--

INSERT INTO `ck_mezzo` (`id`, `tipo`, `descr`) VALUES
(1, 'mittente', 'carico del mittente'),
(2, 'destinatario', 'carico del destinatario'),
(3, 'vettore', 'corriere'),
(4, 'corriere italia', 'SDA, bagheria, cazzucazzu');

-- --------------------------------------------------------

--
-- Struttura della tabella `ck_pagam`
--

CREATE TABLE IF NOT EXISTS `ck_pagam` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descr` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descr` (`descr`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dump dei dati per la tabella `ck_pagam`
--

INSERT INTO `ck_pagam` (`id`, `descr`) VALUES
(2, '30 giorni data fattura'),
(5, '30 giorni fine mese'),
(3, '60 giorni data fattura'),
(6, '60 giorni fine mese'),
(4, '90 giorni data fattura'),
(7, '90 giorni fine mese'),
(1, 'rimessa diretta');

-- --------------------------------------------------------

--
-- Struttura della tabella `ck_spese`
--

CREATE TABLE IF NOT EXISTS `ck_spese` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descr` varchar(200) NOT NULL,
  `prezzo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descr` (`descr`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dump dei dati per la tabella `ck_spese`
--

INSERT INTO `ck_spese` (`id`, `descr`, `prezzo`) VALUES
(1, 'impianto stampa', 10),
(2, 'impianto stampa a caldo', 15),
(3, 'fustella', 20),
(4, 'telaio serigrafico', 25),
(5, 'spedizione', 5),
(6, 'contributo spedizioni', 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `clienti`
--

CREATE TABLE IF NOT EXISTS `clienti` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dump dei dati per la tabella `clienti`
--

INSERT INTO `clienti` (`id`, `nomeC`, `cognomeC`, `codC`, `indirizzoLC`, `cittaLC`, `capLC`, `provLC`, `telLC`, `faxLC`, `statoLC`, `emailLC`, `urlLC`, `indirizzoAC`, `cittaAC`, `capAC`, `provAC`, `telAC`, `cellAC`, `statoAC`, `emailAC`, `urlAC`, `PIVAC`, `CFC`, `IBANC`, `bancaC`, `descrC`, `noteC`, `reg_date`) VALUES
(1, 'Daniele', 'Irsuti', '001C1', 'via daniele', 'Danielopoli', 90100, 'PA', '091234567', '091234567', 'Italia', 'daniele@email.it', '', '', '', 0, '', '', '', '', '', '', 335252542525, '', '', 'Letto', 'Danielo', '', '2016-06-22 10:46:40'),
(2, 'Riccardo', 'Giordano', '002C2', 'via riccardo', 'Riccardopoli', 90100, 'PA', '091456789', '091456789', 'Italia', 'riccardo@email.it', 'riccardogiordano.space', '', '', 0, '', '', '', '', '', '', NULL, 'GRDRCR00A00G273A', 'IT3A89151651615615615615566', 'UniCredit Filiale Ficarazzi', 'Riccardo', '', '2016-06-22 10:44:33'),
(3, 'nome', 'cognome', '003C3', 'indirizzo', 'citta''', 12345, 'PR', '091408509', '12315151', 'stato', 'email@email.dom', 'urldimunch.it', 'indirizzo', 'citta''', 12345, 'PR', '12315151', '2147483647', 'stato', 'email@email.dom', 'urldimunch.it', 2147483647, 'fefrgreg45654tgr', '235235235345435435', 'banca', 'descrizione', 'note', '2016-06-06 09:40:36');

-- --------------------------------------------------------

--
-- Struttura della tabella `fornitori`
--

CREATE TABLE IF NOT EXISTS `fornitori` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dump dei dati per la tabella `fornitori`
--

INSERT INTO `fornitori` (`id`, `nomeF`, `cognomeF`, `codF`, `indirizzoLF`, `cittaLF`, `capLF`, `provLF`, `telLF`, `faxLF`, `statoLF`, `emailLF`, `urlLF`, `PIVAF`, `CFF`, `IBANF`, `bancaF`, `descrF`, `noteF`, `reg_date`) VALUES
(1, 'Fornitore', 'Di Prova', '001F2', 'via del fornitore', 'Sua Città', 12345, 'PR', '+39091123456', '+39091123456', 'Italia', 'suaemail@dom.it', 'url.web.dominio', 2147483647, 'CFFCCF55C155C152', '', 'Banca sua - Palermo', 'descrizione', '', '2016-06-22 15:29:38');

-- --------------------------------------------------------

--
-- Struttura della tabella `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `max_fatt` int(11) NOT NULL DEFAULT '20',
  `max_ndc` int(11) NOT NULL DEFAULT '20',
  `max_ddt` int(11) NOT NULL DEFAULT '20',
  `max_prev` int(11) NOT NULL DEFAULT '20',
  `max_clienti` int(11) NOT NULL DEFAULT '10',
  `max_fornitori` int(11) NOT NULL DEFAULT '10',
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `settings`
--

INSERT INTO `settings` (`id`, `max_fatt`, `max_ndc`, `max_ddt`, `max_prev`, `max_clienti`, `max_fornitori`, `id_user`) VALUES
(1, 20, 10, 20, 20, 30, 30, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `stampa_ddt`
--

CREATE TABLE IF NOT EXISTS `stampa_ddt` (
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
  `vettore` varchar(200) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `data_consegna` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `stampa_ddt`
--

INSERT INTO `stampa_ddt` (`id`, `data_doc`, `mezzo`, `cliente`, `Piva`, `cf`, `indirizzo`, `citta`, `prov`, `cap`, `causale`, `imballo`, `n_colli`, `peso`, `data_rit`, `arr_qta`, `arr_beni`, `arr_misure`, `vettore`, `note`, `data_consegna`) VALUES
(1, '2016-06-22', 'corriere', 'Daniele Irsuti', '335252542525', NULL, 'via daniele', 'Danielopoli', '', '', 'Vendita', '', 1, NULL, '2016-06-22 02:03:00', '1||1', 'piselli non surgelati||piselli surgelati Findus', NULL, NULL, 'dassdasadsadsad', '2016-06-03 01:02:00'),
(2, '2016-06-22', 'SDA, bagheria, cazzucazzu', 'Riccardo Giordano', 'GRDRCR00A00G273A', NULL, 'via riccardo', 'Riccardopoli', '', '', 'Vendita', 'Pacchi o scatoli', 1, NULL, '2016-06-10 01:02:00', '1', 'piselli non surgelati', NULL, NULL, 'Nessuna notaasdasas', '2016-06-09 01:02:00'),
(3, '2016-06-22', 'corriere', 'Daniele Irsuti', '335252542525', NULL, 'via daniele', 'Danielopoli', '', '', 'Vendita', 'Pacchi o scatoli', 1, NULL, '0000-00-00 00:00:00', '1', 'piselli surgelati Findus', NULL, NULL, 'Nessuna nota', '2016-06-22 01:01:00'),
(4, '2016-06-22', 'carico del mittente', 'Daniele Irsuti', '335252542525', NULL, 'via daniele', 'Danielopoli', '', '', 'Campionatura', 'Pacchi o scatoli', 1, NULL, '0000-00-00 00:00:00', '1', 'piselli surgelati Findus', NULL, NULL, 'Nessuna nota', '2016-06-22 01:01:00'),
(5, '2016-06-22', 'carico del mittente', 'Daniele Irsuti', '335252542525', NULL, 'via daniele', 'Danielopoli', '', '', 'Campionatura', 'Pacchi o scatoli', 1, 1, '0000-00-00 00:00:00', '1', 'piselli surgelati Findus', NULL, NULL, 'Nessuna nota', '2016-06-22 01:01:00'),
(6, '2016-06-22', 'carico del mittente', 'Daniele Irsuti', '335252542525', NULL, 'via daniele', 'Danielopoli', '', '', 'Campionatura', 'Pacchi o scatoli', 1, 1, '2016-06-03 02:02:00', '1', 'piselli surgelati Findus', NULL, NULL, 'Nessuna sadsdasdadsasadsdasdasad', '2016-06-22 01:01:00'),
(7, '2016-06-22', 'carico del mittente', 'Daniele Irsuti', '335252542525', NULL, 'via daniele', 'Danielopoli', '', '', 'Campionatura', 'Proprio dei beni', 1, 1, '2016-06-03 02:02:00', '1', 'piselli surgelati Findus', NULL, NULL, 'Nessuna notaasdsadsdasdasaddsaasdsdasaasd asdsas SUCA GIUSEPPE', '2016-06-22 01:01:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `stampa_fattura`
--

CREATE TABLE IF NOT EXISTS `stampa_fattura` (
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `stampa_fattura`
--

INSERT INTO `stampa_fattura` (`id`, `data_doc`, `pagamento`, `cliente`, `Piva`, `cf`, `indirizzo`, `citta`, `prov`, `cap`, `arr_qta`, `arr_beni`, `arr_misure`, `arr_imp_uni`, `arr_importo`, `tot_parziale`, `iva`, `tot_dovuto`, `esente_num`, `esente_dal`, `esente_al`) VALUES
(1, '2016-06-21', '30 giorni data fattura', 'Riccardo Giordano', 'GRDRCR00A00G273A', NULL, 'via riccardo', 'Riccardopoli', 'PA', '90010', '125||100', 'etichette sardine 10000pz||etichette sardine 20000pz', '120x30 mm||120x30 mm', '2||2', '250||200', 450.00, 22, 549.00, 0, '0000-00-00', '0000-00-00'),
(2, '2016-06-22', '30 giorni data fattura', 'Riccardo  Giordano', 'GRDRCR00A00G273A', NULL, 'via riccardo', 'Riccardopoli', 'PA', '90100', '1', 'Articolo ', NULL, '30.00', '30.00', 30.00, 0, 30.00, 1, '2016-06-07', '2016-06-18'),
(3, '2016-06-22', '30 giorni data fattura', 'Daniele  Irsuti', '335252542525', NULL, 'via daniele', 'Danielopoli', 'PA', '90100', '1.09', 'piselli surgelati Findus', NULL, '28.00', '30.52', 30.52, 10, 33.57, 1, '2016-06-22', '2016-06-22');

-- --------------------------------------------------------

--
-- Struttura della tabella `stampa_ndc`
--

CREATE TABLE IF NOT EXISTS `stampa_ndc` (
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `stampa_ndc`
--

INSERT INTO `stampa_ndc` (`id`, `data_doc`, `pagamento`, `cliente`, `Piva`, `cf`, `indirizzo`, `citta`, `prov`, `cap`, `arr_qta`, `arr_beni`, `arr_misure`, `arr_imp_uni`, `arr_importo`, `tot_parziale`, `iva`, `tot_dovuto`, `esente_num`, `esente_dal`, `esente_al`) VALUES
(1, '2016-06-21', '30 giorni data fattura', 'Riccardo Giordano', '', 'GRDRCR00A00G273A', 'via riccardo', 'Riccardopoli', 'PA', '90010', '125||100', 'etichette sardine 10000pz||etichette sardine 20000pz', '120x30 mm||120x30 mm', '2||2', '250||200', 450.00, 0, 450.00, 258, '2015-01-13', '2017-01-17');

-- --------------------------------------------------------

--
-- Struttura della tabella `stampa_preventivo`
--

CREATE TABLE IF NOT EXISTS `stampa_preventivo` (
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `stampa_preventivo`
--

INSERT INTO `stampa_preventivo` (`id`, `data_doc`, `pagamento`, `cliente`, `Piva`, `cf`, `indirizzo`, `citta`, `prov`, `cap`, `arr_qta`, `arr_beni`, `arr_misure`, `arr_imp_uni`, `arr_importo`, `tot_parziale`, `iva`, `tot_dovuto`) VALUES
(1, '2016-06-20', '30 giorni data fattura', 'Riccardo Giordano', '', 'GRDRCR00A00G273A', 'via riccardo', 'Riccardopoli', 'PA', '90010', '125||100', 'etichette sardine 10000pz||etichette sardine 20000pz', '120x30 mm||120x30 mm', '2||2', '250||200', 450.00, 10, 495.00);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipoLOG` varchar(10) NOT NULL,
  `userLOG` varchar(25) NOT NULL,
  `pswdLOG` varchar(25) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userLOG` (`userLOG`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `tipoLOG`, `userLOG`, `pswdLOG`, `reg_date`) VALUES
(1, 'Tecnico', 'Riccardo', 'diplo', '2016-06-06 09:37:37'),
(2, 'Operatore', 'Mattea', 'demo', '2016-06-06 09:37:46'),
(3, 'Tecnico', 'Daniele', 'diplo', '2016-06-06 09:37:54');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
