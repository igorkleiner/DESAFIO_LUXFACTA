SET FOREIGN_KEY_CHECKS=0;
SET SQL_SAFE_UPDATES = 0;


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

UPDATE perfil set per_id = 0 where per_nome = 'Guest';
UPDATE perfil set per_id = 1 where per_nome = 'Cliente';
UPDATE perfil set per_id = 2 where per_nome = 'Funcionario';
UPDATE perfil set per_id = 3 where per_nome = 'Gerente';
UPDATE perfil set per_id = 4 where per_nome = 'Dono';

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

INSERT INTO usuario (usu_nome,per_id,usu_login,usu_password) VALUES ('Igor',4,'igor','1234');
INSERT INTO usuario (usu_nome,per_id,usu_login,usu_password) VALUES ('Gritzko',3,'leco','4321');
INSERT INTO usuario (usu_nome,per_id,usu_login,usu_password) VALUES ('Fulano',2,'aaaa','1111');
INSERT INTO usuario (usu_nome,per_id,usu_login,usu_password) VALUES ('Ciclano',1,'bbbb','2222');
INSERT INTO usuario (usu_nome,per_id,usu_login,usu_password) VALUES ('Guest',0,'guest','guest');

UPDATE usuario set usu_id = 1 where usu_nome = 'Igor';
UPDATE usuario set usu_id = 2 where usu_nome = 'Gritzko';
UPDATE usuario set usu_id = 3 where usu_nome = 'Fulano';
UPDATE usuario set usu_id = 4 where usu_nome = 'Ciclano';
UPDATE usuario set usu_id = 0 where usu_nome = 'Guest';


