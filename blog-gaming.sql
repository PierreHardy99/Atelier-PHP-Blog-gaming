-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 22 juin 2021 à 19:20
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog-gaming`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `articleId` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(300) DEFAULT NULL,
  `imgUrl` varchar(300) DEFAULT NULL,
  `content` text,
  `date` datetime DEFAULT NULL,
  `categorieId` int(11) DEFAULT NULL,
  `gameCategorieId` int(11) DEFAULT NULL,
  `auteurId` int(11) DEFAULT NULL,
  `gameId` int(11) DEFAULT NULL,
  `hardId` int(11) DEFAULT NULL,
  `star` int(11) NOT NULL,
  PRIMARY KEY (`articleId`),
  KEY `FK_TYPE_ARTICLE` (`categorieId`),
  KEY `FK_TYPE_GENRE` (`gameCategorieId`),
  KEY `FK_CREE_PAR` (`auteurId`),
  KEY `FK_CONCERNE_JEU` (`gameId`),
  KEY `FK_CONSOLE_JOUABLE` (`hardId`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`articleId`, `titre`, `imgUrl`, `content`, `date`, `categorieId`, `gameCategorieId`, `auteurId`, `gameId`, `hardId`, `star`) VALUES
(61, 'Life is Strange: True Colors : la productrice et le directeur narratif répondent à nos questions !', '../../src/img/article/1624380186lifeisstrangetruecolor-PC-COVER.jpg', '<h4>Pr&eacute;vu pour le 10 septembre prochain, Life is Strange: New Colors a b&eacute;n&eacute;fici&eacute; d\'une bonne couverture durant cet E3 2021, avec plusieurs extraits de gameplay montrant les pouvoirs d\'Alex, l\'h&eacute;ro&iuml;ne de cette nouvelle aventure, centr&eacute;s sur les &eacute;motions. Nous avons pu discuter avec la productrice et le directeur narratif de ce nouvel opus et de son d&eacute;veloppement.</h4>\r\n<p><img src=\"../img/article/1624380042lifeisstrangetruecolorNews.png\" alt=\"\" width=\"293\" height=\"172\" /></p>\r\n<p><strong>Rebecca Bassel</strong>, productrice de&nbsp;<a href=\"https://www.jeuxvideo.com/jeux/ps5/jeu-1379247/\">Life is Strange : True Colors</a>, et&nbsp;<strong>Jon Zimmerman</strong>, son directeur narratif, ont accept&eacute; de r&eacute;pondre &agrave; nos questions sur l\'approche sc&eacute;naristique et les nouveaut&eacute;s de gameplay de cet &eacute;pisode tr&egrave;s attendu par les fans.</p>\r\n<p>La suite du jeu &eacute;pisodique&nbsp;<a href=\"https://www.jeuxvideo.com/jeux/playstation-4-ps4/00053839-life-is-strange.htm\">Life is Strange</a>, qui a su devenir une r&eacute;f&eacute;rence du jeu narratif, met en sc&egrave;ne&nbsp;<strong>Alex Chen</strong>, jeune femme dot&eacute;e de&nbsp;<strong>pouvoirs li&eacute;s aux &eacute;motions</strong>, qu\'elle peut percevoir chez son entourage sous forme d\'auras color&eacute;es. Prenant place dans la petite ville de Haven Springs, Colorado, l\'aventure et la narration de True Colors sont centr&eacute;es sur&nbsp;<strong>les relations</strong>&nbsp;qu\'entretient Alex avec ses semblables. Cette nouvelle exp&eacute;rience r&eacute;sulte de la volont&eacute; des d&eacute;veloppeurs et sc&eacute;naristes du titre &agrave; mettre un point d\'honneur sur la notion d\'empathie et sur le lien existant entre le joueur et les personnages, comme nous l\'expliquent Rebecca et Jon.</p>\r\n<p><strong>Life is Strange: New Colors</strong>&nbsp;sera disponible le&nbsp;<strong>10 septembre</strong>&nbsp;prochain sur&nbsp;<strong>tous les supports console</strong>, sur&nbsp;<strong>PC</strong>&nbsp;et sur&nbsp;<strong>Google Stadia</strong>.</p>', '2021-06-22 16:43:06', 1, 7, 6, 21, 18, 1),
(57, 'Returnal : difficulté ajustée, nouveautés DualSense... Ce que contient la mise à jour 1.4', '../../src/img/article/1624379289returnalNews1.png', '<h5><span style=\"font-family: \'arial black\', sans-serif;\">Dans le branle-bas de combat des annonces des &eacute;diteurs &agrave; l\'occasion de l\'E3 et de ses diff&eacute;rents &eacute;v&eacute;nements, Housemarque Studio a discr&egrave;tement d&eacute;ploy&eacute; un nouveau patch pour Returnal.</span></h5>\r\n<p><span style=\"font-family: \'arial black\', sans-serif;\"><img src=\"../img/article/1624379052returnalNews.png\" alt=\"\" width=\"300\" height=\"168\" /></span></p>\r\n<p>Alors qu\'aujourd\'hui tous les yeux sont&nbsp;riv&eacute;s sur&nbsp;<a href=\"https://www.jeuxvideo.com/jeux/ps5/jeu-1237545/\">Ratchet &amp; Clank : Rift Apart</a>, la r&eacute;cente exclusivit&eacute; PlayStation 5 qu\'est&nbsp;<a href=\"https://www.jeuxvideo.com/jeux/ps5/jeu-1237554/\">Returnal</a>&nbsp;continue de se mettre &agrave; jour. La preuve hier puisque Housemarque, le studio derri&egrave;re le titre, a annonc&eacute; hier d&eacute;ployer la version 1.40 de son jeu. Au programme, de nombreux ajustements concernant les troph&eacute;es, mais aussi l\'ajout de retours haptiques pour \"<em>favoriser l\'immersion</em>\".&nbsp;<strong>Par ailleurs, on peut noter qu\'une ligne mentionne la r&eacute;vision de la difficult&eacute; de chaque biome</strong>. S\'il est impossible de voir quelque chose de concret avec une telle d&eacute;claration, on pourrait penser que Housemarque a &eacute;cout&eacute; la plainte de certains joueurs : ils trouvaient le titre trop difficile.</p>\r\n<p><strong>Returnal est disponible sur PlayStation 5 depuis le 30 avril dernier. La mise &agrave; jour 1.4 sera live le lundi 14 juin &agrave; 11h00 heure fran&ccedil;aise.</strong></p>', '2021-06-22 16:28:09', 1, 1, 6, 1, 2, 0),
(59, 'Dishonored : Les musiques des jeux réunies dans un album de cinq vinyles', '../../src/img/article/1624379525dishonoredNews.png', '<h4>Depuis quelques jours, Arkane Studios f&ecirc;te ses 20 ans, ce qui a d\'ailleurs donn&eacute; lieu &agrave; un long reportage du c&ocirc;t&eacute; de chez NoClip. Laced Record, &eacute;diteur musical, a profit&eacute; de cet anniversaire pour annoncer un gros album vinyle d&eacute;di&eacute; &agrave; la licence Dishonored.</h4>\r\n<p>En effet, les joueurs et les adeptes de musique peuvent d&egrave;s maintenant&nbsp;<a href=\"https://www.lacedrecords.co/products/dishonored-the-soundtrack-collection\" target=\"_blank\" rel=\"noopener\">pr&eacute;commander</a>&nbsp;<em>Dishonored : The Soundtrack Collection</em>, qui comprend&nbsp;<strong>5 disques, sur lesquels figureront 68 morceaux issus de&nbsp;<a href=\"https://www.jeuxvideo.com/jeux/jeu-77171/\">Dishonored</a>,&nbsp;<a href=\"https://www.jeuxvideo.com/jeux/jeu-429098/\">Dishonored 2</a>&nbsp;et&nbsp;<a href=\"https://www.jeuxvideo.com/jeux/jeu-670026/\">Dishonored : La Mort de l\'Outsider</a></strong>. Le tout co&ucirc;te&nbsp;<strong>85 livres Sterling, ce qui correspond &agrave; la somme de 93,30&euro;</strong>, et sera&nbsp;<strong>exp&eacute;di&eacute; au cours du mois d\'ao&ucirc;t.</strong>&nbsp;Parmi les artistes cr&eacute;dit&eacute;s, nous retrouverons Daniel Licht, Jon Licht et Mary Elizabeth McGlynn, Voodoo Highway, Copilot Music + Sound, Raphael Colantonio, Terri Brosius, et Benjamin Shielden. En ce qui concerne la liste des morceaux, nous vous renvoyons vers la&nbsp;<a href=\"https://www.lacedrecords.co/products/dishonored-the-soundtrack-collection\" target=\"_blank\" rel=\"noopener\">fiche du produit</a>, sur le site de Laced Records.</p>', '2021-06-22 16:32:05', 1, 6, 6, 19, 18, 1),
(60, 'Legend of Mana : Le remaster léger d\'un jeu de rôle action surprenant', '../../src/img/article/1624379907legendofmana-PS4-COVER.png', '<h4>Paru en 1999 sur PlayStation, Legend of Mana go&ucirc;te au breuvage de jouvence et s&rsquo;offre une seconde vie. Quatri&egrave;me volet de la saga des Seiken Densetsu (s&eacute;rie des Mana), il est l&rsquo;&oelig;uvre d&rsquo;une v&eacute;ritable dream team c&ocirc;t&eacute; d&eacute;veloppeurs (Koichi Ishii, Akitoshi Kawazu, AKihiko Matsui, Yoko Shimomura&hellip;) et se paye le luxe d&rsquo;&ecirc;tre un spin-off (un &eacute;pisode alternatif dans une saga)&hellip; de spin-off. Concr&egrave;tement, les Mana sont des &eacute;pisodes alternatifs de Final Fantasy et ce Legend of Mana s\'av&egrave;re &ecirc;tre un spin off de Seiken Densetsu et fait le pari de s&rsquo;&eacute;loigner des codes de sa propre licence. &Agrave; l&rsquo;&eacute;poque, il avait divis&eacute;, mais il a toujours eu ses d&eacute;fenseurs. En 2021, qu&rsquo;en est-il ? On prend notre truelle de ma&icirc;tre-cr&eacute;ateur (votre r&ocirc;le dans le jeu) et on vous livre notre verdict.</h4>\r\n<p><img src=\"../img/article/1624379777legendofmanaNews.png\" alt=\"\" width=\"480\" height=\"270\" /></p>\r\n<p>Neuf si&egrave;cles avant les &eacute;v&egrave;nements du jeu, le l&eacute;gendaire arbre Mana &ndash; source de vie et de magie &ndash; fut victime d&rsquo;un terrible incendie. Cette catastrophe d&eacute;clencha une guerre entre diff&eacute;rents clans de Sages, soucieux de r&eacute;cup&eacute;rer le peu de pouvoir qu&rsquo;il restait.&nbsp;<strong>L&rsquo;&eacute;nergie de Mana fut stock&eacute;e dans des reliques et le combat s&rsquo;amplifia, chaque caste essayant de prendre le contr&ocirc;le des fragments magiques.</strong>&nbsp;Les ann&eacute;es, les d&eacute;cennies, les si&egrave;cles pass&egrave;rent et la puissance du Mana commen&ccedil;a &agrave; d&eacute;cliner. Peu &agrave; peu, la paix revint sur le monde de Fa&rsquo;Diel. Jadis &eacute;rig&eacute; comme un Dieu, l&rsquo;Arbre Mana n&rsquo;est plus qu&rsquo;une lointaine l&eacute;gende dont tout le monde se d&eacute;sint&eacute;resse. Jusqu&rsquo;&agrave; aujourd&rsquo;hui&hellip;</p>', '2021-06-22 16:38:27', 1, 9, 6, 20, 4, 0),
(62, 'The Last of Us Part II : Une magnifique statuette d\'Abby annoncée chez Dark Horse', '../../src/img/article/1624381162thelastofus2-PS4-COVER.png', '<h4>Sorti il y a maintenant un an, The Last of Us Part II a marqu&eacute; l\'ann&eacute;e 2020 des joueurs, la communaut&eacute; de jeuxvideo.com ayant d&eacute;cid&eacute; de lui attribuer le prix du jeu de l\'ann&eacute;e. En attendant savoir ce sur quoi le studio travaille, Dark Horse annonce un nouveau produit d&eacute;riv&eacute;.</h4>\r\n<p><img src=\"../img/article/1624381045thelastofuspart2News.png\" alt=\"\" width=\"480\" height=\"480\" /></p>\r\n<p>Ellie, personnage iconique de la licence, avait eu pr&eacute;c&eacute;demment droit &agrave; deux statuettes, l\'une avec une machette, vendue 99,99$ et une seconde avec son arc, vendue 119,99$. On monte aujourd\'hui le tarif d\'un cran, avec l\'annonce d\'une statuette repr&eacute;sentant Abby, l\'autre personnage principal de&nbsp;<a href=\"https://www.jeuxvideo.com/jeux/ps4/jeu-412345/\">The Last of Us Part II</a>. La statuette de&nbsp;35,56 cm de hauteur et de 25,4 cm est en effet vendue 199,99$ avec 67,67$ dollars de frais de port&nbsp;vers la France.&nbsp;<a href=\"https://direct.darkhorse.com/products/the-last-of-us-part-ii-abby-statue\" target=\"_blank\" rel=\"noopener\">Les pr&eacute;commandes</a>&nbsp;sont ouvertes&nbsp;jusqu\'au 30 juillet, mais les stocks sont assez faibles et on ne sait pas si un r&eacute;assort est pr&eacute;vu par Dark Horse. Pour ceux qui auront fait l\'acquisition de la statuette, il faudra&nbsp;ensuite attendre le premier trimestre 2022 pour la recevoir&nbsp;et l\'exposer. Evidemment, afin de limiter les probl&egrave;mes, Dark Horse limite &agrave; deux exemplaires le nombre de statuettes qu\'il est possible d\'acheter.</p>', '2021-06-22 16:59:22', 1, 7, 6, 22, 4, 1),
(63, 'Cyberpunk 2077 : le patch 1.23 est là, voici la liste complète des correctifs', '../../src/img/article/1624381486cyberpunk2077News.png', '<h4>CD Projekt RED l\'avait promis, CD Projekt RED l\'a fait : le patch 1.23 est d&eacute;sormais disponible au t&eacute;l&eacute;chargement, corrigeant de nouveaux bugs de Cyberpunk 2077. La firme polonaise nous gratifie ainsi du changelog, que voici ci-dessous.</h4>\r\n<p><img src=\"../img/article/1624381401cyberpunk20772News.png\" alt=\"\" width=\"300\" height=\"168\" /></p>\r\n<p>Il y a quelques semaines, on apprenait le d&eacute;veloppement d\'une nouvelle mise &agrave; jour pour&nbsp;<a href=\"https://www.jeuxvideo.com/jeux/pc/00045155-cyberpunk-2077.htm\">Cyberpunk 2077</a>, sans vraiment savoir sur quoi elle porterait exactement : tout ce qu\'avait dit CD Projekt, c\'est que maintenant que les principales tares sont corrig&eacute;es (permettant ainsi&nbsp;<a href=\"https://www.jeuxvideo.com/news/1424744/cyberpunk-2077-le-jeu-va-revenir-officiellement-sur-le-ps-store-la-date-revelee.htm\">le retour du jeu sur le PlayStation Store</a>), les d&eacute;veloppeurs se concontreraient sur des probl&egrave;mes mineurs pour affiner l\'exp&eacute;rience.&nbsp;<strong>Aujourd\'hui signe donc l\'arriv&eacute;e du fameux patch, portant la douce nomenclature 1.23, accompagn&eacute;e de la liste des changement depuis&nbsp;<a href=\"https://www.cyberpunk.net/fr/news/38639/patch-1-23\" target=\"_blank\" rel=\"noopener\">le site officiel</a>.</strong></p>\r\n<p><strong>Cette update s\'occupe donc d\'effacer certains probl&egrave;mes concernant l\'open-world, de nombreuses qu&ecirc;tes, le gameplay ou encore les graphismes. La stabilit&eacute; et les performances sont &eacute;galement abord&eacute;es</strong>, d&eacute;sormais retouch&eacute;es encore davantage. On notera &eacute;galement une foule de modifications concernant uniquement la version PC, ainsi qu\'une autre d&eacute;di&eacute;e &agrave; la version Xbox One. Tout est list&eacute; ci-dessous, en esp&eacute;rant que vous y trouviez votre bonheur.</p>\r\n<h2 id=\"quetes-et-monde-ouvert\">QU&Ecirc;TES ET MONDE OUVERT</h2>\r\n<p><strong>Space Oddity</strong></p>\r\n<ul style=\"list-style-type: square;\">\r\n<li>Correction d\'un bug o&ugrave; l\'objectif &laquo; Ouvrir le colis &raquo; pouvait changer de position.</li>\r\n</ul>\r\n<p><strong>Contrat : Affaires de famille</strong></p>\r\n<ul style=\"list-style-type: square;\">\r\n<li>Correction d\'un bug o&ugrave; le joueur pouvait voir dispara&icirc;tre la voiture de Juliet apr&egrave;s avoir termin&eacute; la qu&ecirc;te.</li>\r\n<li>Correction d\'un bug de diffusion dans la maison de Juliet.</li>\r\n<li>Correction d\'un bug o&ugrave; le joueur ne pouvait pas entrer dans la maison de Juliet s\'il ne remplissait aucune des conditions d\'attribut.</li>\r\n</ul>\r\n<p><strong>Le casse</strong></p>\r\n<ul style=\"list-style-type: square;\">\r\n<li>Correction d\'un bug o&ugrave; Jackie pouvait passer &agrave; travers les vitres.</li>\r\n<li>Correction d\'un bug qui emp&ecirc;chait certains gardes d\'attaquer le joueur.</li>\r\n<li>Correction d\'un bug o&ugrave; l\'objectif &laquo; Chercher l\'agent d\'Arasaka &raquo; pouvait rester actif apr&egrave;s avoir &eacute;t&eacute; accompli.</li>\r\n<li>Correction d\'un bug o&ugrave; le m&eacute;ca n\'apparaissait pas &agrave; l\'accueil.</li>\r\n<li>Correction d\'un bug o&ugrave; certains gardes d\'Arasaka pouvaient passer &agrave; travers la porte.</li>\r\n<li>Correction d\'un bug o&ugrave; certains gardes pouvaient appara&icirc;tre de mani&egrave;re anormale devant le joueur.</li>\r\n<li>Correction d\'un bug o&ugrave; le corps d\'un agent d\'Arasaka &eacute;tait inaccessible, ce qui emp&ecirc;chait le joueur de r&eacute;cup&eacute;rer un &eacute;clat et bloquait la progression.</li>\r\n</ul>\r\n<p><strong>La nomade</strong></p>\r\n<ul style=\"list-style-type: square;\">\r\n<li>Retrait d\'indications de touches inutiles.</li>\r\n</ul>\r\n<p><strong>The Hunt</strong></p>\r\n<ul style=\"list-style-type: square;\">\r\n<li>Le son du bulletin d\'informations contenu dans l\'&eacute;clat de River est d&eacute;sormais jou&eacute; correctement.</li>\r\n</ul>\r\n<p><strong>The Beast in Me</strong></p>\r\n<ul style=\"list-style-type: square;\">\r\n<li>Correction d\'un bug o&ugrave; la progression pouvait &ecirc;tre bloqu&eacute;e si le joueur quittait Claire trop rapidement apr&egrave;s la course de Santo Domingo.</li>\r\n</ul>\r\n<p><strong>Queen of the Highway</strong></p>\r\n<ul style=\"list-style-type: square;\">\r\n<li>Correction d\'un bug o&ugrave; le Basilisk pouvait passer &agrave; travers certains arbres.</li>\r\n</ul>\r\n<p><strong>Down on the Street</strong></p>\r\n<ul style=\"list-style-type: square;\">\r\n<li>Correction d\'un bug o&ugrave; parler &agrave; Wakako ne d&eacute;clenchait aucune option de dialogue concernant la qu&ecirc;te.</li>\r\n</ul>\r\n<p><strong>Forward to Death</strong></p>\r\n<ul style=\"list-style-type: square;\">\r\n<li>La fum&eacute;e et la poussi&egrave;re ne clignotent plus lorsque le joueur se trouve dans le Basilisk.</li>\r\n</ul>\r\n<p><strong>Contrat : Adieu, Night City</strong></p>\r\n<ul style=\"list-style-type: square;\">\r\n<li>Correction d\'un bug o&ugrave; la progression pouvait &ecirc;tre bloqu&eacute;e si le joueur appelait Delamain apr&egrave;s avoir secouru Bruce.</li>\r\n</ul>\r\n<p><strong>Path of Glory</strong></p>\r\n<ul style=\"list-style-type: square;\">\r\n<li>Correction d\'un bug o&ugrave; V pouvait se coincer dans la Navi si le joueur se tenait sur le point d\'atterrissage avant son arriv&eacute;e.</li>\r\n</ul>\r\n<p><strong>Contrat : Trop dou&eacute;e pour eux</strong></p>\r\n<ul style=\"list-style-type: square;\">\r\n<li>Correction d\'un bug o&ugrave; il &eacute;tait impossible d\'ouvrir la porte du garage de Dakota &agrave; la fin de la qu&ecirc;te.</li>\r\n<li>Correction d\'un bug o&ugrave; Iris pouvait se t&eacute;l&eacute;porter au lieu de marcher.</li>\r\n</ul>\r\n<p><strong>Contrat : &Ccedil;a chauffe...</strong></p>\r\n<ul style=\"list-style-type: square;\">\r\n<li>Correction d\'un bug o&ugrave; la voiture du fixer pouvait continuer tout droit &agrave; l\'intersection au lieu de tourner &agrave; droite.</li>\r\n<li>Correction d\'un bug o&ugrave; l\'indication permettant d\'utiliser le r&eacute;frig&eacute;rant sur 8ug8ear pouvait toujours &ecirc;tre s&eacute;lectionn&eacute;e au moment de la d&eacute;brancher, ce qui entra&icirc;nait des probl&egrave;mes d\'animation.</li>\r\n<li>Correction d\'un bug o&ugrave; il &eacute;tait impossible de porter 8ug8ear.</li>\r\n<li>Correction d\'un bug o&ugrave; des PNJ pouvaient appara&icirc;tre sous le sol et bloquer la progression.</li>\r\n</ul>\r\n<p><strong>Contrat : Plusieurs fa&ccedil;ons de plumer un canard</strong></p>\r\n<ul style=\"list-style-type: square;\">\r\n<li>Correction d\'un bug o&ugrave; des notifications de Regina concernant ce contrat pouvaient appara&icirc;tre durant Le casse.</li>\r\n<li>Correction d\'un bug o&ugrave; il &eacute;tait possible de se connecter &agrave; l\'ordinateur apr&egrave;s avoir d&eacute;truit le fourgon et rat&eacute; la qu&ecirc;te, ce qui pouvait coincer le joueur.</li>\r\n<li>Correction d\'un bug o&ugrave; la progression pouvait rester bloqu&eacute;e sur l\'objectif &laquo; Se rendre au complexe de Revere Courier Services &raquo;.</li>\r\n</ul>\r\n<p><strong>Cyberpsycho rep&eacute;r&eacute; : O&ugrave; viennent mourir les hommes</strong></p>\r\n<ul style=\"list-style-type: square;\">\r\n<li>Correction d\'un bug o&ugrave;, apr&egrave;s avoir r&eacute;cup&eacute;r&eacute; les informations, il &eacute;tait impossible de les envoyer &agrave; Regina car l\'objectif suivant ne s\'affichait pas.</li>\r\n</ul>\r\n<p><strong>Cyberpsycho rep&eacute;r&eacute; : Dans l\'oreille d\'un sourd</strong></p>\r\n<ul style=\"list-style-type: square;\">\r\n<li>Correction d\'un bug o&ugrave;, apr&egrave;s avoir r&eacute;cup&eacute;r&eacute; les informations, il &eacute;tait impossible de les envoyer &agrave; Regina car l\'objectif suivant ne s\'affichait pas.</li>\r\n</ul>\r\n<p><strong>I Fought the Law</strong></p>\r\n<ul style=\"list-style-type: square;\">\r\n<li>Correction d\'un bug o&ugrave; River ne se trouvait pas au point de rendez-vous avant d\'entrer dans le Red Queen\'s Race.</li>\r\n</ul>\r\n<h2 id=\"gameplay\">GAMEPLAY</h2>\r\n<ul style=\"list-style-type: square;\">\r\n<li>Correction d\'un bug o&ugrave;, apr&egrave;s avoir tu&eacute; un PNJ et vol&eacute; sa voiture, le corps de celui-ci pouvait rester coinc&eacute; dans le v&eacute;hicule.</li>\r\n<li>Adam Smasher ne subira plus de d&eacute;g&acirc;ts pendant les animations entre ses phases d\'attaque.</li>\r\n<li>Correction d\'un bug o&ugrave; laisser tomber le corps d\'un PNJ pouvait causer trop de d&eacute;g&acirc;ts.</li>\r\n<li>Le mat&eacute;riel cybern&eacute;tique CataR&eacute;siste fonctionne d&eacute;sormais correctement.</li>\r\n</ul>\r\n<h2 id=\"visuel\">VISUEL</h2>\r\n<ul style=\"list-style-type: square;\">\r\n<li>Correction de l\'apparence spectrale de Johnny dans diverses qu&ecirc;tes.</li>\r\n<li>R&eacute;solution de divers bugs de clipping li&eacute;s aux v&ecirc;tements des PNJ.</li>\r\n<li>Correction de l\'apparence de rochers dans les Badlands.</li>\r\n</ul>\r\n<p><strong>La collecte</strong></p>\r\n<ul style=\"list-style-type: square;\">\r\n<li>Correction d\'un bug o&ugrave; l\'un des Maelstromers se tenait debout les bras &eacute;cart&eacute;s.</li>\r\n</ul>\r\n<h2 id=\"stabilite-et-performances\">STABILIT&Eacute; ET PERFORMANCES</h2>\r\n<ul style=\"list-style-type: square;\">\r\n<li>Correction de nombreux crashs : animations, IU, sc&egrave;ne, physique et syst&egrave;mes de gameplay.</li>\r\n<li>Optimisations de la m&eacute;moire et am&eacute;liorations de la gestion de la m&eacute;moire de divers syst&egrave;mes (r&eacute;duction du nombre de crashs).</li>\r\n<li>Diverses optimisations du processeur sur console.</li>\r\n<li>Am&eacute;lioration de la m&eacute;moire et des entr&eacute;es/sorties afin de limiter le nombre de PNJ &agrave; l\'apparence identique apparaissant dans une m&ecirc;me zone et d\'am&eacute;liorer la diffusion.</li>\r\n</ul>\r\n<h2 id=\"modifications-specifiques-pc\">MODIFICATIONS SP&Eacute;CIFIQUES PC</h2>\r\n<ul style=\"list-style-type: square;\">\r\n<li>Correction d\'un bug o&ugrave; il &eacute;tait impossible de cliquer sur le bouton d\'am&eacute;lioration en r&eacute;solution 1280x720.</li>\r\n<li>Correction d\'un bug o&ugrave; appuyer sur Alt+Entr&eacute;e pour basculer entre les modes Fen&ecirc;tre et Plein &eacute;cran pouvait bloquer le jeu.</li>\r\n</ul>\r\n<p><strong>Steam :</strong></p>\r\n<ul style=\"list-style-type: square;\">\r\n<li>La langue de votre client Steam est d&eacute;sormais s&eacute;lectionn&eacute;e si vous choisissez d\'utiliser les param&egrave;tres de langue par d&eacute;faut.</li>\r\n<li>Un message demandant de v&eacute;rifier l\'int&eacute;grit&eacute; des donn&eacute;es de jeu appara&icirc;tra d&eacute;sormais lorsque des donn&eacute;es de jeu incompl&egrave;tes ou corrompues seront d&eacute;tect&eacute;es.</li>\r\n</ul>\r\n<h2 id=\"modifications-specifiques-xbox\">MODIFICATIONS SP&Eacute;CIFIQUES XBOX</h2>\r\n<ul style=\"list-style-type: square;\">\r\n<li>Correction d\'un bug o&ugrave; se d&eacute;connecter pendant un fondu &agrave; la fermeture d\'une sc&egrave;ne pouvait partiellement bloquer le jeu.</li>\r\n<li>Correction d\'un bug o&ugrave; le menu Pause pouvait se rouvrir tout seul si le guide Xbox et le menu Pause avaient &eacute;t&eacute; ferm&eacute;s coup sur coup.</li>\r\n</ul>', '2021-06-22 17:04:46', 4, 10, 6, 24, 18, 0);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `categorieId` int(11) NOT NULL AUTO_INCREMENT,
  `nomCategorie` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`categorieId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`categorieId`, `nomCategorie`) VALUES
