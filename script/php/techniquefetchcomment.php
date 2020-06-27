<?php
    function fetchtechniquecomment(){
        $connect = mysqli_connect('localhost','root','','users');

        if (mysqli_connect_errno()) {
            echo " Database connection failed...";
        }

        $query = "SELECT * FROM techniquecomment ORDER BY timeofpost DESC";
        $pass = mysqli_query($connect,$query);
        $fetchassoc = mysqli_fetch_all($pass, MYSQLI_ASSOC);

        if ($fetchassoc) {
            echo json_encode($fetchassoc);
        }else{
            echo "fetching comment process failed...";
        }
    }

    fetchtechniquecomment();
?>