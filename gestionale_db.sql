-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Giu 13, 2016 alle 19:59
-- Versione del server: 5.5.44-0+deb8u1
-- PHP Version: 5.6.20-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

INSERT INTO `articoli` (`id`, `cod_int`, `descr`, `misura`, `cod_barre`, `prezzo`, `note`) VALUES
(1, '001A1', 'Articolo ', '200cm', 52656264644, 30, '6'),
(2, '002A2', 'piselli surgelati Findus', '5 kg', 3215642361523, 28, 'sono duri'),
(3, '003A3', 'piselli non surgelati', 'enormi', 5453215632556, 426, 'piacciono a Daniele'),
(4, '004A4', 'etichette sardine 10000pz', '120x30 mm', 4545616121654, 2, 'fino a 10k pezzi'),
(5, '005A5', 'etichette sardine 20000pz', '120x30 mm', 4545616121654, 2, 'fino a 20k pezzi');

-- --------------------------------------------------------

INSERT INTO `ck_causale` (`id`, `descr`) VALUES
(3, 'campionatura'),
(1, 'conto vendita'),
(2, 'reso');

-- --------------------------------------------------------

INSERT INTO `ck_imballo` (`id`, `descr`) VALUES
(2, 'articoli in pedana'),
(3, 'aspetto proprio'),
(1, 'pacchi o scatole');

-- --------------------------------------------------------

INSERT INTO `ck_iva` (`id`, `aliquota`, `descr`) VALUES
(1, 22, 'aliquota ordinaria'),
(2, 10, 'aliquota ridotta'),
(3, 4, 'aliquota minima'),
(4, 0, 'dichiarazione intenti');

-- --------------------------------------------------------

INSERT INTO `ck_mezzo` (`id`, `tipo`, `descr`) VALUES
(1, 'mittente', 'carico del mittente'),
(2, 'destinatario', 'carico del destinatario'),
(3, 'vettore', 'corriere'),
(4, 'corriere italia', 'SDA, bagheria, cazzucazzu');

-- --------------------------------------------------------

INSERT INTO `ck_pagam` (`id`, `descr`) VALUES
(2, '30 giorni data fattura'),
(5, '30 giorni fine mese'),
(3, '60 giorni data fattura'),
(6, '60 giorni fine mese'),
(4, '90 giorni data fattura'),
(7, '90 giorni fine mese'),
(1, 'rimessa diretta');

-- --------------------------------------------------------

INSERT INTO `ck_spese` (`id`, `descr`, `prezzo`) VALUES
(1, 'impianto stampa', 10),
(2, 'impianto stampa a caldo', 15),
(3, 'fustella', 20),
(4, 'telaio serigrafico', 25),
(5, 'spedizione', 5),
(6, 'contributo spedizioni', 10);

-- --------------------------------------------------------

