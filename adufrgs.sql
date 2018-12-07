-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 07, 2018 at 01:57 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adufrgs`
--

-- --------------------------------------------------------

--
-- Table structure for table `associe_se`
--

DROP TABLE IF EXISTS `associe_se`;
CREATE TABLE IF NOT EXISTS `associe_se` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `enviado` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `nome` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_de_nascimento` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rg` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpf` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cep` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endereco` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complemento` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bairro` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siape` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identificacao_unica` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instituicao` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unidade` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departamento` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulacao` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regime_de_trabalho` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vinculo` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vinculoDetalhes` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dependentes` text COLLATE utf8mb4_unicode_ci,
  `data` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `json` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banner1`
--

DROP TABLE IF EXISTS `banner1`;
CREATE TABLE IF NOT EXISTS `banner1` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order` int(11) DEFAULT NULL,
  `ativo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'S',
  `text` text COLLATE utf8mb4_unicode_ci,
  `image` int(11) DEFAULT NULL,
  `legenda` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner1`
--

INSERT INTO `banner1` (`id`, `order`, `ativo`, `text`, `image`, `legenda`, `link`, `created_at`, `updated_at`) VALUES
(5, 5, 'S', NULL, 66, NULL, NULL, '2018-10-28 14:25:42', '2018-11-19 00:31:49'),
(4, 4, 'S', NULL, 65, NULL, NULL, '2018-10-28 14:23:03', '2018-11-19 00:30:30');

-- --------------------------------------------------------

--
-- Table structure for table `banner2`
--

