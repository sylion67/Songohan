-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 06 Mars 2018 à 16:36
-- Version du serveur :  5.7.20-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `restaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(127) NOT NULL,
  `password` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(5, 'login', '$2y$11$TZvyPtU53Xr/.DfTRjcFYO2RRO9zHQGJJgjsFtr4MlaV4ZH2OmS6S');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(511) NOT NULL,
  `content` varchar(2047) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `picture` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `date`, `picture`) VALUES
(1, 'Ouverture', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.   <a href="?page=order">Commander</a>', '2018-03-01 10:53:47', 'Public/img/menu/news.jpg'),
(2, 'Fermeture', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-03-01 10:53:47', 'Public/img/menu/news2.jpg'),
(9, 'Bateauuuuuu', 'Un bon bateau de sushi, voilà voilà', '2018-03-06 13:43:19', 'Public/img/menu/plat4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` varchar(1023) NOT NULL,
  `author` varchar(254) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `content`, `author`, `rating`) VALUES
(1, 'Super restaurant ! Je le conseille !', 'Samira', 4),
(2, 'Plutôt bof. Service assez long, beaucoup de choses à améliorer', 'Pascal', 2),
(3, 'Je suis fan, j\'y retournerais dés que possible !! <3', 'Samad', 5);

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_FirstName` varchar(254) NOT NULL,
  `customer_LastName` varchar(254) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `addressLine` varchar(1023) NOT NULL,
  `city` varchar(511) NOT NULL,
  `postalCode` int(11) NOT NULL,
  `email` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_FirstName`, `customer_LastName`, `phone`, `addressLine`, `city`, `postalCode`, `email`) VALUES
(1, 'Bulma', 'Magali', '1122334455', '14 rue de la Boule de cristal', 'Namek', 52361, 'bubu@gmail.com'),
(2, 'Chichi', 'Kadija', '1122334455', '18 rue de Shenron', 'Terre', 52361, 'chichi@gmail.com'),
(3, 'Sangoku', 'Jean', '1122334455', '3 rue du Super Saiyan', 'Planète Vegeta', 52361, 'sangoku@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `order_Number` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_Number`, `product_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 1, 1),
(6, 1, 2),
(7, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `order_Number` int(11) NOT NULL,
  `order_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `orders`
--

INSERT INTO `orders` (`order_Number`, `order_Date`, `customer_id`) VALUES
(1, '2018-02-28 19:27:26', 1),
(2, '2018-02-28 19:27:26', 2);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(254) NOT NULL,
  `product_description` varchar(1023) NOT NULL,
  `price` float NOT NULL,
  `picture` varchar(254) NOT NULL,
  `type` varchar(63) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `price`, `picture`, `type`) VALUES
(1, 'Coca', 'Coca cola la boisson qui vous raffraichira lors de vos grands repas japonais', 2, 'Public/img/menu/coca.jpg', 'boisson'),
(2, 'Pizza', 'Pizza fromages avec son fromage mousseux.', 4, 'Public/img/menu/plat3.jpg', 'plat'),
(3, 'Boule de coco', 'Vous voulez bien finir vos repas ? Voici le dessert parfait qui saura ravir vos papilles.', 1.5, 'Public/img/menu/plat1.jpg', 'dessert'),
(4, 'Salade composé', 'Délicieuse salade composé, excellent mélange,  assaisonné avec une vinaigrette classique.', 12, 'Public/img/menu/entree2.jpg', 'entre'),
(5, 'Yakitori', 'Délicieux plat à base de crevette accompagner de sa boule de cristal farcie à la viande Hachée que sa sauce à la tomate fraiche', 10, 'Public/img/menu/plat2.jpg', 'plat'),
(6, 'Super salade', 'Super salade de rouleaux de printemps enroulé dans une galette fine de riz aux sept boules de cristal.', 12, 'Public/img/menu/entree3.jpg', 'entre'),
(7, 'Bouboule de glaçe', 'Un bon dessert à base de meringue et glaçe à la vanille', 9, 'Public/img/menu/dessert3.jpg', 'dessert'),
(8, 'Boisson énergétique', 'Boisson énergétique Japonaise, au goût pouvant se définir comme une sorte de saveur d\'orange.', 5, 'Public/img/menu/dbz.jpg', 'boisson'),
(9, 'Café', 'Café léger avec son nuage de crème, soupoudrer de cacao. ', 5, 'Public/img/menu/boisson.jpg', 'boisson'),
(10, 'Dessert dans les nuages', 'Dessert aux fruits avec son nuage flottant.', 12, 'Public/img/menu/dessert1.jpg', 'dessert'),
(11, 'Bao farcie à la châtaigne', 'Délicieux pain moelleux farcie aux chataignes.', 12, 'Public/img/menu/entree1.jpg', 'entre'),
(12, 'Bateauuuuuu', 'Voilà un beau bateau', 40, 'Public/img/menu/plat4.jpg', 'plat'),
(13, 'Test', 'Test', 20, 'Public/img/menu/dessert3.jpg', 'plat');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `reservation_date` varchar(63) NOT NULL,
  `reservation_hour` varchar(63) NOT NULL,
  `client_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `customer_id`, `reservation_date`, `reservation_hour`, `client_number`) VALUES
(1, 1, '02/03/2018', '18:30', 4),
(2, 2, '12/03/2018', '19:30', 6),
(3, 3, '22/03/2018', '21:00', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Index pour la table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_Number` (`order_Number`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_Number`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_Number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
