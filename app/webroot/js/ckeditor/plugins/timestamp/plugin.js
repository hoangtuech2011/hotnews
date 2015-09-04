//var editor = CKEDITOR.replace('editor');	

CKEDITOR.plugins.add('timestamp',
			{
			    init: function(editor)
			    {
			    	editor.addCommand( 'timestamp', new CKEDITOR.dialogCommand( 'timestampDialog' ) );

			    	editor.ui.addButton( 'Timestamp',
		    			{
		    				label: 'Insert Fields',
		    				command: 'timestamp',
		                    toolbar: 'insert,0',
		    				icon: this.path + 'icons/timestamp.png',
		    				
		    			} );
			    	CKEDITOR.dialog.add( 'timestampDialog', this.path + 'dialogs/timestamp.js' );
			    }
			});
