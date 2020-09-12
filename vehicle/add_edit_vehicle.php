 <?php
   include('../config.php');
/*--------------------------------------------------------------------Add-----------------------------------------------------------------------------------------------------*/
   /*    Add all data from form */
if(isset($_POST['submit']) && $_POST['submit'] == 'Add' )
{
					$himage=$_FILES['hsimage']['name'];
					$himage_tmpname=$_FILES['hsimage']['tmp_name'];
					$veh_no=$_POST['veh_no'];
					$company=$_POST['company'];
					$model=$_POST['model'];
					$reg_year=$_POST['reg_year'];
					$owner=$_POST['owner'];
					$region=$_POST['region'];
					$basis=$_POST['basis'];
					$status='active';
					$temp_status='Free';
					move_uploaded_file($himage_tmpname,"../vehicle/pics/$himage");
					
				   $sql="INSERT INTO vehicle (veh_no,veh_pic,company,model,reg_year,owner,region,basis,status,temp_status) values('$veh_no','$himage','$company','$model','$reg_year','$owner','$region','$basis','$status','$temp_status')";
				   $result=mysqli_query($db,$sql);
					if($result == true)
					{ echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../inventory/starter.php">'; }
			
}
/* Update all data in edit form */
   /*--------------------------------------------------------------------Close-----------------------------------------------------------------------------------------------------*/

else if(isset($_POST['submit']) && $_POST['submit'] == 'Close')
{
$id=$_REQUEST['id'];
			 		
					$status='Close';
					$temp_status='NULL';
					
		
				   $sql="UPDATE vehicle SET status='".$status."',temp_status='".$temp_status."' where veh_no='".$id."'"; 
				   $result=mysqli_query($db,$sql);
					if($result == true)
					{ echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../inventory/starter.php">'; }
			
}
?>