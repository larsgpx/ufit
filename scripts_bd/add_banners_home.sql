CREATE TABLE `tbl_banner_home` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NULL,
  `subtitle` VARCHAR(255) NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `tbl_banner_home_slides` (
`id` INT NOT NULL AUTO_INCREMENT,
`banner_home_id` INT NOT NULL,
`image` VARCHAR(255) NULL,
PRIMARY KEY (`id`),
INDEX `fk_tbl_banner_home_slides_1_idx` (`banner_home_id` ASC),
CONSTRAINT `fk_tbl_banner_home_slides_1`
FOREIGN KEY (`banner_home_id`)
REFERENCES `royalty`.`tbl_banner_home` (`id`)
ON DELETE CASCADE
ON UPDATE CASCADE);
