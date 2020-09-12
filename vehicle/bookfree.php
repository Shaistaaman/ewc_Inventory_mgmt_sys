 <?php
   include('../config.php');

/* Update tracker table  */
if(isset($_POST['submit']) && $_POST['submit'] == 'Book')
{
$status=$_POST['submit'];
$id=$_GET['id'];
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
else if(isset($_POST['submit']) && $_POST['submit'] == 'Free' )
{
					$status=$_POST['submit'];
					$id=$_REQUEST['id'];
					$veh_no=$_REQUEST['veh_no'];
			 		$driver=$_POST['driver'];
					$driver_contact=$_POST['driver_contact'];
					$t_start=$_POST['t_start'];
					$t_end=$_POST['t_end'];
										
				   $sql="UPDATE vehicle SET temp_status='".$status."' where veh_no='".$veh_no."'"; 
				   $result=mysqli_query($db,$sql);
				   $sqld="update tracker set veh_no = '".$veh_no."',driver = '".$driver."',driver_contact = '".$driver_contact."',t_start = '".$t_start."',t_end = '".$t_end."',status = '".$status."' where track_id='".$id."'"; 
				   $resultd=mysqli_query($db,$sqld);
					if($result == true && $resultd == true)
					{ echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../inventory/starter.php">'; }
			
}
?>