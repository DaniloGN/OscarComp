S-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Fev-2018 às 23:23
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oscar_comp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `idENDERECO` int(10) UNSIGNED NOT NULL,
  `RUA` varchar(45) NOT NULL,
  `NUMERO` int(10) UNSIGNED DEFAULT NULL,
  `CIDADE` varchar(45) NOT NULL,
  `CEP` int(8) UNSIGNED NOT NULL,
  `UF` char(2) NOT NULL,
  `LOGIN_idLOGIN` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--

-- Estrutura da tabela `inscrito`
--

CREATE TABLE `inscrito` (
  `idINSCRITO` int(10) UNSIGNED NOT NULL,
  `P_NOME` varchar(20) NOT NULL,
  `S_NOME` varchar(45) NOT NULL,
  `SEXO` varchar(9) NOT NULL,
  `CPF` char(14) NOT NULL,
  `RG` varchar(11) NOT NULL,
  `DATANASC` date NOT NULL,
  `LOGIN_idLOGIN` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `idLOGIN` int(10) UNSIGNED NOT NULL,
  `EMAIL` varchar(45) NOT NULL,
  `SENHA` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estrutura da tabela `telefone`
--

CREATE TABLE `telefone` (
  `idTELEFONE` int(10) UNSIGNED NOT NULL,
  `DDD` tinyint(3) UNSIGNED NOT NULL,
  `NUMERO` char(10) NOT NULL,
  `LOGIN_idLOGIN` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idENDERECO`),
  ADD KEY `fk_ENDERECO_LOGIN1_idx` (`LOGIN_idLOGIN`);

--
-- Indexes for table `inscrito`
--
ALTER TABLE `inscrito`
  ADD PRIMARY KEY (`idINSCRITO`),
  ADD UNIQUE KEY `CPF_UNIQUE` (`CPF`),
  ADD UNIQUE KEY `RG_UNIQUE` (`RG`),
  ADD KEY `fk_INSCRITO_LOGIN_idx` (`LOGIN_idLOGIN`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idLOGIN`),
  ADD UNIQUE KEY `EMAIL_UNIQUE` (`EMAIL`),
  ADD UNIQUE KEY `EMAIL_SENHA` (`EMAIL`,`SENHA`),
  ADD KEY `SENHA` (`SENHA`);

--
-- Indexes for table `telefone`
--
ALTER TABLE `telefone`
  ADD PRIMARY KEY (`idTELEFONE`),
  ADD KEY `fk_TELEFONE_LOGIN1_idx` (`LOGIN_idLOGIN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idENDERECO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
--
-- AUTO_INCREMENT for table `inscrito`
--
ALTER TABLE `inscrito`
  MODIFY `idINSCRITO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `idLOGIN` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
--
-- AUTO_INCREMENT for table `telefone`
--
ALTER TABLE `telefone`
  MODIFY `idTELEFONE` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `fk_ENDERECO_LOGIN1` FOREIGN KEY (`LOGIN_idLOGIN`) REFERENCES `login` (`idLOGIN`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `inscrito`
--
ALTER TABLE `inscrito`
  ADD CONSTRAINT `fk_INSCRITO_LOGIN` FOREIGN KEY (`LOGIN_idLOGIN`) REFERENCES `login` (`idLOGIN`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `fk_TELEFONE_LOGIN1` FOREIGN KEY (`LOGIN_idLOGIN`) REFERENCES `login` (`idLOGIN`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
