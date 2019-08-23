-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Ago-2019 às 13:01
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `treemanager`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `IdAdm` int(10) UNSIGNED NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Senha` int(32) NOT NULL,
  `Email` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `arvore`
--

CREATE TABLE `arvore` (
  `IdArvore` int(11) UNSIGNED NOT NULL,
  `NomeCientifico` varchar(40) NOT NULL,
  `DistanciaLotes` float UNSIGNED NOT NULL,
  `DistanciaEsquinas` float UNSIGNED NOT NULL,
  `CondicaoFisicoSanitaria` varchar(7) NOT NULL,
  `AlturaPrimeiraBifurcacao` int(10) UNSIGNED NOT NULL,
  `CondicaoSistemaRadicular` varchar(17) NOT NULL,
  `LarguraCalcada` float UNSIGNED NOT NULL,
  `NumImovelProx` int(11) NOT NULL,
  `Poda` varchar(13) NOT NULL,
  `LocalPlantio` varchar(20) NOT NULL,
  `CordGeo` int(11) NOT NULL,
  `Altura` float UNSIGNED NOT NULL,
  `Toxidez` varchar(10) NOT NULL,
  `DistanciaOutraArvore` float UNSIGNED NOT NULL,
  `AcaoRecomendada` varchar(20) NOT NULL,
  `PavimentacaoCalcada` varchar(20) NOT NULL,
  `DistanciaGaragens` float UNSIGNED NOT NULL,
  `Rua` char(50) NOT NULL,
  `Habito` varchar(30) NOT NULL,
  `Familia` varchar(30) NOT NULL,
  `DistanciaPostes` float NOT NULL,
  `NomePopular` char(40) NOT NULL,
  `Origem` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `arvore`
--

INSERT INTO `arvore` (`IdArvore`, `NomeCientifico`, `DistanciaLotes`, `DistanciaEsquinas`, `CondicaoFisicoSanitaria`, `AlturaPrimeiraBifurcacao`, `CondicaoSistemaRadicular`, `LarguraCalcada`, `NumImovelProx`, `Poda`, `LocalPlantio`, `CordGeo`, `Altura`, `Toxidez`, `DistanciaOutraArvore`, `AcaoRecomendada`, `PavimentacaoCalcada`, `DistanciaGaragens`, `Rua`, `Habito`, `Familia`, `DistanciaPostes`, `NomePopular`, `Origem`) VALUES
(1, 'Samabaia', 23, 34, 'cond1', 2, 'cond3', 1.4, 14, '', '', 0, 0, '', 0, '', '', 0, '', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicita`
--

CREATE TABLE `solicita` (
  `IdSol` int(11) NOT NULL,
  `DataSol` date NOT NULL,
  `LocalArv` varchar(100) NOT NULL,
  `EmailSol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `IdUsu` int(10) UNSIGNED NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Senha` varchar(32) NOT NULL,
  `Telefone` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`IdUsu`, `Nome`, `Senha`, `Telefone`, `Email`) VALUES
(76, 'Alfredo', 'àrio', '966512131', 'alfredo@gamil.com'),
(77, 'Leonardo Humberto', 'leo', '8746541', 'leo@gmail.com'),
(78, 'Breno', 'breno', '7987654', 'brenovambaster5@gmail.com'),
(79, 'Luisa', 'luisa', '54879654', 'luiza32@gmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`IdAdm`);

--
-- Índices para tabela `arvore`
--
ALTER TABLE `arvore`
  ADD PRIMARY KEY (`IdArvore`);

--
-- Índices para tabela `solicita`
--
ALTER TABLE `solicita`
  ADD PRIMARY KEY (`IdSol`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsu`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `IdAdm` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `arvore`
--
ALTER TABLE `arvore`
  MODIFY `IdArvore` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `solicita`
--
ALTER TABLE `solicita`
  MODIFY `IdSol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
