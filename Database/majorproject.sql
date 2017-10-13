-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2017 at 04:29 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `majorproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotelratings`
--

CREATE TABLE IF NOT EXISTS `hotelratings` (
  `user_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT '0',
  `hotel_comment` longtext,
`id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=389 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotelratings`
--

INSERT INTO `hotelratings` (`user_id`, `hotel_id`, `rating`, `hotel_comment`, `id`) VALUES
(204, 2, 4, 'lkjfg', 266),
(204, 3, 4, '', 267),
(204, 5, 0, '', 268),
(204, 6, 0, '', 269),
(204, 7, 1, '', 270),
(204, 8, 5, '', 271),
(204, 9, 4, '', 272),
(204, 11, 4, '', 273),
(204, 13, 5, 'e', 274),
(205, 2, 4, 'qwer', 275),
(205, 3, 5, '', 276),
(205, 5, 0, '', 277),
(205, 6, 4, '', 278),
(205, 7, 4, '', 279),
(205, 8, 4, 'e', 280),
(205, 9, 4, '', 281),
(205, 11, 4, 'e', 282),
(205, 13, 5, 'er', 283),
(208, 2, 0, '', 306),
(208, 3, 0, '', 307),
(208, 5, 0, '', 308),
(208, 6, 0, '', 309),
(208, 7, 0, '', 310),
(208, 8, 0, '', 311),
(208, 9, 0, '', 312),
(208, 11, 0, '', 313),
(208, 13, 5, '', 314),
(204, 15, 0, '', 316),
(205, 15, 5, '', 317),
(208, 15, 0, '', 318),
(209, 2, 4, 'g', 319),
(209, 3, 0, NULL, 320),
(209, 5, 0, NULL, 321),
(209, 6, 0, NULL, 322),
(209, 7, 0, NULL, 323),
(209, 8, 0, NULL, 324),
(209, 9, 0, NULL, 325),
(209, 11, 0, NULL, 326),
(209, 13, 0, NULL, 327),
(209, 15, 0, NULL, 328),
(210, 2, 4, NULL, 329),
(210, 3, 0, NULL, 330),
(210, 5, 0, NULL, 331),
(210, 6, 0, NULL, 332),
(210, 7, 0, NULL, 333),
(210, 8, 0, NULL, 334),
(210, 9, 0, NULL, 335),
(210, 11, 0, NULL, 336),
(210, 13, 0, NULL, 337),
(210, 15, 0, NULL, 338),
(211, 2, 0, NULL, 339),
(211, 3, 0, NULL, 340),
(211, 5, 0, NULL, 341),
(211, 6, 0, NULL, 342),
(211, 7, 0, NULL, 343),
(211, 8, 0, NULL, 344),
(211, 9, 0, NULL, 345),
(211, 11, 0, NULL, 346),
(211, 13, 0, NULL, 347),
(211, 15, 0, NULL, 348),
(212, 2, 0, NULL, 349),
(212, 3, 4, 'we', 350),
(212, 5, 0, NULL, 351),
(212, 6, 0, NULL, 352),
(212, 7, 0, NULL, 353),
(212, 8, 0, NULL, 354),
(212, 9, 0, NULL, 355),
(212, 11, 0, NULL, 356),
(212, 13, 0, NULL, 357),
(212, 15, 0, NULL, 358),
(213, 2, 0, NULL, 359),
(213, 3, 4, 'dy', 360),
(213, 5, 0, NULL, 361),
(213, 6, 0, NULL, 362),
(213, 7, 0, NULL, 363),
(213, 8, 0, NULL, 364),
(213, 9, 0, NULL, 365),
(213, 11, 0, NULL, 366),
(213, 13, 0, NULL, 367),
(213, 15, 0, NULL, 368),
(214, 2, 0, NULL, 369),
(214, 3, 4, 'jn', 370),
(214, 5, 0, NULL, 371),
(214, 6, 0, NULL, 372),
(214, 7, 0, NULL, 373),
(214, 8, 0, NULL, 374),
(214, 9, 0, NULL, 375),
(214, 11, 0, NULL, 376),
(214, 13, 0, NULL, 377),
(214, 15, 0, NULL, 378),
(215, 2, 0, NULL, 379),
(215, 3, 0, NULL, 380),
(215, 5, 0, NULL, 381),
(215, 6, 4, 'te', 382),
(215, 7, 0, NULL, 383),
(215, 8, 0, NULL, 384),
(215, 9, 0, NULL, 385),
(215, 11, 0, NULL, 386),
(215, 13, 0, NULL, 387),
(215, 15, 0, NULL, 388);

-- --------------------------------------------------------

--
-- Table structure for table `hotels_hits_ip`
--

CREATE TABLE IF NOT EXISTS `hotels_hits_ip` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Hotel_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotels_hits_ip`
--

INSERT INTO `hotels_hits_ip` (`id`, `user_id`, `Hotel_id`) VALUES
(7, 205, 3),
(8, 211, 3),
(9, 205, 15),
(10, 205, 13),
(11, 208, 2),
(12, 208, 3),
(13, 204, 3),
(14, 205, 2),
(15, 212, 3),
(16, 213, 3),
(17, 214, 3),
(18, 208, 8),
(19, 215, 6);

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE IF NOT EXISTS `notif` (
`id` int(11) NOT NULL,
  `notif_msg` text,
  `notif_time` datetime DEFAULT NULL,
  `notif_repeat` int(11) DEFAULT NULL,
  `notif_loop` int(11) DEFAULT NULL,
  `publish_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(30) DEFAULT NULL,
  `notification_status` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=329 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`id`, `notif_msg`, `notif_time`, `notif_repeat`, `notif_loop`, `publish_date`, `username`, `notification_status`) VALUES
(318, ' Your booking Has been Made', '2017-08-02 20:13:03', 1, 0, '2017-08-02 14:27:06', 'avi', 1),
(319, ' Your booking Has been Made', '2017-08-03 09:11:38', 1, 0, '2017-08-03 03:25:42', 'r', 1),
(323, ' Your booking Has been Made', '2017-08-11 18:21:15', 1, 0, '2017-08-11 12:35:20', 'avi', 1),
(324, ' Your booking Has been Made', '2017-08-12 03:43:25', 1, 0, '2017-08-12 01:42:30', 'luffy', 1),
(325, ' Your booking Has been Made', '2017-08-12 03:45:46', 1, 0, '2017-08-12 01:44:46', 'luffy', 0),
(326, ' Your booking Has been Made', '2017-08-12 03:45:59', 1, 0, '2017-08-12 01:44:59', 'luffy', 0),
(327, ' Your booking Has been Made', '2017-09-14 18:41:19', 1, 0, '2017-09-14 16:40:20', 'avi', 1),
(328, ' Your booking Has been Made', '2017-10-13 16:15:40', 1, 0, '2017-10-13 14:14:42', 'bjen', 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurantratings`
--

CREATE TABLE IF NOT EXISTS `restaurantratings` (
  `user_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT '0',
  `restaurant_comment` longtext,
`id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=257 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurantratings`
--

INSERT INTO `restaurantratings` (`user_id`, `restaurant_id`, `rating`, `restaurant_comment`, `id`) VALUES
(204, 1, 5, 'Nicee', 88),
(204, 2, 0, '', 89),
(204, 3, 0, '', 90),
(204, 4, 0, '', 91),
(204, 8, 0, '', 92),
(204, 9, 0, '', 93),
(204, 10, 0, '', 94),
(204, 11, 0, '', 95),
(204, 12, 0, '', 96),
(204, 13, 0, '', 97),
(204, 14, 0, '', 98),
(204, 15, 5, '', 99),
(204, 16, 0, '', 100),
(205, 1, 0, '', 101),
(205, 2, 0, '', 102),
(205, 3, 3, '', 103),
(205, 4, 0, '', 104),
(205, 8, 5, '', 105),
(205, 9, 4, '', 106),
(205, 10, 0, '', 107),
(205, 11, 0, '', 108),
(205, 12, 0, '', 109),
(205, 13, 0, '', 110),
(205, 14, 4, '', 111),
(205, 15, 5, '', 112),
(205, 16, 3, '', 113),
(208, 1, 0, '', 140),
(208, 2, 0, '', 141),
(208, 3, 0, '', 142),
(208, 4, 0, '', 143),
(208, 8, 0, '', 144),
(208, 9, 0, '', 145),
(208, 10, 0, '', 146),
(208, 11, 0, '', 147),
(208, 12, 0, '', 148),
(208, 13, 0, '', 149),
(208, 14, 0, '', 150),
(208, 15, 0, '', 151),
(208, 16, 0, '', 152),
(204, 18, 4, '4qwer', 156),
(205, 18, 0, '', 157),
(208, 18, 0, '', 158),
(209, 1, 0, NULL, 159),
(209, 2, 0, NULL, 160),
(209, 3, 0, NULL, 161),
(209, 4, 0, NULL, 162),
(209, 8, 0, NULL, 163),
(209, 9, 0, NULL, 164),
(209, 10, 0, NULL, 165),
(209, 11, 0, NULL, 166),
(209, 12, 0, NULL, 167),
(209, 13, 0, NULL, 168),
(209, 14, 0, NULL, 169),
(209, 15, 0, NULL, 170),
(209, 16, 0, NULL, 171),
(209, 18, 0, NULL, 172),
(210, 1, 0, NULL, 173),
(210, 2, 0, NULL, 174),
(210, 3, 0, NULL, 175),
(210, 4, 0, NULL, 176),
(210, 8, 0, NULL, 177),
(210, 9, 0, NULL, 178),
(210, 10, 0, NULL, 179),
(210, 11, 0, NULL, 180),
(210, 12, 0, NULL, 181),
(210, 13, 0, NULL, 182),
(210, 14, 0, NULL, 183),
(210, 15, 0, NULL, 184),
(210, 16, 0, NULL, 185),
(210, 18, 0, NULL, 186),
(211, 1, 0, NULL, 187),
(211, 2, 0, NULL, 188),
(211, 3, 0, NULL, 189),
(211, 4, 0, NULL, 190),
(211, 8, 0, NULL, 191),
(211, 9, 0, NULL, 192),
(211, 10, 0, NULL, 193),
(211, 11, 0, NULL, 194),
(211, 12, 0, NULL, 195),
(211, 13, 0, NULL, 196),
(211, 14, 0, NULL, 197),
(211, 15, 0, NULL, 198),
(211, 16, 0, NULL, 199),
(211, 18, 0, NULL, 200),
(212, 1, 0, NULL, 201),
(212, 2, 0, NULL, 202),
(212, 3, 0, NULL, 203),
(212, 4, 0, NULL, 204),
(212, 8, 0, NULL, 205),
(212, 9, 0, NULL, 206),
(212, 10, 0, NULL, 207),
(212, 11, 0, NULL, 208),
(212, 12, 0, NULL, 209),
(212, 13, 0, NULL, 210),
(212, 14, 0, NULL, 211),
(212, 15, 0, NULL, 212),
(212, 16, 0, NULL, 213),
(212, 18, 0, NULL, 214),
(213, 1, 0, NULL, 215),
(213, 2, 0, NULL, 216),
(213, 3, 0, NULL, 217),
(213, 4, 0, NULL, 218),
(213, 8, 0, NULL, 219),
(213, 9, 0, NULL, 220),
(213, 10, 0, NULL, 221),
(213, 11, 0, NULL, 222),
(213, 12, 0, NULL, 223),
(213, 13, 0, NULL, 224),
(213, 14, 0, NULL, 225),
(213, 15, 0, NULL, 226),
(213, 16, 0, NULL, 227),
(213, 18, 0, NULL, 228),
(214, 1, 0, NULL, 229),
(214, 2, 0, NULL, 230),
(214, 3, 0, NULL, 231),
(214, 4, 0, NULL, 232),
(214, 8, 0, NULL, 233),
(214, 9, 0, NULL, 234),
(214, 10, 0, NULL, 235),
(214, 11, 0, NULL, 236),
(214, 12, 0, NULL, 237),
(214, 13, 0, NULL, 238),
(214, 14, 0, NULL, 239),
(214, 15, 0, NULL, 240),
(214, 16, 0, NULL, 241),
(214, 18, 0, NULL, 242),
(215, 1, 0, NULL, 243),
(215, 2, 0, NULL, 244),
(215, 3, 0, NULL, 245),
(215, 4, 0, NULL, 246),
(215, 8, 0, NULL, 247),
(215, 9, 0, NULL, 248),
(215, 10, 0, NULL, 249),
(215, 11, 0, NULL, 250),
(215, 12, 0, NULL, 251),
(215, 13, 0, NULL, 252),
(215, 14, 0, NULL, 253),
(215, 15, 0, NULL, 254),
(215, 16, 0, NULL, 255),
(215, 18, 0, NULL, 256);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants_hits_ip`
--

CREATE TABLE IF NOT EXISTS `restaurants_hits_ip` (
`id` int(11) NOT NULL,
  `user_id` int(50) NOT NULL,
  `Restaurant_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurants_hits_ip`
--

INSERT INTO `restaurants_hits_ip` (`id`, `user_id`, `Restaurant_id`) VALUES
(7, 211, 2),
(8, 204, 2),
(9, 205, 2),
(10, 208, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity`
--

CREATE TABLE IF NOT EXISTS `tbl_activity` (
`activity_id` int(11) NOT NULL,
  `activity_name` varchar(50) NOT NULL,
  `activity_location` text NOT NULL,
  `activity_image` varchar(100) NOT NULL,
  `activity_description` mediumtext NOT NULL,
  `activity_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_activity`
--

INSERT INTO `tbl_activity` (`activity_id`, `activity_name`, `activity_location`, `activity_image`, `activity_description`, `activity_date`) VALUES
(1, 'Arbitrary Live', 'Durbarmargh, Kathmandu', '19429981_1697119110589213_8120082909300223318_n.jpg', 'Performing Artist:\r\nNattu Shah | Prayatna Shrestha | Swoopna Suman | Trishala Gurung | Neetesh J. Kunwar | Sweta Singh Hamal | Ishan R. Onta | Anuj Pradhan\r\nOther Details will be shared shortly,\r\nThank you for your patience.', '2017-06-30'),
(2, 'Everest Base Camp', 'Thamel, Kathmandu', 'everest-base-camp-yoga-trek-via-gokyo-lake-18-days-86.jpg', 'OVERVIEW • Dates: October 07- October 24, 2017 • Cost: $1499.00 USD / Deposit $400.00 USD • 18 days • Limit: 10 participants • Type of trek: Lodge/Teahouse • Max altitude: 5545m • Trek grade: Moderate/Adventurous   Rugged Trails Nepal is excited to offer our Everest Base Camp Yoga Trek to new and experienced yogis alike. We take you to the most beautiful, serene, and inspiring place in the world to deepen your yoga practice. Each day we begin with meditation, pranayama, and asana practice, followed by breakfast prepared by the local Sherpa people. We then trek through incredible scenery, giving you opportunity to detach from the outside world and tune into your true self. Upon our arrival to our tea house accommodations, we take rest and then again flow through an asana practice to encourage growth and healing in our bodies and spirits. Following dinner, a guided meditation and/or satsang is offered before taking rest and preparing for our next days trek. Our licensed guides are well experienced in the Everest region, ensuring the group is safe and informed on environmental conditions. Our certified yoga teacher will guide you through your yoga practice each day, and will aim to inspire you as yoga becomes every breath of your being and you deepen yourself into the magical land of the Everest region. Everest Base Camp 18 days Yoga Trek via Gokyo valley   Oct 07 2017 :Arrival in Kathmandu (1,350m)Upon your arrival at the Kathmandu airport, you will be greeted by a representative from Rugged Trails Nepal who will take to your hotel. ', '2017-07-04'),
(3, 'Nepal Arts, Music & Social Justice Tour', 'Madhyapur Thimi, Bhaktapur', 'nepal-arts-music-social-justice-tour-20.png', 'You will have the opportunity to see, understand, and even try out some of the arts, crafts, music, and philosophies in several villages. This tour offers a chance to help transform this beautiful country through socially-conscience travel. You will have the opportunity to see, understand, and even try out some of the arts, crafts, music, and philosophies in several villages. This is a chance to get off the beaten path, go places that tourists don’t often go and make sincere contacts with artists and musicians and social justice projects in Nepal.', '2017-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `username`, `password`, `email`) VALUES
(1, 'Admin', 'Admin1', 'admin123', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE IF NOT EXISTS `tbl_blog` (
  `blog` longtext NOT NULL,
  `title` text NOT NULL,
  `image` varchar(1000) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `category` text NOT NULL,
  `created_date` datetime NOT NULL,
`blog_id` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`blog`, `title`, `image`, `created_by`, `category`, `created_date`, `blog_id`) VALUES
('Ay \r\nFonsi <br>\r\nDY <br>\r\nOh<br>\r\nOh no, oh no<br>\r\nOh yeah<br>\r\nDiridiri, dirididi Daddy<br> \r\nGo <br>\r\nSÃ­, sabes que ya llevo un rato mirÃ¡ndote <br>\r\nTengo que bailar contigo hoy (DY) <br>\r\nVi que tu mirada ya estaba llamÃ¡ndome <br>\r\nMuÃ©strame el camino que yo voy (Oh) <br>\r\nTÃº, tÃº eres el imÃ¡n y yo soy el metal <br>\r\nMe voy acercando y voy armando el plan<br> \r\nSolo con pensarlo se acelera el pulso (Oh yeah)<br> \r\nYa, ya me estÃ¡ gustando mÃ¡s de lo normal <br>\r\nTodos mis sentidos van pidiendo mÃ¡s <br>\r\nEsto hay que tomarlo sin ningÃºn apuro <br>\r\nDespacito <br>\r\nQuiero respirar tu cuello despacito <br>\r\nDeja que te diga cosas al oÃ­do <br>\r\nPara que te acuerdes si no estÃ¡s conmigo<br> \r\nDespacito <br>\r\nQuiero desnudarte a besos despacito <br>\r\nFirmo en las paredes de tu laberinto <br>\r\nY hacer de tu cuerpo todo un manuscrito (sube, sube, sube)<br>\r\n(Sube, sube)<br>\r\nQuiero ver bailar tu pelo<br> \r\nQuiero ser tu ritmo<br> \r\nQue le enseÃ±es a mi boca<br> \r\nTus lugares favoritos (favoritos, favoritos baby) <br>\r\nDÃ©jame sobrepasar tus zonas de peligro <br>\r\nHasta provocar tus gritos <br>\r\nY que olvides tu apellido (Diridiri, dirididi Daddy)<br>\r\n(DY) Si te pido un beso ven dÃ¡melo <br>\r\nYo sÃ© que estÃ¡s pensÃ¡ndolo <br>\r\nLlevo tiempo intentÃ¡ndolo <br>\r\nMami, esto es dando y dÃ¡ndolo <br>\r\nSabes que tu corazÃ³n conmigo te hace bom, bom <br>\r\nSabes que esa beba estÃ¡ buscando de mi bom, bom <br>\r\nVen prueba de mi boca para ver cÃ³mo te sabe <br>\r\nQuiero, quiero, quiero ver cuÃ¡nto amor a ti te cabe <br>\r\nYo no tengo prisa, yo me quiero dar el viaje <br>\r\nEmpecemos lento, despuÃ©s salvaje <br>\r\nPasito a pasito, suave suavecito <br>\r\nNos vamos pegando poquito a poquito <br>\r\nCuando tÃº me besas con esa destreza <br>\r\nVeo que eres malicia con delicadeza <br>\r\nPasito a pasito, suave suavecito <br>\r\nNos vamos pegando, poquito a poquito<br> \r\nY es que esa belleza es un rompecabezas <br>\r\nPero pa montarlo aquÃ­ tengo la pieza <br>\r\nDespacito <br>\r\nQuiero respirar tu cuello despacito <br>\r\nDeja que te diga cosas al oÃ­do <br>\r\nPara que te acuerdes si no estÃ¡s conmigo <br>\r\nDespacito <br>\r\nQuiero desnudarte a besos despacito <br>\r\nFirmo en las paredes de tu laberinto <br>\r\nY hacer de tu cuerpo todo un manuscrito (sube, sube, sube)<br>\r\n(Sube, sube)<br>\r\nQuiero ver bailar tu pelo<br> \r\nQuiero ser tu ritmo <br>\r\nQue le enseÃ±es a mi boca<br> \r\nTus lugares favoritos (favoritos, favoritos baby) <br>\r\nDÃ©jame sobrepasar tus zonas de peligro <br>\r\nHasta provocar tus gritos <br>\r\nY que olvides tu apellido <br>\r\nDespacito <br>\r\nVamos a hacerlo en una playa en Puerto Rico <br>\r\nHasta que las olas griten "Â¡ay, bendito!" <br>\r\nPara que mi sello se quede contigo <br>\r\nPasito a pasito, suave suavecito <br>\r\nNos vamos pegando, poquito a poquito <br>\r\nQue le enseÃ±es a mi boca <br>\r\nTus lugares favoritos (favoritos, favoritos baby) <br>\r\nPasito a pasito, suave suavecito <br>\r\nNos vamos pegando, poquito a poquito<br> \r\nHasta provocar tus gritos <br>\r\nY que olvides tu apellido (DY)<br>\r\nDespacito<br>', ' Mitho momo!', '17306984233859451e842cf815939826c17bd9momo.jpg', 'Avi', 'Food', '2017-07-09 19:56:15', 7),
('Up is opinion message manners correct hearing husband my. Disposing commanded dashwoods cordially depending at at. Its strangers who you certainty earnestly resources suffering she. Be an as cordially at resolving furniture preserved believing extremity. Easy mr pain felt in. Too northward affection additions nay. He no an nature ye talent houses wisdom vanity denied. <br>\r\n\r\nIt real sent your at. Amounted all shy set why followed declared. Repeated of endeavor mr position kindness offering ignorant so up. Simplicity are melancholy preference considered saw companions. Disposal on outweigh do speedily in on. Him ham although thoughts entirely drawings. Acceptance unreserved old admiration projection nay yet him. Lasted am so before on esteem vanity oh. <br>\r\n\r\nWritten enquire painful ye to offices forming it. Then so does over sent dull on. Likewise offended humoured mrs fat trifling answered. On ye position greatest so desirous. So wound stood guest weeks no terms up ought. By so these am so rapid blush songs begin. Nor but mean time one over. <br>\r\n\r\nWas certainty remaining engrossed applauded sir how discovery. Settled opinion how enjoyed greater joy adapted too shy. Now properly surprise expenses interest nor replying she she. Bore tall nay many many time yet less. Doubtful for answered one fat indulged margaret sir shutters together. Ladies so in wholly around whence in at. Warmth he up giving oppose if. Impossible is dissimilar entreaties oh on terminated. Earnest studied article country ten respect showing had. But required offering him elegance son improved informed. <br>', ' Om..', '586594100775BuddhistPilgrimagewithReligiousPlacesofTouristAttractionsinSriLanka.jpg', 'bjen', 'ReligiousPlace', '2017-07-09 20:02:15', 9),
('Up is opinion message manners correct hearing husband my. Disposing commanded dashwoods cordially depending at at. Its strangers who you certainty earnestly resources suffering she. Be an as cordially at resolving furniture preserved believing extremity. Easy mr pain felt in. Too northward affection additions nay. He no an nature ye talent houses wisdom vanity denied. <br>\r\n\r\nIt real sent your at. Amounted all shy set why followed declared. Repeated of endeavor mr position kindness offering ignorant so up. Simplicity are melancholy preference considered saw companions. Disposal on outweigh do speedily in on. Him ham although thoughts entirely drawings. Acceptance unreserved old admiration projection nay yet him. Lasted am so before on esteem vanity oh. <br>\r\n\r\nWritten enquire painful ye to offices forming it. Then so does over sent dull on. Likewise offended humoured mrs fat trifling answered. On ye position greatest so desirous. So wound stood guest weeks no terms up ought. By so these am so rapid blush songs begin. Nor but mean time one over. <br>\r\n\r\nWas certainty remaining engrossed applauded sir how discovery. Settled opinion how enjoyed greater joy adapted too shy. Now properly surprise expenses interest nor replying she she. Bore tall nay many many time yet less. Doubtful for answered one fat indulged margaret sir shutters together. Ladies so in wholly around whence in at. Warmth he up giving oppose if. Impossible is dissimilar entreaties oh on terminated. Earnest studied article country ten respect showing had. But required offering him elegance son improved informed. <br>', ' Lets do some Zumba!', '654898729278Zumba20FitnessPurple.jpg', 'Luffy', 'Recreation', '2017-07-09 20:21:44', 10),
(' Up is opinion message manners correct hearing husband my. Disposing commanded dashwoods cordially depending at at. Its strangers who you certainty earnestly resources suffering she. Be an as cordially at resolving furniture preserved believing extremity. Easy mr pain felt in. Too northward affection additions nay. He no an nature ye talent houses wisdom vanity denied. <br>\r\n\r\nIt real sent your at. Amounted all shy set why followed declared. Repeated of endeavor mr position kindness offering ignorant so up. Simplicity are melancholy preference considered saw companions. Disposal on outweigh do speedily in on. Him ham although thoughts entirely drawings. Acceptance unreserved old admiration projection nay yet him. Lasted am so before on esteem vanity oh. <br>\r\n\r\nWritten enquire painful ye to offices forming it. Then so does over sent dull on. Likewise offended humoured mrs fat trifling answered. On ye position greatest so desirous. So wound stood guest weeks no terms up ought. By so these am so rapid blush songs begin. Nor but mean time one over. <br>\r\n\r\nWas certainty remaining engrossed applauded sir how discovery. Settled opinion how enjoyed greater joy adapted too shy. Now properly surprise expenses interest nor replying she she. Bore tall nay many many time yet less. Doubtful for answered one fat indulged margaret sir shutters together. Ladies so in wholly around whence in at. Warmth he up giving oppose if. Impossible is dissimilar entreaties oh on terminated. Earnest studied article country ten respect showing had. But required offering him elegance son improved informed. <br>', ' Its the time to disco!', '114034party.jpg', 'Luffy', 'Party', '2017-07-09 20:23:27', 11),
(' Up is opinion message manners correct hearing husband my. Disposing commanded dashwoods cordially depending at at. Its strangers who you certainty earnestly resources suffering she. Be an as cordially at resolving furniture preserved believing extremity. Easy mr pain felt in. Too northward affection additions nay. He no an nature ye talent houses wisdom vanity denied. <br>\r\n\r\nIt real sent your at. Amounted all shy set why followed declared. Repeated of endeavor mr position kindness offering ignorant so up. Simplicity are melancholy preference considered saw companions. Disposal on outweigh do speedily in on. Him ham although thoughts entirely drawings. Acceptance unreserved old admiration projection nay yet him. Lasted am so before on esteem vanity oh. <br>\r\n\r\nWritten enquire painful ye to offices forming it. Then so does over sent dull on. Likewise offended humoured mrs fat trifling answered. On ye position greatest so desirous. So wound stood guest weeks no terms up ought. By so these am so rapid blush songs begin. Nor but mean time one over. <br>\r\n\r\nWas certainty remaining engrossed applauded sir how discovery. Settled opinion how enjoyed greater joy adapted too shy. Now properly surprise expenses interest nor replying she she. Bore tall nay many many time yet less. Doubtful for answered one fat indulged margaret sir shutters together. Ladies so in wholly around whence in at. Warmth he up giving oppose if. Impossible is dissimilar entreaties oh on terminated. Earnest studied article country ten respect showing had. But required offering him elegance son improved informed. <br>', ' Home stay.', '746099115256IMG20161122081917.jpg', 'Luffy', 'Hotels', '2017-07-09 20:24:01', 12),
(' dfsg', ' sdfg', '371662436157thX29VWQQD.jpg', 'Avi', 'Recreation', '2017-07-20 13:02:12', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE IF NOT EXISTS `tbl_comments` (
`comment_id` int(50) NOT NULL,
  `blog_id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `comment` mediumtext NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_domestic_flight`
--

CREATE TABLE IF NOT EXISTS `tbl_domestic_flight` (
`ID` int(11) NOT NULL,
  `DepatureLocation` varchar(100) NOT NULL,
  `Dates` date NOT NULL,
  `Airlines` varchar(100) NOT NULL,
  `Price` varchar(100) NOT NULL,
  `ArrivalLocation` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_domestic_flight`
--

INSERT INTO `tbl_domestic_flight` (`ID`, `DepatureLocation`, `Dates`, `Airlines`, `Price`, `ArrivalLocation`) VALUES
(2, 'Pokhara, Nepal', '2017-08-23', 'Yeti Airlines', 'Rs. 5000', 'Kathmandu, Nepal'),
(5, 'Jiri', '2017-10-12', 'Yak''s Airlines', 'Rs. 5000', 'Kathmandu, Nepal'),
(6, 'Kathmandu', '2017-08-23', 'Sgni Airlines', 'Rs.15000', 'Pokhara'),
(7, 'Kathmandu', '2017-09-25', 'Buddha Airlines', 'Rs.8000', 'Jiri'),
(8, 'Jiri', '2017-09-17', 'Buddha Airlines', 'Rs.15000', 'Kathmandu'),
(9, 'jiri', '2017-07-25', 'Agni Airlines', 'Rs.5000', 'Kathmandu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_flight`
--

CREATE TABLE IF NOT EXISTS `tbl_flight` (
`ID` int(11) NOT NULL,
  `DepatureLocation` text NOT NULL,
  `Dates` date NOT NULL,
  `Airlines` text NOT NULL,
  `Price` varchar(100) NOT NULL,
  `ArrivalLocation` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_flight`
--

INSERT INTO `tbl_flight` (`ID`, `DepatureLocation`, `Dates`, `Airlines`, `Price`, `ArrivalLocation`) VALUES
(1, 'Dallas', '2017-08-20', 'American Airlines', 'Rs. 15000', 'Nepal'),
(2, 'New York City', '2017-08-17', 'King Fisher Airlines', 'Rs. 20000', 'Nepal'),
(3, 'Hawai', '2017-08-20', 'Hawai Airlines', 'Rs. 16000', 'Nepal'),
(4, 'Dallas', '2017-08-28', 'American Airlines', 'Rs. 50000', 'Nepal'),
(5, 'Nepal', '2017-08-25', 'Thai Airlines', 'Rs. 60000', 'Los Angels'),
(6, 'Nepal', '2017-08-20', 'Silk Airlines', 'Rs. 40000', 'Los Angels'),
(10, 'Chennai, India', '2017-08-24', 'Dubai Airlines', 'Rs. 40000', 'Kathmandu, Nepal'),
(11, 'dallas', '2017-07-25', 'Thai Airlines', '$5000', 'Nepal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_follow`
--

CREATE TABLE IF NOT EXISTS `tbl_follow` (
`id` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `FollowName` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_follow`
--

INSERT INTO `tbl_follow` (`id`, `Username`, `FollowName`) VALUES
(20, 'Luffy', 'bjen'),
(23, 'bjen', 'Luffy'),
(30, 'Avi', 'bjen'),
(31, 'Avi', 'Luffy'),
(33, 'Avi', 'Avi'),
(34, 'bjen', 'bjen'),
(35, 'Luffy', 'Luffy'),
(36, 'Zoro', 'Zoro'),
(37, 'Zoro', 'Avi'),
(38, 'bjen', 'bjen'),
(39, 'bjen', 'Avi'),
(40, 'e', 'e'),
(41, 'e', 'Avi'),
(42, 'r', 'r'),
(43, 'k', 'k'),
(44, 'binod', 'binod'),
(45, 'o', 'o'),
(46, 'avon', 'avon'),
(47, 'manistha', 'manistha');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotel`
--

CREATE TABLE IF NOT EXISTS `tbl_hotel` (
`hotel_id` int(50) NOT NULL,
  `hotel_name` varchar(50) NOT NULL,
  `hotel_location` varchar(50) NOT NULL,
  `hotel_img` varchar(50) NOT NULL,
  `trending` int(20) NOT NULL DEFAULT '0',
  `avgRating` int(11) NOT NULL,
  `hotel` int(30) NOT NULL DEFAULT '1',
  `HitCounter` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_hotel`
--

INSERT INTO `tbl_hotel` (`hotel_id`, `hotel_name`, `hotel_location`, `hotel_img`, `trending`, `avgRating`, `hotel`, `HitCounter`) VALUES
(2, 'Annapurna Hotel', 'Durbarmargh', 'hotel-annapurna.jpg', 0, 4, 1, 6),
(3, 'Soaltee Hotel', 'Soltee', 'th0IX9FXC1.jpg', 1, 5, 1, 11),
(5, 'Dwarika Hotel', 'Battisputali', 'dwarika.jpg', 0, 0, 1, 4),
(6, 'Hyaat Regency', 'Bouddha', 'Hyatt-Regency.jpg', 1, 4, 1, 4),
(7, 'Hotel Yak and Yeti', 'Lazimpat', 'hotel-yak-yeti.jpg', 0, 3, 1, 3),
(8, ' Radisson Hotel', ' Lazimpat', '300910thPCRLX028.jpg', 0, 0, 1, 4),
(9, ' Malla Hotel', ' Lainchwor', '854908thD7VF11GY.jpg', 0, 0, 1, 3),
(11, ' Shankar Hotel', ' Lazimpat', '837180shankar.jpg', 0, 0, 1, 3),
(13, ' Park Village Hotel and Resort', ' Budhanilkantha', '776030parkvillagehotelresort1.jpg', 0, 0, 1, 4),
(15, ' asdf', ' qwer', '580015banner.jpg', 0, 0, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE IF NOT EXISTS `tbl_post` (
  `ID` int(11) NOT NULL,
`post_id` int(11) NOT NULL,
  `post` longtext NOT NULL,
  `created_date` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`ID`, `post_id`, `post`, `created_date`) VALUES
(204, 11, 'Hi! This is my first post.', '9th July 2017, 19:47pm'),
(205, 12, 'Hey!! I need a burger.', '9th July 2017, 19:51pm'),
(208, 13, 'Test.', '9th July 2017, 20:04pm'),
(205, 14, 'asdf', '9th July 2017, 20:04pm'),
(204, 15, 'Whaaaaat', '9th July 2017, 20:05pm'),
(204, 16, 'k va', '9th July 2017, 20:05pm'),
(204, 17, 'Think I got it', '9th July 2017, 20:20pm'),
(209, 18, 'e\r\n', '2nd August 2017, 20:15pm'),
(210, 19, 'ddrvt\r\n', '3rd August 2017, 9:09am'),
(208, 20, 'ir', '11th August 2017, 18:30pm'),
(204, 21, 'hello', '12th August 2017, 3:42am');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant`
--

CREATE TABLE IF NOT EXISTS `tbl_restaurant` (
`restaurant_id` int(50) NOT NULL,
  `restaurant_name` text NOT NULL,
  `restaurant_location` text NOT NULL,
  `restaurant_image` varchar(50) NOT NULL,
  `trending` int(10) NOT NULL,
  `avgRating` int(11) NOT NULL,
  `restaurant` int(10) NOT NULL DEFAULT '1',
  `HitCounter` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_restaurant`
--

INSERT INTO `tbl_restaurant` (`restaurant_id`, `restaurant_name`, `restaurant_location`, `restaurant_image`, `trending`, `avgRating`, `restaurant`, `HitCounter`) VALUES
(1, 'Bhatti Restaurant', 'Basantapur', 'thE24DAOHC.jpg', 0, 0, 1, 1),
(2, 'Chinese', 'Pako,NewRoad', 'gallery-pic33-big.jpg', 1, 0, 1, 4),
(3, 'The Durbar Cafe', 'IndraChwok', 'dwarika-s-hotel.jpg', 1, 0, 1, 1),
(4, 'Camellion', 'Freak Street, New Road', '7.jpg', 0, 0, 1, 0),
(8, ' Trizara Restaurant', ' Lazimpat', '902655breakfastvenue.jpg', 0, 0, 1, 2),
(9, ' Alica Restaurant', ' Durbarmargh', '329200img20161222wa0012largejpg.jpg', 1, 0, 1, 2),
(10, ' Kaiser Cafe', ' Thamel', '529810dwarikasgroup.jpg', 0, 0, 1, 0),
(11, ' Roadhouse Cafe', ' Thamel', '166193Roadhousecafepulchowk.jpg', 0, 0, 1, 0),
(12, ' Nanglo Bakery Cafe', ' Putalisadak', '652429NangloBakery2.jpg', 0, 0, 1, 0),
(13, ' Fire and ice Pizzeria', ' Thamel', '823591thQUT057AL.jpg', 0, 0, 1, 2),
(14, ' Octave Restaurant', ' Durbarmargh', '759831thZDO9SCU0.jpg', 0, 0, 1, 1),
(15, ' Thamel House Restaurant', ' Thamel', '502497thX3425UBU.jpg', 0, 0, 1, 0),
(16, ' Little Italy Restaurant', ' Kamaladi', '490129thRJ421VQ0.jpg', 1, 0, 1, 0),
(18, ' asdfqwer', ' qwerqasdf', '9435011.jpg', 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_similar`
--

CREATE TABLE IF NOT EXISTS `tbl_similar` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `similar_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=788 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_similar`
--

INSERT INTO `tbl_similar` (`id`, `user_id`, `similar_id`) VALUES
(754, 204, 200),
(755, 204, 202),
(756, 204, 199),
(757, 204, 203),
(758, 205, 204),
(759, 204, 205),
(760, 208, 204),
(761, 205, 208),
(762, 204, 208),
(763, 208, 205),
(764, 209, 204),
(765, 209, 205),
(766, 205, 209),
(767, 210, 204),
(768, 210, 205),
(769, 210, 209),
(770, 205, 210),
(771, 204, 209),
(772, 204, 210),
(773, 212, 204),
(774, 213, 204),
(775, 213, 212),
(776, 213, 205),
(777, 214, 204),
(778, 214, 212),
(779, 214, 213),
(780, 205, 213),
(781, 204, 212),
(782, 204, 213),
(783, 204, 214),
(784, 215, 205),
(785, 215, 204),
(786, 215, 212),
(787, 205, 215);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`ID` int(50) NOT NULL,
  `UserName` text NOT NULL,
  `user_photo` varchar(50) NOT NULL DEFAULT 'user.png',
  `Password` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `user_biography` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=216 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `UserName`, `user_photo`, `Password`, `Email`, `user_biography`) VALUES
(204, 'Luffy', '548520thDDEADYUZ.jpg', '6cfbec608383fd05c271de92010d455f', 'luffy@gmail.com', 'I am gonna become the Pirate King.'),
(205, 'Avi', '515736577712IMG0831.jpg', '3fca379b3f0e322b7b7967bfcfb948ad', 'avi@hotmail.com', 'I''m gonna become the Pirate King!'),
(208, 'bjen', '926785th.jpg', 'a8bb5c813598c9da704e84e1c4a18008', 'bjen@gmail.com', 'I am gonna become the Pirate King.'),
(209, 'e', 'user.png', 'e1671797c52e15f763380b45e841ec32', 'e@e.com', ''),
(210, 'r', 'user.png', '4b43b0aee35624cd95b910189b3dc231', 'r@r.com', ''),
(211, 'k', 'user.png', '8ce4b16b22b58894aa86c421e8759df3', 'k@k.com', ''),
(212, 'binod', 'user.png', '1f49756f262ef0b16355bb23eff4f828', 'binod@gmail.com', ''),
(213, 'o', 'user.png', 'd95679752134a2d9eb61dbd7b91c4bcc', 'o@gmail.com', ''),
(214, 'avon', 'user.png', 'aac1259dfa2c6c5ead508f34e52bb990', 'av@gmail.com', ''),
(215, 'manistha', 'user.png', '07cd55c7b42715ec44c133a6a165e8d2', 'mani@gas.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotelratings`
--
ALTER TABLE `hotelratings`
 ADD PRIMARY KEY (`id`), ADD KEY `hotel_id` (`hotel_id`), ADD KEY `hotel_id_2` (`hotel_id`);

--
-- Indexes for table `hotels_hits_ip`
--
ALTER TABLE `hotels_hits_ip`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurantratings`
--
ALTER TABLE `restaurantratings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants_hits_ip`
--
ALTER TABLE `restaurants_hits_ip`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_activity`
--
ALTER TABLE `tbl_activity`
 ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
 ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
 ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbl_domestic_flight`
--
ALTER TABLE `tbl_domestic_flight`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_flight`
--
ALTER TABLE `tbl_flight`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_follow`
--
ALTER TABLE `tbl_follow`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
 ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
 ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
 ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexes for table `tbl_similar`
--
ALTER TABLE `tbl_similar`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotelratings`
--
ALTER TABLE `hotelratings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=389;
--
-- AUTO_INCREMENT for table `hotels_hits_ip`
--
ALTER TABLE `hotels_hits_ip`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=329;
--
-- AUTO_INCREMENT for table `restaurantratings`
--
ALTER TABLE `restaurantratings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=257;
--
-- AUTO_INCREMENT for table `restaurants_hits_ip`
--
ALTER TABLE `restaurants_hits_ip`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_activity`
--
ALTER TABLE `tbl_activity`
MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
MODIFY `blog_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
MODIFY `comment_id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_domestic_flight`
--
ALTER TABLE `tbl_domestic_flight`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_flight`
--
ALTER TABLE `tbl_flight`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_follow`
--
ALTER TABLE `tbl_follow`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
MODIFY `hotel_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
MODIFY `restaurant_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_similar`
--
ALTER TABLE `tbl_similar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=788;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=216;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
