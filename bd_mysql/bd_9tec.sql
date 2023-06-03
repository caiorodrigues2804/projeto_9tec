-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 03-Jun-2023 às 23:18
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
(1, 'ADM', 'suporte@9tec.com.br', 'f900e7b99c4a9c1a97f0396d4d34c374574d2945437ca1f30c3ad28dcefb55679e90312b6d801798888d2fa3cb03e769b21ab0982109074ce812cd2c349676f9', NULL, NULL),
(2, 'adm_02', 'jafyitofya@gufum.com', 'da4d30515a0e12fcd25192b5bd7cb49a0b21627ce2f7e99f38edc0ae50458d40576f797686514a23f66789bc975a2000b29c88e83f4a58d1c66d2c052a6db287', '2023-06-03', '16:39:08');

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
(2, 'Processador', 'Processador'),
(3, 'Placa de vídeo', 'Placa de vídeo'),
(4, 'Placa mãe', 'Placa mãe'),
(5, 'HD', 'HD'),
(6, 'SSD', 'SSD'),
(7, 'Memoria RAM', 'Memoria RAM'),
(8, 'PC Gamer', 'PC Gamer'),
(9, 'Notebook ', 'Notebook '),
(10, 'Gabinetes', 'Gabinetes'),
(11, 'Periféricos', 'Periféricos'),
(12, 'Nvme', 'Nvme');

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
(1, 'Fulano', 'Benedito Moreira', 'Rua da Ligação', '515', 'Aurá', 'Ananindeua', 'PA', '67032125', '23052656899', '134246901', 91, '9129511120', '9198876003', 'gesef86538@soremap.com', '9625547a539542280311f3eac2a329dad5fbaf84138da1cc847cf33a45ecea9dfcaf1a3d5bb3989fef1b1b82966cac3d4133be78df2a7c75798cc814afae832c', '1986-01-08', '2023-06-03', '17:59:48', 'p85s69yy', 0);

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
  `concluido` tinyint(4) NOT NULL DEFAULT 0,
  `ped_valor_original` double(9,2) DEFAULT 0.00
) ENGINE=InnoDB AVG_ROW_LENGTH=16384 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `as_pedidos`
--

