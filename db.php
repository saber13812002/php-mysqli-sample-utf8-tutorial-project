<?php
session_start();
header('Content-type: text/html; charset=UTF-8');

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'tamahdi_ali'
) or die(mysqli_erro($mysqli));

$conn -> set_charset("utf8");



?>
