-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 22 nov. 2017 à 11:11
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db700408713`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--


DROP TABLE IF EXISTS `mail`;
DROP TABLE IF EXISTS `membres`;
DROP TABLE IF EXISTS `commentaires`;
DROP TABLE IF EXISTS `articles`;


CREATE TABLE IF NOT EXISTS `articles` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `date_article` datetime NOT NULL,
  `contenu` text NOT NULL,
  `description` mediumtext NOT NULL,
  `img_article` mediumtext NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_article`, `titre`, `auteur`, `date_article`, `contenu`, `description`, `img_article`) VALUES
(1, 'Article 1', 'Elo', '2017-11-05 11:00:17', '<p>\r\n    Ut enim benefici liberalesque sumus, non ut exigamus gratiam (neque enim beneficium faeneramur sed natura propensi ad\r\n    liberalitatem sumus), sic amicitiam non spe mercedis adducti sed quod omnis eius fructus in ipso amore inest, expetendam\r\n    putamus.\r\n</p>\r\n\r\n<a href=\"http://facebook.com\">Lien</a>\r\n\r\n<h3>\r\n    Sed si ille hac tam eximia fortuna propter utilitatem\r\n</h3>\r\n\r\n<p>\r\n    Emensis itaque difficultatibus multis et nive obrutis callibus plurimis ubi prope Rauracum ventum est ad supercilia\r\n    fluminis Rheni, resistente multitudine Alamanna pontem suspendere navium conpage Romani vi nimia vetabantur ritu\r\n    grandinis undique convolantibus telis, et cum id inpossibile videretur, imperator cogitationibus magnis attonitus, quid\r\n    capesseret ambigebat.\r\n</p>\r\n\r\n<p>\r\n    Sed si ille hac tam eximia fortuna propter utilitatem rei publicae frui non properat, ut omnia illa conficiat, quid ego,\r\n    senator, facere debeo, quem, etiamsi ille aliud vellet, rei publicae consulere oporteret?\r\n</p>\r\n\r\n<p>\r\n    Et Epigonus quidem amictu tenus philosophus, ut apparuit, prece frustra temptata, sulcatis lateribus mortisque metu\r\n    admoto turpi confessione cogitatorum socium, quae nulla erant, fuisse firmavit cum nec vidisset quicquam nec audisset\r\n    penitus expers forensium rerum; Eusebius vero obiecta fidentius negans, suspensus in eodem gradu constantiae stetit\r\n    latrocinium illud esse, non iudicium clamans.\r\n</p>\r\n\r\n<p>\r\n    Adolescebat autem obstinatum propositum erga haec et similia multa scrutanda, stimulos admovente regina, quae abrupte\r\n    mariti fortunas trudebat in exitium praeceps, cum eum potius lenitate feminea ad veritatis humanitatisque viam reducere\r\n    utilia suadendo deberet, ut in Gordianorum actibus factitasse Maximini truculenti illius imperatoris rettulimus\r\n    coniugem.\r\n</p>', 'Ceci est le premier article. Blabla blabla. Test description article 1.\r\nUn joli oiseau volait dans le grand ciel bleu. Ceci est le premier article. Blabla blabla. Test description article 1.\r\nUn joli oiseau volait dans le grand ciel bleu.\r\nCeci est le premier article. Blabla blabla. Test description article 1.\r\nUn joli oiseau volait dans le grand ciel bleu.\r\nCeci est le premier article. Blabla blabla. Test description article 1.\r\nUn joli oiseau volait dans le grand ciel bleu.', 'img/article_1.jpg'),
(2, 'Article 2', 'Tana', '2017-11-01 00:00:00', '<p>\r\n            Ut enim benefici liberalesque sumus, non ut exigamus gratiam (neque enim beneficium faeneramur sed natura\r\n            propensi ad\r\n            liberalitatem sumus), sic amicitiam non spe mercedis adducti sed quod omnis eius fructus in ipso amore\r\n            inest, expetendam\r\n            putamus.\r\n        </p>\r\n\r\n        <a href=\"http://facebook.com\">Lien</a>\r\n\r\n        <h3>\r\n            Sed si ille hac tam eximia fortuna propter utilitatem\r\n        </h3>\r\n\r\n        <p>\r\n            Emensis itaque difficultatibus multis et nive obrutis callibus plurimis ubi prope Rauracum ventum est ad\r\n            supercilia\r\n            fluminis Rheni, resistente multitudine Alamanna pontem suspendere navium conpage Romani vi nimia vetabantur\r\n            ritu\r\n            grandinis undique convolantibus telis, et cum id inpossibile videretur, imperator cogitationibus magnis\r\n            attonitus, quid\r\n            capesseret ambigebat.\r\n        </p>\r\n        <h3>\r\n            Sed si ille hac tam eximia fortuna propter utilitatem\r\n        </h3>\r\n\r\n        <p>\r\n            Sed si ille hac tam eximia fortuna propter utilitatem rei publicae frui non properat, ut omnia illa\r\n            conficiat, quid ego,\r\n            senator, facere debeo, quem, etiamsi ille aliud vellet, rei publicae consulere oporteret?\r\n        </p>\r\n\r\n        <div class=\"article_image\" style=\"text-align:center;\">\r\n            <img src=\"photos_articles/article_1_Article 1_image_1.jpg\">\r\n            <div class=\"legende\">\r\n                C\'est un joli arbre.\r\n            </div>\r\n        </div>\r\n\r\n        <p>\r\n            Et Epigonus quidem amictu tenus philosophus, ut apparuit, prece frustra temptata, sulcatis lateribus\r\n            mortisque metu\r\n            admoto turpi confessione cogitatorum socium, quae nulla erant, fuisse firmavit cum nec vidisset quicquam nec\r\n            audisset\r\n            penitus expers forensium rerum; Eusebius vero obiecta fidentius negans, suspensus in eodem gradu constantiae\r\n            stetit\r\n            latrocinium illud esse, non iudicium clamans.\r\n        </p>\r\n\r\n        <p>\r\n            Adolescebat autem obstinatum propositum erga haec et similia multa scrutanda, stimulos admovente regina,\r\n            quae abrupte\r\n            mariti fortunas trudebat in exitium praeceps, cum eum potius lenitate feminea ad veritatis humanitatisque\r\n            viam reducere\r\n            utilia suadendo deberet, ut in Gordianorum actibus factitasse Maximini truculenti illius imperatoris\r\n            rettulimus\r\n            coniugem.\r\n        </p>', 'Coucou, ici le deuxieme test. J\'aime les arc en ciel dans le ciel.', 'img/article_2.jpg'),
(3, 'Article 3', '', '2017-11-05 11:00:17', 'test', 'Ceci est le premier article. Blabla blabla. Test description article 1.\r\nUn joli oiseau volait dans le grand ciel bleu. Ceci est le premier article. Blabla blabla. Test description article 1.\r\nUn joli oiseau volait dans le grand ciel bleu.\r\nCeci est le premier article. Blabla blabla. Test description article 1.\r\nUn joli oiseau volait dans le grand ciel bleu.\r\nCeci est le premier article. Blabla blabla. Test description article 1.\r\nUn joli oiseau volait dans le grand ciel bleu.', 'img/article_1.jpg'),
(4, 'Article 4', '', '2017-11-01 00:00:00', '<h2>sous titre</h2>\r\n<br />\r\n\r\n<em>italique</em>\r\n', '', 'img/article_2.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--


CREATE TABLE IF NOT EXISTS `commentaires` (
  `id_commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `auteur` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date_commentaire` datetime NOT NULL,
  `approuve` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_commentaire`),
  KEY `fk_article` (`id_article`),
  KEY `auteur` (`auteur`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id_commentaire`, `id_article`, `auteur`, `contenu`, `date_commentaire`, `approuve`) VALUES
(1, 1, 3, 'Bonjour, j&#039;aime les croquettes et aboyer comme une tocarde', '2017-11-16 20:24:58', NULL),
(2, 1, 3, 'Bonjour, j&#039;aime les croquettes et aboyer comme une tocarde', '2017-11-16 20:26:05', NULL),
(3, 1, 3, 'Bonjour, j&#039;aime les croquettes et aboyer comme une tocarde', '2017-11-16 20:26:23', NULL),
(4, 1, 3, 'Bonjour, j&#039;aime les croquettes et aboyer comme une tocarde', '2017-11-16 20:30:03', 1),
(5, 1, 3, 'Kikou lol', '2017-11-16 20:36:20', NULL),
(6, 1, 3, 'Kikouerjhefz', '2017-11-16 20:37:29', NULL);

-- --------------------------------------------------------



--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sexe` varchar(20) NOT NULL,
  `date_anniversaire` datetime NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `telephone` int(11) NOT NULL,
  `date_inscription` datetime NOT NULL,
  `recevoir_mail` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `nom`, `prenom`, `pseudo`, `password`, `email`, `sexe`, `date_anniversaire`, `adresse`, `code_postal`, `telephone`, `date_inscription`, `recevoir_mail`) VALUES
(1, 'Boudon', 'Eloïse', 'EloBG', 'e4d978029f8e63b204e18c598ea49833eb352cf7', 'eloise.boudon@letiquette-shop.com', 'F', '1994-03-28 00:00:00', '', 0, 0, '2017-11-08 17:16:31', 0),
(2, 'Abécassis', 'Justine', 'jujuabk69', '14e793d896ddc8ca6911747228e86464cf420065', 'justine.abecassis@letiquette-shop.com', 'F', '1993-10-17 00:00:00', '', 0, 0, '2017-11-08 17:17:05', 0),
(3, 'Boudon', 'Tana', 'Tana', 'tana', 'boudon.eloise@gmail.com', 'N', '2000-01-01 00:00:00', '', 0, 0, '2017-11-16 08:08:43', 1),
(4, 'Scorseze', 'Martin', 'Martinou', 'martin', 'martin@test.com', 'H', '2012-12-12 00:00:00', '6 rue de la pierre', 45024, 98765, '2017-11-20 09:21:37', 1);

-------------------------------------------------------


--
-- Structure de la table `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
  `id_membre` int(11) NOT NULL,
  `prochain_article` tinyint(1) DEFAULT NULL,
  UNIQUE KEY `id_membre_2` (`id_membre`),
  KEY `id_membre` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mail`
--

INSERT INTO `mail` (`id_membre`, `prochain_article`) VALUES
(1, 1);

-- --------------------------------------------------------


--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `fk_article` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id_article`),
  ADD CONSTRAINT `fk_auteur` FOREIGN KEY (`auteur`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `mail`
--
ALTER TABLE `mail`
  ADD CONSTRAINT `mail_ibfk_1` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