INSERT INTO `as_pedidos` (`ped_id`, `ped_data`, `ped_hora`, `ped_cliente`, `ped_cod`, `ped_ref`, `ped_pag_status`, `ped_pag_forma`, `ped_pag_tipo`, `ped_pag_codigo`, `ped_frete_valor`, `ped_frete_tipo`, `ped_valor_item`, `concluido`, `ped_valor_original`) VALUES
(1, '2023-06-03', '18:00:53', 1, '2306031800441', '2306031800441', 'SIM', NULL, NULL, NULL, 47.65, 'pac', '172.25', 0, 172.25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `as_pedidos_itens`
--

CREATE TABLE `as_pedidos_itens` (
  `item_id` int(11) UNSIGNED NOT NULL,
  `item_produto` int(11) DEFAULT NULL,
  `item_valor` double(9,2) DEFAULT NULL,
  `item_qtd` int(6) DEFAULT NULL,
  `item_ped_cod` varchar(50) DEFAULT NULL,
  `valor_original` double(9,2) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=1092 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `as_pedidos_itens`
--

INSERT INTO `as_pedidos_itens` (`item_id`, `item_produto`, `item_valor`, `item_qtd`, `item_ped_cod`, `valor_original`) VALUES
(1, 3, 172.25, 2, '2306031800441', 86.12),
(2, 4, 172.25, 1, '2306031800441', 172.25);

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
(2, 2, 'AMD Ryzen 5 4500', 'PROCESSADOR AMD RYZEN 5 4500 3.6GHZ (4.1GHZ TURBO), 6-CORES 12-THREADS, COOLER WRAITH STEALTH, SEM GRÁFICO INTEGRADO <br/>\r\nO Ryzen 5 4500 conta com 6 núcleos incríveis para quem quer apenas jogar. Os processadores AMD Ryzen capacitam a próxima geração de jogos exigentes, proporcionando experiências imersivas únicas e dominando qualquer tarefa multithread como 3D e renderização de vídeo e compilação de software.', 99.99, 599.00, 100, 100, 100, 'https://img.terabyteshop.com.br/produto/g/processador-amd-ryzen-5-4500-36ghz-41ghz-turbo-6-cores-12-threads-cooler-wraith-stealth-am4-100-100000644box_141344.jpg', 'https://img.terabyteshop.com.br/produto/g/processador-amd-ryzen-5-4500-36ghz-41ghz-turbo-6-cores-12-', 1000000, '100000644BOX', '00010', 'Ryzen', 'sim', 'NAO', 'Processador AMD Ryzen 5 4500 3.6GHz (4.1GHz Turbo), 6-Cores 12-Threads, Cooler Wraith Stealth, AM4, 100-100000644BOX'),
(3, 11, 'Mouse Gamer Ninja Tron', 'MOUSE GAMER NINJA TRON, RGB, 8 BOTÕES, 7200 DPI, BLACK\r\nO Mouse Gamer Ninja Tron é indicado para os jogadores que necessitam de uma performance inigualável em suas partidas.', 99.99, 41.00, 100, 100, 100, 'https://img.terabyteshop.com.br/produto/g/mouse-gamer-ninja-tron-rgb-8-botoes-7200-dpi-black-ms-gn-tron_147181.png', 'https://img.terabyteshop.com.br/produto/g/mouse-gamer-ninja-tron-rgb-8-botoes-7200-dpi-black-ms-gn-t', 10000000, 'MS-GN-TRON', '0020', 'Ninja Tron', 'sim', 'NAO', 'Mouse Gamer Ninja Tron, RGB, 8 Botões, 7200 DPI, Black, MS-GN-TRON'),
(4, 11, ' Ninja Leap Pudim Switch', 'TECLADO MECÂNICO GAMER NINJA LEAP PUDIM, SWITCH BLUE, RAINBOW, ABNT2, WHITE <br/>\r\nO Teclado Mecânico Gamer Ninja Leap Pudim é o companheiro perfeito para qualquer jogador sério. Com Switch Blue, você terá uma resposta rápida e precisa a cada ação, garantindo uma vantagem competitiva em seus jogos', 99.99, 90.25, 1000, 1000, 1000, 'https://img.terabyteshop.com.br/produto/g/teclado-mecanico-gamer-ninja-leap-pudim-switch-blue-rgb-rainbow-abnt2-white_161062.png', 'https://img.terabyteshop.com.br/produto/g/teclado-mecanico-gamer-ninja-leap-pudim-switch-blue-rgb-ra', 10000, 'Gamer Ninja Leap - White Pudim', '0030', 'Ninja Leap ', 'sim', 'NAO', 'Teclado Mecânico Gamer Ninja Leap Pudim, Switch Blue, Rainbow, ABNT2, White'),
(5, 11, 'Headset Gamer Fifine H6', 'HEADSET GAMER FIFINE H6, 7.1 SURROUND, DRIVERS DE 50MM, RGB, USB, BLACK <br/>\r\nGraças ao som surround virtual 7.1, você terá  vantagem sobre os outros jogadores. Você será capaz de ouvir passos ou tiros para reagir cedo, e até mesmo saber que seus adversários estão andando em terra ou água. Colocando o headset, você teráum som de alta qualidade, o que te fará mergulhar no mundo dos jogos. Caracterizado com cores RGB, o headset complementará seu setup. Ele tem uma luz vívida e brilhante. A iluminação moderada, elegante e atraente, é uma adição legal quando em jogos de vídeo e cenas de streaming ao vivo.', 99.99, 190.00, 1000, 1000, 1000, 'https://img.terabyteshop.com.br/produto/g/headset-gamer-fifine-h6-71-surround-drivers-de-50mm-rgb-usb-black_151053.jpg', 'https://img.terabyteshop.com.br/produto/g/headset-gamer-fifine-h6-71-surround-drivers-de-50mm-rgb-us', 1000000, 'FIFINE H6', '0040', 'Fifine ', 'sim', 'NAO', 'Headset Gamer Fifine H6, 7.1 Surround, Drivers de 50mm, RGB, USB, Black'),
(6, 11, 'Teclado Lakshm', 'TECLADO GAMER MECÂNICO REDRAGON LAKSHMI, LED WHITE, SWITCH BROWN, ABNT2, 60%, ORANGE/BLACK/GREY <br/>\r\nO Redragon LAKSHMI reúne o que há de melhor em um teclado para seu setup, entrega performance profissional, evita Double Clicks e possui o dobro de vida útil comparado a um teclado mecânico convencional, é o teclado perfeito para quem procura um excelente upgrade para seu setup.', 99.99, 200.00, 100, 100, 100, 'https://img.terabyteshop.com.br/produto/g/teclado-gamer-mecanico-redragon-lakshmi-led-white-switch-brown-abnt2-60-orangeblackgrey-k606-ogbkgy-pt-brown_167856.jpg', 'https://img.terabyteshop.com.br/produto/g/teclado-gamer-mecanico-redragon-lakshmi-led-white-switch-b', 1000, 'K606-OG&BK&GY PT-BROWN', '00040', 'Redragon', 'sim', 'NAO', 'Teclado Gamer Mecânico Redragon Lakshmi, LED White, Switch Brown, ABNT2, 60%, Orange/Black/Grey, K606-OG&BK&GY PT-BROWN'),
(7, 3, 'AMD Radeon RX 6600 ', 'Radeon RX 6600 EAGLE 8G\r\nGV-R66EAGLE-8GD', 99.99, 1599.00, 1000, 1000, 1000, 'https://img.terabyteshop.com.br/produto/g/placa-de-video-gigabyte-amd-radeon-rx-6600-eagle-8g-8gb-gddr6-fsr-ray-tracing_142715.png', 'https://img.terabyteshop.com.br/produto/g/placa-de-video-gigabyte-amd-radeon-rx-6600-eagle-8g-8gb-gd', 100, 'GV-R66EAGLE-8GD', '00050', 'Gigabyte ', 'sim', 'NAO', 'Placa de Vídeo Gigabyte AMD Radeon RX 6600 EAGLE 8G, 8GB, GDDR6, FSR, Ray Tracing'),
(8, 3, 'GTX 1650 D6 OC', 'PLACA DE VÍDEO GIGABYTE GEFORCE GTX 1650 D6 OC, 4GB GDDR6, 128BIT, GV-N1656OC-4GD <br/>\r\nDesenvolvidos pela arquitetura GeForce® GTX 1650 NVIDIA Turing ™ e GeForce Experience ™ Integrados à interface de memória GDDR6 de 4 GB de 128 bits, fan de lâmina exclusivo de 80 mm, tamanho compacto de 170 mm', 99.99, 900.00, 100, 100, 100, 'https://img.terabyteshop.com.br/produto/g/placa-de-video-gigabyte-geforce-gtx-1650-d6-oc-4gb-gddr6-128bit-gv-n1656oc-4gd_96626.png', 'https://img.terabyteshop.com.br/produto/g/placa-de-video-gigabyte-geforce-gtx-1650-d6-oc-4gb-gddr6-1', 10000, 'GV-N1656OC-4GD', '00060', 'Gigabyte ', 'sim', 'NAO', 'Placa de Vídeo Gigabyte GeForce GTX 1650 D6 OC, 4GB GDDR6, 128Bit, GV-N1656OC-4GD'),
(9, 3, 'RTX 3060 Twin Edge', 'PLACA DE VÍDEO ZOTAC GAMING GEFORCE RTX 3060 TWIN EDGE OC, 12GB, GDDR6, DLSS, RAY TRACING <br/>\r\nVivencie o jogo com a nova GeForce RTX 3060 Series da ZOTAC GAMING, baseada na arquitectura NVIDIA Ampere. Construída com núcleos RT e tensores aprimorados, novos multiprocessadores de transmissão e memória súper rápida, as novas placas gráficas ZOTAC GAMING oferecem a potência de jogos amplificados com ultra fidelidade gráfica.', 99.99, 2235.32, 1000, 1000, 1000, 'https://img.terabyteshop.com.br/produto/g/placa-de-video-zotac-gaming-geforce-rtx-3060-twin-edge-oc-white-12gb-gddr6-dlss-ray-tracing-zt-a30600h-10m_169184.png', 'https://img.terabyteshop.com.br/produto/g/placa-de-video-zotac-gaming-geforce-rtx-3060-twin-edge-oc-', 100, 'ZT-A30600H-10M', '00070', 'Zotac Gaming', 'sim', 'NAO', 'Placa de Vídeo Zotac Gaming GeForce RTX 3060 Twin Edge OC, 12GB, GDDR6, DLSS, Ray Tracing, ZT-A30600H-10M'),
(10, 3, 'Radeon RX 6750 XT', 'DOBRE SUA TAXA DE FRAMES COM FSR 2.0 E RSR\r\nO FSR 2.0 é uma tecnologia de upscaling, foi projetada para fornecer qualidade de imagem semelhante ou melhor do que a qualidade da imagem nativa e aumentar as taxas de frames e jogos compatíveis com uma ampla gama de produtos e plataformas.\r\n\r\nRadeon™ Super Resolution (RSR) é um recurso de upscaling no driver que usa o mesmo algoritmo encontrado na tecnologia AMD FidelityFX™ Super Resolution (FSR). Você pode obter mais desempenho e fluidez de seu jogo habilitando o RS', 99.99, 2654.55, 100, 100, 100, 'https://img.terabyteshop.com.br/produto/g/placa-de-video-msi-amd-radeon-rx-6750-xt-mech-2x-oc-12gb-gddr6-fsr-ray-tracing-rx-6750-xt-mech-2x-12g-oc_162461.jpg', 'https://img.terabyteshop.com.br/produto/g/placa-de-video-msi-amd-radeon-rx-6750-xt-mech-2x-oc-12gb-g', 10000, '912-V399-002 / RX 6750 XT MECH 2X 12G OC', '00080', 'Mech ', 'sim', 'NAO', 'Placa de Vídeo MSI AMD Radeon RX 6750 XT Mech 2X OC, 12GB, GDDR6, FSR, Ray Tracing, 912-V399-002'),
(11, 12, 'SSD WD Green SN350', '<b>SSD WD GREEN, 480GB, M.2 NVMe, LEITURA 2400MB/s E GRAVAÇÃO 1650MB/s<b/><br>\r\nO SSD WD Green ™ SN350 NVMe ™ pode revitalizar seu computador antigo para uso diário. Esteja você na aula, fazendo compras, conversando ou navegando, esta unidade pode funcionar até quatro vezes mais rápido do que as unidades SATA. Porque não têm peças móveis , SSDs oferecem um design resistente a choques para ajudar a proteger seus dados importantes contra quedas e impactos acidentais.', 99.99, 200.25, 100, 100, 100, 'https://img.terabyteshop.com.br/produto/g/ssd-wd-green-480gb-m2-nvme-leitura-2400mbs-e-gravacao-1650mbs-wds480g2g0c_113536.jpg', 'https://img.terabyteshop.com.br/produto/g/ssd-wd-green-480gb-m2-nvme-leitura-2400mbs-e-gravacao-1650', 100000, 'WD Green', '00090', 'WD Green', 'sim', 'NAO', 'SSD WD Green SN350, 480GB, M.2 NVMe, Leitura 2400MB/s e Gravação 1650MB/s, WDS480G2G0C'),
(12, 12, 'Kingston NV2 500GB', '<b>SSD KINGSTON NV2, 500GB, M.2 NVME, 2280, LEITURA 3500MBS E GRAVAÇÃO 2100MBS\r\nO NV2 PCIe 4.0</b> <br/> NVMe SSD da Kingston é uma solução fundamental para armazenamento de última geração alimentada por um controlador NVMe Gen 4x4. O NV2 proporciona velocidades de leitura/gravação de até 3.500/2.100MB/s com requisitos de energia reduzidos e menor aquecimento para ajudar a otimizar o desempenho do seu sistema e entregar valor sem sacrifício. ', 99.99, 230.00, 100, 100, 100, 'https://img.terabyteshop.com.br/produto/g/ssd-kingston-nv2-500gb-m2-nvme-2280-leitura-3500mbs-e-gravacao-2100mbs-snv2s500g_154165.jpg', 'https://img.terabyteshop.com.br/produto/g/ssd-kingston-nv2-500gb-m2-nvme-2280-leitura-3500mbs-e-grav', 100000, 'SNV2S/500G', '00100', 'Kingston ', 'sim', 'NAO', 'SSD Kingston NV2, 500GB, M.2 NVMe, 2280, Leitura 3500MBs e Gravação 2100MBs, SNV2S/500G'),
(13, 6, 'Kingston A400 480GB', 'SSD KINGSTON A400 2,5 SATA III 480GB\r\nRápida inicialização, carregamento e transferência de arquivos; Mais confiável e mais durável do que um disco rígido.', 99.99, 189.00, 1000, 1000, 1000, 'https://img.terabyteshop.com.br/produto/g/ssd-kingston-a400-480gb-sata-iii-leitura-500mbs-gravacao-450mbs-sa400s37480g-imp_129879.jpg', 'https://img.terabyteshop.com.br/produto/g/ssd-kingston-a400-480gb-sata-iii-leitura-500mbs-gravacao-4', 1000000, 'SA400S37/480G', '00110', 'Kingston ', 'sim', 'NAO', 'SSD Kingston A400, 480GB, Sata III, Leitura 500MBs Gravação 450MBs, SA400S37/480G'),
(14, 6, 'SSD Hikvision E-100', '<b>SSD HIKVISION E-100</b><br>\r\n512GB 2,5\" SATA III<br>\r\nO SSD HIKVISION da série E100 foi desenvolvido a partir de anos de experiência e conhecimento em tecnologia de armazenamento e memória flash. Este produto é especializado para otimização de sistemas operacionais de computador e fornece serviço de dados estável e rápido, acelerando a inicialização e o desempenho.', 99.99, 170.90, 100, 100, 100, 'https://img.terabyteshop.com.br/produto/g/ssd-hikvision-hs-e100-512gb_100481.png', 'https://img.terabyteshop.com.br/produto/g/ssd-hikvision-hs-e100-512gb_100481.png', 10000, 'HS-SSD-E100-512GB', '00120', 'Hikvision ', 'sim', 'NAO', 'SSD Hikvision E-100 512GB , SATA III Leitura 560MBs e Gravação 510MBs, HS-SSD-E100-512GB'),
(15, 4, 'TUF Gaming B550M-Plu', '<b>PLACA MÃE ASUS TUF GAMING B550M-PLUS, CHIPSET B550, AMD AM4, MATX, DDR4\r\nA TUF Gaming B550M-PLUS</b><br/> reúne os elementos essenciais da mais recente plataforma AMD e os combina com funcionalidades prontas para jogos e durabilidade comprovada. Projetadas com componentes de nível militar, soluções de energia aprimoradas e um conjunto abrangente de opções de refrigeração, essas placas-mãe oferecem desempenho sólido com estabilidade inabalável em jogos.', 99.99, 1089.20, 1000, 1000, 1000, 'https://img.terabyteshop.com.br/produto/g/placa-mae-asus-tuf-gaming-b550m-plus-chipset-b550-amd-am4-matx-ddr4_98581.jpg', 'https://img.terabyteshop.com.br/produto/g/placa-mae-asus-tuf-gaming-b550m-plus-chipset-b550-amd-am4-', 100, '90MB14A0-C1BAY0', '000130', 'Asus', 'sim', 'NAO', 'Placa Mãe Asus TUF Gaming B550M-Plus, Chipset B550, AMD AM4, mATX, DDR4, 90MB14A0-C1BAY0'),
(16, 5, 'Seagate 1TB', '<b>HD Seagate BarraCuda, 1TB, 3.5, SATA  </b><br/>\r\n\r\n<b>HD Seagate BarraCuda</b><br/>\r\nA Seagate traz mais de 20 anos de desempenho robusto e confiabilidade aos HDDs Seagate BarraCuda de 3,5 polegadas, agora disponíveis com até 8 TB de capacidade.\r\n\r\n<b>Confiança acima de tudo</b><br/>\r\nProteja todo tipo de informação sensível por meio de seu sistema de segurança integrado. Sua defesa é impenetrável. O Barracuda ST1000DM010 é caracterizado pela sua eficiência e bom funcionamento, que juntamente com o seu baixo consumo de energia o tornam um disco indispensável para funções padrão.', 99.99, 240.99, 1000, 100, 100, 'https://images.kabum.com.br/produtos/fotos/84108/84108_index_gg.jpg', 'https://images.kabum.com.br/produtos/fotos/84108/84108_index_gg.jpg', 100, 'ST1000DM010', '000140', 'Seagate ', 'sim', 'NAO', 'HD Seagate 1TB BarraCuda, 3.5, SATA - ST1000DM010'),
(17, 5, 'HD WD Purple 1TB', '<b>SSD WD PURPLE 1TB\r\n3.5 SATA III</b><br/>\r\nOs discos rígidos de vigilância WD purple são projetados para sistemas de segurança com vigilância continuos e de altas temperaturas, assegurando confiabilidade e qualidade de reprodução de video nos momentos em que você mais precisa.', 99.99, 300.90, 10000, 10000, 10000, 'https://img.terabyteshop.com.br/produto/g/hd-western-digital-purple-surveillance-1tb-sata-iii-5400rpm-64mb-wd10purz_75231.jpg', 'https://img.terabyteshop.com.br/produto/g/hd-western-digital-purple-surveillance-1tb-sata-iii-5400rp', 1000, 'WD10PURZ', '000150', 'Western Digital', 'sim', 'NAO', 'HD WD Purple 1TB, Sata III, 5400RPM, 64MB, WD10PURZ'),
(18, 9, 'Lenovo Gaming 3i ', 'enovo ideapad Gaming 3i<br/><br/>\r\nNovo design com 11ª Geração de Processadores Intel Core i5-11300H e placa de vídeo NVIDIA GeForce GTX 1650 4GB. Ideal para gamers e usuários que também precisam de alta performance. Com tela de 15.6\'\' Full HD WVA Antirreflexo para melhor definição de imagem e cores. O armanezamento SSD PCIe NVMe é 10x mais rápido* que um HDD 2.5” SATA, você terá mais segurança ao armazenar seus dados. O teclado retroiluminado em LED branco, deixa o computador mais atraente e também favorece a performance para jogos em lugares com pouca iluminação.\r\n\r\n <br/><br/>\r\n\r\nSilencioso e não esquenta<br/>\r\nProjetado com um sistema de resfriamento otimizado composto por 2 coolers e 4 saídas de ar para suportar o alto desempenho do notebook.\r\n<br/><br/>\r\n \r\n\r\nSua privacidade pessoal é muito importante<br/>\r\nÉ por isso que o Ideapad Gaming 3i está equipado com prática porta de privacidade da webcam. Quando não estiver em uma chamada de vídeo ou gravando algo, basta deslizá-la. Nitidez e alta qualidade de som com Nahimic Audio.\r\n\r\n <br/><br/>\r\n\r\nPossui tecnologia de carregamento rápido: quinze minutos de carregamento garante até duas horas de uso**<br/>\r\nA Lenovo coloca o Ideapad Gaming 3i à prova em testes de resistência altamente estressantes como: altas e baixas temperaturas, choque de temperatura, quebra e vibração, certificando a preocupação com a segurança e qualidade. Por meio de testes militares, mantém a convicção da melhor escolha sempre.  A distância entre a tecla e o botão ficou menor: apenas 1.5mm. Tenha mais agilidade, rapidez e tempo de resposta. A função Smart Control permite que o usuário da Lenovo mude a engrenagem simplesmente pressionando as teclas Fn + Q. Mude do Modo Performance para maior FPS, altere do Modo Silencioso para melhor duração da bateria, ou use o Modo Balanceado para uso diário. Armazenamento híbrido: Possui 2 slots SSD M.2 e 1 slot HDD SATA.\r\n\r\n <br/><br/>\r\n\r\n*Com base na velocidade de leitura dos dados obtidos através de spec de dados de leitura mb/s.<br/>\r\n\r\n** Carregamento com o notebook desligado. A duração de bateria e o tempo de carregamento podem variar de acordo com o uso, a configuração e outros fatores. Os resultados reais podem variar.\"', 99.99, 4099.99, 10000, 10000, 10000, 'https://images.kabum.com.br/produtos/fotos/373931/notebook-gamer-lenovo-gaming-3-intel-core-i5-11300h-geforce-gtx1650-8gb-ram-ssd-512gb-15-6-full-hd-windows-11-preto-82mg0009br-_1662137578_gg.jpg', 'https://images.kabum.com.br/produtos/fotos/373931/notebook-gamer-lenovo-gaming-3-intel-core-i5-11300', 10000, '82MG0009BR', '000150', 'Lenovo ', 'sim', 'NAO', 'Notebook Gamer Lenovo Gaming 3i Intel Core i5-11300H, GeForce GTX 1650, 8GB RAM, SSD 512GB, 15.6 Full HD, Windows 11, Preto - 82MG0009BR'),
(19, 9, 'Notebook Core I5 Dell', 'Notebook Dell Latitude - Intel Core i5 8 Geração<br/>\r\n\r\nEspecificações Técnicas:<br/>\r\n\r\nBateria:<br/>\r\n- Polímero de lítio<br/>\r\n- Duração mínima: 1 hora<br/>\r\n<br/><br/>\r\nMarca: DELL<br/>\r\n\r\nModelo: Latitude 5490<br/>\r\n<br/><br/>\r\nTela:<br/>\r\n- 14 Polegadas<br/>\r\n- 1920 x 1080 pixels<br/>\r\n- Full HD<br/>\r\n<br/><br/>\r\nProcessador:<br/>\r\n- Intel Core i5 8º geração<br/>\r\n- Modelo: i5 - 8265U<br/>\r\n<br/><br/>\r\nMemória RAM:<br/>\r\n- DDR4 16Gb<br/>\r\n- Memória Máx: 32Gb<br/>\r\n<br/><br/>\r\nArmazenamento interno:<br/>\r\n- Tecnologia SSD M2 256Gb<br/>\r\n<br/><br/>\r\nSistema operacional:<br/>\r\n- Windows 11 64bit<br/>\r\n<br/><br/>\r\nLeitor de DVD-R:<br/>\r\n- Não acompanha<br/>\r\n<br/><br/>\r\nPortas e interface:<br/>\r\n- USB 3.1: 3<br/>\r\n- USB 3.1 Tipo C: 1<br/>\r\n- HDMI: 1<br/>\r\n- RJ45(LAN): 1<br/>\r\n- PORTA P2: 1<br/>\r\n- SLOT SD CARD: 1<br/>\r\n<br/><br/>\r\nDimensões:<br/>\r\n- Largura: 32 cm<br/>\r\n- Profundidade: 21 cm<br/>\r\n- Altura: 2,1 cm<br/>\r\n- Peso 1,5 Kg<br/>\r\n<br/><br/>\r\nEnergia:<br/>\r\n- Fonte de alimentação: 19,5V<br/>\r\n- Voltagem: 110 - 240V<br/>\r\n<br/><br/>\r\nAdicionais:<br/>\r\n- Bluetooth<br/>\r\n- WiFi 5.0<br/>\r\n- Webcam 1MP<br/>\r\n- Teclado retro-iluminado', 99.99, 2450.99, 1000, 1000, 1000, 'https://http2.mlstatic.com/D_NQ_NP_919073-MLB69371256349_052023-O.webp', 'https://http2.mlstatic.com/D_NQ_NP_919073-MLB69371256349_052023-O.webp', 100000, '2280 ', '000160', 'Dell', 'sim', 'NAO', 'Notebook Core I5 Dell 16gb Ram 256gb Ssd M2  '),
(20, 10, 'Rise Mode Glass', ' <b>Para deixar seu Setup mais potente e cheio de estilo</b><br/>\r\nOs Gabinetes são a estrutura que une toda sua build, onde você vai querer algo que tenha flexibilidade para montagem da suas peças, garanta boa refrigeração dos componentes e que deixe tudo bonito. O Gabinete Rise Mode Glass 06X é a melhor escolha para tudo isso. Com acabamento externo em Vidro, dand um toque de estilo ao seu setup. Além de possuir espaço para 6 Fans (que não acompanham o gabinete).\r\n<br/><br/>\r\n \r\n<b>Acabamento em vidro temperado</b><br/>\r\nCom toda a sua parte interna na cor preta, o Gabinete Rise Mode Glass 06X Preto é a sua escolha perfeita para um setup organizado e muito cheio de estilo. O Gabinete Rise Mode é compatível com placas mãe padrão ATX / M-ATX / ITX, dando a você a possibilidade um PC Monstro. Comporta até 06 fans (não inclusas) para deixar o fluxo de ar perfeito dentro do gabinete e, com uma lateral de vidro cristalina, ainda permite que você admire o interior da sua obra. Simplesmente demais!', 99.99, 200.00, 1000, 1000, 1000, 'https://images.kabum.com.br/produtos/fotos/324516/gabinete-gamer-rise-mode-glass-06x-lateral-em-vidro-fume-e-frontal-em-vidro-temperado-preto-rm-ca-06x-fb_1660589149_gg.jpg', 'https://images.kabum.com.br/produtos/fotos/324516/gabinete-gamer-rise-mode-glass-06x-lateral-em-vidr', 10000, 'RM-CA-06X-FB', '000170', 'Rise Mode ', 'sim', 'NAO', 'Gabinete Gamer Rise Mode Glass 06X, Mid Tower, Lateral em Vidro Fumê e Frontal em Vidro Temperado, Preto - RM-CA-06X-FB'),
(21, 10, 'TGT Jeste BKGF01', '<b>Possui suporte para placas mães micro ATX e mini ITX </b><br>\r\nCom seu formato mATX, possui um excelente espaço interno<br>\r\nConta com 2 x USB 2.0 e Áudio HD<br>\r\nWater cooler suportado Frontal: 120 ou 240mm<br>\r\nIluminação Este modelo possui 2 ventoinhas RGB Rainbow inclusas<br>', 99.99, 110.99, 10000, 10000, 10000, 'https://m.media-amazon.com/images/I/61ZCVsyyngL.__AC_SX300_SY300_QL70_ML2_.jpg', 'https://m.media-amazon.com/images/I/61ZCVsyyngL.__AC_SX300_SY300_QL70_ML2_.jpg', 100000, 'BKGF01', '000180', 'TGT Jester', 'sim', 'NAO', 'Gabinete Gamer TGT Jester, Mid-Tower, Lateral de Vidro, Com 2 Fans, Preto, TGT-JSR-BKGF01'),
(22, 7, 'Husky Gaming 16GB', '<b>Memória Gamer Husky Gaming Avalanche - 16GB </b><br/>\r\nChegue ao próximo nível em desempenho com o seu computador gamer com a Memória Gamer Husky Gaming Avalanche. Em busca do minimalismo e da simplicidade, a memória Gamer Husky é extremamente fina e leve ideal para os gabinetes menores ou qualquer sistema com pouco espaço interno. Seu design em preto combina com todo o seu setup, independente do seu estilo. <br/><br/>\r\n\r\n \r\n\r\nVelocidade de 3200Mhz para Suas Jogadas<br/>\r\nA Memória Gamer Husky Avalanche é projetada para o mais alto desempenho, possui dissipador de calor embutido que entrega ótima condutividade térmica para que o sistema seja capaz de manter uma operação estável por muito tempo. Com 3200Mhz, garante mais velocidade para computadores de alta performance e desempenho robusto, entregando 16GB de capacidade. <br/><br/>\r\n \r\n\r\nCom Tecnologia DDR4<br/>\r\nMelhora a qualidade da transferência de sinal com Memória Husky e se mantenha na partida inspirando medo no seu inimigo. Instale essa memória de maneira rápida e fácil com a conexão Plug and Play e comece a partida. Possui tecnologia DDR4, UDIMM como formato e latência CL 19. A Memória Gamer Husky Gaming Avalanche é o que faltava para o seu computador ter melhor desempenho. \r\n\r\n', 99.99, 230.98, 10000, 1000, 1000, 'https://images.kabum.com.br/produtos/fotos/162665/memoria-gamer-husky-gaming-avalanche-16gb-3200mhz-ddr4-cl19-hgmf008_1630604969_gg.jpg', 'https://images.kabum.com.br/produtos/fotos/162665/memoria-gamer-husky-gaming-avalanche-16gb-3200mhz-', 100000, 'HGMF008', '000190', 'Husky Gaming ', 'sim', 'NAO', 'Memória Gamer Husky Gaming Avalanche, 16GB, 3200MHz, DDR4, CL19, Preto - HGMF008'),
(23, 8, 'PC Gamer Completo', 'Processador: Intel Core i5 6ª Geração <br/><br/>\r\nMemória RAM: 16GB 1600MHz<br/>\r\nArmazenamento: HD 1 TB + SSD 120GB<br/>\r\nMonitor 18,5\", Adaptador WiFi, Teclado e Mouse Gamer e Headset', 99.99, 2399.99, 100000000, 10000000, 10000000, 'https://m.media-amazon.com/images/I/61L+P9zhIIL._AC_SX569_.jpg', 'https://m.media-amazon.com/images/I/61L+P9zhIIL._AC_SX569_.jpg', 10, '00000000', '000200', '‎Chip7 Informática', 'sim', 'NAO', 'PC Gamer Completo Intel Core i5 6 Geração, 16GB RAM, SSD 120GB + HD 1TB, Monitor 18,5\" WiFi, Headset, Teclado e Mouse'),
(24, 2, 'INTEL CORE I5-10400', 'PROCESSADOR INTEL CORE I5-10400, 6-CORE, 12-THREADS, 2.9GHZ (4.3GHZ TURBO), CACHE 12MB, LGA1200, BX8070110400', 99.99, 920.00, 100, 100, 100, 'https://media.pichau.com.br/media/catalog/product/cache/2f958555330323e505eba7ce930bdf27/b/x/bx8070110400231.jpg', 'https://media.pichau.com.br/media/catalog/product/cache/2f958555330323e505eba7ce930bdf27/b/x/bx80701', 1000, 'BX8070110400', '000210', 'Intel', 'sim', 'NAO', 'PROCESSADOR INTEL CORE I5-10400, 6-CORE, 12-THREADS, 2.9GHZ (4.3GHZ TURBO), CACHE 12MB, LGA1200, BX8070110400');

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
  MODIFY `adm_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `as_categorias`
--
ALTER TABLE `as_categorias`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `as_clientes`
--
ALTER TABLE `as_clientes`
  MODIFY `cli_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `item_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `as_produtos`
--
ALTER TABLE `as_produtos`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `as_user`
--
ALTER TABLE `as_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
