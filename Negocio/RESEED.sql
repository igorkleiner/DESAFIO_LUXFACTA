DBCC CHECKIDENT ('timer', RESEED, 104)
GO

insert into timer 
(
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
from timer where timer_id >1000;
GO

delete from timer where timer_id > 1000;
GO

select * from timer;