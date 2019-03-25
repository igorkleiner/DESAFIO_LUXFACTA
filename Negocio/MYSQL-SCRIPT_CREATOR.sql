SET FOREIGN_KEY_CHECKS = 0;
SET SQL_SAFE_UPDATES   = 0;


CREATE SCHEMA desafio_luxfacta DEFAULT CHARACTER SET utf8 ;

USE desafio_luxfacta;

CREATE TABLE perfil (
  per_id int(11) NOT NULL AUTO_INCREMENT,
  per_nome varchar(45) NOT NULL,
  PRIMARY KEY (per_id)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO perfil (per_nome) VALUES ('Guest');
INSERT INTO perfil (per_nome) VALUES ('Cliente');
INSERT INTO perfil (per_nome) VALUES ('Funcionario');
INSERT INTO perfil (per_nome) VALUES ('Gerente');
INSERT INTO perfil (per_nome) VALUES ('Dono');


CREATE TABLE usuario (
  usu_id int(11) NOT NULL AUTO_INCREMENT,
  usu_nome varchar(45) NOT NULL,
  per_id int(11) DEFAULT NULL,
  usu_login varchar(10) DEFAULT NULL,
  usu_password varchar(8) DEFAULT NULL,
  PRIMARY KEY (usu_id),
  KEY per_id_idx (per_id),
  CONSTRAINT per_id FOREIGN KEY (per_id) REFERENCES perfil (per_id) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO usuario (usu_nome,per_id,usu_login,usu_password) VALUES ('Guest',1,'guest','guest');
INSERT INTO usuario (usu_nome,per_id,usu_login,usu_password) VALUES ('Igor',5,'igor','1234');
INSERT INTO usuario (usu_nome,per_id,usu_login,usu_password) VALUES ('Gritzko',4,'leco','4321');
INSERT INTO usuario (usu_nome,per_id,usu_login,usu_password) VALUES ('Fulano',3,'aaaa','1111');
INSERT INTO usuario (usu_nome,per_id,usu_login,usu_password) VALUES ('Ciclano',2,'bbbb','2222');


CREATE TABLE produto (
  prod_id int(11) NOT NULL AUTO_INCREMENT,
  prod_nome varchar(45) NOT NULL,
  prod_preco float DEFAULT NULL,
  prod_qtd float DEFAULT NULL,
  PRIMARY KEY (prod_id)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;


CREATE TABLE timer (
  timer_id  int(11) unsigned NOT NULL AUTO_INCREMENT,
  usu_id    int(11) NOT NULL , 
  data      date NOT NULL ,
  entrada_1 Datetime null,
  saida_1   Datetime null,
  entrada_2 Datetime null,
  saida_2   Datetime null,
  entrada_3 Datetime null,
  saida_3   Datetime null,
  entrada_4 Datetime null,
  saida_4   Datetime null,
  entrada_5 Datetime null,
  saida_5   Datetime null,
  PRIMARY KEY (timer_id),
  KEY usu_id_idx (usu_id),
  CONSTRAINT usu_id FOREIGN KEY (usu_id) REFERENCES uauario (usu_id) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;
/*
-- Query: SELECT * FROM desafio_luxfacta.timer
-- Date: 2017-12-22 08:44
*/

