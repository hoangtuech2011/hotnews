CKEDITOR.editorConfig = function( config )
{
	//config.extraPlugins = 'params';
	config.extraPlugins = 'timestamp,photobucket,linkunsub,photocloud';
	config.allowedContent = true;
	config.fullPage = true;
//	config.extraPlugins = 'photobucket';
	//config.toolbar = 'MyToolbar';
    	//for Oembed
    	//Enable the plugin by changing or adding the extraPlugins line in your configuration (config.js):
	//config.extraPlugins = 'image';
    	//config.extraPlugins = 'oembed,widget';
	//config.oembed_maxWidth = '560';
    	//config.oembed_maxHeight = '315';
    	// Load the English interface.
    	//config.language = 'en';
    	// In CKEditor 4.1 or higher you need to disable ACF (Advanced Content Filter) in the config.js file:
    	//config.allowedContent = true;
    	//config.removePlugins = 'elementspath,save,font,preview,find,forms,iframe,liststyle,magicline,div,pagebreak,pastefromword,colordialog,a11yhelp,wsc,clipboard,scayt,print,templates';
   	config.toolbar = [
	        { name: 'document', items: [ 'Source','mode', 'document' ] },
	        { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','-','Undo','Redo' ] },
	        { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','-','RemoveFormat','StrikeThrough','-','Cut','Copy','Paste','Find','Replace','-','Spellchecker'] },
			{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl'] },
			'/',
			{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
	        { name: 'insert', items : [ 'Timestamp','Photobucket','Linkunsub','Photocloud','Image','Table','HorizontalRule','Smiley','SpecialChar'] },
	        { name: 'links', items : [ 'Link','Unlink' ] },
	        ['Styles','Format','Font','FontSize'],
	        { name: 'tools', items : [ 'Maximize','-','About' ] },
	];
 	
	config.skin = 'kama';
   
//   config.filebrowserBrowseUrl = '/js/kcfinder/browse.php?type=files';
//   config.filebrowserImageBrowseUrl = 'http://i1373.photobucket.com/albums/ag375/phuongduy214';
//   config.filebrowserFlashBrowseUrl = '/js/kcfinder/browse.php?type=flash';
//   config.filebrowserUploadUrl = '/js/kcfinder/upload.php?type=files';
//   config.filebrowserImageUploadUrl = '/js/kcfinder/upload.php?type=images';
//   config.filebrowserFlashUploadUrl = '/js/kcfinder/upload.php?type=flash';
   

};



