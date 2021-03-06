<template id="horariotemplate">
	<!-- ko if: self.editMode || (usuario.per_id == 5 && !editMode) -->
		<input type='text' style='width:50%;' data-bind="masked:internalValue, mask: mask,visible:visible ,hasFocus:hasFocus"></input>
    <!-- /ko -->
    <!-- ko if: !self.editMode && usuario.per_id != 5 -->
		<span type='text' data-bind="text:internalValue, visible:visible,hasFocus:hasFocus"></span>    
    <!-- /ko -->
</template>
<script type="text/javascript">
	ko.components.register('horario',{
		viewModel:function(params){
			var self = this;
			self.template      = 'horariotemplate';
			self.mask          - ko.observable(params.mask);
			self.visible       = params.visible;
			self.hasFocus      = params.hasFocus;
			self.data          = params.data;
			self.editMode      = params.editMode;
			
			self.internalValue = ko.computed(
			{
				read: function()
				{
					if (params.value() && !!params.value() && params.value().format('HH:mm:ss') !="00:00:00")
					{					
						return params.value().format('HH:mm:ss');
					}
				},
				write: function(hora)
				{
					if (!self.editMode) {

						if(moment(moment().format("YYYY-MM-DD")+' '+ hora, "YYYY-MM-DD HH:mm:ss")._isValid == true){
							params.value( moment(moment().format("YYYY-MM-DD ")+ hora , "YYYY-MM-DD HH:mm:ss"));
						}
						else{
							params.value(params.value());
							alert("Digite um horário válido");
						}
					} else {

						if(moment(moment(data,'YYYY-MM-DD').format("YYYY-MM-DD ")+' '+ hora, "YYYY-MM-DD HH:mm:ss")._isValid == true){
							params.value( moment(moment(data,'YYYY-MM-DD').format("YYYY-MM-DD ")+ hora , "YYYY-MM-DD HH:mm:ss"));
						}
						else{
							params.value(params.value());
							alert("Digite um horário válido");
						}

					}
				}
			});
		},
		template:'<!-- ko template:template --><!-- /ko -->'
	});	
</script>