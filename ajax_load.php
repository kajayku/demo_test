<?php 

include 'config.php';
$search = $_POST['search'];
$page = "";
if(isset($_POST['page'])){
    $page = $_POST['page'];
}else{
    $page = 1;
}

$limit = 3;
$offset = ($page-1)*$limit;


$sql = "SELECT * FROM student
        LEFT JOIN studentclass ON student.sclass = studentclass.cid";

        if($search != ""){
            $sql .= " WHERE student.sname LIKE '%{$search}%' OR student.saddress LIKE '%{$search}%'";
        }

    $sql .= " LIMIT {$offset},{$limit} ";    
         // echo $sql; die;
$result = mysqli_query($conn,$sql) or die("Query Failed");
$html = "";
if(mysqli_num_rows($result)){
    $html = '<table cellpadding="7px">
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Class</th>
        <th>Phone</th>
        <th>Action</th>
        </thead>
        <tbody>';
    while($row = mysqli_fetch_assoc($result)){

        $html .= "<tr>
                <td>{$row['sid']}</td>
                <td>{$row['sname']}</td>
                <td>{$row['saddress']}</td>
                <td>{$row['cname']}</td>
                <td>{$row['sphone']}</td>
                <td>
                    <button class = 'edit-btn' data-sid = '{$row['sid']}'>Edit</button>
                    <button class = 'delete-btn' data-sid = '{$row['sid']}'>Delete</button>
                </td>
            </tr>";

    }
        $html .= "</tbody>
                  </table>";
                  $sql1 = " SELECT * FROM student ";
                  $result1 = mysqli_query($conn,$sql1) or die("Quesry Failed");
                  if(mysqli_num_rows($result1)>0){
                    $total_records = mysqli_num_rows($result1);

                    $total_page = ceil($total_records / $limit);

                    $html .= '<div class="center">
                              <div class="pagination">';

                    for($i=1 ; $i<=$total_page ; $i++){
                        $html .=  '<a id = '.$i.' href="">'.$i.'</a>';
                                  
                    }

                    $html .= '</div>
                             </div>';
                    
                  }

                  

    echo $html;
}else{
    echo "No Record Found !";
}




?>


           
           
        