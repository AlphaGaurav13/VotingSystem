<?php
 $connect = mysqli_connect("localhost", "root", "", "voting") or die("connection lost");


  if($connect) {
    echo "Connection successful";
  }else {
    echo "Connection failed";
   }
?>