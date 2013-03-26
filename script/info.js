function infoInit(){
	var default_frame = document.getElementById("default_frame").innerHTML;
	document.getElementById("returning_frame").innerHTML = document.getElementById(default_frame+"_frame").innerHTML;
	//$("#main_frame").animate({"top":"0"},400);
}
function hideDetail(){
	$("#main_frame_slide").animate({"left":"0"},400);
}

function showDetail(type){
	$("#detail_info_frame").animate({"opacity":0},200,function(){
		document.getElementById("detail_info_frame").innerHTML = document.getElementById(type+"_help_frame").innerHTML;
		$("#detail_info_frame").animate({"opacity":1},200);
		$("#main_frame_slide").animate({"left":"-540"},400);
		$(".help_title").css({"opacity":"1"});
		$("#help_"+type).css({"opacity":"0.7"});
	})
	
	
}

function changeInfo(type){
	$("#main_frame_slide").animate({"left":"540"},400,function(){
		document.getElementById("returning_frame").innerHTML = document.getElementById(type+"_frame").innerHTML;
		
		$("#main_frame_slide").animate({"left":"0"},400);
	})
}