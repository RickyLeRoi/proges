-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Creato il: Lug 14, 2016 alle 13:47
-- Versione del server: 10.1.13-MariaDB
-- Versione PHP: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestionale_db`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `articoli`
--

CREATE TABLE `articoli` (
  `id` int(10) UNSIGNED NOT NULL,
  `cod_int` varchar(6) NOT NULL,
  `cliente` varchar(30) DEFAULT NULL,
  `descr` varchar(200) NOT NULL,
  `misura` varchar(50) DEFAULT NULL,
  `cod_barre` bigint(20) DEFAULT NULL,
  `prezzo` float(6,2) NOT NULL,
  `note` varchar(200) DEFAULT NULL,
  `tipologia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `articoli`
--

INSERT INTO `articoli` (`id`, `cod_int`, `cliente`, `descr`, `misura`, `cod_barre`, `prezzo`, `note`, `tipologia`) VALUES
(1, '0001', 'Flott Spa', 'cod.40402 Et. Flott Fil. Acc. Giras. 78g - fino a 25.000', '110x30 mm', 80315834, 11.64, '', 'Scaglione'),
(2, '0002', 'Flott Spa', 'cod.40402 Et. Flott Fil. Acc. Giras. 78g - fino a 50.000', '110x30 mm', 80315834, 10.71, '', 'Scaglione'),
(3, '0003', 'Gustibus Alimentari srl', 'Et. Le Nostre Stelle Salsa Pom. Datterino 360g (stampa a caldo) - fino a 30.000', '180x58 mm', 8017596070784, 24.00, '', 'Scaglione'),
(4, '0004', 'Flott Spa', 'cod.40402 Et. Flott Fil. Acc. Giras. 78g - fino a 18.000', '110x30 mm', 80315834, 210.00, '', 'Stock'),
(5, '0005', 'Flott Spa', 'cod.40402 Et. Flott Fil. Acc. Giras. 78g - fino a 75.000', '110x30 mm', 80315834, 9.73, '', 'Normale'),
(6, '0006', 'Flott Spa', 'cod.40402 Et. Flott Fil. Acc. Giras. 78g - fino a 100.000', '110x30 mm', 80315834, 8.75, '', 'Scaglione'),
(7, '0007', 'Flott Spa', 'cod.40402 Et. Flott Fil. Acc. Giras. 78g - fino a 170.000', '110x30 mm', 80315834, 8.00, '', 'Scaglione'),
(8, '0008', 'Flott Spa', 'cod.40402 Et. Flott Fil. Acc. Giras. 78g - fino a 250.000', '110x30 mm', 80315834, 7.14, '', 'Normale'),
(9, '0009', 'Gustibus Alimentari srl', 'Et. Le Nostre Stelle Salsa Pom. Datterino 360g (stampa a caldo) - fino a 50.000', '180x58 mm', 8017596070784, 21.50, '', 'Scaglione'),
(10, '0010', 'Gustibus Alimentari srl', 'Et. Le Nostre Stelle Salsa Pom. Datterino 360g (stampa a caldo) - fino a 100.000', '180x58 mm', 8017596070784, 17.80, '', 'Scaglione'),
(11, '0011', 'Gustibus Alimentari srl', 'Et. Le Nostre Stelle Salsa Pom. Datterino 360g (stampa a caldo) - fino a 200.000', '180x58 mm', 8017596070784, 14.80, '', 'Scaglione'),
(12, '0012', 'Iconsitt srl ', 'Et. adesive La perla Fil. Acc. Giras. 320g 2/4 - 6.000', '400x33 mm', 8009055000227, 380.00, '', 'Normale'),
(13, '0013', 'Iconsitt srl ', 'Et. adesive La perla Fil. Acc. Giras. 320g 2/4 - 1.000', '400x33 mm', 8009055000227, 150.00, '', 'Normale'),
(14, '0014', 'Iconsitt srl ', 'Et. adesive La perla Fil. Acc. Giras. 320g 2/4 - 4.000', '400x33 mm', 8009055000227, 300.00, '', 'Stock'),
(15, '0015', 'Iconsitt srl ', 'Et. adesive La perla Fil. Acc. Giras. 320g 2/4 - 10.000', '400x33 mm', 8009055000227, 500.00, '', 'Stock'),
(16, '0016', 'Iconsitt srl ', 'Et. Ponte Sisto Ansjosfileter Girasole 212g', '150x44 mm', 5704658001666, 200.00, '', 'Stock'),
(17, '0017', 'Iconsitt srl ', 'Et. Ponte Sisto Ansjosfileter Girasole 550g', '150x44 mm', 5704658001680, 200.00, '', 'Stock'),
(18, '0018', 'Flott Spa', 'Bollino Blu senza diciture', 'Ã˜ 50 mm', 0, 100.00, '', 'Stock'),
(19, '0019', 'Cantine Europa Soc. Coop. Agri', 'Et. Roceno Sibiliana Nero d''Avola 2015', '105x80 mm', 0, 52.00, '50.000', 'Scaglione'),
(20, '0020', 'Cantine Europa Soc. Coop. Agri', 'Retro Roceno Sibiliana Nero d''Avola 2015 75 cl', '80x80 mm', 8006188012806, 25.00, '50.000', 'Scaglione'),
(21, '0021', 'Cantine Europa Soc. Coop. Agri', 'Et. Roceno Sibiliana Frappato 2014', '105x80 mm', 0, 52.00, '50.000', 'Normale'),
(22, '0022', 'Cantine Europa Soc. Coop. Agri', 'Retro Roceno Sibiliana Frappato 2014 75 cl', '80x80 mm', 8006188012851, 25.00, '50.000', 'Scaglione'),
(23, '0023', 'Cantine Europa Soc. Coop. Agri', 'Et. Roceno Sibiliana Grillo 2015', '105x80 mm', 0, 52.00, '50.000', 'Scaglione'),
(24, '0024', 'Cantine Europa Soc. Coop. Agri', 'Retro Roceno Sibiliana Grillo 2015 75 cl', '80x80 mm', 8006188012868, 25.00, '50.000', 'Scaglione'),
(25, '0025', 'Cantine Europa Soc. Coop. Agri', 'Et. Roceno Sibiliana Grecanico 2015', '105x80 mm', 0, 52.00, '50.000', 'Scaglione'),
(26, '0026', 'Cantine Europa Soc. Coop. Agri', 'Retro Roceno Sibiliana Grecanico 2015 75 cl', '80x80 mm', 8006188012813, 25.00, '50.000', 'Scaglione'),
(27, '0027', 'F.lli Contorno srl', 'Et. La Bio Idea Concentrato di Pomodoro 200g - fino a 50.000', '150x44 mm', 8712153027125, 12.00, '', 'Scaglione'),
(28, '0028', 'F.lli Contorno srl', 'Et. La Bio Idea Concentrato di Pomodoro 200g - fino a 18.000', '150x44 mm', 8712153027125, 288.00, '', 'Stock'),
(29, '0029', 'F.lli Contorno srl', 'Et. La Bio Idea Concentrato di Pomodoro 200g - fino a 25.000', '150x44 mm', 8712153027125, 15.00, '', 'Scaglione'),
(30, '0030', 'F.lli Contorno srl', 'Et. La Bio Idea Concentrato di Pomodoro 200g - fino a 75.000', '150x44 mm', 8712753027125, 11.50, '', 'Scaglione'),
(31, '0031', 'F.lli Contorno srl', 'Et. La Bio Idea Concentrato di Pomodoro 200g - fino a 100.000', '150x44 mm', 8712753027125, 11.00, '', 'Scaglione'),
(32, '0032', 'Coop Sial', 'Et. Bio Rewe Market (carta termica)', '68x45 mm', 0, 800.00, '100.000', 'Stock'),
(33, '0033', 'Cantine Ivam srl', 'Et. Manta d''Oro Nero d''Avola Sicilia', '108x85 mm', 0, 500.00, '5.000-10.000', 'Stock'),
(34, '0034', 'Cantine Ivam srl', 'Retro Manta d''Oro Nero d''Avola Sicilia 75 cl (stampa a caldo)', '75x70 mm', 8002308007103, 500.00, '5.000-10.000', 'Stock'),
(35, '0035', 'F.lli Contorno srl', 'Et. La Bio Idea Concentrato di Pomodoro 100g - fino a 18.000', '140x32 mm', 8712153027118, 288.00, '', 'Stock'),
(36, '0036', 'F.lli Contorno srl', 'Et. La Bio Idea Concentrato di Pomodoro 100g - fino a 25.000', '140x32 mm', 8712153027118, 15.00, '', 'Scaglione'),
(37, '0037', 'F.lli Contorno srl', 'Et. La Bio Idea Concentrato di Pomodoro 100g - fino a 50.000', '140x32 mm', 8712153027118, 12.00, '', 'Scaglione'),
(38, '0038', 'F.lli Contorno srl', 'Et. La Bio Idea Concentrato di Pomodoro 100g - fino a 75.000', '140x32 mm', 8712153027118, 11.50, '', 'Scaglione'),
(39, '0039', 'F.lli Contorno srl', 'Et. La Bio Idea Concentrato di Pomodoro 100g - fino a 100.000', '140x32 mm', 8712153027118, 11.00, '', 'Scaglione'),
(40, '0040', 'Sicilmar srl', 'Et. Alpi Fil. Acc. Girasole (3 lingue)', '110x55 mm', 8004378000077, 310.00, '', 'Stock'),
(41, '0041', 'Cantine Settesoli s.c.a.', 'Et. Casale Burgio Appassimento Syrah (stampa a caldo+rilievo a secco) ', '101x100', 0, 55.00, '10.000-50.000', 'Normale'),
(42, '0042', 'Cantine Settesoli s.c.a.', 'Retro Casale Burgio Appassimento Syrah 2014 75 cl 14%', '130x100 mm', 8000254007109, 52.00, '10.000-50.000', 'Normale'),
(43, '0043', 'Agrit Conserve s.r.l.', 'Et. Le Nostre Stelle Salsa Pom. Datterino 350g (stampa a caldo) - fino a 30.000', '180x58 mm', 8017596070784, 24.00, '', 'Scaglione');

