/**
 * Created by Ho Thanh Hai on 06/04/2015.
 */

var loading_gif = '/img/ajax-loader1.gif';
var ajax_url = '/CallAsteriskSchedules/ajax';
var ajax_action = 'click_to_call';
//var alertify_script = '/js/alertify/alertify.min.js';
var call_popup_css = '/css/alertify/call_popup.css';
//var alertify_css = '/css/alertify/alertify.min.css';
//var alertify_theme_css = '/css/alertify/themes/bootstrap.min.css';

function isjQueryLoaded() {
    return (typeof jQuery !== 'undefined');
}

function loadScript(src, callback) {
    var head=document.getElementsByTagName('head')[0];
    var script= document.createElement('script');
    script.type= 'text/javascript';
    script.onreadystatechange = function () {
        if (this.readyState == 'complete' || this.readyState == 'loaded') {
            if(typeof callback==="function")
                callback();
        }
    }
    script.onload = callback;
    script.src = src;
    head.appendChild(script);
}

function loadCss(css_link){
    var head = document.getElementsByTagName('head')[0];
    var css = document.createElement('link');
    css.type = 'text/css';
    css.rel = 'stylesheet';
    css.href = css_link;
    head.appendChild(css);
}

function waitLoading(title, message){
    if(typeof alertify != 'undefined'){
        alertify.alert(title,'<p style="text-align:center; margin: 0"><img src="' + loading_gif + '" /><br />' + message+'</p>').set({
            'pinnable': true, 'modal':true, 'closable': false, frameless: true, movable: false
        });
    }
}
//waitLoading('Hi', 'Test');
function closeLoading(){
    if(typeof alertify != 'undefined') {
        alertify.closeAll();
    }
}

function tryLoadChain() {
    var chain = arguments;
    if (!isjQueryLoaded()) {
        if (chain.length) {
            loadScript(
                chain[0],
                function() {
                    tryLoadChain.apply(this, Array.prototype.slice.call(chain, 1));
                }
            );
        } else {
            alert('not loaded!');
        }
    } else {
        alert('loaded!');
    }
}

