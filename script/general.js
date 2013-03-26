function loadingOff(){
	$("#loading").animate({"height":"0"},400,function(){
		$("#loading").css({"display":"none"});
		$("#container").css({"display":"block"});
		$("#container").animate({"opacity":"1"},300);
	});
}

function clearBox(id){
	document.getElementById(id).value="";
}

function confirmLogout(){
	var question = confirm ("Are you sure you want to log out?");
	var prefix=document.getElementById("prefix").innerHTML;
	if (question) {
		location.href = prefix+"account/logout";
	}
	
}

function openInfo(type){
	var prefix=document.getElementById("prefix").innerHTML;
	document.getElementById("info_link").href=prefix+"info?default="+type;
	
	var browserName = ""; 

	var ua = navigator.userAgent.toLowerCase(); 
	if ( ua.indexOf( "opera" ) != -1 ) { 
	browserName = "opera"; 
	} else if ( ua.indexOf( "msie" ) != -1 ) { 
	browserName = "msie"; 
	} else if ( ua.indexOf( "safari" ) != -1 ) { 
		if (ua.indexOf("chrome")>-1){
			browserName = "chrome";
		}
		else{
			browserName = "safari"; 
		}
	
	} else if ( ua.indexOf( "mozilla" ) != -1 ) { 
	if ( ua.indexOf( "firefox" ) != -1 ) { 
	browserName = "firefox"; 
	} else { 
	browserName = "mozilla"; 
	} 
	}
	//alert(browserName);
	if (browserName=="safari"){
		
		location.href = prefix+"info?default="+type;
	}
	else{
		document.getElementById("info_link").click();
	}
	
	
}

function checkText(id_check){
	field = document.getElementById(id_check).value;
	field=field.replace(/[^A-z ]/g,"");
	field=field.replace(/[\\\[\]]/g,"");
	document.getElementById(id_check).value = field;
}

function checkNumber(id_check){
	field = document.getElementById(id_check).value;
	field=field.replace(/[^0-9+() ]/g,"");
	field=field.replace(/[\\\[\]]/g,"");
	document.getElementById(id_check).value = field;
}

function showSubmenu(submenu){
	$("#"+submenu).css({"display":"block"});
}
function hideSubmenu(submenu){
	$("#"+submenu).css({"display":"none"});
}