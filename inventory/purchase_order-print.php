<?php
   
   include('../config.php');
	error_reporting(0);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Purchase Order Print</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="window.print();">
  <div class="wrapper">
	     <!-- Main content -->
	  <?php
	  			$purchase_order= $_REQUEST['purchase_order'];	
	  			$tax= $_POST['tax'];
	  			$shipping= $_POST['shipping'];
	  			$datte= $_POST['datte'];
?>
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
              Purchase Order:<?php echo $purchase_order;?>
				   <?php $date = new DateTime('now', new DateTimeZone('Asia/Riyadh')); ?>
 
                <small class="pull-right">Date: <?php echo $date->format('d-m-Y H:i:s');?></small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
            <address>
                <strong>European World Food Materials</strong><br>
                 Vat: 4675800003 / 3005<br>
                P.O Box: 8249 Dammam: 31482<br>
                Tel: 8374755 / 013<br>
                Fax: 8374766 / 013<br>
                C.R: 2050092017<br>
                Kingdom of Saudia Arabia
              </address>
            </div><!-- /.col -->
           
            
           
            <div class="col-sm-4 invoice-col text-center" >
            <img src="pics/credit/logo.png" alt="logo" ><br>
            <b style="font-size: 30px">فاتورة</b><br>
             
            </div><!-- /.col -->
			<div class="col-sm-4 invoice-col " style="font-size: 15px">
              <!-- From -->
              <address dir="rtl"> 
				  <?php			
						// $sql1="SELECT supp_ID,supp_ID from inventory where purchase_order='".$purchase_order."'";
						// $result1=mysqli_query($db,$sql1);
						// $rec1=mysqli_fetch_array($result1);
				  
					  // 	$sql2="SELECT * from supplier where supp_ID='".$rec1['supp_ID']."'";
						// $result2=mysqli_query($db,$sql2);
						// $rec2=mysqli_fetch_array($result2); ?>
				  
          <strong>العالم أوروبا المواد الغذائية</strong><br>
                درقم الضریبی : ۳۰۰0۱۶۷۵۸۰۰۳ <br>
                ص۔ب: ۸۲۴۹ الدمام ۳۱۴۸۲<br>
                هاتف:۸۳۷۴۷۵۵ / ۰۱۳<br>
                فاكس: ۸۳۷۴۷۶۶ / ۰۱۳<br>
                س۔ ت: ۲۰۵۰۰۹۲۰۱۷<br>
                المملكة العربية السعودية<br>
               
				 
                
              </address>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                  <th>Product</th>
                    <th>Arabic Name</th>
					          <th>Type</th>
					          <th>Qty</th>
                    <th>Weight</th>
                    <th>Cash / Credit</th>
                    <th>Unit Price</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  
					  <?php	
						$totalAmount = "";
						$sql3="SELECT * from inventory where purchase_order='".$purchase_order."'";
						$result3=mysqli_query($db,$sql3);
						while($rec3=mysqli_fetch_array($result3))
						{
						$sql4="SELECT name,arabic_name,type from item where item_ID='".$rec3['item_ID']."'";
						$result4=mysqli_query($db,$sql4);
						$rec4=mysqli_fetch_array($result4);
						?>
					<tr>
                    <td><?php echo $rec4['name'];?></td>
                    <td><?php echo $rec4['arabic_name'];?></td>
					          <td><?php echo $rec4['type'];?></td>
                    <td><?php echo $rec3['quantity'];?></td>
                    <td><?php echo $rec3['weight'];?></td>
                    <td><?php echo $rec3['cashcredit'];?></td>
                    <td><?php echo $rec3['price']/$rec3['quantity'];?></td>
                    <td><?php echo $rec3['price'];?></td>
                  </tr>
                 <?php 
						$totalAmount += $rec3['price'];
					} ?>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
              <p class="lead">Payment Methods:</p>
              <img src="pics/credit/visa.png" alt="Visa">
              <img src="pics/credit/mastercard.png" alt="Mastercard">
              <img src="pics/credit/american-express.png" alt="American Express">
              <img src="pics/credit/paypal2.png" alt="Paypal">
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                Above mentioned payment systems are accepted. Please select anyone and contact to 
				  service provider for details.
              </p>
            </div><!-- /.col -->
            <div class="col-xs-6">
              <div class="table-responsive">
                <table class="table">
					<tr>
                    <th style="width:50%">Subtotal:</th>
                    <td><label class="col-xs-2 control-label">SR</label>
					<div class="col-xs-8"><input type="text" class="form-control" id="stotal" name="stotal" value="<?php echo $totalAmount?>" disabled></div></td>
                  </tr>
					                  
                  <tr>
                    <th>Tax: </th>
                    <td><label class="col-xs-2 control-label">SR</label>
					<div class="col-xs-8"><input type="text" class="form-control" id="tax" name="tax" value="<?php echo $tax?>" oninput="add()"></div></td>
                  </tr>
                  <tr>
                    <th>Shipping:</th>
                    <td><label class="col-xs-2 control-label">SR</label>
					<div class="col-xs-8"><input type="text" class="form-control" id="shipping" name="shipping" value="<?php echo $shipping?>" oninput="add()"></div></td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td><label class="col-xs-2 control-label">SR</label>
					<div class="col-xs-8"><input type="text" class="form-control" id="total" name="total" value="<?php echo $totalAmount?>" disabled></div></td>
                  </tr>
					<tr>
                    <th>Due Date: </th>
                    <td><label class="col-xs-2 control-label"></label>
					<div class="col-xs-8"><input type="text" id="datte" name="datte" value="<?php echo $datte?>" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask></div></td>
                  </tr>
                </table>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
			
          
        </section><!-- /.content -->
        <div class="clearfix"></div>
  </div>

    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
  </body>
</html>
