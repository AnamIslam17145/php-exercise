<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <input type="textbox" id="id1" required>
    <a href="javascript:void(0)" onclick="delete_product()">Click here</a>
    <p id="confirm_check"></p>
</body>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>
function delete_product(){
    
    var j_id = jQuery('#id1').val();
    let text = "You Want to delete this item?";

    if(confirm(text)==true)
    {
        x = j_id;
        jQuery.ajax({
            url:'delete_ajax.php',
            type: 'post',
            data:'id='+j_id,
            success: function(result){
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
</html>