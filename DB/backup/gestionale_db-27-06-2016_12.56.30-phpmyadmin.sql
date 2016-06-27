-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Giu 27, 2016 alle 12:55
-- Versione del server: 5.5.44-0+deb8u1
-- PHP Version: 5.6.22-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gestionale_db`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `articoli`
--

CREATE TABLE IF NOT EXISTS `articoli` (
`id` int(10) unsigned NOT NULL,
  `cod_int` varchar(6) NOT NULL,
  `cliente` varchar(30) DEFAULT NULL,
  `descr` varchar(200) NOT NULL,
  `misura` varchar(50) DEFAULT NULL,
  `cod_barre` bigint(20) DEFAULT NULL,
  `prezzo` float(6,2) NOT NULL,
  `note` varchar(200) DEFAULT NULL,
  `tipologia` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `articoli`
--

INSERT INTO `articoli` (`id`, `cod_int`, `cliente`, `descr`, `misura`, `cod_barre`, `prezzo`, `note`, `tipologia`) VALUES
(1, '001', 'FLOTT', 'et. FLOTT filetti di acciughe girasole 78g - 10000pz', '110x30 mm', 80315834, 210.80, 'acciughe', 'Stock'),
(2, '002', 'FLOTT', 'et. FLOTT vongole naturali 130g', '141x50 mm', 80315835, 273.80, '', 'Normale'),
(3, '001A', 'FLOTT', 'et. FLOTT filetti di acciughe girasole 78g - fino a 18000pz', '110x30 mm', 80315834, 210.80, '', 'Stock'),
(4, '001B', 'FLOTT', 'et. FLOTT filetti di acciughe girasole 78g - fino a 25000pz', '110x30 mm', 80315834, 11.64, '', 'Scaglione'),
(5, '001C', 'FLOTT', 'et. FLOTT filetti di acciughe girasole 78g - fino a 50000pz', '110x30 mm', 80315834, 10.80, '', 'Scaglione'),
(6, '003', 'ICONSITT', 'etichette La Perla 80gr - 10000pz', '76 x 28 mm', 561415515158, 200.00, '', 'Stock'),
(7, '004', 'COOP. RINASCITA', 'etichette TOP Esselunga - salsa 410gr - fino a 10000pz', '210x60 mm', 587584784, 630.00, '', 'Stock');

-- --------------------------------------------------------

--
-- Struttura della tabella `ck_causale`
--

CREATE TABLE IF NOT EXISTS `ck_causale` (
`id` int(10) unsigned NOT NULL,
  `descr` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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
`id` int(10) unsigned NOT NULL,
  `descr` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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
`id` int(10) unsigned NOT NULL,
  `aliquota` int(11) NOT NULL,
  `descr` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

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
`id` int(10) unsigned NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `descr` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `ck_mezzo`
--

INSERT INTO `ck_mezzo` (`id`, `tipo`, `descr`) VALUES
(1, 'mittente', 'carico del mittente'),
(2, 'destinatario', 'carico del destinatario'),
(3, 'vettore', 'corriere'),
(4, 'corriere italia', 'SDA, bagheria, nazionali'),
(5, 'corriere estero', 'DHL, bagheria, internazionali');

-- --------------------------------------------------------

--
-- Struttura della tabella `ck_pagam`
--

CREATE TABLE IF NOT EXISTS `ck_pagam` (
`id` int(10) unsigned NOT NULL,
  `descr` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

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
`id` int(10) unsigned NOT NULL,
  `descr` varchar(200) NOT NULL,
  `prezzo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

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
`id` int(10) unsigned NOT NULL,
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
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `clienti`
--

