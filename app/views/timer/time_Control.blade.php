@extends('layout.defaulttemplate')
@section('title','TIMER')
@section('content')

<script type="text/javascript">
	// INSTANCIA DAS VARIAVEIS DA PAGINA
	var viewModel, diaSemana,data,hora,usuario,time, mask, placeholder;
	diaSemana         = "{{date('D',time())}}";
	data              = "{{date('Y-m-d',time())}}";    
	hora              = "{{date('H:i:s:u',time())}}";          
	usuario           = {{json_encode($usuario)}};   
	usuario['usu_id'] = {{$usuario->usu_id}};    
	time              = {{json_encode($time)}};
	mask              = '99:99:99';
	placeholder       = 'Informe a Hora';
</script>

<style >
	.borda1{
		border-radius: 10px ;
		padding: 4px;
		box-shadow: 0px 0px 20px 9px rgba(6, 75, 65, 0.41);
		margin-bottom: 0px;
	}
	.borda2{

		margin-bottom: 0px;
		box-shadow: 0px 0px 10px 7px rgba(27, 65, 67, 0.74);
	}
</style>
<div class="borda1" id='idtimer' >
	<div class="row " >
		<div class=" col-lg-12 col-md-12 col-sm-12 " data-bind='with:timer'>        
			<table class=" table table-bordered table-striped borda2 "  >
			{{--ko--}}
				<thead>
					<tr class='warning' height="60px" >                     
						<th style='text-align:center'>Funcionario</th>
						<th style='text-align:center'>Data</th>
						<th style='text-align:center'>Entrada 1</th>
						<th style='text-align:center'>Saída 1</th>
						<th style='text-align:center'>Entrada 2</th>
						<th style='text-align:center'>Saída 2</th>  
						<th style='text-align:center'>Entrada 3</th>
						<th style='text-align:center'>Saída 3</th>
						<th style='text-align:center'>Entrada 4</th>
						<th style='text-align:center'>Saída 4</th>
						<th style='text-align:center'>Entrada 5</th>
						<th style='text-align:center'>Saída 5</th>                            
					</tr>                
				</thead>    
				<tbody >
					<tr class='' height="45px" >
						<td align='center'><span data-bind='text:usuario'></span></td>
						<td align='center' data-bind='relogio:agora'><span data-bind='text: agora.data'></span></td>
					{{-- PERIODO 1 --}}
						<td align='center'>
							<horario params="value:entradaPeriodo1,mask:mask,placeholder: placeholder"></horario>
							<button class='btn btn-success' data-bind='click: setTime.bind($data,"entradaPeriodo1"), visible:visuEntrada1'>Set Now</button>
						</td>
						
						<td align='center'>
							<horario params="value:saidaPeriodo1,mask:mask,placeholder: placeholder"></horario>
							<button class='btn btn-danger' data-bind='click: setTime.bind($data,"saidaPeriodo1"), visible:visuSaida1'>Set Now</button>
						</td>
					{{-- PERIODO 2 --}}
						<td align='center'>
							<horario params="value:entradaPeriodo2,mask:mask,placeholder: placeholder"></horario>
							<button class='btn btn-success' data-bind='click: setTime.bind($data,"entradaPeriodo2"), visible:visuEntrada2'>Set Now</button>
						</td>						
						<td align='center'>
							<horario params="value:saidaPeriodo2,mask:mask,placeholder: placeholder"></horario>
							<button class='btn btn-danger' data-bind='click: setTime.bind($data,"saidaPeriodo2"), visible:visuSaida2'>Set Now</button>
						</td>
					{{-- PERIODO 3 --}}
						<td align='center'>
							<horario params="value:entradaPeriodo3,mask:mask,placeholder: placeholder"></horario>
							<button class='btn btn-success' data-bind='click: setTime.bind($data,"entradaPeriodo3"), visible:visuEntrada3'>Set Now</button>
						</td>
						
						<td align='center'>
							<horario params="value:saidaPeriodo3,mask:mask,placeholder: placeholder"></horario>
							<button class='btn btn-danger' data-bind='click: setTime.bind($data,"saidaPeriodo3"), visible:visuSaida3'>Set Now</button>
						</td>
					{{-- PERIODO 4 --}}						
						<td align='center'>
							<horario params="value:entradaPeriodo4,mask:mask,placeholder: placeholder"></horario>
							<button class='btn btn-success' data-bind='click: setTime.bind($data,"entradaPeriodo4"), visible:visuEntrada4'>Set Now</button>
						</td>
						
						<td align='center'>
							<horario params="value:saidaPeriodo4,mask:mask,placeholder: placeholder"></horario>
							<button class='btn btn-danger' data-bind='click: setTime.bind($data,"saidaPeriodo4"), visible:visuSaida4'>Set Now</button>
						</td>
					{{-- PERIODO 5 --}}						
						<td align='center'>
							<horario params="value:entradaPeriodo5,mask:mask,placeholder: placeholder"></horario>
							<button class='btn btn-success' data-bind='click: setTime.bind($data,"entradaPeriodo5"), visible:visuEntrada5'>Set Now</button>
						</td>
						<td align='center'>
							<horario params="value:saidaPeriodo5,mask:mask,placeholder: placeholder"></horario>
							<button class='btn btn-danger' data-bind='click: setTime.bind($data,"saidaPeriodo5"), visible:visuSaida5'>Set Now</button>
						</td>
