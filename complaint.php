<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
if(isset($_POST['submit']))
{
    //register the complaint
    $ctype=$_POST["complaintType"];
    $cdescription=$_POST["complaindesc"];
    $availd=$_POST["availd"];
    $availt=$_POST["availt"];
    $userid=$_SESSION["id"];
    $status=0;

    $query="INSERT INTO complaints(ctype,cdescription,availd,availt,status,userid) values('$ctype','$cdescription','$availd','$availt','$status','$userid')";

    $stmt = $mysqli->prepare($query);
    $rc=$stmt->bind_param('ssssii',$ctype,$cdescription,$availd,$availt,$status,$userid);
    $stmt->execute();
    
    echo"<script>alert('Complaint Successfully registered');</script>";
    
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
						<h2 class="page-title" style="margin-top:6%">Register Your Complaint </h2>
                        <div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
									<div class="panel-body">
                                    <form method="post" action="" class="form-horizontal">
                                    <div class="form-group">
                                    <label class="col-sm-4 control-label"><h4 style="color: green" align="left">Complaint Related info </h4> </label>
                                    </div>
                                        <div class="form-group">
                                                <label class="col-sm-4 control-label">Type of Complaint : </label>
                                        <div class="col-sm-6">
                                        <select name="complaintType" class="form-control" required="required">
                                            <option value="">Select Complaint Type</option>
                                            <option value="electricity">Electricity</option>
                                            <option value="carpenter">Carpenter</option>
                                            <option value="others">Others</option>
                                        </select>
                                        </div>
                                        </div>

                                        
                                        <div class="form-group">
                                                <label class="col-sm-4 control-label">Date of Availabilty : </label>
                                        <div class="col-sm-6">
                                           <input type="date"  name="availd" id="availd"  class="form-control">
                                        </div>
                                        </div>

                                        
                                        <div class="form-group">
                                                <label class="col-sm-4 control-label">Time of Availabilty : </label>
                                        <div class="col-sm-6">
                                        <div class="md-form">
                                            <input placeholder="time" type="time" name="availt" id="availt"  class="form-control timepicker" required="required">
                                        </div>
                                        </div>
                                        </div>

                                        <div class="form-group">
                                                <label class="col-sm-4 control-label">Describe Complaint : </label>
                                        <div class="col-sm-6">
                                            <textarea rows="5" name="complaindesc" id="complaindesc"  class="form-control " required="required"></textarea>
                                        </div>
                                        </div>
                                            <div class="col-sm-6 col-sm-offset-4">
                                        <button class="btn btn-default" type="submit">Cancel</button>
                                        <input type="submit" name="submit" Value="Register" class="btn btn-primary">
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
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

