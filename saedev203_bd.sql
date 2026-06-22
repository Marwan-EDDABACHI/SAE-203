-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql-saedev203.alwaysdata.net
-- Generation Time: Jun 22, 2026 at 10:36 AM
-- Server version: 11.4.12-MariaDB
-- PHP Version: 8.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saedev203_bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `auteur_id` int(11) DEFAULT NULL,
  `auteur` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `chapo` longtext NOT NULL,
  `contenu` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp() COMMENT '(DC2Type:datetime_immutable)',
  `lien_yt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `auteur_id`, `auteur`, `titre`, `chapo`, `contenu`, `image`, `date_creation`, `lien_yt`) VALUES
(7, 1, 'Maëlane FAIDIDE', 'Production audio et vidéos', 'Introduction production audio et vidéos', 'Le BUT MMI forme des cr&eacute;atifs polyvalents capables de piloter un projet audiovisuel de A &agrave; Z. Les cours couvrent l&#039;&eacute;criture de sc&eacute;narios, la ma&icirc;trise technique du mat&eacute;riel (cam&eacute;ras, micros, lumi&egrave;res) et la post-production sur la suite Adobe.\r\n\r\nTu apprendras &agrave; r&eacute;aliser des interviews, des reportages ou des contenus pour les r&eacute;seaux sociaux, tout en d&eacute;veloppant un regard critique sur l&#039;image. L&#039;accent est mis sur la pratique via les SA&Eacute;, o&ugrave; tu produis des vid&eacute;os concr&egrave;tes pour des clients r&eacute;els. C&#039;est le parcours id&eacute;al pour transformer ta passion en expertise professionnelle.\r\n\r\n', 'https://media.lesechos.com/api/v1/images/view/682f1579026f1425f3028eb2/1280x720/01403282867918-web-tete.jpg', '2026-04-14 13:32:06', 'https://youtu.be/wqQCKec1NfM?si=CUSRB9RjhXOH7J5c\r\n'),
(8, 3, 'Marwan EDDABACHI', 'Economie du droit du num&eacute;rique', 'C&#039;est quoi Economie du droit du num&eacute;rique en MMI ?', 'En MMI, l&#039;&eacute;co-droit du num&eacute;rique d&eacute;finit le cadre l&eacute;gal et &eacute;conomique des m&eacute;tiers du web. Tu y d&eacute;couvres la propri&eacute;t&eacute; intellectuelle pour prot&eacute;ger tes cr&eacute;ations et le RGPD pour s&eacute;curiser les donn&eacute;es utilisateurs. Le cours aborde aussi les mod&egrave;les &eacute;conomiques (SaaS, freemium) et le droit de la consommation li&eacute; au e-commerce. L&#039;enjeu est de devenir un professionnel responsable, capable de naviguer entre innovation et conformit&eacute; juridique. C&#039;est le socle indispensable pour entreprendre ou travailler en agence sans risque l&eacute;gal.', 'https://www.esam-ecoles.com/sites/esam/files/igs/2026-01/école-de-droit-importance-créativité-pour-juristes.jpg', '2026-05-06 14:08:41', 'https://youtu.be/2STycFbNk0c?si=9lnpov-ls6-dQhvy'),
(9, 5, 'Rayan JANANA', 'Stratégie de communication', 'C\'est quoi la stratégie de communication en MMI ?', 'La stratégie de communication en MMI consiste à concevoir des solutions adaptées aux besoins d\'un client et de sa cible. Tu y apprends à analyser un marché, à définir un positionnement unique et à choisir les bons leviers (réseaux sociaux, SEO, print). Le cours met l\'accent sur la création d\'un plan de communication cohérent, du diagnostic (SWOT) jusqu\'au budget. L\'objectif est de savoir raconter une histoire (storytelling) tout en mesurant l\'efficacité des actions via des indicateurs de performance. C\'est le cerveau qui dirige la création graphique et le développement technique.', 'ressources/images/strategiedecom.png', '2026-05-06 14:14:06', 'https://youtu.be/z-HiEkJoxWA?si=K29qr0tr34PgobS_'),
(17, 7, 'Ayyoub Isli', 'Produire un site Web', 'Dans ce projet, nous avons appris &agrave; cr&eacute;er un site internet de A &agrave; Z. C&#039;est une &eacute;tape super importante dans notre formation pour apprendre &agrave; coder.', 'Pour commencer, nous avons d&ucirc; imaginer &agrave; quoi allait ressembler notre site. En imaginant les menus et la place de chaque &eacute;l&eacute;ment sur les pages.\r\nEnsuite, nous sommes pass&eacute;s &agrave; la pratique avec le code sur l&#039;ordinateur ! On a utilis&eacute; le langage HTML pour &eacute;crire le texte et construire la page, puis le CSS pour faire toute la d&eacute;coration et rendre le site agr&eacute;able &agrave; regarder. Ce n&#039;&eacute;tait pas toujours facile au d&eacute;but de trouver les petites erreurs dans nos lignes de code, mais c&#039;est tr&egrave;s motivant de voir le r&eacute;sultat final s&#039;afficher pour de vrai sur l&#039;&eacute;cran.', 'https://exob2b.com/wp-content/uploads/2014/08/Comment-bien-evaluer-le-cout-de-production-dun-site-web1.jpg', '2026-06-21 12:00:22', 'https://youtu.be/K8qiXRcJA2Y?si=ZJFT-BdC0-JXMn2u'),
(18, 11, '', 'Auditer une communication num&eacute;rique', 'Avant de proposer des solutions, il faut analyser ce qui existe. Ce projet nous a appris &agrave; analyser la strat&eacute;gie web d&#039;une entreprise pour comprendre ce qui marche.', 'On s&#039;est mis dans la peau d&#039;une vraie agence. On a pris la pr&eacute;sence en ligne d&#039;une marque (son site, ses r&eacute;seaux, son r&eacute;f&eacute;rencement) et on a tout analys&eacute;. Le but &eacute;tait de trouver ses points forts et surtout ses faiblesses. On a regroup&eacute; toutes nos observations dans un dossier d&#039;audit. C&#039;est une &eacute;tape obligatoire : on ne peut pas am&eacute;liorer la communication d&#039;un client si on ne comprend pas d&#039;abord o&ugrave; sont ses probl&egrave;mes actuels.', 'https://panodyssey.com/uploads/images/0d3432b916701b8a91c4aec693982d4d.png', '2026-06-21 17:35:59', 'https://youtu.be/HGu_bF03VTo?si=lZ5IcLHy21Vcf3XQ'),
(19, 1, '', 'Cr&eacute;er une recommandation de communication', 'Cette SA&Eacute; nous a demand&eacute; d&#039;imaginer des solutions concr&egrave;tes et une nouvelle strat&eacute;gie pour r&eacute;pondre aux probl&egrave;mes du client. C&#039;est la suite logique de l&#039;audit. ', 'Une fois le probl&egrave;me identifi&eacute;, il fallait trouver les solutions. On a d&ucirc; construire une strat&eacute;gie compl&egrave;te : d&eacute;finir de nouveaux objectifs, trouver la bonne cible et choisir les bons r&eacute;seaux. On a propos&eacute; des actions pr&eacute;cises, fait un planning pr&eacute;visionnel et m&ecirc;me calcul&eacute; un budget. La derni&egrave;re &eacute;tape, et pas la plus facile, c&#039;&eacute;tait de pr&eacute;senter nos id&eacute;es &agrave; l&#039;oral pour d&eacute;fendre notre projet et montrer que notre strat&eacute;gie tenait la route.', 'https://media.tag24.de/951x634/k/w/kwwljfgzw3hc9dcxxwvr09tj101df24g.jpg', '2026-06-21 17:39:52', 'https://youtu.be/LrKlY9FcVOI?si=p2BF9LEkJdhYPl4d'),
(20, 3, '', 'G&eacute;rer un projet web en &eacute;quipe', 'Avoir des comp&eacute;tences techniques c&#039;est bien, mais savoir s&#039;organiser &agrave; plusieurs pour rendre un travail dans les temps, c&#039;est indispensable. C&#039;est tout l&#039;enjeu de cette SA&Eacute;.', 'Ce module nous a appris la base du travail en agence. Quand on g&egrave;re un gros dossier de refonte comme on a pu le faire avec le territoire Paris Terres d&#039;Envol, on ne peut pas avancer au hasard. On a appris &agrave; bien d&eacute;finir les r&ocirc;les de chacun dans le groupe, &agrave; utiliser des outils de suivi pour les t&acirc;ches, et &agrave; faire des r&eacute;unions r&eacute;guli&egrave;res. &Ccedil;a nous a montr&eacute; qu&#039;une bonne organisation et une bonne entente dans l&#039;&eacute;quipe sont la cl&eacute; pour ne pas se laisser d&eacute;border.', 'https://www.paristerresdenvol.fr/app/uploads/1/2026/04/PTE_site_Mes-services_1200x800_3.jpg', '2026-06-21 17:46:16', 'https://youtu.be/y6EqaGyrxYE?si=6-GIipMAxQsRcziA'),
(21, 5, '', 'Produire les &eacute;l&eacute;ments d&#039;une communication visuelle', 'Dans ce projet, l&#039;objectif &eacute;tait de cr&eacute;er toute l&#039;identit&eacute; visuelle d&#039;une marque, des premi&egrave;res maquettes jusqu&#039;aux graphismes finaux.', 'On a commenc&eacute; par r&eacute;fl&eacute;chir &agrave; l&#039;organisation et on a cr&eacute;&eacute; des maquettes sur Figma pour voir comment placer les &eacute;l&eacute;ments et les menus sur nos &eacute;crans. Une fois que cette structure de base &eacute;tait valid&eacute;e, on est pass&eacute;s &agrave; la pratique sur la suite Adobe. On a utilis&eacute; Illustrator et Photoshop pour cr&eacute;er un vrai logo, d&eacute;finir une charte graphique avec nos propres couleurs, et pr&eacute;parer toutes les images. C&#039;est l&#039;&eacute;tape indispensable o&ugrave; on s&#039;occupe de tout le design pour rendre le projet vraiment pro et agr&eacute;able &agrave; regarder.', 'https://www.artkdiff.com/wp-content/uploads/2018/03/freepik-e1588099757938.jpg', '2026-06-21 17:48:47', 'https://youtu.be/y9XuiAdfGq4?si=NxQxyPPan8mhxr4M');

-- --------------------------------------------------------

--
-- Table structure for table `auteur`
--

CREATE TABLE `auteur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `lien_twitter` varchar(255) NOT NULL,
  `lien_avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `auteur`
--

INSERT INTO `auteur` (`id`, `nom`, `prenom`, `lien_twitter`, `lien_avatar`) VALUES
(1, 'Ma&euml;lane ', 'Faidide', 'https://twitter.com/universitecergy', 'https://tiermaker.com/images/chart/chart/waifu-list-thin-106037/002webp.png'),
(3, 'Eddabachi', 'Marwan', 'https://twitter.com/universitecergy', 'https://media.tenor.com/c-fmfYiYatEAAAAd/ronaldo.gif'),
(5, 'Janana', 'Rayan', 'https://twitter.com/universitecergy', 'https://media.tenor.com/xEc6rOUcWY0AAAAC/sixseven-six.gif'),
(7, 'Ayyoub', 'Isli', 'https://twitter.com/universitecergy', 'https://media.tenor.com/D8Vb23MTxrQAAAAd/tk78-tk-78.gif'),
(11, 'Guillot', 'Florent', 'https://twitter.com/universitecergy\r\n', 'https://media.tenor.com/jwIqm_v_Au0AAAAi/hahaha.gif');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contenu` longtext NOT NULL,
  `type` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp() COMMENT '(DC2Type:datetime_immutable)',
  `telephone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `nom`, `prenom`, `email`, `contenu`, `type`, `date_creation`, `telephone`) VALUES
(1, 'Martin', 'Thomas', 'm.thomas43@yopmail.com', 'Je suis intéressé par la formation.', 'etudiant', '2022-04-13 08:28:01', ''),
(2, 'Despoux', 'Helena', 'h.despoux@foo.fr', 'Je suis intéressé par la formation.', 'etudiant', '2022-04-13 08:28:01', ''),
(14, 'Faidide', 'Maelane', 'aurelfdde@gmail.com', '                                    nfnfnfnfnfnfjj', 'etudiant', '2026-04-14 11:45:03', ''),
(15, '', 'Marwan', 'mrwn04.10@gmail.com', 'Test avec le numero de telephone', 'etudiant', '2026-05-06 14:34:09', '0651960616'),
(16, '', 'Marwan', 'mrwn04.10@gmail.com', 'nom', 'etudiant', '2026-05-06 14:44:29', '0651960616'),
(17, 'Eddabachi', 'Marwan', 'mrwn04.10@gmail.com', '                                1    ', 'etudiant', '2026-05-06 14:48:01', '0651960616'),
(18, 'Marwan', 'Marwan', 'mrwn04.10@gmail.com', '                      hahaha              ', 'etudiant', '2026-06-17 16:39:26', '0651960616'),
(19, 'Marwan', 'Marwan', 'mrwn04.10@gmail.com', '                      hahaha              ', 'etudiant', '2026-06-17 16:39:35', '0651960616'),
(20, 'Marwan', 'Marwan', 'mrwn04.10@gmail.com', '                      hahaha              ', 'etudiant', '2026-06-17 16:39:37', '0651960616'),
(21, 'dhd', 'fhd', 'tjsrjrj@dfgndn.com', '                                    rjsrjr-ujs', 'etudiant', '2026-06-20 16:57:50', '1541984rtshj'),
(22, 'Janana', 'Rayan', 'rayan.janana007@gmail.com', '         f', 'pas_precise', '2026-06-20 16:58:08', '0749329123'),
(23, 'r', 'r', 'rayan.janana007@gmail.com', '                                                                   jthsdf                                         ', 'etudiant', '2026-06-20 17:00:39', '0749329123'),
(24, 'Marwan', 'Marwan', 'mrwn04.10@gmail.com', 'test                                                                                                                                  ', 'etudiant', '2026-06-20 17:08:35', '0651960616'),
(25, 'Marwan', 'Marwan', 'mrwn04.10@gmail.com', 'test                                                                                                                                  ', 'etudiant', '2026-06-20 17:08:38', '0651960616'),
(26, 'Marwan', 'Marwan', 'mrwn04.10@gmail.com', 'test                                                                                                                                  ', 'etudiant', '2026-06-20 17:08:41', '0651960616'),
(27, 'Janana', 'Rayan', 'rayan.janana007@gmail.com', '     t', 'pas_precise', '2026-06-20 17:10:17', '0749329123'),
(28, 'Janana', 'Rayan', 'rayan.janana007@gmail.com', '     t', 'pas_precise', '2026-06-20 17:10:21', '0749329123'),
(29, 'Janana', 'Rayan', 'rayan.janana007@gmail.com', '     t', 'pas_precise', '2026-06-20 17:10:23', '0749329123'),
(30, 'Marwan', 'Marwan', 'mrwn04.10@gmail.com', 'test                                                                                                                                  ', 'etudiant', '2026-06-20 17:12:22', '0651960616'),
(31, 'Marwan', 'Marwan', 'mrwn04.10@gmail.com', 'reset                                               ', 'etudiant', '2026-06-20 17:17:04', '0651960616'),
(32, 'Marwan', 'Marwan', 'mrwn04.10@gmail.com', 'reset                                               ', 'etudiant', '2026-06-20 17:17:07', '0651960616'),
(33, 'Janana', 'Rayan', 'rayan.janana007@gmail.com', '                                    gshs', 'etudiant', '2026-06-20 18:17:24', '0749329123'),
(34, 'Janana', 'Rayan', 'rayan.janana007@gmail.com', '                                    gshs', 'etudiant', '2026-06-20 18:17:27', '0749329123'),
(35, 'Janana', 'Rayan', 'rayan.janana007@gmail.com', '                                    gshs', 'etudiant', '2026-06-20 18:17:29', '0749329123'),
(36, 'Janana', 'Rayan', 'rayan.janana007@gmail.com', '                                    gshs', 'etudiant', '2026-06-20 18:17:31', '0749329123'),
(37, 'Janana', 'Rayan', 'rayan.janana007@gmail.com', '                                    hr', 'pas_precise', '2026-06-20 18:22:37', '0749329123'),
(38, 'hd', 'dg', 'rayan.janana007@gmail.com', '                                    h', 'pas_precise', '2026-06-20 18:22:50', 'hd'),
(39, 'Janana', 'Rayan', 'rayan.janana007@gmail.com', '                                    dhdh', 'pas_precise', '2026-06-20 18:23:47', '00'),
(40, 'Janana', 'Rayan', 'rayan.janana007@gmail.com', '                                    dhdh', 'pas_precise', '2026-06-20 18:23:49', '00'),
(41, 'Janana', 'Rayan', 'rayan.janana007@gmail.com', '                                    dhdh', 'pas_precise', '2026-06-20 18:23:51', '00'),
(42, 'Janana', 'Rayan', 'rayan.janana007@g', '                                    h', 'etudiant', '2026-06-20 18:25:20', '0749329123'),
(43, 'Marwan', 'Marwan', 'mrwn04.10@gmail.com', 'reset    ', 'etudiant', '2026-06-20 21:50:16', '0651960616'),
(44, 'Marwan', 'Marwan', 'mrwn04.10@gmail.com', 'reset    ', 'etudiant', '2026-06-20 21:50:20', '0651960616'),
(45, 'Janana', 'Rayan', 'rayan.janana007@gmail.com', '                                    f', 'pas_precise', '2026-06-21 19:12:19', '0749329123'),
(46, 'Janana', 'Rayan', 'rayan.janana007@gmail.com', '                                    th', 'pas_precise', '2026-06-21 19:13:51', '0749329123'),
(47, 'dghd', 'dh', 'dg@gmail.com', '                hd                    ', 'etudiant', '2026-06-21 19:15:14', 'rgyhed'),
(48, 'Marwan', 'Marwan', 'mrwn04.10@gmail.com', '                      test fini obligatoire                                                                                     ', 'etudiant', '2026-06-21 19:29:53', '0651960616'),
(49, 'Janana', 'Rayan', 'rayan.janana007@gmail.com', '                                    jersterjh', 'pas_precise', '2026-06-21 19:35:25', '0749329123'),
(50, 'Marwan', 'Marwan', 'mrwn04.10@gmail.com', '                    vert                            ', 'etudiant', '2026-06-21 19:36:25', '0651960616'),
(51, 'Janana', 'Rayan', 'rayan.janana007@gmail.com', '                                    bswdhqwd', 'etudiant', '2026-06-21 19:39:06', '0749329123'),
(52, 'Janana', 'Rayan', 'rayan.janana007@gmail.com', '                                    er(tuhe', 'etudiant', '2026-06-21 19:43:16', '0749329123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_23A0E6660BB6FE6` (`auteur_id`);

--
-- Indexes for table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_23A0E6660BB6FE6` FOREIGN KEY (`auteur_id`) REFERENCES `auteur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
