<?php
   include('../header.php');
   include('../config.php');
   
/* Show all data of booked vehicle */
if(isset($_GET['action']) && $_GET['action']=='free') 
{
$action = $_GET['action'];
$id=$_REQUEST['id'];

			$sql="SELECT * from tracker where status = 'book' and track_id='".$id."'";
			$result=mysqli_query($db,$sql);
			$record=mysqli_fetch_array($result);
 			
}
?>
	

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Fleet
      </h1>
      <ol class="breadcrumb">
        <li><a href="../inventory/starter.php"><i class="fa fa-dashboard"></i> Home</a></li>
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
			<div class="active tab-pane" >
			
                <form class="form-horizontal" method="post" action="bookfree.php?id=<?php echo $id;?>&veh_no=<?php echo $record['veh_no'];?>" enctype="multipart/form-data">
				<div class="form-group">
                    <label for="veh_no" class="col-sm-3 control-label">Vehicle No.</label>

                    <div class="col-sm-9">
					
					<input type="text" class="form-control" id="veh_no" name="veh_no" value="<?php echo $record['veh_no'];?>" readonly>
					 </div>
                  </div>
				<div class="form-group">
                    <label for="tt_coordinator" class="col-sm-3 control-label">Coordinator TT-Code</label>
					<div class="col-sm-9">
					
					<input type="text" class="form-control" id="tt_coordinator" name="tt_coordinator" value="<?php echo $record['tt_coordinator'];?>" readonly>
					</div>
                  </div>
                  <div class="form-group">
                    <label for="tt_dte" class="col-sm-3 control-label">DTE TT-Code</label>

                    <div class="col-sm-9">
					
					<input type="text" class="form-control" id="tt_dte" name="tt_dte" value="<?php echo $record['tt_dte'];?>" readonly>
					 </div>
                  </div>
                  <div class="form-group">
                    <label for="driver" class="col-sm-3 control-label">Driver</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="driver" name="driver" placeholder="Full Name of Driver" value=" <?php echo $record['driver']; ?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="driver_contact" class="col-sm-3 control-label">Driver Contact</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="driver_contact" name="driver_contact" placeholder="Contact Number of Driver" value="<?php  echo $record['driver_contact']; ?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="project" class="col-sm-3 control-label">Project</label>

                    <div class="col-sm-9">
					
					<input type="text" class="form-control" id="project" name="project" value="<?php echo $record['project'];?>" readonly>
				  </div>
                  </div>
				   <div class="form-group">
                    <label for="book_date" class="col-sm-3 control-label">Book Date</label>

                    <div class="col-sm-9">
                      <input type="date" class="form-control" id="book_date" name="book_date" placeholder="Booking Date" value="<?php  echo $record['book_date']; ?>" required readonly>
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <label for="t_start" class="col-sm-3 control-label">Start Time</label>
					<div class="bootstrap-timepicker">
						<div class="col-sm-9">
						<div class="input-group">
						 <input type="text" class="form-control timepicker" id="t_start" name="t_start" placeholder="Booking Start Time" value="<?php echo $record['t_start']; ?>" required>
					 <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                  </div></div>
				  		</div>
				  	</div>
				  </div>
				  
				  <div class="form-group">
                    <label for="t_end" class="col-sm-3 control-label">End Time</label>
					<div class="bootstrap-timepicker">
                    <div class="col-sm-9">
					<div class="input-group">
                      <input type="text" class="form-control timepicker" id="t_end" name="t_end" placeholder="Booking End Time" value="<?php  echo $record['t_end']; ?>" required>
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                  </div></div>
				 </div>
				 </div>
				 </div>
				     
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
					<input class="btn btn-danger" type="submit" value="Free" name="submit" >
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