<?php 

    function passcomments(){
        $connect = mysqli_connect('localhost','root','','users');
        if ( mysqli_connect_errno() ) {
            echo 'connection failed ' . mysqli_connect_error();
        }
        
        $comment = mysqli_real_escape_string($connect,$_POST['trendscomment']);
        $query = "INSERT INTO fashiontrendcomment(usercomments) VALUES ('$comment')";
        $pass = mysqli_query($connect,$query);

        if ($pass) {
            echo 'comment passed ';
        }
    }

    passcomments();




?>