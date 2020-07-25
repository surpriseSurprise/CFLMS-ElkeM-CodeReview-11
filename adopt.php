<?php 
ob_start();
session_start();
require_once 'actions/dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['admin']) && !isset($_SESSION['user']) ) {
    header("Location: index1.php");
    exit;
}
//    // select logged-in users details
//    $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
//    $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
  
   require_once "templates/header.php";
   require_once "templates/nav.php";
   require_once "templates/user.php";
   ?>

<div class="container container-fluid">
    <div class="row">

<?php
if ($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM animals WHERE an_id = {$id}" ;
   $result = $conn->query($sql);
   $data = $result->fetch_assoc();

   $conn->close();
?>

<div class="heart"></div>
    <div class="col-sm-12 col-md-6 col-lg-3" >
        <div class="card">
            <img class="cat" src="<?= $data['image'] ?>" class="card-img-top" alt="...">
            <div class="card-body bg-warning">
                <h5 class="card-title">Thanks for<br>adopting me!</h5>
                <p style="font-size:0.8em">Please pick me up at<br><?= $data['loc']  ?></p>
                <br>
            </div>
        </div>
    </div>
</div>

<?php
}
?>

</div>
</div>

</body>
</html>
