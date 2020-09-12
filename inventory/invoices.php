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
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="invoices.php"><?php echo ucwords(basename($_SERVER['PHP_SELF'],'.php')); ?></a></li>
      		</ol>
			
		 <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Select Invoice number and press Go</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div><!-- /.box-header -->
			 
            <div class="box-body">
				<form class="form-horizontal" method="post" action=" " >
             	<div class="form-group">
                <div class="col-md-6">
                 
                   
                    <select class="form-control select2" name="invoice" id="invoice" style="width: 100%;">
                      <option selected="selected">Select</option>
						<?php			
						$sql="SELECT distinct invoice from transaction";
						$result=mysqli_query($db,$sql);
						while($rec=mysqli_fetch_array($result))
						{
						
						?>
                      <option value="<?php echo $rec['invoice']; ?>"><?php echo $rec['invoice']; ?></option>
                      <?php } ?>
                    </select>
                  
              
                </div><!-- /.col -->
				<div class="col-md-3">
				  <input class="btn btn-info" type="submit" value="Go" name="submit" >
					  </div>
              	</div><!-- /.form-group -->
					</form
            </div><!-- /.box-body -->
           
          </div><!-- /.box -->			
        </section>
		  
		  
		<?php
  
		if(isset($_REQUEST['invoice']) )
		{
							$invoice= $_REQUEST['invoice'];				
		?>

        <!-- Main content -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
              Invoice Number:<?php echo $invoice;?>
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
           
            <div class="col-sm-4 invoice-col text-center">
            <img src="pics/credit/logo.png" alt="logo" ><br>
            <b style="font-size: 30px">فاتورة</b><br>
              <br>
<!--
              <b>Order ID:</b> 4F3S8J<br>
              <b>Payment Due:</b> 2/22/2014<br>
              <b>Account:</b> 968-34567
-->
            </div><!-- /.col -->
			<div class="col-sm-4 invoice-col">
      <address dir="rtl"> 
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
						$sql3="SELECT * from transaction where invoice='".$invoice."'";
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
				  <form  method="post" action="invoice-print.php?invoice=<?php echo $invoice;?>" target="_blank">
                <table class="table">
					<tr>
                    <th style="width:50%">Subtotal:</th>
                    <td><label class="col-xs-2 control-label">SR</label>
					<div class="col-xs-8"><input type="text" class="form-control" id="stotal" name="stotal" value="<?php echo $totalAmount?>" disabled></div></td>
                  </tr>
					                  
                  <tr>
                    <th>VAT: </th>
                    <td><label class="col-xs-2 control-label">SR</label>
					<div class="col-xs-8"><input type="text" class="form-control" id="tax" name="tax" value="0" oninput="add()"></div></td>
                  </tr>
                  <tr>
                    <th>Shipping:</th>
                    <td><label class="col-xs-2 control-label">SR</label>
					<div class="col-xs-8"><input type="text" class="form-control" id="shipping" name="shipping" value="0" oninput="add()"></div></td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td><label class="col-xs-2 control-label">SR</label>
					<div class="col-xs-8"><input type="text" class="form-control" id="total" name="total" value="<?php echo $totalAmount?>" disabled></div></td>
                  </tr>
					<tr>
                    <th>Due Date: </th>
                    <td><label class="col-xs-2 control-label"></label>
					<div class="col-xs-8"><input type="text" id="datte" name="datte" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask></div></td>
                  </tr>
					  </table>
					  <input class="btn btn-primary" type="submit" value="Print" name="submit" >
				  
				  </form>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
			
          
        </section><!-- /.content -->
		<?php } ?>	 
        <div class="clearfix"></div>
      </div><!-- /.content-wrapper -->
			<script>
			function add() {
			  var x = Number(document.getElementById("tax").value) + Number(document.getElementById("shipping").value) + Number(document.getElementById("stotal").value);
			  document.getElementById("total").value =  x;
			}
			</script>
      <?php
   include('../footer.php');
 
?>