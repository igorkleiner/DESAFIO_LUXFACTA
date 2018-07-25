truncate table timer;
insert into timer2 (
	timer_id,
	usu_id,
	data,
	timer_key,
	entrada_1,
	saida_1 ,
	entrada_2,
	saida_2 ,
	entrada_3,
	saida_3 ,
	entrada_4,
	saida_4 ,
	entrada_5,
	saida_5 
)
select
	timer_id,
	usu_id,
	data,
	timer_key,
	concat(data,' ',entrada_1) as entrada_1,
	concat(data,' ',saida_1)   as saida_1,
	concat(data,' ',entrada_2) as entrada_2,
	concat(data,' ',saida_2)   as saida_2,
	concat(data,' ',entrada_3) as entrada_3,
	concat(data,' ',saida_3)   as saida_3,
	concat(data,' ',entrada_4) as entrada_4,
	concat(data,' ',saida_4)   as saida_4,
	concat(data,' ',entrada_5) as entrada_5,
	concat(data,' ',saida_5)   as saida_5 
from timer;


