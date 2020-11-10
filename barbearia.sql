-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Nov-2020 às 21:30
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `barbearia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamento`
--

CREATE TABLE `agendamento` (
  `id_barbeiro` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `data_agendamento` date NOT NULL,
  `cod_servico` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `horario` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nome_cliente` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `barbeiro`
--

CREATE TABLE `barbeiro` (
  `id_barbeiro` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `rg` int(9) NOT NULL,
  `cpf` int(11) NOT NULL,
  `data_nascimento` date NOT NULL,
  `data_contrato` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `salario` float NOT NULL,
  `senha` int(6) NOT NULL,
  `ativo` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `cpf` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `data_nascimento` date NOT NULL,
  `ativo` char(2) NOT NULL,
  `telefone` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`cod_servico`),
  ADD KEY `FK_cod_servico_cliente` (`id_cliente`),
  ADD KEY `FK_id_barbeiro` (`id_barbeiro`);

--
-- Índices para tabela `barbeiro`
--
ALTER TABLE `barbeiro`
  ADD PRIMARY KEY (`id_barbeiro`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `cod_servico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `barbeiro`
--
ALTER TABLE `barbeiro`
  MODIFY `id_barbeiro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD CONSTRAINT `FK_id_barbeiro` FOREIGN KEY (`id_barbeiro`) REFERENCES `agendamento` (`cod_servico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
