<div style="width: 100%">
	<nav class="navbar navbar-inverse"   style="border-radius: 30px;"> 		
		<div class="navbar-header" style="width: 100%;">
			<div style="vertical-align: middle;">				
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-left">
					<a class="navbar-brand" href="#loginModal">
						<button type="button" class="btn btn-success btn-sm" id='login' data-toggle="modal" onclick='mostraLogin()' >
							<span class='glyphicon glyphicon-user'></span>
						</button>
					</a>					
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-left ">
					<a class="navbar-brand " href="{{Route('produto.produto')}}">PRODUTOS</a>				
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-left">
					<a class="navbar-brand" href="{{Route('usuario.usuario')}}">USUARIOS</a>
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-left">
					<a class="navbar-brand" href="{{Route('igor.timer')}}">TIMER</a>
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-left">
					<a class="navbar-brand" href="{{Route('igor.teste')}}">OFFICE</a>
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-left">
					<a class="navbar-brand" href="{{Route('usuario.grafico')}}">GRAFICO</a>	
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-left ">
					<a class="navbar-brand" href=""></a>	
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-left ">
					<a class="navbar-brand" href=""></a>	
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-left ">
					<a class="navbar-brand" href=""></a>	
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-left ">
					<a class="navbar-brand" href=""></a>	
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-left ">
					<a class="navbar-brand" href=""></a>	
				</div>

				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-right">
					<a class="navbar-brand" href=""   style="margin-left: 38px;">
						<button type="button" class="btn btn-danger btn-sm text-right" id="logout" data-bind="click:fazlogout" d>
							<span class='glyphicon glyphicon-user'></span>
						</button>
					</a>
				</div>				
			</div>	
		</div>				
	</nav>
</div>

<script type="text/javascript">
function mostraLogin()
{
	$("#loginModal").modal("show");
	setTimeout(function (){$("#usuario").focus();}, 500);
};
//
$(function()
{
	ko.applyBindings(login, document.getElementById('logout'))
})
</script>