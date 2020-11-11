-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Nov-2020 às 15:25
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.9

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
  `horario` varchar(300) NOT NULL,
  `nome_cliente` varchar(40) NOT NULL,
  `Tipo_atendimento` varchar(300) NOT NULL,
  `telefone` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `agendamento`
--

INSERT INTO `agendamento` (`id_barbeiro`, `id_cliente`, `data_agendamento`, `cod_servico`, `status`, `horario`, `nome_cliente`, `Tipo_atendimento`, `telefone`) VALUES
(0, 0, '2020-11-25', 2, '', '15:30:00', 'elton', 'Barba', '(11) 98074 9797'),
(0, 0, '2020-11-27', 3, '', '13:00:00', 'elton', 'Corte', '(11) 98074 9797');

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
  `telefone` varchar(20) DEFAULT NULL,
  `data_contrato` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `salario` float NOT NULL,
  `senha` int(6) NOT NULL,
  `ativo` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `barbeiro`
--

INSERT INTO `barbeiro` (`id_barbeiro`, `nome`, `rg`, `cpf`, `data_nascimento`, `telefone`, `data_contrato`, `email`, `salario`, `senha`, `ativo`) VALUES
(1, 'elton', 1225523, 1254698, '2018-11-28', NULL, '2020-11-10', 'elton13cdz@gmail.com', 1200, 123456, 'on'),
(2, 'Guilherme viana', 12332255, 5, '1998-04-24', '', '2020-11-11', 'guilherme@gmail.com', 225, 123456, ''),
(3, 'miqueias', 2147483647, 444444, '2020-11-27', '', '2020-11-18', 'kjdhfjf@gmail.com', 222, 12651, 'S'),
(4, 'miqueias', 2147483647, 4, '2020-11-27', '(11)11111-1111', '2020-11-18', 'kjdhfjf@gmail.com', 222, 123456, ''),
(5, 'miqueias', 2147483647, 444444, '2020-11-27', '(11)11111-1111', '2020-11-18', 'kjdhfjf@gmail.com', 222, 123456, 'S');

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
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `cpf`, `email`, `data_nascimento`, `ativo`, `telefone`) VALUES
(1, 'elton', 465654564, 'elton@dogworld.com', '1998-05-01', 'S', 1111223),
(3, 'maria', 789632541, 'maria@gb.silva', '1982-02-05', 'S', 45632589),
(6, 'maria', 1234567899, 'maria@gmail.com', '2020-06-16', 'S', 2147483647),
(7, 'Miqueias ramos dos santos', 4562588, 'miqueias@gmail.com', '1998-02-08', 'S', 2147483647);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`cod_servico`);

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
  MODIFY `cod_servico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `barbeiro`
--
ALTER TABLE `barbeiro`
  MODIFY `id_barbeiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
