//var editor = CKEDITOR.replace('editor');	

CKEDITOR.plugins.add('photocloud',
			{
			    init: function(editor)
			    {
			    	editor.addCommand( 'photocloud', new CKEDITOR.dialogCommand( 'photocloudDialog' ) );

			    	editor.ui.addButton( 'Photocloud',
		    			{
		    				label: 'Photocloud',
		    				id:'list_PB',
		    				command: 'photocloud',
		                    toolbar: 'insert,0',
		    				icon: this.path + 'icons/photocloud.png',
		    				
		    			} );
			    	CKEDITOR.dialog.add( 'photocloudDialog', this.path + 'dialogs/photocloud.js' );
			    }
			});
