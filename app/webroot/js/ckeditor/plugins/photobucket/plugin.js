//var editor = CKEDITOR.replace('editor');	

CKEDITOR.plugins.add('photobucket',
			{
			    init: function(editor)
			    {
			    	editor.addCommand( 'photobucket', new CKEDITOR.dialogCommand( 'photobucketDialog' ) );

			    	editor.ui.addButton( 'Photobucket',
		    			{
		    				label: 'Photobucket',
		    				id:'list_PB',
		    				command: 'photobucket',
		                    toolbar: 'insert,0',
		    				icon: this.path + 'icons/photobucket.png',
		    			} );
			    	CKEDITOR.dialog.add( 'photobucketDialog', this.path + 'dialogs/photobucket.js' );
			    }
			});
