<?php
include("connect.php");

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role = $_POST['role'];

if ($password == $cpassword) {
  move_uploaded_file($tmp_name, "../uploads/$image");
  $insert = mysqli_query($connect, "INSERT INTO user (name, mobile, password,address, photo, role, satus, votes) VALUES ('$name', '$mobile', '$password', '$email','$image', '$role', 0, 0)");

  if ($insert) {
    echo '
      <script>
      alert("Registration Successful");
      window.location = "../routes/login.html";
      </script>
      
      ';
  } else {
    echo '
      <script>
        alert("Some Error Occured");
        window.location = "../routes/register.html"; 
      </script>
      ';
  }
} else {
  echo '
      <script>
      alert("Password Not Matched");
      window.location = "../routes/register.html";
      </script>
    ';
}
