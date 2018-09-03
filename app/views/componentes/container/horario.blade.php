<template id="horariotemplate">
	<input 
		type='text' 
		style='width:70px;' 
		data-bind="
			masked:internalValue, 
			mask: mask,
			placeholder:'placeholder'	 
		"
	></input>
</template>
<script type="text/javascript">
	ko.components.register('horario',{
		viewModel:function(params)
		{
			// console.log("params: ", params)
			var self = this;

			self.template      = 'horariotemplate';
			self.mask          - ko.observable(params.mask);
			self.placeholder   - ko.observable(params.placeholder);
			self.display       = ko.observable();	
					
			self.internalValue = ko.computed(
			{
				read: function()
				{
					if (params.value() &&!!params.value())
					{					
						return params.value().format('HH:mm:ss');
					}
				},
				write: function(hora)
				{
					params.value(moment(
						moment().format("YYYY-MM-DD")+' '+ hora , "YYYY-MM-DD HH:mm:ss"
					));
				}
			});
		},
		template:'<!-- ko template:template --><!-- /ko -->'
	});	
</script>