-- --------------------------------------------------------

--
-- Struttura della tabella `ck_causale`
--

CREATE TABLE `ck_causale` (
  `id` int(10) UNSIGNED NOT NULL,
  `descr` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `ck_imballo` (
  `id` int(10) UNSIGNED NOT NULL,
  `descr` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `ck_iva` (
  `id` int(10) UNSIGNED NOT NULL,
  `aliquota` int(11) NOT NULL,
  `descr` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `ck_mezzo` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `descr` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `ck_mezzo`
--

INSERT INTO `ck_mezzo` (`id`, `tipo`, `descr`) VALUES
(1, 'mittente', 'carico del mittente'),
(2, 'destinatario', 'carico del destinatario'),
(3, 'vettore', 'corriere'),
(4, 'corriere italia', 'Ki Bagheria SNC - Via E. Basile, 80 - 90011 Bagheria (Pa)'),
(5, 'corriere estero', 'DHL, bagheria, internazionali');

-- --------------------------------------------------------

--
-- Struttura della tabella `ck_pagam`
--

CREATE TABLE `ck_pagam` (
  `id` int(10) UNSIGNED NOT NULL,
  `descr` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `ck_spese` (
  `id` int(10) UNSIGNED NOT NULL,
  `descr` varchar(200) NOT NULL,
  `prezzo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `clienti` (
  `id` int(10) UNSIGNED NOT NULL,
  `nomeC` varchar(50) NOT NULL,
  `cognomeC` varchar(50) DEFAULT NULL,
  `codC` varchar(6) NOT NULL,
  `indirizzoLC` varchar(100) DEFAULT NULL,
  `cittaLC` varchar(50) DEFAULT NULL,
  `capLC` int(11) DEFAULT NULL,
  `provLC` varchar(4) DEFAULT NULL,
  `telLC` varchar(20) DEFAULT NULL,
  `faxLC` varchar(20) DEFAULT NULL,
  `statoLC` varchar(20) DEFAULT NULL,
  `emailLC` varchar(50) DEFAULT NULL,
  `urlLC` varchar(100) DEFAULT NULL,
  `indirizzoAC` varchar(100) DEFAULT NULL,
  `cittaAC` varchar(50) DEFAULT NULL,
  `capAC` int(11) DEFAULT NULL,
  `provAC` varchar(4) DEFAULT NULL,
  `telAC` varchar(20) DEFAULT NULL,
  `cellAC` varchar(20) DEFAULT NULL,
  `statoAC` varchar(20) DEFAULT NULL,
  `emailAC` varchar(50) DEFAULT NULL,
  `urlAC` varchar(100) DEFAULT NULL,
  `PIVAC` bigint(11) UNSIGNED ZEROFILL DEFAULT NULL,
  `CFC` varchar(20) DEFAULT NULL,
  `IBANC` varchar(30) DEFAULT NULL,
  `bancaC` varchar(100) DEFAULT NULL,
  `descrC` varchar(200) DEFAULT NULL,
  `noteC` varchar(200) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `clienti`
--

INSERT INTO `clienti` (`id`, `nomeC`, `cognomeC`, `codC`, `indirizzoLC`, `cittaLC`, `capLC`, `provLC`, `telLC`, `faxLC`, `statoLC`, `emailLC`, `urlLC`, `indirizzoAC`, `cittaAC`, `capAC`, `provAC`, `telAC`, `cellAC`, `statoAC`, `emailAC`, `urlAC`, `PIVAC`, `CFC`, `IBANC`, `bancaC`, `descrC`, `noteC`, `reg_date`) VALUES
(1, 'Flott Spa', '', '001', 'Via Olivuzza,5', 'Aspra', 90011, 'PA', '091928006', '0917724524', '', '', 'www.flottspa.it', 'Via Olivuzza,5', 'Aspra', 90011, 'PA', '', '', '', '', '', 02430630828, '', '', '', '60 gg data fattura', '', '2016-06-29 06:08:35'),
(2, 'Iconsitt srl', '', '002', 'Via G. D''Annunzio, 151', 'Aspra', 90011, '(PA)', '091955355', '', '', 'iconsitt@iconsitt.com', '', 'Viale S. Isidoro, 20', 'Aspra', 90011, '(PA)', '091956781', '', '', '', '', 05084810828, '', '', '', '60gg data fattura', '', '2016-06-28 12:01:48'),
(3, 'F.lli Contorno srl', '', '003', 'Via Gangitano,4', 'Palermo', 90123, '(PA)', '0916214023', '091391323', '', 'info@fratellicontorno.com', '', '', '', 0, '', '', '', '', '', '', 02443670829, '', '', '', '60gg data fattura', 'dichiarazione intenti n.5 fino al 31-12-2016', '2016-06-29 09:53:10'),
(4, 'Gustibus Alimentari srl', '', '004', 'Via G. Morgia, 9', 'Catania', 95127, 'CT', '0935951021', '', '', '', '', 'Contrada Milocca-Zona Industriale Dittaino I', 'Assoro', 94010, 'EN', '0935951021', '', '', '', '', 04683820874, '', '', '', '60 gg data fattura', '', '2016-06-28 15:17:40'),
(5, 'Rinascita Soc. Coop. s.r.l.', '', '005', 'Via Cadorna, 91', 'Valledolmo', 90029, 'PA', '0921766218', '', '', 'tommasoalessi@libero.it', '', 'C/da Rovittello', 'Sclafani Bagni', 90020, 'PA', '', '', '', '', '', 00694630823, '', '', '', '60 gg data fattura', '', '2016-06-28 15:36:36'),
(6, 'Eurofood srl', '', '006', 'Piazza San Giuseppe, 13', 'Capo d''Orlando', 98071, 'ME', '09419522', '', '', '', '', 'Piazza San Giuseppe, 13', 'Capo d''Orlando', 98071, 'ME', '09419522', '', '', '', '', 00524000833, '', '', '', '60 gg data fattura', 'dichiarazione intenti n.31 fino al 30-06-2016', '2016-06-29 09:53:41'),
(7, 'Balistreri Girolamo e C. s.n.c.', '', '007', 'Via Cotogni, 64', 'Aspra', 90011, 'PA', '091955612', '', '', '', '', 'Via Cotogni, 64', 'Aspra', 90011, 'PA', '091955612', '', '', '', '', 04731610822, '', '', '', '60 gg data fattura', '', '2016-06-29 06:13:10'),
(8, 'Agrit Conserve s.r.l.', '', '008', 'Contrada Strasattato', 'Vittoria', 97019, 'RG', '0932871277', '0932995039', '', 'amministrazione@agrit.it', '', 'Contrada Strasattato', 'Vittoria', 97019, 'RG', '0932871277', '', '', 'giovannicarfi@agrit.it', '', 00827420886, '', '', '', '60 gg data fattura', '', '2016-06-28 16:19:46'),
(9, 'Cantine Settesoli s.c.a.', '', '009', 'S.S. 115', 'Menfi', 92013, 'AG', '092577111', '', '', '', '', 'S.S. 115', 'Menfi', 92013, 'AG', '092577111', '', '', '', '', 00071330849, '', '', '', '60 gg data fattura', '', '2016-06-29 10:01:14'),
(11, 'Comal dei F.lli Fontana srl', '', '010', 'Viale Europa, 64/b', 'Villabate', 90039, 'PA', '091492892', '', '', 'comalsrl1@virgilio.it', '', 'Viale Europa, 64/b', 'Villabate', 90039, 'PA', '', '', '', '', '', 04756920825, '', '', '', '60 gg data fattura', '', '2016-06-29 16:42:02'),
(14, 'Cantine Europa Soc. Coop. Agricola', '', '012', 'Strada Statale 115 - Km 42 - Bivio Triglia-Scaletta', 'Petrosino', 91020, 'TP', '', '', '', '', '', 'Strada Statale 115 - Km 42 - Bivio Triglia-Scaletta', 'Petrosino', 91020, 'TP', '0923961632', '3207434860', '', '', '', 00060170818, '', '', '', '60 gg data fattura', '', '2016-07-07 10:48:03'),
(15, 'Coop Sial', '', '013', 'Via Cordova 11/13', 'Bagheria', 90011, 'PA', '091967486', '', '', '', '', 'Via Cordova 11/13', 'Bagheria', 90011, 'PA', '091967486', '', '', '', '', 03500320829, '', '', '', '30 gg data fattura', '', '2016-07-07 14:15:34'),
(16, 'Cantine Ivam srl', '', '014', 'Via Antonello da Messina ex area Pirelli - Lotto nÂ° 7', 'Villafranca Tirrena', 98049, 'ME', '', '', '', '', '', 'Via Antonello da Messina ex area Pirelli - Lotto nÂ° 7', 'Villafranca Tirrena', 98049, 'ME', '', '', '', '', '', 01638530830, '', '', '', '', '', '2016-07-07 14:25:51');

-- --------------------------------------------------------

--
-- Struttura della tabella `fornitori`
--

CREATE TABLE `fornitori` (
  `id` int(10) UNSIGNED NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `max_fatt` int(11) NOT NULL DEFAULT '20',
  `max_ndc` int(11) NOT NULL DEFAULT '20',
  `max_ddt` int(11) NOT NULL DEFAULT '20',
  `max_prev` int(11) NOT NULL DEFAULT '20',
  `max_clienti` int(11) NOT NULL DEFAULT '10',
  `max_fornitori` int(11) NOT NULL DEFAULT '10',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `stampa_ddt` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `citta_dest` varchar(200) DEFAULT NULL,
  `indirizzo_dest` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `stampa_ddt`
--

INSERT INTO `stampa_ddt` (`id`, `data_doc`, `mezzo`, `cliente`, `Piva`, `cf`, `indirizzo`, `citta`, `prov`, `cap`, `causale`, `imballo`, `n_colli`, `peso`, `data_rit`, `arr_qta`, `arr_beni`, `arr_misure`, `arr_imp_uni`, `vettore`, `note`, `data_consegna`, `arr_tipologia`, `citta_dest`, `indirizzo_dest`) VALUES
(283, '2016-07-04', 'Ki Bagheria SNC - Via E. Basile, 80 - 90011 Bagheria (Pa)', 'Gustibus Alimentari srl  ', '04683820874', NULL, 'Via G. Morgia, 9', 'Catania', '', '', 'Vendita', 'Pacchi o scatoli', 1, 0, '2016-07-04 18:00:00', '30000', 'Et. Le Nostre Stelle Salsa Pom. Datterino 360g (stampa a caldo) - fino a 30.000 - 180x58 mm', NULL, '24.00', 'Vettore', '', '0000-00-00 00:00:00', 'Scaglione', '', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `stampa_fattura`
--

CREATE TABLE `stampa_fattura` (
  `id` int(10) UNSIGNED NOT NULL,
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
(91, '0000-00-00', '', '', NULL, NULL, '', '', '', '', '', '', NULL, '', '', 0.00, 0, NULL, 0.00, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `stampa_ndc`
--

CREATE TABLE `stampa_ndc` (
  `id` int(10) UNSIGNED NOT NULL,
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
(1, '0000-00-00', '', '', NULL, NULL, '', '', '', '', '', '', NULL, '', '', 0.00, 0, NULL, 0.00, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `stampa_preventivo`
--

CREATE TABLE `stampa_preventivo` (
  `id` int(10) UNSIGNED NOT NULL,
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
(71, '0000-00-00', '', '', NULL, NULL, '', '', '', '', '', '', NULL, '', '', 0.00, 0, NULL, 0.00, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipoLOG` varchar(10) NOT NULL,
  `userLOG` varchar(25) NOT NULL,
  `pswdLOG` varchar(25) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `tipoLOG`, `userLOG`, `pswdLOG`, `reg_date`) VALUES
(1, 'Tecnico', 'Riccardo', 'diplo', '2016-06-06 09:37:37'),
(2, 'Operatore', 'Mattea', 'mattea09', '2016-06-27 16:12:01'),
(3, 'Tecnico', 'Daniele', 'diplo', '2016-06-06 09:37:54');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `articoli`
--
ALTER TABLE `articoli`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cod_int` (`cod_int`);

--
-- Indici per le tabelle `ck_causale`
--
ALTER TABLE `ck_causale`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `descr` (`descr`);

--
-- Indici per le tabelle `ck_imballo`
--
ALTER TABLE `ck_imballo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `descr` (`descr`);

--
-- Indici per le tabelle `ck_iva`
--
ALTER TABLE `ck_iva`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aliquota` (`aliquota`);

--
-- Indici per le tabelle `ck_mezzo`
--
ALTER TABLE `ck_mezzo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo` (`tipo`);

--
-- Indici per le tabelle `ck_pagam`
--
ALTER TABLE `ck_pagam`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `descr` (`descr`);

--
-- Indici per le tabelle `ck_spese`
--
ALTER TABLE `ck_spese`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `descr` (`descr`);

--
-- Indici per le tabelle `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codC` (`codC`,`PIVAC`);

--
-- Indici per le tabelle `fornitori`
--
ALTER TABLE `fornitori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codF` (`codF`,`PIVAF`);

--
-- Indici per le tabelle `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `stampa_ddt`
--
ALTER TABLE `stampa_ddt`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `stampa_fattura`
--
ALTER TABLE `stampa_fattura`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `stampa_ndc`
--
ALTER TABLE `stampa_ndc`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `stampa_preventivo`
--
ALTER TABLE `stampa_preventivo`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userLOG` (`userLOG`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `articoli`
--
ALTER TABLE `articoli`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT per la tabella `ck_causale`
--
ALTER TABLE `ck_causale`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT per la tabella `ck_imballo`
--
ALTER TABLE `ck_imballo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT per la tabella `ck_iva`
--
ALTER TABLE `ck_iva`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT per la tabella `ck_mezzo`
--
ALTER TABLE `ck_mezzo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT per la tabella `ck_pagam`
--
ALTER TABLE `ck_pagam`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT per la tabella `ck_spese`
--
ALTER TABLE `ck_spese`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT per la tabella `clienti`
--
ALTER TABLE `clienti`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT per la tabella `fornitori`
--
ALTER TABLE `fornitori`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