<!-- 
						 -->
						       
					</tr>
					<tr class='warning' height="60px" > 
						<th style='text-align:center' >Previsão de saída</th>
						<th style='text-align:center'>Total trabalhado ate agora</th>
						<th style='text-align:center'>Horas Periodo 1</th>
						<th style='text-align:center'>Tempo Ausência entre 1 e 2</th>
						<th style='text-align:center'>Horas Periodo 2</th>
						<th style='text-align:center'>Tempo Ausência entre 2 e 3</th>  
						<th style='text-align:center'>Horas Periodo 3</th>
						<th style='text-align:center'>Tempo Ausência entre 3 e 4</th>
						<th style='text-align:center'>Horas Periodo 4</th>
						<th style='text-align:center'>Tempo Ausência entre 4 e 5</th>
						<th style='text-align:center'>Horas Periodo 5</th>
						<th style='text-align:center'>Horas Contratadas</th>                           
					</tr> 
					<tr class='' height="45px" >
						<td align='center'><strong><span {{-- data-bind='text:previsaoSaida' --}}></span></strong></td>
						<td align='center'><strong><span {{-- data-bind='text:totalTrabalhadoAteAgora' --}}></span></strong></td>                                                    
						<td align='center'><strong><span data-bind='text:totalHorasPeriodo1'></span></strong></td>
						<td align='center'><strong><span data-bind='text:totalAusenciaPeriodo12'></span></strong></td>
						<td align='center'><strong><span data-bind='text:totalHorasPeriodo2'></span></strong></td>
						<td align='center'><strong><span data-bind='text:totalAusenciaPeriodo23'></span></strong></td>
						<td align='center'><strong><span data-bind='text:totalHorasPeriodo3'></span></strong></td>
						<td align='center'><strong><span data-bind='text:totalAusenciaPeriodo34'></span></strong></td>
						<td align='center'><strong><span data-bind='text:totalHorasPeriodo4'></span></strong></td>
						<td align='center'><strong><span data-bind='text:totalAusenciaPeriodo45'></span></strong></td>
						<td align='center'><strong><span data-bind='text:totalHorasPeriodo5'></span></strong></td>
						<td align='center'><strong><span data-bind='text:horasContratadas'></span></strong></td>                            
					</tr> 
					<tr class='warning' height="60px" >
						<th style='text-align:center'>Agora</th>
						<th style='text-align:center'>Previsão Horas Extras</th>                            
						<th style='text-align:center'>Ausencias</th>
						<th style='text-align:center'>Saída minima</th>
						<th style='text-align:center'>Horas Totais</th>
						{{-- <th style='text-align:center'>Horas Restantes</th> --}}
						<th style='text-align:center'>Horas Extras</th>
						{{-- <th style='text-align:center'>Previsão de saida 1</th>
						<th style='text-align:center'>Previsão de saida 2</th>
						<th style='text-align:center'>Previsão de saida 3</th>
						<th style='text-align:center'>Previsão de saida 4</th> --}}
						<th style='text-align:center'>Ação</th>
					</tr>
					<tr class='' height="45px" border-radius='10px'>
							<td align='center' border-radius='10px' data-bind='relogio:agora'><strong><span data-bind='text:agora.hora'></span></strong></td>
							<td align='center'><strong><span data-bind='text:previsaoHorasExtras'></span></strong></td>
							<td align='center'><strong><span data-bind='text:totalAusencias'></span></strong></td>
							<td align='center'><strong><span data-bind='text:saidaMinima'></span></strong></td> 
							<td align='center'><strong><span data-bind='text:horasTotais'></span></strong></td>
							{{-- <td align='center'><strong><span data-bind='text:horasRestantes'></span></strong></td> --}}
							<td align='center'><strong><span data-bind='text:horasExtras'></span></strong></td>
							{{-- <td align='center'><span text='00:00:00'>00:00:00</span></td>
							<td align='center'><span text='00:00:00'>00:00:00</span></td>
							<td align='center'><span text='00:00:00'>00:00:00</span></td>
							<td align='center'><span text='00:00:00'>00:00:00</span></td> --}}
							<td align='center'><button class="btn btn-success" data-bind='click:salvar'>Salvar</button></td>
					</tr>
				</tbody>                    
			</table>
			{{-- <input id="teste" name="teste" type="text" size="12" maxlength="8" data-bind="masked: teste, mask: '99:99:99', placeholder: '00:00:00', valueUpdate: 'input'"/> --}}
			{{--/ko--}}
		</div>
	</div>
	</div>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
{{-- COLOCANDO JAVASCRIPT --}}
<script type="text/javascript">
	//---------------------------------------------------------------------------------------------------------------
	// CRIANDO A CLASSE TIMER
	function Timer(timer_id,entrada1,entrada2,entrada3,entrada4,entrada5,saida1,saida2,saida3,saida4,saida5)
	{
		var self                    = this;
		//
		self.timerId                 = ko.observable(timer_id);    
		self.usuario                 = ko.observable(usuario.usu_nome);
		//
			self.visuEntrada1            = ko.observable(true);
			self.visuSaida1              = ko.observable(false);
			self.visuEntrada2            = ko.observable(false);
			self.visuSaida2              = ko.observable(false);
			self.visuEntrada3            = ko.observable(false);
			self.visuSaida3              = ko.observable(false);
			self.visuEntrada4            = ko.observable(false);
			self.visuSaida4              = ko.observable(false);
			self.visuEntrada5            = ko.observable(false);
			self.visuSaida5              = ko.observable(false);
		//
			self.focoEntrada1            = ko.observable(true);
			self.focoSaida1              = ko.observable(false);
			self.focoEntrada2            = ko.observable(false);
			self.focoSaida2              = ko.observable(false);
			self.focoEntrada3            = ko.observable(false);
			self.focoSaida3              = ko.observable(false);
			self.focoEntrada4            = ko.observable(false);
			self.focoSaida4              = ko.observable(false);
			self.focoEntrada5            = ko.observable(false);
			self.focoSaida5              = ko.observable(false);
		//
		self.entradaPeriodo1         = ko.observable(moment(entrada1,"YYYY-MM-DD HH:mm:ss" ));
		self.saidaPeriodo1           = ko.observable(moment(saida1  ,"YYYY-MM-DD HH:mm:ss" ));
		//		
		self.entradaPeriodo2         = ko.observable(moment(entrada2,"YYYY-MM-DD HH:mm:ss" ));
		self.saidaPeriodo2           = ko.observable(moment(saida2  ,"YYYY-MM-DD HH:mm:ss" ));
		//
		self.entradaPeriodo3         = ko.observable(moment(entrada3,"YYYY-MM-DD HH:mm:ss" ));
		self.saidaPeriodo3           = ko.observable(moment(saida3  ,"YYYY-MM-DD HH:mm:ss" ));
		//
		self.entradaPeriodo4         = ko.observable(moment(entrada4,"YYYY-MM-DD HH:mm:ss" ));
		self.saidaPeriodo4           = ko.observable(moment(saida4  ,"YYYY-MM-DD HH:mm:ss" ));
		//
		self.entradaPeriodo5         = ko.observable(moment(entrada5,"YYYY-MM-DD HH:mm:ss" ));
		self.saidaPeriodo5           = ko.observable(moment(saida5  ,"YYYY-MM-DD HH:mm:ss" ));
		//
		self.horasContratadas        = ko.observable("08:00:00");
		self.saidaMinima             = ko.observable("16:00:00"); 
		self.previsaoHorasExtras     = ko.observable("00:00:00"); 

	//	
		self.totalAusencias          = ko.pureComputed(function()
		{
		   return self.timeAdd(  self.totalAusenciaPeriodo12()
								,self.totalAusenciaPeriodo23()
								,self.totalAusenciaPeriodo34()
								,self.totalAusenciaPeriodo45()
								,"00:00:00"); 
		},this);


		self.horasTotais = ko.pureComputed(function()
		{
		   
		   return self.timeAdd(   self.totalHorasPeriodo1()
								, self.totalHorasPeriodo2()
								, self.totalHorasPeriodo3()
								, self.totalHorasPeriodo4()
								, self.totalHorasPeriodo5());
		},this);


		self.horasRestantes = ko.pureComputed(function()
		{            
				 return self.dateDiff(self.totalTrabalhadoAteAgora(),self.horasContratadas());
		});


		self.horasExtras = ko.pureComputed(function()
		{            
			   return self.dateDiff(self.horasContratadas(), self.horasTotais());            
		});
	//	
		
		self.agora = new Relogio();

	//
		// self.totalTrabalhadoAteAgora = ko.pureComputed(function()
		// {
			
		// 	if(self.entradaPeriodo1() != undefined)
		// 	{   
		// 		var temposaida1 = self.saidaPeriodo1();             
		// 		var temposaida2 = self.saidaPeriodo2();
		// 		var temposaida3 = self.saidaPeriodo3();
		// 		var temposaida4 = self.saidaPeriodo4();
		// 		var compara  = new Date();
		// 		var total1, total2, total3, total4, total;

		// 		if (temposaida1 == "") temposaida1 = "00:00:00";
		// 		if (temposaida2 == "") temposaida2 = "00:00:00";
		// 		if (temposaida3 == "") temposaida3 = "00:00:00";
		// 		if (temposaida4 == "") temposaida4 = "00:00:00";                

		// 		calculotemposaida1 = temposaida1.split(":");
		// 		var saida1 = new Date();
		// 		saida1.setHours(calculotemposaida1[0]);
		// 		saida1.setMinutes(calculotemposaida1[1]);
		// 		saida1.setSeconds(calculotemposaida1[2]);

		// 		calculotemposaida2 = temposaida2.split(":");
		// 		var saida2 = new Date();
		// 		saida2.setHours(calculotemposaida2[0]);
		// 		saida2.setMinutes(calculotemposaida2[1]);
		// 		saida2.setSeconds(calculotemposaida2[2]);

		// 		calculotemposaida3 = temposaida3.split(":");
		// 		var saida3 = new Date();
		// 		saida3.setHours(calculotemposaida3[0]);
		// 		saida3.setMinutes(calculotemposaida3[1]);
		// 		saida3.setSeconds(calculotemposaida3[2]);

		// 		calculotemposaida4 = temposaida4.split(":");
		// 		var saida4 = new Date();
		// 		saida4.setHours(calculotemposaida4[0]);
		// 		saida4.setMinutes(calculotemposaida4[1]);
		// 		saida4.setSeconds(calculotemposaida4[2]);

		// 		if (saida1.getTime() < compara.getTime()) total1 = self.totalAusenciaPeriodo12(); else total1 = "00:00:00";                
		// 		if (saida2.getTime() < compara.getTime()) total2 = self.totalAusenciaPeriodo23(); else total2 = "00:00:00";                
		// 		if (saida3.getTime() < compara.getTime()) total3 = self.totalAusenciaPeriodo34(); else total3 = "00:00:00";                
		// 		if (saida4.getTime() < compara.getTime()) total4 = self.totalAusenciaPeriodo45(); else total4 = "00:00:00";  
				
		// 		total = self.timeAdd(total1, total2, total3, total4, "00:00:00");
				
		// 		return self.dateDiff(total, self.dateDiff(self.entradaPeriodo1(),self.agora.hora()));
		// 	}
		// 	else
		// 		return "00:00:00"
		// },this);

		self.previsaoSaida  = ko.pureComputed(function()
		{  
			var previsao = self.timeAdd(self.agora.hora(),self.horasRestantes(),self.previsaoHorasExtras(),"00:00:00","00:00:00");             
			previsao = previsao.split(":");
			if (parseFloat(previsao[0]) > 24)
				previsao[0] = previsao[0]-24;
			if (previsao[0] < 10)
				previsao[0] = "0" + previsao[0].toString();
			return  previsao[0]+":"+previsao[1].toString()+":"+previsao[2].toString();
		},this);

		self.totalAusenciaPeriodo12 = ko.pureComputed(function()
		{
			var tempoEntrada = self.saidaPeriodo1().format("YYYY-MM-DD HH:mm:ss");            
			var tempoSaida   =   self.entradaPeriodo2().format("YYYY-MM-DD HH:mm:ss");            
			
			if (tempoEntrada != ""  && tempoSaida == "" ) tempoSaida = self.agora.data()+ " " +self.agora.hora();
			return self.dateDiff(tempoEntrada, tempoSaida);
		},this);


		self.totalAusenciaPeriodo23 = ko.pureComputed(function()
		{
			var tempoEntrada = self.saidaPeriodo2().format("YYYY-MM-DD HH:mm:ss");            
			var tempoSaida   =   self.entradaPeriodo3().format("YYYY-MM-DD HH:mm:ss");            
			
			if (tempoEntrada != ""  && tempoSaida == "" ) tempoSaida = self.agora.data()+ " " +self.agora.hora();
			return self.dateDiff(tempoEntrada, tempoSaida);
		},this);


		self.totalAusenciaPeriodo34 = ko.pureComputed(function()
		{
			var tempoEntrada = self.saidaPeriodo3().format("YYYY-MM-DD HH:mm:ss");            
			var tempoSaida   =   self.entradaPeriodo4().format("YYYY-MM-DD HH:mm:ss");            
			
			if (tempoEntrada != ""  && tempoSaida == "" ) tempoSaida = self.agora.data()+ " " +self.agora.hora();
			return self.dateDiff(tempoEntrada, tempoSaida);
		},this);


		self.totalAusenciaPeriodo45 = ko.pureComputed(function()
		{
			var tempoEntrada = self.saidaPeriodo4().format("YYYY-MM-DD HH:mm:ss");            
			var tempoSaida   =   self.entradaPeriodo5().format("YYYY-MM-DD HH:mm:ss");            
			
			if (tempoEntrada != ""  && tempoSaida == "" ) tempoSaida = self.agora.data()+ " " +self.agora.hora();
			return self.dateDiff(tempoEntrada, tempoSaida);
		},this);
	//
		self.totalHorasPeriodo1 = ko.pureComputed(function()
		{
			var tempoEntrada = self.entradaPeriodo1().format("YYYY-MM-DD HH:mm:ss");            
			var tempoSaida   =   self.saidaPeriodo1().format("YYYY-MM-DD HH:mm:ss");            
			
			if (tempoEntrada != ""  && tempoSaida == "" ) tempoSaida = self.agora.data()+ " " +self.agora.hora();
			return self.dateDiff(tempoEntrada, tempoSaida);

		},this);

	//
		self.totalHorasPeriodo2 = ko.pureComputed(function()
		{
			var tempoEntrada = self.entradaPeriodo2().format("YYYY-MM-DD HH:mm:ss");            
			var tempoSaida   =   self.saidaPeriodo2().format("YYYY-MM-DD HH:mm:ss");            
			
			if (tempoEntrada != ""  && tempoSaida == "" ) tempoSaida = self.agora.data()+ " " +self.agora.hora();
			return self.dateDiff(tempoEntrada, tempoSaida);

		},this);


		self.totalHorasPeriodo3 = ko.pureComputed(function()
		{
			var tempoEntrada = self.entradaPeriodo3().format("YYYY-MM-DD HH:mm:ss");            
			var tempoSaida   =   self.saidaPeriodo3().format("YYYY-MM-DD HH:mm:ss");            
			
			if (tempoEntrada != ""  && tempoSaida == "" ) tempoSaida = self.agora.data()+ " " +self.agora.hora();
			return self.dateDiff(tempoEntrada, tempoSaida);
		},this);


		self.totalHorasPeriodo4 = ko.pureComputed(function()
		{
			var tempoEntrada = self.entradaPeriodo4().format("YYYY-MM-DD HH:mm:ss");            
			var tempoSaida   =   self.saidaPeriodo4().format("YYYY-MM-DD HH:mm:ss");            
			
			if (tempoEntrada != ""  && tempoSaida == "" ) tempoSaida = self.agora.data()+ " " +self.agora.hora();
			return self.dateDiff(tempoEntrada, tempoSaida); 
		},this);


		self.totalHorasPeriodo5 = ko.pureComputed(function()
		{
			var tempoEntrada = self.entradaPeriodo5().format("YYYY-MM-DD HH:mm:ss");            
			var tempoSaida   =   self.saidaPeriodo5().format("YYYY-MM-DD HH:mm:ss");            
			
			if (tempoEntrada != ""  && tempoSaida == "" ) tempoSaida = self.agora.data()+ " " +self.agora.hora();
			return self.dateDiff(tempoEntrada, tempoSaida); 
		},this);

		self.setTime = function(e)
		{
			if(typeof(e) != 'function')
				self[e](moment());
			//console.log(self[e]());
		};

		self.dateDiff = function (entrada, saida)
		{	
			if(!!entrada && !!saida &&(entrada < saida))
			{
				try
				{    
					var antes    = moment(entrada);
					var depois   = moment(saida);
					var tempoCorrido = depois.diff(antes, 'seconds');
					var horas    = 0;
					var minutos  = 0;
					var segundos = tempoCorrido;

					while(segundos>59){segundos = segundos-60;minutos++;}
					while(minutos >59){minutos  = minutos -60;horas++;}

					if(segundos<10) segundos = "0"+segundos.toString();
					if(minutos<10)   minutos = "0"+minutos.toString();
					if(horas<10)       horas = "0"+horas.toString();

					var diferenca = `${horas}:${minutos}:${segundos}`;
					return diferenca;
				}
				catch(ex)
				{
					console.log('entrei no catch do erro de dateDiff ', ex);
					return '00:00:00';
				}
			}	

			else {return '00:00:00';}	
		};  


		self.timeAdd = function (time1, time2, time3, time4, time5)
		{            
			time1 = time1.split(':');              
			time2 = time2.split(':');
			time3 = time3.split(':');            
			time4 = time4.split(':');            
			time5 = time5.split(':');  

			var horas    = parseFloat(time1[0]) + parseFloat(time2[0]) + parseFloat(time3[0]) + parseFloat(time4[0]) + parseFloat(time5[0]);            
			var minutos  = parseFloat(time1[1]) + parseFloat(time2[1]) + parseFloat(time3[1]) + parseFloat(time4[1]) + parseFloat(time5[1]);              
			var segundos = parseFloat(time1[2]) + parseFloat(time2[2]) + parseFloat(time3[2]) + parseFloat(time4[2]) + parseFloat(time5[2]);

			try
			{
				while (segundos > 59) {segundos = segundos - 60; minutos ++;}
				while (minutos > 59)  {minutos  = minutos  - 60; horas   ++;}          
				if (horas    < 10) horas    = "0"+ horas.toString();
				if (minutos  < 10) minutos  = "0"+ minutos.toString();
				if (segundos < 10) segundos = "0"+ segundos.toString(); 
				return horas+':'+minutos+':'+segundos;
			}
			catch(ex)
			{
				return '00:00:00';
			}
		}; 


		self.salvar = function()
		{
			var entradaPeriodo1 = self.entradaPeriodo1() || "";
			var entradaPeriodo2 = self.entradaPeriodo2() || "";
			var entradaPeriodo3 = self.entradaPeriodo3() || "";
			var entradaPeriodo4 = self.entradaPeriodo4() || "";
			var entradaPeriodo5 = self.entradaPeriodo5() || "";
			var saidaPeriodo1   = self.saidaPeriodo1()   || "";
			var saidaPeriodo2   = self.saidaPeriodo2()   || "";
			var saidaPeriodo3   = self.saidaPeriodo3()   || "";
			var saidaPeriodo4   = self.saidaPeriodo4()   || "";
			var saidaPeriodo5   = self.saidaPeriodo5()   || "";            

			var callback = function(result)
			{
				if(result !=null && result.status != undefined )
				{
					if(result.status == 1)
					{                        
						self.timerId(result.response.timer_id);
						self.entradaPeriodo1(result.response.entrada_1);
						self.entradaPeriodo2(result.response.entrada_2);
						self.entradaPeriodo3(result.response.entrada_3);
						self.entradaPeriodo4(result.response.entrada_4);
						self.entradaPeriodo5(result.response.entrada_5);
						self.saidaPeriodo1(result.response.saida_1);
						self.saidaPeriodo2(result.response.saida_2);
						self.saidaPeriodo3(result.response.saida_3);
						self.saidaPeriodo4(result.response.saida_4);
						self.saidaPeriodo5(result.response.saida_5);
					}
					else
					{
						globalViewModel.submit("{{Route('log.error')}}", result.message,function(){location.reload()});
						alert(result.message);
					}
				}               
			}                      
			dadosPost = 
			{
				'data' : data,
				"usu_id": usuario['usu_id'],
				'timer_id' : self.timerId(),
				'timer_key': usuario.usu_id.toString()+usuario.per_id.toString()+data.replace(/\D/g,''),
				'entrada_1': entradaPeriodo1,
				'entrada_2': entradaPeriodo2,
				'entrada_3': entradaPeriodo3,
				'entrada_4': entradaPeriodo4,
				'entrada_5': entradaPeriodo5,
				'saida_1'  : saidaPeriodo1,
				'saida_2'  : saidaPeriodo2,
				'saida_3'  : saidaPeriodo3,
				'saida_4'  : saidaPeriodo4,
				'saida_5'  : saidaPeriodo5
			};                        
			globalViewModel.submit("{{Route('salvar.timer2')}}", dadosPost,callback);
		} 


		self.visualizar = ko.computed(function()
		{            
			self.visuSaida1(self.entradaPeriodo1() != undefined && self.entradaPeriodo1()!= "" && self.entradaPeriodo1()!= "00:00:00"); 
			self.visuEntrada2(self.saidaPeriodo1() != undefined && self.saidaPeriodo1()  != "" && self.saidaPeriodo1()  != "00:00:00");
			self.visuSaida2(self.entradaPeriodo2() != undefined && self.entradaPeriodo2()!= "" && self.entradaPeriodo2()!= "00:00:00");
			self.visuEntrada3(self.saidaPeriodo2() != undefined && self.saidaPeriodo2()  != "" && self.saidaPeriodo2()  != "00:00:00");
			self.visuSaida3(self.entradaPeriodo3() != undefined && self.entradaPeriodo3()!= "" && self.entradaPeriodo3()!= "00:00:00");
			self.visuEntrada4(self.saidaPeriodo3() != undefined && self.saidaPeriodo3()  != "" && self.saidaPeriodo3()  != "00:00:00");
			self.visuSaida4(self.entradaPeriodo4() != undefined && self.entradaPeriodo4()!= "" && self.entradaPeriodo4()!= "00:00:00");
			self.visuEntrada5(self.saidaPeriodo4() != undefined && self.saidaPeriodo4()  != "" && self.saidaPeriodo4()  != "00:00:00");
			self.visuSaida5(self.entradaPeriodo5() != undefined && self.entradaPeriodo5()!= "" && self.entradaPeriodo5()!= "00:00:00");
			//
			self.focoEntrada1(self.visuEntrada1());
			self.focoSaida1(  self.visuSaida1());
			self.focoEntrada2(self.visuEntrada2());
			self.focoSaida2(  self.visuSaida2());
			self.focoEntrada3(self.visuEntrada3());
			self.focoSaida3(  self.visuSaida3());
			self.focoEntrada4(self.visuEntrada4());
			self.focoSaida4(  self.visuSaida4());
			self.focoEntrada5(self.visuEntrada5());
			self.focoSaida5(  self.visuSaida5()); 
		});
	}
			
