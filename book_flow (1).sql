-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/05/2024 às 22:49
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `book_flow`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `synopsis` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `book`
--

INSERT INTO `book` (`id`, `title`, `synopsis`, `author`, `publisher`, `price`, `created_at`, `updated_at`) VALUES
(3, 'Livro de verdade', 'Uma sinopse de verdade', 'Autor de verdade', 'Editora de verdade', '525654', '2024-05-29 18:05:54', '2024-05-29 18:10:06'),
(4, 'Cronicas de Narnia', 'A sinopse sobre as cronicas de narnia....', 'Lewis', 'Editora WMF Martins Fontes. C. S.', '50', '2024-05-29 21:25:09', '2024-05-29 21:25:09');

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`id`, `name`, `last_name`, `email`, `cpf`, `phone`, `user_type`, `password`, `created_at`, `updated_at`) VALUES
(4, 'João Vitor', 'Araujo', 'vitorjoao39207@gmail.com', '45733296844', '11998188091', 1, '$2y$10$9T1gj6GiFxJS4gwglZXpm.LUcVzxcTmAfqW41lhrJGGnRPavIrl/2', '2024-05-29 09:37:03', '2024-05-29 18:22:26'),
(6, 'Taylor', 'Swift', 'taylor@gmail.com', '11111111111', '11111111111', 1, '$2y$10$q2vOErQC0J1T87qrmOwBz.AHP8LKLV0lZVKyn3S5G4kzeSNNHwCc2', '2024-05-29 17:28:46', '2024-05-29 17:28:46'),
(7, 'João Vitor', 'Araujo', 'vitorjoao39207+1@gmail.com', '45733296841', '11998188091', 1, '$2y$10$gWJo4KGNw11Pl.S4xjod3u1XefiOMszPJZIMr31iNAXllzvtcsxI.', '2024-05-29 21:14:38', '2024-05-29 21:14:38'),
(8, 'João Vitor', 'Araujo', 'vitorjoao39207323@gmail.com', '45733296832', '11998188091', 1, '$2y$10$OkQEEQmBlouFChBHVZp7MuCyXZzdw6rQ3bg990WKvti9CHna5Fl1i', '2024-05-29 23:43:07', '2024-05-29 23:43:07');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
