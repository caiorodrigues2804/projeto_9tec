-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 03-Jun-2023 às 05:08
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `miniloja2017`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administracao`
--

CREATE TABLE `administracao` (
  `adm_id` int(10) UNSIGNED NOT NULL,
  `adm_nome` varchar(80) DEFAULT NULL,
  `adm_email` varchar(60) DEFAULT NULL,
  `adm_pass` varchar(128) DEFAULT NULL,
  `adm_data_cad` date DEFAULT NULL,
  `adm_hora_cad` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `administracao`
--

INSERT INTO `administracao` (`adm_id`, `adm_nome`, `adm_email`, `adm_pass`, `adm_data_cad`, `adm_hora_cad`) VALUES
(1, 'ADM', 'suporte@9tec.com', 'f900e7b99c4a9c1a97f0396d4d34c374574d2945437ca1f30c3ad28dcefb55679e90312b6d801798888d2fa3cb03e769b21ab0982109074ce812cd2c349676f9', NULL, NULL),
(8, 'ADM0285', 'tester.testador1288@gmail.com', 'fde13401e2b00908416fa32dbaf8f49511be3c5670c1160441d76e5dd0c99701fcaa7cb9acce2806bcd95a89ce9554fcacded4dda4881866aa12aa49753fe787', '2023-06-02', '21:49:18'),
(9, 'ADM025', 'tester.testador125@gmail.com', '679422', '2023-06-02', '21:59:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `as_categorias`
--

CREATE TABLE `as_categorias` (
  `cate_id` int(11) NOT NULL,
  `cate_nome` varchar(80) DEFAULT NULL,
  `cate_slug` varchar(80) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=5461 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `as_categorias`
--

INSERT INTO `as_categorias` (`cate_id`, `cate_nome`, `cate_slug`) VALUES
(1, 'Placa de vídeo', 'Placa de vídeo'),
(2, 'Processador', 'Processador'),
(11, 'SSD', 'SSD');

-- --------------------------------------------------------

--
-- Estrutura da tabela `as_clientes`
--

CREATE TABLE `as_clientes` (
  `cli_id` int(10) UNSIGNED NOT NULL,
  `cli_nome` varchar(80) DEFAULT NULL,
  `cli_sobrenome` varchar(80) DEFAULT NULL,
  `cli_endereco` varchar(100) DEFAULT NULL,
  `cli_numero` varchar(20) DEFAULT NULL,
  `cli_bairro` varchar(80) DEFAULT NULL,
  `cli_cidade` varchar(150) DEFAULT NULL,
  `cli_uf` varchar(2) DEFAULT NULL,
  `cli_cep` varchar(10) DEFAULT NULL,
  `cli_cpf` varchar(12) DEFAULT NULL,
  `cli_rg` varchar(20) DEFAULT NULL,
  `cli_ddd` int(2) DEFAULT NULL,
  `cli_fone` varchar(10) DEFAULT NULL,
  `cli_celular` varchar(10) DEFAULT NULL,
  `cli_email` varchar(60) DEFAULT NULL,
  `cli_pass` varchar(128) DEFAULT NULL,
  `cli_data_nasc` date DEFAULT NULL,
  `cli_data_cad` date DEFAULT NULL,
  `cli_hora_cad` time DEFAULT NULL,
  `dados_extras` varchar(40) NOT NULL,
  `status_clientes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB AVG_ROW_LENGTH=5461 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `as_clientes`
--

