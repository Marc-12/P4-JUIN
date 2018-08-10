-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 10 août 2018 à 15:19
-- Version du serveur :  5.7.21
-- Version de PHP :  7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `p4`
--

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

DROP TABLE IF EXISTS `billets`;
CREATE TABLE IF NOT EXISTS `billets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `billets`
--

INSERT INTO `billets` (`id`, `titre`, `contenu`, `date_creation`) VALUES
(10, 'BRAVO MARC', 'BRAVO MARC !!!\r\nTu viens juste de rÃ©ussir ton TP !! \r\nC\'est tout juste Ã©norme mec !!\r\n', '0000-00-00 00:00:00'),
(11, 'titre', 'AZERERERER', '0000-00-00 00:00:00'),
(12, 'titre', 'sssssssssssssss\r\n', '0000-00-00 00:00:00'),
(13, 'titre', 'oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo', '0000-00-00 00:00:00'),
(14, 'titre', 'dfdf', '0000-00-00 00:00:00'),
(15, 'titre', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '0000-00-00 00:00:00'),
(16, 'titre', 'ererer', '0000-00-00 00:00:00'),
(17, 'DERNIER TITRE', 'AZERTY', '0000-00-00 00:00:00'),
(18, 'DERNIER TITRE', 'AAAAAAAAAAAAAAAAA', '0000-00-00 00:00:00'),
(19, 'marc', 'ereeeeeeeeeeeeeeeeeee\r\n', '0000-00-00 00:00:00'),
(20, 'second teitre', 'bbbbbbbbbbb', '0000-00-00 00:00:00'),
(21, '1AAAAAAAAAA', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '0000-00-00 00:00:00'),
(22, 'titreddfddf', 'Ã©aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2017-11-18 18:48:56'),
(23, 'titre', '', '2017-11-18 19:14:37'),
(24, 'titre', '', '2017-11-18 19:25:27'),
(25, 'BIENVENUE A NOVGOROD', 'JE suis aussi dans le commerce ', '2017-11-19 14:07:07'),
(26, 'titre', 'aaaaaaaaaa', '2017-11-19 14:27:36'),
(27, 'titre', '', '2017-11-19 14:29:08'),
(28, 'titre', '', '2017-11-19 14:29:25'),
(29, 'titre', '', '2017-11-19 14:39:48'),
(30, 'titre', 'azzzzzzzezez', '2017-11-19 14:54:05'),
(31, 'titreddfddf', 'nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn', '2017-11-19 15:33:37'),
(32, 'maintenant ', 'maintenant ', '2017-11-19 16:06:07'),
(33, 'Ipsum ', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repella', '2017-11-19 21:00:19'),
(34, 'titre', '', '2017-11-19 23:14:27'),
(35, 'titre', '', '2017-11-19 23:14:43'),
(36, 'aaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2017-11-19 23:17:09'),
(37, 'titre', '', '2017-11-19 23:20:39'),
(38, 'titre', '', '2017-11-19 23:20:45'),
(39, 'DERNIER TITRE', 'article du dimanche soir ', '2017-11-19 23:21:05'),
(40, 'Michel', 'L\'ange Michel', '2017-11-20 15:22:30'),
(41, 'Moi ', 'mon super post ', '2018-03-30 19:14:47'),
(42, 'mon article ', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2018-04-04 17:00:12');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=371 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `categoryName`) VALUES
(360, 'PHP'),
(361, ' Jquery'),
(362, ' Python'),
(368, ' HTML5'),
(370, ' CSS3');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `pseudo_id` int(11) NOT NULL,
  `dislike` int(11) NOT NULL,
  `likesss` int(11) NOT NULL,
  `redFlag` int(11) NOT NULL,
  `admin_comment` tinyint(4) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `pseudo_id` int(11) NOT NULL,
  `dislike` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `redFlag` int(11) NOT NULL,
  `admin_comment` tinyint(4) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `comments2`
--

DROP TABLE IF EXISTS `comments2`;
CREATE TABLE IF NOT EXISTS `comments2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `pseudo_id` int(11) NOT NULL,
  `dislike` int(11) DEFAULT '0',
  `likes` int(11) DEFAULT '0',
  `redFlag` int(11) DEFAULT '0',
  `admin_comment` tinyint(11) DEFAULT '0',
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments2`
--

INSERT INTO `comments2` (`id`, `post_id`, `pseudo_id`, `dislike`, `likes`, `redFlag`, `admin_comment`, `author`, `comment`, `comment_date`) VALUES
(28, 641, 6, 1, 1, 1, 1, 'marc', 'j\'adore votre blog !! ', '2018-07-22 15:33:09'),
(29, 641, 6, 0, 0, 0, 1, '', 'votre site internet est très intéressant continuez comme ça !!', '2018-07-30 14:07:13'),
(20, 641, 6, 1, 2, 1, 0, 'marc', 'azerty', '2018-07-21 22:28:36'),
(27, 641, 6, 0, 1, 0, 0, 'marc', 'commentaire dimanche ', '2018-07-22 15:19:23');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=642 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `category`, `image_url`, `creation_date`) VALUES
(637, 'La route vers l\'inconnu ', '<p style=\"text-align: justify;\">Lorsque Path reprit connaissance, il &eacute;tait couch&eacute;, la figure dans le sable. Une vague d&eacute;ferla sur la gr&egrave;ve mouill&eacute;e et vint lui l&eacute;cher les pieds. Il se laissa rouler sur le dos. Des mouettes noires et blanches tournoyaient dans le ciel redevenu bleu apr&egrave;s la temp&ecirc;te. Robinson s&rsquo;assit avec effort et ressentit une vive douleur &agrave; l&rsquo;&eacute;paule gauche.</p>\r\n<h2 style=\"text-align: left;\"><strong>La chute<br /></strong></h2>\r\n<p style=\"text-align: justify;\">La plage &eacute;tait jonch&eacute;e de poissons morts, de coquillages bris&eacute;s et d&rsquo;algues noires rejet&eacute;s par les flots. &Agrave; l&rsquo;ouest, une falaise rocheuse s&rsquo;avan&ccedil;ait dans la mer et se prolongeait par une cha&icirc;ne de r&eacute;cifs. C&rsquo;&eacute;tait l&agrave; que se dressait la silhouette de La Virginie avec ses m&acirc;ts arrach&eacute;s et ses cordages flottant dans le vent. Robinson se leva et fit quelques pas. Il n&rsquo;&eacute;tait pas bless&eacute;, mais son &eacute;paule contusionn&eacute;e continuait &agrave; lui faire mal. Comme le soleil commen&ccedil;ait &agrave; br&ucirc;ler, il se fit une sorte de bonnet en roulant de grandes feuilles qui croissaient au bord du rivage. Puis il ramassa une branche pour s&rsquo;en faire une canne et s&rsquo;enfon&ccedil;a dans la for&ecirc;t. 2 Extrait de la publication 12 Les troncs des arbres abattus formaient avec les taillis et les lianes qui pendaient des hautes branches un enchev&ecirc;trement difficile &agrave; percer, et souvent Robinson devait ramper &agrave; quatre pattes pour pouvoir avancer.</p>\r\n<h2 style=\"text-align: left;\"><strong>La reprise de la route</strong></h2>\r\n<p style=\"text-align: justify;\">Il n&rsquo;y avait pas un bruit, et aucun animal ne se montrait. Aussi Robinson fut-il bien &eacute;tonn&eacute; en apercevant &agrave; une centaine de pas la silhouette d&rsquo;un bouc sauvage au poil tr&egrave;s long qui se dressait immobile, et qui paraissait l&rsquo;observer. L&acirc;chant sa canne trop l&eacute;g&egrave;re, Robinson ramassa une grosse souche qui pourrait lui servir de massue. Quand il arriva &agrave; proximit&eacute; du bouc, l&rsquo;animal baissa la t&ecirc;te et grogna sourdement. Robinson crut qu&rsquo;il allait foncer sur lui. Il leva sa massue et l&rsquo;abattit de toutes ses forces entre les cornes du bouc. La b&ecirc;te tomba sur les genoux, puis bascula sur le flanc. Apr&egrave;s plusieurs heures de marche laborieuse, Robinson arriva au pied d&rsquo;un massif de rochers entass&eacute;s en d&eacute;sordre.</p>\r\n<p>Il d&eacute;couvrit l&rsquo;entr&eacute;e d&rsquo;une grotte, ombrag&eacute;e par un c&egrave;dre g&eacute;ant; mais il n&rsquo;y fit que quelques pas, parce qu&rsquo;elle &eacute;tait trop profonde pour pouvoir &ecirc;tre explor&eacute;e ce jour-l&agrave;. Il pr&eacute;f&eacute;ra escalader les rochers, afin d&rsquo;embrasser une vaste &eacute;tendue du regard. C&rsquo;est ainsi, debout sur le sommet du plus haut rocher, qu&rsquo;il constata que la mer cernait de tous c&ocirc;t&eacute;s la terre o&ugrave; il se trouvait et qu&rsquo;aucune trace d&rsquo;habitation n&rsquo;&eacute;tait visible ; il &eacute;tait donc sur une &icirc;le d&eacute;serte. Il s&rsquo;expliqua ainsi l&rsquo;immobilit&eacute; du bouc qu&rsquo;il avait assomm&eacute;. Les animaux sauvages qui n&rsquo;ont jamais vu</p>', '', 'public/images/posts/a3cd24094e98598491c1a914ba20c512.jpeg', '2018-06-04 16:38:01'),
(638, 'Nuit Magique ', '<p style=\"text-align: justify;\">R&eacute;veill&eacute; par les premiers rayons du soleil levant, Path commen&ccedil;a &agrave; redescendre vers le rivage d&rsquo;o&ugrave; il &eacute;tait parti la veille. Il sautait de rocher en rocher et de tronc en tronc, de talus en talus et de souche en souche, et il y trouvait un certain plaisir parce qu&rsquo;il se sentait frais et dispos apr&egrave;s une bonne nuit de sommeil. En somme sa situation &eacute;tait loin d&rsquo;&ecirc;tre d&eacute;sesp&eacute;r&eacute;e. Certes, cette &icirc;le &eacute;tait apparemment d&eacute;serte. Mais cela ne valait-il pas mieux que si elle avait &eacute;t&eacute; peupl&eacute;e de cannibales?</p>\r\n<p style=\"text-align: justify;\">En outre elle paraissait assez accueillante avec sa belle plage au nord, des prairies tr&egrave;s humides et sans doute mar&eacute;- cageuses &agrave; l&rsquo;est, sa grande for&ecirc;t &agrave; l&rsquo;ouest, et, en son centre, ce massif rocheux que per&ccedil;ait une grotte myst&eacute;rieuse et qui offrait un point de vue magnifique sur tout l&rsquo;horizon. Il en &eacute;tait l&agrave; de ses r&eacute;flexions quand il aper&ccedil;ut au milieu de la piste, qu&rsquo;il avait suivie la veille, le cadavre du bouc assomm&eacute;. D&eacute;j&agrave; une demi-douzaine de vautours au cou d&eacute;plum&eacute; et au bec crochu se 3 Extrait distribu&eacute; par Gallimard Jeunesse 16 disputaient la charogne.</p>\r\n<p style=\"text-align: justify;\">Path les dispersa en faisant tournoyer son b&acirc;ton au-dessus de sa t&ecirc;te, et les gros oiseaux s&rsquo;envol&egrave;rent lourdement l&rsquo;un apr&egrave;s l&rsquo;autre en courant sur leurs pattes torses pour d&eacute;coller. Puis il chargea sur ses &eacute;paules ce qui restait du bouc, et poursuivit plus lentement sa marche vers la plage. L&agrave;, il d&eacute;coupa avec son couteau un quartier de viande et le fit r&ocirc;tir suspendu &agrave; trois b&acirc;tons nou&eacute;s en tr&eacute;pied au-dessus d&rsquo;un feu de bois. La flamme p&eacute;tillante le r&eacute;conforta davantage que la viande coriace et qui sentait le bouc.</p>', '', 'public/images/posts/beb06068873fd230abce71b14c58110f.jpeg', '2018-06-04 16:51:42'),
(639, 'L\'appel de la nature', '<p>Ces armes, ces outils, ces provisions que contenait la cale du navire, Pathpensait bien qu&rsquo;il faudrait qu&rsquo;il se d&eacute;cide &agrave; les sauver avant qu&rsquo;une nouvelle temp&ecirc;te ne les emporte. Mais il esp&eacute;rait toujours n&rsquo;en avoir pas besoin, parce que &ndash; pensait-il &ndash; un navire ne tarderait pas &agrave; venir le chercher. Aussi consacraitil tous ses efforts &agrave; installer des signaux sur la plage et sur la falaise. &Agrave; c&ocirc;t&eacute; du feu toujours allum&eacute; sur Extrait de la publication Extrait distribu&eacute; par Gallimard Jeunesse la gr&egrave;ve, il entassa des fagots de branchages et une quantit&eacute; de varech gr&acirc;ce auxquels il provoquerait des torrents de fum&eacute;e si une voile pointait &agrave; l&rsquo;horizon. Ensuite, il eut l&rsquo;id&eacute;e d&rsquo;un m&acirc;t plant&eacute; dans le sable, au sommet duquel &eacute;tait pos&eacute;e une perche. L&rsquo;un des bouts de cette perche touchait au sol.</p>\r\n<p>En cas d&rsquo;alerte, Robinson y fixerait un fagot enflamm&eacute;, et il le ferait monter haut dans le ciel en tirant avec une liane sur l&rsquo;autre bout de la perche. Plus tard, il trouva mieux encore : sur la falaise se dressait un grand arbre mort, un eucalyptus, dont le tronc &eacute;tait creux. Il bourra le tronc de brindilles et de b&ucirc;chettes qui &ndash; enflamm&eacute;es &ndash; transformeraient vite tout l&rsquo;arbre en une immense torche visible &agrave; des kilom&egrave;tres. Il se nourrissait au hasard de coquillages, de racines de foug&egrave;res, de noix de coco, de baies, d&rsquo;&oelig;ufs d&rsquo;oiseaux et de tortues. Le troisi&egrave;me jour, il jeta loin de lui la carcasse du bouc qui commen&ccedil;ait &agrave; sentir.</p>\r\n<p>Mais il regretta bient&ocirc;t ce geste, car les vautours qui s&rsquo;en r&eacute;gal&egrave;rent ne cess&egrave;rent plus d&eacute;sormais de le suivre et de l&rsquo;&eacute;pier dans l&rsquo;attente de nouvelles aubaines. Parfois, exasp&eacute;r&eacute;, il les bombardait avec des pierres et des b&ucirc;ches. Alors les sinistres oiseaux s&rsquo;&eacute;cartaient paresseusement, mais c&rsquo;&eacute;tait pour revenir aussit&ocirc;t.</p>', '', 'public/images/posts/f345ccd763cfad2007f52217d7a3c1af.jpeg', '2018-06-04 16:54:38'),
(640, 'Au rythme de la nature', '<p style=\"text-align: justify;\">Il se nourrissait au hasard de coquillages, de racines de foug&egrave;res, de noix de coco, de baies, d&rsquo;&oelig;ufs d&rsquo;oiseaux et de tortues. Le troisi&egrave;me jour, il jeta loin de lui la carcasse du bouc qui commen&ccedil;ait &agrave; sentir. Mais il regretta bient&ocirc;t ce geste, car les vautours qui s&rsquo;en r&eacute;gal&egrave;rent ne cess&egrave;rent plus d&eacute;sormais de le suivre et de l&rsquo;&eacute;pier dans l&rsquo;attente de nouvelles aubaines. Parfois, exasp&eacute;r&eacute;, il les bombardait avec des pierres et des b&ucirc;ches. Alors les sinistres oiseaux s&rsquo;&eacute;cartaient paresseusement, mais c&rsquo;&eacute;tait pour revenir aussit&ocirc;t.</p>', '', 'public/images/posts/8f857139062d19a0fe426fc3dfc81f8a.jpeg', '2018-06-04 17:03:41'),
(641, 'Une vie dans la nature', '<p style=\"text-align: justify;\">R&eacute;veill&eacute; par les premiers rayons du soleil levant, Robinson commen&ccedil;a &agrave; redescendre vers le rivage d&rsquo;o&ugrave; il &eacute;tait parti la veille. Il sautait de rocher en rocher et de tronc en tronc, de talus en talus et de souche en souche, et il y trouvait un certain plaisir parce qu&rsquo;il se sentait frais et dispos apr&egrave;s une bonne nuit de sommeil. En somme sa situation &eacute;tait loin d&rsquo;&ecirc;tre d&eacute;sesp&eacute;r&eacute;e.</p>\r\n<p style=\"text-align: justify;\">Certes, cette &icirc;le &eacute;tait apparemment d&eacute;serte. Mais cela ne valait-il pas mieux que si elle avait &eacute;t&eacute; peupl&eacute;e de cannibales? En outre elle paraissait assez accueillante avec sa belle plage au nord, des prairies tr&egrave;s humides et sans doute mar&eacute;- cageuses &agrave; l&rsquo;est, sa grande for&ecirc;t &agrave; l&rsquo;ouest, et, en son centre, ce massif rocheux que per&ccedil;ait une grotte myst&eacute;rieuse et qui offrait un point de vue magnifique sur tout l&rsquo;horizon. Il en &eacute;tait l&agrave; de ses r&eacute;flexions quand il aper&ccedil;ut au milieu de la piste, qu&rsquo;il avait suivie la veille, le cadavre du bouc assomm&eacute;. D&eacute;j&agrave; une demi-douzaine de vautours au cou d&eacute;plum&eacute; et au bec crochu se 3 Extrait distribu&eacute; par Gallimard Jeunesse 16 disputaient la charogne. Robinson les dispersa en faisant tournoyer son b&acirc;ton au-dessus de sa t&ecirc;te, et les gros oiseaux s&rsquo;envol&egrave;rent lourdement l&rsquo;un apr&egrave;s l&rsquo;autre en courant sur leurs pattes torses pour d&eacute;coller.</p>\r\n<p style=\"text-align: justify;\">Puis il chargea sur ses &eacute;paules ce qui restait du bouc, et poursuivit plus lentement sa marche vers la plage. L&agrave;, il d&eacute;coupa avec son couteau un quartier de viande et le fit r&ocirc;tir suspendu &agrave; trois b&acirc;tons nou&eacute;s en tr&eacute;pied au-dessus d&rsquo;un feu de bois. La flamme p&eacute;tillante le r&eacute;conforta davantage que la viande coriace et qui sentait le bouc. Il d&eacute;cida d&rsquo;entretenir toujours ce feu pour &eacute;conomiser son briquet &agrave; silex et pour attirer l&rsquo;attention de l&rsquo;&eacute;quipage d&rsquo;un navire qui croiserait &eacute;ventuelExtrait distribu&eacute; par Gallimard Jeunesse 17 lement au large de l&rsquo;&icirc;le. Il est vrai que rien ne pouvait mieux alerter des matelots de passage que l&rsquo;&eacute;pave de La Virginie toujours plant&eacute;e sur son r&eacute;cif; d&rsquo;autant plus qu&rsquo;elle pouvait donner l&rsquo;espoir d&rsquo;un riche butin &agrave; ceux qui s&rsquo;en empareraient. Ces armes, ces outils, ces provisions que contenait la cale du navire, Robinson pensait bien qu&rsquo;il faudrait qu&rsquo;il se d&eacute;cide &agrave; les sauver avant qu&rsquo;une nouvelle temp&ecirc;te ne les emporte. Mais il esp&eacute;rait toujours n&rsquo;en avoir pas besoin, parce que &ndash; pensait-il &ndash; un navire ne tarderait pas &agrave; venir le chercher. Aussi consacraitil tous ses efforts &agrave; installer des signaux sur la plage et sur la falaise. &Agrave; c&ocirc;t&eacute; du feu toujours allum&eacute; sur Extrait de la publication Extrait distribu&eacute; par Gallimard Jeunesse la gr&egrave;ve, il entassa des fagots de branchages et une quantit&eacute; de varech gr&acirc;ce auxquels il provoquerait des torrents de fum&eacute;e si une voile pointait &agrave; l&rsquo;horizon. Ensuite, il eut l&rsquo;id&eacute;e d&rsquo;un m&acirc;t plant&eacute; dans le sable, au sommet duquel &eacute;tait pos&eacute;e une perche. L&rsquo;un des bouts de cette perche touchait au sol. En cas d&rsquo;alerte, Robinson y fixerait un fagot enflamm&eacute;, et il le ferait monter haut dans le ciel en tirant avec une liane sur l&rsquo;autre bout de la perche. Plus tard, il trouva mieux encore : sur la falaise se dressait un grand arbre mort, un eucalyptus, dont le tronc &eacute;tait creux. Il bourra le tronc de brindilles et de b&ucirc;chettes qui &ndash; enflamm&eacute;es &ndash; transformeraient vite tout l&rsquo;arbre en une immense torche visible &agrave; des kilom&egrave;tres. Il se nourrissait au hasard de coquillages, de racines de foug&egrave;res, de noix de coco, de baies, d&rsquo;&oelig;ufs d&rsquo;oiseaux et de tortues. Le troisi&egrave;me jour, il jeta loin de lui la carcasse du bouc qui commen&ccedil;ait &agrave; sentir.</p>\r\n<p style=\"text-align: justify;\">Mais il regretta bient&ocirc;t ce geste, car les vautours qui s&rsquo;en r&eacute;gal&egrave;rent ne cess&egrave;rent plus d&eacute;sormais de le suivre et de l&rsquo;&eacute;pier dans l&rsquo;attente de nouvelles aubaines. Parfois, exasp&eacute;r&eacute;, il les bombardait avec des pierres et des b&ucirc;ches. Alors les sinistres oiseaux s&rsquo;&eacute;cartaient paresseusement, mais c&rsquo;&eacute;tait pour revenir aussit&ocirc;t.</p>', '', 'public/images/posts/0864e6be066f365d51e766128cbbd016.jpeg', '2018-06-04 17:06:43');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `admin`, `pseudo`, `pass`, `email`, `date_inscription`) VALUES
(13, '', 'marc2', '$2y$10$wLNhUEZn9s63dc/h1MKkFeRL0B42h5Qn5PC1lN5vKR8R6OctCREyC', 'marc2@gmail.com', '2018-08-10 17:04:45'),
(12, 'admin', 'marc', '$2y$10$l3wrP2kQ/BDqitZ4mJVuEeMqWFYWMRZayCK0IPOV3z9AyDMBTtgr2', 'marc@gmail.com', '2018-08-10 16:00:04');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs1`
--

DROP TABLE IF EXISTS `utilisateurs1`;
CREATE TABLE IF NOT EXISTS `utilisateurs1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
