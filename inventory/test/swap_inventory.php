<?php
   include('header.php');
   include('config.php');
/* Show all data in edit form */
if(isset($_GET['action']) && $_GET['action']=='swap') 
{
$action = $_GET['action'];
$id=$_REQUEST['id'];

	$sql="SELECT * from handset where hs_id='".$id."'";
	$result=mysqli_query($db,$sql);
	$record=mysqli_fetch_array($result);
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
                <form class="form-horizontal" method="post" action="swap.php?action=swap&id=<?php echo $record['hs_id'];?>" enctype="multipart/form-data">
				

				 <div class="form-group">
                    <label for="imei" class="col-sm-2 control-label">IMEI</label>

                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="imei" name="imei" placeholder="IMEI" value="<?php if(isset($action) && $action == 'swap'){ echo $record['imei']; }?>" required readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="brand" class="col-sm-2 control-label">Brand</label>

                    <div class="col-sm-10">
                      <input type="brand" class="form-control" id="brand" name="brand" placeholder="Samsung/Huawei" value="<?php if(isset($action) && $action == 'swap'){ echo $record['brand']; }?>" required readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="model" class="col-sm-2 control-label">Model</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="model" name="model" placeholder="G-900f" value="<?php if(isset($action) && $action == 'swap'){ echo $record['model']; }?>" required readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="software" class="col-sm-2 control-label">Software</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="software" name="software" placeholder="Nemo/Tems/Probe" value="<?php if(isset($action) && $action == 'swap'){ echo $record['software']; }?>" required readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="type" class="col-sm-2 control-label">Type</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="type" name="type" placeholder="Original/Crack" value="<?php if(isset($action) && $action == 'swap'){ echo $record['type']; }?>" required readonly>
                    </div>
                  </div>
				   <div class="form-group">
                    <label for="purchase" class="col-sm-2 control-label">Purchase Date</label>

                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="purchase" name="purchase" placeholder="Purchase Date" value="<?php if(isset($action) && $action == 'swap'){ echo $record['purchase_date']; }?>" required readonly>
                    </div>
                  </div>
				  
				 <div class="form-group">
                    <label for="ttcode" class="col-sm-2 control-label">TT-Code</label>
					 <div class="col-sm-10">
					<input type="text" class="form-control" id="tcode" name="tcode" value="<?php echo $record['ttcode'];?>" readonly>
					</div>
                  </div>
				  
				  <h3 class="box-title"><b>Select TT-Code to Handover</b></h3>
                 <div class="form-group">
				  <label for="tempcode" class="col-sm-2 control-label">TT-Code</label>
					<div class="col-sm-10">
					<select class="form-control select2" name="tempcode" style="width: 100%;">
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