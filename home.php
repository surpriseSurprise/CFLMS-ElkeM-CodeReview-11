<?php
ob_start();
session_start();
require_once 'actions/dbconnect.php';


// if session is not set this will redirect to login page
if( !isset($_SESSION['user' ]) ) {
    header("Location: index1.php");
    exit;
}

   // select logged-in users details
   $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
   $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

require_once "templates/header.php";
require_once "templates/nav.php";
?>

<div>
<!-- Hi <?php echo $userRow['userEmail' ]; ?> -->
<p class="avatar"><a  href="logout.php?logout">Sign Out</a></p>
<p class="usava"><?php echo $userRow['userName' ]; ?></p>
<!-- <img class="avatar" src="<?php echo $userRow['image' ];?>"> -->
<br><br><br><hr>
</div>

<div class="container container-fluid">
    <div class="row">

            <?php
           $sql = "SELECT  * FROM `animals` ORDER BY type ASC";
           $result = $conn->query($sql);
            ?>

   
<?php
    if($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {  
        $image = $row["image"];
        $name = $row["name"];
        $descr = $row["descr"];
        $loc = $row["loc"];
        $hobbies = $row["hobbies"];
        $age = $row["age"];
        ?>

        <div class="col-sm-12 col-md-6 col-lg-3" >
            <div class="card">
            <img class="cat" src="<?= $image ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $name ?></h5>
                <p style="font-size:0.8em"><b><?= $descr ?></b></p>
                <p style="font-size:0.8em"><?= $loc ?></p>
                <p style="font-size:0.8em">Favorite Activities:<br> <?= $hobbies ?></p>
                <p style="font-size:0.8em">Age: <?= $age ?> years old</p>
                <br>
                <a href='adopt.php?id=<?= $row['an_id']; ?>'class="btn btn-warning">Adopt Me</a>
            </div>
            </div>
        </div>

 <?php
 } } 
 ?>
 
</div>
</div>

<?php
require_once "templates/footer.php";
?>

</body>
</html>