CREATE TABLE produto (
  prod_id int(11) NOT NULL AUTO_INCREMENT,
  prod_nome varchar(45) NOT NULL,
  prod_preco float DEFAULT NULL,
  prod_qtd float DEFAULT NULL,
  PRIMARY KEY (prod_id)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

CREATE TABLE timer (
  timer_id int(11) unsigned NOT NULL AUTO_INCREMENT,
  usu_id int(11), 
  data date,
  timer_key varchar(50) DEFAULT NULL,
  entrada_1 time DEFAULT '00:00:00',
  entrada_2 time DEFAULT '00:00:00',
  entrada_3 time DEFAULT '00:00:00',
  entrada_4 time DEFAULT '00:00:00',
  entrada_5 time DEFAULT '00:00:00',
  saida_1   time DEFAULT '00:00:00',
  saida_2   time DEFAULT '00:00:00',
  saida_3   time DEFAULT '00:00:00',
  saida_4   time DEFAULT '00:00:00',
  saida_5   time DEFAULT '00:00:00',
  PRIMARY KEY (timer_id)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

CREATE TABLE timer2 (
  timer_id int(11) unsigned NOT NULL AUTO_INCREMENT,
  usu_id int(11), 
  data date,
  timer_key varchar(50) DEFAULT NULL,
  entrada_1 Datetime null,
  entrada_2 Datetime null,
  entrada_3 Datetime null,
  entrada_4 Datetime null,
  entrada_5 Datetime null,
  saida_1   Datetime null,
  saida_2   Datetime null,
  saida_3   Datetime null,
  saida_4   Datetime null,
  saida_5   Datetime null,
  PRIMARY KEY (timer_id)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;
/*
-- Query: SELECT * FROM desafio_luxfacta.timer
-- Date: 2017-12-22 08:44
*/
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (1,'1420170314','08:16:00','12:55:00','16:01:00','17:42:00','19:03:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (2,'0020170314','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (3,'2320170314','17:11:24','17:11:25','17:11:27','17:11:28','17:11:29','17:11:30','17:11:31','17:11:33','17:11:34','17:11:35');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (4,'0020170315','07:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (5,'1420170315','08:32:00','13:22:00','16:06:00','17:30:07','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (6,'1420170316','06:13:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (7,'1420170317','06:13:00','07:37:00','08:06:00','12:42:00','16:10:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (8,'1420170320','06:16:00','07:46:00','08:19:00','12:50:00','13:46:00','15:16:00','16:10:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (9,'0020170320','17:36:09','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (10,'1420170321','06:15:00','07:37:00','08:20:00','12:47:11','13:48:00','15:40:00','16:06:00','17:40:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (12,'1420170322','06:14:00','07:36:00','08:04:00','12:50:00','16:05:00','17:30:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (13,'1420170323','06:16:00','07:37:00','08:03:00','12:53:00','13:45:00','14:45:27','16:06:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (14,'1420170324','06:15:00','07:40:00','08:30:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (15,'1420170327','06:11:00','07:37:00','08:05:00','13:11:00','16:03:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (16,'1420170328','06:15:00','07:38:00','08:22:00','13:10:00','16:05:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (17,'1420170330','06:13:00','07:37:00','08:24:00','13:23:00','14:34:00','15:31:00','16:06:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (18,'1420170331','06:17:00','07:37:00','08:36:00','13:08:00','16:04:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (19,'1420170403','06:26:00','09:34:00','09:47:00','12:51:00','16:01:00','19:49:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (20,'1420170404','06:08:00','07:46:00','08:10:00','10:48:00','11:06:00','12:52:00','14:05:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (21,'1420170405','06:13:00','13:21:00','15:55:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (22,'1420170406','06:12:00','10:14:00','11:08:00','13:20:00','16:09:00','17:35:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (23,'1420170407','06:09:00','13:10:00','16:10:00','17:39:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (24,'1420170410','06:08:00','12:51:00','13:43:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (25,'1420170411','06:17:00','10:51:00','11:12:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (26,'1420170412','06:13:00','07:37:00','09:13:00','10:52:00','11:13:00','12:52:00','13:46:00','15:40:00','16:00:00','17:30:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (27,'1420170413','06:15:00','12:43:00','13:41:00','15:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (28,'1420170417','06:08:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (29,'1420170418','06:10:00','12:53:00','14:17:00','15:41:00','16:03:00','17:30:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (30,'1420170419','06:12:00','12:50:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (31,'1420170420','06:13:00','11:15:00','13:44:00','15:38:00','16:06:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (32,'1420170425','06:12:00','10:21:00','11:03:00','12:52:00','13:45:00','15:40:00','16:33:00','17:35:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (33,'1420170426','06:15:00','12:49:00','14:23:00','15:40:00','16:03:00','17:37:00','18:06:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (34,'1420170427','06:13:00','13:20:00','16:00:00','17:42:00','19:00:00','21:13:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (35,'1420170502','06:15:00','10:42:00','11:07:00','13:20:00','16:03:00','17:35:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (36,'1420170503','06:18:00','13:18:00','15:55:00','17:35:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (37,'1420170504','06:14:00','12:50:00','13:45:00','15:20:00','16:07:00','17:35:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (38,'1420170505','06:13:00','12:20:00','13:40:00','15:41:00','16:14:00','17:36:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (39,'1420170508','06:17:00','10:36:00','10:59:00','12:53:00','15:56:00','17:41:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (40,'1420170509','06:17:00','13:15:00','16:04:00','17:36:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (41,'1420170510','06:15:00','12:53:00','13:52:00','15:40:00','16:20:00','17:27:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (42,'1420170511','06:19:00','13:21:00','16:12:00','17:35:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (43,'1420170512','06:16:00','07:35:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (44,'1420170515','06:15:00','13:18:00','16:06:00','17:33:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (45,'1420170516','06:14:00','12:48:00','14:35:00','15:38:00','15:59:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (46,'1420170517','06:14:00','07:20:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (47,'1420170518','06:12:00','12:51:00','13:50:00','15:44:00','16:08:00','20:09:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (48,'1420170519','06:15:00','12:52:00','14:06:00','15:36:00','16:07:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (49,'1420170522','06:14:00','12:50:00','14:28:00','15:41:00','16:04:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (50,'1420170523','06:15:00','13:20:00','16:02:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (51,'1420170524','06:17:00','13:18:00','16:01:00','17:35:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (52,'1420170525','06:15:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (53,'1420170529','06:18:00','12:37:00','14:01:00','15:42:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (54,'1420170530','06:18:00','12:32:00','15:47:00','17:33:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (55,'1420170531','06:17:00','07:05:00','10:24:00','12:57:00','16:04:00','17:35:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (56,'1420170602','06:19:00','12:23:00','16:04:00','17:35:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (57,'1420170605','06:15:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (58,'1420170606','08:31:00','13:01:00','14:55:00','18:13:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (59,'1420170607','06:23:00','13:20:00','15:23:00','17:32:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (60,'1420170608','06:17:00','13:20:00','16:07:00','17:34:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (61,'1420170609','06:20:00','13:02:00','16:05:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (62,'1420170613','06:13:00','13:22:00','16:04:00','17:35:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (63,'1420170614','06:20:00','13:22:00','16:04:00','17:32:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (64,'0020170614','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (65,'1420170615','08:29:00','12:03:00','14:11:00','16:38:00','16:58:00','19:15:30','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (66,'1420170619','06:19:00','08:45:00','11:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (67,'1420170622','06:20:00','07:59:00','08:29:00','13:21:00','14:16:00','18:46:45','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (68,'1420170623','06:16:00','07:39:00','09:00:00','12:40:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (69,'1420170626','06:16:00','08:50:00','11:08:00','12:58:00','13:43:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (70,'0020170627','06:19:00','07:29:00','08:27:00','12:55:00','14:06:00','15:40:00','16:04:00','17:32:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (71,'1420170628','06:18:00','07:33:00','09:30:00','12:53:00','13:42:00','15:43:00','16:13:00','17:36:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (72,'1420170629','06:18:00','12:50:00','13:40:00','15:40:00','16:05:00','17:35:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (73,'0020170629','06:19:00','12:55:00','13:40:00','15:40:00','16:04:00','17:35:00','18:30:00','20:56:04','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (74,'1420170630','06:13:00','07:49:00','08:22:00','12:55:00','13:41:00','15:41:00','16:01:00','17:35:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (75,'1420170702','08:10:00','11:39:42','12:21:29','14:55:39','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (76,'1420170703','06:33:00','12:54:00','13:43:00','15:15:00','16:20:00','17:35:00','18:30:00','22:42:16','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (77,'1420170704','06:22:00','12:50:00','16:20:00','17:40:00','18:30:00','21:15:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (78,'1420170705','06:18:00','13:16:00','16:30:00','17:40:00','18:20:00','19:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (79,'1420170706','06:30:00','13:00:00','13:42:00','15:33:00','16:02:00','17:35:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (80,'1420170707','06:23:30','07:30:00','11:20:00','12:50:00','16:00:00','17:35:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (81,'1420170710','06:17:00','11:03:00','13:25:00','16:42:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (82,'1420170711','07:17:00','12:19:00','13:51:00','17:30:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (83,'1420170712','07:22:00','12:10:00','13:17:00','16:30:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (84,'1420170713','07:31:00','13:23:00','14:08:00','16:28:44','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (85,'1420170714','07:47:00','12:10:00','14:15:00','20:01:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (86,'1420170717','07:38:00','13:36:00','14:30:00','20:55:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (87,'0020170718','07:38:00','11:44:00','13:00:00','21:10:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (88,'1420170719','07:56:00','12:32:00','13:50:00','17:15:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (89,'0020170719','07:38:00','11:44:00','13:00:00','21:10:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (90,'1420170720','07:58:00','13:19:00','14:09:00','16:50:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (91,'0020170721','08:14:00','12:01:00','13:07:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (92,'1420170721','08:14:00','12:01:00','13:07:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (93,'0020170724','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (94,'1420170725','07:53:00','12:35:00','13:34:00','17:27:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (95,'1420170726','07:48:00','12:10:00','13:07:00','16:50:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (97,'1420170727','07:40:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (98,'1420170728','07:51:00','11:49:00','12:12:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (99,'1420170731','07:48:00','12:14:00','13:09:00','19:23:22','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (100,'1420170801','07:50:00','12:35:00','13:42:00','18:59:37','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (101,'1420170802','07:56:00','12:30:00','13:48:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (102,'1420170803','07:50:00','12:18:00','13:35:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (103,'1420170804','07:57:00','13:04:00','14:00:00','19:07:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (104,'1420170807','07:51:00','13:00:00','14:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (105,'1420170808','08:01:00','10:49:00','11:23:00','12:56:00','13:19:00','17:09:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (106,'1420170809','07:45:00','13:18:00','13:53:00','17:35:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (107,'1420170810','07:50:00','07:55:00','08:28:00','12:32:00','13:12:00','17:17:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (108,'1420170814','07:44:00','08:05:00','08:31:00','12:27:00','13:17:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (109,'1420170815','07:39:00','11:52:00','13:01:00','17:40:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (110,'1420170816','07:33:00','13:00:00','14:04:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (111,'1420170818','07:44:00','13:14:00','13:45:00','18:45:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (112,'1420170821','08:08:00','12:28:00','13:13:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (113,'1420170822','07:47:00','12:45:00','13:54:00','19:26:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (114,'1420170823','07:26:00','12:58:00','14:22:00','17:17:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (115,'1420170824','07:50:00','12:28:00','13:25:00','18:49:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (116,'1420170825','07:49:00','12:27:00','13:30:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (117,'1420170828','07:43:00','12:02:00','13:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (118,'0020170828','16:41:05','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (119,'1420170830','08:09:00','12:15:00','12:51:00','16:49:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (120,'1420170831','07:36:00','12:16:00','13:39:00','17:07:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (121,'1420170901','08:04:00','12:14:00','12:52:00','17:01:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (122,'1420170904','07:56:00','12:02:00','12:57:00','17:08:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (123,'1420170905','07:48:00','12:23:00','13:12:00','17:40:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (124,'1420170906','07:52:00','11:54:00','13:00:00','17:03:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (125,'1420170908','08:10:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (126,'1420170911','07:59:00','08:02:00','08:39:00','13:04:00','13:45:00','18:19:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (127,'1420170912','07:26:00','12:59:00','13:52:00','17:30:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (128,'1420170913','07:35:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (129,'1420170914','07:48:00','12:39:00','14:34:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (130,'1420170915','08:06:00','12:21:00','12:47:00','19:17:08','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (131,'1420170916','08:09:00','14:13:40','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (132,'1420170918','07:51:00','12:00:00','12:55:00','18:48:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (133,'1420170919','07:40:00','12:53:00','15:58:00','17:35:59','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (134,'1420170920','08:03:00','11:59:00','13:09:00','17:47:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (135,'1420170921','07:30:00','12:54:00','13:47:00','17:03:35','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (136,'1420170922','07:44:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (137,'1420170925','07:28:00','12:32:00','13:05:00','17:56:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (138,'1420170926','07:54:00','12:15:00','14:51:00','18:52:34','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (139,'1420170927','07:58:00','13:02:00','13:59:00','18:55:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (140,'1420170928','07:34:00','12:35:00','13:07:00','16:10:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (141,'1420170929','08:42:00','12:22:00','13:13:00','15:33:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (142,'1420171002','07:38:00','12:49:00','13:44:00','17:33:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (143,'1420171003','07:34:00','12:09:00','12:42:00','17:43:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (144,'1420171004','08:09:00','12:08:00','13:16:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (145,'1420171005','07:50:00','12:26:00','13:59:00','19:27:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (146,'1420171006','07:17:00','12:47:00','13:32:00','16:27:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (147,'1420171009','08:10:00','12:50:00','13:33:00','17:31:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (148,'1420171010','08:50:00','12:26:00','13:23:00','18:05:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (149,'1420171011','08:21:00','12:31:00','13:48:00','15:23:00','17:47:00','21:14:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (150,'1420171012','08:19:00','12:26:00','13:23:00','18:46:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (151,'1420171013','08:32:00','12:25:00','13:44:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (152,'1420171016','08:10:00','13:09:00','13:54:00','17:37:00','18:27:00','23:29:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (153,'1420171017','08:23:00','12:48:00','13:49:00','20:31:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (154,'1420171018','08:01:00','12:59:00','13:15:00','14:00:00','15:43:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (155,'1420171019','09:14:00','13:08:00','14:40:00','17:41:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (156,'1420171020','09:01:00','09:25:00','13:45:00','23:29:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (157,'1420171021','12:23:00','19:54:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (158,'1420171023','09:14:00','12:31:00','13:17:00','20:42:00','20:49:00','23:40:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (159,'1420171024','07:36:00','12:44:00','13:47:00','16:50:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (160,'1420171025','08:31:00','12:51:00','14:08:00','22:41:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (161,'1420171026','08:47:00','12:39:00','13:46:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (162,'1420171027','08:33:00','09:33:00','11:12:00','12:12:00','12:31:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (163,'1420171030','09:00:00','12:35:00','13:55:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (164,'1420171031','09:03:00','12:32:00','13:38:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (165,'1420171101','09:03:00','12:22:00','13:36:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (166,'1420171106','08:26:00','12:59:00','13:51:00','19:23:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (167,'1420171107','08:19:00','09:18:00','11:18:00','13:00:00','14:10:00','19:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (168,'1420171108','08:45:00','12:52:00','13:46:00','17:40:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (169,'1420171113','09:23:00','12:18:00','12:47:00','16:59:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (170,'1420171114','08:29:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (171,'1420171115','13:05:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (172,'1420171116','08:23:00','13:24:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (173,'0020171117','08:43:00','12:38:00','13:43:00','19:07:28','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (174,'0020171118','09:08:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (175,'1420171121','07:17:00','08:49:00','11:23:00','16:28:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (176,'1420171122','08:24:00','11:53:00','13:22:00','17:36:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (177,'0020171123','09:17:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (178,'1420171124','07:47:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (179,'1420171127','07:44:00','12:13:00','12:14:00','12:53:00','13:11:00','16:55:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (180,'1420171128','07:43:00','08:41:00','08:58:00','11:59:00','12:29:00','16:45:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (181,'1420171129','07:22:00','11:21:00','11:38:00','13:17:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (182,'1420171130','07:29:00','12:12:00','14:50:00','17:59:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (183,'1420171201','07:16:00','12:00:00','13:26:00','17:40:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (184,'1420171204','06:21:00','09:23:00','12:17:00','17:10:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (185,'1420171205','08:39:00','12:51:00','13:14:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (186,'1420171206','07:33:00','11:23:00','11:28:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (187,'0020171207','07:44:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (188,'1420171208','09:25:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (189,'1420171211','07:28:00','13:08:00','13:35:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (190,'1420171212','08:02:00','11:26:00','11:52:00','18:45:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (191,'1420171213','07:31:00','12:24:00','13:37:00','17:50:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (192,'1420171214','07:30:00','08:37:00','09:19:00','10:43:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (193,'1420171215','07:25:00','10:44:00','11:36:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (194,'1420171218','07:53:00','11:46:00','13:51:00','16:25:00','16:50:00','17:39:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (195,'1420171219','07:35:00','13:32:00','14:21:00','17:04:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (196,'1420171220','07:58:00','12:22:00','12:53:00','17:42:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');
INSERT INTO timer (timer_id,timer_key,entrada_1,saida_1,entrada_2,saida_2,entrada_3,saida_3,entrada_4,saida_4,entrada_5,saida_5) VALUES (197,'1420171221','07:27:00','12:11:00','12:49:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00');


update timer set usu_id = left(timer_key,1) where usu_id is null;
update timer set data = cast(right(timer_key,8) as date) where data is null;
select * from timer