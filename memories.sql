-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 03/04/2024 às 18:05
-- Versão do servidor: 11.2.2-MariaDB
-- Versão do PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: memories
--
CREATE DATABASE IF NOT EXISTS memories DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE memories;

-- --------------------------------------------------------

--
-- Estrutura para tabela cadavel
--

DROP TABLE IF EXISTS cadavel;
CREATE TABLE IF NOT EXISTS cadavel (
  id int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(30) DEFAULT NULL,
  morada varchar(30) DEFAULT NULL,
  tell varchar(15) DEFAULT NULL,
  cemiterio int(11) NOT NULL,
  hora time DEFAULT NULL,
  sexo varchar(10) DEFAULT NULL,
  data_ent date DEFAULT NULL,
  bi varchar(30) DEFAULT NULL,
  dh varchar(25) DEFAULT NULL,
  PRIMARY KEY (id),
  KEY cemiterio (cemiterio)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
    delete from cadavel where id = 1;
select * from cadavel;

-- --------------------------------------------------------

--
-- Estrutura para tabela campa
--
select count(*) as total from cadavel;
DROP TABLE IF EXISTS campa;
CREATE TABLE IF NOT EXISTS campa (
  id_campa int(11) NOT NULL AUTO_INCREMENT,
  num_campa int(11) NOT NULL,
  PRIMARY KEY (id_campa)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela campa
--
select * from campa;
INSERT INTO campa (id_campa, num_campa) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);


-- --------------------------------------------------------

--
-- Estrutura para tabela campa_cem
--

DROP TABLE IF EXISTS campa_cem;
CREATE TABLE IF NOT EXISTS campa_cem (
  id_ca_cem int(11) NOT NULL AUTO_INCREMENT,
  cem int(11) NOT NULL,
  campa int(11) DEFAULT NULL,
  PRIMARY KEY (id_ca_cem),
  KEY cem (cem),
  KEY campa (campa)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
select * from campa_c;
--
-- Despejando dados para a tabela campa_cem
--
select * from campa_cem;
INSERT INTO campa_cem (id_ca_cem, cem, campa) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 2, 1),
(7, 2, 2),
(8, 2, 3),
(9, 2, 4),
(10, 2, 5),
(11, 3, 1),
(12, 3, 2),
(13, 3, 3),
(14, 3, 4),
(15, 3, 5),
(16, 4, 1),
(17, 4, 2),
(18, 4, 3),
(19, 4, 4),
(20, 4, 5),
(21, 5, 1),
(22, 5, 2),
(23, 5, 3),
(24, 5, 4),
(25, 5, 5),
(26, 6, 1),
(27, 6, 2),
(28, 6, 3),
(29, 6, 4),
(30, 6, 5),
(31, 7, 1),
(32, 7, 2),
(33, 7, 3),
(34, 7, 4),
(35, 7, 5),
(36, 8, 1),
(37, 8, 2),
(38, 8, 3),
(39, 8, 4),
(40, 8, 5),
(41, 9, 1),
(42, 9, 2),
(43, 9, 3),
(44, 9, 4),
(45, 9, 5),
(46, 10, 1),
(47, 10, 2),
(48, 10, 3),
(49, 10, 4),
(50, 10, 5),
(51, 11, 1),
(52, 11, 2),
(53, 11, 3),
(54, 11, 4),
(55, 11, 5),
(56, 12, 1),
(57, 12, 2),
(58, 12, 3),
(59, 12, 4),
(60, 12, 5),
(61, 13, 1),
(62, 13, 2),
(63, 13, 3),
(64, 13, 4),
(65, 13, 5),
(66, 14, 1),
(67, 14, 2),
(68, 14, 3),
(69, 14, 4),
(70, 14, 5),
(71, 15, 1),
(72, 15, 2),
(73, 15, 3),
(74, 15, 4),
(75, 15, 5);
select * from cadavel;
-- --------------------------------------------------------

--
-- Estrutura para tabela cem
--

DROP TABLE IF EXISTS cem;
CREATE TABLE IF NOT EXISTS cem (
  id_cem int(11) NOT NULL AUTO_INCREMENT,
  nome_cem varchar(50) NOT NULL,
  localizacao varchar(50) NOT NULL,
  PRIMARY KEY (id_cem)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela cem
--

INSERT INTO cem (id_cem, nome_cem, localizacao) VALUES
(1, 'Catorze', 'Cazenga'),
(2, 'Viana', 'Viana'),
(3, 'Santana', 'Kilamba Kiaxi');

-- --------------------------------------------------------

--
-- Estrutura para tabela quarteirao
--

DROP TABLE IF EXISTS quarteirao;
CREATE TABLE IF NOT EXISTS quarteirao (
  id_qua int(11) NOT NULL AUTO_INCREMENT,
  num_qua int(11) NOT NULL,
  PRIMARY KEY (id_qua)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela quarteirao
--

INSERT INTO quarteirao (id_qua, num_qua) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);
describe cadavel;
select * from quarteirao;

SELECT nome, morada, tell, cemiterio, sexo, data_ent, bi, hora, dh from cadavel join campa_cem on cadavel.cemiterio like campa_cem.id_ca_cem 
    join quarteirao_cem on campa_cem.cem = quarteirao_cem.id_qt_cem join cem on quarteirao_cem.cemiterio = cem.id_cem
    WHERE id = id;

DROP TABLE IF EXISTS adm;
CREATE TABLE IF NOT EXISTS adm (
  id int (2) primary key NOT NULL AUTO_INCREMENT,
  nome varchar(50) NOT NULL,
   email varchar(50) NOT NULL,
    endereco varchar(50) NOT NULL,
        numero varchar(50) NOT NULL,
          sa varchar(50) NOT NULL,
          ft LONGBLOB,
 senha varchar(50) NOT NULL
 

  
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------
alter table adm;
select * from adm;
--
-- Estrutura para tabela quarteirao_cem
--

DROP TABLE IF EXISTS quarteirao_cem;
CREATE TABLE IF NOT EXISTS quarteirao_cem (
  id_qt_cem int(11) NOT NULL AUTO_INCREMENT,
  cemiterio int(11) NOT NULL,
  quarteirao int(11) NOT NULL,
  PRIMARY KEY (id_qt_cem),
  KEY cemiterio (cemiterio),
  KEY quarteirao (quarteirao)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
select * from qu;
--
-- Despejando dados para a tabela quarteirao_cem
--
select * from quarteirao_cem;
INSERT INTO quarteirao_cem (id_qt_cem, cemiterio, quarteirao) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 2, 1),
(7, 2, 2),
(8, 2, 3),
(9, 2, 4),
(10, 2, 5),
(11, 3, 1),
(12, 3, 2),
(13, 3, 3),
(14, 3, 4),
(15, 3, 5);
COMMIT;
drop table quarteirao_cem;
delete from quarteirao_cem where id_qt_cem = 1 and 2 and 3 and 4 and 5;
select * from quarteirao_cem;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

select * from cadavel;
describe adm;

SELECT * FROM adm  ;
SELECT * FROM adm ;



SELECT nome_cem,quarteirao,campa from cadavel join campa_cem on cadavel.cemiterio like campa_cem.id_ca_cem 
join quarteirao_cem on campa_cem.cem = quarteirao_cem.id_qt_cem 
join cem on quarteirao_cem.cemiterio = cem.id_cem where id_cem = 1;
    