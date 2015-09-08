function checkValidPage(){
	$("#Page").submit();
}
function checkValidSetting()
{
	$("#Setting").submit();
}
function checkValidCategory()
{
	$("#Category").submit();
}
function checkValidUser()
{
	$("#UserAdd").submit();
}

var page_id = '';
var category_id = '';
var key_word = '';
$("#keyword" ).change(function() {
	var key_word = $('#keyword').val();
	$("#searchcontact").attr('disabled','disabled');
	$("#tableNew").dataTable().fnDestroy();
	loadDatatable(account_id,key_word);
});

$("#page").change(function(){
	page_id = $("#page").val();
	$("#searchcontact").attr('disabled','disabled');
	$("#tableNew").dataTable().fnDestroy();
	loadDatatable(page_id, category_id, key_word);
});

$("#category").change(function(){
	category_id = $("#category").val();
	$("#searchcontact").attr('disabled','disabled');
	$("#tableNew").dataTable().fnDestroy();
	loadDatatable(page_id, category_id, key_word);
});

var checkNew = function(category_name, hot, id){
	$.ajax({
        method:'post',
        data: {category_name : category_name, hot : hot},
        url:'/News/checkNewNews',
        success:function(data){
          if(data > 0)
          {
        	//$("#smsCampaignLoading").show();
          	$(id).load($(location).attr('href') +" "+id);
          	$.ajax({
	            method:'post',
	            data: {category_name : category_name, hot : hot},
	            url:'/News/updateNewNews',
	            success:function(data){
	            	//$("#smsCampaignLoading").hide();
	            }
	         });
	        
          }
        }
      });
};
$(document).ready(function(){
	$("div.child_category a").click(function(){
		var href = $(this).attr('href');
		window.location.href = href;
	});
	$("div#index a").click(function()
	{
	  var href = $(this).attr('href');
		$.ajax({
		      method:'post',
		      data: {href : href},
		      url:'/News/updateViews'
		});
		return false;
	});
	
});
