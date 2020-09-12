 <?php
   include('../config.php');

/* Update tracker table  */
if(isset($_POST['submit']) && $_POST['submit'] == 'Book')
{
echo "<script> alert (".$_POST['submit'].");</script>";
$status=$_POST['submit'];
$id=$_REQUEST['id'];
			 		
					$veh_no=$id;
					$tt_coordinator=$_POST['tt_coordinator'];
					$tt_dte=$_POST['tt_dte'];
					$driver=$_POST['driver'];
					$driver_contact=$_POST['driver_contact'];
					$project=$_POST['project'];
					$book_date=$_POST['book_date'];
					$t_start=$_POST['t_start'];
					$t_end=$_POST['t_end'];
										
				   $sql="UPDATE vehicle SET temp_status='".$status."' where veh_no='".$id."'"; 
				   $result=mysqli_query($db,$sql);
				   $sqld="INSERT INTO tracker (veh_no,tt_coordinator, tt_dte,driver,driver_contact,project,book_date,t_start,t_end,status) values('$veh_no','$tt_coordinator','$tt_dte','$driver','$driver_contact','$project','$book_date','$t_start','$t_end','$status')";
				   $resultd=mysqli_query($db,$sqld);
					if($result == true && $resultd == true)
					{ echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../inventory/starter.php">'; }
					
			
}
/*--------------------------------------------------------------------Free-----------------------------------------------------------------------------------------------------*/

/* Update tracker table */
else if(isset($_POST['submit']) && $_POST['submit'] == 'Update' && $_POST['var'] == 'laptop')
{
$id=$_REQUEST['id'];

			 		$himage=$_FILES['hsimage']['name'];
					$himage_tmpname=$_FILES['hsimage']['tmp_name'];
					$mac=$_POST['mac'];
					$brand=$_POST['brand'];
					$model=$_POST['model'];
					$software=$_POST['software'];
					$type=$_POST['type'];
					$purchase=$_POST['purchase'];
					$ttcode=$_POST['tcode'];
					$status=$_POST['status'];
					
					$newhimage=$_FILES['hsimage']['name'];
		if($newhimage)
		{
		unlink("../inventory/pics/".$himage);
		move_uploaded_file($himage_tmpname,"../inventory/pics/$himage");
		$updateq=" `lp_pic`='".$himage."' ,";
				
				}
		else $updateq=" `lp_pic`='".$_POST['hiddenimg']."' ,";
		/*echo "<script> alert (".$ttcode.");</script>";*/
					
				   $sql="UPDATE laptop SET {$updateq} mac='".$mac."',brand='".$brand."', model='".$model."',software='".$software."',type='".$type."',purchase_date='".$purchase."',ttcode='".$ttcode."' ,status='".$status."' where lp_id='".$id."'"; 
				   $result=mysqli_query($db,$sql);
					if($result == true)
					{ echo '<META HTTP-EQUIV="Refresh" Content="0; URL=starter.php">'; }
			
}
?>