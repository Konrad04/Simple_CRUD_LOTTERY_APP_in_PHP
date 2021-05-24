<?php
include "database.php";

  date_default_timezone_set("Europe/Warsaw");
  $czas = date("Y-m-d H:i:s", time());  
  
  $box = mysqli_real_escape_string($con,implode(",",$_POST["boxes"]));
  $imie = mysqli_real_escape_string($con, $_POST["firstn"]);
  $miejsce = mysqli_real_escape_string($con, $_POST["place_where"]);
  $N=count($_POST["boxes"]);
  $id = mysqli_real_escape_string($con,$_POST['id']);
  
  


if (isset($_POST["zatwierdz"])) {
if ($N != 6 || empty($box) || empty($miejsce) || empty($imie)){
  $error = "Proszę wybrać 6 liczb i wypełnić wszystkie pola tekstowe";
    header("Location: index.php?error=".urlencode($error));
    exit();
    } else {
        mysqli_query($con,"INSERT INTO numbersSaved (numbers, fname, place, add_time)
        VALUES ('$box','$imie','$miejsce','$czas')");
        header("Location: index.php");
        exit();
        }
      }
      

  


if (isset($_POST['usun'])) {
 
	mysqli_query($con, "DELETE FROM numberssaved WHERE id=$id");
  header('location: index.php');
  exit();
}


if (isset($_POST['update'])) {
 
  if ($N != 6 || empty($box) || empty($miejsce) || empty($imie)){
    $error = "Proszę wybrać 6 liczb i wypełnić wszystkie pola tekstowe";
      header("Location: index.php?error=".urlencode($error));
      exit();
      } else {
        mysqli_query($con, "UPDATE numberssaved SET numbers='$box', fname='$imie', place='$miejsce' WHERE id=$id");
        header('location: index.php');
        exit();
        }
      
}

?>