INSERT INTO `clienti` (`id`, `nomeC`, `cognomeC`, `codC`, `indirizzoLC`, `cittaLC`, `capLC`, `provLC`, `telLC`, `faxLC`, `statoLC`, `emailLC`, `urlLC`, `indirizzoAC`, `cittaAC`, `capAC`, `provAC`, `telAC`, `cellAC`, `statoAC`, `emailAC`, `urlAC`, `PIVAC`, `CFC`, `IBANC`, `bancaC`, `descrC`, `noteC`, `reg_date`) VALUES
(1, 'Daniele', 'Irsuti', '001C1', 'via daniele', 'Danielopoli', 90100, 'PA', '091234567', '091234567', 'Italia', 'daniele@email.it', '', '', '', 0, '', '', '', '', '', '', 335252542525, '', '', 'Letto', 'Danielo', '', '2016-06-22 10:46:40'),
(2, 'Riccardo', 'Giordano', '002C2', 'via riccardo', 'Riccardopoli', 90100, 'PA', '091456789', '091456789', 'Italia', 'riccardo@email.it', 'riccardogiordano.space', '', '', 0, '', '', '', '', '', '', NULL, 'GRDRCR00A00G273A', 'IT3A89151651615615615615566', 'UniCredit Filiale Ficarazzi', 'Riccardo', '', '2016-06-22 10:44:33'),
(3, 'nome', 'cognome', '003C3', 'indirizzo', 'citta''', 12345, 'PR', '091408509', '12315151', 'stato', 'email@email.dom', 'urldimunch.it', 'indirizzo', 'citta''', 12345, 'PR', '12315151', '2147483647', 'stato', 'email@email.dom', 'urldimunch.it', 2147483647, 'fefrgreg45654tgr', '235235235345435435', 'banca', 'descrizione', 'note', '2016-06-06 09:40:36'),
(4, 'Marco', 'P', '004C4', 'via sua', 'Ficarazzi', 90010, 'PA', '091992255', '', 'Italia', 'marco.p@email.it', '', '', '', 0, '', '', '', '', '', '', 76767898927676735, 'frfrccv456456vc15r', 'it84z4548945615648456', 'sella palermo', 'nipote', '', '2016-06-26 10:45:46');

-- --------------------------------------------------------

--
-- Struttura della tabella `fornitori`
--