DROP TABLE IF EXISTS `banner2`;
CREATE TABLE IF NOT EXISTS `banner2` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order` int(11) DEFAULT NULL,
  `ativo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'S',
  `text` text COLLATE utf8mb4_unicode_ci,
  `image` int(11) DEFAULT NULL,
  `legenda` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner2`
--

INSERT INTO `banner2` (`id`, `order`, `ativo`, `text`, `image`, `legenda`, `link`, `created_at`, `updated_at`) VALUES
(3, 3, 'S', NULL, 68, NULL, NULL, '2018-11-19 00:32:41', '2018-11-19 00:34:24'),
(2, 2, 'S', NULL, 67, NULL, 'http://www.portaladverso.com.br/', '2018-10-28 14:41:38', '2018-11-19 00:33:38');

-- --------------------------------------------------------

--
-- Table structure for table `carreiras_e_salarios`
--

DROP TABLE IF EXISTS `carreiras_e_salarios`;
CREATE TABLE IF NOT EXISTS `carreiras_e_salarios` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `text` text COLLATE utf8mb4_unicode_ci,
  `titulo` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descritivo` text COLLATE utf8mb4_unicode_ci,
  `arquivo` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carreiras_e_salarios`
--

INSERT INTO `carreiras_e_salarios` (`id`, `text`, `titulo`, `descritivo`, `arquivo`, `created_at`, `updated_at`) VALUES
(1, '<p>Tabelas Salariais para ago/16, jan/17 e ago/17. Veja tamb&eacute;m a simula&ccedil;&otilde;es para as tabelas de ago/18 e ago/19, a depender de negocia&ccedil;&otilde;es salariais futuras de reajustes a vigorar nesses anos.</p>', 'Tabelas Salariais Acordo 2015', '<p>Tabelas_Salariais_Acordo2015-reajuste-e-reestruturação-carreiras.xls</p>', 59, '2018-11-17 22:20:06', '2018-11-26 00:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `convenios`
--

DROP TABLE IF EXISTS `convenios`;
CREATE TABLE IF NOT EXISTS `convenios` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ativo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'S',
  `order` int(11) DEFAULT NULL,
  `name` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `endereco` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `convenios`
--

INSERT INTO `convenios` (`id`, `ativo`, `order`, `name`, `categoria`, `description`, `endereco`, `fone`, `email`, `site`, `created_at`, `updated_at`) VALUES
(1, 'S', 1, 'Guion', 2, '<p><strong>Vantagens:</strong>&nbsp;Ingressos a R$ 17,00 (dezessete reais), v&aacute;lidos para todos os dias e sess&otilde;es. Venda nas sedes da ADUFRGS.</p>', 'Centro Comercial Nova Olaria', '51. 3335 3535', 'email@email.com.br', 'www.site.com.br', '2018-11-10 03:17:15', '2018-11-10 03:17:15'),
(2, 'S', 2, 'Arteplex', 2, '<p><strong>Vantagens:</strong>&nbsp;Ingressos a R$ 14,00 (quatorze reais), v&aacute;lidos para todos os dias e sess&otilde;es. Venda nas sedes da ADUFRGS.</p>', 'Shopping Bourbon Country', '51. 3335 3535', 'email@email.com.br', 'www.site.com.br', '2018-11-10 15:12:35', '2018-11-10 15:59:26'),
(17, 'S', 17, 'Centro Cultural Usina do Gasômetro', 5, '<p><strong>Vantagens:</strong>&nbsp;Para associados da ADUFRGS oferece desconto de 50% em espet&aacute;culos de teatro, dan&ccedil;a, m&uacute;sica e oficinas (exceto cinema).&nbsp;</p>', 'Av. João Goulart n. 551  Centro Histórico - Porto Alegre - RS', '51. 3289 8100', NULL, NULL, '2018-11-23 02:11:51', '2018-11-23 02:11:51'),
(3, 'S', 3, 'Gnc Cinemas', 2, '<p><strong>Vantagens:</strong>&nbsp;Ingressos a R$ 14,00 (quatorze reais), v&aacute;lidos para todos os dias e sess&otilde;es. Venda nas sedes da ADUFRGS.&nbsp;</p>', 'Shopping Praia de Belas, Shopping Iguatemi, Shopping Lindoia e Moinhos Shopping', '51. 3335 3535', 'email@email.com.br', 'www.site.com.br', '2018-11-10 15:13:26', '2018-11-10 15:13:26'),
(4, 'S', 4, 'AABB Porto Alegre', 3, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS o valor da mensalidade &eacute; R$210,50 (duzentos e dez reais e cinquenta centavos). Este valor &eacute; para associado e mais dependentes de at&eacute; 24 anos. Ap&oacute;s os 24 anos de idade o dependente pode tornar-se &quot;dependente pago&quot;, at&eacute; completar 30 anos, pagando o valor mensal de R$ 71,50 (setenta e um reais e cinquenta centavos). Para informa&ccedil;&otilde;es mais detalhadas, confira aqui o contrato.&nbsp;</p>', 'Rua Coronel Marcos, n. 1000  Ipanema - Porto Alegre - RS', '51. 3335 3535', 'email@email.com.br', 'www.site.com.br', '2018-11-10 15:14:04', '2018-11-10 15:14:04'),
(5, 'S', 5, 'Escola Amigos do Verde', 4, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS oferece desconto de 5% sobre as mensalidades meio turno na Educa&ccedil;&atilde;o Infantil e do Ensino Fundamental- SOMENTE PARA NOVOS ALUNOS (filhos e/ou netos de professores associados). No caso da matr&iacute;cula de netos, o av&ocirc;/av&oacute; dever&aacute; ser o respons&aacute;vel financeiro e assinar o contrato de presta&ccedil;&atilde;o de servi&ccedil;os.&nbsp;</p>', 'Av. Cristovão Colombo, 3437  Higienopolis - Porto Alegre - RS', '51. 3337 7630', 'secretaria@amigosdoverde.com.br', 'www.amigosdoverde.com.br', '2018-11-10 15:15:11', '2018-11-10 15:15:11'),
(6, 'S', 6, 'Colégio Anchieta', 4, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS oferce desconto de 10% na matr&iacute;cula e nas mensalidades - SOMENTE PARA NOVOS ALUNOS (filhos e/ou netos de professores associados), desde que haja vaga para o ano letivo. Necess&aacute;rio retirar na ADUFRGS uma Declara&ccedil;&atilde;o que comprove V&iacute;nculo Associativo. Para informa&ccedil;&otilde;es mais detalhadas, confira aqui o contrato.</p>', 'Av. Dr. Nilo Peçanha n. 1521  Bela Vista - Porto Alegre - RS', '51. 3382 6001', 'secretaria@colegioanchieta.g12.br', 'www.colegioanchieta.g12.br', '2018-11-10 15:16:02', '2018-11-10 15:16:02'),
(7, 'S', 7, 'Colégio Israelita', 4, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS oferece desconto de 10% na matr&iacute;cula e nas mensalidades - SOMENTE PARA NOVOS ALUNOS (filhos ou netos de professores associados), desde que haja vaga para o ano letivo. Necess&aacute;rio retirar na ADUFRGS uma Declara&ccedil;&atilde;o de V&iacute;nculo Associativo. Para informa&ccedil;&otilde;es mais detalhadas, confira aqui o contrato.&nbsp;</p>', 'Av. Protásio Alves n. 943  Rio Branco - Porto Alegre - RS', '51. 3331 3030', 'secretaria@colegioisraelita.com.br', 'www.colegioisraelita.com.br', '2018-11-10 15:16:48', '2018-11-10 15:16:48'),
(8, 'S', 8, 'CID- Centro Integrado de Desenvolvimento', 4, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS oferece desconto de 10% na matr&iacute;cula e nas mensalidades - SOMENTE PARA NOVOS ALUNOS (filhos e/ou netos de professores associados), desde que haja vaga para o ano letivo. Necess&aacute;rio retirar na ADUFRGS uma Declara&ccedil;&atilde;o de V&iacute;nculo Associativo. Para informa&ccedil;&otilde;es mais detalhadas, confira aqui o contrato.&nbsp;</p>', 'Rua Fernandes Vieira , 553  Bom Fim - Porto Alegre - RS', '51. 3311 2789', 'secretaria@cidcrianca.com.br', 'www.cidcrianca.com.br', '2018-11-10 15:17:32', '2018-11-10 15:17:32'),
(9, 'S', 9, 'Adesbam', 3, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS oferece estrutura de lazer (col&ocirc;nia de f&eacute;rias, quadras esportivas e demais servi&ccedil;os) em Porto Alegre, Torres, Florian&oacute;polis e Itanha&eacute;m (SP), mediante pagamento das taxas de utiliza&ccedil;&atilde;o. Para informa&ccedil;&otilde;es mais detalhadas, confira aqui o contrato.&nbsp;</p>', 'Rua dos Andradas n. 943 (11º andar)  Centro Histórico - Porto Alegre - RS', '51. 3211 4661', 'email@email.com.br', 'www.site.com.br', '2018-11-10 15:18:16', '2018-11-10 15:18:16'),
(10, 'S', 10, 'Sogipa', 3, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS, oferece o beneficio de 2 meses de muscula&ccedil;&atilde;o gratuito ao titular do plano ou a um dependente, oferece tamb&eacute;m desconto de 10% no pagamento da mensalidade do plano contratado, mediante apresenta&ccedil;&atilde;o da carteira de s&oacute;cio. Para informa&ccedil;&otilde;es mais detalhadas, confira aqui o contrato.&nbsp;</p>', 'Rua Barão de Cotegipe n. 400  São João - Porto Alegre - RS', '51. 3325 7200', 'email@email.com.br', 'www.site.com.br', '2018-11-10 15:18:52', '2018-11-10 15:18:52'),
(11, 'S', 11, 'Escola Aqui Eu Fico', 4, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS oferece desconto de 10% na matr&iacute;cula e nas mensalidades - SOMENTE PARA NOVOS ALUNOS (filhos e/ou netos de professores associados), desde que haja vaga para o ano letivo. Necess&aacute;rio retirar na ADUFRGS uma Declara&ccedil;&atilde;o de V&iacute;nculo Associativo. Para informa&ccedil;&otilde;es mais detalhadas, confira aqui o contrato.&nbsp;</p>', 'Rua Eça de Queirós, 129  Petrópolis - Porto Alegre - RS', '51. 3237 1596', 'secretaria@aquieufico.com.br', 'www.aquieufico.com.br', '2018-11-10 15:19:39', '2018-11-10 15:19:39'),
(12, 'S', 12, 'Escola Curumim', 4, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS oferece desconto de 15% nas mensalidades para per&iacute;odo integral ou intermedi&aacute;rio e desconto de 10% nas mensalidades de meio turno- SOMENTE PARA NOVOS ALUNOS (filhos e/ou netos de professores associados), desde que haja vaga para o ano letivo.Necess&aacute;rio retirar na ADUFRGS uma Declara&ccedil;&atilde;o de V&iacute;nculo Associativo. Para informa&ccedil;&otilde;es mais detalhadas, confira aqui o contrato.&nbsp;</p>', 'Rua da Republica, nº 378  Cidade Baixa - Porto Alegre - RS', '51. 3227 1574', 'secretaria@escolacurumim.com.br', 'www.escolacurumim.com.br', '2018-11-10 15:20:22', '2018-11-10 15:20:22'),
(13, 'S', 13, 'Escolas Michigan', 4, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS oferece desconto de 30% nas atividades e material did&aacute;tico. Necess&aacute;rio apresentar carteira de s&oacute;cio.&nbsp;</p>', 'Av. Broges de Medeiros n. 340 Centro Histórico - Porto Alegre - RS', '51. 3228 1354', 'secretaria@escolasmichigan.com', 'www.escolasmichigan.com', '2018-11-10 15:20:59', '2018-11-10 15:20:59'),
(16, 'S', 16, 'StudioClio - Instituto de Arte & Humanismo', 5, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS desconto de 10%, al&eacute;m do percentual que j&aacute; &eacute; concedido a professores.</p>', 'Rua José do Patrocínio n. 698  Cidade Baixa - Porto Alegre - RS', '51. 3254 7200', 'clio@studioclio.com.br', 'www.studioclio.com.br', '2018-11-10 16:04:09', '2018-11-23 02:10:28'),
(18, 'S', 18, 'Companhia Teatro Novo', 5, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS e seus familiares oferece desconto de at&eacute; 20% nas pe&ccedil;as montadas pela Companhia.&nbsp;</p>', 'Shopping DC Navegantes - Rua Frederico Mentz n. 1561 Navegantes - Porto Alegre - RS', '51. 3374 7626', 'teatronovo2@teatronovo.com.br', 'www.teatronovo.com.br', '2018-11-23 02:12:39', '2018-11-23 02:12:39'),
(19, 'S', 19, 'Companhia Teatro Novo', 5, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS e seus familiares oferece desconto de at&eacute; 20% nas pe&ccedil;as montadas pela Companhia.&nbsp;</p>', 'Shopping DC Navegantes - Rua Frederico Mentz n. 1561 Navegantes - Porto Alegre - RS', '51. 3374 7626', 'teatronovo2@teatronovo.com.br', 'www.teatronovo.com.br', '2018-11-23 02:13:34', '2018-11-23 02:13:34'),
(20, 'S', 20, 'FCG - Foto Cine Clube Gaucho / Cursos', 5, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS oferece desconto de 20%.&nbsp;</p>', 'Rua Dr. Flores n. 98 (salas 81 e 82) Centro Histórico - Porto Alegre - RS', '51. 3224 7655', 'cadmatheus@ig.com.br', 'www.fcg.art.br', '2018-11-23 02:14:10', '2018-11-23 02:14:10'),
(21, 'S', 21, 'Santander Cultural', 5, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS oferece desconto de 20% nas programa&ccedil;&otilde;es de cinema e de m&uacute;sica (verificar lota&ccedil;&atilde;o).</p>', 'Rua Sete de Setembro n. 1028 Centro Histórico - Porto Alegre - RS', '51. 3287 5940', 'scultura@santander.com.br', 'www.santander.com.br/institucional-santander/cultura/santander-cultural', '2018-11-23 02:14:41', '2018-11-23 02:14:41'),
(22, 'S', 22, 'Portal Da Terra', 5, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS oferece desconto de 10% na loca&ccedil;&atilde;o de espa&ccedil;os de lazer com infraestrutura para receber grupos. O local possui trilhas, a&ccedil;udes, pomares, mata nativa e ambientes integrados adequados para reuni&otilde;es profissionais ou familiares. Para loca&ccedil;&atilde;o, &eacute; necess&aacute;rio apresentar carteira de s&oacute;cio da ADUFRGS.</p>', 'Beco do Juiz n. 3210 Passo da Areia - Viamão- RS', '51. 3108 3388', 'scultura@santander.com.br', 'www.oportaldaterra.com.br', '2018-11-23 02:15:20', '2018-11-23 02:15:20'),
(23, 'S', 23, 'Hotel Casa do Professor', 5, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS oferece desconto de 15% do valor da tabela de n&atilde;o s&oacute;cio praticada pela Casa do Professor. Para informa&ccedil;&otilde;es mais detalhadas, confira aqui o contrato.&nbsp;</p>', 'Rua Lopo Gonçalves n. 29 Cidade Baixa - Porto Alegre - RS', '51. 4009 2988', 'casadoprofessor@sinprors.org.br', 'www.casadoprofessor.sinprors.org.br', '2018-11-23 02:15:54', '2018-11-23 02:15:54'),
(24, 'S', 24, 'Livraria Via Sapiens', 6, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS oferece desconto de 10%, prazo de pagamento para 30 e 60 dias.&nbsp;</p>', 'Rua Lima e Silva n. 407 Cidade Baixa - Porto Alegre - RS', '51. 3221 0006', 'contato@livrariaviasapiens.com.br', 'www.livrariaviasapiens.com.br', '2018-11-23 02:16:44', '2018-11-23 02:16:44'),
(25, 'S', 25, 'Ruy Dornelles Dias (Gastroenterologia)', 7, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS oferece desconto de 30% nas consultas e exames.</p>', 'Rua dos Andradas n. 1137 (cj. 505)  Centro Histórico - Porto Alegre - RS', '51. 3224 0266', NULL, NULL, '2018-11-23 02:17:21', '2018-11-23 02:17:21'),
(26, 'S', 26, 'Rodrigo F. de Carvalho Veiga (Quiropraxista)', 7, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFGRS oferece desconto de: 18% na primeira consulta, 10% (adquirindo pacote de 7 sess&otilde;es) e 20% (adquirindo o pacote de 11 sess&otilde;es); Condi&ccedil;&otilde;es de pagamento: 3x at&eacute; 7 sess&otilde;es e 4x at&eacute; 11 sess&otilde;es, em cheque ou dinheiro. Necess&aacute;rio apresentar carteira de s&oacute;cio emitida pelo sindicado, acompanhada de documento oficial com foto. Para informa&ccedil;&otilde;es mais detalhadas confira aqui o contrato.&nbsp;</p>', 'Rua Cel. Fernando Machado n. 657  Centro Histórico - Porto Alegre - RS  Rua Bagé n. 248  Niterói - Canoas - RS', '51. 3228 8475', NULL, NULL, '2018-11-23 02:18:11', '2018-11-23 02:18:11'),
(27, 'S', 27, 'CDI- Centro de Diagnóstico por Imagem', 8, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS oferece desconto de 10%.&nbsp;</p>', 'Rua Dr. Flores n. 327 (9º andar)  Centro - Porto Alegre - RS  Rua Marquês do Pombal n. 783 (4° andar) Moinhos de Vento - Porto Alegre - RS  Rua José de Alencar n. 868 (8º andar)  Menino Deus - Porto Alegre - RS', '51. 3225 4645', 'cdi@cdi.odo.br', 'www.cdi.odo.br', '2018-11-23 02:19:03', '2018-11-23 02:19:03'),
(28, 'S', 28, 'Ultra Med- Clinica de Ecografia', 8, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS oferece desconto de 50% nos exames.&nbsp;</p>', 'Rua Prof. Annes Dias n.154 (sala 1701)  Centro Histórico - Porto Alegre - RS', '51. 3224 2388', 'corporativo@ultramed.com.br', 'www.ultramed.com.br', '2018-11-23 02:19:40', '2018-11-23 02:19:40'),
(29, 'S', 29, 'Centrofisio - Clinica de fisioterapia', 8, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS oferece desconto de 50% na fisioterapia e 15% na est&eacute;tica.&nbsp;</p>', 'Rua dos Andradas 1711 (conj. 502)  Centro Histórico - Porto Alegre - RS', '51. 3225 6882', 'centrofisiobsb@gmail.com', 'www.centrofisio.com.br', '2018-11-23 02:20:13', '2018-11-23 02:20:13'),
(30, 'S', 30, 'Safepark do Colégio Rosário', 9, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS os valores cobrados s&atilde;o: R$15,00 at&eacute; 8h e R$4,00 adicional a cada 30min. &Eacute; necess&aacute;rio adquirir um selo na Sede da ADUFRGS, com o custo de R$ 0,30.&nbsp;</p>', 'Rua Irmão José Otão n. 11  Centro Histórico - Porto Alegre - RS', '51. 3225 4645', NULL, 'www.safepark.com.br', '2018-11-23 02:20:44', '2018-11-23 02:20:44'),
(31, 'S', 31, 'Concessionária Peugeot Lyon', 10, '<p><strong>Vantagens:</strong>&nbsp;Para associados da ADUFRGS oferece desconto de 2% na compra de ve&iacute;culos novos e quaisquer outros produtos e servi&ccedil;os da referida concession&aacute;ria. Condi&ccedil;&otilde;es de compra e de pagamentos devem ser negociados pelo comprador diretamente com a concession&aacute;ria e podem sofrer varia&ccedil;&otilde;es de mercado. Necess&aacute;rio retirar na ADUFRGS uma declara&ccedil;&atilde;o que comprove vinculo associativo com o sindicato. Para informa&ccedil;&otilde;es mais detalhadas confira aqui o contrato.&nbsp;</p>', 'Av. Ipiranga n. 5566 Azenha - Porto Alegre - RS', '51. 3320 2500', 'contato@lyonportoalegre.com.br', 'www.lyonportoalegre.com.br', '2018-11-23 02:21:26', '2018-11-23 02:21:26'),
(32, 'S', 32, 'Concessionária Panambra Volkswagen', 10, '<p><strong>Vantagens:</strong>&nbsp;Para associados da ADUFRGS oferece desconto de 2% na compra de ve&iacute;culos novos e servi&ccedil;os na concession&aacute;ria Panambra. Necess&aacute;rio retirar na ADUFRGS uma declara&ccedil;&atilde;o que comprove vinculo associativo com o sindicato. Para informa&ccedil;&otilde;es mais detalhadas confira aqui o contrato.</p>', 'Av. Azenha n. 85 Azenha - Porto Alegre - RS', '51. 3218 1800', 'contato@panambra.com.br', 'www.panambra.com.br', '2018-11-23 02:22:04', '2018-11-23 02:22:04'),
(33, 'S', 33, 'Panvel', 11, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS oferece desconto de 10% em medicamentos de refer&ecirc;ncia e 30% nos medicamentos gen&eacute;ricos. Desconto ser&aacute; concedido mediante a apresenta&ccedil;&atilde;o da carteira Panvel, que dever&aacute; ser solicitada por e-mail para a ADUFRGS. A carteira ser&aacute; fornecida pela Panvel no prazo de 10 dias &uacute;teis ap&oacute;s o cadastramento na ADUFRGS, a mesma dever&aacute; ser retirada na Sede do Sindicato. A rela&ccedil;&atilde;o de lojas aptas a processarem as vendas mediante o presente conv&ecirc;nio, pode ser consultada aqui.&nbsp;</p>', 'Todas as unidades', '51. 3218 9000', 'sac@panvel.com.br', 'www.panvel.com', '2018-11-23 02:22:53', '2018-11-23 02:22:53'),
(34, 'S', 34, 'Porto Vita Farmácia de Manipulação', 11, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS oferece desconto de 10% para compras &agrave; vista acima de R$ 25,00 (vinte e cinco reais), e nas compras a prazo acima de R$100,00 (cem reais). Compras acima de R$ 100,00 (cem reais), o conveniado fica isento da taxa de tele-entrega. Necess&aacute;rio apresentar carteira de s&oacute;cio emitida pelo sindicato. Para informa&ccedil;&otilde;es mais detalhadas, confira aqui o contrato.&nbsp;</p>', 'Coronel Bordini n. 106  Auxiliadora - Porto Alegre - RS', '51. 3325 5795', 'contato@portovitafarma.com', 'www.portovitafarma.com', '2018-11-23 02:23:23', '2018-11-23 02:23:23'),
(35, 'S', 35, 'Farmacia Dose Certa', 11, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS oferece desconto de 12%.&nbsp;</p>', 'Vicente da Fontoura n. 2186  Santa Cecilia - Porto Alegre - RS', '51. 3333 8815', 'contato@dosecerta.com.br', 'www.dosecerta.com.br', '2018-11-23 02:23:57', '2018-11-23 02:23:57'),
(36, 'S', 36, 'Spa do Corpo', 12, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS oferece desconto de 20% nas aulas de pilates (2 vezes por semana) e 20% de desconto em qualquer pacote de servi&ccedil;os corporais. Necess&aacute;rio apresentar carteira de s&oacute;cio emitida pelo sindicato. Para informa&ccedil;&otilde;es mais detalhadas, confira aqui o contrato.&nbsp;</p>', 'Rua José do patrocínio n. 83  Cidade Baixa - Porto Alegre - RS', '51. 3226 7391', 'onespa@onespa.com.br', 'www.onespa.com.br', '2018-11-23 02:24:53', '2018-11-23 02:24:53'),
(37, 'S', 37, 'Spa do Corpo', 12, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS oferece desconto de 20% nas aulas de pilates (2 vezes por semana) e 20% de desconto em qualquer pacote de servi&ccedil;os corporais. Necess&aacute;rio apresentar carteira de s&oacute;cio emitida pelo sindicato. Para informa&ccedil;&otilde;es mais detalhadas, confira aqui o contrato.</p>', 'Rua Miguel Tostes n. 880  Rio Branco - Porto Alegre - RS', '51. 3316 7630', 'faleconosco@fisiocarebrasil.com.br', 'www.fisiocarebrasil.com.br', '2018-11-23 02:25:26', '2018-11-23 02:25:26'),
(38, 'S', 38, 'Fernanda Soibelman (Psicóloga)', 13, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS oferece desconto de 30% nas consultas. Necess&aacute;rio apresentar carteira de s&oacute;cio emitida pelo sindicato. Confira aqui o site da Psic&oacute;loga para mais informa&ccedil;&otilde;es. Entre em contato tamb&eacute;m pelo e-mail. Para informa&ccedil;&otilde;es mais detalhadas confira aqui o contrato.</p>', 'Av. Montenegro n. 192 (sala 03)  Petrópolis - Porto Alegre - RS', '51. 99636 2919', 'fsoibelman@gmail.com', 'www.safepark.com.br', '2018-11-23 02:26:03', '2018-11-23 02:26:03'),
(39, 'S', 39, 'Óptica Deluz', 14, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS oferece os seguintes descontos: Compra &agrave; vista em dinheiro: 20% de desconto. Compra d&eacute;bito: 15% de desconto. Compra cr&eacute;dito (30 dias): 10% de desconto. Compra em at&eacute; 6 vezes no cart&atilde;o: 5% de desconto. Necess&aacute;rio apresentar carteira de s&oacute;cio emitida pelo sindicato e documento oficial com foto. Para informa&ccedil;&otilde;es mais detalhadas, confira aqui o contrato.&nbsp;</p>', 'AV. Benjamin Constant n. 41  São João - Porto Alegre - RS', '51. 3019 0159', NULL, NULL, '2018-11-23 02:26:52', '2018-11-23 02:26:52'),
(40, 'S', 40, 'UNIODONTO', 15, '<p><strong>Vantagens:</strong>&nbsp;<br />\r\n1-DOCUMENTOS NECESS&Aacute;RIOS PARA INCLUS&Atilde;O NO PLANO.pdf<br />\r\n2-TERMO DE ADES&Atilde;O.pdf<br />\r\n3-AUTORIZA&Ccedil;&Atilde;O DE D&Eacute;BITO BB.pdf<br />\r\n4-VALORES E COBERTURA.pdf<br />\r\n5-CONTRATO UNIODONTO.pdf</p>', 'Rua Irmão José Otão n. 11  Centro - Porto Alegre - RS', '51. 3225 4645', 'uniodonto@uniodonto.coop.br', 'www.uniodonto.coop.br', '2018-11-23 02:27:48', '2018-11-23 02:27:48'),
(41, 'S', 41, 'UNIMED', 16, '<p><strong>Vantagens:</strong>&nbsp;<br />\r\n1-DOCUMENTOS NECESS&Aacute;RIOS PARA INCLUS&Atilde;O NO PLANO.pdf<br />\r\n2-TERMO DE ADES&Atilde;O.pdf<br />\r\n3-ORIENTA&Ccedil;&Otilde;ES PARA PREENCHIMENTO DA DECLARA&Ccedil;&Atilde;O DE SA&Uacute;DE.pdf<br />\r\n4-DECLARA&Ccedil;&Atilde;O DE SAUDE.pdf<br />\r\n5-AUTORIZA&Ccedil;&Atilde;O DE D&Eacute;BITO BB.pdf<br />\r\n6-TABELA COM VALORES.pdf<br />\r\n7- TABELA DE COPARTICIPA&Ccedil;&Otilde;ES EM CONSULTAS.pdf<br />\r\n8-CONTRATO UNIMAX PRIVATIVO.pdf<br />\r\n9-CONTRATO UNIMAX SEMIPRIVATIVO.pdf<br />\r\n10-TRANSPORTE AEROMEDICO.pdf<br />\r\n11-MANUAL DE ORIENTA&Ccedil;&Atilde;O.pdf<br />\r\n12-GUIA DE LEITURA CONTRATUAL.pdf<br />\r\n13-BENEF&Iacute;CIO FAM&Iacute;LIA.pdf</p>', 'Rua Irmão José Otão n. 11  Centro - Porto Alegre - RS', '51. 3225 4645', 'unimed@unimed.coop.br', 'www.unimed.coop.br', '2018-11-23 02:28:28', '2018-11-23 02:28:28'),
(42, 'S', 42, 'Granero Transportes', 17, '<p><strong>Vantagens:</strong>&nbsp;Para os associados da ADUFRGS oferece os seguintes descontos: 10% sobre o valor total do servi&ccedil;o de mudan&ccedil;a residencial e/ ou comercial. O desconto somente ser&aacute; dado para solicita&ccedil;&otilde;es realizadas diretamente com a Granero Porto Alegre independente da origem e destino da mudan&ccedil;a (n&iacute;vel nacional). Necess&aacute;rio apresentar carteira de s&oacute;cio emitida pelo sindicato e documento oficial com foto. Confira aqui o site da transportadora para mais informa&ccedil;&otilde;es. Confira aqui o contrato.&nbsp;</p>', 'Rua Ary dias Ferreira n. 70  Distrito Industrial Jorge Lanner - Canoas - RS', '51. 3477 4222 - 9363 9071', 'poa@granero.com.br', 'www.granero.com.br', '2018-11-23 02:29:06', '2018-11-23 02:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `convenios_categorias`
--

DROP TABLE IF EXISTS `convenios_categorias`;
CREATE TABLE IF NOT EXISTS `convenios_categorias` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ativo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'S',
  `order` int(11) DEFAULT NULL,
  `name` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `convenios_categorias`
--

INSERT INTO `convenios_categorias` (`id`, `ativo`, `order`, `name`, `image`, `created_at`, `updated_at`) VALUES
(2, 'S', 2, 'Cinema', 25, '2018-11-09 17:32:48', '2018-11-09 17:58:03'),
(3, 'S', 3, 'Club e Turismo', 21, '2018-11-09 17:34:32', '2018-11-09 17:38:04'),
(4, 'S', 4, 'Educação', 22, '2018-11-09 17:35:15', '2018-11-09 17:35:15'),
(5, 'S', 5, 'Entreterimento e Lazer', 23, '2018-11-09 17:35:51', '2018-11-09 17:35:51'),
(6, 'S', 6, 'Livraria e Revistaria', 24, '2018-11-09 17:36:14', '2018-11-09 17:36:14'),
(7, 'S', 7, 'Profissionais da Saúde', 69, '2018-11-23 02:01:16', '2018-11-23 02:01:16'),
(8, 'S', 8, 'Laboratórios e Centros de Diagnósticos', 70, '2018-11-23 02:03:17', '2018-11-23 02:03:17'),
(9, 'S', 9, 'Estacionamentos', 71, '2018-11-23 02:03:47', '2018-11-23 02:03:47'),
(10, 'S', 10, 'Veículos', 72, '2018-11-23 02:04:23', '2018-11-23 02:04:23'),
(11, 'S', 11, 'Farmácias', 73, '2018-11-23 02:04:51', '2018-11-23 02:04:51'),
(12, 'S', 12, 'Bem Estar', 74, '2018-11-23 02:05:25', '2018-11-23 02:05:25'),
(13, 'S', 13, 'Psicologia', 75, '2018-11-23 02:05:57', '2018-11-23 02:05:57'),
(14, 'S', 14, 'Joalheria e Ótica', 76, '2018-11-23 02:06:36', '2018-11-23 02:06:36'),
(15, 'S', 15, 'Odontologia', 77, '2018-11-23 02:07:11', '2018-11-23 02:07:11'),
(16, 'S', 16, 'Plano de Saúde', 78, '2018-11-23 02:07:49', '2018-11-23 02:07:49'),
(17, 'S', 17, 'Transportadora', 79, '2018-11-23 02:08:34', '2018-11-23 02:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `docente_autor`
--

DROP TABLE IF EXISTS `docente_autor`;
CREATE TABLE IF NOT EXISTS `docente_autor` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order` int(11) DEFAULT NULL,
  `image` int(11) DEFAULT NULL,
  `name` varchar(140) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `link` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `docente_materia`
