<?php

$connect = mysqli_connect("localhost","root","","orderingsystem");
$output = '';
$sql = "SELECT * FROM food where countryid = '".$_POST["countrywisefoodid"]."'";
$result = mysqli_query($connect, $sql);
$output = '<option value="">Select Food</option>';
while($row = mysqli_fetch_array($result)){

    $output .= '<option value="'.$row["foodid"].'">'.$row["foodtypes"].'</option>';
}

echo $output;

?>