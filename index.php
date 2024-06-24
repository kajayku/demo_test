<?php
include 'header.php';
?>
<div id="main-content">
<div id="form1">
    <form class="post-form" id="regi_form">
        
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="sname" id="name" />
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="saddress" id="address" />
            </div>
            <div class="form-group">
                <label>Class</label>
                <select name="class" id="class-data">
                
                </select>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="sphone" id="phone" />
            </div>
            <input class="submit" id="data_save" type="submit" value="Save" />
    </form>
    </div>
    <div id="messages"></div>
    <h2>All Records</h2>

    <form class="post-form" >
    <div class="form-group">
                <label>Search</label>
                <input type="text" name="search" id="forn_search" />
        </div>
    </form>
    <div id="table-data">
     <!-- table data  -->
    </div>

</div>
</div>
<script src="./js/jquery-3.7.1.js"> </script>

<script>

$(document).ready(function(){

   // get for data
function loadData(page, search){
    $.ajax({
        url : 'ajax_load.php',
        type : 'POST',
        data : {
                 search: search,
                 page : page
                },
        success : function(data){
           $("#table-data").html(data);
        }
    });
}

function initialLoad(){
    var page = 1;
    var search = '';
    loadData(page, search);
}

initialLoad();

$("#forn_search").keyup(function(){
    var search = $("#forn_search").val();
    loadData(1, search); // Reset to page 1 when searching
});

$(document).on("click",".pagination a", function(e){
    e.preventDefault();
    var page_id = $(this).attr("id");
    var search = $("#forn_search").val();
    loadData(page_id, search);
});

// save form data 

$.ajax({
    url : 'ajax_get_class.php',
    type : 'POST',
    success : function(data){
     $("#class-data").html(data);
    }
    });

$("#data_save").on("click",function(e){
e.preventDefault();
var name = $("#name").val();
var address = $("#address").val();
var class_name = $("#class-data").val();
var phone = $("#phone").val();

$.ajax({
url : 'ajax_add_data.php',
type : 'POST',
data : {
        name:name,
        address:address,
        class_name:class_name,
        phone:phone
    },
success : function(data){
    if(data == 1){
        showMessage("Data added successfully!", "success");
        $("#regi_form").trigger("reset");
        initialLoad();
    }else{
        showMessage("Something went wrong. Please try again.", "error");
    }
}    
});

});

$(document).on("click",".delete-btn",function(){
 var sid = $(this).data("sid");
 $.ajax({
    url : "delete_data.php",
    type : "POST",
    data : {
            sid: sid
        },
    success : function(data){
        if(data == 1){
            showMessage("Data deleted successfully!", "success");
            initialLoad();
        }else{
            showMessage("Data not deleted. Please try again.", "error");
        }

    }
 });
});

$(document).on("click",".edit-btn",function(){
 var sid = $(this).data("sid");
 $.ajax({
    url : "edit_data.php",
    type : "POST",
    data : {
            sid: sid
        },
    success : function(data){
        if(data){
            $("#form1").html(data);
        }else{
            showMessage("Data not updated. Please try again.", "error");
        }

    }
 });
});

function showMessage(message, type) {
    var messageClass = type === "success" ? "message-success" : "message-error";
    $("#messages").html('<div class="' + messageClass + '">' + message + '</div>');
    setTimeout(function(){
        $("#messages").html('');
    }, 3000);
}

});

</script>

<style>
.message-success {
    color: green;
    font-weight: bold;
}
.message-error {
    color: red;
    font-weight: bold;
}
</style>

</body>
</html>