--

DROP TABLE IF EXISTS `docente_materia`;
CREATE TABLE IF NOT EXISTS `docente_materia` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ativo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'S',
  `order` int(11) DEFAULT NULL,
  `autor` int(11) DEFAULT NULL,
  `assunto` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci,
  `texto2` text COLLATE utf8mb4_unicode_ci,
  `imagem_principal` int(11) DEFAULT NULL,
  `legenda_imagem` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `galeria` int(11) DEFAULT NULL,
  `video` text COLLATE utf8mb4_unicode_ci,
  `site` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flickr` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `path` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(140) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namefile` varchar(140) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namefilefull` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mimetype` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extension` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paththumb` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namefilethumb` varchar(140) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namefilefullthumb` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mimetypethumb` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extensionthumb` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sizethumb` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternative_text` varchar(140) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `path`, `name`, `namefile`, `namefilefull`, `description`, `mimetype`, `extension`, `size`, `paththumb`, `namefilethumb`, `namefilefullthumb`, `mimetypethumb`, `extensionthumb`, `sizethumb`, `alternative_text`, `created_at`, `updated_at`) VALUES
(67, 'images/_Banner2', 'novo-portal-adverso_1542587618.png', 'novo-portal-adverso_1542587618.png', 'images/_Banner2/novo-portal-adverso_1542587618.png', NULL, 'image/png', 'png', '388118', 'images/_Banner2/_Thumbs', 'novo-portal-adverso_1542587618_thumb.png', 'images/_Banner2/_Thumbs/novo-portal-adverso_1542587618_thumb.png', 'image/png', 'png', '39994', 'novo-portal-adverso_1542587618.png', '2018-11-19 00:33:38', '2018-11-19 00:33:38'),
(25, 'images/_ConvenioCategoria', 'cinema_1541786283.png', 'cinema_1541786283.png', 'images/_ConvenioCategoria/cinema_1541786283.png', NULL, 'image/png', 'png', '3707', NULL, NULL, NULL, NULL, NULL, NULL, 'cinema_1541786283.png', '2018-11-09 17:58:03', '2018-11-09 17:58:03'),
(21, 'images/_ConvenioCategoria', 'clubes_1541784872.png', 'clubes_1541784872.png', 'images/_ConvenioCategoria/clubes_1541784872.png', NULL, 'image/png', 'png', '6699', NULL, NULL, NULL, NULL, NULL, NULL, 'clubes_1541784872.png', '2018-11-09 17:34:32', '2018-11-09 17:34:32'),
(22, 'images/_ConvenioCategoria', 'educacao_1541784915.png', 'educacao_1541784915.png', 'images/_ConvenioCategoria/educacao_1541784915.png', NULL, 'image/png', 'png', '4695', NULL, NULL, NULL, NULL, NULL, NULL, 'educacao_1541784915.png', '2018-11-09 17:35:15', '2018-11-09 17:35:15'),
(23, 'images/_ConvenioCategoria', 'entretenimento_1541784951.png', 'entretenimento_1541784951.png', 'images/_ConvenioCategoria/entretenimento_1541784951.png', NULL, 'image/png', 'png', '5508', NULL, NULL, NULL, NULL, NULL, NULL, 'entretenimento_1541784951.png', '2018-11-09 17:35:51', '2018-11-09 17:35:51'),
(24, 'images/_ConvenioCategoria', 'livraria_1541784974.png', 'livraria_1541784974.png', 'images/_ConvenioCategoria/livraria_1541784974.png', NULL, 'image/png', 'png', '6604', NULL, NULL, NULL, NULL, NULL, NULL, 'livraria_1541784974.png', '2018-11-09 17:36:14', '2018-11-09 17:36:14'),
(52, 'images/_Informativo', 'informativo086-17_1542474474.pdf', 'informativo086-17_1542474474.pdf', 'images/_Informativo/informativo086-17_1542474474.pdf', NULL, 'application/octet-stream', 'pdf', '490494', NULL, NULL, NULL, NULL, NULL, NULL, 'informativo086-17_1542474474.pdf', '2018-11-17 17:07:54', '2018-11-17 17:07:54'),
(59, 'images/_CarreirasSalarios', 'carreiras-e-salarios_1542568566.xlsx', 'carreiras-e-salarios_1542568566.xlsx', 'images/_CarreirasSalarios/carreiras-e-salarios_1542568566.xlsx', NULL, 'application/octet-stream', 'xlsx', '8138', NULL, NULL, NULL, NULL, NULL, NULL, 'carreiras-e-salarios_1542568566.xlsx', '2018-11-18 19:16:06', '2018-11-18 19:16:06'),
(60, 'images/_Informativo', 'informativo085-17_1542575844.pdf', 'informativo085-17_1542575844.pdf', 'images/_Informativo/informativo085-17_1542575844.pdf', NULL, 'application/octet-stream', 'pdf', '383934', NULL, NULL, NULL, NULL, NULL, NULL, 'informativo085-17_1542575844.pdf', '2018-11-18 21:17:24', '2018-11-18 21:17:24'),
(61, 'images/_Informativo', 'informativo084-17_1542575931.pdf', 'informativo084-17_1542575931.pdf', 'images/_Informativo/informativo084-17_1542575931.pdf', NULL, 'application/octet-stream', 'pdf', '374193', NULL, NULL, NULL, NULL, NULL, NULL, 'informativo084-17_1542575931.pdf', '2018-11-18 21:18:51', '2018-11-18 21:18:51'),
(62, 'images/_Informativo', 'informativo082-17_1542575963.pdf', 'informativo082-17_1542575963.pdf', 'images/_Informativo/informativo082-17_1542575963.pdf', NULL, 'application/octet-stream', 'pdf', '369090', NULL, NULL, NULL, NULL, NULL, NULL, 'informativo082-17_1542575963.pdf', '2018-11-18 21:19:23', '2018-11-18 21:19:23'),
(63, 'images/_Informativo', 'informativo081-17_1542575999.pdf', 'informativo081-17_1542575999.pdf', 'images/_Informativo/informativo081-17_1542575999.pdf', NULL, 'application/octet-stream', 'pdf', '394845', NULL, NULL, NULL, NULL, NULL, NULL, 'informativo081-17_1542575999.pdf', '2018-11-18 21:19:59', '2018-11-18 21:19:59'),
(64, 'images/_Informativo', 'informativo080-17_1542576029.pdf', 'informativo080-17_1542576029.pdf', 'images/_Informativo/informativo080-17_1542576029.pdf', NULL, 'application/octet-stream', 'pdf', '374722', NULL, NULL, NULL, NULL, NULL, NULL, 'informativo080-17_1542576029.pdf', '2018-11-18 21:20:29', '2018-11-18 21:20:29'),
(44, 'images/_Instituicao', 'Estatuto ADUFRGS-Sindical', 'estatuto-da-adufrgs-sindical_1541944559.pdf', 'images/_Instituicao/estatuto-da-adufrgs-sindical_1541944559.pdf', NULL, 'application/octet-stream', 'pdf', '8751853', NULL, NULL, NULL, NULL, NULL, NULL, 'estatuto-da-adufrgs-sindical_1541944559.pdf', '2018-11-11 13:55:59', '2018-11-18 20:04:00'),
(68, 'images/_Banner2', 'banner2_1542587664.png', 'banner2_1542587664.png', 'images/_Banner2/banner2_1542587664.png', NULL, 'image/png', 'png', '735490', 'images/_Banner2/_Thumbs', 'banner2_1542587664_thumb.png', 'images/_Banner2/_Thumbs/banner2_1542587664_thumb.png', 'image/png', 'png', '39958', 'banner2_1542587664.png', '2018-11-19 00:34:24', '2018-11-19 00:34:24'),
(65, 'images/_Banner1', 'promocoes-e-progressoes_1542587429.png', 'promocoes-e-progressoes_1542587429.png', 'images/_Banner1/promocoes-e-progressoes_1542587429.png', NULL, 'image/png', 'png', '512108', 'images/_Banner1/_Thumbs', 'promocoes-e-progressoes_1542587429_thumb.png', 'images/_Banner1/_Thumbs/promocoes-e-progressoes_1542587429_thumb.png', 'image/png', 'png', '21258', 'promocoes-e-progressoes_1542587429.png', '2018-11-19 00:30:30', '2018-11-19 00:30:30'),
(66, 'images/_Banner1', 'outubro-rosa_1542587508.png', 'outubro-rosa_1542587508.png', 'images/_Banner1/outubro-rosa_1542587508.png', NULL, 'image/png', 'png', '2039573', 'images/_Banner1/_Thumbs', 'outubro-rosa_1542587508_thumb.png', 'images/_Banner1/_Thumbs/outubro-rosa_1542587508_thumb.png', 'image/png', 'png', '48728', 'outubro-rosa_1542587508.png', '2018-11-19 00:31:49', '2018-11-19 00:31:49'),
(69, 'images/_ConvenioCategoria', 'profissional-saude_1542938476.png', 'profissional-saude_1542938476.png', 'images/_ConvenioCategoria/profissional-saude_1542938476.png', NULL, 'image/png', 'png', '7575', NULL, NULL, NULL, NULL, NULL, NULL, 'profissional-saude_1542938476.png', '2018-11-23 02:01:16', '2018-11-23 02:01:16'),
(70, 'images/_ConvenioCategoria', 'laboratorios-e-centros-de-diagnosticos_1542938597.png', 'laboratorios-e-centros-de-diagnosticos_1542938597.png', 'images/_ConvenioCategoria/laboratorios-e-centros-de-diagnosticos_1542938597.png', NULL, 'image/png', 'png', '4922', NULL, NULL, NULL, NULL, NULL, NULL, 'laboratorios-e-centros-de-diagnosticos_1542938597.png', '2018-11-23 02:03:17', '2018-11-23 02:03:17'),
(71, 'images/_ConvenioCategoria', 'estacionamento_1542938627.png', 'estacionamento_1542938627.png', 'images/_ConvenioCategoria/estacionamento_1542938627.png', NULL, 'image/png', 'png', '3535', NULL, NULL, NULL, NULL, NULL, NULL, 'estacionamento_1542938627.png', '2018-11-23 02:03:47', '2018-11-23 02:03:47'),
(72, 'images/_ConvenioCategoria', 'veiculos_1542938663.png', 'veiculos_1542938663.png', 'images/_ConvenioCategoria/veiculos_1542938663.png', NULL, 'image/png', 'png', '5204', NULL, NULL, NULL, NULL, NULL, NULL, 'veiculos_1542938663.png', '2018-11-23 02:04:23', '2018-11-23 02:04:23'),
(73, 'images/_ConvenioCategoria', 'farmacias_1542938691.png', 'farmacias_1542938691.png', 'images/_ConvenioCategoria/farmacias_1542938691.png', NULL, 'image/png', 'png', '4170', NULL, NULL, NULL, NULL, NULL, NULL, 'farmacias_1542938691.png', '2018-11-23 02:04:51', '2018-11-23 02:04:51'),
(74, 'images/_ConvenioCategoria', 'bem-estar_1542938725.png', 'bem-estar_1542938725.png', 'images/_ConvenioCategoria/bem-estar_1542938725.png', NULL, 'image/png', 'png', '8409', NULL, NULL, NULL, NULL, NULL, NULL, 'bem-estar_1542938725.png', '2018-11-23 02:05:25', '2018-11-23 02:05:25'),
(75, 'images/_ConvenioCategoria', 'poscicologia_1542938757.png', 'poscicologia_1542938757.png', 'images/_ConvenioCategoria/poscicologia_1542938757.png', NULL, 'image/png', 'png', '6217', NULL, NULL, NULL, NULL, NULL, NULL, 'poscicologia_1542938757.png', '2018-11-23 02:05:57', '2018-11-23 02:05:57'),
(76, 'images/_ConvenioCategoria', 'joalheria-e-otica_1542938796.png', 'joalheria-e-otica_1542938796.png', 'images/_ConvenioCategoria/joalheria-e-otica_1542938796.png', NULL, 'image/png', 'png', '7222', NULL, NULL, NULL, NULL, NULL, NULL, 'joalheria-e-otica_1542938796.png', '2018-11-23 02:06:36', '2018-11-23 02:06:36'),
(77, 'images/_ConvenioCategoria', 'odontologia_1542938831.png', 'odontologia_1542938831.png', 'images/_ConvenioCategoria/odontologia_1542938831.png', NULL, 'image/png', 'png', '4791', NULL, NULL, NULL, NULL, NULL, NULL, 'odontologia_1542938831.png', '2018-11-23 02:07:11', '2018-11-23 02:07:11'),
(78, 'images/_ConvenioCategoria', 'plano-de-saude_1542938869.png', 'plano-de-saude_1542938869.png', 'images/_ConvenioCategoria/plano-de-saude_1542938869.png', NULL, 'image/png', 'png', '3799', NULL, NULL, NULL, NULL, NULL, NULL, 'plano-de-saude_1542938869.png', '2018-11-23 02:07:49', '2018-11-23 02:07:49'),
(79, 'images/_ConvenioCategoria', 'transportadora_1542938914.png', 'transportadora_1542938914.png', 'images/_ConvenioCategoria/transportadora_1542938914.png', NULL, 'image/png', 'png', '4550', NULL, NULL, NULL, NULL, NULL, NULL, 'transportadora_1542938914.png', '2018-11-23 02:08:34', '2018-11-23 02:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `files-galeria`
--

DROP TABLE IF EXISTS `files-galeria`;
CREATE TABLE IF NOT EXISTS `files-galeria` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `path` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(140) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namefile` varchar(140) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namefilefull` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mimetype` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extension` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paththumb` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namefilethumb` varchar(140) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namefilefullthumb` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mimetypethumb` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extensionthumb` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sizethumb` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternative_text` varchar(140) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galerias_has_files-galeria`
--

DROP TABLE IF EXISTS `galerias_has_files-galeria`;
CREATE TABLE IF NOT EXISTS `galerias_has_files-galeria` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order` int(11) DEFAULT NULL,
  `id_casa` int(11) DEFAULT NULL,
  `id_programacao` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  `id_file` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `informativos`
--

DROP TABLE IF EXISTS `informativos`;
CREATE TABLE IF NOT EXISTS `informativos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order` int(11) DEFAULT NULL,
  `codigo` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci,
  `arquivo` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informativos`
--

INSERT INTO `informativos` (`id`, `order`, `codigo`, `titulo`, `descricao`, `arquivo`, `created_at`, `updated_at`) VALUES
(3, 3, 'INFORMATIVO Nº 086/17', 'Assembleia aprova sugestões de alterações nas normas para promoção e progressão docente na UFRGS', '<p>Reunidos em assembleia geral, no dia 22 de setembro, professores filiados &agrave; ADUFRGSSindical discutiram alguns pontos propostos pela UFRGS...</p>', 52, '2018-11-17 17:07:54', '2018-11-17 17:07:54'),
(4, 4, 'INFORMATIVO Nº 085/17', 'ADUFRGS conclama professores para mobilização contra o Escola sem Partido', '<p>ADUFRGS-Sindical participa do lan&ccedil;amento da Frente Ga&uacute;cha em favor das IFEs...</p>', 60, '2018-11-18 21:17:24', '2018-11-18 21:17:24'),
(5, 5, 'INFORMATIVO Nº 084/17', 'Assembleia Geral – 22 de setembro, sexta-feira, às 13h – Sede da ADUFRGS', NULL, 61, '2018-11-18 21:18:51', '2018-11-18 21:18:51'),
(6, 6, 'INFORMATIVO Nº 082/17', 'Nota da ADUFRGS-Sindical sobre paralisação no dia 14 de Setembro', NULL, 62, '2018-11-18 21:19:23', '2018-11-18 21:19:23'),
(7, 7, 'INFORMATIVO Nº 081/17', 'Proifes defende manutenção do Acordo de reestruturação de carreiras em reunião com o MPOD', '<p>Claudio Scherer, Pr&ecirc;mio Proifes 2017, &eacute; o entrevistado do ADUFRGS no Ar...</p>', 63, '2018-11-18 21:19:59', '2018-11-18 21:19:59'),
(8, 8, 'INFORMATIVO Nº 080/17', 'Nota do Presidente da ADUFRGS-Sindical', NULL, 64, '2018-11-18 21:20:29', '2018-11-18 21:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `instituicoes`
--

DROP TABLE IF EXISTS `instituicoes`;
CREATE TABLE IF NOT EXISTS `instituicoes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitulo` text COLLATE utf8mb4_unicode_ci,
  `text` text COLLATE utf8mb4_unicode_ci,
  `arquivo` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instituicoes`
--

INSERT INTO `instituicoes` (`id`, `titulo`, `subtitulo`, `text`, `arquivo`, `created_at`, `updated_at`) VALUES
(1, 'Breve histórico da ADUFRGS-Sindical', '<p>Fundada em 1978, como Associa&ccedil;&atilde;o de Docentes da Universidade Federal do Rio Grande do Sul, a ADUFRGS surgiu em meio &agrave; luta pela democratiza&ccedil;&atilde;o do Pa&iacute;s e da Universidade. Nesse cen&aacute;rio a funda&ccedil;&atilde;o desta entidade revelou a coragem, o esp&iacute;rito combativo e o grau de engajamento e atua&ccedil;&atilde;o dos professores da UFRGS, os quais perduram at&eacute; hoje.</p>\r\n\r\n<p>Tr&ecirc;s d&eacute;cadas depois, em 2008, como uma alternativa &agrave; pol&iacute;tica que era adotada pela entidade nacional que ent&atilde;o representava os professores do ensino superior, a ADUFRGS foi transformada em ADUFRGS-Sindical, Sindicato dos Professores das Institui&ccedil;&otilde;es Federais de Ensino Superior de Porto Alegre e passa a atender docentes da UFRGS, da UFCSPA, do IFRS/Porto Alegre e do IFRS/Restinga.</p>\r\n\r\n<p>Ao receber do Minist&eacute;rio do Trabalho e Emprego o Registro Sindical, em 2011, &eacute; consolidada como a representante leg&iacute;tima e legal dos professores dessas institui&ccedil;&otilde;es federais de ensino superior, passando a ter os instrumentos legais e jur&iacute;dicos para a defesa de nossos interesses profissionais na perspectiva de que o futuro depende das respostas que a comunidade acad&ecirc;mica seja capaz de formular aos novos desafios.</p>\r\n\r\n<p>Em 2016, por demanda externa, a base sindical novamente &eacute; ampliada, desta vez para 11 munic&iacute;pios (Alvorada, Bento Gon&ccedil;alves, Canoas, Caxias do Sul, Charqueadas, Farroupilha, Feliz, Sapucaia do Sul, Tramanda&iacute;, Os&oacute;rio e Viam&atilde;o), al&eacute;m de Porto Alegre, e tem o nome alterado para Sindicato Intermunicipal dos Professores de Institui&ccedil;&otilde;es Federais de Ensino Superior do Rio Grande do Sul.</p>\r\n\r\n<p>Filiada ao Proifes-Federa&ccedil;&atilde;o, a ADUFRGS-Sindical defende o pluralismo de ideias e o respeito &agrave;s posi&ccedil;&otilde;es pol&iacute;tico-ideol&oacute;gicas de seus associados. Utiliza o m&eacute;todo de consulta eletr&ocirc;nica para deliberar sobre as quest&otilde;es mais importantes, por acreditar que essa &eacute; uma forma mais democr&aacute;tica de tomada de decis&otilde;es.</p>', '<div style=\"color:#005086; font-size:1.4em; font-weight:bold; padding:10px 0 4px 0\">Gest&atilde;o ADUFRGS-Sindical 2016/2019</div>\r\n\r\n<p>Presidente: Paulo Machado Mors&nbsp;<br />\r\nVice-Presidente: L&uacute;cio Ol&iacute;mpio de Carvalho Vieira&nbsp;<br />\r\n1&ordm; Secret&aacute;rio: Ricardo Francalacci Savaris&nbsp;<br />\r\n2&ordm; Secret&aacute;rio e Diretor Social e Cultural: Newton Lu&iacute;s Garcia Carneiro&nbsp;<br />\r\n1&ordm; Tesoureiro: Vanderlei Carraro&nbsp;<br />\r\n2&ordm; Tesoureiro e Diretor de Assuntos Jur&iacute;dicos: Pedro Alves d&rsquo;Azevedo&nbsp;<br />\r\nDiretora de Assuntos da Carreira do MS: Luciana Boose Pinheiro&nbsp;<br />\r\nDiretor de Assuntos da Carreira do EBTT: Eduardo de Oliveira da Silva&nbsp;<br />\r\nDiretora de Comunica&ccedil;&atilde;o: L&uacute;cia Couto Terra&nbsp;<br />\r\nDiretor de Assuntos de Aposentadoria e Previd&ecirc;ncia: Jairo Alfredo Genz Bolter&nbsp;<br />\r\nDiretor de Rela&ccedil;&otilde;es Sindicais: Eduardo Rolim de Oliveira</p>\r\n\r\n<div style=\"color:#5a5a5a; font-size:1.4em; font-weight:bold; padding:10px 0 4px 0\">Gest&atilde;o ADUFRGS-Sindical 2013/2016</div>\r\n\r\n<p>Presidente: Maria Luiza Ambros von Holleben&nbsp;<br />\r\n1&ordm; vice-presidente: L&uacute;cio Ol&iacute;mpio de Carvalho Vieira&nbsp;<br />\r\n2&ordf; vice-presidente: Marilda da Cruz Fernandes&nbsp;<br />\r\n1&ordm; secret&aacute;rio: Ricardo Francalacci Savaris&nbsp;<br />\r\n2&ordm; secret&aacute;rio: Paulo Machado Mors&nbsp;<br />\r\n3&ordm; secret&aacute;rio: Luciano Casagrande&nbsp;<br />\r\n1&ordm; tesoureiro: Vanderlei Carraro&nbsp;<br />\r\n2&ordm; tesoureiro: Edson Luiz Lindner&nbsp;<br />\r\n3&ordf; tesoureira: Gl&oacute;ria Isabel Sattamini Ferreira&nbsp;</p>\r\n\r\n<div style=\"color:#5a5a5a; font-size:1.4em; font-weight:bold; padding:10px 0 4px 0\">Gest&atilde;o ADUFRGS-Sindical 2011/2013</div>\r\n\r\n<p>Presidente: Maria Luiza Ambros von Holleben<br />\r\n1&ordm; vice-presidente: Claudio Scherer<br />\r\n2&ordm; vice-presidente: L&uacute;cio Ol&iacute;mpio de Carvalho Vieira<br />\r\n1&ordf; secret&aacute;ria: Maria da Gra&ccedil;a Saraiva Marques<br />\r\n2&ordf; secret&aacute;ria: Marilda da Cruz Fernandes<br />\r\n3&ordm; secret&aacute;rio: Ricardo Francalacci Savaris<br />\r\n1&ordm; tesoureiro: Daltro Jos&eacute; Nunes<br />\r\n2&ordm; tesoureiro: Vanderlei Carraro<br />\r\n3&ordf; tesoureira: Gl&oacute;ria Isabel Sattamini Ferreira</p>\r\n\r\n<div style=\"color:#5a5a5a; font-size:1.4em; font-weight:bold; padding:10px 0 4px 0\">Gest&atilde;o ADUFRGS-Sindical 2006 / 2008</div>\r\n\r\n<p>Presidente: Maria Luiza Ambros von Holleben<br />\r\n1&ordm; vice-presidente: Claudio Scherer<br />\r\n2&ordm; vice-presidente: L&uacute;cio Ol&iacute;mpio de Carvalho Vieira<br />\r\n1&ordf; secret&aacute;ria: Maria da Gra&ccedil;a Saraiva Marques<br />\r\n2&ordf; secret&aacute;ria: Marilda da Cruz Fernandes<br />\r\n3&ordm; secret&aacute;rio: Ricardo Francalacci Savaris<br />\r\n1&ordm; tesoureiro: Daltro Jos&eacute; Nunes<br />\r\n2&ordm; tesoureiro: Vanderlei Carraro<br />\r\n3&ordf; tesoureira: Gl&oacute;ria Isabel Sattamini Ferreira</p>\r\n\r\n<div style=\"color:#5a5a5a; font-size:1.4em; font-weight:bold; padding:10px 0 4px 0\">Gest&atilde;o ADUFRGS-Sindical 2006 / 2008</div>\r\n\r\n<p>Presidente: Eduardo Rolim de Oliveira<br />\r\n1&ordm; vice-presidente: Cl&aacute;udio Scherer<br />\r\n2&ordm; vice-presidente: L&uacute;cio Hagemann<br />\r\n1&ordm; secret&aacute;rio: L&uacute;cio Olimpio de Carvalho Vieira<br />\r\n2&ordf; secret&aacute;ria: Maria Luiza Ambros von Holleben<br />\r\n<br />\r\n1&ordm; tesoureiro: Marcelo Abreu da Silva<br />\r\n2&ordf; tesoureira: Maria da Gra&ccedil;a Saraiva Marques<br />\r\n1&ordm; suplente: Mauro Silveira de Castro<br />\r\n2&ordm; suplente: Jos&eacute; Carlos Freitas Lemos</p>\r\n\r\n<div style=\"color:#5a5a5a; font-size:1.4em; font-weight:bold; padding:10px 0 4px 0\">Gest&atilde;o ADUFRGS-Sindical 2004/2006</div>\r\n\r\n<p>Presidente: Eduardo Rolim de Oliveira<br />\r\n1&ordm; vice-presidente: Claudio Scherer<br />\r\n2&ordm; vice-presidente: L&uacute;cio Hagemann<br />\r\n1&ordf; secret&aacute;ria: Zuleika Carretta Corr&ecirc;a da Silva<br />\r\n2&ordm; secret&aacute;rio: Mauro Silveira de Castro<br />\r\n1&ordm; tesoureiro: Jos&eacute; Carlos Freitas Lemos<br />\r\n2&ordm; tesoureiro: Marcelo Abreu da Silva<br />\r\n1&ordm; suplente: Regina Rigatto Witt<br />\r\n2&ordm; suplente: Jo&atilde;o Vicente Silva Souza</p>\r\n\r\n<div style=\"color:#5a5a5a; font-size:1.4em; font-weight:bold; padding:10px 0 4px 0\">Gest&atilde;o ADUFRGS-Sindical 2002/2004</div>\r\n\r\n<p>Presidente: Maria Aparecida Castro Livi<br />\r\n1&ordm; vice-presidente: Eduardo Rolim de Oliveira<br />\r\n2&ordm; vice-presidente: Carlos Alberto Saraiva Gon&ccedil;alves<br />\r\n1&ordf; secret&aacute;ria: Daniela Marzola Fialho<br />\r\n2&ordf; secret&aacute;ria: Laura Verrastro Vi&ntilde;as<br />\r\n1&ordm; tesoureiro: Alejandro Borche Casalas<br />\r\n2&ordm; tesoureiro: Valerio de Patta Pillar<br />\r\n1&ordm; suplente: Elizabete Zardo B&uacute;rigo<br />\r\n2&ordm; suplente: N&aacute;dya Pesce da Silveira</p>\r\n\r\n<div style=\"color:#5a5a5a; font-size:1.4em; font-weight:bold; padding:10px 0 4px 0\">Gest&atilde;o ADUFRGS-Sindical 2000/2002</div>\r\n\r\n<p>Presidente: Rubens Constantino Volpe Weyne<br />\r\n1&ordf; vice-presidente: Marilene Schmarczek<br />\r\n2&ordm; vice-presidente: F&eacute;lix Hil&aacute;rio Diaz Gonzalez<br />\r\n1&ordm; secret&aacute;rio: M&aacute;rio Luiz Dame Wrege<br />\r\n2&ordf; secret&aacute;ria: Daniela Marzola Fialho<br />\r\n1&ordm; tesoureiro: Edson Luiz Lindner<br />\r\n2&ordm; tesoureiro: Vanderlei Carraro<br />\r\n1&ordf; suplente: Tatiana Montanari<br />\r\n2&ordf; suplente: Carmen L&uacute;cia Bezerra Machado</p>\r\n\r\n<div style=\"color:#5a5a5a; font-size:1.4em; font-weight:bold; padding:10px 0 4px 0\">Gest&atilde;o ADUFRGS-Sindical 1998/2000</div>\r\n\r\n<p>Presidente: Carlos Schmidt<br />\r\n1&ordm; vice-presidente: L&uacute;cio Hagemnn<br />\r\n2&ordf; vice-presidente: Elisabete Zardo Burigo<br />\r\n1&ordf; secret&aacute;ria: Regina Rigatto Witt<br />\r\n2&ordf; secret&aacute;ria: Daniela Marzola Fialho<br />\r\n1&ordm; tesoureiro: Edson Luiz Lindner<br />\r\n2&ordm; tesoureiro: Mario Roberto Generosi Brauner<br />\r\n1&ordm; suplente: Rubens Constantino Volpe Weyne<br />\r\n2&ordf; suplente: Jaqueline Moll</p>\r\n\r\n<div style=\"color:#5a5a5a; font-size:1.4em; font-weight:bold; padding:10px 0 4px 0\">Gest&atilde;o ADUFRGS-Sindical 1996/1998</div>\r\n\r\n<p>Presidente: Renato de Oliveira<br />\r\n1&ordm; vice-presidente: Carlos Schmidt<br />\r\n2&ordm; vice-presidente: L&uacute;cio Hagemann<br />\r\n1&ordf; secret&aacute;ria: Eloina Prati dos Santos<br />\r\n2&ordm; secret&aacute;rio: Jorge Ricardo Ducati<br />\r\n1&ordm; tesoureiro: M&aacute;rio Roberto Generosi Brauner<br />\r\n2&ordm; tesoureiro: Jo&atilde;o Vicente Silva Souza<br />\r\n1&ordm; suplente: Benedito Tadeu Cesar<br />\r\n2&ordm; suplente: Ricardo Pezzuol Jacobi</p>\r\n\r\n<div style=\"color:#5a5a5a; font-size:1.4em; font-weight:bold; padding:10px 0 4px 0\">Gest&atilde;o ADUFRGS-Sindical 1994/1996</div>\r\n\r\n<p>Presidente: Renato de Oliveira<br />\r\n1&ordf; vice-presidente: Maria Ad&eacute;lia Pinhal de Carlos<br />\r\n2&ordm; vice-presidente: Fernando Rosa do Nascimento<br />\r\n1&ordm; secret&aacute;rio: C&iacute;rio Simon<br />\r\n2&ordf; secret&aacute;ria: Leda Carmen Wulff Gobetti<br />\r\n1&ordm; tesoureiro: Vanderlei Carraro<br />\r\n2&ordm; tesoureiro: Luiz Alberto Oliveira Ribeiro de Miranda<br />\r\n1&ordm; suplente: Jorge Ricardo Ducati<br />\r\n2&ordm; suplente: Aron Taitelbaum</p>\r\n\r\n<div style=\"color:#5a5a5a; font-size:1.4em; font-weight:bold; padding:10px 0 4px 0\">Gest&atilde;o ADUFRGS-Sindical 1992/1994</div>\r\n\r\n<p>Presidente: Fernando Molinos Pires Filho<br />\r\n1&ordm; vice-presidente: Maria Assunta Campilongo<br />\r\n2&ordm; vice-presidente: Cesar Augusto Zen Vasconcellos<br />\r\n1&ordm; secret&aacute;rio: F&aacute;bio de Lima Beck<br />\r\n2&ordf; secret&aacute;ria: Neuza Maria Nogueira Tartaglia<br />\r\n1&ordf; tesoureira: Maria Ad&eacute;lia Pinhal de Carlos<br />\r\n2&ordf; tesoureira: Leda Carmen Wulff Gobetti<br />\r\n1&ordm; suplente: Raul Dorfman<br />\r\n2&ordf; suplente: Ana Maria e Souza Braga</p>\r\n\r\n<div style=\"color:#5a5a5a; font-size:1.4em; font-weight:bold; padding:10px 0 4px 0\">Gest&atilde;o ADUFRGS-Sindical 1989/1991</div>\r\n\r\n<p>Presidente: Sergio Nicolaiewsky<br />\r\n1&ordf; vice-presidente: Leda Carmen Wulff Gobetti<br />\r\n2&ordm; vice-presidente: Joacir Thadeu Nascimento<br />\r\n1&ordf; secret&aacute;ria: Ana Maria e Souza Braga<br />\r\n2&ordf; secret&aacute;ria: Maria Ad&eacute;lia Pinhal de Carlos<br />\r\n1&ordm; tesoureiro: Tiago Josu&eacute; Martins Sim&otilde;es<br />\r\n2&ordm; tesoureiro: Ronaldo Bordin<br />\r\n1&ordm; suplente: Fernando Molinos Pires Filho<br />\r\n2&ordm; suplente: M&aacute;rio Roberto Generosi Brauner</p>\r\n\r\n<div style=\"color:#5a5a5a; font-size:1.4em; font-weight:bold; padding:10px 0 4px 0\">Gest&atilde;o ADUFRGS-Sindical 1987/1989</div>\r\n\r\n<p>Presidente: Sergio Nicolaiewsky<br />\r\n1&ordm; vice-presidente: Renato de Oliveira<br />\r\n2&ordm; vice-presidente: Ant&ocirc;nio Claudio Nunez<br />\r\n1&ordf; secret&aacute;ria: Leda Carmen Wulff Gobetti<br />\r\n2&ordf; secret&aacute;ria: Marta J&uacute;lia Lopes<br />\r\n1&ordm; tesoureiro: Darci Barnech Campani<br />\r\n2&ordm; tesoureiro: Joacir Thadeu Nascimento Medeiros<br />\r\n1&ordm; suplente: Adroaldo Cezar Ara&uacute;jo Gaya<br />\r\n2&ordf; suplente: Rosemari Teresinha de Oliveira</p>\r\n\r\n<div style=\"color:#5a5a5a; font-size:1.4em; font-weight:bold; padding:10px 0 4px 0\">Gest&atilde;o ADUFRGS-Sindical 1985/1987</div>\r\n\r\n<p>Presidente: Claudio Scherer<br />\r\n1&ordf; vice-presidente: Merion Campos Bordas<br />\r\n2&ordm; vice-presidente: Israel Jacob Rabim Baumvol<br />\r\n1&ordm; secret&aacute;rio: Aron Taitelbaum<br />\r\n2&ordm; secret&aacute;rio: Paulo Coimbra Guedes<br />\r\n1&ordm; tesoureiro: Alejandro Borche Casalas<br />\r\n2&ordm; tesoureiro: Jorge Artur Visintainer<br />\r\n1&ordm; suplente: Nilton Bueno Fischer<br />\r\n2&ordf; suplente: Bazilicia Catharina de Souza</p>\r\n\r\n<div style=\"color:#5a5a5a; font-size:1.4em; font-weight:bold; padding:10px 0 4px 0\">Gest&atilde;o ADUFRGS-Sindical 1983/1985</div>\r\n\r\n<p>Presidente: Flavio Koff Coulon<br />\r\n1&ordm; vice-presidente: Claudio Scherer<br />\r\n2&ordm; vice-presidente: Dem&eacute;trio Ribeiro<br />\r\n1&ordm; secret&aacute;rio: C&eacute;sar Augusto Zen Vasconcellos<br />\r\n2&ordf; secret&aacute;ria: Silvia Guimar&atilde;es de Souza<br />\r\n1&ordm; tesoureiro: Fernando Lautert<br />\r\n2&ordm; tesoureiro: Carlos Ant&ocirc;nio de Rocchi<br />\r\n1&ordm; suplente: Luiz Calvete Corr&ecirc;a<br />\r\n2&ordm; suplente: Telmo Pires Mota</p>\r\n\r\n<div style=\"color:#5a5a5a; font-size:1.4em; font-weight:bold; padding:10px 0 4px 0\">Gest&atilde;o ADUFRGS-Sindical 1981/1983</div>\r\n\r\n<p>Presidente: Maria Assunta Campilongo<br />\r\n1&ordm; vice-presidente: Luiz Carlos Pinheiro Machado<br />\r\n2&ordm; vice-presidente: Aron Taitelbaum<br />\r\n1&ordf; secret&aacute;ria: Elisabeth Otero<br />\r\n2&ordf; secret&aacute;ria: Elina Bastos Caram&atilde;o<br />\r\n1&ordm; tesoureiro: Adriano Virg&iacute;lio Damiani Bica<br />\r\n2&ordm; tesoureiro: Aldo Bolten Lucion<br />\r\n1&ordm; suplente: Carlos Schmidt<br />\r\n2&ordm; suplente: Robert Ponge</p>\r\n\r\n<div style=\"color:#5a5a5a; font-size:1.4em; font-weight:bold; padding:10px 0 4px 0\">Gest&atilde;o ADUFRGS-Sindical 1979/1981</div>\r\n\r\n<p>Presidente: Rejane Machado Carrion<br />\r\n1&ordm; vice-presidente: Jos&eacute; Vicente Tavares dos Santos *<br />\r\n2&ordm; vice-presidente: Luiz Alberto Oliveira Ribeiro de Miranda<br />\r\n1&ordf; secret&aacute;ria: Isaura Belloni Schmidt<br />\r\n2&ordm; secret&aacute;rio: Elvan Silva<br />\r\n1&ordf; tesoureira: Lorena Holzmann da Silva<br />\r\n2&ordm; tesoureiro: Luiz Carlos Borghetti<br />\r\n1&ordf; suplente: L&iacute;gia Morrone Averbuck<br />\r\n2&ordm; suplente: Ant&ocirc;nio de P&aacute;dua Souza de Salles</p>\r\n\r\n<p><em>* Professor Jos&eacute; Vicente Tavares dos Santos assumiu interinamente o cargo de presidente na aus&ecirc;ncia da professora Rejane Carrion.</em></p>\r\n\r\n<div style=\"color:#5a5a5a; font-size:1.4em; font-weight:bold; padding:10px 0 4px 0\">Gest&atilde;o ADUFRGS-Sindical &ndash; Diretoria Provis&oacute;ria 17/06/1978</div>\r\n\r\n<p>Presidente: Jos&eacute; Fraga Fachel<br />\r\n1&ordm; vice-presidente: Manoel Andr&eacute; da Rocha<br />\r\n2&ordm; vice-presidente: Aron Taitelbaum<br />\r\n1&ordm; secret&aacute;rio: Carlos Schmidt<br />\r\n2&ordf; secret&aacute;ria: Lorena Holzmann da Silva<br />\r\n1&ordm; tesoureiro: L&iacute;vio Amaral<br />\r\n2&ordf; tesoureira: Maria Noemi Castilhos Britto<br />\r\n1&ordm; suplente: Luiz Fernando Carvalho da Rocha<br />\r\n2&ordm; suplente: Luiz Alberto Oliveira Ribeiro de Miranda</p>', 44, '2018-11-11 12:36:55', '2018-11-18 21:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `juridico`
--

DROP TABLE IF EXISTS `juridico`;
CREATE TABLE IF NOT EXISTS `juridico` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `text` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `juridico`
--

INSERT INTO `juridico` (`id`, `text`, `created_at`, `updated_at`) VALUES
(1, '<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"text-align:center\"><img alt=\"\" src=\"http://adufrgs/plugins-frameworks/elFinder-2.1.43/files/img-juridico.png\" style=\"height:60px; width:244px\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Com mais de 20 anos de experi&ecirc;ncia, os advogados do escrit&oacute;rio Bordas Advogados Associados oferecem um atendimento jur&iacute;dico especializado na defesa dos direitos dos servidores p&uacute;blicos federais, seja atrav&eacute;s de defesa no &acirc;mbito judicial ou administrativo e, sobretudo, oferecendo orienta&ccedil;&atilde;o e assessoramento ao trabalhador p&uacute;blico, seus sindicatos ou associa&ccedil;&otilde;es. Sua atua&ccedil;&atilde;o est&aacute; concentrada nas &aacute;reas de Direito Administrativo, Direito Previdenci&aacute;rio e Direito Civil.</p>\r\n\r\n<p>Nossa assessoria jur&iacute;dica tem como compromisso informar, apoiar, orientar o docente em suas decis&otilde;es e op&ccedil;&otilde;es durante a carreira funcional. Cabe frisar que o atendimento jur&iacute;dico &eacute; extens&iacute;vel aos pensionistas de docentes. Os integrantes do escrit&oacute;rio acreditam que a advocacia socialmente engajada com os trabalhadores &eacute; uma forma de inser&ccedil;&atilde;o do servidor p&uacute;blico e suas entidades sindicais e associativas nos grandes debates em torno das garantias de direitos humanos e sociais, sempre atrav&eacute;s da valoriza&ccedil;&atilde;o do trabalho, da democracia e da cidadania.</p>\r\n\r\n<p>A assessoria jur&iacute;dica disponibiliza plant&atilde;o de atendimento aos filiados da ADUFRGS para esclarecimento de d&uacute;vidas relacionadas aos processos em andamento. O plant&atilde;o de atendimento &eacute; realizado de segunda a quinta-feira, das 14h &agrave;s 16h, pessoalmente, pelo telefone (51) 3228-9997 ou pelo e-mail bordas@bordas.adv.br. Para assuntos relacionados &agrave; carreira funcional, de direito previdenci&aacute;rio e de natureza civil, recomenda-se o agendamento de entrevista presencial.</p>\r\n\r\n<p>O atendimento tamb&eacute;m poder&aacute; ser realizado na nova sede da ADUFRGS na Rua Bar&atilde;o do Amazonas, n&ordm; 1.581, com agendamento atrav&eacute;s do telefone (51) 3228-1188; ou no Campus do Vale atrav&eacute;s do telefone (51) 3308-7388.</p>', '2018-11-17 18:11:39', '2018-11-26 02:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2018_02_24_220828_create_files_table', 1),
(16, '2018_04_23_132111_create_files_galeria_table', 1),
(17, '2018_07_10_011118_create_newsletter_table', 1),
(18, '2018_10_25_232725_create_banner1_table', 1),
(19, '2018_10_27_012148_create_banner2_table', 2),
(25, '2018_10_28_020006_create_docente_autor_table', 3),
(26, '2018_10_28_020115_create_convenio_categoria_table', 3),
(49, '2018_10_28_111908_create_docente_materia_table', 4),
(50, '2018_10_28_113908_create_galeria_has_imagem_table', 4),
(55, '2018_11_01_182256_create_associe_se_table', 5),
(56, '2018_11_08_023623_create_convenios_categorias_table', 5),
(57, '2018_11_09_174410_create_convenios_table', 6),
(59, '2018_11_10_160721_create_paginas_table', 7),
(65, '2018_11_11_080439_create_instituicoes_table', 8),
(71, '2018_11_14_231112_create_informativos_table', 9),
(72, '2018_11_17_180341_create_juridico_table', 10),
(73, '2018_11_17_182612_create_carreiras_e_salarios_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categorias` text COLLATE utf8mb4_unicode_ci,
  `extra_integer` int(11) DEFAULT NULL,
  `extra_string` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_text` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paginas`
--

DROP TABLE IF EXISTS `paginas`;
CREATE TABLE IF NOT EXISTS `paginas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `section` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `string` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `integer` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paginas`
--

INSERT INTO `paginas` (`id`, `section`, `text`, `string`, `integer`, `created_at`, `updated_at`) VALUES
(1, 'Texto Topo', '<div style=\"color:#005086;font-size:1.4em;font-weight:bold;padding:10px 0 4px 0;\">\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://adufrgs/9e2a5a04-d247-41a9-a5b0-ac336709fde6\" width=\"350\" />\r\n<figcaption></figcaption>\r\n</figure>\r\nLista de conv&ecirc;nios ADUFRGS-Sindical\r\n\r\n<figure class=\"easyimage easyimage-side\"><img alt=\"\" src=\"blob:http://adufrgs/4e52780f-de0a-43e1-8a52-e93040d24196\" width=\"350\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n\r\n<p>Como associado da ADUFRGS voc&ecirc; tem direito a diversos servi&ccedil;os e conv&ecirc;nios que facilitam a sua vida, como consultoria jur&iacute;dica e cont&aacute;bil, plano de Sa&uacute;de, descontos em farm&aacute;cias, laborat&oacute;rios, escolas de l&iacute;ngua e infantis, livrarias, profissionais de sa&uacute;de e tantos outros. Confira a lista completa aqui.</p>', NULL, NULL, '2018-11-10 16:49:22', '2018-11-24 19:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `funcao` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `funcao`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Master', 'Adm-Master', 'master@adm.com', '$2y$10$SPGwzxGR56Y4lmAUCnXqtuTjDvf34W7UTmoJMU964jlg0uUiEDJyi', 'ZPziZMUCvZtYeer1xu9W1PhfuHOD24C9VSWinTES1g0sWKqfkcC8YrcYgDqA', '2018-10-26 01:22:52', NULL),
(2, 'adufrgs', 'Master', 'teste@teste.com', '$2y$10$SPGwzxGR56Y4lmAUCnXqtuTjDvf34W7UTmoJMU964jlg0uUiEDJyi', 'xUvdnJ733xIypGEDsgaC4p8DNAPrf0wag2pWkhu6qPZEE6HHSbBbc2auAvB3', '2018-10-26 01:22:53', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