(1, 'News'),
(4, 'Mise à jour'),
(5, 'E-sport');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `commentaireId` int(11) NOT NULL AUTO_INCREMENT,
  `articleId` int(11) DEFAULT NULL,
  `auteurId` int(11) DEFAULT NULL,
  `pseudo` varchar(100) DEFAULT NULL,
  `dateCommentaire` datetime DEFAULT NULL,
  `contenu` text,
  PRIMARY KEY (`commentaireId`),
  KEY `FK_CONCERNE_ARTICLE` (`articleId`),
  KEY `FK_AUTEUR_COMMENTAIRE` (`auteurId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `gamecategory`
--

DROP TABLE IF EXISTS `gamecategory`;
CREATE TABLE IF NOT EXISTS `gamecategory` (
  `gameCategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `genre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`gameCategoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gamecategory`
--

INSERT INTO `gamecategory` (`gameCategoryId`, `genre`) VALUES
(1, 'Rogue-lite'),
(3, 'Plateforme'),
(5, 'Action'),
(6, 'Infiltration'),
(7, 'Aventure'),
(8, '/'),
(9, 'Jeu de rôle'),
(10, 'Rpg');

-- --------------------------------------------------------

--
-- Structure de la table `hardware`
--

DROP TABLE IF EXISTS `hardware`;
CREATE TABLE IF NOT EXISTS `hardware` (
  `hardId` int(11) NOT NULL AUTO_INCREMENT,
  `console` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`hardId`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `hardware`
--

INSERT INTO `hardware` (`hardId`, `console`) VALUES
(2, 'PS5'),
(15, 'XBOX Series S/X'),
(4, 'PS4'),
(5, 'SWITCH'),
(18, 'PC MASTER RACE');

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

DROP TABLE IF EXISTS `jeux`;
CREATE TABLE IF NOT EXISTS `jeux` (
  `gameId` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `consoleId` int(11) DEFAULT NULL,
  `gamecategoryId` int(11) DEFAULT NULL,
  `developpeur` varchar(100) DEFAULT NULL,
  `editeur` varchar(100) DEFAULT NULL,
  `dateDeSortie` date DEFAULT NULL,
  `cover` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`gameId`),
  KEY `FK_CONCERNE_CONSOLE` (`consoleId`),
  KEY `FK_GENRE_JEUX` (`gamecategoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`gameId`, `nom`, `consoleId`, `gamecategoryId`, `developpeur`, `editeur`, `dateDeSortie`, `cover`) VALUES
