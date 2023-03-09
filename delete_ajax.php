<?php
    include('connection.php');

    $pid = $_POST['id'];

    $sql = "Delete from `product_table` where product_id=$pid";
    $result = mysqli_query($con, $sql);

    if($result)
    {
        //echo "Product deleted";
        //header('location:index.php');
        echo json_encode(array("statusCode"=>200));
        

    }
    else{
        die(mysqli_error($con));
        //echo json_encode(array("statusCode"=>201));
    }
?>

