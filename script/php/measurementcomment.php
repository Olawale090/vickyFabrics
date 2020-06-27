<?php 
    function passcomments(){
        $connect = mysqli_connect('localhost','root','','users');

        if (mysqli_connect_errno()) {
            echo "Database connection failed!!! ";
        }

        $comment = mysqli_real_escape_string($connect,$_POST['measurementcomment']);
        $query = "INSERT INTO measurementcomment(usercommentS) VALUES ('$comment')";
        $pass = mysqli_query($connect,$query);

        if (!$pass) {
            echo "Comment not passed ..."; 
        }
    }

    passcomments();

?>