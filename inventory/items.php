<?php
   include('../header.php');
   include('../config.php');
 ?>
<?php
  
  $del=$_REQUEST['code'];
  // echo '<script language="javascript">';
  // echo 'alert('.$del.')';
  // echo '</script>';
  $sql="delete from item where item_ID='$del'";

  mysqli_query($db,$sql);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Show All Items</small>
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
              <h3 class="box-title">Items</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Arabic Name</th>
				          <th>Type</th>
                  <th>Minimum Level</th>
                  <th>Unit</th>
                  <th class="filter-false remove sorter-false uk-text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
               
				   <?php 
                          

                            $sql="SELECT * FROM item ";
							$result=mysqli_query($db,$sql);
							while($rec=mysqli_fetch_array($result)) 
                             {
                   ?> 
				  <tr  align="center">
                  <td><?php echo $rec['name'];?></td>
                  <td><?php echo $rec['arabic_name'];?></td>
                  <td><?php echo $rec['type'];?></td>
                  <td><?php echo $rec['min_level'];?></td>
                  <td ><?php echo $rec['unit'];?></td>
                  <td>
                  <button name="edit" id="edit" type="submit" class="btn btn-info">
                  <a  href="edit_item.php?code=<?php echo $rec['item_ID'];?>&action=edit" style="color: white">Edit</a>
                  </button>
                  <button name="delete" id="delete" type="submit" class="btn btn-danger">
                  <a  href="items.php?code=<?php echo $rec['item_ID'];?>" style="color: white">Delete</a>
                  </button>
                  </td>
				  </tr>
				  <?php } ?>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Arabic Name</th>
				          <th>Type</th>
                  <th>Minimum Level</th>
                  <th>Unit</th>
                  <th class="uk-text-center">Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body --><form action="../item_export.php" method="post"><input class="btn btn-info" type="submit" id="export" name='export' value="Export to Excel" /></form>
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

  