(1, 'Returnal', 2, 1, 'Hoursemarque', 'Sony', '2021-04-30', '../../src/img/cover/returnal-PS5-COVER.png'),
(19, 'Dishonored', 18, 6, 'Bethesda Softworks', 'Arkane Studios', '2012-10-09', '../../src/img/cover/dishonored-PC-COVER.jpg'),
(20, 'Legend of Mana', 4, 9, 'Square Enix', 'Square Enix', '1999-07-15', '../../src/img/cover/legendofmana-PS4-COVER.png'),
(21, 'Life is Strange: True Colors', 18, 7, 'Square Enix', 'Square Enix', '2021-09-10', '../../src/img/cover/lifeisstrangetruecolor-PC-COVER.jpg'),
(22, 'The Last of Us Part II', 4, 7, 'Naughty Dog', 'Naughty Dog', '2020-06-19', '../../src/img/cover/thelastofus2-PS4-COVER.png'),
(24, 'Cyberpunk 2077', 18, 10, 'CD Projekt', 'CD Projekt', '2020-09-17', '../../src/img/cover/cyberpunk2077-PC-COVER.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `roleId` int(11) NOT NULL AUTO_INCREMENT,
  `nomRole` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`roleId`, `nomRole`) VALUES
(1, 'admin'),
(2, 'auteur'),
(3, 'moderateur'),
(4, 'membre');

