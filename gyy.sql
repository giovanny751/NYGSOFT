/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : gyy

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2015-02-05 17:32:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `actividad_economica`
-- ----------------------------
DROP TABLE IF EXISTS `actividad_economica`;
CREATE TABLE `actividad_economica` (
  `actEco_id` int(11) NOT NULL,
  `actEco_Detalle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`actEco_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of actividad_economica
-- ----------------------------
INSERT INTO `actividad_economica` VALUES ('1', 'Agricultura');
INSERT INTO `actividad_economica` VALUES ('2', 'Ganaderia');
INSERT INTO `actividad_economica` VALUES ('3', 'Industria');
INSERT INTO `actividad_economica` VALUES ('4', 'Comercio');
INSERT INTO `actividad_economica` VALUES ('5', 'Comunicaciones');

-- ----------------------------
-- Table structure for `adminformularios`
-- ----------------------------
DROP TABLE IF EXISTS `adminformularios`;
CREATE TABLE `adminformularios` (
  `form_id` int(11) NOT NULL AUTO_INCREMENT,
  `form_formulario` varchar(255) DEFAULT NULL COMMENT '1 empresa, 2 usuario 3 vehiculos 0 otra',
  `form_campo` varchar(255) DEFAULT NULL,
  `form_nombre` varchar(255) DEFAULT NULL,
  `form_valor` int(2) DEFAULT '0' COMMENT '0 activo 1 inactivo 2 eliminado',
  `form_accion` int(2) DEFAULT '0' COMMENT '0 activo 1 inactivo 2 eliminado',
  `form_nombreForm` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`form_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of adminformularios
-- ----------------------------
INSERT INTO `adminformularios` VALUES ('4', '0', 'OTRO', 'OTRO', '0', '0', 'OTRO');
INSERT INTO `adminformularios` VALUES ('5', '1', ' Tipo de Empresa', 'pública', '1', '0', 'Empresa');

-- ----------------------------
-- Table structure for `areas`
-- ----------------------------
DROP TABLE IF EXISTS `areas`;
CREATE TABLE `areas` (
  `are_id` int(11) NOT NULL AUTO_INCREMENT,
  `are_area` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`are_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of areas
-- ----------------------------
INSERT INTO `areas` VALUES ('1', 'sdfsdfs');
INSERT INTO `areas` VALUES ('2', 'gerson');
INSERT INTO `areas` VALUES ('3', 'javier');
INSERT INTO `areas` VALUES ('4', 'nelson');
INSERT INTO `areas` VALUES ('5', 'gggg');
INSERT INTO `areas` VALUES ('6', 'tttttt');
INSERT INTO `areas` VALUES ('7', 'tttttt33333');
INSERT INTO `areas` VALUES ('8', 'sdfsdf');
INSERT INTO `areas` VALUES ('9', 'sdfsdf');
INSERT INTO `areas` VALUES ('10', 'sdfsdf');
INSERT INTO `areas` VALUES ('11', 'sdfsdf');
INSERT INTO `areas` VALUES ('12', 'sdfsdf');
INSERT INTO `areas` VALUES ('13', 'dfgsdf');
INSERT INTO `areas` VALUES ('14', 'dfgsdf');

-- ----------------------------
-- Table structure for `canales_de_venta`
-- ----------------------------
DROP TABLE IF EXISTS `canales_de_venta`;
CREATE TABLE `canales_de_venta` (
  `canVen_id` int(11) NOT NULL,
  `canVen_detalle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`canVen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of canales_de_venta
-- ----------------------------

-- ----------------------------
-- Table structure for `cargos`
-- ----------------------------
DROP TABLE IF EXISTS `cargos`;
CREATE TABLE `cargos` (
  `car_id` int(11) NOT NULL,
  `car_nombre` varchar(255) DEFAULT NULL,
  `are_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cargos
-- ----------------------------

-- ----------------------------
-- Table structure for `ciudad`
-- ----------------------------
DROP TABLE IF EXISTS `ciudad`;
CREATE TABLE `ciudad` (
  `ciu_id` int(11) NOT NULL AUTO_INCREMENT,
  `ciu_nombre` varchar(255) DEFAULT NULL,
  `pai_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ciu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ciudad
-- ----------------------------
INSERT INTO `ciudad` VALUES ('38', 'bogota', '0');
INSERT INTO `ciudad` VALUES ('39', 'bogota', '0');
INSERT INTO `ciudad` VALUES ('40', 'sdfsdfsd', '0');
INSERT INTO `ciudad` VALUES ('41', 'sdfsdfs', '1');

-- ----------------------------
-- Table structure for `empresa`
-- ----------------------------
DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_razonSocial` varchar(255) NOT NULL,
  `emp_nit` varchar(50) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of empresa
-- ----------------------------
INSERT INTO `empresa` VALUES ('1', 'kj', 'lkj', '0', 'lkj', '0', '0', 'lk', 'jlk', '0', 'jlk', 'jklj', '0', 'lk', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `empresa` VALUES ('2', 'kj', 'lkj', '0', 'lkj', '0', '0', 'lk', 'jlk', '0', 'jlk', 'jklj', '0', 'lk', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `empresa` VALUES ('3', 'kj', 'lkj', '0', 'lkj', '0', '0', 'lk', 'jlk', '0', 'jlk', 'jklj', '0', 'lk', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `empresa` VALUES ('4', 'kj', 'lkj', '0', 'lkj', '0', '0', 'lk', 'jlk', '0', 'jlk', 'jklj', '0', 'lk', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `empresa` VALUES ('5', 'kj', 'lkj', '0', 'lkj', '0', '0', 'lk', 'jlk', '0', 'jlk', 'jklj', '0', 'lk', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `empresa` VALUES ('6', 'kj', 'lkj', '0', 'lkj', '0', '0', 'lk', 'jlk', '0', 'jlk', 'jklj', '0', 'lk', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `empresa` VALUES ('7', 'kj', 'lkj', '0', 'lkj', '0', '0', 'lk', 'jlk', '0', 'jlk', 'jklj', '0', 'lk', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `empresa` VALUES ('8', 'kj', 'lkj', '0', 'lkj', '0', '0', 'lk', 'jlk', '0', 'jlk', 'jklj', '0', 'lk', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `empresa` VALUES ('9', 'kj', 'lkj', '0', 'lkj', '0', '0', 'lk', 'jlk', '0', 'jlk', 'jklj', '0', 'lk', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `empresa` VALUES ('10', 'kj', 'lkj', '0', 'lkj', '0', '0', 'lk', 'jlk', '0', 'jlk', 'jklj', '0', 'lk', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `empresa` VALUES ('11', 'kj', 'lkj', '0', 'lkj', '0', '0', 'lk', 'jlk', '0', 'jlk', 'jklj', '0', 'lk', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `empresa` VALUES ('12', 'kj', 'lkj', '0', 'lkj', '0', '0', 'lk', 'jlk', '0', 'jlk', 'jklj', '0', 'lk', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `empresa` VALUES ('13', 'kj', 'lkj', '0', 'lkj', '0', '0', 'lk', 'jlk', '0', 'jlk', 'jklj', '0', 'lk', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `empresa` VALUES ('14', 'kj', 'lkj', '0', 'lkj', '0', '0', 'lk', 'jlk', '0', 'jlk', 'jklj', '0', 'lk', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `empresa` VALUES ('15', 'kj', 'lkj', '0', 'lkj', '0', '0', 'lk', 'jlk', '0', 'jlk', 'jklj', '0', 'lk', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `empresa` VALUES ('16', 'kj', 'lkj', '0', 'lkj', '0', '0', 'lk', 'jlk', '0', 'jlk', 'jklj', '0', 'lk', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `empresa` VALUES ('17', 'kj', 'lkj', '0', 'lkj', '0', '0', 'lk', 'jlk', '0', 'jlk', 'jklj', '0', 'lk', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('1', 'admin', 'Administrator');
INSERT INTO `groups` VALUES ('2', 'members', 'General User');

-- ----------------------------
-- Table structure for `informacion_personal`
-- ----------------------------
DROP TABLE IF EXISTS `informacion_personal`;
CREATE TABLE `informacion_personal` (
  `infPer_id` int(11) NOT NULL AUTO_INCREMENT,
  `infPer_nombre` varchar(255) DEFAULT NULL,
  `infPer_url` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`infPer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of informacion_personal
-- ----------------------------
INSERT INTO `informacion_personal` VALUES ('7', 'COPINA ', 'https://api.import.io/store/data/c55cccf8-4900-43b0-a7f3-ea8b0938a761/_query?input/cedula_per=ramirez&format=HTML&_user=af0ed180-d2ba-410d-a19c-6b625726cd54&_apikey=UEVct%2BPRL0F0p86PkZHRQ2IJ9DyjbABlqoDDXcSvQsXL%2FgSCWtCs0i5y9HSEyDxibWsy9aaJyQ%2BZaPzysURgWw%3D%3D');
INSERT INTO `informacion_personal` VALUES ('8', 'FOSYGA', 'http://www.fosyga.gov.co/Aplicaciones/AfiliadoWebBDUA/Afiliado/Formulario/buda_consulta_afil_sin_dnn.aspx?id=1033741569&tipodocumento=CC');
INSERT INTO `informacion_personal` VALUES ('9', 'dian', 'https://muisca.dian.gov.co/WebRutMuisca/DefConsultaEstadoRUT.faces');
INSERT INTO `informacion_personal` VALUES ('10', 'interpol', 'http://www.interpol.int/notice/search/wanted');

-- ----------------------------
-- Table structure for `login_attempts`
-- ----------------------------
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of login_attempts
-- ----------------------------

-- ----------------------------
-- Table structure for `modulo`
-- ----------------------------
DROP TABLE IF EXISTS `modulo`;
CREATE TABLE `modulo` (
  `menu_id` int(5) NOT NULL AUTO_INCREMENT,
  `menu_idpadre` int(5) NOT NULL,
  `menu_nombrepadre` varchar(50) NOT NULL,
  `menu_idhijo` int(5) NOT NULL,
  `menu_controlador` varchar(100) DEFAULT NULL,
  `menu_accion` varchar(100) DEFAULT NULL,
  `menu_estado` int(1) DEFAULT '1' COMMENT 'se le coloca un estado 1 porque esta activo',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of modulo
-- ----------------------------
INSERT INTO `modulo` VALUES ('1', '0', 'REPORTES', '1', null, null, '1');
INSERT INTO `modulo` VALUES ('2', '0', 'ADMINISTRACION', '2', null, null, '1');
INSERT INTO `modulo` VALUES ('3', '2', 'USUARIOS', '0', 'presentacion', 'usuario', '1');
INSERT INTO `modulo` VALUES ('4', '2', 'MENU', '0', 'presentacion', 'creacionmenu', '1');
INSERT INTO `modulo` VALUES ('5', '2', 'ROLES', '0', 'presentacion', 'roles', '1');
INSERT INTO `modulo` VALUES ('6', '2', 'PROVEEDORES', '6', null, null, '1');
INSERT INTO `modulo` VALUES ('7', '6', 'NUEVO PROVEEDOR', '0', 'proveedores', 'creaciondeproveedores', '1');
INSERT INTO `modulo` VALUES ('8', '2', 'EMPRESA', '0', 'presentacion', 'administracionareas', '1');
INSERT INTO `modulo` VALUES ('9', '0', 'Cerrar Sesion', '0', 'auth', 'logout', '1');
INSERT INTO `modulo` VALUES ('11', '0', 'INFORMACIÓN PERSONAL', '11', null, null, '1');
INSERT INTO `modulo` VALUES ('12', '11', 'Creación URL', '0', 'informacion', 'url', '1');
INSERT INTO `modulo` VALUES ('13', '11', 'CONSULTAR', '0', 'informacion', 'consultarusuario', '1');
INSERT INTO `modulo` VALUES ('14', '1', 'REPORTES', '0', 'reportes', 'informacionreporte', '1');
INSERT INTO `modulo` VALUES ('15', '1', 'CREACION REPORTES', '0', 'reportes', 'creacionreporte', '1');
INSERT INTO `modulo` VALUES ('16', '0', 'INFORMACIÓN', '16', '', '', '1');
INSERT INTO `modulo` VALUES ('17', '16', 'VEHICULOS', '0', null, null, '1');
INSERT INTO `modulo` VALUES ('19', '16', 'EMPRESAS', '19', null, null, '1');
INSERT INTO `modulo` VALUES ('20', '0', 'PREGUNTAS', '20', null, null, '1');
INSERT INTO `modulo` VALUES ('21', '20', 'SELECCION', '0', 'preguntas', 'preguntasseleccion', '1');
INSERT INTO `modulo` VALUES ('22', '20', 'TEXTO SEGUIDO', '0', null, null, '1');
INSERT INTO `modulo` VALUES ('23', '19', 'INFORMACIÓN EMPRESA', '0', '', '', '1');
INSERT INTO `modulo` VALUES ('24', '19', 'CREACION DE USUARIOS', '0', null, null, '1');

-- ----------------------------
-- Table structure for `pais`
-- ----------------------------
DROP TABLE IF EXISTS `pais`;
CREATE TABLE `pais` (
  `pai_id` int(11) NOT NULL AUTO_INCREMENT,
  `pai_nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pai_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pais
-- ----------------------------
INSERT INTO `pais` VALUES ('1', 'Colombia');
INSERT INTO `pais` VALUES ('2', 'Venezuela');
INSERT INTO `pais` VALUES ('3', 'Brazil');
INSERT INTO `pais` VALUES ('4', 'CHILE');
INSERT INTO `pais` VALUES ('5', 'dos');
INSERT INTO `pais` VALUES ('6', null);
INSERT INTO `pais` VALUES ('7', 'dos');
INSERT INTO `pais` VALUES ('8', null);
INSERT INTO `pais` VALUES ('9', 'tres');
INSERT INTO `pais` VALUES ('10', 'gerson');
INSERT INTO `pais` VALUES ('11', 'papa');
INSERT INTO `pais` VALUES ('12', 'papamama');
INSERT INTO `pais` VALUES ('13', 'PEpe');

-- ----------------------------
-- Table structure for `permisos`
-- ----------------------------
DROP TABLE IF EXISTS `permisos`;
CREATE TABLE `permisos` (
  `per_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`per_id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of permisos
-- ----------------------------
INSERT INTO `permisos` VALUES ('81', '2', '1', '39');
INSERT INTO `permisos` VALUES ('82', '2', '14', '39');
INSERT INTO `permisos` VALUES ('83', '3', '1', '37');
INSERT INTO `permisos` VALUES ('84', '3', '14', '37');
INSERT INTO `permisos` VALUES ('85', '3', '1', '38');
INSERT INTO `permisos` VALUES ('86', '3', '14', '38');
INSERT INTO `permisos` VALUES ('87', '3', '2', '38');
INSERT INTO `permisos` VALUES ('88', '3', '6', '38');
INSERT INTO `permisos` VALUES ('89', '3', '9', '40');
INSERT INTO `permisos` VALUES ('90', '3', '11', '40');

-- ----------------------------
-- Table structure for `permisos_rol`
-- ----------------------------
DROP TABLE IF EXISTS `permisos_rol`;
CREATE TABLE `permisos_rol` (
  `perRol_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`perRol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of permisos_rol
-- ----------------------------
INSERT INTO `permisos_rol` VALUES ('19', '1', '37');
INSERT INTO `permisos_rol` VALUES ('20', '14', '37');
INSERT INTO `permisos_rol` VALUES ('21', '15', '37');
INSERT INTO `permisos_rol` VALUES ('22', '1', '38');
INSERT INTO `permisos_rol` VALUES ('23', '14', '38');
INSERT INTO `permisos_rol` VALUES ('24', '15', '38');
INSERT INTO `permisos_rol` VALUES ('25', '2', '38');
INSERT INTO `permisos_rol` VALUES ('26', '5', '38');
INSERT INTO `permisos_rol` VALUES ('27', '6', '38');
INSERT INTO `permisos_rol` VALUES ('28', '7', '38');
INSERT INTO `permisos_rol` VALUES ('29', '1', '39');
INSERT INTO `permisos_rol` VALUES ('30', '14', '39');
INSERT INTO `permisos_rol` VALUES ('31', '9', '40');
INSERT INTO `permisos_rol` VALUES ('32', '11', '40');
INSERT INTO `permisos_rol` VALUES ('33', '12', '40');
INSERT INTO `permisos_rol` VALUES ('34', '13', '40');

-- ----------------------------
-- Table structure for `proveedores`
-- ----------------------------
DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE `proveedores` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of proveedores
-- ----------------------------

-- ----------------------------
-- Table structure for `reporte`
-- ----------------------------
DROP TABLE IF EXISTS `reporte`;
CREATE TABLE `reporte` (
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of reporte
-- ----------------------------
INSERT INTO `reporte` VALUES ('3', '0', 'COMPRAS', '3', null, '<query> select * from users</query> \r\n<date> \r\n<creacion>creac</creacion> \r\n<terminacion>term</terminacion> \r\n</date>\r\n<calculate>\r\n<id>udusuario</id>\r\n<active>activacion</active>\r\n</calculate>', 'R1', 'R1', 'R1');
INSERT INTO `reporte` VALUES ('4', '0', 'VENTAS', null, '1', null, null, null, null);
INSERT INTO `reporte` VALUES ('5', '0', 'GERENCIA', null, '1', null, null, null, null);
INSERT INTO `reporte` VALUES ('6', '0', 'SISTEMAS', null, '1', null, null, null, null);
INSERT INTO `reporte` VALUES ('7', '3', 'PROVEEDORES', '7', '1', null, null, null, null);
INSERT INTO `reporte` VALUES ('8', '3', 'PRECIOS', null, '1', null, null, null, null);
INSERT INTO `reporte` VALUES ('9', '7', 'NOMBRES', null, '1', null, null, null, null);
INSERT INTO `reporte` VALUES ('10', '7', 'PRODUCTOS', null, '1', null, null, null, null);
INSERT INTO `reporte` VALUES ('11', '7', 'R1', null, '1', null, null, null, null);
INSERT INTO `reporte` VALUES ('12', '7', 'R2', null, '1', null, null, null, null);
INSERT INTO `reporte` VALUES ('13', '7', 'R3', null, '1', null, null, null, null);
INSERT INTO `reporte` VALUES ('14', '7', 'R3', null, '1', null, null, null, null);

-- ----------------------------
-- Table structure for `reportes`
-- ----------------------------
DROP TABLE IF EXISTS `reportes`;
CREATE TABLE `reportes` (
  `rep_id` int(11) NOT NULL AUTO_INCREMENT,
  `rep_nombre` varchar(100) NOT NULL,
  `rep_estado` int(10) NOT NULL DEFAULT '1',
  `rep_query` varchar(5000) DEFAULT NULL,
  `rep_host` varchar(255) DEFAULT NULL,
  `rep_user` varchar(255) DEFAULT NULL,
  `rep_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of reportes
-- ----------------------------
INSERT INTO `reportes` VALUES ('1', 'gerson', '1', '<xml>\r\n</xml>', 'gerson', 'gerson', 'gerson');
INSERT INTO `reportes` VALUES ('2', 'Anderson4', '1', null, null, null, null);
INSERT INTO `reportes` VALUES ('3', 'gdf', '1', 'sfsdf', 'sfds', 'sdfs', 'sdfsd');
INSERT INTO `reportes` VALUES ('4', 'ANderson6', '1', null, null, null, null);
INSERT INTO `reportes` VALUES ('5', 'Anderson7', '1', null, null, null, null);
INSERT INTO `reportes` VALUES ('6', 'HolaMundo', '1', null, null, null, null);
INSERT INTO `reportes` VALUES ('7', 'HolaMundo2', '1', null, null, null, null);
INSERT INTO `reportes` VALUES ('8', '11111111', '1', null, null, null, null);
INSERT INTO `reportes` VALUES ('9', 'Gerson', '1', null, null, null, null);
INSERT INTO `reportes` VALUES ('10', 'SI ^^', '1', null, null, null, null);
INSERT INTO `reportes` VALUES ('11', 'Otro Coso', '1', null, null, null, null);
INSERT INTO `reportes` VALUES ('12', '^^', '1', null, null, null, null);
INSERT INTO `reportes` VALUES ('13', '', '1', null, null, null, null);

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_nombre` varchar(255) DEFAULT NULL,
  `rol_estado` int(5) DEFAULT '1',
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('37', 'COMPRAS', '1');
INSERT INTO `roles` VALUES ('38', 'GERENCIA', '1');
INSERT INTO `roles` VALUES ('39', 'CONTABILIDAD', '1');
INSERT INTO `roles` VALUES ('40', 'SISTEMAS', '1');

-- ----------------------------
-- Table structure for `session`
-- ----------------------------
DROP TABLE IF EXISTS `session`;
CREATE TABLE `session` (
  `SESSION_ID` int(10) NOT NULL AUTO_INCREMENT,
  `USUARIO_ID` int(10) DEFAULT NULL,
  `SESSION_IP` varchar(20) DEFAULT NULL,
  `SESSION_ACTIVA` int(20) DEFAULT NULL,
  PRIMARY KEY (`SESSION_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of session
-- ----------------------------

-- ----------------------------
-- Table structure for `tamano_empresa`
-- ----------------------------
DROP TABLE IF EXISTS `tamano_empresa`;
CREATE TABLE `tamano_empresa` (
  `tamEmp_id` int(11) NOT NULL,
  `tamEmp_tipo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tamEmp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tamano_empresa
-- ----------------------------
INSERT INTO `tamano_empresa` VALUES ('1', 'Grande');
INSERT INTO `tamano_empresa` VALUES ('2', 'Mediana');
INSERT INTO `tamano_empresa` VALUES ('3', 'Pequeña');

-- ----------------------------
-- Table structure for `tipo_producto`
-- ----------------------------
DROP TABLE IF EXISTS `tipo_producto`;
CREATE TABLE `tipo_producto` (
  `tipPro_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipPro_nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tipPro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipo_producto
-- ----------------------------
INSERT INTO `tipo_producto` VALUES ('1', 'tujuikuikio');
INSERT INTO `tipo_producto` VALUES ('2', 'Oka');
INSERT INTO `tipo_producto` VALUES ('3', 'Oka');
INSERT INTO `tipo_producto` VALUES ('4', 'Oka');
INSERT INTO `tipo_producto` VALUES ('5', 'Oka');
INSERT INTO `tipo_producto` VALUES ('6', 'Porque Si');

-- ----------------------------
-- Table structure for `usermodule`
-- ----------------------------
DROP TABLE IF EXISTS `usermodule`;
CREATE TABLE `usermodule` (
  `user_id` int(10) DEFAULT NULL,
  `modulo_menuid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usermodule
-- ----------------------------
INSERT INTO `usermodule` VALUES ('1', '24');
INSERT INTO `usermodule` VALUES ('1', '54');
INSERT INTO `usermodule` VALUES ('1', '1');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('2', null, 'gerson', null, null, 'javierbr12@hotmail.com', '1', null, null, null, null, null, '1', null, null, null, null);
INSERT INTO `users` VALUES ('3', '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', null, null, null, '1268889823', '1423167362', '1', 'Admin', 'istrator', 'ADMIN', '0');
INSERT INTO `users` VALUES ('4', null, '', '', null, '', null, null, null, null, null, null, '1', null, null, null, null);
INSERT INTO `users` VALUES ('5', null, 'Stivenbr12', '202cb962ac59075b964b07152d234b70', null, 'stivenbr12@hotmail.com', null, null, null, null, null, null, '1', null, null, null, '3004902184');
INSERT INTO `users` VALUES ('6', null, 'andersonbr', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', null, 'stivenbr1@hotmail.com', null, null, null, null, null, null, '1', null, null, null, '3004902184');

-- ----------------------------
-- Table structure for `users_groups`
-- ----------------------------
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users_groups
-- ----------------------------
INSERT INTO `users_groups` VALUES ('1', '1', '1');
INSERT INTO `users_groups` VALUES ('2', '1', '2');