INSERT INTO `as_clientes` (`cli_id`, `cli_nome`, `cli_sobrenome`, `cli_endereco`, `cli_numero`, `cli_bairro`, `cli_cidade`, `cli_uf`, `cli_cep`, `cli_cpf`, `cli_rg`, `cli_ddd`, `cli_fone`, `cli_celular`, `cli_email`, `cli_pass`, `cli_data_nasc`, `cli_data_cad`, `cli_hora_cad`, `dados_extras`, `status_clientes`) VALUES
(2, 'Ciclano Fulano', 'Manoel Costa', 'Rua Antonio Izaias da Costa', '333', 'Gramame', 'João Pessoa', 'PB', '58069260', '34244706607', '350153231', 83, '8336929599', '8398525100', 'violante6000@uorak.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '1994-02-10', '2023-06-02', '12:51:28', '12345678', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `as_estados`
--

CREATE TABLE `as_estados` (
  `estado_id` int(10) UNSIGNED NOT NULL,
  `estado_sigla` char(2) DEFAULT NULL,
  `estado_nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=606 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `as_estados`
--

INSERT INTO `as_estados` (`estado_id`, `estado_sigla`, `estado_nome`) VALUES
(1, 'AC', 'ACRE'),
(2, 'AL', 'ALAGOAS'),
(3, 'AP', 'AMAPÁ'),
(4, 'AM', 'AMAZONAS'),
(5, 'BA', 'BAHIA'),
(6, 'CE', 'CEARÁ'),
(7, 'DF', 'DISTRITO FEDERAL'),
(8, 'ES', 'ESPÍRITO SANTO'),
(9, 'GO', 'GOIÁS'),
(10, 'MA', 'MARANHÃO'),
(11, 'MT', 'MATO GROSSO'),
(12, 'MS', 'MATO GROSSO DO SUL'),
(13, 'MG', 'MINAS GERAIS'),
(14, 'PA', 'PARÁ'),
(15, 'PB', 'PARAÍBA'),
(16, 'PR', 'PARANÁ'),
(17, 'PE', 'PERNAMBUCO'),
(18, 'PI', 'PIAUÍ'),
(19, 'RJ', 'RIO DE JANEIRO'),
(20, 'RN', 'RIO GRANDE DO NORTE'),
(21, 'RS', 'RIO GRANDE DO SUL'),
(22, 'RO', 'RONDÔNIA'),
(23, 'RR', 'RORAIMA'),
(24, 'SC', 'SANTA CATARINA'),
(25, 'SP', 'SÃO PAULO'),
(26, 'SE', 'SERGIPE'),
(27, 'TO', 'TOCANTINS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `as_imagens`
--

CREATE TABLE `as_imagens` (
  `img_id` int(11) NOT NULL,
  `img_nome` varchar(60) DEFAULT NULL,
  `img_pro_id` int(11) DEFAULT NULL,
  `img_pasta` varchar(34) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=8192 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `as_imagens`
--

INSERT INTO `as_imagens` (`img_id`, `img_nome`, `img_pro_id`, `img_pasta`) VALUES
(1, 'skol_2.png', 1, NULL),
(2, 'skol_3.png', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `as_pedidos`
--

CREATE TABLE `as_pedidos` (
  `ped_id` int(11) NOT NULL,
  `ped_data` date DEFAULT NULL,
  `ped_hora` time DEFAULT NULL,
  `ped_cliente` int(11) DEFAULT NULL,
  `ped_cod` varchar(100) DEFAULT NULL,
  `ped_ref` varchar(40) DEFAULT NULL,
  `ped_pag_status` varchar(20) DEFAULT 'NAO',
  `ped_pag_forma` varchar(20) DEFAULT NULL,
  `ped_pag_tipo` varchar(20) DEFAULT NULL,
  `ped_pag_codigo` varchar(220) DEFAULT NULL,
  `ped_frete_valor` double(9,2) DEFAULT NULL,
  `ped_frete_tipo` varchar(20) DEFAULT NULL,
  `ped_valor_item` varchar(100) NOT NULL,
  `concluido` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB AVG_ROW_LENGTH=16384 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `as_pedidos`
--

INSERT INTO `as_pedidos` (`ped_id`, `ped_data`, `ped_hora`, `ped_cliente`, `ped_cod`, `ped_ref`, `ped_pag_status`, `ped_pag_forma`, `ped_pag_tipo`, `ped_pag_codigo`, `ped_frete_valor`, `ped_frete_tipo`, `ped_valor_item`, `concluido`) VALUES
(1, '2023-06-02', '16:39:06', 2, '2306021638592', '2306021638592', 'SIM', NULL, NULL, NULL, 94.81, 'sedex', '1640', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `as_pedidos_itens`
--

CREATE TABLE `as_pedidos_itens` (
  `item_id` int(11) UNSIGNED NOT NULL,
  `item_produto` int(11) DEFAULT NULL,
  `item_valor` double(9,2) DEFAULT NULL,
  `item_qtd` int(6) DEFAULT NULL,
  `item_ped_cod` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=1092 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `as_pedidos_itens`
--

INSERT INTO `as_pedidos_itens` (`item_id`, `item_produto`, `item_valor`, `item_qtd`, `item_ped_cod`) VALUES
(3, 5, 1640.00, 1, '2306021255342'),
(6, 5, 3280.00, 2, '2306021546022'),
(7, 5, 1640.00, 1, '2306021547172'),
(8, 5, 1640.00, 1, '2306021548432'),
(9, 5, 1640.00, 1, '2306021549322'),
(10, 5, 3280.00, 2, '2306021551072'),
(11, 5, 1640.00, 1, '2306021552002'),
(12, 5, 3280.00, 2, '2306021552552'),
(13, 5, 1640.00, 1, '2306021556162'),
(14, 5, 1640.00, 1, '2306021600062'),
(15, 5, 1640.00, 1, '2306021600432'),
(16, 5, 1640.00, 1, '2306021601102'),
(17, 5, 1640.00, 1, '2306021602162'),
(18, 5, 3280.00, 2, '2306021610192'),
(19, 5, 1640.00, 1, '2306021613452'),
(20, 5, 1640.00, 1, '2306021638592');

-- --------------------------------------------------------

--
-- Estrutura da tabela `as_produtos`
--

CREATE TABLE `as_produtos` (
  `pro_id` int(11) NOT NULL,
  `pro_categoria` int(11) DEFAULT NULL,
  `pro_nome` varchar(100) DEFAULT NULL,
  `pro_desc` text DEFAULT NULL,
  `pro_peso` double(4,2) DEFAULT 0.00,
  `pro_valor` double(15,2) DEFAULT 0.00,
  `pro_altura` int(5) DEFAULT 0,
  `pro_largura` int(5) DEFAULT 0,
  `pro_comprimento` int(5) DEFAULT 0,
  `pro_img` varchar(1000) DEFAULT NULL,
  `pro_slug` varchar(100) DEFAULT NULL,
  `pro_estoque` int(9) DEFAULT 0,
  `pro_modelo` varchar(40) DEFAULT NULL,
  `pro_ref` varchar(20) DEFAULT NULL,
  `pro_fabricante` varchar(255) DEFAULT NULL,
  `pro_ativo` char(3) DEFAULT 'NAO',
  `pro_frete_free` varchar(3) DEFAULT 'NAO',
  `pro_descricao_extra` text DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=5461 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `as_produtos`
--

INSERT INTO `as_produtos` (`pro_id`, `pro_categoria`, `pro_nome`, `pro_desc`, `pro_peso`, `pro_valor`, `pro_altura`, `pro_largura`, `pro_comprimento`, `pro_img`, `pro_slug`, `pro_estoque`, `pro_modelo`, `pro_ref`, `pro_fabricante`, `pro_ativo`, `pro_frete_free`, `pro_descricao_extra`) VALUES
(0, NULL, NULL, NULL, 0.00, 0.00, 0, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, 'NAO', 'NAO', NULL),
(5, 2, 'Intel i7 10g 2.90GHz ', 'O processador Intel Core i7 de 10ª geração é uma unidade de processamento poderosa e altamente avançada, projetada para oferecer um desempenho excepcional em computadores pessoais e estações de trabalho. Com uma arquitetura moderna e recursos inovadores, o Intel Core i7 de 10ª geração é uma escolha popular para gamers, criadores de conteúdo e profissionais que exigem alto desempenho em suas atividades diárias.\r\n<br/>\r\nO Intel Core i7 de 10ª geração é baseado na arquitetura de processador de 14 nanômetros (nm) da Intel e possui até 8 núcleos e 16 threads, o que permite a execução de várias tarefas simultaneamente com facilidade. Com velocidades de clock que variam de 2,0 GHz a 5,3 GHz, o Intel Core i7 de 10ª geração oferece um desempenho excepcional em tarefas exigentes, como edição de vídeo, renderização em 3D, jogos de alta qualidade e outras cargas de trabalho intensivas.\r\n<br/>\r\nUma das características marcantes do Intel Core i7 de 10ª geração é a tecnologia Intel Turbo Boost Max 3.0, que identifica e impulsiona automaticamente os núcleos mais rápidos do processador para proporcionar um desempenho ainda melhor em tarefas de um único núcleo. Isso resulta em uma maior capacidade de resposta e tempos de carregamento mais rápidos para aplicativos e jogos.\r\n<br/>\r\nAlém disso, o Intel Core i7 de 10ª geração suporta a tecnologia Intel Hyper-Threading, que permite a execução de dois threads por núcleo, resultando em um melhor desempenho multithreading e uma maior eficiência de processamento. Ele também suporta memória DDR4 de alta velocidade, proporcionando um aumento significativo no desempenho do sistema em comparação com as gerações anteriores de processadores Intel.\r\n<br/>\r\nO Intel Core i7 de 10ª geração também é equipado com a tecnologia de gráficos Intel Iris Plus, que oferece gráficos integrados aprimorados para uma experiência de jogo e entretenimento mais imersiva. Ele suporta até três monitores 4K UHD e oferece recursos avançados de codificação e decodificação de vídeo para transmissões e criação de conteúdo em alta qualidade.\r\n<br/>\r\nAlém disso, o Intel Core i7 de 10ª geração suporta as mais recentes tecnologias de conectividade, como USB 3.1 Gen2, Thunderbolt 3 e Intel Optane Memory, que proporcionam uma experiência de computação rápida e eficiente.\r\n<br/>\r\nEm resumo, o Intel Core i7 de 10ª geração é um processador de alto desempenho que oferece velocidades de clock rápidas, suporte a multitarefa intensiva, recursos avançados de gráficos e conectividade moderna. É uma escolha ideal para aqueles que precisam de um processador poderoso para jogos, criação de conteúdo e tarefas profissionais exigentes.', 99.99, 1640.00, 100, 100, 100, 'https://img.terabyteshop.com.br/produto/g/processador-intel-core-i7-10700-290ghz-470ghz-turbo-10-geracao-8-cores-16-thread-lga-1200-bx8070110700_95187.jpg', 'https://img.terabyteshop.com.br/produto/g/processador-intel-core-i7-10700-290ghz-470ghz-turbo-10-ger', 100000, 'BX8070110700', '0040', 'Intel', 'sim', 'Não', 'Processador Intel Core i7 10700, 2.90GHz (4.70GHz Turbo), 10ª Geração, 8-Cores 16-Threads, LGA 1200, BX8070110700');

-- --------------------------------------------------------

--
-- Estrutura da tabela `as_user`
--

CREATE TABLE `as_user` (
  `user_id` int(11) NOT NULL,
  `user_nome` varchar(30) DEFAULT NULL,
  `user_email` varchar(60) DEFAULT NULL,
  `user_pw` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administracao`
--
ALTER TABLE `administracao`
  ADD PRIMARY KEY (`adm_id`);

--
-- Índices para tabela `as_categorias`
--
ALTER TABLE `as_categorias`
  ADD PRIMARY KEY (`cate_id`);

--
-- Índices para tabela `as_clientes`
--
ALTER TABLE `as_clientes`
  ADD PRIMARY KEY (`cli_id`);

--
-- Índices para tabela `as_estados`
--
ALTER TABLE `as_estados`
  ADD PRIMARY KEY (`estado_id`);

--
-- Índices para tabela `as_imagens`
--
ALTER TABLE `as_imagens`
  ADD PRIMARY KEY (`img_id`);

--
-- Índices para tabela `as_pedidos`
--
ALTER TABLE `as_pedidos`
  ADD PRIMARY KEY (`ped_id`);

--
-- Índices para tabela `as_pedidos_itens`
--
ALTER TABLE `as_pedidos_itens`
  ADD PRIMARY KEY (`item_id`);

--
-- Índices para tabela `as_produtos`
--
ALTER TABLE `as_produtos`
  ADD PRIMARY KEY (`pro_id`);

--
-- Índices para tabela `as_user`
--
ALTER TABLE `as_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administracao`
--
ALTER TABLE `administracao`
  MODIFY `adm_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `as_categorias`
--
ALTER TABLE `as_categorias`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `as_clientes`
--
ALTER TABLE `as_clientes`
  MODIFY `cli_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `as_estados`
--
ALTER TABLE `as_estados`
  MODIFY `estado_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `as_imagens`
--
ALTER TABLE `as_imagens`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3321323;

--
-- AUTO_INCREMENT de tabela `as_pedidos`
--
ALTER TABLE `as_pedidos`
  MODIFY `ped_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `as_pedidos_itens`
--
ALTER TABLE `as_pedidos_itens`
  MODIFY `item_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `as_produtos`
--
ALTER TABLE `as_produtos`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `as_user`
--
ALTER TABLE `as_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
