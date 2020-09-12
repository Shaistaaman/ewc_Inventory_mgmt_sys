<?php
   include('header.php');
   include('config.php');
/* Show all data in edit form */
if(isset($_GET['action']) && $_GET['action']=='edit') 
{
$action = $_GET['action'];
$id=$_REQUEST['id'];
}
?>
	

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Inventory
      </h1>
      <ol class="breadcrumb">
        <li><a href="starter.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#"><?php echo ucwords(basename($_SERVER['PHP_SELF'],'.php')); ?></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#handset" data-toggle="tab">Handset</a></li>
              <li><a href="#laptop" data-toggle="tab">Laptop</a></li>
              <li><a href="#gps" data-toggle="tab">GPS</a></li>
            </ul>
            <div class="tab-content">
			<div class="active tab-pane" id="handset">
			<?php
			$sql="SELECT * from handset where hs_id='".$id."'";
			$result=mysqli_query($db,$sql);
			$record=mysqli_fetch_array($result);
 			?>
                <form class="form-horizontal" method="post" action="add_edit_inventory.php<?php if(isset($action) && $action == 'edit'){ echo "?id=".$record['hs_id']; }?>" enctype="multipart/form-data">
				<input type='hidden' name='var' value='handset'/> 
				
				
                           <div class="form-group">
                    <label for="hsimage" class="col-sm-2 control-label">Image</label>
					<input type='text' name='hiddenimg' value="<?php echo $record['hs_pic']; ?>"  style="display:none;"/>
                    <div class="col-sm-10">
					<input type="file" class="dropify" name="hsimage"  id="input-file-a" data-default-file='<?php if(isset($action) && $action == 'edit'){ echo "hs_pics/".$record['hs_pic']; }?>' maxlength="60">
					<span class="md-input-bar"></span>
                      </div>
                  </div>  

				 <div class="form-group">
                    <label for="imei" class="col-sm-2 control-label">IMEI</label>

                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="imei" name="imei" placeholder="IMEI" value="<?php if(isset($action) && $action == 'edit'){ echo $record['imei']; }?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="brand" class="col-sm-2 control-label">Brand</label>

                    <div class="col-sm-10">
                      <input type="brand" class="form-control" id="brand" name="brand" placeholder="Samsung/Huawei" value="<?php if(isset($action) && $action == 'edit'){ echo $record['brand']; }?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="model" class="col-sm-2 control-label">Model</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="model" name="model" placeholder="G-900f" value="<?php if(isset($action) && $action == 'edit'){ echo $record['model']; }?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="software" class="col-sm-2 control-label">Software</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="software" name="software" placeholder="Nemo/Tems/Probe" value="<?php if(isset($action) && $action == 'edit'){ echo $record['software']; }?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="type" class="col-sm-2 control-label">Type</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="type" name="type" placeholder="Original/Crack" value="<?php if(isset($action) && $action == 'edit'){ echo $record['type']; }?>" required>
                    </div>
                  </div>
				   <div class="form-group">
                    <label for="purchase" class="col-sm-2 control-label">Purchase Date</label>

                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="purchase" name="purchase" placeholder="Purchase Date" value="<?php if(isset($action) && $action == 'edit'){ echo $record['purchase_date']; }?>" required>
                    </div>
                  </div>
				  
				 <div class="form-group">
                    <label for="ttcode" class="col-sm-2 control-label">TT-Code</label>

                    <div class="col-sm-10">
					<?php if(isset($_GET['action']) && $_GET['action']== 'edit') {?>
					<input type="text" class="form-control" id="tcode" name="tcode" value="<?php echo $record['ttcode'];?>" readonly>
					<?php } else { ?>
					<select class="form-control select2" name="ttcode" style="width: 100%;">
					<option selected="selected" value="">Select TT-Code</option>
					 <?php 
                          

                            $sql="SELECT ttcode FROM employee";
							$result=mysqli_query($db,$sql);
							while($rec=mysqli_fetch_array($result)) 
                             {
                   ?> 
					  <option value=<?php echo $rec['ttcode'];?>><?php echo $rec['ttcode'];?></option>
					  <?php } ?>
					</select>
					<?php } ?>
					</div>
                  </div>
				  <div class="form-group">
                    <label for="status" class="col-sm-2 control-label">Status</label>
					<div class="col-sm-10">
					<?php if(isset($_GET['action']) && $_GET['action']== 'edit') {?>
					<input type="text" class="form-control" id="status" name="status" value="<?php echo $record['status'];?>" readonly>
					<?php } else { ?>
                 
                <select class="form-control select2" name="status" style="width: 100%;">
                  <option selected="selected" value="ok">OK</option>
                  <option value="faulty">Faulty</option>
                 </select>
				 <?php } ?>
              </div>
               </div>   
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
					<input class="btn btn-danger" type="submit" value="<?php if(isset($action) && $action == 'edit' ){ echo 'Update'; }else if(isset($action) && $action == 'swap' ){ echo 'Swap'; }else{echo 'Add';}?>" name="submit" >
                    </div>
                  </div>
                </form>
              </div>
              
              <!-- /.tab-pane -->
              <div class="tab-pane" id="laptop">
			  <?php
			$sql="SELECT * from laptop where lp_id='".$id."'";
			$result=mysqli_query($db,$sql);
			$record=mysqli_fetch_array($result);
 			?>
                <form class="form-horizontal" method="post" action="add_edit_inventory.php<?php if(isset($action) && $action == 'edit'){ echo "?id=".$record['lp_id']; }?>" enctype="multipart/form-data">
				<input type='hidden' name='var' value='laptop'/> 
				
				
                           <div class="form-group">
                    <label for="hsimage" class="col-sm-2 control-label">Image</label>
					<input type='text' name='hiddenimg' value="<?php echo $record['lp_pic']; ?>"  style="display:none;"/>
                    <div class="col-sm-10">
					<input type="file" class="dropify" name="hsimage"  id="input-file-a" data-default-file='<?php if(isset($action) && $action == 'edit'){ echo "hs_pics/".$record['lp_pic']; }?>' maxlength="60">
					<span class="md-input-bar"></span>
                      </div>
                  </div>  

				 <div class="form-group">
                    <label for="imei" class="col-sm-2 control-label">MAC</label>

                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="mac" name="mac" placeholder="MAC" value="<?php if(isset($action) && $action == 'edit'){ echo $record['mac']; }?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="brand" class="col-sm-2 control-label">Brand</label>

                    <div class="col-sm-10">
                      <input type="brand" class="form-control" id="brand" name="brand" placeholder="Samsung/Huawei" value="<?php if(isset($action) && $action == 'edit'){ echo $record['brand']; }?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="model" class="col-sm-2 control-label">Model</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="model" name="model" placeholder="G-900f" value="<?php if(isset($action) && $action == 'edit'){ echo $record['model']; }?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="software" class="col-sm-2 control-label">Software</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="software" name="software" placeholder="Nemo/Tems/Probe" value="<?php if(isset($action) && $action == 'edit'){ echo $record['software']; }?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="type" class="col-sm-2 control-label">Type</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="type" name="type" placeholder="Original/Crack" value="<?php if(isset($action) && $action == 'edit'){ echo $record['type']; }?>" required>
                    </div>
                  </div>
				   <div class="form-group">
                    <label for="purchase" class="col-sm-2 control-label">Purchase Date</label>

                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="purchase" name="purchase" placeholder="Purchase Date" value="<?php if(isset($action) && $action == 'edit'){ echo $record['purchase_date']; }?>" required>
                    </div>
                  </div>
				  
				 <div class="form-group">
                    <label for="ttcode" class="col-sm-2 control-label">TT-Code</label>

                    <div class="col-sm-10">
					<?php if(isset($_GET['action']) && $_GET['action']== 'edit') {?>
					<input type="text" class="form-control" id="tcode" name="tcode" value="<?php echo $record['ttcode'];?>" readonly>
					<?php } else { ?>
					<select class="form-control select2" name="ttcode" style="width: 100%;">
					<option selected="selected" value="">Select TT-Code</option>
					 <?php 
                          

                            $sql="SELECT ttcode FROM employee";
							$result=mysqli_query($db,$sql);
							while($rec=mysqli_fetch_array($result)) 
                             {
                   ?> 
					  <option value=<?php echo $rec['ttcode'];?>><?php echo $rec['ttcode'];?></option>
					  <?php } ?>
					</select>
					<?php } ?>
					</div>
                  </div>
				  <div class="form-group">
                    <label for="status" class="col-sm-2 control-label">Status</label>
					<div class="col-sm-10">
					<?php if(isset($_GET['action']) && $_GET['action']== 'edit') {?>
					<input type="text" class="form-control" id="status" name="status" value="<?php echo $record['status'];?>" readonly>
					<?php } else { ?>
                 
                <select class="form-control select2" name="status" style="width: 100%;">
                  <option selected="selected" value="ok">OK</option>
                  <option value="faulty">Faulty</option>
                 </select>
				 <?php } ?>
              </div>
               </div>   
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
					<input class="btn btn-danger" type="submit" value="<?php if(isset($action) && $action == 'edit' ){ echo 'Update'; }else if(isset($action) && $action == 'swap' ){ echo 'Swap'; }else{echo 'Add';}?>" name="submit" >
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="gps">
                
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

    </section>
    <!-- /.content -->
  </div>
 
<?php
   include('footer.php');
?>