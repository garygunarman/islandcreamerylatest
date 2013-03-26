var email_flag=new Array(),confirm_password;
function checkEmail(email_id) {
var email = document.getElementById(email_id+"_email");
if (email!=null){
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
if (!filter.test(email.value)) {
$("#"+email_id+"_email").css({"background-color":"#ff9f9f"});
email.focus;
email_flag[email_id] = 0;

}
else{
	$("#"+email_id+"_email").css({"background-color":"#ffffff"});
	email_flag[email_id] = 1;
	
}
}
}

function checkInput1(){
	if (document.getElementById("submit_sign_in_button")!=null){
	if (email_flag["sign_in"] ==1 && document.getElementById("sign_in_password").value!=""){
		
		document.getElementById("submit_sign_in_button").disabled = false;
		$("#submit_sign_in_button").animate({"opacity":"1"},100);
	}
	else{
		document.getElementById("submit_sign_in_button").disabled = true;
		$("#submit_sign_in_button").animate({"opacity":"0.4"},100);
	}
	}
}

function checkPasswordConfirm(){
	
	if (document.getElementById("password").value != document.getElementById("confirm_password").value || document.getElementById("password").value == "" ){
		$("#confirm_password").css({"background-color":"#ff9f9f"});
		confirm_password=0;
		
	}
	else{
		$("#confirm_password").css({"background-color":"#ffffff"});
		confirm_password=1;
	}
}

function checkInput2(){
	checkEmail("order_billing");
	if (email_flag["order_billing"] ==1 && document.getElementById("order_billing_first_name").value!="" && document.getElementById("order_billing_last_name").value!="" &&  confirm_password==1){ 
		document.getElementById("checkout_button").disabled = false;
		$("#checkout_button").animate({"opacity":"1"},100);
	}
	else{
		document.getElementById("checkout_button").disabled = true;
		$("#checkout_button").animate({"opacity":"0.4"},100);
	}
	
}