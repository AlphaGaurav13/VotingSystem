<?php

session_start();
if (!isset($_SESSION['userdata'])) {
  header("location: ../routes/login.html");
}

$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];

if ($_SESSION['userdata']['satus'] == 0) {
  $satus = '<b style="color: red;">Not Voted</b>';
} else {
  $satus = '<b style="color: green;">Voted</b>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/vd.css" />
  <title>Dashboard</title>
</head>

<body>
  <nav>
  <a href="../routes/login.html"><button type="submit">Back</button></a>
    

    <h1>Online Voting System</h1>
    <a href="logout.php"><button type="submit">Logout</button></a>
    

  </nav>
  <div class="contenbox">


    <div id="profile">
      <h1>Profile</h1>
      <img src="../uploads/<?php echo $userdata['photo']; ?>" height="200px" width="200px" /><br /><br />
      <div>
        <b>Name: </b> <?php echo $userdata['name']; ?><br /><br />
        <b>Mobile Number: </b> <?php echo $userdata['mobile']; ?><br /><br />
        <b>Email: </b> <?php echo $userdata['address']; ?><br /><br />
        <b>satus: </b> <?php echo $satus; ?><br /><br />
      </div>

    </div>
    <div id="group">
      <?php
      if ($_SESSION['groupsdata']) {
        for ($i = 0; $i < count($groupsdata); $i++) {
      ?>
          <div class="groupbox">
            <img style="float: right" src="../uploads/<?php echo $groupsdata[$i]['photo']; ?>" height="100" width="100" /><br /><br />
            <b>Group Name: </b> <?php echo $groupsdata[$i]['name']; ?><br />
            <br>Votes: </b> <?php echo $groupsdata[$i]['votes']; ?><br /><br />
            <form action="../api/vote.php" method="POST">
              <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']; ?>" />
              <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']; ?>" />

              <?php
                 if($_SESSION['userdata']['satus'] == 0) {
                     ?>
                       <input type="submit" name="votebtn" value="Vote" id="votebtn" />

                     <?php
                 }else {

                  ?>
                      <button disabled  type="button" name="votebtn" value="vote" id="voted" >Voted</button>
                  <?php
                 }
             ?>
            </form>
          </div>
      <?php
        }
      } else {
      }
      ?>
    </div>


  </div>

</body>

</html>