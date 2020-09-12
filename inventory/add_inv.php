
<?php  
error_reporting(0);
include('../config.php');
 //print_r($_POST);
//echo "alert('i m in');";
if($_REQUEST['code'] == 'vehicle'){
 $sql = "
INSERT INTO inventory(shipped_date,comments,item_ID,weight,quantity,price,veh_returned) VALUES ('".$_POST["shipped_date"]."','".$_POST["comments"]."','".$_POST["item_ID"]."','".$_POST["weight"]."','".$_POST["quantity"]."','".$_POST["price"]."','".$_POST["veh_returned"]."')";
//print_r($query);
$result=mysqli_query($db,$sql);
$qua = $_POST["quantity1"]-$_POST["quantity"];
$wei = $_POST["weight1"]-$_POST["weight"];
$pri = $_POST["price1"]-$_POST["price"];
$sql1="update transaction set  quantity='".$qua."',weight='".$wei."',price='".$pri."' where trans_ID='".$_POST["trans_ID"]."'";
//print_r($query);	
$result1=mysqli_query($db,$sql1);
if($result == true && $result1 == true)
					{ echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../inventory/vehicle_stock.php">'; }
}
else{
	$sql = "
INSERT INTO inventory(shipped_date,comments,item_ID,weight,quantity,price,shop_returned) VALUES ('".$_POST["shipped_date"]."','".$_POST["comments"]."','".$_POST["item_ID"]."','".$_POST["weight"]."','".$_POST["quantity"]."','".$_POST["price"]."','".$_POST["shop_returned"]."')";
//print_r($query);
$result=mysqli_query($db,$sql);
$qua = $_POST["quantity1"]-$_POST["quantity"];
$wei = $_POST["weight1"]-$_POST["weight"];
$pri = $_POST["price1"]-$_POST["price"];
$sql1="update transaction set  quantity='".$qua."',weight='".$wei."',price='".$pri."' where trans_ID='".$_POST["trans_ID"]."'";
//print_r($query);	
$result1=mysqli_query($db,$sql1);
if($result == true && $result1 == true)
					{ echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../inventory/shop_stock.php">'; }
}
 ?> 