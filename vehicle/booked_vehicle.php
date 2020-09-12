<?php
   include('../header.php');
   include('../config.php');
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Show Standby Vehicles</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="starter.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="#"><?php echo ucwords(basename($_SERVER['PHP_SELF'],'.php')); ?></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
		  
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Vehicle Summary</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Vehicle No</th>
				  <th>Coordinator/th>
                  <th>DTE</th>
				  <th>Project</th>
				  <th>Driver</th>
				  <th>Date</th>
                  <th disabled>Action</th>
                </tr>
                </thead>
                <tbody>
               
				   <?php 
                          

                            $sql="SELECT * FROM tracker where status = 'book' and tt_dte='".$_SESSION["ttcode"]."'";
							$result=mysqli_query($db,$sql);
							while($rec=mysqli_fetch_array($result)) 
                             {
                   ?> 
				  <tr  align="center">
                  <td><?php echo $rec['veh_no']; ?></td>
                  <td><?php echo $rec['tt_coordinator'];?></td>
                  <td><?php echo $rec['tt_dte'];?></td>
				  <td><?php echo $rec['project'];?></td>
				  <td><?php echo $rec['driver'];?></td>
				   <td><?php echo $rec['book_date'];?></td>
                  <td style="vertical-align:middle">
				  
				  <button type="button" class="btn btn-block btn-success btn-xs">
				  <a  href="free_vehicle.php?action=free&id=<?php echo $rec['track_id']; ?>&veh_no=<?php echo $rec['veh_no']; ?>" style="color: white">Free</a></button>
				  
				 </td>
				 <?php } ?>
				  </tr>
				                  
                </tbody>
                <tfoot>
                <tr>
                  <th>Vehicle No</th>
				  <th>Coordinator/th>
                  <th>DTE</th>
				  <th>Project</th>
				  <th>Driver</th>
				  <th>Date</th>
                  <th disabled>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
   include('../footer.php');
?>

  