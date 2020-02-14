<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $name = $_POST['name'];
  $family = $_POST['family'];
  $query = "INSERT INTO core_members(name, family) VALUES ('$name', '$family')";
  $result = mysqli_query($conn, $query);
  if (!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');
}
