<?php  
    require ( 'connection.php' );
    require ( 'myfunction.php' );

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
    <title>Spend Product</title>
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
                <div class="col-sm-9 border-start"> <!--starts right-->

                    <div class="container p-5">
                        <?php  
                            if(isset($_GET['spend_product_name'])) {
                                $spend_product_name       = $_GET['spend_product_name'];
                                $spend_product_quentity   = $_GET['spend_product_quentity'];
                                $spend_product_entry_date = $_GET['spend_product_entry_date'];

                                $sql = "INSERT INTO spend_product (spend_product_name, spend_product_quentity, spend_product_entry_date)
                                        VALUES ('$spend_product_name', '$spend_product_quentity', '$spend_product_entry_date')";

                                if($conn->query($sql) == TRUE) {
                                    echo 'Data Inserted!';
                                } else {
                                    echo 'not Inserted!';
                                }
                            }    
                        ?>

                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method= "GET" >

                            <div class="mb-3">
                               <label for="exampleFormControlInput1" class="form-label">Product</label>
                               <select name="spend_product_name" class="form-select" aria-label="Default select example">
                                <?php  
                                   data_list('product', 'product_id', 'product_name');
                                ?>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                               <label for="exampleFormControlInput1" class="form-label">Product Quentity </label>
                               <input type="text" name="spend_product_quentity" class="form-control">
                            </div>

                            <div class="mb-3">
                               <label for="exampleFormControlInput1" class="form-label">Store entry date </label>
                               <input type="date" name="spend_product_entry_date" class="form-control">
                            </div>

                            <div class="text-center">
                               <button style="width:40%;" type="submit" class="btn btn-primary btn-lg btn-block">submit</button>
                            </div>

                        </form>
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