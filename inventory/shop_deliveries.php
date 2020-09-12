<?php
   include('../header.php');
   include('../config.php');
   
?>
 <script src="../jquery.min.js"></script>  
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Deliver to Shop
            
          </h1>
          <ol class="breadcrumb">
        <li><a href="inventory/starter.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo basename($_SERVER['PHP_SELF']); ?>"><?php echo ucwords(basename($_SERVER['PHP_SELF'],'.php')); ?></a></li>
      </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
          <div class="col-md-8">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Select Shop and Inventory to Deliver</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div><!-- /.box-header -->
        <form  method="post" action=" " id="add_name" name="add_name">
            <div class="box-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Select Shop</label>
                    <select class="form-control select2" id="shop" name="shop" style="width: 100%;">
                      <option selected="selected"></option>
						<?php 
                            $sql1="SELECT shop_ID,Name FROM shop ";
                            $result1=mysqli_query($db,$sql1);
                            while($rec1=mysqli_fetch_array($result1)) 
                             {
						?> 
                      <option value="<?php echo $rec1['shop_ID'];?>"><?php echo $rec1['Name'];?></option>
                      <?php } ?>
                    </select>
                  </div><!-- /.form-group -->
					<?php
					$res=mysqli_query($db,"SELECT max(invoice)+1 as invoice FROM transaction");
							$record=mysqli_fetch_array($res);
					?>
				  </div>
					<div class="col-md-4">
                  <div class="form-group">
					  <label>Invoice Number - Do not Change</label>
                      <input type="text" class="form-control"  value="<?php echo $record['invoice'];?>" disabled>
                      <input type="hidden"  id="invoice" name="invoice" value="<?php echo $record['invoice'];?>" >
                    
				</div>
				  </div>
						<div class="col-md-4">
			    <div class="form-group">
                    <label>Select Date</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" id="date" name="date" value="<?php echo date("d/m/yy"); ?>"class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                    </div><!-- /.input group -->
                  </div>
				  </div>
                </div><!-- /.col -->
				<div class="row">
                <div class="col-md-6">
					<div class="form-group">
						<label>Comments</label>
                      <input type="text" class="form-control" id="comments" name="comments" placeholder="Comments" >
                    
				</div>
                </div><!-- /.col -->
					<div class="col-md-6">
					<div class="form-group">
						<label>Cash / Credit</label>
                      <select class="form-control select2" id="cashcredit" name="cashcredit" >
                       <option selected="selected" value="Cash">Cash</option>
					   <option  value="Credit">Credit</option>
					  </select>
                    
				</div>
                </div>
              </div><!-- /.row -->
            </div><!-- /.box-body -->
            <div class="box-footer" id="dynamic_field" >
				<div class="row text-center">
					<div class="col-md-3"><label >Item</label></div>
					<div class="col-md-2"><label>Weight</label></div>
					<div class="col-md-2"><label>Quantity</label></div>
					<div class="col-md-2"><label>Price</label></div>
				</div>
				<div class="row">
				<div class="col-md-3">
               <div class="form-group">
               <div class="col-md-3"></div>
                    <select class="form-control select2" id="item" name="item[]" >
                       <option selected="selected">Select Item</option>
						<?php 
                            $sql="SELECT distinct item_ID FROM inventory ";
                            $result=mysqli_query($db,$sql);
                            while($rec=mysqli_fetch_array($result)) 
                             {
                              $sqlx="SELECT name FROM item where item_ID='".$rec['item_ID']."'";
                              $resultx=mysqli_query($db,$sqlx);
                              while($recx=mysqli_fetch_array($resultx))
                              {
						?> 
                      <option value="<?php echo $rec['item_ID'];?>"><?php echo $recx['name'];?></option>
                      <?php }} ?>
                    </select>
                  </div><!-- /.form-group -->
				</div>
        
				<div class="col-md-2">
               <div class="form-group">
                      <input type="text" class="form-control" id="weight" name="weight[]" placeholder="Weight" >
                      <div class="col-md-2" id="weightl"></div>
                  </div>
				</div>
				<div class="col-md-2">
               <div class="form-group">
                      <input type="text" class="form-control" id="quantity" name="quantity[]" placeholder="Quantity" >
                      <div class="col-md-2" id="quantityl"></div>
                  </div>
				</div>
				<div class="col-md-2">
               <div class="form-group">
                   <input type="text" class="form-control" id="price" name="price[]" placeholder="Price" >
                   <div class="col-md-2" id="pricel"></div>
                  </div></div>
				
				<div class="col-md-1">
				<button type="button" style="width:60px;" name="add" id="add" class="btn btn-success pull-right">+</button>
				</div>
				<div class="col-md-1">
				 <input type="button" name="submit" id="submit" class="btn btn-info pull-right" value="Submit" /> 
				</div>
				</div>
            </div>
			  </form>
          </div><!-- /.box -->
          </div>
          <div class="col-md-4">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Recent Purchase by Selected Supplier</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
            <thead>
               <tr>
                  <th>Name</th>
				  			  <th>Qty</th>
                 <th>Price</th>
                <th>Date</th>
					       </tr>
                </thead>
                <tbody id="table">
                </tbody>
                </table>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <script type="text/javascript">  
	  
    $(document).ready(function(){  
     
   
         var items="";
         $.getJSON("getitem.php",function(data){
           $.each(data,function(index,item) 
           {
             items+="<option value='"+item.item_ID+"'>"+item.name+"</option>";
           });
           $("#item[]").html(items); 
         });
      
         $('#shop').on('change',function(){ 
          // var shopid=$(this).val();
           //alert($(this).val());
           $.ajax({
            method:"POST",
            url:"getvalues.php",
            data:{id:$(this).val()},
            dataType:"html",
            success:function(data){
              $("#table").html(data);
              }
           });
         }); 
   
        //  $('#item').on('change',function(){ 
        //    var itemid=$(this).val();
        //    $.ajax({
        //         url:"getqty.php",
        //         method:"POST",
        //         data:{id:itemid},
        //         dataType:"JSON",
        //         success:function(data)
        //         {
        //         $('#weightl').text(data.weight);
        //         $('#quantityl').text(data.quantity);
        //        // $('#pricel').text(data.price);
        //         }
        //       });
        //  });

         
        // $('select[id^="item"]').on('change',function(){ 
          $(document).on('change', 'select[id^="item"]', function() {
           var itemid=$(this).val();
          //  alert(itemid);
           var item_number = $(this).attr('id');
           var nu = item_number.slice(4);
          //   var d = $(this).attr('id').match(/item\d+/);
          //   alert(d);
           //alert($(this).attr('id'));
           $.ajax({
                url:"getqty.php",
                method:"POST",
                data:{id:itemid},
                dataType:"JSON",
                success:function(data)
                {
                $('#weightl'+nu).text(data.weight);
                $('#quantityl'+nu).text(data.quantity);
               // $('#pricel').text(data.price);
                }
              });
         });


         var i=1;  
         $('#add').click(function(){  
              i++;  
              $('#dynamic_field').append('<div class="row" id="row'+i+'"><div class="col-md-3"><div class="form-group"><select class="form-control select2" id="item'+i+'" name="item[]" ><option selected="selected">Select Item</option>'+items+'</select></div></div><div class="col-md-2"><div class="form-group"><input type="text" class="form-control" id="weight" name="weight[]" placeholder="Weight" ><div class="col-md-2" id="weightl'+i+'"></div></div></div><div class="col-md-2"><div class="form-group"><input type="text" class="form-control" id="quantity" name="quantity[]" placeholder="Quantity" ><div class="col-md-2" id="quantityl'+i+'"></div></div></div><div class="col-md-2"><div class="form-group"><input type="text" class="form-control" id="price" name="price[]" placeholder="Price" ><div class="col-md-2" id="pricel'+i+'"></div></div></div><div class="col-md-1"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>');  
              $('.select2').select2();
              });  
         $(document).on('click', '.btn_remove', function(){  
              var button_id = $(this).attr("id");   
              $('#row'+button_id+'').remove();  
         });  
         $('#submit').click(function(){            
              $.ajax({  
                   url:"shop_delivery.php",  
                   method:"POST",  
                   data:$('#add_name').serialize(),  
                   success:function(data)  
                   {  
                      // alert(data);
                        alert("Record Added Successfully");  
                        //$('#add_name')[0].reset(); 
                        location.reload(true); 
                   }  
              });  
         });  
    });
   
    </script>   
<?php
   include('../footer.php');
?>
