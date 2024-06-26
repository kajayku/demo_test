<?php 
// $conn = mysqli_connect("localhost","root","","php_crud") or die("Connection Failed");

// $sql = "SELECT * FROM users";
// $result = mysqli_query($conn,$sql);

// if(mysqli_num_rows($result)>0){
//     $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
//     $json_data = json_encode($data,JSON_PRETTY_PRINT);
    
//     $json_content = file_put_contents("my_" . time().".json" , $json_data);
//    if($json_content){
//     echo "Created";
//    }else{
//     echo "Not created";
//    }
// }


$json_string = 'http://localhost/php_crud_ajax/json/my.json';
$json_data = file_get_contents($json_string);

$arr = json_decode($json_data,true);

echo '<table border= "1px" cellpadding="10px" width = "100px">';

foreach($arr as list("id" => $id , "name" => $name , "age" => $age , "gender" => $gender , "country" => $country)){
    echo "<tr> <td> {$id} </td> <td> {$name} </td> <td> {$age}</td> <td>{$gender} </td> <td>{$country} </td></tr>";
}

?>