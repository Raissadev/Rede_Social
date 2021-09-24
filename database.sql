-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Set-2021 às 01:16
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mybanco_php`
--

-- --------------------------------------------------------

--

CREATE TABLE `tb_admin.financeiro` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `vencimento` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.financeiro`
--

INSERT INTO `tb_admin.financeiro` (`id`, `cliente_id`, `nome`, `valor`, `vencimento`, `status`) VALUES
(48, 3, 'Payment', '100,00', '2021-09-11', 1),
(49, 3, 'Payment', '100,00', '2021-09-21', 1),
(50, 3, 'Payment Three', '100,00', '2021-09-01', 1),
(51, 3, 'Payment Three', '100,00', '2021-09-02', 1),
(52, 3, 'Payment Three', '100,00', '2021-09-02', 1),
(53, 3, 'Payment Three', '100,00', '2021-09-02', 1),
(54, 3, 'Payment Three', '100,00', '2021-09-02', 1),
(55, 3, 'Payment Three', '100,00', '2021-09-02', 1),
(56, 7, 'Treino', '90,00', '2021-09-09', 1),
(57, 7, 'Treino', '90,00', '2021-09-19', 1),
(58, 7, 'Treino', '90,00', '2021-09-29', 0);

-- --------------------------------------------------------


CREATE TABLE `tb_admin.online` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `ultima_acao` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.online`
--

INSERT INTO `tb_admin.online` (`id`, `ip`, `ultima_acao`, `token`) VALUES
(60, '::1', '2021-09-23 18:19:20', '614a31167906d'),
(61, '::1', '2021-09-23 18:29:58', '614cef5906595'),
(62, '::1', '2021-09-23 18:32:08', '614cf1d665d16'),
(63, '::1', '2021-09-23 19:19:23', '614cf25876bfe'),
(64, '::1', '2021-09-23 19:20:14', '614cfd6bbbea4'),
(65, '::1', '2021-09-23 19:20:53', '614cfd9e4ffd2'),
(66, '::1', '2021-09-23 19:32:38', '614cfdc5e15df'),
(67, '::1', '2021-09-24 08:19:33', '614d008704c57'),
(68, '::1', '2021-09-24 10:08:27', '614db445c9616'),
(69, '::1', '2021-09-24 10:18:47', '614dcdcc03489'),
(70, '::1', '2021-09-24 10:19:19', '614dd037bb605'),
(71, '::1', '2021-09-24 11:21:08', '614dd0581ac48'),
(72, '::1', '2021-09-24 11:12:57', '614dd9ee6f7f7'),
(73, '::1', '2021-09-24 20:16:31', '614dded500ef2'),
(74, '::1', '2021-09-24 15:57:56', '614e1ea828b4b'),
(75, '::1', '2021-09-24 20:13:08', '614e5ac3143b4'),
(76, '::1', '2021-09-24 20:15:08', '614e5b8459746'),
(77, '::1', '2021-09-24 20:15:53', '614e5bfc22bb1'),
(78, '::1', '2021-09-24 20:16:14', '614e5c29b19df');

-- --------------------------------------------------------


--
-- Estrutura da tabela `tb_admin.usuarios`
--

CREATE TABLE `tb_admin.usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.usuarios`
--

INSERT INTO `tb_admin.usuarios` (`id`, `user`, `password`, `img`, `nome`, `cargo`) VALUES
(1, 'raissa', 'gaivabeach', '', 'Raissa Arcaro Daros', '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.visitas`
--

CREATE TABLE `tb_admin.visitas` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `dia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.visitas`
--

INSERT INTO `tb_admin.visitas` (`id`, `ip`, `dia`) VALUES
(1, '::1', '2021-08-18'),
(2, '::1', '2021-08-18'),
(3, '::1', '2021-08-26'),
(4, '::1', '2021-08-26'),
(5, '::1', '2021-08-26'),
(6, '::1', '2021-08-27'),
(7, '::1', '2021-08-27'),
(8, '::1', '2021-08-27'),
(9, '::1', '2021-08-27'),
(10, '::1', '2021-08-27'),
(11, '192.168.0.102', '2021-08-29'),
(12, '::1', '2021-08-30'),
(13, '::1', '2021-08-30'),
(14, '::1', '2021-09-01'),
(15, '::1', '2021-09-03'),
(16, '::1', '2021-09-04'),
(17, '::1', '2021-09-04'),
(18, '::1', '2021-09-09'),
(19, '::1', '2021-09-11'),
(20, '::1', '2021-09-11'),
(21, '::1', '2021-09-13'),
(22, '192.168.0.104', '2021-09-14'),
(23, '::1', '2021-09-15'),
(24, '::1', '2021-09-16'),
(25, '::1', '2021-09-18'),
(26, '192.168.0.102', '2021-09-19'),
(27, '::1', '2021-09-20'),
(28, '::1', '2021-09-20'),
(29, '::1', '2021-09-22'),
(30, '::1', '2021-09-24'),
(31, '::1', '2021-09-24'),
(32, '::1', '2021-09-24');

-- --------------------------------------------------------
--
-- Estrutura da tabela `tb_site.config`
--

