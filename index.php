<?php

include 'connection.php';

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

    <link href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.css">
    <title>Products</title>
</head>

<body>
    <div class="container">
        <div class="mt-5">
            <div class="card">
                <div class="card-header">
                    <h4>This is product page</h4>
                </div>

                <div class="card-body">
                    <div class="my-2">
                        <a href="add_product.php"><button class="btn btn-primary btn-sm">Add Product</button></a>
                    </div>
                    <div class="my-4">
                        <table id="product_table" class="table">
                            <thead>
                                <tr>
                                    <th>Serial No.</th>
                                    <th>Product Name</th>
                                    <th>Product Catagory</th>
                                    <th>Company</th>
                                    <th>Data Insertion Date</th>
                                    <th>Operations</th>
                                </tr>

                            </thead>
                            <tbody>

                                <?php
                                $sql    = "Select * from `product_table`";
                                $result = mysqli_query($con, $sql);
                                $serial = 0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $pid    = $row['product_id'];
                                    $pname  = $row['product_name'];
                                    $ptype  = $row['product_catagory'];
                                    $cname  = $row['product_company'];
                                    $edate  = $row['creation_date'];
                                    $serial = $serial + 1;

                                    $rowcontrol = $serial % 2;

                                    echo '
                    <tr class="tr-class-' . $rowcontrol . '" id="tr-' . $pid . '">
                        <td>' . $serial . '</td>
                        <td>' . $pname . '</td>
                        <td>' . $ptype . '</td>
                        <td>' . $cname . '</td>
                        <td>' . $edate . '</td>
                        <td>
                        <a href="update_product.php?updateid=' . $pid . '"><button class="btn btn-primary btn-sm">Edit</button></a>
                        <a href="javascript:void(0)" onclick="delete_product(' . $pid . ')"><button class="btn btn-danger btn-sm">Delete</button></a>
                        </td>
                    </tr>
                    ';
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>





    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#product_table').DataTable();
        });
    </script>

    <script>
        function delete_product($pid) {

            var j_id = $pid;
            let text = "You Want to delete this item?";

            if (confirm(text) == true) {
                x = j_id;
                jQuery.ajax({
                    url: 'delete_ajax.php',
                    type: 'post',
                    data: 'id=' + j_id,
                    success: function(result) {
                        document.getElementById("tr-" + j_id).setAttribute("hidden", true);
                        alert(result);
                    }
                })
            } else {
                x = "canceled";
            }

            document.getElementById("confirm_check").innerHTML = x;
        }
    </script>
</body>

</html>