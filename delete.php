<?php 
ob_start();
session_start();
require_once 'actions/dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['admin']) && !isset($_SESSION['user']) ) {
   header("Location: index1.php");
   exit;
  }
  if(isset($_SESSION["user"])){
     header("Location: admin.php");
     exit;
  }
  
  // select logged-in users details
  $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['admin']);
  $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

require_once "templates/header.php";
require_once "templates/nav.php";
require_once "templates/user.php";

?>

<div class="container container-fluid">

<?php
if ($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT  * FROM `animals` WHERE an_id = {$id}";
   $result = $conn->query($sql);
   $data = $result->fetch_assoc();

   $conn->close();
?>

<h3>Do you really want to delete this cat?</h3>
<form action ="actions/a_delete.php" method="post">

   <input type="hidden" name= "id" value="<?php echo $data['an_id'] ?>">
   <button class="btn btn-warning" type="submit">Yes, delete it!</button >
   <a href="admin.php"><button type="button" class="btn btn-dark">No, go back!</button></a>
</form>

<?php
}
?>

</body>
</html>