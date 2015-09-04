
function checkValidConsumerPromotion()
{
	var ConsumerPromotionName = $("#ConsumerPromotionName").val();
	var ConsumerPromotionValidFrom = $("#ConsumerPromotionValidFrom").val();
	var ConsumerPromotionValidTo = $("#ConsumerPromotionValidTo").val();
	var ConsumerPromotionFile = $("#file").val();
	var ConsumerPromotionPromotionTypeId = $("#ConsumerPromotionPromotionTypeId").val();
	var str_error = "";
	var ConsumerPromotionPromotionTypeId = [];
	$(':checkbox:checked').each(function(i){
		ConsumerPromotionPromotionTypeId[i] = $(this).val();
	});
	if($.trim(ConsumerPromotionName)==="" || checkOneMoreSpaceAndEmpty(ConsumerPromotionName))
		str_error += "Name can not empty and have special character! </br>";
	if($.trim(ConsumerPromotionValidFrom)==="" || checkOneMoreSpaceAndEmpty(ConsumerPromotionValidFrom))
		str_error += "Valid from can not empty and have special character! </br>";
	if($.trim(ConsumerPromotionValidTo)==="" || checkOneMoreSpaceAndEmpty(ConsumerPromotionValidTo))
		str_error += "Valid to can not empty and have special character! </br>";
	if($.trim(ConsumerPromotionPromotionTypeId)==="")
		str_error += "Promotion type can not empty! </br>";
	if($.trim(ConsumerPromotionFile)==="")
		str_error += "Image can not empty!";
	if(str_error==="")
	{
		$(".btn-success").attr('disabled','disabled');
		$("#frm_promotion").submit();
	}
	else
	{
		$("#msg_content").html("");
		$("#msg_content").html(str_error);
		$("#msg_error").modal("show");
	}
}