var t,i,j,total_image,transition_flag=1;

function init(){
	j=1;
	i=2;
	
	total_image =  document.getElementById("total_image").innerHTML;
	$("#dot_1").css({"background":"url(../img/selector-red.png) no-repeat center"});
	t= setTimeout("fading()",3000);
	
}

function fading(){	
	transition_flag=0;
	document.getElementById("image_back").src = document.getElementById("filename_"+i).innerHTML;	
	$("#image_back").animate({"opacity":"1"},2000);
	$("#image_front").animate({"opacity":"0"},2000,function(){
		transition_flag=1;
		document.getElementById("image_front").src = document.getElementById("image_back").src;
		$("#image_front").css({"opacity":"1"});
		$("#image_back").css({"opacity":"0"});
		
		if(i==1){
			j=total_image;
		}
		else{
			j=i-1;
		}
		
		

		changeDot();
		document.getElementById("image_back").src = document.getElementById("filename_"+i).innerHTML;
		t= setTimeout("fading()",3000);

		if (i<total_image){
			i++;
		}
		else{
			i=1;
		}		
	});
}

function changeDot(){
	$(".dot").css({"background":"url(../img/selector-grey.png) no-repeat center"});
	$("#dot_"+i).css({"background":"url(../img/selector-red.png) no-repeat center"});

	document.getElementById("text-title").innerHTML=document.getElementById("title_"+i).innerHTML;
	document.getElementById("text-content").innerHTML=document.getElementById("description_"+i).innerHTML;
}

function changeImage(dot){
	if (transition_flag==1){
		transition_flag=0;
	clearTimeout(t);
	i=dot;
	
	document.getElementById("image_back").src = document.getElementById("filename_"+i).innerHTML;	
	$("#image_back").animate({"opacity":"1"},2000);
	$("#image_front").animate({"opacity":"0"},2000,function(){
		transition_flag=1;
		document.getElementById("image_front").src = document.getElementById("filename_"+i).innerHTML;
	
		$("#image_front").css({"opacity":"1"});
		$("#image_back").css({"opacity":"0"});
	
		if(i==1){
			j=total_image;
		}
		else{
			j=i-1;
		}
	
	

		changeDot();
		document.getElementById("image_back").src = document.getElementById("filename_"+i).innerHTML;
		t= setTimeout("fading()",3000);

		if (i<total_image){
			i++;
		}	
		else{
			i=1;
		}
	});
	}
}