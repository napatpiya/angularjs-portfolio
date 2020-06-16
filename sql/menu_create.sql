CREATE TABLE IF NOT EXISTS `menus` (   
    `id` int(12) NOT NULL AUTO_INCREMENT,   
    `name` varchar(255) NOT NULL,   
    `type` varchar(255) NOT NULL,   
    `cuisine` varchar(255) NOT NULL,   
    `price` decimal(6,2) NOT NULL,   
    `description` varchar(255) NOT NULL,   
    `created_at` TIMESTAMP NOT NULL,   
    `updated_at` TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW(),   
    PRIMARY KEY (`id`) ) 
    ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
