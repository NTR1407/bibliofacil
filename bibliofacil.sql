-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2020 a las 17:52:38
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bibliofacil`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `nombres` varchar(255) CHARACTER SET utf8 NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `identificación` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `dirección` varchar(255) CHARACTER SET utf8 NOT NULL,
  `clave` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `nombres`, `apellidos`, `identificación`, `telefono`, `email`, `dirección`, `clave`, `estado`) VALUES
(1, 'Jorge Andres', 'Amaya', 0, 315845655, 'prueba@gmail.com', 'carrera 9 #25-31', '123456', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id_autor` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_autor`, `nombre`, `estado`) VALUES
(1, 'Gabriel Garcia Marquez', 1),
(2, 'Mario Mendoza', 1),
(3, 'Javier Castillo', 1),
(4, 'Paula Hawkins', 1),
(5, 'Miguel de Cervantes Saavedra', 1),
(6, 'Manuel Torres Remon', 1),
(7, 'Robin Nixon', 1),
(8, 'Manuel Torres Remon', 1),
(9, 'Isabel Allende', 1),
(10, 'Stephen King', 1),
(11, 'Jamie McGuire', 1),
(12, 'Camila Chain', 1),
(13, 'Mauricio Leuro Martinez', 1),
(14, 'María Pérez Marqués', 1),
(15, 'José Mauricio Flores Castillo', 1),
(16, 'Borja Orbegozo Arana', 1),
(17, 'Carmen Fernández', 1),
(18, 'Borja Vásquez Cuesta', 1),
(19, 'Eugenia Pérez Martínez', 1),
(20, 'Jairo Gutierrez Carmona', 1),
(21, 'Jorge Rafael Villamizar', 1),
(22, 'Becca Fitzpatrick', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(2) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `estado` int(1) NOT NULL,
  `observaciones` varchar(100) NOT NULL,
  `fecha_creacion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`, `estado`, `observaciones`, `fecha_creacion`) VALUES
(1, 'Ciencias', 1, 'No presenta novedad', '2020-09-19'),
(2, 'Deportes', 1, 'No presenta novedad', '2020-09-19'),
(3, 'Investigación', 1, 'No presenta novedad', '2020-09-19'),
(4, 'Lenguas', 1, 'No presenta novedad', '2020-09-19'),
(5, 'Matemáticas', 1, 'No presenta novedad', '2020-09-19'),
(6, 'Médicina', 1, 'No presenta novedad', '2020-09-19'),
(7, 'Tecnología', 1, 'No presenta novedad', '2020-09-19'),
(8, 'Literatura', 1, 'No presenta novedad', '2020-09-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `departamento` varchar(100) CHARACTER SET utf8 NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `nombre`, `departamento`, `estado`) VALUES
(1, 'Bogotá', 'Cundinamarca', 1),
(2, 'Medellín', 'Antioquia', 1),
(3, 'Pereira', 'Risaralda', 1),
(4, 'Cali', 'Valle del Cauca', 1),
(5, 'Manizales', 'Caldas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `id_editorial` int(11) NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `fo_proveedor` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id_editorial`, `nombre`, `fo_proveedor`, `estado`) VALUES
(1, 'Norma', 2, 1),
(2, 'Anaya', 3, 1),
(3, 'AlfaOmega', 4, 1),
(4, 'Babel', 5, 1),
(5, 'Cangrejo', 6, 1),
(6, 'CIB Fondo Editorial', 2, 1),
(7, 'ECOE Ediciones', 3, 1),
(8, 'Ediciones de la U', 4, 1),
(9, 'Editorial Macro', 5, 1),
(10, 'Planeta', 6, 1),
(11, 'Ediciones B', 2, 1),
(12, 'Suma', 3, 1),
(13, 'Debolsillo', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id_libro` int(11) NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `fo_autor` int(11) NOT NULL,
  `fo_editorial` int(11) NOT NULL,
  `fo_categoria` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `num_ejemplares` int(2) NOT NULL,
  `ubicación` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_creacion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id_libro`, `nombre`, `fo_autor`, `fo_editorial`, `fo_categoria`, `estado`, `num_ejemplares`, `ubicación`, `observaciones`, `fecha_creacion`) VALUES
