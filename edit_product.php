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
    <title>Edit Product</title>
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
                            if(isset($_GET['id'])) {
                                $getid = $_GET['id'];

                                $sql = "SELECT * FROM product WHERE product_id = $getid";

                                $query = $conn->query($sql);

                                $data = mysqli_fetch_assoc($query);

                                $product_id = $data['product_id'];
                                $product_name = $data['product_name'];
                                $product_category = $data['product_category'];
                                $product_code = $data['product_code'];
                                $product_entry_date = $data['product_entry_date'];
                            }  
        
                            if (isset($_GET['product_name'])) {
                                $new_product_name       = $_GET['product_name'];
                                $new_product_category   = $_GET['product_category'];
                                $new_product_code       = $_GET['product_code'];
                                $new_product_entry_date = $_GET['product_entry_date'];
                                $new_product_id         = $_GET['product_id'];

                                $sql1 = "UPDATE product SET product_name= '$new_product_name', 
                                                            product_category = '$new_product_category',
                                                            product_code = '$new_product_code',
                                                            product_entry_date = '$new_product_entry_date'
                                                            WHERE product_id = $new_product_id";
                                if($conn->query($sql1) == TRUE) {
                                    echo "Update Successful";
                                } else {
                                    echo "Not Updated";
                                }
                            }
                        ?>

                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method= "GET" >

                            <div class="mb-3">
                               <label for="exampleFormControlInput1" class="form-label">Product</label>
                               <input type="text" name="product_name" class="form-control" value="<?php echo $product_name ?>">
                            </div>
                            
                            <div class="mb-3">
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
                                  ?>
                                      <option value= '<?php echo $category_id?>' <?php if ($category_id == $product_category) { echo 'selected'; } ?> >
                                      <?php echo $category_name ?> </option>
                                  <?php
                                   }
                                  ?>
                                </select>
                            </div>

                            <div class="mb-3">
                               <label for="exampleFormControlInput1" class="form-label">Product Code</label>
                               <input type="text" name="product_code" class="form-control" value="<?php echo $product_code ?>">
                            </div>

                            <div class="mb-3">
                               <label for="exampleFormControlInput1" class="form-label">Product entry date </label>
                               <input type="date" name="product_entry_date" class="form-control" value="<?php echo $product_entry_date ?>">
                            </div>

                            <input type="text" name= "product_id" value= "<?php echo $product_id ?>" hidden> 

                            <div class="text-center">
                               <button style="width:40%;" type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
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