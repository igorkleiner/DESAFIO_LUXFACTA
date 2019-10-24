@extends('layout.defaulttemplate')
@section('title','Lista de Usuarios')
@section('content')


<div id='mostrausuarios'>
	<div class="row">
		<div class=" col-md-12"> 
	        <table class="table table-bordered ">
	            
	            <thead>
	            	<tr class='warning'>                
	            		<th>Id</th>
	            		<th>Nome</th>
	            		<th>Perfil</th>
	            		<th width="150px">Ação</th>
	            	</tr>
	            	<tr class='success'>
	                    <td>
	                    	<select class="btn btn-default dropdown-toggle pull-center" id='consultaId' style="display: none" data-bind=" visible:consultaId,
	                       		options:selectid,
	                       		optionsText:'nome',
	                       		optionsValue:'id',
	                       		value:idclassificada,
	                       		optionsCaption:'selecione'
	                       	"></select>
	                    </td>                    
	                    <td>
	                        <input type="text" placeholder='digite um nome para buscar' id='consultaNome' style="display: none"   data-bind = " visible:consultaNome, value:busuario, valueUpdate:'afterkeydown'">
	                        <select class="btn btn-default dropdown-toggle pull-right" id='consultaselectnome' style="display: none"  data-bind=" visible:consultaselectnome, 
	                            options:selectnome,
	                            optionsText:'nome',
	                            optionsValue:'id',
	                            value:nomeclassificado,
	                            optionsCaption:'selecione'
	                        "></select>
	                    </td>
	                    <td>
	                    	<select class="btn btn-default dropdown-toggle pull-center" id='consultaperfil' style="display: none"  data-bind=" visible:consultaperfil,
	                            options:selectperfil,
	                            optionsValue:'id',
	                            optionsText:'nome',                            
	                            value:perfilfiltrado,
	                            optionsCaption:'selecione'
	                        "></select>
	                    </td>
	                    <td><button class= "btn btn-primary pull-center" id='btnCadastraNovo' style="display: none" data-bind = " visible:btnCadastraNovo, click:cadastraUsuario">Cadastrar Novo</button></td>
	                    
	                    
	                </tr>
	            </thead>
	            <tbody data-bind="foreach:listafiltrada">            	
			    	<tr class='warning'>
					    <td><span data-bind="text:id"></span></td>
	                    <td><span data-bind="text:nome"></span></td>
	                    <td><span data-bind="text:$root.getperfil(perfil())"></span></td>
					    <td>				    					    	
	                        <button class='btn btn-success pull-left' id='btnEditWork' style="display: none; " data-bind="visible:  $root.btnEditWork , click:editWork" >
	                            <span class="glyphicon glyphicon-calendar"></span>
	                        </button>
					    	<button class='btn btn-info pull-left' id='btnEdit' style="display: none;margin-left: 7px;" data-bind="visible:  $root.btnEdit , click:editar">
					    		<span class='glyphicon glyphicon-pencil'></span>
					    	</button>
					    	<button class='btn btn-danger pull-right' id='btnExcluir' style="display: none" data-bind="visible:  $root.btnExcluir , click:excluir" >
					    		<span class="glyphicon glyphicon-remove"></span>
					    	</button>
					    </td>
			    	</tr>		        
	            </tbody>
	            <tfoot>

	            </tfoot>
	          </table>
		</div>	
	</div>

	<!-- Modal -->
	<div id='usuarioModal' class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content" data-bind= "with:usuarioModal">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	        <h4 class="modal-title">Editar Usuario</h4>
	      </div>
	      <div class="modal-body">
	        <div class="row">
	                <div class=" col-md-12">        
	                    <table class="table table-bordered table-striped">
	                        <thead>
	                            <tr>                
	                                <th >Id</th>
	                                <th >Nome</th>
	                                <th >Perfil</th>
	                                <th >Login</th>
	                                <th >Senha</th>
	                            </tr>    
	                        </thead>
	                        <tbody>
	                            <tr>
	                                <td><span type='text' data-bind="text:id"></span></td>
	                                <td><input type='text' data-bind="value:nome"></input></td>
	                                <td>
	                                    <select class="btn btn-default dropdown-toggle pull-center" data-bind="
	                                        options:$root.selectperfil,
	                                        optionsValue:'id',
	                                        optionsText:'nome',                            
	                                        value:perfil,
	                                        optionsCaption:'selecione'
	                                    "></select>
	                                </td>
	                                <td><input type='text' data-bind="value:login"></input></td>
	                                <td><input type='text' data-bind="value:senha"></input></td>
	                            </tr>
	                        </tbody>                                    
	                    </table>
	                </div>
	            </div>
	      </div>
	      <div class="modal-footer">
	         {{-- BOTÃO QUE VAI EXCLUIR O usuario: USA PROPRIEDADE excluir DO OBJETO Usuario --}}
	        <button type="button" class="btn btn-danger" data-bind= "click:excluir" >Excluir</button>
	        {{-- BOTÃO QUE VAI SALVAR O usuario: USA PROPRIEDADE salVar DO OBJETO Usuario --}}
	        <button type="button" class="btn btn-success" data-bind= "click:salvar">Salvar</button>
	        {{-- BOTÃO QUE VAI CANCELAR O usuario: USA PROPRIEDADE cancelar DO OBJETO Usuario --}}
	        <button type="button" class="btn btn-info" data-bind= "click:cancelar" >Cancelar</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<!-- fim do Modal -->
	<div id="datePickerModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-sm">
			<!-- <div class="modal-content" data-bind= "with:Usuario"> -->
            <div class="modal-content" data-bind= "with:usuarioModal">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Editar Ponto do Usuario</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div  style="margin-top:10px;">
							<div >
								Data a ser Editada:  
								<input style="width:90px;"
									type="text"
									class="date-picker meus-filter input-filter"
									data-bind="datepicker2: dateToEdit"
								>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-bind='click:submitWorkEdit' >Abrir</button>
						<button type="button" class="btn btn-info"  >Cancelar</button>
						<button type="button" class="btn btn-danger"  >Excluir</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>
	</div>
	<!-- fim do Modal -->
