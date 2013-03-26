function deleteCategory(){
	var question = confirm ("Are you sure you want to delete?");
	var prefix=document.getElementById("prefix").innerHTML;
	var category_id = document.getElementById("category_id").value;
	if (question) {
		location.href = prefix+"category/delete.php?category_id="+category_id;
	}
}