function changeQuantity(counter){
	var price = document.getElementById("item_price_"+counter).value;
	var quantity = document.getElementById("item_quantity_"+counter).value;
	var subtotal_price = price*quantity;
	
	document.getElementById("subtotal_field_"+counter).innerHTML = formatNumber(subtotal_price,0,".","","","","","");
	
	
	recalculateTotal();
}

function recalculateTotal(){
	var total_price=0;
	for (counter=0;document.getElementById("item_price_"+counter)!=null;counter++){
		temporary_price=document.getElementById("item_price_"+counter).value;
		temporary_quantity=document.getElementById("item_quantity_"+counter).value;
		
		total_price = total_price*1+ temporary_price*temporary_quantity;
	}
	
	if (total_price==0){
		document.getElementById("shopping_bag_content").innerHTML = '<div class="empty_row">You currently don\'t have any item in the shopping bag.</div>';
		document.getElementById("submit_button").disabled = true;
		$("#submit_button").animate({"opacity":"0.4"},100);
	}
	else{
		document.getElementById("submit_button").disabled = false;
		$("#submit_button").animate({"opacity":"1"},100);
	}
	
	document.getElementById("purchase_amount").value = total_price;
	document.getElementById("order_footer_price").innerHTML = formatNumber(total_price,0,".","","","","","");
}

function deleteRow(counter){
	
	$("#table_row_"+counter).animate({"height":0},300,function(){
		$("#table_row_"+counter).css({"display":"none"});
		
		var select = document.getElementById("item_quantity_"+counter);
		select.options[select.options.length] = new Option('0', '0');


		document.getElementById("item_quantity_"+counter).value=0;

		recalculateTotal();
	});
	
	
}

function formatNumber(num,dec,thou,pnt,curr1,curr2,n1,n2) {var x = Math.round(num * Math.pow(10,dec));if (x >= 0) n1=n2='';var y = (''+Math.abs(x)).split('');var z = y.length - dec; if (z<0) z--; for(var i = z; i < 0; i++) y.unshift('0'); if (z<0) z = 1; y.splice(z, 0, pnt); if(y[0] == pnt) y.unshift('0'); while (z > 3) {z-=3; y.splice(z,0,thou);}var r = curr1+n1+y.join('')+n2+curr2;return r;}