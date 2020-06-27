<?php 

function fetchcomments(){
    $connect = mysqli_connect("localhost","root","","users");
    if (mysqli_connect_errno()) {
        
        echo " Database connection error ". mysqli_connect_error();

    }

    $query = " SELECT * FROM readers_comment ORDER BY timeofpost DESC";
    $passQuery = mysqli_query($connect,$query);
    $fetchassoc = mysqli_fetch_all($passQuery, MYSQLI_ASSOC);
    

    if ($fetchassoc) {
        echo json_encode($fetchassoc) ;
    } else {
        echo " query failed for some strange reasons ";
    }
    
}

fetchcomments();

?>