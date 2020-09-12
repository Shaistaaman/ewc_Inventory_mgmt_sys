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
					$type=$_POST['type'];
					$min_level=$_POST['min_level'];
					$unit=$_POST['unit'];
												
				   $sql="update item set  name = '".$name."',type='".$type."',min_level='".$min_level."',unit='".$unit."' where item_ID='".$id."'";
				   $result=mysqli_query($db,$sql);
					if($result == true)
					{ echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../inventory/items.php">'; }
			
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Edit Item
      </h1>
      <ol class="breadcrumb">
        <li><a href="inventory/starter.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo basename($_SERVER['PHP_SELF']); ?>"><?php echo ucwords(basename($_SERVER['PHP_SELF'],'.php')); ?></a></li>
      </ol>
    </section>
	<?php
			$id=$_REQUEST['code'];
			$sql="SELECT * from item where item_ID='".$id."'";
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
                    <label for="name" class="col-sm-2 control-label">Item Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="name" name="name" value='<?php echo $rec['name'];?>' >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="type" class="col-sm-2 control-label">Type</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="type" name="type" value='<?php echo $rec['type'];?>' >
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="min_level" class="col-sm-2 control-label">Minimum Level</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="min_level" name="min_level" value='<?php echo $rec['min_level'];?>' >
                    </div>
                  </div>
                  <div class="form-group">
					  <label for="unit" class="col-sm-2 control-label">Unit Metrics</label>
					  <div class="col-sm-10">
					  	<select class="form-control select2" style="width: 100%;" id="unit" name="unit">
							  <option <?php if ($rec['unit'] == 'KG'){?>selected="selected"<?php } ?> value="KG">KG</option>
							  <option <?php if ($rec['unit'] == 'Meter'){?>selected="selected"<?php } ?>value="Meter">Meter</option>
							  <option <?php if ($rec['unit'] == 'Liter'){?>selected="selected"<?php } ?>value="Liter">Liter</option>
					    </select>
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