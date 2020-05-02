<?php
require 'database.php';
    try
    {
        $bdd->query("DROP DATABASE IF EXISTS camagru");
        $bdd->query("CREATE DATABASE camagru");
        $bdd->query("use camagru");

        $bdd->query('DROP TABLE IF EXISTS `comments`;
                    CREATE TABLE IF NOT EXISTS `comments` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `uid` text CHARACTER SET ascii NOT NULL,
                    `user_uid` text CHARACTER SET armscii8 NOT NULL,
                    `img_uid` text CHARACTER SET armscii8 NOT NULL,
                    `comment` text CHARACTER SET armscii8 NOT NULL,
                    `date` timestamp NOT NULL DEFAULT current_timestamp(),
                    PRIMARY KEY (`id`)
                    ) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;');

        $bdd->query('DROP TABLE IF EXISTS `gallery`;
                    CREATE TABLE IF NOT EXISTS `gallery` (
                    `img_id` int(11) NOT NULL AUTO_INCREMENT,
                    `img_name` text CHARACTER SET armscii8 NOT NULL,
                    `img_user` text CHARACTER SET armscii8 NOT NULL,
                    `img_uid` text CHARACTER SET armscii8 NOT NULL,
                    `nb_like` int(11) NOT NULL DEFAULT 0,
                    `img_date` timestamp NOT NULL DEFAULT current_timestamp(),
                    `nb_comm` int(11) NOT NULL DEFAULT 0,
                    PRIMARY KEY (`img_id`)
                    ) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;');

        $bdd->query('DROP TABLE IF EXISTS `likes`;
                    CREATE TABLE IF NOT EXISTS `likes` (
                    `like_id` int(11) NOT NULL AUTO_INCREMENT,
                    `like_post` text CHARACTER SET armscii8 NOT NULL,
                    `like_user` text CHARACTER SET armscii8 NOT NULL,
                    `like_date` timestamp NOT NULL DEFAULT current_timestamp(),
                    PRIMARY KEY (`like_id`)
                    ) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;');

        $bdd->query('DROP TABLE IF EXISTS `token`;
                    CREATE TABLE IF NOT EXISTS `token` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `user_uid` text CHARACTER SET armscii8 NOT NULL,
                    `token_creat` text CHARACTER SET armscii8 NOT NULL,
                    PRIMARY KEY (`id`)
                    ) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;');

        $bdd->query("DROP TABLE IF EXISTS `users`;
                    CREATE TABLE IF NOT EXISTS `users` (
                      `user_id` int(11) NOT NULL AUTO_INCREMENT,
                      `user_name` varchar(255) CHARACTER SET armscii8 NOT NULL,
                      `user_email` varchar(255) CHARACTER SET armscii8 NOT NULL,
                      `user_uid` text CHARACTER SET armscii8 NOT NULL,
                      `user_passwd` text CHARACTER SET armscii8 NOT NULL,
                      `u_describ` varchar(250) CHARACTER SET armscii8 NOT NULL DEFAULT 'pas de description pour l''instant',
                      `email_com` int(1) NOT NULL DEFAULT 1,
                      `nb_com` int(11) NOT NULL DEFAULT 0,
                      `nb_like` int(11) NOT NULL DEFAULT 0,
                      `nb_post` int(11) NOT NULL DEFAULT 0,
                      `user_img` text CHARACTER SET armscii8 NOT NULL DEFAULT 'default.png',
                      `user_date` timestamp NOT NULL DEFAULT current_timestamp(),
                      `confirm` int(1) NOT NULL DEFAULT 0,
                      PRIMARY KEY (`user_id`)
                    ) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
        ");

       require 'install.php';
       header("Location: ../index.php");

    }
    catch (Exception $error)
    {
        echo "test 3<br />";
        print "Error while connecting to the new database !: " . $error->getMessage() . "<br/>";
        die();
    }

?>