CREATE TABLE IF NOT EXISTS `macws_db`.`feedback_types` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `name` VARCHAR(245) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `macws_db`.`migrations` (
  `migration` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `batch` INT(11) NOT NULL COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `macws_db`.`password_resets` (
  `email` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `token` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '',
  INDEX `password_resets_email_index` (`email` ASC)  COMMENT '',
  INDEX `password_resets_token_index` (`token` ASC)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `macws_db`.`users` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `email` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `password` VARCHAR(60) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `role_id` INT(10) UNSIGNED NULL DEFAULT NULL COMMENT '',
  `confirmation_code` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `last_name` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `first_name` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `address` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `phone_number` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `remember_token` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT '',
  `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '',
  `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '',
  `gender` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `users_email_unique` (`email` ASC)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `macws_db`.`projects` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `creator` INT(10) UNSIGNED NOT NULL COMMENT '',
  `name` VARCHAR(255) NULL DEFAULT NULL COMMENT '',
  `description` TEXT NULL DEFAULT NULL COMMENT '',
  `photo` VARCHAR(245) NULL DEFAULT NULL COMMENT '',
  `video` VARCHAR(245) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_projects_users1_idx` (`creator` ASC)  COMMENT '',
  CONSTRAINT `fk_projects_users1`
    FOREIGN KEY (`creator`)
    REFERENCES `macws_db`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `macws_db`.`projects` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `creator` INT(10) UNSIGNED NOT NULL COMMENT '',
  `name` VARCHAR(255) NULL DEFAULT NULL COMMENT '',
  `description` TEXT NULL DEFAULT NULL COMMENT '',
  `photo` VARCHAR(245) NULL DEFAULT NULL COMMENT '',
  `video` VARCHAR(245) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_projects_users1_idx` (`creator` ASC)  COMMENT '',
  CONSTRAINT `fk_projects_users1`
    FOREIGN KEY (`creator`)
    REFERENCES `macws_db`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `macws_db`.`projects_has_users` (
  `project_id` INT(11) NOT NULL COMMENT '',
  `user_id` INT(10) UNSIGNED NOT NULL COMMENT '',
  PRIMARY KEY (`project_id`, `user_id`)  COMMENT '',
  INDEX `fk_projects_has_users_users1_idx` (`user_id` ASC)  COMMENT '',
  INDEX `fk_projects_has_users_projects1_idx` (`project_id` ASC)  COMMENT '',
  CONSTRAINT `fk_projects_has_users_projects1`
    FOREIGN KEY (`project_id`)
    REFERENCES `macws_db`.`projects` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_projects_has_users_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `macws_db`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;