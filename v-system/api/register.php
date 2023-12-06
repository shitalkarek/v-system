<?php
include("connect.php");

$name = $_POST['name'];
$rollnumber = $_POST['rollnumber'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$address = $_POST['address'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role = $_POST['role'];

// Check if the mobile number already exists in the database
$check_rollnumber = mysqli_query($connect, "SELECT * FROM user WHERE rollnumber = '$rollnumber'");
if (mysqli_num_rows($check_rollnumber) > 0) {
    echo '
    <script>
        alert("roll number already exists. Please use a different roll number.");
        window.location = "../routes/registration.html";
    </script> 
    ';
} else {
    if ($password == $cpassword) {
        move_uploaded_file($tmp_name, "../uploads/$image");
        $insert = mysqli_query($connect, "INSERT INTO user (name, rollnumber, address, password, photo, role, status, votes) 
        VALUES ('$name', '$rollnumber', '$address', '$password', '$image', '$role', 0, 0)");

        if ($insert) {
            echo '
            <script>
                alert("Registration successful");
                window.location = "../";
            </script> 
            ';
        } else {
            echo '
            <script>
                alert("Some error occurred");
                window.location="../routes/registration.html";
            </script> 
            ';
        }
    } else {
        echo '
        <script>
            alert("Password and confirm password do not match");
            window.location = "../routes/registration.html";
        </script> 
        ';
    }
}
?>