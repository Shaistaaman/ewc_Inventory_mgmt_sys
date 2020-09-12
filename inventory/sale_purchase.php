<?php
   include('../header.php');
   include('../config.php');
error_reporting(0);

?>	

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->		  
        <section class="content-header">
			
	     
          <ol class="breadcrumb">
            <li><a href="starter.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href=""><?php echo ucwords(basename($_SERVER['PHP_SELF'],'.php')); ?></a></li>
      		</ol>
		<div class="row">
         <div class="col-md-6">	
		 <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Select choices for Purchase and press Go</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div><!-- /.box-header -->
			
			 <div class="box-body">
				  <form  method="post" action=" " >
              <div class="row">
                <div class="col-md-6">
                 <div class="form-group">
                    <label>Select Date</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" id="date1" name="date1" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                    </div><!-- /.input group -->
                  </div>
                  <div class="form-group">
                    <label>Select Item</label>
                    <select class="form-control select2" id="item1" name="item1" style="width: 100%;">
                       <option selected="selected"></option>
						<?php 
                            $sql="SELECT item_ID,name FROM item ";
							$result=mysqli_query($db,$sql);
							while($rec=mysqli_fetch_array($result)) 
                             {
						?> 
                      <option value="<?php echo $rec['item_ID'];?>"><?php echo $rec['name'];?></option>
                      <?php } ?>
                    </select>
                  </div><!-- /.form-group -->
                </div><!-- /.col -->
				     <div class="col-md-6">
                  <div class="form-group">
                    <label>Select Supplier</label>
                    <select class="form-control select2" id="supplier" name="supplier" style="width: 100%;">
                      <option selected="selected"></option>
						<?php 
                            $sql1="SELECT supp_ID,Name FROM supplier ";
							$result1=mysqli_query($db,$sql1);
							while($rec1=mysqli_fetch_array($result1)) 
                             {
						?> 
                      <option value="<?php echo $rec1['supp_ID'];?>"><?php echo $rec1['Name'];?></option>
                      <?php } ?>
                    </select>
                  </div><!-- /.form-group -->
                  <div class="form-group">
					 
					 <input class="btn btn-info pull-right" type="submit" value="Go" name="submit" style="margin-top: 94px;">	
					
				  </div><!-- /.form-group -->
                </div><!-- /.col -->
				 </div></div><!-- /.box-body -->	
				 </form>
			</div>
			</div><!-- md 6 column-->
			
         <div class="col-md-6">	
		 <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Select choices for Sales and press Go</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div><!-- /.box-header -->
			
			 <div class="box-body">
				  <form  method="post" action="sale_purchase.php" >
              <div class="row">
                <div class="col-md-6">
                 <div class="form-group">
                    <label>Select Date</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" id="date" name="date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                    </div><!-- /.input group -->
                  </div>
                  <div class="form-group">
                    <label>Select Item</label>
                    <select class="form-control select2" id="item1" name="item1" style="width: 100%;">
                       <option selected="selected"></option>
						<?php 
                            $sql="SELECT item_ID,name FROM item ";
							$result=mysqli_query($db,$sql);
							while($rec=mysqli_fetch_array($result)) 
                             {
						?> 
                      <option value="<?php echo $rec['item_ID'];?>"><?php echo $rec['name'];?></option>
                      <?php } ?>
                    </select>
                  </div><!-- /.form-group -->
                </div><!-- /.col -->
				     <div class="col-md-6">
                  <div class="form-group">
                    <label>Select Vehicle</label>
                    <select class="form-control select2" id="vehicle" name="vehicle" style="width: 100%;">
                      <option selected="selected"></option>
						<?php 
                            $sql2="SELECT vehicle_ID,veh_num FROM vehicle ";
							$result2=mysqli_query($db,$sql2);
							while($rec2=mysqli_fetch_array($result2)) 
                             {
						?> 
                      <option value="<?php echo $rec2['vehicle_ID'];?>"><?php echo $rec2['veh_num'];?></option>
                      <?php } ?>
                    </select>
                  </div><!-- /.form-group -->
                 
                
                  <div class="form-group">
                    <label>Select Shop</label>
                    <select class="form-control select2" id="shop" name="shop" style="width: 100%;">
                      <option selected="selected"></option>
						<?php 
                            $sql3="SELECT shop_ID,Name FROM shop ";
							$result3=mysqli_query($db,$sql3);
							while($rec3=mysqli_fetch_array($result3)) 
                             {
						?> 
                      <option value="<?php echo $rec3['shop_ID'];?>"><?php echo $rec3['Name'];?></option>
                      <?php } ?>
                    </select>
                  </div><!-- /.form-group -->
                 <div class="form-group">
					 
					 <input class="btn btn-info pull-right" type="submit" value="Go" name="submit" style="margin-top: 20px;">	
					
				  </div><!-- /.form-group -->
              </div><!-- /.row -->
					  </div></div><!-- /.box-body -->	
				 </form>
			</div>
			</div><!-- md 6 column-->
			</div><!-- row-->
        </section>
		  
		  
		<?php
  
		if(isset($_REQUEST['item']) || isset($_REQUEST['supplier']) || isset($_REQUEST['date1']) )
		{
							$item= $_REQUEST['item1'];
							$supplier= $_REQUEST['supplier'];
							$date1= $_REQUEST['date1'];
							$res=mysqli_query($db,"SELECT name,type FROM item where item_ID='".$item."'");
							$record=mysqli_fetch_array($res);
							$resu=mysqli_query($db,"SELECT Name FROM supplier where supp_ID='".$supplier."'");
							$reco=mysqli_fetch_array($resu);
		?>

         <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Item : <?php echo $record['name']; ?> <br>Purchase Details for Warehouse on Date: <?php echo $date1; ?> <br>From Supplier : <?php echo $reco['Name']; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Item Name</th>
				  <th>Item Type</th>
                  <th>Quantity</th>
                  <th>Price</th>
				  	
                </tr>
                </thead>
                <tbody>
               <?php
			unset($sql);
			unset($sqll);
			if ($item) {
    		$sql[] = " item_ID='".$item."' ";
			$sqll[] = " item_ID='".$item."' ";
						}
			if ($supplier) {
				$sqll[] = " supp_ID='".$supplier."'";
								}
			if ($date1) {
			$sqll[] = " shipped_date='".$date1."'";
								}


				?>
				   <?php 
                            
							$queryl="SELECT item_ID,quantity,price FROM inventory";
								if (!empty($sqll)) {
							$queryl .= ' WHERE ' . implode(' AND ', $sqll);
												}
							$resultt=mysqli_query($db,$queryl);
							while($recc=mysqli_fetch_array($resultt)){
							
                             
                   ?> 
				  <tr  align="center">
					  <?php
						$ress=mysqli_query($db,"SELECT name,type FROM item where item_ID='".$recc['item_ID']."'");
						$recor=mysqli_fetch_array($ress);	
								?>
                  <td><?php echo $recor['name'];?></td>
                  <td><?php echo $recor['type'];?></td>
                  <td><?php echo $recc['quantity'];?></td>
                  <td ><?php echo $recc['price'];?></td>
				  </tr>
				  <?php } ?>
                
                </tbody>
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
		<?php } 
  
		else if(isset($_REQUEST['item1']) || isset($_REQUEST['vehicle']) || isset($_REQUEST['date']) || isset($_REQUEST['shop']))
		{
							$item1= $_REQUEST['item1'];
							$vehicle= $_REQUEST['vehicle'];
							$shop= $_REQUEST['shop'];
							$date= $_REQUEST['date'];
							$res1=mysqli_query($db,"SELECT name FROM item where item_ID='".$item1."'");
							$record1=mysqli_fetch_array($res1);
							$resu1=mysqli_query($db,"SELECT driver FROM vehicle where vehicle_ID='".$vehicle."'");
							$reco1=mysqli_fetch_array($resu1);
							$resul1=mysqli_query($db,"SELECT owner FROM shop where shop_ID='".$shop."'");
							$re1=mysqli_fetch_array($resul1);

//			 echo '<script language="javascript">';
//   echo 'alert('.$product.')';
//   echo '</script>';
		?>

         <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
				 
              <h3 class="box-title">Item : <?php echo $record1['name']; ?> <br>Sale Details for Shop : <?php echo $re1['owner']; ?><br>Vehicle: <?php echo $reco1['driver']; ?> <br>on Date: <?php echo $date; ?> </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Item Name</th>
				  <th>Item Type</th>
                  <th>Quantity</th>
                  <th>Price</th>
				  <th>Vehicle</th>
                  <th>Shop</th>
				  	
                </tr>
                </thead>
                <tbody>
					
					<?php
			unset($sqle);
			unset($sqlle);
			if ($item1) {
    		$sqle[] = " item_ID='".$item1."' ";
			$sqlle[] = " item_ID='".$item1."' ";
						}
			if ($vehicle) {
				$sqlle[] = " vehicle_ID='".$vehicle."'";
								}
			if ($shop) {
				$sqlle[] = " shop_ID='".$shop."'";
								}
			if ($date) {
			$sqlle[] = " date='".$date."'";
								}
				?>
				   <?php 

							$queryle="SELECT item_ID,quantity,price, vehicle_ID,shop_ID FROM transaction";
								if (!empty($sqlle)) {
							$queryle .= ' WHERE ' . implode(' AND ', $sqlle);
												}
			//print_r($queryle);
							$resultte=mysqli_query($db,$queryle);
							while($recce=mysqli_fetch_array($resultte)){
								//echo "<script>alert(".mysqli_error($db).");</script>";
                   ?> 
					  <?php 
			?>
				  <tr  align="center">
					  <?php
						$resse=mysqli_query($db,"SELECT name,type FROM item where item_ID='".$recce['item_ID']."'");
						$recore=mysqli_fetch_array($resse);	
								?>
                  <td><?php echo $recore['name'];?></td>
                  <td><?php echo $recore['type'];?></td>
                  <td><?php echo $recce['quantity'];?></td>
                  <td ><?php echo $recce['price'];?></td>
              <?php  $nresu1=mysqli_query($db,"SELECT driver FROM vehicle where vehicle_ID='".$recce['vehicle_ID']."'");
							$nreco1=mysqli_fetch_array($nresu1);
							$nresul1=mysqli_query($db,"SELECT owner FROM shop where shop_ID='".$recce['shop_ID']."'");
              $nre1=mysqli_fetch_array($nresul1);
              ?>
					  <td ><?php if($recce['vehicle_ID'] != 0) echo $nreco1['driver']  ;?></td>
					  <td ><?php if($recce['shop_ID'] != 0)echo $nre1['owner'];?></td>
				  </tr>
				  <?php } ?>
                
                </tbody>
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
		<?php mysqli_close($db);
		} ?>	 
      </div><!-- /.content-wrapper -->
			</div>	 <!-- /.col-md-6 -->
      <?php
   include('../footer.php');
 
?>