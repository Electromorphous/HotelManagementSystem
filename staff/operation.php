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

function textBoxName($staff_name) {
    $textBox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$staff_name]));

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
    $staff_name = textBoxName("staff_name");
    $job = textBoxName("job");
    $salary = textBoxName("salary");
    $staff_phone = textBoxName("staff_phone");

    if($staff_name && $job && $salary && $staff_phone) {
        $query = "
            insert into staff(staff_name, job, salary, staff_phone)
            values ('$staff_name', '$job', '$salary', '$staff_phone');
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
    $query = "select * from staff";
    $result = mysqli_query($GLOBALS['con'], $query);

    if(mysqli_num_rows($result) > 0) {
        return $result;
    }
}

// update the data
function updateData() {
    $staff_id = textBoxName("staff_id");
    $staff_name = textBoxName("staff_name");
    $job = textBoxName("job");
    $salary = textBoxName("salary");
    $staff_phone = textBoxName("staff_phone");


    if($staff_id && $staff_name && $job && $salary && $staff_phone) {
        $query = "

        update staff set
        staff_name = '$staff_name',
        job = '$job',
        salary = '$salary',
        staff_phone = '$staff_phone'
        where staff_id = '$staff_id';

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
    $staff_id = textBoxName("staff_id");

    if($staff_id) {
        $query = "
        
        delete from staff where staff_id = '$staff_id';

        ";

        if(mysqli_query($GLOBALS['con'], $query)) {
            textNode("alert alert-success alert-dismissible fade show", "Row deleted");
        }
        else {
            textNode("alert alert-danger alert-dismissible fade show", "Could not delete row");
        }
    }
    else {
        textNode("alert alert-danger alert-dismissible fade show", "Please provide the Staff ID");
    }    
}