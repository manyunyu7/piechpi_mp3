<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="?" method="POST">
        <input type="text" name="nama" placeholder="Nama Kita"></input><br />
        <input type="text" name="alamat" placeholder="Alamat Kita"></input><br />
        <input type="submit" name="submit" value="Submit"></input>
    </form>
</body>

<?php

if (isset($_POST['nama'])) {
    echo "Halo: " . $_POST['nama'] . "<br />";
}
?>

</html>