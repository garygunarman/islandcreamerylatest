function changeColor(counter){
	var color_id = document.getElementById("color_id_"+counter).value;
	
	var color_name = document.getElementById("color_name_"+color_id).innerHTML;
	var color_image = document.getElementById("color_image_"+color_id).innerHTML;
	document.getElementById("image_filename_type_image_"+counter).value = color_image;
	document.getElementById("type_name_"+counter).value = color_name;
	
}

function changeSize(){
	
	
	var total_field = document.getElementById("total_field").value;
	changeSize2(1,total_field);
	
	
}

function changeSize2(counter,total_field){
	var xmlhttp;
	var size_type_id = document.getElementById("size_type_id").value;
	
	//var color_name = document.getElementById("color_name_"+color_id).innerHTML;
	
	
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
			
			document.getElementById("stock_"+counter).innerHTML = xmlhttp.responseText;
			
			if (counter<total_field){
				counter++;
				changeSize2(counter,total_field);
			}
			

		}
	}


	var parameters="counter="+counter+"&size_type_id="+size_type_id;
	xmlhttp.open("POST", "../change_size_type.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send(parameters);
}

function addField(counter){
	//var price = document.getElementById("type_price_1").value;
	var description = document.getElementById("type_description_1").value;
	var specification = document.getElementById("type_specification_1").value;
	//var size_type_id = document.getElementById("size_type_id").value;
	//var weight = document.getElementById("type_weight_1").value;
	
	
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
			
			document.getElementById("extended_"+counter).innerHTML = xmlhttp.responseText;
			
			var total_field = document.getElementById("total_field").value;
			document.getElementById("total_field").value = total_field*1+1;
			
			
		
		}
	}
	
	
	var parameters="description="+description+"&specification="+specification+"&counter="+counter;
	xmlhttp.open("POST", "../product_form.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send(parameters);
}

function submitForm() {
	//if (document.getElementById("action").value=="save_order"){
	var total_field = document.getElementById("total_field").value;
	
	for (counter=1;counter<=total_field;counter++){
    var list = document.getElementById("sortable_"+counter);
	var items = list.getElementsByTagName("li");
	var itemIDs = "";
	    for (var i = 0; i < items.length; i++) {
			var j = i*1+1;
	        document.getElementById("order_"+counter+"_"+j).value = items[i].getAttribute("list_id");
			
	    }
    }

//}

document.getElementById("product_form").submit();
}

function selectRowImage(type,row){
	
	if (select_flag==1){
	var checkbox_status = document.getElementById("check_"+type+"_"+row).checked;
	if (checkbox_status==true){
		select_counter=select_counter-1;
		document.getElementById("check_"+type+"_"+row).checked=false;
		
			$("#row_"+type+"_"+row).css({"opacity":"1"});
			
		
		//changeCounter();
	}
	else{
		select_counter=select_counter*1+1;
		document.getElementById("check_"+type+"_"+row).checked=true;
		$("#row_"+type+"_"+row).css({"opacity":"0.6"});
		//changeCounter();
	}
	}
}

function clickUploadMultiple(){
	document.getElementById("multi_files").click();
}

function uploadMultiple(){
	document.getElementById("product_form").action = "update_multiple.php";
	document.getElementById("product_form").submit();
}

function relatedProductsTab(){
	$("#related_products_group").css({"display":"block"});
	$("#product_details_group").animate({"opacity":"0"},200,function(){
		$("#product_details_group").css({"display":"none"});
		$("#related_products_tab").css({"background-color":"#fafafa","border-bottom":"1px solid #fafafa"});
		$("#product_details_tab").css({"background-color":"#ffffff","border-bottom":"1px solid #dddddd"});
		
	});
	$("#related_products_group").animate({"opacity":"1"},200);
}

function productDetailsTab(){
	$("#product_details_group").css({"display":"block"});
	$("#related_products_group").animate({"opacity":"0"},200,function(){
		$("#related_products_group").css({"display":"none"});
		$("#product_details_tab").css({"background-color":"#fafafa","border-bottom":"1px solid #fafafa"});
		$("#related_products_tab").css({"background-color":"#ffffff","border-bottom":"1px solid #dddddd"});
	});
	$("#product_details_group").animate({"opacity":"1"},200);
}