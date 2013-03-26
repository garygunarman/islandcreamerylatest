var province,email_flag = new Array(),confirm_password,lastFirstNameValue,lastLastNameValue,lastPhoneValue;
function changeCountry(){
	var country=document.getElementById("order_shipping_country").value;
	province=document.getElementById("order_shipping_province").value;
	var prefix=document.getElementById("prefix").innerHTML;
	
	if (document.getElementById("order_shipping_province").value==""){
		//province = "DKI JAKARTA";
	}
	//alert(province);
	
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
			document.getElementById("province_row").innerHTML = xmlhttp.responseText;
			checkInput2();
			changeProvince();
			
		}
	}
	xmlhttp.open("GET",prefix+"static/modify_province.php?country="+country+"&province="+province,true);
	xmlhttp.send();
	
	
}

function changeProvince(){
	if (document.getElementById("order_shipping_province").value!=""){
	province=document.getElementById("order_shipping_province").value;}
	var city=document.getElementById("order_shipping_city").value;
	var prefix=document.getElementById("prefix").innerHTML;
	//var error=document.getElementById("error").value;
	
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
			document.getElementById("city_row").innerHTML = xmlhttp.responseText;
			checkInput2();

		}
	}
	xmlhttp.open("GET",prefix+"static/modify_city.php?province="+province+"&city="+city,true);
	xmlhttp.send();
}

function changeFirstName(){
	if (document.getElementById("order_shipping_first_name").value == ""||document.getElementById("order_shipping_first_name").value == lastFirstNameValue){
		document.getElementById("order_shipping_first_name").value = document.getElementById("order_billing_first_name").value;
		lastFirstNameValue = document.getElementById("order_billing_first_name").value;
	}
	
}

function changeLastName(){
	if (document.getElementById("order_shipping_last_name").value == ""||document.getElementById("order_shipping_last_name").value == lastLastNameValue){
		document.getElementById("order_shipping_last_name").value = document.getElementById("order_billing_last_name").value;
		lastLastNameValue = document.getElementById("order_billing_last_name").value;
	}
}



function checkEmail(email_id) {
var email = document.getElementById(email_id+"_email").value;

if (email!=""){
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
if (!filter.test(email)) {
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
	if (document.getElementById("password")==null){
		confirm_password=1;
	}
	checkEmail("order_billing");
	if (email_flag["order_billing"] ==1 && document.getElementById("order_billing_first_name").value!="" && document.getElementById("order_billing_last_name").value!="" &&  confirm_password==1 && document.getElementById("order_shipping_first_name").value!="" && document.getElementById("order_shipping_last_name").value!="" && document.getElementById("order_shipping_phone").value!="" && document.getElementById("order_shipping_address").value!=""&& document.getElementById("order_shipping_phone").value!=""&& document.getElementById("order_shipping_country").value!=""&& document.getElementById("order_shipping_province").value!=""&& document.getElementById("order_shipping_city").value!=""&& document.getElementById("order_shipping_postal_code").value!=""){
		document.getElementById("checkout_button").disabled = false;
		$("#checkout_button").animate({"opacity":"1"},100);
	}
	else{
		document.getElementById("checkout_button").disabled = true;
		$("#checkout_button").animate({"opacity":"0.4"},100);
	}
	
}

