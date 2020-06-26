CREATE SCHEMA IF NOT EXISTS `servis_bp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ;
USE `servis_bp` ;

-- -----------------------------------------------------
-- Table `servis_bp`.`atribut`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `servis_bp`.`atribut` (
  `atrID` MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
  `nazivAtr` VARCHAR(40) NOT NULL,
  PRIMARY KEY (`atrID`))
ENGINE = InnoDB
AUTO_INCREMENT = 18
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `servis_bp`.`kategorija`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `servis_bp`.`kategorija` (
  `katID` SMALLINT(6) NOT NULL AUTO_INCREMENT,
  `roditeljID` SMALLINT(6) NULL DEFAULT NULL,
  `nazivKat` VARCHAR(30) NULL DEFAULT NULL,
  PRIMARY KEY (`katID`),
  INDEX `roditeljID` (`roditeljID` ASC) VISIBLE,
  CONSTRAINT `kategorija_ibfk_1`
    FOREIGN KEY (`roditeljID`)
    REFERENCES `servis_bp`.`kategorija` (`katID`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `servis_bp`.`atributi_kategorije`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `servis_bp`.`atributi_kategorije` (
  `atrKatID` MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
  `atrID` MEDIUMINT(9) NOT NULL,
  `katID` SMALLINT(6) NOT NULL,
  PRIMARY KEY (`atrKatID`),
  INDEX `atrID` (`atrID` ASC) VISIBLE,
  INDEX `katID` (`katID` ASC) VISIBLE,
  CONSTRAINT `atributi_kategorije_ibfk_1`
    FOREIGN KEY (`atrID`)
    REFERENCES `servis_bp`.`atribut` (`atrID`),
  CONSTRAINT `atributi_kategorije_ibfk_2`
    FOREIGN KEY (`katID`)
    REFERENCES `servis_bp`.`kategorija` (`katID`))
ENGINE = InnoDB
AUTO_INCREMENT = 18
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `servis_bp`.`auth_rule`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `servis_bp`.`auth_rule` (
  `name` VARCHAR(64) NOT NULL,
  `data` BLOB NULL DEFAULT NULL,
  `created_at` INT(11) NULL DEFAULT NULL,
  `updated_at` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `servis_bp`.`auth_item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `servis_bp`.`auth_item` (
  `name` VARCHAR(64) NOT NULL,
  `type` SMALLINT(6) NOT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `rule_name` VARCHAR(64) NULL DEFAULT NULL,
  `data` BLOB NULL DEFAULT NULL,
  `created_at` INT(11) NULL DEFAULT NULL,
  `updated_at` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`),
  INDEX `rule_name` (`rule_name` ASC) VISIBLE,
  INDEX `idx-auth_item-type` (`type` ASC) VISIBLE,
  CONSTRAINT `auth_item_ibfk_1`
    FOREIGN KEY (`rule_name`)
    REFERENCES `servis_bp`.`auth_rule` (`name`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `servis_bp`.`auth_assignment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `servis_bp`.`auth_assignment` (
  `item_name` VARCHAR(64) NOT NULL,
  `user_id` VARCHAR(64) NOT NULL,
  `created_at` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`item_name`, `user_id`),
  INDEX `idx-auth_assignment-user_id` (`user_id` ASC) VISIBLE,
  CONSTRAINT `auth_assignment_ibfk_1`
    FOREIGN KEY (`item_name`)
    REFERENCES `servis_bp`.`auth_item` (`name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `servis_bp`.`auth_item_child`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `servis_bp`.`auth_item_child` (
  `parent` VARCHAR(64) NOT NULL,
  `child` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`parent`, `child`),
  INDEX `child` (`child` ASC) VISIBLE,
  CONSTRAINT `auth_item_child_ibfk_1`
    FOREIGN KEY (`parent`)
    REFERENCES `servis_bp`.`auth_item` (`name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2`
    FOREIGN KEY (`child`)
    REFERENCES `servis_bp`.`auth_item` (`name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `servis_bp`.`sektor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `servis_bp`.`sektor` (
  `sektorID` SMALLINT(6) NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(40) NOT NULL,
  PRIMARY KEY (`sektorID`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `servis_bp`.`korisnik`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `servis_bp`.`korisnik` (
  `korisnikID` MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
  `ime` VARCHAR(50) NOT NULL,
  `prezime` VARCHAR(50) NOT NULL,
  `telefon` VARCHAR(20) NULL DEFAULT NULL,
  `email` VARCHAR(70) NOT NULL,
  `korisnickoIme` VARCHAR(60) NOT NULL,
  `lozinka` VARCHAR(255) NOT NULL,
  `sektorID` SMALLINT(6) NOT NULL,
  `autentKljuc` CHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`korisnikID`),
  INDEX `sektorID` (`sektorID` ASC) VISIBLE,
  CONSTRAINT `korisnik_ibfk_1`
    FOREIGN KEY (`sektorID`)
    REFERENCES `servis_bp`.`sektor` (`sektorID`))
ENGINE = InnoDB
AUTO_INCREMENT = 42
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `servis_bp`.`migration`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `servis_bp`.`migration` (
  `version` VARCHAR(180) NOT NULL,
  `apply_time` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`version`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `servis_bp`.`os`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `servis_bp`.`os` (
  `osID` MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
  `invBroj` VARCHAR(10) NOT NULL,
  `katID` SMALLINT(6) NOT NULL,
  `nazivOs` VARCHAR(40) NULL DEFAULT NULL,
  PRIMARY KEY (`osID`),
  UNIQUE INDEX `invBroj` (`invBroj` ASC) VISIBLE,
  INDEX `katID` (`katID` ASC) VISIBLE,
  CONSTRAINT `os_ibfk_2`
    FOREIGN KEY (`katID`)
    REFERENCES `servis_bp`.`kategorija` (`katID`))
ENGINE = InnoDB
AUTO_INCREMENT = 30
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `servis_bp`.`nalog`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `servis_bp`.`nalog` (
  `nalogID` MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
  `osID` MEDIUMINT(9) NOT NULL,
  `prijavio` MEDIUMINT(9) NULL DEFAULT NULL,
  `zaprimioNalog` MEDIUMINT(9) NULL DEFAULT NULL,
  `datOtvaranja` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `datZatvaranja` DATETIME NULL DEFAULT NULL,
  `opis` VARCHAR(255) NULL DEFAULT NULL,
  `statusNaloga` ENUM('Na cekanju', 'U obradi', 'Zavrseno') NULL DEFAULT NULL,
  PRIMARY KEY (`nalogID`),
  INDEX `nalog_ibfk_2` (`prijavio` ASC) VISIBLE,
  INDEX `izvrsavaNalog` (`zaprimioNalog` ASC) VISIBLE,
  INDEX `nalog_ibfk_1` (`osID` ASC) VISIBLE,
  CONSTRAINT `nalog_ibfk_1`
    FOREIGN KEY (`osID`)
    REFERENCES `servis_bp`.`os` (`osID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `nalog_ibfk_2`
    FOREIGN KEY (`prijavio`)
    REFERENCES `servis_bp`.`korisnik` (`korisnikID`),
  CONSTRAINT `nalog_ibfk_4`
    FOREIGN KEY (`zaprimioNalog`)
    REFERENCES `servis_bp`.`korisnik` (`korisnikID`))
ENGINE = InnoDB
AUTO_INCREMENT = 120
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `servis_bp`.`vrijednost_atributa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `servis_bp`.`vrijednost_atributa` (
  `vrijAtrID` MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
  `atrID` MEDIUMINT(9) NOT NULL,
  `vrijednost` VARCHAR(60) NULL DEFAULT NULL,
  PRIMARY KEY (`vrijAtrID`),
  INDEX `atrID` (`atrID` ASC) VISIBLE,
  CONSTRAINT `vrijednost_atributa_ibfk_1`
    FOREIGN KEY (`atrID`)
    REFERENCES `servis_bp`.`atribut` (`atrID`))
ENGINE = InnoDB
AUTO_INCREMENT = 51
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `servis_bp`.`vrijednost_os`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `servis_bp`.`vrijednost_os` (
  `vrijOsID` MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
  `vrijAtrID` MEDIUMINT(9) NOT NULL,
  `osID` MEDIUMINT(9) NOT NULL,
  PRIMARY KEY (`vrijOsID`),
  INDEX `vrijednost_os_ibfk_1` (`vrijAtrID` ASC) VISIBLE,
  INDEX `vrijednost_os_ibfk_2` (`osID` ASC) VISIBLE,
  CONSTRAINT `vrijednost_os_ibfk_1`
    FOREIGN KEY (`vrijAtrID`)
    REFERENCES `servis_bp`.`vrijednost_atributa` (`vrijAtrID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `vrijednost_os_ibfk_2`
    FOREIGN KEY (`osID`)
    REFERENCES `servis_bp`.`os` (`osID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 63
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;