CREATE TABLE `tb_site.config` (
  `titulo` varchar(255) NOT NULL,
  `nome_autor` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `icone1` varchar(255) NOT NULL,
  `icone2` varchar(255) NOT NULL,
  `descricao2` text NOT NULL,
  `icone3` varchar(255) NOT NULL,
  `descricao3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.config`
--

INSERT INTO `tb_site.config` (`titulo`, `nome_autor`, `descricao`, `icone1`, `icone2`, `descricao2`, `icone3`, `descricao3`) VALUES
('Meu título', 'Raissa Dev', 'Minha descrição...', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.depoimentos`
--

CREATE TABLE `tb_site.depoimentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `depoimento` text NOT NULL,
  `data` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.depoimentos`
--

INSERT INTO `tb_site.depoimentos` (`id`, `nome`, `depoimento`, `data`, `order_id`) VALUES
(1, 'Raissa', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum non massa sed lectus pretium facilisis. Mauris facilisis turpis vel nibh commodo consequat. Duis sit amet nulla eget orci euismod egestas in sed ex. Nam faucibus eget justo vulputate ornare. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.', '28/08/2021', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.feed`
--

CREATE TABLE `tb_site.feed` (
  `id` int(11) NOT NULL,
  `membro_id` int(11) NOT NULL,
  `post` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.feed`
--

INSERT INTO `tb_site.feed` (`id`, `membro_id`, `post`) VALUES
(1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur odio eros, consequat et facilisis et, fringilla a lacus. Proin gravida sodales odio nec elementum. Nunc egestas eu velit vitae dapibus. Praesent vel lectus laoreet, rutrum nulla a, lobortis nulla.'),
(2, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur odio eros, consequat et facilisis et, fringilla a lacus. Proin gravida sodales odio nec elementum. Nunc egestas eu velit vitae dapibus.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.membros`
--

CREATE TABLE `tb_site.membros` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.membros`
--

INSERT INTO `tb_site.membros` (`id`, `nome`, `email`, `senha`, `imagem`) VALUES
(1, 'Raissa Dev', 'raissa.fullstack@gmail.com', 'senhadousuario', 'myWallpaper.jpg'),
(4, 'Jhon Doe', 'jhon@doe.com', 'senhadousuario', 'userFive.png'),
(5, 'Amanda Doe', 'amanda@doe.com', 'senhadousuario', 'userFour.png'),
(6, 'Jack Carter', 'jack@carter.com', 'senhadousuario', 'userSeven.jpg'),
(7, 'Harry Pooter', 'harry@pooter.com', 'senhadousuario', 'userSix.jpg'),
(8, 'Andrew Peeter', 'andrew@peeter.com', 'senhadousuario', 'myWallpaperTwo.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.servicos`
--

CREATE TABLE `tb_site.servicos` (
  `id` int(11) NOT NULL,
  `servico` text NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.servicos`
--

INSERT INTO `tb_site.servicos` (`id`, `servico`, `order_id`) VALUES
(1, 'Programadora', 1),
(2, 'Designer UI/UX', 2),
(3, 'Designer UI/UX', 3),
(4, 'Designer UI/UX', 4),
(5, 'Designer UI/UX', 5),
(6, 'Designer UI/UX', 6),
(7, 'Designer UI/UX', 7),
(8, 'Designer UI/UX', 8),
(9, 'Copywriter', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.slides`
--

CREATE TABLE `tb_site.slides` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `slide` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.solicitacoes`
--

CREATE TABLE `tb_site.solicitacoes` (
  `id` int(11) NOT NULL,
  `id_from` int(11) NOT NULL,
  `id_to` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.solicitacoes`
--

INSERT INTO `tb_site.solicitacoes` (`id`, `id_from`, `id_to`, `status`) VALUES
(2, 1, 5, 0),
(4, 1, 5, 0),
(24, 4, 1, 1),
(25, 4, 5, 0),
(26, 6, 4, 0),
(27, 6, 1, 0),
(28, 6, 5, 0),
(31, 5, 1, 0),
(32, 7, 1, 0),
(33, 7, 5, 0),
(34, 8, 1, 0),
(35, 8, 5, 0);

--
-- Índices para tabelas despejadas
--


--
-- Índices para tabela `tb_admin.financeiro`
--
ALTER TABLE `tb_admin.financeiro`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.depoimentos`
--
ALTER TABLE `tb_site.depoimentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.feed`
--
ALTER TABLE `tb_site.feed`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.membros`
--
ALTER TABLE `tb_site.membros`
  ADD PRIMARY KEY (`id`);


--
-- Índices para tabela `tb_site.servicos`
--
ALTER TABLE `tb_site.servicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.slides`
--
ALTER TABLE `tb_site.slides`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.solicitacoes`
--
ALTER TABLE `tb_site.solicitacoes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--


--
-- AUTO_INCREMENT de tabela `tb_admin.financeiro`
--
ALTER TABLE `tb_admin.financeiro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;


--
-- AUTO_INCREMENT de tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `tb_site.depoimentos`
--
ALTER TABLE `tb_site.depoimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_site.feed`
--
ALTER TABLE `tb_site.feed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_site.membros`
--
ALTER TABLE `tb_site.membros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tb_site.servicos`
--
ALTER TABLE `tb_site.servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_site.slides`
--
ALTER TABLE `tb_site.slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_site.solicitacoes`
--
ALTER TABLE `tb_site.solicitacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
