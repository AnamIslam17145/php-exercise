<?php

include 'connection.php';

if ( isset( $_POST['submit'] ) ) {
    $pname = $_POST['pname'];
    $ptype = $_POST['ptype'];
    $cname = $_POST['cname'];
    $edate = $_POST['edate'];

    $sql = "insert into `product_table` (product_name, product_catagory, product_company, creation_date) values
    ('$pname', '$ptype', '$cname', '$edate')";
    $result = mysqli_query( $con, $sql );

    if ( $result ) {
        //echo "Data Inserted";
        header( 'location:index.php' );
    } else {
        die( mysqli_error( $con ) );
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- ./Bootstra CDN-->
    <title>Add product</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
        <div class="card px-0">
            <div class="card-header">
            <h2>Add new product</h2>
            </div>

            <form method="post">
            <div class="card-body">
                <div class="row form-group my-2">
                        <div class="col-sm-12 col-md-4">
                            <label for="pname">Product Name:</label>
                        </div>
                        <div class="col-sm-12 col-md-8">
                            <input type="text" id="pname" name="pname" class="form-control" placeholder="Enter Your Product Name" autocomplete="off" required>
                        </div>
                </div>

                <div class="row form-group my-2">
                        <div class="col-sm-12 col-md-4">
                            <label for="ptype">Type:</label>
                        </div>
                        <div class="col-sm-12 col-md-8">
                            <select id="ptype"  class="form-control"  name="ptype" required>
                                <option value="">-- Please select an option --</option>
                                <?php
                                $sql    = "Select * from `product_catagory_table`";
                                $result = mysqli_query( $con, $sql );
                                while ( $row = mysqli_fetch_assoc( $result ) ) {
                                    $pcatagory = $row['product_catagory'];
                                    echo '<option value=' . $pcatagory . '>' . $pcatagory . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                </div>

                <div class="row form-group my-2">
                        <div class="col-sm-12 col-md-4">
                        <label for="cname">Company:</label>
                        </div>
                        <div class="col-sm-12 col-md-8">
                        <input type="text" id="cname" name="cname" class="form-control" placeholder="Enter Company Name Here" autocomplete="on" required>
                        </div>
                </div>

                <div class="row form-group my-2">
                        <div class="col-sm-12 col-md-4">
                        <label for="edate">Product Entry Date:</label>
                        </div>
                        <div class="col-sm-12 col-md-8">
                        <input type="date" id="edate"  class="form-control" name="edate" required>
                        </div>
                </div>

            
           
            
      
            <button class="btn btn-primary btn-sm" type="submit" name="submit">Add Product</button>

        </form>
            </div>
        </div>
        </div>


    </div>
</body>

</html>
