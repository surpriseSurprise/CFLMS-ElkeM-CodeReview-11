<?php 
require_once 'dbconnect.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CAT CROSSING</title>
   <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </head>

<?php
require_once "../templates/nav.php";
require_once "../templates/user.php";

if(isset($_SESSION['user'])){
    header("Location: home.php");
    exit;
}
if(isset($_SESSION['admin'])){
    header("Location: admin.php");
    exit;
}
?>

<div class="container container-fluid">
 <div class="row">

<?php
if ($_POST) {
    $type = $_POST["type"];
    $loc = $_POST["loc"];
    $image = $_POST["image"];
    $name = $_POST["name"];
    $descr = $_POST["descr"];
    $hobbies = $_POST["hobbies"];
    $age = $_POST["age"];

   $sql = "INSERT INTO `animals`(type, loc, image, name, descr, hobbies, age) VALUES ('$type','$loc', '$image', '$name', '$descr', '$hobbies', '$age')";
   if($conn->query($sql) === TRUE) {
       echo "<h2>Successfully Added!</h2>" ;
    //    echo "<a href='../create.php'><button type='button'>Back</button></a>";
    //     echo "<a href='../admin.php'><button type='button'>Home</button></a>";
   } else  {
       echo "Error " . $sql . ' ' . $conn->connect_error;
   }

   $conn->close();
}

?>

</div>
<a class="btn btn-warning" type='button' role="button" href='../create.php'>Back</a>
<a class="btn btn-dark" type='button' role="button" href='../admin.php'>Home</a>
</div>

</body>
</html>