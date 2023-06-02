-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 02-Jun-2023 às 18:53
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

--
-- Extraindo dados da tabela `administracao`
--

INSERT INTO `administracao` (`adm_id`, `adm_nome`, `adm_endereco`, `adm_numero`, `adm_bairro`, `adm_cidade`, `adm_uf`, `adm_cep`, `adm_cpf`, `adm_rg`, `adm_ddd`, `adm_fone`, `adm_celular`, `adm_email`, `adm_pass`, `adm_data_nasc`, `adm_data_cad`, `adm_hora_cad`, `usuario_adm`) VALUES
(0, 'ADM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fulmivarku@gufum.com', 'f900e7b99c4a9c1a97f0396d4d34c374574d2945437ca1f30c3ad28dcefb55679e90312b6d801798888d2fa3cb03e769b21ab0982109074ce812cd2c349676f9', NULL, NULL, NULL, '');

--
-- Extraindo dados da tabela `as_categorias`
--

INSERT INTO `as_categorias` (`cate_id`, `cate_nome`, `cate_slug`) VALUES
(1, 'Placa de vídeo', 'Placa de vídeo'),
(2, 'Processador', 'Processador'),
(11, 'SSD', 'SSD');

--
-- Extraindo dados da tabela `as_clientes`
--

INSERT INTO `as_clientes` (`cli_id`, `cli_nome`, `cli_sobrenome`, `cli_endereco`, `cli_numero`, `cli_bairro`, `cli_cidade`, `cli_uf`, `cli_cep`, `cli_cpf`, `cli_rg`, `cli_ddd`, `cli_fone`, `cli_celular`, `cli_email`, `cli_pass`, `cli_data_nasc`, `cli_data_cad`, `cli_hora_cad`, `dados_extras`, `status_clientes`) VALUES
(2, 'Ciclano Fulano', 'Manoel Costa', 'Rua Antonio Izaias da Costa', '333', 'Gramame', 'João Pessoa', 'PB', '58069260', '34244706607', '350153231', 83, '8336929599', '8398525100', 'violante6000@uorak.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '1994-02-10', '2023-06-02', '12:51:28', '12345678', 0);

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

--
-- Extraindo dados da tabela `as_imagens`
--

INSERT INTO `as_imagens` (`img_id`, `img_nome`, `img_pro_id`, `img_pasta`) VALUES
(1, 'skol_2.png', 1, NULL),
(2, 'skol_3.png', 1, NULL);

--
-- Extraindo dados da tabela `as_pedidos`
--

INSERT INTO `as_pedidos` (`ped_id`, `ped_data`, `ped_hora`, `ped_cliente`, `ped_cod`, `ped_ref`, `ped_pag_status`, `ped_pag_forma`, `ped_pag_tipo`, `ped_pag_codigo`, `ped_frete_valor`, `ped_frete_tipo`, `ped_valor_item`, `concluido`) VALUES
(3, '2023-06-02', '12:55:41', 2, '2306021255342', '2306021255342', 'NAO', NULL, NULL, NULL, 0.00, 'sedex', '1640', 0);

--
-- Extraindo dados da tabela `as_pedidos_itens`
--

INSERT INTO `as_pedidos_itens` (`item_id`, `item_produto`, `item_valor`, `item_qtd`, `item_ped_cod`) VALUES
(3, 5, 1640.00, 1, '2306021255342');

--
-- Extraindo dados da tabela `as_produtos`
--

INSERT INTO `as_produtos` (`pro_id`, `pro_categoria`, `pro_nome`, `pro_desc`, `pro_peso`, `pro_valor`, `pro_altura`, `pro_largura`, `pro_comprimento`, `pro_img`, `pro_slug`, `pro_estoque`, `pro_modelo`, `pro_ref`, `pro_fabricante`, `pro_ativo`, `pro_frete_free`, `pro_descricao_extra`) VALUES
(0, NULL, NULL, NULL, 0.00, 0.00, 0, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, 'NAO', 'NAO', NULL),
(5, 2, 'Intel i7 10g 2.90GHz ', 'O processador Intel Core i7 de 10ª geração é uma unidade de processamento poderosa e altamente avançada, projetada para oferecer um desempenho excepcional em computadores pessoais e estações de trabalho. Com uma arquitetura moderna e recursos inovadores, o Intel Core i7 de 10ª geração é uma escolha popular para gamers, criadores de conteúdo e profissionais que exigem alto desempenho em suas atividades diárias.\r\n<br/>\r\nO Intel Core i7 de 10ª geração é baseado na arquitetura de processador de 14 nanômetros (nm) da Intel e possui até 8 núcleos e 16 threads, o que permite a execução de várias tarefas simultaneamente com facilidade. Com velocidades de clock que variam de 2,0 GHz a 5,3 GHz, o Intel Core i7 de 10ª geração oferece um desempenho excepcional em tarefas exigentes, como edição de vídeo, renderização em 3D, jogos de alta qualidade e outras cargas de trabalho intensivas.\r\n<br/>\r\nUma das características marcantes do Intel Core i7 de 10ª geração é a tecnologia Intel Turbo Boost Max 3.0, que identifica e impulsiona automaticamente os núcleos mais rápidos do processador para proporcionar um desempenho ainda melhor em tarefas de um único núcleo. Isso resulta em uma maior capacidade de resposta e tempos de carregamento mais rápidos para aplicativos e jogos.\r\n<br/>\r\nAlém disso, o Intel Core i7 de 10ª geração suporta a tecnologia Intel Hyper-Threading, que permite a execução de dois threads por núcleo, resultando em um melhor desempenho multithreading e uma maior eficiência de processamento. Ele também suporta memória DDR4 de alta velocidade, proporcionando um aumento significativo no desempenho do sistema em comparação com as gerações anteriores de processadores Intel.\r\n<br/>\r\nO Intel Core i7 de 10ª geração também é equipado com a tecnologia de gráficos Intel Iris Plus, que oferece gráficos integrados aprimorados para uma experiência de jogo e entretenimento mais imersiva. Ele suporta até três monitores 4K UHD e oferece recursos avançados de codificação e decodificação de vídeo para transmissões e criação de conteúdo em alta qualidade.\r\n<br/>\r\nAlém disso, o Intel Core i7 de 10ª geração suporta as mais recentes tecnologias de conectividade, como USB 3.1 Gen2, Thunderbolt 3 e Intel Optane Memory, que proporcionam uma experiência de computação rápida e eficiente.\r\n<br/>\r\nEm resumo, o Intel Core i7 de 10ª geração é um processador de alto desempenho que oferece velocidades de clock rápidas, suporte a multitarefa intensiva, recursos avançados de gráficos e conectividade moderna. É uma escolha ideal para aqueles que precisam de um processador poderoso para jogos, criação de conteúdo e tarefas profissionais exigentes.', 99.99, 1640.00, 100, 100, 100, 'https://img.terabyteshop.com.br/produto/g/processador-intel-core-i7-10700-290ghz-470ghz-turbo-10-geracao-8-cores-16-thread-lga-1200-bx8070110700_95187.jpg', 'https://img.terabyteshop.com.br/produto/g/processador-intel-core-i7-10700-290ghz-470ghz-turbo-10-ger', 100000, 'BX8070110700', '0040', 'Intel', 'sim', 'Não', 'Processador Intel Core i7 10700, 2.90GHz (4.70GHz Turbo), 10ª Geração, 8-Cores 16-Threads, LGA 1200, BX8070110700');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
