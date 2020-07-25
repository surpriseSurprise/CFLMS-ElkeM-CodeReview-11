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
<fieldset>
<legend class=ml-2>Update Cats</legend>

<?php
if ($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM animals WHERE an_id = {$id}" ;
   $result = $conn->query($sql);
   $data = $result->fetch_assoc();

   $conn->close();
?>

<form class="ml-2" action="actions/a_update.php" method= "post">
   <table cellspacing= "0" cellpadding="0">
        <!-- <tr>
            <th>Type</th>
		    <td>
			<select name="type">
				<option value="small">small</option>
				<option value="large">large</option>
				<option value="senior">senior</option>
			</select>
		</td>
        </tr> 
        <tr> -->
            <th>Image</th>
            <td><input  type="text" name="image" value="<?php echo $data['image'];?>"></td>
        </tr> 
        <tr>
            <th>Name</th >
            <td><input  type="text" name="name" value="<?php echo $data['name'];?>"></td >
        </tr>   
        <tr>
            <th>Description</th >
            <td><input type="text" name="descr" value="<?php echo $data['descr'];?>"></td >
        </tr>
        <tr>
            <th>Location</th >
            <td><input  type="text" name="loc" value="<?php echo $data['loc'];?>"></td >
        </tr>
        <tr>
            <th>Hobbies</th>
            <td><input  type="text" name= "hobbies" value="<?php echo $data['hobbies'];?>"></td>
        </tr>
        <th>Age</th>
            <td><input  type="text" name= "age" value="<?php echo $data['age'];?>"></td>
        </tr> 
        <tr>
               <input type= "hidden" name= "an_id" value= "<?php echo $data['an_id']?>" />
               <td><button class="btn btn-warning mt-4" type= "submit">Update</button ></td>
               <td><a  href= "admin.php"><button class="btn btn-dark mt-4" type="button" >Back</button ></a ></td >
           </tr>
       </table>
   </form >
</fieldset >

<?php
}
?>

</body >
</html >
