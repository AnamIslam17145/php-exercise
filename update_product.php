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
        header('location:index.php');
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
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- ./Bootstra CDN-->

    <title>Update Product</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="card px-0">
                <div class="card-header">
                    <h2>HTML Forms For Updating Document</h2>
                </div>

                <form method="post">
                    <div class="card-body">
                        <div class="form-group row my-2">
                            <div class="col-sm-12 col-md-4">
                                <label for="pname">Product Name:</label>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <input type="text" id="pname" name="pname" placeholder="Enter Your Product Name" autocomplete="off" value="<?php echo $pname; ?>">
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <div class="col-sm-12 col-md-4">
                                <label for="ptype">Type:</label>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <select id="ptype" name="ptype" required>

                                    <option selected value="<?php echo $ptype ?>"><?php echo $ptype ?></option>
                                    <?php
                                    $sql = "Select * from `product_catagory_table`";
                                    $result = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $pcatagory = $row['product_catagory'];
                                        echo '<option value=' . $pcatagory . '>' . $pcatagory . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <div class="col-sm-12 col-md-4">
                                <label for="cname">Company:</label>
                            </div>
                            <div class="col-sm-12 col-md-8">
                            <input type="text" id="cname" name="cname" placeholder="Enter Company Name Here" autocomplete="on" value="<?php echo $cname; ?>">
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <div class="col-sm-12 col-md-4">
                            <label for="edate">Entry Date:</label>
                            </div>
                            <div class="col-sm-12 col-md-8">
                            <input type="date" id="edate" name="edate" value="<?php echo $edate; ?>">
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                    </div>
                    
                </form>

            </div>
        </div>



    </div>

</body>

</html>