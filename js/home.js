var total_image;
var i;
var t;
var image,transition_flag=1;

function initialization() {
	i=1;	
	total_image =  document.getElementById("total_image").innerHTML;
	t= setTimeout("fading()",3000);
	image = 'url("'+document.getElementById("filename_1").innerHTML+'")';
}

function fading() {
	clearTimeout(t);
	transition_flag=0;
	$("#background-back").animate({"opacity":"1"},3000);
	$("#background-front").animate({"opacity":"0"},3000,function() {
		transition_flag=1;
		//alert(image);
		$("#background-front").css({"background-image":image});
		//document.getElementById("background-link").src = document.getElementById("link_"+i).innerHTML;
		$("#background-front").css({"opacity":"1"});
		$("#background-back").css({"opacity":"0"});
		
		
		if (i<(total_image-1)) {
			i++; 
		}
		else {
			i=0; 
		}
		image = 'url("'+document.getElementById("filename_"+i).innerHTML+'")';
		$("#background-back").css({"background-image":image});
		
		
		t= setTimeout("fading()",3000);
	}); 
}

function next(){
	if(transition_flag==1){
		transition_flag=0;
	clearTimeout(t);
	
		if (i<(total_image-1)) {
			i++; 
		}
		else {
			i=0; 
		}
		image = 'url("'+document.getElementById("filename_"+i).innerHTML+'")';
		$("#background-back").css({"background-image":image});
		$("#background-back").animate({"opacity":"1"},3000);
		$("#background-front").animate({"opacity":"0"},3000,function() {
			transition_flag=1;
			$("#background-front").css({"background-image":image});
			//document.getElementById("background-link").src = document.getElementById("link_"+i).innerHTML;
			$("#background-front").css({"opacity":"1"});
			$("#background-back").css({"opacity":"0"});
		
			if (i<(total_image-1)) {
				i++; 
			}
			else {
				i=0; 
			}
		
			image = 'url("'+document.getElementById("filename_"+i).innerHTML+'")';
			
			$("#background-back").css({"background-image":image});
		
			t= setTimeout("fading()",3000);
		});
	}
}

function prev(){
	if(transition_flag==1){
		transition_flag=0;
	clearTimeout(t);
		
		if (i>1) {
			i=i-2; 
		}
		else if (i==1){
			i=total_image-1;
		}
		else {
			i=total_image-2; 
		}
		image = 'url("'+document.getElementById("filename_"+i).innerHTML+'")';
		$("#background-back").css({"background-image":image});
		$("#background-back").animate({"opacity":"1"},3000);
		$("#background-front").animate({"opacity":"0"},3000,function() {
			transition_flag=1;
			$("#background-front").css({"background-image":image});
			//document.getElementById("background-link").src = document.getElementById("link_"+i).innerHTML;
			$("#background-front").css({"opacity":"1"});
			$("#background-back").css({"opacity":"0"});
		
			if (i<(total_image-1)) {
				i++; 
			}
			else {
				i=0; 
			}
		
			image = 'url("'+document.getElementById("filename_"+i).innerHTML+'")';
			$("#background-back").css({"background-image":image});
		
			t= setTimeout("fading()",3000);
		});
	}
}