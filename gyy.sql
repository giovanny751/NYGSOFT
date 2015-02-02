-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-02-2015 a las 19:25:33
-- Versión del servidor: 5.6.14
-- Versión de PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gyy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_economica`
--

DROP TABLE IF EXISTS `actividad_economica`;
CREATE TABLE IF NOT EXISTS `actividad_economica` (
  `actEco_id` int(11) NOT NULL,
  `actEco_Detalle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`actEco_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividad_economica`
--

INSERT INTO `actividad_economica` (`actEco_id`, `actEco_Detalle`) VALUES
(1, 'Agricultura'),
(2, 'Ganaderia'),
(3, 'Industria'),
(4, 'Comercio'),
(5, 'Comunicaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

DROP TABLE IF EXISTS `areas`;
CREATE TABLE IF NOT EXISTS `areas` (
  `are_id` int(11) NOT NULL AUTO_INCREMENT,
  `are_area` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`are_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`are_id`, `are_area`) VALUES
(1, 'sdfsdfs'),
(2, 'gerson'),
(3, 'javier'),
(4, 'nelson'),
(5, 'gggg'),
(6, 'tttttt'),
(7, 'tttttt33333'),
(8, 'sdfsdf'),
(9, 'sdfsdf'),
(10, 'sdfsdf'),
(11, 'sdfsdf'),
(12, 'sdfsdf'),
(13, 'dfgsdf'),
(14, 'dfgsdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canales_de_venta`
--

DROP TABLE IF EXISTS `canales_de_venta`;
CREATE TABLE IF NOT EXISTS `canales_de_venta` (
  `canVen_id` int(11) NOT NULL,
  `canVen_detalle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`canVen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

DROP TABLE IF EXISTS `cargos`;
CREATE TABLE IF NOT EXISTS `cargos` (
  `car_id` int(11) NOT NULL,
  `car_nombre` varchar(255) DEFAULT NULL,
  `are_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
CREATE TABLE IF NOT EXISTS `ciudad` (
  `ciu_id` int(11) NOT NULL AUTO_INCREMENT,
  `ciu_nombre` varchar(255) DEFAULT NULL,
  `pai_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ciu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`ciu_id`, `ciu_nombre`, `pai_id`) VALUES
(38, 'bogota', 0),
(39, 'bogota', 0),
(40, 'sdfsdfsd', 0),
(41, 'sdfsdfs', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_razonSocial` varchar(255) NOT NULL,
  `emp_idTipo` int(11) NOT NULL,
  `emp_segmento` varchar(255) NOT NULL,
  `emp_ciiu1` int(11) NOT NULL,
  `emp_ciiu2` int(11) NOT NULL,
  `emp_telefono` varchar(50) NOT NULL,
  `emp_direccion` varchar(100) NOT NULL,
  `emp_sucursal` int(11) NOT NULL,
  `emp_direccioSuc` varchar(1000) NOT NULL,
  `emp_nombre_repre` varchar(150) NOT NULL,
  `emp_tipoDoc` int(2) NOT NULL,
  `emp_numDocRepre` varchar(50) NOT NULL,
  `emp_administraVehiculos` int(2) NOT NULL,
  `emp_vehiculosPropios` int(3) NOT NULL,
  `emp_vehiculosContratados` int(3) NOT NULL,
  `emp_numeroVehiculoAdministra` int(3) NOT NULL,
  `emp_adminConductores` int(1) NOT NULL,
  `emp_numActConductores` int(3) NOT NULL,
  `emp_numActConductoresAdministra` int(3) NOT NULL,
  `emp_idArl` int(11) NOT NULL,
  `emp_hseq` int(2) NOT NULL,
  `emp_seleccionConductores` int(2) NOT NULL,
  `emp_ingresoConductores` int(2) NOT NULL,
  `emp_examenesMedicos` int(1) NOT NULL,
  `emp_pruebasTeoricas` int(1) NOT NULL,
  `emp_examenesPsicosensometricos` int(1) NOT NULL,
  `emp_pruebaTactica` int(1) NOT NULL,
  `emp_capacitaPruebaVial` int(1) NOT NULL,
  `emp_procedimientoAtencion` int(1) NOT NULL,
  `emp_historicoAccidente` int(1) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `nombre`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion_personal`
--

DROP TABLE IF EXISTS `informacion_personal`;
CREATE TABLE IF NOT EXISTS `informacion_personal` (
  `infPer_id` int(11) NOT NULL AUTO_INCREMENT,
  `infPer_nombre` varchar(255) DEFAULT NULL,
  `infPer_url` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`infPer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `informacion_personal`
--

INSERT INTO `informacion_personal` (`infPer_id`, `infPer_nombre`, `infPer_url`) VALUES
(7, 'COPINA ', 'https://api.import.io/store/data/c55cccf8-4900-43b0-a7f3-ea8b0938a761/_query?input/cedula_per=ramirez&format=HTML&_user=af0ed180-d2ba-410d-a19c-6b625726cd54&_apikey=UEVct%2BPRL0F0p86PkZHRQ2IJ9DyjbABlqoDDXcSvQsXL%2FgSCWtCs0i5y9HSEyDxibWsy9aaJyQ%2BZaPzysURgWw%3D%3D'),
(8, 'FOSYGA', 'http://www.fosyga.gov.co/Aplicaciones/AfiliadoWebBDUA/Afiliado/Formulario/buda_consulta_afil_sin_dnn.aspx?id=1033741569&tipodocumento=CC'),
(9, 'dian', 'https://muisca.dian.gov.co/WebRutMuisca/DefConsultaEstadoRUT.faces'),
(10, 'interpol', 'http://www.interpol.int/notice/search/wanted');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

DROP TABLE IF EXISTS `modulo`;
CREATE TABLE IF NOT EXISTS `modulo` (
  `menu_id` int(5) NOT NULL AUTO_INCREMENT,
  `menu_idpadre` int(5) NOT NULL,
  `menu_nombrepadre` varchar(50) NOT NULL,
  `menu_idhijo` int(5) NOT NULL,
  `menu_controlador` varchar(100) DEFAULT NULL,
  `menu_accion` varchar(100) DEFAULT NULL,
  `menu_estado` int(1) DEFAULT '1' COMMENT 'se le coloca un estado 1 porque esta activo',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`menu_id`, `menu_idpadre`, `menu_nombrepadre`, `menu_idhijo`, `menu_controlador`, `menu_accion`, `menu_estado`) VALUES
(1, 0, 'REPORTES', 1, NULL, NULL, 1),
(2, 0, 'ADMINISTRACION', 2, NULL, NULL, 1),
(3, 2, 'USUARIOS', 0, 'presentacion', 'usuario', 1),
(4, 2, 'MENU', 0, 'presentacion', 'creacionmenu', 1),
(5, 2, 'ROLES', 0, 'presentacion', 'roles', 1),
(6, 2, 'PROVEEDORES', 6, NULL, NULL, 1),
(7, 6, 'NUEVO PROVEEDOR', 0, 'proveedores', 'creaciondeproveedores', 1),
(8, 2, 'EMPRESA', 0, 'presentacion', 'administracionareas', 1),
(9, 0, 'Cerrar Sesion', 0, 'auth', 'logout', 1),
(11, 0, 'INFORMACIÓN PERSONAL', 11, NULL, NULL, 1),
(12, 11, 'Creación URL', 0, 'informacion', 'url', 1),
(13, 11, 'CONSULTAR', 0, 'informacion', 'consultarusuario', 1),
(14, 1, 'REPORTES', 0, 'reportes', 'informacionreporte', 1),
(15, 1, 'CREACION REPORTES', 0, 'reportes', 'creacionreporte', 1),
(16, 0, 'INFORMACIÓN', 16, '', '', 1),
(17, 16, 'VEHICULOS', 0, NULL, NULL, 1),
(19, 16, 'EMPRESAS', 19, NULL, NULL, 1),
(20, 0, 'PREGUNTAS', 20, NULL, NULL, 1),
(21, 20, 'SELECCION', 0, 'preguntas', 'preguntasseleccion', 1),
(22, 20, 'TEXTO SEGUIDO', 0, NULL, NULL, 1),
(23, 19, 'INFORMACIÓN EMPRESA', 0, '', '', 1),
(24, 19, 'CREACION DE USUARIOS', 0, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

DROP TABLE IF EXISTS `pais`;
CREATE TABLE IF NOT EXISTS `pais` (
  `pai_id` int(11) NOT NULL AUTO_INCREMENT,
  `pai_nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pai_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`pai_id`, `pai_nombre`) VALUES
(1, 'Colombia'),
(2, 'Venezuela'),
(3, 'Brazil'),
(4, 'CHILE'),
(5, 'dos'),
(6, NULL),
(7, 'dos'),
(8, NULL),
(9, 'tres'),
(10, 'gerson'),
(11, 'papa'),
(12, 'papamama'),
(13, 'PEpe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

DROP TABLE IF EXISTS `permisos`;
CREATE TABLE IF NOT EXISTS `permisos` (
  `per_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`per_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`per_id`, `usu_id`, `menu_id`, `rol_id`) VALUES
(81, 2, 1, 39),
(82, 2, 14, 39),
(83, 3, 1, 37),
(84, 3, 14, 37),
(85, 3, 1, 38),
(86, 3, 14, 38),
(87, 3, 2, 38),
(88, 3, 6, 38),
(89, 3, 9, 40),
(90, 3, 11, 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_rol`
--

DROP TABLE IF EXISTS `permisos_rol`;
CREATE TABLE IF NOT EXISTS `permisos_rol` (
  `perRol_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`perRol_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `permisos_rol`
--

INSERT INTO `permisos_rol` (`perRol_id`, `menu_id`, `rol_id`) VALUES
(19, 1, 37),
(20, 14, 37),
(21, 15, 37),
(22, 1, 38),
(23, 14, 38),
(24, 15, 38),
(25, 2, 38),
(26, 5, 38),
(27, 6, 38),
(28, 7, 38),
(29, 1, 39),
(30, 14, 39),
(31, 9, 40),
(32, 11, 40),
(33, 12, 40),
(34, 13, 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `pai_id` int(11) DEFAULT NULL,
  `pro_identificacion` varchar(255) DEFAULT NULL,
  `tipPro_id` int(11) DEFAULT NULL,
  `nac_id` int(11) DEFAULT NULL,
  `pro_nombre` varchar(255) DEFAULT NULL,
  `pro_web` varchar(255) DEFAULT NULL,
  `pro_fechaIngreso` datetime DEFAULT NULL,
  `actEco_id` int(11) DEFAULT NULL,
  `pro_rubro` varchar(255) DEFAULT NULL,
  `pro_canEmpleados` int(10) DEFAULT NULL,
  `tamEmp_id` int(11) DEFAULT NULL,
  `pro_conEntrega` varchar(255) DEFAULT NULL,
  `pro_modEntrega` varchar(255) DEFAULT NULL,
  `canVen_id` int(11) DEFAULT NULL,
  `tipMon_id` int(11) DEFAULT NULL,
  `forPag_id` int(11) DEFAULT NULL,
  `pro_estado` int(5) DEFAULT NULL,
  `pro_correo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

DROP TABLE IF EXISTS `reporte`;
CREATE TABLE IF NOT EXISTS `reporte` (
  `rep_id` int(11) NOT NULL AUTO_INCREMENT,
  `rep_idpadre` int(10) DEFAULT NULL,
  `rep_nombrepadre` varchar(100) DEFAULT NULL,
  `rep_idhijo` int(10) DEFAULT NULL,
  `rep_estado` int(10) DEFAULT '1',
  `rep_query` varchar(5000) DEFAULT NULL,
  `rep_host` varchar(255) DEFAULT NULL,
  `rep_user` varchar(255) DEFAULT NULL,
  `rep_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rep_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `reporte`
--

INSERT INTO `reporte` (`rep_id`, `rep_idpadre`, `rep_nombrepadre`, `rep_idhijo`, `rep_estado`, `rep_query`, `rep_host`, `rep_user`, `rep_password`) VALUES
(3, 0, 'COMPRAS', 3, NULL, '<query> select * from users</query> \r\n<date> \r\n<creacion>creac</creacion> \r\n<terminacion>term</terminacion> \r\n</date>\r\n<calculate>\r\n<id>udusuario</id>\r\n<active>activacion</active>\r\n</calculate>', 'R1', 'R1', 'R1'),
(4, 0, 'VENTAS', NULL, 1, NULL, NULL, NULL, NULL),
(5, 0, 'GERENCIA', NULL, 1, NULL, NULL, NULL, NULL),
(6, 0, 'SISTEMAS', NULL, 1, NULL, NULL, NULL, NULL),
(7, 3, 'PROVEEDORES', 7, 1, NULL, NULL, NULL, NULL),
(8, 3, 'PRECIOS', NULL, 1, NULL, NULL, NULL, NULL),
(9, 7, 'NOMBRES', NULL, 1, NULL, NULL, NULL, NULL),
(10, 7, 'PRODUCTOS', NULL, 1, NULL, NULL, NULL, NULL),
(11, 7, 'R1', NULL, 1, NULL, NULL, NULL, NULL),
(12, 7, 'R2', NULL, 1, NULL, NULL, NULL, NULL),
(13, 7, 'R3', NULL, 1, NULL, NULL, NULL, NULL),
(14, 7, 'R3', NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

DROP TABLE IF EXISTS `reportes`;
CREATE TABLE IF NOT EXISTS `reportes` (
  `rep_id` int(11) NOT NULL AUTO_INCREMENT,
  `rep_nombre` varchar(100) NOT NULL,
  `rep_estado` int(10) NOT NULL DEFAULT '1',
  `rep_query` varchar(5000) DEFAULT NULL,
  `rep_host` varchar(255) DEFAULT NULL,
  `rep_user` varchar(255) DEFAULT NULL,
  `rep_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rep_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`rep_id`, `rep_nombre`, `rep_estado`, `rep_query`, `rep_host`, `rep_user`, `rep_password`) VALUES
(1, 'gerson', 1, '<xml>\r\n</xml>', 'gerson', 'gerson', 'gerson'),
(2, 'Anderson4', 1, NULL, NULL, NULL, NULL),
(3, 'gdf', 1, 'sfsdf', 'sfds', 'sdfs', 'sdfsd'),
(4, 'ANderson6', 1, NULL, NULL, NULL, NULL),
(5, 'Anderson7', 1, NULL, NULL, NULL, NULL),
(6, 'HolaMundo', 1, NULL, NULL, NULL, NULL),
(7, 'HolaMundo2', 1, NULL, NULL, NULL, NULL),
(8, '11111111', 1, NULL, NULL, NULL, NULL),
(9, 'Gerson', 1, NULL, NULL, NULL, NULL),
(10, 'SI ^^', 1, NULL, NULL, NULL, NULL),
(11, 'Otro Coso', 1, NULL, NULL, NULL, NULL),
(12, '^^', 1, NULL, NULL, NULL, NULL),
(13, '', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_nombre` varchar(255) DEFAULT NULL,
  `rol_estado` int(5) DEFAULT '1',
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rol_id`, `rol_nombre`, `rol_estado`) VALUES
(37, 'COMPRAS', 1),
(38, 'GERENCIA', 1),
(39, 'CONTABILIDAD', 1),
(40, 'SISTEMAS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `SESSION_ID` int(10) NOT NULL AUTO_INCREMENT,
  `USUARIO_ID` int(10) DEFAULT NULL,
  `SESSION_IP` varchar(20) DEFAULT NULL,
  `SESSION_ACTIVA` int(20) DEFAULT NULL,
  PRIMARY KEY (`SESSION_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tamano_empresa`
--

DROP TABLE IF EXISTS `tamano_empresa`;
CREATE TABLE IF NOT EXISTS `tamano_empresa` (
  `tamEmp_id` int(11) NOT NULL,
  `tamEmp_tipo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tamEmp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tamano_empresa`
--

INSERT INTO `tamano_empresa` (`tamEmp_id`, `tamEmp_tipo`) VALUES
(1, 'Grande'),
(2, 'Mediana'),
(3, 'Pequeña');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

DROP TABLE IF EXISTS `tipo_producto`;
CREATE TABLE IF NOT EXISTS `tipo_producto` (
  `tipPro_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipPro_nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tipPro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`tipPro_id`, `tipPro_nombre`) VALUES
(1, 'tujuikuikio'),
(2, 'Oka'),
(3, 'Oka'),
(4, 'Oka'),
(5, 'Oka'),
(6, 'Porque Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usermodule`
--

DROP TABLE IF EXISTS `usermodule`;
CREATE TABLE IF NOT EXISTS `usermodule` (
  `user_id` int(10) DEFAULT NULL,
  `modulo_menuid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usermodule`
--

INSERT INTO `usermodule` (`user_id`, `modulo_menuid`) VALUES
(1, 24),
(1, 54),
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) DEFAULT NULL,
  `last_login` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(2, NULL, 'gerson', NULL, NULL, 'javierbr12@hotmail.com', '1', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(3, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1422841153, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(4, NULL, '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(5, NULL, 'Stivenbr12', '202cb962ac59075b964b07152d234b70', NULL, 'stivenbr12@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '3004902184'),
(6, NULL, 'andersonbr', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 'stivenbr1@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '3004902184');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
