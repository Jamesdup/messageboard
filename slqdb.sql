CREATE TABLE `messageboard`.`users` (`id` INT NOT NULL AUTO_INCREMENT , `email` VARCHAR(32) NOT NULL , `username` VARCHAR(16) NOT NULL , `firstname` VARCHAR(32) NOT NULL , `lastname` VARCHAR(32) NOT NULL , `dob` DATE NOT NULL , `password` VARCHAR(16) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
