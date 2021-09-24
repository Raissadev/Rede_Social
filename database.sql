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
-- Estrutura da tabela `tb_admin.agenda`
--

CREATE TABLE `tb_admin.agenda` (
  `id` int(11) NOT NULL,
  `tarefa` varchar(255) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.agenda`
--

INSERT INTO `tb_admin.agenda` (`id`, `tarefa`, `data`) VALUES
(1, 'Ir Treinar', '2021-09-11'),
(2, 'Anotar os códigos', '2021-09-11'),
(3, 'Ir ao médico', '2021-09-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.alunos`
--

CREATE TABLE `tb_admin.alunos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.alunos`
--

INSERT INTO `tb_admin.alunos` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Amanda Doe', 'amada@doe.com', 'senhadoaluno');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.aulas`
--

CREATE TABLE `tb_admin.aulas` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `modulo_id` int(11) NOT NULL,
  `link_aula` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.aulas`
--

INSERT INTO `tb_admin.aulas` (`id`, `nome`, `modulo_id`, `link_aula`) VALUES
(1, 'Aula 01', 1, 'https://youtu.be/DtbrB1IAgM0'),
(2, 'Conhecendo o photoshop', 1, 'https://youtu.be/5qap5aO4i9A'),
(3, 'Aula 01', 2, 'https://www.youtube.com/watch?v=TQ5DUv_ZwRg&list=RDTQ5DUv_ZwRg&start_radio=1'),
(4, 'Aula 02', 2, 'https://www.youtube.com/watch?v=TQ5DUv_ZwRg&list=RDTQ5DUv_ZwRg&start_radio=1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.clientes`
--

CREATE TABLE `tb_admin.clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `cpf_cnpj` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.clientes`
--

INSERT INTO `tb_admin.clientes` (`id`, `nome`, `email`, `tipo`, `cpf_cnpj`, `imagem`) VALUES
(3, 'Amanda Doe', 'amanda@doe.com', 'juridico', '00.000.000/0000-00', ''),
(7, 'Jhon Doe', 'jhon@doe.com', 'juridico', '00.000.000/0000-00', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.curso_controle`
--

CREATE TABLE `tb_admin.curso_controle` (
  `id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.curso_controle`
--

INSERT INTO `tb_admin.curso_controle` (`id`, `aluno_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.empreendimentos`
--

CREATE TABLE `tb_admin.empreendimentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `preco` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.empreendimentos`
--

INSERT INTO `tb_admin.empreendimentos` (`id`, `nome`, `tipo`, `preco`, `imagem`, `slug`, `order_id`) VALUES
(2, 'Imóvel de Luxo', 'residencial', '10.000,00', 'listImovelOne.jpg', 'imovel-representativo-one', 1),
(3, 'Imóvel Representativo Two', 'residencial', '1.000,00', 'listImovelTwo.jpg', 'imovel-representativo-two', 2),
(4, 'Imóvel Representativo Three', 'residencial', '1.000,00', 'listImovelThree.jpg', 'imovel-representativo-three', 3),
(6, 'Apartamento de Luxo', 'residencial', '1.000,00', 'listImovelFour.jpg', 'apartamento-de-luxo', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.estoque`
--

CREATE TABLE `tb_admin.estoque` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `largura` int(11) NOT NULL,
  `altura` int(11) NOT NULL,
  `comprimento` int(11) NOT NULL,
  `peso` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.estoque`
--

INSERT INTO `tb_admin.estoque` (`id`, `nome`, `descricao`, `largura`, `altura`, `comprimento`, `peso`, `quantidade`, `preco`) VALUES
(8, 'Baldur\'s Gate: Enhanced Edition', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse luctus nibh ligula, id laoreet felis mattis quis. Ut rhoncus, nulla non dapibus ultricies, risus est tristique nibh, vel mattis ex tellus a nisi. Suspendisse non tortor vel felis iaculis placerat. Cras in nibh felis. Sed mi tortor, congue vel dolor eu, gravida condimentum erat. Nulla et urna justo. Nullam bibendum lectus ac rhoncus imperdiet. Curabitur non mi sem.\r\n\r\nNunc et mi vitae mi porta lobortis. Sed placerat risus sem, non ultricies massa facilisis id. Etiam euismod rutrum risus at accumsan. Integer porttitor velit sed metus viverra, ac placerat erat scelerisque. Nulla vel libero a risus varius tincidunt. Proin at mollis sem. Nullam hendrerit viverra tortor, sit amet egestas turpis elementum a. Sed eu neque et ligula fermentum lacinia finibus id elit. Fusce posuere elementum turpis eget accumsan. Ut vel euismod diam. In scelerisque, sapien et elementum bibendum, elit tellus porttitor nulla, ut bibendum augue quam ac lacus. Cras malesuada mollis magna sed venenatis.', 15, 15, 15, 20, 10, '200.00'),
(9, 'Red Dead Redemption 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nunc purus, pellentesque nec blandit quis, ornare placerat nibh. Nam lobortis in lectus vel mattis. Quisque finibus ex massa, nec mattis urna pulvinar vel. Nullam sed ante at quam maximus bibendum. Morbi vitae dolor pulvinar, suscipit nulla ut, tincidunt sapien. Curabitur laoreet egestas lacus a volutpat. Aenean ipsum lacus, pellentesque malesuada augue vitae, dapibus venenatis eros. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec ac felis auctor, vulputate dolor placerat, sagittis nibh. Mauris vulputate condimentum lacus, ut pulvinar mi egestas ac. Nulla condimentum sapien sit amet nunc commodo pharetra. Integer ut varius odio. Cras volutpat rhoncus semper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Integer sagittis nisl finibus diam bibendum, sit amet ultricies sapien vestibulum.', 15, 15, 15, 15, 10, '199.00'),
(10, 'Phantasmagoria 2: A Puzzle of Flesh', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nunc purus, pellentesque nec blandit quis, ornare placerat nibh. Nam lobortis in lectus vel mattis. Quisque finibus ex massa, nec mattis urna pulvinar vel. Nullam sed ante at quam maximus bibendum. Morbi vitae dolor pulvinar, suscipit nulla ut, tincidunt sapien. Curabitur laoreet egestas lacus a volutpat. Aenean ipsum lacus, pellentesque malesuada augue vitae, dapibus venenatis eros. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec ac felis auctor, vulputate dolor placerat, sagittis nibh. Mauris vulputate condimentum lacus, ut pulvinar mi egestas ac. Nulla condimentum sapien sit amet nunc commodo pharetra. Integer ut varius odio. Cras volutpat rhoncus semper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Integer sagittis nisl finibus diam bibendum, sit amet ultricies sapien vestibulum.', 15, 15, 15, 9, 10, '189.99'),
(11, 'Blood of the Sacred Blood of the Damned', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nunc purus, pellentesque nec blandit quis, ornare placerat nibh. Nam lobortis in lectus vel mattis. Quisque finibus ex massa, nec mattis urna pulvinar vel. Nullam sed ante at quam maximus bibendum. Morbi vitae dolor pulvinar, suscipit nulla ut, tincidunt sapien. Curabitur laoreet egestas lacus a volutpat. Aenean ipsum lacus, pellentesque malesuada augue vitae, dapibus venenatis eros. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec ac felis auctor, vulputate dolor placerat, sagittis nibh. Mauris vulputate condimentum lacus, ut pulvinar mi egestas ac. Nulla condimentum sapien sit amet nunc commodo pharetra. Integer ut varius odio. Cras volutpat rhoncus semper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Integer sagittis nisl finibus diam bibendum, sit amet ultricies sapien vestibulum.', 15, 15, 15, 15, 10, '399.00'),
(12, 'Conquests of the Longbow: The Legend of Robin Hood', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nunc purus, pellentesque nec blandit quis, ornare placerat nibh. Nam lobortis in lectus vel mattis. Quisque finibus ex massa, nec mattis urna pulvinar vel. Nullam sed ante at quam maximus bibendum. Morbi vitae dolor pulvinar, suscipit nulla ut, tincidunt sapien. Curabitur laoreet egestas lacus a volutpat. Aenean ipsum lacus, pellentesque malesuada augue vitae, dapibus venenatis eros. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec ac felis auctor, vulputate dolor placerat, sagittis nibh. Mauris vulputate condimentum lacus, ut pulvinar mi egestas ac. Nulla condimentum sapien sit amet nunc commodo pharetra. Integer ut varius odio. Cras volutpat rhoncus semper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Integer sagittis nisl finibus diam bibendum, sit amet ultricies sapien vestibulum.', 15, 15, 15, 9, 10, '599.99'),
(13, 'Baldur\'s Gate II: Enhanced Edition', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer aliquam mattis massa, ut venenatis leo consequat ut. Donec eget urna consectetur, sagittis sem pharetra, molestie augue. Curabitur in ultricies enim, in volutpat sapien. Vivamus porttitor neque nisl, aliquet vestibulum est semper vel. Aliquam erat volutpat. Maecenas ut velit ipsum. Praesent sit amet justo vitae velit porttitor iaculis a eleifend augue.\r\n\r\nCras fermentum tortor eget viverra feugiat. Sed maximus justo ac quam venenatis, et pulvinar dui scelerisque. Sed sit amet ipsum libero. Nam in odio lorem. Cras congue dolor eget eleifend blandit. Donec feugiat commodo ornare. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce lacus mauris, sodales maximus neque nec, sodales finibus sapien. Phasellus vel mauris elit.', 15, 15, 15, 10, 20, '699.99');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.estoque_imagens`
--

CREATE TABLE `tb_admin.estoque_imagens` (
  `id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.estoque_imagens`
--

INSERT INTO `tb_admin.estoque_imagens` (`id`, `produto_id`, `imagem`) VALUES
(8, 8, 'produtoimgOne.jpg'),
(9, 9, 'produtoimgTwo.jpg'),
(10, 10, 'produtoimgThree.jpg'),
(11, 11, 'produtoimgFour.jpg'),
(12, 12, 'produtoimgFive.jpg'),
(13, 13, 'produtoimgSix.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.financeiro`
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

--
-- Estrutura da tabela `tb_admin.imagens_imoveis`
--

CREATE TABLE `tb_admin.imagens_imoveis` (
  `id` int(11) NOT NULL,
  `imovel_id` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.imagens_imoveis`
--

INSERT INTO `tb_admin.imagens_imoveis` (`id`, `imovel_id`, `imagem`) VALUES
(1, 1, 'listImovelFour.jpg'),
(3, 3, 'listImovelFour.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.imoveis`
--

CREATE TABLE `tb_admin.imoveis` (
  `id` int(11) NOT NULL,
  `empreend_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `area` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.imoveis`
--

INSERT INTO `tb_admin.imoveis` (`id`, `empreend_id`, `nome`, `preco`, `area`) VALUES
(1, 2, 'Imóvel de luxo', '1.00', 100),
(3, 0, 'Imóvel Representativo', '1.00', 900);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.modulos`
--

CREATE TABLE `tb_admin.modulos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.modulos`
--

INSERT INTO `tb_admin.modulos` (`id`, `nome`) VALUES
(1, 'Introdução e Conceitos'),
(2, 'Design Básico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.online`
--

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
-- Estrutura da tabela `tb_admin.pedidos`
--

CREATE TABLE `tb_admin.pedidos` (
  `id` int(11) NOT NULL,
  `reference_id` varchar(255) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Estrutura da tabela `tb_site.categorias`
--

CREATE TABLE `tb_site.categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.categorias`
--

INSERT INTO `tb_site.categorias` (`id`, `nome`, `slug`, `order_id`) VALUES
(1, 'Moda', 'moda', 1),
(2, 'Coronavirus', 'coronavirus', 2),
(3, 'Indústria', 'industria', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.comentarios`
--

CREATE TABLE `tb_site.comentarios` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `noticia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.comentarios`
--

INSERT INTO `tb_site.comentarios` (`id`, `usuario_id`, `comentario`, `noticia_id`) VALUES
(30, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis vel nulla at eleifend. Cras in ante egestas, consectetur tortor non, dapibus lorem.', 6),
(31, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis vel nulla at eleifend. Cras in ante egestas, consectetur tortor non, dapibus lorem. Suspendisse dolor massa, sollicitudin eu bibendum...', 6),
(32, 0, 'Meu comentário', 6),
(33, 0, 'Meu comentário...', 2),
(34, 0, 'Comentário teste', 2);

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
-- Estrutura da tabela `tb_site.noticias`
--

CREATE TABLE `tb_site.noticias` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `data` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `capa` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.noticias`
--

INSERT INTO `tb_site.noticias` (`id`, `categoria_id`, `data`, `titulo`, `conteudo`, `capa`, `slug`, `order_id`) VALUES
(1, 1, '10/08/2018', 'Wealthy Families Flock to Safe Assets as Recession Fears Mount', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut luctus lorem, vitae consectetur velit. Fusce non augue nec massa dignissim faucibus eget nec erat. Aliquam id est non dui lacinia blandit in varius ligula. Nullam enim neque, vulputate quis viverra non, tempor in lorem. Aenean id leo eu nisl tristique varius eu vel urna. In semper nisi arcu, eu placerat magna consequat a. Suspendisse vulputate metus a viverra congue. Duis tristique mattis mauris sed convallis. Curabitur dignissim purus sed sagittis tempor. Suspendisse fermentum turpis eu mattis vestibulum.\r\n\r\nSed sodales imperdiet arcu, non sagittis orci. Integer elementum enim venenatis nulla dictum, ut consectetur elit iaculis. Mauris fermentum lacus ac tortor elementum finibus. Morbi ut enim nec nulla mattis vulputate eu pharetra augue. Nulla at velit vitae lectus vehicula vestibulum ut eget leo. Suspendisse potenti. Vestibulum at cursus sapien. Nunc bibendum lectus risus, eu accumsan sem fringilla ac. Nunc laoreet non urna eget tristique. Quisque ultrices urna in imperdiet fringilla. Suspendisse tincidunt dui sit amet metus mollis, sed scelerisque dui gravida. Nullam id leo tincidunt, porttitor augue non, viverra diam. Nulla pulvinar urna at ornare euismod. Sed at eleifend tortor, a auctor nisi. Vestibulum sed iaculis nibh, nec ultrices magna.', 'myWallpaper.jpg', 'a-moda-no-mundo', 0),
(2, 2, '10/08/2018', 'Scientists Say The Great Lockdown May Ease Later Than Planned', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum non nibh a massa faucibus pulvinar. Aenean feugiat consectetur justo, a pretium dolor dapibus vitae. Morbi sagittis imperdiet erat rhoncus mollis. Aliquam eu justo tempor, volutpat mauris ac, dapibus erat. Fusce tristique, tellus at tempor rhoncus, sapien tellus iaculis lacus, eget congue tellus leo vel enim. Proin sollicitudin enim quam, et faucibus elit consequat varius. Quisque ultricies ligula eu arcu dictum consectetur. Mauris tempor velit neque, mollis accumsan nibh dignissim at. Etiam consequat odio vitae fringilla ultricies.\r\n\r\nSed nec congue turpis. Donec semper lorem at nulla ultricies, non finibus nibh finibus. Cras dictum in turpis in vulputate. Maecenas diam tellus, ultricies dapibus neque a, tempus pharetra orci. Proin in dolor vitae erat viverra commodo. Integer ac sem vel lorem aliquet lobortis. Proin non magna lorem. Morbi quis pretium erat. Vestibulum dignissim nunc diam, nec pulvinar felis pellentesque at. Vivamus sodales erat id purus volutpat, vitae vehicula mi imperdiet. Nulla ligula sapien, facilisis nec ex sit amet, tincidunt vehicula felis. Suspendisse feugiat dictum orci eget ornare. Mauris egestas elementum facilisis. Curabitur quis tempus purus, vitae tempor nisl. Sed quis augue quis magna efficitur feugiat non et enim. Duis id libero et arcu fermentum pulvinar et in justo.', 'cardNoticeOne.jpg', 'scientists-say-the-great-lockdown', 0),
(3, 3, '10/08/2021', 'Navigating Event Risks Gets Even More Complicated for Planners\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum non nibh a massa faucibus pulvinar. Aenean feugiat consectetur justo, a pretium dolor dapibus vitae. Morbi sagittis imperdiet erat rhoncus mollis. Aliquam eu justo tempor, volutpat mauris ac, dapibus erat. Fusce tristique, tellus at tempor rhoncus, sapien tellus iaculis lacus, eget congue tellus leo vel enim. Proin sollicitudin enim quam, et faucibus elit consequat varius. Quisque ultricies ligula eu arcu dictum consectetur. Mauris tempor velit neque, mollis accumsan nibh dignissim at. Etiam consequat odio vitae fringilla ultricies.\r\n\r\nSed nec congue turpis. Donec semper lorem at nulla ultricies, non finibus nibh finibus. Cras dictum in turpis in vulputate. Maecenas diam tellus, ultricies dapibus neque a, tempus pharetra orci. Proin in dolor vitae erat viverra commodo. Integer ac sem vel lorem aliquet lobortis. Proin non magna lorem. Morbi quis pretium erat. Vestibulum dignissim nunc diam, nec pulvinar felis pellentesque at. Vivamus sodales erat id purus volutpat, vitae vehicula mi imperdiet. Nulla ligula sapien, facilisis nec ex sit amet, tincidunt vehicula felis. Suspendisse feugiat dictum orci eget ornare. Mauris egestas elementum facilisis. Curabitur quis tempus purus, vitae tempor nisl. Sed quis augue quis magna efficitur feugiat non et enim. Duis id libero et arcu fermentum pulvinar et in justo.', 'cardNoticeTwo.jpg', 'navigating-event-risks\r\n', 0),
(4, 3, '10/08/2021', 'Europe’s Plunge Into the Void Captured in Tale of Two Lockdowns', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum non nibh a massa faucibus pulvinar. Aenean feugiat consectetur justo, a pretium dolor dapibus vitae. Morbi sagittis imperdiet erat rhoncus mollis. Aliquam eu justo tempor, volutpat mauris ac, dapibus erat. Fusce tristique, tellus at tempor rhoncus, sapien tellus iaculis lacus, eget congue tellus leo vel enim. Proin sollicitudin enim quam, et faucibus elit consequat varius. Quisque ultricies ligula eu arcu dictum consectetur. Mauris tempor velit neque, mollis accumsan nibh dignissim at. Etiam consequat odio vitae fringilla ultricies.\r\n\r\nSed nec congue turpis. Donec semper lorem at nulla ultricies, non finibus nibh finibus. Cras dictum in turpis in vulputate. Maecenas diam tellus, ultricies dapibus neque a, tempus pharetra orci. Proin in dolor vitae erat viverra commodo. Integer ac sem vel lorem aliquet lobortis. Proin non magna lorem. Morbi quis pretium erat. Vestibulum dignissim nunc diam, nec pulvinar felis pellentesque at. Vivamus sodales erat id purus volutpat, vitae vehicula mi imperdiet. Nulla ligula sapien, facilisis nec ex sit amet, tincidunt vehicula felis. Suspendisse feugiat dictum orci eget ornare. Mauris egestas elementum facilisis. Curabitur quis tempus purus, vitae tempor nisl. Sed quis augue quis magna efficitur feugiat non et enim. Duis id libero et arcu fermentum pulvinar et in justo.', 'cardNoticeOne.jpg', 'europe-plunge-nto', 0),
(5, 2, '10/08/2021', 'Scientists Say The Great Lockdown May Ease Later Than Planned', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum non nibh a massa faucibus pulvinar. Aenean feugiat consectetur justo, a pretium dolor dapibus vitae. Morbi sagittis imperdiet erat rhoncus mollis. Aliquam eu justo tempor, volutpat mauris ac, dapibus erat. Fusce tristique, tellus at tempor rhoncus, sapien tellus iaculis lacus, eget congue tellus leo vel enim. Proin sollicitudin enim quam, et faucibus elit consequat varius. Quisque ultricies ligula eu arcu dictum consectetur. Mauris tempor velit neque, mollis accumsan nibh dignissim at. Etiam consequat odio vitae fringilla ultricies.\r\n\r\nSed nec congue turpis. Donec semper lorem at nulla ultricies, non finibus nibh finibus. Cras dictum in turpis in vulputate. Maecenas diam tellus, ultricies dapibus neque a, tempus pharetra orci. Proin in dolor vitae erat viverra commodo. Integer ac sem vel lorem aliquet lobortis. Proin non magna lorem. Morbi quis pretium erat. Vestibulum dignissim nunc diam, nec pulvinar felis pellentesque at. Vivamus sodales erat id purus volutpat, vitae vehicula mi imperdiet. Nulla ligula sapien, facilisis nec ex sit amet, tincidunt vehicula felis. Suspendisse feugiat dictum orci eget ornare. Mauris egestas elementum facilisis. Curabitur quis tempus purus, vitae tempor nisl. Sed quis augue quis magna efficitur feugiat non et enim. Duis id libero et arcu fermentum pulvinar et in justo.', 'noticeWalp.jpg', 'scientists-say-he-great-lockdown', 0),
(6, 3, '14/09/2021', 'Face Masks to Decoy T-Shirts: The Rise of Anti-Surveillance Fashion', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum non nibh a massa faucibus pulvinar. Aenean feugiat consectetur justo, a pretium dolor dapibus vitae. Morbi sagittis imperdiet erat rhoncus mollis. Aliquam eu justo tempor, volutpat mauris ac, dapibus erat. Fusce tristique, tellus at tempor rhoncus, sapien tellus iaculis lacus, eget congue tellus leo vel enim. Proin sollicitudin enim quam, et faucibus elit consequat varius. Quisque ultricies ligula eu arcu dictum consectetur. Mauris tempor velit neque, mollis accumsan nibh dignissim at. Etiam consequat odio vitae fringilla ultricies.\r\n\r\nSed nec congue turpis. Donec semper lorem at nulla ultricies, non finibus nibh finibus. Cras dictum in turpis in vulputate. Maecenas diam tellus, ultricies dapibus neque a, tempus pharetra orci. Proin in dolor vitae erat viverra commodo. Integer ac sem vel lorem aliquet lobortis. Proin non magna lorem. Morbi quis pretium erat. Vestibulum dignissim nunc diam, nec pulvinar felis pellentesque at. Vivamus sodales erat id purus volutpat, vitae vehicula mi imperdiet. Nulla ligula sapien, facilisis nec ex sit amet, tincidunt vehicula felis. Suspendisse feugiat dictum orci eget ornare. Mauris egestas elementum facilisis. Curabitur quis tempus purus, vitae tempor nisl. Sed quis augue quis magna efficitur feugiat non et enim. Duis id libero et arcu fermentum pulvinar et in justo.', 'cardNoticeThree.jpg', 'face-masks-to-decoy', 0);

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
-- Índices para tabela `tb_admin.agenda`
--
ALTER TABLE `tb_admin.agenda`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.alunos`
--
ALTER TABLE `tb_admin.alunos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.aulas`
--
ALTER TABLE `tb_admin.aulas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.clientes`
--
ALTER TABLE `tb_admin.clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.curso_controle`
--
ALTER TABLE `tb_admin.curso_controle`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.empreendimentos`
--
ALTER TABLE `tb_admin.empreendimentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.estoque`
--
ALTER TABLE `tb_admin.estoque`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.estoque_imagens`
--
ALTER TABLE `tb_admin.estoque_imagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.financeiro`
--
ALTER TABLE `tb_admin.financeiro`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.imagens_imoveis`
--
ALTER TABLE `tb_admin.imagens_imoveis`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.imoveis`
--
ALTER TABLE `tb_admin.imoveis`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.modulos`
--
ALTER TABLE `tb_admin.modulos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.pedidos`
--
ALTER TABLE `tb_admin.pedidos`
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
-- Índices para tabela `tb_site.categorias`
--
ALTER TABLE `tb_site.categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.comentarios`
--
ALTER TABLE `tb_site.comentarios`
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
-- Índices para tabela `tb_site.noticias`
--
ALTER TABLE `tb_site.noticias`
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
-- AUTO_INCREMENT de tabela `tb_admin.agenda`
--
ALTER TABLE `tb_admin.agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_admin.alunos`
--
ALTER TABLE `tb_admin.alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_admin.aulas`
--
ALTER TABLE `tb_admin.aulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_admin.clientes`
--
ALTER TABLE `tb_admin.clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_admin.curso_controle`
--
ALTER TABLE `tb_admin.curso_controle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_admin.empreendimentos`
--
ALTER TABLE `tb_admin.empreendimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_admin.estoque`
--
ALTER TABLE `tb_admin.estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tb_admin.estoque_imagens`
--
ALTER TABLE `tb_admin.estoque_imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tb_admin.financeiro`
--
ALTER TABLE `tb_admin.financeiro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de tabela `tb_admin.imagens_imoveis`
--
ALTER TABLE `tb_admin.imagens_imoveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_admin.imoveis`
--
ALTER TABLE `tb_admin.imoveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_admin.modulos`
--
ALTER TABLE `tb_admin.modulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de tabela `tb_admin.pedidos`
--
ALTER TABLE `tb_admin.pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT de tabela `tb_site.categorias`
--
ALTER TABLE `tb_site.categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_site.comentarios`
--
ALTER TABLE `tb_site.comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
-- AUTO_INCREMENT de tabela `tb_site.noticias`
--
ALTER TABLE `tb_site.noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
