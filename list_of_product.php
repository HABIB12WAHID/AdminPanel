<?php  
    require ('connection.php');

    session_start();
      
    $user_first_name = $_SESSION['user_first_name'];
    $user_last_name = $_SESSION['user_last_name'];

    if (!empty($user_first_name) && !empty($user_last_name)) {

    $sql1 = "SELECT * FROM category";
    $query1 = $conn->query($sql1);

    $data_list = array();

    while($data1 = mysqli_fetch_assoc($query1)) {
    $category_name = $data1['category_name'];
    $category_id = $data1['category_id'];
    $data_list[$category_id] = $category_name;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Product </title>
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

                    <div class="container py-5">
                       <?php  
                            $sql = "SELECT * FROM product";

                            $query = $conn->query($sql);

                            echo "<table class='table'>
                                    <tr class='thead'> 
                                       <th> Product Name </th> 
                                       <th> Category </th> 
                                       <th> Code </th>
                                       <th> Action </th>
                                    </tr>";
                                    while( $data = mysqli_fetch_assoc($query) ) {
                                        $product_id        = $data['product_id'];
                                        $product_name      = $data['product_name'];
                                        $product_category  = $data['product_category'];
                                        $product_code      = $data['product_code'];

                                            echo "<tr>
                                                    <td> $product_name </td>
                                                    <td> $data_list[$product_category] </td>
                                                    <td> $product_code </td>
                                                    <td> <a href='edit_product.php?id=$product_id' class='btn btn-success py-0'> Edit </a> </td>
                                                </tr>";
                                        }
                            echo "</table>";
                        ?>
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