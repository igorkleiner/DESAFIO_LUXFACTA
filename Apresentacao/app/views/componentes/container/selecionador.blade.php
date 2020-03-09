<template id="selecionadorTemplate">
    <select class="btn btn-default dropdown-toggle pull-center"
        data-bind="
            options:selectEmpresas(),
            optionsValue:'id',
            optionsText:'desc',
            value:empresa,
            optionsCaption:'Selecione a Empresa'
        "
    ></select>
    <select class="btn btn-default dropdown-toggle pull-center"
        data-bind="
            options:filtro(),
            optionsValue:'id',
            optionsText:'desc',
            value:usuario,
            optionsCaption:'Selecione o Usuario'
        "
    ></select>
</template>
    <script type="text/javascript">
        ko.components.register('selecionador',{
            viewModel:function(params){
                var self = this;
                self.template         = 'selecionadorTemplate';

                self.selectEmpresas = ko.observableArray();
                self.selectUsuarios = ko.observableArray();

                self.usuario = ko.observable();
                self.empresa = ko.observable();

                self.getContent = function(){
                    var callBack = function(response){
                        ko.utils.arrayForEach(dados.empresas,function(empresa){
                            self.selectEmpresas.push(
                                {
                                    'id': empresa.emp_id,
                                    'desc':empresa.emp_nome + ' - ' + empresa.tem_desc
                                }
                            )
                        });

                        ko.utils.arrayForEach(dados.usuarios,function(usuario){
                            self.selectUsuarios.push(
                                {
                                    'id': usuario.id,
                                    'emp_id': usuario.emp_id,
                                    'emu_id': usuario.emu_id,
                                    'desc':usuario.name
                                }
                            )
                        });
                    };
                    globalViewModel.submit("",{},callBack);

                }
                self.getContent();

                self.filtro = ko.computed(function()
                {
                    var options = self.selectUsuarios();
                    if(self.empresa() != null && self.empresa() != ''){
                        options = ko.utils.arrayFilter(options, function(i){
                            return i.emp_id == self.empresa();
                        });
                    }
                    var referencia = ko.utils.arrayFilter(self.selectUsuarios(), function(usuario){
                        return usuario.id == self.usuario();
                    });

                    params.empresa(self.empresa());
                    params.usuario(self.usuario());
                    if(referencia[0] != undefined){
                        params.referencia(referencia[0].emu_id);
                    }
                    return options;
                });
            },
            template:'<!-- ko template:template --><!-- /ko -->'
        });
    </script>
