function initialization(){
	changeSize();
}

function changeSize(){
	var stock_name = document.getElementById("stock_name").value;
	var max = document.getElementById("max_"+stock_name).innerHTML;
	var select = document.getElementById("quantity");
	select.options.length=0;
	for (counter=1;counter<=max;counter++){
		select.options[select.options.length] = new Option(counter, counter);
	}
	
	
}

function changeColor_(){
	var type_id = document.getElementById("type_id_select").value;
	//alert(type_id);
	document.getElementById("color_link").href="../details?type_id="+type_id;
	//alert(document.getElementById("color_link").href);
	$("#color_link").click();
	location.href = "../details?type_id="+type_id;
	
}

function changeImage(i){
	
	document.getElementById("product_image_2").src = document.getElementById("product_thumbnail_"+i).src;
	
	$("#product_image").animate({"opacity":"0"},500);
	$("#product_image_2").animate({"opacity":"1"},500,function(){
		document.getElementById("product_image").src = document.getElementById("product_image_2").src;
		
		$("#product_image_2").css({"opacity":"0"});
		$("#product_image").css({"opacity":"1"});
		
		$(".product-thumb").css({"opacity":"0.5","border-left":"0px"});
		$("#product-thumb-"+i).css({"opacity":"1","border-left":"1px solid #072d5d"});
		
		
		
		
	});
}

function addWish(){
	document.getElementById("bag_type").value="wish";
	document.getElementById("product_form").submit();
}