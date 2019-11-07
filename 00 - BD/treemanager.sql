-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Nov-2019 às 20:32
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
  `Senha` varchar(32) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`IdAdm`, `Nome`, `Senha`, `Email`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com');

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
  `NumImovelProx` varchar(11) NOT NULL,
  `Poda` varchar(13) NOT NULL,
  `LocalPlantio` varchar(20) NOT NULL,
  `CordGeo` varchar(100) NOT NULL,
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
  `Origem` varchar(30) NOT NULL,
  `observacao` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `arvore`
--

INSERT INTO `arvore` (`IdArvore`, `NomeCientifico`, `DistanciaLotes`, `DistanciaEsquinas`, `CondicaoFisicoSanitaria`, `AlturaPrimeiraBifurcacao`, `CondicaoSistemaRadicular`, `LarguraCalcada`, `NumImovelProx`, `Poda`, `LocalPlantio`, `CordGeo`, `Altura`, `Toxidez`, `DistanciaOutraArvore`, `AcaoRecomendada`, `PavimentacaoCalcada`, `DistanciaGaragens`, `Rua`, `Habito`, `Familia`, `DistanciaPostes`, `NomePopular`, `Origem`, `observacao`) VALUES
(23, 'Pingo de ouro', 0, 0, 'aval1', 0, 'avalradicular1', 0, '860A', 'podaLeve', 'calcada', 'Latitude: -19.8157, Longitude: -43.9542 19° 48′ 57″ Sul, 43° 57′ 15″ Oeste', 0, 'Sim', 0, 'podaLeve1', 'comPavimento', 0, 'Santa Isabel', 'arvore', 'rutaceae', 0, 'murta de cheiro', 'nativa', ''),
(25, 'murraya ', 0, 0, 'aval1', 0, 'avalradicular1', 0, '', 'podaLeve', 'calcada', 'Latitude: -19.8157, Longitude: -43.9542 19° 48′ 57″ Sul, 43° 57 15″ Oeste', 0, 'Sim', 0, 'podaLeve1', 'comPavimento', 0, 'Rua Mônica', 'arvore', 'rutaceae', 0, 'murta de cheiro', 'nativa', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicita`
--

CREATE TABLE `solicita` (
  `IdSol` int(11) NOT NULL,
  `Nome` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DataSol` date NOT NULL,
  `texto` varchar(350) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `EmailSol` varchar(50) NOT NULL,
  `statusSol` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'nao lido',
  `Fone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `solicita`
--

INSERT INTO `solicita` (`IdSol`, `Nome`, `DataSol`, `texto`, `EmailSol`, `statusSol`, `Fone`) VALUES
(1, 'Breno Vambáster Cardoso', '2019-09-20', 'teste ', 'brenovambaster5@gmail.com', 'lido', '(33) 99930-4442'),
(2, 'Breno Vambáster Cardoso', '2019-09-20', 'teste ', 'brenovambaster5@gmail.com', 'nao lido', ''),
(3, 'Breno Vambáster Cardoso', '2019-09-20', 'Quero cadastrar uma árvore aqui perto de Casa: \r\nRua: JK número 21\r\n', 'brenovambaster5@gmail.com', 'lido', ''),
(4, 'Alfredo Murta', '2019-09-20', 'Com faço para cadastrar uma árvore ?', 'alfredo@gamil.com', 'nao lido', ''),
(8, 'Luiza', '2019-10-12', 'quero um playstation 2\r\n', 'luiza32@gmail.com', 'lido', ''),
(33, 'Maria Eduarda', '2019-10-15', 'Preciso cadastra uma árvore na rua Santa Isabel, próxima a casa n° 12. Entre em contato, pfv.', 'mariaeduarda@yahoo.com', 'lido', '33 123345678'),
(34, 'breno', '2019-11-07', 'teste 16.26\r\n', 'brenovambaster5@gmail.com', 'nao lido', '13245'),
(35, 'breno', '2019-11-07', 'teste 16.26\r\n', 'brenovambaster5@gmail.com', 'nao lido', '13245'),
(36, 'breno', '2019-11-07', 'teste 16.26\r\n', 'brenovambaster5@gmail.com', 'nao lido', '13245');

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
(107, 'Leonardo Humberto Silva', 'leo', '456131351654', 'leo@gmail.com'),
(108, 'luana Palmeira', 'luana', '7898654321', 'luana@yahoo.com'),
(111, 'Alan Lucas de Souza', 'alan', '3379879465', 'alan@gmail.com'),
(114, 'Alfredo', 'alfa', '966512131', 'alfredo@gamil.com'),
(117, 'Breno Vambáster Cardoso', 'breno', '(33)99930-4442', 'brenovambaster5@gmail.com');

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
  MODIFY `IdAdm` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `arvore`
--
ALTER TABLE `arvore`
  MODIFY `IdArvore` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `solicita`
--
ALTER TABLE `solicita`
  MODIFY `IdSol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
