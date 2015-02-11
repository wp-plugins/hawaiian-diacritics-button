//**********************************************************************
// Create button
//**********************************************************************
(function() {
	var plugin_name = 'Hawaiian Diacritics';
	var plugin_nicename = 'hdb';
	var window_url = '/charmap.php';
	var window_width = 550;
	var window_height = 250;
	var button_url = '/button.png';
	
	tinymce.create('tinymce.plugins.hdb_plugin', {
		init : function(ed, url) {
			ed.addCommand(plugin_nicename, function() {
				ed.windowManager.open({
					file : url + window_url,
					width : window_width + parseInt(ed.getLang('example.delta_width', 0)),
					height : window_height + parseInt(ed.getLang('example.delta_height', 0)),
					inline : 1
				}, {
					plugin_url : url
				});
			});
			ed.addButton(plugin_nicename, {title : plugin_name, cmd : plugin_nicename, image: url + button_url });
		}
	});
	tinymce.PluginManager.add(plugin_nicename, tinymce.plugins.hdb_plugin);
})();
