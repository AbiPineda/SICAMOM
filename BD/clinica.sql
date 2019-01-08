-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-01-2019 a las 03:29:27
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
  `tipo` varchar(15) NOT NULL,
  `categoria` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventario_unidades`
--

INSERT INTO `inventario_unidades` (`idInventario_Unidades`, `fk_inventarioGeneral`, `decremento`, `tipo`, `categoria`) VALUES
(1, 1, 200, 'Guantes', 2),
(2, 2, 100, 'Baja Lengua', 1),
(3, 3, 100, 'Jeringa', 5),
(4, 4, 200, 'Hisopos', 3),
(5, 5, 100, 'Algodon', NULL),
(6, 6, 100, 'Curitas', NULL),
(7, 7, 50, 'Gasa', NULL),
(8, 8, 25, 'Especulo', NULL),
(9, 9, 50, 'Mascarilla', NULL),
(10, 10, 100, 'Aguja', NULL),
(15, 14, 60, 'Papel Fotografi', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `idreceta` int(10) NOT NULL,
  `paciente` varchar(50) DEFAULT NULL,
  `receta` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `receta`
--

INSERT INTO `receta` (`idreceta`, `paciente`, `receta`) VALUES
(1, 'Carmen Alicia Najarro', '-acetaminofen 1 cada 8 horas');

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
(6, 1, 'CarolinaMo', 'Registro de Insumo MÃ©dico', '2019-01-04', '16:19:19'),
(7, 1, 'CarolinaMo', 'Registro de Proveedor', '2019-01-04', '16:22:09'),
(8, 1, 'CarolinaMo', 'Registro Empleado', '2019-01-04', '16:59:02'),
(9, 1, 'CarolinaMo', 'Registro de Insumo MÃ©dico', '2019-01-04', '17:10:37'),
(10, 1, 'CarolinaMo', 'Registro de Insumo MÃ©dico', '2019-01-04', '17:21:18'),
(11, 1, 'CarolinaMo', 'Registro de Paciente', '2019-01-07', '09:31:48'),
(12, 1, 'CarolinaMo', 'Registro de Paciente', '2019-01-07', '09:39:20'),
(13, 1, 'CarolinaMo', 'Se guardaron datos de una nueva compra|', '2019-01-07', '09:49:44'),
(14, 1, 'CarolinaMo', 'Registro de Insumo MÃ©dico', '2019-01-07', '09:59:33'),
(15, 1, 'CarolinaMo', 'Registro de Insumo MÃ©dico', '2019-01-07', '10:02:20'),
(16, 1, 'CarolinaMo', 'Registro de Paciente', '2019-01-07', '10:07:12'),
(17, 1, 'CarolinaMo', 'Se guardaron datos de una nueva compra|', '2019-01-07', '10:12:58'),
(18, 1, 'CarolinaMo', 'Se guardaron datos de una nueva compra|', '2019-01-07', '11:02:23'),
(19, 1, 'CarolinaMo', 'Registro de Insumo MÃ©dico', '2019-01-07', '13:28:23'),
(20, 1, 'CarolinaMo', 'Se guardaron datos de una nueva compra|', '2019-01-07', '13:29:14'),
(21, 1, 'CarolinaMo', 'Registro de Insumo MÃ©dico', '2019-01-07', '13:56:05'),
(22, 1, 'CarolinaMo', 'Se guardaron datos de una nueva compra|', '2019-01-07', '13:57:06'),
(23, 1, 'CarolinaMo', 'Registro de Insumo MÃ©dico', '2019-01-07', '14:13:39'),
(24, 1, 'CarolinaMo', 'Se guardaron datos de una nueva compra|', '2019-01-07', '14:14:14'),
(25, 1, 'CarolinaMo', 'Registro de Insumo MÃ©dico', '2019-01-07', '14:22:17'),
(26, 1, 'CarolinaMo', 'Se guardaron datos de una nueva compra|', '2019-01-07', '14:23:04'),
(27, 1, 'CarolinaMo', 'Registro de Insumo MÃ©dico', '2019-01-07', '14:50:07'),
(28, 1, 'CarolinaMo', 'Se guardaron datos de una nueva compra|', '2019-01-07', '14:50:52'),
(29, 1, 'CarolinaMo', 'Registro de Insumo MÃ©dico', '2019-01-07', '15:06:56'),
(30, 1, 'CarolinaMo', 'Se guardaron datos de una nueva compra|', '2019-01-07', '15:07:37'),
(31, 1, 'CarolinaMo', 'Registro de Insumo MÃ©dico', '2019-01-07', '15:18:35'),
(32, 1, 'CarolinaMo', 'Se guardaron datos de una nueva compra|', '2019-01-07', '15:19:14'),
(33, 1, 'CarolinaMo', 'Registro de Insumo MÃ©dico', '2019-01-07', '15:21:36'),
(34, 1, 'CarolinaMo', 'Se guardaron datos de una nueva compra|', '2019-01-07', '15:22:21'),
(35, 1, 'CarolinaMo', 'Registro de Insumo MÃ©dico', '2019-01-07', '15:30:42'),
(36, 1, 'CarolinaMo', 'Se guardaron datos de una nueva compra|', '2019-01-07', '15:31:25'),
(37, 1, 'CarolinaMo', 'Registro de Insumo MÃ©dico', '2019-01-07', '15:42:56'),
(38, 1, 'CarolinaMo', 'Se guardaron datos de una nueva compra|', '2019-01-07', '15:43:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_categoria_insumo`
--

