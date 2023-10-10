-- This file is used to create tables in your DB to save data
CREATE DATABASE 'your_db'; -- Choose your name
CREATE TABLE `users` (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `username` varchar(25) NOT NULL,
    `password` varchar(255) NOT NULL,
    `email` varchar(100) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `username` (`username`)
);
CREATE TABLE `passwords` (
                         `id` int unsigned NOT NULL AUTO_INCREMENT,
                         `username` varchar(25) NOT NULL,
                         `password` varchar(30) NOT NULL,
                         `date` datetime
);