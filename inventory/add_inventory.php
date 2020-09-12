
<?php  
 $connect = new PDO("mysql:host=localhost;dbname=stock", "root", "");
 //print_r($_POST);
 $query = "
INSERT INTO inventory(supp_ID,purchase_order,shipped_date,comments,cashcredit,item_ID,weight,quantity,price) VALUES ('".$_POST["supplier"]."','".$_POST["purchase_order"]."','".$_POST["date"]."','". $_POST["comments"]."','".$_POST["cashcredit"]."',:item,:weight,:quantity,:price)";
//print_r($query);
for($count = 0; $count<count($_POST['item']); $count++)
{
 $data = array(
  ':item' => $_POST['item'][$count],
  ':weight' => $_POST['weight'][$count],
  ':price' => $_POST['price'][$count],
  ':quantity' => $_POST['quantity'][$count]
 );
 $statement = $connect->prepare($query);
 $statement->execute($data);
}




include('../config.php'); 

$query1 = "update item set totalstock = :quantity where item_ID=:item";
for($count = 0; $count<count($_POST['item']); $count++)
{

$sql1="SELECT totalstock FROM item where item_ID = '".$_POST['item'][$count]."'";
$result1=mysqli_query($db,$sql1);
$rec1=mysqli_fetch_array($result1);

 $data1 = array(
  ':item' => $_POST['item'][$count],
  ':quantity' => $_POST['quantity'][$count]+$rec1[0]
 );
 

// $quant=$rec1[$count];
// echo "<script>console.log('".$rec1[$count]."');</script>";
 $statement = $connect->prepare($query1);
 $statement->execute($data1);
}
 ?> 