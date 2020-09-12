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
        <small>Show All Inventory</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="starter.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href=""><?php echo ucwords(basename($_SERVER['PHP_SELF'],'.php')); ?></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          		  
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Equipments</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial / ID</th>
				  <th>Brand / Version</th>
                  <th>Category</th>
                  <th>Status</th>
                  <th>Possession</th>
                </tr>
                </thead>
                <tbody>
               
				   <?php 
                          

                            $sql="SELECT * FROM inventory ";
							$result=mysqli_query($db,$sql);
							while($rec=mysqli_fetch_array($result)) 
                             {
                   ?> 
				  <tr  align="center">
                  <td><?php echo $rec['serial'];?></td>
                  <td><?php echo $rec['brand'];?></td>
                  <td><?php echo $rec['category'];?></td>
                  <td><?php echo $rec['status'];?></td>
                  <td><?php echo $rec['ttcode'];?></td>
				  </tr>
				  <?php } ?>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Serial / ID</th>
				  <th>Brand / Version</th>
                  <th>Category</th>
                  <th>Status</th>
                  <th>Possession</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body --><form action="../equip_export.php" method="post"><input class="btn btn-info" type="submit" id="export" name='export' value="Export to Excel" /></form>
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

  