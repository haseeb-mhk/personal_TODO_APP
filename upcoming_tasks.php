<?php
 include("includes/Connection.php");
$status2= 'false';
$status = "true";
if (isset($_POST["btnAdd"])) {
    $title = $_POST['title'];
      $description = $_POST['description'];
    $d_date = $_POST['t_date'];
 	$priority = $_POST['priority'];
    $res = mysqli_query($con, "insert into tasks(task_title,task_description,due_date,priority,status) values('$title','$description','$d_date','$priority','$status2')");
    if ($res) {

		header("location:upcoming_tasks.php");
		
    } else {
        echo("<script> alert('not inserted')</script>");
    }
}
//Reading
$t_date = date("y-m-d");
//echo $t_date;
$status2= 'false';
$select = mysqli_query($con, "select * from tasks where due_date>'$t_date'and status='$status2' order by priority");

if (!empty($_GET["DID"])) {
    $Did = $_GET["DID"];
    $check = mysqli_query($con, "delete from tasks where id='$Did'");
    if ($check) {
	header("location:upcoming_tasks.php");
    } else {
        echo(mysqli_error($con));
    }
}

if (!empty($_GET["SID"])) {
    $Sid = $_GET["SID"];
	$status = "true";
     $up = mysqli_query($con, "Update tasks set status='$status' where id='$Sid'");
    if ($up) {
        header("location:upcoming_tasks.php");
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
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php include("includes/sidepanel.php")?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark" ><span style="font-weight: bold;font-size: 40px">Upcoming</span> <span><sub><?php
// Return current date from the remote server
$currentDate = date("D, d M Y");
echo $currentDate;
?></sub></span></h1><br>
			  <div class="row">
	  <div class="col-sm-4"><a href="#my-modal" class="btn btn-block btn-outline-success btn-md" data-toggle="modal">&#43; Add Task</a>
		
<!--
		  <button type="button" class="btn btn-block btn-outline-danger btn-md" ><a href="#" data-toggle="modal" style="text-decoration:inherit;">&#43; Add Task</a></button>
			
-->
				 </div>
	  </div>
		
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inbox.php">inbox</a> </li>
              <li class="breadcrumb-item active">upcoming</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
	
	         
	         <div id="my-modal" aria-hidden="true" aria-labelledby="myLargeModalLabel" class="modal fade bd-example-modal-lg" role="dialog" tabindex="-1">
  						<div class="modal-dialog modal-lg">
    							<div class="modal-content">
									
									<div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Add New Task</h3>
				  
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" >
                <div class="card-body">
					
                  <div class="form-group">
                    <label for="exampleInputEmail1">Task title</label>
                    <input type="text" class="form-control" id="efirstname" placeholder="Enter Task title" name="title" value="" required >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Desciption</label>
                    <input type="text" class="form-control" id="efirstname" placeholder="Enter Task Description" name="description">
                  </div>
                 <div class="row">
                  <div class="col-4">
						<label for="exampleInputPassword1">Due Date</label>
                    <input type="date" class="form-control" placeholder=".col-3" name="t_date" required>
                  </div>
                  <div class="col-4">
				 
                        <label>Select Priority</label>
                        <select class="form-control" name="priority">
						
                          <option selected>Select</option>
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
                  <button type="submit" class="btn btn-success" name="btnAdd">ADD</button>
                </div>
              </form>
            </div>
									
   									 </div>
  										</div>
					
	  </div>
	  
	  <div class="container">
	  <div class="row">
		  <?php while ($row = mysqli_fetch_array($select)) { 
		
		  ?>
		  
	  <div class="col-md-4">
		  <div class="card card-outline card-success collapsed-card">
              <div class="card-header">
                <h3 class="card-title" style="font-weight: bold">
					 <a href="upcoming_tasks.php?SID=<?php echo $row['id'];?>" class="btn btn-tool" name="status" value=""> 
					<i class="fa fa-check-circle"></i>
					</a> <?php echo $row['task_title']; ?></h3>
<!--					  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>-->
	
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
					<a href="update_task.php?TID=<?php echo $row['id']?>" class="btn btn-tool" >
					<i class="fas fa-edit" style="color: #17a2b8" ></i>
                  </a>
					<a href="upcoming_tasks.php?DID=<?php echo $row['id']?>" class="btn btn-tool" ><i class="fa fa-trash" style="color:red"></i>
                  </a>
					
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
				 
                <p> <label> Description:</label>  <?php echo $row["task_description"]; ?></p>
				  <span><label>priority: </label>  <span style="color: red"><?php echo $row["priority"]; ?></span></span>
				  <span style="margin-left: 90px"><i class="fa fa-calendar-day"></i> <?php echo $row["due_date"]; ?></span>
              </div>
              <!-- /.card-body -->
		  </div></div>
		
		  
		  <?php }?>
		
 
	  </div>
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
	
	
	</script>
</body>
</html>
