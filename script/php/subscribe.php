<?php 

function subscribe(){

    $connection = mysqli_connect('localhost','root','','users');

    if (mysqli_connect_errno() ) {
        echo "Database connection failed ";
    }

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    
    if (!empty($email)) {
        $emailsanitized = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (filter_var($emailsanitized, FILTER_VALIDATE_EMAIL)) {
            
            $query = "INSERT INTO newsletter_subscriber(email,username) VALUES ('$email','$username')";
            $passQuery = mysqli_query($connection,$query);

            if($passQuery){

                echo " Thanks for subscribing... ". $email . 'username '. $username . 'was found';

            } else {

                echo " Query failed ";

            }

        } else {

            echo " Please enter a valid email address ";

        }
        
    } else {
        echo " Please enter your email address ";
    }
    
}

subscribe();

?>

