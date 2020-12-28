<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Slab:wght@300;400;500;600;700&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" \
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="../CSS/main.min.css">
    <title>Roomistic - Rooms</title>
</head>

<body>

    <?php
    require_once("../component.php");
    require_once("operation.php");
    ?>

    <div class="text-center d-flex py-4 bg-dark text-light justify-content-center align-items-center">
        <a href="../index.html" class="btn btn-info homebtn"><i class="fas fa-home"></i></a>
        <h1>Rooms</h1>
    </div>

    <div class="d-flex justify-content-center">
        <form action="" method="post" class="w-50">
            <div class="pt-2">
                <?php  inputElement("text", "<i class='fas fa-door-open'></i>", "Room ID", "room_id", "");  ?>
            </div>
            <div class="pt-2">
                <?php  inputElement("text", "<i class='fas fa-mug-hot'></i>", "Room type", "room_type", "");  ?>
            </div>
            <div class="row pt-2">
                <div class="col">
                    <?php  inputElement("text", "<i class='fas fa-unlock'></i>", "Status", "room_status", "");  ?>
                </div>
                <div class="col">
                    <?php  inputElement("text", "<i class='fas fa-rupee-sign'></i>", "Rent", "rent", "");  ?>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <?php buttonElement("btn-create", "btn btn-success", "<i class='fas fa-plus'></i>", "create", "data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
                <?php buttonElement("btn-read", "btn btn-warning", "<i class='fas fa-book'></i>", "read", "data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                <?php buttonElement("btn-update", "btn btn-light", "<i class='fas fa-pen'></i>", "update", "data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
                <?php buttonElement("btn-delete", "btn btn-danger", "<i class='fas fa-trash'></i>", "delete", "data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
            </div>
        </form>
    </div>

    <div class="d-flex table-data container">
        <table class="table table-striped table-dark">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Rent</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody id="tbody">

                <?php

                if(isset($_POST['read'])) {
                    $result = getData();

                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                <tr>
                    <td data-id="<?php echo $row['room_id']; ?>"><?php echo $row['room_id']; ?></td>
                    <td data-id="<?php echo $row['room_id']; ?>"><?php echo $row['room_type']; ?></td>
                    <td data-id="<?php echo $row['room_id']; ?>"><?php echo $row['room_status']; ?></td>
                    <td data-id="<?php echo $row['room_id']; ?>"><?php echo "₹ ".$row['rent']; ?></td>
                    <td><i class="fas fa-edit btnedit" data-id="<?php echo $row['room_id']; ?>"></i></td>
                </tr>


                <?php
                    }
                }

                ?>

            </tbody>
        </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src=./main.js></script>
</body>

</html>