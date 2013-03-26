/* on javascript initialization put this code
slideshow_counter=1;
total_slideshow = document.getElementById("slideshow_total").innerHTML;
var slideshow_timer = setTimeout("slideshowAnimation()",3000);
*/
var slideshow_counter, total_slideshow,slideshow_timer;

function initialization(){
	slideshow_counter=1;
	total_slideshow = document.getElementById("total_image").innerHTML;
	
	//var dot_width = Math.floor((1020 - ((total_slideshow-1)*3))/total_slideshow);
	
	
	
	//$(".dot").width(dot_width);
	changeDot(0);
	
	var slideshow_timer = setTimeout("slideshowAnimation()",3000);
}

function slideshowAnimation(){
			
			
			$("#home-banner-frame").animate({"left":"-2040px"},700,function(){
				
				changeSlideshowCenter();
				
				changeDot(slideshow_counter);

				//change slideshow counter
				if (slideshow_counter+1 < total_slideshow){
					slideshow_counter++;
				}
				else {
					slideshow_counter=0;
				}

				$("#home-banner-frame").css({"left":"-1020px"});
				//checkArrow();
				changeSlideshowRight();
			});
			
			if (slideshow_timer!=null){
				clearTimeout(slideshow_timer);
			}
			
			slideshow_timer = setTimeout("slideshowAnimation()",3000);
}

function changeSlideshowCenter(){
	//document.getElementById("index_slideshow_left_link").href = document.getElementById("slideshow_link_"+slideshow_counter).innerHTML;
	document.getElementById("index_slideshow_center_image").src = document.getElementById("slideshow_image_"+slideshow_counter).src;
	
	
}

function changeSlideshowRight(){
	//document.getElementById("index_slideshow_right_link").href = document.getElementById("slideshow_link_"+slideshow_counter).innerHTML;
	document.getElementById("index_slideshow_right_image").src = document.getElementById("slideshow_image_"+slideshow_counter).src;
}

function changeMainImage(counter){
	//alert(counter);
	clearTimeout(slideshow_timer);
	$("#home-banner-frame").css({"left":"-1020px"});
	document.getElementById("index_slideshow_center_image").src = document.getElementById("slideshow_image_"+counter).src;
	if (counter*1+1 < total_slideshow){
		slideshow_counter=counter*1+1;
	}
	else {
		slideshow_counter=0;
	}
	
	document.getElementById("index_slideshow_right_image").src = document.getElementById("slideshow_image_"+slideshow_counter).src;
	

	changeDot(counter);
	slideshow_timer = setTimeout("slideshowAnimation()",3000);
	
	
}

function left(){
	clearTimeout(slideshow_timer);
	
	if (slideshow_counter > 1){
		slideshow_counter=slideshow_counter-2;
	}
	else if (slideshow_counter==0){
		slideshow_counter=total_slideshow-2;
	}
	else if (slideshow_counter==1){
		slideshow_counter=total_slideshow-1;
	}
	$("#home-banner-frame").css({"left":"-1020px"});
	document.getElementById("index_slideshow_left_image").src = document.getElementById("slideshow_image_"+slideshow_counter).src;
	
	$("#home-banner-frame").animate({"left":"0"},700,function(){
		document.getElementById("index_slideshow_center_image").src = document.getElementById("slideshow_image_"+slideshow_counter).src;
		if (slideshow_counter*1+1 < total_slideshow){
			slideshow_counter=slideshow_counter*1+1;
		}
		else {
			slideshow_counter=0;
		}
		$("#home-banner-frame").css({"left":"-1020px"});
		//checkArrow();
		changeSlideshowRight();
		
		
	});
	
	if (slideshow_timer!=null){
		clearTimeout(slideshow_timer);
	}
	slideshow_timer = setTimeout("slideshowAnimation()",3000);
	
}

function right(){
	clearTimeout(slideshow_timer);
	
	
	
	document.getElementById("index_slideshow_right_image").src = document.getElementById("slideshow_image_"+slideshow_counter).src;
	
	$("#home-banner-frame").animate({"left":"-2040px"},700,function(){
		document.getElementById("index_slideshow_center_image").src = document.getElementById("slideshow_image_"+slideshow_counter).src;
		if (slideshow_counter*1+1 < total_slideshow){
			slideshow_counter=slideshow_counter*1+1;
		}
		else {
			slideshow_counter=0;
		}
		$("#home-banner-frame").css({"left":"-1020px"});
		//checkArrow();
		changeSlideshowRight();
		
		
	});
	
	if (slideshow_timer!=null){
		clearTimeout(slideshow_timer);
	}
	slideshow_timer = setTimeout("slideshowAnimation()",3000);
	
}

function changeDot(image_counter){	
	$(".dot").css({"opacity":"1"});
	$("#dot_"+image_counter).css({"opacity":"0.7"});
}

function checkArrow(){
	if (slideshow_counter<=0){
		$(".previous").animate({"opacity":"0"},200);
	}
	else{
		$(".previous").animate({"opacity":"1"},200);
	}
	
	if (slideshow_counter>=total_slideshow-1){
		$(".next").animate({"opacity":"0"},200);
	}
	else{
		$(".next").animate({"opacity":"1"},200);
	}
}

