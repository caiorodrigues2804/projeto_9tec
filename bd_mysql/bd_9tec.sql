-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01-Jun-2023 às 22:40
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
  `adm_endereco` varchar(100) DEFAULT NULL,
  `adm_numero` varchar(20) DEFAULT NULL,
  `adm_bairro` varchar(80) DEFAULT NULL,
  `adm_cidade` varchar(150) DEFAULT NULL,
  `adm_uf` varchar(2) DEFAULT NULL,
  `adm_cep` varchar(10) DEFAULT NULL,
  `adm_cpf` varchar(12) DEFAULT NULL,
  `adm_rg` varchar(20) DEFAULT NULL,
  `adm_ddd` int(2) DEFAULT NULL,
  `adm_fone` varchar(10) DEFAULT NULL,
  `adm_celular` varchar(10) DEFAULT NULL,
  `adm_email` varchar(60) DEFAULT NULL,
  `adm_pass` varchar(128) DEFAULT NULL,
  `adm_data_nasc` date DEFAULT NULL,
  `adm_data_cad` date DEFAULT NULL,
  `adm_hora_cad` time DEFAULT NULL,
  `usuario_adm` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `administracao`
--

INSERT INTO `administracao` (`adm_id`, `adm_nome`, `adm_endereco`, `adm_numero`, `adm_bairro`, `adm_cidade`, `adm_uf`, `adm_cep`, `adm_cpf`, `adm_rg`, `adm_ddd`, `adm_fone`, `adm_celular`, `adm_email`, `adm_pass`, `adm_data_nasc`, `adm_data_cad`, `adm_hora_cad`, `usuario_adm`) VALUES
(0, 'ADM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kulmehorku@gufum.com', 'f900e7b99c4a9c1a97f0396d4d34c374574d2945437ca1f30c3ad28dcefb55679e90312b6d801798888d2fa3cb03e769b21ab0982109074ce812cd2c349676f9', NULL, NULL, NULL, '');

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
(2, 'Processador', 'Processador');

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
(1, 'Edson Carlos', 'Eduardo Samuel Nogueira', 'Rua Projetada 302', '425', 'Belo Jardim II', 'Rio Branco', 'AC', '69908050', '94749304220', '187070933', 11, '6838682924', '6898122168', 'd940f2808d@fireboxmail.lol', '550e1bafe077ff0b0b67f4e32f29d751', '1995-05-01', '2023-04-30', '23:04:39', 'w9bu35tp', 0),
(2, 'Emily Regina ', 'Sebastiana Martins', 'Rua Manuel Ulisses Teixeira', '389', 'Massaranduba', 'Arapiraca', 'AL', '57309762', '13309031101', '378363852', 82, '37153592', '988459340', 'aidi8688@uorak.com', '550e1bafe077ff0b0b67f4e32f29d751', '1978-02-21', '2023-05-16', '13:24:55', 'r93x87uq', 0),
(3, 'Fulano', 'SIlva', 'Rua Manoel Henrique dos Santos', '11', 'Aeroporto', 'Aracaju', 'SE', '49037356', '02327317649', '343451864', 11, '7999480440', '7938929457', 'nouha4521@uorak.com', '12345678', '2000-04-28', '2023-06-01', '16:54:20', 's89p73qn', 0),
(4, 'Ciclano', 'Silva', 'Travessa Santa Luzia', '860', 'Cantinho do Céu', 'Serra', 'ES', '29162644', '95156194168', '250214301', 55, '2739713272', '2799529284', 'spartak8747@uorak.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '2000-02-28', '2023-06-01', '17:15:10', '12345678', 0);

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
(1, '2023-05-01', '20:02:14', 1, '2305012002111', '2305012002111', 'NAO', NULL, NULL, NULL, 58.00, '', '17319.99', 0),
(2, '2023-05-01', '20:07:57', 1, '2305012007541', '2305012007541', 'NAO', NULL, NULL, NULL, 58.00, '', '3280', 0),
(3, '2023-05-01', '20:14:57', 1, '2305012014541', '2305012014541', 'NAO', NULL, NULL, NULL, 94.00, '', '660', 0),
(4, '2023-05-01', '20:39:32', 1, '2305012039271', '2305012039271', 'SIM', NULL, NULL, NULL, 44.00, '', '20499.98', 0),
(5, '2023-05-01', '21:06:52', 1, '2305012105531', '2305012105531', 'NAO', NULL, NULL, NULL, 44.00, '', '990', 0),
(8, '2023-05-01', '21:12:45', 1, '2305012112411', '2305012112411', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '990', 0),
(9, '2023-05-01', '21:24:48', 1, '2305012124451', '2305012124451', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '3', 0),
(10, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(13, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(14, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(15, '2023-05-01', '21:30:06', 2, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(16, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(17, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(18, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(19, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(20, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(21, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(22, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(23, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(24, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(25, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(26, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(27, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(28, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(29, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(30, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(31, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(32, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(33, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(34, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(35, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(36, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(37, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(38, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(39, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(40, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(41, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(42, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(43, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(44, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(45, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(46, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(47, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(48, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(49, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(50, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(51, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(52, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(53, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(54, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(55, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(56, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(57, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(58, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(59, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(60, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(61, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(62, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(63, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(64, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(65, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(66, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(67, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(68, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(69, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(70, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(71, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(72, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(73, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(74, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(75, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(76, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(77, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(78, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(79, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(80, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(81, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(82, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(83, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(84, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(85, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(86, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(87, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(88, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(89, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(90, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(91, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(92, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(93, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(94, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(95, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(96, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(97, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(98, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(99, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(100, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(101, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(102, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(103, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(104, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(105, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(106, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(107, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(108, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(109, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(110, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(111, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(112, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(113, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(114, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(115, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(116, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(117, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(118, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(119, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(120, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(121, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(122, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(123, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(124, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(125, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(126, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(127, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(128, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(129, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(130, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(131, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(132, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(133, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(134, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(135, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(136, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(137, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(138, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(139, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(140, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(141, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(142, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(143, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(144, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(145, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(146, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(147, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(148, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(149, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(150, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(151, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(152, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(153, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(154, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(155, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(156, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(157, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(158, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(159, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(160, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(161, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(162, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(163, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(164, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(165, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(166, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(167, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(168, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(169, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(170, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(171, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(172, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(173, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(174, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(175, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(176, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(177, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(178, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(179, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(180, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(181, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(182, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(183, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(184, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(185, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(186, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(187, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(188, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(189, '2023-05-01', '21:30:06', 1, '2305012130021', '2305012130021', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '21159.98', 0),
(194, '2023-06-01', '15:32:15', 1, '2306011530551', '2306011530551', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '4499.99', 0),
(195, '2023-06-01', '15:41:44', 1, '2306011541061', '2306011541061', 'NAO', NULL, NULL, NULL, 0.00, 'pac', '15999.99', 0),
(196, '2023-06-01', '16:02:29', 1, '2306011602111', '2306011602111', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '6139.99', 0),
(197, '2023-06-01', '16:11:15', 1, '2306011611081', '2306011611081', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '3280', 0),
(198, '2023-06-01', '16:12:14', 1, '2306011612071', '2306011612071', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '4499.99', 0),
(199, '2023-06-01', '16:14:16', 1, '2306011614091', '2306011614091', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '1640', 0),
(200, '2023-06-01', '16:15:48', 1, '2306011615411', '2306011615411', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '1640', 0),
(201, '2023-06-01', '16:25:26', 1, '2306011625191', '2306011625191', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '1640', 0),
(202, '2023-06-01', '16:31:04', 1, '2306011630571', '2306011630571', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '20499.98', 0),
(203, '2023-06-01', '17:22:11', 4, '2306011722054', '2306011722054', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '1640', 0),
(204, '2023-06-01', '17:29:53', 4, '2306011729464', '2306011729464', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '15999.99', 0),
(205, '2023-06-01', '17:31:09', 4, '2306011731024', '2306011731024', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '1640', 0);

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
(1, 1, 38469.97, 2, '2304302306031'),
(2, 3, 38469.97, 1, '2304302306031'),
(3, 4, 38469.97, 1, '2304302306031'),
(4, 5, 38469.97, 1, '2304302306031'),
(5, 1, 52499.96, 3, '2304302316301'),
(8, 3, 22469.98, 1, '2304302317351'),
(11, 5, 1640.00, 1, '2305011943061'),
(12, 4, 990.00, 3, '2305011958211'),
(13, 4, 17319.99, 4, '2305012002111'),
(14, 1, 1739.99, 1, '2305012002111'),
(15, 5, 1640.00, 2, '2305012007541'),
(16, 4, 330.00, 2, '2305012014541'),
(17, 1, 20499.98, 1, '2305012039271'),
(18, 3, 20499.98, 1, '2305012039271'),
(19, 4, 990.00, 3, '2305012105531'),
(20, 1, 16329.99, 1, '2305012107141'),
(21, 4, 16329.99, 1, '2305012107141'),
(22, 4, 660.00, 2, '2305012109361'),
(23, 4, 330.00, 3, '2305012112411'),
(24, 4, 3.00, 4, '2305012124451'),
(25, 4, 21159.98, 2, '2305012130021'),
(26, 1, 21159.98, 1, '2305012130021'),
(27, 3, 21159.98, 1, '2305012130021'),
(28, 3, 4499.99, 1, '2306011530551'),
(29, 1, 15999.99, 1, '2306011541061'),
(30, 3, 6139.99, 1, '2306011602111'),
(31, 5, 6139.99, 1, '2306011602111'),
(32, 5, 3280.00, 2, '2306011611081'),
(33, 3, 4499.99, 1, '2306011612071'),
(34, 5, 1640.00, 1, '2306011614091'),
(35, 5, 1640.00, 1, '2306011615411'),
(36, 5, 1640.00, 1, '2306011625191'),
(37, 1, 20499.98, 1, '2306011630571'),
(38, 3, 20499.98, 1, '2306011630571'),
(39, 5, 1640.00, 1, '2306011722054'),
(40, 1, 15999.99, 1, '2306011729464'),
(41, 5, 1640.00, 1, '2306011731024');

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
(1, 1, 'RTX 4090 Edition ASUS', 'ROG Strix GeForce RTX 4090 OC Edition 24 GB GDDR6X <br/><br/>\r\n \r\n\r\nMultiprocessadores de streaming NVIDIA Ada Lovelace:<br/>\r\nDesempenho e eficiência de energia até 2x, Núcleos tensores de 4ª geração: desempenho de IA até 2X, Núcleos RT de 3ª Geração: Desempenho de rastreamento de raios até 2X, Ventiladores de tecnologia axial ampliados para 23% mais fluxo de ar.\r\n<br/><br/>\r\n \r\n\r\nNova câmara de vapor patenteada <br/>\r\nCom dissipador de calor fresado para temperaturas de GPU mais baixas. Design de 3,5 slots : matriz de aletas maciça otimizada para fluxo de ar das três ventoinhas Axial-tech. A cobertura, a estrutura e a placa traseira fundidas adicionam rigidez e são ventiladas para maximizar ainda mais o fluxo de ar e a dissipação de calor.\r\n<br/><br/>\r\n \r\n\r\nControle de energia digital<br/>\r\nCom estágios de potência de alta corrente e capacitores de 15K para alimentar o desempenho máximo. Fabricação automatizada de precisão Auto-Extreme para maior confiabilidade. O software GPU Tweak III fornece ajustes de desempenho intuitivos, controles térmicos e monitoramento do sistema.\r\n<br/><br/>\r\n \r\n\r\nA ROG Strix GeForce RTX 4090 traz um significado totalmente novo para seguir o fluxo.\r\nPor dentro e por fora, cada elemento da placa dá ao monstruoso espaço para a GPU respirar livremente e alcançar o melhor desempenho. O reinado desencadeado da arquitetura NVIDIA Ada Lovelace está aqui.', 99.99, 15999.99, 100, 100, 100, 'https://images.kabum.com.br/produtos/fotos/387449/placa-de-video-asus-nvidia-rog-strix-rtx-4090-edition-24-gb-gddr6x-argb-dlss-ray-tracing-90yv0iw0-m0nan00_1665170163_gg.jpg', 'https://images.kabum.com.br/produtos/fotos/387449/placa-de-video-asus-nvidia-rog-strix-rtx-4090-edit', 10000, 'NVIDIA ROG Strix', '0010', 'ASUS', 'sim', 'Não', 'Placa de Vídeo RTX 4090 Asus NVIDIA ROG Strix, 24 GB GDDR6X, ARGB, DLSS, Ray Tracing - ROG-STRIX-RTX4090-O24G-GAMING'),
(3, 1, 'RTX 3080 10GB ', 'As GPUs GeForce RTX Série 30 são equipadas com a arquitetura RTX de segunda geração da NVIDIA, oferecendo o melhor desempenho, gráficos ray tracing e aceleração de IA para jogadores e criadores\r\n \r\n<br/><br/>\r\nMultiprocessadores NVIDIA Ampere Streaming <br/>\r\n\r\nOs blocos de construção para a GPU mais rápida e eficiente do mundo, o novo Ampere SM traz 2X a taxa de transferência FP32 e maior eficiência de energia.\r\n<br/><br/>\r\n \r\n\r\nNúcleos RT de 2ª Geração<br/>\r\n \r\n\r\nExperimente o dobro da taxa de transferência dos núcleos RT de 1ª geração, além de RT e sombreamento simultâneos para um nível totalmente novo de desempenho de traçado de raios.<br/><br/>\r\n\r\n \r\n\r\nNúcleos tensores de 3ª geração<br/>\r\n \r\n\r\nObtenha até 2X a taxa de transferência com esparsidade estrutural e algoritmos avançados de IA, como DLSS. Agora com suporte para resolução de até 8K, esses núcleos oferecem um enorme aumento no desempenho do jogo e todos os novos recursos de IA.\r\n<br/><br/>\r\n \r\n\r\nA GeForce RTX 3080 oferece o ultra desempenho que os jogadores desejam, com tecnologia Ampere a arquitetura RTX de segunda geração da NVIDIA. Ele é construído com RT Cores e Tensor Cores aprimorados, novos multiprocessadores de streaming e memória G6X super rápida para uma incrível experiência de jogo.\r\n<br/>\r\n \r\n\r\nA nova arquitetura NVIDIA Ampere apresenta novos núcleos Ray Tracing de 2ª geração e núcleos Tensor de 3ª geração com maior rendimento. Os multiprocessadores de streaming NVIDIA Ampere são os blocos de construção da GPU mais rápida e eficiente do mundo para jogadores e criadores.', 99.99, 4499.99, 100, 100, 100, 'https://images.kabum.com.br/produtos/fotos/399025/placa-de-video-pny-nvidia-geforce-rtx-3080-xlr8-gaming-revel-epic-x-10-gb-gddr6x-lhr-rgb-dlss-ray-tracing-vcg308010ltfxppb1_1669988745_gg.jpg', 'https://images.kabum.com.br/produtos/fotos/399025/placa-de-video-pny-nvidia-geforce-rtx-3080-xlr8-ga', 2000, 'VCG308010LTFXPPB1', '0020', 'PNY', 'sim', 'Sim', 'Placa de Vídeo RTX 3080 XLR8 Gaming Revel Epic-X PNY NVIDIA GeForce, 10 GB GDDR6X, RGB, LHR, DLSS, Ray Tracing - VCG308010LTFXPPB1'),
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
-- AUTO_INCREMENT de tabela `as_categorias`
--
ALTER TABLE `as_categorias`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `as_clientes`
--
ALTER TABLE `as_clientes`
  MODIFY `cli_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `ped_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT de tabela `as_pedidos_itens`
--
ALTER TABLE `as_pedidos_itens`
  MODIFY `item_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
