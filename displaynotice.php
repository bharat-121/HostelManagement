<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
date_default_timezone_set('Asia/Kolkata');
check_login();
if(isset($_GET['number']))
{
    $sql="select num_gen,subject,body,dateposted from notices where num_gen=?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i',$_GET['number']);
    $stmt->execute();
    $rs=$stmt->get_result();
    while($row=$rs->fetch_object())
    {
        $number=$row->num_gen;
        $subject=$row->subject;
        $body=$row->body;
        $udate=$row->dateposted;
    }

  
}
else
{
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
	<title>Displaying Notice</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">

    <script> 
      
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
                    <h2 class="page-title" style="margin-top:4%;" align="center">Notice</h2>
                        
                        <form method="post" action="" class="form-horizontal">
                                                
                        <div>
                                    <label class="control-label"> No. Gen : <?php
                                            echo "$number";
                                        ?></label>
                                                                        <label class="control-label"  style="float:right;">Dated : <?php echo "$udate";
                                        ?></label></label>
                                    </div>

                                    <br>
                                
                                <div>
                                <label for="subject" >Subject </label> 
                                                        <?php echo "<input type='text' class='form-control'  style='text-align:center;border-radius:6px' value='$subject' disabled>";?>
                                </div>
                                <br>
                                <br>      <div>      <label for="body">Body </label>
                                <?php echo "<textarea type='text' class='form-control'  rows='7'   style='text-align:center;border-radius:6px' disabled >$body</textarea>";?>
                               
                               </div>
                                
                                   
    </form>
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