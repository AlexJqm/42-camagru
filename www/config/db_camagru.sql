-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jun 10, 2019 at 01:03 AM
-- Server version: 5.6.43
-- PHP Version: 7.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `db_camagru` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_camagru`;

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
	`admin_id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	`admin_user` VARCHAR(255),
	`admin_email` TEXT,
	`admin_password` VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
	`customer_id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	`customer_user` VARCHAR(32),
	`customer_email` TEXT,
	`customer_password` VARCHAR(64),
	`customer_ln` VARCHAR(32),
	`customer_fn` VARCHAR(32),
	`customer_bio` TEXT,
	`customer_follower` INT,
	`customer_img` TEXT,
	`customer_token` VARCHAR(128),
	`customer_status` INT DEFAULT 0 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `customers`
--

CREATE TABLE `pictures` (
	`picture_id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	`picture_name` VARCHAR(32),
	`picture_source` TEXT,
	`picture_date` VARCHAR(32),
	`picture_like` INT,
	`picture_desc` TEXT,
	`picture_comment` TEXT,
	`picture_filter` TEXT,
	`picture_author` VARCHAR(32)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
	`follower_id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	`customer_user` VARCHAR(32),
	`follower_user` VARCHAR(32),
	`follower_bool` INT DEFAULT 0 NOT NULL,
	`notif_bool` INT DEFAULT 1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
	`like_id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	`picture_id` INT,
	`customer_user` VARCHAR(32),
	`like_user` VARCHAR(32),
	`like_bool` INT DEFAULT 0 NOT NULL,
	`notif_bool` INT DEFAULT 1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Generate 50 customers account
--

