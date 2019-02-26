-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 26 fév. 2019 à 15:27
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `wargame`
--

-- --------------------------------------------------------

--
-- Structure de la table `cordonnees`
--

CREATE TABLE `cordonnees` (
  `id_cordonnees` int(11) NOT NULL,
  `abscisse_cordonnees` int(11) DEFAULT NULL,
  `ordonne_cordonnees` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `id_equipe` int(11) NOT NULL,
  `couleur_unite` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gain_equipe` int(11) DEFAULT NULL,
  `nombreUnite_equipe` int(11) DEFAULT NULL,
  `id_joueur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `faitparti`
--

CREATE TABLE `faitparti` (
  `id_unite` int(11) NOT NULL,
  `id_equipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `gainequipe`
--

CREATE TABLE `gainequipe` (
  `id_equipe` int(11) NOT NULL,
  `id_resultatEquipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
  `id_joueur` int(11) NOT NULL,
  `nom_user` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `pseudo_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mail_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mdp_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_resultatJoueur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`id_joueur`, `nom_user`, `pseudo_user`, `mail_user`, `mdp_user`, `id_resultatJoueur`) VALUES
(3, 'Michel', 'Mephisto', '', '', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `partie`
--

CREATE TABLE `partie` (
  `id_partie` int(11) NOT NULL,
  `libelle_partie` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `partie`
--

INSERT INTO `partie` (`id_partie`, `libelle_partie`) VALUES
(1, 'nouvelle partie du jour');

-- --------------------------------------------------------

--
-- Structure de la table `possede`
--

CREATE TABLE `possede` (
  `id_cordonnees` int(11) NOT NULL,
  `id_terrain` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rejoindre`
--

CREATE TABLE `rejoindre` (
  `id_partie` int(11) NOT NULL,
  `id_equipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `resultatequipe`
--

CREATE TABLE `resultatequipe` (
  `id_resultatEquipe` int(11) NOT NULL,
  `victoires_equipe` int(11) DEFAULT NULL,
  `defaites_equipe` int(11) DEFAULT NULL,
  `gain_resultatEquipe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `resultatjoueur`
--

CREATE TABLE `resultatjoueur` (
  `id_resultatJoueur` int(11) NOT NULL,
  `victoires_joueur` int(11) DEFAULT NULL,
  `defaites_joueur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `setrouve`
--

CREATE TABLE `setrouve` (
  `id_unite` int(11) NOT NULL,
  `id_cordonnees` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `terrain`
--

CREATE TABLE `terrain` (
  `id_terrain` int(11) NOT NULL,
  `type_terrain` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `malus_mouvement_terrain` int(11) DEFAULT NULL,
  `bonus_defense_terrain` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `unite`
--

CREATE TABLE `unite` (
  `id_unite` int(11) NOT NULL,
  `nom_unite` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mouvement_unite` int(11) DEFAULT NULL,
  `attaque_unite` int(11) DEFAULT NULL,
  `defense_unite` int(11) DEFAULT NULL,
  `pv_unite` int(11) DEFAULT NULL,
  `prix_unite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cordonnees`
--
ALTER TABLE `cordonnees`
  ADD PRIMARY KEY (`id_cordonnees`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id_equipe`),
  ADD KEY `id_joueur` (`id_joueur`);

--
-- Index pour la table `faitparti`
--
ALTER TABLE `faitparti`
  ADD PRIMARY KEY (`id_unite`,`id_equipe`);

--
-- Index pour la table `gainequipe`
--
ALTER TABLE `gainequipe`
  ADD PRIMARY KEY (`id_equipe`,`id_resultatEquipe`);

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`id_joueur`),
  ADD KEY `id_resultatJoueur` (`id_resultatJoueur`);

--
-- Index pour la table `partie`
--
ALTER TABLE `partie`
  ADD PRIMARY KEY (`id_partie`);

--
-- Index pour la table `possede`
--
ALTER TABLE `possede`
  ADD PRIMARY KEY (`id_cordonnees`,`id_terrain`);

--
-- Index pour la table `rejoindre`
--
ALTER TABLE `rejoindre`
  ADD PRIMARY KEY (`id_partie`,`id_equipe`);

--
-- Index pour la table `resultatequipe`
--
ALTER TABLE `resultatequipe`
  ADD PRIMARY KEY (`id_resultatEquipe`);

--
-- Index pour la table `resultatjoueur`
--
ALTER TABLE `resultatjoueur`
  ADD PRIMARY KEY (`id_resultatJoueur`);

--
-- Index pour la table `setrouve`
--
ALTER TABLE `setrouve`
  ADD PRIMARY KEY (`id_unite`,`id_cordonnees`);

--
-- Index pour la table `terrain`
--
ALTER TABLE `terrain`
  ADD PRIMARY KEY (`id_terrain`);

--
-- Index pour la table `unite`
--
ALTER TABLE `unite`
  ADD PRIMARY KEY (`id_unite`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cordonnees`
--
ALTER TABLE `cordonnees`
  MODIFY `id_cordonnees` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `id_joueur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `partie`
--
ALTER TABLE `partie`
  MODIFY `id_partie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `resultatequipe`
--
ALTER TABLE `resultatequipe`
  MODIFY `id_resultatEquipe` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `resultatjoueur`
--
ALTER TABLE `resultatjoueur`
  MODIFY `id_resultatJoueur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `terrain`
--
ALTER TABLE `terrain`
  MODIFY `id_terrain` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `unite`
--
ALTER TABLE `unite`
  MODIFY `id_unite` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `equipe_ibfk_1` FOREIGN KEY (`id_joueur`) REFERENCES `joueur` (`id_joueur`);

--
-- Contraintes pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD CONSTRAINT `joueur_ibfk_1` FOREIGN KEY (`id_resultatJoueur`) REFERENCES `resultatjoueur` (`id_resultatJoueur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
