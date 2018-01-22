-- Schema OSCAR_COMP
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `OSCAR_COMP` DEFAULT CHARACTER SET utf8 ;
USE `OSCAR_COMP` ;

-- -----------------------------------------------------
-- Table `OSCAR_COMP`.`LOGIN`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OSCAR_COMP`.`LOGIN` (
  `idLOGIN` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `EMAIL` VARCHAR(45) NOT NULL,
  `SENHA` VARCHAR(12) NOT NULL,
  `` VARCHAR(45) NULL,
  PRIMARY KEY (`idLOGIN`),
  UNIQUE INDEX `EMAIL_UNIQUE` (`EMAIL` ASC),
  UNIQUE INDEX `EMAIL_SENHA` (`EMAIL` ASC, `SENHA` ASC),
  INDEX `SENHA` (`SENHA` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OSCAR_COMP`.`INSCRITO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OSCAR_COMP`.`INSCRITO` (
  `idINSCRITO` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `P_NOME` VARCHAR(20) NOT NULL,
  `S_NOME` VARCHAR(45) NOT NULL,
  `SEXO` ENUM('Masculino', 'Feminino') NOT NULL,
  `CPF` BIGINT(11) UNSIGNED NOT NULL,
  `RG` VARCHAR(11) NOT NULL,
  `DATANASC` DATE NOT NULL,
  `LOGIN_idLOGIN` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idINSCRITO`),
  UNIQUE INDEX `CPF_UNIQUE` (`CPF` ASC),
  UNIQUE INDEX `RG_UNIQUE` (`RG` ASC),
  INDEX `fk_INSCRITO_LOGIN_idx` (`LOGIN_idLOGIN` ASC),
  CONSTRAINT `fk_INSCRITO_LOGIN`
    FOREIGN KEY (`LOGIN_idLOGIN`)
    REFERENCES `OSCAR_COMP`.`LOGIN` (`idLOGIN`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OSCAR_COMP`.`TELEFONE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OSCAR_COMP`.`TELEFONE` (
  `idTELEFONE` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `DDD` TINYINT(3) UNSIGNED NOT NULL,
  `NUMERO` INT UNSIGNED NOT NULL,
  `LOGIN_idLOGIN` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idTELEFONE`),
  UNIQUE INDEX `DDD_NUMERO` (`DDD` ASC, `NUMERO` ASC),
  INDEX `fk_TELEFONE_LOGIN1_idx` (`LOGIN_idLOGIN` ASC),
  CONSTRAINT `fk_TELEFONE_LOGIN1`
    FOREIGN KEY (`LOGIN_idLOGIN`)
    REFERENCES `OSCAR_COMP`.`LOGIN` (`idLOGIN`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OSCAR_COMP`.`ENDERECO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OSCAR_COMP`.`ENDERECO` (
  `idENDERECO` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `RUA` VARCHAR(45) NOT NULL,
  `NUMERO` INT UNSIGNED NULL,
  `CIDADE` VARCHAR(45) NOT NULL,
  `CEP` INT(8) UNSIGNED NOT NULL,
  `UF` CHAR(2) NOT NULL,
  `LOGIN_idLOGIN` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idENDERECO`),
  INDEX `fk_ENDERECO_LOGIN1_idx` (`LOGIN_idLOGIN` ASC),
  CONSTRAINT `fk_ENDERECO_LOGIN1`
    FOREIGN KEY (`LOGIN_idLOGIN`)
    REFERENCES `OSCAR_COMP`.`LOGIN` (`idLOGIN`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;