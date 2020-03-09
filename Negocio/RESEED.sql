declare @timer int = (select max(timer_id) from timer where timer_id <1000);
DBCC CHECKIDENT ('timer', RESEED, @timer)
GO

insert into timer (
	usu_id,
	data,
	entrada_1,
	saida_1,
	entrada_2,
	saida_2,
	entrada_3,
	saida_3,
	entrada_4,
	saida_4,
	entrada_5,
	saida_5
) select  
	usu_id,
	data,
	entrada_1,
	saida_1,
	entrada_2,
	saida_2,
	entrada_3,
	saida_3,
	entrada_4,
	saida_4,
	entrada_5,
	saida_5
from timer where timer_id >1000 order by data asc;
GO

delete from timer where timer_id > 1000;
GO

select * from timer;


--=========================================================
declare @produto int = (select max(prod_id) from produto where prod_id <1000);
DBCC CHECKIDENT ('produto', RESEED, @produto)
GO

insert into produto (
	prod_nome,
	prod_preco,
	prod_qtd
) select  
	prod_nome,
	prod_preco,
	prod_qtd
from produto where prod_id >1000;
GO

delete from produto where prod_id > 1000;
GO

select * from produto;
--=========================================================
declare @perfil int = (select max(per_id) from perfil where per_id <1000);
DBCC CHECKIDENT ('perfil', RESEED, @perfil)
GO

insert into perfil (
	per_nome
) select  
	per_nome
from perfil where per_id >1000;
GO

delete from perfil where per_id > 1000;
GO
--=========================================================
declare @usuario int = (select max(usu_id) from perfil where usu_id <1000);
DBCC CHECKIDENT ('usuario', RESEED, @usuario)
GO

insert into usuario (
	usu_nome,
	per_id,
	usu_login,
	usu_password
) select  
	usu_nome,
	per_id,
	usu_login,
	usu_password
from usuario where usu_id >1000;
GO

delete from usuario where usu_id > 1000;
GO

select * from usuario;