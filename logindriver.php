<?php
include "dbUpload.php";

$email = $_POST['email'];
$password = $_POST['password'];

    $findexist="SELECT * from alldrivers where email='".$email."'";
        $resultsearch=mysqli_query($conn,$findexist);
    $data = mysqli_fetch_array($resultsearch);

    
 
    if($data[0] >= 1) {
        if($data[2] == $password) {
            echo json_encode("true");
        } else {
            echo json_encode("wrongPassword");
        }
    } else {
        echo json_encode("noUser");
    }

    $conn->close();

?>