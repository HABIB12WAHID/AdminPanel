<?php 

    session_start();
      
    $user_first_name = $_SESSION['user_first_name'];
    $user_last_name = $_SESSION['user_last_name'];

    if (!empty($user_first_name) && !empty($user_last_name)) {

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Management System | SMS </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container bg-light">
        <div class="container_foulid border-bottom border-success"> <!--topbar starts-->
            <?php include('topbar.php');  ?>
        </div> <!--ends of topbar-->
        <div class="container_foulid">
            <div class="row"> <!-- starts row-->
                <div class="col-sm-3 bg-light p-0 m-0"> <!--starts left-->

                    <?php include('leftbar.php'); ?>

                </div> <!--ends of left-->
                <div class="col-sm-9 border-start text-center"> <!--starts right-->

                    <div class="row p-4">
                        <div class="col-sm-4">
                           <a href="add_users.php"> <i class="fa-solid fa-user fa-7x text-success"></i> </a>
                           <p>Add User</p>
                        </div>

                        <div class="col-sm-4">
                           <a href="report.php"> <i class="fas fa-chart-bar fa-7x text-success"></i> </a>
                           <p>Report</p>
                        </div>

                        <div class="col-sm-4">
                           <a href="list_of_users.php"> <i class="fa-solid fa-users fa-7x text-success"></i> </a>
                           <p>List of User</p>
                        </div>
                    </div>

                    <hr/>

                    <div class="row p-4">
                        <div class="col-sm-3">
                           <a href="add_category.php"> <i class="fa-solid fa-folder-plus fa-7x text-success"></i> </a>
                           <p>Add Category</p>
                        </div>

                        <div class="col-sm-3">
                           <a href="list_of_category.php"><i class="fa-solid fa-folder-open fa-7x text-success"></i></a>
                           <p>Category List</p>
                        </div>

                        <div class="col-sm-3">
                           <a href="add_product.php"><i class="fas fa-box-open fa-7x text-success"></i></a>
                           <p> Add Product</p>
                        </div>

                        <div class="col-sm-3">
                           <a href="list_of_product.php"><i class="fas fa-stream fa-7x text-success"></i></a>
                           <p>Product List</p>
                        </div>
                    </div>

                    <hr/>

                    <div class="row p-4">
                        <div class="col-sm-3">
                           <a href="add_store_product.php"> <i class="fas fa-trash-restore fa-7x text-success"></i> </a>
                           <p>Store Product</p>
                        </div>

                        <div class="col-sm-3">
                           <a href="list_of_entry_product.php"><i class="fas fa-box fa-7x text-success"></i></a>
                           <p>Store Product List</p>
                        </div>

                        <div class="col-sm-3">
                           <a href="add_spend_product.php"><i class="fas fa-window-restore fa-7x text-success"></i></a>
                           <p>Spend Product</p>
                        </div>

                        <div class="col-sm-3">
                           <a href="list_of_spend_product.php"><i class="fa-solid fa-calendar-minus fa-7x text-success"></i></a>
                           <p>Spend Product List</p>
                        </div>
                    </div>

                </div> <!--ends of right-->
            </div> <!--ends of row-->
        </div>
        <div class="container_foulid p-0 m-0">
            <?php include('bottombar.php'); ?>
        </div>
    </div> <!-- ends of container -->
</body>
</html>

<?php  

    } else {
        header('location:login.php');
    }

?>

