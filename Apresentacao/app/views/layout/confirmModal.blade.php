<div id="confirm-modal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
	<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="text-center">
					<strong name="title"></strong>
				</h3>
			</div>
			<div class="modal-body">
				<p id="confirm-modal-msg" class="text-center"></p>
			</div>
			<div class="modal-footer">
				<button id="btn-modal-confirm-cancel" type="button" data-dismiss="modal" class="btn" style="margin:auto;">
					Não
				</button>
				<button id="btn-modal-confirm-ok" type="button" data-dismiss="modal" class="btn btn-info" style="margin:auto;">
					Sim
				</button>
			</div>
		</div>
	</div>
</div>

<div id="alert-modal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="text-center">
					<strong name='title'></strong>
				</h3>
			</div>
			<div class="modal-body">
				<p id="alert-msg" class="text-center"></p>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-info" style="margin:auto;">OK</button>
			</div>
		</div>
	</div>
</div>

<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  	<div class="modal-dialog">
  		<div class="modal-content"> 
  		    <div class="modal-header">
  		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
  		        <h1 class="text-center">Login</h1>
  		    </div>
  		    <div class="modal-body">
  		        <form class="form col-md-12 center-block">
  		        	<div class="form-group">
  		        		<input type="text" class="form-control input-lg" 
  		        						   placeholder="Usuario" 
  		        						   id='usuario' 
  		        						   data-bind="value:usuario" 
  		        						   {{-- autofocus="autofocus" --}} >
  		        	</div>
  		        	<div class="form-group">
  		        		<input type="password" class="form-control input-lg" 
  		        							   placeholder="Senha" 
  		        							   data-bind="value:senha" >
  		        	</div>
  		        	<div class="form-group">
  		        		<button class="btn btn-primary btn-lg btn-block" data-bind="click:fazlogin">Sign In</button>
  		        		<span class="pull-right"><a href="http://localhost:8080/usuario" >Register</a></span><span><a href="#">Need help?</a></span>
  		        	</div>
  		        </form>
  		    </div>
  		    <div class="modal-footer">
  		        <div class="col-md-12">
  		        	<button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
  		        </div>	
  		    </div>
  		</div>
  	</div>
</div>

<div id="loading-modal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false"
    style="z-index: 9999;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                 <h3 class="text-center"><strong>Executando...</strong></h3>
            </div>
            <div class="modal-body">
                <p class="text-center"><img src="{{asset('images/loading2.gif')}}"></p>
                <p class="text-center">Por favor, aguarde...</p>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript">
	
	
	function confirmModal(msg, callbackOk, callbackCancelar, title)
	{

		//MODO DE USAR
		//@paran msg mensagem de exibição da tela
		//@paran callbackOk tipo function(){} não necessário.. padrão fechar o modal
		//@paran callbackCancelar tipo function(){} não necessário.. padrão fechar o modal
		//@paran title não é necessário caso enviar irá aparecer titulo na pagina

		//ex: confirmModal('#000', 'mensagem de texto', function(){alertModal(null, 'msg de alerta')});
	
		// if (COR_BOTAO_MODAL != undefined)
		// {
		// 	$("#btn-modal-confirm-ok").css("background-color", COR_BOTAO_MODAL);
		// 	$("#btn-modal-confirm-ok").css("color", '#fff');
		// }

		$("#confirm-modal strong[name=title]").html(title != undefined ? title : "");
		$("#confirm-modal-msg").html(msg);
		$("#confirm-modal").modal("show");

		$("#btn-modal-confirm-ok").unbind("click");
		$("#btn-modal-confirm-cancel").unbind("click");

		$("#btn-modal-confirm-ok").on(
			"click",
			callbackOk != undefined
				? 	function (keep) 
					{
						setTimeout(function ()
						{
							callbackOk();
						}, 1);

						if (!keep)
						{
							$("#confirm-modal").modal("hide");
						}
					} 
				: 	function ()
					{
						$("#confirm-modal").modal("hide");
					}
		);

		$("#btn-modal-confirm-cancel").on("click",
			callbackCancelar != undefined 
				? 	function ()
					{
						setTimeout(function ()
						{
							callbackCancelar();
						}, 1);

						$("#confirm-modal").modal("hide");
					} 
				: 	function ()
					{
						$("#confirm-modal").modal("hide");
					}
		);
	}
	
	function alertModal(msg, title, setWidth)
	{
		//MODO DE USAR
		//@paran color não é necessáriom caso enviar usar cor em hexadecima. ex:#ffffff
		//@paran msg mensagem de exibição da tela
		//@paran title não é necessário caso enviar irá aparecer titulo na pagina

		//ex: alertModal(null, 'msg de alerta');

		$("#alert-modal #alert-msg").html(msg);
		$("#alert-modal strong[name=title]").html(title !=undefined ? title : '');
		$("#alert-modal").modal("show");
	}

	function Login()
	{		
		var self = this;
		self.usuario = ko.observable();
		self.senha = ko.observable();
		self.isSelected = ko.observable(true);
        
		self.fazlogin = function()
		{
			var callback = function(){
				$('#loginModal').modal("hide");
				location.reload();

			}
			var dadosPost = {
				'usu_login':self.usuario(),
				'usu_password'  :self.senha()
			};
			globalViewModel.submit("{{Route('makeLogin')}}", dadosPost,callback);			
		}
		self.fazlogout = function()
		{
			var callback = function(){
				$('#loginModal').modal("hide");	
				location.reload();			
			}
			var dadosPost = {
				'usu_nome':'Guest',
				'per_id'  :"0"
			};
			globalViewModel.submit("{{Route('logout')}}", dadosPost,callback);			
		}		
	}
	var login = new Login();
	$(function(){
		ko.applyBindings(login, document.getElementById('loginModal'))
	});

</script>