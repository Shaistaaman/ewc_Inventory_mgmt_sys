<?php 
include('../config.php');
	//$out="";

	$result=mysqli_query($db,"SELECT item_ID,name FROM item");
	while($rec=mysqli_fetch_array($result)){
    //$out.=	"<option value=".$rec['item_ID'].">". $rec['name']."</option>";
		$data[] = $rec; 
}
echo json_encode($data);
	
	 
?>