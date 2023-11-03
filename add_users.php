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
    <title>Add Users</title>
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
                           if(isset($_GET['user_first_name'])) {
                               $user_first_name = $_GET['user_first_name'];
                               $user_last_name  = $_GET['user_last_name'];
                               $user_email      = $_GET['user_email'];
                               $user_password   = $_GET['user_password'];

                               $sql = "INSERT INTO users (user_first_name, user_last_name, user_email, user_password)
                                       VALUES ('$user_first_name', '$user_last_name', '$user_email', '$user_password')";

                               if($conn->query($sql) == TRUE) {
                                   echo 'Data Inserted!';
                               } else {
                                   echo 'not Inserted!';
                               }
                           }    
                       ?>

                       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method= "GET" >
                            <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Your First Name</label>
                              <input type="text" name="user_first_name" class="form-control" placeholder="Enetr your first name">
                            </div>

                            <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Your Last Name</label>
                              <input type="text" name="user_last_name" class="form-control" placeholder="Enetr your last name">
                            </div>

                            <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Email address</label>
                              <input type="email" class="form-control" name="user_email" placeholder="name@example.com">
                            </div>

                            <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Your Password</label>
                              <input type="password" class="form-control" name="user_password" placeholder="Enter your new password">
                            </div>

                            <div class="text-center">
                              <button style="width:40%;" type="button" class="btn btn-primary btn-lg btn-block"> Create</button>
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