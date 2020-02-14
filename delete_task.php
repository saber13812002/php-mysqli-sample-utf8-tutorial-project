<?php

include("db.php");

if(isset($_GET['member_id'])) {
  $id = $_GET['member_id'];
  $query = "DELETE FROM core_members WHERE member_id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'member Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>