//-----------------------------------------------------------------------------------------------------------------------
	function ViewModel()
	{
		var self = this;
		//		
		if (time.status == 0 || time.response == null) 
		{
			self.timer = new Timer("","","","","","","","","","");
		}
		else 
		{
			console.log(time);
			self.timer = new Timer( time.response.timer_id,
									 time.response.entrada_1,
									 time.response.entrada_2,
									 time.response.entrada_3,
									 time.response.entrada_4,
									 time.response.entrada_5,
									 time.response.saida_1,
									 time.response.saida_2,
									 time.response.saida_3,
									 time.response.saida_4,
									 time.response.saida_5
									);
		}
		self.limpar = function()
		{
			if(self.timer.entradaPeriodo1() == "00:00:00") self.timer.entradaPeriodo1(""); 
			if(self.timer.saidaPeriodo1()   == "00:00:00") self.timer.saidaPeriodo1("");
			if(self.timer.entradaPeriodo2() == "00:00:00") self.timer.entradaPeriodo2(""); 
			if(self.timer.saidaPeriodo2()   == "00:00:00") self.timer.saidaPeriodo2("");
			if(self.timer.entradaPeriodo3() == "00:00:00") self.timer.entradaPeriodo3(""); 
			if(self.timer.saidaPeriodo3()   == "00:00:00") self.timer.saidaPeriodo3("");
			if(self.timer.entradaPeriodo4() == "00:00:00") self.timer.entradaPeriodo4(""); 
			if(self.timer.saidaPeriodo4()   == "00:00:00") self.timer.saidaPeriodo4("");
			if(self.timer.entradaPeriodo5() == "00:00:00") self.timer.entradaPeriodo5(""); 
			if(self.timer.saidaPeriodo5()   == "00:00:00") self.timer.saidaPeriodo5("");   
		}  
		self.limpar();    
		self.focar = function()
		{
			setTimeout(function()
			{
				self.timer.focoEntrada1(self.timer.visuEntrada1());
				self.timer.focoSaida1(  self.timer.visuSaida1());
				self.timer.focoEntrada2(self.timer.visuEntrada2());
				self.timer.focoSaida2(  self.timer.visuSaida2());
				self.timer.focoEntrada3(self.timer.visuEntrada3());
				self.timer.focoSaida3(  self.timer.visuSaida3());
				self.timer.focoEntrada4(self.timer.visuEntrada4());
				self.timer.focoSaida4(  self.timer.visuSaida4());
				self.timer.focoEntrada5(self.timer.visuEntrada5());
				self.timer.focoSaida5(  self.timer.visuSaida5());
			}, 010);
		}
		self.focar();
	}
//-------------------------------------------------------------------------------------------------------------------------- 
	viewModel = new ViewModel;
	viewModel.focar();
	 //<input id="DOB" type="text" size="12" maxlength="8" data-bind="masked: BirthDate, mask: '99:99:99', placeholder: '00:00:00', valueUpdate: 'onKeyPress'"/>
	$(function(){
		ko.applyBindings(viewModel, document.getElementById('idtimer'));
	});
</script>

@stop