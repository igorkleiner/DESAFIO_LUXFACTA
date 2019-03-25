@extends('layout.defaultTemplate')
@section('title','Cadastro de Produtos')
@section('content')

<div class="row">
	<div class="jumbotron">		
		<h5 class="text-center">OLÁ USUARIO<BR>SEJA BEM VINDO<BR>TELA DE CADASTRO DE PRODUTOS</h5>
	</div>	
</div>

<div class="row">
	<div class=" col-md-12">		
		<table class="table table-bordered table-striped">
			<thead>
              <tr>                
                <th>Nome</th>
                <th width="90px">Preço</th>
                <th width="25px">Estoque Inicial</th>
                <th width="90px">Ação</th>
                
              </tr>
            </thead>
            <tbody>
            	<tr>					
					<td><input type="text" data-bind="value:nome"></td>
					<td><input type="text" data-bind="value:preco"></td>
					<td><input type="text" data-bind="value:qtd"></td>
					<td>
						<button class='btn btn-success' data-bind="click:salvacadastro"><strong>Salvar</strong></button>
					</td>
				</tr>
            </tbody>
        </table>
	</div>	
</div>

<script type="text/javascript">

	var viewModel;

	function ViewModel()
	{
		var self = this;
            self.nome  = ko.observable();
            self.preco = ko.observable();
            self.qtd   = ko.observable();
			self.salvacadastro = function()
        		{
        		   var post = {'dados': JSON.parse(ko.toJSON(self))}; 
        		   $.post("{{Route('salvacadastro.salvacadastro')}}", post, function(a){ window.location = "{{Route('produto.produto')}}";});
        		} 
	}
	
	viewModel = new ViewModel;
	ko.applyBindings(viewModel);
</script> 

@stop
