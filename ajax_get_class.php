<?php 
include 'config.php';

$sql = "SELECT * FROM studentclass";
$result = mysqli_query($conn,$sql) or die("Query Failed");
if(mysqli_num_rows($result)>0){
        $html = "<option value='' selected disabled>Select Class</option>";
    while($row = mysqli_fetch_assoc($result)){
        $html .= "<option value='{$row['cid']}'>{$row['cname']}</option>";
    }
}

echo $html;
?>