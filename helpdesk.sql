-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/04/2023 às 20:31
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `helpdesk`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `chamados`
--

CREATE TABLE `chamados` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `departamento` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT 'aberto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `chamados`
--

INSERT INTO `chamados` (`id`, `nome`, `email`, `departamento`, `descricao`, `data_hora`, `status`) VALUES
(3, 'Darli Mendonça rodrigues', 'dasdasdasd@gmail.com', 'TI', 'casdasdas', '2023-04-16 14:35:46', 'fechado'),
(6, 'joao', 'dasdaswew@gmail.com', 'RH', 'teste', '2023-04-16 14:49:52', 'fechado'),
(8, 'dayron', 'darlyrodrigues4ss@gmail.com', 'TI', 'impressora não funciona', '2023-04-16 15:44:20', 'fechado'),
(12, 'DASDASD', 'dasdasdasd@gmail.com', 'TI', 'DSADASDAS', '2023-04-16 16:54:10', 'aberto'),
(13, 'DASDASD', 'dasdasdasd@gmail.com', 'TI', 'DSADASDAS', '2023-04-16 16:55:01', 'aberto'),
(14, 'joao', 'joao@jtexpress.com.br', 'REDES', 'impressora não imprime', '2023-04-16 17:27:35', 'aberto'),
(15, 'dayrondsds', 'dasdasdasd@gmail.com', 'COMPRAS', 'dasds', '2023-04-16 17:35:07', 'aberto'),
(16, 'dayrondsds', 'garmends@gmail.com', 'COMPRAS', 'dsadasdasd', '2023-04-16 17:35:44', 'aberto'),
(17, 'dayrondsds', 'garmends@gmail.com', 'COMPRAS', 'dsadasdasd', '2023-04-16 17:36:03', 'aberto'),
(18, 'dayrondsds', 'dasdasdasd@gmail.com', 'RH', 'dsadasd', '2023-04-16 17:57:38', 'aberto'),
(19, 'dayrondsds', 'dasdasdasd@gmail.com', 'FIN', 'dasdas', '2023-04-16 18:03:55', 'aberto'),
(20, 'dayrondsds', 'dasdasdasd@gmail.com', 'FIN', 'dasdasda', '2023-04-16 18:04:04', 'aberto'),
(21, 'dayrondsds', 'darlyrodrigues4ss@gmail.com', 'FIN', 'dasds', '2023-04-16 18:04:39', 'aberto'),
(22, 'dayrondsds', 'garmends@hotmail.com', 'FIN', 'dasdasdas', '2023-04-16 18:05:16', 'aberto'),
(23, 'Darli Mendonça rodrigues', 'darlyrodrigues4ss@gmail.com', 'RH', 'dsadsad', '2023-04-16 18:05:49', 'aberto'),
(24, 'dayrondsds', 'garmends@hotmail.com', 'TI', 'dasdasdasd', '2023-04-16 18:06:09', 'aberto'),
(25, 'Darli Mendonça rodrigues', 'garmends@gmail.com', 'FIN', 'dasdas', '2023-04-16 18:06:30', 'aberto'),
(26, 'joao', 'dasdasdas@gmail.com', 'COMPRAS', 'estou com problema na impressora', '2023-04-16 18:08:22', 'fechado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'J0023@yron');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `chamados`
--
ALTER TABLE `chamados`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chamados`
--
ALTER TABLE `chamados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
