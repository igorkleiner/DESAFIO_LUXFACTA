@extends('layout.defaulttemplate')
@section('title','GRAFICO')
@section('content')

	<script type="text/javascript">
		var viewModel, diaSemana,data,hora,usuario,time, mask, placeholder;
		diaSemana = "{{date('D',time())}}";
		data = "{{date('Y-m-d',time())}}";    
		hora = "{{date('H:i:s:u',time())}}";          
		usuario = {{json_encode($usuario)}};   
		usuario['usu_id'] = {{$usuario->usu_id}};    
		grafico = {{json_encode($grafico)}};
		mask = '99:99:99';	
	</script>

	<div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 warning master borda1 " id='divTimer'  style="height: fit-content;">
		<div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 borda2 fundo-claro" style="border-radius: 30px" > 
			<div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
				<strong>
					<span data-bind=' relogio:agora, text:agora.data '></span>
					<span data-bind=' text:agora.hora'></span>
				</strong>			
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 text-center" >
				{{-- <button class="btn-lg btn-success" style="margin-top: 6px; height: 43px;" data-bind='click:total'>Total do dia</button> --}}
				{{-- <button class="btn-lg btn-success" style="margin-top: 6px; height: 43px;" data-bind='click:consolidado'>Consolidado dia</button> --}}
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<div style="width: 50px; margin-top: 15px;">
						<span>Olá </span> 
						<span data-bind='text:usuario'></span>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<div class="borda-redonda" style="margin-right: -10px">
						<img class="borda-redonda"  src="{{asset('assets/images/Capturar.png')}}" >
					</div>
				</div>
			</div>
		</div>
		<div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 borda2 fundo-claro" style="border-radius: 30px; margin-top: 15px; vertical-align: middle;padding: 20px;" > 
			<center>
				<div id="chartContainer"   class="borda" style="height: 250px; width: 100%; margin: 0px auto;border-radius: 10px"></div>
				<div id="chartContainerr"  class="borda" style="height: 250px; width: 100%; margin: 0px auto;border-radius: 10px"></div>
			</center>
		</div>		
	</div>
	<script type="text/javascript">
	//-----------Tempo-----------------------------------------------------------------------------------------------
		function Tempo(usuario,data,entrada_1,entrada_2,entrada_3,entrada_4,entrada_5,saida_1,saida_2,saida_3,saida_4,saida_5)
		{
			var self = this;
			self.data = data;
			self.entradaPeriodo1 = ko.observable(entrada_1);
			self.entradaPeriodo2 = ko.observable(entrada_2);
			self.entradaPeriodo3 = ko.observable(entrada_3);
			self.entradaPeriodo4 = ko.observable(entrada_4);
			self.entradaPeriodo5 = ko.observable(entrada_5);
			//
			self.saidaPeriodo1   = ko.observable(saida_1);
			self.saidaPeriodo2   = ko.observable(saida_2);
			self.saidaPeriodo3   = ko.observable(saida_3);
			self.saidaPeriodo4   = ko.observable(saida_4);
			self.saidaPeriodo5   = ko.observable(saida_5);
			//
			self.totalHorasPeriodo1      = ko.observable("00:00:00");
			self.totalHorasPeriodo2      = ko.observable("00:00:00");
			self.totalHorasPeriodo3      = ko.observable("00:00:00");
			self.totalHorasPeriodo4      = ko.observable("00:00:00");
			self.totalHorasPeriodo5      = ko.observable("00:00:00");
			self.horasTotais             = ko.observable("00:00:00");
			//
			self.agora = new Relogio();

			self.validaSaida             = function(entrada,saida){
	        	if (entrada != "00:00:00"  && saida == "00:00:00" )
					return "00:00:00";
				return saida;
	        }
			self.dateDiff                = function (date1, date2)
			{
				tempoEntrada = date1.split(':');                                
				var entrada = new Date();
				entrada.setHours(tempoEntrada[0]);
				entrada.setMinutes(tempoEntrada[1]);
				entrada.setSeconds(tempoEntrada[2]); 
				  
				tempoSaida = date2.split(':');                
				var saida = new Date();
				saida.setHours(tempoSaida[0]);
				saida.setMinutes(tempoSaida[1]);
				saida.setSeconds(tempoSaida[2]);  

				var compara = new Date();
				
				if(saida.getTime() <= entrada.getTime()) //|| entrada.getTime() > compara.getTime() )
				{                
					return '00:00:00';
				}
				
				var diff = saida - entrada, sign = diff < 0 ? -1 : 1, milliseconds, seconds, minutes, hours, days;

				if (isNaN(diff))
				{ 
					return '00:00:00';
				}
				
				try
				{                
					diff /= sign; 
					diff = ( diff - ( milliseconds = diff % 1000 )) / 1000;
					diff = ( diff - ( seconds      = diff % 60   )) / 60;
					diff = ( diff - ( minutes      = diff % 60   )) / 60;
					days = ( diff - ( hours        = diff % 24   )) / 24;
					daysInHours = ( diff - ( hours = diff % 24   ));

					hours += daysInHours;
					hours   = hours.toString().length   == 1 ? '0'+hours   : hours;
					minutes = minutes.toString().length == 1 ? '0'+minutes : minutes;
					seconds = seconds.toString().length == 1 ? '0'+seconds : seconds;
					
					return hours+':'+minutes+':'+seconds;
				}
				catch(ex)
				{
					return '00:00:00';
				}
			};
			//
			self.timeAdd                 = function (time1, time2, time3, time4, time5)
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
					while (segundos > 59) {segundos = segundos - 60; minutos = minutos + 1;}
					while (minutos > 59)  {minutos  = minutos  - 60; horas   = horas   + 1;}          
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
			//

			self.masterComputed          = ko.computed(function()
			{
				self.totalHorasPeriodo1(self.dateDiff(self.entradaPeriodo1(), self.validaSaida(self.entradaPeriodo1(),self.saidaPeriodo1())))
				self.totalHorasPeriodo2(self.dateDiff(self.entradaPeriodo2(), self.validaSaida(self.entradaPeriodo2(),self.saidaPeriodo2())))
				self.totalHorasPeriodo3(self.dateDiff(self.entradaPeriodo3(), self.validaSaida(self.entradaPeriodo3(),self.saidaPeriodo3())))
				self.totalHorasPeriodo4(self.dateDiff(self.entradaPeriodo4(), self.validaSaida(self.entradaPeriodo4(),self.saidaPeriodo4())))
				self.totalHorasPeriodo5(self.dateDiff(self.entradaPeriodo5(), self.validaSaida(self.entradaPeriodo5(),self.saidaPeriodo5())))
				self.horasTotais(self.timeAdd(self.totalHorasPeriodo1(), self.totalHorasPeriodo2(), self.totalHorasPeriodo3(), self.totalHorasPeriodo4(), self.totalHorasPeriodo5()));
				
			});		
		}				
	//-----------ViewModel-------------------------------------------------------------------------------------------
		function ViewModel()
		{
			var self = this;
			self.agora                = new Relogio();
			self.usuario              = ko.observable(usuario.usu_nome);
			self.tempos               = [];	
			self.dadosGrafico         = [];
			self.dadosGrafico2        = [];
			self.dadosGrafico2["Tp1"] = [];
			self.dadosGrafico2["Tp2"] = [];
			self.dadosGrafico2["Tp3"] = [];
			self.dadosGrafico2["Tp4"] = [];
			self.dadosGrafico2["Tp5"] = [];

			self.periodo = function(data,periodo){
				Tmp = periodo.split(':');
                var horas = new Date(data);
				horas.setHours(Tmp[0]);
				horas.setMinutes(Tmp[1]);
				horas.setSeconds(Tmp[2]);
				var a = horas.getHours()  <10 ? '0'+horas.getHours() : horas.getHours();
				var b = parseInt((parseInt(horas.getMinutes())/60)*100);
				
				return	{ y: parseFloat(a+'.'+ ( b<10? '0'+b :b)) , label: data.toString() };
			}

			if (grafico.status != 0 && grafico.response != null) 
			{
				ko.utils.arrayForEach(grafico.response,function(tempo)
                {
                    self.tempos.push(
						new Tempo(
							tempo.usu_id,
							tempo.data.split(" ")[0],
							tempo.entrada_1.split(" ")[1],
							tempo.entrada_2.split(" ")[1],
							tempo.entrada_3.split(" ")[1],
							tempo.entrada_4.split(" ")[1],
							tempo.entrada_5.split(" ")[1],
							tempo.saida_1.split(" ")[1],
							tempo.saida_2.split(" ")[1],
							tempo.saida_3.split(" ")[1],
							tempo.saida_4.split(" ")[1],
							tempo.saida_5.split(" ")[1]
						)
                    );
                });
                //
                ko.utils.arrayForEach(self.tempos,function(dia)
                {
     				self.dadosGrafico.push(self.periodo(dia.data,dia.horasTotais()));
     				self.dadosGrafico2["Tp1"].push(self.periodo(dia.data,dia.totalHorasPeriodo1()));
     				self.dadosGrafico2["Tp2"].push(self.periodo(dia.data,dia.totalHorasPeriodo2()));
     				self.dadosGrafico2["Tp3"].push(self.periodo(dia.data,dia.totalHorasPeriodo3()));
     				self.dadosGrafico2["Tp4"].push(self.periodo(dia.data,dia.totalHorasPeriodo4()));
     				self.dadosGrafico2["Tp5"].push(self.periodo(dia.data,dia.totalHorasPeriodo5()));
                });
                //
				//======= grafico 1 =========================================================================================
					var chart = new CanvasJS.Chart("chartContainer", 
					{
						theme: "light2", 
						animationEnabled: true,
						title:{
							text: "Gráfico de Horas/Dia"
						},						
						axisX:{
							interval: 1
						},
						axisY:{
							title: "Horas",
							interval: 1,
						},

						data:[{
							type: "column",
							dataPoints:self.dadosGrafico 
						}]
					});	  
					chart.render();  						
				//======= grafico 2 ===========================================================================================
					var chart1 = new CanvasJS.Chart("chartContainerr", 
					{
						zoomEnabled: true,
      					panEnabled: true,
						animationEnabled: true,
						title:{
							text: "Horas - Consolidadas por Periodo",
							fontFamily: "arial black",
							fontColor: "#3a3a3a"
						},
						axisX: {
							interval: 1,
							intervalType: "day"
						},
						axisY:{
							title: "Horas",
							interval: 1,
						},
						toolTip: {
							shared: true,
							content: toolTipContent
						},
						data: 
						[
							{
								type: "stackedColumn",
								showInLegend: true,
								color: "#8e7aa3",
								name: "Periodo_1",
								// indexLabel: "#total h",
								dataPoints: self.dadosGrafico2.Tp1
							},
							{        
								type: "stackedColumn",
								showInLegend: true,
								name: "Periodo_2",
								color: "#51cda0",
								dataPoints: self.dadosGrafico2.Tp2							
							},
							{        
								type: "stackedColumn",
								showInLegend: true,
								name: "Periodo_3",
								color: "#5592ad",
								dataPoints: self.dadosGrafico2.Tp3
							},
							{        
								type: "stackedColumn",
								showInLegend: true,
								name: "Periodo_4",
								color: "#c9d45c",
								dataPoints: self.dadosGrafico2.Tp4
							},
							{        
								type: "stackedColumn",
								showInLegend: true,
								name: "Periodo_5",
								color: "#ae7d99",
								dataPoints: self.dadosGrafico2.Tp5
							}
						]
					});
					chart1.render();
				//=============================================================================================================

					function toolTipContent(e) 
					{
						var head = "<span style = \"color:Tomato\">Horas em formato decimal</span><strong></strong><br/>";
						var body = "";
						var total = 0;
						var data, foot;
						for (var i = 0; i < e.entries.length; i++)
						{
							var  tmp = 
								"<span style= \"color:"+e.entries[i].dataSeries.color + "\"> "
								+e.entries[i].dataSeries.name+"</span>: <strong>"
								+e.entries[i].dataPoint.y+"</strong> Hs<br/>"
							;

							total = e.entries[i].dataPoint.y + total;
							body = body.concat(tmp);
						}
						data = "<span style = \"color:DodgerBlue;\"><strong>Data: "+(e.entries[0].dataPoint.label)+"</strong></span><br/>";
						total = Math.round(total * 100) / 100;
						foot = "<span style = \"color:Tomato\">Total:</span><strong>"+total+"</strong>h<br/>";
						return head.concat(data).concat(body).concat(foot);
					}
			}					
			
		}
	//---------------------------------------------------------------------------------------------------------------
		viewModel = new ViewModel;

		$(function(){
			ko.applyBindings(viewModel, document.getElementById('divTimer'));
		});
	//---------------------------------------------------------------------------------------------------------------

	</script>
@stop