INSERT INTO `clienti` (`id`, `nomeC`, `cognomeC`, `codC`, `indirizzoLC`, `cittaLC`, `capLC`, `provLC`, `telLC`, `faxLC`, `statoLC`, `emailLC`, `urlLC`, `indirizzoAC`, `cittaAC`, `capAC`, `provAC`, `telAC`, `cellAC`, `statoAC`, `emailAC`, `urlAC`, `PIVAC`, `CFC`, `IBANC`, `bancaC`, `descrC`, `noteC`, `reg_date`) VALUES
(1, 'Daniele', 'Irsuti', '001C1', 'via daniele', 'Danielopoli', 90100, 'PA', '091234567', '091234567', 'Italia', 'daniele@email.it', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Letto', 'Danielo', NULL, '2016-06-06 09:40:36'),
(2, 'Riccardo', 'Giordano', '002C2', 'via riccardo', 'Riccardopoli', 90100, 'PA', '091456789', '091456789', 'Italia', 'riccardo@email.it', 'riccardogiordano.space', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRDRCR00A00G273A', 'IT3A89151651615615615615566', 'UniCredit Filiale Ficarazzi', 'Riccardo', NULL, '2016-06-06 09:40:36'),
(3, 'nome', 'cognome', '003C3', 'indirizzo', 'citta''', 12345, 'PR', '091408509', '12315151', 'stato', 'email@email.dom', 'urldimunch.it', 'indirizzo', 'citta''', 12345, 'PR', '12315151', '2147483647', 'stato', 'email@email.dom', 'urldimunch.it', 2147483647, 'fefrgreg45654tgr', '235235235345435435', 'banca', 'descrizione', 'note', '2016-06-06 09:40:36');

-- --------------------------------------------------------

INSERT INTO `fornitori` (`id`, `nomeF`, `cognomeF`, `codF`, `indirizzoLF`, `cittaLF`, `capLF`, `provLF`, `telLF`, `faxLF`, `statoLF`, `emailLF`, `urlLF`, `PIVAF`, `CFF`, `IBANF`, `bancaF`, `descrF`, `noteF`, `reg_date`) VALUES
(1, 'Fornitore', 'Di Prova', '001F1', 'via del fornitore', 'Sua Città', 12345, 'PR', '+39091123456', '+39091123456', 'Italia', 'suaemail@dom.it', 'url.web.dominio', 2147483647, 'CFFCCF55C155C151', '', 'Banca sua - Palermo', 'descrizione', NULL, '2016-06-06 09:41:43');

-- --------------------------------------------------------

INSERT INTO `settings` (`id`, `max_ddt`, `max_fatt`, `max_ndc`, `max_prev`, `max_clienti`, `max_fornitori`, `id_user`) VALUES
(1, 20, 20, 10, 20, 30, 30, 1);

-- --------------------------------------------------------

INSERT INTO `stampa_fattura` (`id`, `data_doc`, `pagamento`, `cliente`, `Piva`, `cf`, `indirizzo`, `citta`, `prov`, `cap`, `arr_qta`, `arr_beni`, `arr_misure`, `arr_imp_uni`, `arr_importo`, `tot_parziale`, `iva`, `tot_dovuto`, `esente_num`, `esente_dal`, `esente_al`) VALUES
(1, '18-06-2016', '30 giorni data fattura', 'Riccardo Giordano', '', 'GRDRCR00A00G273A', 'via riccardo', 'Riccardopoli', 'PA', 90010, '125||100', 'etichette sardine 10000pz||etichette sardine 20000pz', '120x30 mm||120x30 mm', '2||2', '250||200', 450, 10, 495, '', '', '');

-- --------------------------------------------------------

INSERT INTO `stampa_ddt` (`id`, `data_doc`, `mezzo`, `cliente`, `Piva`, `cf`, `indirizzo`, `citta`, `prov`, `cap`, `causale`, `imballo`, `n_colli`, `peso`, `data_rit`, `arr_qta`, `arr_beni`, `arr_misure`, `vettore`, `note`) VALUES
(1, '18-06-2016', 'destinatario', 'Riccardo Giordano', '', 'GRDRCR00A00G273A', 'via riccardo', 'Riccardopoli', 'PA', 90010, 'conto vendita', 'aspetto proprio', 2, 5, '19-06-2016', '125||100', 'etichette sardine 10000pz||etichette sardine 20000pz', '120x30 mm||120x30 mm', '', '');

-- --------------------------------------------------------

INSERT INTO `stampa_preventivo` (`id`, `data_doc`, `pagamento`, `cliente`, `Piva`, `cf`, `indirizzo`, `citta`, `prov`, `cap`, `arr_qta`, `arr_beni`, `arr_misure`, `arr_imp_uni`, `arr_importo`, `tot_parziale`, `iva`, `tot_dovuto`) VALUES
(1, '18-06-2016', '30 giorni data fattura', 'Riccardo Giordano', '', 'GRDRCR00A00G273A', 'via riccardo', 'Riccardopoli', 'PA', 90010, '125||100', 'etichette sardine 10000pz||etichette sardine 20000pz', '120x30 mm||120x30 mm', '2||2', '250||200', 450, 10, 495);

-- --------------------------------------------------------

INSERT INTO `stampa_ndc` (`id`, `data_doc`, `pagamento`, `cliente`, `Piva`, `cf`, `indirizzo`, `citta`, `prov`, `cap`, `arr_qta`, `arr_beni`, `arr_misure`, `arr_imp_uni`, `arr_importo`, `tot_parziale`, `iva`, `tot_dovuto`, `esente_num`, `esente_dal`, `esente_al`) VALUES
(1, '18-06-2016', '30 giorni data fattura', 'Riccardo Giordano', '', 'GRDRCR00A00G273A', 'via riccardo', 'Riccardopoli', 'PA', 90010, '125||100', 'etichette sardine 10000pz||etichette sardine 20000pz', '120x30 mm||120x30 mm', '2||2', '250||200', 450, 10, 495, '', '', '');

-- --------------------------------------------------------

INSERT INTO `users` (`id`, `tipoLOG`, `userLOG`, `pswdLOG`, `reg_date`) VALUES
(1, 'Tecnico', 'Riccardo', 'diplo', '2016-06-06 09:37:37'),
(2, 'Operatore', 'Mattea', 'demo', '2016-06-06 09:37:46'),
(3, 'Tecnico', 'Daniele', 'diplo', '2016-06-06 09:37:54');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
