CREATE DATABASE hsba;

CREATE TABLE `hsba`.`user` ( `id` INT NOT NULL AUTO_INCREMENT , 
							`vorname` VARCHAR(260) NOT NULL , 
							`name` VARCHAR(260) NOT NULL , 
							`email` VARCHAR(260) NOT NULL , 
							`password` VARCHAR(260) NOT NULL , 
							PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `hsba`.`buecher` ( `id` INT NOT NULL AUTO_INCREMENT , 
								`titel` VARCHAR(260) NOT NULL , 
								`autor` VARCHAR(260) NOT NULL , 
								`verlag` VARCHAR(260) NOT NULL , 
								`zustand` VARCHAR(30) NOT NULL ,
								`price` VARCHAR(30) NOT NULL ,
								`adresse` VARCHAR(260) NOT NULL ,
								`plz` VARCHAR(10) NOT NULL ,
								`ort` VARCHAR(260) NOT NULL ,
								`land` VARCHAR(100) NOT NULL ,
								`user_id` INT(200) NOT NULL ,
								`beschreibung` VARCHAR(500) NOT NULL , 
								PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `hsba`.`bewertung` ( `id` INT NOT NULL AUTO_INCREMENT ,
								`star` INT(10) NOT NULL , 
								`user_id` INT(11) NOT NULL , 
								`kommentar` VARCHAR(500) NOT NULL ,
								`b_user` INT(11) NOT NULL , 
								PRIMARY KEY (`id`)) ENGINE = InnoDB;