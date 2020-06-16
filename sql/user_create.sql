CREATE TABLE IF NOT EXISTS `users` (   
    `id` int(12) NOT NULL AUTO_INCREMENT,   
    `fname` varchar(255) NOT NULL,   
    `lname` varchar(255) NOT NULL,   
    `address` varchar(255) NOT NULL,   
    `phone` varchar(20) NOT NULL,   
    `created_at` TIMESTAMP NOT NULL,   
    `updated_at` TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW(),   
    PRIMARY KEY (`id`) ) 
    ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
