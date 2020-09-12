
<?php  
include('../config.php');
error_reporting(0);
 //print_r($_POST);
//echo "alert('i m in');";
if($_REQUEST['code'] == 'green'){
	$sql = "
INSERT INTO transaction(vehicle_ID,invoice,date,comments,item_ID,weight,quantity,price,inv_ID,cashcredit) VALUES ('".$_POST["vehicle"]."','".$_POST["invoice"]."','".$_POST["date"]."','".$_POST["comments"]."','".$_POST["item_ID"]."','".$_POST["weight"]."','".$_POST["quantity"]."','".$_POST["price"]."','".$_POST["inv_ID"]."','".$_POST["cashcredit"]."')";
//print_r($query);
$result=mysqli_query($db,$sql);
$qua = $_POST["quantity1"]-$_POST["quantity"];
$wei = $_POST["weight1"]-$_POST["weight"];
$pri = $_POST["price1"]-$_POST["price"];
$sql1="update inventory set  quantity='".$qua."',weight='".$wei."',price='".$pri."' where inv_ID='".$_POST["inv_ID"]."'";
//print_r($query);	
$result1=mysqli_query($db,$sql1);
if($result == true && $result1 == true)
					{ echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../inventory/warehouse_stock.php">'; }
}
else{
 $sql = "
INSERT INTO transaction(shop_ID,invoice,date,comments,item_ID,weight,quantity,price,inv_ID,cashcredit) VALUES ('".$_POST["shop"]."','".$_POST["invoice"]."','".$_POST["date"]."','".$_POST["comments"]."','".$_POST["item_ID"]."','".$_POST["weight"]."','".$_POST["quantity"]."','".$_POST["price"]."','".$_POST["inv_ID"]."','".$_POST["cashcredit"]."')";
//print_r($query);
$result=mysqli_query($db,$sql);
$qua = $_POST["quantity1"]-$_POST["quantity"];
$wei = $_POST["weight1"]-$_POST["weight"];
$pri = $_POST["price1"]-$_POST["price"];
$sql1="update inventory set  quantity='".$qua."',weight='".$wei."',price='".$pri."' where inv_ID='".$_POST["inv_ID"]."'";
//print_r($query);	
$result1=mysqli_query($db,$sql1);
if($result == true && $result1 == true)
					{ echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../inventory/warehouse_stock.php">'; }
}
 ?> 