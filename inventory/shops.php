<?php
   include('../header.php');
   include('../config.php');

 ?>
<?php
  
  $del=$_REQUEST['code'];
  // echo '<script language="javascript">';
  // echo 'alert('.$del.')';
  // echo '</script>';
  $sql="delete from shop where shop_ID='$del'";

  mysqli_query($db,$sql);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Show All Shops</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href=""><?php echo ucwords(basename($_SERVER['PHP_SELF'],'.php')); ?></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          		  
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Shops</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
				          <th>Location</th>
                  <th>Owner</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th class="filter-false remove sorter-false uk-text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
               
				   <?php 
                          

                            $sql="SELECT * FROM shop ";
							$result=mysqli_query($db,$sql);
							while($rec=mysqli_fetch_array($result)) 
                             {
                   ?> 
				  <tr  align="center">
                  
                  <td><?php echo $rec['Name'];?></td>
                  <td><?php echo $rec['location'];?></td>
                  <td><?php echo $rec['owner'];?></td>
                  <td><?php echo $rec['phone'];?></td>
                  <td><?php echo $rec['email'];?></td>
                  <td>
                  <button name="edit" id="edit" type="submit" class="btn btn-info">
                  <a  href="edit_shop.php?code=<?php echo $rec['shop_ID'];?>&action=edit" style="color: white">Edit</a>
                  </button>
                  <button name="delete" id="delete" type="submit" class="btn btn-danger">
                  <a  href="shops.php?code=<?php echo $rec['shop_ID'];?>" style="color: white">Delete</a>
                  </button>
                  </td>
				  </tr>
				  <?php } ?>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
				          <th>Location</th>
                  <th>Owner</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th class="uk-text-center">Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body --><form action="../export_shops.php" method="post"><input class="btn btn-info" type="submit" id="export" name='export' value="Export to Excel" /></form>
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

  