<?php 
include 'config.php';

$sid = $_POST['sid'];

$sql = "SELECT * FROM student
        LEFT JOIN studentclass ON student.sclass = studentclass.cid WHERE sid = {$sid}";
$result = mysqli_query($conn,$sql) or die("Query Failed");

$html = "";
if(mysqli_num_rows($result)){
    
    while($row = mysqli_fetch_assoc($result)){

        $html .= "<form class='post-form' id='regi_form'>
        
            <div class='form-group'>
                <label>Name</label>
                <input type='text' name='sname' id='name' value = '{$row['sname']}' />
            </div>
            <div class='form-group'>
                <label>Address</label>
                <input type='text' name='saddress' id='address' value = '{$row['saddress']}'/>
            </div>
            <div class='form-group'>
                <label>Class</label>";
                $sql1 = "SELECT * FROM studentclass";
                $result1 = mysqli_query($conn,$sql1) or die("Query Failed");
                if(mysqli_num_rows($result1)){
                    $html .= "<select name='class' id='class-data'>";
                    while($row1 = mysqli_fetch_assoc($result1)){
                        $selected = ($row['sclass'] == $row1['cid']) ? "selected" : "";
                        $html .= "<option value='{$row1['cid']}' $selected>{$row1['cname']}</option>";
                    }
                }
                
               $html .= "</select>
            </div>
            <div class='form-group'>
                <label>Phone</label>
                <input type='text' name='sphone' id='phone' value = '{$row['sphone']}'/>
            </div>
            <input class='submit' id='data_save' type='submit' value='Save' />
    </form>";

    }

    echo $html;

}else{
    echo $html;
}



?>


           
           
        