var current_page,total_page,total_image,image_counter,slideshow_timer;

function galleryInitialization(){
	current_page=1;
	total_page = document.getElementById("total_page").innerHTML;
	total_image = document.getElementById("total_image").innerHTML;
	
	checkArrow();
	image_counter=2;
	//slideshowAnimation();
	slideshow_timer = setTimeout("slideshowAnimation()",3000);
	
	
	 $('.gallery-thumb').find('img').each(function(){
	  var imgClass = (this.height/this.width < 0.75) ? 'wide' : 'tall';
	  $(this).addClass(imgClass);
	 });
	
}

function slideshowAnimation(){
	
			
			
			if (image_counter<total_image){
				image_counter++;
			}
			else{
				image_counter=1;
			}
			
			changeImage(image_counter);
			
			
				
			
			
			
}

function prevPage(){
	if (current_page>1){
		current_page = current_page-1;
		slideThumb();
	}
}

function nextPage(){
	if (current_page<total_page){
		current_page = current_page*1+1;
		slideThumb();
	}
}

function slideThumb(){
	var left = -(current_page-1)*810;
	$("#gallery-thumb-container").animate({"left":left},200,checkArrow());
}

function checkArrow(){
	if (current_page==1){
		$(".previous").animate({"opacity":"0"},200);
	}
	else{
		$(".previous").animate({"opacity":"1"},200);
	}
	
	if (current_page==total_page){
		$(".next").animate({"opacity":"0"},200);
	}
	else{
		$(".next").animate({"opacity":"1"},200);
	}
}

function changeImage(i){
	clearTimeout(slideshow_timer);
	document.getElementById("the_image_2").src = document.getElementById("file_"+i).innerHTML;
	
	$("#the_image").animate({"opacity":"0"},500);
	$("#the_image_2").animate({"opacity":"1"},500,function(){
		document.getElementById("the_image").src = document.getElementById("the_image_2").src;
		
		$("#the_image_2").css({"opacity":"0"});
		$("#the_image").css({"opacity":"1"});
		
		image_counter=i;
		slideshow_timer = setTimeout("slideshowAnimation()",3000);
	});
}