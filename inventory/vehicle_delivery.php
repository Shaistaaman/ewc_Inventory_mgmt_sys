
<?php  
 $connect = new PDO("mysql:host=localhost;dbname=stock", "root", "");
 //print_r($_POST);
 $query = "
INSERT INTO transaction(vehicle_ID,invoice,date,comments,cashcredit,item_ID,weight,quantity,price) VALUES ('".$_POST["vehicle"]."','".$_POST["invoice"]."','".$_POST["date"]."','". $_POST["comments"]."','".$_POST["cashcredit"]."',:item,:weight,:quantity,:price)";
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


 ?> 