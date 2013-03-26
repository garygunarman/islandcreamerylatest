function confirmPayment(){
	var order_number=document.getElementById("order_number").value;
	var bank=document.getElementById("bank").value;
	var account_name=document.getElementById("account_name").value;
	var amount=document.getElementById("amount").value;
	
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
	var parameters="order_number="+order_number+"&bank="+bank+"&account_name="+account_name+"&amount="+amount;
	xmlhttp.open("POST", prefix+"confirm/update.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send(parameters);
}