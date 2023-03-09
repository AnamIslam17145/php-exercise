<?php
    include('connection.php');

    if(isset($_GET['deleteid']))
    {
        $pid = $_GET['deleteid'];
    }

    $sql = "Delete from `product_table` where product_id=$pid";
    $result = mysqli_query($con, $sql);

    if($result)
    {
        //echo "Product deleted";
        header('location:index.php');

    }
    else{
        die(mysqli_error($con));
    }
?>