<?php
   include('../header.php');
   include('../config.php');
  error_reporting(0);
 ?>
 <script src="../jquery.min.js"></script>  

<?php
  
  $del=$_REQUEST['code'];
  // echo '<script language="javascript">';
  // echo 'alert('.$del.')';
  // echo '</script>';
  $sql="delete from transaction where trans_ID='$del'";

  mysqli_query($db,$sql);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Show All Items at Shops</small>
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
              <h3 class="box-title">Shops Stock</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
				  <th>Type</th>
				  <th>Quantity</th>
                  <th>Price</th>
                  <th>Weight</th>
				  <th>Invoice</th>
					<th>Delivery Date</th>
					
                  <th class="filter-false remove sorter-false uk-text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
               
				   <?php 
							$count=0;
                            $sql="SELECT * FROM transaction where shop_id <>0 ";
							$result=mysqli_query($db,$sql);
							while($rec=mysqli_fetch_array($result)) 
                             { $count =$rec['trans_ID'];
							$sqll="SELECT name,type FROM item where item_ID='".$rec['item_ID']."'";
							$resultt=mysqli_query($db,$sqll);
							$re=mysqli_fetch_array($resultt); 
                   ?> 
				  <tr  align="center">
                  <td><?php echo $re['name'];?></td>
                  <td><?php echo $re['type'];?></td>
                  <td><?php echo $rec['quantity'];?></td>
                  <td ><?php echo $rec['price'];?></td>
					  <td><?php echo $rec['weight'];?></td>
                  <td ><?php echo $rec['invoice'];?></td>
					  <td ><?php echo $rec['date'];?></td>
                  <td>
                  <button name="edit" id="edit" type="submit" class="btn btn-info">
                  <a  href="edit_shop_transaction.php?code=<?php echo $rec['trans_ID'];?>&action=edit" style="color: white">Edit</a>
                  </button>
				  <button name="dware" id="dware<?php echo $count;?>" type="submit" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                  Back to Warehouse</button>
                  <button name="delete" id="delete" type="submit" class="btn btn-danger">
                  <a  href="shop_stock.php?code=<?php echo $rec['trans_ID'];?>" style="color: white">Delete</a>
                  </button>
                  </td>
				  </tr>
				  <?php } ?>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
				  <th>Type</th>
				  <th>Quantity</th>
                  <th>Price</th>
                  <th>Weight</th>
				  <th>Invoice</th>
					<th>Delivery Date</th>
                  <th class="uk-text-center">Actions</th>
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
		<div class="modal modal-success fade" id="modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Success Modal</h4>
              </div>
              <div class="modal-body">
            	<form action="../inventory/add_inv.php" method="post" id="modalbody" name="modalbody">

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <input class="btn btn-outline" type="submit" value="Deliver" name="submit" >
				  </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script type="text/javascript">  
$(document).ready(function() {
  $("button").click(function(e){
    var idClicked = e.target.id;  // dshop17
	 var idClicked1=idClicked.slice(0,5);  //dshop
	  var idClicked2=idClicked.slice(5); // 17
           $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "ware.php", 
		data: {variable: idClicked2},
        dataType: "html",   //expect html to be returned                
        success: function(response){ 
            $("#modalbody").html(response); 
            //alert(response);
        }
    });  
});
});
 </script>  
<?php
   include('../footer.php');
?>

  