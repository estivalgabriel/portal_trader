-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: mysql13-farm70.uni5.net
-- Tempo de geração: 14/06/2020 às 06:11
-- Versão do servidor: 5.6.36-log
-- Versão do PHP: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `gabrielestival02`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin.faturas`
--

CREATE TABLE IF NOT EXISTS `tb_admin.faturas` (
  `id` int(11) NOT NULL,
  `trader` varchar(255) NOT NULL,
  `fatura` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `vencimento` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tb_admin.faturas`
--

INSERT INTO `tb_admin.faturas` (`id`, `trader`, `fatura`, `data`, `vencimento`, `valor`, `status`) VALUES
(1, 'Joao', '5ebddc64369e5.pdf', '24/08/2020', '29/08/2020', '100,00', 'Pago'),
(4, 'Teste 2', '5ebe1339d7465.pdf', '24/03/2020', '28/03/2020', '500,00', 'Enviado'),
(5, 'Gabriel', '5ebe197d30417.pdf', '24/03/2020', '28/03/2020', '200,00', 'Enviado'),
(6, 'Eduardo Cezar de Oliveira', '5ed6bf91247e1.pdf', '02/06/2020', '07/06/2020', '3500', 'Enviado'),
(7, 'Eduardo Cezar de Oliveira', '5ed6c0c348a8c.pdf', '01/06/2020', '07/06/2020', '2410', 'Pago'),
(8, 'Eduardo Cezar de Oliveira', '5ed6c0ded2596.pdf', '30/05/2020', '07/06/2020', '1745', 'Cancelado'),
(9, 'Eduardo Cezar de Oliveira', '5ed6c0f8c5bd7.pdf', '29/05/2020', '07/06/2020', '-533', 'Enviado'),
(10, 'Eduardo Cezar de Oliveira', '5ed6c109d5227.pdf', '28/05/2020', '07/06/2020', '-1500', 'Enviado'),
(11, 'Eduardo Cezar de Oliveira', '5edebe9299f9e.pdf', '08/06/2020', '15/06/2020', '96', 'Enviado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin.relatorios`
--

CREATE TABLE IF NOT EXISTS `tb_admin.relatorios` (
  `id` int(11) NOT NULL,
  `nome_usuario` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `ativo` varchar(60) NOT NULL,
  `gain` varchar(255) NOT NULL,
  `los` varchar(255) NOT NULL,
  `corretagem` varchar(255) NOT NULL,
  `registro` varchar(255) NOT NULL,
  `ir` varchar(255) NOT NULL,
  `iss` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tb_admin.relatorios`
--

INSERT INTO `tb_admin.relatorios` (`id`, `nome_usuario`, `data`, `ativo`, `gain`, `los`, `corretagem`, `registro`, `ir`, `iss`, `valor`, `status`) VALUES
(2, 'Gabriel', '24/08/2020', 'Win', '20,00', '30,00', '50,00', '20,80', '40,00', '80,00', '150,00', 'Liberado'),
(8, 'Gabriel', '24/03/2020', 'Wdo', '20,00', '30,00', '50,00', '20,80', '40,00', '50,00', '500,00', 'Liberado'),
(10, 'Joao', '24/08/2020', 'Win', '20,00', '80,00', '46,00', '25,00', '72,00', '36,00', '200,00', 'Liberado'),
(16, 'Eduardo Cezar de Oliveira', '08/06/2020', 'Win', '100', '0', '1', '1', '1', '1', '96', 'Liberado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin.usuarios`
--

CREATE TABLE IF NOT EXISTS `tb_admin.usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tb_admin.usuarios`
--

INSERT INTO `tb_admin.usuarios` (`id`, `user`, `password`, `nome`, `cargo`, `tipo`) VALUES
(1, 'contato@tiberius.com.br', '21232f297a57a5a743894a0e4a801fc3', 'Tiberius', 2, 'Sênior'),
(3, 'teste2@teste.com.br', 'tib123qwe@  ', 'Gabriel', 1, 'Junior'),
(6, 'teste@teste.com', '202cb962ac59075b964b07152d234b70', 'Joao', 1, 'Pleno'),
(16, 'eduardo.oliveira@tiberius.com.br', '25f9e794323b453885f5181f1b624d0b', 'Eduardo Cezar de Oliveira', 1, 'Sênior'),
(17, 'teste3@teste.com', '21232f297a57a5a743894a0e4a801fc3', 'Teste 3', 2, 'Sênior'),
(18, 'eu@gmail.com', '057a00ebe4c35f8e72be9349834dc619', 'Daniel', 1, 'Pleno');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tb_admin.faturas`
--
ALTER TABLE `tb_admin.faturas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_admin.relatorios`
--
ALTER TABLE `tb_admin.relatorios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tb_admin.faturas`
--
ALTER TABLE `tb_admin.faturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de tabela `tb_admin.relatorios`
--
ALTER TABLE `tb_admin.relatorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
