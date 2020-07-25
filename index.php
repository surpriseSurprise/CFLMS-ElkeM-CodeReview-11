<?php
ob_start();
session_start();
require_once 'actions/dbconnect.php';

// it will never let you open index(login) page if session is set
if ( isset($_SESSION['user' ])!="" ) {
    header("Location: home.php");
    exit;
   }
elseif ( isset($_SESSION['admin' ])!="" ) {
     header("Location: admin.php");
     exit;
    }

require_once "templates/header.php";
require_once "templates/nav.php";
?>
           
<div class="usava">
<p><a href="index1.php">Login</a></p>
</div>
<div>
<br><br><hr>
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
                <a href='index1.php'><button class="btn btn-warning" style="font-size:0.8em" name="button">Please Login to Adopt Me</button></a>
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

