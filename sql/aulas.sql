-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08-Fev-2016 às 20:22
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aulas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso_ci`
--

CREATE TABLE IF NOT EXISTS `curso_ci` (
`id` int(11) NOT NULL,
  `nome` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `login` varchar(25) CHARACTER SET latin1 NOT NULL,
  `senha` varchar(32) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curso_ci`
--

INSERT INTO `curso_ci` (`id`, `nome`, `email`, `login`, `senha`) VALUES
(1, 'Felipe', 'eric@eric.com', 'felipe', '123'),
(4, 'Albert', 'alberta@eric.co', 'alberto', '202cb962ac59075b964b07152d234b70'),
(5, 'Marcio', 'marcio@gmail.com', 'marcio@gmail.com', '202cb962ac59075b964b07152d234b70'),
(6, 'Joãozinho', 'joao@email.com', 'joao', '202cb962ac59075b964b07152d234b70'),
(7, 'Carlos123', 'carlos@gmail.com', 'carlos', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `curso_ci`
--
ALTER TABLE `curso_ci`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `curso_ci`
--
ALTER TABLE `curso_ci`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
