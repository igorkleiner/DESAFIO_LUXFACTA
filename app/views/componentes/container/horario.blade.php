<template id="horariotemplate">
	<input 
		type='text' 
		style='width:70px;' 
		data-bind="
			masked:display, 
			mask: mask,
			placeholder:'bosta'	 
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
			// self.internalValue = params.value;
			
			// self.internalValue.subscribe( function(){
			// 	self.display(self.internalValue().format('HH:mm:ss'));
			// });

			self.mask          - ko.observable(params.mask);
			self.placeholder   - ko.observable(params.placeholder);
			self.display       = ko.observable();	
					
			self.internalValue = ko.computed(
			{
				read: function()
				{
					if (!!self.internalValue())
					{					
						self.display(self.internalValue().format('HH:mm:ss'));
					}
				},
				write: function(val)
				{
					self.internalValue( moment(params.value()) );
				},
				update: function(val)
				{

				}
			});
		},
		template:'<!-- ko template:template --><!-- /ko -->'
	});	
</script>