function click2Call(obj, exten, phone, lastname){
    if(!isjQueryLoaded()){
        alert('jQuery is not loaded');
    }else {
        var id = obj.id;
        var $this = $('#'+id);

        //return;
        $.ajax({
            url             : ajax_url,
            type            : 'post',
            dataType        : 'json',
            data            : {txt_ajax_action: ajax_action, txt_extension: exten, txt_phone: phone ,txt_lastname: lastname},
            beforeSend      : function(){
                $this.attr('disabled', true);
                waitLoading('Click2Call', 'Wait for few seconds')
            },
            success         : function(data, st){
                closeLoading();
                $this.attr('disabled', false);
                if(typeof data.error != 'undefined' && typeof data.success != 'undefined'){
                    if(data.error==0 && data.success==1){
                    	Popup_vtiger = _defPopup();
        				Popup_vtiger.content = data.div;
        				Popup_vtiger.displayPopup(Popup_vtiger.content,60000);
                    }else{
                        alertify.alert('Click2Call',data.message).set({'closable': true, frameless: false});
                    }
                }else{
                    alertify.alert('Click2Call','Unknown Error!!!').set({'closable': true, frameless: false});
                }
            },
            error           : function(xhr){
                closeLoading();
                $this.attr('disabled', false);
            }
        });
    }
}
function addComment(tmp){
    if(!isjQueryLoaded()){
        alert('jQuery is not loaded');
    }else {
        
        //var $this = $('#'+id);
        var v_keyword = $('#txt_keyword_'+tmp).val();
        var v_comment = $('#comment_'+tmp).val();
        $('#comment').val('Description');
        //return;
        $.ajax({
            url             : ajax_url,
            type            : 'post',
            dataType        : 'json',
            data            : {txt_ajax_action: 'add_comment', txt_keyword: v_keyword, comment: v_comment, tmp: tmp},
            beforeSend      : function(){
                //$this.attr('disabled', true);
                waitLoading('Click2Call', 'Wait for few seconds')
            },
            success         : function(data, st){
                closeLoading();
                //$this.attr('disabled', false);
                if(typeof data.error != 'undefined' && typeof data.success != 'undefined'){
                    if(data.error==0 && data.success==1){
                    	alertify.alert('AddComment',data.notify).set({'closable': true, frameless: false});
                    	return closePopup(data.tmp);
                    }else{
                        alertify.alert('AddComment',data.message).set({'closable': true, frameless: false});
                    }
                }else{
                    alertify.alert('AddComment','Unknown Error!!!').set({'closable': true, frameless: false});
                }
            },
            error           : function(xhr){
                closeLoading();
                //$this.attr('disabled', false);
            }
        });
    }
}
function call_out_popup(username, ext, phone, lastname, keyword){
    //alert('Test');
    //$('.call_popup').parent().css('display','');
    //$('.call_popup').find('#popup_message').html(message);
    //$('.call_popup').toggleClass("popup_open");
    $("#call_slideout").find('#username').html(username);
    $("#call_slideout").find('#ext').html(ext);
    $("#call_slideout").find('#phone').html(phone);
    $("#call_slideout").find('#lastname').html(lastname);
    $("#call_slideout").find('#txt_keyword').val(keyword);
    $("#call_slideout").show("slow");
    //$('.call_popup').toggleClass("popup_open");
    /*
    var w = window,
        d = document,
        e = d.documentElement,
        g = d.getElementsByTagName('body')[0],
        x = w.innerWidth || e.clientWidth || g.clientWidth,
        y = w.innerHeight|| e.clientHeight|| g.clientHeight;
    alertify.prompt()
        .set({
            'labels':{ok:'OK!', cancel:'Cancel'},
            'message': message ,
            'onok': null,
            'oncancel': null,
            'title': 'Click2Call',
            'resizable':true
        }).resizeTo(200, 200).moveTo(0, 0).show();
    */
}

