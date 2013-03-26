var select_flag,select_counter;
select_flag=1;

function saveAll() {
	document.getElementById("action").value="save_all";
    document.getElementById("submit_button").value="Uploading...";
	submitForm('sortable');
}

function saveOrder(){
	document.getElementById("action").value="save_order";
	submitForm('sortable');
}

function deleteSlideshow(){
	document.getElementById("action").value="delete";
	submitForm('sortable');
}

function submitForm(listID) {
	//if (document.getElementById("action").value=="save_order"){
    var list = document.getElementById(listID);
	var items = list.getElementsByTagName("li");
	var itemIDs = "";
	    for (var i = 0; i < items.length; i++) {
			var j = i*1+1;
	        document.getElementById("order_"+j).value = items[i].getAttribute("list_id");
			
	    }
    

//}

document.getElementById("image_form").submit();
}

function selectRowImage(row){
	
	if (select_flag==1){
	var checkbox_status = document.getElementById("check_"+row).checked;
	if (checkbox_status==true){
		select_counter=select_counter-1;
		document.getElementById("check_"+row).checked=false;
		
			$("#row_"+row).css({"opacity":"1"});
			
		
		//changeCounter();
	}
	else{
		select_counter=select_counter*1+1;
		document.getElementById("check_"+row).checked=true;
		$("#row_"+row).css({"opacity":"0.6"});
		//changeCounter();
	}
	}
}

