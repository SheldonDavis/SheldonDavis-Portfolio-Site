-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 05, 2015 at 07:53 AM
-- Server version: 5.5.32-cll-lve
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `applianceDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `appliances`
--

CREATE TABLE IF NOT EXISTS `appliances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `a_name` char(75) DEFAULT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `descrep` text,
  `star` int(11) DEFAULT NULL,
  `thumb` char(75) DEFAULT NULL,
  `Limage` char(75) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8657 ;

--
-- Dumping data for table `appliances`
--

INSERT INTO `appliances` (`id`, `a_name`, `price`, `descrep`, `star`, `thumb`, `Limage`) VALUES
(8642, 'SoBlend: Color series', '50.00', 'This colorful blender has 3 rows of double sided blades, and comes in 3 colors. SoBlend is known for their blending abilities and the color series does not disappoint.', 2, 'blenderT.jpg', 'blender.jpg'),
(8643, 'SuperSamuraii', '85.00', 'The SuperSamuraii is just that, a fantasic blender that can cut through the toughest of opponents. SuperSamuraii is a wonderful friend in the kitchen.', 3, 'superblenderT.jpg', 'superblender.jpg'),
(8644, 'Swirly Hand Mixer', '25.00', 'Swirly has been making kitchen mixing devices since the turn of the decade and they never seem to let you down. This hand mixer is well made, durable and stable under stress. Very useful in any home kitchen.', 2, 'handmixerT.jpg', 'handmixer.jpg'),
(8645, 'OverToast 4000', '50.00', 'The OverToast 4000 comes with four slots for twice the toasting ability. This toaster comes to you from the makers of  "All Things Breakfast" and they say you''ll never be happier with your toast.', 4, 'supertoasterT.jpg', 'supertoaster.jpg'),
(8646, 'Cake-Stand Standing Mixer', '150.00', 'This quality machine features 2 mixing blades and a 4 speed engine. From the makers of the Swirly comes the next generation of mixers.', 5, 'standmixerT.jpg', 'standmixer.jpg'),
(8647, 'Toasty Jr.', '20.00', 'The Toasty Jr is a smaller version of the OverToast 4000. Comes with two slots for the bread, and 4 different toast settings.', 4, 'toasterT.jpg', 'toaster.jpg'),
(8648, 'The Timer Teapot', '15.00', 'The Timer Teapot comes with a built in timer that will let out a whistle whenever the water is ready for use.', 3, 'teapotT.jpg', 'teapot.jpg'),
(8649, 'The Tungsten Cooler', '500.00', 'This refrigerator uses new age cooling technologies to keep all liquids the perfect temperature for drinking and food a solid cold for a longer shelf life.', 4, 'fridgeT.jpg', 'fridge.jpg'),
(8650, 'The Master-Wave', '125.00', 'This microwave oven runs at 120 WATTs to save power but lose no cooking time. With all the settings of the average microwave and more.', 5, 'microwaveT.jpg', 'microwave.jpg'),
(8651, 'Ninja Knife Set', '25.00', 'These knives are made of a new steel alloy that never loses its sharpness. They are guaranted to last for generations.', 3, 'carvingknifeT.jpg', 'carvingknife.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(14) DEFAULT NULL,
  `password` char(14) DEFAULT NULL,
  `slevel` enum('user','admin','superuser') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `slevel`) VALUES
(1, 'user', 'user', 'user'),
(2, 'boss', 'facebook13', 'superuser');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
