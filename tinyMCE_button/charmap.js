/**
 * charmap.js
 *
 * Copyright 2009, Moxiecode Systems AB
 * Released under LGPL License.
 *
 * License: http://tinymce.moxiecode.com/license
 * Contributing: http://tinymce.moxiecode.com/contributing
 */

tinyMCEPopup.requireLangPack();

var charmap = [
// Hawaiian Diacritics
	['&#256;',     '&#256;',  true,'A kahako'],
	['&#257;',     '&#257;',  true,'a kahako'],
	['&#274;',     '&#274;',  true,'E kahako'],
	['&#275;',     '&#275;',  true,'e kahako'],
	['&#298;',     '&#298;',  true,'I kahako'],
	['&#299;',     '&#299;',  true,'i kahako'],
	['&#332;',     '&#332;',  true,'O kahako'],
	['&#333;',     '&#333;',  true,'o kahako'],
	['&#362;',     '&#362;',  true,'U kahako'],
	['&#363;',     '&#363;',  true,'u kahako'],
	['&#699;',     '&#699;',  true,'Okina']
];

tinyMCEPopup.onInit.add(function() {
	tinyMCEPopup.dom.setHTML('charmapView', renderCharMapHTML());
	addKeyboardNavigation();
});

function addKeyboardNavigation(){
	var tableElm, cells, settings;

	cells = tinyMCEPopup.dom.select("a.charmaplink", "charmapgroup");

	settings ={
		root: "charmapgroup",
		items: cells
	};
	cells[0].tabindex=0;
	tinyMCEPopup.dom.addClass(cells[0], "mceFocus");
	if (tinymce.isGecko) {
		cells[0].focus();		
	} else {
		setTimeout(function(){
			cells[0].focus();
		}, 100);
	}
	tinyMCEPopup.editor.windowManager.createInstance('tinymce.ui.KeyboardNavigation', settings, tinyMCEPopup.dom);
}

function renderCharMapHTML() {
	var charsPerRow = 20, tdWidth=20, tdHeight=20, i;
	var html = '<div id="charmapgroup" aria-labelledby="charmap_label" tabindex="0" role="listbox">'+
	'<table role="presentation" border="0" cellspacing="1" cellpadding="0" width="' + (tdWidth*charsPerRow) + 
	'"><tr height="' + tdHeight + '">';
	var cols=-1;

	for (i=0; i<charmap.length; i++) {
		var previewCharFn;

		if (charmap[i][2]==true) {
			cols++;
			previewCharFn = 'previewChar(\'' + charmap[i][1].substring(1,charmap[i][1].length) + '\',\'' + charmap[i][0].substring(1,charmap[i][0].length) + '\',\'' + charmap[i][3] + '\');';
			html += ''
				+ '<td class="charmap">'
				+ '<a class="charmaplink" role="button" onmouseover="'+previewCharFn+'" onfocus="'+previewCharFn+'" href="javascript:void(0)" onclick="insertChar(\'' + charmap[i][1].substring(2,charmap[i][1].length-1) + '\');" onclick="return false;" onmousedown="return false;" title="' + charmap[i][3] + ' '+ tinyMCEPopup.editor.translate("advanced_dlg.charmap_usage")+'">'
				+ charmap[i][1]
				+ '</a></td>';
			if ((cols+1) % charsPerRow == 0)
				html += '</tr><tr height="' + tdHeight + '">';
		}
	 }

	if (cols % charsPerRow > 0) {
		var padd = charsPerRow - (cols % charsPerRow);
		for (var i=0; i<padd-1; i++)
			html += '<td width="' + tdWidth + '" height="' + tdHeight + '" class="charmap">&nbsp;</td>';
	}

	html += '</tr></table></div>';
	html = html.replace(/<tr height="20"><\/tr>/g, '');

	return html;
}

function insertChar(chr) {
	tinyMCEPopup.execCommand('mceInsertContent', false, '&#' + chr + ';');

	// Refocus in window
	if (tinyMCEPopup.isWindow)
		window.focus();

	tinyMCEPopup.editor.focus();
	tinyMCEPopup.close();
}

function previewChar(codeA, codeB, codeN) {
	var elmA = document.getElementById('codeA');
	var elmB = document.getElementById('codeB');
	var elmV = document.getElementById('codeV');
	var elmN = document.getElementById('codeN');

	if (codeA=='#160;') {
		elmV.innerHTML = '__';
	} else {
		elmV.innerHTML = '&' + codeA;
	}

	elmB.innerHTML = '&amp;' + codeA;
	elmA.innerHTML = '&amp;' + codeB;
	elmN.innerHTML = codeN;
}
