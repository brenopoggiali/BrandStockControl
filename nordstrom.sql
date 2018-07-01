-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Jun-2018 às 02:02
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nordstrom`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `loja`
--

CREATE TABLE `loja` (
  `id_loja` int(11) NOT NULL,
  `nome_loja` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `loja`
--

INSERT INTO `loja` (`id_loja`, `nome_loja`) VALUES
(1, 'Primavera Verde'),
(3, 'VerÃ£o Cinzento'),
(5, 'Outono Azul'),
(6, 'Radiohead Shop'),
(8, 'Loja do Centro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `roupa`
--

CREATE TABLE `roupa` (
  `id_roupa` int(11) NOT NULL,
  `nome_roupa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `roupa`
--

INSERT INTO `roupa` (`id_roupa`, `nome_roupa`) VALUES
(2, 'Camisa Cinza M'),
(3, 'Camisa Violeta'),
(4, 'Camisa Preta M'),
(5, 'CalÃ§a Jeans Azul'),
(8, 'Camisa Branca G'),
(9, 'Cinto de Couro'),
(10, 'Jaqueta de Couro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `roupa_loja`
--

CREATE TABLE `roupa_loja` (
  `quantidade` int(11) NOT NULL,
  `id_roupa` int(11) NOT NULL,
  `id_loja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `roupa_loja`
--

INSERT INTO `roupa_loja` (`quantidade`, `id_roupa`, `id_loja`) VALUES
(4, 2, 5),
(5, 3, 5),
(1, 4, 3),
(2, 3, 3),
(7, 2, 6),
(6, 5, 6),
(13, 4, 6),
(5, 5, 5),
(13, 10, 6),
(2, 10, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loja`
--
ALTER TABLE `loja`
  ADD PRIMARY KEY (`id_loja`);

--
-- Indexes for table `roupa`
--
ALTER TABLE `roupa`
  ADD PRIMARY KEY (`id_roupa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loja`
--
ALTER TABLE `loja`
  MODIFY `id_loja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roupa`
--
ALTER TABLE `roupa`
  MODIFY `id_roupa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
