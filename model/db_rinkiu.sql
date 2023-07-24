-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-07-2023 a las 04:59:29
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_rinkiu`
--
CREATE DATABASE IF NOT EXISTS `db_rinkiu` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `db_rinkiu`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `sp_actualizar_empleado`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_empleado` (IN `empleado` INT, IN `nombre` VARCHAR(50), IN `rol` VARCHAR(50))   BEGIN 
UPDATE empleados set nombre_empleado = nombre, rol_empleado = rol WHERE no_empleado= empleado;
END$$

DROP PROCEDURE IF EXISTS `sp_borrar_empleado`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_borrar_empleado` (IN `empleado` INT)   BEGIN
DELETE from empleados WHERE no_empleado = empleado;
END$$

DROP PROCEDURE IF EXISTS `sp_borrar_movimiento`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_borrar_movimiento` (IN `empleado` INT, IN `mes` DATE)   BEGIN 
    DELETE from movimientos WHERE no_empleado = empleado and fecha = mes;
END$$

DROP PROCEDURE IF EXISTS `sp_insertar_empleado`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_empleado` (IN `numero` INT, IN `nombre` VARCHAR(255), IN `rol` VARCHAR(50))   BEGIN
    INSERT INTO empleados VALUES (numero, nombre, rol);
END$$

DROP PROCEDURE IF EXISTS `sp_insertar_movimiento`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_movimiento` (IN `no_empleado` INT, IN `fecha` DATE, IN `entregas` INT)   BEGIN
    DECLARE rol VARCHAR(50);
    DECLARE horas INT;
    DECLARE bonos INT;
    DECLARE bonoentregas INT;
    DECLARE retenciones DOUBLE;
    DECLARE vales DOUBLE;
    DECLARE sueldoB DOUBLE;
    DECLARE sueldoN DOUBLE;
    
    SET horas = 196;
    SET bonoentregas = entregas * 5;
    
    SELECT max(rol_empleado) INTO rol FROM empleados e WHERE e.no_empleado = no_empleado;
    
    IF rol = 'auxiliar' THEN
        SET bonos = 0;
    ELSEIF rol = 'chofer' THEN
        SET bonos = horas * 10;
    ELSEIF rol = 'cargador' THEN
        SET bonos = horas * 5;
    END IF;
    
    SELECT vales INTO vales FROM movimientos WHERE no_empleado = no_empleado;
    SET vales = 5880 * 0.04;
    
    SET sueldoB = 5580 + bonos + bonoentregas + vales;
    
    IF sueldoB > 10000 THEN 
        SET retenciones = sueldoB * 0.12;
    ELSE 
        SET retenciones = sueldoB * 0.09;
    END IF;
    
    SET sueldoN = sueldoB - retenciones;
    
    INSERT INTO movimientos (no_empleado, horas_trabajadas, pagoxentregas, pagoxbonos, retenciones, vales, sueldo_neto, sueldo_bruto, fecha)
    VALUES (no_empleado, horas, bonoentregas, bonos, retenciones, vales, sueldoN, sueldoB, fecha);
END$$

