<?php
include('../config.php');
error_reporting(0);
//echo "<script>alert(".$_GET['variable'].");</script>";
$result=mysqli_query($db,"select * from transaction where trans_ID='".$_GET['variable']."'");
while($data = mysqli_fetch_array($result))
{   
	//echo "<script>alert('i am in');</script>";
    echo "<div class='row'><div class='col-md-10'>";
	
   	echo "<div class='form-group'>
    <label  class='col-sm-2 control-label'>Quantity:</label><div class='col-sm-6'>
    <input type='text' class='form-control' id='quantity' name='quantity' placeholder='100' ></div> </div>
	Available Quantity = ".$data['quantity']."<br>";
	
	echo "<div class='form-group'>
    <label  class='col-sm-2 control-label'>Weight:</label><div class='col-sm-6'>
    <input type='text' class='form-control' id='weight' name='weight' placeholder='100' ></div> </div>
	Available Weight = ".$data['weight']."<br>";
	
	echo "<div class='form-group'>
    <label  class='col-sm-2 control-label'>Price:</label><div class='col-sm-6'>
    <input type='text' class='form-control' id='price' name='price' placeholder='100' ></div> </div>
	Available Price = ".$data['price']."";
	
	echo "<div class='form-group'>
    <label  class='col-sm-2 control-label'>Comments:</label><div class='col-sm-6'>
    <input type='text' class='form-control' id='comments' name='comments' placeholder='Any comment' ></div> </div>";
	
	echo"<input type='hidden' name='veh_returned' value=".$data['vehicle_ID'].">";
	echo"<input type='hidden' name='shop_returned' value=".$data['shop_ID'].">";
	echo"<input type='hidden' name='quantity1' value=".$data['quantity'].">";
	echo"<input type='hidden' name='weight1' value=".$data['weight'].">";
	echo"<input type='hidden' name='price1' value=".$data['price'].">";
	echo"<input type='hidden' name='trans_ID' value=".$_GET['variable'].">";
	echo"<input type='hidden' name='item_ID' value=".$data['item_ID'].">";
	echo"<input type='hidden' name='shipped_date' value=".date("d/m/yy").">";
	$result1=mysqli_query($db,"select max(purchase_order)+1 as po from inventory");
	$data1 = mysqli_fetch_array($result1);
	echo"<input type='hidden' name='purchase_order' value=".$data1['po'].">";
	echo "</div></div>";

}
//echo "</table>";
?>