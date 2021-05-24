<?php

$con = mysqli_connect("server", "user", "password");
 

if(mysqli_connect_errno()) {
  echo "Nie można połączyć się z bazą danych: " . $mysqli_connect_error();
} 
?>