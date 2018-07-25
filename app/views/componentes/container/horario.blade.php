<template id="horariotemplate">
	<input 
		type='text' 
		style='width:70px;' 
		data-bind="
			value:display, 
		"
	></input>
</template>
<script type="text/javascript">
	ko.components.register('horario',{
		viewModel:function(params)
		{
			console.log('params');
			console.log(params);
			var self = this;
			self.template  = 'horariotemplate';
			self.val       = ko.observable(params.val);
			self.display   = ko.observable();
			
			var a = ko.computed(function(){
				read:
				if (!!self.val())
				{
					console.log('entrei 1');
					var display = self.val().split(' ');	
					self.display(display[1]);
				}
				write: 
					console.log('entrei 2');
					self.val(
					moment().format("YYYY-MM-DD")+' '+params.val
				);
			});
			console.log('self.val()');
			console.log(self.val());
			console.log('self.display()');
			console.log(self.display());
		},
		template:'<!-- ko template:template --><!-- /ko -->'
	});	
</script>
