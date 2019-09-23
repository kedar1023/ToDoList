<?php

function load_typeoffood(){
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

