<?php
    function cuttingfetch (){
        $connect = mysqli_connect("localhost","root","","users");
        if (mysqli_connect_errno()) {
            echo "connection failed ";
        }

        $query = "SELECT * FROM cuttingcomment ORDER BY timeofpost DESC";
        $passQuery = mysqli_query($connect,$query);
        $fetchassoc = mysqli_fetch_all($passQuery, MYSQLI_ASSOC);

        if ($fetchassoc) {
            echo json_encode($fetchassoc) ;
        }else {
            echo " fetching comment process failed ";
        }


    }

    cuttingfetch();

?>