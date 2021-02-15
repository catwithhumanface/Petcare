-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- 생성 시간: 20-12-12 17:04
-- 서버 버전: 5.7.31
-- PHP 버전: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `petcare`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `appartenir`
--

DROP TABLE IF EXISTS `appartenir`;
CREATE TABLE IF NOT EXISTS `appartenir` (
  `IDC` int(4) NOT NULL,
  `IDCHEN` varchar(4) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`IDC`,`IDCHEN`),
  KEY `FK_A_R` (`IDCHEN`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 테이블 구조 `carnets`
--

DROP TABLE IF EXISTS `carnets`;
CREATE TABLE IF NOT EXISTS `carnets` (
  `IDCAR` int(4) NOT NULL,
  `CALLERGIES` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `CARVACC` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `CARMAL` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `CARALIM` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `CARQTEALIM` int(4) NOT NULL,
  `CARINFOSIMP` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `IDC` int(4) NOT NULL,
  PRIMARY KEY (`IDCAR`),
  KEY `FK_CAR_C` (`IDC`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 테이블 구조 `chenils`
--

DROP TABLE IF EXISTS `chenils`;
CREATE TABLE IF NOT EXISTS `chenils` (
  `IDCHEN` int(4) NOT NULL,
  `CHENNOM` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `CHENADR` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `CHENTEL` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `CHENMAIL` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `CHENSW` varchar(400) COLLATE utf8mb4_bin DEFAULT NULL,
  `CHENEVAL` varchar(5) COLLATE utf8mb4_bin DEFAULT NULL,
  `CHENETAT` varchar(7) COLLATE utf8mb4_bin NOT NULL,
  `CHENPIC` varchar(400) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`IDCHEN`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 테이블의 덤프 데이터 `chenils`
--

INSERT INTO `chenils` (`IDCHEN`, `CHENNOM`, `CHENADR`, `CHENTEL`, `CHENMAIL`, `CHENSW`, `CHENEVAL`, `CHENETAT`, `CHENPIC`) VALUES
(1, 'animascool', 'Toulouse', '06.50.50.74.26', '', 'https://www.animascool.com/', 'dispo', '', 'assets/service/pension1.jpg'),
(2, 'berger allemand du val d’esquein', 'lieu dit \"Bergès\" 31310 Gouzens', '06.12.86.32.54 fixe/05.61.97.95.64', 'elevage.valdesquein@orange.fr', 'http://www.bergerallemand-duvaldesquein.com/index.php', 'dispo', '', 'assets/service/pension2.jpg'),
(3, 'centre canin du haut de l’arize', 'LIEU DIT MAURERE \n31310 GOUZENS', '05 61 97 25 87 / 06 11 49 64 89 / 06 32 06 01 01', 'contact@centrecanin31.com', 'https://www.centrecanin31.com/pension-canine-haute-garonne-8', 'dispo', '', 'assets/service/pension3.jpg'),
(4, 'chen’isle marin casties', 'Labrande', '05 61 98 59 04', '', '', 'dispo', '', 'assets/service/pension4.jpg'),
(5, 'chenil du jagan', '1029 route Launac\n31330 GRENADE', '07 69 21 08 79', 'contact@pensiondujagan.fr', 'http://www.pensiondujagan.fr/', 'dispo', '', 'assets/service/pension5.jpg'),
(6, 'chenil l’orée du bois', 'Chemin de Ratalens 31240 Saint-Jean', '05 61 74 21 47', '', 'http://chenilloreedubois.e-monsite.com/', 'dispo', '', 'assets/service/pension6.jpg'),
(7, 'complexe canin et félin des wallabies', '60 route de Montastruc \n31380 Paulhac', '05.61.84.23.58', 'contact@complexe-canin-wallabies.com', 'https://www.complexe-canin-wallabies.com/pension-pour-chien-paulhac', 'dispo', '', 'assets/service/pension7.jpg'),
(8, 'de la forêt noir et feu', 'Route de Revel - lieu dit Lasserre, 31460 CARAMAN', '06 46 13 49 75', '', 'https://www.elevage-pension-canine31.com/', 'dispo', '', 'assets/service/pension8.jpg'),
(9, 'domaine du coustalats', '230 Chemin du Baraillan 31210 Montréjeau', '06 47 91 60 56', '', 'https://www.domaine-coustalats.com/', 'dispo', '', 'assets/service/pension9.jpg'),
(10, 'la bonne patte', 'Chemin de Ribéremont 31440 Fronsac', '05 61 79 65 63', 'mar-yse@hotmail.fr', 'http://labonnepatte.fr/?lien=presentation', 'dispo', '', 'assets/service/pension10.jpg'),
(11, 'la source aux perdrix', '340 Impasse de la tuilerie \n31220 Mondavezan', '05 61 90 33 59', '', 'https://www.facebook.com/Pension-pour-chiens-La-Source-aux-Perdrix-644330862370544/?ref=page_internal&_rdc=1&_rdr', 'dispo', '', 'assets/service/pension11.jpg'),
(12, 'le domaine de cocagne', 'lieu dit Naples\n31330 LE BURGAUD', '05 62 22 16 50 / 06 29 99 29 01', '', 'https://www.le-site-de.com/le-domaine-de-cocagne-burgaud-le-_216208.html', 'dispo', '', 'assets/service/pension12.jpg'),
(13, 'le grand cèdre', 'Lieu dit Bacheyre ,\n2144 route de Castelnau Picampeau\n31430 Le fousseret', '05.61.98.38.73', 'legrandcedre@gmail.com', 'http://pension-le-grand-cedre.com/', 'dispo', '', 'assets/service/pension13.jpg'),
(14, 'les anges gardiens', '793 chemin des Turques, 31660 BESSIERES', '05 61 99 08 95 / 06 15 10 11 73', 'anges.camille@gmail.com, cedriclebail@gmail.com', 'http://lesangesgardiens.eu/index.php/pension-canine/', 'dispo', '', 'assets/service/pension14.jpg'),
(15, 'ma truffe au soleil', '80, Rte de la Gare, La Calotte 31190 Miremont', '06.61.47.98.15', 'pension.matruffe@gmail.com', 'http://www.matruffeausoleil.fr/#filter=.home', 'dispo', '', 'assets/service/pension15.jpg'),
(16, 'occitanis', 'LA BARRIERE, 31250 REVEL', '05 34 65 67 83', 'direction@occicanis.com', 'https://www.occicanis.com/', 'dispo', '', 'assets/service/pension16.jpg'),
(17, 'pension des arnaudas', 'Arnaudas, 31470 Saint-Thomas', '05.34.47.11.45', '', 'http://www.pension-les-arnaudas.fr/', 'dispo', '', 'assets/service/pension17.jpg'),
(18, 'pension en sigol', 'En sigol, 31460 Auriac-sur-Vendinelle', '06.81.87.56.52', '', 'https://www.soins-animal.com/fr/pensions/org/470/pension-en-sigol/auriac-sur-vendinelle#description', 'dispo', '', 'assets/service/pension18.jpg'),
(19, 'pension malause', '31570 SAINTE FOY D\'AIGREFEUILLE', '05 61 83 71 76', '', 'http://www.pensiondemalause.com/', 'dispo', '', 'assets/service/pension19.jpg'),
(20, 'wolff.d-concept', 'Ferme de Bordeneuve Lieu dit \"Rivière de l\'Hers\" 31450 DEYME', '07 69 57 46 31', 'wolff-dominique2@orange.fr', 'https://www.wolff-academy.com/wolff-academy-wolff-d-concept-wolff-d-concept-pension-55', 'dispo', '', 'assets/service/pension20.jpg');

-- --------------------------------------------------------

--
-- 테이블 구조 `chiens`
--

DROP TABLE IF EXISTS `chiens`;
CREATE TABLE IF NOT EXISTS `chiens` (
  `IDC` int(4) NOT NULL AUTO_INCREMENT,
  `CNOM` varchar(25) COLLATE utf8mb4_bin DEFAULT NULL,
  `CSEXE` varchar(7) COLLATE utf8mb4_bin NOT NULL,
  `CTAILLE` int(4) DEFAULT NULL,
  `CPOIDS` int(4) DEFAULT NULL,
  `CAGE` int(4) NOT NULL,
  `CDN` date DEFAULT NULL,
  `CHAB` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `CCAR` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `IDU` int(4) DEFAULT NULL,
  `IDCAR` int(4) DEFAULT NULL,
  `id_client` int(11) NOT NULL,
  `IDR` int(11) NOT NULL,
  PRIMARY KEY (`IDC`),
  KEY `I_C_C` (`IDC`),
  KEY `I_C_U` (`IDU`),
  KEY `I_C_CAR` (`IDCAR`),
  KEY `id_client` (`id_client`),
  KEY `IDR` (`IDR`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 테이블의 덤프 데이터 `chiens`
--

INSERT INTO `chiens` (`IDC`, `CNOM`, `CSEXE`, `CTAILLE`, `CPOIDS`, `CAGE`, `CDN`, `CHAB`, `CCAR`, `IDU`, `IDCAR`, `id_client`, `IDR`) VALUES
(1, 'Sam', 'M', 70, 20, 10, '2010-11-09', NULL, NULL, NULL, NULL, 2, 2),
(2, 'Pick', 'M', 70, 20, 5, '2015-11-03', NULL, NULL, NULL, NULL, 3, 4);

-- --------------------------------------------------------

--
-- 테이블 구조 `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(255) NOT NULL,
  `prenom_client` varchar(255) NOT NULL,
  `tel_client` varchar(255) NOT NULL,
  `mail_client` varchar(255) NOT NULL,
  `password_client` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL,
  `adresse_client` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_client`),
  KEY `id_role` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `prenom_client`, `tel_client`, `mail_client`, `password_client`, `id_role`, `adresse_client`, `photo`) VALUES
(1, 'Bah', 'Maimouna', '076-008-5360', 'bah@gmail.com', '123456789', 1, NULL, NULL),
(2, 'Cailler', 'Dylan', '076-008-5080', 'cailler@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, NULL, NULL),
(3, 'Sall', 'Baba', '076-006-6732', 'sall@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 1, NULL, NULL),
(4, 'a', 'a', '000-000-0000', 'a@a.com', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 1, NULL, NULL),
(5, 'nom', 'prenom', '111-111-1111', 'c@c.com', 'a59e375e7e163c060ec5103e61f24bf008661a68', 1, NULL, NULL),
(6, 'nom', 'prenom', '000-000-0000', 'd@d.com', '1eb0f77975621f26a4f73c83a66a7b3d6effd3c1', 1, NULL, NULL),
(7, 'aa', 'bbb', '000-000-0000', 'e@e.com', '637a81ed8e8217bb01c15c67c39b43b0ab4e20f1', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `demandes`
--

DROP TABLE IF EXISTS `demandes`;
CREATE TABLE IF NOT EXISTS `demandes` (
  `IDD` int(4) NOT NULL AUTO_INCREMENT,
  `DATED` date NOT NULL,
  `NBJOURS` int(4) NOT NULL,
  `TEXTED` varchar(256) COLLATE utf8mb4_bin DEFAULT NULL,
  `id_client` int(11) NOT NULL,
  `id_gardien` int(11) NOT NULL,
  PRIMARY KEY (`IDD`),
  KEY `id_client` (`id_client`),
  KEY `id_gardien` (`id_gardien`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 테이블의 덤프 데이터 `demandes`
--

INSERT INTO `demandes` (`IDD`, `DATED`, `NBJOURS`, `TEXTED`, `id_client`, `id_gardien`) VALUES
(3, '2020-12-21', 2, 'Merci de bien prendre soin de lui  ', 2, 1),
(4, '2020-12-06', 1, 'Bonjour Mr Sall, Je vous confie mon chien Y. Merci de bien prendre soin de lui  ', 3, 2);

-- --------------------------------------------------------

--
-- 테이블 구조 `garder`
--

DROP TABLE IF EXISTS `garder`;
CREATE TABLE IF NOT EXISTS `garder` (
  `IDC` int(4) NOT NULL,
  `IDGP` int(4) NOT NULL,
  PRIMARY KEY (`IDC`,`IDGP`),
  KEY `I_G_GP` (`IDGP`),
  KEY `I_G_C` (`IDC`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 테이블 구조 `gardien`
--

DROP TABLE IF EXISTS `gardien`;
CREATE TABLE IF NOT EXISTS `gardien` (
  `id_gardien` int(11) NOT NULL AUTO_INCREMENT,
  `nom_gardien` varchar(255) NOT NULL,
  `prenom_gardien` varchar(255) NOT NULL,
  `mail_gardien` varchar(255) NOT NULL,
  `num_rue_gardien` int(11) NOT NULL,
  `code_postal_gardien` varchar(255) NOT NULL,
  `nom_voie_gardien` varchar(255) NOT NULL,
  `Tel_gardien` varchar(255) NOT NULL,
  `genre_gardien` varchar(255) NOT NULL,
  `password_gardien` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL,
  `GPPIC` varchar(255) DEFAULT 'assets/gardienspart/gardien1.jpg',
  `GPEVAL` int(4) DEFAULT '0',
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_gardien`),
  KEY `id_role` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `gardien`
--

INSERT INTO `gardien` (`id_gardien`, `nom_gardien`, `prenom_gardien`, `mail_gardien`, `num_rue_gardien`, `code_postal_gardien`, `nom_voie_gardien`, `Tel_gardien`, `genre_gardien`, `password_gardien`, `id_role`, `GPPIC`, `GPEVAL`, `photo`) VALUES
(1, 'Bah', 'Maimouna', 'mouna@gmail.com', 17, '31400', 'Avenue du Colonel Roche', '076-008-5360', 'Femme', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 2, 'assets/gardienspart/gardien1.jpg', 0, NULL),
(2, 'Bah', 'Nando', 'nando@gmail.com', 23, '31400', 'Rue jacqueline Auriole', '076-008-5360', 'Homme', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 2, 'assets/gardienspart/gardien1.jpg', 0, NULL),
(3, 'aaa', 'aaa', 'b@b.com', 2, '11111', 'aa', '111-111-1111', 'Femme', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 2, 'assets/gardienspart/gardien1.jpg', 0, NULL),
(4, 'nom', 'prenom', 'cc@c.com', 1, '11111', 'voie', '000-000-0000', 'Femme', 'aed4ef3b90d74390e125f08b74912a65b3760869', 2, 'assets/gardienspart/gardien1.jpg', 0, NULL),
(5, 'nom', 'prenom', 'e@e.com', 1, '11111', 'prenom nom', '000-000-0000', 'Femme', '93b49e9719babf7eb33c28b9bdfc901ef6358e9c', 2, 'assets/gardienspart/gardien1.jpg', 0, NULL),
(6, 'gardienNNom', 'gardienPrenom', 'g@g.com', 1, '31000', 'rue rue', '000-000-0000', 'Femme', '04890dd8e8d0c39b92bcbf8d998e5fce8de8d6b8', 2, 'assets/gardienspart/gardien1.jpg', 0, NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `gardienspart`
--

DROP TABLE IF EXISTS `gardienspart`;
CREATE TABLE IF NOT EXISTS `gardienspart` (
  `IDGP` int(4) NOT NULL,
  `GPGENRE` varchar(10) COLLATE utf8mb4_bin DEFAULT NULL,
  `GPNOM` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `GPPRENOM` varchar(25) COLLATE utf8mb4_bin DEFAULT NULL,
  `GPADR` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `GPLIEU` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `GPAGE` int(4) NOT NULL,
  `GPEXPE` int(4) DEFAULT NULL,
  `GPEVAL` varchar(4) COLLATE utf8mb4_bin DEFAULT NULL,
  `GPTEL` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `GPMAIL` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `GPPASSWORD` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `GPPIC` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`IDGP`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 테이블의 덤프 데이터 `gardienspart`
--

INSERT INTO `gardienspart` (`IDGP`, `GPGENRE`, `GPNOM`, `GPPRENOM`, `GPADR`, `GPLIEU`, `GPAGE`, `GPEXPE`, `GPEVAL`, `GPTEL`, `GPMAIL`, `GPPASSWORD`, `GPPIC`) VALUES
(1, 'F', 'ann', 'joohyun', '1 rue de Toulouse 31100', 'Toulouse', 26, NULL, NULL, '111111', 'a@a.com', '111111', 'assets/gardienspart/gardien1.jpg'),
(2, 'F', 'ann', 'joohyun', '1 rue de Toulouse 31100', 'Toulouse', 26, NULL, NULL, '111111', 'a@a.com', '111111', 'assets/gardienspart/gardien1.jpg'),
(3, 'F', 'ann', 'joohyun', '1 rue de Toulouse 31100', 'Toulouse', 26, 2, '5', '111111', 'a@a.com', '111111', 'assets/gardienspart/gardien1.jpg'),
(4, 'F', 'ann', 'joohyun', '1 rue de Toulouse 31100', 'Toulouse', 26, 2, '4', '111111', 'a@a.com', '111111', 'assets/gardienspart/gardien1.jpg'),
(5, 'F', 'ann', 'joohyun', '1 rue de Toulouse 31100', 'Toulouse', 26, 2, '3', '111111', 'a@a.com', '111111', 'assets/gardienspart/gardien1.jpg'),
(6, 'F', 'ann', 'joohyun', '1 rue de Toulouse 31100', 'Toulouse', 26, 2, '1', '111111', 'a@a.com', '111111', 'assets/gardienspart/gardien1.jpg'),
(7, 'H', 'ann', 'joohyun', '1 rue de Toulouse 31100', 'Toulouse', 26, 2, '5', '111111', 'a@a.com', '111111', 'assets/gardienspart/gardien1.jpg');

-- --------------------------------------------------------

--
-- 테이블 구조 `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `IDMESS` int(4) NOT NULL AUTO_INCREMENT,
  `MESSTEXTE` varchar(256) COLLATE utf8mb4_bin NOT NULL,
  `id_client` int(4) NOT NULL,
  `id_gardien` int(11) NOT NULL,
  PRIMARY KEY (`IDMESS`),
  KEY `FK_M_G` (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 테이블의 덤프 데이터 `messages`
--

INSERT INTO `messages` (`IDMESS`, `MESSTEXTE`, `id_client`, `id_gardien`) VALUES
(1, 'sfds', 2, 2),
(2, 'm by mail : ', 1, 2),
(3, 'ddd by mail : ', 4, 1),
(4, 'ddd by mail : ', 4, 1),
(5, '4 by 2mail : 3', 4, 1),
(6, '', 2, 2),
(7, 'bbbbb by bbbmail : b@b.com', 6, 4),
(8, 'knipni[nkpi;kipkmpin by b@b.commail : b@b.com', 6, 2),
(9, 'bojour by eeeemail : aaaaaaaamail', 6, 5),
(10, 'hhhpijpij by prenomnommail : d@d.com', 6, 2),
(11, '21212121212 by prenomnommail : d@d.com', 6, 5),
(12, 'hihihihi', 4, 2),
(13, 'ihihihihiihihi hihihi ihihihihihi hihihi hihi hihihihihapsdifpasid hpiadshfpiahfp', 4, 6),
(14, 'bibibibibi', 4, 5),
(15, 'bonjour vous etes disponible pour demain?', 4, 6),
(16, 'bonjour gardienprenom', 4, 6);

-- --------------------------------------------------------

--
-- 테이블 구조 `pertechien`
--

DROP TABLE IF EXISTS `pertechien`;
CREATE TABLE IF NOT EXISTS `pertechien` (
  `IDPERTEC` int(4) NOT NULL AUTO_INCREMENT,
  `NOMCHIENP` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `DESCP` varchar(256) COLLATE utf8mb4_bin NOT NULL,
  `RACEP` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `LIEUP` varchar(256) COLLATE utf8mb4_bin NOT NULL,
  `NUMP` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `MAILP` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`IDPERTEC`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 테이블의 덤프 데이터 `pertechien`
--

INSERT INTO `pertechien` (`IDPERTEC`, `NOMCHIENP`, `DESCP`, `RACEP`, `LIEUP`, `NUMP`, `MAILP`) VALUES
(9, 'Loup', 'Ses yeux sont verts et il est très beau.', 'husky', 'Capitole Toulouse', '06060606', 'loupMom@loup.com');

-- --------------------------------------------------------

--
-- 테이블 구조 `profil_client_complete`
--

DROP TABLE IF EXISTS `profil_client_complete`;
CREATE TABLE IF NOT EXISTS `profil_client_complete` (
  `id_prof_client` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `adresse_client` varchar(255) NOT NULL,
  `photo_client` varchar(255) NOT NULL,
  PRIMARY KEY (`id_prof_client`),
  KEY `id_client` (`id_client`),
  KEY `id_client_2` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `profil_client_complete`
--

INSERT INTO `profil_client_complete` (`id_prof_client`, `id_client`, `adresse_client`, `photo_client`) VALUES
(2, 2, '20 rue Henri', '0.jpg');

-- --------------------------------------------------------

--
-- 테이블 구조 `profil_gardien_complete`
--

DROP TABLE IF EXISTS `profil_gardien_complete`;
CREATE TABLE IF NOT EXISTS `profil_gardien_complete` (
  `id_prof_gardien` int(11) NOT NULL AUTO_INCREMENT,
  `id_gardien` int(11) NOT NULL,
  `adresse_gardien` varchar(255) NOT NULL,
  `photo_gardien` varchar(255) NOT NULL,
  PRIMARY KEY (`id_prof_gardien`),
  KEY `id_gardien` (`id_gardien`),
  KEY `id_gardien_2` (`id_gardien`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `profil_gardien_complete`
--

INSERT INTO `profil_gardien_complete` (`id_prof_gardien`, `id_gardien`, `adresse_gardien`, `photo_gardien`) VALUES
(3, 1, '17 AVENUE DU COLONEL ROCHE', 'FHprofil2.jpg');

-- --------------------------------------------------------

--
-- 테이블 구조 `races`
--

DROP TABLE IF EXISTS `races`;
CREATE TABLE IF NOT EXISTS `races` (
  `IDR` int(4) NOT NULL AUTO_INCREMENT,
  `RNOM` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `RP` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `RM` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `RTMOY` varchar(10) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`IDR`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 테이블의 덤프 데이터 `races`
--

INSERT INTO `races` (`IDR`, `RNOM`, `RP`, `RM`, `RTMOY`) VALUES
(1, 'Allemande', NULL, NULL, NULL),
(2, 'Italienne', NULL, NULL, NULL),
(3, 'Africaine', NULL, NULL, NULL),
(4, 'Irlandaise', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `designation_role` varchar(255) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `roles`
--

INSERT INTO `roles` (`id_role`, `designation_role`) VALUES
(1, 'Client'),
(2, 'Gardien');

-- --------------------------------------------------------

--
-- 테이블 구조 `sejourner`
--

DROP TABLE IF EXISTS `sejourner`;
CREATE TABLE IF NOT EXISTS `sejourner` (
  `IDC` int(4) NOT NULL,
  `IDCHEN` int(4) NOT NULL,
  PRIMARY KEY (`IDC`,`IDCHEN`),
  KEY `I_S_CHEN` (`IDCHEN`),
  KEY `I_S_C` (`IDC`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 테이블 구조 `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `IDU` int(11) NOT NULL AUTO_INCREMENT,
  `UGENRE` varchar(10) COLLATE utf8mb4_bin DEFAULT NULL,
  `UNOM` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `UPRENOM` varchar(25) COLLATE utf8mb4_bin DEFAULT NULL,
  `UTEL` varchar(13) COLLATE utf8mb4_bin NOT NULL,
  `UADR` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `UPSEUDO` varchar(25) COLLATE utf8mb4_bin DEFAULT NULL,
  `UMDP` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`IDU`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 테이블의 덤프 데이터 `utilisateurs`
--

INSERT INTO `utilisateurs` (`IDU`, `UGENRE`, `UNOM`, `UPRENOM`, `UTEL`, `UADR`, `UPSEUDO`, `UMDP`) VALUES
(1, 'F', 'ann', 'joohyun', '010101', '2 rue', NULL, 'aa');

--
-- 덤프된 테이블의 제약사항
--

--
-- 테이블의 제약사항 `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
