-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2021 a las 21:42:00
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `memorytest`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `idImagenes` int(11) UNSIGNED NOT NULL,
  `secuencias_idSecuencias` int(11) UNSIGNED NOT NULL,
  `ruta` varchar(45) DEFAULT NULL COMMENT 'donde está almacenada la imagen.',
  `resolucion` varchar(9) DEFAULT NULL COMMENT '999x999 resolucion maxima'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `investigador`
--

CREATE TABLE `investigador` (
  `ifk_idInvestigador_login` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `apellidoPaterno` varchar(40) DEFAULT NULL,
  `apellidoMaterno` varchar(40) DEFAULT NULL,
  `telefonoDeContacto` varchar(20) DEFAULT NULL COMMENT 'No el personal, el del trabajo\n+52 (646) 123 44 55\n19 caracteres contando espacios.',
  `institucion` varchar(145) NOT NULL COMMENT 'Debe comprobarse que exista',
  `direcciónDeInstitucion` varchar(125) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL COMMENT 'En donde trabaja',
  `especialidad` varchar(45) DEFAULT NULL COMMENT 'En donde trabaja',
  `correo` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `investigador`
--

INSERT INTO `investigador` (`ifk_idInvestigador_login`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `telefonoDeContacto`, `institucion`, `direcciónDeInstitucion`, `ciudad`, `especialidad`, `correo`) VALUES
(20, 'Oscar1', NULL, NULL, NULL, 'UABC1', NULL, NULL, NULL, 'prueba@prueba1.com'),
(21, 'Oscar2', NULL, NULL, NULL, 'UABC2', NULL, NULL, NULL, 'prueba@prueba2.com'),
(22, 'Picos1', NULL, NULL, NULL, 'UABC1', NULL, NULL, NULL, 'prueba@prueba3.com'),
(23, 'Alexander', NULL, NULL, NULL, 'UABC4', NULL, NULL, NULL, 'prueba@prueba4.com'),
(24, 'Alguien', NULL, NULL, NULL, 'Institucion5555', NULL, NULL, NULL, 'correo@correo.mc'),
(25, 'PRUEBA#2', NULL, NULL, NULL, 'Aguito', NULL, NULL, NULL, 'AlgoCHIDO@Chido.no'),
(26, 'Alexander4', NULL, NULL, NULL, 'UABC', NULL, NULL, NULL, 'AlgoCHIDO@Chido.no2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `investigador_login`
--

CREATE TABLE `investigador_login` (
  `idInvestigador_login` int(11) UNSIGNED NOT NULL,
  `pasword` blob NOT NULL COMMENT 'contraseña cifrada con AES',
  `correo` varchar(80) NOT NULL COMMENT 'correo electronico, obligatorio',
  `ultimaConexion` datetime DEFAULT NULL COMMENT 'para actualizar INSERT INTO investigador_login(ultimaConexion) VALUES (NOW());',
  `nombre` varchar(45) NOT NULL DEFAULT '.',
  `institucion` varchar(145) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `investigador_login`
--

INSERT INTO `investigador_login` (`idInvestigador_login`, `pasword`, `correo`, `ultimaConexion`, `nombre`, `institucion`) VALUES
(20, 0x3e3d5d07c896c4c982297e108c86a9c627142cf21c4f803e63ea84e1752f92979631391456d533fd0d227cf6643c592245930d659dd5e377bd7f20273b3d20c4, 'prueba@prueba1.com', '2021-05-09 17:36:29', 'Oscar1', 'UABC1'),
(21, 0x911a22a060f437247041fe9646e6292733ae6a2432aa389a923910b214844a07e715f869752b9b97a067d612618e4c952c9705e1556d01128583ba699f1b0dff, 'prueba@prueba2.com', '2021-05-09 17:36:55', 'Oscar2', 'UABC2'),
(22, 0xb11f447ccf52269e4dafe2fdb1eaca99844202e3bc9085a9313b31b11dfc7f5502b4abf0b0236eb204ccbe85048ac290cfafaa2c4864753ec104b9deb0fb39c0, 'prueba@prueba3.com', '2021-05-09 17:37:10', 'Picos1', 'UABC1'),
(23, 0xed8e17f6b13717fc5d64c264b181719e6cec960e90b3328e082c7515fad13fc9a9b83c76a469fba9ec30e42d1c376c8eeba70ee8e8fc4dc9a776e23a426170d5, 'prueba@prueba4.com', '2021-05-09 17:37:33', 'Alexander', 'UABC4'),
(24, 0x101d4d7f02086f3c5725ddd34d432fbd83bfb9754d907e6e7b2ca2e1285c8b146671f7f697053d6d2ea449279b78c3a7591b82f77c4e27f5d3d522e43aaf80fe, 'correo@correo.mc', '2021-05-17 23:09:27', 'Alguien', 'Institucion5555'),
(25, 0x09ae02e1d016cf8b87e86f0ffdf1d30951d0a9b5ff4d7e8b4b19f4e6f320daa9218daa4ed4f9f1ab2169c65916cbdacb8e9403964ae623fcf4c804aecd059e71, 'AlgoCHIDO@Chido.no', '2021-05-17 23:22:50', 'PRUEBA#2', 'Aguito'),
(26, 0x31b5ff749c2227d293a450b49554286fa2e18848ff84e137d132c9198fe53c5552d077555d6f3f58bd8fb8d7ae73c875e2964d2ff90a65964d419fa7b29e7050, 'AlgoCHIDO@Chido.no2', '2021-05-17 23:34:20', 'Alexander4', 'UABC');

--
-- Disparadores `investigador_login`
--
DELIMITER $$
CREATE TRIGGER `paseDatos` AFTER INSERT ON `investigador_login` FOR EACH ROW INSERT INTO investigador(
ifk_idInvestigador_login,
    nombre,
    institucion,
    correo)
VALUES(new.idInvestigador_login,
       new.nombre, 
       new.institucion, 
       new.correo)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `paciente_login_idPaciente_login` int(11) UNSIGNED NOT NULL,
  `investigador_ifk_idInvestigador_login` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidoPaterno` varchar(50) DEFAULT NULL,
  `apellidoMaterno` varchar(50) DEFAULT NULL,
  `correoE` varchar(80) NOT NULL,
  `telefonoDeContacto` varchar(20) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `investigador_idInvestigador` int(11) NOT NULL COMMENT 'El investigador asignado',
  `sexo` char(1) DEFAULT NULL COMMENT 'M para mujer\nH para hombre',
  `fechaNacimiento` date DEFAULT NULL COMMENT 'Se puede llenar con INSERT INTO paciente (fechaNacimiento) VALUES (''03-05-21'') entre comillas, el año puede ponerse completo. el mes va en el medio.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`paciente_login_idPaciente_login`, `investigador_ifk_idInvestigador_login`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `correoE`, `telefonoDeContacto`, `ciudad`, `investigador_idInvestigador`, `sexo`, `fechaNacimiento`) VALUES
(1, 20, 'Juan', 'Dominguez', 'Algo', 'paciente@correo.com', '6461928877', 'Ensenada', 20, 'H', '1955-08-07'),
(27, 20, 'Ariel', 'Camacho', NULL, 'correo@paciente2.com', NULL, 'Tijuana', 20, 'H', '1998-05-14'),
(28, 20, 'Josefina', 'Vazquez', NULL, 'correo@paciente3.com', NULL, 'Mexicali', 20, 'M', '1998-02-16'),
(29, 20, 'Sor Juana', 'De la Cruz', NULL, 'correo@paciente4.com', NULL, 'Ensenada', 20, 'H', '1972-06-07'),
(30, 20, 'Angel David', 'Revilla', NULL, 'correo@paciente5.com', NULL, 'Ensenada', 20, 'H', '1985-06-07'),
(31, 20, 'Alonso', 'Quijana', NULL, 'correo@paciente6.com', NULL, 'Ensenada', 20, 'H', '1985-06-07'),
(32, 20, 'Hernan', 'Cortéz', NULL, 'correo@paciente7.com', NULL, 'Ensenada', 20, 'H', '1985-06-07'),
(33, 20, 'Linus', 'Torvalds', NULL, 'correo@paciente8.com', NULL, 'CDMX', 20, 'H', '1969-12-28'),
(34, 20, 'Simon', 'Bolibar', NULL, 'correo@paciente9.com', NULL, 'Rosarito', 20, 'H', '1969-12-28'),
(35, 20, 'Simon', 'Bolibar', NULL, 'correo@paciente10.com', NULL, 'Rosarito', 20, 'H', '1969-12-28'),
(36, 22, 'Linus', 'Torvalds', NULL, 'correo@linus.com', NULL, 'CDMX', 22, 'H', '1969-12-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente_login`
--

CREATE TABLE `paciente_login` (
  `idPaciente_login` int(11) UNSIGNED NOT NULL,
  `pasword` blob NOT NULL COMMENT 'contraseña cifrada con AES',
  `correo` varchar(80) NOT NULL COMMENT 'correo electronico, obligatorio',
  `ultimaConexion` datetime DEFAULT NULL COMMENT 'para actualizar INSERT INTO paciente_login(ultimaConexion) VALUES (NOW());',
  `nombre` varchar(45) DEFAULT 'NombrePaciente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente_login`
--

INSERT INTO `paciente_login` (`idPaciente_login`, `pasword`, `correo`, `ultimaConexion`, `nombre`) VALUES
(1, 0x3e3d5d07c896c4c982297e108c86a9c627142cf21c4f803e63ea84e1752f92979631391456d533fd0d227cf6643c592245930d659dd5e377bd7f20273b3d20c4, 'paciente@correo.com', '2021-05-23 01:33:12', 'NombrePaciente'),
(27, 0x53526f8340d456dfe7ecacc2b54fe26993ecd86e532cdf7bc7fd2d33a6f8fad08e787d9325ea68dae1f17d378b4a34311f703ac74cfed9d899cde6a8aa4da3a5, 'correo@paciente2.com', '2021-05-23 17:07:34', 'Ariel'),
(28, 0xa6d609184f30e57466baabee311f3fa3002064caac40372863fdf7a225e544a84cb30f432106b8695f49faa70a2c201179a5aa4e014f31af186e85d797f23ae1, 'correo@paciente3.com', '2021-05-23 17:11:57', 'Josefina'),
(29, 0xb604b7fd4e6c4dfc01c0568e466b1d65d57aa0c287f13fa2f749805fe59b5fcff8f967300d66c35f9217e6b493810cf0d6b1ae6fe6f84529ff9af1f4d5e0388f, 'correo@paciente4.com', '2021-05-23 17:26:31', 'Sor Juana'),
(30, 0xef3902be11b293c742a5ad92e36c18eb036beff588a851574477278d45ae96c586b89d8cf6d70d8e6c8211d43a7ec831d35bdf495d5ef891c73be9aa6df76ca7, 'correo@paciente5.com', '2021-05-23 17:27:12', 'Angel David'),
(31, 0xf51f0904e47e043be1c4cbb106f0ee24849d4eacfe95fb49e31a61c413f90ef67abf3cb40f914c3f67493d26accc89c399b9cdc09a7d0d6de49a08f3adbaf66a, 'correo@paciente6.com', '2021-05-23 17:28:02', 'Alonso'),
(32, 0x346df03fac7f99f946bda5ecb5c7c794e4aba7b3dff7f6925fbfc249a6f2049638742aee899b33fac2c12752ea1a7931f0d2730c874b6d87a790fa249f3c9b9c, 'correo@paciente7.com', '2021-05-23 17:28:40', 'Hernan'),
(33, 0x7294b5debbaf6083046bd31d91127b1e36da43ccdcb4421af266f54fd5d12a57b313ff709ed5f88cd13441e6e7e230dcd31edacac1ae4086eb6471a78d81bfdb, 'correo@paciente8.com', '2021-05-23 17:30:26', 'Linus'),
(34, 0x46e6da8783de5ecad34c83171c3cb413fd99ddc6cbd08fc734587e1a8b6b949c683974690157a546ad22249c42c1615222f4a2b2fc38fca9bbf96ccf3a802d5a, 'correo@paciente9.com', '2021-05-23 17:31:36', 'Simon'),
(35, 0x74434930242cb90b0cd400e4a733b70bfd9ecd072170b99df703b5ce701bb2601c6109677bf95929f53f72233592cb71fa359e93896c07c3d5e7c55ce90f54ec, 'correo@paciente10.com', '2021-05-23 17:32:10', 'Simon'),
(36, 0xfb0cc6e7979f1866649fc264a71f14f50e081bcac210569e4dbc41d867e5b9318808dfb83c500d268d685e27a3c865e7b4c8c00719633084e1466f1d69019dd1, 'correo@linus.com', '2021-05-23 17:34:44', 'Linus');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `idResultados` int(11) UNSIGNED NOT NULL,
  `secuencias_idSecuencias` int(11) UNSIGNED NOT NULL,
  `paciente_login_idPaciente_login` int(11) UNSIGNED NOT NULL,
  `tiempoTotal` time NOT NULL,
  `cantidadAsiertos` tinyint(2) UNSIGNED NOT NULL COMMENT 'maximos asiertos 99 ',
  `detalles` varchar(480) NOT NULL COMMENT 'Aca va el id de la imagen, si ha acertado o fallado y cuanto tiempo tardo en contestar. sep, mucho espacio necesita.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secuencias`
--

CREATE TABLE `secuencias` (
  `idSecuencia` int(11) UNSIGNED NOT NULL,
  `investigador_login_idInvestigador_login` int(11) UNSIGNED NOT NULL,
  `nombreSecuencia` varchar(45) DEFAULT NULL,
  `fechaDeCreacion` datetime NOT NULL,
  `fechaUltimaModificacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `secuencias`
--

INSERT INTO `secuencias` (`idSecuencia`, `investigador_login_idInvestigador_login`, `nombreSecuencia`, `fechaDeCreacion`, `fechaUltimaModificacion`) VALUES
(2, 22, 'Secuencia Nueva', '2021-05-25 00:00:10', NULL),
(3, 22, 'Secuencia Nueva', '2021-05-25 00:00:16', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`idImagenes`),
  ADD KEY `fk_imagenes_secuencias1_idx` (`secuencias_idSecuencias`);

--
-- Indices de la tabla `investigador`
--
ALTER TABLE `investigador`
  ADD PRIMARY KEY (`ifk_idInvestigador_login`),
  ADD UNIQUE KEY `ifk_idInvestigador_login_UNIQUE` (`ifk_idInvestigador_login`),
  ADD UNIQUE KEY `correp_UNIQUE` (`correo`),
  ADD KEY `fk_investigador_investigador_login1_idx` (`ifk_idInvestigador_login`);

--
-- Indices de la tabla `investigador_login`
--
ALTER TABLE `investigador_login`
  ADD PRIMARY KEY (`idInvestigador_login`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`paciente_login_idPaciente_login`),
  ADD UNIQUE KEY `correoE_UNIQUE` (`correoE`),
  ADD UNIQUE KEY `paciente_login_idPaciente_login_UNIQUE` (`paciente_login_idPaciente_login`),
  ADD KEY `fk_paciente_paciente_login1_idx` (`paciente_login_idPaciente_login`),
  ADD KEY `fk_paciente_investigador1_idx` (`investigador_ifk_idInvestigador_login`);

--
-- Indices de la tabla `paciente_login`
--
ALTER TABLE `paciente_login`
  ADD PRIMARY KEY (`idPaciente_login`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`idResultados`),
  ADD KEY `fk_resultados_secuencias1_idx` (`secuencias_idSecuencias`),
  ADD KEY `fk_resultados_paciente_login1_idx` (`paciente_login_idPaciente_login`);

--
-- Indices de la tabla `secuencias`
--
ALTER TABLE `secuencias`
  ADD PRIMARY KEY (`idSecuencia`),
  ADD KEY `fk_secuencias_investigador_login1_idx` (`investigador_login_idInvestigador_login`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `idImagenes` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `investigador`
--
ALTER TABLE `investigador`
  MODIFY `ifk_idInvestigador_login` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `investigador_login`
--
ALTER TABLE `investigador_login`
  MODIFY `idInvestigador_login` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `paciente_login`
--
ALTER TABLE `paciente_login`
  MODIFY `idPaciente_login` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `secuencias`
--
ALTER TABLE `secuencias`
  MODIFY `idSecuencia` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `fk_imagenes_secuencias1` FOREIGN KEY (`secuencias_idSecuencias`) REFERENCES `secuencias` (`idSecuencia`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `investigador`
--
ALTER TABLE `investigador`
  ADD CONSTRAINT `fk_investigador_investigador_login1` FOREIGN KEY (`ifk_idInvestigador_login`) REFERENCES `investigador_login` (`idInvestigador_login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `fk_paciente_investigador1` FOREIGN KEY (`investigador_ifk_idInvestigador_login`) REFERENCES `investigador` (`ifk_idInvestigador_login`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_paciente_paciente_login1` FOREIGN KEY (`paciente_login_idPaciente_login`) REFERENCES `paciente_login` (`idPaciente_login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD CONSTRAINT `fk_resultados_paciente_login1` FOREIGN KEY (`paciente_login_idPaciente_login`) REFERENCES `paciente_login` (`idPaciente_login`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_resultados_secuencias1` FOREIGN KEY (`secuencias_idSecuencias`) REFERENCES `secuencias` (`idSecuencia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `secuencias`
--
ALTER TABLE `secuencias`
  ADD CONSTRAINT `fk_secuencias_investigador_login1` FOREIGN KEY (`investigador_login_idInvestigador_login`) REFERENCES `investigador_login` (`idInvestigador_login`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
