@extends('layout.defaulttemplate')
@section('title','Lista de Produtos')
@section('content')


<div id='mostraprodutos'>
<div class="row">
	<div class=" col-lg-12">        
        <table class="table table-bordered table-striped">
			<thead>
                <tr class='warning'>                     
                    <th id='thId'>Id</th>               
                    <th >Nome</th>
                    <th >Preço</th>
                    <th >Quantidade</th>
                    <th >Status</th>
                    <th style='width:150px' id='thAcao'>Ação</th>                  
                </tr>
                <tr class='success'>
                    <td id=td1></td>
                    <td>
                        <input type="text" id='consultaNome' placeholder='digite um nome para buscar' data-bind = "visible: consultaNome, value:bnome, valueUpdate:'afterkeydown'">
                        <select class="btn btn-default dropdown-toggle pull-right" id='ordenaNome' style="display: none"  data-bind="visible: ordenaNome,
                            options:selectnome,
                            optionsText:'nome',
                            optionsValue:'id',
                            value:nomeclassificado,
                            optionsCaption:'selecione'
                        "></select>
                    </td>                    
                    <td>
                        <select class="btn btn-default dropdown-toggle pull-center" id='ordenaPreco'  style="display: none" data-bind="visible: ordenaPreco,
                            options:selectpreco,
                            optionsText:'nome',
                            optionsValue:'id',
                            value:precofiltrado,
                            optionsCaption:'selecione'
                        "></select>
                    </td>
                    <td>
                        <select class="btn btn-default dropdown-toggle pull-center" id='ordenaQtd' style="display: none" data-bind="visible: ordenaQtd,
                            options:selectpreco,
                            optionsText:'nome',
                            optionsValue:'id',
                            value:qtdfiltrado,
                            optionsCaption:'selecione'
                        "></select>
                    </td>
                    <td>
                        <select class="btn btn-default dropdown-toggle pull-center" id='selectDisp' style="display: none" data-bind="visible: selectDisp,
                            options:selectdisponivel,
                            optionsText:'nome',
                            optionsValue:'id',
                            value:statusFiltrado,
                            optionsCaption:'selecione'
                        "></select>
                    </td>
                    <td><button class= "btn btn-primary pull-center" id='btnCadastraNovo' style="display: none" data-bind = "visible: btnCadastraNovo, click:cadastraProduto">Cadastrar Novo</button></td>
                </tr>
            </thead>

            <tbody data-bind="foreach:listafiltrada">
                <tr class='warning'>
                    <td><span data-bind="text:id"></span></td>
                    <td><span data-bind="text:nome"></span></td>
                    <td><span data-bind="text:preco"></span></td>
                    <td><span data-bind="text:qtd"></span></td>
                    <td><span data-bind="text:disponivel()?'Disponivel':'Indisponivel'"></span></td>
                    <td>
                        <button class='btn btn-danger' id='btnMinus' style="display: none" data-bind="visible: $root.btnMinus , click:mudaQtd.bind($data,0), enable:disponivel()">
                            <span class='glyphicon glyphicon-minus pull-left'></span>
                        </button>
                        <button class='btn btn-success' id='btnPlus' style="display: none" data-bind="visible:  $root.btnPlus , click:mudaQtd.bind($data,1)"> 
                            <span class='glyphicon glyphicon-plus pull-center'></span>
                        </button>
                        <button class='btn btn-info pull-right' id='btnEdit' style="display: none" data-bind="visible:  $root.btnEdit , click:editar">
                            <span class='glyphicon glyphicon-pencil'></span>
                        </button>                            
                    </td>
                </tr>            	
            </tbody>
            <tfoot>                
            </tfoot>
        </table>

    </div>
</div>

