 <?php
   include('../config.php');
   
   /*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
   /*    edit all data from form */
if(isset($_POST['submit']) && $_POST['submit'] == 'Edit' )
{
					$id= $_REQUEST['code'];
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
					$himage=$_FILES['empimage']['name'];
					$himage_tmpname=$_FILES['empimage']['tmp_name'];
					// move_uploaded_file($himage_tmpname,"../hr/emp_pics/$himage");
					$newhimage=$_FILES['empimage']['name'];
					if($newhimage)
					{
					//unlink("../hr/emp_pics/".$himage);
					move_uploaded_file($himage_tmpname,"../hr/emp_pics/$himage");

					$sql="update employee set cnic='".$cnic."'
				   ,name='".$name."'
				   ,email='".$email."'
				   ,phone='".$phone."'
				   ,password='".$password."'
				   ,emp_pic='".$newhimage."'
				   ,job_role='".$job_role."'
				   ,designation='".$designation."'
				   ,doj='".$doj."'
				   ,edu='".$edu."'
				   ,location='".$location."'
				   ,project='".$project."'
				   ,experience='".$experience."'
				   where ttcode='".$id."'";
					}
					else
					{
					
				   $sql="update employee set cnic='".$cnic."'
				   ,name='".$name."'
				   ,email='".$email."'
				   ,phone='".$phone."'
				   ,password='".$password."'
				   ,job_role='".$job_role."'
				   ,designation='".$designation."'
				   ,doj='".$doj."'
				   ,edu='".$edu."'
				   ,location='".$location."'
				   ,project='".$project."'
				   ,experience='".$experience."'
				   where ttcode='".$id."'";
					}
				   $result=mysqli_query($db,$sql);
					if($result == true)
					{ echo '<META HTTP-EQUIV="Refresh" Content="0; URL=employees.php">'; }
			
}
?>