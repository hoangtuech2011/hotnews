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
			$("div[name=list_album_photo] .cke_dialog_ui_input_select > select")
				.append($("<option></option>")
				.attr("value",results)
				.text(results));
			$(".content").removeClass('box');
			$(".cke_dialog").show();
});
CKEDITOR.dialog.add( 'photocloudDialog', function( editor ) {
    return {
        title: 'Photocloud Properties',
        minWidth: 400,
        minHeight: 50,
        buttons:[{
            type:'button',
            id:'someButtonIDs', /* note: this is not the CSS ID attribute! */
            label: 'List Image',
            onClick: function(){
            	$(".cke_dialog").css("z-index","1000");
            	$(".cke_dialog_background_cover").css("z-index","1000");
            	CKEDITOR.dialog.getCurrent().hide();
            	$.ajax({
            		type: "POST",
            		url: "/photos/getListImage",
            		//dataType: "json",
            		beforeSend : function(){
            			//$(".cke_dialog").hide();
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
            			$.each(result, function (item, value) {
            				arr.push("<img id='img_pb' onclick='javascript:addImageCk(\""+value+"\");' style='width:150px;heigth:50px' src='"+value+"' />");
            				if(++k % jBreak ==0){
            					tmp.push(arr);
            					arr = [];
            				} 
            			});
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
            id:'someButtonIDs', /* note: this is not the CSS ID attribute! */
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
            			//var result = eval(results);
            			
        				$(".cke_dialog_ui_input_select > select").html("");
//        	         	var options = [];
//        				var i = 0;
//        				var result = eval(results);
//        				var name_ablum = "";
//        				var total_image = "";
//            				$.each(result, function (item, value) {
//            					name_ablum = value.name;
//            					if(name_ablum!='duongdat82'){
//            						$("div[name=list_album] .cke_dialog_ui_input_select > select")
//            	                    .append($("<option></option>")
//            	                    .attr("value",name_ablum)
//            	                    .text(name_ablum));
//            					}
//            				});
        				
        				$("div[name=list_album_photo] .cke_dialog_ui_input_select > select")
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
                id: 'list_album_photo',
                label: 'Basic Settings',
                elements: [
                    // UI elements of the first tab will be defined here.
                    
                      	{
                      		type : 'select',
                      		id : 'list',
                      		label : 'List',
//                      		items : options
                      		items : [[ 'Loading', 'loading' ]],
			            },
                ]
            },
        ],
       
	    onOk: function() {
            var dialog = this;

            var timestamp = editor.document.createElement( 'photocloud' );            
            timestamp.setText( dialog.getValueOf( 'tab-basic', 'style' ) );
            editor.insertElement( timestamp );
        }
    };
});
//});

	