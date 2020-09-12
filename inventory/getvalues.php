<?php 
include('../config.php');
	//$out="";

if(isset($_POST['id']))
{ $id=$_POST['id'];
 //echo "<script>alert(".$id.")</script>";
	$result=mysqli_query($db,"SELECT item_ID,quantity,price,date FROM transaction where shop_ID='$id' order by date desc");
	while($rec=mysqli_fetch_array($result)){
		$result1=mysqli_query($db,"SELECT name FROM item where item_ID='".$rec['item_ID']."'");
		$rec1=mysqli_fetch_array($result1);
	echo "<tr align='center'>";
	echo "<td> ".$rec1['name']."</td>";
	echo "<td> ".$rec['quantity']."</td>";
	echo "<td> ".$rec['price']."</td>";
	echo "<td> ".$rec['date']."</td>";
	echo "</tr>";
}
}
echo json_encode($data);


	 
?>