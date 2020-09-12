<?php
include('../config.php');
//echo "<script>alert(".$_GET['variable'].");</script>";
$result=mysqli_query($db,"select * from inventory where inv_ID='".$_GET['variable']."'");
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
    <label  class='col-sm-2 control-label'>Vehicle:</label><div class='col-sm-6'>
	<select class='form-control select2' id='vehicle' name='vehicle' >
    <option selected='selected'></option>";
                            $sql3="SELECT vehicle_ID,veh_num FROM vehicle ";
							$result3=mysqli_query($db,$sql3);
							while($rec3=mysqli_fetch_array($result3)) 
                             {
                     echo "<option value='".$rec3['vehicle_ID']."'>".$rec3['veh_num']."</option>";
                      } 
				   echo "</select> </div> </div> Select Vehicle";
				   
	echo "<div class='form-group'>
    <label  class='col-sm-2 control-label'>Cash/Credit:</label><div class='col-sm-6'>
    <select class='form-control select2' id='cashcredit' name='cashcredit' >
    <option selected='selected' value='cash'>Cash</option>
	<option value='credit'>Credit</option>
	</select> </div> </div>Deliver on Cash / Credit <br>";			   
	
	echo "<div class='form-group'>
    <label  class='col-sm-2 control-label'>Comments:</label><div class='col-sm-6'>
    <input type='text' class='form-control' id='comments' name='comments' placeholder='Any comment' ></div> </div>";
	
	echo"<input type='hidden' name='quantity1' value=".$data['quantity'].">";
	echo"<input type='hidden' name='weight1' value=".$data['weight'].">";
	echo"<input type='hidden' name='price1' value=".$data['price'].">";
	echo"<input type='hidden' name='inv_ID' value=".$_GET['variable'].">";
	echo"<input type='hidden' name='item_ID' value=".$data['item_ID'].">";
	echo"<input type='hidden' name='date' value=".date("d/m/yy").">";
	$result1=mysqli_query($db,"select max(invoice)+1 as invoice from transaction");
	$data1 = mysqli_fetch_array($result1);
	echo"<input type='hidden' name='invoice' value=".$data1['invoice'].">";
	echo "</div></div>";

}
//echo "</table>";
?>