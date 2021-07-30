-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 30 juil. 2021 à 18:26
-- Version du serveur :  10.1.26-MariaDB-0+deb9u1
-- Version de PHP : 7.0.33-52+0~20210701.57+debian9~1.gbp8e49b6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `c6lh`
--

-- --------------------------------------------------------

--
-- Structure de la table `contenu_cv`
--

CREATE TABLE `contenu_cv` (
  `id` int(11) NOT NULL,
  `title` char(52) NOT NULL,
  `content` longtext NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `emplacement` enum('left','right') NOT NULL DEFAULT 'left',
  `position` int(2) NOT NULL,
  `public` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contenu_cv`
--

INSERT INTO `contenu_cv` (`id`, `title`, `content`, `date`, `emplacement`, `position`, `public`) VALUES
(1, 'CONNAISSANCES', '<ul>\r\n<li><img class=\"img-fluid\" src=\"assets/img/logo/html5-min.png\" alt=\"html\" width=\"30\" /> HTML</li>\r\n<li><img class=\"img-fluid\" src=\"assets/img/logo/css-min.png\" alt=\"css\" width=\"30\" /> CSS</li>\r\n<li><img class=\"img-fluid\" src=\"assets/img/logo/bootstrap.png\" alt=\"bootstrap\" width=\"30\" /> BOOTSTRAP</li>\r\n<li><img class=\"img-fluid\" src=\"assets/img/logo/javascript-min.png\" alt=\"javascript\" width=\"30\" /> Javascript</li>\r\n<li><img class=\"img-fluid\" src=\"assets/img/logo/php.png\" alt=\"php\" width=\"30\" /> PHP</li>\r\n<li><img class=\"img-fluid\" src=\"assets/img/logo/mysql.png\" alt=\"mysql\" width=\"30\" /> MySQL</li>\r\n<li><img class=\"img-fluid\" src=\"assets/img/logo/wordpress-min.png\" alt=\"wordpress\" width=\"30\" /> Wordpress</li>\r\n<li><img class=\"img-fluid\" src=\"assets/img/logo/codeigniter-min.png\" alt=\"codeigniter\" width=\"30\" /> CodeIgniter</li>\r\n<li><img class=\"img-fluid\" src=\"assets/img/logo/1200px-Octicons-mark-github.svg.png\" alt=\"Github\" width=\"30\" /> Github</li>\r\n<li><img class=\"img-fluid\" src=\"assets/img/logo/linux.png\" alt=\"linux\" width=\"30\" /> Linux Debian, Ubuntu, Centos</li>\r\n</ul>', '2021-07-25 15:22:17', 'left', 1, 1),
(3, 'COMPETENCES', '<p>Connaissances approfondies des langages MYSQL, PHP, HTML, JAVASCRIPT, CSS.</p>\r\n<p>Création de base de données, Maquetter une application, Framework CodeIgniter, Conception d\'application Web et Web Mobile.</p>\r\n<p>Analyser des problèmes techniques.</p>\r\n<p>Respecter les règles et consigne de sécurité.</p>', '2021-07-25 15:23:32', 'left', 2, 1),
(4, 'QUALITES', '<ul>\r\n<li>\r\nTravailleur\r\n</li>\r\n<li>\r\nCurieux\r\n</li>\r\n<li>\r\nSérieux\r\n</li>\r\n<li>Persévérant</li>\r\n</ul>', '2021-07-25 15:23:55', 'left', 3, 1),
(5, 'INTRODUCTION', '<p class=\"font-italic text-justify\">Passionn&eacute; d&rsquo;informatique depuis 2005, j&rsquo;aime relever des d&eacute;fis techniques et r&eacute;soudre les probl&egrave;mes les plus complexes. J&rsquo;ai commenc&eacute; en autodidacte, principalement en proc&eacute;dural, et depuis 2 ans en POO. J&rsquo;ai des comp&eacute;tences &eacute;lev&eacute;es en HTML, Javascript, PHP (proc&eacute;dural, PDO, POO) et MySQL. Je connais l&rsquo;environnement serveur Debian, Ubuntu, centOS. Afin de professionnaliser toutes mes comp&eacute;tences, j\'ai suivi une formation &agrave; l&rsquo;AFPA du 19 Octobre 2020 au 9 Juillet 2021.</p>', '2021-07-25 15:24:18', 'right', 2, 1),
(6, 'FORMATION', '<strong> DEVELOPPEUR WEB ET WEB MOBILE</strong>\r\n<p class=\"font-italic\">Afpa - Amiens 10/2020 - 07/2021</p>\r\n<strong>DYNAMIQUE VERS L&rsquo;EMPLOI</strong>\r\n<p class=\"font-italic\">Centre relais Amiens 07/2020 &ndash; 10/2020</p>', '2021-07-25 15:25:22', 'right', 3, 1),
(7, 'EXPERIENCES PROFESSIONNELLES', '<strong>DEVELOPPEUR WEB</strong>\r\n<p class=\"font-italic\">Ma Prospection &agrave; Narbonne (stage en t&eacute;l&eacute;travail) 04/2021 - 07/2021</p>\r\n<strong>VENDEUR IMPRIMEUR</strong>\r\n<p class=\"font-italic\">01/09/2020 - 12/09/2020 (Top Office Amiens Sud)</p>\r\n<strong>CONTRAT D&rsquo;AVENIR CITADELLE AMIENS</strong>\r\n<p class=\"font-italic\">01/2007 &ndash; 03/2007</p>\r\n<strong>INVENTORISTE</strong>\r\n<p class=\"font-italic\">Inventaire &agrave; Auchan &agrave; Dury (int&eacute;rim Adecco) 06/2003 &ndash; 06/2006</p>\r\n<strong>AGENT DE PRODUCTION</strong>\r\n<p class=\"font-italic\">Prima France &agrave; Amiens 03/2003 - 09/2003</p>\r\n<strong>AGENT DE FABRICATION</strong>\r\n<p class=\"font-italic\">Friskies &agrave; Aubigny 12/2002 - 06/2003</p>', '2021-07-25 15:26:44', 'right', 4, 1),

-- --------------------------------------------------------

--
-- Structure de la table `demarcharge`
--

CREATE TABLE `demarcharge` (
  `id` int(11) NOT NULL COMMENT 'id aléatoire',
  `nom` varchar(150) NOT NULL COMMENT 'nom de société',
  `email` varchar(160) NOT NULL,
  `date` datetime NOT NULL COMMENT 'date d''envoi',
  `etat` enum('attente','refus','accepté') NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT 'statut'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `emplacement` enum('profil','sociaux') NOT NULL DEFAULT 'profil'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `content`, `date`, `emplacement`) VALUES
(4, '<img class=\"rounded\" src=\"assets/file/personage_head_powerfit.jpg\" alt=\"\" width=\"150\" />', '2021-07-29 12:12:27', 'profil'),
(5, '<a title=\"github\" href=\"https://github.com/Lefhar\" target=\"_blank\" rel=\"noopener\"><img class=\"img-fluid\" src=\"assets/file/1200px-Octicons-mark-github.svg[1].png\" alt=\"\" width=\"30\" /></a><a title=\"linkedin\" href=\"https://www.linkedin.com/in/harold-lefebvre/\" target=\"_blank\" rel=\"noopener\"><img class=\"img-fluid\" src=\"assets/file/linkedin[1].png\" alt=\"\" width=\"37\" /></a>', '2021-07-29 12:16:57', 'sociaux');

-- --------------------------------------------------------

--
-- Structure de la table `mesprojets`
--

CREATE TABLE `mesprojets` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `contenu` longtext NOT NULL,
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lien_github` varchar(200) NOT NULL,
  `lien_web` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mesprojets`
--

INSERT INTO `mesprojets` (`id`, `title`, `contenu`, `date_create`, `lien_github`, `lien_web`) VALUES
(3, 'Jarditou avec CodeIgniter', '<a title=\"jarditou CodeIgniter\" href=\"https://jarditou.lefebvreharold.fr/\" target=\"_blank\" rel=\"noopener\"><img class=\"w-100\" src=\"assets/file/jarditou_ci-min2-min_1.dat\" alt=\"\" width=\"250\" /></a>', '2021-07-30 12:57:03', 'https://github.com/Lefhar/CodeIgniter_exercice.git', 'https://jarditou.lefebvreharold.fr/'),
(6, 'Jarditou wordpress', '<a title=\"Jarditou avec wordpress\" href=\"https://dev.amorce.org/lharold/wordpress/\" target=\"_blank\" rel=\"noopener\"><img class=\"w-100\" src=\"assets/file/jarditou-wordpress-min[1].dat\" alt=\"jarditou wordpress\" width=\"250\" /></a>', '2021-07-30 13:08:18', 'https://github.com/Lefhar/template_wp_jarditou.git', 'https://dev.amorce.org/lharold/wordpress/'),
(4, 'Pblv-scoop', '<a title=\"pblv-scoop\" href=\"https://pblv-scoop.com/\" target=\"_blank\" rel=\"noopener\"><img class=\"w-100\" src=\"assets/file/pblv-scoop-min2-min[1].dat\" alt=\"pblv-scoop\" width=\"250\" /></a>', '2021-07-30 13:02:03', '', 'https://pblv-scoop.com/'),
(9, 'Portfolio CodeIgniter 4', '<a title=\"Portfolio CodeIgniter 4\" href=\"https://lefebvreharold.fr/\" target=\"_blank\" rel=\"noopener\"><img class=\"w-100\" src=\"assets/file/portfolio.dat\" alt=\"portfolio CodeIgniter 4\" width=\"250\" /></a>', '2021-07-30 13:12:55', 'https://github.com/Lefhar/portfolio.git', 'https://lefebvreharold.fr/'),
(5, 'Travail de formation', '<a title=\"Travail de formation\" href=\"http://travaildeformation.tk/\" target=\"_blank\" rel=\"noopener\"><img class=\"w-100\" src=\"assets/file/travaildeformation-min2-min[1].dat\" alt=\"travail de formation\" width=\"250\" /></a>', '2021-07-30 13:06:41', 'https://github.com/Lefhar/travaildeformation.git', 'http://travaildeformation.tk/'),
(8, 'Wazaa immo', '<a title=\"wazaa immo\" href=\"https://wazaaimmo.lefebvreharold.fr/\" target=\"_blank\" rel=\"noopener\"><img class=\"w-100\" src=\"assets/file/wazaa_immo-min[1].dat\" alt=\"wazaa immo\" width=\"250\" /></a>', '2021-07-30 13:10:05', 'https://github.com/Lefhar/wazaaimmo.git', 'https://wazaaimmo.lefebvreharold.fr/');

-- --------------------------------------------------------

--
-- Structure de la table `servermail`
--

CREATE TABLE `servermail` (
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `smtp` varchar(100) NOT NULL,
  `port` int(4) NOT NULL DEFAULT '25'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'id aléatoire',
  `role` int(1) NOT NULL DEFAULT '0',
  `email` varchar(250) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_connect` datetime NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `jeton` varchar(255) NOT NULL,
  `mail_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contenu_cv`
--
ALTER TABLE `contenu_cv`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `demarcharge`
--
ALTER TABLE `demarcharge`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emplacement` (`emplacement`);

--
-- Index pour la table `mesprojets`
--
ALTER TABLE `mesprojets`
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `servermail`
--
ALTER TABLE `servermail`
  ADD UNIQUE KEY `username` (`username`,`password`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contenu_cv`
--
ALTER TABLE `contenu_cv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `demarcharge`
--
ALTER TABLE `demarcharge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id aléatoire', AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `mesprojets`
--
ALTER TABLE `mesprojets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id aléatoire', AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
