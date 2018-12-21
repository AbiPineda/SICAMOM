SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS clinica;

USE clinica;

DROP TABLE IF EXISTS inventario_unidades;

CREATE TABLE `inventario_unidades` (
  `idInventario_Unidades` int(11) NOT NULL AUTO_INCREMENT,
  `fk_compra` int(11) NOT NULL,
  `decremento` int(11) DEFAULT NULL,
  PRIMARY KEY (`idInventario_Unidades`),
  KEY `fk_inventario_unidades_t_compra1_idx` (`fk_compra`),
  CONSTRAINT `fk_inventario_unidades_t_compra1` FOREIGN KEY (`fk_compra`) REFERENCES `t_compra` (`id_compra`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS t_bitacora;

CREATE TABLE `t_bitacora` (
  `id_bitacora` int(11) NOT NULL AUTO_INCREMENT,
  `fk_usuario` int(11) NOT NULL,
  `bit_cusuario` varchar(10) DEFAULT NULL,
  `bit_cactividad` varchar(45) DEFAULT NULL,
  `bit_ffecha` date DEFAULT NULL,
  `bit_hhora` time DEFAULT NULL,
  PRIMARY KEY (`id_bitacora`),
  KEY `fk_t_bitacora_t_usuario1_idx` (`fk_usuario`),
  CONSTRAINT `fk_t_bitacora_t_usuario1` FOREIGN KEY (`fk_usuario`) REFERENCES `t_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS t_compra;

CREATE TABLE `t_compra` (
  `id_compra` int(11) NOT NULL AUTO_INCREMENT,
  `fk_proveedor` int(11) NOT NULL,
  `fk_insumo` int(11) NOT NULL,
  `fecha_caducidad` date DEFAULT NULL,
  `precio_unitario` double DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `fecha_actual` date DEFAULT NULL,
  `factura` varchar(10) DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `estado` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_compra`),
  KEY `fk_t_compra_t_insumo1_idx` (`fk_insumo`),
  KEY `fk_t_compra_t_proveedor1_idx` (`fk_proveedor`),
  CONSTRAINT `fk_t_compra_t_insumo1` FOREIGN KEY (`fk_insumo`) REFERENCES `t_insumo` (`ins_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_t_compra_t_proveedor1` FOREIGN KEY (`fk_proveedor`) REFERENCES `t_proveedor` (`id_proveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS t_consulta;

CREATE TABLE `t_consulta` (
  `idconsulta` int(11) NOT NULL AUTO_INCREMENT,
  `fk_expediente` int(11) NOT NULL,
  `fk_enfermeria` int(11) NOT NULL,
  `fk_InventarioUnidades` int(11) NOT NULL,
  `con_fecha_atiende` date DEFAULT NULL,
  `con_diagnostico` text,
  `con_ref_medica` text,
  `con_cons_medica` text,
  `con_receta` text,
  `con_fecha_amenorrea` date DEFAULT NULL,
  `con_ctipo_consulta` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idconsulta`),
  KEY `fk_t_consulta_t_expediente1_idx` (`fk_expediente`),
  KEY `fk_t_consulta_Inventario_Unidades1_idx` (`fk_InventarioUnidades`),
  KEY `fk_t_consulta_t_enfermeria1_idx` (`fk_enfermeria`),
  CONSTRAINT `fk_t_consulta_Inventario_Unidades1` FOREIGN KEY (`fk_InventarioUnidades`) REFERENCES `inventario_unidades` (`idInventario_Unidades`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_t_consulta_t_enfermeria1` FOREIGN KEY (`fk_enfermeria`) REFERENCES `t_enfermeria` (`id_enfermeria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_t_consulta_t_expediente1` FOREIGN KEY (`fk_expediente`) REFERENCES `t_expediente` (`id_expediente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS t_devolucion;

CREATE TABLE `t_devolucion` (
  `id_devolucion` int(11) NOT NULL AUTO_INCREMENT,
  `fk_compra` int(11) NOT NULL,
  PRIMARY KEY (`id_devolucion`),
  KEY `fk_t_devolucion_t_compra1_idx` (`fk_compra`),
  CONSTRAINT `fk_t_devolucion_t_compra1` FOREIGN KEY (`fk_compra`) REFERENCES `t_compra` (`id_compra`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS t_enfermeria;

CREATE TABLE `t_enfermeria` (
  `id_enfermeria` int(11) NOT NULL AUTO_INCREMENT,
  `enf_destatura` double DEFAULT NULL,
  `enf_dpeso` double DEFAULT NULL,
  `enf_dtempetarura` double DEFAULT NULL,
  `enf_cpresion` varchar(20) DEFAULT NULL,
  `enf_cpulso` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_enfermeria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS t_enfermeria_fetal;

CREATE TABLE `t_enfermeria_fetal` (
  `id_enfermeria_fetal` int(11) NOT NULL AUTO_INCREMENT,
  `fk_consulta` int(11) NOT NULL,
  `fet_dfcf` double DEFAULT NULL,
  `fet_cactividad_fetal` varchar(45) DEFAULT NULL,
  `fet_daltura_uterina` double DEFAULT NULL,
  PRIMARY KEY (`id_enfermeria_fetal`),
  KEY `fk_t_enfermeria_fetal_t_consulta1_idx` (`fk_consulta`),
  CONSTRAINT `fk_t_enfermeria_fetal_t_consulta1` FOREIGN KEY (`fk_consulta`) REFERENCES `t_consulta` (`idconsulta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS t_examenes;

CREATE TABLE `t_examenes` (
  `id_examenes` int(11) NOT NULL AUTO_INCREMENT,
  `fk_consulta` int(11) NOT NULL,
  `exa_cclasificacion` varchar(45) DEFAULT NULL,
  `exa_ctipo` varchar(25) DEFAULT NULL,
  `exa_cresultado` text,
  PRIMARY KEY (`id_examenes`),
  KEY `fk_t_examenes_t_consulta1_idx` (`fk_consulta`),
  CONSTRAINT `fk_t_examenes_t_consulta1` FOREIGN KEY (`fk_consulta`) REFERENCES `t_consulta` (`idconsulta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS t_expediente;

CREATE TABLE `t_expediente` (
  `id_expediente` int(11) NOT NULL AUTO_INCREMENT,
  `fk_medico` int(11) NOT NULL,
  `fk_paciente` int(11) NOT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `alergias` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_expediente`),
  KEY `fk_t_expediente_t_medico1_idx` (`fk_medico`),
  KEY `fk_t_expediente_t_paciente1_idx` (`fk_paciente`),
  CONSTRAINT `fk_t_expediente_t_medico1` FOREIGN KEY (`fk_medico`) REFERENCES `t_medico` (`idMedico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_t_expediente_t_paciente1` FOREIGN KEY (`fk_paciente`) REFERENCES `t_paciente` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS t_insumo;

CREATE TABLE `t_insumo` (
  `ins_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `ins_cnombre_comercial` varchar(30) DEFAULT NULL,
  `ins_cmarca` varchar(25) DEFAULT NULL,
  `ins_cdescripcion` text,
  `estado` int(11) DEFAULT NULL,
  `codigo` varchar(7) DEFAULT NULL,
  `presentacion` varchar(25) DEFAULT NULL,
  `unidad` int(11) DEFAULT NULL,
  `minimo` int(11) DEFAULT NULL,
  PRIMARY KEY (`ins_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS t_inventario;

CREATE TABLE `t_inventario` (
  `id_inventario` int(11) NOT NULL AUTO_INCREMENT,
  `inv_ecantidad_actual` int(11) DEFAULT NULL,
  `inv_ecantidad_saliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_inventario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS t_llegada;

CREATE TABLE `t_llegada` (
  `id_llegada` int(11) NOT NULL AUTO_INCREMENT,
  `fk_expediente` int(11) NOT NULL,
  `lleg_ffecha_atiende` date DEFAULT NULL,
  `estado` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_llegada`),
  KEY `fk_t_llegada_t_expediente` (`fk_expediente`),
  CONSTRAINT `fk_t_llegada_t_expediente` FOREIGN KEY (`fk_expediente`) REFERENCES `t_expediente` (`id_expediente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS t_medicamentos;

CREATE TABLE `t_medicamentos` (
  `id_medicamentos` int(11) NOT NULL AUTO_INCREMENT,
  `fk_consulta` int(11) NOT NULL,
  `med_cnombre` varchar(25) DEFAULT NULL,
  `med_claboratorio` varchar(25) DEFAULT NULL,
  `med_cdosis` varchar(25) DEFAULT NULL,
  `med_cduracion` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_medicamentos`),
  KEY `fk_t_medicamentos_t_consulta1_idx` (`fk_consulta`),
  CONSTRAINT `fk_t_medicamentos_t_consulta1` FOREIGN KEY (`fk_consulta`) REFERENCES `t_consulta` (`idconsulta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS t_medico;

CREATE TABLE `t_medico` (
  `idMedico` int(11) NOT NULL AUTO_INCREMENT,
  `t_usuario` int(11) NOT NULL,
  `med_cnombre` varchar(20) DEFAULT NULL,
  `med_capellidos` varchar(20) DEFAULT NULL,
  `med_cespecialidad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idMedico`),
  KEY `fk_t_medico_t_usuario1_idx` (`t_usuario`),
  CONSTRAINT `fk_t_medico_t_usuario1` FOREIGN KEY (`t_usuario`) REFERENCES `t_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS t_paciente;

CREATE TABLE `t_paciente` (
  `id_paciente` int(11) NOT NULL AUTO_INCREMENT,
  `pac_cnombre` varchar(20) DEFAULT NULL,
  `pac_capellidos` varchar(20) DEFAULT NULL,
  `pac_cdui` varchar(10) DEFAULT NULL,
  `pac_ctelefono` varchar(9) DEFAULT NULL,
  `pac_ffecha_nac` date DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO t_paciente VALUES("1","Erick","Ticas","05294607-4","2362-5484","0000-00-00","1");



DROP TABLE IF EXISTS t_prenatal;

CREATE TABLE `t_prenatal` (
  `idprenatal` int(11) NOT NULL AUTO_INCREMENT,
  `fk_consulta` int(11) NOT NULL,
  `pre_cfactores_riesgo` text,
  `pre_cantecedentes_personales` text,
  `pre_cantecedentes_familiares` text,
  `pre_ccirugias_previas` text,
  `pre_cantecedentes_obstetricos` text,
  `pre_ffecha_parto` date DEFAULT NULL,
  `pre_ctipo_riesgo` text,
  `pre_iultra` blob,
  PRIMARY KEY (`idprenatal`),
  KEY `fk_t_prenatal_t_consulta1_idx` (`fk_consulta`),
  CONSTRAINT `fk_t_prenatal_t_consulta1` FOREIGN KEY (`fk_consulta`) REFERENCES `t_consulta` (`idconsulta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS t_proveedor;

CREATE TABLE `t_proveedor` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `pro_cnombre_empresa` varchar(30) DEFAULT NULL,
  `pro_cnombre_responsable` varchar(30) DEFAULT NULL,
  `pro_cdireccion` varchar(45) DEFAULT NULL,
  `pro_ctelefono` varchar(9) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `justificacion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS t_responsable;

CREATE TABLE `t_responsable` (
  `idresponsable` int(11) NOT NULL AUTO_INCREMENT,
  `t_paciente` int(11) NOT NULL,
  `res_cnombre` varchar(20) DEFAULT NULL,
  `res_capellidos` varchar(20) DEFAULT NULL,
  `res_cdui` varchar(10) DEFAULT NULL,
  `res_ctelefono` varchar(9) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idresponsable`),
  KEY `fk_t_responsable_t_paciente1_idx` (`t_paciente`),
  CONSTRAINT `fk_t_responsable_t_paciente1` FOREIGN KEY (`t_paciente`) REFERENCES `t_paciente` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS t_usuario;

CREATE TABLE `t_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usu_cnombre` varchar(20) DEFAULT NULL,
  `usu_capellido` varchar(20) DEFAULT NULL,
  `usu_ccorreo` varchar(45) DEFAULT NULL,
  `usu_cusuario` varchar(10) DEFAULT NULL,
  `usu_ccontrasena` varchar(10) DEFAULT NULL,
  `usu_ctipo_usuario` varchar(15) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS t_vacunacion;

CREATE TABLE `t_vacunacion` (
  `id_vacunacion` int(11) NOT NULL AUTO_INCREMENT,
  `fk_consulta` int(11) NOT NULL,
  `vac_ctipo_vacuna` varchar(25) DEFAULT NULL,
  `vac_cnombre` varchar(25) DEFAULT NULL,
  `vac_cperiodo` varchar(25) DEFAULT NULL,
  `vac_cdosis` varchar(25) DEFAULT NULL,
  `vac_ccomentario` text,
  PRIMARY KEY (`id_vacunacion`),
  KEY `fk_t_vacunacion_t_consulta1_idx` (`fk_consulta`),
  CONSTRAINT `fk_t_vacunacion_t_consulta1` FOREIGN KEY (`fk_consulta`) REFERENCES `t_consulta` (`idconsulta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




SET FOREIGN_KEY_CHECKS=1;