<?php
   include('../header.php');
   include('../config.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
				  <?php
			
			$sql="SELECT count(distinct purchase_order) as count from inventory";
			$result=mysqli_query($db,$sql);
			$rec=mysqli_fetch_array($result);
	?>
                <h3><?php echo $rec['count'];?></h3>

                <p>Purchase Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="purchase_orders.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
          </div>
			<!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
				  <?php
			
			$sql="SELECT count(distinct invoice) as count from transaction";
			$result=mysqli_query($db,$sql);
			$rec=mysqli_fetch_array($result);
	?>
                <h3><?php echo $rec['count'];?></h3>

                <p>Invoices</p>
              </div>
              <div class="icon">
                <i class="ion-ios-list-outline"></i>
              </div>
              <a href="invoices.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?php echo date("F");?></h3>

                <p>Sale/Purchase</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="sale_purchase.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
          </div>
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>Low</h3>

                <p>Stock Level</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="stocklevel.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
                <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
				  
                <h3>Add</h3>

                <p>Inventory</p>
              </div>
              <div class="icon">
                <i class="ion ion-plus"></i>
              </div>
              <a href="add_inventory_warehouse.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
          </div>
			<!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-maroon">
              <div class="inner">
				  
                <h3>Warehouse</h3>

                <p>Stock</p>
              </div>
              <div class="icon">
                <i class=" ion ion-android-globe"></i>
              </div>
              <a href="warehouse_stock.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-navy">
              <div class="inner">
                <h3>Shop</h3>

                <p>Stock</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-albums"></i>
              </div>
              <a href="shop_stock.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
          </div>
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-teal">
              <div class="inner">
                <h3>Vehicle</h3>

                <p>Stock</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-car"></i>
              </div>
              <a href="vehicle_stock.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <!-- /.row (main row) -->
		          <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-olive">
              <div class="inner">
				  <?php
			
			$sql="SELECT count(distinct purchase_order) as count from inventory";
			$result=mysqli_query($db,$sql);
			$rec=mysqli_fetch_array($result);
	?>
                <h3>Deliver</h3>

                <p>To Shop</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-share"></i>
              </div>
              <a href="shop_deliveries.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
          </div>
			<!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-orange">
              <div class="inner">
				  <?php
			
			$sql="SELECT count(distinct invoice) as count from transaction";
			$result=mysqli_query($db,$sql);
			$rec=mysqli_fetch_array($result);
	?>
                <h3>Deliver</h3>

                <p>To Vehicle</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-share"></i>
              </div>
              <a href="vehicle_deliveries.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --><?php
   include('../footer.php');
?>