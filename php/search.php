
<?php
session_start();
include_once "../connect.php";
$outgoing_id = $_SESSION["unique_id"];
$searchterm = mysqli_real_escape_string($con,$_POST['searchTerm']);
$output ="";
$sql = mysqli_query($con , "SELECT * FROM data_reistered WHERE NOT unique_id = '$outgoing_id'");
echo "abjh";
?>