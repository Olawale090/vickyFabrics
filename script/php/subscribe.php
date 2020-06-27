<?php 

function subscribe(){

    $connection = mysqli_connect('localhost','root','','users');

    if (mysqli_connect_errno() ) {
        echo "Database connection failed ";
    }

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    
    if (!empty($email)) {
        $emailsanitized = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (filter_var($emailsanitized, FILTER_VALIDATE_EMAIL)) {
            
            $query = "INSERT INTO newsletter_subscriber(email) VALUES ('$email')";
            $passQuery = mysqli_query($connection,$query);

            if($passQuery){

                echo " Thanks for subscribing... ". $email;

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