</div>



<script type="text/javascript">

var viewModel,dados,usuario;
    // DADOS RECEBE JSON ENCODE DO POST 
    dados = {{json_encode($dados)}};
// --------------------------------------------------------------------------------------
	function Usuario(id, nome, perfil, login,senha, editando)
    {
		var self         = this;
		self.id          = ko.observable(id);
		self.nome        = ko.observable(nome);
		self.perfil      = ko.observable(perfil);
        self.login       = ko.observable(login);
		self.senha       = ko.observable(senha);
		self.dateToEdit  = ko.observable();
        self.editando    = ko.observable(editando);
		self.original    = {
            id     :id,
            nome   :nome,
            perfil :perfil,
            login  :login,
            senha  :senha
        }
        // PROPRIEDADE atualizaOriginal RECEBENDO UMA FUNÇÃO QUE SUBSTITUI OS VALORES ORIGINAIS
        self.atualizaOriginal = function()
        {
            self.original.id      = self.id();
            self.original.nome    = self.nome();
            self.original.perfil  = self.perfil();                
            self.original.login   = self.login();                
            self.original.senha   = self.senha();                
        };
		self.editar = function()
		{
             // PROPRIEDADE editando MUDA PARA true
             self.editando(true);
             // PROPRIEDADE usuarioModal DENTRO DA CLASSE ViewModel RECEBENDO O OBJETO EM EDIÇÃO
             viewModel.usuarioModal(self);
             // ABRINDO O MODAL
             $("#usuarioModal").modal('show');
        }

        self.salvar = function()
        {
        	var callback = function(result)
        	{
                if(result !=null && result.status != undefined )
                {
                    if(result.status == 1)
                    {
                        self.id(result.response.usu_id);
                        self.atualizaOriginal();
                        self.editando(false);
                        $("#usuarioModal").modal('hide'); 
                    }
                    else
                    {
                        alert(result.message);
                    }
                }        		
        	}
        	// CHAMA A FUNÇÃO DA PROPRIEDADE atualizaOriginal()            
            dadosPost = 
            {
                'usu_id'       : self.id(),
                'usu_nome'     : self.nome(),
                'per_id'       : self.perfil(),
                'usu_login'    : self.login(),
                'usu_password' : self.senha()
            };             
            //SALVANDO OS DADOS NO BANCO
            globalViewModel.submit("{{Route('usuarios.salvacadastro')}}", dadosPost,callback);
        }

        self.excluir = function()
        {
            var callback = function(result)
            {
                if(result !=null && result.status != undefined )
                {
                    if(result.status == 1)
                    {
                        viewModel.usuarios.remove(self);
                        $("#usuarioModal").modal('hide'); 
                    }
                    else
                    {
                        viewModel.usuarios.remove(self);
                        console.log(result.message);
                    }
                }               
            }
        	dadosPost = 
            {
                'usu_id'  : self.id(),
                'usu_nome': self.nome(),
                'per_id'  : self.perfil()
            }; 
                    	
        	globalViewModel.submit("{{Route('usuarios.excluicadastro')}}", dadosPost,callback);
        }

        self.editWork = function()
        {
            viewModel.usuarioModal(self);
            $("#datePickerModal").modal('show');
        }

        self.submitWorkEdit = function(){
        	if ( usuario.per_id >= 4 ) {
        		$("#datePickerModal").modal('hide');
                var callback  = function() {
                	
                };
                window.open("{{Route('getToEditEmployeeData')}}"+
                    '?usu_id='  +self.id()+
                    '&usu_nome='+self.nome()+
                    '&per_id='  +self.perfil()+
                    '&data='    +self.dateToEdit()
                );
            } else {
            	alert('Você não pode usar essa funcionalidade!');
        	}
        }

        self.cancelar = function()
        {
            // SE PROPRIEDADE id FOR null REMOVE O OBJETO CRIADO DE DENTRO DA ViewModel
            if(self.id() == null)
            {
                viewModel.usuarios.remove(self);
            }
            // SE PROPRIEDADE id TIVER VALOR, RETORNA OS VALORES PELOS ORIGINAIS
            self.id(self.original.id);
            self.nome(self.original.nome);
            self.perfil(self.original.perfil);
            // PROPRIEDADE EDITANDO VOLTA PARA false
            self.editando(false);
            // FECHA O MODAL
            $("#usuarioModal").modal('hide');
        }
        if(editando)
        {
            self.editar();
        }

        self.guest = ko.computed(function(){
            return self.perfil() == 1;
        });

        self.cliente = ko.computed(function(){
            return self.perfil() == 2;
        });

        self.funcionario = ko.computed(function(){
            return self.perfil()== 3;
        });

        self.gerente = ko.computed(function(){
            return self.perfil() == 4;
        });

        self.dono = ko.computed(function(){
            return self.perfil() == 5;
        });
	}
