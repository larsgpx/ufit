ALTER TABLE `tbl_banner_home_slides` 
ADD COLUMN `has_link` INT NULL DEFAULT 0 AFTER `image`,
ADD COLUMN `link` VARCHAR(255) NULL AFTER `has_link`;
