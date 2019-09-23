<?php 
    // Include the database config file 
             $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname ="dropdown";
        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

     
    // Fetch all the country data 
    $query = "SELECT * FROM countries WHERE status = 1 ORDER BY country_name ASC"; 
    $result = mysqli_query($conn ,  $query); 
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>
<form action="" method="post">
    <!-- Country dropdown -->
    <select id="country" name="country">
        <option value="">Select Country</option>
         <?php 
    if($result->num_rows > 0){ 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['country_id'].'">'.$row['country_name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Country not available</option>'; 
    } 
    ?>
        
    </select>
	
    <!-- State dropdown -->
    <select id="state" name="state">
        <option value="">Select state</option>
    </select>
	
    <!-- City dropdown -->
    <select id="city" name="city">
        <option value="">Select city</option>
    </select>

</form>


<body>
</html>
<script>
    $(document).ready(function(){
    $('#country').on('change', function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'post',
                url:'ajax1.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    
    $('#state').on('change', function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajax1.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
});

</script>

