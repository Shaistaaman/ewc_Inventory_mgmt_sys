<?php
   include('../header.php');
   include('../config.php');
// Turn off all error reporting
error_reporting(0);

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
        <small>Show Low Items</small>
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
				          <th>Type</th>
                  <th>Minimum Level</th>
                  <th>Received Quantity</th>
                  <th>Delivered Quantity</th>
                  <th>Remaining Stock</th>
					
                  <th class="filter-false remove sorter-false uk-text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
               
				   <?php 
                          

                            $sql="SELECT * FROM item ";
							$result=mysqli_query($db,$sql);
							while($rec=mysqli_fetch_array($result)) 
                             {
								$sql1="SELECT totalstock FROM item where item_ID = ".$rec['item_ID']." ";
								$result1=mysqli_query($db,$sql1);
								$rec1=mysqli_fetch_array($result1)
									
								
                   ?> 
				  <tr  align="center">
                  <td><?php echo $rec['name'];?></td>
                  <td><?php echo $rec['type'];?></td>
                  <td><?php echo $rec['min_level'];?></td>
                  <td ><?php if ($rec1['totalstock'] != NULL) echo $rec1['totalstock']; else echo "0";?></td>
					 <?php  $sql2="SELECT item_ID, Sum(Quantity) AS dqty FROM transaction where item_ID = ".$rec['item_ID']." GROUP BY item_ID";
								$result2=mysqli_query($db,$sql2);
								$rec2=mysqli_fetch_array($result2)
									?>
				  <td ><?php if ($rec2['dqty'] != NULL) echo $rec2['dqty']; else echo "0";?></td>
				  <?php $remaining = $rec1['totalstock']-$rec2['dqty'];?>
				  <td ><?php echo $remaining;?></td>
				  <td><?php if ($remaining <=  $rec['min_level']){ ?>
				  <button type="submit" class="btn btn-danger"> <?php echo "Reorder"; ?> </button>
					 <?php }else {?>
				  <button type="submit" class="btn btn-success"><?php echo "Sufficient"; }?></button>
					  </td>
				
                  
				  </tr>
				  <?php } ?>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
				  <th>Type</th>
                  <th>Minimum Level</th>
                  <th>Received Quantity</th>
					<th>Delivered Quantity</th>
					<th>Remaining Stock</th>
                  <th class="uk-text-center">Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
<!--			  <form action="../stock_level.php" method="post"><input class="btn btn-info" type="submit" id="export" name='export' value="Export to Excel" /></form>-->
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

  