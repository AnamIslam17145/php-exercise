<?php

include 'connection.php';

$pid = $_GET['updateid'];

$sql = "Select * from `product_table` where product_id='$pid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$pname = $row['product_name'];
$ptype = $row['product_catagory'];
$cname = $row['product_company'];
$edate = $row['creation_date'];

if (isset($_POST['submit'])) {
    $pname = $_POST['pname'];
    $ptype = $_POST['ptype'];
    $cname = $_POST['cname'];
    $edate = $_POST['edate'];

    $sql = "Update `product_table` Set product_name='$pname', product_catagory='$ptype', product_company='$cname', creation_date='$edate' where product_id=$pid";
    $result = mysqli_query($con, $sql);

    if ($result) {
        //echo "Data Updated";
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
    <title>exp Login</title>
</head>

<body>
    <div class="container">
        <h2>HTML Forms For Updating Document</h2>

        <form method="post">
            <label>Product Name:</label>
            <input type="text" id="pname" name="pname" placeholder="Enter Your Product Name" autocomplete="off" value=<?php echo $pname; ?>>
            <br><br>
            <label>Type:</label>
            
            <select id="ptype" name="ptype" required>
                
                <option selected disabled value=<?php echo $ptype ?>><?php echo $ptype ?></option>
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
            <label>Company:</label>
            <input type="text" id="cname" name="cname" placeholder="Enter Company Name Here" autocomplete="on" value=<?php echo $cname; ?>>
            <br><br>
            <label>Entry Date:</label>
            <input type="date" id="edate" name="edate" value=<?php echo $edate; ?>>
            <br><br><br>
            <button class="submit-btn-class" type="submit" name="submit">Submit</button>            
        </form>
    </div>

</body>

</html>