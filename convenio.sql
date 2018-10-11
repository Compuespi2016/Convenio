-- phpMyAdmin SQL Dump
<<<<<<< HEAD
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 27/09/2018 às 22:21
-- Versão do servidor: 10.1.13-MariaDB
-- Versão do PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
=======
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
>>>>>>> 19ebdafa832cf1d4eec498de2d13c6aa5e772922
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
<<<<<<< HEAD
-- Banco de dados: `convenio`
=======
-- Database: `convenio`
>>>>>>> 19ebdafa832cf1d4eec498de2d13c6aa5e772922
--

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Estrutura para tabela `convenios`
=======
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
>>>>>>> 19ebdafa832cf1d4eec498de2d13c6aa5e772922
--

CREATE TABLE `convenios` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Estrutura para tabela `curso`
=======
-- Estrutura da tabela `curso`
>>>>>>> 19ebdafa832cf1d4eec498de2d13c6aa5e772922
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
<<<<<<< HEAD
-- Fazendo dump de dados para tabela `curso`
=======
-- Extraindo dados da tabela `curso`
>>>>>>> 19ebdafa832cf1d4eec498de2d13c6aa5e772922
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
<<<<<<< HEAD
-- Estrutura para tabela `solicitacoes`
--

CREATE TABLE `solicitacoes` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `solicitacoes`
--

INSERT INTO `solicitacoes` (`id`, `id_empresa`, `id_curso`) VALUES
(1, 0, 5),
(2, 0, 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `user_empresa`
=======
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
>>>>>>> 19ebdafa832cf1d4eec498de2d13c6aa5e772922
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
<<<<<<< HEAD
-- Fazendo dump de dados para tabela `user_empresa`
=======
-- Extraindo dados da tabela `user_empresa`
>>>>>>> 19ebdafa832cf1d4eec498de2d13c6aa5e772922
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
<<<<<<< HEAD
-- Estrutura para tabela `user_preg`
=======
-- Estrutura da tabela `user_preg`
>>>>>>> 19ebdafa832cf1d4eec498de2d13c6aa5e772922
--

CREATE TABLE `user_preg` (
  `id` int(11) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
<<<<<<< HEAD
-- Fazendo dump de dados para tabela `user_preg`
=======
-- Extraindo dados da tabela `user_preg`
>>>>>>> 19ebdafa832cf1d4eec498de2d13c6aa5e772922
--

INSERT INTO `user_preg` (`id`, `senha`) VALUES
(1, 'admin');

<<<<<<< HEAD
--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `convenios`
=======
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
>>>>>>> 19ebdafa832cf1d4eec498de2d13c6aa5e772922
--
ALTER TABLE `convenios`
  ADD PRIMARY KEY (`id`);

--
<<<<<<< HEAD
-- Índices de tabela `curso`
=======
-- Indexes for table `curso`
>>>>>>> 19ebdafa832cf1d4eec498de2d13c6aa5e772922
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
<<<<<<< HEAD
-- Índices de tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `user_empresa`
=======
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_empresa`
>>>>>>> 19ebdafa832cf1d4eec498de2d13c6aa5e772922
--
ALTER TABLE `user_empresa`
  ADD PRIMARY KEY (`id`);

--
<<<<<<< HEAD
-- Índices de tabela `user_preg`
=======
-- Indexes for table `user_preg`
>>>>>>> 19ebdafa832cf1d4eec498de2d13c6aa5e772922
--
ALTER TABLE `user_preg`
  ADD PRIMARY KEY (`id`);

--
<<<<<<< HEAD
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `convenios`
--
ALTER TABLE `convenios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `user_empresa`
--
ALTER TABLE `user_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `user_preg`
--
ALTER TABLE `user_preg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
=======
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

>>>>>>> 19ebdafa832cf1d4eec498de2d13c6aa5e772922
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
