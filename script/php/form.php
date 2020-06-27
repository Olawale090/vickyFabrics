<?php 

/************* NOTICE TO THE PHP GUY WORKING ON THIS LATER ***************** 

    AJAX can not take in more than one input in a script i.e. you can pass an input with AJAX
    Becareful not to echo more than required in the PHP file - it can become a bottleneck in AJAX
    that means concatenating HTML tags should be avoided when dealing with AJAX
******************/
function subscribe() {    

    $connect = mysqli_connect("localhost","root","","users");

    if (mysqli_connect_errno() ) {

        echo " connection failed ";

    } 

    // $username = mysqli_real_escape_string ($connect, $_POST['username']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);

    // if (isset($_POST['username'])) {
    //     $query = " INSERT INTO newsletter_subscriber(username) VALUES ('$username')";
    //     $pass = mysqli_query($connect,$query);

    //         if ($pass) {
    //                 echo "... user added : " . $username;
    //             } else {
    //             echo  " Registration failed";
    //         }
    // }

    if (isset($_POST['email'])) {
        $query = " INSERT INTO newsletter_subscriber(email) VALUES ('$email')";
        $pass = mysqli_query($connect,$query);

            if ($pass) {
                    echo "... user added : " . $email;
                } else {
                echo  " Registration failed";
            }
    }
        

    

}

subscribe();


?>
