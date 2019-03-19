@extends('layout.defaulttemplate')
@section('title','OFFICE')
@section('content')

	<script type="text/javascript">
		var viewModel, diaSemana,data,hora,usuario,time, mask;
		diaSemana = "{{date('D',time())}}";
		data = "{{date('Y-m-d',time())}}";    
		hora = "{{date('H:i:s:u',time())}}";          
		usuario = {{json_encode($usuario)}};   
		usuario['usu_id'] = {{$usuario->usu_id}};    
		time = {{json_encode($time)}};
		mask = '99:99:99';	
	</script>

	<div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 warning master borda1 " id='divTimer' data-bind='with:timer'>
	    <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 borda2 fundo-claro" style="border-radius: 30px">
	        <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
	            <strong>
	                <span data-bind=' relogio:agora, text:agora.data '></span>
	                <span data-bind=' text:agora.hora'></span>
	            </strong>
	        </div>
	        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 text-center">
	            <button class="btn-lg btn-success" style="margin-top: 3px;" data-bind='click:salvar'>Salvar</button>
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
	                    <img class="borda-redonda" src="{{asset('assets/images/Capturar.png')}}">
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- PERIODO 1 -->
		    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 borda1 borda2 fundo-claro " style="margin-top: 10px;">
		        <div class="row">
		            <div class="col-sm-6 col-md-4" data-bind='visible:visuEntrada1'>
		                <div class="thumbnail">
		                    <div class="caption" style="display: inline-block;">
		                        <h3>Entrada do periodo 1</h3>
		                        <horario params="value:entradaPeriodo1,mask:mask, visible:visuEntrada1,hasFocus:focoEntrada1"></horario>
		                        <button class='btn btn-success' data-bind='click: setTime.bind($data,"entradaPeriodo1"), visible:visuEntrada1'>Set Now</button>
		                    </div>
		                </div>
		            </div>
		            <div class="col-sm-6 col-md-4">
		                <div class="thumbnail" data-bind='visible:visuSaida1'>
		                    <div class="caption" style="display: inline-block;">
		                        <h3>Saida do periodo 1</h3>
		                        <horario params="value:saidaPeriodo1,mask:mask, visible:visuSaida1,hasFocus:focoSaida1"></horario>
		                        <button class='btn btn-danger' data-bind='click: setTime.bind($data,"saidaPeriodo1"), visible:visuSaida1'>Set Now</button>
		                    </div>
		                </div>
		            </div>
		            <div class="col-sm-6 col-md-4 direita" data-bind='visible:visuEntrada1'>
		                <div class="thumbnail">
		                    <div class="caption">
		                        <div class="row " style="text-align: center;;margin-top: -25px;">
		                            <h3>Dados do periodo 1</h3>
		                        </div>
		                        <div class="row">
		                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: center">
		                                <h5>Total desse período</h5>
		                                <h4><strong><span data-bind='text:totalHorasPeriodo1'></span></strong></h4>
		                            </div>
		                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: center">
		                                <h5>Ausencia Transitória</h5>
		                                <h4><strong><span data-bind='text:totalAusenciaPeriodo12'></span></strong></h4>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
	    <!-- PERIODO 2 -->
		    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 borda1 borda2 fundo-claro" style="margin-top: 10px;" data-bind='visible:visuEntrada2'>
		        <div class="row">
		            <div class="col-sm-6 col-md-4" data-bind='visible:visuEntrada2'>
		                <div class="thumbnail">
		                    <div class="caption" style="display: inline-block;">
		                        <h3>Entrada do periodo 2</h3>
		                        <horario params="value:entradaPeriodo2,mask:mask, visible:visuEntrada2,hasFocus:focoEntrada2"></horario>
		                        <button class='btn btn-success' data-bind='click: setTime.bind($data,"entradaPeriodo2"), visible:visuEntrada2'>Set Now</button>
		                    </div>
		                </div>
		            </div>
		            <div class="col-sm-6 col-md-4">
		                <div class="thumbnail" data-bind='visible:visuSaida2'>
		                    <div class="caption" style="display: inline-block;">
		                        <h3>Saida do periodo 2</h3>
		                        <horario params="value:saidaPeriodo2,mask:mask, visible:visuSaida2,hasFocus:focoSaida2"></horario>
		                        <button class='btn btn-danger' data-bind='click: setTime.bind($data,"saidaPeriodo2"), visible:visuSaida2'>Set Now</button>
		                    </div>
		                </div>
		            </div>
		            <div class="col-sm-6 col-md-4 direita" data-bind='visible:visuEntrada2'>
		                <div class="thumbnail">
		                    <div class="caption">
		                        <div class="row " style="text-align: center; margin-top: -25px;">
		                            <h3>Dados do periodo 2</h3>
		                        </div>
		                        <div class="row">
		                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: center">
		                                <h5>Total desse período</h5>
		                                <h4><strong><span data-bind='text:totalHorasPeriodo2'></span></strong></h4>
		                            </div>
		                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: center">
		                                <h5>Ausencia Transitória</h5>
		                                <h4><strong><span data-bind='text:totalAusenciaPeriodo23'></span></strong></h4>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
	    <!-- PERIODO 3 -->
		    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 borda1 borda2 fundo-claro" style="margin-top: 10px;" data-bind='visible:visuEntrada3'>
		        <div class="row">
		            <div class="col-sm-6 col-md-4" data-bind='visible:visuEntrada3'>
		                <div class="thumbnail">
		                    <div class="caption" style="display: inline-block;">
		                        <h3>Entrada do periodo 3</h3>
		                        <horario params="value:entradaPeriodo3,mask:mask, visible:visuEntrada3,hasFocus:focoEntrada3"></horario>
		                        <button class='btn btn-success' data-bind='click: setTime.bind($data,"entradaPeriodo3"), visible:visuEntrada3'>Set Now</button>
		                    </div>
		                </div>
		            </div>
		            <div class="col-sm-6 col-md-4">
		                <div class="thumbnail" data-bind='visible:visuSaida3'>
		                    <div class="caption" style="display: inline-block;">
		                        <h3>Saida do periodo 3</h3>
		                        <horario params="value:saidaPeriodo3,mask:mask, visible:visuSaida3,hasFocus:focoSaida3"></horario>
		                        <button class='btn btn-danger' data-bind='click: setTime.bind($data,"saidaPeriodo3"), visible:visuSaida3'>Set Now</button>
		                    </div>
		                </div>
		            </div>
		            <div class="col-sm-6 col-md-4 direita" data-bind='visible:visuEntrada3'>
		                <div class="thumbnail">
		                    <div class="caption">
		                        <div class="row " style="text-align: center; margin-top: -25px;">
		                            <h3>Dados do periodo 3</h3>
		                        </div>
		                        <div class="row">
		                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: center">
		                                <h5>Total desse período</h5>
		                                <h4><strong><span data-bind='text:totalHorasPeriodo3'></span></strong></h4>
		                            </div>
		                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: center">
		                                <h5>Ausencia Transitória</h5>
		                                <h4><strong><span data-bind='text:totalAusenciaPeriodo34'></span></strong></h4>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
	    <!-- PERIODO 4 -->
		    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 borda1 borda2 fundo-claro" style="margin-top: 10px;" data-bind='visible:visuEntrada4'>
		        <div class="row">
		            <div class="col-sm-6 col-md-4" data-bind='visible:visuEntrada4'>
		                <div class="thumbnail">
		                    <div class="caption" style="display: inline-block;">
		                        <h3>Entrada do periodo 4</h3>
		                        <horario params="value:entradaPeriodo4,mask:mask, visible:visuEntrada4,hasFocus:focoEntrada4"></horario>
		                        <button class='btn btn-success' data-bind='click: setTime.bind($data,"entradaPeriodo4"), visible:visuEntrada4'>Set Now</button>
		                    </div>
		                </div>
		            </div>
		            <div class="col-sm-6 col-md-4">
		                <div class="thumbnail" data-bind='visible:visuSaida4'>
		                    <div class="caption" style="display: inline-block;">
		                        <h3>Saida do periodo 4</h3>
		                        <horario params="value:saidaPeriodo4,mask:mask, visible:visuSaida4,hasFocus:focoSaida4"></horario>
		                        <button class='btn btn-danger' data-bind='click: setTime.bind($data,"saidaPeriodo4"), visible:visuSaida4'>Set Now</button>
		                    </div>
		                </div>
		            </div>
		            <div class="col-sm-6 col-md-4 direita" data-bind='visible:visuEntrada4'>
		                <div class="thumbnail">
		                    <div class="caption">
		                        <div class="row " style="text-align: center; margin-top: -25px;">
		                            <h3>Dados do periodo 4</h3>
		                        </div>
		                        <div class="row">
		                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: center">
		                                <h5>Total desse período</h5>
		                                <h4><strong><span data-bind='text:totalHorasPeriodo4'></span></strong></h4>
		                            </div>
		                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: center">
		                                <h5>Ausencia Transitória</h5>
		                                <h4><strong><span data-bind='text:totalAusenciaPeriodo45'></span></strong></h4>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
	    <!-- PERIODO 5 -->
		    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 borda1 borda2 fundo-claro" style="margin-top: 10px;" data-bind='visible:visuEntrada5'>
		        <div class="row">
		            <div class="col-sm-6 col-md-4" data-bind='visible:visuEntrada5'>
		                <div class="thumbnail">
		                    <div class="caption" style="display: inline-block;">
		                        <h3>Entrada do periodo 5</h3>
		                        <horario params="value:entradaPeriodo5,mask:mask, visible:visuEntrada5,hasFocus:focoEntrada5"></horario>
		                        <button class='btn btn-success' data-bind='click: setTime.bind($data,"entradaPeriodo5"), visible:visuEntrada5'>Set Now</button>
		                    </div>
		                </div>
		            </div>
		            <div class="col-sm-6 col-md-4">
		                <div class="thumbnail" data-bind='visible:visuSaida5'>
		                    <div class="caption" style="display: inline-block;">
		                        <h3>Saida do periodo 5</h3>
		                        <horario params="value:saidaPeriodo5,mask:mask, visible:visuSaida5,hasFocus:focoSaida5"></horario>
		                        <button class='btn btn-danger' data-bind='click: setTime.bind($data,"saidaPeriodo5"), visible:visuSaida5'>Set Now</button>
		                    </div>
		                </div>
		            </div>
		            <div class="col-sm-6 col-md-4 direita" data-bind='visible:visuEntrada5'>
		                <div class="thumbnail">
		                    <div class="caption">
		                        <div class="row " style="text-align: center;">
		                            <h3>Dados do periodo 5</h3>
		                            <h5>Total desse período</h5>
		                            <h4><strong><span data-bind='text:totalHorasPeriodo5'></span></strong></h4>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
	    <!-- TOTAIS -->
	    <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 borda1 borda2 fundo-claro " style="margin-top: 10px;">
	        <div class="row">
	            <div class=" col-sm-6 col-md-4  borda 2">
	                <div class="thumbnail " style="max-height: 150px;">
	                    <div class="caption">
	                        <div class="row " style="text-align: center">
	                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: center">
	                                <h3>Saída</h3>
	                            </div>
	                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: center">
	                                <h5>Previsão de Saída</h5>
	                                <h4><strong><span data-bind='text:previsaoSaida'></span></strong></h4>
	                            </div>

	                        </div>
	                        <div class="row">
	                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: center">
	                                <h5>Tempo Restante</h5>
	                                <h4><strong><span data-bind='text:horasRestantes'></span></strong></h4>
	                            </div>
	                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: center">
	                                <h5>Total até agora</h5>
	                                <h4><strong><span data-bind='text:totalTrabalhadoAteAgora'></span></strong></h4>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class=" ccol-sm-6 col-md-4 ">
	                <div class="thumbnail" style="max-height: 150px;">
	                    <div class="caption">
	                        <div class="row " style="text-align: center">
	                            <h3>Horas extras</h3>
	                        </div>
	                        <div class="row">
	                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: center">
	                                <h5>Previsão de Extras</h5>
	                                <h4>
	                                    <strong>
	                                        <span data-bind='text:previsaoHorasExtras'></span>
	                                    </strong>
	                                </h4>
	                            </div>
	                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: center">
	                                <h5>Total Horas Extras</h5>
	                                <h4><strong><span data-bind='text:horasExtras'></span></strong></h4>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-6 col-md-4 direita">
	                <div class="thumbnail" style="max-height: 150px;">
	                    <div class="caption">
	                        <div class="row " style="text-align: center">
	                            <h3>Total do Dia</h3>
	                        </div>
	                        <div class="row">
	                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: center">
	                                <h5>Total de Horas </h5>
	                                <h4><strong><span data-bind='text:horasTotais'></span></strong></h4>
	                            </div>
	                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: center">
	                                <h5>Total deAusencias </h5>
	                                <h4><strong><span data-bind='text:totalAusencias'></span></strong></h4>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

	<script type="text/javascript">
		//--TIMER----------------------------------------------------------------------------------------------------------------
			function Timer(timer_id,entrada1,saida1,entrada2,saida2,entrada3,saida3,entrada4,saida4,entrada5,saida5)
			{
				var self                         = this;
				//  ID E USER
					self.timerId                 = ko.observable(timer_id);
					self.usuario                 = ko.observable(usuario.usu_nome);
				//  VISIBLES
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
				//  FOCOS
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
				//  ENTRADAS ? SAIDAS ?
					self.entradaPeriodo1         = ko.observable(moment(entrada1,"YYYY-MM-DD HH:mm:ss" ));
					self.saidaPeriodo1           = ko.observable(moment(saida1  ,"YYYY-MM-DD HH:mm:ss" ));

					self.entradaPeriodo2         = ko.observable(moment(entrada2,"YYYY-MM-DD HH:mm:ss" ));
					self.saidaPeriodo2           = ko.observable(moment(saida2  ,"YYYY-MM-DD HH:mm:ss" ));

					self.entradaPeriodo3         = ko.observable(moment(entrada3,"YYYY-MM-DD HH:mm:ss" ));
					self.saidaPeriodo3           = ko.observable(moment(saida3  ,"YYYY-MM-DD HH:mm:ss" ));

					self.entradaPeriodo4         = ko.observable(moment(entrada4,"YYYY-MM-DD HH:mm:ss" ));
					self.saidaPeriodo4           = ko.observable(moment(saida4  ,"YYYY-MM-DD HH:mm:ss" ));

					self.entradaPeriodo5         = ko.observable(moment(entrada5,"YYYY-MM-DD HH:mm:ss" ));
					self.saidaPeriodo5           = ko.observable(moment(saida5  ,"YYYY-MM-DD HH:mm:ss" ));
				// INSTANCIA DOS TOTAIS
					self.agora                   = new Relogio();
					self.horasContratadas        = ko.observable("08:00:00");
					self.saidaMinima             = ko.observable("16:00:00");
					self.previsaoHorasExtras     = ko.observable("00:00:00");
					self.totalHorasPeriodo1      = ko.observable("00:00:00");
					self.totalHorasPeriodo2      = ko.observable("00:00:00");
					self.totalHorasPeriodo3      = ko.observable("00:00:00");
					self.totalHorasPeriodo4      = ko.observable("00:00:00");
					self.totalHorasPeriodo5      = ko.observable("00:00:00");
					self.totalAusenciaPeriodo12  = ko.observable("00:00:00");
					self.totalAusenciaPeriodo23  = ko.observable("00:00:00");
					self.totalAusenciaPeriodo34  = ko.observable("00:00:00");
					self.totalAusenciaPeriodo45  = ko.observable("00:00:00");
					self.horasTotais             = ko.observable("00:00:00");
					self.totalAusencias          = ko.observable("00:00:00");
					self.horasExtras             = ko.observable("00:00:00");
					self.horasRestantes          = ko.observable("00:00:00");
					self.totalTrabalhadoAteAgora = ko.observable("00:00:00");
					self.previsaoSaida           = ko.observable("00:00:00");   
				//  CALCULOS
					self.dateDiff                = function (entrada, saida)
					{

						if(!!entrada && !!saida && (entrada < saida))
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
					self.timeAdd                 = function (time1, time2, time3, time4, time5)
					{
						try
						{
							time1 = time1.split(':');
							time2 = time2.split(':');
							time3 = time3.split(':');
							time4 = time4.split(':');
							time5 = time5.split(':');

							var horas    = parseFloat(time1[0]) + parseFloat(time2[0]) + parseFloat(time3[0]) + parseFloat(time4[0]) + parseFloat(time5[0]);
							var minutos  = parseFloat(time1[1]) + parseFloat(time2[1]) + parseFloat(time3[1]) + parseFloat(time4[1]) + parseFloat(time5[1]);
							var segundos = parseFloat(time1[2]) + parseFloat(time2[2]) + parseFloat(time3[2]) + parseFloat(time4[2]) + parseFloat(time5[2]);

							while (segundos > 59) {segundos = segundos - 60; minutos ++;}
							while (minutos > 59)  {minutos  = minutos  - 60; horas   ++;}
							if (horas    < 10) horas    = "0"+ horas.toString();
							if (minutos  < 10) minutos  = "0"+ minutos.toString();
							if (segundos < 10) segundos = "0"+ segundos.toString();
							return horas+':'+minutos+':'+segundos;
						}
						catch(ex)
						{
							console.log("entrei no catch do timeadd");
							console.log(ex);
							return '00:00:00';
						}
					};
					self.timeDiff                = function(antes,depois)
					{
						if (moment(moment().format('YYYY-MM-DD ')+antes) > moment(moment().format('YYYY-MM-DD ')+depois) )
						{
							try
							{
								time1 = antes.split(':');
								time2 = depois.split(':');

								var horas    = parseFloat(time1[0]) - parseFloat(time2[0]);
								var minutos  = parseFloat(time1[1]) - parseFloat(time2[1]);
								var segundos = parseFloat(time1[2]) - parseFloat(time2[2]);
								while (segundos < 0 ) {segundos = segundos + 60; minutos --;}
								while (minutos  < 0 ) {minutos  = minutos  + 60; horas   --;}

								if (horas    < 10) horas    = "0"+ horas.toString();
								if (minutos  < 10) minutos  = "0"+ minutos.toString();
								if (segundos < 10) segundos = "0"+ segundos.toString();

								return `${horas}:${minutos}:${segundos}`;
							}
							catch(ex)
							{
								console.log(ex);
								return '00:00:00';
							}
						}
						else
						{
							return '00:00:00';
						}
					}
			    //  FUNÇÕES
			        self.setTime                 = function(e)
			        {
			            if(typeof(e) != 'function')
			                self[e](moment());
			        };
			        self.validaSaida             = function(entrada,saida){
			        	if (entrada.format('HH:mm:ss') != "00:00:00"  && saida.format('HH:mm:ss') == "00:00:00" )
							return moment().format('YYYY-MM-DD')+ " " +self.agora.hora();
						return saida.format("YYYY-MM-DD HH:mm:ss");
			        }
			        self.salvar                  = function()
					{
						var callback = function(result)
						{
							if(result.status)
							{  
								alert("Salvo com sucesso");                      
							}
							else
							{
								alert(result);
							}
						} 
						var dadosPost = 
						{
							'data'     : data,
							"usu_id"   : usuario['usu_id'],
							'timer_id' : self.timerId(),
							'entrada_1': self.entradaPeriodo1().format("YYYY-MM-DD HH:mm:ss"),
							'saida_1'  : self.saidaPeriodo1().format("YYYY-MM-DD HH:mm:ss"),
							'entrada_2': self.entradaPeriodo2().format("YYYY-MM-DD HH:mm:ss"),
							'saida_2'  : self.saidaPeriodo2().format("YYYY-MM-DD HH:mm:ss"),
							'entrada_3': self.entradaPeriodo3().format("YYYY-MM-DD HH:mm:ss"),
							'saida_3'  : self.saidaPeriodo3().format("YYYY-MM-DD HH:mm:ss"),
							'entrada_4': self.entradaPeriodo4().format("YYYY-MM-DD HH:mm:ss"),
							'saida_4'  : self.saidaPeriodo4().format("YYYY-MM-DD HH:mm:ss"),
							'entrada_5': self.entradaPeriodo5().format("YYYY-MM-DD HH:mm:ss"),
							'saida_5'  : self.saidaPeriodo5().format("YYYY-MM-DD HH:mm:ss")
						};    
						globalViewModel.submit("{{Route('salvar.timer2')}}", dadosPost,callback);
					} 
					self.visualizar              = ko.computed(function()
					{
						self.focoEntrada1(self.visuEntrada1());
						self.focoSaida1(self.visuSaida1(self.entradaPeriodo1().format('HH:mm:ss')!= "00:00:00"));
						self.focoEntrada2(self.visuEntrada2(self.saidaPeriodo1().format('HH:mm:ss')  != "00:00:00"));
						self.focoSaida2(self.visuSaida2(self.entradaPeriodo2().format('HH:mm:ss')!= "00:00:00"));
						self.focoEntrada3(self.visuEntrada3(self.saidaPeriodo2().format('HH:mm:ss')  != "00:00:00"));
						self.focoSaida3(self.visuSaida3(self.entradaPeriodo3().format('HH:mm:ss')!= "00:00:00"));
						self.focoEntrada4(self.visuEntrada4(self.saidaPeriodo3().format('HH:mm:ss')  != "00:00:00"));
						self.focoSaida4(self.visuSaida4(self.entradaPeriodo4().format('HH:mm:ss')!= "00:00:00"));
						self.focoEntrada5(self.visuEntrada5(self.saidaPeriodo4().format('HH:mm:ss')  != "00:00:00"));
						self.focoSaida5(self.visuSaida5(self.entradaPeriodo5().format('HH:mm:ss')!= "00:00:00"));
					});
			    //	COMPUTED CORE DOS CALCULOS
					self.masterComputed          = ko.computed(function()
					{
						self.totalHorasPeriodo1(self.dateDiff(self.entradaPeriodo1().format("YYYY-MM-DD HH:mm:ss"), self.validaSaida(self.entradaPeriodo1(),self.saidaPeriodo1())))
						self.totalHorasPeriodo2(self.dateDiff(self.entradaPeriodo2().format("YYYY-MM-DD HH:mm:ss"), self.validaSaida(self.entradaPeriodo2(),self.saidaPeriodo2())))
						self.totalHorasPeriodo3(self.dateDiff(self.entradaPeriodo3().format("YYYY-MM-DD HH:mm:ss"), self.validaSaida(self.entradaPeriodo3(),self.saidaPeriodo3())))
						self.totalHorasPeriodo4(self.dateDiff(self.entradaPeriodo4().format("YYYY-MM-DD HH:mm:ss"), self.validaSaida(self.entradaPeriodo4(),self.saidaPeriodo4())))
						self.totalHorasPeriodo5(self.dateDiff(self.entradaPeriodo5().format("YYYY-MM-DD HH:mm:ss"), self.validaSaida(self.entradaPeriodo5(),self.saidaPeriodo5())))
						
						self.totalAusenciaPeriodo12(self.dateDiff(self.saidaPeriodo1().format("YYYY-MM-DD HH:mm:ss"), self.validaSaida(self.saidaPeriodo1(),self.entradaPeriodo2())))
						self.totalAusenciaPeriodo23(self.dateDiff(self.saidaPeriodo2().format("YYYY-MM-DD HH:mm:ss"), self.validaSaida(self.saidaPeriodo2(),self.entradaPeriodo3())))
						self.totalAusenciaPeriodo34(self.dateDiff(self.saidaPeriodo3().format("YYYY-MM-DD HH:mm:ss"), self.validaSaida(self.saidaPeriodo3(),self.entradaPeriodo4())))
						self.totalAusenciaPeriodo45(self.dateDiff(self.saidaPeriodo4().format("YYYY-MM-DD HH:mm:ss"), self.validaSaida(self.saidaPeriodo4(),self.entradaPeriodo5())))
						
						self.horasTotais(self.timeAdd(self.totalHorasPeriodo1(), self.totalHorasPeriodo2(), self.totalHorasPeriodo3(), self.totalHorasPeriodo4(), self.totalHorasPeriodo5()));
						self.totalAusencias(self.timeAdd(self.totalAusenciaPeriodo12(),self.totalAusenciaPeriodo23(),self.totalAusenciaPeriodo34(),self.totalAusenciaPeriodo45(),"00:00:00"));
						
						if (self.entradaPeriodo1()._isValid && self.entradaPeriodo1().format('HH:mm:ss') != "00:00:00") {
			                var compara = moment();

			                if (self.entradaPeriodo1() < compara && self.saidaPeriodo1() < compara){ total1 = self.totalHorasPeriodo1();} else {if (self.entradaPeriodo1() < compara && self.saidaPeriodo1() > compara) {total1 = self.dateDiff(self.entradaPeriodo1().format("YYYY-MM-DD HH:mm:ss"), moment().format("YYYY-MM-DD ")+self.agora.hora());} else {total1 = "00:00:00";}}
			                if (self.entradaPeriodo2() < compara && self.saidaPeriodo2() < compara){ total2 = self.totalHorasPeriodo2();} else {if (self.entradaPeriodo2() < compara && self.saidaPeriodo2() > compara) {total2 = self.dateDiff(self.entradaPeriodo2().format("YYYY-MM-DD HH:mm:ss"), moment().format("YYYY-MM-DD ")+self.agora.hora());} else {total2 = "00:00:00";}}
			                if (self.entradaPeriodo3() < compara && self.saidaPeriodo3() < compara){ total3 = self.totalHorasPeriodo3();} else {if (self.entradaPeriodo3() < compara && self.saidaPeriodo3() > compara) {total3 = self.dateDiff(self.entradaPeriodo3().format("YYYY-MM-DD HH:mm:ss"), moment().format("YYYY-MM-DD ")+self.agora.hora());} else {total3 = "00:00:00";}}
			                if (self.entradaPeriodo4() < compara && self.saidaPeriodo4() < compara){ total4 = self.totalHorasPeriodo4();} else {if (self.entradaPeriodo4() < compara && self.saidaPeriodo4() > compara) {total4 = self.dateDiff(self.entradaPeriodo4().format("YYYY-MM-DD HH:mm:ss"), moment().format("YYYY-MM-DD ")+self.agora.hora());} else {total4 = "00:00:00";}}
			                if (self.entradaPeriodo5() < compara && self.saidaPeriodo5() < compara){ total5 = self.totalHorasPeriodo5();} else {if (self.entradaPeriodo5() < compara && self.saidaPeriodo5() > compara) {total5 = self.dateDiff(self.entradaPeriodo5().format("YYYY-MM-DD HH:mm:ss"), moment().format("YYYY-MM-DD ")+self.agora.hora());} else {total5 = "00:00:00";}}

			                self.totalTrabalhadoAteAgora(self.timeAdd(total1, total2, total3, total4, total5));
			            } else {
			                self.totalTrabalhadoAteAgora("00:00:00");
			            }

						self.horasRestantes(self.timeDiff(self.horasContratadas(),self.totalTrabalhadoAteAgora()));
						self.horasExtras(self.timeDiff(self.horasTotais(),self.horasContratadas()));

						var previsao = self.timeAdd(self.agora.hora(),self.horasRestantes(),self.previsaoHorasExtras(),"00:00:00","00:00:00");
						previsao = previsao.split(":");
						if (parseFloat(previsao[0]) > 24) 
							previsao[0] = previsao[0]-24;
						if (previsao[0] < 10)             
							previsao[0] = "0" + previsao[0].toString();
						self.previsaoSaida(previsao[0]+":"+previsao[1].toString()+":"+previsao[2].toString());
					});		
			}
		//--VIEW MODEL-----------------------------------------------------------------------------------------------------------
			function ViewModel()
			{
				var self = this;
				if (time.status == 0 || time.response == null) 
				{
					self.timer = new Timer(
						'',
						moment().set({hour:0,minute:0,second:0}).format("YYYY-MM-DD HH:mm:ss"),
						moment().set({hour:0,minute:0,second:0}).format("YYYY-MM-DD HH:mm:ss"),
						moment().set({hour:0,minute:0,second:0}).format("YYYY-MM-DD HH:mm:ss"),
						moment().set({hour:0,minute:0,second:0}).format("YYYY-MM-DD HH:mm:ss"),
						moment().set({hour:0,minute:0,second:0}).format("YYYY-MM-DD HH:mm:ss"),
						moment().set({hour:0,minute:0,second:0}).format("YYYY-MM-DD HH:mm:ss"),
						moment().set({hour:0,minute:0,second:0}).format("YYYY-MM-DD HH:mm:ss"),
						moment().set({hour:0,minute:0,second:0}).format("YYYY-MM-DD HH:mm:ss"),
						moment().set({hour:0,minute:0,second:0}).format("YYYY-MM-DD HH:mm:ss"),
						moment().set({hour:0,minute:0,second:0}).format("YYYY-MM-DD HH:mm:ss")
					);
				}
				else 
				{
					self.timer = new Timer( 
						time.response.timer_id,
						time.response.entrada_1,
						time.response.saida_1,
						time.response.entrada_2,
						time.response.saida_2,
						time.response.entrada_3,
						time.response.saida_3,
						time.response.entrada_4,
						time.response.saida_4,
						time.response.entrada_5,
						time.response.saida_5
					);
				}
				
				setTimeout(function()
				{
					self.timer.visualizar();
				}, 010);
			}
		//------------------------------------------------------------------------------------------------------------------------ 
			viewModel = new ViewModel;
			$(function(){
				ko.applyBindings(viewModel, document.getElementById('divTimer'));
			});
	</script>

@stop