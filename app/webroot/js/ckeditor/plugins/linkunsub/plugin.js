//var editor = CKEDITOR.replace('editor');	

CKEDITOR.plugins.add('linkunsub',
			{
			    init: function(editor)
			    {
			    	editor.addCommand( 'linkunsub', new CKEDITOR.dialogCommand( 'linkunsubDialog' ) );

			    	editor.ui.addButton( 'Linkunsub',
		    			{
		    				label: 'Insert Link Unsub',
		    				command: 'linkunsub',
		                    toolbar: 'insert,0',
		    				icon: this.path + 'icons/linkunsub.png',
		    				
		    			} );
			    	CKEDITOR.dialog.add( 'linkunsubDialog', this.path + 'dialogs/linkunsub.js' );
			    }
			});
