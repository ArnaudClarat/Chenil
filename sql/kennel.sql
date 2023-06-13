SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `kennel`
--

CREATE DATABASE IF NOT EXISTS `kennel`;
use `kennel`;

-- --------------------------------------------------------

--
-- Structure de la table `races`
--

DROP TABLE IF EXISTS `races`;
CREATE TABLE `races` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `races`
--

INSERT INTO `races` (`id`, `name`) VALUES
(1, 'Labrador'),
(2, 'Border Collie'),
(3, 'Terre Neuve'),
(4, 'Maincoon'),
(5, 'Chat de goutière');
COMMIT;

-- --------------------------------------------------------

--
-- Structure de la table `species`
--

DROP TABLE IF EXISTS `species`;
CREATE TABLE `species` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `species`
--

INSERT INTO `species` (`id`, `name`) VALUES
(1, 'Chiens'),
(2, 'Chats');
COMMIT;

-- -------------------------------------------------------

--
-- Structure de la table `owners`
--

DROP TABLE IF EXISTS `owners`;
CREATE TABLE `owners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `forename` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `mail` varchar(64) NOT NULL,
  `tel` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `owners`
--

INSERT INTO `owners` (`id`, `name`, `forename`, `DOB`, `mail`, `tel`) VALUES
(1, 'Clarat', 'Arnaud', '1997-07-14', 'arnaud.clarat@ifosup.wavre.be', '+3210222026');

-- --------------------------------------------------------

--
-- Structure de la table `animals`
--

DROP TABLE IF EXISTS `animals`;
CREATE TABLE `animals` (
  `puce` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `steril` tinyint(1) NOT NULL,
  `DOB` date NOT NULL,
  `owner_id` int(11) NOT NULL,
  `specie_id` int(11) NOT NULL,
  `race_id` int(11) NOT NULL,
  PRIMARY KEY (`puce`),
  FOREIGN KEY (`race_id`) REFERENCES races(`id`),
  FOREIGN KEY (`specie_id`) REFERENCES species(`id`),
  FOREIGN KEY (`owner_id`) REFERENCES owners(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `animals`
--

INSERT INTO `animals` (`puce`, `name`, `sex`, `steril`, `DOB`, `owner_id`, `race_id`, `specie_id`) VALUES
(1, 'Bubulle', 'F', 1, '2001-06-13', 1, 2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `stay`
--

DROP TABLE IF EXISTS `stay`;
CREATE TABLE `stay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_in` date NOT NULL,
  `date_out` date NOT NULL,
  `animal_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`animal_id`) REFERENCES animals(`puce`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- --------------------------------------------------------

--
-- Structure de la table `vaccines`
--

DROP TABLE IF EXISTS `vaccines`;
CREATE TABLE `vaccines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vaccinesanimals`
--

DROP TABLE IF EXISTS `vaccinesanimals`;
CREATE TABLE `vaccinesanimals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vaccine_id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`vaccine_id`) REFERENCES vaccines(`id`),
  FOREIGN KEY (`animal_id`) REFERENCES animals(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;