<!-- MODAL DO CADASTRO -->
<div id="cadastroModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content" data-bind= "with:cadastroModal" >
      <div class="modal-header ">
        <h4 class="modal-title">Editar Produto</h4>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class=" col-md-12">        
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>                
                                <th >Id</th>
                                <th >Nome</th>
                                <th >Preço</th>
                                <th >Quantidade no estoque</th>
                            </tr>    
                        </thead>
                        <tbody>
                            <tr>
                                <td><span  type='text' data-bind="text:id"></span></td>
                                <td><input type='text' data-bind="value:nome"></input></td>
                                <td><input type='text' data-bind="value:preco"></input></td>
                                <td><input type='text' data-bind="value:qtd"></input></td>
                            </tr>
                        </tbody>                                    
                    </table>
                </div>
            </div>    
      </div>
      <div class="modal-footer">
         {{-- BOTÃO QUE VAI EXCLUIR O CADASTRO: USA PROPRIEDADE excluir DO OBJETO PRODUTO --}}
        <button type="button" class="btn btn-danger" data-bind= "click:excluir" >Excluir</button>
        {{-- BOTÃO QUE VAI SALVAR O CADASTRO: USA PROPRIEDADE salVar DO OBJETO PRODUTO --}}
        <button type="button" class="btn btn-success" data-bind= "click:salvar">Salvar</button>
        {{-- BOTÃO QUE VAI CANCELAR O CADASTRO: USA PROPRIEDADE cancelar DO OBJETO PRODUTO --}}
        <button type="button" class="btn btn-info" data-bind= "click:cancelar" >Cancelar</button>       
      </div>
    </div>
  </div>
</div>
{{-- FIM DO MODAL --}}

</div>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
{{-- COLOCANDO JAVASCRIPT --}}
<script type="text/javascript">
//console.log($Session);
    // INSTANCIA DAS VARIAVEIS DA PAGINA
    var viewModel,dados, usuario;
    // DADOS RECEBE JSON ENCODE DO POST 
    dados = {{json_encode($dados)}};    
     usuario = {{json_encode($usuario)}};   
     usuario['usu_id'] = {{$usuario->usu_id}};    
    //console.log(usuario);
    //---------------------------------------------------------------------------------------------------------------
    // CRIANDO A CLASSE PRODUTO
    function Produto(id,nome,preco,qtd,editando)
    {
        var self = this;
            self.id = ko.observable(id);
            self.nome  = ko.observable(nome);
            self.preco = ko.observable(preco);
            self.qtd   = ko.observable(qtd);
            self.editando = ko.observable(editando);
            // PROPRIETADE ORIGINAL RECEBENDO VALORES INICIAIS
            self.original = {
                id   :id,
                nome :nome,
                preco:preco,
                qtd  :qtd
            }
            // PROPRIEDADE atualizaOriginal RECEBENDO UMA FUNÇÃO QUE SUBSTITUI OS VALORES ORIGINAIS
            self.atualizaOriginal = function()
            {
                self.original.id     = self.id();
                self.original.nome   = self.nome();
                self.original.preco  = self.preco();
                self.original.qtd    = self.qtd();
            };
            // PROPRIEDADE SALVAR RECEBENDO A FUNÇÃO QUE VAI SALVAR OS DADOS 
            self.salvar = function()
            {              
                var callback = function(result)
                {
                    //console.log(result);
                    if(result !=null && result.status != undefined )
                    {
                        if(result.status == 1)
                        {
                            //console.log(result.response.prod_id);
                            self.id(result.response.prod_id);
                            self.atualizaOriginal();
                            self.editando(false);
                            $("#cadastroModal").modal('hide'); 
                        }
                        else
                        {
                            alert(result.message);
                            // console.log(result.message);
                        }
                    }               
                }        
                // CRIANDO VARIAVEL STANDARD CLASS ( OBJETO SEM TIPO ) dadosPost COM VALORES id, nome, preco, qtd; 
                dadosPost = {
                    'prod_id'    : self.id(),
                    'prod_nome'  : self.nome(),
                    'prod_preco' : self.preco(),
                    'prod_qtd'   : self.qtd()
                };                 
                globalViewModel.submit("{{Route('produtos.salvar')}}", dadosPost,callback);               
            }
            // PROPRIEDADE CANCELAR RECEBENDO A FUNÇÃO QUE VAI CANCELAR O CADASTRO NO MODAL
            self.cancelar = function()
            {
                // SE PROPRIEDADE id FOR null REMOVE O OBJETO CRIADO DE DENTRO DA ViewModel
                if(self.id() == null)
                {
                    viewModel.produtos.remove(self);
                }
                // SE PROPRIEDADE id TIVER VALOR, RETORNA OS VALORES PELOS ORIGINAIS
                self.nome(self.original.nome);
                self.preco(self.original.preco);
                self.qtd(self.original.qtd);
                // PROPRIEDADE EDITANDO VOLTA PARA false
                self.editando(false);
                // FECHA O MODAL
                $("#cadastroModal").modal('hide');
            }
            self.excluir = function()
            { 
                var callback = function(result)
                    {
                        //console.log(result);
                        if(result !=null && result.status != undefined )
                        {
                            if(result.status == 1)
                            {
                                viewModel.produtos.remove(self);
                                $("#cadastroModal").modal('hide'); 
                            }
                            else
                            {
                                console.log(result.message);
                            }
                        }               
                    }                       
                dadosPost = {
                    'prod_id'    : self.id(),
                    'prod_nome'  : self.nome(),
                    'prod_preco' : self.preco(),
                    'prod_qtd'   : self.qtd()
                };  
                               
                globalViewModel.submit("{{Route('produtos.excluir')}}", dadosPost,callback);                          
            };

            // PROPRIEDADE editar RECEBENDO A FUNÇÃO QUE VAI ABRIR O MODAL PARA EDIÇÃO
            self.editar = function(){
                // PROPRIEDADE editando MUDA PARA true
                self.editando(true);
                // PROPRIEDADE cadastroModal DENTRO DA CLASSE ViewModel RECEBENDO O OBJETO EM EDIÇÃO
                viewModel.cadastroModal(self);
                // ABRINDO O MODAL
                $("#cadastroModal").modal('show');
            }

            self.disponivel = ko.computed(function()
            {
                return self.qtd()>0;
            });            

            self.mudaQtd = function(valor){
                if (valor ==1)
                {
                    self.qtd(parseFloat(self.qtd())+1);                    
                }
                else
                {
                    self.qtd(parseFloat(self.qtd())-1); 
                }
                self.salvar();
            };
            
            if(editando)
            {
                self.editar();
            }
    }
