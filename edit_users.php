<?php  
    require ( 'connection.php' );

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
    <title>Edit Users</title>
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

                            $sql = "SELECT * FROM users WHERE user_id = $getid";

                            $query = $conn->query($sql);

                            $data = mysqli_fetch_assoc($query);

                            $user_id         = $data['user_id'];
                            $user_first_name = $data['user_first_name'];
                            $user_last_name  = $data['user_last_name'];
                            $user_email      = $data['user_email'];
                            $user_password   = $data['user_password'];
                            }  
      
      
                           if (isset($_GET['user_first_name'])) {
                           $new_user_first_name = $_GET['user_first_name'];
                           $new_user_last_name  = $_GET['user_last_name'];
                           $new_user_email      = $_GET['user_email'];
                           $new_user_password   = $_GET['user_password'];
                           $new_user_id         = $_GET['user_id'];

                           $sql1 = "UPDATE users SET user_first_name= '$new_user_first_name', 
                                    user_last_name = '$new_user_last_name',
                                    user_email = '$new_user_email',
                                    user_password = '$new_user_password'
                                    WHERE user_id = $new_user_id";
                            if($conn->query($sql1) == TRUE) {
                                 echo "Update Successful";
                                } else {
                                   echo "Not Updated";
                                }
                            }

                        ?>

                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method= "GET" >
                            
                            <div class="mb-3">
                               <label for="exampleFormControlInput1" class="form-label">User's First Name </label>
                               <input type="text" name="user_first_name" class="form-control" value="<?php echo $user_first_name; ?>">
                            </div>

                            <div class="mb-3">
                               <label for="exampleFormControlInput1" class="form-label">User's Last Name </label>
                               <input type="text" name="user_last_name" class="form-control" value="<?php echo $user_last_name; ?>">
                            </div>

                            <div class="mb-3">
                               <label for="exampleFormControlInput1" class="form-label">User's Email </label>
                               <input type="email" name="user_email" class="form-control" value="<?php echo $user_email; ?>">
                            </div>

                            <div class="mb-3">
                               <label for="exampleFormControlInput1" class="form-label">User's Password </label>
                               <input type="password" name="user_password" class="form-control" value="<?php echo $user_password; ?>">
                            </div>

                            <input type="text" name= "user_id" value="<?php echo $user_id ?>" hidden>

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