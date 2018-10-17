-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2018 a las 05:30:54
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `iddetalleCompra` int(11) NOT NULL,
  `idcompra` int(11) NOT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `cantidad` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_bitacora`
--

CREATE TABLE `t_bitacora` (
  `id_bitacora` int(11) NOT NULL,
  `fk_usuario` int(11) NOT NULL,
  `bit_cusuario` varchar(10) DEFAULT NULL,
  `bit_cactividad` varchar(45) DEFAULT NULL,
  `bit_ffecha` date DEFAULT NULL,
  `bit_hhora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_compra`
--

CREATE TABLE `t_compra` (
  `id_compra` int(11) NOT NULL,
  `fk_proveedor` int(11) NOT NULL,
  `fk_insumo` int(11) NOT NULL,
  `fecha_caducidad` date DEFAULT NULL,
  `precio_unitario` double DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `paquete` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `fecha_compra` date DEFAULT NULL,
  `fact_compra` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_consulta`
--

CREATE TABLE `t_consulta` (
  `idconsulta` int(11) NOT NULL,
  `fk_expediente` int(11) NOT NULL,
  `fk_inventario` int(11) NOT NULL,
  `con_fecha_atiende` date DEFAULT NULL,
  `con_diagnostico` text,
  `con_ref_medica` text,
  `con_cons_medica` text,
  `con_receta` text,
  `con_fecha_amenorrea` date DEFAULT NULL,
  `con_ctipo_consulta` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_enfermeria`
--

CREATE TABLE `t_enfermeria` (
  `id_enfermeria` int(11) NOT NULL,
  `fk_consulta` int(11) NOT NULL,
  `enf_destatura` double DEFAULT NULL,
  `enf_dpeso` double DEFAULT NULL,
  `enf_dtempetarura` double DEFAULT NULL,
  `enf_cpresion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_enfermeria_fetal`
--

CREATE TABLE `t_enfermeria_fetal` (
  `id_enfermeria_fetal` int(11) NOT NULL,
  `fk_consulta` int(11) NOT NULL,
  `fet_dfcf` double DEFAULT NULL,
  `fet_cactividad_fetal` varchar(45) DEFAULT NULL,
  `fet_daltura_uterina` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_examenes`
--

CREATE TABLE `t_examenes` (
  `id_examenes` int(11) NOT NULL,
  `fk_consulta` int(11) NOT NULL,
  `exa_cclasificacion` varchar(45) DEFAULT NULL,
  `exa_ctipo` varchar(25) DEFAULT NULL,
  `exa_cresultado` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_expediente`
--

CREATE TABLE `t_expediente` (
  `id_expediente` int(11) NOT NULL,
  `fk_medico` int(11) NOT NULL,
  `fk_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_insumo`
--

CREATE TABLE `t_insumo` (
  `ins_codigo` int(11) NOT NULL,
  `ins_cnombre_comercial` varchar(30) DEFAULT NULL,
  `ins_cmarca` varchar(25) DEFAULT NULL,
  `ins_cdescripcion` text,
  `estado` int(11) DEFAULT NULL,
  `codigo` varchar(7) DEFAULT NULL,
  `presentacion` varchar(45) DEFAULT NULL,
  `unidad` int(11) DEFAULT NULL,
  `minimo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_insumo`
--

INSERT INTO `t_insumo` (`ins_codigo`, `ins_cnombre_comercial`, `ins_cmarca`, `ins_cdescripcion`, `estado`, `codigo`, `presentacion`, `unidad`, `minimo`) VALUES
(1, 'Baja Lengua', 'Cramberry', 'de 15 cm x 2 cm Madera', 1, 'BAJ613', 'Caja', 100, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_inventario`
--

CREATE TABLE `t_inventario` (
  `id_inventario` int(11) NOT NULL,
  `fk_insumo` int(11) NOT NULL,
  `inv_ecantidad_actual` int(11) DEFAULT NULL,
  `inv_ecantidad_saliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_medicamentos`
--

CREATE TABLE `t_medicamentos` (
  `id_medicamentos` int(11) NOT NULL,
  `fk_consulta` int(11) NOT NULL,
  `med_cnombre` varchar(25) DEFAULT NULL,
  `med_claboratorio` varchar(25) DEFAULT NULL,
  `med_cdosis` varchar(25) DEFAULT NULL,
  `med_cduracion` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_medico`
--

CREATE TABLE `t_medico` (
  `idMedico` int(11) NOT NULL,
  `t_usuario` int(11) NOT NULL,
  `med_cnombre` varchar(20) DEFAULT NULL,
  `med_capellidos` varchar(20) DEFAULT NULL,
  `med_cespecialidad` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_paciente`
--

CREATE TABLE `t_paciente` (
  `id_paciente` int(11) NOT NULL,
  `pac_cnombre` varchar(20) DEFAULT NULL,
  `pac_capellidos` varchar(20) DEFAULT NULL,
  `pac_cdui` varchar(10) DEFAULT NULL,
  `pac_ctelefono` varchar(9) DEFAULT NULL,
  `pac_ffecha_nac` date DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_prenatal`
--

CREATE TABLE `t_prenatal` (
  `idprenatal` int(11) NOT NULL,
  `fk_consulta` int(11) NOT NULL,
  `pre_cfactores_riesgo` text,
  `pre_cantecedentes_personales` text,
  `pre_cantecedentes_familiares` text,
  `pre_ccirugias_previas` text,
  `pre_cantecedentes_obstetricos` text,
  `pre_ffecha_parto` date DEFAULT NULL,
  `pre_ctipo_riesgo` text,
  `pre_iultra` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_proveedor`
--

CREATE TABLE `t_proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `pro_cnombre_empresa` varchar(30) DEFAULT NULL,
  `pro_cnombre_responsable` varchar(30) DEFAULT NULL,
  `pro_cdireccion` varchar(45) DEFAULT NULL,
  `pro_ctelefono` varchar(9) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `justificacion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_proveedor`
--

INSERT INTO `t_proveedor` (`id_proveedor`, `pro_cnombre_empresa`, `pro_cnombre_responsable`, `pro_cdireccion`, `pro_ctelefono`, `estado`, `justificacion`) VALUES
(1, 'Lab Lopez ', 'Blanca Lainez', 'San Vicente', '7943-3432', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_responsable`
--

CREATE TABLE `t_responsable` (
  `idresponsable` int(11) NOT NULL,
  `t_paciente` int(11) NOT NULL,
  `res_cnombre` varchar(20) DEFAULT NULL,
  `res_capellidos` varchar(20) DEFAULT NULL,
  `res_cdui` varchar(10) DEFAULT NULL,
  `res_ctelefono` varchar(9) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuario`
--

CREATE TABLE `t_usuario` (
  `id_usuario` int(11) NOT NULL,
  `usu_cnombre` varchar(20) DEFAULT NULL,
  `usu_capellido` varchar(20) DEFAULT NULL,
  `usu_ccorreo` varchar(45) DEFAULT NULL,
  `usu_cusuario` varchar(10) DEFAULT NULL,
  `usu_ccontrasena` varchar(10) DEFAULT NULL,
  `usu_ctipo_usuario` varchar(15) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_vacunacion`
--

CREATE TABLE `t_vacunacion` (
  `id_vacunacion` int(11) NOT NULL,
  `fk_consulta` int(11) NOT NULL,
  `vac_ctipo_vacuna` varchar(25) DEFAULT NULL,
  `vac_cnombre` varchar(25) DEFAULT NULL,
  `vac_cperiodo` varchar(25) DEFAULT NULL,
  `vac_cdosis` varchar(25) DEFAULT NULL,
  `vac_ccomentario` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`iddetalleCompra`),
  ADD KEY `fk_detalle_compra_t_compra1_idx` (`idcompra`);

--
-- Indices de la tabla `t_bitacora`
--
ALTER TABLE `t_bitacora`
  ADD PRIMARY KEY (`id_bitacora`),
  ADD KEY `fk_t_bitacora_t_usuario1_idx` (`fk_usuario`);

--
-- Indices de la tabla `t_compra`
--
ALTER TABLE `t_compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `fk_t_compra_t_insumo1_idx` (`fk_insumo`),
  ADD KEY `fk_t_compra_t_proveedor1_idx` (`fk_proveedor`);

--
-- Indices de la tabla `t_consulta`
--
ALTER TABLE `t_consulta`
  ADD PRIMARY KEY (`idconsulta`),
  ADD KEY `fk_t_consulta_t_expediente1_idx` (`fk_expediente`),
  ADD KEY `fk_t_consulta_t_inventario1_idx` (`fk_inventario`);

--
-- Indices de la tabla `t_enfermeria`
--
ALTER TABLE `t_enfermeria`
  ADD PRIMARY KEY (`id_enfermeria`),
  ADD KEY `fk_t_enfermeria_t_consulta1_idx` (`fk_consulta`);

--
-- Indices de la tabla `t_enfermeria_fetal`
--
ALTER TABLE `t_enfermeria_fetal`
  ADD PRIMARY KEY (`id_enfermeria_fetal`),
  ADD KEY `fk_t_enfermeria_fetal_t_consulta1_idx` (`fk_consulta`);

--
-- Indices de la tabla `t_examenes`
--
ALTER TABLE `t_examenes`
  ADD PRIMARY KEY (`id_examenes`),
  ADD KEY `fk_t_examenes_t_consulta1_idx` (`fk_consulta`);

--
-- Indices de la tabla `t_expediente`
--
ALTER TABLE `t_expediente`
  ADD PRIMARY KEY (`id_expediente`),
  ADD KEY `fk_t_expediente_t_medico1_idx` (`fk_medico`),
  ADD KEY `fk_t_expediente_t_paciente1_idx` (`fk_paciente`);

--
-- Indices de la tabla `t_insumo`
--
ALTER TABLE `t_insumo`
  ADD PRIMARY KEY (`ins_codigo`);

--
-- Indices de la tabla `t_inventario`
--
ALTER TABLE `t_inventario`
  ADD PRIMARY KEY (`id_inventario`),
  ADD KEY `fk_t_inventario_t_insumo1_idx` (`fk_insumo`);

--
-- Indices de la tabla `t_medicamentos`
--
ALTER TABLE `t_medicamentos`
  ADD PRIMARY KEY (`id_medicamentos`),
  ADD KEY `fk_t_medicamentos_t_consulta1_idx` (`fk_consulta`);

--
-- Indices de la tabla `t_medico`
--
ALTER TABLE `t_medico`
  ADD PRIMARY KEY (`idMedico`),
  ADD KEY `fk_t_medico_t_usuario1_idx` (`t_usuario`);

--
-- Indices de la tabla `t_paciente`
--
ALTER TABLE `t_paciente`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `t_prenatal`
--
ALTER TABLE `t_prenatal`
  ADD PRIMARY KEY (`idprenatal`),
  ADD KEY `fk_t_prenatal_t_consulta1_idx` (`fk_consulta`);

--
-- Indices de la tabla `t_proveedor`
--
ALTER TABLE `t_proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `t_responsable`
--
ALTER TABLE `t_responsable`
  ADD PRIMARY KEY (`idresponsable`),
  ADD KEY `fk_t_responsable_t_paciente1_idx` (`t_paciente`);

--
-- Indices de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `t_vacunacion`
--
ALTER TABLE `t_vacunacion`
  ADD PRIMARY KEY (`id_vacunacion`),
  ADD KEY `fk_t_vacunacion_t_consulta1_idx` (`fk_consulta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `iddetalleCompra` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `t_bitacora`
--
ALTER TABLE `t_bitacora`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `t_compra`
--
ALTER TABLE `t_compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `t_consulta`
--
ALTER TABLE `t_consulta`
  MODIFY `idconsulta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `t_enfermeria`
--
ALTER TABLE `t_enfermeria`
  MODIFY `id_enfermeria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `t_enfermeria_fetal`
--
ALTER TABLE `t_enfermeria_fetal`
  MODIFY `id_enfermeria_fetal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `t_examenes`
--
ALTER TABLE `t_examenes`
  MODIFY `id_examenes` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `t_expediente`
--
ALTER TABLE `t_expediente`
  MODIFY `id_expediente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `t_insumo`
--
ALTER TABLE `t_insumo`
  MODIFY `ins_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `t_inventario`
--
ALTER TABLE `t_inventario`
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `t_medicamentos`
--
ALTER TABLE `t_medicamentos`
  MODIFY `id_medicamentos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `t_medico`
--
ALTER TABLE `t_medico`
  MODIFY `idMedico` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `t_paciente`
--
ALTER TABLE `t_paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `t_prenatal`
--
ALTER TABLE `t_prenatal`
  MODIFY `idprenatal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `t_proveedor`
--
ALTER TABLE `t_proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `t_responsable`
--
ALTER TABLE `t_responsable`
  MODIFY `idresponsable` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `t_vacunacion`
--
ALTER TABLE `t_vacunacion`
  MODIFY `id_vacunacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `fk_detalle_compra_t_compra1` FOREIGN KEY (`idcompra`) REFERENCES `t_compra` (`id_compra`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_bitacora`
--
ALTER TABLE `t_bitacora`
  ADD CONSTRAINT `fk_t_bitacora_t_usuario1` FOREIGN KEY (`fk_usuario`) REFERENCES `t_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_compra`
--
ALTER TABLE `t_compra`
  ADD CONSTRAINT `fk_t_compra_t_insumo1` FOREIGN KEY (`fk_insumo`) REFERENCES `t_insumo` (`ins_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_t_compra_t_proveedor1` FOREIGN KEY (`fk_proveedor`) REFERENCES `t_proveedor` (`id_proveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_consulta`
--
ALTER TABLE `t_consulta`
  ADD CONSTRAINT `fk_t_consulta_t_expediente1` FOREIGN KEY (`fk_expediente`) REFERENCES `t_expediente` (`id_expediente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_t_consulta_t_inventario1` FOREIGN KEY (`fk_inventario`) REFERENCES `t_inventario` (`id_inventario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_enfermeria`
--
ALTER TABLE `t_enfermeria`
  ADD CONSTRAINT `fk_t_enfermeria_t_consulta1` FOREIGN KEY (`fk_consulta`) REFERENCES `t_consulta` (`idconsulta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_enfermeria_fetal`
--
ALTER TABLE `t_enfermeria_fetal`
  ADD CONSTRAINT `fk_t_enfermeria_fetal_t_consulta1` FOREIGN KEY (`fk_consulta`) REFERENCES `t_consulta` (`idconsulta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_examenes`
--
ALTER TABLE `t_examenes`
  ADD CONSTRAINT `fk_t_examenes_t_consulta1` FOREIGN KEY (`fk_consulta`) REFERENCES `t_consulta` (`idconsulta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_expediente`
--
ALTER TABLE `t_expediente`
  ADD CONSTRAINT `fk_t_expediente_t_medico1` FOREIGN KEY (`fk_medico`) REFERENCES `t_medico` (`idMedico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_t_expediente_t_paciente1` FOREIGN KEY (`fk_paciente`) REFERENCES `t_paciente` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_inventario`
--
ALTER TABLE `t_inventario`
  ADD CONSTRAINT `fk_t_inventario_t_insumo1` FOREIGN KEY (`fk_insumo`) REFERENCES `t_insumo` (`ins_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_medicamentos`
--
ALTER TABLE `t_medicamentos`
  ADD CONSTRAINT `fk_t_medicamentos_t_consulta1` FOREIGN KEY (`fk_consulta`) REFERENCES `t_consulta` (`idconsulta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_medico`
--
ALTER TABLE `t_medico`
  ADD CONSTRAINT `fk_t_medico_t_usuario1` FOREIGN KEY (`t_usuario`) REFERENCES `t_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_prenatal`
--
ALTER TABLE `t_prenatal`
  ADD CONSTRAINT `fk_t_prenatal_t_consulta1` FOREIGN KEY (`fk_consulta`) REFERENCES `t_consulta` (`idconsulta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_responsable`
--
ALTER TABLE `t_responsable`
  ADD CONSTRAINT `fk_t_responsable_t_paciente1` FOREIGN KEY (`t_paciente`) REFERENCES `t_paciente` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_vacunacion`
--
ALTER TABLE `t_vacunacion`
  ADD CONSTRAINT `fk_t_vacunacion_t_consulta1` FOREIGN KEY (`fk_consulta`) REFERENCES `t_consulta` (`idconsulta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
