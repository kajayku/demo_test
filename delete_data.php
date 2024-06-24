<?php 
include 'config.php';
$sid = $_POST['sid'];

$sql = "DELETE FROM student WHERE sid = {$sid}";

if(mysqli_query($conn,$sql)) {
    echo '1';
}else{
    echo '0';
}

?>