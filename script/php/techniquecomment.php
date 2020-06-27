<?php
    function technique_comment(){
        $connect = mysqli_connect('localhost','root','','users');
        
        if (mysqli_connect_errno()) {
            echo " Database connection failed ";
        }

        $comment = mysqli_real_escape_string($connect,$_POST['techniquecomment']);
        $query = "INSERT INTO techniquecomment(usercomments) VALUES ('$comment')";
        $pass = mysqli_query($connect,$query);

        if (!$pass) {
            echo "Comment passing failed...";
        }
    }

    technique_comment();
?>