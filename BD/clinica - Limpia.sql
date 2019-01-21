-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-01-2019 a las 05:25:22
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 5.6.39

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `idreceta` int(10) NOT NULL,
  `paciente` varchar(50) DEFAULT NULL,
  `receta` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(10) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_categoria_insumo`
--

CREATE TABLE `t_categoria_insumo` (
  `idcategoria` int(10) NOT NULL,
  `nombreCategoria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_consulta`
--

CREATE TABLE `t_consulta` (
  `idconsulta` int(11) NOT NULL,
  `fk_expediente` int(11) NOT NULL,
  `fk_enfermeria` int(11) NOT NULL,
  `con_fecha_atiende` date DEFAULT NULL,
  `con_diagnostico` text,
  `con_ref_medica` text,
  `con_cons_medica` text,
  `con_receta` text,
  `con_fecha_amenorrea` date DEFAULT NULL,
  `con_ctipo_consulta` varchar(45) DEFAULT NULL,
  `con_resul_examen` varchar(100) DEFAULT NULL,
  `enfermeria_fetal` int(10) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_examenes`
--

CREATE TABLE `t_examenes` (
  `id_examenes` int(11) NOT NULL,
  `fk_consulta` int(11) NOT NULL,
  `hematologia` varchar(400) DEFAULT NULL,
  `quimica` varchar(400) DEFAULT NULL,
  `endocrinologia` text,
  `inmunologia` varchar(400) DEFAULT NULL,
  `heces` varchar(400) DEFAULT NULL,
  `orina` varchar(400) DEFAULT NULL,
  `perfil_prenatal` varchar(400) DEFAULT NULL,
  `bacteriologia` varchar(400) DEFAULT NULL,
  `varios` varchar(400) DEFAULT NULL,
  `otros` varchar(400) DEFAULT NULL
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_familiar`
--

CREATE TABLE `t_familiar` (
  `idfamiliar` int(10) NOT NULL,
  `familiar` varchar(500) DEFAULT NULL,
  `condGrave` varchar(200) DEFAULT NULL,
  `fk_idprenatal` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `tipo` varchar(25) NOT NULL,
  `id_categoria` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_medico`
--

CREATE TABLE `t_medico` (
  `idMedico` int(11) NOT NULL,
  `med_cnombre` varchar(20) DEFAULT NULL,
  `med_capellidos` varchar(20) DEFAULT NULL,
  `med_cespecialidad` varchar(45) DEFAULT NULL,
  `fk_usuario` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_obstetricos`
--

CREATE TABLE `t_obstetricos` (
  `idobstetricos` int(10) NOT NULL,
  `abortos` varchar(5) DEFAULT NULL,
  `embarazoEtopico` varchar(5) DEFAULT NULL,
  `partos` varchar(5) DEFAULT NULL,
  `vaginales` varchar(5) DEFAULT NULL,
  `cesareas` varchar(5) DEFAULT NULL,
  `vivo` varchar(5) DEFAULT NULL,
  `muerto` varchar(5) DEFAULT NULL,
  `planeado` varchar(5) DEFAULT NULL,
  `anticonceptivos` varchar(100) DEFAULT NULL,
  `fechaEmbarazoAnterior` date DEFAULT NULL,
  `fk_idprenatal` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_personales`
--

CREATE TABLE `t_personales` (
  `idpersonal` int(10) NOT NULL,
  `personal` varchar(500) DEFAULT NULL,
  `condGrave` varchar(200) DEFAULT NULL,
  `fk_idprenatal` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_prenatal`
--

CREATE TABLE `t_prenatal` (
  `idprenatal` int(11) NOT NULL,
  `fk_consulta` int(11) NOT NULL,
  `pre_ccirugias_previas` text,
  `pre_ffecha_parto` varchar(15) DEFAULT NULL,
  `pre_ctipo_riesgo` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `last_session` datetime DEFAULT NULL,
  `activacion` int(11) DEFAULT NULL,
  `token` varchar(45) DEFAULT NULL,
  `token_password` varchar(100) DEFAULT NULL,
  `password_request` int(11) DEFAULT NULL,
  `id_tipo` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`idreceta`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_bitacora`
--
ALTER TABLE `t_bitacora`
  ADD PRIMARY KEY (`id_bitacora`),
  ADD KEY `fk_t_bitacora_t_usuario1_idx` (`fk_usuario`);

--
-- Indices de la tabla `t_categoria_insumo`
--
ALTER TABLE `t_categoria_insumo`
  ADD PRIMARY KEY (`idcategoria`);

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
  ADD KEY `enfermeria_fetal` (`enfermeria_fetal`);

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
-- Indices de la tabla `t_familiar`
--
ALTER TABLE `t_familiar`
  ADD PRIMARY KEY (`idfamiliar`),
  ADD KEY `fk_idprenatal` (`fk_idprenatal`);

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
-- Indices de la tabla `t_medico`
--
ALTER TABLE `t_medico`
  ADD PRIMARY KEY (`idMedico`),
  ADD KEY `t_usuario` (`fk_usuario`);

--
-- Indices de la tabla `t_obstetricos`
--
ALTER TABLE `t_obstetricos`
  ADD PRIMARY KEY (`idobstetricos`),
  ADD KEY `fk_idprenata` (`fk_idprenatal`);

--
-- Indices de la tabla `t_paciente`
--
ALTER TABLE `t_paciente`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `t_personales`
--
ALTER TABLE `t_personales`
  ADD PRIMARY KEY (`idpersonal`),
  ADD KEY `fk_prenatal` (`fk_idprenatal`);

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
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtipo` (`id_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inventario_unidades`
--
ALTER TABLE `inventario_unidades`
  MODIFY `idInventario_Unidades` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `receta`
--
ALTER TABLE `receta`
  MODIFY `idreceta` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_bitacora`
--
ALTER TABLE `t_bitacora`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_categoria_insumo`
--
ALTER TABLE `t_categoria_insumo`
  MODIFY `idcategoria` int(10) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de la tabla `t_devolucion`
--
ALTER TABLE `t_devolucion`
  MODIFY `id_devolucion` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de la tabla `t_familiar`
--
ALTER TABLE `t_familiar`
  MODIFY `idfamiliar` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_insumo`
--
ALTER TABLE `t_insumo`
  MODIFY `ins_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_inventario`
--
ALTER TABLE `t_inventario`
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_llegada`
--
ALTER TABLE `t_llegada`
  MODIFY `id_llegada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_medico`
--
ALTER TABLE `t_medico`
  MODIFY `idMedico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_obstetricos`
--
ALTER TABLE `t_obstetricos`
  MODIFY `idobstetricos` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_paciente`
--
ALTER TABLE `t_paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_personales`
--
ALTER TABLE `t_personales`
  MODIFY `idpersonal` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_prenatal`
--
ALTER TABLE `t_prenatal`
  MODIFY `idprenatal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_proveedor`
--
ALTER TABLE `t_proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_responsable`
--
ALTER TABLE `t_responsable`
  MODIFY `idresponsable` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `fk_t_bitacora_t_usuario1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `enfermeria_fetal` FOREIGN KEY (`enfermeria_fetal`) REFERENCES `t_enfermeria_fetal` (`id_enfermeria_fetal`),
  ADD CONSTRAINT `fk_t_consulta_t_enfermeria1` FOREIGN KEY (`fk_enfermeria`) REFERENCES `t_enfermeria` (`id_enfermeria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
-- Filtros para la tabla `t_familiar`
--
ALTER TABLE `t_familiar`
  ADD CONSTRAINT `fk_idprenatal` FOREIGN KEY (`fk_idprenatal`) REFERENCES `t_prenatal` (`idprenatal`);

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
-- Filtros para la tabla `t_medico`
--
ALTER TABLE `t_medico`
  ADD CONSTRAINT `t_usuario` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `t_obstetricos`
--
ALTER TABLE `t_obstetricos`
  ADD CONSTRAINT `fk_idprenata` FOREIGN KEY (`fk_idprenatal`) REFERENCES `t_prenatal` (`idprenatal`);

--
-- Filtros para la tabla `t_personales`
--
ALTER TABLE `t_personales`
  ADD CONSTRAINT `fk_prenatal` FOREIGN KEY (`fk_idprenatal`) REFERENCES `t_prenatal` (`idprenatal`);

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
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `idtipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
