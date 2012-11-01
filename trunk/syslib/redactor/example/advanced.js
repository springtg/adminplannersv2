if (typeof RedactorPlugins === 'undefined') var RedactorPlugins = {};

RedactorPlugins.advanced = {

	init: function()
	{
		this.addBtnAfter('link', 'advanced', 'Advanced', function(obj)
		{
			obj.insertHtml('<b>It\'s awesome!</b> ');
		});
		
		this.addBtnSeparatorBefore('advanced');
	}

}