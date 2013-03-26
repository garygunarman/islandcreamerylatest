function deleteSize(){
	var question = confirm ("Are you sure you want to delete?");
	
	if (question) {
		document.getElementById("action").value="delete";
		document.getElementById("size_form").submit();
	}
}

function uploadSubmit(){
	document.getElementById("submit_button").value="Uploading...";
	document.getElementById("size_form").submit();
}