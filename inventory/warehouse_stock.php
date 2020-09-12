<?php
   include('../header.php');
   include('../config.php');
error_reporting(0);
 ?>
<?php
  
  $del=$_REQUEST['code'];
  // echo '<script language="javascript">';
  // echo 'alert('.$del.')';
  // echo '</script>';
  $sql="delete from inventory where inv_ID='$del'";

  mysqli_query($db,$sql);
?>
 <script src="../jquery.min.js"></script>  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Show All Items at Warehouse</small>
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
              <h3 class="box-title">Warehouse Stock</h3>
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
				  <th>Purchase Order</th>
			      <th>Purchase Date</th>
					<th>Cash / Credit</th>
                  <th class="filter-false remove sorter-false uk-text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
               
				   <?php 
							$count=0;
                            $sql="SELECT * FROM inventory ";
							$result=mysqli_query($db,$sql);
							while($rec=mysqli_fetch_array($result)) 
                             { $count =$rec['inv_ID'];
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
                  <td ><?php echo $rec['purchase_order'];?></td>
				  <td ><?php echo $rec['shipped_date'];?></td>
				  <td ><?php echo $rec['cashcredit'];?></td>
                  
       			 <td ><button name="edit" id="edit" type="submit" class="btn btn-info">
                  <a  href="edit_warehouse_transaction.php?code=<?php echo $rec['inv_ID'];?>&action=edit" style="color: white">Edit</a>
                  </button>
				  <button name="dshop" id="dshop<?php echo $count;?>" type="submit" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">
                  Deliver to Shop</button>
				  <button name="dvehicle" id="dvehicle<?php echo $count;?>" type="submit" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                  Deliver to Vehicle</button>
                  <button name="delete" id="delete" type="submit" class="btn btn-danger">
                  <a  href="warehouse_stock.php?code=<?php echo $rec['inv_ID'];?>" style="color: white">Delete</a>
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
                  <th>Purchase Order</th>
                  <th>Purchase Date</th>
                  <th>Cash / Credit</th>
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
		 <!-- /.modal -->

        <div class="modal modal-warning fade" id="modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Deliver to Shop</h4>
              </div>
              <div class="modal-body" >
                <form action="../inventory/add_trans.php" method="post" id="modalbody" name="modalbody">
				
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				 <input class="btn btn-outline" type="submit" value="Deliver" name="submit" >
               
              </div>
				  </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div class="modal modal-success fade" id="modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Deliver to Vehicle</h4>
              </div>
              <div class="modal-body">
               <form action="../inventory/add_trans.php?code=green" method="post" id="modalbodygreen" name="modalbodygreen">
				
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
	 
	  if (idClicked1 == 'dshop') {
           $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "display.php", 
		data: {variable: idClicked2},
        dataType: "html",   //expect html to be returned                
        success: function(response){ 
            $("#modalbody").html(response); 
            //alert(response);
        }

    });  
       }
	  else if (idClicked1 == 'dvehi') { 
		  idClicked2=idClicked.slice(8);
		   $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "displaygreen.php", 
		data: {variable: idClicked2},
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#modalbodygreen").html(response); 
            //alert(response);
        }

    });
	  }
});
	 
});
 </script>  
<?php
   include('../footer.php');
?>

  