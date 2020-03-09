{{--
    Requisitos para utilização:
        O array de entrada deve ser do tipo observableArray() e  deve ter o atributo "id" e o atributo "nome";
        O array de destino deve ser do tipo observableArray();

    Exemplo de utilização :
        <buscador params="origem:algumObservableArray,destino:outroObservableArray,placeholder:'texto para placeholder'"></buscador>
--}}

<template id="buscadorTemplate">
        <input type="text"data-bind="value:buscador, placeholder: placeholder  , valueUpdate:'afterkeydown'">
        <select
            class="btn btn-default dropdown-toggle pull-center"
            data-bind="
                options:selectid,
                optionsText:'nome',
                optionsValue:'id',
                value:idclassificada,
                optionsCaption:'Ordem de Criação'
            "
        ></select>

        <select
            class="btn btn-default dropdown-toggle pull-right"
            data-bind="
                options:selectnome,
                optionsText:'nome',
                optionsValue:'id',
                value:nomeclassificado,
                optionsCaption:'Ordem Alfabética'
            "
        ></select>
</template>
    <script type="text/javascript">
        ko.components.register('buscador',{
            viewModel:function(params){
                var self = this;
                self.template         = 'buscadorTemplate';

                self.buscador         = ko.observable();
                self.placeholder      = ko.observable(params.placeholder);
                self.idclassificada   = ko.observable();
                self.nomeclassificado = ko.observable();

                self.selectnome = [
                    {'id':1, 'nome':'Crescente'},
                    {'id':2, 'nome':'Decrescente'}
                ];
                self.selectid = [
                    {'id':1,'nome':'Mais Antigos'},
                    {'id':2,'nome':'Mais Recentes'}
                ];
                self.listafiltrada = ko.computed(function()
                {
                    var options = params.origem();
                        if(self.buscador() != null && self.buscador() != ''){
                            options = ko.utils.arrayFilter(options, function(i){
                                return i.nome().toLowerCase().indexOf(
                                    self.buscador().toLowerCase()
                                ) >= 0;
                            });
                        }
                        if(self.idclassificada() != null && self.idclassificada() != ''){
                            if(self.idclassificada() == 1){
                                options = options.sort(function(a,b){
                                    return parseFloat(a.id())  > parseFloat(b.id())? 1:-1;
                                });
                            } else {
                                options = options.sort(function(a,b){
                                    return parseFloat(a.id())  < parseFloat(b.id())? 1:-1;
                                });
                            }
                        }
                        if(self.nomeclassificado() != null && self.nomeclassificado() != ''){
                            if(self.nomeclassificado() == 1){
                                options = options.sort(function(a,b){
                                    return a.nome() > b.nome()? 1:-1;
                                });
                            } else {
                                options = options.sort(function(a,b){
                                    return a.nome() < b.nome()? 1:-1;
                                });
                            }
                        }

                    return params.destino(options);
                });

            },
            template:'<!-- ko template:template --><!-- /ko -->'
        });
    </script>
