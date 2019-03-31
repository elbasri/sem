-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2016 at 10:26 AM
-- Server version: 10.0.22-MariaDB
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sgeadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `sgeabsences`
--

CREATE TABLE IF NOT EXISTS `sgeabsences` (
  `id` int(11) DEFAULT NULL,
  `etat` varchar(50) DEFAULT NULL,
  `infos` text DEFAULT NULL,
  `dated` date DEFAULT NULL,
  `datef` date DEFAULT NULL,
  `employe_id` int(11) DEFAULT '1',
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `user_id` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sgeagendas`
--

CREATE TABLE IF NOT EXISTS `sgeagendas` (
  `id` int(11) DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL,
  `projet_nom` varchar(500) DEFAULT NULL,
  `projet_id` int(11) DEFAULT NULL,
  `projet` varchar(500) DEFAULT NULL,
  `client_nom` varchar(500) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `typep` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `dated` time DEFAULT NULL,
  `datef` time DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgeagendas`
--

INSERT INTO `sgeagendas` (`id`, `ref`, `projet_nom`, `projet_id`, `projet`, `client_nom`, `client_id`, `typep`, `user_id`, `pseudo`, `date`, `dated`, `datef`) VALUES
(1, 'ref1245', '', 0, '', 'Offre deals hotels', 1, 'autre', 1, '', '2015-04-12', '18:16:00', '18:16:00'),
(2, 'ref124', 'article de test', 1, '', 'Votre codeur', 2, 'Article du stock', 1, '', '2015-06-15', '18:16:00', '18:16:00'),
(3, 'ref12', 'qsd', 3, '', 'Votre codeur', 2, 'Article du stock', 1, '', '2015-06-15', '18:16:00', '18:16:00'),
(4, 'SDFS', 'article de test', 1, '', 'sdsdsd', 6, 'Article du stock', 1, '', '2016-02-23', '13:12:00', '13:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `sgeaides`
--

CREATE TABLE IF NOT EXISTS `sgeaides` (
  `id` int(11) DEFAULT NULL,
  `nom` varchar(500) DEFAULT NULL,
  `lien` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgeaides`
--

INSERT INTO `sgeaides` (`id`, `nom`, `lien`, `user_id`) VALUES
(2, 'test de lienssss', 'http://blog.votrecodeur.com/2015/01/cartes-postales-peuvent-ils-etre-aussi.html', 0),
(3, 'aeazezv test de lienezr ', 'http://blog.votrecodeur.com/2015/01/cartes-postales-peuvent-ils-etre-aussi.html', 0),
(4, 'fdgh yutjy jhvg', 'http://blog.votrecodeur.com/2015/01/cartes-postales-peuvent-ils-etre-aussi.html', 0),
(5, 'test de lien', 'http://blog.votrecodeur.com/2015/01/cartes-postales-peuvent-ils-etre-aussi.html', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sgeannuaires`
--

CREATE TABLE IF NOT EXISTS `sgeannuaires` (
  `id` int(11) DEFAULT NULL,
  `nom` varchar(500) DEFAULT NULL,
  `desc` varchar(500) DEFAULT NULL,
  `secteur` varchar(100) DEFAULT NULL,
  `site` varchar(500) DEFAULT NULL,
  `demande` varchar(500) DEFAULT NULL,
  `etat` int(11) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `img` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgeannuaires`
--

INSERT INTO `sgeannuaires` (`id`, `nom`, `desc`, `secteur`, `site`, `demande`, `etat`, `tel`, `img`) VALUES
(1, 'SGE En ligne', 'SystÃ¨me de gestion d''entreprises', 'Informatique - Nouvelles technologies', 'http://localhost/sge/', 'http://localhost/sge/demandes/nouvelledemande', 1, '', ''),
(2, 'offre deals hotels', 'reserver votre hotel en temps reel', 'Tourisme', 'http://localhost/sge/', 'http://localhost/sge/demandes/nouvelledemande', 1, '', '/app/webroot/files/images/jack.jpg'),
(3, 'Votre Codeur', 'Informatique et nouvelles technologies', 'Informatique', 'http://localhost/sge/', 'http://localhost/sge/demandes/nouvelledemande', 1, '', '/app/webroot/files/images/10574277_10152192899326537_6669797382351847840_n.png');

-- --------------------------------------------------------

--
-- Table structure for table `sgeclients`
--

CREATE TABLE IF NOT EXISTS `sgeclients` (
  `id` int(11) DEFAULT NULL,
  `nom` varchar(500) DEFAULT NULL,
  `prenom` varchar(500) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `user_id` int(11) DEFAULT '1',
  `civilite` varchar(11) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `societe` varchar(250) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `codep` varchar(11) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `pays` varchar(100) DEFAULT NULL,
  `adressepostale` varchar(300) DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgeclients`
--

INSERT INTO `sgeclients` (`id`, `nom`, `prenom`, `created`, `modified`, `user_id`, `civilite`, `tel`, `societe`, `ville`, `codep`, `email`, `pays`, `adressepostale`, `ref`, `type`, `pseudo`) VALUES
(1, 'Offre deals hotels', 'Abdelfattah Mtilk', '2015-01-16', '2015-02-04', 1, 'Mr', '0661173588', '', 'Marrakech', 'pb168574', 'mtilk@gmail.com', 'Maroc', 'guiliz, 45 N12', '123', 'client', ''),
(3, 'mohamed ', 'bochaibi', '2015-01-16', '2015-01-16', 1, 'Mr', '00212697647851', '', 'marrakech', '40000', 'devnasser@gmail.com', 'maroc', 'bellaguide, boite postale 8', '456', 'client', ''),
(6, 'sdsdsd', '54564', '2015-01-20', '2015-01-20', 1, 'Mr', '454', '', '645', 'sdqsd', 'devnasser@gmail.com', 'sdsdsqdsqd', '5s4qd564qs6', 'dddddd', 'fabricant', ''),
(7, 'maintenance', 'dfdf', '2015-01-20', '2015-01-20', 1, 'Mr', '54564', '', 'sdfsd', 'fsdfsdf', 'fsdfds@sd.fdsf', 'dfsdf', 'sdfsd', 'qsqs', 'societem', ''),
(14, 'TRANSPORT OUHADDOU', 'Idir Ouhadou', '2015-03-03', '2015-03-03', 1, 'Mr', '0608608096', '', 'Marrakech', '40000', 'ouhaddouidir@gmail.com', 'Maroc', 'Av. My Rachid Imm. 13 Bis 1er Ã©tage NÂ° 2 - GuÃ©liz', 'ref60', 'client', ''),
(15, 'Thesouk Purveyor', 'Salim El Jeddaoui', '2015-03-31', '2015-03-31', 1, 'Mr', '_____', '', 'Marrakech', '40000', 'thesoukpurveyor@gmail.com', 'Maroc', 'thesoukpurveyor.com', 'c45', 'client', '');

-- --------------------------------------------------------

--
-- Table structure for table `sgecommandes`
--

CREATE TABLE IF NOT EXISTS `sgecommandes` (
  `id` int(11) DEFAULT NULL,
  `nom` varchar(500) DEFAULT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `ladate` date DEFAULT NULL,
  `commande` text DEFAULT NULL,
  `tva1` float DEFAULT NULL,
  `frais` float DEFAULT NULL,
  `remise` float DEFAULT NULL,
  `infos` text DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `client_nom` varchar(100) DEFAULT NULL,
  `montant` float DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `devise` varchar(10) DEFAULT NULL,
  `datee` date DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgecommandes`
--

INSERT INTO `sgecommandes` (`id`, `nom`, `reference`, `ladate`, `commande`, `tva1`, `frais`, `remise`, `infos`, `type`, `client_id`, `client_nom`, `montant`, `user_id`, `devise`, `datee`, `pseudo`) VALUES
(1, 'zqdeazde', 'sqdsf', '2015-01-19', '<table align="center" border="1" cellpadding="1" cellspacing="1" style="width: 90%;">\r\n	<thead>\r\n		<tr>\r\n			<th scope="col">\r\n				<strong>QTE</strong></th>\r\n			<th scope="col">\r\n				<strong>Article</strong></th>\r\n			<th scope="col">\r\n				<strong>Description</strong></th>\r\n			<th scope="col">\r\n				Prix Unitaire</th>\r\n			<th scope="col">\r\n				TVA</th>\r\n			<th scope="col">\r\n				Total</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				10</td>\r\n			<td>\r\n				test article</td>\r\n			<td>\r\n				designation de test</td>\r\n			<td>\r\n				15</td>\r\n			<td>\r\n				20</td>\r\n			<td>\r\n				150</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	&nbsp;</p>\r\n', 20, 0, 30, '<p>\r\n	Veuillez nous faire un prix sur cette liste de mat&eacute;riels, nous esp&eacute;rons obtenir une r&eacute;duction d&#39;enviren 30%<br />\r\n	Je vous fais remarquer, que nous sommes de fid&egrave;les clients</p>\r\n', 'Arrivage', 2, 'Votre codeur', 150, 1, 'â‚¬', '2015-01-19', ''),
(2, 'commande de 5 produits', 'cmd123', '2015-01-19', '<table align="center" cellpadding="1" cellspacing="1">\r\n	<thead>\r\n		<tr>\r\n			<th scope="col">\r\n				<strong>QTE</strong></th>\r\n			<th scope="col">\r\n				<strong>Libell&eacute;</strong></th>\r\n			<th scope="col">\r\n				<strong>Description</strong></th>\r\n			<th scope="col">\r\n				Prix Unitaire</th>\r\n			<th scope="col">\r\n				Total</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	&nbsp;</p>\r\n', 8.5, 0, 10, '<p>\r\n	sdqsdqsd</p>\r\n', 'A envoyer', 1, 'Votre codeur', 5555, 1, 'USD', '2015-01-19', ''),
(3, 'dqsdqsd', 'ref455', '2015-01-29', '<table align="center" border="1" cellpadding="1" cellspacing="1" style="width: 90%;">\r\n	<thead>\r\n		<tr>\r\n			<th scope="col">\r\n				<strong>QTE</strong></th>\r\n			<th scope="col">\r\n				<strong>Libell&eacute;</strong></th>\r\n			<th scope="col">\r\n				<strong>Description</strong></th>\r\n			<th scope="col">\r\n				Prix Unitaire</th>\r\n			<th scope="col">\r\n				Total</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	&nbsp;</p>\r\n', 20, 0, 15, '', 'Arrivage', 2, 'Votre codeur', 5462.53, 1, 'â‚¬', '2015-01-29', ''),
(4, 'wxcs', 'vsdvfdf', '2015-01-30', '<table align="center" cellpadding="1" cellspacing="1">\r\n	<thead>\r\n		<tr>\r\n			<th scope="col">\r\n				<strong>QTE</strong></th>\r\n			<th scope="col">\r\n				<strong>Libell&eacute;</strong></th>\r\n			<th scope="col">\r\n				<strong>Description</strong></th>\r\n			<th scope="col">\r\n				Prix Unitaire</th>\r\n			<th scope="col">\r\n				Total</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	&nbsp;</p>\r\n', 20, 0, 0, '', 'A envoyer', 2, 'Votre codeur', 0, 2, 'DH', '2015-01-30', ''),
(5, 'qsdfgvh', 'qsdfghb', '2015-03-01', '<table align="center" cellpadding="1" cellspacing="1">\r\n	<thead>\r\n		<tr>\r\n			<th scope="col">\r\n				<strong>QTE</strong></th>\r\n			<th scope="col">\r\n				<strong>Libell&eacute;</strong></th>\r\n			<th scope="col">\r\n				<strong>Description</strong></th>\r\n			<th scope="col">\r\n				Prix Unitaire</th>\r\n			<th scope="col">\r\n				Total</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	&nbsp;</p>\r\n', 8.5, 0, 45, '', 'A envoyer', 1, 'Offre deals hotels', 45, 1, 'USD', '2015-03-01', ''),
(6, 'qsssd', 'ertet', '2015-03-01', '<table align="center" cellpadding="1" cellspacing="1">\r\n	<thead>\r\n		<tr>\r\n			<th scope="col">\r\n				<strong>QTE</strong></th>\r\n			<th scope="col">\r\n				<strong>Libell&eacute;</strong></th>\r\n			<th scope="col">\r\n				<strong>Description</strong></th>\r\n			<th scope="col">\r\n				Prix Unitaire</th>\r\n			<th scope="col">\r\n				Total</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	&nbsp;</p>\r\n', 8.5, 0, 45, '', 'Arrivage', 0, 'mohamed ', 545, 1, 'USD', '2015-03-01', ''),
(7, 'c''est une belle commande', 'cmd321', '2015-03-02', '', 8.5, 0, 2, '', 'A envoyer', 0, 'Votre codeur', 0, 1, 'USD', '0000-00-00', ''),
(8, 'c''est une belle commande', 'cmd8754', '2015-03-02', '', 8.5, 0, 3, '', 'A envoyer', 2, 'Votre codeur', 1662, 1, 'USD', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `sgecomptes`
--

CREATE TABLE IF NOT EXISTS `sgecomptes` (
  `id` int(11) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `numero` varchar(100) DEFAULT NULL,
  `iban` varchar(100) DEFAULT NULL,
  `swift` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgecomptes`
--

INSERT INTO `sgecomptes` (`id`, `nom`, `numero`, `iban`, `swift`, `user_id`, `pseudo`) VALUES
(1, 'sgbm', '000 226 00 278103 69', '53', 'SGBM MAMC', 0, ''),
(2, 'BMCE', '465665656598995454', '24', 'BMCE CCG', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `sgeconfigurations`
--

CREATE TABLE IF NOT EXISTS `sgeconfigurations` (
  `id` int(11) DEFAULT NULL,
  `titre` varchar(500) DEFAULT NULL,
  `logo` varchar(500) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `tel` varchar(250) DEFAULT NULL,
  `tel2` varchar(250) DEFAULT NULL,
  `fax` varchar(250) DEFAULT NULL,
  `qui` int(11) DEFAULT NULL,
  `pour` int(11) DEFAULT NULL,
  `twitter` varchar(500) DEFAULT NULL,
  `facebook` varchar(500) DEFAULT NULL,
  `gplus` varchar(500) DEFAULT NULL,
  `youtube` varchar(500) DEFAULT NULL,
  `produits` int(11) DEFAULT NULL,
  `services` int(11) DEFAULT NULL,
  `devis` varchar(500) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `logor` varchar(500) DEFAULT NULL,
  `desc` varchar(500) DEFAULT NULL,
  `Devises` varchar(100) DEFAULT NULL,
  `servicestext` varchar(100) DEFAULT NULL,
  `produitstext` varchar(100) DEFAULT NULL,
  `quitext` varchar(100) DEFAULT NULL,
  `pourtext` varchar(100) DEFAULT NULL,
  `adresse` varchar(500) DEFAULT NULL,
  `codep` varchar(100) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `pays` varchar(100) DEFAULT NULL,
  `siteweb` int(11) DEFAULT NULL,
  `contacttext` text DEFAULT NULL,
  `tva` float DEFAULT NULL,
  `dtva` varchar(100) DEFAULT NULL,
  `cpaiement` varchar(100) DEFAULT NULL,
  `iretard` float DEFAULT NULL,
  `tarifh` float DEFAULT NULL,
  `volume` varchar(50) DEFAULT NULL,
  `poids` varchar(50) DEFAULT NULL,
  `nouveatestext` varchar(500) DEFAULT NULL,
  `menu` int(11) DEFAULT NULL,
  `nouveates` int(11) DEFAULT NULL,
  `analytics` varchar(500) DEFAULT NULL,
  `siret` varchar(100) DEFAULT NULL,
  `siren` varchar(100) DEFAULT NULL,
  `rcs` varchar(100) DEFAULT NULL,
  `ape` varchar(100) DEFAULT NULL,
  `ntva` varchar(100) DEFAULT NULL,
  `distance` varchar(100) DEFAULT NULL,
  `nouveatestextar` varchar(100) DEFAULT NULL,
  `servicestextar` varchar(100) DEFAULT NULL,
  `produitstextar` varchar(100) DEFAULT NULL,
  `nouveatestexten` varchar(100) DEFAULT NULL,
  `servicestexten` varchar(100) DEFAULT NULL,
  `produitstexten` varchar(100) DEFAULT NULL,
  `titrear` varchar(500) DEFAULT NULL,
  `titreen` varchar(500) DEFAULT NULL,
  `descar` varchar(500) DEFAULT NULL,
  `descen` varchar(500) DEFAULT NULL,
  `villeen` varchar(100) DEFAULT NULL,
  `villear` varchar(100) DEFAULT NULL,
  `paysen` varchar(100) DEFAULT NULL,
  `paysar` varchar(100) DEFAULT NULL,
  `adresseen` varchar(500) DEFAULT NULL,
  `adressear` varchar(500) DEFAULT NULL,
  `contacttexten` text DEFAULT NULL,
  `contacttextar` text DEFAULT NULL,
  `quitexten` varchar(100) DEFAULT NULL,
  `quitextar` varchar(100) DEFAULT NULL,
  `pourtexten` varchar(100) DEFAULT NULL,
  `pourtextar` varchar(100) DEFAULT NULL,
  `fr` int(11) DEFAULT NULL,
  `ar` int(11) DEFAULT NULL,
  `en` int(11) DEFAULT NULL,
  `lng` varchar(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgeconfigurations`
--

INSERT INTO `sgeconfigurations` (`id`, `titre`, `logo`, `email`, `tel`, `tel2`, `fax`, `qui`, `pour`, `twitter`, `facebook`, `gplus`, `youtube`, `produits`, `services`, `devis`, `user_id`, `logor`, `desc`, `Devises`, `servicestext`, `produitstext`, `quitext`, `pourtext`, `adresse`, `codep`, `ville`, `pays`, `siteweb`, `contacttext`, `tva`, `dtva`, `cpaiement`, `iretard`, `tarifh`, `volume`, `poids`, `nouveatestext`, `menu`, `nouveates`, `analytics`, `siret`, `siren`, `rcs`, `ape`, `ntva`, `distance`, `nouveatestextar`, `servicestextar`, `produitstextar`, `nouveatestexten`, `servicestexten`, `produitstexten`, `titrear`, `titreen`, `descar`, `descen`, `villeen`, `villear`, `paysen`, `paysar`, `adresseen`, `adressear`, `contacttexten`, `contacttextar`, `quitexten`, `quitextar`, `pourtexten`, `pourtextar`, `fr`, `ar`, `en`, `lng`) VALUES
(1, 'Délégation AL FIDA MERSSULTAN', 'http://192.168.1.149/materiel/app/webroot/files/images/sante.png', 'devnasser@gmail.com', '+212 522 83 41 42', '+212 522 28 15 53', '+212 522 28 64 34', 1, 1, 'votrecodeur', 'votrecodeur', '+votrecodeur', 'votrecodeur', 1, 1, '1', 0, 'img/logo.png', 'Service de gestion du Matériel', 'DH', 'Services', 'Produits', 'Quâ€™est-ce que Gestory?', 'Pourquoi Gestory?', 'Mers sultan, AV 2 mars', '40000', 'Casablanca', 'Maroc', 1, '<p>\r\n	<strong>Pour entrer en contact avec VotreCodeur s&#39;il vous pla&icirc;t envoyer un email contien votre demande &agrave; web@votrecodeur.com. Vous pouvez &eacute;galement ouvrire une ticket en ligne par remplissage du formulaire au-dessous </strong></p>\r\n', 8.5, '0', '0 jours', 7.5, 0, 'M3', 'T', 'NouveautÃ©s', 1, 1, 'UA-53398371-1', '713 892 315 00074', '321 654 987', 'RCS PARIS 321 654 987', '7512a', 'MA 13 125 812 512', 'M', 'ØªØ­Ø¯ÙŠØ«Ø§Øª', 'Ø®Ø¯Ù…Ø§Øª', 'Ù…Ù†ØªØ¬Ø§Øª', 'News', 'Services', 'Products', 'Ø¬ÙŠØ³ØªÙˆØ±Ø§ÙŠ', 'Gestory', 'Ù†Ø¸Ø§Ù… Ø¥Ø¯Ø§Ø±Ø© Ø§Ù„Ù…Ù‚Ø§ÙˆÙ„Ø§Øª Ø¹Ø¨Ø± Ø§Ù„Ø£Ù†ØªØ±Ù†ÙŠØª', 'Management system of companies online', 'Kech', 'Ù…Ø±Ø§ÙƒØ´', 'morocco', 'Ø§Ù„Ù…ØºØ±Ø¨', 'bellaguide, BP 8', 'Ø¨Ù„Ø¹ÙƒÙŠØ¯ , Ø¹Ù†ÙˆØ§Ù† Ø§Ù„Ø¨Ø±ÙŠØ¯ Ø±Ù‚Ù… 8', '', '', 'What is Gestory?', 'Ù…Ø§ Ù‡Ùˆ Ø¬ÙŠØ³ØªÙˆØ±ÙŠØŸ', 'Why chose Gestory?', 'Ù„Ù…Ø§Ø°Ø§ ØªØ®ØªØ§Ø± Ø¬ÙŠØ³ØªÙˆØ±ÙŠØŸ', 1, 1, 1, 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `sgeconsultations`
--

CREATE TABLE IF NOT EXISTS `sgeconsultations` (
  `id` int(11) DEFAULT NULL,
  `titre` varchar(250) DEFAULT NULL,
  `consultation` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `img` varchar(500) DEFAULT NULL,
  `etat` int(11) DEFAULT NULL,
  `accueil` int(11) DEFAULT NULL,
  `titrear` varchar(500) DEFAULT NULL,
  `titreen` varchar(500) DEFAULT NULL,
  `consultationar` text DEFAULT NULL,
  `consultationen` text DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgeconsultations`
--

INSERT INTO `sgeconsultations` (`id`, `titre`, `consultation`, `user_id`, `created`, `img`, `etat`, `accueil`, `titrear`, `titreen`, `consultationar`, `consultationen`, `pseudo`) VALUES
(1, 'Quâ€™est-ce que Gestory?', '<p style="text-align: center;">\r\n	<span style="font-size:24px;">La gestion d&#39;entreprise devrait &eacute;tre un plaisir !</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="font-size:18px;">SGE est un logiciel de gestion d&#39;entreprises en ligne incluant de multiples possibilit&eacute;s dans un format simple.</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p style="text-align: center;">\r\n	<img alt="" src="/app/webroot/img/finderimages/pages/SGE_accueil_systeme_gestion_professionnel.png" style="width: 600px; height: 423px;" /></p>\r\n<p>\r\n	<br />\r\n	<span style="font-size:18px;">S&eacute;lectionnez vos clients, ajoutez vos produits et/ou services, articles et le tour est jou&eacute; !</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p style="text-align: center;">\r\n	<img alt="" src="/app/webroot/img/finderimages/pages/SGE_gestion_articles_stock.png" style="width: 600px; height: 510px;" /></p>\r\n<p>\r\n	<br />\r\n	<span style="font-size:18px;">Editez &agrave; tout moment vos rapports de d&eacute;penses, recettes, stock, inventaire ou d&#39;employes.</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p style="text-align: center;">\r\n	<img alt="" src="/app/webroot/img/finderimages/pages/SGE_Liste_Depense.png" style="width: 600px; height: 275px;" /></p>\r\n<p>\r\n	<br />\r\n	<span style="font-size:18px;">Vous pouvez &eacute;galement g&eacute;rer vos projets et les r&eacute;alisations de chaque jour, semaine mois ou ann&eacute;es et g&eacute;rer votre temps en simples cliques !</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p style="text-align: center;">\r\n	<img alt="" src="/app/webroot/img/finderimages/pages/SGE_gestion_de_projets_realisations.png" style="width: 600px; height: 513px;" /></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="font-size:18px;">SGE aussi vous offre gratuitement un site web de type Boutique dynamique.<br />\r\n	ce site web inclus un systeme de mis &agrave; jours et de gestion de contenue tr&eacute;s sympas (blog moderne) , et deux plateformes de gestion de produits et services en ligne et un systeme de tickets et demandes de devis pour vos clients</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p style="text-align: center;">\r\n	<img alt="" src="/app/webroot/img/finderimages/pages/SGE_accueil_site_web.png" style="width: 600px; height: 842px;" /></p>\r\n<p>\r\n	&nbsp;</p>\r\n', 1, '2014-08-01', 'img/finderimages/pages/SGE.jpg', 1, 1, 'Ù…Ø§ Ù‡Ùˆ Ø¬ÙŠØ³ØªÙˆØ±ÙŠØŸ', 'What is Gestory?', '<p style="text-align: right;">\r\n	Ø¬ÙŠØ³ØªÙˆØ±ÙŠ Ù‡Ùˆ Ù†Ø¸Ø§Ù… Ø§Ø¯Ø§Ø±Ø© Ø§Ù„Ù…Ù‚ÙˆÙ„Ø§Øª ÙˆØ§Ù„Ø§Ø¹Ù…Ø§Ù„ Ø§Ù„ØªØ¬Ø§Ø±ÙŠØ©, Ø¬Ø¯ÙŠØ¯, ÙˆÙ…ØªØ·ÙˆØ±</p>\r\n<p style="text-align: right;">\r\n	ÙŠÙ…ÙƒÙ†Ùƒ Ø§Ø³ØªØ®Ø¯Ø§Ù…Ù‡ Ø¨ÙƒÙ„ Ø³Ù‡ÙˆÙ„Ø© ÙˆØ¨Ø¯ÙˆÙ† Ø§ÙŠ Ù…Ø¹Ø§Ø±Ù ØªÙ‚Ù†ÙŠØ© ÙƒÙ…Ø§ Ù„Ùˆ Ø§Ù†Ùƒ ØªØ³ØªØ®Ø¯Ù… Ø­Ø³Ø§Ø¨Ùƒ ÙÙŠ Ø§Ù„ÙÙŠØ³ Ø¨ÙˆÙƒ</p>\r\n', '<p>\r\n	Gestory is a new company management system.</p>\r\n<p>\r\n	you can use it as you use your facebook account in hight security...</p>\r\n', ''),
(2, 'Pourquoi Gestory?', '<p>\r\n	<span style="font-size:14px;"><strong>L&#39;enregistrement et d&#39;avoir un compte sur VotreCodeur.com vous donne beaucoup d&#39;avantages.<br />\r\n	En g&eacute;n&eacute;ral, vous pouvez profiter de la plupart de nos services sans aucun enregistrement sur le site, mais l&#39;inscription et la possession de compte vous fait profiter de tout ce qui est pr&eacute;sent dans le site de Votre Codeur facilement.<br />\r\n	<br />\r\n	Au-dessous certaines des fonctionnalit&eacute;s que vous obtenez apr&egrave;s vous &ecirc;tre inscrit sur â€‹â€‹le site de Votre Codeur:<br />\r\n	(Rappel: L&#39;inscription dans votrecodeur.com est gratuite 100%).</strong></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<ul>\r\n	<li>\r\n		<span style="font-size:14px;"><strong>R&eacute;ductions sp&eacute;ciales et limit&eacute;.</strong></span></li>\r\n	<li>\r\n		<span style="font-size:14px;"><strong>Apr&egrave;s s&#39;enregistrer dans votrecodeur.com, se connecter pour que vous n&#39;avez pas besoin de remplir le mod&egrave;le de donn&eacute;es &agrave; chaque fois vous commandez une service,&nbsp; achetez un produit ou un logiciel.</strong></span></li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		<span style="font-size:14px;"><strong>Vous n&#39;aurez plus besoin de remplir un formulaire d&#39;informations personnels chaque fois que vous voulez faire un demande.</strong></span></li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		<span style="font-size:14px;"><strong>Vos commandes, produits, logiciels sont enregistr&eacute;es automatiquement, et peut &ecirc;tre consult&eacute; en cliquant dessus dans votre panneau de contr&ocirc;le situ&eacute; au-dessus</strong></span></li>\r\n</ul>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="font-size:14px;"><strong>Pour savoir plus sur les advantages d&#39;avoir un compte sur VotreCodeur.com, Merci d&#39;Enregistrez vous</strong></span>,<span style="font-size:14px;"><strong> Et de savoir par vous-m&ecirc;me: </strong></span></p>\r\n<p style="text-align: center;">\r\n	<br />\r\n	<a href="http://www.votrecodeur.com/users/enregistrer" style="padding: 0px; margin: 0px; font-size: 12px; font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-decoration: none;" title="crÃ©er un compte client sur votrecodeur.com"><img alt="crÃ©er un compte client sur votrecodeur.com" height="50" src="http://www.votrecodeur.com/img/images/senregistrer.png" style="padding: 0px; margin: 0px; font-size: 12px; font-family: Arial,Helvetica,sans-serif;" title="crÃ©er un compte client sur votrecodeur.com" width="150" /></a></p>\r\n<p>\r\n	<br />\r\n	<span style="font-size:14px;"><strong>Si vous avez d&eacute;ja un compte, merci de se connecter pour profitez de tout advantages: </strong></span></p>\r\n<p style="text-align: center;">\r\n	<a href="http://www.votrecodeur.com/users/login" style="padding: 0px; margin: 0px; font-size: 12px; font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-decoration: none;" title="se connecter sur votre espace client sur votrecodeur.com"><img alt="se connecter sur votre espace client sur votrecodeur.com" height="50" src="http://www.votrecodeur.com/img/images/seconnecter.png" style="padding: 0px; margin: 0px; font-size: 12px; font-family: Arial, Helvetica, sans-serif;" title="se connecter sur votre espace client sur votrecodeur.com" width="150" /></a></p>\r\n', 1, '2014-08-01', '/img/images/4.jpg', 1, 1, 'Ù„Ù…Ø§Ø°Ø§ ØªØ®ØªØ§Ø± Ø¬ÙŠØ³ØªÙˆØ±ÙŠØŸ', 'Why chose Gestory?', '', '', ''),
(10, 'Programme Partenariat de test', '<div style="width: 100%; height: 100px; text-align: center; background-color: #E9F1F8;padding-top:20px">\r\n	<h3 style="font-size: 24px; color: #3984BF; margin-bottom: 5px">\r\n		Des taux de commission &eacute;lev&eacute;s</h3>\r\n	<p>\r\n		<span style="font-size: 17px;">Gagnez jusqu&rsquo;&agrave; <span style="font-weight: bold; color: #D80000;">50%</span> de commission par vente sans limites sur ce que vous pouvez gagner ! </span></p>\r\n</div>\r\n<h1 style="text-align: center;">\r\n	<img alt="Gagner de l''argent facilement en joignant le programme d''affiliation Votre Codeur" src="/app/webroot/img/finderimages/pages/Devenir partenaire de VotreCodeur-Commencez dÃ¨s maintenant et gagner de lâ€™argent par votre site ou sans avoir un site.jpg" style="width: 100%; height: 257px;" /></h1>\r\n<h2>\r\n	<br />\r\n	<span style="font-size:22px;">Joindre notre programme d&rsquo;affiliation est enti&egrave;rement gratuit</span></h2>\r\n<p>\r\n	<br />\r\n	<span style="font-size:16px;">Votre affiliation peut &ecirc;tre op&eacute;rationnelle en quelques minutes, ceci en l&rsquo;absence de limites sur ce que vous pouvez gagner et sans utiliser des cookies dont la dur&eacute;e de vie est 365 jours, le programme d&rsquo;affiliation Votre Codeur est l&rsquo;un des programmes les plus attractives qui existent, le premier principe de ce programme est Vous gagnez et Nous gagnons.<br />\r\n	<br />\r\n	En plus vous obtenir un lien speciale pour vous, et vous avez tout la libirte de l&#39;utiliser directement, dans des banniers, boutons et liens texte, vous obtenez &eacute;galement un panneau de contr&ocirc;le tr&egrave;s facile qui vous fournir les statistiques les plus importantes &agrave; propos de vos ventes.</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<h2>\r\n	<span style="font-size:22px;">Types de Produits disponible avec le Programme Partenariat Votre Codeur</span></h2>\r\n<p>\r\n	<span style="font-size:16px;">En g&eacute;n&eacute;rale, tout les produits disponible &agrave; vendre dans votre codeur sont des produits numerique.<br />\r\n	exemple : Scripts ecommerce, logiciels de bureau, plugins de CMS (wordpress, joomla, drupal,... ), listes d&#39;emails, formations video, formations pdf.. etc</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<h2>\r\n	<span style="font-size:22px;">Exemple de commissions par vente pour quelque produits de Votre Codeur</span></h2>\r\n<p>\r\n	<img alt="Exemple de commissions par vente pour quelque produits de Votre Codeur" src="/app/webroot/img/finderimages/Programme_Partenariat/partenaires.png" style="width: 100%; height: 449px;" /></p>\r\n<h2>\r\n	<br />\r\n	<span style="font-size:22px;">Gagner de l&#39;argent facilement en joignant le programme d&#39;affiliation Votre Codeur</span></h2>\r\n<p>\r\n	<br />\r\n	<span style="font-size:16px;">Pour joindre notre programme d&rsquo;affiliation il suffit de <a href="http://www.votrecodeur.com/users/login" target="_blank">se connecter</a> &agrave; votre compte client ou d&rsquo;en <a href="http://www.votrecodeur.com/users/enregistrer" target="_blank">cr&eacute;er un</a> si vous ne l&rsquo;avez pas encore puis de cliquer sur le bouton &quot;Partenaires&quot; en haut de votre compte, puis suivez les &eacute;tapes. Commencez d&egrave;s maintenant et gagner de l&rsquo;argent par votre site ou sans avoir un site web.</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n', 1, '2015-01-10', '/img/finderimages/pages/page4.jpg', 1, 0, 'Ø¨Ø±Ù†Ø§Ù…Ø¬ Ø§Ù„Ù…Ø´Ø§Ø±ÙƒØ© Ø§Ù„ØªØ¬Ø±ÙŠØ¨ÙŠ', 'Suppliers program demo', '<p>\r\n	This is just a test of english page</p>\r\n', '<p style="text-align: right;">\r\n	Ù‡Ø°Ø§ Ù†Øµ ØªØ¬Ø±ÙŠØ¨ÙŠ Ù„Ù„ØµÙØ­Ø© Ø¨Ø§Ù„Ù„ØºØ© Ø§Ù„Ø¹Ø±Ø¨ÙŠØ©</p>\r\n', ''),
(11, 'Politique de confidentialitÃ©', '<p>\r\n	<strong><span style="font-size:14px;">La protection de vos renseignements personnels est importante pour Votre Codeur &trade;. Nous avons &eacute;labor&eacute; une politique de confidentialit&eacute; qui r&eacute;git la mani&egrave;re dont nous recueillons, utilisons, divulguons, transf&eacute;rons et stockons vos renseignements. Veuillez prendre le temps de vous familiariser avec nos pratiques en mati&egrave;re de confidentialit&eacute; et si vous avez des questions, <a href="http://www.votrecodeur.com/demandes/nouvelledemande" target="_blank">faites-le-nous savoir</a>.</span></strong></p>\r\n<p>\r\n	&nbsp;</p>\r\n<h2>\r\n	Collecte et utilisation de renseignements personnels</h2>\r\n<p>\r\n	Les renseignements personnels sont des donn&eacute;es pouvant &ecirc;tre utilis&eacute;es pour identifier ou contacter une personne en particulier.</p>\r\n<p>\r\n	Lorsque vous &ecirc;tes en communication avec VotreCodeur.com , vous pourriez devoir &agrave; n&rsquo;importe quel moment fournir des renseignements personnels. VotreCodeur.com et ses partenaires peuvent se partager ces renseignements personnels et les utiliser conform&eacute;ment &agrave; la pr&eacute;sente politique de confidentialit&eacute;. Elles peuvent aussi les combiner &agrave; d&rsquo;autres renseignements afin d&rsquo;offrir nos produits, services, contenus et publicit&eacute;s et de les am&eacute;liorer.&nbsp; Vous n&rsquo;&ecirc;tes pas oblig&eacute; de nous communiquer les renseignements personnels que nous vous demandons. Cependant, si vous choisissez de ne pas les communiquer, nous ne pourrons pas toujours vous fournir nos produits et services, ou m&ecirc;me r&eacute;pondre &agrave; vos questions.</p>\r\n<p>\r\n	Voici quelques exemples du type de renseignements personnels qu&rsquo;VotreCodeur.com peut recueillir et de leur utilisation.</p>\r\n<h3>\r\n	Types de renseignements personnels recueillis</h3>\r\n<ul class="square">\r\n	<li>\r\n		Lorsque vous cr&eacute;ez un identifiant VotreCodeur.com, enregistrez vos produits, demandez un cr&eacute;dit commercial, achetez un produit, t&eacute;l&eacute;chargez une mise &agrave; jour logicielle, vous inscrivez &agrave; un cours donn&eacute; dans un VotreCodeur.com Store, communiquez avec nous ou participez &agrave; un sondage en ligne, nous pouvons collecter divers renseignements, y compris vos nom, adresse postale, num&eacute;ro de t&eacute;l&eacute;phone, adresse courriel et pr&eacute;f&eacute;rences de communication, ainsi que vos renseignements de cartes de cr&eacute;dit.</li>\r\n	<li>\r\n		Lorsque vous partagez votre contenu avec vos amis et votre famille &agrave; l&rsquo;aide de produits VotreCodeur.com, que vous envoyez des ch&egrave;ques-cadeaux et des produits ou que vous invitez des personnes &agrave; venir vous rejoindre sur les forums VotreCodeur.com, VotreCodeur.com peut recueillir les renseignements que vous fournissez sur ces personnes, y compris leur nom, adresse postale, adresse courriel et num&eacute;ro de t&eacute;l&eacute;phone.</li>\r\n	<li>\r\n		Aux &Eacute;tats-Unis, nous pouvons vous demander votre num&eacute;ro de s&eacute;curit&eacute; sociale, mais seulement dans des circonstances particuli&egrave;res, notamment lorsque vous ouvrez un compte de t&eacute;l&eacute;phonie mobile et activez votre iPhone, ou lors de la d&eacute;termination de l&rsquo;admissibilit&eacute; au cr&eacute;dit commercial.</li>\r\n</ul>\r\n<h3>\r\n	Utilisation de vos renseignements personnels</h3>\r\n<ul class="square">\r\n	<li>\r\n		Les renseignements personnels que nous recueillons nous permettent de vous informer sur les plus r&eacute;cents produits VotreCodeur.com, les mises &agrave; jour logicielles et les &eacute;v&eacute;nements &agrave; venir. Si vous ne souhaitez pas figurer sur notre liste d&rsquo;envoi, vous pouvez en tout temps mettre &agrave; jour vos pr&eacute;f&eacute;rences pour vous retirer.</li>\r\n	<li>\r\n		Nous utilisons &eacute;galement vos renseignements personnels pour nous aider &agrave; cr&eacute;er, &agrave; d&eacute;velopper, &agrave; utiliser, &
agrave; livrer et &agrave; am&eacute;liorer nos produits, services, contenus et publicit&eacute;s et &agrave; des fins de pr&eacute;vention des pertes et de lutte contre la fraude.</li>\r\n	<li>\r\n		De temps &agrave; autre, nous pouvons utiliser vos renseignements personnels afin d&rsquo;envoyer des avis importants, tels que des communications sur des achats ou des modifications de nos conditions et politiques. Comme cette information fait partie int&eacute;grante de votre interaction avec VotreCodeur.com, vous ne pouvez pas vous soustraire &agrave; la r&eacute;ception de ces communications.</li>\r\n	<li>\r\n		Nous pouvons aussi utiliser vos renseignements personnels &agrave; des fins internes, telles que la v&eacute;rification, l&rsquo;analyse de donn&eacute;es et la recherche en vue d&rsquo;am&eacute;liorer les produits et les services d&rsquo;VotreCodeur.com, ainsi que nos communications destin&eacute;es aux consommateurs.</li>\r\n	<li>\r\n		Si vous participez &agrave; un tirage, &agrave; un concours ou &agrave; toute autre promotion semblable, nous pouvons utiliser les renseignements que vous avez fournis pour administrer ces programmes.</li>\r\n</ul>\r\n<h2>\r\n	Collecte et utilisation de renseignements non personnels</h2>\r\n<p>\r\n	Nous recueillons &eacute;galement des donn&eacute;es dont la forme ne nous permet pas de faire un rapprochement direct avec une personne en particulier. Nous pouvons recueillir, utiliser, transf&eacute;rer et divulguer les renseignements non personnels &agrave; n&rsquo;importe quelle fin. Voici quelques exemples de renseignements non personnels que nous recueillons et de leur utilisation&nbsp;:</p>\r\n<ul class="square">\r\n	<li>\r\n		Nous pouvons recueillir des renseignements tels que la profession, la langue, le code postal, l&rsquo;indicatif r&eacute;gional et l&rsquo;identifiant unique d&rsquo;appareil, ainsi que l&rsquo;endroit et le fuseau horaire o&ugrave; un produit VotreCodeur.com est utilis&eacute;, le tout dans l&rsquo;optique de mieux comprendre le comportement de nos clients et d&rsquo;am&eacute;liorer nos produits, services et publicit&eacute;s.</li>\r\n	<li>\r\n		Nous pouvons &eacute;galement recueillir des renseignements sur les activit&eacute;s de nos clients en lien avec notre site Web, nos services iCloud, iTunes Store et nos autres produits et services. Ces renseignements agr&eacute;g&eacute;s nous aident &agrave; fournir de l&rsquo;information pertinente &agrave; nos clients et &agrave; conna&icirc;tre les aspects de notre site Web, de nos produits et de nos services qui suscitent le plus d&rsquo;int&eacute;r&ecirc;t. Les donn&eacute;es agr&eacute;g&eacute;es sont consid&eacute;r&eacute;es comme des renseignements non personnels pour l&rsquo;application de la pr&eacute;sente politique de confidentialit&eacute;.</li>\r\n</ul>\r\n<p>\r\n	Advenant que des renseignements non personnels soient combin&eacute;s &agrave; des renseignements personnels, les renseignements ainsi combin&eacute;s seraient consid&eacute;r&eacute;s comme des renseignements personnels, tant et aussi longtemps qu&rsquo;ils demeurent combin&eacute;s.</p>\r\n<h2>\r\n	T&eacute;moins et autres technologies</h2>\r\n<p>\r\n	Le site Web, les services en ligne, les applications interactives, les courriels et les publicit&eacute;s d&rsquo;VotreCodeur.com peuvent utiliser des &laquo;&nbsp;t&eacute;moins&nbsp;&raquo; et d&rsquo;autres technologies telles que des balises Web et des pixels invisibles. Ces technologies nous aident &agrave; mieux comprendre le comportement des utilisateurs, nous indiquent les sections de notre site Web qu&rsquo;ils ont visit&eacute;es et am&eacute;liorent et mesurent l&rsquo;efficacit&eacute; des publicit&eacute;s et des recherches Web. Les renseignements recueillis &agrave; l&rsquo;aide de t&eacute;moins et d&rsquo;autres technologies sont consid&eacute;r&eacute;s comme &eacute;tant non personnels. Toutefois, dans la mesure o&ugrave; les adresses IP et autres identifiants similaires sont consid&eacute;r&eacute;s comme des renseignements personnels par les lois locales, nous 
traitons &eacute;galement ces identifiants comme s&rsquo;il s&rsquo;agissait de renseignements personnels. De m&ecirc;me, dans la mesure o&ugrave; les renseignements non personnels sont combin&eacute;s aux renseignements personnels, nous consid&eacute;rons les renseignements ainsi combin&eacute;s comme des renseignements personnels aux fins de la pr&eacute;sente politique de confidentialit&eacute;.</p>\r\n<h2>\r\n	Divulgation &agrave; des tiers</h2>\r\n<p>\r\n	VotreCodeur.com peut &agrave; l&rsquo;occasion rendre certains renseignements personnels disponibles &agrave; ses partenaires strat&eacute;giques qui collaborent avec elle afin d&rsquo;offrir des produits et services ou qui aident VotreCodeur.com dans sa commercialisation. Par exemple, lorsque vous achetez et activez votre iPhone, vous autorisez VotreCodeur.com et votre fournisseur &agrave; s&rsquo;&eacute;changer l&rsquo;information que vous fournissez durant l&rsquo;activation. Si le service vous est accord&eacute;, votre compte sera soumis aux politiques de confidentialit&eacute; respectives d&rsquo;VotreCodeur.com et de votre fournisseur. Les renseignements personnels ne seront divulgu&eacute;s par VotreCodeur.com qu&rsquo;en vue d&rsquo;offrir ou d&rsquo;am&eacute;liorer ses produits, services et publicit&eacute;s. Ils ne seront pas divulgu&eacute;s &agrave; des tiers pour utilisation dans leurs activit&eacute;s de marketing.</p>\r\n<h3>\r\n	Fournisseurs de services</h3>\r\n<p>\r\n	VotreCodeur.com divulgue des renseignements personnels aux entreprises qui fournissent divers services, tels que le traitement de l&rsquo;information, le cr&eacute;dit, la gestion des commandes, la livraison des produits, la gestion et l&rsquo;am&eacute;lioration des donn&eacute;es sur les clients, le service &agrave; la client&egrave;le, la mesure de votre int&eacute;r&ecirc;t envers nos produits et services, les enqu&ecirc;tes sur la satisfaction des clients et la recherche aupr&egrave;s de la client&egrave;le. Ces entreprises, qui peuvent &ecirc;tre situ&eacute;es partout o&ugrave; VotreCodeur.com m&egrave;ne ses activit&eacute;s, sont dans l&rsquo;obligation de prot&eacute;ger vos renseignements.</p>\r\n<h3>\r\n	Autres</h3>\r\n<p>\r\n	Dans certaines circonstances, VotreCodeur.com peut &ecirc;tre contrainte de divulguer vos renseignements personnels (obligation juridique, proc&eacute;dure juridique, litige, demandes d&eacute;pos&eacute;es par les autorit&eacute;s publiques et gouvernementales de votre pays de r&eacute;sidence ou d&rsquo;un autre pays). VotreCodeur.com peut aussi divulguer des renseignements personnels si elle le juge n&eacute;cessaire ou appropri&eacute; pour des raisons de s&eacute;curit&eacute; nationale, d&rsquo;enqu&ecirc;te polici&egrave;re, ou toute autre raison d&rsquo;int&eacute;r&ecirc;t public.</p>\r\n<p>\r\n	Elle peut &eacute;galement divulguer ces renseignements si elle le juge n&eacute;cessaire et raisonnable afin de faire respecter ses conditions g&eacute;n&eacute;rales ou pour prot&eacute;ger ses activit&eacute;s ou ses utilisateurs. De plus, advenant une r&eacute;organisation, une fusion ou une vente, nous pourrions transf&eacute;rer, en tout ou en partie, les renseignements personnels recueillis au tiers concern&eacute;.</p>\r\n<h2>\r\n	Protection des renseignements personnels</h2>\r\n<p>\r\n	VotreCodeur.com prend la protection de vos renseignements personnels tr&egrave;s au s&eacute;rieux. &nbsp;Les services en ligne VotreCodeur.com tels que l&rsquo;VotreCodeur.com Store en ligne et iTunes Store utilisent des protocoles de chiffrement comme Transport Layer Security (TLS) pour prot&eacute;ger vos renseignements personnels pendant le transit. Vos renseignements personnels sont stock&eacute;s par VotreCodeur.com dans des syst&egrave;mes informatiques &agrave; acc&egrave;s limit&eacute; h&eacute;berg&eacute;s dans des installations o&ugrave; des mesures de s&eacute;curit&eacute; physiques sont en place. Les donn&eacute;es iCloud sont crypt&eacute;es avant d&rsquo;&ecirc;tre stock&eacute;es, y compris lorsque nous utilisons un stockage tiers.</p>\r\
n<p>\r\n	Lorsque vous utilisez certains produits et services et certaines applications VotreCodeur.com, ou que vous publiez un message sur un forum VotreCodeur.com, dans un salon de clavardage VotreCodeur.com ou sur un r&eacute;seau social, les renseignements personnels que vous divulguez sont visibles pour les autres utilisateurs, qui peuvent les lire, les collecter ou les utiliser. Vous &ecirc;tes responsable des renseignements personnels que vous choisissez de divulguer dans ces circonstances. Par exemple, si vous publiez votre nom et votre adresse courriel dans un forum de discussion, ces renseignements sont publics. Soyez prudent lorsque vous utilisez ces fonctionnalit&eacute;s.</p>\r\n<h2>\r\n	Int&eacute;grit&eacute; et conservation des renseignements personnels</h2>\r\n<p>\r\n	VotreCodeur.com vous donne des moyens simples de vous assurer que vos renseignements personnels sont exacts, complets et &agrave; jour. Nous conserverons vos renseignements personnels pendant le temps n&eacute;cessaire aux utilisations indiqu&eacute;es dans la pr&eacute;sente politique de confidentialit&eacute;, &agrave; moins qu&rsquo;une p&eacute;riode de conservation plus longue ne soit n&eacute;cessaire ou permise par la loi.</p>\r\n<h2>\r\n	Enfants</h2>\r\n<p>\r\n	Nous ne recueillons pas sciemment les renseignements personnels d&rsquo;enfants de moins de 13&nbsp;ans, sauf lorsqu&rsquo;un parent a cr&eacute;&eacute; un identifiant VotreCodeur.com pour son enfant dans le cadre du programme VotreCodeur.com ID for Student Program (Identifiants VotreCodeur.com pour les &eacute;tudiants) et a donn&eacute; son consentement &agrave; VotreCodeur.com de fa&ccedil;on v&eacute;rifiable. Si nous apprenons que nous avons recueilli les renseignements personnels d&rsquo;un enfant de moins de 13&nbsp;ans sans avoir re&ccedil;u au pr&eacute;alable le consentement v&eacute;rifiable d&rsquo;un parent, nous prendrons les mesures n&eacute;cessaires pour supprimer les renseignements d&egrave;s que possible.</p>\r\n<h2>\r\n	Services de g&eacute;olocalisation</h2>\r\n<p>\r\n	Afin d&rsquo;offrir des services de g&eacute;olocalisation sur les produits VotreCodeur.com, VotreCodeur.com, ses partenaires et ses licenci&eacute;s peuvent recueillir, utiliser et partager des donn&eacute;es sur l&rsquo;emplacement pr&eacute;cis de votre ordinateur ou appareil VotreCodeur.com, y compris sa situation g&eacute;ographique en temps r&eacute;el. Ces donn&eacute;es de g&eacute;olocalisation sont recueillies de mani&egrave;re anonyme, sans qu&rsquo;il soit possible de vous identifier. VotreCodeur.com, ses partenaires et ses licenci&eacute;s s&rsquo;en servent pour offrir et am&eacute;liorer les produits et services de g&eacute;olocalisation. Par exemple, nous pouvons divulguer votre position g&eacute;ographique &agrave; des fournisseurs d&rsquo;applications lorsque vous acceptez d&rsquo;utiliser leurs services de localisation.</p>\r\n<p>\r\n	Certains services de g&eacute;olocalisation offerts par VotreCodeur.com, tels que la fonctionnalit&eacute; &laquo;&nbsp;Localiser mon iPhone&nbsp;&raquo;, ont besoin de vos renseignements personnels pour fonctionner.</p>\r\n<h2>\r\n	Sites et services de tiers</h2>\r\n<p>\r\n	Les sites Web, produits, applications et services d&rsquo;VotreCodeur.com peuvent renfermer des liens vers des sites Web, produits et services de tiers. Nos produits et services peuvent aussi utiliser ou offrir des produits et services de tiers (p.&nbsp;ex. une application iPhone de tiers). Les renseignements recueillis par des tiers, notamment les donn&eacute;es de g&eacute;olocalisation ou les coordonn&eacute;es, sont soumis aux pratiques en mati&egrave;re de confidentialit&eacute; de ces m&ecirc;mes tiers. Nous vous encourageons &agrave; en apprendre plus sur les pratiques de ces tiers en mati&egrave;re de confidentialit&eacute;.</p>\r\n<h2>\r\n	Utilisateurs internationaux</h2>\r\n<p>\r\n	Tous les renseignements que vous fournissez peuvent &ecirc;tre transf&eacute;r&eacute;s ou consult&eacute;s par des entit&eacute;s du monde entier, conform&eacute;ment &agrave; la 
pr&eacute;sente politique de confidentialit&eacute;. VotreCodeur.com se conforme aux principes &laquo;&nbsp;Safe Harbor&nbsp;&raquo; d&eacute;finis par le d&eacute;partement du Commerce des &Eacute;tats-Unis en mati&egrave;re de collecte, d&rsquo;utilisation et de conservation des renseignements personnels recueillis par des organisations de l&rsquo;Espace &eacute;conomique europ&eacute;en et de la Suisse.</p>\r\n<p>\r\n	Veuillez noter que les renseignements personnels, y compris les renseignements fournis lors de l&rsquo;utilisation d&rsquo;iCloud, concernant les r&eacute;sidents des &Eacute;tats membres de l&rsquo;Espace &eacute;conomique europ&eacute;en (EEE) et de la Suisse sont contr&ocirc;l&eacute;s par VotreCodeur.com Distribution International, situ&eacute;e &agrave; Cork, en Irlande, et trait&eacute;s pour son compte par VotreCodeur.com Inc. Les renseignements personnels recueillis au sein de l&rsquo;EEE et en Suisse lors de l&rsquo;utilisation d&rsquo;iTunes sont contr&ocirc;l&eacute;s par iTunes SARL, au Luxembourg, et trait&eacute;s pour son compte par VotreCodeur.com Inc.</p>\r\n<h2>\r\n	Notre engagement &agrave; pr&eacute;server votre confidentialit&eacute;</h2>\r\n<p>\r\n	Afin de nous assurer que vos renseignements personnels sont en s&eacute;curit&eacute;, nous communiquons nos lignes directrices en mati&egrave;re de confidentialit&eacute; et de s&eacute;curit&eacute; aux employ&eacute;s d&rsquo;VotreCodeur.com et nous appliquons de mani&egrave;re stricte les dispositifs de protection au sein de l&rsquo;entreprise.</p>\r\n<h2>\r\n	Questions concernant la confidentialit&eacute;</h2>\r\n<p>\r\n	Si vous avez des questions ou des pr&eacute;occupations concernant la politique de confidentialit&eacute; d&rsquo;VotreCodeur.com ou le traitement des donn&eacute;es ou si vous souhaitez signaler une possible violation des lois locales relatives &agrave; la confidentialit&eacute;, veuillez <a href="http://www.votrecodeur.com/demandes/nouvelledemande">communiquer avec nous</a>.</p>\r\n<p>\r\n	Nous examinons toutes les communications et r&eacute;pondons d&egrave;s que possible lorsque cela est jug&eacute; appropri&eacute;. &nbsp;Si vous &ecirc;tes insatisfait de la r&eacute;ponse obtenue, vous pouvez d&eacute;poser une plainte au charg&eacute; de la r&eacute;glementation de votre r&eacute;gion.&nbsp; Si vous nous le demandez, nous nous efforcerons de vous fournir de l&rsquo;information sur les recours possibles applicables &agrave; votre situation.</p>\r\n<p>\r\n	VotreCodeur.com peut mettre &agrave; jour sa politique de confidentialit&eacute; de temps &agrave; autre. Lorsque nous modifions la politique de mani&egrave;re substantielle, un avis est affich&eacute; sur notre site Web, accompagn&eacute; de la politique de confidentialit&eacute; mise &agrave; jour.</p>\r\n', 1, '2015-01-12', '/img/images/4.jpg', 1, 0, 'Ø³ÙŠØ§Ø³Ø© Ø§Ù„Ø®ØµÙˆØµÙŠØ©', 'Privacy Policy', '<p style="text-align: right;">\r\n	Ø£Ù†Øª Ø§Ù„Ø§Ù† ÙÙŠ ØµÙØ­Ø© Ø³ÙŠØ§Ø³Ø© Ø§Ù„Ø®ØµÙˆØµÙŠØ©...ÙˆÙƒÙ…Ø§ ØªØ±Ù‰ ÙÙ‡Ø°Ø§ Ù…Ø¬Ø±Ø¯ Ù†Øµ ØªØ¬Ø±ÙŠØ¨ÙŠ Ù„Ù„ØªØ­Ù‚Ù‚ Ù…Ù† Ø¹Ù…Ù„ Ø§Ù„ØµÙØ­Ø§Øª Ø§Ù„Ù…ØªØ¹Ø¯Ø¯Ø© Ø§Ù„Ù„ØºØ§Øª</p>\r\n<p style="text-align: right;">\r\n	Ù‡Ø°Ø§ Ù†Øµ ØªØ¬Ø±ÙŠØ¨ÙŠ Ø§Ø®Ø±-</p>\r\n<p style="text-align: right;">\r\n	ÙˆÙ‡Ø°Ø§ Ø§ÙŠØ¶Ø§ Ù†Øµ ØªØ¬Ø±ÙŠØ¨ÙŠ-</p>\r\n<p style="text-align: right;">\r\n	Ø´ÙƒØ±Ø§ Ù„Ø§Ù‡ØªÙ…Ø§Ù…Ùƒ-</p>\r\n<p style="text-align: right;">\r\n	....-</p>\r\n', '<p>\r\n	this is ou privacy policy:</p>\r\n<p>\r\n	-test test</p>\r\n<p>\r\n	-just a test</p>\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `sgecontrats`
--

CREATE TABLE IF NOT EXISTS `sgecontrats` (
  `id` int(11) DEFAULT NULL,
  `nom` varchar(250) DEFAULT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `dated` date DEFAULT NULL,
  `datef` date DEFAULT NULL,
  `cout` float DEFAULT NULL,
  `commentaire` text DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `client_nom` varchar(500) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgecontrats`
--

INSERT INTO `sgecontrats` (`id`, `nom`, `reference`, `dated`, `datef`, `cout`, `commentaire`, `type`, `client_id`, `client_nom`, `user_id`, `pseudo`) VALUES
(1, 'contrat de test 1', 'ref1contrat1', '2015-01-11', '2015-01-24', 55, '', 'Garantie', 2, 'Votre codeur', 0, ''),
(3, 'gerzf', 'sdsd', '2017-01-20', '2019-09-15', 0, '', 'Maintenance', 2, 'Votre codeur', 0, ''),
(4, 'ezdf', 'sdqsd', '2015-01-20', '2015-01-21', 0, '', 'Garantie', 2, 'Votre codeur', 0, ''),
(5, 'test du contrat', 'ref1', '2015-01-26', '2015-01-26', 40, '<p>\r\n	tes de details</p>\r\n', 'Assurance', 2, 'Votre codeur', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `sgedemandes`
--

CREATE TABLE IF NOT EXISTS `sgedemandes` (
  `id` int(11) DEFAULT NULL,
  `nom` varchar(500) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `societe` varchar(150) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `created` date DEFAULT NULL,
  `etat` int(11) DEFAULT NULL DEFAULT '0',
  `client_id` int(11) DEFAULT NULL DEFAULT '0',
  `titre` varchar(250) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgedemandes`
--

INSERT INTO `sgedemandes` (`id`, `nom`, `email`, `societe`, `tel`, `details`, `created`, `etat`, `client_id`, `titre`) VALUES
(1, 'Elbasri Abdennacer', 'devnasser@gmail.com', 'Votre Codeur', '+212676479581', 'voila un test de demandes', '2015-01-24', 1, 1, 'voila un test de demandes'),
(4, 'elbasri', 'nasser@nasser.com', 'abdennacer', '876281734532', 'just a test :)', '2016-02-23', 1, 0, 'message de test'),
(5, 'erz', 'zerzerze@zer.zer', 'rzer', 'zer', 'erter', '2016-03-22', 0, 0, 'ertret'),
(6, 'erz', 'zerzerze@zer.zer', 'rzer', 'zer', 'erter', '2016-03-22', 0, 0, 'ertret'),
(7, 'erz', 'zerzerze@zer.zer', 'rzer', 'zer', 'erter', '2016-03-22', 0, 0, 'ertret'),
(8, 'erz', 'zerzerze@zer.zer', 'rzer', '55646', 'qsd', '2016-03-22', 0, 0, 'qsd'),
(9, 'erz', 'zerzerze@zer.zer', 'rzer', 'zer', 'qsd', '2016-03-22', 0, 0, 'qsd'),
(10, 'erz', 'zerzerze@zer.zer', 'rzer', '454645', 'hjk', '2016-03-22', 0, 0, '6jhkhjk'),
(11, 'Elbasri Abdennacer', 'devnasser@gmail.com', 'Votre Codeur', '+212676479581', 'dfghjklm', '2016-03-23', 1, 1, 'test ...');

-- --------------------------------------------------------

--
-- Table structure for table `sgedepenses`
--

CREATE TABLE IF NOT EXISTS `sgedepenses` (
  `id` int(11) DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `categorie_nom` varchar(500) DEFAULT NULL,
  `nom` varchar(500) DEFAULT NULL,
  `payee` float DEFAULT NULL,
  `tvaen` float DEFAULT NULL,
  `tva` float DEFAULT NULL,
  `tvadud` float DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `fclient` int(11) DEFAULT NULL,
  `fournisseur_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fournisseur_nom` varchar(500) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL,
  `compte_id` int(11) DEFAULT NULL,
  `compte_nom` varchar(500) DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgedepenses`
--

INSERT INTO `sgedepenses` (`id`, `categorie_id`, `categorie_nom`, `nom`, `payee`, `tvaen`, `tva`, `tvadud`, `description`, `fclient`, `fournisseur_id`, `user_id`, `fournisseur_nom`, `date`, `ref`, `compte_id`, `compte_nom`, `pseudo`) VALUES
(3, 14, 'Accesoires de cafÃ©', 'Banque', 200, 20, 40, 0, 'vdfgd', 0, 2, 1, 'Votre codeur', '2015-01-14', 'ref1', 1, 'sgbm', ''),
(4, 14, 'Accesoires de cafÃ©', 'Banque', 17500, 15, 2625, 0, 'sgr', 0, 2, 1, 'Votre codeur', '2015-05-26', '<sdqs', 1, 'sgbm', ''),
(5, 41, 'MatÃ©riel de bureau', 'Banque', 555, 10, 55.5, 0, 'dezxcvsdfhg ', 0, 2, 1, 'Votre codeur', '2013-01-01', 'fsdf', 1, 'sgbm', ''),
(6, 14, 'Accesoires de cafÃ©', 'Banque', 11450, 18, 2061, 0, 'desc ', 0, 2, 1, 'Votre codeur', '2015-09-04', 'P45', 1, 'sgbm', ''),
(7, 14, 'Accesoires de cafÃ©', 'Banque', 4501, 15, 675.15, 0, 'xcx', 0, 2, 1, 'Votre codeur', '2015-04-19', 'sqd', 1, 'sgbm', ''),
(8, 14, 'Accesoires de cafÃ©', 'Banque', 4501, 15, 675.15, 0, 'xcx', 0, 2, 1, 'Votre codeur', '2014-02-19', 'sqd', 1, 'sgbm', ''),
(9, 27, 'BÃ©nÃ©fices de taux de change', 'Banque', 25000, 8.5, 2125, 0, 'nÃ©ant', 0, 7, 1, 'maintenance', '2015-08-12', 'ref797', 1, 'sgbm', ''),
(10, 17, 'Acompte sur impÃ´t', 'Banque', 785, 8.5, 66.725, 0, 'aucun', 0, 8, 1, 'newmedic', '2015-02-27', 'red15', 1, 'sgbm', '');

-- --------------------------------------------------------

--
-- Table structure for table `sgedeplacements`
--

CREATE TABLE IF NOT EXISTS `sgedeplacements` (
  `id` int(11) DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL,
  `pays` varchar(100) DEFAULT NULL,
  `dated` datetime DEFAULT NULL,
  `datef` datetime DEFAULT NULL,
  `taux` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgedeplacements`
--

INSERT INTO `sgedeplacements` (`id`, `ref`, `pays`, `dated`, `datef`, `taux`, `total`, `description`, `user_id`, `pseudo`) VALUES
(1, 'refe123', 'maroc', '2015-02-24 18:48:00', '2015-03-27 18:48:00', 15, 465, 'description de test', 0, ''),
(2, 'ref45', 'maroc', '2015-02-24 19:20:00', '2015-02-24 19:20:00', 30, 30, 'test', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `sgedevises`
--

CREATE TABLE IF NOT EXISTS `sgedevises` (
  `id` int(11) DEFAULT NULL,
  `nom` varchar(500) DEFAULT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `ladate` date DEFAULT NULL,
  `devis` text DEFAULT NULL,
  `tva1` float DEFAULT NULL,
  `tva2` float DEFAULT NULL,
  `frais` float DEFAULT NULL,
  `remise` float DEFAULT NULL,
  `infos` text DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `client_nom` varchar(100) DEFAULT NULL,
  `montant` float DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `devise` varchar(10) DEFAULT NULL,
  `etat` varchar(50) DEFAULT NULL,
  `typedevis` varchar(100) DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgedevises`
--

INSERT INTO `sgedevises` (`id`, `nom`, `reference`, `ladate`, `devis`, `tva1`, `tva2`, `frais`, `remise`, `infos`, `type`, `client_id`, `client_nom`, `montant`, `user_id`, `devise`, `etat`, `typedevis`, `pseudo`) VALUES
(1, 'devis pour la service de creation de site web ecommerce pro', 'ec54520', '2015-01-28', '<table align="center" border="1" cellpadding="1" cellspacing="1" style="width: 800px;">\r\n	<thead>\r\n		<tr>\r\n			<th scope="col">\r\n				QTE</th>\r\n			<th scope="col">\r\n				service</th>\r\n			<th scope="col">\r\n				description</th>\r\n			<th scope="col">\r\n				TVA</th>\r\n			<th scope="col">\r\n				PRIX UNIT (ht)</th>\r\n		</tr>\r\n	</thead>\r\n	<caption>\r\n		&nbsp;</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				5</td>\r\n			<td>\r\n				modules</td>\r\n			<td>\r\n				creation du modules de paiement en ligne</td>\r\n			<td>\r\n				20</td>\r\n			<td>\r\n				150</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				1</td>\r\n			<td>\r\n				creation du site</td>\r\n			<td>\r\n				creation du boutique en ligne avec system de blogging et intergration du modules de paiements</td>\r\n			<td>\r\n				50</td>\r\n			<td>\r\n				800</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	&nbsp;</p>\r\n', 20, 5, 12, 10, '<p>\r\n	pour plus d&#39;informations sur ce devis, merci de nous contacter</p>\r\n<p>\r\n	en tout cas, vous pouvez demander un autre devis en utilisant les informations de contact en haut de cette page</p>\r\n<p>\r\n	&nbsp;</p>\r\n', 'D', 1, 'nasser', 950, 1, 'â‚¬', 'AcceptÃ©', '', ''),
(2, 'qsdqsd', 'qsdqsd', '2015-02-05', '<img alt="" src="img/finderimages/images_localisations/presentation1.png" style="width: 100%; height: 100%;" />\r\n', 20, 0, 0, 0, '', '00', 1, 'Offre deals hotels', 0, 1, 'DH', 'Sans rÃ©ponse - en attente', '', ''),
(3, 'SEO - PublicitÃ©', 'seo23', '2015-03-31', '<h2>\r\n	<u>R&eacute;f&eacute;rencement de site internet (SEO)</u></h2>\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td height="30" width="600">\r\n				Nombre de langues</td>\r\n			<td height="30" width="500">\r\n				<font color="#ff0000">1</font></td>\r\n		</tr>\r\n		<tr>\r\n			<td height="30" width="600">\r\n				Analyse du site web du client</td>\r\n			<td height="30" width="500">\r\n				<img border="0" height="16" src="http://localhost/votrecodeur/img/images/good.gif" width="16" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td height="30" width="600">\r\n				Etude des mots cl&eacute;s descriptifs de votre activit&eacute;</td>\r\n			<td height="30" width="500">\r\n				<img border="0" height="16" src="http://localhost/votrecodeur/img/images/good.gif" width="16" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td height="30" width="600">\r\n				Suggestion de vos textes d&rsquo;ancre</td>\r\n			<td height="30" width="500">\r\n				<font color="#ff0000">100</font></td>\r\n		</tr>\r\n		<tr>\r\n			<td height="30" width="600">\r\n				Relance manuelle sur les moteurs de recherche n&rsquo;ayant pas index&eacute; le site</td>\r\n			<td height="30" width="500">\r\n				<img border="0" height="16" src="http://localhost/votrecodeur/img/images/good.gif" width="16" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td height="30" width="600">\r\n				Soumission du site aux annuaires de recherche</td>\r\n			<td height="30" width="500">\r\n				<font color="#ff0000">250</font></td>\r\n		</tr>\r\n		<tr>\r\n			<td height="30" width="600">\r\n				Soumission du site de wiki</td>\r\n			<td height="30" width="500">\r\n				<font color="#ff0000">500</font></td>\r\n		</tr>\r\n		<tr>\r\n			<td height="30" width="600">\r\n				Choix de nombre de soumission par jour</td>\r\n			<td height="30" width="500">\r\n				<img border="0" height="16" src="http://localhost/votrecodeur/img/images/good.gif" width="16" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td height="30" width="600">\r\n				Multi-Titres, Multi-Descriptions et Multi-Mots-cl&eacute;s</td>\r\n			<td height="30" width="500">\r\n				<img border="0" height="16" src="http://localhost/votrecodeur/img/images/good.gif" width="16" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td height="30" width="600">\r\n				Un r&eacute;f&eacute;rencement garanti sans liens de retour.</td>\r\n			<td height="30" width="500">\r\n				<img border="0" height="16" src="http://localhost/votrecodeur/img/images/good.gif" width="16" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td height="30" width="600">\r\n				Support gratuit par email ou par ticket 12/24 et 6j/7j</td>\r\n			<td height="30" width="500">\r\n				<img border="0" height="16" src="http://localhost/votrecodeur/img/images/good.gif" width="16" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td height="30" width="600">\r\n				La popularit&eacute; de votre site Web sur Internet est la mesure d&#39;audience ou de visiteur que votre site g&eacute;n&egrave;re selon une p&eacute;riode donn&eacute;e .Ce param&egrave;tre donne de l&#39;effet sur le positionnement de votre site web sur certains moteurs de recherche.</td>\r\n			<td height="30" width="500">\r\n				<img border="0" height="16" src="http://localhost/votrecodeur/img/images/good.gif" width="16" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td height="30" width="600">\r\n				Suggestion de mots-cl&eacute;s pour le client</td>\r\n			<td height="30" width="500">\r\n				<img border="0" height="16" src="http://localhost/votrecodeur/img/images/good.gif" width="16" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td height="30" width="600">\r\n				param&eacute;trage des titres de vos pages ,des noms de fichiers ,de la balise Meta-Description ,g&eacute;n&eacute;ration dynamique du plan ..</td>\r\n			<td height="30" width="500">\r\n				<img border="0" height="16" src="http://localhost/votrecodeur/img/images/good.gif" width="16" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td height="30" width="600">\r\n				Cr&eacute;ation des profiles sur les r&eacute;seaux sociaux les plus importants avec vos liens</td>\r\n			<td height="30" width="500">\r\n				<font color="#ff0000">500</font></td>\r\n		</
tr>\r\n		<tr>\r\n			<td height="30" width="600">\r\n				cr&eacute;ation du plan sitemaps aux formats standards: sitemap.html, sitemap.xml</td>\r\n			<td height="30" width="500">\r\n				<img border="0" height="16" src="http://localhost/votrecodeur/img/images/good.gif" width="16" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td height="30" width="600">\r\n				Garantie satisfait ou Rembours&eacute;</td>\r\n			<td height="30" width="500">\r\n				<img border="0" height="16" src="http://localhost/votrecodeur/img/images/good.gif" width="16" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td height="30" width="600">\r\n				Indexation garantie dans Google</td>\r\n			<td height="30" width="500">\r\n				<img border="0" height="16" src="http://localhost/votrecodeur/img/images/good.gif" width="16" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p style="text-align: center;">\r\n	&nbsp;</p>\r\n<p style="text-align: center;">\r\n	<span style="font-size:28px;"><strong>Prix: <span style="color: rgb(255, 0, 0);">3500 </span>DH</strong></span></p>\r\n<p style="text-align: center;">\r\n	<span style="font-size:28px;"><strong>Dur&eacute;e de r&eacute;alisation: 3 semaines</strong></span></p>\r\n<h2>\r\n	&nbsp;</h2>\r\n<h2>\r\n	<u>Publicit&eacute;</u></h2>\r\n<p>\r\n	&nbsp;</p>\r\n<h1 style="font-size:30px">\r\n	<span style="color:#ff0000;">Plateforme de Newsletter + 15000 email (pays de votre choix)</span></h1>\r\n<p>\r\n	<span style="font-size:14px;"><strong>C&#39;est un script de newsletter professionnel avec un panneau de gestion de lettres et clients (utilisateurs)</strong></span></p>\r\n<p>\r\n	<span style="font-size:14px;"><strong>Premi&egrave;rement, l&#39;utilisateur peuvent s&#39;enregistrer via le formulaire suivant (le formulair sera integrer dans les pages de site web soit directement soit en l&#39;appel par une IFRAME):</strong></span></p>\r\n<p style="text-align: center;">\r\n	<span style="font-size:14px;"><strong><img alt="le formulaire d''inscription dans le script de newsletter" height="220" src="http://localhost/votrecodeur/app/webroot/img/finderimages/scripts/newslettres/newslettres.png" width="285" /></strong></span></p>\r\n<p style="text-align: center;">\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="font-size:14px;"><strong>Apr&eacute;s l&#39;enregistrement, l&#39;utilisateur re&ccedil;u un message de confirmation par mail (pour valider son inscription).<br />\r\n	(il y a une possibilite d&#39;optimiser ce message biensur).</strong></span></p>\r\n<p>\r\n	<span style="font-size:14px;"><strong>Si le Client (utilisateur) ne confirme pas son enregistrement &agrave; partir ce message, vous pouvez le faire manuellement &agrave; partir le panneau d&#39;administration:</strong></span></p>\r\n<p>\r\n	<span style="font-size:14px;"><strong><img alt="newsletter administration des utilisateurs" height="444" src="http://localhost/votrecodeur/app/webroot/img/finderimages/scripts/newslettres/newslettres_admin_utilisateurs.png" width="864" /></strong></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="font-size:14px;"><strong>Si vous voulez envoyer un &quot;newsletter&quot; ou mises &agrave; jour vers vos clients inscrit, il suffit de cr&eacute;er la lettre puis l&#39;envoyer:</strong></span></p>\r\n<p>\r\n	<span style="font-size:14px;"><strong>Admin ==&gt; add newsletter=&gt;ajouter news</strong></span></p>\r\n<p>\r\n	<span style="font-size:14px;"><strong><img alt="ajouter newsletter" src="http://localhost/votrecodeur/app/webroot/img/finderimages/scripts/newslettres/ajouter_newsletter.png" style="width: 605px; height: 432px;" /></strong></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="font-size:14px;"><strong>Puis, vous pouvez envoyer vos lettres que vous avez ajouter dans la liste des &quot;newsletters&quot; en cliquant sur &quot;send&quot; devant chaque lettre:</strong></span></p>\r\n<p>\r\n	<span style="font-size:14px;"><strong><img alt="la liste des lettres dans le script de newsletter" src="http://localhost/votrecodeur/app/webroot/img/finderimages/scripts/newslettres/newsletters_liste.png" style="width: 577px; height: 51px;" /></strong></span></
p>\r\n<p>\r\n	<span style="font-size:14px;"><strong>Vous devez confirmer l&#39;envoi (apr&eacute;s le script calcule le nombre des utilisateurs) : </strong></span></p>\r\n<p>\r\n	<span style="font-size:14px;"><strong><img alt="confirmation de envoi de lettre dans le script de newsletter" src="http://localhost/votrecodeur/app/webroot/img/finderimages/scripts/newslettres/confirmation%20de%20envoi%20de%20lettre%20dans%20le%20script%20de%20newsletter.png" style="width: 800px; height: 154px;" /></strong></span></p>\r\n<p>\r\n	<span style="font-size:14px;"><strong>Maintenant, il faut choisir le nombre exact des utilisateurs qui seron re&ccedil;u cette lettre parmi le nombre totale (7163 dans ce cas):</strong></span></p>\r\n<p>\r\n	<span style="font-size:14px;"><strong><img alt="nombre des utilisateur reÃ§u la lettre dans le script de newsletter" src="http://localhost/votrecodeur/app/webroot/img/finderimages/scripts/newslettres/nombre%20des%20utilisateur%20re%C3%A7u%20la%20lettre%20dans%20le%20script%20de%20newsletter.png" style="width: 221px; height: 101px;" /></strong></span></p>\r\n<p>\r\n	<span style="font-size:14px;"><strong>Maintenant, le script va calculer le nombre exact des utilisateurs, et l&#39;etat de chaque envoi de mail:</strong></span></p>\r\n<p>\r\n	<span style="font-size:14px;"><strong><img alt="lenvoi des emails a partir le newslettre" src="http://localhost/votrecodeur/app/webroot/img/finderimages/scripts/newslettres/lenvoi%20des%20emails%20a%20partir%20le%20newslettre.png" style="width: 587px; height: 291px;" /></strong></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="font-size:14px;"><strong>Points importants:</strong></span></p>\r\n<ul>\r\n	<li>\r\n		<span style="font-size:14px;"><strong>A chaque fois, vous voulez supprimer un utilisateur, allez vers: Admin ==&gt; View Users=&gt; puis cliquer sur Delete (devant l&#39;utilisateur que vous voulez supprimer)</strong></span></li>\r\n	<li>\r\n		<span style="font-size:14px;"><strong>Si vous voulez Editer les informations d&#39;un client (utilisateur), allez vers: Admin ==&gt;View&nbsp; Users=&gt; puis cliquer sur EDIT </strong></span></li>\r\n	<li>\r\n		<span style="font-size:14px;"><strong>Quand vous souhaitez de garder un utilisateur, mais vous ne voulez pas qu&#39;il re&ccedil;oit des lettres, allez vers: Admin ==&gt;View&nbsp; Users=&gt; puis cliquer sur Yes (ou sur NO pour le cas contraire)</strong></span></li>\r\n	<li>\r\n		<span style="font-size:14px;"><strong>Pour modifier une lettre : Admin==&gt; View Newsletter ==&gt; Edit</strong></span></li>\r\n	<li>\r\n		<span style="font-size:14px;"><strong>Pour quitter: Logout</strong></span></li>\r\n</ul>\r\n<p>\r\n	&nbsp;</p>\r\n<p style="text-align: center;">\r\n	<span style="font-size:28px;"><strong>Prix: <span style="color: rgb(255, 0, 0);">1500 </span>DH</strong></span></p>\r\n<p style="text-align: center;">\r\n	<span style="font-size:20px;"><strong>Dur&eacute;e d&#39;installation: 1 Jour</strong></span></p>\r\n<p style="text-align: center;">\r\n	<span style="font-size:18px;"><strong>Dur&eacute;e d&#39;envois de liens de confirmation (15000 utilisateur=mails) : 3 jours</strong></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<h1 style="font-size:30px">\r\n	<span style="color:#ff0000;">Facebook:</span></h1>\r\n<p>\r\n	<strong><span style="font-size:14px;">Cr&eacute;ation + configuration (logo, couverture..... etc) : <span style="color:#ff0000;">Gratuit</span></span></strong></p>\r\n<p>\r\n	<span style="font-size:14px;"><strong>Page Followers (Likes): </strong></span></p>\r\n<ul>\r\n	<li>\r\n		1000 =&gt; 2000 j&#39;aime : 500 Dh</li>\r\n	<li>\r\n		&gt;2000 =&gt; 5000 j&#39;aime : 1000 Dh</li>\r\n	<li>\r\n		&gt;5000 =&gt; 10000 j&#39;aime: 1500 Dh</li>\r\n	<li>\r\n		&gt;10000 =&gt; 50000 j&#39;aime: 2500 Dh</li>\r\n	<li>\r\n		&gt;50000 j&#39;aime: &agrave; discuter</li>\r\n</ul>\r\n<p>\r\n	<strong>&nbsp;&nbsp; Dur&eacute;e de r&eacute;alisation: de 1 &agrave; 2 semaines</strong></p>\r\n<p>\r\n	<span style="font-size:14px;"><strong>Publicit&eacute; professionnel sur facebook (facebook ads manager): </strong>300 Dh 
pour chaque 1000 DH de publicit&eacute;</span></p>\r\n', 0, 0, 0, 5, '<p>\r\n	<strong><span style="color:#ff0000;">Remarque:</span> Montant totale ( &agrave; payer) ne comprend pas le prix de r&eacute;seaux facebook)</strong></p>\r\n', 'Devis', 15, 'Thesouk Purveyor', 5000, 1, 'DH', 'Sans rÃ©ponse - en attente', 'Libre', '');

-- --------------------------------------------------------

--
-- Table structure for table `sgeemployes`
--

CREATE TABLE IF NOT EXISTS `sgeemployes` (
  `id` int(11) DEFAULT NULL,
  `nom` varchar(150) DEFAULT NULL,
  `prenom` varchar(150) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `codep` varchar(11) DEFAULT NULL,
  `adressepostale` varchar(250) DEFAULT NULL,
  `civilite` varchar(11) DEFAULT NULL,
  `cin` varchar(11) DEFAULT NULL,
  `cinend` date DEFAULT NULL,
  `specialite` varchar(100) DEFAULT NULL,
  `datenaissance` date DEFAULT NULL,
  `datetravail` date DEFAULT NULL,
  `salaire` float DEFAULT NULL,
  `created` date DEFAULT NULL,
  `user_id` int(11) DEFAULT '1',
  `noter` varchar(50) DEFAULT NULL,
  `noterinfo` varchar(200) DEFAULT NULL,
  `specialite_id` int(11) DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL,
  `classification` varchar(100) DEFAULT NULL,
  `datefintravail` date DEFAULT NULL,
  `img` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `contrat` varchar(500) DEFAULT NULL,
  `matricule` int(11) DEFAULT NULL,
  `cnss` int(11) DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgeemployes`
--

INSERT INTO `sgeemployes` (`id`, `nom`, `prenom`, `tel`, `pays`, `ville`, `codep`, `adressepostale`, `civilite`, `cin`, `cinend`, `specialite`, `datenaissance`, `datetravail`, `salaire`, `created`, `user_id`, `noter`, `noterinfo`, `specialite_id`, `ref`, `classification`, `datefintravail`, `img`, `email`, `contrat`, `matricule`, `cnss`, `pseudo`) VALUES
(1, 'nasser', 'Ù†Ø§ØµØ±', '57575', 'mrc', 'zag', 'gf5', 'gfh jhg 45', 'Mr', 'sds74', '2015-01-12', 'developpeur', '2015-01-12', '2015-01-12', 45650, '2015-01-12', 1, 'excellent', 'excellent', 1, '', '', '2035-01-01', '/materiel/app/webroot/files/images/jack.jpg', '', '/files/files/3058c7659bdd8abc3bae5238d389d9ec.pdf', 7845, 48574, ''),
(2, 'nasser', 'elbasri', '0676478545', 'ma', 'roc', '45900', 'dfghj dfhgj 545fg boite 5', 'Mr', 'pb5454', '2020-01-12', 'developpeur', '1988-01-12', '2012-01-12', 5500, '2015-01-12', 1, 'bien', 'bien', 1, '', '', '2035-01-01', '/sge/app/webroot/img/finderimages/image%20des%20employer/karim.jpg', '', '', 0, 0, ''),
(3, 'krimo', 'test', 'jh', 'jj', 'hj', 'hj', 'jh', 'Mr', 'hjjhj', '2015-06-18', 'developpeur', '2015-06-18', '2015-01-18', 555, '2015-01-18', 1, 'bien', 'pas de remarque', 1, '', '', '2035-01-01', '', '', '', 0, 0, ''),
(4, 'hsina', 'kiko', 'jh', 'jj', 'hj', 'hj', 'jh', 'Mr', 'hjjh', '2015-06-18', 'developpeur', '2015-06-18', '2015-01-18', 0, '2015-01-18', 1, 'moyenne', 'bonne engareme', 1, '', '', '0000-00-00', '', '', '', 0, 0, ''),
(5, 'binga', 'tkhrbi9a', 'jh', 'jj', 'hj', 'hj', 'jh', 'Mr', 'hjjh', '2015-06-18', 'dddddddddddddddd', '2015-06-18', '2015-01-18', 0, '2015-01-18', 1, 'mauvais', 'makaynach had sa3a', 2, '', '', '0000-00-00', '', '', '', 0, 0, ''),
(6, 'qsqs', 'dsqqd', 'jh', 'jj', 'hj', 'hj', 'jh', 'Mr', 'hjjh', '2015-06-18', 'dddddddddddddddd', '2015-06-18', '2015-01-18', 0, '2015-01-18', 1, 'mauvais', '', 2, '', '', '0000-00-00', '', '', '', 0, 0, ''),
(7, 'qsqs', 'dsqqd', 'jh', 'jj', 'hj', 'hj', 'jh', 'Mr', 'hjjh', '2015-06-18', 'dddddddddddddddd', '2015-06-18', '2015-01-18', 0, '2015-01-18', 1, '', '', 2, '', '', '0000-00-00', '', '', '', 0, 0, ''),
(8, 'qsqs', 'dsqqd', 'jh', 'jj', 'hj', 'hj', 'jh', 'Mr', 'hjjh', '2015-06-18', 'dddddddddddddddd', '2015-06-18', '2015-01-18', 0, '2015-01-18', 1, '', '', 2, '', '', '0000-00-00', '', '', '', 0, 0, ''),
(10, 'hjjh', 'hjjh', 'hjjh', 'hjjh', 'hjjh', 'hjjh', 'hjjh', 'Mr', 'hjjh', '2015-01-18', 'developpeur', '2015-01-18', '2015-01-18', 0, '2015-01-18', 1, '', '', 1, '', '', '0000-00-00', '', '', '', 0, 0, ''),
(11, 'hjjh', 'hjjh', 'hjjh', 'hjjh', 'hjjh', 'hjjh', 'hjjh', 'Mr', 'hjjh', '2015-01-18', 'developpeur', '2015-01-18', '2015-01-18', 0, '2015-01-18', 1, '', '', 1, '', '', '0000-00-00', '', '', '', 0, 0, ''),
(12, 'khamsa', 'musta', 'gfhbfcbh', 'maroc', 'bni mellal', 'co7785452', 'adresse test 54545', 'Mr', 'cin45', '2015-02-13', 'developpeur', '1990-02-06', '2015-02-06', 0, '2015-02-06', 1, 'bien', 'good listning', 1, '', '', '2015-02-06', '', '', '', 0, 0, ''),
(13, 'Elbasri', 'ibrahim', '06456655656', 'Maroc', 'Marrakech', '40000', 'mhamid 9 5454', 'Mr', 'pB5454555', '2020-02-07', 'Peinture', '1979-02-07', '2014-02-07', 0, '2015-02-07', 1, 'excellent', '', 4, '', '', '2016-02-07', '', '', '/sge/app/webroot/files/files/545e9551ed70418995c3f59db3f7ef0a.pdf', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `sgeevennements`
--

CREATE TABLE IF NOT EXISTS `sgeevennements` (
  `id` int(11) DEFAULT NULL,
  `titre` varchar(500) DEFAULT NULL,
  `user` varchar(500) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `logiciel` varchar(500) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `titrear` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `titreen` varchar(500) DEFAULT NULL,
  `logicielar` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `logicielen` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgeevennements`
--

INSERT INTO `sgeevennements` (`id`, `titre`, `user`, `iduser`, `logiciel`, `created`, `titrear`, `titreen`, `logicielar`, `logicielen`) VALUES
(1, 'Ajouter un nouveau compte bancaire', 'administrateur', 1, 'Comptes bancaires', '2015-03-06 00:00:00', '', '', '', ''),
(2, 'Supprimer un compte bancaire', 'administrateur', 1, 'Comptes bancaires', '2015-03-06 00:00:00', '', '', '', ''),
(3, 'Imprimer un compte bancaire', 'administrateur', 1, 'Comptes bancaires', '2015-03-06 00:00:00', '', '', '', ''),
(4, 'Imprimer la liste de comptes bancaires', 'administrateur', 1, 'Comptes bancaires', '2015-03-06 00:00:00', 'Ø·Ø¨Ø§Ø¹Ø© Ù‚Ø§Ø¦Ù…Ø© Ø§Ù„Ø­Ø³Ø§Ø¨Ø§Øª Ø§Ù„Ø¨Ù†ÙƒÙŠØ©', 'Print a liste of bank accounts', 'Ø­Ø³Ø§Ø¨Ø§Øª Ø¨Ù†ÙƒÙŠØ©', 'Bank accounts'),
(5, 'Supprimer un contact', 'administrateur', 1, 'CRM et Contacts', '2015-03-06 00:00:00', 'Ø¥Ø²Ø§Ù„Ø© Ø¬Ù‡Ø© Ø¥ØªØµØ§Ù„', 'Delete a contact', 'Ø¹Ù„Ø§Ù‚Ø§Øª ÙˆØ¹Ù…Ù„Ø§Ø¡', 'CRM and contacts'),
(6, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(7, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(8, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(9, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(10, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(11, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(12, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(13, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(14, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(15, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(16, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(17, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(18, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(19, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(20, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(21, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(22, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(23, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(24, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(25, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(26, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(27, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(28, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(29, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(30, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(31, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(32, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(33, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(34, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(35, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(36, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(37, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(38, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(39, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(40, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(41, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(42, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(43, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(44, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(45, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(46, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(47, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(48, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(49, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(50, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(51, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(52, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(53, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(54, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(55, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(56, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(57, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(58, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(59, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(60, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(61, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(62, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(63, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(64, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(65, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(66, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(67, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(68, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(69, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(70, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(71, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(72, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(73, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(74, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(75, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(76, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(77, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(78, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-07 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(79, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-31 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(80, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-31 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(81, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-31 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(82, 'Ajouter un contact', 'administrateur', 1, 'CRM et Contacts', '2015-03-31 00:00:00', 'Ø¥Ø¶Ø§ÙØ© Ø¬Ù‡Ø© Ø¥ØªØµØ§Ù„', 'Add a contact', 'Ø¹Ù„Ø§Ù‚Ø§Øª ÙˆØ¹Ù…Ù„Ø§Ø¡', 'CRM and contacts'),
(83, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-03-31 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(84, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-04-15 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(85, 'Imprimer list', 'administrateur', 1, 'Devis', '2015-04-16 00:00:00', 'Ø·Ø¨Ø§Ø¹Ø© Ù‚Ø§Ø¦Ù…Ø©', 'Print list', 'Ù…Ù‚Ø§ÙŠØ³Ø§Øª', 'Quotation'),
(86, 'Imprimer', 'administrateur', 1, 'Devis', '2015-04-17 00:00:00', 'Ø·Ø¨Ø§Ø¹Ø©', 'Print', 'Ù…Ù‚Ø§ÙŠØ³Ø§Øª', 'Quotation'),
(87, 'Modifier', 'ismail', 3, 'Utilisateurs', '2015-04-18 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„', 'Edit', 'Ø§Ù„Ù…Ø³ØªØ®Ø¯Ù…ÙŠÙ†', 'Users'),
(88, 'Modifier', 'ismail', 3, 'Utilisateurs', '2015-04-18 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„', 'Edit', 'Ø§Ù„Ù…Ø³ØªØ®Ø¯Ù…ÙŠÙ†', 'Users'),
(89, 'Modifier', 'ismail', 3, 'Articles (stock)', '2015-04-18 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„', 'Edit', 'Ø§Ù„Ø¨Ø¶Ø§Ø¦Ø¹', 'Goods (stock)'),
(90, 'Imprimer', 'administrateur', 1, 'EmployÃ©s', '2015-04-20 00:00:00', 'Ø·Ø¨Ø§Ø¹Ø©', 'Print', 'Ø§Ù„Ù…Ø³ØªØ®Ø¯Ù…ÙŠÙ†', 'Employees'),
(91, 'Imprimer', 'administrateur', 1, 'EmployÃ©s', '2015-04-24 00:00:00', 'Ø·Ø¨Ø§Ø¹Ø©', 'Print', 'Ø§Ù„Ù…Ø³ØªØ®Ø¯Ù…ÙŠÙ†', 'Employees'),
(92, 'Modifier les configurations', 'administrateur', 1, 'Configuration', '2015-04-24 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(93, 'Imprimer', 'administrateur', 1, 'EmployÃ©s', '2015-04-24 00:00:00', 'Ø·Ø¨Ø§Ø¹Ø©', 'Print', 'Ø§Ù„Ù…Ø³ØªØ®Ø¯Ù…ÙŠÙ†', 'Employees'),
(94, 'Imprimer', 'administrateur', 1, 'EmployÃ©s', '2015-04-24 00:00:00', 'Ø·Ø¨Ø§Ø¹Ø©', 'Print', 'Ø§Ù„Ù…Ø³ØªØ®Ø¯Ù…ÙŠÙ†', 'Employees'),
(95, 'Modifier', 'administrateur', 1, 'EmployÃ©s', '2015-04-24 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„', 'Edit', 'Ø§Ù„Ù…Ø³ØªØ®Ø¯Ù…ÙŠÙ†', 'Employees'),
(96, 'Ajouter', 'administrateur', 1, 'Utilisateurs', '2015-05-06 00:00:00', 'Ø¥Ø¶Ø§ÙØ©', 'Add', 'Ø§Ù„Ù…Ø³ØªØ®Ø¯Ù…ÙŠÙ†', 'Users'),
(97, 'Modifier', 'gestory', 4, 'EmployÃ©s', '2015-05-06 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„', 'Edit', 'Ø§Ù„Ù…Ø³ØªØ®Ø¯Ù…ÙŠÙ†', 'Employees'),
(98, 'Modifier les configurations', 'root', 1, 'Configuration', '2016-02-22 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(99, 'Modifier les configurations', 'root', 1, 'Configuration', '2016-02-22 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(100, 'Supprimer', 'root', 1, 'Demandes', '2016-02-23 00:00:00', 'Ø¥Ø²Ø§Ù„Ø©', 'Delete', 'Ø·Ù„Ø¨Ø§Øª', 'Requests'),
(101, 'Supprimer', 'root', 1, 'Demandes', '2016-02-23 00:00:00', 'Ø¥Ø²Ø§Ù„Ø©', 'Delete', 'Ø·Ù„Ø¨Ø§Øª', 'Requests'),
(102, 'Modifier les configurations', 'root', 1, 'Configuration', '2016-02-24 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(103, 'Imprimer liste', 'root', 1, 'Journale', '2016-02-24 00:00:00', 'Ø·Ø¨Ø§Ø¹Ø© Ù‚Ø§Ø¦Ù…Ø©', 'Print list', 'Ø¬Ø¯ÙˆÙ„ Ø§Ù„Ø¹Ù…Ù„ÙŠØ§Øª', 'Journal'),
(104, 'Ajouter', 'root', 1, 'Articles (stock)', '2016-03-05 00:00:00', 'Ø¥Ø¶Ø§ÙØ©', 'Add', 'Ø§Ù„Ø¨Ø¶Ø§Ø¦Ø¹', 'Goods (stock)'),
(105, 'Ajouter', 'root', 1, 'Articles (stock)', '2016-03-05 00:00:00', 'Ø¥Ø¶Ø§ÙØ©', 'Add', 'Ø§Ù„Ø¨Ø¶Ø§Ø¦Ø¹', 'Goods (stock)'),
(106, 'Supprimer', 'root', 1, 'Articles (stock)', '2016-03-05 00:00:00', 'Ø¥Ø²Ø§Ù„Ø©', 'Delete', 'Ø§Ù„Ø¨Ø¶Ø§Ø¦Ø¹', 'Goods (stock)'),
(107, 'Modifier les configurations', 'root', 1, 'Configuration', '2016-03-05 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(108, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-05 00:00:00', 'Ø·Ø¨Ø§Ø¹Ø© Ù‚Ø§Ø¦Ù…Ø©', 'Print list', 'Ø§Ù„Ø¨Ø¶Ø§Ø¦Ø¹', 'Goods (stock)'),
(109, 'Ajouter', 'root', 1, 'Articles (stock)', '2016-03-05 00:00:00', 'Ø¥Ø¶Ø§ÙØ©', 'Add', 'Ø§Ù„Ø¨Ø¶Ø§Ø¦Ø¹', 'Goods (stock)'),
(110, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-05 00:00:00', 'Ø·Ø¨Ø§Ø¹Ø© Ù‚Ø§Ø¦Ù…Ø©', 'Print list', 'Ø§Ù„Ø¨Ø¶Ø§Ø¦Ø¹', 'Goods (stock)'),
(111, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-05 00:00:00', 'Ø·Ø¨Ø§Ø¹Ø© Ù‚Ø§Ø¦Ù…Ø©', 'Print list', 'Ø§Ù„Ø¨Ø¶Ø§Ø¦Ø¹', 'Goods (stock)'),
(112, 'Modifier les configurations', 'root', 1, 'Configuration', '2016-03-05 00:00:00', 'ØªØ¹Ø¯ÙŠÙ„ Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Edit the configurations', 'Ø§Ù„Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª', 'Configuration'),
(113, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-05 00:00:00', 'Ø·Ø¨Ø§Ø¹Ø© Ù‚Ø§Ø¦Ù…Ø©', 'Print list', 'Ø§Ù„Ø¨Ø¶Ø§Ø¦Ø¹', 'Goods (stock)'),
(114, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-05 00:00:00', 'Ø·Ø¨Ø§Ø¹Ø© Ù‚Ø§Ø¦Ù…Ø©', 'Print list', 'Ø§Ù„Ø¨Ø¶Ø§Ø¦Ø¹', 'Goods (stock)'),
(115, 'Ajouter', 'root', 1, 'Articles (stock)', '2016-03-05 00:00:00', 'Ø¥Ø¶Ø§ÙØ©', 'Add', 'Ø§Ù„Ø¨Ø¶Ø§Ø¦Ø¹', 'Goods (stock)'),
(116, 'Imprimer', 'root', 1, 'Articles (stock)', '2016-03-05 00:00:00', 'Ø·Ø¨Ø§Ø¹Ø©', 'Print', 'Ø§Ù„Ø¨Ø¶Ø§Ø¦Ø¹', 'Goods (stock)'),
(117, 'Ajouter', 'root', 1, 'Journale', '2016-03-05 00:00:00', 'Ø¥Ø¶Ø§ÙØ©', 'Add', 'Ø¬Ø¯ÙˆÙ„ Ø§Ù„Ø¹Ù…Ù„ÙŠØ§Øª', 'Journal'),
(118, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-17 00:00:00', 'Ø·Ø¨Ø§Ø¹Ø© Ù‚Ø§Ø¦Ù…Ø©', 'Print list', 'Ø§Ù„Ø¨Ø¶Ø§Ø¦Ø¹', 'Goods (stock)'),
(119, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-17 00:00:00', 'Ø·Ø¨Ø§Ø¹Ø© Ù‚Ø§Ø¦Ù…Ø©', 'Print list', 'Ø§Ù„Ø¨Ø¶Ø§Ø¦Ø¹', 'Goods (stock)'),
(120, 'Ajouter', 'root', 1, 'Journale', '2016-03-23 00:00:00', 'إضافة', 'Add', 'جدول العمليات', 'Journal'),
(121, 'Ajouter', 'root', 1, 'Journale', '2016-03-23 12:18:50', 'إضافة', 'Add', 'جدول العمليات', 'Journal'),
(122, 'Imprimer', 'root', 1, 'Journale', '2016-03-23 12:19:24', 'طباعة', 'Print', 'جدول العمليات', 'Journal'),
(123, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-23 16:27:38', 'طباعة قائمة', 'Print list', 'البضائع', 'Goods (stock)'),
(124, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-23 16:29:33', 'طباعة قائمة', 'Print list', 'البضائع', 'Goods (stock)'),
(125, 'Modifier les configurations', 'root', 1, 'Configuration', '2016-03-25 09:11:21', 'تعديل الإعدادات', 'Edit the configurations', 'الإعدادات', 'Configuration'),
(126, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-25 09:11:32', 'طباعة قائمة', 'Print list', 'البضائع', 'Goods (stock)'),
(127, 'Supprimer', 'root', 1, 'Articles (stock)', '2016-03-25 09:16:18', 'إزالة', 'Delete', 'البضائع', 'Goods (stock)'),
(128, 'Supprimer', 'root', 1, 'Articles (stock)', '2016-03-25 09:16:20', 'إزالة', 'Delete', 'البضائع', 'Goods (stock)'),
(129, 'Supprimer', 'root', 1, 'Articles (stock)', '2016-03-25 09:16:21', 'إزالة', 'Delete', 'البضائع', 'Goods (stock)'),
(130, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-25 09:24:28', 'طباعة قائمة', 'Print list', 'البضائع', 'Goods (stock)'),
(131, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-25 09:24:34', 'طباعة قائمة', 'Print list', 'البضائع', 'Goods (stock)'),
(132, 'Supprimer', 'root', 1, 'Articles (stock)', '2016-03-25 09:24:49', 'إزالة', 'Delete', 'البضائع', 'Goods (stock)'),
(133, 'Supprimer', 'root', 1, 'Articles (stock)', '2016-03-25 09:24:50', 'إزالة', 'Delete', 'البضائع', 'Goods (stock)'),
(134, 'Supprimer', 'root', 1, 'Articles (stock)', '2016-03-25 09:24:51', 'إزالة', 'Delete', 'البضائع', 'Goods (stock)'),
(135, 'Supprimer', 'root', 1, 'Articles (stock)', '2016-03-25 09:24:52', 'إزالة', 'Delete', 'البضائع', 'Goods (stock)'),
(136, 'Supprimer', 'root', 1, 'Articles (stock)', '2016-03-25 09:24:53', 'إزالة', 'Delete', 'البضائع', 'Goods (stock)'),
(137, 'Supprimer', 'root', 1, 'Articles (stock)', '2016-03-25 09:24:54', 'إزالة', 'Delete', 'البضائع', 'Goods (stock)'),
(138, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-25 09:24:58', 'طباعة قائمة', 'Print list', 'البضائع', 'Goods (stock)'),
(139, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-25 09:25:31', 'طباعة قائمة', 'Print list', 'البضائع', 'Goods (stock)'),
(140, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-25 09:36:26', 'طباعة قائمة', 'Print list', 'البضائع', 'Goods (stock)'),
(141, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-25 09:36:35', 'طباعة قائمة', 'Print list', 'البضائع', 'Goods (stock)'),
(142, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-25 09:37:04', 'طباعة قائمة', 'Print list', 'البضائع', 'Goods (stock)'),
(143, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-25 09:38:29', 'طباعة قائمة', 'Print list', 'البضائع', 'Goods (stock)'),
(144, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-25 09:40:43', 'طباعة قائمة', 'Print list', 'البضائع', 'Goods (stock)'),
(145, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-25 09:41:18', 'طباعة قائمة', 'Print list', 'البضائع', 'Goods (stock)'),
(146, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-25 09:41:43', 'طباعة قائمة', 'Print list', 'البضائع', 'Goods (stock)'),
(147, 'Modifier les configurations', 'root', 1, 'Configuration', '2016-03-25 09:43:44', 'تعديل الإعدادات', 'Edit the configurations', 'الإعدادات', 'Configuration'),
(148, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-25 09:43:46', 'طباعة قائمة', 'Print list', 'البضائع', 'Goods (stock)'),
(149, 'Modifier les configurations', 'root', 1, 'Configuration', '2016-03-25 09:54:12', 'تعديل الإعدادات', 'Edit the configurations', 'الإعدادات', 'Configuration'),
(150, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-25 09:54:15', 'طباعة قائمة', 'Print list', 'البضائع', 'Goods (stock)'),
(151, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-25 09:56:58', 'طباعة قائمة', 'Print list', 'البضائع', 'Goods (stock)'),
(152, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-25 09:57:45', 'طباعة قائمة', 'Print list', 'البضائع', 'Goods (stock)'),
(153, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-25 09:57:55', 'طباعة قائمة', 'Print list', 'البضائع', 'Goods (stock)'),
(154, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-25 09:58:19', 'طباعة قائمة', 'Print list', 'البضائع', 'Goods (stock)'),
(155, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-25 09:59:54', 'طباعة قائمة', 'Print list', 'البضائع', 'Goods (stock)'),
(156, 'Modifier les configurations', 'root', 1, 'Configuration', '2016-03-25 10:01:37', 'تعديل الإعدادات', 'Edit the configurations', 'الإعدادات', 'Configuration'),
(157, 'Imprimer liste', 'root', 1, 'Articles (stock)', '2016-03-25 10:01:40', 'طباعة قائمة', 'Print list', 'البضائع', 'Goods (stock)'),
(158, 'Supprimer', 'root', 1, 'Localisations/Magasins', '2016-03-25 10:08:53', 'إزالة', 'Delete', 'أمكنة/مخازن', 'Locations/Stores'),
(159, 'Supprimer', 'root', 1, 'Localisations/Magasins', '2016-03-25 10:08:55', 'إزالة', 'Delete', 'أمكنة/مخازن', 'Locations/Stores'),
(160, 'Supprimer', 'root', 1, 'Localisations/Magasins', '2016-03-25 10:08:56', 'إزالة', 'Delete', 'أمكنة/مخازن', 'Locations/Stores'),
(161, 'Ajouter', 'root', 1, 'Localisations/Magasins', '2016-03-25 10:11:07', 'إضافة', 'Add', 'أمكنة/مخازن', 'Locations/Stores'),
(162, 'Supprimer un contact', 'root', 1, 'CRM et Contacts', '2016-03-25 10:12:41', 'إزالة جهة إتصال', 'Delete a contact', 'علاقات وعملاء', 'CRM and contacts'),
(163, 'Supprimer un contact', 'root', 1, 'CRM et Contacts', '2016-03-25 10:12:42', 'إزالة جهة إتصال', 'Delete a contact', 'علاقات وعملاء', 'CRM and contacts');

-- --------------------------------------------------------

--
-- Table structure for table `sgefactures`
--

CREATE TABLE IF NOT EXISTS `sgefactures` (
  `id` int(11) DEFAULT NULL,
  `nom` varchar(500) DEFAULT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `ladate` date DEFAULT NULL,
  `facture` text DEFAULT NULL,
  `tva1` float DEFAULT NULL,
  `tva2` float DEFAULT NULL,
  `frais` float DEFAULT NULL,
  `remise` float DEFAULT NULL,
  `infos` text DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `client_nom` varchar(100) DEFAULT NULL,
  `montant` float DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `devise` varchar(10) DEFAULT NULL,
  `etat` varchar(50) DEFAULT NULL,
  `datee` date DEFAULT NULL,
  `dater` date DEFAULT NULL,
  `commande_id` int(11) DEFAULT NULL,
  `commande_nom` varchar(500) DEFAULT NULL,
  `venteachat` varchar(100) DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgefactures`
--

INSERT INTO `sgefactures` (`id`, `nom`, `reference`, `ladate`, `facture`, `tva1`, `tva2`, `frais`, `remise`, `infos`, `type`, `client_id`, `client_nom`, `montant`, `user_id`, `devise`, `etat`, `datee`, `dater`, `commande_id`, `commande_nom`, `venteachat`, `pseudo`) VALUES
(1, 'Bon de livraison d''achat d''un logiciel de gestion', 'ueh45s5', '2015-01-27', '<table align="center" cellpadding="1" cellspacing="1">\r\n	<thead>\r\n		<tr>\r\n			<th scope="col">\r\n				<strong>QTE</strong></th>\r\n			<th scope="col">\r\n				<strong>Libell&eacute;</strong></th>\r\n			<th scope="col">\r\n				<strong>Description</strong></th>\r\n			<th scope="col">\r\n				Prix Unitaire</th>\r\n			<th scope="col">\r\n				Total</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	&nbsp;</p>\r\n', 8.5, 0, 20, 30, '', 'Facture', 1, 'Offre deals hotels', 581, 1, 'USD', 'RÃ©glÃ©e', '2015-01-19', '2015-01-24', 1, 'zqdeazde', 'Ventes', ''),
(2, 'dfdgdfgrtg', 'ref45', '2015-01-30', '<table align="center" cellpadding="1" cellspacing="1">\r\n	<thead>\r\n		<tr>\r\n			<th scope="col">\r\n				<strong>QTE</strong></th>\r\n			<th scope="col">\r\n				<strong>Libell&eacute;</strong></th>\r\n			<th scope="col">\r\n				<strong>Description</strong></th>\r\n			<th scope="col">\r\n				Prix Unitaire</th>\r\n			<th scope="col">\r\n				Total</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	&nbsp;</p>\r\n', 8.5, 0, 12, 3, '<p>\r\n	xfcsdx</p>\r\n', 'Facture', 7, 'Votre codeur', 150, 1, 'USD', 'Non rÃ©glÃ©e', '2015-01-30', '2015-01-30', 1, 'zqdeazde', 'Achats', ''),
(3, '04545', '0', '2015-01-30', '<table align="center" cellpadding="1" cellspacing="1">\r\n	<thead>\r\n		<tr>\r\n			<th scope="col">\r\n				<strong>QTE</strong></th>\r\n			<th scope="col">\r\n				<strong>Libell&eacute;</strong></th>\r\n			<th scope="col">\r\n				<strong>Description</strong></th>\r\n			<th scope="col">\r\n				Prix Unitaire</th>\r\n			<th scope="col">\r\n				Total</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	&nbsp;</p>\r\n', 8.5, 0, 0, 0, '', 'Bon de livraison', 2, 'mohamed ', 0, 1, 'USD', 'RÃ©glÃ©e', '2015-01-30', '2015-01-30', 1, 'qsdfgvh', 'Ventes', ''),
(4, 'swqfsdf', '757', '2015-01-30', '<table align="center" cellpadding="1" cellspacing="1">\r\n	<thead>\r\n		<tr>\r\n			<th scope="col">\r\n				<strong>QTE</strong></th>\r\n			<th scope="col">\r\n				<strong>Libell&eacute;</strong></th>\r\n			<th scope="col">\r\n				<strong>Description</strong></th>\r\n			<th scope="col">\r\n				Prix Unitaire</th>\r\n			<th scope="col">\r\n				Total</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	&nbsp;</p>\r\n', 8.5, 0, 10, 5, '', 'Bon de rÃ©ception', 2, 'Votre codeur', 54, 1, 'USD', 'RÃ©glÃ©e', '2015-01-30', '2015-01-30', 1, 'qsdfgvh', 'Achats', ''),
(5, 'intitule', 'ref4541', '2015-03-02', '', 8.5, 0, 0, 2, '', 'Bon de livraison', 3, 'mohamed ', 500, 1, 'USD', 'RÃ©glÃ©e', '0000-00-00', '2015-03-02', 7, 'c''est une belle commande', 'Ventes', ''),
(6, 'fdgd', 'fghfg', '2015-03-03', '', 8.5, 0, 0, 0, '', 'Facture', 1, 'Offre deals hotels', 0, 1, 'USD', 'Non rÃ©glÃ©e', '0000-00-00', '2015-03-03', 1, 'zqdeazde', 'Ventes', ''),
(7, 'facture de ventre de PC portable', 'pc45', '2015-04-07', '', 8.5, 0, 0, 5, '', 'Facture', 1, 'Offre deals hotels', 325, 1, 'DH', 'RÃ©glÃ©e', '0000-00-00', '2015-04-07', 1, 'zqdeazde', 'Ventes', '');

-- --------------------------------------------------------

--
-- Table structure for table `sgeinventaires`
--

CREATE TABLE IF NOT EXISTS `sgeinventaires` (
  `id` int(11) DEFAULT NULL,
  `nom` varchar(500) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `infos` text DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `user_id` int(11) DEFAULT '1',
  `prix` float DEFAULT NULL,
  `piece_id` int(11) DEFAULT NULL,
  `piece_nom` varchar(250) DEFAULT NULL,
  `fournisseur_id` int(11) DEFAULT NULL,
  `fournisseur_nom` varchar(500) DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL,
  `qte` float DEFAULT NULL,
  `imputation_id` int(11) DEFAULT NULL,
  `marque_id` int(11) DEFAULT NULL,
  `famille_id` int(11) DEFAULT NULL,
  `imputation_nom` varchar(500) DEFAULT NULL,
  `marque_nom` varchar(500) DEFAULT NULL,
  `famille_nom` varchar(500) DEFAULT NULL,
  `fabricant_id` int(11) DEFAULT NULL,
  `fabricant_nom` varchar(500) DEFAULT NULL,
  `conditionnement` varchar(500) DEFAULT NULL,
  `designation` varchar(500) DEFAULT NULL,
  `unite` varchar(50) DEFAULT NULL,
  `reffabricant` varchar(100) DEFAULT NULL,
  `poids` varchar(50) DEFAULT NULL,
  `volume` varchar(50) DEFAULT NULL,
  `critique` varchar(100) DEFAULT NULL,
  `min` float DEFAULT NULL,
  `max` float DEFAULT NULL,
  `sec` float DEFAULT NULL,
  `bsortie` varchar(50) DEFAULT NULL,
  `bentree` varchar(50) DEFAULT NULL,
  `taillelot` varchar(50) DEFAULT NULL,
  `emplacement` varchar(50) DEFAULT NULL,
  `dated` date DEFAULT NULL,
  `datef` date DEFAULT NULL,
  `danger` varchar(100) DEFAULT NULL,
  `prixv` float DEFAULT NULL,
  `facture_id` int(11) DEFAULT NULL,
  `facture_nom` varchar(500) DEFAULT NULL,
  `etat` varchar(100) DEFAULT NULL,
  `contratg_nom` varchar(500) DEFAULT NULL,
  `contratm_nom` varchar(500) DEFAULT NULL,
  `contrata_nom` varchar(500) DEFAULT NULL,
  `contratl_nom` varchar(500) DEFAULT NULL,
  `contratg_id` int(11) DEFAULT NULL,
  `contratm_id` int(11) DEFAULT NULL,
  `contrata_id` int(11) DEFAULT NULL,
  `contratl_id` int(11) DEFAULT NULL,
  `niveau` varchar(100) DEFAULT NULL,
  `categorie` varchar(100) DEFAULT NULL,
  `cout` float DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgeinventaires`
--

INSERT INTO `sgeinventaires` (`id`, `nom`, `date`, `infos`, `created`, `modified`, `user_id`, `prix`, `piece_id`, `piece_nom`, `fournisseur_id`, `fournisseur_nom`, `ref`, `qte`, `imputation_id`, `marque_id`, `famille_id`, `imputation_nom`, `marque_nom`, `famille_nom`, `fabricant_id`, `fabricant_nom`, `conditionnement`, `designation`, `unite`, `reffabricant`, `poids`, `volume`, `critique`, `min`, `max`, `sec`, `bsortie`, `bentree`, `taillelot`, `emplacement`, `dated`, `datef`, `danger`, `prixv`, `facture_id`, `facture_nom`, `etat`, `contratg_nom`, `contratm_nom`, `contrata_nom`, `contratl_nom`, `contratg_id`, `contratm_id`, `contrata_id`, `contratl_id`, `niveau`, `categorie`, `cout`, `pseudo`) VALUES
(1, 'libelle1', '2015-01-21', '<p>\r\n	sdfsdf</p>\r\n', '2015-01-21', '2015-03-01', 1, 50.7833, 2, 'Magazin principale', 2, 'Votre codeur', 'ref1', 15, 0, 5, 9, '', 'marq f', 'famille4854', 6, 'sdsdsd', '', 'designation', '', 'reffab1', '', '', '', 0, 0, 0, '', '', '', 'sdfsd', '0000-00-00', '0000-00-00', '', 88, 1, 'Bon de livraison d''achat d''un logiciel de gestion', 'Bon', 'contrat de test 1', 'gerzf', 'aucun', 'aucun', 1, 3, 0, 0, 'Grande valeur', 'Meubles', 761.75, ''),
(2, 'csdc', '0000-00-00', '<p>\r\n	pas de d&eacute;tails</p>\r\n', '2015-01-24', '2015-01-24', 1, 500, 1, 'ddddddddddddd', 2, 'Votre codeur', 'ref2', 10, 0, 5, 9, '', 'marq f', 'famille4854', 6, 'sdsdsd', '', 'wscs', '', 'reffab2', '', '', '', 0, 0, 0, '', '', '', 'cd 15', '0000-00-00', '0000-00-00', '', 200, 1, 'facture d''achat d''un logiciel de gestion', 'Moyen', 'contrat de test 1', 'aucun', 'aucun', 'aucun', 1, 0, 0, 0, 'Standard', 'EletromÃ©nager', 0, ''),
(3, 'test 3', '0000-00-00', '<p>\r\n	pas de d&eacute;tails</p>\r\n', '2015-01-24', '2015-01-24', 1, 0, 1, 'ddddddddddddd', 2, 'Votre codeur', 'ref25', 0, 0, 5, 9, '', 'marq f', 'famille4854', 6, 'sdsdsd', '', 'wscs', '', 'reffab2', '', '', '', 0, 0, 0, '', '', '', 'cd 15', '0000-00-00', '0000-00-00', '', 0, 1, 'facture d''achat d''un logiciel de gestion', 'Moyen', 'contrat de test 1', 'aucun', 'aucun', 'aucun', 1, 0, 0, 0, 'Standard', 'EletromÃ©nager', 0, ''),
(4, 'test 4', '0000-00-00', '<p>\r\n	pas de d&eacute;tails</p>\r\n', '2015-01-24', '2015-01-24', 1, 0, 1, 'ddddddddddddd', 2, 'Votre codeur', 'ref88', 0, 0, 5, 9, '', 'marq f', 'famille4854', 6, 'sdsdsd', '', 'wscs', '', 'reffab2', '', '', '', 0, 0, 0, '', '', '', 'cd 15', '0000-00-00', '0000-00-00', '', 0, 1, 'facture d''achat d''un logiciel de gestion', 'Moyen', 'contrat de test 1', 'aucun', 'aucun', 'aucun', 1, 0, 0, 0, 'Standard', 'EletromÃ©nager', 0, ''),
(5, 'test 4', '0000-00-00', '<p>\r\n	pas de d&eacute;tails</p>\r\n', '2015-01-24', '2015-01-24', 1, 0, 1, 'ddddddddddddd', 4, 'sqdsqdq', 'reff7', 0, 0, 5, 9, '', 'marq f', 'famille4854', 6, 'sdsdsd', '', 'wscs', '', 'reffab2', '', '', '', 0, 0, 0, '', '', '', 'cd 15', '0000-00-00', '0000-00-00', '', 0, 1, 'facture d''achat d''un logiciel de gestion', 'Moyen', 'contrat de test 1', 'aucun', 'aucun', 'aucun', 1, 0, 0, 0, 'Standard', 'EletromÃ©nager', 0, ''),
(6, 'toyota 4*4', '0000-00-00', '', '2015-01-30', '2015-02-08', 2, 784, 2, 'Magazin principale', 2, 'Votre codeur', 's4d55sd', 1, 0, 5, 1, '', 'marq f', 'famille 1', 6, 'sdsdsd', '', 'modele de  454 test', '', 'ref54858', '', '', '', 0, 0, 0, '', '', '', 'territoire 45', '0000-00-00', '0000-00-00', '', 700000, 1, 'facture d''achat d''un logiciel de gestion', 'TrÃ¨s bon', 'aucun', 'aucun', 'aucun', 'aucun', 0, 0, 0, 0, 'Grande valeur', 'VÃ©hicule', 784, '');

-- --------------------------------------------------------

--
-- Table structure for table `sgeitems`
--

CREATE TABLE IF NOT EXISTS `sgeitems` (
  `id` int(11) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL,
  `qte` float DEFAULT NULL,
  `desc` varchar(500) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `typeitem` varchar(100) DEFAULT NULL,
  `refitem` varchar(100) DEFAULT NULL,
  `typex` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgeitems`
--

INSERT INTO `sgeitems` (`id`, `type`, `ref`, `qte`, `desc`, `prix`, `typeitem`, `refitem`, `typex`) VALUES
(1, 'commande', '2', 15, 'article de test', 100, 'stock', '1', 'A envoyer'),
(2, 'commande', 'cmd321', 5, 'article de test', 54, 'Article du stock', 'SDF5445', 'A envoyer'),
(3, 'commande', 'cmd321', 3, 'Fresh Liste Mail FranÃ§aise 16 K - AXA', 500, 'Produit du site', '', 'A envoyer'),
(4, 'commande', 'cmd321', 3, 'Fresh Liste Mail FranÃ§aise 16 K - AXA', 500, 'Produit du site', '', 'A envoyer'),
(10, 'commande', 'cmd8754', 1, 'article de test', 54, 'Article du stock', 'SDF5445', 'A envoyer'),
(11, 'commande', 'cmd8754', 2, 'article de test', 54, 'Article du stock', 'SDF5445', 'A envoyer'),
(12, 'commande', 'cmd8754', 1, 'SOVQ Le System d Organisation de vie Quotidienne', 1500, 'Produit du site', '', 'A envoyer'),
(13, 'facture', 'ueh45s5', 1, 'article de test', 65, 'Article du stock', 'SDF5445', 'Facture'),
(14, 'facture', 'ref45', 1, 'Fresh Liste Mail FranÃ§aise 16 K - AXA', 500, 'Produit du site', '', 'Bon de livraison'),
(15, 'facture', 'ref45', 1, 'Fresh Liste Mail FranÃ§aise 16 K - AXA', 500, 'Produit du site', '', 'Bon de livraison'),
(16, 'facture', 'ref4541', 1, 'Fresh Liste Mail FranÃ§aise 16 K - AXA', 500, 'Produit du site', '', 'Bon de livraison'),
(19, 'devis', 'ref123', 1, 'Base de DonnÃ©es - Afrique du Sud Avec tout les informations', 300, 'Produit du site', '', 'Devis'),
(23, 'devis', 'ec54520', 15, 'PC portables', 9.8, 'Article du stock', 'Vh451', 'Devis'),
(24, 'devis', 'ec54520', 15, 'PC portables', 9.8, 'Article du stock', 'Vh451', 'Devis'),
(25, 'facture', 'fghfg', 1, 'KNJ?KJ,;,njkhj', 0, 'Article du stock', 'dfgdfg784', 'Facture'),
(26, 'facture', 'fghfg', 1, 'KNJ?KJ,;,njkhj', 0, 'Article du stock', 'dfgdfg784', 'Facture'),
(27, 'facture', 'pc45', 5, 'article de test', 65, 'Article du stock', 'SDF5445', 'Facture');

-- --------------------------------------------------------

--
-- Table structure for table `sgekilometrages`
--

CREATE TABLE IF NOT EXISTS `sgekilometrages` (
  `id` int(11) DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL,
  `inventaire_id` int(11) DEFAULT NULL,
  `inventaire_nom` varchar(500) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `voyageurs` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `trajet` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `depart` float DEFAULT NULL,
  `arrivee` float DEFAULT NULL,
  `distance` float DEFAULT NULL,
  `taux` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgekilometrages`
--

INSERT INTO `sgekilometrages` (`id`, `ref`, `inventaire_id`, `inventaire_nom`, `type`, `voyageurs`, `date`, `trajet`, `description`, `depart`, `arrivee`, `distance`, `taux`, `total`, `user_id`, `pseudo`) VALUES
(1, 'ref123', 6, 'toyota 4*4', 'professionnelle', 5, '2015-02-24', 'casa_kech', 'circuit 5/6', 8451.27, 9580.54, 1129.27, 5, 5646.35, 0, ''),
(2, 'ref78', 6, 'toyota 4*4', 'personnelle', 3, '2015-02-24', 'kech - ouarzazat', 'aucun', 45123, 45560, 437, 7.2, 3146.4, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `sgemaintenances`
--

CREATE TABLE IF NOT EXISTS `sgemaintenances` (
  `id` int(11) DEFAULT NULL,
  `nom` varchar(500) DEFAULT NULL,
  `infos` text DEFAULT NULL,
  `dated` date DEFAULT NULL,
  `datef` date DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `user_id` int(11) DEFAULT '1',
  `materiel_id` int(11) DEFAULT NULL,
  `materiel_nom` varchar(200) DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgemaintenances`
--

INSERT INTO `sgemaintenances` (`id`, `nom`, `infos`, `dated`, `datef`, `created`, `modified`, `user_id`, `materiel_id`, `materiel_nom`, `ref`, `pseudo`) VALUES
(1, 'qssqdqds', '<p>\r\n	sqdqsdsqdsqdqsdqsd</p>\r\n', '2015-01-20', '2015-01-20', '2015-01-20', '2015-01-20', 1, 1, 'article de test', '', ''),
(2, 'Maintenance trimistre', '<p>\r\n	-traitement des dossiers</p>\r\n<p>\r\n	-exportation des fichies</p>\r\n<p>\r\n	-mainytdfdsf.....</p>\r\n', '2015-02-05', '2015-02-08', '2015-02-04', '2015-02-04', 1, 5, 'gazole N 5', '', ''),
(3, 'test', '', '2015-02-04', '2015-02-10', '2015-02-04', '2015-02-04', 1, 1, 'article de test', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sgemateriels`
--

CREATE TABLE IF NOT EXISTS `sgemateriels` (
  `id` int(11) DEFAULT NULL,
  `nom` varchar(500) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `infos` text DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `user_id` int(11) DEFAULT '1',
  `prix` float DEFAULT NULL,
  `piece_id` int(11) DEFAULT NULL,
  `piece_nom` varchar(250) DEFAULT NULL,
  `fournisseur_id` int(11) DEFAULT NULL,
  `fournisseur_nom` varchar(500) DEFAULT NULL,
  `commande_id` int(11) DEFAULT NULL,
  `commande_nom` varchar(500) DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL,
  `qte` float DEFAULT NULL,
  `imputation_id` int(11) DEFAULT NULL,
  `marque_id` int(11) DEFAULT NULL,
  `famille_id` int(11) DEFAULT NULL,
  `imputation_nom` varchar(500) DEFAULT NULL,
  `marque_nom` varchar(500) DEFAULT NULL,
  `famille_nom` varchar(500) DEFAULT NULL,
  `fabricant_id` int(11) DEFAULT NULL,
  `fabricant_nom` varchar(500) DEFAULT NULL,
  `conditionnement` varchar(500) DEFAULT NULL,
  `designation` varchar(500) DEFAULT NULL,
  `unite` varchar(50) DEFAULT NULL,
  `reffabricant` varchar(100) DEFAULT NULL,
  `poids` varchar(50) DEFAULT NULL,
  `volume` varchar(50) DEFAULT NULL,
  `critique` varchar(100) DEFAULT NULL,
  `min` float DEFAULT NULL,
  `max` float DEFAULT NULL,
  `sec` float DEFAULT NULL,
  `bsortie` varchar(50) DEFAULT NULL,
  `bentree` varchar(50) DEFAULT NULL,
  `taillelot` varchar(50) DEFAULT NULL,
  `emplacement` varchar(50) DEFAULT NULL,
  `dated` date DEFAULT NULL,
  `datef` date DEFAULT NULL,
  `danger` varchar(100) DEFAULT NULL,
  `prixv` float DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `cout` float DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL,
  `typemateriel` varchar(250) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sgemises`
--

CREATE TABLE IF NOT EXISTS `sgemises` (
  `id` int(11) DEFAULT NULL,
  `nom` varchar(500) DEFAULT NULL,
  `lien` varchar(500) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgemises`
--

INSERT INTO `sgemises` (`id`, `nom`, `lien`, `user_id`) VALUES
(2, 'sqd', 'http://blog.votrecodeur.com/2015/01/cartes-postales-peuvent-ils-etre-aussi.html', 0),
(3, 'hhhh', 'http://blog.votrecodeur.com/2015/01/cartes-postales-peuvent-ils-etre-aussi.html', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sgepaies`
--

CREATE TABLE IF NOT EXISTS `sgepaies` (
  `id` int(11) DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL,
  `mensuel` float DEFAULT NULL,
  `conges` float DEFAULT NULL,
  `noncotisations` float DEFAULT NULL,
  `salariales` float DEFAULT NULL,
  `autre` float DEFAULT NULL,
  `patronales` float DEFAULT NULL,
  `heures` float DEFAULT NULL,
  `euros` float DEFAULT NULL,
  `imposable` float DEFAULT NULL,
  `congesdumois` varchar(100) DEFAULT NULL,
  `congesacquis` int(11) DEFAULT NULL,
  `rttacquis` int(11) DEFAULT NULL,
  `collective` text DEFAULT NULL,
  `coefficient` varchar(50) DEFAULT NULL,
  `classification` varchar(50) DEFAULT NULL,
  `lieu` text DEFAULT NULL,
  `infos` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `datep` date DEFAULT NULL,
  `employe_nom` varchar(500) DEFAULT NULL,
  `employe_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgepaies`
--

INSERT INTO `sgepaies` (`id`, `ref`, `mensuel`, `conges`, `noncotisations`, `salariales`, `autre`, `patronales`, `heures`, `euros`, `imposable`, `congesdumois`, `congesacquis`, `rttacquis`, `collective`, `coefficient`, `classification`, `lieu`, `infos`, `date`, `datep`, `employe_nom`, `employe_id`, `user_id`, `pseudo`) VALUES
(2, 'ref45', 45650, 0, 45, 12, 78, 1854, 174.3, 10, 1988, 'NÃ©ant', 15, 3, '<p>\r\n	-Employ&eacute;s: Mohamed abdellah, karim hmadi, issam bouadain</p>\r\n<p>\r\n	-Taches: tous ce que concene la gestion de stock et&nbsp; controle d&#39;entrees/sorties</p>\r\n', 'II5', '421', '<p>\r\n	guiliz N785 Rue Molay sbiai</p>\r\n', '<p>\r\n	DOCUMENT A CONSERVER SANS LIMITATION DE DUREE</p>\r\n', '2015-02-01', '2015-02-05', 'nasser', 1, 0, ''),
(3, 'ref78', 45650, 745, 123, 98, 749, 1800, 458, 8.8, 1754, '12/05 - 08/11 - 25/01', 5, 2, '<p>\r\n	<strong>-Employ&eacute;s: Mohamed abdellah, karim hmadi, issam bouadain</strong></p>\r\n<p>\r\n	<strong>-Taches: tous ce que concene la gestion de stock et&nbsp; controle d&#39;entrees/sorties</strong></p>\r\n', 'JI1', '74', '<p>\r\n	bellaaguide, 57 PB 8</p>\r\n', '<p>\r\n	DOCUMENT A CONSERVER SANS LIMITATION DE DUREE</p>\r\n', '2015-02-19', '2015-02-21', 'nasser', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `sgepieces`
--

CREATE TABLE IF NOT EXISTS `sgepieces` (
  `id` int(11) DEFAULT NULL,
  `nom` varchar(500) DEFAULT NULL,
  `espace` int(11) DEFAULT NULL,
  `infos` text DEFAULT NULL,
  `etage` int(11) DEFAULT NULL,
  `porte` int(11) DEFAULT NULL,
  `immeuble` varchar(250) DEFAULT NULL,
  `adresse` varchar(500) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL DEFAULT '0',
  `type` varchar(500) DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgepieces`
--

INSERT INTO `sgepieces` (`id`, `nom`, `espace`, `infos`, `etage`, `porte`, `immeuble`, `adresse`, `user_id`, `type`, `pseudo`) VALUES
(5, 'Dépot', 0, '', 0, 0, '', '_', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sgeprimes`
--

CREATE TABLE IF NOT EXISTS `sgeprimes` (
  `prime` float DEFAULT NULL,
  `date` date DEFAULT NULL,
  `employe_id` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `employe_nom` varchar(200) DEFAULT NULL,
  `nom` varchar(500) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgeprimes`
--

INSERT INTO `sgeprimes` (`prime`, `date`, `employe_id`, `id`, `created`, `employe_nom`, `nom`, `user_id`, `ref`, `pseudo`) VALUES
(45, '2015-01-19', 1, 1, '2015-01-19', 'nasser', 'ssssssssssssssssss', 1, '', ''),
(780, '2015-01-30', 1, 2, '2015-01-30', 'nasser', 'ee', 1, '', ''),
(745, '2015-02-11', 1, 3, '2015-02-11', 'nasser', 'prime 475', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sgeproduits`
--

CREATE TABLE IF NOT EXISTS `sgeproduits` (
  `id` int(11) DEFAULT NULL,
  `titre` varchar(300) DEFAULT NULL,
  `produit` text DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `desc` varchar(500) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `etat` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgeproduits`
--

INSERT INTO `sgeproduits` (`id`, `titre`, `produit`, `image`, `desc`, `prix`, `user_id`, `etat`, `created`, `ref`, `pseudo`) VALUES
(17, 'Fresh Liste Mail FranÃ§aise 16 K - AXA', '<p>\r\n	<span style="font-size:20px;">Cette liste est unique (fresh) et distinctif, car il est d&#39;un seul type et d&#39;un seul pays.<br />\r\n	La liste est 100% fran&ccedil;ais (exactement d&#39;Axa).</span></p>\r\n<p>\r\n	<br />\r\n	<span style="font-size:20px;">Les Principaux fournisseurs d&#39;Emails:</span><br />\r\n	&nbsp;</p>\r\n<table border="1" cellpadding="1" cellspacing="1" height="125" width="655">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				@wanadoo.fr<br />\r\n				@accor.com<br />\r\n				@campanile.fr<br />\r\n				@free.fr<br />\r\n				@aol.com<br />\r\n				@neuf.fr<br />\r\n				@bbox.fr<br />\r\n				@aliceadsl.fr</td>\r\n			<td>\r\n				@laposte.net<br />\r\n				@orange.fr<br />\r\n				@yahoo.fr<br />\r\n				@gmail.com<br />\r\n				@banque-france.fr<br />\r\n				@club-internet.fr<br />\r\n				@sfr.fr<br />\r\n				@voila.fr</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	<br />\r\n	<span style="font-size:20px;">Le Nombre d&#39;Adresses emails: <span style="color:#ff0000;">16515 Email</span></span></p>\r\n<p>\r\n	<img alt="Fresh Liste Mail FranÃ§aise 16 K d''AXA- Fresh French Database Mailing List 16K" src="/app/webroot/img/finderimages/donnÃ©es/Bases_de_DennÃ©es_Mails_Lists/Fresh Liste Mail FranÃ§aise 80 K d''AXA- Fresh French Database Mailing List 80K.png" style="height: 300px; width: 800px;" /></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="font-size:20px;">Le Type de Fichier: <span style="color:#ff0000;">TEXT</span></span></p>\r\n<p>\r\n	<span style="font-size:14px;"><span style="color: rgb(255, 0, 0);">Remarque: Si vous &ecirc;tes besoin d&#39;extraire les emails dans une liste (chaque email par line), vous pouvez utiliser ce logiciel: <a href="http://www.votrecodeur.com/features/view/13/ExtracteurEmails_Extracteur_des_adresses_mails" target="_blank"><strong>Extracteur des adresses mails</strong></a></span></span></p>\r\n', 'img/finderimages/images_localisations/ListeEmail.jpeg', 'TrÃ©s grand Liste Mail de clients - axa', 500, 1, 1, '2015-01-10', 'p45', ''),
(18, 'Base de DonnÃ©es - Afrique du Sud Avec tout les informations', '<p>\r\n	<span style="font-size:18px;"><span style="font-size:18px;">Cette une base de donn&eacute;es contient les information de contact (Email, T&eacute;l&eacute;phones.. etc) des m&eacute;decins d&#39;Afrique du Sud, prise une base de donn&eacute;es pour un site Ecommerce dans le m&ecirc;me pays.</span><br />\r\n	Les informations disponibles pour les personnes sont les suivantes:</span></p>\r\n<table border="1" cellpadding="1" cellspacing="1" style="width: 600px;">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<span style="color:#ff0000;"><span style="font-size: 14px;"><strong>&nbsp; -id<br />\r\n				&nbsp; -ColourCode<br />\r\n				&nbsp; -Doc_Full_Name<br />\r\n				&nbsp; -RecActive<br />\r\n				&nbsp; -Doc_Ref<br />\r\n				&nbsp; -Title<br />\r\n				&nbsp; -Inits<br />\r\n				&nbsp; -FirstNames<br />\r\n				&nbsp; -Surname<br />\r\n				&nbsp; -NatID<br />\r\n				&nbsp; -Organisation<br />\r\n				&nbsp; -Specialist<br />\r\n				&nbsp; -Email<br />\r\n				&nbsp; -EmailCC<br />\r\n				&nbsp; -Tel<br />\r\n				&nbsp; -Cell<br />\r\n				&nbsp; -Fax<br />\r\n				&nbsp; -PracticeNo<br />\r\n				&nbsp; -Comments<br />\r\n				&nbsp; -U_Name<br />\r\n				&nbsp; -U_AccessLevel<br />\r\n				&nbsp; -ShowCannedComments<br />\r\n				&nbsp; -RouteColour<br />\r\n				&nbsp; -ReportAction<br />\r\n				&nbsp; -StatAction<br />\r\n				&nbsp; -EMailReport<br />\r\n				&nbsp; -DefaultReport<br />\r\n				&nbsp; -DefaultReportMicro<br />\r\n				<span style="color:#ff0000;"><span style="font-size: 14px;"><strong>&nbsp; -MeditechDoctorMne<br />\r\n				&nbsp; -GraphPref<br />\r\n				&nbsp; -CreatedOn<br />\r\n				&nbsp; -CreatedBy<br />\r\n				&nbsp; -UpdatedOn<br />\r\n				&nbsp; -UpdatedBy</strong></span></span></strong></span></span></td>\r\n			<td>\r\n				<span style="color:#ff0000;"><span style="font-size: 14px;"><strong>&nbsp; -LanguagePref<br />\r\n				&nbsp; -InternetUserID<br />\r\n				&nbsp; -InternetAdmin<br />\r\n				&nbsp; -House<br />\r\n				&nbsp; -Branch<br />\r\n				&nbsp; -Underwriter<br />\r\n				&nbsp; -InternalRef<br />\r\n				&nbsp; -InternetCode<br />\r\n				&nbsp; -PhysAdd1<br />\r\n				&nbsp; -PhysAdd2<br />\r\n				&nbsp; -PhysAdd3<br />\r\n				&nbsp; -PhysAdd4<br />\r\n				&nbsp; -PostAdd1<br />\r\n				&nbsp; -PostAdd2<br />\r\n				&nbsp; -PostAdd3<br />\r\n				&nbsp; -PostAdd4<br />\r\n				&nbsp; -Credentials<br />\r\n				&nbsp; -DefPrt<br />\r\n				&nbsp; -IncludeInAuth<br />\r\n				&nbsp; -ReportFinal<br />\r\n				&nbsp; -ReportPrelim<br />\r\n				&nbsp; -FillLastPage<br />\r\n				&nbsp; -SeeProfiles<br />\r\n				&nbsp; -DisciplineCode<br />\r\n				&nbsp; -DocName<br />\r\n				&nbsp; -Doc_RefOld<br />\r\n				&nbsp; -UpdatedByOld<br />\r\n				&nbsp; -CreatedByOld<br />\r\n				&nbsp; -AtWork<br />\r\n				&nbsp; -SMSPrompt<br />\r\n				&nbsp; -SMSComment<br />\r\n				&nbsp; -Replication<br />\r\n				&nbsp; -AlwaysSMSAsCopyDoc<br />\r\n				&nbsp; -LangPref</strong></span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	<br />\r\n	<span style="color:#ff0000;"><span style="font-size: 14px;"><strong>&nbsp;<br />\r\n	&nbsp; </strong></span></span></p>\r\n<p>\r\n	<span style="font-size:20px;">Total d&#39;Email adresses:<span style="color:#ff0000;"> 2322 Email</span></span></p>\r\n<p>\r\n	<span style="font-size:20px;">Type de fichier: <span style="color:#ff0000;">SQL</span></span></p>\r\n<p>\r\n	<span style="font-size:20px;">Taille de fichier: <span style="color:#ff0000;">1159 KO (1,159 MB)</span></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="font-size:14px;"><span style="color: rgb(255, 0, 0);">Remarque: Si vous &ecirc;tes besoin d&#39;extraire les emails dans une liste (chaque email par line), vous pouvez utiliser ce logiciel: <a href="http://www.votrecodeur.com/features/view/13/ExtracteurEmails_Extracteur_des_adresses_mails" target="_blank"><strong>Extracteur des adresses mails</strong></a></span></span></p>\r\n<div id="stcpDiv" style="position: absolute; top: -1999px; left: -1988px;">\r\n	<div id="tu">\r\n		<h2>\r\n			&nbsp;</h2>\r\n		
<p>\r\n			<a href="http://www.votrecodeur.com/features/view/13/ExtracteurEmails_Extracteur_des_adresses_mails" name="#how">Nos logiciel exclusifs: ExtracteurEmails : Extracteur des adresses mails</a></p>\r\n	</div>\r\n	- See more at: http://www.votrecodeur.com/#sthash.NTQ4u0IC.dpuf</div>\r\n', 'img/finderimages/produits/produit2.png', 'Base de donnÃ©es de type Ecommerce-Marketing', 300, 1, 1, '2015-01-10', 'p89', ''),
(19, 'SOVQ Le System d Organisation de vie Quotidienne', '<p style="text-align: center;">\r\n	<img alt="PRESENTATION GENERALE DU SYSTEM DE GESTION DE VIE QUOTIDIENNE SOVQ" src="/app/webroot/img/finderimages/logiciels/sovq/famille.jpg" style="width: 800px; height: 293px;" /></p>\r\n<p>\r\n	<span style="font-size:18px;"><strong>C&rsquo;est un logiciel qui permet de g&eacute;rer les composants les plus importants de votre vie, aux but de gagner le temps, simplifier et informatis&eacute; les choses dans la vie quotidienne, a partir les &eacute;v&egrave;nements dans vos ordinateurs et l&rsquo;agenda de vos rendez-vous jusqu&rsquo;&agrave; le contr&ocirc;le des activit&eacute;s des travaux et familles.</strong></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<h3>\r\n	<a href="http://www.votrecodeur.com/telechargements/SOVQ_Le%20System_d_Organisation_de_vie_Quotidienne.pdf" target="_blank"><span style="color:#008000;">T&eacute;l&eacute;charger le documentation complete en PDF</span></a></h3>\r\n<p>\r\n	&nbsp;</p>\r\n<h3>\r\n	<span style="font-size:22px;"><span style="color: rgb(178, 34, 34);">Intitul&eacute; du logiciel</span></span></h3>\r\n<ul>\r\n	<li>\r\n		<span style="font-size:14px;"><strong>Gestion de logs</strong></span></li>\r\n	<li>\r\n		<span style="font-size:14px;"><strong>Gestion de travail</strong></span></li>\r\n	<li>\r\n		<span style="font-size:14px;"><strong>Gestion de maison</strong></span></li>\r\n	<li>\r\n		<span style="font-size:14px;"><strong>Agenda</strong></span></li>\r\n	<li>\r\n		<span style="font-size:14px;"><strong>Client contacteur</strong></span></li>\r\n	<li>\r\n		<span style="font-size:14px;"><strong>Gestion programmes pr&eacute;f&eacute;rer</strong></span></li>\r\n	<li>\r\n		<span style="font-size:14px;"><strong>Gestion des comptes</strong></span></li>\r\n</ul>\r\n<p>\r\n	&nbsp;</p>\r\n<h3>\r\n	<span style="font-size:22px;"><span style="color: rgb(178, 34, 34);">Fonctionnalit&eacute;s et roles dans le Logiciel</span></span></h3>\r\n<h3 style="margin-bottom: 0cm;">\r\n	<span style="color:#0000cd;"><b>System&nbsp;:</b></span></h3>\r\n<ul>\r\n	<li>\r\n		Enregistrer les logs (&eacute;v&egrave;nements de d&eacute;marrage d&rsquo;ordinateur et l&rsquo;application).</li>\r\n	<li>\r\n		Se connecter au serveur pour v&eacute;rifier les mises &agrave; jour.</li>\r\n</ul>\r\n<h3 style="margin-bottom: 0cm;">\r\n	<span style="color:#0000cd;"><b>Les administrateurs :</b></span></h3>\r\n<ul>\r\n	<li>\r\n		<p style="margin-bottom: 0cm">\r\n			Se connecter (Via l&rsquo;acc&egrave;s professionnel).</p>\r\n	</li>\r\n	<li>\r\n		<p style="margin-bottom: 0cm">\r\n			Choisir le Type d&rsquo;enregistrement des donn&eacute;es (base de donn&eacute;es ou Fichier Binaire).</p>\r\n	</li>\r\n	<li>\r\n		<p style="margin-bottom: 0cm">\r\n			G&eacute;rer les &eacute;v&egrave;nements (Logs).</p>\r\n	</li>\r\n	<li>\r\n		<p style="margin-bottom: 0cm">\r\n			Cr&eacute;er et G&eacute;rer les utilisateurs.</p>\r\n	</li>\r\n	<li>\r\n		<p style="margin-bottom: 0cm">\r\n			Mise &agrave; jour de l&rsquo;application.</p>\r\n	</li>\r\n	<li>\r\n		<p style="margin-bottom: 0cm">\r\n			Ajouter ou supprimer des composants &agrave; l&rsquo;application.</p>\r\n	</li>\r\n	<li>\r\n		<p style="margin-bottom: 0cm">\r\n			Installer ou D&eacute;sinstaller l&rsquo;application.</p>\r\n	</li>\r\n	<li>\r\n		<p style="margin-bottom: 0cm">\r\n			Contacter l&rsquo;&eacute;quipe de maintenance.</p>\r\n	</li>\r\n</ul>\r\n<p style="margin-bottom: 0cm">\r\n	&nbsp;</p>\r\n<h3 style="margin-bottom: 0cm;">\r\n	<span style="color:#0000cd;"><b>Les utilisateurs&nbsp;:</b></span></h3>\r\n<ul>\r\n	<li>\r\n		<p style="margin-bottom: 0cm">\r\n			G&eacute;rer ses profiles.</p>\r\n	</li>\r\n	<li>\r\n		<p style="margin-bottom: 0cm">\r\n			Ajouter, Supprimer et Editer un travail.</p>\r\n	</li>\r\n	<li>\r\n		<p style="margin-bottom: 0cm">\r\n			Ajouter, Supprimer et Editer les membres de la famille.</p>\r\n	</li>\r\n	<li>\r\n		<p style="margin-bottom: 0cm">\r\n			Ajouter, Supprimer et Editer les fonctions des membres de la famille.</p>\r\n	</li>\r\n	<li>\r\n		<p style="margin-bottom: 0cm">\
r\n			Ajouter, Supprimer et Editer des rendez-vous dans l&rsquo;agenda.</p>\r\n	</li>\r\n	<li>\r\n		<p style="margin-bottom: 0cm">\r\n			Envoyer des emails aux clients.</p>\r\n	</li>\r\n	<li>\r\n		<p style="margin-bottom: 0cm">\r\n			Recevoir des emails des clients.</p>\r\n	</li>\r\n	<li>\r\n		<p style="margin-bottom: 0cm">\r\n			Ajouter ou supprimer des applications pr&eacute;f&eacute;rer.</p>\r\n	</li>\r\n	<li>\r\n		<p style="margin-bottom: 0cm">\r\n			Contacter l&rsquo;administrateur.<br />\r\n			<br />\r\n			&nbsp;</p>\r\n	</li>\r\n</ul>\r\n<p>\r\n	&nbsp;</p>\r\n', 'img/finderimages/produits/produit4.png', 'un logiciel Client/Serveur vous aidez dans votre vie quotidienne', 1500, 1, 0, '2015-01-10', 'p123', '');

-- --------------------------------------------------------

--
-- Table structure for table `sgeprojets`
--

CREATE TABLE IF NOT EXISTS `sgeprojets` (
  `id` int(11) DEFAULT NULL,
  `nom` varchar(500) DEFAULT NULL,
  `but` varchar(500) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `user_id` int(11) DEFAULT '1',
  `description` text DEFAULT NULL,
  `cout` float DEFAULT NULL,
  `dated` datetime DEFAULT NULL,
  `datef` datetime DEFAULT NULL,
  `partenaires` text DEFAULT NULL,
  `nombremateiels` int(11) DEFAULT NULL,
  `nombreemployes` int(11) DEFAULT NULL,
  `lieu` varchar(300) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `ref` varchar(50) DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgeprojets`
--

INSERT INTO `sgeprojets` (`id`, `nom`, `but`, `created`, `modified`, `user_id`, `description`, `cout`, `dated`, `datef`, `partenaires`, `nombremateiels`, `nombreemployes`, `lieu`, `client_id`, `ref`, `pseudo`) VALUES
(1, 'qsq', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', '2015-01-19', '2015-01-30', 1, '<p>\r\n	&lt;xdqszdqszd</p>\r\n<p>\r\n	sqdqszdqazd</p>\r\n<p>\r\n	sqdqszd</p>\r\n', 450, '2015-01-19 00:00:00', '2015-01-19 00:00:00', '<p>\r\n	sdqzdqa</p>\r\n<p>\r\n	qzddzdzqad</p>\r\n<p>\r\n	daqzdz</p>\r\n', 55, 8, 'lieu dddddddddddd', 1, 'ccccccccccccccc', ''),
(2, 'qsdqs', 'dsdsd', '2015-01-20', '2015-01-21', 1, '', 0, '2015-02-20 00:00:00', '2015-02-20 00:00:00', '', 0, 0, '', 1, 'zzzq', ''),
(3, 'reeazed', 'rf', '2015-01-20', '2015-01-24', 1, '', 0, '2014-01-20 00:00:00', '2015-04-20 00:00:00', '', 0, 0, '', 3, 'ezfr', ''),
(4, 'sqd', 'qsd', '2015-01-21', '2015-02-15', 1, '', 0, '2015-01-21 00:00:00', '2015-01-21 00:00:00', '', 0, 0, 'ssssssss', 1, 'dddd', ''),
(5, 'sqd', 'qsd', '2015-01-21', '2015-01-21', 1, '', 0, '2015-01-21 00:00:00', '2015-01-21 00:00:00', '', 0, 0, 'ssssssss', 2, 'ddddss', ''),
(6, 'sqd', 'qsd', '2015-01-21', '2015-01-21', 1, '', 0, '2015-01-21 00:00:00', '2015-01-21 00:00:00', '', 0, 0, 'ssssssss', 7, 'ddddsssq', ''),
(7, 'sqd', 'qsd', '2015-01-21', '2015-01-21', 1, '', 0, '2015-01-21 00:00:00', '2015-01-21 00:00:00', '', 0, 0, 'ssssssss', 3, 'ddddsssqqq', ''),
(8, 'ddddddddddd', 'qsd', '2015-01-21', '2015-02-27', 1, '', 0, '2015-01-21 00:00:00', '2015-01-21 00:00:00', '', 0, 0, 'ssssssss', 3, 'ddddsssqqqd', ''),
(9, 'ccccccccc', 'qsd', '2015-01-21', '2015-01-21', 1, '', 0, '2015-01-21 00:00:00', '2015-01-21 00:00:00', '', 0, 0, 'ssssssss', 1, 'ddddsssqqqdq', ''),
(10, 'hhhhhhhh', 'qsd', '2015-01-21', '2015-01-21', 1, '', 0, '2015-01-21 00:00:00', '2015-01-21 00:00:00', '', 0, 0, 'ssssssss', 1, 'ddddsssqqqdqd', ''),
(11, 'hhhhhhhhrrrr', 'qsd', '2015-01-21', '2015-01-21', 1, '', 0, '2015-01-21 00:00:00', '2015-01-21 00:00:00', '', 0, 0, 'ssssssss', 3, 'ddddsssqqqdqdhh', ''),
(12, 'nnnnnnnnnnnnnnn', 'qsd', '2015-01-21', '2015-01-21', 1, '', 0, '2015-01-21 00:00:00', '2015-01-21 00:00:00', '', 0, 0, 'ssssssss', 1, 'ddddsssqqqdqdhhn', '');

-- --------------------------------------------------------

--
-- Table structure for table `sgerealisations`
--

CREATE TABLE IF NOT EXISTS `sgerealisations` (
  `id` int(11) DEFAULT NULL,
  `titre` varchar(500) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cout` int(11) DEFAULT NULL,
  `apartir` datetime DEFAULT NULL,
  `jusqua` datetime DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL,
  `projet_id` int(11) DEFAULT NULL,
  `projet_nom` varchar(500) DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgerealisations`
--

INSERT INTO `sgerealisations` (`id`, `titre`, `description`, `user_id`, `cout`, `apartir`, `jusqua`, `ref`, `projet_id`, `projet_nom`, `pseudo`) VALUES
(2, 'dfsdfsf', '<p>\r\n	dfsf</p>\r\n', 1, 500, '2015-01-23 00:00:00', '2015-01-23 00:00:00', '', 0, '', ''),
(3, 'qsdq', '<p>\r\n	sqd</p>\r\n', 1, 0, '2015-01-26 00:00:00', '2015-01-26 00:00:00', '', 1, 'qsq', '');

-- --------------------------------------------------------

--
-- Table structure for table `sgerecettes`
--

CREATE TABLE IF NOT EXISTS `sgerecettes` (
  `id` int(11) DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `categorie_nom` varchar(500) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `nom` varchar(500) DEFAULT NULL,
  `modep` varchar(500) DEFAULT NULL,
  `tvaen` int(11) DEFAULT NULL,
  `tva` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `client_nom` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `article` int(11) DEFAULT NULL,
  `produit_id` int(11) DEFAULT NULL,
  `produit_nom` varchar(500) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `compte_id` int(11) DEFAULT NULL,
  `compte_nom` varchar(500) DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgerecettes`
--

INSERT INTO `sgerecettes` (`id`, `ref`, `categorie_id`, `categorie_nom`, `date`, `nom`, `modep`, `tvaen`, `tva`, `total`, `client_id`, `client_nom`, `description`, `article`, `produit_id`, `produit_nom`, `user_id`, `compte_id`, `compte_nom`, `pseudo`) VALUES
(1, 'efr45', 51, 'Autres intÃ©rÃªts', '2015-06-27', 'Banque', 'Virement bancaire', 15, 825, 5500, 3, 'mohamed ', 'ssssshhhhhhhhhh', 3, 16, 'CrÃ©ation des sites web Pack Catalogue', 0, 1, 'sgbm', ''),
(2, 'gfdgfd', 51, 'Autres intÃ©rÃªts', '2015-06-26', 'Banque', 'Virement bancaire', 8, 480, 6000, 1, 'Offre deals hotels', '0', 2, 17, 'Fresh Liste Mail FranÃ§aise 16 K - AXA', 0, 1, 'sgbm', ''),
(3, 'sssss', 53, 'Produits exceptionnels', '2015-09-26', 'Banque', 'Virement bancaire', 20, 3700, 18500, 1, 'Offre deals hotels', '0gfhf', 2, 19, 'SOVQ Le System d Organisation de vie Quotidienne', 0, 1, 'sgbm', ''),
(4, 'P78', 52, 'Pertes de taux de change', '2015-11-04', 'Banque', 'Virement bancaire', 20, 3837, 19184, 3, 'mohamed ', 'desc', 1, 1, 'article de test', 1, 1, 'sgbm', '');

-- --------------------------------------------------------

--
-- Table structure for table `sgereservation`
--

CREATE TABLE IF NOT EXISTS `sgereservation` (
  `id` int(11) DEFAULT NULL,
  `code_trans` varchar(100) DEFAULT NULL,
  `paypal_id` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `other` varchar(100) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `reservation` varchar(200) DEFAULT NULL,
  `periode` varchar(250) DEFAULT NULL,
  `mod` int(20) DEFAULT NULL,
  `modepaiement` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgereservation`
--

INSERT INTO `sgereservation` (`id`, `code_trans`, `paypal_id`, `name`, `email`, `date`, `status`, `other`, `total`, `phone`, `reservation`, `periode`, `mod`, `modepaiement`) VALUES
(57, NULL, NULL, 'dates ourika :3/7, 6/7,  Prix: 140 |    dates de Dar Elkebira:2/7,  Prix: 180 | ', 'sbernard@gmail.com', '', '0', '', '345', '0624320866', 'dates ourika :3/7, 6/7,  Prix: 140 |    dates de Dar Elkebira:2/7,  Prix: 180 | ', '3', 7, ''),
(60, '9SK34273KS716600P', '49SQ58HL23QPW', '   dates de Majorelle:25/12, 26/12, 27/12, 28/12, 29/12,  Prix: 500 | ', 'robert.lisowski@orange.fr', '2014-09-10 10:13:30', '1', '{"mc_gross":"530.00","protection_eligibility":"Eligible","address_status":"unconfirmed","payer_id":"', '530', '06 33 26 18 64', '   dates de Majorelle:25/12, 26/12, 27/12, 28/12, 29/12,  Prix: 500 | ', '5', 15, ''),
(81, NULL, NULL, 'Tahar Berrabah', 'samy.berrabah@gmail.com', '', '0', '', '85', '33651602756', 'dates ourika :19/11,  Prix: 85 | ', '1', 11, 'FACTOBOX'),
(147, NULL, NULL, 'ROUISSI', 'zyad.rouissi@gmail.com', '', '0', '', '2015', '0624320866', '   dates de Dar Elkebira:19/5, 20/5, 21/5, 22/5, 23/5, 24/5, 25/5, 26/5, 27/5, 28/5,  Prix: 2000 | ', '10', 5, ''),
(148, NULL, NULL, 'ROUISSI', 'zyad.rouissi@gmail.com', '', '0', '', '2015', '0624320866', '   dates de Dar Elkebira:18/5, 19/5, 20/5, 21/5, 22/5, 23/5, 24/5, 25/5, 26/5, 27/5,  Prix: 2000 | ', '10', 5, ''),
(149, NULL, NULL, 'ROUISSI', 'zyad.rouissi@gmail.com', '', '0', '', '2025', '624320866', '   dates de Dar Elkebira:28/5, 19/5, 20/5, 21/5, 22/5, 23/5, 24/5, 25/5, 26/5, 27/5,  Prix: 2000 | ', '10', 5, ''),
(150, NULL, NULL, 'ROUISSI', 'zyad.rouissi@gmail.com', '', '0', '', '2025', '624320866', '   dates de Dar Elkebira:27/5, 26/5, 25/5, 24/5, 23/5, 22/5, 21/5, 20/5,  Prix: 2000 | ', '8', 5, 'FACTOBOX'),
(151, NULL, NULL, 'rOUISSI', 'zyad.rouissi@facebook.com', '', '0', '', '2025', '624320866', '   dates de Dar Elkebira:20/5, 21/5, 22/5, 23/5, 24/5, 25/5, 26/5, 27/5, 28/5, 29/5,  Prix: 2000 | ', '10', 5, ''),
(152, NULL, NULL, 'LOUVET', 'danell2@orange.fr', '', '0', '', '250', '0243695230', '   dates de Majorelle:19/10, 20/10,  Prix: 210 | ', '2', 10, ''),
(153, NULL, NULL, 'LOUVET', 'danell2@orange.fr', '', '0', '', '250', '0682112031', '   dates de Majorelle:19/10, 20/10,  Prix: 210 | ', '2', 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `sgesaisirs`
--

CREATE TABLE IF NOT EXISTS `sgesaisirs` (
  `id` int(11) DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `file` varchar(500) DEFAULT NULL,
  `montant` float DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `compte_id` int(11) DEFAULT NULL,
  `compte_nom` varchar(500) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgesaisirs`
--

INSERT INTO `sgesaisirs` (`id`, `ref`, `date`, `description`, `file`, `montant`, `type`, `compte_id`, `compte_nom`, `user_id`, `pseudo`) VALUES
(1, 'ref1', '2015-02-09', 'descdddd', '/sge/app/webroot/files/images/10574277_10152192899326537_6669797382351847840_n.png', 8400, 'DÃ©bit', 1, 'sgbm', 0, ''),
(2, 'ref', '2015-03-06', 'desc', '', 4571, 'CrÃ©dit', 2, 'BMCE', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `sgeservices`
--

CREATE TABLE IF NOT EXISTS `sgeservices` (
  `id` int(11) DEFAULT NULL,
  `titre` varchar(300) DEFAULT NULL,
  `service` text DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `desc` varchar(500) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `etat` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgeservices`
--

INSERT INTO `sgeservices` (`id`, `titre`, `service`, `image`, `desc`, `prix`, `user_id`, `etat`, `created`, `ref`, `pseudo`) VALUES
(16, 'CrÃ©ation des sites web Pack Catalogue', '<p>\r\n	<img alt="CrÃ©ation des sites web Pack Catalogue" src="../../../img/images/mapackcatalogue.jpg" style="width:100%" /></p>\r\n', 'img/finderimages/images_localisations/Sanstitre.png', '', 0, 1, 1, '2015-01-10', 's123', ''),
(17, 'Services de rÃ©fÃ©rencement des sites web (Services de SEO)', '<p>\r\n	<img alt="Services de rÃ©fÃ©rencement des sites web (Services de SEO)" src="/app/webroot/img/finderimages/Services de rÃ©fÃ©rencement des sites web _ Services de SEO.jpg" style="width: 100%;" /></p>\r\n', '/img/images/4.jpg', '', 0, 1, 1, '2015-01-10', 's45', ''),
(18, 'CrÃ©ation des sites web Pack E-commerce', '<p>\r\n	<img alt="CrÃ©ation des sites web Pack E-commerce" src="../../../img/images/mapackecommerce.jpg" style="width:100%" /></p>\r\n', 'img/finderimages/produits/2.jpeg', '', 0, 1, 1, '2015-01-10', 's78', '');

-- --------------------------------------------------------

--
-- Table structure for table `sgespecialites`
--

CREATE TABLE IF NOT EXISTS `sgespecialites` (
  `id` int(11) DEFAULT NULL,
  `nom` varchar(500) DEFAULT NULL,
  `infos` text DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `user_id` int(11) DEFAULT '1',
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgespecialites`
--

INSERT INTO `sgespecialites` (`id`, `nom`, `infos`, `created`, `modified`, `user_id`, `pseudo`) VALUES
(1, 'developpeur', '<p>\r\n	sdsds<img alt="" src="/sge/app/webroot/files/images/10574277_10152192899326537_6669797382351847840_n.png" style="width: 215px; height: 210px;" /></p>\r\n', '2015-01-12', '2015-02-28', 1, ''),
(2, 'dddddddddddddddd', '<p>\r\n	sdsdsd</p>\r\n', '2015-01-18', '2015-01-18', 1, ''),
(3, 'Agent commerciale', '<p>\r\n	Agent commerciale</p>\r\n', '2015-02-04', '2015-02-04', 1, ''),
(4, 'Peinture', '<p>\r\n	-fsdgdg</p>\r\n<p>\r\n	dsfgdg<img alt="" src="/sge/app/webroot/files/images/Desert.jpg" style="width: 1024px; height: 768px;" /></p>\r\n', '2015-02-07', '2015-02-07', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `sgestatuts`
--

CREATE TABLE IF NOT EXISTS `sgestatuts` (
  `id` int(11) DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL,
  `nom` varchar(500) DEFAULT NULL,
  `infos` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `etat` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `fermer` int(11) DEFAULT NULL,
  `limites` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgestatuts`
--

INSERT INTO `sgestatuts` (`id`, `ref`, `nom`, `infos`, `date`, `created`, `user_id`, `etat`, `type`, `fermer`, `limites`) VALUES
(1, 'ref1', 'Paiement demandÃ©', '<p style="text-align: center;">\r\n	vous devez renouveler votre espace d&#39;hebergement !</p>\r\n<p style="text-align: center;">\r\n	vous devez renouveler votre espace d&#39;hebergement !</p>\r\n<p style="text-align: center;">\r\n	vous devez renouveler votre espace d&#39;hebergement !</p>\r\n<p style="text-align: center;">\r\n	vous devez renouveler votre espace d&#39;hebergement !</p>\r\n', '2015-04-03', '2015-02-03', 1, 1, 1, 1, 2),
(2, 'ref2', 'Compte valide', '<p>\r\n	aucun informations supplimentaires</p>\r\n', '2016-03-07', '2015-03-07', 1, 0, 0, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sgestockactions`
--

CREATE TABLE IF NOT EXISTS `sgestockactions` (
  `id` int(11) DEFAULT NULL,
  `nom` varchar(250) DEFAULT NULL,
  `qte` float DEFAULT NULL,
  `date` date DEFAULT NULL,
  `raison` text DEFAULT NULL,
  `materiel_nom` varchar(500) DEFAULT NULL,
  `materiel_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `article_nom` varchar(500) DEFAULT NULL,
  `client_nom` varchar(500) DEFAULT NULL,
  `valeur` float DEFAULT NULL,
  `valeurtxt` varchar(500) DEFAULT NULL,
  `typevaleur` int(11) DEFAULT NULL,
  `cout` float DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgestockactions`
--

INSERT INTO `sgestockactions` (`id`, `nom`, `qte`, `date`, `raison`, `materiel_nom`, `materiel_id`, `user_id`, `type`, `article_id`, `client_id`, `article_nom`, `client_nom`, `valeur`, `valeurtxt`, `typevaleur`, `cout`, `pseudo`) VALUES
(4, 'sortie', 400, '2015-01-20', '', 'article de test', 1, 0, 0, 0, 0, '', '', 0, '', 0, 0, ''),
(5, 'entrÃ©e', 45, '2015-01-20', '', 'article de test', 1, 0, 0, 0, 0, '', '', 0, '', 0, 0, ''),
(6, 'entrÃ©e', 1, '2015-01-20', '', 'article de test', 1, 0, 0, 0, 0, '', '', 0, '', 0, 0, ''),
(7, 'sortie', 0, '2015-01-30', '', 'article de test', 1, 2, 0, 1, 1, 'libelle1', 'nasser', 0, '', 0, 0, ''),
(8, 'sortie', 0, '2015-01-30', '', 'article de test', 1, 2, 0, 1, 1, 'libelle1', 'nasser', 0, '', 0, 0, ''),
(9, 'sortie', 0, '2015-01-30', '', 'article de test', 1, 2, 1, 1, 1, 'libelle1', 'nasser', 0, '', 0, 0, ''),
(10, 'entrÃ©e', 544, '2015-01-30', '', 'article de test', 1, 1, 1, 6, 1, 'toyota 4*4', 'nasser', 0, 'kilomÃ©trage', 0, 0, ''),
(11, 'sortie', 12, '2015-01-30', '', 'article de test', 1, 1, 1, 6, 2, 'toyota 4*4', 'Votre codeur', 8452, 'kilomÃ©trage', 1, 0, ''),
(12, 'sortie', 100, '2015-08-04', '', 'gazole N 5', 5, 1, 1, 6, 1, 'toyota 4*4', 'Offre deals hotels', 859457, 'kilomÃ©trage', 2, 0, ''),
(13, 'sortie', 2, '2015-02-06', '', 'gazole N 5', 5, 1, 1, 6, 1, 'toyota 4*4', 'Offre deals hotels', 0, 'kilomÃ©trage', 2, 0, ''),
(14, 'sortie', 2, '2015-02-08', '', 'gazole N 5', 5, 1, 1, 1, 1, 'libelle1', 'Offre deals hotels', 78, 'kilomÃ©trage', 1, 304, ''),
(15, 'sortie', 2, '2015-02-08', '', 'gazole N 5', 5, 1, 1, 1, 1, 'libelle1', 'Offre deals hotels', 78, 'kilomÃ©trage', 1, 304, ''),
(16, 'sortie', 22, '2015-02-08', '', 'gazole N 5', 5, 1, 1, 1, 1, 'libelle1', 'Offre deals hotels', 78, 'kilomÃ©trage', 1, 3344, ''),
(17, 'sortie', 22, '2015-02-08', '', 'gazole N 5', 5, 1, 1, 1, 1, 'libelle1', 'Offre deals hotels', 78, 'kilomÃ©trage', 1, 3344, ''),
(18, 'entrÃ©e', 224, '2015-02-08', '', 'gazole N 5', 5, 1, 1, 1, 1, 'libelle1', 'Offre deals hotels', 78, 'kilomÃ©trage', 1, 34048, ''),
(19, 'sortie', 20, '2015-02-21', '', 'PC portables', 6, 1, 2, 1, 3, 'libelle1', 'mohamed ', 0, 'kilomÃ©trage', 1, 170, ''),
(20, 'sortie', 45, '2015-02-27', '', 'gazole N 5', 5, 1, 2, 6, 3, 'toyota 4*4', 'mohamed ', 0, 'kilomÃ©trage', 1, 6840, ''),
(21, 'entrÃ©e', 2, '2015-03-05', '', 'article de test', 1, 1, 0, 1, 1, 'libelle1', 'Offre deals hotels', 0, 'kilomÃ©trage', 1, 28836, ''),
(22, 'entrÃ©e', 12, '2016-03-05', '', 'des de test', 9, 1, 1, 1, 1, 'libelle1', 'Offre deals hotels', 0, 'kilomÃ©trage', 1, 2200, ''),
(23, 'sortie', 3, '2016-03-23', '', 'PC portables', 6, 1, 2, 1, 3, 'libelle1', 'mohamed ', 20, 'kg', 1, 4063, NULL),
(24, 'sortie', 3, '2016-03-23', '', 'PC portables', 6, 1, 2, 1, 3, 'libelle1', 'mohamed ', 20, 'kg', 1, 4063, NULL),
(25, 'sortie', 3, '2016-03-23', '', 'PC portables', 6, 1, 2, 1, 3, 'libelle1', 'mohamed ', 20, 'kg', 1, 4063, NULL),
(26, 'sortie', 3, '2016-03-23', '', 'PC portables', 6, 1, 2, 1, 3, 'libelle1', 'mohamed ', 20, 'kg', 1, 4063, NULL),
(27, 'sortie', 3, '2016-03-23', '', 'PC portables', 6, 1, 2, 1, 3, 'libelle1', 'mohamed ', 20, 'kg', 1, 4063, NULL),
(28, 'sortie', 3, '2016-03-23', '', 'PC portables', 6, 1, 2, 1, 3, 'libelle1', 'mohamed ', 20, 'kg', 1, 4063, NULL),
(29, 'sortie', 3, '2016-03-23', '', 'PC portables', 6, 1, 2, 1, 3, 'libelle1', 'mohamed ', 0, 'kilométrage', 1, 4037.5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sgestockcategories`
--

CREATE TABLE IF NOT EXISTS `sgestockcategories` (
  `id` int(11) DEFAULT NULL,
  `nom` varchar(500) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `infos` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgestockcategories`
--

INSERT INTO `sgestockcategories` (`id`, `nom`, `type`, `infos`, `user_id`, `pseudo`) VALUES
(1, 'famille 1', 'famille', '<p>\r\n	csdsd</p>\r\n<p>\r\n	sdsds qsdeaz&nbsp;&nbsp; ,klm&nbsp; ze</p>\r\n<p>\r\n	azeqaze&nbsp; rges</p>\r\n', 0, ''),
(2, 'famill 2', 'famille', '<p>\r\n	qsdqzd</p>\r\n', 0, ''),
(3, 'impu1', 'imputation', '<p>\r\n	sds</p>\r\n', 0, ''),
(4, 'inpu2 f', 'imputation', '<p>\r\n	sd</p>\r\n', 0, ''),
(5, 'marq f', 'marque', '<p>\r\n	fg</p>\r\n', 0, ''),
(6, 'sssss', 'marque', '<p>\r\n	sdsd</p>\r\n', 0, ''),
(7, 'marquesssss dcf', 'marque', '<p>\r\n	qsdfsd</p>\r\n', 0, ''),
(8, 'imput', 'imputation', '<p>\r\n	sqd</p>\r\n', 0, ''),
(9, 'famille4854', 'famille', '<p>\r\n	kjfgshjllef</p>\r\n', 0, ''),
(14, 'Accesoires de cafÃ©', 'depense', '<div class="column text" id="expenseAccounts-col-5662667-translation" style="width: 59%;">\r\n	<div class="content V Column translation" name="translation">\r\n		Accesoires de caf&eacute;</div>\r\n</div>\r\n', 1, ''),
(15, 'Achats de matÃ©riel, Ã©quipements et travaux', 'depense', '<div class="column text" id="expenseAccounts-col-5662675-translation" style="width: 59%;">\r\n	<div class="content V Column translation" name="translation">\r\n		Achats de mat&eacute;riel, &eacute;quipements et travaux</div>\r\n</div>\r\n', 1, ''),
(16, 'Achats intra-communautaires de produits', 'depense', '<p>\r\n	Achats intra-communautaires de produits</p>\r\n', 1, ''),
(17, 'Acompte sur impÃ´t', 'depense', '<p>\r\n	Acompte sur imp&ocirc;t</p>\r\n', 1, ''),
(18, 'Amortissement des autres dÃ©penses Ã  long terme', 'depense', '<div class="column text" id="expenseAccounts-col-5662749-translation" style="width: 59%;">\r\n	<div class="content V Column translation" name="translation">\r\n		Amortissement des autres d&eacute;penses &agrave; long terme</div>\r\n</div>\r\n', 1, ''),
(19, 'Amortissement des autres immobilisations corporelles', 'depense', '<div class="column text" id="expenseAccounts-col-5662749-translation" style="width: 59%;">\r\n	<div class="content V Column translation" name="translation">\r\n		<div class="column text" id="expenseAccounts-col-5662743-translation" style="width: 59%;">\r\n			<div class="content V Column translation" name="translation">\r\n				Amortissement des autres immobilisations corporelles</div>\r\n		</div>\r\n	</div>\r\n</div>\r\n', 1, ''),
(20, 'Amortissement des bÃ¢timents', 'depense', '<div class="column text" id="expenseAccounts-col-5662749-translation" style="width: 59%;">\r\n	<div class="content V Column translation" name="translation">\r\n		<div class="column text" id="expenseAccounts-col-5662743-translation" style="width: 59%;">\r\n			<div class="content V Column translation" name="translation">\r\n				<div class="column text" id="expenseAccounts-col-5662747-translation" style="width: 59%;">\r\n					<div class="content V Column translation" name="translation">\r\n						Amortissement des b&acirc;timents</div>\r\n				</div>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>\r\n', 1, ''),
(21, 'Amortissement des machines et du matÃ©riel', 'depense', '<div class="column text" id="expenseAccounts-col-5662745-translation" style="width: 59%;">\r\n	<div class="content V Column translation" name="translation">\r\n		Amortissement des machines et du mat&eacute;riel</div>\r\n</div>\r\n', 1, ''),
(22, 'Autres charges', 'depense', '<p>\r\n	Autres charges</p>\r\n', 1, ''),
(23, 'Autres charges d''intÃ©rÃªt', 'depense', '<p>\r\n	Autres charges d&#39;int&eacute;r&ecirc;t</p>\r\n', 1, ''),
(24, 'Autres coÃ»ts de divertissement', 'depense', '<p>\r\n	Autres co&ucirc;ts de divertissement</p>\r\n', 1, ''),
(25, 'Autres frais de dÃ©placement', 'depense', '<p>\r\n	Autres frais de d&eacute;placement</p>\r\n', 1, ''),
(26, 'Billets de voyage', 'depense', '<p>\r\n	Billets de voyage</p>\r\n', 1, ''),
(27, 'BÃ©nÃ©fices de taux de change', 'depense', '<p>\r\n	B&eacute;n&eacute;fices de taux de change</p>\r\n', 1, ''),
(28, 'Charges extraordinaires', 'depense', '<p>\r\n	Charges extraordinaires</p>\r\n', 1, ''),
(29, 'Cotisations de retraite', 'depense', '<p>\r\n	Cotisations de retraite</p>\r\n', 1, ''),
(30, 'CoÃ»ts des rÃ©union et des nÃ©gociations', 'depense', '<p>\r\n	Co&ucirc;ts des r&eacute;union et des n&eacute;gociations</p>\r\n', 1, ''),
(31, 'CoÃ»ts informatiques', 'depense', '<p>\r\n	Co&ucirc;ts informatiques</p>\r\n', 1, ''),
(32, 'Frais d''assurance accidents', 'depense', '<p>\r\n	Frais d&#39;assurance accidents</p>\r\n', 1, ''),
(33, 'Frais d''assurance-chÃ´mage', 'depense', '<p>\r\n	Frais d&#39;assurance-ch&ocirc;mage</p>\r\n', 1, ''),
(34, 'Frais de promotion des ventes', 'depense', '<p>\r\n	Frais de promotion des ventes</p>\r\n', 1, ''),
(35, 'Frais de sÃ©curitÃ© sociale', 'depense', '<p>\r\n	Frais de s&eacute;curit&eacute; sociale</p>\r\n', 1, ''),
(36, 'Frais de tÃ©lÃ©communications', 'depense', '<p>\r\n	Frais de t&eacute;l&eacute;communications</p>\r\n', 1, ''),
(37, 'Frais vÃ©hicule', 'depense', '<p>\r\n	Frais v&eacute;hicule</p>\r\n', 1, ''),
(38, 'HÃ´tel et autre hÃ©bergement', 'depense', '<div class="column text" id="expenseAccounts-col-5662681-translation" style="width: 59%;">\r\n	<div class="content V Column translation" name="translation">\r\n		H&ocirc;tel et autre h&eacute;bergement</div>\r\n</div>\r\n', 1, ''),
(39, 'Loyer', 'depense', '<p>\r\n	Loyer</p>\r\n', 1, ''),
(40, 'MatiÃ¨res', 'depense', '<p>\r\n	Mati&egrave;res</p>\r\n', 1, ''),
(41, 'MatÃ©riel de bureau', 'depense', '<p>\r\n	Mat&eacute;riel de bureau</p>\r\n', 1, ''),
(42, 'Primes d''assurances', 'depense', '<p>\r\n	Primes d&#39;assurances</p>\r\n', 1, ''),
(43, 'Repas pendant voyage', 'depense', '<p>\r\n	Repas pendant voyage</p>\r\n', 1, ''),
(44, 'RÃ©unions internes et fÃªtes du personnel', 'depense', '<p>\r\n	R&eacute;unions internes et f&ecirc;tes du personnel</p>\r\n', 1, ''),
(45, 'Salaires des employÃ©s', 'depense', '<p>\r\n	Salaires des employ&eacute;s</p>\r\n', 1, ''),
(46, 'Services de comptabilitÃ©', 'depense', '<p>\r\n	Services de comptabilit&eacute;</p>\r\n', 1, ''),
(47, 'Services de santÃ© au travail', 'depense', '<p>\r\n	Services de sant&eacute; au travail</p>\r\n', 1, ''),
(48, 'Services externes', 'depense', '<p>\r\n	Services externes</p>\r\n', 1, ''),
(49, 'Taxi', 'depense', '<p>\r\n	Taxi</p>\r\n', 1, ''),
(50, 'TVA payÃ©e', 'depense', '<p>\r\n	TVA pay&eacute;e</p>\r\n', 1, ''),
(51, 'Autres intÃ©rÃªts', 'recette', '<p>\r\n	Autres int&eacute;r&ecirc;ts</p>\r\n', 1, ''),
(52, 'Pertes de taux de change', 'recette', '<p>\r\n	Pertes de taux de change</p>\r\n', 1, ''),
(53, 'Produits exceptionnels', 'recette', '<p>\r\n	Produits exceptionnels</p>\r\n', 1, ''),
(54, 'Remboursement de la TVA', 'recette', '<p>\r\n	Remboursement de la TVA</p>\r\n', 1, ''),
(55, 'Remboursements', 'recette', '<p>\r\n	Remboursements</p>\r\n', 1, ''),
(56, 'Rendement de l''action', 'recette', '<p>\r\n	Rendement de l&#39;action</p>\r\n', 1, ''),
(57, 'Subventions', 'recette', '<p>\r\n	Subventions</p>\r\n', 1, ''),
(58, 'Ventes', 'recette', '<p>\r\n	Ventes</p>\r\n', 1, ''),
(59, 'Ventes - CrÃ©dit d''impÃ´t pour services d''aide Ã  la personne', 'recette', '<p>\r\n	Ventes - Cr&eacute;dit d&#39;imp&ocirc;t pour services d&#39;aide &agrave; la personne</p>\r\n', 1, ''),
(60, 'Ventes - en espÃ¨ces', 'recette', '<div class="column text" id="incomeAccounts-col-5662635-translation" style="width: 59%;">\r\n	<div class="content V Column translation" name="translation">\r\n		Ventes - en esp&egrave;ces</div>\r\n</div>\r\n', 1, ''),
(61, 'Ventes - En ligne', 'recette', '<p>\r\n	Ventes - En ligne</p>\r\n', 1, ''),
(62, 'Ventes - Sans TVA', 'recette', '<p>\r\n	Ventes - Sans TVA</p>\r\n', 1, ''),
(63, 'Ventes - TVA autoliquidation', 'recette', '<p>\r\n	Ventes - TVA autoliquidation</p>\r\n', 1, ''),
(64, 'Ventes des produits Ã  d''autres pays de l''UE', 'recette', '<p>\r\n	Ventes des produits &agrave; d&#39;autres pays de l&#39;UE</p>\r\n', 1, ''),
(65, 'Ventes des services Ã  d''autres pays de l''UE', 'recette', '<p>\r\n	Ventes des services &agrave; d&#39;autres pays de l&#39;UE</p>\r\n', 1, ''),
(66, 'Ventes des services Ã  l''extÃ©rieur de l''UE', 'recette', '<p>\r\n	Ventes des services &agrave; l&#39;ext&eacute;rieur de l&#39;UE</p>\r\n', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `sgetaches`
--

CREATE TABLE IF NOT EXISTS `sgetaches` (
  `id` int(11) DEFAULT NULL,
  `nom` varchar(500) DEFAULT NULL,
  `infos` text DEFAULT NULL,
  `dated` datetime DEFAULT NULL,
  `datef` datetime DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `user_id` int(11) DEFAULT '1',
  `employe_id` varchar(50) DEFAULT NULL,
  `employe_nom` varchar(200) DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL,
  `projet_id` int(11) DEFAULT NULL,
  `projet_nom` varchar(500) DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgetaches`
--

INSERT INTO `sgetaches` (`id`, `nom`, `infos`, `dated`, `datef`, `created`, `modified`, `user_id`, `employe_id`, `employe_nom`, `ref`, `projet_id`, `projet_nom`, `pseudo`) VALUES
(1, 'dezdez sssssszszz', '<p>\r\n	zdzadzdzadzadzad</p>\r\n<p>\r\n	azdazdzadazdazd</p>\r\n<p>\r\n	zdaz</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	dzadazdazd</p>\r\n', '2015-02-19 09:09:00', '2015-02-19 00:00:00', '2015-01-19', '2015-02-24', 1, '1', 'nasser', 'qsdsqd', 1, 'qsq', ''),
(2, 'sdqsd', '<p>\r\n	sqd</p>\r\n', '2015-01-09 00:00:00', '2016-01-20 00:00:00', '2015-01-20', '2015-01-20', 1, '3', 'krimo', 'sdqsd', 0, '', ''),
(3, 'qsdqsd', '<p>\r\n	qsd</p>\r\n', '2015-01-20 00:00:00', '2012-01-20 00:00:00', '2015-01-20', '2015-01-20', 1, '1', 'nasser', 'qzsdqszd', 0, '', ''),
(4, 'qsdqsd', '<p>\r\n	qsd</p>\r\n', '2018-01-20 00:00:00', '2020-01-20 00:00:00', '2015-01-20', '2015-01-20', 1, '1', 'nasser', 'qzsdqszdq', 0, '', ''),
(5, 'ferf', '<p>\r\n	rf</p>\r\n', '2015-01-20 00:00:00', '2015-06-20 00:00:00', '2015-01-20', '2015-01-26', 1, '5', 'binga', 'ffre', 9, 'ccccccccc', ''),
(6, 'qsdfd', '<p>\r\n	aeqzsz</p>\r\n', '2015-01-26 00:00:00', '2015-01-26 00:00:00', '2015-01-26', '2015-01-26', 1, '5', 'binga', 'defze 85', 3, 'reeazed', ''),
(7, 'sdfs', '', '2015-01-30 00:00:00', '2015-01-31 00:00:00', '2015-01-26', '2015-01-26', 1, '1', 'nasser', 'dsf', 1, 'qsq', ''),
(8, 'sdf', '', '2012-01-26 00:00:00', '2013-01-26 00:00:00', '2015-01-26', '2015-01-26', 1, '1', 'nasser', 'sfer', 8, 'ddddddddddd', ''),
(9, 'sqdq', '<p>\r\n	sqd</p>\r\n', '2008-01-26 00:00:00', '2014-01-26 00:00:00', '2015-01-26', '2015-01-26', 1, '3', 'krimo', 'qsfd', 9, 'ccccccccc', ''),
(10, 'sdqsd', '<p>\r\n	sqd</p>\r\n', '2015-02-01 00:00:00', '2015-02-01 00:00:00', '2015-02-01', '2015-02-01', 1, '3', 'krimo', 'qszdqd', 1, 'qsq', ''),
(11, 'xvdfwv', '', '2015-02-06 00:00:00', '2015-02-06 00:00:00', '2015-02-06', '2015-02-06', 1, '3', 'krimo', 'erfsd', 1, 'qsq', ''),
(12, 'tache 1', '', '2015-02-06 00:00:00', '2015-02-06 00:00:00', '2015-02-06', '2015-02-06', 1, '1', 'nasser', 'ref546', 3, 'reeazed', ''),
(13, 'creation de paneau de peinture', '<p>\r\n	<img alt="" src="/sge/app/webroot/files/images/Bird House Design with Pre-Built Kits.png" style="width: 283px; height: 178px;" /></p>\r\n<p>\r\n	1-wxcvghklm*</p>\r\n<p>\r\n	2-xcghjl&ugrave;</p>\r\n', '2015-03-12 06:11:00', '2015-04-07 15:09:00', '2015-04-07', '2015-04-07', 3, '2', 'nasser', 'ref45', 4, 'sqd', '');

-- --------------------------------------------------------

--
-- Table structure for table `sgeusers`
--

CREATE TABLE IF NOT EXISTS `sgeusers` (
  `id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `user_id` int(11) DEFAULT '1',
  `civilite` varchar(11) DEFAULT NULL,
  `nom` varchar(150) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `societe` varchar(250) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `codep` varchar(11) DEFAULT NULL,
  `apropos` text DEFAULT NULL,
  `etat` int(11) DEFAULT '0',
  `part` int(11) DEFAULT NULL,
  `last` varchar(500) DEFAULT NULL,
  `limites` int(11) DEFAULT NULL,
  `Aides` int(11) DEFAULT NULL,
  `Alertes` int(11) DEFAULT NULL,
  `Annuaires` int(11) DEFAULT NULL,
  `Clients` int(11) DEFAULT NULL,
  `Commandes` int(11) DEFAULT NULL,
  `Comptes` int(11) DEFAULT NULL,
  `Configurations` int(11) DEFAULT NULL,
  `Consultations` int(11) DEFAULT NULL,
  `Contrats` int(11) DEFAULT NULL,
  `Demandes` int(11) DEFAULT NULL,
  `Depenses` int(11) DEFAULT NULL,
  `Deplacements` int(11) DEFAULT NULL,
  `Devises` int(11) DEFAULT NULL,
  `Employes` int(11) DEFAULT NULL,
  `Factures` int(11) DEFAULT NULL,
  `Impressions` int(11) DEFAULT NULL,
  `Inventaires` int(11) DEFAULT NULL,
  `Kilometrages` int(11) DEFAULT NULL,
  `Maintenances` int(11) DEFAULT NULL,
  `Materiels` int(11) DEFAULT NULL,
  `Mises` int(11) DEFAULT NULL,
  `Realisations` int(11) DEFAULT NULL,
  `Paies` int(11) DEFAULT NULL,
  `Pieces` int(11) DEFAULT NULL,
  `Primes` int(11) DEFAULT NULL,
  `Produits` int(11) DEFAULT NULL,
  `Projets` int(11) DEFAULT NULL,
  `Recettes` int(11) DEFAULT NULL,
  `Saisirs` int(11) DEFAULT NULL,
  `Services` int(11) DEFAULT NULL,
  `Statistiques` int(11) DEFAULT NULL,
  `Statuts` int(11) DEFAULT NULL,
  `Stockactions` int(11) DEFAULT NULL,
  `Stockcategories` int(11) DEFAULT NULL,
  `Taches` int(11) DEFAULT NULL,
  `Users` int(11) DEFAULT NULL,
  `Vacances` int(11) DEFAULT NULL,
  `add` int(11) DEFAULT NULL,
  `edit` int(11) DEFAULT NULL,
  `delete` int(11) DEFAULT NULL,
  `recherche` int(11) DEFAULT NULL,
  `imprimer` int(11) DEFAULT NULL,
  `imprimerliste` int(11) DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgeusers`
--

INSERT INTO `sgeusers` (`id`, `username`, `password`, `role`, `created`, `modified`, `user_id`, `civilite`, `nom`, `email`, `tel`, `societe`, `pays`, `ville`, `codep`, `apropos`, `etat`, `part`, `last`, `limites`, `Aides`, `Alertes`, `Annuaires`, `Clients`, `Commandes`, `Comptes`, `Configurations`, `Consultations`, `Contrats`, `Demandes`, `Depenses`, `Deplacements`, `Devises`, `Employes`, `Factures`, `Impressions`, `Inventaires`, `Kilometrages`, `Maintenances`, `Materiels`, `Mises`, `Realisations`, `Paies`, `Pieces`, `Primes`, `Produits`, `Projets`, `Recettes`, `Saisirs`, `Services`, `Statistiques`, `Statuts`, `Stockactions`, `Stockcategories`, `Taches`, `Users`, `Vacances`, `add`, `edit`, `delete`, `recherche`, `imprimer`, `imprimerliste`, `ref`, `pseudo`) VALUES
(1, 'root', '6bb2150878c46de1d07d56473305f9b1b6bd2300', 'admin', '2014-07-21', '2016-03-25', 0, 'Mr', 'Elbasri Abdennacer', 'devnasser@gmail.com', '+212676479581', 'Votre Codeur', 'Maroc', 'Zagora', '45900', '0', 1, 1, 'root  2016/03/25  1458897052  192.168.1.149 <br>old: root  2016/03/23  1458749790  ::1 <br>old: root  2016/03/23  1458736553  192.168.1.229 <br>old: root  2016/03/23  1458734741  192.168.1.229 <br>old: root  2016/03/23  1458733350  192.168.1.108 <br>old: root  2016/03/23  1458732067  192.168.1.108 <br>old: root  2016/03/23  1458731952  192.168.1.108 <br>old: root  2016/03/17  1458224586  ::1 <br>old: root  2016/03/17  1458216040  ::1 <br>old: roo', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 'ref2', ''),
(2, 'employe', 'a7ed2dc091148c8bd59dade7537c8363bd0b111e', 'moderateur', '2015-01-16', '2015-04-11', 1, 'Mr', 'employe de test', 'employe@sge.ma', '0676479581', 'votrecodeur', 'maroc', 'kech', 'pb8785', '', 1, 0, 'employe  2015/03/22  1427030042  127.0.0.1 <br>old: employe  2015/02/05  1423170892  ::1 <br>old: employe  2015/01/30  1422648702  ::1 <br>old: employe  2015/01/30  1422646706  ::1 <br>old: employe  2015/01/30  1422623554  ::1 <br>old: employe /innac', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(3, 'ismail', 'a7ed2dc091148c8bd59dade7537c8363bd0b111e', 'admin', '2015-04-07', '2015-04-18', 1, 'Mr', 'ismail elamrani', 'isamil@gmail.com', '55555555', 'aucun', 'maroc', 'kech', '40000', '', 1, 0, 'ismail  2015/04/18  1429371966  127.0.0.1 <br>old: ismail  2015/04/18  1429371894  127.0.0.1 <br>old: ismail  2015/04/07  1428412134  127.0.0.1 <br>old: ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 1, 1, 1, 1, 'ref2', ''),
(4, 'gestory', 'a7ed2dc091148c8bd59dade7537c8363bd0b111e', 'admin', '2015-05-06', '2015-05-06', 1, 'Mr', 'Utilisateur de dÃ©monstration', 'dev@test.com', '0676479581', 'test', 'test', 'test', 'test5645', '', 1, 0, 'gestory  2015/05/06  1430909823  41.250.191.253 <br>old: gestory  2015/05/06  1430909465  41.250.191.253 <br>old: ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 'ref2', '');

-- --------------------------------------------------------

--
-- Table structure for table `sgevacances`
--

CREATE TABLE IF NOT EXISTS `sgevacances` (
  `id` int(11) DEFAULT NULL,
  `nom` varchar(500) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `dated` datetime DEFAULT NULL,
  `datef` datetime DEFAULT NULL,
  `employe_id` int(11) DEFAULT '1',
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `user_id` int(11) DEFAULT '1',
  `employe_nom` varchar(200) DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL,
  `cout` float DEFAULT NULL,
  `pseudo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgevacances`
--

INSERT INTO `sgevacances` (`id`, `nom`, `type`, `dated`, `datef`, `employe_id`, `created`, `modified`, `user_id`, `employe_nom`, `ref`, `cout`, `pseudo`) VALUES
(1, 'csdfcs', 'formation Ã©conomique, sociale et syndicale', '2015-01-19 00:00:00', '2015-01-19 00:00:00', 1, '2015-01-19', '2015-01-19', 1, 'nasser', '', 0, ''),
(2, 'sqsqs', 'maladie', '2015-01-19 00:00:00', '2015-01-19 00:00:00', 1, '2015-01-19', '2015-01-19', 1, 'nasser', 'sd5748z', 0, ''),
(3, 'sdfsdf', 'payÃ©', '2015-01-20 00:00:00', '2015-03-20 00:00:00', 1, '2015-01-20', '2015-01-20', 1, 'nasser', 'sqdqs', 0, ''),
(4, 'qsd', 'payÃ©', '2016-01-23 00:00:00', '2018-01-23 00:00:00', 1, '2015-01-23', '2015-01-23', 1, 'nasser', 'sqsdqd', 0, ''),
(5, '475454545 e eretghyh qg', 'payÃ©', '2015-02-08 00:00:00', '2015-02-08 00:00:00', 1, '2015-02-08', '2015-02-08', 1, 'nasser', 'dfsqdfqezr zf456', 1551, ''),
(6, 'maladie', 'payÃ©', '2015-04-07 15:16:00', '2015-04-14 20:00:00', 4, '2015-04-07', '2015-04-07', 1, 'hsina', 'ref1', 120, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sgeabsences`
--
ALTER TABLE `sgeabsences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgeagendas`
--
ALTER TABLE `sgeagendas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgeaides`
--
ALTER TABLE `sgeaides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgeannuaires`
--
ALTER TABLE `sgeannuaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgeclients`
--
ALTER TABLE `sgeclients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgecommandes`
--
ALTER TABLE `sgecommandes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgecomptes`
--
ALTER TABLE `sgecomptes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgeconfigurations`
--
ALTER TABLE `sgeconfigurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgeconsultations`
--
ALTER TABLE `sgeconsultations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgecontrats`
--
ALTER TABLE `sgecontrats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgedemandes`
--
ALTER TABLE `sgedemandes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgedepenses`
--
ALTER TABLE `sgedepenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgedeplacements`
--
ALTER TABLE `sgedeplacements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgedevises`
--
ALTER TABLE `sgedevises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgeemployes`
--
ALTER TABLE `sgeemployes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgeevennements`
--
ALTER TABLE `sgeevennements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgefactures`
--
ALTER TABLE `sgefactures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgeinventaires`
--
ALTER TABLE `sgeinventaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgeitems`
--
ALTER TABLE `sgeitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgekilometrages`
--
ALTER TABLE `sgekilometrages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgemaintenances`
--
ALTER TABLE `sgemaintenances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgemateriels`
--
ALTER TABLE `sgemateriels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgemises`
--
ALTER TABLE `sgemises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgepaies`
--
ALTER TABLE `sgepaies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgepieces`
--
ALTER TABLE `sgepieces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgeprimes`
--
ALTER TABLE `sgeprimes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgeproduits`
--
ALTER TABLE `sgeproduits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgeprojets`
--
ALTER TABLE `sgeprojets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgerealisations`
--
ALTER TABLE `sgerealisations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgerecettes`
--
ALTER TABLE `sgerecettes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgereservation`
--
ALTER TABLE `sgereservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgesaisirs`
--
ALTER TABLE `sgesaisirs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgeservices`
--
ALTER TABLE `sgeservices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgespecialites`
--
ALTER TABLE `sgespecialites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgestatuts`
--
ALTER TABLE `sgestatuts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgestockactions`
--
ALTER TABLE `sgestockactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgestockcategories`
--
ALTER TABLE `sgestockcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgetaches`
--
ALTER TABLE `sgetaches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgeusers`
--
ALTER TABLE `sgeusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgevacances`
--
ALTER TABLE `sgevacances`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sgeabsences`
--
ALTER TABLE `sgeabsences`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sgeagendas`
--
ALTER TABLE `sgeagendas`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sgeaides`
--
ALTER TABLE `sgeaides`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sgeannuaires`
--
ALTER TABLE `sgeannuaires`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sgeclients`
--
ALTER TABLE `sgeclients`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `sgecommandes`
--
ALTER TABLE `sgecommandes`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sgecomptes`
--
ALTER TABLE `sgecomptes`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sgeconfigurations`
--
ALTER TABLE `sgeconfigurations`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sgeconsultations`
--
ALTER TABLE `sgeconsultations`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sgecontrats`
--
ALTER TABLE `sgecontrats`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sgedemandes`
--
ALTER TABLE `sgedemandes`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sgedepenses`
--
ALTER TABLE `sgedepenses`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `sgedeplacements`
--
ALTER TABLE `sgedeplacements`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sgedevises`
--
ALTER TABLE `sgedevises`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sgeemployes`
--
ALTER TABLE `sgeemployes`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `sgeevennements`
--
ALTER TABLE `sgeevennements`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=164;
--
-- AUTO_INCREMENT for table `sgefactures`
--
ALTER TABLE `sgefactures`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sgeinventaires`
--
ALTER TABLE `sgeinventaires`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sgeitems`
--
ALTER TABLE `sgeitems`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `sgekilometrages`
--
ALTER TABLE `sgekilometrages`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sgemaintenances`
--
ALTER TABLE `sgemaintenances`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sgemateriels`
--
ALTER TABLE `sgemateriels`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `sgemises`
--
ALTER TABLE `sgemises`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sgepaies`
--
ALTER TABLE `sgepaies`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sgepieces`
--
ALTER TABLE `sgepieces`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sgeprimes`
--
ALTER TABLE `sgeprimes`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sgeproduits`
--
ALTER TABLE `sgeproduits`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `sgeprojets`
--
ALTER TABLE `sgeprojets`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `sgerealisations`
--
ALTER TABLE `sgerealisations`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sgerecettes`
--
ALTER TABLE `sgerecettes`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sgereservation`
--
ALTER TABLE `sgereservation`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=154;
--
-- AUTO_INCREMENT for table `sgesaisirs`
--
ALTER TABLE `sgesaisirs`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sgeservices`
--
ALTER TABLE `sgeservices`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `sgespecialites`
--
ALTER TABLE `sgespecialites`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sgestatuts`
--
ALTER TABLE `sgestatuts`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sgestockactions`
--
ALTER TABLE `sgestockactions`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `sgestockcategories`
--
ALTER TABLE `sgestockcategories`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `sgetaches`
--
ALTER TABLE `sgetaches`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `sgeusers`
--
ALTER TABLE `sgeusers`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sgevacances`
--
ALTER TABLE `sgevacances`
  MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
