<?php 
require_once 'dbconnect.php';

if(isset($_SESSION['user'])){
    header("Location: home.php");
    exit;
}
if(isset($_SESSION['admin'])){
    header("Location: admin.php");
    exit;
}
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
?>

<div class="container container-fluid">
 <div class="row">

 <?php
if ($_POST) {
   $id = $_POST['id'];

   $sql = "DELETE FROM animals WHERE an_id = {$id}";
    if($conn->query($sql) === TRUE) {
       echo "<h2>Successfully deleted!</h2>" ;
    //    echo "<a href='../admin.php'><button type='button'>Back</button></a>";
   } else {
       echo "Error updating record : " . $conn->error;
   }

   $conn->close();
}

?>

</div>
<a class="btn btn-dark" type='button' role="button" href='../admin.php'>Back</a>
</div>

</body>
</html>