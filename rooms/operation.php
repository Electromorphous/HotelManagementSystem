<?php

require_once("../db.php");

$con = connectDB();

if (isset($_POST['create'])) {
    createData();
}

if (isset($_POST['update'])) {
    updateData();
}

if (isset($_POST['delete'])) {
    deleteData();
}

function textBoxName($name) {
    $textBox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$name]));

    if (empty($textBox)) {
        return false;
    }
    return $textBox;
}

// alerts
function textNode($className, $msg) {
    $ele = "

    <div class='$className'>
        $msg
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
    </div>
            
            ";
    echo $ele;
}

function createData() {
    $roomType = textBoxName("room_type");
    $roomStatus = textBoxName("room_status");
    $rent = textBoxName("rent");

    if($roomType && $roomStatus && $rent) {
        $query = "
            insert into rooms(room_type, room_status, rent)
            values ('$roomType', '$roomStatus', '$rent');
        ";

        if (mysqli_query($GLOBALS['con'], $query)) {
            textNode("alert alert-success alert-dismissible fade show", "Row inserted");
        }
        else {
            textNode("alert alert-danger alert-dismissible fade show", "Could not insert row");
        }
    }
    else {
        textNode("alert alert-danger alert-dismissible fade show", "Please provide the required data");
    }
}

// get the data from the table
function getData() {
    $query = "select * from rooms";
    $result = mysqli_query($GLOBALS['con'], $query);

    if(mysqli_num_rows($result) > 0) {
        return $result;
    }
}

// update the data
function updateData() {
    $room_id = textBoxName("room_id");
    $room_type = textBoxName("room_type");
    $room_status = textBoxName("room_status");
    $rent = textBoxName("rent");
    
    if($room_id && $room_type && $room_status && $rent) {
        $query = "
        
        update rooms set
        room_type = '$room_type',
        room_status = '$room_status',
        rent = '$rent'
        where room_id = '$room_id';

        ";

        if(mysqli_query($GLOBALS['con'], $query)) {
            textNode("alert alert-success alert-dismissible fade show", "Row updated");
        }
        else {
            textNode("alert alert-danger alert-dismissible fade show", "Could not update row");
        }
    }
    else {
        textNode("alert alert-danger alert-dismissible fade show", "Please provide the required data");
    }
}

// Deleting the data
function deleteData() {
    $room_id = textBoxName("room_id");

    if($room_id) {
        $query = "
        
        delete from rooms where room_id = '$room_id';

        ";

        if(mysqli_query($GLOBALS['con'], $query)) {
            textNode("alert alert-success alert-dismissible fade show", "Row deleted");
        }
        else {
            textNode("alert alert-danger alert-dismissible fade show", "Could not delete row");
        }
    }
    else {
        textNode("alert alert-danger alert-dismissible fade show", "Please provide the Room ID");
    }    
}