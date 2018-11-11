SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `default_schema` ;
USE `default_schema` ;

-- -----------------------------------------------------
-- Table `default_schema`.`t_usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`t_usuario` (
  `id_usuario` INT(11) NOT NULL ,
  `usu_cnombre` VARCHAR(20) NULL DEFAULT NULL ,
  `usu_capellido` VARCHAR(20) NULL DEFAULT NULL ,
  `usu_ccorreo` VARCHAR(45) NULL DEFAULT NULL ,
  `usu_cusuario` VARCHAR(10) NULL DEFAULT NULL ,
  `usu_ccontrasena` VARCHAR(10) NULL DEFAULT NULL ,
  `usu_ctipo_usuario` VARCHAR(15) NULL DEFAULT NULL ,
  `estado` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_usuario`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `default_schema`.`t_bitacora`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`t_bitacora` (
  `id_bitacora` INT(11) NOT NULL ,
  `fk_usuario` INT(11) NOT NULL ,
  `bit_cusuario` VARCHAR(10) NULL DEFAULT NULL ,
  `bit_cactividad` VARCHAR(45) NULL DEFAULT NULL ,
  `bit_ffecha` DATE NULL DEFAULT NULL ,
  `bit_hhora` TIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id_bitacora`) ,
  INDEX `fk_t_bitacora_t_usuario1_idx` (`fk_usuario` ASC) ,
  CONSTRAINT `fk_t_bitacora_t_usuario1`
    FOREIGN KEY (`fk_usuario` )
    REFERENCES `default_schema`.`t_usuario` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `default_schema`.`t_insumo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`t_insumo` (
  `ins_codigo` INT(11) NOT NULL ,
  `ins_cnombre_comercial` VARCHAR(30) NULL DEFAULT NULL ,
  `ins_cmarca` VARCHAR(25) NULL DEFAULT NULL ,
  `ins_cdescripcion` TEXT NULL DEFAULT NULL ,
  `estado` INT(11) NULL DEFAULT NULL ,
  `codigo` VARCHAR(7) NULL DEFAULT NULL ,
  `presentacion` VARCHAR(25) NOT NULL ,
  `unidad` INT(11) NOT NULL ,
  `minimo` INT(11) NOT NULL ,
  PRIMARY KEY (`ins_codigo`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `default_schema`.`t_proveedor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`t_proveedor` (
  `id_proveedor` INT(11) NOT NULL ,
  `pro_cnombre_empresa` VARCHAR(30) NULL DEFAULT NULL ,
  `pro_cnombre_responsable` VARCHAR(30) NULL DEFAULT NULL ,
  `pro_cdireccion` VARCHAR(45) NULL DEFAULT NULL ,
  `pro_ctelefono` VARCHAR(9) NULL DEFAULT NULL ,
  `estado` INT(11) NULL DEFAULT NULL ,
  `justificacion` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_proveedor`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `default_schema`.`t_compra`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`t_compra` (
  `id_compra` INT(11) NOT NULL ,
  `fk_proveedor` INT(11) NOT NULL ,
  `fk_insumo` INT(11) NOT NULL ,
  `fecha_caducidad` DATE NULL DEFAULT NULL ,
  `precio_unitario` DOUBLE NULL DEFAULT NULL ,
  `cantidad` INT(11) NULL DEFAULT NULL ,
  `total` DOUBLE NULL DEFAULT NULL ,
  `fecha_actual` DATE NOT NULL ,
  `factura` VARCHAR(10) NOT NULL ,
  `subtotal` DOUBLE NOT NULL ,
  `codigo` VARCHAR(10) NOT NULL ,
  `estado` VARCHAR(25) NOT NULL ,
  PRIMARY KEY (`id_compra`) ,
  INDEX `fk_t_compra_t_insumo1_idx` (`fk_insumo` ASC) ,
  INDEX `fk_t_compra_t_proveedor1_idx` (`fk_proveedor` ASC) ,
  CONSTRAINT `fk_t_compra_t_insumo1`
    FOREIGN KEY (`fk_insumo` )
    REFERENCES `default_schema`.`t_insumo` (`ins_codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_t_compra_t_proveedor1`
    FOREIGN KEY (`fk_proveedor` )
    REFERENCES `default_schema`.`t_proveedor` (`id_proveedor` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `default_schema`.`t_medico`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`t_medico` (
  `idMedico` INT(11) NOT NULL ,
  `t_usuario` INT(11) NOT NULL ,
  `med_cnombre` VARCHAR(20) NULL DEFAULT NULL ,
  `med_capellidos` VARCHAR(20) NULL DEFAULT NULL ,
  `med_cespecialidad` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`idMedico`) ,
  INDEX `fk_t_medico_t_usuario1_idx` (`t_usuario` ASC) ,
  CONSTRAINT `fk_t_medico_t_usuario1`
    FOREIGN KEY (`t_usuario` )
    REFERENCES `default_schema`.`t_usuario` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `default_schema`.`t_paciente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`t_paciente` (
  `id_paciente` INT(11) NOT NULL ,
  `pac_cnombre` VARCHAR(20) NULL DEFAULT NULL ,
  `pac_capellidos` VARCHAR(20) NULL DEFAULT NULL ,
  `pac_cdui` VARCHAR(10) NULL DEFAULT NULL ,
  `pac_ctelefono` VARCHAR(9) NULL DEFAULT NULL ,
  `pac_ffecha_nac` DATE NULL DEFAULT NULL ,
  `estado` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_paciente`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `default_schema`.`t_expediente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`t_expediente` (
  `id_expediente` INT(11) NOT NULL ,
  `fk_medico` INT(11) NOT NULL ,
  `fk_paciente` INT(11) NOT NULL ,
  `codigo` VARCHAR(10) NOT NULL ,
  `fecha_registro` DATE NOT NULL ,
  `alergias` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`id_expediente`) ,
  INDEX `fk_t_expediente_t_medico1_idx` (`fk_medico` ASC) ,
  INDEX `fk_t_expediente_t_paciente1_idx` (`fk_paciente` ASC) ,
  CONSTRAINT `fk_t_expediente_t_medico1`
    FOREIGN KEY (`fk_medico` )
    REFERENCES `default_schema`.`t_medico` (`idMedico` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_t_expediente_t_paciente1`
    FOREIGN KEY (`fk_paciente` )
    REFERENCES `default_schema`.`t_paciente` (`id_paciente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `default_schema`.`t_inventario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`t_inventario` (
  `id_inventario` INT(11) NOT NULL ,
  `fk_compra` INT(11) NOT NULL ,
  `inv_ecantidad_actual` INT(11) NULL DEFAULT NULL ,
  `inv_ecantidad_saliente` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_inventario`) ,
  INDEX `fk_t_inventario_t_compra1_idx` (`fk_compra` ASC) ,
  CONSTRAINT `fk_t_inventario_t_compra1`
    FOREIGN KEY (`fk_compra` )
    REFERENCES `default_schema`.`t_compra` (`id_compra` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `default_schema`.`Inventario_Unidades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`Inventario_Unidades` (
  `idInventario_Unidades` INT NOT NULL ,
  `fk_inventarioGeneral` INT(11) NOT NULL ,
  `decremento` INT NULL ,
  PRIMARY KEY (`idInventario_Unidades`) ,
  INDEX `fk_Inventario_Unidades_t_inventario1_idx` (`fk_inventarioGeneral` ASC) ,
  CONSTRAINT `fk_Inventario_Unidades_t_inventario1`
    FOREIGN KEY (`fk_inventarioGeneral` )
    REFERENCES `default_schema`.`t_inventario` (`id_inventario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `default_schema`.`t_consulta`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`t_consulta` (
  `idconsulta` INT(11) NOT NULL ,
  `fk_expediente` INT(11) NOT NULL ,
  `fk_InventarioUnidades` INT NOT NULL ,
  `con_fecha_atiende` DATE NULL DEFAULT NULL ,
  `con_diagnostico` TEXT NULL DEFAULT NULL ,
  `con_ref_medica` TEXT NULL DEFAULT NULL ,
  `con_cons_medica` TEXT NULL DEFAULT NULL ,
  `con_receta` TEXT NOT NULL ,
  `con_fecha_amenorrea` DATE NULL DEFAULT NULL ,
  `con_ctipo_consulta` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`idconsulta`) ,
  INDEX `fk_t_consulta_t_expediente1_idx` (`fk_expediente` ASC) ,
  INDEX `fk_t_consulta_Inventario_Unidades1_idx` (`fk_InventarioUnidades` ASC) ,
  CONSTRAINT `fk_t_consulta_t_expediente1`
    FOREIGN KEY (`fk_expediente` )
    REFERENCES `default_schema`.`t_expediente` (`id_expediente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_t_consulta_Inventario_Unidades1`
    FOREIGN KEY (`fk_InventarioUnidades` )
    REFERENCES `default_schema`.`Inventario_Unidades` (`idInventario_Unidades` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `default_schema`.`t_devolucion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`t_devolucion` (
  `id_devolucion` INT(11) NOT NULL ,
  `fk_compra` INT(11) NOT NULL ,
  PRIMARY KEY (`id_devolucion`) ,
  INDEX `fk_t_devolucion_t_compra1_idx` (`fk_compra` ASC) ,
  CONSTRAINT `fk_t_devolucion_t_compra1`
    FOREIGN KEY (`fk_compra` )
    REFERENCES `default_schema`.`t_compra` (`id_compra` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `default_schema`.`t_enfermeria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`t_enfermeria` (
  `id_enfermeria` INT(11) NOT NULL ,
  `fk_consulta` INT(11) NOT NULL ,
  `enf_destatura` DOUBLE NULL DEFAULT NULL ,
  `enf_dpeso` DOUBLE NULL DEFAULT NULL ,
  `enf_dtempetarura` DOUBLE NULL DEFAULT NULL ,
  `enf_cpresion` VARCHAR(20) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_enfermeria`) ,
  INDEX `fk_t_enfermeria_t_consulta1_idx` (`fk_consulta` ASC) ,
  CONSTRAINT `fk_t_enfermeria_t_consulta1`
    FOREIGN KEY (`fk_consulta` )
    REFERENCES `default_schema`.`t_consulta` (`idconsulta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `default_schema`.`t_enfermeria_fetal`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`t_enfermeria_fetal` (
  `id_enfermeria_fetal` INT(11) NOT NULL ,
  `fk_consulta` INT(11) NOT NULL ,
  `fet_dfcf` DOUBLE NULL DEFAULT NULL ,
  `fet_cactividad_fetal` VARCHAR(45) NULL DEFAULT NULL ,
  `fet_daltura_uterina` DOUBLE NULL DEFAULT NULL ,
  PRIMARY KEY (`id_enfermeria_fetal`) ,
  INDEX `fk_t_enfermeria_fetal_t_consulta1_idx` (`fk_consulta` ASC) ,
  CONSTRAINT `fk_t_enfermeria_fetal_t_consulta1`
    FOREIGN KEY (`fk_consulta` )
    REFERENCES `default_schema`.`t_consulta` (`idconsulta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `default_schema`.`t_examenes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`t_examenes` (
  `id_examenes` INT(11) NOT NULL ,
  `fk_consulta` INT(11) NOT NULL ,
  `exa_cclasificacion` VARCHAR(45) NULL DEFAULT NULL ,
  `exa_ctipo` VARCHAR(25) NULL DEFAULT NULL ,
  `exa_cresultado` TEXT NULL DEFAULT NULL ,
  PRIMARY KEY (`id_examenes`) ,
  INDEX `fk_t_examenes_t_consulta1_idx` (`fk_consulta` ASC) ,
  CONSTRAINT `fk_t_examenes_t_consulta1`
    FOREIGN KEY (`fk_consulta` )
    REFERENCES `default_schema`.`t_consulta` (`idconsulta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `default_schema`.`t_llegada`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`t_llegada` (
  `id_llegada` INT(11) NOT NULL ,
  `fk_expediente` INT(11) NOT NULL ,
  `lleg_ffecha_atiende` DATE NOT NULL ,
  `estado` VARCHAR(12) NOT NULL ,
  PRIMARY KEY (`id_llegada`) ,
  INDEX `fk_t_llegada_t_expediente` (`fk_expediente` ASC) ,
  CONSTRAINT `fk_t_llegada_t_expediente`
    FOREIGN KEY (`fk_expediente` )
    REFERENCES `default_schema`.`t_expediente` (`id_expediente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `default_schema`.`t_medicamentos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`t_medicamentos` (
  `id_medicamentos` INT(11) NOT NULL ,
  `fk_consulta` INT(11) NOT NULL ,
  `med_cnombre` VARCHAR(25) NULL DEFAULT NULL ,
  `med_claboratorio` VARCHAR(25) NULL DEFAULT NULL ,
  `med_cdosis` VARCHAR(25) NULL DEFAULT NULL ,
  `med_cduracion` VARCHAR(25) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_medicamentos`) ,
  INDEX `fk_t_medicamentos_t_consulta1_idx` (`fk_consulta` ASC) ,
  CONSTRAINT `fk_t_medicamentos_t_consulta1`
    FOREIGN KEY (`fk_consulta` )
    REFERENCES `default_schema`.`t_consulta` (`idconsulta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `default_schema`.`t_prenatal`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`t_prenatal` (
  `idprenatal` INT(11) NOT NULL ,
  `fk_consulta` INT(11) NOT NULL ,
  `pre_cfactores_riesgo` TEXT NULL DEFAULT NULL ,
  `pre_cantecedentes_personales` TEXT NULL DEFAULT NULL ,
  `pre_cantecedentes_familiares` TEXT NULL DEFAULT NULL ,
  `pre_ccirugias_previas` TEXT NULL DEFAULT NULL ,
  `pre_cantecedentes_obstetricos` TEXT NULL DEFAULT NULL ,
  `pre_ffecha_parto` DATE NULL DEFAULT NULL ,
  `pre_ctipo_riesgo` TEXT NULL DEFAULT NULL ,
  `pre_iultra` BLOB NULL DEFAULT NULL ,
  PRIMARY KEY (`idprenatal`) ,
  INDEX `fk_t_prenatal_t_consulta1_idx` (`fk_consulta` ASC) ,
  CONSTRAINT `fk_t_prenatal_t_consulta1`
    FOREIGN KEY (`fk_consulta` )
    REFERENCES `default_schema`.`t_consulta` (`idconsulta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `default_schema`.`t_responsable`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`t_responsable` (
  `idresponsable` INT(11) NOT NULL ,
  `t_paciente` INT(11) NOT NULL ,
  `res_cnombre` VARCHAR(20) NULL DEFAULT NULL ,
  `res_capellidos` VARCHAR(20) NULL DEFAULT NULL ,
  `res_cdui` VARCHAR(10) NULL DEFAULT NULL ,
  `res_ctelefono` VARCHAR(9) NULL DEFAULT NULL ,
  `estado` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`idresponsable`) ,
  INDEX `fk_t_responsable_t_paciente1_idx` (`t_paciente` ASC) ,
  CONSTRAINT `fk_t_responsable_t_paciente1`
    FOREIGN KEY (`t_paciente` )
    REFERENCES `default_schema`.`t_paciente` (`id_paciente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `default_schema`.`t_vacunacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`t_vacunacion` (
  `id_vacunacion` INT(11) NOT NULL ,
  `fk_consulta` INT(11) NOT NULL ,
  `vac_ctipo_vacuna` VARCHAR(25) NULL DEFAULT NULL ,
  `vac_cnombre` VARCHAR(25) NULL DEFAULT NULL ,
  `vac_cperiodo` VARCHAR(25) NULL DEFAULT NULL ,
  `vac_cdosis` VARCHAR(25) NULL DEFAULT NULL ,
  `vac_ccomentario` TEXT NULL DEFAULT NULL ,
  PRIMARY KEY (`id_vacunacion`) ,
  INDEX `fk_t_vacunacion_t_consulta1_idx` (`fk_consulta` ASC) ,
  CONSTRAINT `fk_t_vacunacion_t_consulta1`
    FOREIGN KEY (`fk_consulta` )
    REFERENCES `default_schema`.`t_consulta` (`idconsulta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

USE `default_schema` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
