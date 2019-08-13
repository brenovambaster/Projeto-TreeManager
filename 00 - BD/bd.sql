-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Ago-2018 às 12:37
-- Versão do servidor: 10.1.29-MariaDB
-- PHP Version: 7.2.0

--
-- Database: `aula`
--
CREATE DATABASE IF NOT EXISTS `aula` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `aula`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `usuId` int(10) UNSIGNED NOT NULL,
  `usuEmail` varchar(128) NOT NULL,
  `usuSenha` varchar(32) NOT NULL,
  `usuNome` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuId`, `usuEmail`, `usuSenha`, `usuNome`) VALUES
(1, 'admin@admin.com.br', '123456', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
