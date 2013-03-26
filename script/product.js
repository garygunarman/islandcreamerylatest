var page=1;

function initialization(){
	
	$(window).scroll(function() {
	   if($(window).scrollTop() + $(window).height() == $(document).height()) {
	       nextPage();
	   }
	});
	
	nextPage();
}

function nextPage(){
	var parameters="filter=true";
	if (document.getElementById("category_id").innerHTML!=""){
		parameters+="&category_id="+document.getElementById("category_id").innerHTML;
	}
	if (document.getElementById("color_id").innerHTML!=""){
		parameters+="&color_id="+document.getElementById("color_id").innerHTML;
	}
	if (document.getElementById("designer_id").innerHTML!=""){
		parameters+="&designer_id="+document.getElementById("designer_id").innerHTML;
	}
	if (document.getElementById("page").innerHTML!=""){
		parameters+="&page="+document.getElementById("page").innerHTML;
		page = document.getElementById("page").innerHTML;
	}
	else{
		parameters+="&page=1";
		page=1;
	}
	if (document.getElementById("new_arrival").innerHTML!=""){
		parameters+="&new_arrival="+document.getElementById("new_arrival").innerHTML;
	}
	if (document.getElementById("sale").innerHTML!=""){
		parameters+="&sale="+document.getElementById("sale").innerHTML;
	}
	
	var total_page = document.getElementById("total_page").innerHTML;
	
	
	
	if(page<=total_page){
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }

	xmlhttp.onreadystatechange = function (){

		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			
			document.getElementById("extended_"+page).innerHTML = xmlhttp.responseText;
			
			
			document.getElementById("page").innerHTML = page*1+1;
			
			
		
		}
	}
	
	
	
	xmlhttp.open("GET", "display_products.php?"+parameters, true);
	
	xmlhttp.send();
	}
}

function showImageArrow(counter){
	$("#product_left_"+counter).css({"opacity":"1"});
	$("#product_right_"+counter).css({"opacity":"1"});
}

function hideImageArrow(counter){
	$("#product_left_"+counter).css({"opacity":"0"});
	$("#product_right_"+counter).css({"opacity":"0"});
}

function slideRight(product_id){
	var total_type = document.getElementById("total_type_"+product_id).value;
	var current_type = document.getElementById("current_type_"+product_id).value;
	var additional_parameters = document.getElementById("additional_parameters").value;
	
	var next_type = current_type*1+1;
	
	if (next_type<total_type){
		var next_type_id = document.getElementById("type_id_"+product_id+"_"+next_type).value;
		var next_img_src = document.getElementById("img_src_"+product_id+"_"+next_type).src;
		
		//alert (next_img_src);
		document.getElementById("the_item_image_right_"+product_id).src = next_img_src;
		
		$("#item_image_inner_frame_"+product_id).animate({"left":"-520px"},400,function(){
			document.getElementById("the_item_image_"+product_id).src = next_img_src;
			$("#item_image_inner_frame_"+product_id).css({"left":"-260px"});
			document.getElementById("current_type_"+product_id).value = next_type;
			document.getElementById("detail_link_"+product_id).href = "details?type_id="+next_type_id+additional_parameters;
			document.getElementById("detail_link_2_"+product_id).href = "details?type_id="+next_type_id+additional_parameters;
		});
	}
}

function slideLeft(product_id){
	var total_type = document.getElementById("total_type_"+product_id).value;
	var current_type = document.getElementById("current_type_"+product_id).value;
	var additional_parameters = document.getElementById("additional_parameters").value;
	var next_type = current_type-1;
	
	if (next_type>=0){
		var next_type_id = document.getElementById("type_id_"+product_id+"_"+next_type).value;
		var next_img_src = document.getElementById("img_src_"+product_id+"_"+next_type).src;
		document.getElementById("the_item_image_left_"+product_id).src = next_img_src;
		
		$("#item_image_inner_frame_"+product_id).animate({"left":"0px"},400,function(){
			document.getElementById("the_item_image_"+product_id).src = next_img_src;
			$("#item_image_inner_frame_"+product_id).css({"left":"-260px"});
			document.getElementById("current_type_"+product_id).value = next_type;
			document.getElementById("detail_link_"+product_id).href = "details?type_id="+next_type_id+additional_parameters;
			document.getElementById("detail_link_2_"+product_id).href = "details?type_id="+next_type_id+additional_parameters;
		});
	}
}