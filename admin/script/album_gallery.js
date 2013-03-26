var select_flag,select_counter;
select_flag=1;

function saveAll() {
	var select = document.getElementById("action");
	select.options[select.options.length] = new Option('', 'save_all');
	document.getElementById("action").value="save_all";
    
	document.getElementById("image_form").submit();
}

function addPhotos(){
	document.getElementById("new_images").click();
}
function uploadImages() {
	var select = document.getElementById("action");
	select.options[select.options.length] = new Option('', 'upload_images');
	document.getElementById("action").value="upload_images";
    document.getElementById("add_images_button").value="Uploading...";
	document.getElementById("image_form").submit();
}

function deleteAlbum(album_id){
	
	
	var question = confirm ("Are you sure you want to delete?");
	
	if (question) {
		location.href="delete_album.php?album_id="+album_id;
}
}

function submitForm(listID) {
	if (document.getElementById("action").value=="save_order"){
    var list = document.getElementById(listID);
	var items = list.getElementsByTagName("li");
	var itemIDs = "";
	    for (var i = 0; i < items.length; i++) {
			var j = i*1+1;
	        document.getElementById("order_"+j).value = items[i].getAttribute("list_id");
			
	    }
    

}

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

