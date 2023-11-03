<?php  
    require ('connection.php');

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
    <title>Add Product</title>
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
                           if( isset ($_GET['product_name']) ) {
                               $product_name       = $_GET['product_name'];
                               $product_category   = $_GET['product_category'];
                               $product_code       = $_GET['product_code'];
                               $product_entry_date = $_GET['product_entry_date'];

                               $sql = "INSERT INTO product (product_name, product_category, product_code, product_entry_date)
                                       VALUES ('$product_name', '$product_category', '$product_code', '$product_entry_date')";

                               if($conn->query($sql) == TRUE) {
                                   echo 'Data Inserted!';
                               } else {
                                   echo 'Not Data Inserted';
                               }
                           }        
                        ?>

                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method= "GET" >

                            <div class="mb-3">
                               <label for="exampleFormControlInput1" class="form-label">Product</label>
                               <input type="text" name="product_name" class="form-control" placeholder="Enter your product">
                            </div>

                            <label for="exampleFormControlInput1" class="form-label">Product Category</label>
                            <?php  
                                $sql   = "SELECT * FROM category";
                                $query = $conn->query($sql);
                            ?>
                            <select name="product_category" class="form-select" aria-label="Default select example">
                                <?php  
                                    while($data = mysqli_fetch_array($query)) {
                                          $category_id   = $data['category_id'];
                                          $category_name = $data['category_name'];
                                          echo "<option value='$category_id'> $category_name </option>";
                                    }
                                ?>
                            </select> <br>

                            <div class="mb-3">
                               <label for="exampleFormControlInput1" class="form-label">Product Code</label>
                               <input type="text" name="product_code" class="form-control" placeholder="Enter product code">
                            </div>

                            <div class="mb-3">
                               <label for="exampleFormControlInput1" class="form-label">Product entry date </label>
                               <input type="date" name="product_entry_date" class="form-control">
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