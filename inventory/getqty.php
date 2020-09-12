<?php 
if(isset($_POST["id"]))
{
	//echo "<script>alert('".$_POST['id']."')</script>";
 $connect = mysqli_connect("localhost", "root", "", "stock");
 $query = "SELECT Sum(Quantity) AS rqty, sum(weight) as rweight FROM inventory WHERE item_ID = '".$_POST["id"]."' and shop_returned = 0 and veh_returned =0";
 $result = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($result))
 {
	$sql2="SELECT Sum(Quantity) AS dqty , sum(weight) as dweight FROM transaction WHERE item_ID = '".$_POST["id"]."'";
	$result2=mysqli_query($connect,$sql2);
	$rec2=mysqli_fetch_array($result2);

	$d = $row["rqty"]-$rec2["dqty"];
	$b = $row["rweight"]-$rec2["dweight"];
  $data["weight"] = $b;
  $data["quantity"] = $d;
  //$data["price"] = $row["price"];
 }
//echo "<script>alert(".$d.")</script>";
 echo json_encode($data);
}
	 
?>