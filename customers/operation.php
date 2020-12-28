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
    $custName = textBoxName("cust_name");
    $custPhone = textBoxName("cust_phone");
    $email = textBoxName("email");

    if($custName && $custPhone && $email) {
        $query = "
            insert into customers(cust_name, cust_phone, email)
            values ('$custName', '$custPhone', '$email');
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
    $query = "select * from customers";
    $result = mysqli_query($GLOBALS['con'], $query);

    if(mysqli_num_rows($result) > 0) {
        return $result;
    }
}

// update the data
function updateData() {
    $cust_id = textBoxName("cust_id");
    $cust_name = textBoxName("cust_name");
    $cust_phone = textBoxName("cust_phone");
    $email = textBoxName("email");
    
    if($cust_id && $cust_name && $cust_phone && $email) {
        $query = "
        
        update customers set
        cust_name = '$cust_name',
        cust_phone = '$cust_phone',
        email = '$email'
        where cust_id = '$cust_id';

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
    $cust_id = textBoxName("cust_id");

    if($cust_id) {
        $query = "
        
        delete from customers where cust_id = '$cust_id';

        ";

        if(mysqli_query($GLOBALS['con'], $query)) {
            textNode("alert alert-success alert-dismissible fade show", "Row deleted");
        }
        else {
            textNode("alert alert-danger alert-dismissible fade show", "Could not delete row");
        }
    }
    else {
        textNode("alert alert-danger alert-dismissible fade show", "Please provide the Customer ID");
    }    
}