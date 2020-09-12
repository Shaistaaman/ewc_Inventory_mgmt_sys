 <?php
   include('../config.php');
   /*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
   /*    Add all data from form */
if(isset($_POST['submit']) && $_POST['submit'] == 'Add' )
{
					$himage=$_FILES['empimage']['name'];
					$himage_tmpname=$_FILES['empimage']['tmp_name'];
					$edu=$_POST['edu'];
					$location=$_POST['location'];
					$project=$_POST['project'];
					$name=$_POST['name'];
					$email=$_POST['email'];
					$cnic=$_POST['cnic'];
					$experience=$_POST['experience'];
					$phone=$_POST['phone'];
					$ttcode=$_POST['ttcode'];
					$doj=$_POST['doj'];
					$job_role=$_POST['job_role'];
					$password=$_POST['password'];
					$designation=$_POST['designation'];
					move_uploaded_file($himage_tmpname,"../hr/emp_pics/$himage");
					
				   $sql="INSERT INTO employee (ttcode,cnic,name,email,phone,password,emp_pic,job_role,designation,doj,edu,location,project,experience) values('$ttcode','$cnic','$name','$email','$phone','$password','$himage','$job_role','$designation','$doj','$edu','$location','$project','$experience')";
				   $result=mysqli_query($db,$sql);
					if($result == true)
					{ echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../inventory/starter.php">'; }
			
}
?>