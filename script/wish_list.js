function deleteRow(id){
	
	var question = confirm ("Are you sure you want to delete?");
	
	if (question) {
		location.href = "delete.php?id="+id;
	}
	
}