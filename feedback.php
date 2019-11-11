<?php
   session_start();
   include('includes/config.php');
   include('includes/checklogin.php');
   check_login();

   if(!empty($_GET['id']))
   {
     $_SESSION['compid']=$_GET['id'];
   }

   if($_POST['submit'])
   {
	   $id=$_SESSION['compid'];
	   $feedback=$_POST['feedback'];

	   $sql="update complaints set feedback='$feedback' where id='$id'";

	   $res=$mysqli->query($sql);

	   if($res)
	   {
		   echo "<script>alert('feedback registered thanku')</script>";
	   }
	   else{

	   }
   }

?>


<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Register Complaint</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">

    <script> 
    $('#availt').pickatime({});
    </script>
</head>
<body>
<?php include('includes/header.php');?>


<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title" style="margin-top:4%">Feedback</h2>
					</div>
				</div>
				<form action="" method="post">
                  <div class="row">
					<div class="col-md-6 col-md-offset-1">
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-1">
							 <textarea name="feedback" id="feedback" cols="100" rows="10" placeholder="write here..." required></textarea>
						</div>

					</div>
				
					  <div class="col-sm-6 col-sm-offset-7">
                      <button class="btn btn-default" type="submit">Cancel</button>
                                        <input type="submit" name="submit" Value="Submit" class="btn btn-primary">
									
								</div>	
					</div>
					</form>

			</div>
		</div>		
	</div>				

	<script src="js/jquery.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script src="js/Chart.min.js"></script>
<script src="js/fileinput.js"></script>
<script src="js/chartData.js"></script>
<script src="js/main.js"></script>
</body>
	
</html>

