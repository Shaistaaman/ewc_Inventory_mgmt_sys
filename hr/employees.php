<?php
   include('../header.php');
   include('../config.php');

 ?>
<?php
  
  $del=$_REQUEST['code'];
  // echo '<script language="javascript">';
  // echo 'alert('.$del.')';
  // echo '</script>';
  $sql="delete from employee where ttcode='$del'";

  mysqli_query($db,$sql);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Show All Employees</small>
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
              <h3 class="box-title">Employees</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Picture</th>
				  <th>Code</th>
                  <th>Name</th>
                  <th>Project</th>
                  <th>Phone</th>
                  <th class="filter-false remove sorter-false uk-text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
               
				   <?php 
                          

                            $sql="SELECT * FROM employee ";
							$result=mysqli_query($db,$sql);
							while($rec=mysqli_fetch_array($result)) 
                             {
                   ?> 
				  <tr  align="center">
                  <td><img src="<?php echo "emp_pics/".$rec['emp_pic']; ?>" width="100px" height="50px">
                  <?php if($rec["job_role"] == 'Admin'){?>
                  <br><b><?php echo $rec['job_role'];?></b>
                    <?php } ?>
                  </td>
                  <td><?php echo $rec['ttcode'];?></td>
                  <td><?php echo $rec['name'];?></td>
                  <td><?php echo $rec['project'];?></td>
                  <td><?php echo $rec['phone'];?></td>
                  <td>
                  <button name="edit" id="edit" type="submit" class="btn btn-info">
                  <a  href="edit_employee.php?code=<?php echo $rec['ttcode'];?>&action=edit" style="color: white">Edit</a>
                  </button>
                  <button name="delete" id="delete" type="submit" class="btn btn-danger">
                  <a  href="employees.php?code=<?php echo $rec['ttcode'];?>" style="color: white">Delete</a>
                  </button>
                  </td>
				  </tr>
				  <?php } ?>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Picture</th>
				          <th>Code</th>
                  <th>Name</th>
                  <th>Project</th>
                  <th>Phone</th>
                  <th class="uk-text-center">Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body --><form action="../export.php" method="post"><input class="btn btn-info" type="submit" id="export" name='export' value="Export to Excel" /></form>
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

  