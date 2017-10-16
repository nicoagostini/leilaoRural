-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Out-2017 às 07:54
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leilao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `buyer`
--

CREATE TABLE `buyer` (
  `iduser` int(254) NOT NULL,
  `rg` int(254) NOT NULL,
  `cpf` varchar(254) NOT NULL,
  `apelido` varchar(254) NOT NULL,
  `endereco` varchar(254) NOT NULL,
  `cidade` varchar(254) NOT NULL,
  `estado` varchar(254) NOT NULL,
  `cc` int(254) NOT NULL,
  `datavencimento` varchar(254) NOT NULL,
  `enderecocobranca` varchar(254) NOT NULL,
  `telefone` int(254) NOT NULL,
  `telefone2` int(254) NOT NULL,
  `datanascimento` varchar(254) NOT NULL,
  `sexo` varchar(254) NOT NULL,
  `estadocivil` varchar(254) NOT NULL,
  `compra1` varchar(254) NOT NULL,
  `compra2` varchar(254) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `buyer`
--

INSERT INTO `buyer` (`iduser`, `rg`, `cpf`, `apelido`, `endereco`, `cidade`, `estado`, `cc`, `datavencimento`, `enderecocobranca`, `telefone`, `telefone2`, `datanascimento`, `sexo`, `estadocivil`, `compra1`, `compra2`) VALUES
(9, 4654654, '654654654', 'Rivaldinho', 'Coqueiro', 'Planalto', 'RS', 56465456, '2016-10', 'Rua', 549952465, 54, '2046-06-05', 'masculino', 'solteiro', 'equino', ''),
(12, 2147483647, '72436283741', 'Rivaldoso', 'Century St. 1194', 'Dantas', 'Nevada', 837438238, '2023-04', 'Century St. 1194', 769, 0, '1994-11-16', 'masculino', 'solteiro', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lance`
--

CREATE TABLE `lance` (
  `idlance` int(254) NOT NULL,
  `idLote` int(254) NOT NULL,
  `valor` int(254) NOT NULL,
  `idusuario` int(254) NOT NULL,
  `nome` varchar(254) NOT NULL,
  `data` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lote`
--

CREATE TABLE `lote` (
  `idlote` int(254) NOT NULL,
  `nome` varchar(254) NOT NULL,
  `descricao` text NOT NULL,
  `encerramento` varchar(254) NOT NULL,
  `lote` varchar(254) NOT NULL,
  `valorMin` varchar(254) NOT NULL,
  `foto1` varchar(254) NOT NULL,
  `foto2` varchar(254) NOT NULL,
  `foto3` varchar(254) NOT NULL,
  `foto4` varchar(254) NOT NULL,
  `foto5` varchar(254) NOT NULL,
  `status` varchar(254) NOT NULL,
  `categoria` varchar(254) NOT NULL,
  `lance` int(254) NOT NULL,
  `vencedor` varchar(254) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lote`
--

INSERT INTO `lote` (`idlote`, `nome`, `descricao`, `encerramento`, `lote`, `valorMin`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`, `status`, `categoria`, `lance`, `vencedor`) VALUES
(39, 'Firts', 'Just a example', '2018-04-25', '001', '5000', 'fotos/f6h39Db5aAEBCd7i4j2g8l0cemF1.jpg', '', '', '', '', 'Aberta', 'equino', 5000, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `iduser` int(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `senha` varchar(254) NOT NULL,
  `nome` varchar(254) NOT NULL,
  `foto` varchar(254) NOT NULL,
  `tipo` varchar(254) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`iduser`, `email`, `senha`, `nome`, `foto`, `tipo`) VALUES
(1, 'admin@admin.com', 'admin', 'Nico', 'fotos/57dbf1bb150a9.jpg', 'admin'),
(12, 'buyer@buyer.com', 'buyer', 'RIvaldo', 'fotos/59e4122d05de9.jpg', 'buyer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lance`
--
ALTER TABLE `lance`
  ADD PRIMARY KEY (`idlance`);

--
-- Indexes for table `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`idlote`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lance`
--
ALTER TABLE `lance`
  MODIFY `idlance` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `lote`
--
ALTER TABLE `lote`
  MODIFY `idlote` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
