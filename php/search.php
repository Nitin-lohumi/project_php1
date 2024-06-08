
<?php
include_once "../connect.php";
$searchterm = mysqli_real_escape_string($con,$_POST['searchTerm']);
echo $searchterm;
?>