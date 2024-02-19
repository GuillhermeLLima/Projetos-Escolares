-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/06/2023 às 16:40
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hotel`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `cod` int(11) NOT NULL,
  `nome` varchar(220) DEFAULT NULL,
  `email` varchar(220) DEFAULT NULL,
  `senha` varchar(220) DEFAULT NULL,
  `telefone` varchar(220) DEFAULT NULL,
  `endereco` varchar(220) DEFAULT NULL,
  `foto` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`cod`, `nome`, `email`, `senha`, `telefone`, `endereco`, `foto`) VALUES
(11, 'Cliente 50', 'cliente50@example.com', 'senha50', '111111111', 'Endereço 50', 'semFoto.png'),
(12, 'Cliente 51', 'cliente51@example.com', 'senha51', '222222222', 'Endereço 51', 'imagem51.jpg'),
(13, 'Cliente 52', 'cliente52@example.com', 'senha52', '333333333', 'Endereço 52', 'imagem52.jpg'),
(14, 'Cliente 53', 'cliente53@example.com', 'senha53', '444444444', 'Endereço 53', 'imagem53.jpg'),
(15, 'Cliente 54', 'cliente54@example.com', 'senha54', '555555555', 'Endereço 54', 'imagem54.jpg'),
(16, 'Cliente 55', 'cliente55@example.com', 'senha55', '666666666', 'Endereço 55', 'imagem55.jpg'),
(17, 'Cliente 56', 'cliente56@example.com', 'senha56', '777777777', 'Endereço 56', 'imagem56.jpg'),
(18, 'Cliente 57', 'cliente57@example.com', 'senha57', '888888888', 'Endereço 57', 'imagem57.jpg'),
(19, 'Cliente 58', 'cliente58@example.com', 'senha58', '999999999', 'Endereço 58', 'imagem58.jpg'),
(20, 'Cliente 59', 'cliente59@example.com', 'senha59', '101010101', 'Endereço 59', 'imagem59.jpg'),
(21, 'Cliente 60', 'cliente60@example.com', 'senha60', '121212121', 'Endereço 60', 'imagem60.jpg'),
(22, 'Cliente 61', 'cliente61@example.com', 'senha61', '131313131', 'Endereço 61', 'imagem61.jpg'),
(23, 'Cliente 62', 'cliente62@example.com', 'senha62', '141414141', 'Endereço 62', 'imagem62.jpg'),
(24, 'Cliente 63', 'cliente63@example.com', 'senha63', '151515151', 'Endereço 63', 'imagem63.jpg'),
(25, 'Cliente 64', 'cliente64@example.com', 'senha64', '161616161', 'Endereço 64', 'imagem64.jpg'),
(26, 'Cliente 65', 'cliente65@example.com', 'senha65', '171717171', 'Endereço 65', 'imagem65.jpg'),
(27, 'Cliente 66', 'cliente66@example.com', 'senha66', '181818181', 'Endereço 66', 'imagem66.jpg'),
(28, 'Cliente 67', 'cliente67@example.com', 'senha67', '191919191', 'Endereço 67', 'imagem67.jpg'),
(29, 'Cliente 68', 'cliente68@example.com', 'senha68', '202020202', 'Endereço 68', 'imagem68.jpg'),
(39, 'Cliente 69', 'cliente69@example.com', 'senha69', '1234567890', 'endereço 69', '5-charms-of-kim-jiwoong-cover-copie.jpg'),
(40, 'Cliente 70', 'cliente70@example.com', 'senha70', '1234567890', 'endereço 70', 'ariana-grande-coachella.jpg'),
(41, 'Cliente 71', 'cliente71@example.com', 'senha71', '1234567890', 'endereço 71', '5-charms-of-kim-jiwoong-cover-copie.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `foto`
--

CREATE TABLE `foto` (
  `cod` int(11) NOT NULL,
  `quarto_cod` int(11) DEFAULT NULL,
  `imagem` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `foto`
--

INSERT INTO `foto` (`cod`, `quarto_cod`, `imagem`) VALUES
(136, 41, 'wallpaperflare.com_wallpaper (1).jpg'),
(137, 41, 'wallpaperflare.com_wallpaper (2).jpg'),
(138, 41, 'wallpaperflare.com_wallpaper (5).jpg'),
(143, 42, 'soori-bali-accommodation-deluxe-ocean-pool-villa-01-mh.jpg'),
(144, 42, 'soori-bali-accommodation-deluxe-ocean-pool-villa-02-mh.jpg'),
(145, 42, 'soori-bali-accommodation-deluxe-ocean-pool-villa-03-mh.jpg'),
(146, 42, 'soori-bali-accommodation-deluxe-ocean-pool-villa-04-mh.jpg'),
(147, 43, 'soori-bali-hotel-accommodations-2brbpv-01.jpg'),
(148, 43, 'soori-bali-hotel-accommodations-2brbpv-02.jpg'),
(149, 43, 'soori-bali-hotel-accommodations-2brbpv-03 (1).jpg'),
(150, 43, 'soori-bali-hotel-accommodations-2brbpv-04.jpg'),
(151, 36, 'soori-bali-hotel-accommodations-mpv-01.jpg'),
(152, 36, 'soori-bali-hotel-accommodations-mpv-02.jpg'),
(153, 36, 'soori-bali-hotel-accommodations-mpv-03.jpg'),
(154, 36, 'soori-bali-hotel-accommodations-mpv-04.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `cod` int(11) NOT NULL,
  `nome` varchar(220) DEFAULT NULL,
  `email` varchar(220) DEFAULT NULL,
  `senha` varchar(220) DEFAULT NULL,
  `telefone` varchar(220) DEFAULT NULL,
  `endereco` varchar(220) DEFAULT NULL,
  `foto` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`cod`, `nome`, `email`, `senha`, `telefone`, `endereco`, `foto`) VALUES
(80, 'g', 'g1@gmail.com', '1234567890', '12345', 's', 'semFoto.png'),
(88, 'g', 'g@gmail.comm', '1234567', '1234567', 'sim', 'q.jpg'),
(90, 'a', 'a@a.a', 'a', '1234567890', 'a', '5-charms-of-kim-jiwoong-cover-copie.jpg'),
(92, 'd', 'd@d.d', 'd', '1234567890', 'd', 'semFoto.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `quarto`
--

CREATE TABLE `quarto` (
  `cod` int(11) NOT NULL,
  `preco` double DEFAULT NULL,
  `nome` varchar(220) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `quarto`
--

INSERT INTO `quarto` (`cod`, `preco`, `nome`, `descricao`) VALUES
(36, 1000, 'Mountain Paradise', 'Mountain Paradise, um retiro de luxo aninhado nas montanhas de Bali, Indonésia. Este quarto de hotel excepcional oferece uma experiência inigualável de conforto e serenidade. Com vista para exuberantes paisagens montanhosas, o ambiente é um convite à paz e tranquilidade. Os interiores elegantes e modernos se fundem harmoniosamente com a natureza circundante. Equipado com comodidades de primeira classe, como uma cama king-size, banheiro de mármore e varanda privativa.'),
(41, 1200, 'Sea\'s Pool', 'Sea\'s Pool é um verdadeiro refúgio tropical. Com uma decoração elegante e contemporânea, o quarto oferece uma vista deslumbrante para o mar. A principal atração é a piscina privativa, onde os hóspedes podem relaxar e desfrutar de momentos de tranquilidade. Comodidades de luxo, como uma cama king-size confortável, banheiro espaçoso e área de estar aconchegante, completam a experiência. Este santuário à beira-mar é perfeito para casais em busca de privacidade e serenidade em meio ao paraíso'),
(42, 800, 'Pool Villa', 'Pool Villa é oásis encantador. Este quarto de hotel tranquilo oferece uma atmosfera relaxante e confortável, longe do agito da vida cotidiana. Com sua decoração inspirada em elementos marítimos e tons suaves, você se sentirá imerso em um ambiente sereno. A suíte espaçosa apresenta um design contemporâneo, com comodidades modernas e uma atmosfera acolhedora. Desfrute de momentos de tranquilidade na varanda privativa, apreciando a vista dos jardins exuberantes circundantes.'),
(43, 1500, 'Ocean Villa', 'Ocean Villa é um retiro paradisíaco à beira-mar, onde luxo e serenidade se encontram. Com uma vista deslumbrante para o oceano, este quarto de hotel é um refúgio exclusivo e contemporâneo. Seu design elegante combina perfeitamente com a natureza exuberante que o rodeia. Os hóspedes podem desfrutar de um espaçoso quarto com uma cama confortável, uma área de estar aconchegante e um terraço privativo com uma piscina infinita, proporcionando momentos de relaxamento e contemplação.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `reserva`
--

CREATE TABLE `reserva` (
  `cliente_cod` int(11) DEFAULT NULL,
  `quarto_cod` int(11) DEFAULT NULL,
  `funcionario_cod` int(11) DEFAULT NULL,
  `cod` int(11) NOT NULL,
  `dataEntrada` date DEFAULT NULL,
  `dataSaida` date DEFAULT NULL,
  `crianca` int(11) DEFAULT NULL,
  `adulto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `reserva`
