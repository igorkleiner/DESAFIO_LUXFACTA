<template id="horariotemplate">
	<input 
		type='text' 
		style='width:70px;' 
		data-bind="
			masked:internalValue, 
			mask: mask,
			visible:visible,
			hasFocus:hasFocus
		"
	></input>
</template>
<script type="text/javascript">
	ko.components.register('horario',{
		viewModel:function(params)
		{
			var self = this;

			self.template      = 'horariotemplate';
			self.mask          - ko.observable(params.mask);
			self.visible       = params.visible;
			self.hasFocus      = params.hasFocus;
					
			self.internalValue = ko.computed(
			{
				read: function()
				{
					if (params.value() &&!!params.value() && params.value().format('HH:mm:ss') !="00:00:00")
					{					
						return params.value().format('HH:mm:ss');
					}
					return self.placeholder;
				},
				write: function(hora)
				{
					params.value( moment(
						moment().format("YYYY-MM-DD")+' '+ hora , "YYYY-MM-DD HH:mm:ss")
					);
				}
			});
		},
		template:'<!-- ko template:template --><!-- /ko -->'
	});	
</script>