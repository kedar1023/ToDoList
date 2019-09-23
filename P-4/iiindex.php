<?php

function city(){
    $connect = mysqli_connect("localhost","root","","dropdown");
    $output = '';
    $sql = "SELECT * from countries";
    $result = mysqli_query($connect, $sql);

    while($row = mysqli_fetch_array($result)){
        $output .= '<option value="'.$row["country_id"].'">'.$row["country_name"].'</option>';
    }

    return $output;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"> </script>
<script src="jquery-3.4.1.min.js"></script>
</head>
<style>

html
{
	
  background: #100a1c;
  background-image:
    radial-gradient(50% 30% ellipse at center top, #201e40 0%, rgba(0,0,0,0) 100%),
    radial-gradient(60% 50% ellipse at center bottom, #261226 0%, #100a1c 100%);
  background-attachment: fixed;
  color: #6cacc5;


}

</style>
<body>
<center>
    <h1> Registeration For DevFest2019</h1>
    <div class="container">
        
        <table border="0" >

                    <tr>
                        <td>Name:</td>
                        <td> <input type="text" id="name"></td>
                        
                        
                    </tr>
                    <tr>  
                        <td><br>Address:</td>
                        
                        <td><br><textarea></textarea></td>
                    </tr>
                    <tr>  
                        <td>Choose Your <br>Gender:</td>
                        <td>
                            <br>
                            <input type="radio" name="Gender">Male:<br>
                            <input type="radio" name="Gender">Female<br>
                            <input type="radio" name="Gender" >Other
                        </td>
                    </tr>
                      <tr>
                          <td><br>Choose Your<br> BirthDate:</td>
                          <td><br><input type="date"></td>
                      
                      </tr>
      
                      <tr>
                          <td><br>Choose Your <br> Qualification: </td>
                          <td><br>
                              <select  id="select">
                                  <option > Choose Here</option>
                                  <option value=" ">SSC</option>
                                  <option value=" "> Diploma*</option>
                                  <option value=" ">B-TECH</option>
                                  <option value=" ">M-TECH</option>
      
                              </select>
                          </td>
      
                      </tr>
                      
                      <tr>
      
                              <td><br> Email:</td>
                              <td><br><input type="text" id="mail"></td>
          
                      
                      
                      <tr>
      
                          <td><br> Contact Number:</td>
                          <td><br><input type="tel" id="num"></td>
      
                      </tr>
      
      
                      <tr>
      
                              <td><br> Comments:</td>
                              <td><br><textarea></textarea></td>
          
                      </tr>
                      <tr>
                              <td><br>Contribution Towards</td>
                              <td> <br>                      
                                   <input type="checkbox" >App Developement <br>
                                   <input type="checkbox"> Web-Developement<br>
                                   <input type="checkbox"> Other<br>
                                   
                              </td>
      
                      </tr>
                      
                          
                  
            
            <tr>
                                <td>
                                       <br>Chooose Country  <br>                                   
                                </td>
            <td>
            <select name="select country" id="country" class="form-control">
            <option value="">Country</option>
            <?php echo city(); ?>
            </select>
            </td>
        </tr>
        
          <tr>
          
           <td>
                <br>Select State
           </td>
          <td>
         <select name="state" id="state" >
        <option value="">State</option>
        </select>
        </td>
        </tr>
         <tr>  
         <td>
            Select City
         </td> 
         <td>
        <select name="Cities" id="cities" >
        <option value="">cities</option>
        </select>
        </td>
         </tr>
                        </table>
</body>
</html>

<script>
$(document).ready(function(){
    $('#country').change(function(){
        var country_id = $(this).val();
        $.ajax({
            url:"tate.php",
            method:"POST",
            data:{countrywiseState:country_id},
            dataType:"text",
            success:function(data)
            {
                $('#state').html(data);
            }
        });
    });
});

$(document).ready(function(){
    $('#state').change(function(){
        var state_id = $(this).val();
        $.ajax({
            url:"tate.php",
            method:"POST",
            data:{statewisecities:state_id},
            dataType:"text",
            success:function(data)
            {
                $('#cities').html(data);
            }
        });
    });
});
</script>


