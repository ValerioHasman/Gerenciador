create database `BD_2021_Gerenciador`
default character set utf8
default collate utf8_general_ci;

use `BD_2021_Gerenciador`;

CREATE TABLE `Usuario` (
  `usu_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `usu_nome` varchar(255) NOT NULL,
  `usu_email` varchar(255) NOT NULL,
  `usu_senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Pessoas` (
  `pes_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `pes_nome` varchar(255) NOT NULL,
  `pes_cpf` varchar(11) NOT NULL,
  `usu_id` int NOT NULL,
  INDEX `fk_Usuario_Pessoas` (`usu_id`),
  CONSTRAINT `fk_Usuario_Pessoas` FOREIGN KEY (`usu_id`) REFERENCES `Usuario` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Doses` (
  `dos_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `dos_nome` varchar(255) NOT NULL,
  `usu_id` int NOT NULL,
  INDEX `fk_Usuario_Doses` (`usu_id`),
  CONSTRAINT `fk_Usuario_Doses` FOREIGN KEY (`usu_id`) REFERENCES `Usuario` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Endereco` (
  `end_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `end_estado` varchar(255) NOT NULL,
  `end_cidade` varchar(255) NOT NULL,
  `end_cep` varchar(9) NOT NULL,
  `end_numero` varchar(9) NOT NULL,
  `usu_id` int NOT NULL,
  INDEX `fk_Usuario_Endereco` (`usu_id`),
  CONSTRAINT `fk_Usuario_Endereco` FOREIGN KEY (`usu_id`) REFERENCES `Usuario` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `PessoasDoses` (
  `pes_id` int NOT NULL,
  `dos_id` int NOT NULL,
  `end_id` int NOT NULL,
  primary key (`pes_id`, `dos_id`),
  INDEX `fk_pes_PessoasDoses` (`pes_id`),
  INDEX `fk_dos_PessoasDoses` (`dos_id`),
  INDEX `fk_end_PessoasDoses` (`end_id`),
  CONSTRAINT `fk_pes_PessoasDoses` FOREIGN KEY (`pes_id`) REFERENCES `Pessoas` (`pes_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_dos_PessoasDoses` FOREIGN KEY (`dos_id`) REFERENCES `Doses` (`dos_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_end_PessoasDoses` FOREIGN KEY (`end_id`) REFERENCES `Endereco` (`end_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Empresa` (
  `emp_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `emp_nome` varchar(255) NOT NULl,
  `emp_cnpj` varchar(14) NOT NULL,
  `usu_id` int NOT NULL,
  INDEX `fk_Usuario_Empresa` (`usu_id`),
  CONSTRAINT `fk_Usuario_Empresa` FOREIGN KEY (`usu_id`) REFERENCES `Usuario` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Lotes` (
  `lot_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `lot_codigo` varchar(255) NOT NULl,
  `lot_numeros_de_caixas` int NOT NULL,
  `lot_numeros_de_unidades_por_caixa` int NOT NULL,
  `end_id` int NOT NULL,
  `emp_id` int NOT NULL,
  INDEX `fk_Endereco_Lotes` (`end_id`),
  INDEX `fk_Empresa_Lotes` (`emp_id`),
  CONSTRAINT `fk_Endereco_Lotes` FOREIGN KEY (`end_id`) REFERENCES `Endereco` (`end_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Empresa_Lotes` FOREIGN KEY (`emp_id`) REFERENCES `Empresa` (`emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
