function clickPayment(){
	
	document.getElementById("payment_submit").disabled=false;
	$("#payment_submit").animate({"opacity":"1"},100);
}

function checkRadio(){
	if (document.getElementById("payment_method_").innerHTML!=null){
		document.getElementById("payment_submit").disabled=false;
		$("#payment_submit").animate({"opacity":"1"},100);
	}
}