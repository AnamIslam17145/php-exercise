<?php

include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.css">
    <title>Products</title>
</head>

<body>
    <div class="container">
        <h4>This is product page</h4>
        <a href="add_product.php"><button class="submit-btn-class">Add Product</button></a>
        <br><br><br><br>

        <table id="product_table">
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
            $sql = "Select * from `product_table`";
            $result = mysqli_query($con, $sql);
            $serial = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $pid = $row['product_id'];
                $pname = $row['product_name'];
                $ptype = $row['product_catagory'];
                $cname = $row['product_company'];
                $edate = $row['creation_date'];
                $serial = $serial + 1;

                $rowcontrol = $serial % 2;

                echo '
                    <tr class="tr-class-'.$rowcontrol.'" id="tr-'.$pid.'"> 
                        <td>' . $serial . '</td>
                        <td>' . $pname . '</td>
                        <td>' . $ptype . '</td>
                        <td>' . $cname . '</td>
                        <td>' . $edate . '</td>
                        <td>
                        <a href="update_product.php?updateid=' . $pid . '"><button class="update-btn">Update</button></a> 
                        <a href="javascript:void(0)" onclick="delete_product('.$pid.')"><button class="delete-btn">Delete</button></a> 
                        </td>
                    </tr>
                    ';
                
            }
            ?>

    
            </tbody>
        </table>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#product_table').DataTable();
        });
    </script>

<script>
function delete_product($pid){
    
    var j_id = $pid;
    let text = "You Want to delete this "+j_id+" item?";

    if(confirm(text)==true)
    {
        x = j_id;
        jQuery.ajax({
            url:'delete_ajax.php',
            type: 'post',
            data:'id='+j_id,
            success: function(result){
                document.getElementById("tr-"+j_id).setAttribute("hidden",true);
                alert(result);
            }
        })
    }
    else{
        x = "canceled";
    }

    document.getElementById("confirm_check").innerHTML = x;
}
</script>
</body>

</html>