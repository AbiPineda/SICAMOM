-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-12-2018 a las 08:44:30
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Estructura de tabla para la tabla `inventario_unidades`
--

CREATE TABLE `inventario_unidades` (
  `idInventario_Unidades` int(11) NOT NULL,
  `fk_inventarioGeneral` int(11) NOT NULL,
  `decremento` int(11) DEFAULT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventario_unidades`
--

INSERT INTO `inventario_unidades` (`idInventario_Unidades`, `fk_inventarioGeneral`, `decremento`, `tipo`) VALUES
(6, 4, 232, 'Algodon'),
(8, 7, 48, 'Jeringa');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_bitacora`
--

INSERT INTO `t_bitacora` (`id_bitacora`, `fk_usuario`, `bit_cusuario`, `bit_cactividad`, `bit_ffecha`, `bit_hhora`) VALUES
(1, 1, 'Bo0102', 'Registro de Paciente', '2018-12-30', '01:40:47');

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
  `total` double DEFAULT NULL,
  `fecha_actual` date DEFAULT NULL,
  `factura` varchar(10) DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `estado` varchar(25) DEFAULT NULL,
  `reduccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_compra`
--

INSERT INTO `t_compra` (`id_compra`, `fk_proveedor`, `fk_insumo`, `fecha_caducidad`, `precio_unitario`, `cantidad`, `total`, `fecha_actual`, `factura`, `subtotal`, `codigo`, `estado`, `reduccion`) VALUES
(2, 1, 2, '2018-11-30', 7.45, 3, NULL, '2018-11-11', '1 ', 22.35, NULL, 'Finalizado', 0),
(3, 1, 3, '2018-11-30', 10, 2, NULL, '2018-11-11', '2 ', 20, NULL, 'Finalizado', 0),
(9, 1, 1, '2018-11-15', 20, 10, NULL, '2018-11-15', '912', 200, NULL, 'Finalizado', 6),
(10, 1, 1, '2018-11-15', 20, 30, NULL, '2018-11-15', '913', 600, NULL, 'Finalizado', 26),
(12, 1, 1, '2018-12-01', 23.2, 2, NULL, '2018-11-14', '1234', 46.4, NULL, 'Finalizado', 2),
(13, 1, 3, '2018-12-01', 12, 3, NULL, '2018-11-14', '1234 ', 36, NULL, 'Finalizado', 2),
(14, 1, 2, '2018-12-01', 11, 1, NULL, '2018-11-14', '1234 ', 11, NULL, 'Finalizado', 0),
(15, 1, 4, '2018-12-02', 12, 3, NULL, '2018-11-15', '1111', 36, NULL, 'Finalizado', 1),
(16, 1, 5, '2018-12-02', 15.34, 2, NULL, '2018-11-15', '1111 ', 30.68, NULL, 'Finalizado', 2),
(17, 1, 4, '2018-12-02', 5.43, 10, NULL, '2018-11-15', '2222', 54.3, NULL, 'Finalizado', 0),
(18, 1, 5, '2019-01-06', 5.49, 30, NULL, '2018-11-15', '2222 ', 164.7, NULL, 'Finalizado', 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_consulta`
--

CREATE TABLE `t_consulta` (
  `idconsulta` int(11) NOT NULL,
  `fk_expediente` int(11) NOT NULL,
  `fk_enfermeria` int(11) NOT NULL,
  `fk_enfermeria_fetal` int(11) NOT NULL,
  `con_fecha_atiende` date DEFAULT NULL,
  `con_diagnostico` text,
  `con_ref_medica` text,
  `con_cons_medica` text,
  `con_receta` text,
  `con_fecha_amenorrea` date DEFAULT NULL,
  `con_ctipo_consulta` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_consulta`
--

INSERT INTO `t_consulta` (`idconsulta`, `fk_expediente`, `fk_enfermeria`, `fk_enfermeria_fetal`, `con_fecha_atiende`, `con_diagnostico`, `con_ref_medica`, `con_cons_medica`, `con_receta`, `con_fecha_amenorrea`, `con_ctipo_consulta`) VALUES
(13, 1, 11, 1, '2018-12-29', 'Muchas Nauseas', NULL, NULL, NULL, '2018-09-17', 'Control Prenatal'),
(14, 1, 12, 2, '2018-12-30', 'Nauseas', NULL, NULL, NULL, '2018-11-12', 'Control Prenatal'),
(15, 2, 13, 3, '2018-12-30', 'ARDOR AL ORINAR', NULL, NULL, NULL, '2018-08-21', 'Control Prenatal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_devolucion`
--

CREATE TABLE `t_devolucion` (
  `id_devolucion` int(11) NOT NULL,
  `fk_compra` int(11) NOT NULL,
  `devolver` int(11) NOT NULL,
  `razon` varchar(100) NOT NULL,
  `tipoDevolucion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_devolucion`
--

INSERT INTO `t_devolucion` (`id_devolucion`, `fk_compra`, `devolver`, `razon`, `tipoDevolucion`) VALUES
(1, 2, 4, 'DaÃ±ado', ''),
(2, 3, 3, 'DaÃ±ado', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_enfermeria`
--

CREATE TABLE `t_enfermeria` (
  `id_enfermeria` int(11) NOT NULL,
  `enf_destatura` double DEFAULT NULL,
  `enf_dpeso` double DEFAULT NULL,
  `enf_dtempetarura` double DEFAULT NULL,
  `enf_cpresion` varchar(20) DEFAULT NULL,
  `enf_cpulso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_enfermeria`
--

INSERT INTO `t_enfermeria` (`id_enfermeria`, `enf_destatura`, `enf_dpeso`, `enf_dtempetarura`, `enf_cpresion`, `enf_cpulso`) VALUES
(11, 159, 130, 37, '120/80', 90),
(12, 160, 135, 37, '140/90', 90),
(13, 165, 145, 38, '150/95', 96);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_enfermeria_fetal`
--

CREATE TABLE `t_enfermeria_fetal` (
  `id_enfermeria_fetal` int(11) NOT NULL,
  `fet_dfcf` double DEFAULT NULL,
  `fet_cactividad_fetal` varchar(45) DEFAULT NULL,
  `fet_daltura_uterina` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_enfermeria_fetal`
--

INSERT INTO `t_enfermeria_fetal` (`id_enfermeria_fetal`, `fet_dfcf`, `fet_cactividad_fetal`, `fet_daltura_uterina`) VALUES
(1, 75, '50', 10),
(2, 70, '5', 10),
(3, 80, '60', 10);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_expediente`
--

CREATE TABLE `t_expediente` (
  `id_expediente` int(11) NOT NULL,
  `fk_medico` int(11) NOT NULL,
  `fk_paciente` int(11) NOT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `alergias` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_expediente`
--

INSERT INTO `t_expediente` (`id_expediente`, `fk_medico`, `fk_paciente`, `codigo`, `fecha_registro`, `alergias`) VALUES
(1, 1, 1, 'LOPE728', '2018-11-15', 'ninguna'),
(2, 1, 2, 'BONI846', '2018-12-30', 'Acetaminofen');

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
  `presentacion` varchar(25) DEFAULT NULL,
  `unidad` int(11) DEFAULT NULL,
  `minimo` int(11) DEFAULT NULL,
  `tipo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_insumo`
--

INSERT INTO `t_insumo` (`ins_codigo`, `ins_cnombre_comercial`, `ins_cmarca`, `ins_cdescripcion`, `estado`, `codigo`, `presentacion`, `unidad`, `minimo`, `tipo`) VALUES
(1, 'Algodon', 'Fam', 'bolitas de algodon', 1, 'ALG276', 'Bolsa', 100, 1, 'Contable'),
(2, 'Algodon', 'Akax', 'bolitas de algodon', 1, 'ALG614', 'Bolsa', 50, 2, 'Contable'),
(3, 'Gel', 'Cap', 'para ultrasonido de 500 ml', 1, 'GEL285', 'Bote', 1, 2, 'NoContable'),
(4, 'Jeringa', 'MediCad', 'de 10 ml', 1, 'JER702', 'Caja', 5, 1, 'Contable'),
(5, 'Jeringa', 'Glomed', 'de 5 ml', 1, 'JER163', 'Caja', 50, 1, 'Contable'),
(6, 'Baja Lengua', 'MedCare', 'de madera 10 cm', 1, 'BAJ899', 'Caja', 100, 1, 'Contable');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_inventario`
--

CREATE TABLE `t_inventario` (
  `id_inventario` int(11) NOT NULL,
  `fk_compra` int(11) NOT NULL,
  `inv_ecantidad_actual` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `insumo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_inventario`
--

INSERT INTO `t_inventario` (`id_inventario`, `fk_compra`, `inv_ecantidad_actual`, `stock`, `insumo`) VALUES
(4, 9, 34, NULL, 1),
(5, 13, -1, NULL, 3),
(6, 14, -4, NULL, 2),
(7, 15, 11, NULL, 4),
(8, 16, 31, NULL, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_llegada`
--

CREATE TABLE `t_llegada` (
  `id_llegada` int(11) NOT NULL,
  `fk_expediente` int(11) NOT NULL,
  `lleg_ffecha_atiende` date DEFAULT NULL,
  `estado` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_llegada`
--

INSERT INTO `t_llegada` (`id_llegada`, `fk_expediente`, `lleg_ffecha_atiende`, `estado`) VALUES
(1, 1, '2018-11-15', '2'),
(2, 1, '2018-12-29', '2'),
(3, 1, '2018-12-30', '2'),
(4, 2, '2018-12-30', '2');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_medico`
--

INSERT INTO `t_medico` (`idMedico`, `t_usuario`, `med_cnombre`, `med_capellidos`, `med_cespecialidad`) VALUES
(1, 1, 'Boris Ricardo', 'Miranda', 'General');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_paciente`
--

INSERT INTO `t_paciente` (`id_paciente`, `pac_cnombre`, `pac_capellidos`, `pac_cdui`, `pac_ctelefono`, `pac_ffecha_nac`, `estado`) VALUES
(1, 'Juana Maria', 'Lopez', '12121212-1', '2232-3232', '1993-10-05', 1),
(2, 'Maria', 'Bonilla', '24297868-7', '9809-8988', '1995-05-23', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_prenatal`
--

INSERT INTO `t_prenatal` (`idprenatal`, `fk_consulta`, `pre_cfactores_riesgo`, `pre_cantecedentes_personales`, `pre_cantecedentes_familiares`, `pre_ccirugias_previas`, `pre_cantecedentes_obstetricos`, `pre_ffecha_parto`, `pre_ctipo_riesgo`, `pre_iultra`) VALUES
(2, 15, NULL, 'Azucar en la Sangre', 'Azucar en la Sangre', 'si', 'Cirugias', '2018-12-20', 'Control Prenatal', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_proveedor`
--

INSERT INTO `t_proveedor` (`id_proveedor`, `pro_cnombre_empresa`, `pro_cnombre_responsable`, `pro_cdireccion`, `pro_ctelefono`, `estado`, `justificacion`) VALUES
(1, 'Laboratorios lopez', 'Francisco  ', 'San Vicente', '7654-0956', 1, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_usuario`
--

INSERT INTO `t_usuario` (`id_usuario`, `usu_cnombre`, `usu_capellido`, `usu_ccorreo`, `usu_cusuario`, `usu_ccontrasena`, `usu_ctipo_usuario`, `estado`) VALUES
(1, 'Boris Ricardo', 'Miranda', 'boris@gmail.com', 'Bo0102', '123456', 'Administrador', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inventario_unidades`
--
ALTER TABLE `inventario_unidades`
  ADD PRIMARY KEY (`idInventario_Unidades`),
  ADD KEY `fk_Inventario_Unidades_t_inventario1_idx` (`fk_inventarioGeneral`);

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
  ADD KEY `fk_t_consulta_t_enfermeria1_idx` (`fk_enfermeria`),
  ADD KEY `fk_t_consulta_t_enfermeria_fetal1_idx` (`fk_enfermeria_fetal`) USING BTREE;

--
-- Indices de la tabla `t_devolucion`
--
ALTER TABLE `t_devolucion`
  ADD PRIMARY KEY (`id_devolucion`),
  ADD KEY `fk_t_devolucion_t_compra1_idx` (`fk_compra`);

--
-- Indices de la tabla `t_enfermeria`
--
ALTER TABLE `t_enfermeria`
  ADD PRIMARY KEY (`id_enfermeria`);

--
-- Indices de la tabla `t_enfermeria_fetal`
--
ALTER TABLE `t_enfermeria_fetal`
  ADD PRIMARY KEY (`id_enfermeria_fetal`);

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
  ADD KEY `fk_t_inventario_t_compra1_idx` (`fk_compra`),
  ADD KEY `insumo` (`insumo`);

--
-- Indices de la tabla `t_llegada`
--
ALTER TABLE `t_llegada`
  ADD PRIMARY KEY (`id_llegada`),
  ADD KEY `fk_t_llegada_t_expediente` (`fk_expediente`);

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
-- AUTO_INCREMENT de la tabla `inventario_unidades`
--
ALTER TABLE `inventario_unidades`
  MODIFY `idInventario_Unidades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `t_bitacora`
--
ALTER TABLE `t_bitacora`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `t_compra`
--
ALTER TABLE `t_compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `t_consulta`
--
ALTER TABLE `t_consulta`
  MODIFY `idconsulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `t_devolucion`
--
ALTER TABLE `t_devolucion`
  MODIFY `id_devolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_enfermeria`
--
ALTER TABLE `t_enfermeria`
  MODIFY `id_enfermeria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `t_enfermeria_fetal`
--
ALTER TABLE `t_enfermeria_fetal`
  MODIFY `id_enfermeria_fetal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t_examenes`
--
ALTER TABLE `t_examenes`
  MODIFY `id_examenes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_expediente`
--
ALTER TABLE `t_expediente`
  MODIFY `id_expediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_insumo`
--
ALTER TABLE `t_insumo`
  MODIFY `ins_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `t_inventario`
--
ALTER TABLE `t_inventario`
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `t_llegada`
--
ALTER TABLE `t_llegada`
  MODIFY `id_llegada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `t_medicamentos`
--
ALTER TABLE `t_medicamentos`
  MODIFY `id_medicamentos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_medico`
--
ALTER TABLE `t_medico`
  MODIFY `idMedico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `t_paciente`
--
ALTER TABLE `t_paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_prenatal`
--
ALTER TABLE `t_prenatal`
  MODIFY `idprenatal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `t_vacunacion`
--
ALTER TABLE `t_vacunacion`
  MODIFY `id_vacunacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inventario_unidades`
--
ALTER TABLE `inventario_unidades`
  ADD CONSTRAINT `fk_Inventario_Unidades_t_inventario1` FOREIGN KEY (`fk_inventarioGeneral`) REFERENCES `t_inventario` (`id_inventario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_t_consulta_t_enfermeria1` FOREIGN KEY (`fk_enfermeria`) REFERENCES `t_enfermeria` (`id_enfermeria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_t_consulta_t_enfermeria_fetal1` FOREIGN KEY (`fk_enfermeria_fetal`) REFERENCES `t_enfermeria_fetal` (`id_enfermeria_fetal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_t_consulta_t_expediente1` FOREIGN KEY (`fk_expediente`) REFERENCES `t_expediente` (`id_expediente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_devolucion`
--
ALTER TABLE `t_devolucion`
  ADD CONSTRAINT `fk_t_devolucion_t_compra1` FOREIGN KEY (`fk_compra`) REFERENCES `t_compra` (`id_compra`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_t_inventario_t_compra1` FOREIGN KEY (`fk_compra`) REFERENCES `t_compra` (`id_compra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `insumo` FOREIGN KEY (`insumo`) REFERENCES `t_insumo` (`ins_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_llegada`
--
ALTER TABLE `t_llegada`
  ADD CONSTRAINT `fk_t_llegada_t_expediente` FOREIGN KEY (`fk_expediente`) REFERENCES `t_expediente` (`id_expediente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
