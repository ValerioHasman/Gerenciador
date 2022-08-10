create database IF NOT EXISTS `BD_2021_Gerenciador`
default character set utf8
default collate utf8_general_ci;

use `BD_2021_Gerenciador`;

CREATE TABLE IF NOT EXISTS `Usuario` (
  `usu_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `usu_nome` varchar(255) NOT NULL,
  `usu_email` varchar(255) NOT NULL,
  `usu_senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Pessoas` (
  `pes_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `pes_nome` varchar(255) NOT NULL,
  `pes_cpf` varchar(11) NOT NULL,
  `usu_id` int NOT NULL,
  INDEX `fk_Usuario_Pessoas` (`usu_id`),
  CONSTRAINT `fk_Usuario_Pessoas` FOREIGN KEY (`usu_id`) REFERENCES `Usuario` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Doses` (
  `dos_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `dos_nome` varchar(255) NOT NULL,
  `usu_id` int NOT NULL,
  INDEX `fk_Usuario_Doses` (`usu_id`),
  CONSTRAINT `fk_Usuario_Doses` FOREIGN KEY (`usu_id`) REFERENCES `Usuario` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Endereco` (
  `end_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `end_estado` varchar(255) NOT NULL,
  `end_cidade` varchar(255) NOT NULL,
  `end_cep` varchar(9) NOT NULL,
  `end_numero` varchar(9) NOT NULL,
  `usu_id` int NOT NULL,
  INDEX `fk_Usuario_Endereco` (`usu_id`),
  CONSTRAINT `fk_Usuario_Endereco` FOREIGN KEY (`usu_id`) REFERENCES `Usuario` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `PessoasDoses` (
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

CREATE TABLE IF NOT EXISTS `Empresa` (
  `emp_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `emp_nome` varchar(255) NOT NULl,
  `emp_cnpj` varchar(14) NOT NULL,
  `usu_id` int NOT NULL,
  INDEX `fk_Usuario_Empresa` (`usu_id`),
  CONSTRAINT `fk_Usuario_Empresa` FOREIGN KEY (`usu_id`) REFERENCES `Usuario` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Lotes` (
  `lot_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `lot_codigo` varchar(255) NOT NULl,
  `lot_numeros_de_caixas` int NOT NULL,
  `lot_numeros_de_unidades_por_caixa` int NOT NULL,
  `end_id` int NOT NULL,
  `emp_id` int NOT NULL,
  `dos_id` int NOT NULL,
  INDEX `fk_Endereco_Lotes` (`end_id`),
  INDEX `fk_Empresa_Lotes` (`emp_id`),
  INDEX `fk_Doses_Lotes` (`dos_id`),
  CONSTRAINT `fk_Endereco_Lotes` FOREIGN KEY (`end_id`) REFERENCES `Endereco` (`end_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Empresa_Lotes` FOREIGN KEY (`emp_id`) REFERENCES `Empresa` (`emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Doses_Lotes` FOREIGN KEY (`dos_id`) REFERENCES `Doses` (`dos_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `pessoas` (`pes_id`, `pes_nome`, `pes_cpf`, `usu_id`) VALUES 
(NULL, 'Miguel', '76862048072', '1'),
(NULL, 'Arthur', '75149421666', '1'),
(NULL, 'Théo', '60442919225', '1'),
(NULL, 'Heitor', '49657036065', '1'),
(NULL, 'Gael', '55329040031', '1'),
(NULL, 'Davi', '31774342549', '1'),
(NULL, 'Bernardo', '53548024735', '1'),
(NULL, 'Gabriel', '90789583082', '1'),
(NULL, 'Ravi', '30030343646', '1'),
(NULL, 'Noah', '56228024653', '1'),
(NULL, 'Samuel', '53741557932', '1'),
(NULL, 'Pedro', '87932322441', '1'),
(NULL, 'Benício', '50728494444', '1'),
(NULL, 'Benjamin', '66222041860', '1'),
(NULL, 'Matheus', '50691030030', '1'),
(NULL, 'Isaac', '19633497028', '1'),
(NULL, 'Anthony', '26499479573', '1'),
(NULL, 'Joaquim', '60918415372', '1'),
(NULL, 'Lucas', '58433049952', '1'),
(NULL, 'Lorenzo', '52176524675', '1'),
(NULL, 'Rafael', '12596441124', '1'),
(NULL, 'Nicolas', '32015027209', '1'),
(NULL, 'Henrique', '44931042006', '1'),
(NULL, 'Murilo', '71586662042', '1'),
(NULL, 'João Miguel', '76983189254', '1'),
(NULL, 'Lucca', '85784689190', '1'),
(NULL, 'Guilherme', '88032635681', '1'),
(NULL, 'Henry', '43867329872', '1'),
(NULL, 'Bryan', '12973532551', '1'),
(NULL, 'Gustavo', '85599421911', '1'),
(NULL, 'Felipe', '30121401649', '1'),
(NULL, 'Pietro', '79643149970', '1'),
(NULL, 'Levi', '22873145341', '1'),
(NULL, 'Daniel', '44102576173', '1'),
(NULL, 'João Pedro', '83109227494', '1'),
(NULL, 'Bento', '18877688497', '1'),
(NULL, 'Vicente', '44523072999', '1'),
(NULL, 'Leonardo', '32500757431', '1'),
(NULL, 'Caleb', '26319981044', '1'),
(NULL, 'Pedro Henrique', '15558713542', '1'),
(NULL, 'Matteo', '93553034211', '1'),
(NULL, 'Enzo Gabriel', '90753239935', '1'),
(NULL, 'João', '51136860660', '1'),
(NULL, 'Antônio', '91630058164', '1'),
(NULL, 'Emanuel', '23116380899', '1'),
(NULL, 'Enzo', '56377671233', '1'),
(NULL, 'Davi Lucca', '38248064442', '1'),
(NULL, 'Caio', '68298998204', '1'),
(NULL, 'Eduardo', '39605155959', '1'),
(NULL, 'João Lucas', '97880855388', '1'),
(NULL, 'Thomas', '56027404748', '1'),
(NULL, 'Cauã', '27153321331', '1'),
(NULL, 'Vitor', '39028767329', '1'),
(NULL, 'José', '22964317831', '1'),
(NULL, 'Enrico', '71221464238', '1'),
(NULL, 'Augusto', '37310626203', '1'),
(NULL, 'João Gabriel', '21365315884', '1'),
(NULL, 'Francisco', '65560629286', '1'),
(NULL, 'Otávio', '89714488453', '1'),
(NULL, 'Yuri', '29022234142', '1'),
(NULL, 'Valentim', '54827312142', '1'),
(NULL, 'Vinícius', '21260499075', '1'),
(NULL, 'Davi Lucas', '99123936678', '1'),
(NULL, 'Rael', '97053688875', '1'),
(NULL, 'Mathias', '64505669332', '1'),
(NULL, 'Theodoro', '46047889978', '1'),
(NULL, 'Yan', '13144779369', '1'),
(NULL, 'João Guilherme', '74187912331', '1'),
(NULL, 'Nathan', '36820557719', '1'),
(NULL, 'Arthur Miguel', '27372539611', '1'),
(NULL, 'Oliver', '54366873421', '1'),
(NULL, 'Anthony Gabriel', '52395425067', '1'),
(NULL, 'Ryan', '18650107864', '1'),
(NULL, 'Luiz Miguel', '95374017935', '1'),
(NULL, 'Erick', '86353918962', '1'),
(NULL, 'João Vitor', '14319464242', '1'),
(NULL, 'Luan', '63980181336', '1'),
(NULL, 'Thiago', '52056282936', '1'),
(NULL, 'Apollo', '15477446085', '1'),
(NULL, 'Ícaro', '67215551016', '1'),
(NULL, 'Breno', '33176876344', '1'),
(NULL, 'Arthur Gabriel', '72537666081', '1'),
(NULL, 'Derick', '21651628104', '1'),
(NULL, 'Kauê', '42601185834', '1'),
(NULL, 'Martin', '15739997325', '1'),
(NULL, 'Luiz Felipe', '74962911508', '1'),
(NULL, 'Raul', '29494734878', '1'),
(NULL, 'Liam', '15661131984', '1'),
(NULL, 'Davi Miguel', '91261765474', '1'),
(NULL, 'Pedro Lucas', '25359821626', '1'),
(NULL, 'José Miguel', '46894196901', '1'),
(NULL, 'Josué', '91222386681', '1'),
(NULL, 'Pedro Miguel', '42980712379', '1'),
(NULL, 'Micael', '40870373317', '1'),
(NULL, 'Yago', '35043239219', '1'),
(NULL, 'Dominic', '71104497678', '1'),
(NULL, 'Vitor Hugo', '70794242253', '1'),
(NULL, 'Luiz Henrique', '26025572875', '1'),
(NULL, 'Estevão', '94836661672', '1'),
(NULL, 'Davi Luiz', '29212818747', '1')
;