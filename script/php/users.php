<?php 
$connect = mysqli_connect("localhost","root","","users");

    if (mysqli_connect_errno() ) {

        echo " connection failed ";

    } 

$query = " SELECT * FROM newsletter_subscriber";
$fetch = mysqli_query($connect,$query);
$array = mysqli_fetch_all($fetch, MYSQLI_ASSOC);

echo  json_encode($array) ;


?>

