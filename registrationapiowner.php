<?php
$email = $_POST['email'];
$password = $_POST['password'];
$lat = (double)$_POST['lat'];
$lng = (double)$_POST['lng'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$shop_name = $_POST['shop_name'];

$zero = 0;

// Create connection
$conn = new mysqli("localhost:3308", "root", "", "ecom");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



    $findexist="SELECT * from allsellers where email='$email'";
        $resultsearch=mysqli_query($conn,$findexist);
    if(mysqli_num_rows($resultsearch)>0)
    {
           while($row=mysqli_fetch_array($resultsearch))
          {
              $result["success"] = "3";
              $result["message"] = "user Already exist";
              echo json_encode($result);
              mysqli_close($conn);
          }
  }

else{
    $sql = "INSERT INTO allsellers (shop_name, email, password, lat, lng, address, phone, isRestrict) VALUES ('$shop_name', '$email', '$password', '$lat', '$lng', '$address', '$phone', '$zero');";
    if ( mysqli_query($conn, $sql) ) {
        $result["success"] = "1";
        $result["message"] = "Registration success";
        echo json_encode($result);
        mysqli_close($conn);
    } else {
        $result["success"] = "0";
        $result["message"] = "error in Registration";
        echo json_encode($result);
        mysqli_close($conn);
    }
}




?>