function closePopupout(){
    $("#call_slideout").hide("slow");
}
function closePopup(tmp){
    //$("#call_slidein").hide("slow");
    var id_top=$('#a_'+tmp).parents().parents().attr('id');
    
    $('#'+id_top).hide();
    $('#'+id_top).html('');
}
function call_in_popup(){
	$("#call_slidein").show("slow");
}
function _defPopup(){
	var maxheight = 75;	//maximum height of the popup
	var incrementHeight = 2; //incremental height of the popup
	var remainOnScreen = 10 * 1000; //the time for which the popup remains on screen
    randomID = Math.floor(Math.random()*10001);

	var popupDiv = document.createElement('div');
	var parentDiv = document.getElementById('call_slide');
	
	parentDiv.appendChild(popupDiv);
	popupDiv.id = randomID;
	popupDiv.className = "lvtCol";
	popupDiv.style.cssFloat = "right"; 
	//popupDiv.style.paddingRight="5px";
	popupDiv.style.overflowY = "auto";
	popupDiv.style.padding = "0 10px 0 10px";
	popupDiv.style.marginLeft = "15px";
	popupDiv.style.backgroundColor = "#fff";
	popupDiv.style.maxHeight = "450px";
	popupDiv.style.width = "320px";
	popupDiv.style.boxShadow = "0 0 8px rgba(0, 0, 0, 0.5)";
	popupDiv.style.border = "1px solid #f6f5fb";
	//popupDiv.style.right="0px";
	//popupDiv.style.bottom="0px";
	//popupDiv.style.borderColor="rgb(141, 141, 141)";
	//popupDiv.style.borderTop="1px black solid";
	//popupDiv.style.borderBottom="0px black solid";
	//popupDiv.style.padding="12px 14px 12px 14px";
	//popupDiv.style.background="#DFF1FF";
	//popupDiv.style.width="100%";
	
	//popupDiv.style.zIndex=10;
	//popupDiv.style.fontWeight="normal";
	popupDiv.align="left";	//the popup to be displayed on screen
	var node;
	
	/**
	 * this function creates a popup div and displays in on the screen
	 * after a timeinterval of time seconds the popup is hidden
	 *
	 * @param node - the node to display
	 * @param height - the maximum height of the popup
	 * @param time - the time for which it is displayed
	 */
	function CreatePopup(node, time){
		parentDiv.style.display = "block";
		if(time != undefined && time != ""){
			remainOnScreen = time * 1000;
		}
		popupDiv.innerHTML = node; 
		popupDiv.style.display = "block";
		popupDiv.style.display = "";
		var dimension = getDimension(popupDiv);
		maxheight = dimension.y;
		
		popupDiv.style.height = "0px";
		ShowPopup(); 
	}
	
	/**
	 * this function is used to display the popup on screen
	 */
	function ShowPopup(){
		var height = popupDiv.style.height.substring(0,popupDiv.style.height.indexOf("px"));
		if (parseInt(height) < maxheight) { 
			height = parseInt(height) + incrementHeight;
			if(height > maxheight){
				height = maxheight;
			}
			popupDiv.style.height = height + "px"; 
			setTimeout(ShowPopup, 1); 
		} else { 
			popupDiv.style.height = maxheight + "px"; 
			setTimeout(HidePopup, remainOnScreen);
		} 
	}
	
	/**
	 * this function is used to hide the popup from screen
	 */
	function HidePopup(){
		var height = popupDiv.style.height.substring(0,popupDiv.style.height.indexOf("px"));
		if (parseInt(height) > 0) { 
			height = parseInt(height) - incrementHeight;
			if(height<0){
				height=0;
			}
			popupDiv.style.height = height+"px";
			setTimeout(HidePopup, 1); 
		} else { 
			ResetPopup();
		} 
	}
	
	/**
	 * this function is used to reset the popup
	 */
	function ResetPopup(){
		popupDiv.innerHTML = "";
		popupDiv.style.height = "0px"; 
		popupDiv.style.display = "none";
		parentDiv.style.display = "none";
	}
	
	return {
		displayPopup: CreatePopup,
		content: node
	};
}
function getDimension(node){
	var ht = node.offsetHeight;
	var wdth = node.offsetWidth;
	var nodeChildren = node.getElementsByTagName("*");
	var noOfChildren = nodeChildren.length;
	for(var index =0;index<noOfChildren;++index){
		ht = Math.max(nodeChildren[index].offsetHeight, ht);
		wdth = Math.max(nodeChildren[index].offsetWidth,wdth);
	}
	return {
		x: wdth,
		y: ht
	};
}
function addPopup(){
//    var html =
//        '<div class="call_popup">' +
//        '<div class="band">Close</div>' +
//            '<div id="popup_message"></div>' +
//        '</div>';
    
    var html = '<div style="display: none;" id="call_slide" class="flat">'+
	'</div>';
    var o = document.createElement('div');
    //o.style.display = "none";
    o.innerHTML = html;
    document.body.appendChild(o);
}

