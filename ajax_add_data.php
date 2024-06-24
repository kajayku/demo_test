<?php 
include 'config.php';

$name = $_POST['name'];
$address = $_POST['address'];
$class_name = $_POST['class_name'];
$phone = $_POST['phone'];

$sql = "INSERT INTO student (sname,sclass,saddress,sphone) VALUES ('{$name}','{$class_name}','{$address}','{$phone}')";
$result = mysqli_query($conn,$sql) or die("Query Failed");
if($result){
    echo '1';
}else{
    echo '0';
}


?>