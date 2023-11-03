<?php  
    require ( 'connection.php' );

    session_start();
      
    $user_first_name = $_SESSION['user_first_name'];
    $user_last_name = $_SESSION['user_last_name'];

    if (!empty($user_first_name) && !empty($user_last_name)) {

        $sql3 = "SELECT * FROM product";
        $query3 = $conn->query($sql3);

        $data_list = array();

        while($data3 = mysqli_fetch_assoc($query3)) {
        $product_name = $data3['product_name'];
        $product_id   = $data3['product_id'];
        $data_list[$product_id] = $product_name;
        }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
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

                    <div class="container p-4">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method= "GET" >

                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Product Name </label>
                            <select name="product_name" class="form-select" aria-label="Default select example">
                              <?php

                                $sql = "SELECT * FROM product";

                                $query = $conn->query($sql);

                                while( $data = mysqli_fetch_assoc($query) ) {
                                $product_id        = $data['product_id'];
                                $product_name      = $data['product_name'];
                              ?>
                                <option value="<?php echo $product_id ?>"><?php echo $product_name ?></option>
                                <?php } ?>
                            </select>
                          </div>

                            <div class="text-center">
                               <button style="width:40%;" type="submit" class="btn btn-primary btn-lg btn-block">Generate Report</button>
                            </div>

                        </form>
                        <h1>Store Product</h1>
                        <?php 

                        // Report Store Data
                                if(isset($_GET['product_name'])) {
                                    $product_name = $_GET['product_name'];

                                    $sql1 = "SELECT * FROM store_product WHERE store_product_name = $product_name";

                                    $query1 = $conn->query($sql1);

                                    while($data1 = mysqli_fetch_array($query1)) {

                                    $store_product_quentity   = $data1['store_product_quentity'];
                                    $store_product_entry_date = $data1['store_product_entry_date'];
                                    $store_product_name       = $data1['store_product_name'];

                                    echo "<h2> $data_list[$store_product_name] </h2>";
                                    echo "<table border='1'><tr> <td>Store Date</td> <td>Amount</td> </tr>";
                                    echo "<tr> <td>$store_product_entry_date</td> <td>$store_product_quentity</td> </tr>";
                                    echo "</table>";
                                    }
                                }
                        ?>

                        <h1>Spend Product</h1>
                        <?php 

                            // Report Spend Data
                                if(isset($_GET['product_name'])) {
                                    $product_name = $_GET['product_name'];

                                    $sql4 = "SELECT * FROM spend_product WHERE spend_product_name = $product_name";

                                    $query4 = $conn->query($sql4);

                                    while($data4 = mysqli_fetch_array($query4)) {

                                    $spend_product_quentity   = $data4['spend_product_quentity'];
                                    $spend_product_entry_date = $data4['spend_product_entry_date'];
                                    $spend_product_name       = $data4['spend_product_name'];

                                    echo "<h2> $data_list[$spend_product_name] </h2>";
                                    echo "<table border='1'><tr> <td>Spend Date</td> <td>Amount</td> </tr>";
                                    echo "<tr> <td>$spend_product_entry_date</td> <td>$spend_product_quentity</td> </tr>";
                                    echo "</table>";
                                    }
                                }
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