CREATE TABLE IF NOT EXISTS `fornitori` (
`id` int(10) unsigned NOT NULL,
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
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `fornitori`
--

INSERT INTO `fornitori` (`id`, `nomeF`, `cognomeF`, `codF`, `indirizzoLF`, `cittaLF`, `capLF`, `provLF`, `telLF`, `faxLF`, `statoLF`, `emailLF`, `urlLF`, `PIVAF`, `CFF`, `IBANF`, `bancaF`, `descrF`, `noteF`, `reg_date`) VALUES
(3, '', 'Fornitore X', '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', '', '', '2016-06-27 09:38:13');

-- --------------------------------------------------------

--
-- Struttura della tabella `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
`id` int(10) unsigned NOT NULL,
  `max_fatt` int(11) NOT NULL DEFAULT '20',
  `max_ndc` int(11) NOT NULL DEFAULT '20',
  `max_ddt` int(11) NOT NULL DEFAULT '20',
  `max_prev` int(11) NOT NULL DEFAULT '20',
  `max_clienti` int(11) NOT NULL DEFAULT '10',
  `max_fornitori` int(11) NOT NULL DEFAULT '10',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `settings`
--

INSERT INTO `settings` (`id`, `max_fatt`, `max_ndc`, `max_ddt`, `max_prev`, `max_clienti`, `max_fornitori`, `id_user`) VALUES
(1, 10, 10, 10, 10, 10, 10, 1),
(2, 30, 20, 30, 30, 30, 20, 3),
(3, 20, 20, 20, 20, 20, 20, 2);

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
  `arr_imp_uni` longtext NOT NULL,
  `vettore` varchar(200) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `data_consegna` datetime DEFAULT NULL,
  `arr_tipologia` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `stampa_ddt`
--

INSERT INTO `stampa_ddt` (`id`, `data_doc`, `mezzo`, `cliente`, `Piva`, `cf`, `indirizzo`, `citta`, `prov`, `cap`, `causale`, `imballo`, `n_colli`, `peso`, `data_rit`, `arr_qta`, `arr_beni`, `arr_misure`, `arr_imp_uni`, `vettore`, `note`, `data_consegna`, `arr_tipologia`) VALUES
(1, '2016-06-22', 'corriere', 'Daniele Irsuti', '335252542525', NULL, 'via daniele', 'Danielopoli', '', '', 'Vendita', '', 1, NULL, '2016-06-22 02:03:00', '1||1', 'piselli non surgelati||piselli surgelati Findus', NULL, '426||28', NULL, 'dassdasadsadsad', '2016-06-03 01:02:00', NULL),
(2, '2016-06-22', 'SDA, bagheria, cazzucazzu', 'Riccardo Giordano', 'GRDRCR00A00G273A', NULL, 'via riccardo', 'Riccardopoli', '', '', 'Vendita', 'Pacchi o scatoli', 1, NULL, '2016-06-10 01:02:00', '1', 'piselli non surgelati', NULL, '426', NULL, 'Nessuna notaasdasas', '2016-06-09 01:02:00', NULL),
(3, '2016-06-23', 'SDA, bagheria, cazzucazzu', 'Riccardo Giordano', 'GRDRCR00A00G273A', NULL, 'via riccardo', 'Riccardopoli', '', '', 'Reso', 'Proprio dei beni', 5, 2, '0000-00-00 00:00:00', '6', 'Articolo  - 200cm', NULL, '13', 'Vettore', '', '2016-06-23 16:45:00', NULL),
(4, '2016-06-07', 'SDA, bagheria, nazionali', 'Daniele Irsuti', '335252542525', NULL, 'via daniele', 'Danielopoli', '', '', 'Campionatura', 'Pacchi o scatoli', 1, 2, '2016-06-17 01:02:00', '1||1||1', 'et. FLOTT filetti di acciughe girasole 78g - fino a 18000pz - 110x30 mm||et. FLOTT vongole naturali 130g - 141x50 mm||et. FLOTT filetti di acciughe girasole 78g - 10000pz - 110x30 mm', NULL, '210.80||273.80||210.80', 'Vettore', 'asd', '2016-06-10 04:04:00', '||Stock||Normale'),
(7, '2016-06-23', 'carico del mittente', 'Riccardo Giordano', 'GRDRCR00A00G273A', NULL, 'via riccardo', 'Riccardopoli', '', '', 'Campionatura', 'Proprio dei beni', 4, 1, '2016-06-23 01:01:00', '1', 'piselli surgelati Findus - 5 kg', NULL, '28.00', 'Vettore', 'aadsds', '2016-06-23 01:02:00', NULL),
(8, '2016-06-23', 'corriere', 'Riccardo Giordano', 'GRDRCR00A00G273A', NULL, 'via riccardo', 'Riccardopoli', '', '', 'Reso', 'Pedana', 2, 1, '2016-06-30 15:14:00', '1||1||1', 'Articolo  - 200cm||piselli surgelati Findus - 5 kg||etichette sardine 10000pz - 120x30 mm', NULL, '30.00||28.00||2.00', 'Vettore', '', '2016-06-23 23:12:00', NULL),
(9, '2016-06-23', 'carico del mittente', 'Riccardo Giordano', 'GRDRCR00A00G273A', NULL, 'via riccardo', 'Riccardopoli', '', '', 'Campionatura', 'Pedana', 2, 1, '2016-06-30 04:04:00', '5', 'etichette sardine 10000pz - 120x30 mm', NULL, '2.00', '', 'bau', '2016-06-23 23:04:00', NULL),
(10, '2016-06-23', 'carico del mittente', 'Riccardo Giordano', 'GRDRCR00A00G273A', NULL, 'via riccardo', 'Riccardopoli', '', '', 'Campionatura', 'Pedana', 2, 1, '2016-06-30 04:04:00', '5', 'etichette sardine 10000pz - 120x30 mm', NULL, '2.00', 'Destinatario', 'bau', '2016-06-23 23:04:00', NULL),
(11, '2016-06-23', 'carico del mittente', 'ND Girgrg', '123456789010', NULL, 'Viale vabe', 'PO', '', '', 'Vendita', 'Pacchi o scatoli', 1, 2, '2016-06-22 05:05:00', '1', 'piselli non surgelati - enormi', NULL, '426.00', 'Destinatario', 'a', '2016-06-11 04:04:00', NULL),
(12, '2016-06-23', 'carico del mittente', 'ND Girgrg', '123456789010', NULL, 'Viale vabe', 'PO', '', '', 'Reso', 'Pacchi o scatoli', 3, 2, '0000-00-00 00:00:00', '1', 'Articolo  - 200cm', NULL, '30.00', '', '', '2016-06-08 12:02:00', NULL),
(13, '2016-06-23', 'carico del mittente', 'ND Girgrg', '123456789010', NULL, 'Viale vabe', 'PO', '', '', 'Reso', 'Pacchi o scatoli', 3, 2, '0000-00-00 00:00:00', '2', 'Articolo  - 200cm', NULL, '30.00', 'Mittente', '', '0000-00-00 00:00:00', NULL),
(14, '2016-06-25', 'SDA, bagheria, cazzucazzu', 'Daniele Irsuti', '335252542525', NULL, 'via daniele', 'Danielopoli', '', '', 'Campionatura', 'Pedana', 1, 2, '0000-00-00 00:00:00', '1', 'Articolo  - 200cm', NULL, '30.00', 'Vettore', '', '0000-00-00 00:00:00', NULL),
(15, '2016-06-25', 'carico del mittente', 'Riccardo Giordano', 'GRDRCR00A00G273A', NULL, 'via riccardo', 'Riccardopoli', '', '', 'Vendita', 'Pacchi o scatoli', 1, 10, '0000-00-00 00:00:00', '10001', 'et. FLOTT filetti di acciughe girasole 78g - 10000pz - 110x30 mm', NULL, '210.80', 'Destinatario', 'cazzu cazzu', '0000-00-00 00:00:00', NULL),
(18, '2016-06-25', 'carico del mittente', 'Riccardo Giordano', 'GRDRCR00A00G273A', NULL, 'via riccardo', 'Riccardopoli', '', '', 'Vendita', 'Pacchi o scatoli', 1, 1, '2016-06-08 01:01:00', '5', 'et. FLOTT filetti di acciughe girasole 78g - fino a 18000pz - 110x30 mm', NULL, '210.80', 'Destinatario', 'a', '2016-06-25 01:01:00', 'Scaglione'),
(19, '2016-06-25', 'SDA, bagheria, nazionali', 'Daniele Irsuti', '335252542525', NULL, 'via daniele', 'Danielopoli', '', '', 'Vendita', 'Pedana', 2, 1, '0000-00-00 00:00:00', '1', 'et. FLOTT filetti di acciughe girasole 78g - fino a 18000pz - 110x30 mm', NULL, '210.80', 'Vettore', '', '0000-00-00 00:00:00', NULL),
(26, '2016-06-25', 'carico del mittente', '', '', NULL, '', '', '', '', 'Vendita', 'Pacchi o scatoli', 0, 0, '0000-00-00 00:00:00', '', '', NULL, '', '', '', '0000-00-00 00:00:00', NULL),
(27, '2016-06-25', 'carico del mittente', '', '', NULL, '', '', '', '', 'Vendita', 'Pacchi o scatoli', 0, 0, '0000-00-00 00:00:00', '', '', NULL, '', 'Vettore', '', '0000-00-00 00:00:00', NULL),
(28, '2016-06-25', 'carico del mittente', '', '', NULL, '', '', '', '', 'Vendita', 'Pacchi o scatoli', 0, 0, '0000-00-00 00:00:00', '', '', NULL, '', '', '', '0000-00-00 00:00:00', NULL),
(29, '2016-06-25', 'carico del mittente', 'Daniele Irsuti', '335252542525', NULL, 'via daniele', 'Danielopoli', '', '', 'Campionatura', 'Pacchi o scatoli', 1, 4, '0000-00-00 00:00:00', '1||4||1||1||1', 'et. FLOTT filetti di acciughe girasole 78g - fino a 18000pz - 110x30 mm||etichette La Perla 80gr - 10000pz - 76 x 28 mm||et. FLOTT filetti di acciughe girasole 78g - fino a 25000pz - 110x30 mm||et. FLOTT vongole naturali 130g - 141x50 mm||et. FLOTT filetti di acciughe girasole 78g - 10000pz - 110x30 mm', NULL, '210.80||200.00||11.64||273.80||210.80', 'Destinatario', 'asdasdasd', '2016-06-25 01:01:00', 'Stock||Stock||Scaglione||Normale||Stock'),
(30, '2016-06-26', 'SDA, bagheria, nazionali', 'Daniele Irsuti', '335252542525', NULL, 'via daniele', 'Danielopoli', '', '', 'Vendita', 'Pacchi o scatoli', 1, 5, '2016-06-26 12:55:00', '50000', 'et. FLOTT filetti di acciughe girasole 78g - fino a 50000pz - 110x30 mm', NULL, '10.80', 'Vettore', 'proviamole', '0000-00-00 00:00:00', 'Scaglione'),
(31, '2016-06-26', 'SDA, bagheria, nazionali', '', '', NULL, '', '', '', '', 'Vendita', 'Pacchi o scatoli', 0, 0, '2016-06-26 11:25:00', '', '', NULL, '', 'Vettore', '', '0000-00-00 00:00:00', ''),
(32, '2016-06-27', 'carico del mittente', '', '', NULL, '', '', '', '', 'Vendita', 'Pacchi o scatoli', 0, 0, '0000-00-00 00:00:00', '', '', NULL, '', '', '', '0000-00-00 00:00:00', ''),
(33, '2016-06-27', 'carico del mittente', 'Daniele Irsuti', '335252542525', NULL, 'via daniele', 'Danielopoli', '', '', 'Vendita', 'Pacchi o scatoli', 0, 0, '0000-00-00 00:00:00', '', '', NULL, '', '', '', '0000-00-00 00:00:00', ''),
(34, '2016-06-27', 'carico del mittente', 'Daniele Irsuti', '335252542525', NULL, 'via daniele', 'Danielopoli', '', '', 'Vendita', 'Pacchi o scatoli', 0, 0, '0000-00-00 00:00:00', '1', 'etichette TOP Esselunga - salsa 410gr - fino a 10000pz - 210x60 mm', NULL, '630.00', '', '', '0000-00-00 00:00:00', 'Stock'),
(35, '2016-06-27', 'carico del mittente', 'Daniele Irsuti', '335252542525', NULL, 'via daniele', 'Danielopoli', '', '', 'Vendita', 'Pacchi o scatoli', 0, 0, '0000-00-00 00:00:00', '1', 'etichette TOP Esselunga - salsa 410gr - fino a 10000pz - 210x60 mm', NULL, '630.00', '', '', '0000-00-00 00:00:00', 'Stock'),
(36, '2016-06-27', 'carico del mittente', 'Daniele Irsuti', '335252542525', NULL, 'via daniele', 'Danielopoli', '', '', 'Vendita', 'Pacchi o scatoli', 0, 0, '0000-00-00 00:00:00', '1', 'etichette TOP Esselunga - salsa 410gr - fino a 10000pz - 210x60 mm', NULL, '630.00', '', '', '0000-00-00 00:00:00', 'Stock'),
(37, '2016-06-27', 'carico del mittente', 'Daniele Irsuti', '335252542525', NULL, 'via daniele', 'Danielopoli', '', '', 'Vendita', 'Pacchi o scatoli', 0, 0, '0000-00-00 00:00:00', '1', 'etichette TOP Esselunga - salsa 410gr - fino a 10000pz - 210x60 mm', NULL, '630.00', '', '', '0000-00-00 00:00:00', 'Stock'),
(38, '2016-06-27', 'SDA, bagheria, nazionali', 'Riccardo Giordano', 'GRDRCR00A00G273A', NULL, 'via riccardo', 'Riccardopoli', '', '', 'Campionatura', 'Pacchi o scatoli', 5, 3, '0000-00-00 00:00:00', '1||1||1||1||1||1||1', 'et. FLOTT filetti di acciughe girasole 78g - 10000pz - 110x30 mm||et. FLOTT vongole naturali 130g - 141x50 mm||et. FLOTT filetti di acciughe girasole 78g - fino a 18000pz - 110x30 mm||et. FLOTT filetti di acciughe girasole 78g - fino a 25000pz - 110x30 mm||et. FLOTT filetti di acciughe girasole 78g - fino a 50000pz - 110x30 mm||etichette La Perla 80gr - 10000pz - 76 x 28 mm||etichette TOP Esselunga - salsa 410gr - fino a 10000pz - 210x60 mm', NULL, '210.80||273.80||210.80||11.64||10.80||200.00||630.00', 'Vettore', '', '0000-00-00 00:00:00', 'Stock||Normale||Stock||Scaglione||Scaglione||Stock||Stock');

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
  `note` text,
  `tot_dovuto` float(10,2) NOT NULL,
  `esente_num` int(11) DEFAULT NULL,
  `esente_dal` date DEFAULT NULL,
  `all_ddt` text,
  `esente_al` date DEFAULT NULL,
  `tipologia` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `stampa_fattura`
--

INSERT INTO `stampa_fattura` (`id`, `data_doc`, `pagamento`, `cliente`, `Piva`, `cf`, `indirizzo`, `citta`, `prov`, `cap`, `arr_qta`, `arr_beni`, `arr_misure`, `arr_imp_uni`, `arr_importo`, `tot_parziale`, `iva`, `note`, `tot_dovuto`, `esente_num`, `esente_dal`, `all_ddt`, `esente_al`, `tipologia`) VALUES
(1, '2016-06-23', '60 giorni fine mese', 'Riccardo  Giordano', 'GRDRCR00A00G273A', NULL, 'via riccardo', 'Riccardopoli', 'PA', '90100', '1||1||548', 'Articolo ||piselli non surgelati||etichette sardine 10000pz', NULL, '30.00||426.00||2.00', '30.00||426.00||1096.00', 1552.00, 0, '', 1552.00, 3, '2015-06-23', '', '2016-06-24', NULL),
(2, '2016-06-23', '60 giorni fine mese', 'Riccardo  Giordano', 'GRDRCR00A00G273A', NULL, 'via riccardo', 'Riccardopoli', 'PA', '90100', '1||1||548', 'Articolo ||piselli non surgelati||etichette sardine 10000pz', NULL, '30.00||426.00||2.00', '30.00||426.00||1096.00', 1552.00, 0, '', 1552.00, 3, '2015-06-23', '', '2016-06-24', NULL),
(3, '2016-06-23', '30 giorni data fattura', 'Daniele  Irsuti', '335252542525', NULL, 'via daniele', 'Danielopoli', 'PA', '90100', '4||1', 'piselli surgelati Findus - 5 kg||etichette sardine 20000pz - 120x30 mm', NULL, '28.00||2.00', '112.00||2.00', 114.00, 22, '', 139.08, 1, '2016-06-23', '', '2016-06-23', NULL),
(4, '2016-06-23', '30 giorni data fattura', 'ND  Girgrg', '123456789010', NULL, 'Viale vabe', 'PO', 'PA', '90100', '1', 'piselli surgelati Findus - 5 kg', NULL, '28.00', '28.00', 28.00, 0, '', 28.00, 1, '2016-06-23', '', '2016-06-19', NULL),
(5, '2016-06-24', '30 giorni data fattura', 'Daniele  Irsuti', '335252542525', NULL, 'via daniele', 'Danielopoli', 'PA', '90100', '1||1||1||1', 'piselli surgelati Findus - 5 kg||etichette sardine 20000pz - 120x30 mm||piselli surgelati Findus - 5 kg||piselli non surgelati - enormi', NULL, '28.00||2.00||28.00||426.00', '28.00||2.00||28.00||426.00', 1016.00, 4, '', 1056.64, 1, '2016-06-24', '3,1', '2016-06-24', NULL),
(6, '2016-06-24', '30 giorni data fattura', 'Riccardo  Giordano', 'GRDRCR00A00G273A', NULL, 'via riccardo', 'Riccardopoli', 'PA', '90100', '1', 'Articolo  - 200cm', NULL, '30.00', '30.00', 484.00, 22, '', 590.48, 1, '2016-06-24', '1', '2016-06-24', NULL),
(7, '2016-06-24', '90 giorni data fattura', 'Riccardo  Giordano', 'GRDRCR00A00G273A', NULL, 'via riccardo', 'Riccardopoli', 'PA', '90100', '1', 'Articolo  - 200cm', NULL, '30.00', '30.00', 484.00, 22, '', 590.48, 1, '2016-06-24', '1', '2016-06-24', NULL),
(8, '2016-06-25', '60 giorni fine mese', 'Riccardo  Giordano', 'GRDRCR00A00G273A', NULL, 'via riccardo', 'Riccardopoli', 'PA', '90100', '1||1', 'piselli surgelati Findus - 5 kg||etichette sardine 20000pz - 120x30 mm', NULL, '28.00||2.00', '28.00||2.00', 910.00, 22, '', 1110.20, 1, '2016-06-25', '1,2', '2016-06-25', NULL),
(9, '2016-06-25', '30 giorni data fattura', 'Daniele  Irsuti', '335252542525', NULL, 'via daniele', 'Danielopoli', 'PA', '90100', '', '', NULL, '', '', 454.00, 22, '', 553.88, 1, '2016-06-25', '1', '2016-06-25', NULL),
(10, '2016-06-25', '30 giorni data fattura', '335252542525', 'via daniele', NULL, 'Danielopoli', 'PA', '454.0', '90100', '', '', NULL, '', '', 40.00, 22, '', 48.80, 1, '2016-06-25', '10,12', '2016-06-25', NULL),
(11, '2016-06-25', '30 giorni data fattura', 'Riccardo  Giordano', 'GRDRCR00A00G273A', NULL, 'via riccardo', 'Riccardopoli', 'PA', '90100', '', '', NULL, '', '', 30.00, 22, '', 36.60, 1, '2016-06-25', '12', '2016-06-25', NULL),
(12, '2016-06-25', '60 giorni fine mese', 'Daniele  Irsuti', '335252542525', NULL, 'via daniele', 'Danielopoli', 'PA', '90100', '19999', 'etichette sardine 20000pz - 120x30 mm', NULL, '2.00', '39998.00', 40058.00, 0, '', 40058.00, 21, '2016-06-24', '13', '2016-06-26', NULL),
(13, '2016-06-25', '30 giorni data fattura', 'Riccardo  Giordano', 'GRDRCR00A00G273A', NULL, 'via riccardo', 'Riccardopoli', 'PA', '90100', '1', 'piselli surgelati Findus - 5 kg', NULL, '28.00', '28.00', 38.00, 22, '', 46.36, 1, '2016-06-25', '10', '2016-06-25', NULL),
(14, '2016-06-25', '30 giorni data fattura', 'Riccardo  Giordano', 'GRDRCR00A00G273A', NULL, 'via riccardo', 'Riccardopoli', 'PA', '90100', '1', 'etichette sardine 10000pz - 120x30 mm', NULL, '2.00', '2.00', 854.00, 22, '', 1041.88, 1, '2016-06-25', '11,2', '2016-06-25', NULL),
(15, '2016-06-25', '30 giorni data fattura', 'GRDRCR00A00G273A', 'via riccardo', NULL, 'Riccardopoli', 'PA', '854.0', '90100', '1', 'Articolo  - 200cm', NULL, '30.00', '30.00', 456.00, 22, '', 556.32, 1, '2016-06-25', '11', '2016-06-25', NULL),
(16, '2016-06-25', '30 giorni data fattura', 'Riccardo  Giordano', 'GRDRCR00A00G273A', NULL, 'via riccardo', 'Riccardopoli', 'PA', '90100', '1', 'piselli surgelati Findus - 5 kg', NULL, '28.00', '28.00', 28.00, 22, '', 34.16, 1, '2016-06-25', '', '2016-06-25', NULL),
(17, '2016-06-25', '30 giorni data fattura', 'Riccardo  Giordano', 'GRDRCR00A00G273A', NULL, 'via riccardo', 'Riccardopoli', 'PA', '90100', '36000', 'et. FLOTT filetti di acciughe girasole 78g - fino a 50000pz - 110x30 mm', NULL, '0.01080', '388.80', 388.80, 22, '', 474.34, 1, '2016-06-25', '', '2016-06-25', NULL),
(18, '2016-06-25', '30 giorni data fattura', 'Riccardo  Giordano', 'GRDRCR00A00G273A', NULL, 'via riccardo', 'Riccardopoli', 'PA', '90100', '1', 'et. FLOTT filetti di acciughe girasole 78g - fino a 18000pz - 110x30 mm', NULL, '210.80', '210.80', 240.80, 22, '', 293.78, 1, '2016-06-25', '14', '2016-06-25', NULL),
(19, '2016-06-26', '30 giorni data fattura', 'Riccardo  Giordano', 'GRDRCR00A00G273A', NULL, 'via riccardo', 'Riccardopoli', 'PA', '90100', '1||1||1', 'etichette TOP Esselunga - salsa 410gr - fino a 10000pz - 210x60 mm||et. FLOTT filetti di acciughe girasole 78g - fino a 50000pz - 110x30 mm||et. FLOTT filetti di acciughe girasole 78g - fino a 18000pz - 110x30 mm', NULL, '630.00||10.80||210.80', '630.00||0.01||210.80', 840.81, 22, '', 1025.79, 1, '2016-06-26', '', '2016-06-26', 'Stock||Scaglione||Stock'),
(20, '2016-06-26', '30 giorni data fattura', '', '', NULL, '', '', '', '', '1', 'etichette La Perla 80gr - 10000pz - 76 x 28 mm', NULL, '200.00', '200.00', 200.00, 0, '', 200.00, 1, '2016-06-26', '', '2016-06-26', 'Stock');

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
  `note` text,
  `tot_dovuto` float(10,2) NOT NULL,
  `esente_num` int(11) DEFAULT NULL,
  `esente_dal` date DEFAULT NULL,
  `esente_al` date DEFAULT NULL,
  `arr_tipologia` longtext,
  `doc_fatt` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `stampa_ndc`
--

INSERT INTO `stampa_ndc` (`id`, `data_doc`, `pagamento`, `cliente`, `Piva`, `cf`, `indirizzo`, `citta`, `prov`, `cap`, `arr_qta`, `arr_beni`, `arr_misure`, `arr_imp_uni`, `arr_importo`, `tot_parziale`, `iva`, `note`, `tot_dovuto`, `esente_num`, `esente_dal`, `esente_al`, `arr_tipologia`, `doc_fatt`) VALUES
(1, '2016-06-21', '30 giorni data fattura', 'Riccardo Giordano', '', 'GRDRCR00A00G273A', 'via riccardo', 'Riccardopoli', 'PA', '90010', '125||100', 'etichette sardine 10000pz||etichette sardine 20000pz', '120x30 mm||120x30 mm', '2||2', '250||200', 450.00, 0, '', 450.00, 258, '2015-01-13', '2017-01-17', NULL, NULL),
(2, '2016-06-26', '30 giorni data fattura', 'Riccardo  Giordano', 'GRDRCR00A00G273A', NULL, 'via riccardo', 'Riccardopoli', 'PA', '90100', '1000', 'et. FLOTT filetti di acciughe girasole 78g - fino a 25000pz - 110x30 mm', NULL, '11.64', '11.64', 11.64, 0, '', 11.64, 1, '2016-06-26', '2016-06-26', NULL, NULL),
(3, '2016-06-26', '30 giorni data fattura', 'Riccardo  Giordano', 'GRDRCR00A00G273A', NULL, 'via riccardo', 'Riccardopoli', 'PA', '90100', '1||11', 'et. FLOTT filetti di acciughe girasole 78g - fino a 25000pz - 110x30 mm||et. FLOTT filetti di acciughe girasole 78g - fino a 18000pz - 110x30 mm', NULL, '11.64||210.80', '0.01||210.80', 210.81, 0, '', 210.81, 1, '2016-06-26', '2016-06-26', 'Scaglione||Stock', '5,4'),
(4, '2016-06-26', '30 giorni data fattura', 'Daniele  Irsuti', '335252542525', NULL, 'via daniele', 'Danielopoli', 'PA', '90100', '1', 'et. FLOTT filetti di acciughe girasole 78g - 10000pz - 110x30 mm', NULL, '210.80', '210.80', 210.80, 4, '', 219.23, 1, '2016-06-26', '2016-06-26', 'Stock', '4');

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
  `note` text,
  `tot_dovuto` float(10,2) NOT NULL,
  `tipologia` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `stampa_preventivo`
--

INSERT INTO `stampa_preventivo` (`id`, `data_doc`, `pagamento`, `cliente`, `Piva`, `cf`, `indirizzo`, `citta`, `prov`, `cap`, `arr_qta`, `arr_beni`, `arr_misure`, `arr_imp_uni`, `arr_importo`, `tot_parziale`, `iva`, `note`, `tot_dovuto`, `tipologia`) VALUES
(1, '2016-06-20', '30 giorni data fattura', 'Riccardo Giordano', '', 'GRDRCR00A00G273A', 'via riccardo', 'Riccardopoli', 'PA', '90010', '125||100', 'etichette sardine 10000pz||etichette sardine 20000pz', '120x30 mm||120x30 mm', '2||2', '250||200', 450.00, 10, '', 495.00, NULL),
(2, '2016-06-26', '60 giorni fine mese', 'Marco  P', '76767898927676735', NULL, 'via sua', 'Ficarazzi', 'PA', '90010', '1', 'et. FLOTT filetti di acciughe girasole 78g - fino a 18000pz - 110x30 mm', NULL, '210.80', '210.80', 210.80, 10, '', 231.88, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `tipoLOG` varchar(10) NOT NULL,
  `userLOG` varchar(25) NOT NULL,
  `pswdLOG` varchar(25) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `tipoLOG`, `userLOG`, `pswdLOG`, `reg_date`) VALUES
(1, 'Tecnico', 'Riccardo', 'diplo', '2016-06-06 09:37:37'),
(2, 'Operatore', 'Mattea', 'demo', '2016-06-06 09:37:46'),
(3, 'Tecnico', 'Daniele', 'diplo', '2016-06-06 09:37:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articoli`
--
ALTER TABLE `articoli`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `cod_int` (`cod_int`);

--
-- Indexes for table `ck_causale`
--
ALTER TABLE `ck_causale`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `descr` (`descr`);

--
-- Indexes for table `ck_imballo`
--
ALTER TABLE `ck_imballo`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `descr` (`descr`);

--
-- Indexes for table `ck_iva`
--
ALTER TABLE `ck_iva`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `aliquota` (`aliquota`);

--
-- Indexes for table `ck_mezzo`
--
ALTER TABLE `ck_mezzo`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `tipo` (`tipo`);

--
-- Indexes for table `ck_pagam`
--
ALTER TABLE `ck_pagam`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `descr` (`descr`);

--
-- Indexes for table `ck_spese`
--
ALTER TABLE `ck_spese`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `descr` (`descr`);

--
-- Indexes for table `clienti`
--
ALTER TABLE `clienti`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `codC` (`codC`,`PIVAC`);

--
-- Indexes for table `fornitori`
--
ALTER TABLE `fornitori`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `codF` (`codF`,`PIVAF`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stampa_ddt`
--
ALTER TABLE `stampa_ddt`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stampa_fattura`
--
ALTER TABLE `stampa_fattura`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stampa_ndc`
--
ALTER TABLE `stampa_ndc`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stampa_preventivo`
--
ALTER TABLE `stampa_preventivo`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `userLOG` (`userLOG`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articoli`
--
ALTER TABLE `articoli`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `ck_causale`
--
ALTER TABLE `ck_causale`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ck_imballo`
--
ALTER TABLE `ck_imballo`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ck_iva`
--
ALTER TABLE `ck_iva`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ck_mezzo`
--
ALTER TABLE `ck_mezzo`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ck_pagam`
--
ALTER TABLE `ck_pagam`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ck_spese`
--
ALTER TABLE `ck_spese`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `clienti`
--
ALTER TABLE `clienti`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `fornitori`
--
ALTER TABLE `fornitori`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
