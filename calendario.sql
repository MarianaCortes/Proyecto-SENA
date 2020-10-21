-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 16, 2020 at 12:10 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calendario`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE `administrador` (
  `usuario` varchar(35) NOT NULL,
  `clave` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrador`
--

INSERT INTO `administrador` (`usuario`, `clave`) VALUES
('mariana', 'geraldine');

-- --------------------------------------------------------

--
-- Table structure for table `cita`
--

CREATE TABLE `cita` (
  `Id` int(20) NOT NULL,
  `cc_especialista` int(20) NOT NULL,
  `id_paciente` int(20) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `citas`
--

CREATE TABLE `citas` (
  `id` int(20) NOT NULL,
  `cc_especialista` int(20) NOT NULL,
  `Id_paciente` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `citas`
--

INSERT INTO `citas` (`id`, `cc_especialista`, `Id_paciente`, `Fecha`, `Hora`) VALUES
(12, 123450000, 147852, '2020-09-23', '08:00am'),
(13, 456789, 741258, '2020-09-26', '10:00am'),
(14, 456789, 963258, '2020-09-25', '04:00pm');

-- --------------------------------------------------------

--
-- Table structure for table `especialidad`
--

CREATE TABLE `especialidad` (
  `idE` int(20) NOT NULL,
  `Especialidad` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `especialidad`
--

INSERT INTO `especialidad` (`idE`, `Especialidad`) VALUES
(1, 'Oftalmologia'),
(2, 'Optometria');

-- --------------------------------------------------------

--
-- Table structure for table `especialista`
--

CREATE TABLE `especialista` (
  `Cc` int(20) NOT NULL,
  `IdE_Especialidad` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `especialista`
--

INSERT INTO `especialista` (`Cc`, `IdE_Especialidad`, `Nombre`, `Apellido`) VALUES
(123456, 1, 'Oftalmologia ', ''),
(456789, 2, 'Optometria', '');

-- --------------------------------------------------------

--
-- Table structure for table `pacientes`
--

CREATE TABLE `pacientes` (
  `Documento` int(50) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Telefono` int(15) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `cc_especialista` int(20) NOT NULL,
  `Fecha` varchar(20) NOT NULL,
  `Hora` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pacientes`
--

INSERT INTO `pacientes` (`Documento`, `Nombre`, `Apellido`, `Telefono`, `Direccion`, `cc_especialista`, `Fecha`, `Hora`) VALUES
(2342, 'ana', 'cordoba', 34562, '23334', 0, '0000-00-00', ''),
(5545, 'ana', 'cordoba', 44434, '8878', 456789, '2020-10-22', '02:00pm'),
(55564, 'ana', 'mendoza', 444563, '77463', 0, '0000-00-00', ''),
(147852, 'Paciente', 'Uno', 456, '123', 0, '0000-00-00', ''),
(238784, 'Andrea', 'Gomez', 7879, '23434', 0, '0000-00-00', ''),
(567567, 'Maria', 'Salazar', 678678, '34534', 0, '0000-00-00', ''),
(741258, 'Paciente', 'Dos', 456, '456', 0, '0000-00-00', ''),
(12312332, 'Maria', 'Mendoza', 399093, '567454', 0, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `publicacion`
--

CREATE TABLE `publicacion` (
  `IdPublicacion` int(11) NOT NULL,
  `precio` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publicacion`
--

INSERT INTO `publicacion` (`IdPublicacion`, `precio`, `imagen`, `titulo`, `descripcion`) VALUES
(6, '50.000', '1600654466.png', 'Sunglasses', 'gafas de sol'),
(7, '30.000', '1600690764.png', 'Gafitas', 'otras gafas X');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`usuario`);

--
-- Indexes for table `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`idE`);

--
-- Indexes for table `especialista`
--
ALTER TABLE `especialista`
  ADD PRIMARY KEY (`Cc`),
  ADD KEY `IdE_Especialidad` (`IdE_Especialidad`);

--
-- Indexes for table `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`Documento`);

--
-- Indexes for table `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`IdPublicacion`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `idE` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `IdPublicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `especialista`
--
ALTER TABLE `especialista`
  ADD CONSTRAINT `especialista_ibfk_1` FOREIGN KEY (`IdE_Especialidad`) REFERENCES `especialidad` (`idE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
