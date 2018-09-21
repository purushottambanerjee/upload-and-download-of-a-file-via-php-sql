

<?php
$conn=mysqli_connect("localhost","root","","dummy");



if(isset($_GET['id'])) { 
    // if id is set then get the file with the id from database

$id = $_GET['id'];


$query = "SELECT name, type, size, content FROM files WHERE ph_no = $id";

$result = mysqli_query($conn,$query) or die('Error, query failed');

list($name, $type, $size, $content) =

mysqli_fetch_array($result);

header("Content-length: $size");
header("Content-type: $type");
header("Content-Type: application/force-download"); 
header("Content-Disposition: attachment; filename=$name");
header("Content-Type: application/octet-stream;");


 echo $content; 

}
?>