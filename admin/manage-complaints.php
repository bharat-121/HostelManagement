<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_GET['del']))
{
	$id=intval($_GET['del']);
	$adn="delete from complaints where id=?";
		$stmt= $mysqli->prepare($adn);
		$stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();	   
		echo "<script>alert('Data Deleted');</script>" ;
		
}
if(isset($_POST['submit']))
{
	if(!empty($_SESSION['cid']))
	{
		$id=$_SESSION['cid'];
		$date=$_POST['service'];

		$sql="update complaints set service_date='$date',status=1 where id='$id'";

		$rs=$mysqli->query($sql);
		if($rs)
		{
			echo "<script>alert('Complaint Solved Successfully');</script>" ;
		}
		else
		{

		}

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
	<title>Complaint Details</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title" style="margin-top: 5%">Complaints</h2>
						<div class="panel panel-default">
							<div class="panel-heading">My Complaints Details</div>
							<div class="panel-body">
                            <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">

							<?php	
                                    $aid=$_SESSION['id'];
                                    $ret="select count(*) from complaints where userId=?";
                                    $stmt= $mysqli->prepare($ret) ;
									$stmt->bind_param('i',$aid);
									
									$stmt->execute() ;
									$res=$stmt->get_result();
								?>
								<?php
									if($res->num_rows>0)
									{
									
									?>
									<thead>
										<tr>
											<th>Sno.</th>
											<th>Type</th>
											<th>Description</th>
											<th>Date of Availablity</th>
											<th>Time of Availablity</th>
											<th>Status</th>
                                            <th>Reg. Date</th>
                                            <th>Service Date</th>
                                            <th>Feedback</th>
                                            
                                            
										</tr>
									</thead>
									<tfoot>
										<tr>
                                            <th>Sno.</th>
											<th>Type</th>
											<th>Description</th>
											<th>Date of Availablity</th>
											<th>Time of Availablity</th>
                                            <th>Status</th>
                                            <th>Reg. Date</th>
                                            <th>Service Date</th>
											<th>Feedback</th>
										</tr>
                                    </tfoot>
                                    <tbody>
                                    <?php	
                                    $ret="select * from complaints";
                                    $stmt= $mysqli->prepare($ret) ;
                                   
                                    $stmt->execute() ;
                                    $res=$stmt->get_result();
                                    $cnt=1;
                                    while($row=$res->fetch_object())
                                        {
                                            ?>
                                    <tr><td><?php echo $cnt;?></td>
                                    <td><?php echo $row->ctype;?></td>
                                    <td><?php echo $row->cdescription;?></td>
                                    <td><?php echo $row->availd;?></td>
                                    <td><?php echo $row->availt;?></td>
									<td><?php if($row->status==0)
									{
										echo "<i class='fa fa-close' title='pending'></i>";
									}
									else{
										echo "<i class='fa fa-check' title='completed'></i>";

									}?></td>
                                    <td><?php echo $row->reg_date;?></td>
									<?php 
									if(!empty($row->service_date))
									{?>
									
									<td><?php echo $row->service_date;?></td>
									
									<?php
									}
									else {
										?>
										<td><form action="" method="POST">
										<input type="date" name="service" >
										<?php $_SESSION['cid']=$row->id;?>
										<input type="submit" name="submit" value="submit">
										</form></td>
										<?php
									}?>
                                          
							    	<?php 
									if(!empty($row->feedback))
									{?>
									
									<td><?php echo $row->feedback;?>
									
									<?php
									}
									else {
										?>
							      <td> <?php echo "Not Received Yet.";?> </td> ;
									
									<?php
									}?>
                                                                            </tr>
                                                                        <?php
                                    $cnt=$cnt+1;
									 } ?>
											
										
									</tbody>
</table>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
</div>
    </div>
	<?php
	  }?>
	
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	

<body>
</html>