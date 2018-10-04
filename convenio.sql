-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Out-2018 às 21:30
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `convenio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `curso_id` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `convenios`
--

CREATE TABLE `convenios` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id`, `nome`) VALUES
(1, 'Bacharelado em Administração'),
(2, 'Bacharelado em Agronomia'),
(3, 'Bacharelado em Engenharia Agronômica'),
(4, 'Bacharelado em Biblioteconomia'),
(5, 'Bacharelado em Ciências Contábeis'),
(6, 'Bacharelado em Comunicação Social'),
(7, 'Bacharelado em Direito'),
(8, 'Bacharelado em Ciência da Computação'),
(9, 'Bacharelado em Enfermagem'),
(10, 'Bacharelado em Engenharia Elétrica'),
(11, 'Bacharelado em Engenharia Civil'),
(12, 'Bacharelado em Fisioterapia'),
(13, 'Bacharelado em Medicina'),
(14, 'Bacharelado em Odontologia'),
(15, 'Bacharelado em Turismo'),
(16, 'Bacharelado em Zootecnia'),
(17, 'Licenciatura em Geografia'),
(18, 'Licenciatura em Ciências Biológicas'),
(19, 'Licenciatura em Matemática'),
(20, 'Licenciatura em Química'),
(21, 'Licenciatura em História'),
(22, 'Licenciatura em Português'),
(23, 'Licenciatura em Pedagogia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_empresa`
--

CREATE TABLE `user_empresa` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `ramo` varchar(50) DEFAULT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `telefone_dono` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `dono` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user_empresa`
--

INSERT INTO `user_empresa` (`id`, `nome`, `senha`, `cnpj`, `cpf`, `ramo`, `endereco`, `telefone`, `telefone_dono`, `email`, `dono`) VALUES
(1, '1', '2', '3', '4', '5', '6', '7', '8', '9', '10'),
(2, 'aaaaa', 'bbbbbb', '12345678911', '12345678911', 'cccccc', 'ddddd', 'eeeee', 'fffff', 'ggggg', 'hhhhh'),
(3, 'asdasd', 'asdasdasda', 'sdasdasd', 'asdasd', 'asdasdas', 'dasda', 'sdasdasd', 'asdas', 'dasdasd', 'asdasdasd'),
(4, 'asdasd', 'asdasdasda', 'sdasdasd', 'asdasd', 'asdasdas', 'dasda', 'sdasdasd', 'asdas', 'dasdasd', 'asdasdasd'),
(5, 'asdasdasd', 'asdasdasd', 'asdasd', 'asdasdas', 'dasdasdas', 'asdasdasd', 'asdasdasd', 'asdasd', 'asdasd', 'asdasd'),
(6, 'qqqqqqqq', 'qqqqq', 'qqqq', 'qqqq', 'qqq', 'qqqq', 'qq', 'qqqq', 'qq', 'qqqq');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_preg`
--

CREATE TABLE `user_preg` (
  `id` int(11) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user_preg`
--

INSERT INTO `user_preg` (`id`, `senha`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vinculo`
--

CREATE TABLE `vinculo` (
  `id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `data_vinculo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `convenios`
--
ALTER TABLE `convenios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_empresa`
--
ALTER TABLE `user_empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_preg`
--
ALTER TABLE `user_preg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vinculo`
--
ALTER TABLE `vinculo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `convenios`
--
ALTER TABLE `convenios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_empresa`
--
ALTER TABLE `user_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_preg`
--
ALTER TABLE `user_preg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vinculo`
--
ALTER TABLE `vinculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
