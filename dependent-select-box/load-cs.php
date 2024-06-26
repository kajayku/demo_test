<?php


// $conn = new mysqli("localhost","root","","php_crud") or die("Connection Failed");

//        if($_POST['type'] == ""){
// 		$result = $conn->query("SELECT * FROM  country_tb");
// 		$str = "";
// 	   if($result->num_rows>0){
// 		   while($row = $result->fetch_assoc()){
// 			   $str .= "<option value '{$row['cid']}'>{$row['cname']} </option>";

// 		   }
// 		   echo $str;
// 	   }
// 	   }elseif($_POST['type'] == "stateData"){
// 		$result = $conn->query("SELECT * FROM  state_tb WHERE country = {$_POST['id']}");
// 		$str = "";
// 	   if($result->num_rows>0){
// 		   while($row = $result->fetch_assoc()){
// 			   $str .= "<option value '{$row['sid']}'>{$row['sname']} </option>";

// 		   }
// 		   echo $str;
// 	   }
// 	   }

        
		

	$conn = mysqli_connect("localhost","root","","php_crud") or die("Connection failed");

	if($_POST['type'] == ""){
		$sql = "SELECT * FROM country_tb";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['cid']}'>{$row['cname']}</option>";
		}
	}else if($_POST['type'] == "stateData"){

		$sql = "SELECT * FROM state_tb WHERE country = {$_POST['id']}";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['sid']}'>{$row['sname']}</option>";
		}
	}

	echo $str;
 ?>
