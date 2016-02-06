
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



-- create database user 
CREATE USER 'market_admin'@'localhost' IDENTIFIED BY '***';GRANT ALL PRIVILEGES ON *.* TO 'market_admin'@'localhost' IDENTIFIED BY '***' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;GRANT ALL PRIVILEGES ON `market`.* TO 'market_admin'@'localhost';
