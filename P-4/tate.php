<?php

$connect = mysqli_connect("localhost","root","","dropdown");
$output = '';
if(!empty($_POST["countrywiseState"]))
{ 
$sql = "SELECT * FROM states where country_id = '".$_POST["countrywiseState"]."'";
$result = mysqli_query($connect, $sql);
$output = '<option value="">Select State</option>';
while($row = mysqli_fetch_array($result)){

    $output .= '<option value="'.$row["state_id"].'">'.$row["state_name"].'</option>';
}

echo $output;
}
 
$sql = "SELECT * FROM cities where state_id = '".$_POST["statewisecities"]."'";
$result = mysqli_query($connect, $sql);
$output = '<option value="">Select cities</option>';
while($row = mysqli_fetch_array($result)){

    $output .= '<option value="'.$row["city_id"].'">'.$row["city_name"].'</option>';
}

echo $output;


S

?>
