<?php session_start();

echo "order_billing_first_name = ".$_SESSION["order_billing_first_name"]."<br/>";
echo "order_billing_last_name = ".$_SESSION["order_billing_last_name"]."<br/>" ;
echo "order_billing_email = ".$_SESSION["order_billing_email"] ."<br/>";
echo "order_billing_phone = ".$_SESSION["order_billing_phone"] ."<br/>";
echo "order_shipping_first_name = ".$_SESSION["order_shipping_first_name"]."<br/>"; 
echo "order_shipping_last_name = ".$_SESSION["order_shipping_last_name"] ."<br/>";
echo "order_shipping_phone = ".$_SESSION["order_shipping_phone"] ."<br/>";
echo "order_shipping_address = ".$_SESSION["order_shipping_address"]."<br/>"; 
echo "order_shipping_country = ".$_SESSION["order_shipping_country"]."<br/>" ;
echo "order_shipping_province = ".$_SESSION["order_shipping_province"]."<br/>" ;
echo "order_shipping_city = ".$_SESSION["order_shipping_city"]."<br/>" ;
echo "order_shipping_postal_code = ".$_SESSION["order_shipping_postal_code"]."<br/>" ;
echo "order_gift_flag = ".$_SESSION["order_gift_flag"] ."<br/>";
echo "order_gift_message = ".$_SESSION["order_gift_message"]."<br/>"; 
echo "order_payment_method = ".$_SESSION["order_payment_method"]."<br/>"; 
echo "order_purchase_amount = ".$_SESSION["order_purchase_amount"]."<br/>";
echo "order_shipping_amount = ".$_SESSION["order_shipping_amount"]."<br/>" ;
echo "order_total_amount = ".$_SESSION["order_total_amount"] ."<br/>";
echo "shopping_bag_counter = ".$_SESSION["shopping_bag_counter"]."<br/>";
echo "user_id = ".$_SESSION["user_id"]."<br/>";
echo "user_status = ".$_SESSION["user_status"]."<br/>";
echo "bag_id = ".$_SESSION["bag_id"]."<br/>";


for ($counter=0;$_SESSION["type_id"][$counter]!=null;$counter++){
	echo "type_id = ".$_SESSION["type_id"][$counter]."<br/>";
	echo "item_quantity = ".$_SESSION["item_quantity"][$counter]."<br/>";
	echo "stock_name = ".$_SESSION["stock_name"][$counter]."<br/>";
	echo "item_price = ".$_SESSION["item_price"][$counter]."<br/>";
}


?>