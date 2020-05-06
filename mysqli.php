<?php

$connection=new mysqli("localhost","root","","wtl");
if ($connection -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }

?>
