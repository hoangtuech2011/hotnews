
	CKEDITOR.dialog.add( 'linkunsubDialog', function( editor ) {
	    return {
	        title: 'Link Unsub Properties',
	        minWidth: 400,
	        minHeight: 50,
	        contents: [
	            {
	                id: 'tab-link',
	                label: 'Basic Settings',
	                elements: [
	                    // UI elements of the first tab will be defined here.
	                    {
							type : 'text',
							id : 'contents',
							label : 'Displayed Text',
							validate : CKEDITOR.dialog.validate.notEmpty( 'The Text of link not empty.' ),
							required : true,
							commit : function( data )
							{
								data.contents = this.getValue();
							}
						},
	                ]
	            },
	        ],
	       
		    onOk: function() {
		    	var dialog = this,
				data = {},
				link = editor.document.createElement( 'a' );
				this.commitContent( data );
	
				link.setAttribute( 'href', 'UNSUB_LINK' );
	
				if ( data.newPage )
					link.setAttribute( 'target', '_blank' );
	
				link.setHtml( data.contents );
	
				editor.insertElement( link );
	        }
	    };
	});
//});