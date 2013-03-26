function changeQueryPerPageStock(stock_counter){
	var page = document.getElementById("page").value;
	var sort_by = document.getElementById("sort_by").value;
	var query_per_page = document.getElementById("query_per_page_input_"+stock_counter).value;
	var search = document.getElementById("search").value;
	location.href = url+"?page=1&query_per_page="+query_per_page+"&sort_by="+sort_by+"&search="+search+"#table_"+stock_counter;
	
}