function getStatus(){
	var order_number=document.getElementById("order_number").value;
	
	var prefix=document.getElementById("prefix").innerHTML;
	
	
	
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
			document.getElementById("right_column").innerHTML = xmlhttp.responseText;
			
			$("#right_column").animate({"opacity":"1"},400);
			
		}
	}
	xmlhttp.open("GET",prefix+"track/check.php?order_number="+order_number,true);
	xmlhttp.send();
}