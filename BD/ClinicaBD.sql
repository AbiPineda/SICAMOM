SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `Clinica` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `Clinica` ;

-- -----------------------------------------------------
-- Table `Clinica`.`t_usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Clinica`.`t_usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT ,
  `usu_cnombre` VARCHAR(20) NULL ,
  `usu_capellido` VARCHAR(20) NULL ,
  `usu_ccorreo` VARCHAR(45) NULL ,
  `usu_cusuario` VARCHAR(10) NULL ,
  `usu_ccontrasena` VARCHAR(10) NULL ,
  `usu_ctipo_usuario` VARCHAR(15) NULL ,
  `usu_ccontrasena2` VARCHAR(10) NULL ,
  PRIMARY KEY (`id_usuario`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Clinica`.`t_medico`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Clinica`.`t_medico` (
  `idMedico` INT NOT NULL AUTO_INCREMENT ,
  `t_usuario` INT NOT NULL ,
  `med_cnombre` VARCHAR(20) NULL ,
  `med_capellidos` VARCHAR(20) NULL ,
  `med_cespecialidad` VARCHAR(45) NULL ,
  PRIMARY KEY (`idMedico`) ,
  INDEX `fk_t_medico_t_usuario1_idx` (`t_usuario` ASC) ,
  CONSTRAINT `fk_t_medico_t_usuario1`
    FOREIGN KEY (`t_usuario` )
    REFERENCES `Clinica`.`t_usuario` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Clinica`.`t_paciente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Clinica`.`t_paciente` (
  `id_paciente` INT NOT NULL AUTO_INCREMENT ,
  `pac_cnombre` VARCHAR(20) NULL ,
  `pac_capellidos` VARCHAR(20) NULL ,
  `pac_cdui` VARCHAR(10) NULL ,
  `pac_ctelefono` VARCHAR(9) NULL ,
  `pac_ffecha_nac` DATE NULL ,
  `pac_ctipo_consulta` VARCHAR(25) NULL ,
  PRIMARY KEY (`id_paciente`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Clinica`.`t_responsable`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Clinica`.`t_responsable` (
  `idresponsable` INT NOT NULL AUTO_INCREMENT ,
  `t_paciente` INT NOT NULL ,
  `res_cnombre` VARCHAR(20) NULL ,
  `res_capellidos` VARCHAR(20) NULL ,
  `res_cdui` VARCHAR(10) NULL ,
  `res_ctelefono` VARCHAR(9) NULL ,
  PRIMARY KEY (`idresponsable`) ,
  INDEX `fk_t_responsable_t_paciente1_idx` (`t_paciente` ASC) ,
  CONSTRAINT `fk_t_responsable_t_paciente1`
    FOREIGN KEY (`t_paciente` )
    REFERENCES `Clinica`.`t_paciente` (`id_paciente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Clinica`.`t_expediente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Clinica`.`t_expediente` (
  `id_expediente` INT NOT NULL AUTO_INCREMENT ,
  `fk_medico` INT NOT NULL ,
  `fk_paciente` INT NOT NULL ,
  PRIMARY KEY (`id_expediente`) ,
  INDEX `fk_t_expediente_t_medico1_idx` (`fk_medico` ASC) ,
  INDEX `fk_t_expediente_t_paciente1_idx` (`fk_paciente` ASC) ,
  CONSTRAINT `fk_t_expediente_t_medico1`
    FOREIGN KEY (`fk_medico` )
    REFERENCES `Clinica`.`t_medico` (`idMedico` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_t_expediente_t_paciente1`
    FOREIGN KEY (`fk_paciente` )
    REFERENCES `Clinica`.`t_paciente` (`id_paciente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Clinica`.`t_consulta`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Clinica`.`t_consulta` (
  `idconsulta` INT NOT NULL AUTO_INCREMENT ,
  `fk_expediente` INT NOT NULL ,
  `con_fecha_atiende` DATE NULL ,
  `con_diagnostico` TEXT NULL ,
  `con_ref_medica` TEXT NULL ,
  `con_cons_medica` TEXT NULL ,
  `con_receta` TEXT NULL ,
  `con_fecha_amenorrea` DATE NULL ,
  PRIMARY KEY (`idconsulta`) ,
  INDEX `fk_t_consulta_t_expediente1_idx` (`fk_expediente` ASC) ,
  CONSTRAINT `fk_t_consulta_t_expediente1`
    FOREIGN KEY (`fk_expediente` )
    REFERENCES `Clinica`.`t_expediente` (`id_expediente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Clinica`.`t_enfermeria_fetal`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Clinica`.`t_enfermeria_fetal` (
  `id_enfermeria_fetal` INT NOT NULL AUTO_INCREMENT ,
  `fk_consulta` INT NOT NULL ,
  `fet_dfcf` DOUBLE NULL ,
  `fet_cactividad_fetal` VARCHAR(45) NULL ,
  `fet_daltura_uterina` DOUBLE NULL ,
  PRIMARY KEY (`id_enfermeria_fetal`) ,
  INDEX `fk_t_enfermeria_fetal_t_consulta1_idx` (`fk_consulta` ASC) ,
  CONSTRAINT `fk_t_enfermeria_fetal_t_consulta1`
    FOREIGN KEY (`fk_consulta` )
    REFERENCES `Clinica`.`t_consulta` (`idconsulta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Clinica`.`t_enfermeria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Clinica`.`t_enfermeria` (
  `id_enfermeria` INT NOT NULL AUTO_INCREMENT ,
  `fk_consulta` INT NOT NULL ,
  `enf_destatura` DOUBLE NULL ,
  `enf_dpeso` DOUBLE NULL ,
  `enf_dtempetarura` DOUBLE NULL ,
  `enf_cpresion` VARCHAR(20) NULL ,
  PRIMARY KEY (`id_enfermeria`) ,
  INDEX `fk_t_enfermeria_t_consulta1_idx` (`fk_consulta` ASC) ,
  CONSTRAINT `fk_t_enfermeria_t_consulta1`
    FOREIGN KEY (`fk_consulta` )
    REFERENCES `Clinica`.`t_consulta` (`idconsulta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Clinica`.`t_examenes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Clinica`.`t_examenes` (
  `id_examenes` INT NOT NULL AUTO_INCREMENT ,
  `fk_consulta` INT NOT NULL ,
  `exa_cclasificacion` VARCHAR(45) NULL ,
  `exa_ctipo` VARCHAR(25) NULL ,
  `exa_cresultado` TEXT NULL ,
  PRIMARY KEY (`id_examenes`) ,
  INDEX `fk_t_examenes_t_consulta1_idx` (`fk_consulta` ASC) ,
  CONSTRAINT `fk_t_examenes_t_consulta1`
    FOREIGN KEY (`fk_consulta` )
    REFERENCES `Clinica`.`t_consulta` (`idconsulta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Clinica`.`t_medicamentos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Clinica`.`t_medicamentos` (
  `id_medicamentos` INT NOT NULL AUTO_INCREMENT ,
  `fk_consulta` INT NOT NULL ,
  `med_cnombre` VARCHAR(25) NULL ,
  `med_claboratorio` VARCHAR(25) NULL ,
  `med_cdosis` VARCHAR(25) NULL ,
  `med_cduracion` VARCHAR(25) NULL ,
  PRIMARY KEY (`id_medicamentos`) ,
  INDEX `fk_t_medicamentos_t_consulta1_idx` (`fk_consulta` ASC) ,
  CONSTRAINT `fk_t_medicamentos_t_consulta1`
    FOREIGN KEY (`fk_consulta` )
    REFERENCES `Clinica`.`t_consulta` (`idconsulta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Clinica`.`t_vacunacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Clinica`.`t_vacunacion` (
  `id_vacunacion` INT NOT NULL AUTO_INCREMENT ,
  `fk_consulta` INT NOT NULL ,
  `vac_ctipo_vacuna` VARCHAR(25) NULL ,
  `vac_cnombre` VARCHAR(25) NULL ,
  `vac_cperiodo` VARCHAR(25) NULL ,
  `vac_cdosis` VARCHAR(25) NULL ,
  `vac_ccomentario` TEXT NULL ,
  PRIMARY KEY (`id_vacunacion`) ,
  INDEX `fk_t_vacunacion_t_consulta1_idx` (`fk_consulta` ASC) ,
  CONSTRAINT `fk_t_vacunacion_t_consulta1`
    FOREIGN KEY (`fk_consulta` )
    REFERENCES `Clinica`.`t_consulta` (`idconsulta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Clinica`.`t_prenatal`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Clinica`.`t_prenatal` (
  `idprenatal` INT NOT NULL AUTO_INCREMENT ,
  `fk_consulta` INT NOT NULL ,
  `pre_cfactores_riesgo` TEXT NULL ,
  `pre_cantecedentes_personales` TEXT NULL ,
  `pre_cantecedentes_familiares` TEXT NULL ,
  `pre_ccirugias_previas` TEXT NULL ,
  `pre_cantecedentes_obstetricos` TEXT NULL ,
  `pre_ffecha_parto` DATE NULL ,
  `pre_ctipo_riesgo` TEXT NULL ,
  `pre_iultra` BLOB NULL ,
  PRIMARY KEY (`idprenatal`) ,
  INDEX `fk_t_prenatal_t_consulta1_idx` (`fk_consulta` ASC) ,
  CONSTRAINT `fk_t_prenatal_t_consulta1`
    FOREIGN KEY (`fk_consulta` )
    REFERENCES `Clinica`.`t_consulta` (`idconsulta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Clinica`.`t_inventario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Clinica`.`t_inventario` (
  `id_inventario` INT NOT NULL AUTO_INCREMENT ,
  `fk_consulta` INT NOT NULL ,
  `inv_ecantidad_actual` INT NULL ,
  `inv_ecantidad_saliente` INT NULL ,
  PRIMARY KEY (`id_inventario`) ,
  INDEX `fk_t_inventario_t_consulta1_idx` (`fk_consulta` ASC) ,
  CONSTRAINT `fk_t_inventario_t_consulta1`
    FOREIGN KEY (`fk_consulta` )
    REFERENCES `Clinica`.`t_consulta` (`idconsulta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Clinica`.`t_proveedor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Clinica`.`t_proveedor` (
  `id_proveedor` INT NOT NULL AUTO_INCREMENT ,
  `pro_cnombre_empresa` VARCHAR(30) NULL ,
  `pro_cnombre_responsable` VARCHAR(30) NULL ,
  `pro_cdireccion` VARCHAR(45) NULL ,
  `pro_ctelefono` VARCHAR(9) NULL ,
  PRIMARY KEY (`id_proveedor`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Clinica`.`t_insumo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Clinica`.`t_insumo` (
  `ins_codigo` INT NOT NULL AUTO_INCREMENT ,
  `fk_proveedor` INT NOT NULL ,
  `fk_inventario` INT NOT NULL ,
  `ins_cnombre_comercial` VARCHAR(30) NULL ,
  `ins_cmarca` VARCHAR(25) NULL ,
  `ins_cdescripcion` TEXT NULL ,
  `ins_cpresentacion` VARCHAR(25) NULL ,
  `ins_dprecio` DOUBLE NULL ,
  `ins_ffecha_caducidad` DATE NULL ,
  PRIMARY KEY (`ins_codigo`) ,
  INDEX `fk_t_insumo_t_inventario1_idx` (`fk_inventario` ASC) ,
  INDEX `fk_t_insumo_t_proveedor1_idx` (`fk_proveedor` ASC) ,
  CONSTRAINT `fk_t_insumo_t_inventario1`
    FOREIGN KEY (`fk_inventario` )
    REFERENCES `Clinica`.`t_inventario` (`id_inventario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_t_insumo_t_proveedor1`
    FOREIGN KEY (`fk_proveedor` )
    REFERENCES `Clinica`.`t_proveedor` (`id_proveedor` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Clinica`.`t_bitacora`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Clinica`.`t_bitacora` (
  `id_bitacora` INT NOT NULL AUTO_INCREMENT ,
  `fk_usuario` INT NOT NULL ,
  `bit_cusuario` VARCHAR(10) NULL ,
  `bit_cactividad` VARCHAR(45) NULL ,
  `bit_ffecha` DATE NULL ,
  `bit_hhora` TIME NULL ,
  PRIMARY KEY (`id_bitacora`) ,
  INDEX `fk_t_bitacora_t_usuario1_idx` (`fk_usuario` ASC) ,
  CONSTRAINT `fk_t_bitacora_t_usuario1`
    FOREIGN KEY (`fk_usuario` )
    REFERENCES `Clinica`.`t_usuario` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `Clinica` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
