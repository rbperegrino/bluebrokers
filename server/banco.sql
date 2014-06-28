-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.12-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              8.2.0.4675
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela bluebroker.tbl_anuncio
CREATE TABLE IF NOT EXISTS `tbl_anuncio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `ano` char(50) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `valor` varchar(255) DEFAULT NULL,
  `destaque` tinyint(1) DEFAULT '0',
  `atributo_1` varchar(255) DEFAULT NULL,
  `atributo_2` varchar(255) DEFAULT NULL,
  `atributo_3` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `subcategoria_id` int(11) NOT NULL DEFAULT '1',
  `criado` datetime DEFAULT NULL,
  `criado_por` int(11) DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_anuncio_subcategoria` (`subcategoria_id`),
  CONSTRAINT `fk_anuncio_subcategoria` FOREIGN KEY (`subcategoria_id`) REFERENCES `tbl_subcategoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bluebroker.tbl_anuncio: ~4 rows (aproximadamente)
DELETE FROM `tbl_anuncio`;
/*!40000 ALTER TABLE `tbl_anuncio` DISABLE KEYS */;
INSERT INTO `tbl_anuncio` (`id`, `titulo`, `descricao`, `ano`, `telefone`, `email`, `cidade`, `estado`, `valor`, `destaque`, `atributo_1`, `atributo_2`, `atributo_3`, `status`, `subcategoria_id`, `criado`, `criado_por`, `modificado`, `modificado_por`) VALUES
	(1, 'Barco ABC', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed vehicula dui. Aliquam feugiat sapien ut adipiscing consequat. Duis pharetra elementum tellus, in pulvinar elit tempor a. Curabitur a lectus lectus. Cras ac nunc in dolor lacinia interdum porta sed odio. Aenean tempus dictum libero, vitae tempus magna bibendum in. Sed cursus molestie ligula, nec mollis mi tristique sit amet. Nullam ac feugiat tellus. Ut sit amet vestibulum ligula. Aliquam bibendum mollis orci nec porta. Interdum et malesuada fames ac ante ipsum primis in faucibus.', '2014-06-28', '71 3245-3199', 'rbperegrino@globo.com', 'Salvador', 'BA', '000000,00', 1, NULL, NULL, NULL, 1, 1, '2014-06-28 08:39:14', NULL, NULL, NULL),
	(2, 'Barco DEF', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed vehicula dui. Aliquam feugiat sapien ut adipiscing consequat. Duis pharetra elementum tellus, in pulvinar elit tempor a. Curabitur a lectus lectus. Cras ac nunc in dolor lacinia interdum porta sed odio. Aenean tempus dictum libero, vitae tempus magna bibendum in. Sed cursus molestie ligula, nec mollis mi tristique sit amet. Nullam ac feugiat tellus. Ut sit amet vestibulum ligula. Aliquam bibendum mollis orci nec porta. Interdum et malesuada fames ac ante ipsum primis in faucibus.', '2014-06-28', '71 3245-3199', 'rbperegrino@globo.com', 'Salvador', 'BA', '000000,00', 0, NULL, NULL, NULL, 1, 1, '2014-06-28 08:39:19', NULL, NULL, NULL),
	(3, 'Barco GHI', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed vehicula dui. Aliquam feugiat sapien ut adipiscing consequat. Duis pharetra elementum tellus, in pulvinar elit tempor a. Curabitur a lectus lectus. Cras ac nunc in dolor lacinia interdum porta sed odio. Aenean tempus dictum libero, vitae tempus magna bibendum in. Sed cursus molestie ligula, nec mollis mi tristique sit amet. Nullam ac feugiat tellus. Ut sit amet vestibulum ligula. Aliquam bibendum mollis orci nec porta. Interdum et malesuada fames ac ante ipsum primis in faucibus.', '2014-06-28', '71 3245-3199', 'rbperegrino@globo.com', 'Salvador', 'BA', '000000,00', 0, NULL, NULL, NULL, 1, 1, '2014-06-28 08:39:34', NULL, NULL, NULL),
	(4, 'Barco XYZ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed vehicula dui. Aliquam feugiat sapien ut adipiscing consequat. Duis pharetra elementum tellus, in pulvinar elit tempor a. Curabitur a lectus lectus. Cras ac nunc in dolor lacinia interdum porta sed odio. Aenean tempus dictum libero, vitae tempus magna bibendum in. Sed cursus molestie ligula, nec mollis mi tristique sit amet. Nullam ac feugiat tellus. Ut sit amet vestibulum ligula. Aliquam bibendum mollis orci nec porta. Interdum et malesuada fames ac ante ipsum primis in faucibus.', '2014-06-28', '71 3245-3199', 'rbperegrino@globo.com', 'Salvador', 'BA', '000000,00', 1, NULL, NULL, NULL, 1, 1, '2014-06-28 08:39:24', NULL, NULL, NULL);
/*!40000 ALTER TABLE `tbl_anuncio` ENABLE KEYS */;


-- Copiando estrutura para tabela bluebroker.tbl_categoria
CREATE TABLE IF NOT EXISTS `tbl_categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `criado` datetime DEFAULT NULL,
  `criado_por` int(11) DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bluebroker.tbl_categoria: ~7 rows (aproximadamente)