/* INSERT INTO `customers` (customer_user,customer_password,customer_email,customer_fn,customer_ln,customer_bio,customer_img) VALUES ("DGA02SHJ5TU","KYA99MAD2GB","iaculis.aliquet@luctuset.net","Palmer","Rivera","felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla.","default.png"),("POC86NFH9VG","AKG62RVP0EA","libero.nec@aliquamiaculislacus.net","Alexander","Coffey","aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam","default.png"),("DGI94BVL1OZ","XYQ87ZXZ0GD","sed@vehiculaPellentesquetincidunt.com","Baker","Guerra","lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet","default.png"),("WQT17EUH2BR","TLZ21ZFI7XT","Sed.pharetra.felis@lacusEtiambibendum.edu","Asher","Curtis","luctus. Curabitur egestas nunc sed libero. Proin sed turpis nec","default.png"),("ELT69UUW7UO","BXJ54HRR2CR","blandit.viverra.Donec@aliquamenim.ca","Zeph","Harvey","Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui","default.png"),("NYT68OQD5CB","YYZ85ERD3LR","egestas.a.dui@in.co.uk","Ignatius","Mcdonald","lectus rutrum urna, nec luctus felis purus ac tellus. Suspendisse","default.png"),("QDR97GED6NY","PTV44JLW0OZ","blandit.Nam@pedePraesenteu.com","Lucius","Leon","quam vel sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque","default.png"),("YOL05UJX2ME","BPX70XGZ7LY","aliquam.eros.turpis@eros.org","Giacomo","Stone","nec mauris blandit mattis. Cras eget nisi dictum augue malesuada","default.png"),("DVU38ICX5JP","KFM14EUA2EX","dapibus.gravida@DonecfringillaDonec.co.uk","Paul","Jensen","enim. Sed nulla ante, iaculis nec, eleifend non, dapibus rutrum,","default.png"),("HAO47GJN6ZZ","GHU90IHN3FV","sem.Nulla@Nullasemper.org","Macon","Hansen","erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla.","default.png"),("ZPB20ECR8PR","POE72HQI6FB","enim.non.nisi@velpedeblandit.edu","Eagan","Cortez","malesuada fames ac turpis egestas. Fusce aliquet magna a neque.","default.png"),("KDN46KLL2IV","CNE01VFY6HS","vestibulum.nec@vitaeodio.edu","Herrod","Rios","semper tellus id nunc interdum feugiat. Sed nec metus facilisis","default.png"),("GGM84DRA8IR","GWU37UCZ5TE","nunc.id.enim@laciniaatiaculis.co.uk","Ahmed","Spencer","eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam","default.png"),("IXJ84PMS8AU","UZJ54BRZ4TY","fringilla.purus@diamPellentesquehabitant.edu","Zachary","Pacheco","et magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim","default.png"),("MQD21HQE2GN","WXU06EJY7IT","egestas.Aliquam@vitaesodalesat.ca","Hiram","Gonzales","luctus vulputate, nisi sem semper erat, in consectetuer ipsum nunc","default.png"),("UEQ81ZKR2XZ","LLB27HHO3TS","Donec.egestas@enimcommodo.co.uk","Axel","Benton","neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis.","default.png"),("RJQ16ANF3MR","TVQ44VVW9XD","vulputate@idblanditat.ca","Luke","Figueroa","eu, eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur dictum.","default.png"),("KOV92CDJ8BA","JBJ74VPR8JR","non@Nuncmauriselit.org","David","Cross","posuere vulputate, lacus. Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse","default.png"),("PSI11LKC4EU","OCH20BZK4KJ","lacinia@NulladignissimMaecenas.net","Kadeem","Duncan","pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque","default.png"),("QQL50TPK5SM","IZA72CUR9GQ","Suspendisse.eleifend@auctor.com","Xenos","Kidd","augue, eu tempor erat neque non quam. Pellentesque habitant morbi","default.png"),("MPG97PIH1QO","DGN68ITW1PI","Donec@nonlaciniaat.edu","Macon","Wilcox","vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend","default.png"),("WTB81TAX4BW","OXX57FLX3DF","odio.tristique@Vivamus.edu","Raphael","Logan","imperdiet non, vestibulum nec, euismod in, dolor. Fusce feugiat. Lorem","default.png"),("HJM43ALN5DQ","EAI63OGQ3OB","condimentum@anteipsumprimis.net","Tanek","Hogan","Vivamus non lorem vitae odio sagittis semper. Nam tempor diam","default.png"),("JAY36PBO0XX","VON63SWR7NB","diam.lorem.auctor@tristiquesenectus.edu","Baker","Tillman","sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed","default.png"),("NRG46YGZ4YK","TQZ41BQE3VX","Duis.cursus.diam@sit.co.uk","Ross","Riggs","a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu","default.png"),("ILN94YSD9DV","YLO63DVU6PR","nisl.arcu@enim.net","Marshall","Solomon","augue. Sed molestie. Sed id risus quis diam luctus lobortis.","default.png"),("LKJ11XYN6YB","IKI45PQQ9QT","Vivamus@libero.net","Sylvester","Decker","neque. Sed eget lacus. Mauris non dui nec urna suscipit","default.png"),("AID38AYS6KO","UIC88HJJ6EW","ipsum.porta@justonecante.co.uk","Emerson","Fleming","ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula.","default.png"),("TPK06MIW0GU","VFF89OEN2IZ","libero.lacus@quamdignissim.com","Lionel","Wilson","lectus. Cum sociis natoque penatibus et magnis dis parturient montes,","default.png"),("OUY75FOJ5VK","WJH44ALX4UY","senectus.et@adipiscingenimmi.net","Daquan","Maynard","varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem","default.png"),("QGV29APU7UM","ITA91WJX5FY","porttitor.vulputate.posuere@Aenean.com","Hop","Henderson","egestas blandit. Nam nulla magna, malesuada vel, convallis in, cursus","default.png"),("MTB52HLW3OE","CBU81SFV5UY","hendrerit.id@lectusNullam.edu","Tad","Simon","non nisi. Aenean eget metus. In nec orci. Donec nibh.","default.png"),("LKR28YBL8LU","OYQ79HHN4TO","fringilla@temporarcuVestibulum.org","Octavius","Burton","Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede.","default.png"),("LLY54YMC4AE","VDH69JPA4KP","in.magna.Phasellus@nuncid.org","Len","Gutierrez","nec, cursus a, enim. Suspendisse aliquet, sem ut cursus luctus,","default.png"),("ZJR58OOA1OD","SOK58CAP7ZC","lacinia.at@tellus.ca","Colt","Valdez","Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros.","default.png"),("GWH56KCF6VS","IDO30NJS7BV","velit.egestas@Ut.edu","Wing","Cleveland","pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus","default.png"),("QSC29RXN8PL","PCZ01EML7HV","eu@atsem.org","Lionel","Dejesus","neque venenatis lacus. Etiam bibendum fermentum metus. Aenean sed pede","default.png"),("SVI77SYJ8AP","GCX96WBS2WR","id.enim.Curabitur@neccursusa.net","Abel","Oliver","ornare, facilisis eget, ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida","default.png"),("EHW41DVS6BF","YFD63MZK4DL","egestas.Fusce.aliquet@lectusconvallis.org","Dieter","Jarvis","nunc sed pede. Cum sociis natoque penatibus et magnis dis","default.png"),("VLN44HPD5HC","MPG36TDY2WG","convallis.in@ullamcorperviverraMaecenas.org","Bert","Holder","nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet","default.png"),("QCZ98PQB3VV","TSA98RSC7SB","enim.Curabitur@turpisvitae.co.uk","Keegan","Sweet","velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae","default.png"),("BHX30ESD1AI","MXS19YBB9GA","tellus@turpisNulla.ca","Hayden","Mcconnell","lorem fringilla ornare placerat, orci lacus vestibulum lorem, sit amet","default.png"),("PPF56IHM8IL","YYA72AWN6ZN","mi.fringilla@luctusetultrices.co.uk","Quamar","Webb","diam lorem, auctor quis, tristique ac, eleifend vitae, erat. Vivamus","default.png"),("HNW66PKA6HC","UCG08QIR4CT","molestie.in.tempus@maurisblanditmattis.ca","Yardley","Fleming","eget, dictum placerat, augue. Sed molestie. Sed id risus quis","default.png"),("PKG18YYB7IT","GAU56MXR0KK","lorem@massarutrummagna.org","Acton","Horton","nec tellus. Nunc lectus pede, ultrices a, auctor non, feugiat","default.png"); */

--
-- Generate 5 followers
--

/* INSERT INTO `followers` (customer_user, follower_user, follower_bool) VALUES ("DGA02SHJ5TU", "aljacque", "1"),("POC86NFH9VG", "aljacque", "1"),("WQT17EUH2BR", "aljacque", "1"),("QQL50TPK5SM", "aljacque", "1"),("MPG97PIH1QO", "aljacque", "1"); */

--
-- Create picture post
--

/* SET lc_time_names = 'fr_FR';
INSERT INTO `pictures` (`picture_name`,`picture_source`,`picture_date`,`picture_like`,`picture_bio`,`picture_comment`,`picture_author`) VALUES ('Picture 01','default.jpg', DATE_FORMAT(NOW(), "%d %M %Y"), '85', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc augue.', '', 'aljacque'); */

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