//------------------------------------------------------------------------------------------
	function ViewModel(){
		var self = this;
		self.usuarios = ko.observableArray();		
		self.busuario = ko.observable();
		self.usuarioModal = ko.observable();		
		self.selectperfil = []
		self.perfilfiltrado = ko.observable();
        self.btnExcluir = ko.observable();
        self.btnEditWork = ko.observable();
        self.btnEdit = ko.observable();
        self.btnCadastraNovo = ko.observable();
        self.consultaId = ko.observable();
        self.consultaNome = ko.observable();
        self.consultaselectnome = ko.observable();
        self.consultaperfil = ko.observable();

		self.selectnome = [
            {'id':1, 'nome':'Ordem Crescente'},
            {'id':2, 'nome':'Ordem Decrescente'}
        ];
        self.nomeclassificado = ko.observable();

        self.selectid = [
            {'id':1,'nome':'mais antigos'},
            {'id':2,'nome':'mais recentes'}
        ];

        self.idclassificada = ko.observable();

        self.cadastraUsuario = function()
        {
            self.usuarios.push(new Usuario(null, null, null,null, null, true));
        }
        self.getperfil = function(id)
        {
            for (var a =0; a<self.selectperfil.length; a++)
            {
                if (self.selectperfil[a].id == id)
                {
                    return self.selectperfil[a].nome;
                }
            }
            return '';
        };
		self.populaLista = function(dados)
        {
             if(dados != null && dados.status != undefined)
             {
                if(dados.status == 1)
                {
                    self.selectperfil = ko.utils.arrayMap(dados.response.perfis, function (perfil){
                        return {'id': perfil.per_id, 'nome':perfil.per_nome};
                    });
                    ko.utils.arrayForEach(dados.response.usuarios,function(usuario)
                    {
                        self.usuarios.push(
                            new Usuario(
                                usuario.usu_id,
                                usuario.usu_nome, 
                                usuario.per_id,
                                usuario.usu_login,
                                usuario.usu_password,
                                false
                            )
                        );
                    }); 
                }
                else
                {
                    console.log(dados.mensagem);
                }
             }
        };
        self.listafiltrada = ko.computed(function()
        {
            var options = self.usuarios();
 				if(self.busuario() != null && self.busuario() != '')
            	{
            	    options = ko.utils.arrayFilter(options, function(i)
            	    {
            	        return i.nome().toLowerCase().indexOf(self.busuario().toLowerCase()) == 0;
            	    });
            	}
            	if(self.idclassificada() != null && self.idclassificada() != '')
            	{
            	    if(self.idclassificada() == 1)
            	    {
            	        options = options.sort(function(a,b)
            	        {
            	            return parseFloat(a.id())  > parseFloat(b.id())? 1:-1;
            	        });
            	    }
            	    else
            	    {
            	        options = options.sort(function(a,b)
            	        {
            	            return parseFloat(a.id())  < parseFloat(b.id())? 1:-1;
            	        }); 
            	    }
            	}
            	if(self.nomeclassificado() != null && self.nomeclassificado() != '')
            	{
            	    if(self.nomeclassificado() == 1)
            	    {
            	        options = options.sort(function(a,b)
            	        {
            	            return a.nome() > b.nome()? 1:-1;
            	        });
            	    }
            	    else
            	    {
            	        options = options.sort(function(a,b)
            	        {
            	            return a.nome() < b.nome()? 1:-1;
            	        }); 
            	    }
            	}
                if(self.perfilfiltrado() != null && self.perfilfiltrado() != '')
                {
                    options = ko.utils.arrayFilter(options, function(i)
                    {
                        if(self.perfilfiltrado() == 1 && i.guest())     return i;
                        if(self.perfilfiltrado() == 2 && i.cliente())     return i;
                        if(self.perfilfiltrado() == 3 && i.funcionario()) return i;
                        if(self.perfilfiltrado() == 4 && i.gerente())     return i;
                        if(self.perfilfiltrado() == 5 && i.dono())        return i;
                    });                        
                }                	
 			return options; 				
        });
        self.verificaUsuario = function()
        {                   
            if (usuario.per_id == 2) 
            {
                self.btnExcluir(false);
                self.btnEditWork(false);
                self.btnEdit(false);
                self.btnCadastraNovo(false);
                self.consultaId(false);
                self.consultaNome(false);
                self.consultaselectnome(false);
                self.consultaperfil(false);                              
            }
            if (usuario.per_id == 3) 
            {
                self.btnExcluir(false);
                self.btnEditWork(false);
                self.btnEdit(false);
                self.btnCadastraNovo(false);
                self.consultaId(false);
                self.consultaNome(true);
                self.consultaselectnome(false);
                self.consultaperfil(false);                                 
            }
            if (usuario.per_id == 4)               
            {
                self.btnExcluir(false);
                self.btnEditWork(true);
                self.btnEdit(true);
                self.btnCadastraNovo(false);
                self.consultaId(false);
                self.consultaNome(true);
                self.consultaselectnome(false);
                self.consultaperfil(true);                  
            }
            if (usuario.per_id == 5) 
            {
                self.btnExcluir(true);
                self.btnEditWork(true);
                self.btnEdit(true);
                self.btnCadastraNovo(true);
                self.consultaId(true);
                self.consultaNome(true);
                self.consultaselectnome(true);
                self.consultaperfil(true);                 
            }
        }
	}

    viewModel = new ViewModel;
    viewModel.populaLista(dados);
    viewModel.verificaUsuario();
    $(function()
    {
        ko.applyBindings(viewModel,document.getElementById('mostrausuarios'));
    });
</script>
@stop