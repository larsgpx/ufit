CREATE TABLE `tbl_productos_ordenes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_orden` INT NOT NULL,
  `id_producto` INT NOT NULL,
  `talla_producto` VARCHAR(20) NULL,
  `color_producto` VARCHAR(45) NULL,
  `cantidad` INT NULL DEFAULT 1,
  `precio` DECIMAL(10,2) NULL DEFAULT 0,
  `precio_total` DECIMAL(10,2) NULL DEFAULT 0,
  PRIMARY KEY (`id`, `id_orden`),
  INDEX `fk_tbl_productos_ordenes_1_idx` (`id_orden` ASC),
  INDEX `fk_tbl_productos_ordenes_2_idx` (`id_producto` ASC),
  CONSTRAINT `fk_tbl_productos_ordenes_1`
    FOREIGN KEY (`id_orden`)
    REFERENCES `royalty`.`tbl_ordenes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_productos_ordenes_2`
    FOREIGN KEY (`id_producto`)
    REFERENCES `royalty`.`tbl_productos` (`id_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
