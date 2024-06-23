<?php
 include("includes/Connection.php");
if (!empty($_GET["TID"])) {
    $Tid = $_GET["TID"];
	
    $res = mysqli_query($con, "select * from tasks where id='$Tid'");
	
    $r = mysqli_fetch_row($res);
    $title = $r[1];
    $description = $r[2];
    $due_date = $r[3];
    $priority = $r[4];
   
}

if (isset($_POST['btnupd'])) {
    $t = $_POST['title'];
     $d = $_POST['description'];
    $d_d = $_POST['t_date'];
 	$p = $_POST['priority'];
    $up = mysqli_query($con, "Update tasks set task_title='$t',task_description='$d',due_date='$d_d',priority='$p' where id='$Tid'");
    if ($up) {
        header("location:inbox.php");
    } else {
        echo(mysqli_error($con));
    }
}

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Personal Todo taks Manager</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<style>
	
	/* styles.css */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: #fff;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50%;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

.close {
    float: right;
    font-size: 20px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover {
    color: red;
}

	
	
	</style>
	
	</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php include("includes/sidepanel.php")?>
  <!-- Content Wrapper. Contains page content -->
<!--  . Contains page content-->
  <div class="content-wrapper">
    <!-- Content Header (Page header) --><br>
    <!-- Content Header (Page header) --><br>
    <!-- Content Header (Page header) --><br>
    <div class="row">
	  <div class="col-lg-2"></div>
	  <div class="col-lg-8">
		<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Update Task</h3>
				  
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" >
                <div class="card-body">
					
                  <div class="form-group">
                    <label for="exampleInputEmail1">Task title</label>
                    <input type="text" class="form-control" id="efirstname" placeholder="Enter Task title" name="title" value="<?php echo $title?>" required >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Desciption</label>
                    <input type="text" class="form-control" id="efirstname" placeholder="Enter Task Description" value="<?php echo $description?>"  name="description">
                  </div>
                 <div class="row">
                  <div class="col-4">
						<label for="exampleInputPassword1">Due Date</label>
                    <input type="date" class="form-control" placeholder=".col-3" name="t_date" value="<?php echo $due_date?>" required>
                  </div>
                  <div class="col-4">
				 
                        <label>Select Priority</label>
                        <select class="form-control" name="priority">
						
                          <option  selected> <?php echo $priority?></option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option> 4</option>
                          <option>5</option>
                        </select>
                        
                  </div>
                  
                </div>
                 
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-warning" name="btnupd">update</button>
                </div>
              </form>
            </div>
		
		</div>
	  <div class="col-lg-2"></div>
	  
	  </div>
	  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
	<script type="text/javascript">
	// script.js
const openModalBtn = document.getElementById('openModalBtn');
const modal = document.getElementById('myModal');
const closeModal = document.getElementsByClassName('close')[0];

openModalBtn.addEventListener('click', function() {
    modal.style.display = 'block';
});

closeModal.addEventListener('click', function() {
    modal.style.display = 'none';
});

window.addEventListener('click', function(event) {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});

	
	</script>
</body>
</html>
