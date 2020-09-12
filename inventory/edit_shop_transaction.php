<?php
   include('../header.php');
   include('../config.php');

?>	
 <?php
   
   /*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
   /*    Add all data from form */
if(isset($_POST['submit']) && $_POST['submit'] == 'Edit' )
{								//echo "<script>alert('i am in');</script>";
					$id= $_REQUEST['code'];
					$item=$_POST['item'];
					$quantity=$_POST['quantity'];
					$weight=$_POST['weight'];
					$date=$_POST['date'];
					$invoice=$_POST['invoice'];
					$comments=$_POST['comments'];
					$price=$_POST['price'];
												
				   $sql="update transaction set  item_ID = '".$item."',quantity='".$quantity."',weight='".$weight."',date='".$date."',invoice='".$invoice."',comments='".$comments."',price='".$price."' where trans_ID='".$id."'";
				   
	//print_r($sql);
	$result=mysqli_query($db,$sql);
					if($result == true)
					{ echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../inventory/shop_stock.php">'; }
			
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Edit Shops
      </h1>
      <ol class="breadcrumb">
        <li><a href="inventory/starter.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo basename($_SERVER['PHP_SELF']); ?>"><?php echo ucwords(basename($_SERVER['PHP_SELF'],'.php')); ?></a></li>
      </ol>
    </section>
	<?php
			$id=$_REQUEST['code'];
			$sql0="SELECT * from transaction where trans_ID='".$id."'";
			$result0=mysqli_query($db,$sql0);
			$rec0=mysqli_fetch_array($result0);
	?>
	<?php
			$id=$_REQUEST['code'];
			$sql="SELECT * from shop where shop_ID='".$rec0['shop_ID']."'";
			$result=mysqli_query($db,$sql);
			$rec=mysqli_fetch_array($result);
	?>
    <!-- Main content -->
    <section class="content">

      <div class="row">
       
     
        <div class="col-md-6">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#personal" data-toggle="tab">Details</a></li>
              <!-- <li><a href="#academic" data-toggle="tab">Academic</a></li>
              <li><a href="#professional" data-toggle="tab">Professional</a></li> -->
            </ul>
            <div class="tab-content">
			<div class="active tab-pane" id="personal">
                <form class="form-horizontal"  action=" " >
					<div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="name" name="name" value='<?php echo $rec['Name'];?>' disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="location" class="col-sm-2 control-label">Location</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="location" name="location" value='<?php echo $rec['location'];?>' disabled>
                    </div>
                  </div>
					 <div class="form-group">
                    <label for="owner" class="col-sm-2 control-label">Owner</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="owner" name="owner" value='<?php echo $rec['owner'];?>' disabled>
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="phone" name="phone" value='<?php echo $rec['phone'];?>' disabled>
                    </div>
                  </div>
                  <div class="form-group">
					  <label for="email" class="col-sm-2 control-label">Email</label>
					  <div class="col-sm-10">
					  	
						  <input type="text" class="form-control" id="email" name="email" value='<?php echo $rec['email'];?>' disabled >
						
					  </div>                    
                  </div>
               
                </form>
              
              </div>
              
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
		  		          <div class="col-md-6">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#personal" data-toggle="tab">Transaction Details</a></li>
              <!-- <li><a href="#academic" data-toggle="tab">Academic</a></li>
              <li><a href="#professional" data-toggle="tab">Professional</a></li> -->
            </ul>
			  
            <div class="tab-content">
			<div class="active tab-pane" id="personal">
                <form class="form-horizontal" method="post" action=" " id="addemploye" enctype="multipart/form-data">
					<div class="form-group">
                    <label for="driver" class="col-sm-2 control-label">Item Name</label>

                    <div class="col-sm-10">
                      <select class="form-control select2" id="item" name="item" >
                       	<?php 
                            $sql1="SELECT item_ID,name FROM item ";
							$result1=mysqli_query($db,$sql1);
							while($rec1=mysqli_fetch_array($result1)) 
                             {
						?> 
                      <option <?php if($rec1['item_ID']==$rec0['item_ID']) echo "selected=selected";?> value="<?php echo $rec1['item_ID'];?>"><?php echo $rec1['name'];?></option>
                      <?php } ?>
                    </select>
                    </div>
                  </div>
					<div class="form-group">
                    <label for="quantity" class="col-sm-2 control-label">Quantity</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="quantity" name="quantity" value='<?php echo $rec0['quantity'];?>' >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="weight" class="col-sm-2 control-label">Weight</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="weight" name="weight" value='<?php echo $rec0['weight'];?>' >
                    </div>
                  </div>
					 <div class="form-group">
                    <label for="date" class="col-sm-2 control-label">Date</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="date" name="date" value='<?php echo $rec0['date'];?>' >
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="invoice" class="col-sm-2 control-label">Invoice Number</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="dinvoice" name="dinvoice" value='<?php echo $rec0['invoice'];?>' disabled>
						<input type="hidden" id="invoice" name="invoice" value='<?php echo $rec0['invoice'];?>' >
                    </div>
                  </div>
                  <div class="form-group">
					  <label for="price" class="col-sm-2 control-label">Price</label>
					  <div class="col-sm-10">
					  	
						  <input type="text" class="form-control" id="price" name="price" value='<?php echo $rec0['price'];?>' >
						
					  </div>                    
                  </div>
               <div class="form-group">
					  <label for="comments" class="col-sm-2 control-label">Comments</label>
					  <div class="col-sm-10">
					  	
						  <input type="text" class="form-control" id="comments" name="comments" value='<?php echo $rec0['comments'];?>' >
						
					  </div>                    
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
					<input class="btn btn-danger" type="submit" value="Edit" name="submit" >
                    </div>
                </form>
              </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="academic">
                
               
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="professional">
                
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>

      </div>
      <!-- /.row -->
		</div>
    </section>
    <!-- /.content -->
  </div>
 
<?php
   include('../footer.php');
?>