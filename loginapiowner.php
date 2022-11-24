<?php

$email = $_POST['email'];
$password = $_POST['password'];
// $email = "example@email.com";
// $password = "12345678";

// Create connection
$conn = new mysqli("localhost:3308", "root", "", "ecom");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


    $findexist="SELECT * from allsellers where email='".$email."'";
        $resultsearch=mysqli_query($conn,$findexist);
    $data = mysqli_fetch_array($resultsearch);

   
    if($data[0] >= 1) {
        if($data[3] == $password) {
            echo json_encode("true");
        } else {
            echo json_encode("wrongPassword");
        }
    } else {
        echo json_encode("noUser");
    }


    $conn->close();
?>