<?php

function load_typeoffood(){
    $connect = mysqli_connect("localhost","root","","orderingsystem");
    $output = '';
    $sql = "SELECT * from typeoffood";
    $result = mysqli_query($connect, $sql);

    while($row = mysqli_fetch_array($result)){
        $output .= '<option value="'.$row["countryid"].'">'.$row["countrywisefood"].'</option>';
    }

    return $output;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Ordering System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js">
<script src="jquery.js"></script>
<style>
    h1{
        margin-left:380px;
    }
</style>
</head>
<body>
    <h1>Food Ordering System</h1>
    <div class="container">
        <div class="form-group">
        <label for="Type Of Food">Type of food you want:</label>
        <select name="typeoffood" id="typeoffood" class="form-control">
        <option value="">Select Type Of Food</option>
        <?php echo load_typeoffood(); ?>
        </select>
        </div>

        <div class="form-group">
        <label for="Select Food">Select Food:</label>
        <select name="food" id="food" class="form-control">
        <option value="">Select Food</option>
        </select>
        </div>
        
    </div>
    
</body>
</html>

<script>
$(document).ready(function(){
    $('#typeoffood').change(function(){
        var country_id = $(this).val();
        $.ajax({
            url:"fetch_food.php",
            method:"POST",
            data:{countrywisefoodid:country_id},
            dataType:"text",
            success:function(data)
            {
                $('#food').html(data);
            }
        });
    });
});
</script>