function addPopup2(){
//    var html =
//        '<div style="display: none;" id="call_slideout">' +
//            '<a style="position:absolute;top:14px;right:10px;color:#555;font-size:10px;font-weight:bold;" href="javascript:void(0);" onclick="return closePopup();">(X)</a>' +
//            '<span style="font-family: Tekton Pro; font-size: 20px; margin: 10px 0; text-shadow: 1px 1px 0 #FFFFFF;">Click2Call</span>' +
//            '<br />' +
//            '<div style="float:left; margin:15px;" id="title"></div>' +
//            '<div style="float:left; margin:15px;" id="message"></div>' +
//        '</div>';
	tmp = Math.floor(Math.random()*10001);
    var html = '<div style="display: none;" id="call_slideout" class="flat">'+
    '<form accept-charset="utf-8" method="post" enctype="multipart/form-data" id="calloutpopup" role="form" action="/CallAsteriskSchedules/ajax">'+
	'<a style="position:inherit;float: right;top:14px;right:10px;color:#555;font-size:10px;font-weight:bold;" href="javascript:void(0);" onclick="return closePopupout();"><i class="fa fa-times"></i></a>'+
	'<h4 class="text-red text-bold">Outcoming Call</h4>' +
	'<hr style="margin: 10px 0"/>' +
	'<div class="form-group">'+
		'<fieldset>'+
			'<div class="col-xs-12 form-group no-padding"><p>Caller Information</p></div>'+
			'<div class="col-xs-12 form-group no-padding">'+
				'<div class="col-xs-4 text-right no-padding-left" ><label class="text-light-blue">Number [ext]</label></div>'+
				'<div class="col-xs-8 no-padding-right" id="ext">Số ext</div>'+
			'</div>'+
			'<div class="col-xs-12 form-group no-padding">'+
				'<div class="col-xs-4 text-right no-padding-left" >'+
				'<label class="text-light-blue">Name [user]</label>'+
				'</div>'+
				'<div class="col-xs-8 no-padding-right" id="username">Tên user</div>'+
			'</div>'+
		'</fieldset>'+
	'</div>'+
	'<div class="form-group">'+
		'<fieldset>' +
			'<legend class="bg-green-gradient no-margin" style="font-size: 13px">Information from TTV</legend>'+
			'<div class="col-xs-12 form-group no-padding">'+
				'<div class="col-xs-4 text-right no-padding-left"><label class="text-light-blue">Call to</label></div>'+
				'<div class="col-xs-8 no-padding-right dropdown" id="lastname">Tên contact'+
					'<a class="dropdown-toggle" id="type_of_contact" data-toggle="dropdown" aria-expanded="true" style="float:right">[Contacts]</a>'+
					'<ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="type_of_contact">'+
						'<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Leads</a></li>'+
						'<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Organizations</a></li>'+
						'<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Contacts</a></li>'+
					'</ul>'+
				'</div>'+
			'</div>'+
			'<div class="col-xs-12 form-group no-padding">'+
				'<div class="col-xs-4 text-right no-padding-left"><label class="text-light-blue">Phone</label></div>'+
				'<div class="col-xs-8 no-padding-right" id="phone">số điện thoại</div>'+
			'</div>'+
		'</fieldset>'+
	'</div>'+
	'<div class="form-group">'+
		'<fieldset>'+
			'<legend class="bg-green-gradient no-margin" style="font-size: 13px">Description</legend>'+
			'<div class="col-xs-12 form-group no-padding">'+
				'<textarea rows="4" class="form-group col-xs-12 no-padding" id="comment_'+tmp+'" name="comment" placeholder="Description"></textarea>'+
			'</div>'+
		'</fieldset>'+
	'</div>'+
	'<div class="form-group text-right">'+
	'<form accept-charset="utf-8" method="post" enctype="multipart/form-data" id="calloutpopup" role="form" action="/CallAsteriskSchedules/ajax">'+
    '<button class="btn btn-flat btn-success" type="button" id="" onclick="addComment('+tmp+')"><span class="fa fa-check"></span> Save</button>'+
    '<input id="txt_ajax_action" type="hidden" value="add_comment" name="txt_ajax_action">'+
    '<input id="txt_keyword" type="hidden" value="" name="txt_keyword">'+
    '</div>'
'</div>';
    var o = document.createElement('div');
    o.innerHTML = html;
    document.body.appendChild(o);
}

//loadScript(alertify_script);
//loadCss(alertify_css);
//loadCss(alertify_theme_css);
loadCss(call_popup_css);

alertify.defaults.transition = "slide";
alertify.defaults.theme.ok = "btn btn-primary";
alertify.defaults.theme.cancel = "btn btn-danger";
alertify.defaults.theme.input = "form-control";

//addPopup();


(function(){
    var tId = setInterval(function() {
        if (document.readyState == "complete") onComplete()
    }, 11);

    function onComplete(){
        clearInterval(tId);
        //addPopup2();
        addPopup();
    }
})();