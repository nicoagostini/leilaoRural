-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Set-2016 às 15:39
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aluno_leilao`
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
(9, 4654654, '654654654', 'Rivaldinho', 'Coqueiro', 'Planalto', 'RS', 56465456, '2016-10', 'Rua', 549952465, 54, '2046-06-05', 'masculino', 'solteiro', 'equino', '');

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

--
-- Extraindo dados da tabela `lance`
--

INSERT INTO `lance` (`idlance`, `idLote`, `valor`, `idusuario`, `nome`, `data`) VALUES
(39, 34, 6800, 1, 'Nico', '2016-09-16'),
(38, 34, 6602, 1, 'Nico', '2016-09-16'),
(37, 33, 5001, 9, 'Rivaldos', '2016-09-16');

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
(34, 'Cavalos voadores oceânicos', 'Cavalam muito', '2016-09-30', '0002', '6000', 'fotos/l5bEm74A91d6h3f2gBc8DeiFjCa0.jpg', '', '', '', '', 'Encerrada', 'equino', 6800, 'Nico'),
(35, 'Teste doi9s', 'teste', '2016-09-17', '0003', '4000', 'fotos/FgliECbDja7h14B682dm3e9c05fA.jpg', '', '', '', '', 'Encerrada', 'equino', 4000, ''),
(33, 'Pinguins reais', 'Provindos do ártico sul', '2016-09-23', '0001', '5000', 'fotos/9b6BD75hE0a4AdcgFlimCej18f32.jpg', '', '', '', '', 'Encerrada', 'aves', 5001, 'Rivaldos');

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
(9, 'rivaldo@riv.com', 'aloalo', 'Rivaldoso', 'fotos/57a7f5ac1fb3b.jpg', 'buyer');

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
  MODIFY `idlote` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
