-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 15-Ago-2020 às 19:56
-- Versão do servidor: 5.7.23
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastrar_itens_laboratoriais`
--

DROP TABLE IF EXISTS `cadastrar_itens_laboratoriais`;
CREATE TABLE IF NOT EXISTS `cadastrar_itens_laboratoriais` (
  `lote_laboratorio` varchar(45) NOT NULL,
  `nome_iteml` varchar(100) DEFAULT NULL,
  `data_entradal` date DEFAULT NULL,
  `qtd_lotel` int(11) DEFAULT NULL,
  `data_validadel` date DEFAULT NULL,
  `forma` varchar(45) DEFAULT NULL,
  `total_retirada_lab` int(11) NOT NULL,
  `login_idlogin` int(11) NOT NULL,
  PRIMARY KEY (`lote_laboratorio`,`login_idlogin`),
  KEY `fk_cadastrar_itens_laboratoriais_login1_idx` (`login_idlogin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cadastrar_itens_laboratoriais`
--

INSERT INTO `cadastrar_itens_laboratoriais` (`lote_laboratorio`, `nome_iteml`, `data_entradal`, `qtd_lotel`, `data_validadel`, `forma`, `total_retirada_lab`, `login_idlogin`) VALUES
('dfb343', 'becker', '2020-08-04', 6, '2020-09-02', 'Unidade', 0, 1),
('qfdf42', 'Proveta', '2020-07-26', 3, '2020-09-03', 'Unidade', 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastrar_medicamento`
--

DROP TABLE IF EXISTS `cadastrar_medicamento`;
CREATE TABLE IF NOT EXISTS `cadastrar_medicamento` (
  `lote_medicamento` varchar(45) NOT NULL,
  `nome_item` varchar(100) DEFAULT NULL,
  `data_entrada` date DEFAULT NULL,
  `qtd_lote` int(11) DEFAULT NULL,
  `data_validade` date DEFAULT NULL,
  `forma_farmaceutica` varchar(45) DEFAULT NULL,
  `concentracao` varchar(45) DEFAULT NULL,
  `total_retirada` int(11) NOT NULL,
  `login_idlogin` int(11) NOT NULL,
  PRIMARY KEY (`lote_medicamento`,`login_idlogin`),
  KEY `fk_cadastrar_medicamento_login_idx` (`login_idlogin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cadastrar_medicamento`
--

INSERT INTO `cadastrar_medicamento` (`lote_medicamento`, `nome_item`, `data_entrada`, `qtd_lote`, `data_validade`, `forma_farmaceutica`, `concentracao`, `total_retirada`, `login_idlogin`) VALUES
('12345', 'dipirona', '2020-07-29', 5, '2020-08-27', 'Unidade', '200mg', 8, 1),
('fgnbr43', 'anador', '2020-07-26', 6, '2020-08-26', 'Comprimido', '50mg', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastrar_produto_saude`
--

DROP TABLE IF EXISTS `cadastrar_produto_saude`;
CREATE TABLE IF NOT EXISTS `cadastrar_produto_saude` (
  `lote_saude` varchar(45) NOT NULL,
  `nome_items` varchar(100) DEFAULT NULL,
  `data_entradas` date DEFAULT NULL,
  `qtd_lotes` int(11) DEFAULT NULL,
  `data_validades` date DEFAULT NULL,
  `modalidade` varchar(45) DEFAULT NULL,
  `total_retirada_saude` int(11) NOT NULL,
  `login_idlogin` int(11) NOT NULL,
  PRIMARY KEY (`lote_saude`,`login_idlogin`),
  KEY `fk_cadastrar_produto_saude_login1_idx` (`login_idlogin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cadastrar_produto_saude`
--

INSERT INTO `cadastrar_produto_saude` (`lote_saude`, `nome_items`, `data_entradas`, `qtd_lotes`, `data_validades`, `modalidade`, `total_retirada_saude`, `login_idlogin`) VALUES
('32f3', 'Luvas Descartaveis', '2020-07-26', 6, '2020-09-02', 'Pacote', 0, 1),
('av32', 'Alcool em gel', '2020-07-26', 2, '2020-09-02', 'Pacote', 3, 1),
('dfv423', 'Preservativo', '2020-07-26', 8, '2020-09-03', 'Pacote', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `idlogin` int(11) NOT NULL AUTO_INCREMENT,
  `senha` varchar(45) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idlogin`),
  UNIQUE KEY `idlogin_UNIQUE` (`idlogin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`idlogin`, `senha`, `usuario`) VALUES
(1, '12345', 'admin');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cadastrar_itens_laboratoriais`
--
ALTER TABLE `cadastrar_itens_laboratoriais`
  ADD CONSTRAINT `fk_cadastrar_itens_laboratoriais_login1` FOREIGN KEY (`login_idlogin`) REFERENCES `login` (`idlogin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cadastrar_medicamento`
--
ALTER TABLE `cadastrar_medicamento`
  ADD CONSTRAINT `fk_cadastrar_medicamento_login` FOREIGN KEY (`login_idlogin`) REFERENCES `login` (`idlogin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cadastrar_produto_saude`
--
ALTER TABLE `cadastrar_produto_saude`
  ADD CONSTRAINT `fk_cadastrar_produto_saude_login1` FOREIGN KEY (`login_idlogin`) REFERENCES `login` (`idlogin`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
