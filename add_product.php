<?php

include 'connection.php';

if (isset($_POST['submit'])) {
    $pname = $_POST['pname'];
    $ptype = $_POST['ptype'];
    $cname = $_POST['cname'];
    $edate = $_POST['edate'];

    $sql = "insert into `product_table` (product_name, product_catagory, product_company, creation_date) values 
    ('$pname', '$ptype', '$cname', '$edate')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        //echo "Data Inserted";
        header('location:products.php');
    } else {
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Add product</title>
</head>

<body>
    <div class="container">
        <h2>Add new product</h2>
        
        <form method="post">
            <label class="labelClass">Product Name:</label>
            <input type="text" id="pname" name="pname" placeholder="Enter Your Product Name" autocomplete="off" required>
            <br><br>
            <label class="labelClass">Type:</label>
            <!--
            <input type="text" id="ptype" name="ptype" placeholder="Enter Product Type Here" autocomplete="on">
            -->
            <select id="ptype" name="ptype" required>
                <option selected disabled value=""></option>
                <?php 
                $sql= "Select * from `product_catagory_table`";
                $result = mysqli_query($con, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    $pcatagory = $row['product_catagory'];
                    echo '<option value='.$pcatagory.'>'.$pcatagory.'</option>';
            }
                ?>
            </select>
            
            <br><br>
            <label class="labelClass">Company:</label>
            <input type="text" id="cname" name="cname" placeholder="Enter Company Name Here" autocomplete="on" required>
            <br><br>
            <label class="labelClass">Product Entry Date:</label>
            <input type="date" id="edate" name="edate" required>
            <br><br><br>
            <button class="submit-btn-class" type="submit" name="submit">Add Product</button>
            
        </form>
        <br><br>
        
    </div>
</body>

</html>