//-----------------------------------------------------------------------------------------------------------------------
    function ViewModel()
    {
        var self = this;
        self.produtos = ko.observableArray();
        self.bnome  = ko.observable();
        self.nomeclassificado = ko.observable();
        self.precofiltrado  = ko.observable();
        self.qtdfiltrado    = ko.observable();
        self.statusFiltrado = ko.observable();
        self.cadastroModal = ko.observable();
        self.consultaNome = ko.observable();
        self.ordenaNome = ko.observable();
        self.ordenaPreco = ko.observable();
        self.ordenaQtd = ko.observable();
        self.selectDisp = ko.observable();
        self.btnCadastraNovo = ko.observable();
        self.btnMinus = ko.observable();
        self.btnPlus= ko.observable();
        self.btnEdit = ko.observable();
        self.usuario = ko.observable(usuario);

        self.selectdisponivel = [
            {'id':2, 'nome':'Disponivel'},
            {'id':1, 'nome':'Indisponivel'}
        ];

        self.selectnome = [
            {'id':2, 'nome':'Ordem Crescente'},
            {'id':1, 'nome':'Ordem Decrescente'}
        ];

        self.selectpreco = [
            {'id':2,'nome':'Maior valor'},
            {'id':1,'nome':'Menor valor'}
        ];

        self.populaLista = function(dados)
        {
           if(dados != null && dados.status != undefined)
           {
            if(dados.status ==1)
            {
                ko.utils.arrayForEach(dados.response,function(produto)
                {
                    self.produtos.push(new Produto(produto.prod_id,produto.prod_nome,produto.prod_preco,produto.prod_qtd,false));
                }); 
            }
            else
            {
                console.log(dados.mensagem);
            }
           }                      
        };

        self.cadastraProduto = function()
        {
            self.produtos.push(new Produto(null, null, null, null, true));
        }

        self.verificaUsuario = function()
        {                   
            if (usuario.per_id == 1) 
            {
                //console.log('entrei no if do usuario = 1...');
                self.consultaNome(true);
                self.ordenaNome(true);
                self.ordenaPreco(false);
                self.ordenaQtd(false);
                self.selectDisp(false);
                self.btnCadastraNovo(false);
                self.btnMinus(false);
                self.btnPlus(false);
                self.btnEdit(false);               
            }
            if (usuario.per_id == 2) 
            {
                //console.log('entrei no if do usuario = 2...');
                self.consultaNome(true);
                self.ordenaNome(true);
                self.ordenaPreco(true);
                self.ordenaQtd(true);
                self.selectDisp(false);
                self.btnCadastraNovo(false);
                self.btnMinus(false);
                self.btnPlus(false);
                self.btnEdit(false);                
            }
            if (usuario.per_id == 3)               
            {
                //console.log('entrei no if do usuario = 3...');
                self.consultaNome(true);
                self.ordenaNome(true);
                self.ordenaPreco(true);
                self.ordenaQtd(true);
                self.selectDisp(true);
                self.btnCadastraNovo(false);
                self.btnMinus(true);
                self.btnPlus(true);
                self.btnEdit(false);  
            }
            if (usuario.per_id == 5) 
            {
                //console.log('entrei no if do usuario = 4...');
                self.consultaNome(true);
                self.ordenaNome(true);
                self.ordenaPreco(true);
                self.ordenaQtd(true);
                self.selectDisp(true);
                self.btnCadastraNovo(true);
                self.btnMinus(true);
                self.btnPlus(true);
                self.btnEdit(true);
            }
        }

        self.listafiltrada = ko.computed(function()
        {
            var options = self.produtos();
            
            if(self.bnome() != null && self.bnome() != '')
            {
                options = ko.utils.arrayFilter(options, function(i)
                {
                    return i.nome().toLowerCase().indexOf(self.bnome().toLowerCase()) == 0;
                });
            }

            if(self.nomeclassificado() != null && self.nomeclassificado() != '')
            {
                if(self.nomeclassificado() == 1)
                {
                    console.log('nomeclassificado() == 1');
                    options = options.sort(function(a,b)
                    {
                        console.log(a.nome());console.log(b.nome());
                        return a.nome() < b.nome()? 1:-1;
                    });
                }
                else
                {
                    console.log('nomeclassificado() == 2');
                    options = options.sort(function(a,b)
                    {
                        console.log(a.nome());console.log(b.nome());
                        return a.nome() > b.nome()? 1:-1;
                    }); 
                }
            }

            if(self.precofiltrado() != null && self.precofiltrado() != '')
            {
                if(self.precofiltrado() == 2)
                {
                    options = options.sort(function(a,b)
                    {
                        return parseFloat(a.preco())  < parseFloat(b.preco())? 1:-1;;
                    });
                }
                else
                {
                    options = options.sort(function(a,b)
                    {
                        return parseFloat(a.preco())  > parseFloat(b.preco())? 1:-1;;
                    }); 
                }
            }

            if(self.qtdfiltrado() != null && self.precofiltrado() != '')
            {
                if(self.qtdfiltrado() == 2)
                {
                    options = options.sort(function(a,b)
                    {
                        return parseFloat(a.qtd()) < parseFloat(b.qtd())? 1:-1;
                    });
                }
                else
                {
                    options = options.sort(function(a,b)
                    {
                        return parseFloat(a.qtd()) > parseFloat(b.qtd())? 1:-1;
                    }); 
                }
            }

            if(self.statusFiltrado() != null && self.statusFiltrado() != '')
            {
                options = ko.utils.arrayFilter(options, function(i)
                {
                    if(self.statusFiltrado() == 1 && !i.disponivel()) return i;
                    if(self.statusFiltrado() == 2 &&  i.disponivel()) return i;
                });                    
            }

            return options;
        });
    }  
//-------------------------------------------------------------------------------------------------------------------------- 
    

    viewModel = new ViewModel;
    viewModel.populaLista(dados);
    viewModel.verificaUsuario();
    $(function(){
        ko.applyBindings(viewModel, document.getElementById('mostraprodutos'));
    });
</script>

@stop