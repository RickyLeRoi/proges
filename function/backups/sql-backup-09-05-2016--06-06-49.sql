-- Database: `gestionalo` --
-- Table `articoli` --
CREATE TABLE `articoli` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `cod_int` varchar(6) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descr` varchar(100) DEFAULT NULL,
  `cod_barre` bigint(30) NOT NULL,
  `prezzo` int(5) DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cod_barre` (`cod_barre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Table `causale` --
CREATE TABLE `causale` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  `descr` varchar(100) DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipo` (`tipo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Table `clienti` --
CREATE TABLE `clienti` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `nomeC` varchar(40) NOT NULL,
  `cognomeC` varchar(20) DEFAULT NULL,
  `codC` varchar(4) NOT NULL,
  `descrC` varchar(100) DEFAULT NULL,
  `noteC` varchar(100) DEFAULT NULL,
  `indirizzoLC` varchar(50) DEFAULT NULL,
  `cittaLC` varchar(20) DEFAULT NULL,
  `capLC` int(5) DEFAULT NULL,
  `provLC` varchar(2) DEFAULT NULL,
  `telLC` varchar(16) DEFAULT NULL,
  `faxLC` varchar(16) DEFAULT NULL,
  `statoLC` varchar(30) DEFAULT NULL,
  `emailLC` varchar(40) DEFAULT NULL,
  `urlLC` varchar(100) DEFAULT NULL,
  `indirizzoAC` varchar(50) DEFAULT NULL,
  `cittaAC` varchar(20) DEFAULT NULL,
  `capAC` int(5) DEFAULT NULL,
  `provAC` varchar(2) DEFAULT NULL,
  `telAC` varchar(16) DEFAULT NULL,
  `cellAC` int(11) DEFAULT NULL,
  `statoAC` varchar(30) DEFAULT NULL,
  `emailAC` varchar(40) DEFAULT NULL,
  `urlAC` varchar(100) DEFAULT NULL,
  `PIVAC` int(11) DEFAULT NULL,
  `CFC` varchar(16) DEFAULT NULL,
  `IBANC` varchar(27) DEFAULT NULL,
  `bancaC` varchar(100) DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codC` (`codC`,`emailAC`,`PIVAC`,`CFC`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `clienti` (`id`, `nomeC`, `cognomeC`, `codC`, `descrC`, `noteC`, `indirizzoLC`, `cittaLC`, `capLC`, `provLC`, `telLC`, `faxLC`, `statoLC`, `emailLC`, `urlLC`, `indirizzoAC`, `cittaAC`, `capAC`, `provAC`, `telAC`, `cellAC`, `statoAC`, `emailAC`, `urlAC`, `PIVAC`, `CFC`, `IBANC`, `bancaC`, `reg_date`) VALUES
(1, 'Daniele', 'Irsuti', 'asd', 'asddasasd', 'asdasdasd', 'asdasd', 'asdasdasdasd', , 'as', '', 'asdasdasd', 'asdasdasd', 'asdasdasd', 'asdasasdasa', 'asdasdas', 'asdasdas', , '', '', , '', '', '', , '', '', 'asd', '');

-- Table `fornitori` --
CREATE TABLE `fornitori` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `nomeF` varchar(40) NOT NULL,
  `cognomeF` varchar(20) DEFAULT NULL,
  `codF` varchar(4) NOT NULL,
  `descrF` varchar(100) DEFAULT NULL,
  `noteF` varchar(100) DEFAULT NULL,
  `indirizzoLF` varchar(50) DEFAULT NULL,
  `cittaLF` varchar(20) DEFAULT NULL,
  `capLF` int(5) DEFAULT NULL,
  `provLF` varchar(2) DEFAULT NULL,
  `telLF` varchar(16) DEFAULT NULL,
  `faxLF` varchar(16) DEFAULT NULL,
  `statoLF` varchar(30) DEFAULT NULL,
  `emailLF` varchar(40) DEFAULT NULL,
  `urlLF` varchar(100) DEFAULT NULL,
  `PIVAF` int(11) DEFAULT NULL,
  `CFF` varchar(16) DEFAULT NULL,
  `IBANF` varchar(27) DEFAULT NULL,
  `bancaF` varchar(100) DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codF` (`codF`,`emailLF`,`PIVAF`,`CFF`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Table `imballo` --
CREATE TABLE `imballo` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  `descr` varchar(100) DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipo` (`tipo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Table `iva` --
CREATE TABLE `iva` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `aliquota` int(3) NOT NULL,
  `descr` varchar(100) DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Table `login` --
CREATE TABLE `login` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `tipoLOG` varchar(9) NOT NULL,
  `userLOG` varchar(20) NOT NULL,
  `pswdLOG` varchar(10) DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userLOG` (`userLOG`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `login` (`id`, `tipoLOG`, `userLOG`, `pswdLOG`, `reg_date`) VALUES
(1, 'Tecnico', 'daniele', '0808', '');

-- Table `mezzo` --
CREATE TABLE `mezzo` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  `descr` varchar(100) DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipo` (`tipo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Table `numerazione_ddt` --
CREATE TABLE `numerazione_ddt` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `reg_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Table `numerazione_ftt` --
CREATE TABLE `numerazione_ftt` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `reg_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Table `numerazione_ndc` --
CREATE TABLE `numerazione_ndc` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `reg_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Table `numerazione_p` --
CREATE TABLE `numerazione_p` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `reg_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Table `pagam` --
CREATE TABLE `pagam` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  `descr` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipo` (`tipo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Table `preventivo` --
CREATE TABLE `preventivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_destinatario` int(11) NOT NULL,
  `id_ordine` int(11) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `preventivo` (`id`, `id_destinatario`, `id_ordine`, `data`) VALUES
(1, 1, 1, '2016-05-06');

-- Table `preventivo_articoli` --
CREATE TABLE `preventivo_articoli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_prodotto` int(11) NOT NULL,
  `quantita` int(11) NOT NULL DEFAULT '1',
  `id_preventivo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `preventivo_articoli_id_preventivo_uindex` (`id_preventivo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Table `sp_agg` --
CREATE TABLE `sp_agg` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  `prezzo` int(5) NOT NULL,
  `descr` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipo` (`tipo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

