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
    <title>Edit Category</title>
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
                           if (isset($_GET['id'])) {
                               $getid = $_GET['id'];

                               $sql = "SELECT * FROM category WHERE category_id = $getid";

                               $query = $conn->query($sql);

                               $data = mysqli_fetch_assoc($query);

                               $category_id = $data['category_id'];
                               $category_name = $data['category_name'];
                               $category_entrydate = $data['category_entrydate'];
                           }

                           if(isset($_GET['category_name'])) {
                               $new_category_name      = $_GET['category_name'];
                               $new_category_entrydate = $_GET['category_entrydate'];
                               $new_category_id        = $_GET['category_id'];

                               $sql1 = "UPDATE category SET 
                                       category_name = '$new_category_name', 
                                       category_entrydate = '$new_category_entrydate' WHERE category_id=$new_category_id";

                               if( $conn->query($sql1) == TRUE ) {
                                   echo "Update Successfull";
                               } else {
                                   echo " Not Update";
                               }
                           }
        
                        ?>
                        <form action="edit_category.php" method= "GET" >
                            <div class="mb-3">
                               <label for="exampleFormControlInput1" class="form-label">Category</label>
                               <input type="text" name="category_name" class="form-control" value="<?php echo $category_name ?>">
                            </div>
                
                            <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Category entry date </label>
                              <input type="date" name="category_entrydate" class="form-control" value="<?php echo $category_entrydate ?>">
                            </div>

                            <input type="text" name= "category_id" value= "<?php echo $category_id ?>" hidden >

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