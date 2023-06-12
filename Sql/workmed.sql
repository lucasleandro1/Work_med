-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/06/2023 às 02:16
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
(55, 'Alex de lucena Furtado', '455.636.345-63', 'masculino', '0346-06-04', 'gfdhndfgmn', 'Cardio', 'ertjersdf', 2147483647),
(56, 'Talles Sousa Braga', '557.245.354-76', 'feminino', '2023-06-21', 'Rua São francisco - 997', 'Urologia', '234234234', 2147483647),
(59, 'dfsgsdfgh', '342.523.45', 'masculino', '2023-05-31', 'wsfhnsn', 'Pediatrica', 'qwet352', 324523);

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

--
-- Despejando dados para a tabela `patient`
--

INSERT INTO `patient` (`id`, `name`, `cpf`, `gender`, `date`, `adress`, `date_surgery`, `room_used`, `expenses`, `type_surgery`, `doctor_name`, `insurance`, `number`) VALUES
(21, 'Alex de lucena furtado', '557.245.356-85', 'masculino', '2023-05-28', 'Bairro Populares', '2023-05-30', 'Sala 1', 4153, 'Urologia', 'Alex de lucena Furtado', 'SUS', 2147483647),
(22, 'Aasdavs', '232.352.345-23', 'masculino', '2023-05-28', 'Bairro Populares', '2023-04-06', 'Sala 1', 4506, 'Cardio', 'Talles Sousa Braga', 'Particular', 2147483647),
(23, 'Atonio', '234.523.5', 'masculino', '0035-02-25', 'gsag', '2023-03-14', 'Sala todos', 2345, 'Cardio', 'Alex de lucena Furtado', 'SUS', 235235),
(24, 'Alex de lucena furtado', '252.345.345-34', 'masculino', '4525-03-21', '23asdga', '2023-06-09', 'Sala todos', 4456, 'Pediatrica', 'Talles Sousa Braga', 'SUS', 2147483647),
(29, 'wtywer', '235.234.5', 'masculino', '2023-05-31', 'dsgnhgf', '2023-06-08', 'Sala 1', 1636, 'Neurocirurgia', 'Alex de lucena Furtado', 'SUS', 2147483647),
(30, 'Caio Sousa Braga', '234.523.464-56', 'masculino', '1997-04-14', 'Rua São francisco - 997', '2023-06-06', 'Sala 1', 3500, 'Pediatrica', 'Talles Sousa Braga', 'Particular', 2147483647);

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
(6, 'Sala 1', '2° Corredor', 'Torácica', 'kkkk'),
(9, 'Sala todos', 'sfsdfsdv', 'Pediatrica', 'qfgqawfg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `superuser`
--

CREATE TABLE `superuser` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Atributos da classe superuser.';

--
-- Despejando dados para a tabela `superuser`
--

INSERT INTO `superuser` (`id`, `user`, `password`) VALUES
(1, 'KidooSama', 'admin'),
(3, 'admin', 'admin'),
(4, 'mago', 'mago'),
(5, 'okina', 'okina');

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
(27, 'Cardio', 'eqwga'),
(28, 'Pediatrica', 'asdlogk s'),
(29, 'Neurocirurgia', 'Cuida da cabeça');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de tabela `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `superuser`
--
ALTER TABLE `superuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `surgery`
--
ALTER TABLE `surgery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
