ko.bindingHandlers.masked = 
{
    init: function (element, valueAccessor, allBindingsAccessor) 
    {
        var mask = allBindingsAccessor().mask || {};
        var placeholder = allBindingsAccessor().placeholder;
        if (placeholder) 
        {
            $(element).mask(mask, { placeholder: placeholder });
        } 
        else 
        {
            $(element).mask(mask);
        }
        ko.utils.registerEventHandler(element, "change", function () 
        {
            var observable = valueAccessor();
            observable($(element).val());
        });
    },
    update: function (element, valueAccessor) {
        var value = ko.utils.unwrapObservable(valueAccessor());
        $(element).val(value);
    }
};

/*
    DATEPICKER MODO DE USO:
    <input type="text" class="form-control" data-bind="
        datepicker: <ko.observable>,
        dpotions:{callback:function(usado_quando_mudar_a_data){}},
        attr: { placeholder: '{{Lang::get('sac.screens.historic.dateLastrequest')}}' }
    ">
*/
ko.bindingHandlers.datepicker = {
    init: function (element, valueAccessor, allBindings, viewModel, bindingContext) {
        var options = allBindings.get('dpotions') || {};
        options.format = 'dd/mm/yyyy'; // esperando customizacao para funcionar 
        options.clearBtn = options.clearBtn || true;
        options.language = options.language || 'pt-BR';
        options.multidate = options.multidate || false;
        options.disableTouchKeyboard = options.disableTouchKeyboard || false;
        options.enableOnReadonly = options.enableOnReadonly || true;
        options.keyboardNavigation = options.keyboardNavigation || false;
        options.autoclose = options.autoclose || true;
        options.forceParse = options.forceParse || true;
        options.orientation = options.orientation || 'auto';
        options.todayHighlight = options.todayHighlight || true;
        options.toggleActive = options.toggleActive || true;

        $(element).datepicker(options)
            .on('changeDate', function (e) {
                var obs = valueAccessor();
                if (typeof (e.date) != 'undefined') {
                    var _obsdate = moment(new Date(e.date.getFullYear(), e.date.getMonth(), e.date.getDate(), 12)).format('YYYY-MM-DD');
                    if (ko.isObservable(obs)) {
                        obs(_obsdate);
                    } else {
                        valueAccessor(_obsdate);
                    }
                    if (typeof (options.callback) == 'function') options.callback();
                }
                if (typeof (e.date) == 'undefined') {
                    if (ko.isObservable(obs)) {
                        obs(null);
                    } else {
                        valueAccessor(null);
                    }
                }
            });
    },
    update: function (element, valueAccessor, allBindings, viewModel, bindingContext) {
        var val = ko.unwrap(valueAccessor());
        if (!moment.isMoment(val)) val = moment(val, 'YYYY-MM-DD');
        $(element).datepicker('update', new Date(val.format('MM/DD/YYYY', 12)));
    }
};

ko.bindingHandlers.cuttext = {
    update: function (element, valueAccessor, allBindings, viewModel, bindingContext) {
        var length = allBindings().length || 20; //Valor default que será usado para cortar o teste
        var trailing = allBindings().trailing || "";
        var value = ko.utils.unwrapObservable(valueAccessor());
        if (length < value.length) {
            value = value.substr(0, length) + trailing;
        }
        $(element).text(value);
    }
};

ko.bindingHandlers.enterkey = {
    init: function (element, valueAccessor, allBindings, viewModel) {
        var callback = valueAccessor();
        $(element).keypress(function (event) {
            var keyCode = (event.which ? event.which : event.keyCode);
            if (keyCode === 13) {
                callback.call(viewModel);
            }
        });
    }
};