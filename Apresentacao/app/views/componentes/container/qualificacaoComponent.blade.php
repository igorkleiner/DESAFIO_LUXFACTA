<template id="qualificacaoTemplate">
    <div _ngcontent-c1="" style="margin-left:11px">
        <span _ngcontent-c1="" class="help-block">
            <br _ngcontent-c1="">
            <i _ngcontent-c1="" class="far fa-hand-point-right fa-sm"></i>
            &nbsp;&nbsp;
            <strong _ngcontent-c1="">Por favor, revise a informação abaixo e qualifique.</strong>
        </span>
        <br _ngcontent-c1="">
        <div _ngcontent-c1="" class="main">
            <ul _ngcontent-c1="" class="rating">
                <li _ngcontent-c1=""><span _ngcontent-c1=""data-bind="click:select.bind($data,1) ,css: { 'cust-btn-selected': selected() == 1 }"  class="btn cust-btn">1</span></li>
                <li _ngcontent-c1=""><span _ngcontent-c1=""data-bind="click:select.bind($data,2) ,css: { 'cust-btn-selected': selected() == 2 }"  class="btn cust-btn">2</span></li>
                <li _ngcontent-c1=""><span _ngcontent-c1=""data-bind="click:select.bind($data,3) ,css: { 'cust-btn-selected': selected() == 3 }"  class="btn cust-btn">3</span></li>
                <li _ngcontent-c1=""><span _ngcontent-c1=""data-bind="click:select.bind($data,4) ,css: { 'cust-btn-selected': selected() == 4 }"  class="btn cust-btn">4</span></li>
                <li _ngcontent-c1=""><span _ngcontent-c1=""data-bind="click:select.bind($data,5) ,css: { 'cust-btn-selected': selected() == 5 }"  class="btn cust-btn">5</span></li>
                <li _ngcontent-c1=""><span _ngcontent-c1=""data-bind="click:select.bind($data,6) ,css: { 'cust-btn-selected': selected() == 6 }"  class="btn cust-btn">6</span></li>
                <li _ngcontent-c1=""><span _ngcontent-c1=""data-bind="click:select.bind($data,7) ,css: { 'cust-btn-selected': selected() == 7 }"  class="btn cust-btn">7</span></li>
                <li _ngcontent-c1=""><span _ngcontent-c1=""data-bind="click:select.bind($data,8) ,css: { 'cust-btn-selected': selected() == 8 }"  class="btn cust-btn">8</span></li>
                <li _ngcontent-c1=""><span _ngcontent-c1=""data-bind="click:select.bind($data,9) ,css: { 'cust-btn-selected': selected() == 9 }"  class="btn cust-btn">9</span></li>
                <li _ngcontent-c1=""><span _ngcontent-c1=""data-bind="click:select.bind($data,10),css: { 'cust-btn-selected': selected() == 10 }" class="btn cust-btn">10</span></li>
                <li _ngcontent-c1=""><span _ngcontent-c1=""data-bind="click:select.bind($data,0) ,css: { 'cust-btn-selected': selected() == 0 }"  class="btn cust-btn">Não Aplicável</span></li>
            </ul>
        </div>
        <table _ngcontent-c1="" class="main">
            <tbody _ngcontent-c1="">
                <tr _ngcontent-c1="">
                    <td _ngcontent-c1="" style="width:100px">
                        <div _ngcontent-c1="" class="arrow med-ds">Cético Digital</div>
                    </td>
                    <td _ngcontent-c1="" style="width:100px">
                        <div _ngcontent-c1="" class="arrow med">Iniciante Digital</div>
                    </td>
                    <td _ngcontent-c1="" style="width:160px">
                        <div _ngcontent-c1="" class="arrow med-df">Seguidor Digital</div>
                    </td>
                    <td _ngcontent-c1="" style="width:169px">
                        <div _ngcontent-c1="" class="arrow med-ds">Especialista Digital</div>
                    </td>
                    <td _ngcontent-c1="">
                        <div _ngcontent-c1="" class="arrow med-ds">Líder Digital</div>
                    </td>
                </tr>
            </tbody>
        </table>
        <br _ngcontent-c1="">
    </div>
</template>
    <script type="text/javascript">
        ko.components.register('qualificacao',{
            viewModel:function(params){
                var self = this;
                self.template      = 'qualificacaoTemplate';
                self.selected      = ko.observable(params.value());
                self.select = function(value){
                    self.selected(value);
                    params.value(value);
                }
            },
            template:'<!-- ko template:template --><!-- /ko -->'
        });
    </script>
