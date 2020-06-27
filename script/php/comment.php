<?php

    function passcomment(){
        $connect = mysqli_connect("localhost","root","","users");
        if ( mysqli_connect_errno() ) {
            
            echo " Database connection error ". mysqli_connect_error();

        }

        $comments = mysqli_real_escape_string($connect,$_POST['commentpost']);
        $query = " INSERT INTO readers_comment(comments) VALUES ('$comments') ";
        $passQuery = mysqli_query($connect,$query);

        if ($passQuery) {
            echo "Your comment is passed... " . $comments . " was passed ";
        } else {
            echo " query failed for some strange reasons ";
        }
        
    }

    passcomment();



?>