<?php
   include('../header.php');
   include('../config.php');
   
?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add inventory to Warehouse
            
          </h1>
          <ol class="breadcrumb">
        <li><a href="inventory/starter.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo basename($_SERVER['PHP_SELF']); ?>"><?php echo ucwords(basename($_SERVER['PHP_SELF'],'.php')); ?></a></li>
      </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Select Supplier and Purchase Order</h3>
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
					<?php
					$res=mysqli_query($db,"SELECT max(purchase_order)+1 as po FROM inventory");
							$record=mysqli_fetch_array($res);
					?>
				  </div>
					<div class="col-md-4">
                  <div class="form-group">
					  <label>Purchase Order - Do not Change</label>
                      <input type="text" class="form-control" id="dpurchase_order" name="dpurchase_order" value="<?php echo $record['po'];?>" disabled>
					  <input type="hidden"  id="purchase_order" name="purchase_order" value="<?php echo $record['po'];?>" >
                    
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
            <div class="box-footer" id="dynamic_field">
				<div class="row text-center">
					<div class="col-md-3"><label >Item</label></div>
					<div class="col-md-2"><label>Weight</label></div>
					<div class="col-md-2"><label>Quantity</label></div>
					<div class="col-md-2"><label>Price</label></div>
				</div>
				<div class="row">
				<div class="col-md-3">
               <div class="form-group">
                   
                    <select class="form-control select2" id="item" name="item[]" >
                       <option selected="selected">Select Item</option>
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
								
              

				</div>
				<div class="col-md-2">
               <div class="form-group">
                      <input type="text" class="form-control" id="weight" name="weight[]" placeholder="Weight" >
                  </div>
				</div>
				<div class="col-md-2">
               <div class="form-group">
                      <input type="text" class="form-control" id="quantity" name="quantity[]" placeholder="Quantity" >
                  </div>
				</div>
				<div class="col-md-2">
               <div class="form-group">
                   <input type="text" class="form-control" id="price" name="price[]" placeholder="Price" >
                  </div></div>
				
				<div class="col-md-1">
				<button type="button" name="add" id="add" class="btn btn-success">Add More</button>
				</div>
				<div class="col-md-1">
				 <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" /> 
				</div>
				</div>
            </div>
			  </form>
          </div><!-- /.box -->


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
   
      

      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<div class="row" id="row'+i+'"><div class="col-md-3"><div class="form-group"><select class="form-control select2" id="item" name="item[]" ><option selected="selected">Select Item</option>'+items+'</select></div></div><div class="col-md-2"><div class="form-group"><input type="text" class="form-control" id="weight" name="weight[]" placeholder="Weight" ></div></div><div class="col-md-2"><div class="form-group"><input type="text" class="form-control" id="quantity" name="quantity[]" placeholder="Quantity" ></div></div><div class="col-md-2"><div class="form-group"><input type="text" class="form-control" id="price" name="price[]" placeholder="Price" ></div></div><div class="col-md-1"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>');  
           $('.select2').select2();
           });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){            
           $.ajax({  
                url:"add_inventory.php",  
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
