-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema project_tri
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema project_tri
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `project_tri` DEFAULT CHARACTER SET utf8 ;
USE `project_tri` ;

-- -----------------------------------------------------
-- Table `project_tri`.`role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project_tri`.`role` (
  `id_role` INT NOT NULL AUTO_INCREMENT,
  `name_role` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_role`),
  UNIQUE INDEX `name_role_UNIQUE` (`name_role` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project_tri`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project_tri`.`user` (
  `id_user` INT NOT NULL AUTO_INCREMENT,
  `name_user` VARCHAR(80) NOT NULL,
  `username_user` VARCHAR(80) NOT NULL,
  `mail_user` VARCHAR(255) NOT NULL,
  `pseudo_user` VARCHAR(60) NOT NULL,
  `password_user` VARCHAR(255) NOT NULL,
  `key_user` VARCHAR(255) NOT NULL,
  `active_user` TINYINT NOT NULL,
  `date_user` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role_id` INT NOT NULL,
  PRIMARY KEY (`id_user`),
  INDEX `fk_user_role_idx` (`role_id` ASC) VISIBLE,
  UNIQUE INDEX `pseudo_user_UNIQUE` (`pseudo_user` ASC) VISIBLE,
  UNIQUE INDEX `key_user_UNIQUE` (`key_user` ASC) VISIBLE,
  UNIQUE INDEX `mail_user_UNIQUE` (`mail_user` ASC) VISIBLE,
  CONSTRAINT `fk_user_role`
    FOREIGN KEY (`role_id`)
    REFERENCES `project_tri`.`role` (`id_role`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project_tri`.`subject`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project_tri`.`subject` (
  `id_subject` INT NOT NULL AUTO_INCREMENT,
  `name_subject` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`id_subject`),
  UNIQUE INDEX `name_subject_UNIQUE` (`name_subject` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project_tri`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project_tri`.`category` (
  `id_category` INT NOT NULL AUTO_INCREMENT,
  `name_category` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`id_category`),
  UNIQUE INDEX `name_category_UNIQUE` (`name_category` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project_tri`.`format`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project_tri`.`format` (
  `id_format` INT NOT NULL AUTO_INCREMENT,
  `name_format` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`id_format`),
  UNIQUE INDEX `name_format_UNIQUE` (`name_format` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project_tri`.`content`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project_tri`.`content` (
  `id_content` INT NOT NULL AUTO_INCREMENT,
  `name_content` VARCHAR(80) NOT NULL,
  `link_content` VARCHAR(255) NOT NULL,
  `desc_content` TINYTEXT NOT NULL,
  `date_content` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `subject_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `category_id` INT NOT NULL,
  `format_id` INT NOT NULL,
  PRIMARY KEY (`id_content`),
  INDEX `fk_content_subject1_idx` (`subject_id` ASC) VISIBLE,
  INDEX `fk_content_user1_idx` (`user_id` ASC) VISIBLE,
  UNIQUE INDEX `link_content_UNIQUE` (`link_content` ASC) VISIBLE,
  INDEX `fk_content_category1_idx` (`category_id` ASC) VISIBLE,
  INDEX `fk_content_type1_idx` (`format_id` ASC) VISIBLE,
  CONSTRAINT `fk_content_subject1`
    FOREIGN KEY (`subject_id`)
    REFERENCES `project_tri`.`subject` (`id_subject`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_content_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `project_tri`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_content_category1`
    FOREIGN KEY (`category_id`)
    REFERENCES `project_tri`.`category` (`id_category`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_content_type1`
    FOREIGN KEY (`format_id`)
    REFERENCES `project_tri`.`format` (`id_format`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project_tri`.`favory`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project_tri`.`favory` (
  `user_id_favory` INT NOT NULL,
  `content_id_favory` INT NOT NULL,
  PRIMARY KEY (`user_id_favory`, `content_id_favory`),
  INDEX `fk_user_has_content_content1_idx` (`content_id_favory` ASC) VISIBLE,
  INDEX `fk_user_has_content_user1_idx` (`user_id_favory` ASC) VISIBLE,
  CONSTRAINT `fk_user_has_content_user1`
    FOREIGN KEY (`user_id_favory`)
    REFERENCES `project_tri`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_content_content1`
    FOREIGN KEY (`content_id_favory`)
    REFERENCES `project_tri`.`content` (`id_content`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
