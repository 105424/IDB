SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `IDB` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `IDB` ;

-- -----------------------------------------------------
-- Table `IDB`.`Students`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `IDB`.`Students` (
  `idStudent` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idStudent`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IDB`.`Skills`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `IDB`.`Skills` (
  `idSkills` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(45) NOT NULL ,
  `Categorie` VARCHAR(45) NULL ,
  `SubCategorie` VARCHAR(45) NULL ,
  PRIMARY KEY (`idSkills`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IDB`.`StudentsSkills`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `IDB`.`StudentsSkills` (
  `Students_idStudent` INT NOT NULL ,
  `Skills_idSkills` INT NOT NULL ,
  PRIMARY KEY (`Students_idStudent`, `Skills_idSkills`) ,
  INDEX `fk_Students_has_Skills_Skills1` (`Skills_idSkills` ASC) ,
  INDEX `fk_Students_has_Skills_Students` (`Students_idStudent` ASC) ,
  CONSTRAINT `fk_Students_has_Skills_Students`
    FOREIGN KEY (`Students_idStudent` )
    REFERENCES `IDB`.`Students` (`idStudent` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Students_has_Skills_Skills1`
    FOREIGN KEY (`Skills_idSkills` )
    REFERENCES `IDB`.`Skills` (`idSkills` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
