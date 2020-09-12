<?php
   include('../header.php');
   include('../config.php');

?>	

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Create Employee Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="inventory/starter.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo basename($_SERVER['PHP_SELF']); ?>"><?php echo ucwords(basename($_SERVER['PHP_SELF'],'.php')); ?></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
			
              <div class="form-group">
                    <input type="file" class="dropify" name="empimage" form="addemploye" id="input-file-a" required >
				</div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			
                    <div class="form-group">
                    <strong><i class="fa fa-book margin-r-5"></i> Education</strong>
					<div>
                    <input type="text" class="form-control" id="edu" name="edu" placeholder="Education" form="addemploye" required>
                    </div>
                  </div>

              <hr>

              <div class="form-group">
                    <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
					<div>
                    <input type="text" class="form-control" id="location" name="location" placeholder="Location" form="addemploye"  required>
                    </div>
                  </div>

              <hr>

               <div class="form-group">
                   <strong><i class="fa fa-pencil margin-r-5"></i> Project</strong>
					<div>
                    <input type="text" class="form-control" id="project" name="project" placeholder="Project" form="addemploye"  required>
                    </div>
                  </div>
            
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#personal" data-toggle="tab">Personal</a></li>
              <!-- <li><a href="#academic" data-toggle="tab">Academic</a></li>
              <li><a href="#professional" data-toggle="tab">Professional</a></li> -->
            </ul>
            <div class="tab-content">
			<div class="active tab-pane" id="personal">
                <form class="form-horizontal" method="post" action="addemployee.php" id="addemploye" enctype="multipart/form-data">
					<div class="form-group">
                    <label for="ttcode" class="col-sm-2 control-label">Code</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="ttcode" name="ttcode" placeholder="0000" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name" >
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="password" name="password" placeholder="Password" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="cnic" class="col-sm-2 control-label">Iqma / Passport</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="cnic" name="cnic" placeholder="Iqma / Passport" >
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="designation" class="col-sm-2 control-label">Designation</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="experience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="experience" name="experience" placeholder="Experience"></textarea>
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="doj" class="col-sm-2 control-label">Joining Date</label>

                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="doj" name="doj" placeholder="Joining Date"  required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" >
                    </div>
                  </div>
				   <div class="form-group">
                    <label for="doj" class="col-sm-2 control-label">Job Role</label>

                    <div class="col-sm-10">
				  <select class="form-control select2" name="job_role" style="width: 100%;" required>
                  <option  value="Admin">Admin</option>
                  <option selected="selected" value="Employee">Employee</option>
                 </select>
				 </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
					<input class="btn btn-danger" type="submit" value="Add" name="submit" >
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
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
		</div>
    </section>
    <!-- /.content -->
  </div>
 
<?php
   include('../footer.php');
?>