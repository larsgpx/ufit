CREATE TABLE `tbl_ordenes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(45) NOT NULL,
  `estado` VARCHAR(20) NULL DEFAULT 'Pendiente',
  `fecha_ingreso` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `id_cliente` INT(10) NOT NULL,
  `total` DECIMAL(10,2) NULL DEFAULT 0,
  `moneda` VARCHAR(5) NULL DEFAULT 'PEN',
  `total_transaccion` DECIMAL(10,2) NULL DEFAULT 0,
  `moneda_transaccion` VARCHAR(5) NULL DEFAULT 'PEN',
  `forma_pago` VARCHAR(45) NULL,
  `respuesta_pasarela` MEDIUMTEXT NULL,

  PRIMARY KEY (`id`, `codigo`),
  INDEX `fk_tbl_ordenes_1_idx` (`id_cliente` ASC),
  CONSTRAINT `fk_tbl_ordenes_1`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `royalty`.`tbl_clientes` (`id_cli`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
