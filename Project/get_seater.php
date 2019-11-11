<?php
include('includes/config.php');
if(!empty($_POST["roomid"])) 
{	
    $id=$_POST['roomid'];
    $stmt = $mysqli->prepare("SELECT * FROM rooms WHERE room_no = ?");
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $res=$stmt->get_result();

    while($row=$res->fetch_object())
    {
    echo htmlentities($row->seater); 
    }
}

if(!empty($_POST["rid"])) 
{	
    $id=$_POST['rid'];
    $stmt = $mysqli->prepare("SELECT * FROM rooms WHERE room_no = ?");
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $res=$stmt->get_result();
    
    while($row=$res->fetch_object())
    {
     echo htmlentities($row->fees); 
    }
}
?>