-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Abr-2020 às 18:09
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `new_version_tree_manager`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE `adm` (
  `idAdm` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `arvore`
--

CREATE TABLE `arvore` (
  `IdArvore` int(11) NOT NULL,
  `Situacao` varchar(60) NOT NULL,
  `localizacao` varchar(300) NOT NULL,
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
  `CordGeo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
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
  `Observacao` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `arvore`
--

INSERT INTO `arvore` (`IdArvore`, `Situacao`, `localizacao`, `NomeCientifico`, `DistanciaLotes`, `DistanciaEsquinas`, `CondicaoFisicoSanitaria`, `AlturaPrimeiraBifurcacao`, `CondicaoSistemaRadicular`, `LarguraCalcada`, `NumImovelProx`, `Poda`, `LocalPlantio`, `CordGeo`, `Altura`, `Toxidez`, `DistanciaOutraArvore`, `AcaoRecomendada`, `PavimentacaoCalcada`, `DistanciaGaragens`, `Rua`, `Habito`, `Familia`, `DistanciaPostes`, `NomePopular`, `Origem`, `Observacao`) VALUES
(2, 'pendente', '', 'Pingo de ouro', 0, 0, 'aval1', 0, 'avalradicular1', 0, '560A', 'podaLeve', 'calcada', 'Latitude: 16º 10 13\" S Longitude: 42º 17 25\"', 0, 'Sim', 0, 'podaLeve1', 'comPavimento', 0, 'Rua Mônica', 'arvore', 'rutaceae', 0, 'murta de cheiro', 'nativa', ''),
(8, 'cadastrada', '', 'Pingo de ouro', 0, 0, 'aval1', 0, 'avalradicular1', 0, '230', 'podaLeve', 'calcada', 'Latitude: -19.8157, Longitude: -43.9542 19° 48′ 57″ Sul, 43° 57\' 15″ Oeste', 0, 'Sim', 0, 'podaLeve1', 'comPavimento', 0, 'Rua Mônica', 'arvore', 'rutaceae', 0, 'Samambaia', 'nativa', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimento`
--

CREATE TABLE `atendimento` (
  `idAtendimento` int(11) NOT NULL,
  `codServico` int(11) NOT NULL,
  `usoAtendente` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atendimento`
--

INSERT INTO `atendimento` (`idAtendimento`, `codServico`, `usoAtendente`, `descricao`, `data`) VALUES
(1, 1, 4, 'teste', '2020-04-08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `codServico` int(11) NOT NULL,
  `descricao` varchar(60) NOT NULL,
  `codArvore` int(11) NOT NULL,
  `tipoServico` int(11) NOT NULL,
  `dataServico` date NOT NULL,
  `usuSolicitante` int(11) NOT NULL,
  `statusSer` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`codServico`, `descricao`, `codArvore`, `tipoServico`, `dataServico`, `usuSolicitante`, `statusSer`) VALUES
(1, 'blabla', 2, 4, '2020-04-15', 4, 'pendente'),
(3, 'opra', 2, 4, '2020-04-14', 5, 'andamento'),
(11, 'blabla', 2, 7, '0000-00-00', 5, 'andamento'),
(12, 'okipkfkp', 2, 1, '2020-04-24', 5, 'pendente'),
(13, 'okipkfkp', 2, 1, '2020-04-23', 5, 'pendente'),
(15, 'teste', 2, 1, '2020-04-24', 6, 'pendente'),
(16, 'excluir', 8, 1, '2020-04-24', 6, 'pendente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tiposervico`
--

CREATE TABLE `tiposervico` (
  `idTipoServico` int(11) NOT NULL,
  `NomeServico` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tiposervico`
--

INSERT INTO `tiposervico` (`idTipoServico`, `NomeServico`) VALUES
(1, 'Poda leve'),
(4, 'Poda pesada'),
(5, 'Reparo de Danos'),
(6, 'Substituição'),
(7, 'Outro'),
(8, 'Editar dados');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `fone` varchar(20) NOT NULL,
  `senha` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `tipo`, `nome`, `email`, `fone`, `senha`) VALUES
(4, 'colaborador', 'Breno Vambáster Cardoso', 'b@g.com', '123884', '1234'),
(5, 'colaborador', 'pedrinho', 'luiza32@gmail.com', '123884', '1234'),
(6, 'colaborador', 'pedrinho', 'pedrinho@gmail.com', '798', '1234'),
(7, 'colaborador', 'Alfredo Murta', 'alfredo@gamail.com', '12341', '123');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`idAdm`),
  ADD UNIQUE KEY `unico` (`email`);

--
-- Índices para tabela `arvore`
--
ALTER TABLE `arvore`
  ADD PRIMARY KEY (`IdArvore`);

--
-- Índices para tabela `atendimento`
--
ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`idAtendimento`),
  ADD KEY `usuarioatendente` (`usoAtendente`),
  ADD KEY `codServico` (`codServico`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`codServico`),
  ADD KEY `usuSolicitante` (`usuSolicitante`),
  ADD KEY `codArvore` (`codArvore`),
  ADD KEY `tipoServico` (`tipoServico`);

--
-- Índices para tabela `tiposervico`
--
ALTER TABLE `tiposervico`
  ADD PRIMARY KEY (`idTipoServico`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `unica` (`email`) USING BTREE;

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `arvore`
--
ALTER TABLE `arvore`
  MODIFY `IdArvore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `atendimento`
--
ALTER TABLE `atendimento`
  MODIFY `idAtendimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `codServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tiposervico`
--
ALTER TABLE `tiposervico`
  MODIFY `idTipoServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `atendimento`
--
ALTER TABLE `atendimento`
  ADD CONSTRAINT `codServico` FOREIGN KEY (`codServico`) REFERENCES `servico` (`codServico`),
  ADD CONSTRAINT `usuarioatendente` FOREIGN KEY (`usoAtendente`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `servico`
--
ALTER TABLE `servico`
  ADD CONSTRAINT `codArvore` FOREIGN KEY (`codArvore`) REFERENCES `arvore` (`IdArvore`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tipoServico` FOREIGN KEY (`tipoServico`) REFERENCES `tiposervico` (`idTipoServico`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuSolicitante` FOREIGN KEY (`usuSolicitante`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
