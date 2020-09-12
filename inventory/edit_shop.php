<?php
   include('../header.php');
   include('../config.php');

?>	
 <?php
   
   /*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
   /*    Add all data from form */
if(isset($_POST['submit']) && $_POST['submit'] == 'Edit' )
{
					$id= $_REQUEST['code'];
					$name=$_POST['name'];
					$location=$_POST['location'];
					$owner=$_POST['owner'];
					$phone=$_POST['phone'];
					$email=$_POST['email'];
												
				   $sql="update shop set  Name = '".$name."',location='".$location."',owner='".$owner."',phone='".$phone."',email='".$email."' where shop_ID='".$id."'";
				   $result=mysqli_query($db,$sql);
					if($result == true)
					{ echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../inventory/shops.php">'; }
			
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Edit Shops
      </h1>
      <ol class="breadcrumb">
        <li><a href="inventory/starter.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo basename($_SERVER['PHP_SELF']); ?>"><?php echo ucwords(basename($_SERVER['PHP_SELF'],'.php')); ?></a></li>
      </ol>
    </section>
	<?php
			$id=$_REQUEST['code'];
			$sql="SELECT * from shop where shop_ID='".$id."'";
			$result=mysqli_query($db,$sql);
			$rec=mysqli_fetch_array($result);
	?>
    <!-- Main content -->
    <section class="content">

      <div class="row">
       
     
        <div class="col-md-6">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#personal" data-toggle="tab">Details</a></li>
              <!-- <li><a href="#academic" data-toggle="tab">Academic</a></li>
              <li><a href="#professional" data-toggle="tab">Professional</a></li> -->
            </ul>
            <div class="tab-content">
			<div class="active tab-pane" id="personal">
                <form class="form-horizontal" method="post" action=" " id="addemploye" enctype="multipart/form-data">
					<div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="name" name="name" value='<?php echo $rec['Name'];?>' >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="location" class="col-sm-2 control-label">Location</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="location" name="location" value='<?php echo $rec['location'];?>' >
                    </div>
                  </div>
					 <div class="form-group">
                    <label for="owner" class="col-sm-2 control-label">Owner</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="owner" name="owner" value='<?php echo $rec['owner'];?>' >
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="phone" name="phone" value='<?php echo $rec['phone'];?>' >
                    </div>
                  </div>
                  <div class="form-group">
					  <label for="email" class="col-sm-2 control-label">Email</label>
					  <div class="col-sm-10">
					  	
						  <input type="text" class="form-control" id="email" name="email" value='<?php echo $rec['email'];?>' >
						
					  </div>                    
                  </div>
               
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
					<input class="btn btn-danger" type="submit" value="Edit" name="submit" >
                    </div>
                </form>
              </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="academic">
                
               
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="professional">
                
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
		</div>
    </section>
    <!-- /.content -->
  </div>
 
<?php
   include('../footer.php');
?>