-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Maio-2020 às 19:27
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
  `email` varchar(80) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`idAdm`, `nome`, `email`, `senha`) VALUES
(1, 'adm', 'adm@gmail.com', 'adm'),
(2, 'breno Vambaster', 'breno@gmail.com', 'breno');

-- --------------------------------------------------------

--
-- Estrutura da tabela `arvore`
--

CREATE TABLE `arvore` (
  `IdArvore` int(11) NOT NULL,
  `idAdm` int(11) DEFAULT NULL,
  `Situacao` varchar(60) NOT NULL,
  `localizacao` varchar(300) NOT NULL,
  `NomeCientifico` varchar(40) NOT NULL,
  `DistanciaLotes` float UNSIGNED NOT NULL,
  `DistanciaEsquinas` float UNSIGNED NOT NULL,
  `CondicaoFisicoSanitaria` varchar(7) NOT NULL,
  `AlturaPrimeiraBifurcacao` float UNSIGNED NOT NULL,
  `CondicaoSistemaRadicular` varchar(17) NOT NULL,
  `LarguraCalcada` float UNSIGNED NOT NULL,
  `NumImovelProx` varchar(11) NOT NULL,
  `Poda` varchar(13) NOT NULL,
  `LocalPlantio` varchar(20) NOT NULL,
  `conflitos` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
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

INSERT INTO `arvore` (`IdArvore`, `idAdm`, `Situacao`, `localizacao`, `NomeCientifico`, `DistanciaLotes`, `DistanciaEsquinas`, `CondicaoFisicoSanitaria`, `AlturaPrimeiraBifurcacao`, `CondicaoSistemaRadicular`, `LarguraCalcada`, `NumImovelProx`, `Poda`, `LocalPlantio`, `conflitos`, `CordGeo`, `Altura`, `Toxidez`, `DistanciaOutraArvore`, `AcaoRecomendada`, `PavimentacaoCalcada`, `DistanciaGaragens`, `Rua`, `Habito`, `Familia`, `DistanciaPostes`, `NomePopular`, `Origem`, `Observacao`) VALUES
(18, NULL, 'cadastrada', '', 'Pingo de ouro', 0, 0, 'aval1', 0, 'avalradicular1', 0, '', 'podaLeve', 'calcada', '', 'Latitude: 16º 10\' 13\" S Longitude: 42º 17\' \'25\" W', 0, 'Sim', 0, 'podaLeve1', 'comPavimento', 0, 'Rua Vitoria', 'arvore', 'rutaceae', 0, 'murta de cheiro', 'nativa', ''),
(36, NULL, 'pendente', '', 'murraya ', 9.6, 34, 'aval1', 3.64, 'avalradicular1', 6.9, '720B', 'podaLeve', '', 'construcoes', 'Latitude: 16º 10\' 13', 6.78, 'Nao', 0, '', 'comPavimento', 3.5, 'Rua Mônica', 'arvore', 'Eucalipto', 6.2, 'murta de cheiro', 'nativa', ''),
(39, NULL, 'pendente', '', 'Akak', 1.2, 12, 'aval2', 1.2, 'avalradicular3', 1.2, '918373j', 'podaLeve', 'ViaPublica', 'redeDeEnergia', 'Bg13940292', 2.1, 'nao', 4.2, '', 'comPavimento', 2.3, '91838291', 'arbusto', 'Hsja', 12, 'Jakw', 'exotica', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimento`
--

CREATE TABLE `atendimento` (
  `idAtendimento` int(11) NOT NULL,
  `codServico` int(11) NOT NULL,
  `usuAtendente` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atendimento`
--

INSERT INTO `atendimento` (`idAtendimento`, `codServico`, `usuAtendente`, `descricao`, `data`) VALUES
(5, 27, 2, 'lçskd agpoidsfg sdofhgóisd ´fg íasuasdfij asdfhkjsdhfk sdjfhksdjfh sdjhfldhgl sdjfhkdsjf g', '2020-04-28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `codServico` int(11) NOT NULL,
  `descricao` varchar(400) NOT NULL,
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
(27, 'teste', 18, 1, '2020-04-25', 6, 'pendente'),
(29, 'Esse é um teste de serviço para ver truncate', 18, 1, '2020-04-25', 6, 'pendente'),
(30, 'Conveying meaning to assistive technologies\r\nUsing color to ', 18, 1, '2020-04-25', 6, 'pendente'),
(35, 'qweq', 18, 1, '2020-04-27', 6, 'pendente'),
(36, 'qweq', 18, 1, '2020-04-26', 6, 'pendente'),
(39, ',mnfcrt\"oidao\'', 18, 4, '2020-05-02', 6, 'pendente'),
(40, 'sdfsdfsa', 36, 1, '2020-05-02', 6, 'pendente');

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
  `status` varchar(60) NOT NULL DEFAULT 'ativo',
  `tipo` varchar(15) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `fone` varchar(20) NOT NULL,
  `senha` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `status`, `tipo`, `nome`, `email`, `fone`, `senha`) VALUES
(4, 'desativo', 'colaborador', 'Breno Vambáster Cardoso', 'b@g.com', '123884', '1234'),
(5, 'ativo', 'colaborador', 'pedrinho', 'luiza32@gmail.com', '123884', '1234'),
(6, 'ativo', 'colaborador', 'Pedrinho', 'pedrinho@gmail.com', '798794654', '1234'),
(7, 'ativo', 'colaborador', 'Alfredo Murta sikva', 'alfredo@gamail.com', '12341', '123');

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
  ADD PRIMARY KEY (`IdArvore`),
  ADD KEY `admValida` (`idAdm`);

--
-- Índices para tabela `atendimento`
--
ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`idAtendimento`),
  ADD KEY `usuarioatendente` (`usuAtendente`),
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
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `idAdm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `arvore`
--
ALTER TABLE `arvore`
  MODIFY `IdArvore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `atendimento`
--
ALTER TABLE `atendimento`
  MODIFY `idAtendimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `codServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
-- Limitadores para a tabela `arvore`
--
ALTER TABLE `arvore`
  ADD CONSTRAINT `admValida` FOREIGN KEY (`idAdm`) REFERENCES `adm` (`idAdm`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `atendimento`
--
ALTER TABLE `atendimento`
  ADD CONSTRAINT `codServico` FOREIGN KEY (`codServico`) REFERENCES `servico` (`codServico`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarioatendente` FOREIGN KEY (`usuAtendente`) REFERENCES `adm` (`idAdm`) ON DELETE CASCADE ON UPDATE CASCADE;

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
