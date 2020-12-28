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
    $cust_id = textBoxName("cust_id");
    $room_id = textBoxName("room_id");
    $start_date = textBoxName("start_date");
    $start_date = strtotime($start_date);
    $start_date = date('Y-m-d H:i:s H:i:s', $start_date);
    $end_date = textBoxName("end_date");
    $end_date = strtotime($end_date);
    $end_date = date('Y-m-d H:i:s H:i:s', $end_date);

    if($cust_id && $room_id && $start_date && $end_date) {
        $query = "
            insert into reservations(cust_id, room_id, start_date, end_date)
            values ('$cust_id', '$room_id', '$start_date', '$end_date');
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
    $query = "select * from reservations";
    $result = mysqli_query($GLOBALS['con'], $query);

    if(mysqli_num_rows($result) > 0) {
        return $result;
    }
}

// update the data
function updateData() {
    $res_id = textBoxName("res_id");
    $cust_id = textBoxName("cust_id");
    $room_id = textBoxName("room_id");
    $start_date = textBoxName("start_date");
    $start_date = strtotime($start_date);
    $start_date = date('Y-m-d H:i:s H:i:s', $start_date);
    $end_date = textBoxName("end_date");
    $end_date = strtotime($end_date);
    $end_date = date('Y-m-d H:i:s H:i:s', $end_date);


    if($res_id && $cust_id && $room_id && $start_date && $end_date) {
        $query = "

        update reservations set
        cust_id = '$cust_id',
        room_id = '$room_id',
        start_date = '$start_date',
        end_date = '$end_date'
        where res_id = '$res_id';

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
    $res_id = textBoxName("res_id");

    if($res_id) {
        $query = "
        
        delete from reservations where res_id = '$res_id';

        ";

        if(mysqli_query($GLOBALS['con'], $query)) {
            textNode("alert alert-success alert-dismissible fade show", "Row deleted");
        }
        else {
            textNode("alert alert-danger alert-dismissible fade show", "Could not delete row");
        }
    }
    else {
        textNode("alert alert-danger alert-dismissible fade show", "Please provide the Reservation ID");
    }    
}