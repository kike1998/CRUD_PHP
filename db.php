<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'bd_desarrolo_web'
) or die(mysqli_erro($mysqli));

?>
