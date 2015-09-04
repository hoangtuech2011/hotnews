var options = [];
var result = ($("#param_fields").val()!="") ? $("#param_fields").val():'none';
var i = 0;
var results = result.split(',');
$.each(results, function (item, value) {
	if(value!='english' && value!='language'){
		var tmp = [];//alert(item+" "+value);
		tmp[0] = value;
		tmp[1] = "|{@"+value+"@}|";
		options[i++] = tmp;
	}
})
//$.each($.parseJSON(result), function (item, value) {
//		var tmp = [];//alert(item+" "+value);
//		tmp[0] = value;
//		tmp[1] = "|{@"+value+"@}|";
//		options[i++] = tmp;
//	
//});
//console.log(options);
	CKEDITOR.dialog.add( 'timestampDialog', function( editor ) {
	    return {
	        title: 'Abbreviation Properties',
	        minWidth: 400,
	        minHeight: 50,
	        buttons:[{
	            type:'button',
	            id:'someButtonID', /* note: this is not the CSS ID attribute! */
	            label: 'Refesh',
	            onClick: function(){
	            	var param_fields = ($("#param_fields").val()!="") ? $("#param_fields").val():'none';
	            	var param_field = param_fields.split(',');
	            	$("div[name=tab-basic] .cke_dialog_ui_input_select > select").html("");
	            	$.each(param_field, function (i, val) {
	            		if(val!='english' && val!='language'){
		            		$("div[name=tab-basic] .cke_dialog_ui_input_select > select")
		                    .append($("<option></option>")
		                    .attr("value","|{@"+val+"@}|")
		                    .text(val));
	            		}
	            	});
	            }
	        },CKEDITOR.dialog.okButton,
	        CKEDITOR.dialog.cancelButton],
	        contents: [
	            {
	                id: 'tab-basic',
	                label: 'Basic Settings',
	                elements: [
	                    // UI elements of the first tab will be defined here.
	                    
	                      	{
	                      		type : 'select',
	                      		id : 'style',
	                      		label : 'Style',
	                      		items : options
				            },
	                ]
	            },
	        ],
	       
		    onOk: function() {
	            var dialog = this;
	
	            var timestamp = editor.document.createElement( 'timestamp' );            
	            timestamp.setText( dialog.getValueOf( 'tab-basic', 'style' ) );
	            editor.insertElement( timestamp );
	        }
	    };
	});
//});