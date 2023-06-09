-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/06/2023 às 02:45
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `workmed`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `adress` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `crm` varchar(15) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Atributos da classe doctor';

--
-- Despejando dados para a tabela `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `cpf`, `gender`, `date`, `adress`, `speciality`, `crm`, `number`) VALUES
(51, 'Caique Pereira ', '123.456.789-10', 'feminino', '2004-06-27', 'Quixabinha - Mauriti Ce', 'Urologia', '234235t23', 2147483647),
(55, 'rterher', '455.636.345-63', 'masculino', '0346-06-04', 'gfdhndfgmn', 'Urologia', 'ertjersdf', 2147483647);

-- --------------------------------------------------------

--
-- Estrutura para tabela `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `adress` varchar(255) NOT NULL,
  `date_surgery` date NOT NULL,
  `room_used` varchar(255) NOT NULL,
  `expenses` float NOT NULL,
  `type_surgery` varchar(255) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `insurance` varchar(255) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Atributos da classe patient.';

-- --------------------------------------------------------

--
-- Estrutura para tabela `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `type_surgeries` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Atributos da classe room.';

--
-- Despejando dados para a tabela `room`
--

INSERT INTO `room` (`id`, `name`, `location`, `type_surgeries`, `description`) VALUES
(6, 'Sala 1', '2° Corredor', 'Torácica', 'kkkk');

-- --------------------------------------------------------

--
-- Estrutura para tabela `superuser`
--

CREATE TABLE `superuser` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Atributos da classe superuser.';

-- --------------------------------------------------------

--
-- Estrutura para tabela `surgery`
--

CREATE TABLE `surgery` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Atributos da classe surgery.';

--
-- Despejando dados para a tabela `surgery`
--

INSERT INTO `surgery` (`id`, `name`, `description`) VALUES
(26, 'Urologia', 'advav'),
(27, 'Cardio', 'eqwga');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`cpf`),
  ADD UNIQUE KEY `crm` (`crm`);

--
-- Índices de tabela `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY ` UNIQUE` (`cpf`);

--
-- Índices de tabela `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `superuser`
--
ALTER TABLE `superuser`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `surgery`
--
ALTER TABLE `surgery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de tabela `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `superuser`
--
ALTER TABLE `superuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `surgery`
--
ALTER TABLE `surgery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
