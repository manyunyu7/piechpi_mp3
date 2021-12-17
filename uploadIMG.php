<?php

if (isset($_POST['upload'])) {
    # code...
    $file =$_FILES['file'];
    $file =$_FILES['coverFile'];

    $file_name=$_FILES['file']['name'];
    $file_type=$_FILES['file']['type'];
    $file_size=$_FILES['file']['size'];
    $file_temp_loc=$_FILES['file']['tmp_name'];

    $file_store = "images/".$file_name;

    move_uploaded_file($file_temp_loc,$file_store);
    print_r("$file_name  $file_temp_loc");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="?" method="POST" enctype="multipart/form-data">
        <label for="">Uploading Files</label>
        <p><input type="file" name="file"></p>
        <p><input type="submit" name="upload" value="Upload Image"></p>
    </form>

</body>

</html>