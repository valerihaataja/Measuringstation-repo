<?php
$con = mysqli_connect("localhost","uusi","asd123","beissi");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else{
	  echo "Onnistui";
  }
?>