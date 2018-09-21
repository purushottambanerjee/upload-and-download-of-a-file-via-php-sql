

Download File From MySQL

<?php

$conn=mysqli_connect("localhost","root","","dummy");



$query = "SELECT id, name FROM files where ph_no=".$_GET['id'];

$result = mysqli_query($conn,$query) or die('Error, query failed');

if(mysqli_num_rows($result) == 0)

{

echo "Database is empty";

}

else

{

while(list($id, $name) = mysqli_fetch_array($result))

{

?>

<a href="download2.php?id=<?php echo $id;?>"><?php echo $name; ?></a>

<?php

}

}

?>