DROP PROCEDURE IF EXISTS `sp_insertar_movimiento2`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_movimiento2` (IN `no_empleado` INT, IN `fecha` DATE, IN `entregas` INT)   BEGIN
    DECLARE rol VARCHAR(50);
    DECLARE horas INT;
    DECLARE bonos INT;
    DECLARE bonoentregas INT;
    DECLARE retenciones DOUBLE;
    DECLARE vales DOUBLE;
    DECLARE sueldoB DOUBLE;
    DECLARE sueldoN DOUBLE;
    
    SET horas = 196;
    SET bonoentregas = entregas * 5;
    
    SELECT MAX(rol_empleado) INTO rol FROM empleados e WHERE e.no_empleado = no_empleado;
    
    IF rol = 'auxiliar' THEN
        SET bonos = 0;
    ELSEIF rol = 'chofer' THEN
        SET bonos = horas * 10;
    ELSEIF rol = 'cargador' THEN
        SET bonos = horas * 5;
    END IF;
    
    SET vales = 5880 * 0.04;
    
    SET sueldoB = 5580 + bonos + bonoentregas + vales;
    
    IF sueldoB > 10000 THEN 
        SET retenciones = sueldoB * 0.12;
    ELSE 
        SET retenciones = sueldoB * 0.09;
    END IF;
    
    SET sueldoN = sueldoB - retenciones;
    
    INSERT INTO movimientos (no_empleado, horas_trabajadas, pagoxentregas, pagoxbonos, retenciones, vales, sueldo_neto, sueldo_bruto, fecha, rol_empleado)
    VALUES (no_empleado, horas, bonoentregas, bonos, retenciones, vales, sueldoN, sueldoB, fecha,rol);
END$$

DROP PROCEDURE IF EXISTS `sp_mostrar_movimientos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mostrar_movimientos` ()   BEGIN
    SELECT e.no_empleado, e.nombre_empleado, m.rol_empleado, m.horas_trabajadas, m.pagoxentregas, 
           m.pagoxbonos, m.retenciones, m.vales, 5760 as sueldobruto, 
           (5760+m.pagoxentregas+m.pagoxbonos+m.vales-m.retenciones) as sueldoneto, m.fecha
    FROM movimientos m 
    INNER JOIN empleados e ON e.no_empleado = m.no_empleado
    ORDER BY e.no_empleado;
END$$

DROP PROCEDURE IF EXISTS `sp_mostrar_movimientos2`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mostrar_movimientos2` (IN `mes` DATE)   BEGIN
    SELECT e.no_empleado, e.nombre_empleado, m.rol_empleado, m.horas_trabajadas, m.pagoxentregas, 
           m.pagoxbonos, m.retenciones, m.vales, 5760 as sueldobruto, 
           (5760+m.pagoxentregas+m.pagoxbonos+m.vales-m.retenciones) as sueldoneto, m.fecha
    FROM movimientos m 
    INNER JOIN empleados e ON e.no_empleado = m.no_empleado
    WHERE m.fecha = mes
    ORDER BY m.no_empleado;
END$$

DROP PROCEDURE IF EXISTS `sp_mostrar_un_empleado`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mostrar_un_empleado` (IN `id` INT)   BEGIN 
SELECT * FROM empleados WHERE no_empleado= id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

DROP TABLE IF EXISTS `empleados`;
CREATE TABLE `empleados` (
  `no_empleado` int(11) NOT NULL,
  `nombre_empleado` varchar(100) NOT NULL,
  `rol_empleado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`no_empleado`, `nombre_empleado`, `rol_empleado`) VALUES
(1, 'Pedro ochoa', 'cargador'),
(2, 'juan Pollo', 'Chofer'),
(3, 'pepe garza', 'cargador'),
(4, 'carlos', 'cargador'),
(5, 'macario', 'chofer'),
(6, 'oscar', 'cargador'),
(7, 'Erika Gonzalez', 'cargador'),
(8, 'Luis', 'auxiliar'),
(317, 'juan burras', 'cargador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

DROP TABLE IF EXISTS `movimientos`;
CREATE TABLE `movimientos` (
  `no_empleado` int(11) NOT NULL,
  `horas_trabajadas` int(11) NOT NULL,
  `pagoxentregas` decimal(10,0) NOT NULL,
  `pagoxbonos` decimal(10,0) NOT NULL,
  `retenciones` decimal(10,0) NOT NULL,
  `vales` decimal(10,0) NOT NULL,
  `sueldo_bruto` decimal(10,0) NOT NULL,
  `sueldo_neto` decimal(10,0) NOT NULL,
  `fecha` date NOT NULL,
  `rol_empleado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`no_empleado`, `horas_trabajadas`, `pagoxentregas`, `pagoxbonos`, `retenciones`, `vales`, `sueldo_bruto`, `sueldo_neto`, `fecha`, `rol_empleado`) VALUES
(1, 196, '5', '1960', '700', '235', '7780', '7080', '2023-02-01', 'chofer'),
(1, 196, '25', '1960', '702', '235', '7795', '7094', '2023-03-01', 'chofer'),
(2, 196, '10', '980', '612', '235', '6805', '6193', '2023-09-01', 'Chofer'),
(2, 196, '50', '1960', '704', '235', '7825', '7121', '2023-12-01', 'Chofer'),
(3, 196, '25', '980', '614', '235', '6820', '6206', '2023-01-01', 'cargador'),
(5, 196, '5', '980', '612', '235', '6800', '6188', '2023-01-01', 'chofer'),
(6, 196, '10', '980', '612', '235', '6805', '6193', '2023-01-01', 'cargador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`no_empleado`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`no_empleado`,`fecha`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `no_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=318;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `movimientos_ibfk_1` FOREIGN KEY (`no_empleado`) REFERENCES `empleados` (`no_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
