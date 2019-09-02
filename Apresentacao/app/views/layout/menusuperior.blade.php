<div style="width: 100%">
	<nav class="navbar navbar-inverse"   style="border-radius: 30px;"> 		
		<div class="navbar-header" style="width: 100%;">
			<div style="vertical-align: middle;">				
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-left">
					<a class="navbar-brand" href="{{Route('usuarios')}}">USUARIOS</a>
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-left">
					<a class="navbar-brand" href="{{Route('workLoger')}}">WORKLOGER</a>
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-left">
					<a class="navbar-brand" style="margin-left: 20px"  href="{{Route('grafico')}}">GRAFICO</a>	
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-left ">
					<a class="navbar-brand" href=""></a>	
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-left ">
					<!-- <a class="navbar-brand " href="{{Route('produtos')}}">PRODUTOS</a>				 -->
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-left">
					<a lass="navbar-brand"  href="#"></a>
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
				@if(Auth::user()->usu_id == 1)
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-right">
						<a class="navbar-brand" href="#loginModal" style="margin-left: 38px;">
							<button type="button" class="btn btn-success btn-sm" id='login' data-toggle="modal" onclick='mostraLogin()' >
								<span class='glyphicon glyphicon-log-in'></span>
							</button>
						</a>					
					</div>
				@else
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-right">
						<a class="navbar-brand" href=""   style="margin-left: 38px;">
							<button type="button" class="btn btn-danger btn-sm text-right" id="logout" data-bind="click:fazlogout" d>
								<span class='glyphicon glyphicon-log-out'></span>
							</button>
						</a>
					</div>
				@endif				
			</div>	
		</div>				
	</nav>
</div>

<script type="text/javascript">	
	function mostraLogin()
	{
		$("#loginModal").modal("show");
		setTimeout(function (){
			$("#usuario").focus();
		}, 500);
	};
	if ({{Auth::user()->usu_id}} != 1) 
	{
		$(function()
		{
			ko.applyBindings(login, document.getElementById('logout'))
		})
	}
</script>