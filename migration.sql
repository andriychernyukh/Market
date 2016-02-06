-- Create database
CREATE DATABASE IF NOT EXISTS `market`
 DEFAULT CHARACTER SET = 'utf8' DEFAULT COLLATE 'utf8_general_ci';



USE `market`;

-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;