DELETE FROM `tbl_categoria`;
/*!40000 ALTER TABLE `tbl_categoria` DISABLE KEYS */;
INSERT INTO `tbl_categoria` (`id`, `nome`, `imagem`, `status`, `criado`, `criado_por`, `modificado`, `modificado_por`) VALUES
	(1, 'Barcos\r\n', 'barco.png', 1, NULL, NULL, NULL, NULL),
	(2, 'Jetski', 'barco.png', 1, NULL, NULL, NULL, NULL),
	(3, 'Motos Vip', 'barco.png', 1, NULL, NULL, NULL, NULL),
	(4, 'Veleiros', 'barco.png', 1, NULL, NULL, NULL, NULL),
	(5, 'Imóveis', 'barco.png', 1, NULL, NULL, NULL, NULL),
	(6, 'Aeronaves', 'barco.png', 1, NULL, NULL, NULL, NULL),
	(7, 'Ultra Steamer', 'barco.png', 1, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `tbl_categoria` ENABLE KEYS */;


-- Copiando estrutura para tabela bluebroker.tbl_migration
CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bluebroker.tbl_migration: ~5 rows (aproximadamente)
DELETE FROM `tbl_migration`;
/*!40000 ALTER TABLE `tbl_migration` DISABLE KEYS */;
INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1403520418),
	('m140623_103542_tbl_categoria', 1403520420),
	('m140623_103557_tbl_subcategoria', 1403520420),
	('m140623_103616_tbl_anuncio', 1403520420),
	('m140623_103625_tbl_parametros', 1403520421);
/*!40000 ALTER TABLE `tbl_migration` ENABLE KEYS */;


-- Copiando estrutura para tabela bluebroker.tbl_subcategoria
CREATE TABLE IF NOT EXISTS `tbl_subcategoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `criado` datetime DEFAULT NULL,
  `criado_por` int(11) DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categoria_subcategoria` (`categoria_id`),
  CONSTRAINT `fk_categoria_subcategoria` FOREIGN KEY (`categoria_id`) REFERENCES `tbl_categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bluebroker.tbl_subcategoria: ~3 rows (aproximadamente)
DELETE FROM `tbl_subcategoria`;
/*!40000 ALTER TABLE `tbl_subcategoria` DISABLE KEYS */;
INSERT INTO `tbl_subcategoria` (`id`, `nome`, `categoria_id`, `status`, `criado`, `criado_por`, `modificado`, `modificado_por`) VALUES
	(1, 'Marca A', 1, 1, NULL, NULL, NULL, NULL),
	(2, 'Marca B', 1, 1, NULL, NULL, NULL, NULL),
	(3, 'Marca C', 1, 1, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `tbl_subcategoria` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
