<?php
   include('../header.php');
   include('../config.php');
/* Show all data in edit form */
if(isset($_GET['action']) && $_GET['action']=='edit') 
{
$action = $_GET['action'];
$id=$_REQUEST['id'];

			$sql="SELECT * from vehicle where veh_no='".$id."'";
			$result=mysqli_query($db,$sql);
			$record=mysqli_fetch_array($result);
 			
}
?>
	

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Handset
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
         <div class="box box-default"> 
		 <div class="box-body">
			<div class="active tab-pane" id="handset">
			
                <form class="form-horizontal" method="post" action="add_edit_vehicle.php<?php if(isset($action) && $action == 'edit'){ echo "?id=".$record['veh_no']; }?>" enctype="multipart/form-data">
				
                           <div class="form-group">
                    <label for="hsimage" class="col-sm-2 control-label">Image</label>
					<input type='text' name='hiddenimg' value="<?php echo $record['veh_pic']; ?>"  style="display:none;"/>
                    <div class="col-sm-10">
					<input type="file" class="dropify" name="hsimage"  id="input-file-a" data-default-file='<?php if(isset($action) && $action == 'edit'){ echo "pics/".$record['veh_pic']; }?>' maxlength="60" >
					<span class="md-input-bar"></span>
                      </div>
                  </div>  

				 <div class="form-group">
                    <label for="veh_no" class="col-sm-2 control-label">Vehicle No</label>

                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="veh_no" name="veh_no" placeholder="Vehicle No" value="<?php if(isset($action) && $action == 'edit'){ echo $record['veh_no']; }?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="company" class="col-sm-2 control-label">Company</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="company" name="company" placeholder="Company" value="<?php if(isset($action) && $action == 'edit'){ echo $record['company']; }?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="model" class="col-sm-2 control-label">Model</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="model" name="model" placeholder="Saloon" value="<?php if(isset($action) && $action == 'edit'){ echo $record['model']; }?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="reg_year" class="col-sm-2 control-label">Registration Year</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="reg_year" name="reg_year" placeholder="Car Registration Year" value="<?php if(isset($action) && $action == 'edit'){ echo $record['reg_year']; }?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="owner" class="col-sm-2 control-label">Owner</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="owner" name="owner" placeholder="Name of Rent A Car Company" value="<?php if(isset($action) && $action == 'edit'){ echo $record['owner']; }?>" required>
                    </div>
                  </div>
				 <div class="form-group">
                    <label for="region" class="col-sm-2 control-label">Region</label>
					<div class="col-sm-10">
					<?php if(isset($_GET['action']) && $_GET['action']== 'edit') {?>
					<input type="text" class="form-control" id="region" name="region" value="<?php echo $record['region'];?>" >
					<?php } else { ?>
                 
                <select class="form-control select2" name="region" style="width: 100%;" required>
                  <option selected="selected" value="C1-LHR">C1-LHR</option>
                  <option value="C2-FSD">C2-FSD</option>
				  <option value="C3-MUL">C3-MUL</option>
				  <option value="C4-SHWL">C4-SHWL</option>
                 </select>
				 <?php } ?>
              </div>
               </div>
				  <div class="form-group">
                    <label for="basis" class="col-sm-2 control-label">Basis</label>
					<div class="col-sm-10">
					<?php if(isset($_GET['action']) && $_GET['action']== 'edit') {?>
					<input type="text" class="form-control" id="basis" name="basis" value="<?php echo $record['basis'];?>" >
					<?php } else { ?>
                 
                <select class="form-control select2" name="basis" style="width: 100%;" required>
                  <option selected="selected" value="monthly">Monthly</option>
                  <option value="daily">Daily</option>
                 </select>
				 <?php } ?>
              </div>
               </div>   
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
					<input class="btn btn-danger" type="submit" value="<?php if(isset($action) && $action == 'edit' ){ echo 'Close'; }else{echo 'Add';}?>" name="submit" >
                    </div>
                  </div>
                </form>
              </div>
		 </div>
         </div> 
		 <!-- box box-primary -->  
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
 
<?php
   include('../footer.php');
?>