<?php
$input = array();
$category_id = $_GET["category_id"];
$input["category_id"]=$_GET["category_id"];


if ($category_id==""){
	$category_id = "top";
	$input["category_id"]="top";
}





$categories = array();
if ($category_id!=0){
$get_condition = mysql_query("
	SELECT * from tbl_category AS cat INNER JOIN tbl_category_relation AS cat_rel
	ON cat.category_id = cat_rel.category_parent
	WHERE cat_rel.category_child = '$category_id'
	ORDER BY category_level
",$con);
array_push($categories,$category_id);
if (mysql_num_rows($get_condition)!=null && mysql_num_rows($get_condition)!=0){
	for ($counter=1;$counter<=mysql_num_rows($get_condition);$counter++){
		$get_condition_array = mysql_fetch_array($get_condition);
		array_push($categories,$get_condition_array["category_id"]);
	}
}


}
else{
	array_push($categories,'top');
}

if ($_GET["color_id"]!=null){
	$input["color_id"]=$_GET["color_id"];
	
}
if ($_GET["designer_id"]!=null){
	$input["designer_id"]=$_GET["designer_id"];
	
}
if ($_GET["page"]!=null){
	$input["page"]=$_GET["page"];
	
}

if ($_GET["queries_per_page"]!=null){
	$input["queries_per_page"]=$_GET["queries_per_page"];
	
}

if ($_GET["sort_by"]!=null){
	$input["sort_by"]=$_GET["sort_by"];
	
}

if ($_GET["new_arrival"]!=null){
	$input["new_arrival"]=$_GET["new_arrival"];
	
}

if ($_GET["sale"]!=null){
	$input["sale"]=$_GET["sale"];
	
}



function getURL($x_attribute,$x_value,$input,$prefix){
	
	$flag=0;
	$url_ = $prefix."products?filter=true";
	foreach($input as $attribute => $value){
		if ($attribute==$x_attribute){
			$flag =1;
		}
		if ($attribute!=$x_attribute){
			$url_.="&".$attribute."=".$value;
		}
		else{
			if ($x_value!=""){
				$url_.="&".$x_attribute."=".$x_value;
			}
			
		}
	}
	if ($flag!=1){
		if ($x_value!=""){
			$url_.="&".$x_attribute."=".$x_value;
		}
	}
	
	return $url_;
}

function getURLParameters($input){
	
	$url_="";
	
	foreach($input as $attribute => $value){
		
			$url_.="&".$attribute."=".$value;
		
	}
	
	return $url_;
}

function iterateCategory($level,$parent,$categories,$prefix,$input){
include($prefix."static/connect_database.php");

$get_data = mysql_query("
	SELECT * from tbl_category AS cat INNER JOIN tbl_category_relation AS cat_rel
	ON cat.category_id = cat_rel.category_child
	WHERE cat.category_level = '$level' AND cat_rel.category_parent = '$parent'
	ORDER BY category_order
",$con);

if (mysql_num_rows($get_data)!=null && mysql_num_rows($get_data)!=0){
	$temp_new_arrival = $input["new_arrival"];
	$temp_sale = $input["sale"];
	
	unset($input["new_arrival"]);
	unset($input["sale"]);
	echo '<ul>';
	for ($counter=1;$counter<=mysql_num_rows($get_data);$counter++){
		
		$get_data_array = mysql_fetch_array($get_data);
		$new_level = $level*1+1;
		$new_parent = $get_data_array["category_id"];
		$url = getURL("category_id",$new_parent,$input,$prefix);
		
			
		echo '<li><a href="'.$url.'">';
		if ($new_parent==$categories[0]){
			echo '<div class="selected" >';
		}
		if ($level==0){
			echo strtoupper($get_data_array["category_name"]);
		}
		else
		{
			echo $get_data_array["category_name"];
		}
		if ($new_parent==$categories[0]){
			echo '</div>';
		}
		echo '</a>';
		iterateCategory($new_level,$new_parent,$categories,$prefix,$input);
		echo '</li></a>';
		
	}
	$input["new_arrival"]=$temp_new_arrival;
	$input["sale"]=$temp_sale;
	echo '</ul>';
}
}

function listCategory($level,$parent,$categories,$current_category,$prefix){
include($prefix."static/connect_database.php");

$get_data = mysql_query("
	SELECT * from tbl_category AS cat INNER JOIN tbl_category_relation AS cat_rel
	ON cat.category_id = cat_rel.category_child
	WHERE cat.category_level = '$level' AND cat_rel.category_parent = '$parent'
	ORDER BY category_order
",$con);

if (mysql_num_rows($get_data)!=null && mysql_num_rows($get_data)!=0){
	for ($counter=1;$counter<=mysql_num_rows($get_data);$counter++){
		$get_data_array = mysql_fetch_array($get_data);
		$new_level = $level*1+1;
		$new_parent = $get_data_array["category_id"];
		echo '<option class="option_level_'.$level.'" ';
		if ($current_category==$new_parent){
			echo "selected=selected";
		}
		echo ' value="'.$new_parent.'">';
		for ($i=0;$i<$level;$i++){
			echo '&nbsp;&nbsp;&nbsp;';
		}
		echo $get_data_array["category_name"].'</option>';
		
		listCategory($new_level,$new_parent,$categories,$current_category,$prefix);
		
	}
}
}

if ($_SESSION["user_status"]=="member"){
	$bag_id = $_SESSION["bag_id"];
	include($prefix."static/get_bag_details.php");
}
else if ($_SESSION["user_status"]=="guest"){
	include($prefix."static/get_session_details.php");
}
?>