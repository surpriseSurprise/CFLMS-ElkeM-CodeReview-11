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
<legend class=ml-2>Add Cats</legend>

<form class="ml-2" action="actions/a_create.php" method= "post">
    <table cellspacing= "0" cellpadding="0">
        <tr>
            <th>Type</th>
		    <td>
			<select name="type">
				<option value="small">small</option>
				<option value="large">large</option>
				<option value="senior">senior</option>
			</select>
		</td>
        </tr> 
        <tr>
            <th>Image</th>
            <td><input  type="text" name="image"  placeholder="Image from petfinder.com, eg https://d17fnq9dkz9hgj.cloudfront.net/breed-uploads/2018/08/abyssinian-detail.jpg?bust=1535664455&width=355"></td >
        </tr>  
        <tr>
            <th>Name</th>
            <td><input  type="text" name="name"  placeholder="Cat Name"></td>
        </tr>   
        <tr>
            <th>Description</th>
            <td><input type="text" name="descr" placeholder="Description"></td>
        </tr>   
        <tr>
            <th>Location</th>
            <td><input type="text" name="loc" placeholder="Location"></td>
        </tr>
        <tr>
            <th>Hobbies</th>
            <td><input  type="text" name= "hobbies" placeholder="Favourite Activities"></td>
        </tr>
        <tr>
            <th>Age</th>
            <td><input  type="text" name= "age" placeholder="Age"></td>
        </tr>  
        <tr>
            <td><button class="btn btn-warning mt-4" type ="submit">Add Cat</button></td>
            <td ><a href= "admin.php"><button class="btn btn-dark mt-4" type="button">Back</button></a></td>
        </tr>
    </table>
</form>

</fieldset>
</div>

</body>
</html>