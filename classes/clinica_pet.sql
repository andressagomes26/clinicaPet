-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Jan-2022 às 14:40
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `clinica_pet`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(11) NOT NULL,
  `email_admin` varchar(200) NOT NULL,
  `senha_admin` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id_admin`, `email_admin`, `senha_admin`) VALUES
(1, 'andressaAdmin@gmail', '1234');

-- --------------------------------------------------------

--
-- Estrutura da tabela `animal`
--

CREATE TABLE `animal` (
  `id_animal` int(11) NOT NULL,
  `nome_animal` varchar(150) NOT NULL,
  `raca_animal` varchar(200) NOT NULL,
  `nome_cliente` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `animal`
--

INSERT INTO `animal` (`id_animal`, `nome_animal`, `raca_animal`, `nome_cliente`) VALUES
(1, 'DOG', 'Cachorro', 'Andressa'),
(2, 'DOGUINHO', 'Cachorro', 'Andressa'),
(6, 'LICA', 'Cachorro', 'Maria'),
(7, 'CAT', 'Gato', 'Andressa'),
(8, 'MIAU', 'Gato', 'Maria'),
(9, 'DUDU', 'Gato', 'Carlos'),
(10, 'BOB', 'Cachorro', 'Andressa'),
(11, 'THOR', 'Cachorro', 'Andressa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(150) NOT NULL,
  `email_cliente` varchar(200) NOT NULL,
  `cpf_cliente` varchar(14) NOT NULL,
  `endereco_cliente` varchar(150) NOT NULL,
  `celular_cliente` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome_cliente`, `email_cliente`, `cpf_cliente`, `endereco_cliente`, `celular_cliente`) VALUES
(1, 'ANDRESSA', 'andressateste@gmail.com', '10101010', 'Rua C', '88999479321'),
(2, 'MARIA', 'maria@gmail.com', '2020', 'Rua B', '889994796321'),
(6, 'CARLOS', 'carlos@gmail.com', '123456', 'Rua A', '8899999999');

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE `consulta` (
  `id_consulta` int(11) NOT NULL,
  `nome_animal` varchar(200) NOT NULL,
  `nome_cliente` varchar(200) NOT NULL,
  `data_consulta` date NOT NULL DEFAULT current_timestamp(),
  `hora_consulta` time NOT NULL DEFAULT current_timestamp(),
  `obs_consulta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `nome_animal`, `nome_cliente`, `data_consulta`, `hora_consulta`, `obs_consulta`) VALUES
(1, 'BOB', 'ANDRESSA', '2022-01-28', '20:11:00', 'Consulta teste 1'),
(2, 'DUDU', 'CARLOS', '2021-09-01', '21:13:00', 'Consulta teste 2'),
(3, 'DOG', 'ANDRESSA', '2022-01-15', '00:17:00', 'Consulta teste 3'),
(4, 'MIAU', 'MARIA', '2022-01-12', '10:30:00', 'Consulta teste 4');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admin`);

--
-- Índices para tabela `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id_animal`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id_consulta`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `animal`
--
ALTER TABLE `animal`
  MODIFY `id_animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
