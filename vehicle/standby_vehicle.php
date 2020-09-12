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
                  <th>Picture</th>
				  <th>Vehicle No</th>
                  <th>Owner</th>
				  <th>Monthly/Daily</th>
				  <th>Region</th>
                  <th disabled>Action</th>
                </tr>
                </thead>
                <tbody>
               
				   <?php 
                          

                            $sql="SELECT * FROM vehicle where status = 'active' and temp_status='free'";
							$result=mysqli_query($db,$sql);
							while($rec=mysqli_fetch_array($result)) 
                             {
                   ?> 
				  <tr  align="center">
                  <td><img src="<?php echo "pics/".$rec['veh_pic']; ?>" width="100px" height="50px"></td>
                  <td><?php echo $rec['veh_no'];?></td>
                  <td><?php echo $rec['owner'];?></td>
				  <td><?php echo $rec['basis'];?></td>
				   <td><?php echo $rec['region'];?></td>
                  <td style="vertical-align:middle">
				  
				  <button type="button" class="btn btn-block btn-info btn-xs">
				  <a  href="book_vehicle.php?action=book&id=<?php echo $rec['veh_no']; ?>" style="color: white">Book</a></button>
				  
				 </td>
				 <?php } ?>
				  </tr>
				                  
                </tbody>
                <tfoot>
                <tr>
                  <th>Picture</th>
				  <th>Vehicle No</th>
                  <th>Owner</th>
				  <th>Monthly/Daily</th>
				  <th>Region</th>
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

  