--

INSERT INTO `reserva` (`cliente_cod`, `quarto_cod`, `funcionario_cod`, `cod`, `dataEntrada`, `dataSaida`, `crianca`, `adulto`) VALUES
(41, 36, 80, 1, '2023-06-10', '2023-06-04', 1, 2),
(11, 41, 80, 12, '2023-06-26', '2023-06-26', 2, 2),
(11, 43, 80, 13, '2023-06-27', '2023-06-27', 1, 1),
(11, 42, 80, 14, '2023-07-08', '2023-07-08', 2, 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cod`);

--
-- Índices de tabela `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `FK_imagem_2` (`quarto_cod`) USING BTREE;

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`cod`);

--
-- Índices de tabela `quarto`
--
ALTER TABLE `quarto`
  ADD PRIMARY KEY (`cod`);

--
-- Índices de tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `FK_Reserva_1` (`cliente_cod`),
  ADD KEY `FK_Reserva_2` (`quarto_cod`),
  ADD KEY `FK_Reserva_3` (`funcionario_cod`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `foto`
--
ALTER TABLE `foto`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de tabela `quarto`
--
ALTER TABLE `quarto`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `FK_foto_2` FOREIGN KEY (`quarto_cod`) REFERENCES `quarto` (`cod`);

--
-- Restrições para tabelas `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `FK_Reserva_1` FOREIGN KEY (`cliente_cod`) REFERENCES `cliente` (`cod`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_Reserva_2` FOREIGN KEY (`quarto_cod`) REFERENCES `quarto` (`cod`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_Reserva_3` FOREIGN KEY (`funcionario_cod`) REFERENCES `funcionario` (`cod`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