(1, 'Satanás', 2, 10, 8, 1, 10, 'Estante 1, fila6', 'Tiene la caratula nueva 01', '2020-09-19'),
(2, 'De amor y de sombra', 9, 13, 8, 1, 5, 'Estante 1', 'No presenta novedad', '2020-09-19'),
(3, 'It (Eso)', 10, 13, 8, 1, 7, 'Estante 1', 'No presenta novedad', '2020-09-19'),
(4, 'Maravilloso desastre', 11, 12, 8, 1, 10, 'Estante 1', 'No presenta novedad', '2020-09-19'),
(5, 'El amor es de todos los colores', 12, 13, 8, 1, 10, 'Estante 1', 'No presenta novedad', '2020-09-19'),
(6, 'Facturación y auditoría de cuentas en salud', 13, 7, 6, 1, 5, 'Estante 3', 'No presenta novedad', '2020-09-19'),
(7, 'Inevitable desastre', 11, 12, 8, 1, 10, 'Estante 1', 'No presenta novedad', '2020-09-19'),
(8, 'El día que se predió la cordura', 3, 12, 8, 1, 9, 'Estante 1', 'No presenta novedad', '2020-09-19'),
(9, 'Hush hush', 22, 11, 8, 1, 10, 'Estante 1', 'No presenta novedad', '2020-09-19'),
(10, 'La chica del tren', 4, 10, 8, 1, 10, 'Estante 1', 'No presenta novedad', '2020-09-19'),
(11, 'Big Data', 14, 3, 7, 1, 10, 'Estante 2', 'No presenta novedad', '2020-09-19'),
(12, 'Consultas en Excel', 15, 3, 7, 1, 10, 'Estante 2', 'No presenta novedad', '2020-09-19'),
(13, 'Aplicaciones BVA con Excel', 3, 9, 7, 1, 10, 'Estante 2', 'No presenta novedad', '2020-09-19'),
(14, 'Access 2016', 16, 3, 7, 1, 10, 'Estante 2', 'No presenta novedad', '2020-09-19'),
(15, 'C++ Lo básico que debe saber', 17, 8, 7, 1, 10, 'Estante 2', 'No presenta novedad', '2020-09-19'),
(16, 'Java y C++ Paso a paso', 18, 8, 7, 1, 10, 'Estante 2', 'No presenta novedad', '2020-09-19'),
(17, 'Framework de Spring', 19, 8, 7, 1, 10, 'Estante 2', 'No presenta novedad', '2020-09-19'),
(18, 'Modelos financieros con Excel', 20, 7, 7, 1, 10, 'Estante 2', 'No presenta novedad', '2020-09-19'),
(19, 'Otorrinolaringología básica', 21, 6, 6, 1, 5, 'Estante 3', 'No presenta novedad', '2020-09-19'),
(20, 'Matematicas Basicas', 1, 2, 5, 1, 28, 'Estante 4', 'No presenta novedad', '2020-09-16'),
(21, 'Literatura Clasica', 2, 3, 8, 1, 15, 'Estante 1', 'No presenta novedad', '2020-09-16'),
(22, 'Fisica 1', 3, 4, 1, 0, 5, 'Estante 5', 'No presenta novedad', '2020-09-16'),
(23, 'Historia de Colombia', 4, 5, 3, 1, 15, '', 'No presenta novedad', '2020-09-16'),
(24, 'Quimica 1', 5, 6, 1, 1, 15, 'Estante 5', 'No presenta novedad', '2020-09-16'),
(25, 'Matematicas 2', 1, 2, 5, 1, 15, 'Estante 4', 'No presenta novedad', '2020-09-16'),
(26, 'Quimica 2', 2, 6, 1, 1, 15, 'Estante 5', 'No presenta novedad', '2020-09-16'),
(27, 'Historia de America', 3, 5, 3, 1, 15, 'Estante 4', 'No presenta novedad', '2020-09-16'),
(28, 'Biologia General', 4, 3, 1, 1, 15, 'Estante 6', 'No presenta novedad', '2020-09-16'),
(29, 'Fisica 2', 5, 4, 1, 1, 15, 'Estante 5', 'No presenta novedad', '2020-09-16'),
(30, 'Matematicas 3', 3, 2, 5, 1, 15, 'Estante 4', 'No presenta novedad', '2020-09-16'),
(31, 'Fisica 3', 3, 4, 1, 1, 15, 'Estante 5', 'No presenta novedad', '2020-09-16'),
(32, 'Educación fisica', 5, 4, 2, 1, 30, 'Estante 7', 'No presenta novedad', '2020-09-16'),
(33, 'TRANSACT SQL', 8, 7, 3, 1, 15, 'Estante 2', 'Aumenta stock', '2020-10-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multas`
--

CREATE TABLE `multas` (
  `id_multa` int(5) NOT NULL,
  `fo_administrador` int(11) NOT NULL,
  `fo_usuario` int(11) NOT NULL,
  `observaciones` varchar(200) CHARACTER SET utf8 NOT NULL,
  `fecha_activacion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `multas`
--

INSERT INTO `multas` (`id_multa`, `fo_administrador`, `fo_usuario`, `observaciones`, `fecha_activacion`) VALUES
(1, 1, 3, 'No entrega a tiempo.', '2020-10-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paz_y_salvo`
--

CREATE TABLE `paz_y_salvo` (
  `id_paz_y_salvo` int(5) NOT NULL,
  `fo_usuario` int(11) NOT NULL,
  `fo_administrador` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id_prestamos` int(11) NOT NULL,
  `fecha_pres` date NOT NULL,
  `fecha_venc` date NOT NULL,
  `fo_usuario` int(11) NOT NULL,
  `fo_libro` int(11) NOT NULL,
  `fo_administrador` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id_prestamos`, `fecha_pres`, `fecha_venc`, `fo_usuario`, `fo_libro`, `fo_administrador`, `estado`) VALUES
(1, '2020-04-01', '2020-04-05', 1, 1, 1, 1),
(2, '2020-04-01', '2020-04-02', 9, 2, 1, 1),
(3, '2020-04-01', '2020-04-04', 8, 3, 1, 1),
(4, '2020-04-02', '2020-04-03', 7, 4, 2, 1),
(5, '2020-04-02', '2020-04-04', 6, 5, 2, 1),
(6, '2020-04-02', '2020-04-05', 5, 6, 2, 1),
(7, '2020-04-02', '2020-04-06', 4, 7, 3, 1),
(8, '2020-04-03', '2020-04-04', 3, 8, 3, 1),
(9, '2020-04-03', '2020-04-07', 2, 9, 3, 1),
(10, '2020-08-15', '2020-08-16', 1, 1, 1, 1),
(11, '0000-00-00', '0000-00-00', 1, 1, 1, 1),
(12, '2020-08-15', '2020-08-16', 1, 1, 1, 1),
(13, '2020-08-16', '2020-08-30', 1, 1, 1, 1),
(14, '2020-08-16', '2020-08-31', 1, 1, 1, 1);

--
-- Disparadores `prestamos`
--
DELIMITER $$
CREATE TRIGGER `prestamos_BEFORE_INSERT` BEFORE INSERT ON `prestamos` FOR EACH ROW BEGIN
	UPDATE libro
    SET num_ejemplares = num_ejemplares - 1
    WHERE id_libro = new.fo_libro;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `identificación` varchar(20) CHARACTER SET utf8 NOT NULL,
  `telefono` int(11) NOT NULL,
  `ciudad` varchar(50) CHARACTER SET utf8 NOT NULL,
  `dirección` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `fo_ciudad` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre`, `identificación`, `telefono`, `ciudad`, `dirección`, `email`, `fo_ciudad`, `estado`) VALUES
(2, 'Ricardo', '110563321', 2147483647, 'Cali', 'carrera 8 #5-14', 'ricardo@gmail.com', 4, 1),
(3, 'Mario', '1123345223', 2147483647, 'Medellin', 'calle 9 #25-41', 'mario@gmail.com', 2, 1),
(4, 'Clara', '100155511', 2147483647, 'Pereira', 'calle 3 #15-11', 'clara@gmail.com', 3, 1),
(5, 'Ana', '265651412', 2147483647, 'Manizales', 'calle 6 #05-21', 'ana@gmail.com', 5, 1),
(6, 'Victor', '102388623', 2147483647, 'Bogotá', 'carrera 5 calle 1 #21-04', 'victor@gmail.com', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(255) CHARACTER SET utf8 NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_usuario` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `genero` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `edad` int(2) NOT NULL,
  `telefono` varchar(11) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `dirección` varchar(100) CHARACTER SET utf8 NOT NULL,
  `tipo_Id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `identificación` bigint(11) NOT NULL,
  `fecha_activacion` date DEFAULT current_timestamp(),
  `estado_usuario` int(1) DEFAULT NULL,
  `paz_y_salvo` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombres`, `apellidos`, `tipo_usuario`, `genero`, `edad`, `telefono`, `email`, `dirección`, `tipo_Id`, `identificación`, `fecha_activacion`, `estado_usuario`, `paz_y_salvo`) VALUES
(1, 'Karen', 'Parra Torres	', 'Estudiante', 'F', 16, '3112004418', 'karen@gmail.com', 'calle 4', 'Tarjeta de identidad', 11224241, '2020-10-12', 0, 'S'),
(2, 'Julio Cesar', 'Torres Lopez', 'Docente', 'M', 42, '3135524456', 'julio@gmail.com', 'calle 10', 'Cedula', 2645511, '2020-10-12', 1, 'S'),
(3, 'Erick Kaled', 'Rodriguez Caviedes', 'Estudiante', 'M', 17, '3026864159', 'Erick_Kaled@hotmail.com', 'Calle Falsa # 123 Sur', 'Tarjeta de Identidad', 1118380419, '2020-10-11', 1, 'S'),
(4, 'Erick Kaled', 'Rodriguez Caviedes', 'Estudiante', 'M', 17, '3026864159', 'Erick_Kaled@hotmail.com', 'calle 01', 'Tarjeta de Identidad', 1118380419, '2020-10-11', 1, 'S'),
(5, 'Juan Jose', 'River Polo', 'Estudiante', 'M', 18, '3063022057', 'Juan_Jose@hotmail.com', 'calle 02', 'Cedula', 11167945886, '2020-10-11', 1, 'S'),
(6, 'Jose Manuel', 'Ortiz Vargas', 'Estudiante', 'M', 13, '3072202104', 'Jose_Manuel@hotmail.com', 'calle 03', 'Tarjeta de Identidad', 1118381067, '2020-10-11', 1, 'S'),
(7, 'Aleiha Sofia', 'Cuellar Agudelo', 'Estudiante', 'F', 17, '3126519231', 'Aleiha_Sofia@hotmail.com', 'calle 04', 'Tarjeta de Identidad', 1118381779, '2020-10-11', 1, 'S'),
(8, 'Lian Alexander', 'Ortiz Gozales', 'Estudiante', 'M', 13, '3050874158', 'Lian_Alexander@hotmail.com', 'calle 05', 'Tarjeta de Identidad', 1117945112, '2020-10-11', 1, 'S'),
(9, 'Eimy Nohelia', 'Lara Palomino', 'Estudiante', 'F', 13, '3137983967', 'Eimy_Nohelia@hotmail.com', 'calle 06', 'Tarjeta de Identidad', 1118380674, '2020-10-11', 1, 'S'),
(10, 'Marco Daniel', 'Lara Cabrera', 'Estudiante', 'M', 18, '3038866644', 'Marco_Daniel@gmail.com', 'calle 07', 'Cedula', 1117945596, '2020-10-11', 1, 'S'),
(11, 'Salome Diaz', 'Murcia ', 'Estudiante', 'F', 12, '3190643364', 'Salome_Diaz@gmail.com', 'calle 08', 'Tarjeta de Identidad', 1118380205, '2020-10-11', 1, 'S'),
(12, 'Dylan Msthias', 'Alvira Montilla', 'Estudiante', 'M', 17, '3007941544', 'Dylan_Msthias@gmail.com', 'calle 09', 'Tarjeta de Identidad', 1117944643, '2020-10-11', 1, 'S'),
(13, 'Mathias Sanchez', 'Lopez ', 'Estudiante', 'M', 13, '3063346828', 'Mathias_Sanchez@gmail.com', 'calle 10', 'Tarjeta de Identidad', 1118381007, '2020-10-11', 1, 'S'),
(14, 'Emily Valentina', 'Cuero Ortega', 'Estudiante', 'F', 15, '3042339891', 'Emily_Valentina@gmail.com', 'calle 11', 'Tarjeta de Identidad', 1117556807, '2020-10-11', 1, 'S'),
(15, 'Emili Yuliana', 'Hermida Medina', 'Estudiante', 'F', 17, '3005774936', 'Emili_Yuliana@gmail.com', 'calle 12', 'Tarjeta de Identidad', 1117945038, '2020-10-11', 1, 'S'),
(16, 'Luiza Fernanda', 'Puello Castro', 'Estudiante', 'F', 15, '3227050261', 'Luiza_Fernanda@hotmail.com', 'calle 13', 'Tarjeta de Identidad', 1117556721, '2020-10-11', 1, 'S'),
(17, 'Erick Yulian', 'Muñoz Calderon', 'Estudiante', 'M', 18, '3096673509', 'Erick_Yulian@hotmail.com', 'calle 14', 'Cedula', 1118381309, '2020-10-11', 1, 'S'),
(18, 'Emmanuel Caviedes', 'Muñoz ', 'Estudiante', 'M', 16, '3082376345', 'Emmanuel_Caviedes@hotmail.com', 'calle 15', 'Tarjeta de Identidad', 1077738127, '2020-10-11', 1, 'S'),
(19, 'Mailen Sofia', 'Muñoz Hutado', 'Estudiante', 'F', 17, '3177557161', 'Mailen_Sofia@hotmail.com', 'calle 16', 'Tarjeta de Identidad', 1118381941, '2020-10-11', 1, 'S'),
(20, 'Estefania Escobar', 'Figueroa ', 'Estudiante', 'F', 14, '3027509297', 'Estefania_Escobar@hotmail.com', 'calle 17', 'Tarjeta de Identidad', 1029568764, '2020-10-11', 1, 'S'),
(21, 'Angie Alejandra', 'Ramirez Rodriguez', 'Estudiante', 'F', 14, '3173093200', 'Angie_Alejandra@hotmail.com', 'calle 18', 'Tarjeta de Identidad', 1029568606, '2020-10-11', 1, 'S'),
(22, 'Valentina Trujillo', 'Ledesma ', 'Estudiante', 'F', 13, '3152560040', 'Valentina_Trujillo@gmail.com', 'calle 19', 'Tarjeta de Identidad', 1117946000, '2020-10-11', 1, 'S'),
(23, 'Katrin Nalieth', 'Palomino Gutierrez', 'Estudiante', 'F', 14, '3110895184', 'Katrin_Nalieth@gmail.com', 'calle 20', 'Tarjeta de Identidad', 1117943771, '2020-10-11', 1, 'S'),
(24, 'Herney Rovis', 'Salazar ', 'Estudiante', 'M', 15, '3047388205', 'Herney_Rovis@gmail.com', 'calle 21', 'Tarjeta de Identidad', 1118381453, '2020-10-11', 1, 'S'),
(25, 'Emmanuelsantiago Agudelo', 'Rivera ', 'Estudiante', 'M', 15, '3053105920', 'Emmanuelsantiago_Agudelo@gmail.com', 'calle 22', 'Tarjeta de Identidad', 1117944293, '2020-10-11', 1, 'S'),
(26, 'Eric Matias', 'Espitia Perez', 'Estudiante', 'M', 17, '3206753967', 'Eric_Matias@gmail.com', 'calle 23', 'Tarjeta de Identidad', 1117556446, '2020-10-11', 1, 'S'),
(27, 'Juan Pablo', 'Ayala Zambrano', 'Estudiante', 'M', 16, '3050877620', 'Juan_Pablo@gmail.com', 'calle 24', 'Tarjeta de Identidad', 1118381064, '2020-10-11', 1, 'S'),
(28, 'Dehiberson Mauricio', 'Molano ', 'Estudiante', 'M', 15, '3154809142', 'Dehiberson_Mauricio@gmail.com', 'calle 25', 'Tarjeta de Identidad', 1109423285, '2020-10-11', 1, 'S');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`id_editorial`),
  ADD KEY `fo_proveedor` (`fo_proveedor`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `libro_ibfk_1` (`fo_editorial`),
  ADD KEY `libro_ibfk_2` (`fo_autor`),
  ADD KEY `libro_ibfk_3` (`fo_categoria`);

--
-- Indices de la tabla `multas`
--
ALTER TABLE `multas`
  ADD PRIMARY KEY (`id_multa`),
  ADD KEY `fo_administrador` (`fo_administrador`),
  ADD KEY `fo_usuario` (`fo_usuario`);

--
-- Indices de la tabla `paz_y_salvo`
--
ALTER TABLE `paz_y_salvo`
  ADD PRIMARY KEY (`id_paz_y_salvo`),
  ADD UNIQUE KEY `fo_usuario` (`fo_usuario`),
  ADD UNIQUE KEY `fo_administrador` (`fo_administrador`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id_prestamos`) USING BTREE,
  ADD KEY `fo_usuario` (`fo_usuario`),
  ADD KEY `fo_libro` (`fo_libro`),
  ADD KEY `fo_administrador` (`fo_administrador`),
  ADD KEY `Idx_Id_prestamos` (`id_prestamos`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD KEY `fo_ciudad` (`fo_ciudad`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `id_editorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `multas`
--
ALTER TABLE `multas`
  MODIFY `id_multa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `paz_y_salvo`
--
ALTER TABLE `paz_y_salvo`
  MODIFY `id_paz_y_salvo` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id_prestamos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD CONSTRAINT `editorial_ibfk_1` FOREIGN KEY (`fo_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`fo_editorial`) REFERENCES `editorial` (`id_editorial`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `libro_ibfk_2` FOREIGN KEY (`fo_autor`) REFERENCES `autor` (`id_autor`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `libro_ibfk_3` FOREIGN KEY (`fo_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
