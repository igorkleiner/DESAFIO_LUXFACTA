<style type="text/css">
    body {
    }

    .koSelect {
        user-select: none;
        width:450px;
    }

    .koSelect-box {
        border: 1px solid #CCC;
        padding: 7px 20px;
        border-radius: 5px;
        box-shadow: 0 0 3px #DDD;
        font-size: 12px;
        cursor: pointer;
    }

    .koSelect-box:before {
        content: '▼';
        display: block;
        position: absolute;
        left: 460px;
        font-size: 12px;
        top: 10px;
        color: #888;
        /*z-index: 111;*/
    }

    .koSelect-box.open:before {
        content: '▲' !important;
        top: 8px;
    }

    .koSelect-placeholder {
        color: #ccc;
    }

    .koSelect-selecteds {
        color: #999;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .koSelect-dropdown {
        position: absolute;
        border: 1px solid #ccc;
        box-shadow: 0 2px 2px #DDD;
        width: calc(100% - 30px);
        background: white;
        margin-top: -1px;
        border-radius: 5px;
        padding: 5px 10px;
        font-size: 12px;
        width: 450px;
        z-index: 9999;
    }

    .koSelect-scroll{
        max-height: 300px;
        overflow-y: scroll;
    }


    .koSelect-scroll::-webkit-scrollbar{
        width: 8px;
    }

    .koSelect-scroll::-webkit-scrollbar-thumb{
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
        background-color: #999;
    }

    .koSelect-option {
        padding-left: 5px;
    }

    .koSelect-option-label{
        display: block;
        cursor: pointer;
        margin: 0;
    }

    .koSelect-option-span{
        font-weight: normal;
        position: relative;
        bottom: 2px;
    }

    .koSelect-search {
        margin-bottom: 5px;
    }

    .koSelect-search input {
        width: 100%;
        outline: none;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 5px 10px;
        background: #FAFAFA;
    }
</style>
<template id="multiselectTemplate">
    <div class="koSelect">
        <div class="koSelect-box" data-bind="click: toggle, css: { 'open': opened }">
            <div class="koSelect-placeholder" data-bind="visible: selecteds().length == 0">Unidades disponiveis</div>
            <div class="koSelect-selecteds" data-bind="visible: selecteds().length > 0, text: selectedsText"></div>
        </div>
        <div class="koSelect-dropdown" data-bind="visible: opened" style="">
            <div class="koSelect-search" data-bind="visible: params.search">
                <input type="text" data-bind="value: search, valueUpdate: 'afterkeydown'"/>
            </div>
            <div class="koSelect-scroll">
                <div class="koSelect-option" data-bind="visible:params.showSelectAll">
                    <label class="koSelect-option-label">
                        <input type="checkbox" data-bind="checked: selectAll, click:checkAll" />
                        <span class="koSelect-option-span">Selecionar todas</span>
                    </label>
                </div>
                <!-- ko foreach: optionsFiltered -->
                <div class="koSelect-option" >
                    <label class="koSelect-option-label">
                        <input type="checkbox" data-bind="attr: {id:id , value:id }, checked: $parent.selecteds" />
                        <span class="koSelect-option-span" data-bind="text:nome"></span>
                    </label>
                </div>
                <!-- /ko -->
            </div>
        </div>
    </div>
</template>
<script type="text/javascript">
    ko.components.register('koselect',{
        viewModel:function(params)
        {
            var self = this;
            self.template = 'multiselectTemplate'
            self.params = params || {};
            self.opened = ko.observable(false);
            self.toggle = function() {
                self.opened(!self.opened());
            }
            self.options = self.params.options;
            self.search = ko.observable('');
            self.optionsFiltered = ko.computed(function()
            {
                var options = ko.utils.arrayFilter(self.options(), function(item, index)
                {
                    return item.nome.toLowerCase().indexOf(self.search().toLowerCase()) != -1;
                });

                if(self.params.limitRender)
                {
                    return ko.utils.arrayFilter(options, function(item, index)
                    {
                        return index < self.params.limitRender;
                    });
                }
                return options;
            });
            self.selecteds = self.params.selecteds;
            self.selectedsText = ko.computed(function()
            {
                var selecteds = ko.utils.arrayMap(self.selecteds(), function(item)
                {
                    var find = ko.utils.arrayFirst(self.options(), function(find)
                    { 
                        return find.id == item; 
                    });
                    return find.nome;
                });
                return selecteds.join(', ');
            });
            self.selectAll = ko.computed(function()
            {
               return (self.optionsFiltered().length == self.selecteds().length) ;
            });
            self.checkAll = function()
            {
                if (!self.selectAll()) 
                {
                    self.selecteds(
                        ko.utils.arrayMap(self.optionsFiltered(), function(item){return item.id.toString()})
                    );
                } 
                else
                {
                    self.selecteds([]);
                }  
                return true;
            };
            self.eventClose = function()
            {
                $(document).click(function(e)
                {
                    if($(e.target).parents().hasClass("koSelect") || $(e.target).hasClass("koSelect"))
                    {
                        return;
                    }
                    self.search('');
                    self.opened(false);
                })
            }
            self.eventClose();
        },
        template:'<!-- ko template:template --><!-- /ko -->'});
</script>
