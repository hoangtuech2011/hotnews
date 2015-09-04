$.ajax({
		type: "POST",
		url: "/pbapis/getListAlbum",
		//dataType: "json",
		beforeSend : function(){
			$(".cke_dialog").hide();
			$(".content").addClass('box');			
    	},
		})
		.done(function( results ) {
				//var result = eval(results);
				$(".cke_dialog_ui_input_select > select").html("");
	         	var options = [];
				var i = 0;
				var name_ablum = "";
				var total_image = "";
				//$.each(result, function (item, value) {
					//name_ablum = value.name;
					//name_ablum = value.Account.photobucket_album;
					//alert(value.Account.photobucket_album);
					//if(name_ablum!='duongdat82'){
						//$("div[name=list_album] .cke_dialog_ui_input_select > select")
	                    //.append($("<option></option>")
	                    //.attr("value",name_ablum)
	                    //.text(name_ablum));
					//}
				//});
				$("div[name=list_album] .cke_dialog_ui_input_select > select")
					.append($("<option></option>")
					.attr("value",results)
					.text(results));
				$(".content").removeClass('box');
				$(".cke_dialog").show();
});
	CKEDITOR.dialog.add( 'photobucketDialog', function( editor ) {
	    return {
	        title: 'Photobucket Properties',
	        minWidth: 400,
	        minHeight: 50,
	        buttons:[{
	            type:'button',
	            id:'someButtonID', /* note: this is not the CSS ID attribute! */
	            label: 'List Image',
	            onClick: function(){
	            	$(".cke_dialog").css("z-index","1000");
	            	$(".cke_dialog_background_cover").css("z-index","1000");
	            	var name_album = $("div[name=list_album] .cke_dialog_ui_input_select > select").val();
	            	CKEDITOR.dialog.getCurrent().hide();
	            	$.ajax({
	        			type: "POST",
	        			url: "/pbapis/getAlbum",
	        			data: { name_album:name_album},
	        			dataType: "json",
	        			beforeSend : function(){
	        				$(".content").addClass('box');
	        	    	},
	        			})
	        			.done(function( results ) {
	        				var result = eval(results);
	        				var html = "";
	        				var j = 0;
	        				var total_item = result.length;
	        				var k = 0;
	        				var tmp = [];
	        				var arr = [];
	        				var jBreak=3;
	        				for (j = 0; j<result.length; j++) {
	        					arr.push("<img id='img_pb' onclick='javascript:addImageCk(\""+result[j]+"\");' style='width:150px;heigth:50px' src='"+result[j]+"' />");
        						if(++k % jBreak ==0){
        							tmp.push(arr);
        							arr = [];
        						} 
	    	            	};
	        				if (arr.length>0) {
	        					mis_arr = jBreak - arr.length;
	        					if(mis_arr==2){
	        						arr.push("","");
	        					}else{
	        						arr.push("");
	        					}
	        					tmp.push(arr);
	        				}
	        				var data = [];
	        				data = tmp;
	        				$("#example-img").dataTable().fnDestroy();
							$('#example-img').dataTable({
								"aaData": data,
								"sScrollX": "100%",
								"bSort": false
							});
	        				$(".content").removeClass('box');
	        				$("#list_image_PB").modal("show");
	        			});
	            }
	        },
	        {
	            type:'button',
	            id:'someButtonID', /* note: this is not the CSS ID attribute! */
	            label: 'Refesh',
	            onClick: function(){
	            	$.ajax({
	            		type: "POST",
	            		url: "/pbapis/getListAlbum",
	            		//dataType: "json",
	            		beforeSend : function(){
	            			//$(".cke_dialog").hide();
	            			$(".content").addClass('box');			
	                	},
	            		})
	            		.done(function( results ) {
//	            			var result = eval(results);
            				$(".cke_dialog_ui_input_select > select").html("");
//	            	         	var options = [];
//	            				var i = 0;
//	            				var result = eval(results);
//	            				var name_ablum = "";
//	            				var total_image = "";
//	            				$.each(result, function (item, value) {
//	            					name_ablum = value.name;
//	            					if(name_ablum!='duongdat82'){
//	            						$("div[name=list_album] .cke_dialog_ui_input_select > select")
//	            	                    .append($("<option></option>")
//	            	                    .attr("value",name_ablum)
//	            	                    .text(name_ablum));
//	            					}
//	            				});
            				$("div[name=list_album] .cke_dialog_ui_input_select > select")
        					.append($("<option></option>")
        					.attr("value",results)
        					.text(results));
            				$(".content").removeClass('box');
            				$(".cke_dialog").show();
	            });
	            }
	        },CKEDITOR.dialog.okButton,
	        CKEDITOR.dialog.cancelButton],
	        contents: [
	            {
	                id: 'list_album',
	                label: 'Basic Settings',
	                elements: [
	                    // UI elements of the first tab will be defined here.
	                    
	                      	{
	                      		type : 'select',
	                      		id : 'ablum',
	                      		label : 'Ablum',
//	                      		items : options
	                      		items : [[ 'Loading', 'loading' ]],
				            },
	                ]
	            },
	        ],
	       
		    onOk: function() {
	            var dialog = this;
	
	            var timestamp = editor.document.createElement( 'photobucket' );            
	            timestamp.setText( dialog.getValueOf( 'tab-basic', 'style' ) );
	            editor.insertElement( timestamp );
	        }
	    };
	});
//});