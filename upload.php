<?php 
if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
{

    $post_name=$_POST['name'];
    $post_ph=$_POST['phno'];
$fileName = $_FILES['userfile']['name'];

$tmpName  = $_FILES['userfile']['tmp_name'];

$fileSize = $_FILES['userfile']['size'];

$fileType = $_FILES['userfile']['type'];

$fp      = fopen($tmpName, 'r');

$content = fread($fp, filesize($tmpName));

$content = addslashes($content);

fclose($fp);

if(!get_magic_quotes_gpc())

{

$fileName = addslashes($fileName);

}

$conn=mysqli_connect("localhost","root","","dummy");


$query = "INSERT INTO files (name, size, type, content, patient_name, ph_no) ".

"VALUES ('$fileName', '$fileSize', '$fileType', '$content','$post_name',$post_ph)";

mysqli_query($conn,$query) or die('Error, query failed');

echo "
File $fileName uploaded
";

}
?>
<html>
<head>
<title>
FILE Upload
</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>


<form method="post" enctype="multipart/form-data">
<table width="350" border="0" cellspacing="1" cellpadding="1">
<tbody>
<tr>
<td width="246">

<div class="form-group">
<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
</div>
<div class="form-group">
<input id="userfile" type="file" name="userfile" /></td>
</div>
<div class="form-group">
<td width="80"><input id="upload" type="submit" name="upload" value=" Upload " /></td>
</div>
</tr>

</tbody>
</table>

    <div class="form-group">
      <label for="email">Patient Name</label>
      <input type="text" class="form-control" id="pname" placeholder="Patient Name " name="name">
    </div>
    <div class="form-group">
      <label for="PHONE ">Phone Number</label>
      <input type="text" class="form-control" id="phno" placeholder="Phone Number " name="phno">
    </div>
</form>

</body>
</html>
