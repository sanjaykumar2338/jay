<?php 
if(isset($_POST['submit'])){
    $to = "hiltworkdirectory@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $school_name = $_POST['school_name'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $graduation_year = $_POST['graduation_year'];
    
     $message = $first_name  . $last_name ."<br>" . $email ."<br>". $school_name ."<br>". $city ."<br>". $state ."<br>". $graduation_year."<br><br>" "\n\n" . $_POST['message'];
    

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>