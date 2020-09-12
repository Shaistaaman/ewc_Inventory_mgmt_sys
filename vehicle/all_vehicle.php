<?php
   include('../header.php');
   include('../config.php');
 if(isset($_GET['action']) && $_GET['action']=='active') 
{
$action = $_GET['action'];
$id=$_REQUEST['id'];
$status='active';
$temp_status='Free';
			$sql="UPDATE vehicle SET status='".$status."',temp_status='".$temp_status."' where veh_no='".$id."'"; 
				   $result=mysqli_query($db,$sql);
					if($result == true)
					{ echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../inventory/starter.php">'; }
 			
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Show All Vehicles</small>
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
                  <th>Status</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               
				   <?php 
                          

                            $sql="SELECT * FROM vehicle";
							$result=mysqli_query($db,$sql);
							while($rec=mysqli_fetch_array($result)) 
                             {
                   ?> 
				  <tr  align="center">
                  <td><img src="<?php echo "pics/".$rec['veh_pic']; ?>" width="100px" height="50px"></td>
                  <td><?php echo $rec['veh_no'];?></td>
                  <td><?php echo $rec['owner'];?></td>
				  <td><?php echo ucwords($rec['basis']);?></td>
				  <td><?php echo $rec['region'];?></td>
				  <td><?php echo ucwords($rec['status']);?></td>
                  <td style="vertical-align:middle">
				   <?php if ($rec['status'] == 'active') {?>
				  <button type="button" class="btn btn-block btn-primary btn-xs">
				  <a  href="add_vehicle.php?action=edit&id=<?php echo $rec['veh_no']; ?>" style="color: white">Close</a></button>
				  <?php } if ($rec['status'] == 'Close') {?>
				  <button type="button" class="btn btn-block btn-warning btn-xs">
				  <a  href="all_vehicle.php?action=active&id=<?php echo $rec['veh_no']; ?>" style="color: white">Re Active</a></button>
				  <?php } ?>
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
                  <th>Status</th>
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

  