<?php
session_start();
include("connect.php");

$votes = $_POST['gvotes'];
$total_votes = $votes + 1;
$gid = $_POST['gid'];
$uid = $_SESSION['userdata']['id'];

$update_votes = mysqli_query($connect, "UPDATE user SET votes=$total_votes WHERE id=$gid");
$update_user_status = mysqli_query($connect, "UPDATE user SET satus=1 WHERE id=$uid");

if($update_votes && $update_user_status) {
   $groups = mysqli_query($connect, "SELECT * FROM user WHERE role=2");
   $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);

   $_SESSION['userdata']['satus'] = 1;
   $_SESSION['groupsdata'] = $groupsdata; 

   echo '
      <script>
         alert("Voted Successfully");
         window.location = "../routes/VotingDashboard.php";
      </script>
   ';
}else 
{
  echo '
      <script>
          alert("Error Occured");
          window.location = "../routes/VotingDashboard.php";
      </script>  
  ';
}

?>