
DROP TABLE mail;
DROP TABLE commentaires;
DROP TABLE articles; 
DROP TABLE membres;



CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `password` char(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sexe` varchar(20) NOT NULL,
  `date_anniversaire` datetime NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `telephone` int(11) NOT NULL,
  `date_inscription` datetime NOT NULL,
  `recevoir_mail` tinyint(4) NOT NULL,
  `token` char(255) NOT NULL,
  `confirmation_token` tinyint(1) DEFAULT NULL,
  `confirmed_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;




CREATE TABLE IF NOT EXISTS `articles` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `date_article` datetime NOT NULL,
  `contenu` text NOT NULL,
  `description` mediumtext NOT NULL,
  `img_article` mediumtext NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;




CREATE TABLE IF NOT EXISTS `mail` (
  `id_membre` int(11) NOT NULL,
  `prochain_article` tinyint(1) DEFAULT NULL,
  UNIQUE KEY `id_membre_2` (`id_membre`),
  KEY `id_membre` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;