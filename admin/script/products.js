function showExtension(){
	
	if (document.getElementById("action").value=="change_visibility"){
		$(".visibility_extension").css({"display":"block"});
	}
	else{
		
		$(".visibility_extension").css({"display":"none"});
	}
	if (document.getElementById("action").value=="change_status"){
		$(".status_extension").css({"display":"block"});
	}
	else{
		$(".status_extension").css({"display":"none"});
	}
}