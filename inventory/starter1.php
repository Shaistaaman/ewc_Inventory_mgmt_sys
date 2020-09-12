<?php
   include('../header.php');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="starter.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="profile.php"><?php echo ucwords(basename($_SERVER['PHP_SELF'],'.php')); ?></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../hr/emp_pics/<?php echo $_SESSION["emp_pic"]; ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $_SESSION["name"];?></h3>

              <p class="text-muted text-center"><?php echo $_SESSION["designation"];?></p>

            <!--  <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
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
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                <?php echo $_SESSION["edu"];?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"><?php echo $_SESSION["location"];?></p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Project</strong>

              <p>
                <span class="label label-danger"><?php echo $_SESSION["project"];?></span>
                
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p><?php echo $_SESSION["notes"];?></p>
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
              <li><a href="#academic" data-toggle="tab">Academic</a></li>
              <li><a href="#professional" data-toggle="tab">Professional</a></li>
            </ul>
            <div class="tab-content">
			<div class="active tab-pane" id="personal">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="name" placeholder="Name" value="<?php echo $_SESSION["name"];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" placeholder="Email" value="<?php echo $_SESSION["email"];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="cnic" class="col-sm-2 control-label">CNIC</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="cnic" placeholder="CNIC" value="<?php echo $_SESSION["cnic"];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="experience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="experience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="phone" placeholder="Phone" value="<?php echo $_SESSION["phone"];?>">
                    </div>
                  </div>
                  <!--<div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>-->
                  <!--<div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>-->
                </form>
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

    </section>
    <!-- /.content -->
  </div>
<?php
   include('../footer.php');
?>