CREATE TABLE `t_categoria_insumo` (
  `idcategoria` int(10) NOT NULL,
  `nombreCategoria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_categoria_insumo`
--

INSERT INTO `t_categoria_insumo` (`idcategoria`, `nombreCategoria`) VALUES
(1, 'Baja Lengua'),
(2, 'Guantes'),
(3, 'Isopos'),
(4, 'Gasa'),
(5, 'Jeringa');

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
(1, 1, 13, '2019-12-30', 10.8, 100, NULL, '2019-01-07', '123456', 1080, NULL, 'Finalizado', 98),
(2, 1, 12, '2019-12-30', 5.75, 100, NULL, '2019-01-07', '123456 ', 575, NULL, 'Finalizado', 99),
(3, 1, 14, '2019-12-30', 10.7, 1, NULL, '2019-01-07', '12343', 10.7, NULL, 'Finalizado', 0),
(4, 1, 15, '2019-12-30', 3.9, 1, NULL, '2019-01-07', '12343 ', 3.9, NULL, 'Finalizado', 0),
(5, 1, 15, '2019-12-30', 7.9, 1, NULL, '2019-01-07', '3457689', 7.9, NULL, 'Finalizado', 0),
(6, 1, 16, '2019-12-30', 5.33, 1, NULL, '2019-01-07', '3423432', 5.33, NULL, 'Finalizado', 0),
(7, 1, 17, '2019-12-30', 3.22, 1, NULL, '2019-01-07', '4534534', 3.22, NULL, 'Finalizado', 0),
(8, 1, 18, '2019-12-30', 7.43, 1, NULL, '2019-01-07', '5463434', 7.43, NULL, 'Finalizado', 0),
(9, 1, 19, '2019-12-30', 30.25, 2, NULL, '2019-01-07', '5645664', 60.5, NULL, 'Finalizado', 1),
(10, 1, 20, '2019-12-30', 8.76, 2, NULL, '2019-01-07', '434342', 17.52, NULL, 'Finalizado', 1),
(11, 1, 21, '2019-12-30', 5.65, 1, NULL, '2019-01-07', '87868969', 5.65, NULL, 'Finalizado', 0),
(15, 1, 25, '2019-12-30', 35, 2, NULL, '2019-01-07', '34343243', 70, NULL, 'Finalizado', 1);

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
  `enfermeria_fetal` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_consulta`
--

INSERT INTO `t_consulta` (`idconsulta`, `fk_expediente`, `fk_enfermeria`, `con_fecha_atiende`, `con_diagnostico`, `con_ref_medica`, `con_cons_medica`, `con_receta`, `con_fecha_amenorrea`, `con_ctipo_consulta`, `con_resul_examen`, `enfermeria_fetal`) VALUES
(1, 1, 1, '2019-01-04', 'dolor de cabeza', NULL, NULL, NULL, '2018-12-30', 'Consulta General', NULL, NULL),
(2, 4, 4, '2019-01-07', 'dolor de cabeza', NULL, NULL, NULL, '2018-10-20', 'Consulta General', NULL, NULL);

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

--
-- Volcado de datos para la tabla `t_enfermeria`
--

INSERT INTO `t_enfermeria` (`id_enfermeria`, `enf_destatura`, `enf_dpeso`, `enf_dtempetarura`, `enf_cpresion`, `enf_cpulso`) VALUES
(1, 70, 35, 37.5, '120/80', 90),
(2, 0, 0, 0, '', 0),
(3, 0, 0, 0, '', 0),
(4, 90, 130, 37, '120/80', 80);

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

--
-- Volcado de datos para la tabla `t_expediente`
--

INSERT INTO `t_expediente` (`id_expediente`, `fk_medico`, `fk_paciente`, `codigo`, `fecha_registro`, `alergias`) VALUES
(1, 1, 2, 'MEJI827', '2019-01-04', 'Penicilina'),
(2, 1, 1, 'NAJA724', '2019-01-04', 'ninguna'),
(3, 1, 3, 'ALAS137', '2019-01-07', 'penicilina'),
(4, 1, 4, 'CAMP442', '2019-01-07', 'acetaminofen'),
(5, 1, 5, 'GAVI861', '2019-01-07', 'mefformina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_familiar`
--

CREATE TABLE `t_familiar` (
  `idfamiliar` int(10) NOT NULL,
  `familiar` varchar(5) DEFAULT NULL,
  `condGrave` varchar(50) DEFAULT NULL
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

--
-- Volcado de datos para la tabla `t_insumo`
--

INSERT INTO `t_insumo` (`ins_codigo`, `ins_cnombre_comercial`, `ins_cmarca`, `ins_cdescripcion`, `estado`, `codigo`, `presentacion`, `unidad`, `minimo`, `tipo`, `id_categoria`) VALUES
(12, 'Baja Lengua', 'Medicad', 'madera de 6\" de largo', 1, 'BAJ522', 'Caja', 100, 1, 'Contable', 1),
(13, 'Guantes', 'Medicad', 'de latex color blanco con talco, ambidiestro y no esteril', 1, 'GUA645', 'Caja', 100, 1, 'Contable', 2),
(14, 'Jeringa', 'Medicad', 'DESCARTABLE 1CC CON AGUJA 16X5 TUBERCULINA', 1, 'JER629', 'Caja', 100, 1, 'Contable', 5),
(15, 'Hisopo', 'Medicad', 'MADERA ESTERIL 15CM', 1, 'HIS175', 'Caja', 100, 1, 'Contable', 3),
(16, 'Algodon', 'Medicad', 'bolitas de algodon', 1, 'ALG676', 'Bolsa', 100, 1, 'Contable', 0),
(17, 'Curitas', 'MedLab', 'nose', 1, 'CUR942', 'Caja', 100, 1, 'Contable', 0),
(18, 'Gasa Esteril', 'Medicad', 'nossss', 1, 'GAS996', 'Caja', 50, 1, 'Contable', 0),
(19, 'Especulo', 'Medilab', 'ssss', 1, 'ESP254', 'Caja', 25, 2, 'Contable', 0),
(20, 'Mascarilla', 'MediLab', 'ni idea', 1, 'MAS583', 'Caja', 50, 1, 'Contable', 0),
(21, 'Aguja', 'Medilab', 'sssdsdsd', 1, 'AGU695', 'Caja', 100, 1, 'Contable', 0),
(25, 'Papel Fotografico', 'Medicad', 'ffff', 1, 'PAP793', 'Resma', 60, 2, 'Contable', 0);

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
(1, 1, 98, NULL, 13),
(2, 2, 99, NULL, 12),
(3, 3, 0, NULL, 14),
(4, 4, 0, NULL, 15),
(5, 6, 0, NULL, 16),
(6, 7, 0, NULL, 17),
(7, 8, 0, NULL, 18),
(8, 9, 1, NULL, 19),
(9, 10, 1, NULL, 20),
(10, 11, 0, NULL, 21),
(14, 15, 1, NULL, 25);

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
(1, 1, '2019-01-04', '0'),
(2, 2, '2019-01-04', '2'),
(3, 3, '2019-01-07', '2'),
(4, 4, '2019-01-07', '0'),
(5, 5, '2019-01-07', '1');

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
(1, 1, 'Carolina Evelyn', 'Montalvo de Monteneg', 'Ginecologico');

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
  `fechaEmbarazoAnterior` date DEFAULT NULL
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

--
-- Volcado de datos para la tabla `t_paciente`
--

INSERT INTO `t_paciente` (`id_paciente`, `pac_cnombre`, `pac_capellidos`, `pac_cdui`, `pac_ctelefono`, `pac_ffecha_nac`, `estado`) VALUES
(1, 'Carmen Alicia', 'Najarro', '23123231-2', '2345-4343', '1990-04-23', 1),
(2, 'Casey Alexandra', 'Mejia Ponce', '', '', '2015-03-30', 1),
(3, 'Laura Maria', 'Alas Palacios', '31231232-1', '7823-1231', '1990-04-12', 1),
(4, 'Josefina Judith', 'Campos Estrada', '65756754-5', '7854-6434', '1966-02-27', 1),
(5, 'Suyapa Azucena', 'Gavidia Martinez', '34543534-5', '7456-4565', '1990-02-14', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_personales`
--

CREATE TABLE `t_personales` (
  `idpersonal` int(10) NOT NULL,
  `personal` varchar(5) DEFAULT NULL,
  `condGrave` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `pre_iultra` blob,
  `fk_idfamiliar` int(10) NOT NULL,
  `fk_idpersonales` int(10) NOT NULL,
  `fk_idobstetricos` int(10) NOT NULL
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

--
-- Volcado de datos para la tabla `t_proveedor`
--

INSERT INTO `t_proveedor` (`id_proveedor`, `pro_cnombre_empresa`, `pro_cnombre_responsable`, `pro_cdireccion`, `pro_ctelefono`, `estado`, `justificacion`) VALUES
(1, 'Medicad', 'Lorenzo Turcios', 'col san benito san salvador', '2345-6543', 1, NULL);

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

--
-- Volcado de datos para la tabla `t_responsable`
--

INSERT INTO `t_responsable` (`idresponsable`, `t_paciente`, `res_cnombre`, `res_capellidos`, `res_cdui`, `res_ctelefono`, `estado`) VALUES
(1, 2, 'Beatriz', 'Ponce', '23234343-4', '2344-5435', 1);

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
(1, 'Carolina Evelyn', 'Montalvo de Monteneg', 'caromontalvo@gmail.com', 'CarolinaMo', 'montenegro', 'Administrador', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inventario_unidades`
--
ALTER TABLE `inventario_unidades`
  ADD PRIMARY KEY (`idInventario_Unidades`),
  ADD KEY `fk_Inventario_Unidades_t_inventario1_idx` (`fk_inventarioGeneral`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`idreceta`);

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
  ADD PRIMARY KEY (`idfamiliar`);

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
  ADD KEY `fk_t_medico_t_usuario1_idx` (`t_usuario`);

--
-- Indices de la tabla `t_obstetricos`
--
ALTER TABLE `t_obstetricos`
  ADD PRIMARY KEY (`idobstetricos`);

--
-- Indices de la tabla `t_paciente`
--
ALTER TABLE `t_paciente`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `t_personales`
--
ALTER TABLE `t_personales`
  ADD PRIMARY KEY (`idpersonal`);

--
-- Indices de la tabla `t_prenatal`
--
ALTER TABLE `t_prenatal`
  ADD PRIMARY KEY (`idprenatal`),
  ADD KEY `fk_t_prenatal_t_consulta1_idx` (`fk_consulta`),
  ADD KEY `fk_idfamiliar` (`fk_idfamiliar`),
  ADD KEY `fk_idpersonales` (`fk_idpersonales`),
  ADD KEY `fk_idobstetricos` (`fk_idobstetricos`);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inventario_unidades`
--
ALTER TABLE `inventario_unidades`
  MODIFY `idInventario_Unidades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `receta`
--
ALTER TABLE `receta`
  MODIFY `idreceta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `t_bitacora`
--
ALTER TABLE `t_bitacora`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `t_categoria_insumo`
--
ALTER TABLE `t_categoria_insumo`
  MODIFY `idcategoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `t_compra`
--
ALTER TABLE `t_compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `t_consulta`
--
ALTER TABLE `t_consulta`
  MODIFY `idconsulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_devolucion`
--
ALTER TABLE `t_devolucion`
  MODIFY `id_devolucion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_enfermeria`
--
ALTER TABLE `t_enfermeria`
  MODIFY `id_enfermeria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id_expediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `t_familiar`
--
ALTER TABLE `t_familiar`
  MODIFY `idfamiliar` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_insumo`
--
ALTER TABLE `t_insumo`
  MODIFY `ins_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `t_inventario`
--
ALTER TABLE `t_inventario`
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `t_llegada`
--
ALTER TABLE `t_llegada`
  MODIFY `id_llegada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `t_medico`
--
ALTER TABLE `t_medico`
  MODIFY `idMedico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `t_obstetricos`
--
ALTER TABLE `t_obstetricos`
  MODIFY `idobstetricos` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_paciente`
--
ALTER TABLE `t_paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `t_responsable`
--
ALTER TABLE `t_responsable`
  MODIFY `idresponsable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inventario_unidades`
--
ALTER TABLE `inventario_unidades`
  ADD CONSTRAINT `categoria` FOREIGN KEY (`categoria`) REFERENCES `t_categoria_insumo` (`idcategoria`),
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
  ADD CONSTRAINT `fk_t_medico_t_usuario1` FOREIGN KEY (`t_usuario`) REFERENCES `t_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_prenatal`
--
ALTER TABLE `t_prenatal`
  ADD CONSTRAINT `fk_idfamiliar` FOREIGN KEY (`fk_idfamiliar`) REFERENCES `t_familiar` (`idfamiliar`),
  ADD CONSTRAINT `fk_idobstetricos` FOREIGN KEY (`fk_idobstetricos`) REFERENCES `t_obstetricos` (`idobstetricos`),
  ADD CONSTRAINT `fk_idpersonales` FOREIGN KEY (`fk_idpersonales`) REFERENCES `t_personales` (`idpersonal`),
  ADD CONSTRAINT `fk_t_prenatal_t_consulta1` FOREIGN KEY (`fk_consulta`) REFERENCES `t_consulta` (`idconsulta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_responsable`
--
ALTER TABLE `t_responsable`
  ADD CONSTRAINT `fk_t_responsable_t_paciente1` FOREIGN KEY (`t_paciente`) REFERENCES `t_paciente` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
