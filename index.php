<?php
session_start();

//create connection by including config file
include('includes/config.php');

if(isset($_POST['login']))
{
	$email=$_POST['email'];
	$password=$_POST['password'];
	
	// prepare sql query
	$stmt=$mysqli->prepare("SELECT email,password,id FROM userregistration WHERE email=? and password=? ");
	//A prepared statement is a feature used to execute the same (or similar) SQL statements repeatedly with high efficiency.
	//https://www.w3schools.com/php/php_mysql_prepared_statements.asp

					//bind parameters and execute
					$stmt->bind_param('ss',$email,$password);
					$stmt->execute();

					/* bind variables to prepared statement , 3 columns are set to variables returned by query  */
					$stmt -> bind_result($email,$password,$id);
					$rs=$stmt->fetch();
					$stmt->close();


					if($rs)
					{
						
					/*set session variables*/ 
						$_SESSION['id']=$id;
						$_SESSION['login']=$email;
						
						$_SESSION['flag']="user";
					/*get ip address of server and login time details*/
						$uip=$_SERVER['REMOTE_ADDR'];
						//$ldate=date('d/m/Y h:i:s', time());
						$uid=$_SESSION['id'];
						$uemail=$_SESSION['login'];
						
						$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$uip;
						$addrDetailsArr = unserialize(file_get_contents($geopluginURL));
						$city = $addrDetailsArr['geoplugin_city'];
						$country = $addrDetailsArr['geoplugin_countryName'];
						$sql="insert into userLog(userId,userEmail,userIp,city,country) values('$uid','$uemail','$uip','$city','$country')";
						$result=$mysqli->query($sql);
						if($result)
						{
							header("location:dashboard.php");  /*header should come first before outputting anything on the screen*/
						}
	                }
					else
					{
						echo "<script>alert('Invalid Username/Email or password');</script>";
					}
}
else{
	
	if(isset($_SESSION['id']) && isset($_SESSION['flag']))
	{
		/*Already Logged In*/
		header("location:dashboard.php");
	}
	else{
		if(isset($_SESSION['id']))
		{
			header("location:./admin/dashboard.php");
		}
		/*Visiting for the first time.*/
		//echo "<script>alert('Welcome to NIT Hostel Management');</script>";
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
	<title>Student Hostel Registration</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
function valid()
{
	if(document.registration.password.value!= document.registration.cpassword.value)
	{
		alert("Password and Re-Type Password Field do not match  !!");
		document.registration.cpassword.focus();
		return false;
	}
	return true;
}
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
					
						<h2 class="page-title">User Login </h2>

						<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
							
								<form action="" class="mt" method="post">
									<label for="" class="text-uppercase text-sm">Email</label>
									<input type="text" placeholder="Email" name="email" class="form-control mb">
									<label for="" class="text-uppercase text-sm">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb">
									

									<input type="submit" name="login" class="btn btn-primary btn-block" value="login" >
								</form>
							</div>
						</div>
						<div class="text-center text-light" style="color:black;">
							<a href="forgot-password.php" style="color:black;"><b>Forgot password?</b></a>
						</div>
					</div>
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