-- --------------------------------------------------------

--
-- Structure de la table `stars`
--

DROP TABLE IF EXISTS `stars`;
CREATE TABLE IF NOT EXISTS `stars` (
  `starId` int(11) NOT NULL AUTO_INCREMENT,
  `articleId` int(11) DEFAULT NULL,
  PRIMARY KEY (`starId`),
  KEY `FK_AFFICHE_UNE` (`articleId`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stars`
--

INSERT INTO `stars` (`starId`, `articleId`) VALUES
(23, 61),
(24, 62),
(22, 59);

-- --------------------------------------------------------

--
-- Structure de la table `tampon`
--

DROP TABLE IF EXISTS `tampon`;
CREATE TABLE IF NOT EXISTS `tampon` (
  `tamponId` int(11) NOT NULL AUTO_INCREMENT,
  `liens` varchar(300) DEFAULT NULL,
  `auteurId` int(11) DEFAULT NULL,
  PRIMARY KEY (`tamponId`),
  KEY `FK_ENVOYE_PAR` (`auteurId`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `avatar` varchar(200) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL,
  `roleId` int(11) DEFAULT NULL,
  `ban` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  KEY `FK_ROLE_DEFINI` (`roleId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userId`, `avatar`, `login`, `nom`, `prenom`, `email`, `mdp`, `roleId`, `ban`) VALUES
(6, '../../src/img/avatar/1624293669lebelgeduturfu.png', 'LeBelgeDuTurfu', 'Hardy', 'Pierre', 'pierre.hardy1999@gmail.com', '2655e96c3ed196614dbfb765b6f45ba9996572374f1', 1, '996572374f1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
