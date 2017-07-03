-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-07-2017 a las 07:55:05
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `petfriends_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adoptions`
--

CREATE TABLE `adoptions` (
  `adoption_id` int(11) NOT NULL,
  `adoption_petId` int(11) NOT NULL,
  `adoption_userId` int(11) NOT NULL,
  `adoption_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `adoptions`
--

INSERT INTO `adoptions` (`adoption_id`, `adoption_petId`, `adoption_userId`, `adoption_status`) VALUES
(1, 50, 19, 'EN ADOPCION'),
(2, 52, 21, 'EN ADOPCION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `breeds`
--

CREATE TABLE `breeds` (
  `breed_id` int(11) NOT NULL,
  `breed_type` int(11) NOT NULL,
  `breed_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `breeds`
--

INSERT INTO `breeds` (`breed_id`, `breed_type`, `breed_description`) VALUES
(1, 1, 'Akita '),
(2, 1, 'Akita Americano '),
(3, 1, 'Afgano'),
(4, 1, 'Airedale Terrier'),
(5, 1, 'Alaskan Malamute '),
(6, 1, 'American Pitt Bull Terrier '),
(7, 1, 'American Staffordshire Terrier'),
(8, 1, 'American Water Spaniel'),
(9, 1, 'Antiguo Pastor Ingles'),
(10, 1, 'Australian Kelpie'),
(11, 1, 'Australian Shepherd '),
(12, 1, 'Barzoi '),
(13, 1, 'Basset Azul de Gaseogne'),
(14, 1, 'Basset Hound'),
(15, 1, 'Basset leonado de Bretana'),
(16, 1, 'Beagle'),
(17, 1, 'Bearded Collie'),
(18, 1, 'Beauceron '),
(19, 1, 'Berger Blanc Suisse '),
(20, 1, 'Bichon Frise'),
(21, 1, 'Bichon Habanero '),
(22, 1, 'Bichon Maltes'),
(23, 1, 'Bloodhound'),
(24, 1, 'Bobtail'),
(25, 1, 'Border Collie'),
(26, 1, 'Border Collie '),
(27, 1, 'Borzoi '),
(28, 1, 'Boston Terrier'),
(29, 1, 'Boxer'),
(30, 1, 'Boyero Australiano'),
(31, 1, 'Boyero de Flandes'),
(32, 1, 'Boyero de Montana Bernes '),
(33, 1, 'Braco Aleman'),
(34, 1, 'Braco de Weimar '),
(35, 1, 'Braco Hungaro'),
(36, 1, 'Briard '),
(37, 1, 'Bull Terrier'),
(38, 1, 'Bulldog Americano'),
(39, 1, 'Bulldog Frances'),
(40, 1, 'Bulldog Ingles'),
(41, 1, 'Bullmastiff'),
(42, 1, 'Ca de Bou '),
(43, 1, 'Ca me mallorqui '),
(44, 1, 'Cane Corso'),
(45, 1, 'Caniche'),
(46, 1, 'Carlino'),
(47, 1, 'Chien de Saint Hubert '),
(48, 1, 'Chihuahua'),
(49, 1, 'Chino Crestado'),
(50, 1, 'Chow Chow'),
(51, 1, 'Cirneco del Etna'),
(52, 1, 'Cocker Spaniel Americano'),
(53, 1, 'Cocker Spaniel Ingles'),
(54, 1, 'Collie'),
(55, 1, 'Coton de Tulear '),
(56, 1, 'Dachshunds '),
(57, 1, 'Dalmata'),
(58, 1, 'Deutsch Drahthaar'),
(59, 1, 'Deutsch Kurzhaar '),
(60, 1, 'Dobermann'),
(61, 1, 'Dogo Aleman'),
(62, 1, 'Dogo Argentino'),
(63, 1, 'Dogo Canario '),
(64, 1, 'Dogo de Burdeos'),
(65, 1, 'Drahthaar'),
(66, 1, 'English Springer Spaniel '),
(67, 1, 'Epagneul Breton'),
(68, 1, 'Eurasier'),
(69, 1, 'Fila Brasileiro '),
(70, 1, 'Fox Terrier'),
(71, 1, 'Foxhound Americano'),
(72, 1, 'Foxhound Ingles'),
(73, 1, 'Galgo Afgano'),
(74, 1, 'Galgo Espanol'),
(75, 1, 'Galgo Italiano'),
(76, 1, 'Galgo Ruso'),
(77, 1, 'Gigante de los Pirineos'),
(78, 1, 'Golden Retriever'),
(79, 1, 'Gos d Atura'),
(80, 1, 'Gran Danes'),
(81, 1, 'Gran Perro Japones '),
(82, 1, 'Husky Siberiano'),
(83, 1, 'Irish Wolfhound'),
(84, 1, 'Jack Russel'),
(85, 1, 'Japanes Chin'),
(86, 1, 'Kelpie '),
(87, 1, 'Kerry Blue'),
(88, 1, 'Komondor'),
(89, 1, 'Kuvasz '),
(90, 1, 'Labrador Retriever'),
(91, 1, 'Laika de Siberia Occidental'),
(92, 1, 'Laika Ruso-europeo'),
(93, 1, 'Lebrel ruso '),
(94, 1, 'Leonberger '),
(95, 1, 'Lhasa Apso'),
(96, 1, 'Magyar Vizsla'),
(97, 1, 'Maltes'),
(98, 1, 'Mastin del Alentejo '),
(99, 1, 'Mastin del Pirineo'),
(100, 1, 'Mastin del Tibet'),
(101, 1, 'Mastin Espanol'),
(102, 1, 'Mastin Napolitano'),
(103, 1, 'Norfolk Terrier'),
(104, 1, 'Ovtcharka '),
(105, 1, 'Pachon Navarro '),
(106, 1, 'Pastor Aleman'),
(107, 1, 'Pastor Australiano'),
(108, 1, 'Pastor Belga'),
(109, 1, 'Pastor Blanco Suizo '),
(110, 1, 'Pastor de Beauce'),
(111, 1, 'Pastor de Brie'),
(112, 1, 'Pastor de los Pirineos de Cara Rosa'),
(113, 1, 'Pastor de Shetland '),
(114, 1, 'Pastor del Caucaso '),
(115, 1, 'Pekines'),
(116, 1, 'Perdiguero Burgos?'),
(117, 1, 'Perdiguero Chesapeake Bay'),
(118, 1, 'Perdiguero de Drentse'),
(119, 1, 'Perdiguero de Pelo lido'),
(120, 1, 'Perdiguero de pelo rizado'),
(121, 1, 'Perdiguero Portugues'),
(122, 1, 'Perro Crestado Chino'),
(123, 1, 'Perro de Aguas'),
(124, 1, 'Perro sin pelo de Mexico '),
(125, 1, 'Perro sin pelo del Peru'),
(126, 1, 'Pinscher miniatura '),
(127, 1, 'Pitbull'),
(128, 1, 'Podenco Andaluz'),
(129, 1, 'Podenco Ibicenco'),
(130, 1, 'Podenco Portugues'),
(131, 1, 'presa canario'),
(132, 1, 'Presa Mallorquin'),
(133, 1, 'Rafeiro do Alentejo '),
(134, 1, 'Rottweiler'),
(135, 1, 'Rough Collie'),
(136, 1, 'Sabueso Espanol'),
(137, 1, 'Sabueso Helenico'),
(138, 1, 'Sabueso Italiano'),
(139, 1, 'Sabueso Suizo'),
(140, 1, 'Saint Hubert '),
(141, 1, 'Saluki'),
(142, 1, 'Samoyedo'),
(143, 1, 'San Bernardo'),
(144, 1, 'Schnaucer'),
(145, 1, 'Scottish Terrier'),
(146, 1, 'Sealyhalm Terrier'),
(147, 1, 'Setter Gordon'),
(148, 1, 'Setter Irlandes'),
(149, 1, 'Shar Pei'),
(150, 1, 'Shiba '),
(151, 1, 'Shiba Inu'),
(152, 1, 'Shih Tzu '),
(153, 1, 'Siberian Husky'),
(154, 1, 'Smooth Collie'),
(155, 1, 'Spaniel Japones '),
(156, 1, 'Spinone Italiano '),
(157, 1, 'Spitz Aleman '),
(158, 1, 'Springer Spaniel Ingles'),
(159, 1, 'Staffordshire Bull Terrier'),
(160, 1, 'Teckel'),
(161, 1, 'Terranova'),
(162, 1, 'Terrier Australiano'),
(163, 1, 'Terrier Escoces'),
(164, 1, 'Terrier Irlandes'),
(165, 1, 'Terrier Japones'),
(166, 1, 'Terrier Negro Ruso'),
(167, 1, 'Terrier Norfolk'),
(168, 1, 'Terrier Ruso'),
(169, 1, 'Tibetan Terrier'),
(170, 1, 'Vizsla '),
(171, 1, 'Welhs Terrier'),
(172, 1, 'West Highland T'),
(173, 1, 'Wolfspitz'),
(174, 1, 'Xoloitzquintle '),
(175, 1, 'Yorkshire Terrier'),
(177, 2, 'Abyssinian'),
(178, 2, 'American Bobtail'),
(179, 2, 'American Curl'),
(180, 2, 'American Ringtail'),
(181, 2, 'American Shorthair'),
(182, 2, 'American Wirehair'),
(183, 2, 'Anatolian'),
(184, 2, 'Australian Mist'),
(185, 2, 'Balinese'),
(186, 2, 'Bengal'),
(187, 2, 'Birman'),
(188, 2, 'Bombay'),
(189, 2, 'British Shorthair'),
(190, 2, 'Burmese'),
(191, 2, 'Burmilla'),
(192, 2, 'California Spangled Cat'),
(193, 2, 'Chantilly/Tiffany'),
(194, 2, 'Chartreux'),
(195, 2, 'Chausie'),
(196, 2, 'Colorpoint Shorthair'),
(197, 2, 'Cornish Rex'),
(198, 2, 'Devonshire Rex'),
(199, 2, 'Domestic Long Hair'),
(200, 2, 'Domestic Medium Hair'),
(201, 2, 'Domestic Shorthair'),
(202, 2, 'Don Hairless'),
(203, 2, 'Egyptian Mau'),
(204, 2, 'European Burmese'),
(205, 2, 'European Shorthair'),
(206, 2, 'Exotic Shorthair'),
(207, 2, 'Gato'),
(208, 2, 'Havana Brown'),
(209, 2, 'Highlander'),
(210, 2, 'Himalayan'),
(211, 2, 'Japanese Bobtail'),
(212, 2, 'Javanese'),
(213, 2, 'Khao Manee'),
(214, 2, 'Korat'),
(215, 2, 'LaPerm'),
(216, 2, 'Maine Coon'),
(217, 2, 'Manx'),
(218, 2, 'Minskin'),
(219, 2, 'Munchkin'),
(220, 2, 'Nebelung'),
(221, 2, 'Norwegian Forest Cat'),
(222, 2, 'Ocicat'),
(223, 2, 'Oriental'),
(224, 2, 'Otros'),
(225, 2, 'Persian'),
(226, 2, 'Peterbald'),
(227, 2, 'Pixie-Bob'),
(228, 2, 'Ragamuffin'),
(229, 2, 'Ragdoll'),
(230, 2, 'Russian Blue'),
(231, 2, 'Savannah'),
(232, 2, 'Scottish Fold'),
(233, 2, 'Selkirk Rex'),
(234, 2, 'Siamese'),
(235, 2, 'Siberian'),
(236, 2, 'Singapura'),
(237, 2, 'Snowshoe'),
(238, 2, 'Sokoke'),
(239, 2, 'Somali'),
(240, 2, 'Sphynx'),
(241, 2, 'Thai'),
(242, 2, 'Tiffanie'),
(243, 2, 'Tonkinese'),
(244, 2, 'Toyger'),
(245, 2, 'Turkish Angora'),
(246, 2, 'Turkish Van'),
(247, 3, 'Accentor'),
(248, 3, 'Aceh Pheasant'),
(249, 3, 'Acorn Woodpecker'),
(250, 3, 'Adelie Penguin'),
(251, 3, 'African Collared Dove'),
(252, 3, 'African Grey Hornbill'),
(253, 3, 'African Grey Parrot'),
(254, 3, 'African Lemon-dove'),
(255, 3, 'African Penguin'),
(256, 3, 'African Pied Hornbill'),
(257, 3, 'Amazon'),
(258, 3, 'American Avocet'),
(259, 3, 'Blue Crown Conure'),
(260, 3, 'Blue-and-yellow Macaw'),
(261, 3, 'Budgerigar'),
(262, 3, 'Caique'),
(263, 3, 'Campbell Albatross'),
(264, 3, 'Chicken'),
(265, 3, 'Cockatiel'),
(266, 3, 'Cockatoo'),
(267, 3, 'Conure'),
(268, 3, 'Diamond Dove'),
(269, 3, 'Eclectus Parrot'),
(270, 3, 'Finch'),
(271, 3, 'Galah Cockatoo'),
(272, 3, 'Goffins Cockatoo'),
(273, 3, 'Goose'),
(274, 3, 'Indian Ringneck'),
(275, 3, 'Jardine Parrot'),
(276, 3, 'Lorikeet'),
(277, 3, 'Lovebird'),
(278, 3, 'Macaw'),
(279, 3, 'Meyers Parrot'),
(280, 3, 'Moluccan Cockatoo'),
(281, 3, 'Muscovy Duck'),
(282, 3, 'Other'),
(283, 3, 'Otros'),
(284, 3, 'Parakeet'),
(285, 3, 'Parrot'),
(286, 3, 'Parrotlet'),
(287, 3, 'Peach fronted conure'),
(288, 3, 'Pekin Duck'),
(289, 3, 'Pigeon'),
(290, 3, 'Pionus Parrot'),
(291, 3, 'Quacker Parrot'),
(292, 3, 'Quaker'),
(293, 3, 'Rosella'),
(294, 3, 'Scarlett Macaw'),
(295, 3, 'Senegal Parrot'),
(296, 3, 'Sun Conure'),
(297, 3, 'Umbrella Cockatoo'),
(298, 3, 'Yellow Nape Amazon'),
(299, 3, 'Yellow-crowned Parakeet'),
(300, 3, 'Yellowhead'),
(301, 4, 'Alaskan Dwarf'),
(302, 4, 'American Chinchilla'),
(303, 4, 'American Sable'),
(304, 4, 'Americano (American)'),
(305, 4, 'Belgian Hare (Liebre Belga)'),
(306, 4, 'Beveren'),
(307, 4, 'Blanc Du Hotot (Blanco de Hotot)'),
(308, 4, 'Britannian Petite o Polish Enano'),
(309, 4, 'Californiano'),
(310, 4, 'Cashmere Lop (Belier de Cachemira)'),
(311, 4, 'Champagne D\'Argent'),
(312, 4, 'Checkered Giant'),
(313, 4, 'Cinnamon'),
(314, 4, 'Creme D\'Argent'),
(315, 4, 'Dutch'),
(316, 4, 'Dwarf Hotot'),
(317, 4, 'English Angora'),
(318, 4, 'English Lop'),
(319, 4, 'English Spot'),
(320, 4, 'Flemish Giant'),
(321, 4, 'Florida White'),
(322, 4, 'French Angora'),
(323, 4, 'French Lop'),
(324, 4, 'Fuzzy Lop'),
(325, 4, 'Giant Angora'),
(326, 4, 'Giant Chinchilla'),
(327, 4, 'Harlequin'),
(328, 4, 'Havana'),
(329, 4, 'Himalayo'),
(330, 4, 'Holland Lop'),
(331, 4, 'Jersey Wooly'),
(332, 4, 'Lilac'),
(333, 4, 'Lionhead'),
(334, 4, 'Lionhead lop'),
(335, 4, 'Mini Lop'),
(336, 4, 'Mini Rex'),
(337, 4, 'Mini Satin'),
(338, 4, 'Mini Satin'),
(339, 4, 'Netherland Dwarf'),
(340, 4, 'Otros'),
(341, 4, 'Palomino'),
(342, 4, 'Polish o Brittanian Petite'),
(343, 4, 'Rex'),
(344, 4, 'Rhinelander'),
(345, 4, 'Satin'),
(346, 4, 'Satin Angora'),
(347, 4, 'Silver'),
(348, 4, 'Silver Fox'),
(349, 4, 'Silver Marten'),
(350, 4, 'Silver Plateado'),
(351, 4, 'Standard Chinchilla'),
(352, 4, 'Tan'),
(353, 4, 'Thrianta'),
(354, 4, 'Velveteen Lop'),
(355, 5, 'Criollo pelon mexicano'),
(356, 5, 'Cumberland'),
(357, 5, 'Duroc'),
(358, 5, 'Gochu Asturcelta'),
(359, 5, 'Iberico'),
(360, 5, 'Iberico manchado de Jabugo'),
(361, 5, 'Large White'),
(362, 5, 'Mangalica'),
(363, 5, 'MiniPig'),
(364, 5, 'Murciano'),
(365, 5, 'Negro canario'),
(366, 5, 'Otros'),
(367, 5, 'Poland China'),
(368, 6, 'Albino'),
(369, 6, 'Angora'),
(370, 6, 'Arlequin'),
(371, 6, 'Dorado'),
(372, 6, 'Enano de Campbell'),
(373, 6, 'Enano de China'),
(374, 6, 'Enano Ruso'),
(375, 6, 'Otros'),
(376, 6, 'Panda'),
(377, 6, 'Roborovski'),
(378, 7, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_postId` int(11) NOT NULL,
  `comment_userId` int(11) NOT NULL,
  `comment_date` datetime NOT NULL,
  `comment_description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_postId`, `comment_userId`, `comment_date`, `comment_description`) VALUES
(1, 7, 19, '2017-07-03 01:10:34', 'COMENTARIO!!!'),
(2, 7, 19, '2017-07-03 01:10:58', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vehicula, nibh ac feugiat rutrum, sem orci faucibus massa, a vulputate enim urna ac nisl.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `contact_userA` int(11) NOT NULL,
  `contact_petB` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contacts`
--

INSERT INTO `contacts` (`contact_id`, `contact_userA`, `contact_petB`) VALUES
(21, 19, 50),
(22, 19, 51),
(23, 21, 52),
(24, 21, 53),
(25, 22, 51),
(26, 22, 54);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crosses`
--

CREATE TABLE `crosses` (
  `cross_id` int(11) NOT NULL,
  `cross_petId` int(11) NOT NULL,
  `cross_userId` int(11) NOT NULL,
  `cross_status` varchar(200) NOT NULL,
  `cross_B` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `crosses`
--

INSERT INTO `crosses` (`cross_id`, `cross_petId`, `cross_userId`, `cross_status`, `cross_B`) VALUES
(1, 50, 19, 'DISPONIBLE', 0),
(2, 54, 22, 'DISPONIBLE', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dates`
--

CREATE TABLE `dates` (
  `date_id` int(11) NOT NULL,
  `date_petA` int(11) NOT NULL,
  `date_petB` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `image_postId` int(11) NOT NULL,
  `image_description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `like_postId` int(11) NOT NULL,
  `like_userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`like_id`, `like_postId`, `like_userId`) VALUES
(1, 7, 19),
(2, 6, 19),
(3, 1, 19),
(4, 16, 19),
(5, 16, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lost_pets`
--

CREATE TABLE `lost_pets` (
  `lost_id` int(11) NOT NULL,
  `lost_petId` int(11) NOT NULL,
  `lost_userId` int(11) NOT NULL,
  `lost_status` varchar(200) NOT NULL,
  `lost_description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lost_pets`
--

INSERT INTO `lost_pets` (`lost_id`, `lost_petId`, `lost_userId`, `lost_status`, `lost_description`) VALUES
(1, 50, 19, 'PERDIDA', 'se perdio por la zona de ramos mejia'),
(2, 53, 21, 'PERDIDA', 'se me escapo por Moron.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pets`
--

CREATE TABLE `pets` (
  `pet_id` int(11) NOT NULL,
  `pet_idUser` int(11) NOT NULL,
  `pet_name` varchar(200) NOT NULL,
  `pet_type` int(11) NOT NULL,
  `pet_breed` int(11) NOT NULL,
  `pet_age` varchar(100) NOT NULL,
  `pet_size` varchar(100) NOT NULL,
  `pet_status` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `pet_gender` varchar(100) NOT NULL,
  `pet_photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pets`
--

INSERT INTO `pets` (`pet_id`, `pet_idUser`, `pet_name`, `pet_type`, `pet_breed`, `pet_age`, `pet_size`, `pet_status`, `pet_gender`, `pet_photo`) VALUES
(50, 19, 'Maya', 2, 188, '10', 'Bajo', 'Con DueÃ±o', 'Femenino', '/PETFRIENDS/resources/maria@gmail.com/Maya/photo_perfil.png'),
(51, 19, 'Tommy', 1, 168, '10', 'Mediano', 'Con DueÃ±o', 'Masculino', '/PETFRIENDS/resources/maria@gmail.com/Tommy/photo_perfil.png'),
(52, 21, 'Lolo', 1, 61, '8', 'Bajo', 'Con DueÃ±o', 'Femenino', '/PETFRIENDS/resources/sebastian@gmail.com/Lolo/photo_perfil.png'),
(53, 21, 'Fluh', 3, 275, '5', 'Bajo', 'Con DueÃ±o', 'Masculino', '/PETFRIENDS/resources/sebastian@gmail.com/Fluh/photo_perfil.png'),
(54, 22, 'Cholo', 1, 127, '5', 'Mediano', 'Con DueÃ±o', 'Masculino', '/PETFRIENDS/resources/cintia@gmail.com/Cholo/photo_perfil.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_petId` int(11) NOT NULL,
  `post_userId` int(11) NOT NULL,
  `post_date` datetime NOT NULL,
  `post_likes` int(11) NOT NULL,
  `post_views` int(11) NOT NULL,
  `post_description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`post_id`, `post_petId`, `post_userId`, `post_date`, `post_likes`, `post_views`, `post_description`) VALUES
(1, 50, 19, '2017-07-03 00:11:24', 2, 21, '<p style=\"padding-left:20px;\"><img src=\"/PETFRIENDS/resources/maria@gmail.com/Maya/1/photo.jpg\" width=\"450px\"></p>Comoda en cada!'),
(6, 50, 19, '2017-07-03 00:35:52', 2, 15, 'https://www.youtube.com/watch?v=UdpbSho8ROg\r\n\r\nvideo bombay'),
(7, 50, 19, '2017-07-03 00:39:14', 2, 15, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at scelerisque tellus, nec lobortis lectus. Pellentesque nec turpis efficitur erat aliquet ullamcorper in in purus. Fusce sit amet hendrerit mauris, sed iaculis felis. Etiam elementum nisl nulla. Proin vel laoreet ligula. '),
(9, 51, 19, '2017-07-03 01:09:17', 1, 17, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vehicula, nibh ac feugiat rutrum, sem orci faucibus massa, a vulputate enim urna ac nisl. Morbi tempus eleifend leo, eget viverra neque fringilla sed. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris sit amet lorem urna. Suspendisse euismod nec libero at aliquam.'),
(16, 51, 19, '2017-07-03 01:22:38', 3, 7, '<p style=\"padding-left:20px;\"><img src=\"/PETFRIENDS/resources/maria@gmail.com/Tommy/10/descarga (1).jpg\" width=\"450px\"></p>en el jardin'),
(17, 52, 21, '2017-07-03 01:28:47', 1, 8, 'lolo post!!!'),
(18, 52, 21, '2017-07-03 01:29:42', 1, 8, 'https://www.youtube.com/watch?v=bChHyYLjegk'),
(19, 53, 21, '2017-07-03 01:32:57', 1, 6, 'Fluh es un jardine parrot'),
(20, 54, 22, '2017-07-03 01:45:45', 1, 3, 'nuevo en la comunidad!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puppies`
--

CREATE TABLE `puppies` (
  `puppy_id` int(11) NOT NULL,
  `puppy_userId` int(11) NOT NULL,
  `puppy_type` int(11) NOT NULL,
  `puppy_mother` int(11) NOT NULL,
  `puppy_father` int(11) NOT NULL,
  `puppy_birthday` varchar(100) NOT NULL,
  `puppy_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puppies`
--

INSERT INTO `puppies` (`puppy_id`, `puppy_userId`, `puppy_type`, `puppy_mother`, `puppy_father`, `puppy_birthday`, `puppy_status`) VALUES
(1, 19, 2, 188, 224, '2017-07-21', 'EN ADOPCION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type_description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `type`
--

INSERT INTO `type` (`type_id`, `type_description`) VALUES
(1, 'Perro'),
(2, 'Gato'),
(3, 'Ave'),
(4, 'Conejo'),
(5, 'Cerdo'),
(6, 'Hamster'),
(7, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_firstName` varchar(100) NOT NULL,
  `user_lastName` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_birthdate` varchar(100) NOT NULL,
  `user_gender` varchar(100) NOT NULL,
  `user_phone` varchar(200) NOT NULL,
  `user_lat` varchar(255) NOT NULL,
  `user_lon` varchar(255) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `user_firstName`, `user_lastName`, `user_email`, `user_birthdate`, `user_gender`, `user_phone`, `user_lat`, `user_lon`, `user_pass`, `user_photo`) VALUES
(17, 'Damian', 'Gayoso', 'damiangayoso@gmail.com', '', 'male', '', '-34.6398515', '-58.651566300000006', '', 'https://lh6.googleusercontent.com/-AZm1eKwqwnM/AAAAAAAAAAI/AAAAAAAAACk/zU8XeBDi6wM/photo.jpg?sz=200'),
(19, 'Maria', 'Lopez', 'maria@gmail.com', '1995-06-12', 'female', '41234568', '-34.6398515', '-58.651566300000006', '202cb962ac59075b964b07152d234b70', '/PETFRIENDS/resources/maria@gmail.com/photo_perfil.png'),
(20, 'Pedro', 'Gimenez', 'pedro@gmail.com', '1992-02-12', 'male', '47894477', '-34.6398515', '-58.651566300000006', '202cb962ac59075b964b07152d234b70', ''),
(21, 'Sebastian', 'Pereyra', 'sebastian@gmail.com', '1986-02-20', 'male', '44445555', '-34.6398515', '-58.651566300000006', '202cb962ac59075b964b07152d234b70', '/PETFRIENDS/resources/sebastian@gmail.com/photo_perfil.png'),
(22, 'Cintia', 'Fernandez', 'cintia@gmail.com', '1987-01-14', 'female', '45644564', '-34.6398515', '-58.651566300000006', '202cb962ac59075b964b07152d234b70', '/PETFRIENDS/resources/cintia@gmail.com/photo_perfil.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_social`
--

CREATE TABLE `users_social` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `social_id` varchar(200) NOT NULL,
  `service` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users_social`
--

INSERT INTO `users_social` (`id`, `user_id`, `social_id`, `service`) VALUES
(12, 17, '114648450639805925765', 'Google');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adoptions`
--
ALTER TABLE `adoptions`
  ADD PRIMARY KEY (`adoption_id`);

--
-- Indices de la tabla `breeds`
--
ALTER TABLE `breeds`
  ADD PRIMARY KEY (`breed_id`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indices de la tabla `crosses`
--
ALTER TABLE `crosses`
  ADD PRIMARY KEY (`cross_id`);

--
-- Indices de la tabla `dates`
--
ALTER TABLE `dates`
  ADD PRIMARY KEY (`date_id`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indices de la tabla `lost_pets`
--
ALTER TABLE `lost_pets`
  ADD PRIMARY KEY (`lost_id`);

--
-- Indices de la tabla `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `PETS-BREEDS` (`pet_breed`),
  ADD KEY `PETS-TIPES` (`pet_type`),
  ADD KEY `PETS-USERS` (`pet_idUser`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indices de la tabla `puppies`
--
ALTER TABLE `puppies`
  ADD PRIMARY KEY (`puppy_id`);

--
-- Indices de la tabla `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `users_social`
--
ALTER TABLE `users_social`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adoptions`
--
ALTER TABLE `adoptions`
  MODIFY `adoption_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `breeds`
--
ALTER TABLE `breeds`
  MODIFY `breed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=379;
--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `crosses`
--
ALTER TABLE `crosses`
  MODIFY `cross_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `dates`
--
ALTER TABLE `dates`
  MODIFY `date_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `lost_pets`
--
ALTER TABLE `lost_pets`
  MODIFY `lost_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pets`
--
ALTER TABLE `pets`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `puppies`
--
ALTER TABLE `puppies`
  MODIFY `puppy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `users_social`
--
ALTER TABLE `users_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `PETS-USERS` FOREIGN KEY (`pet_idUser`) REFERENCES `users` (`user_id`);

--
-- Filtros para la tabla `users_social`
--
ALTER TABLE `users_social`
  ADD CONSTRAINT `users_social_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
