<?php session_start();
// If the user is not logged in redirect to the login page...
if ( $_SESSION['name'] == NULL)  {
session_destroy();
header('Location: login.php');
exit();

}?>
<!DOCTYPE html>
<html>
<link href="style2.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">
<head>
	<title>Access Management</title>


</head>
<body class="loggedin">
<nav class="navtop">
    <div>
       <a href="home.php"><i class="fas fa-user-circle"></i>  <h1> OOREDOO</h1></a>
        <a href="useradd.php"><i class="fas fa-user-circle"></i>add user</a>
        <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>
</nav>
<?php if (isset($_SESSION['message'])): ?>
    <div onclick="true" class="msg">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
<?php endif ?>





	<form method="post" action="php_code.php" >
		<div class="input-group">
			<label>ID_NODE</label>
            <input type="text" name="ID_NODE" value="" required>
		</div>
        <div class="input-group">
            <label>Name</label>
            <input type="text" name="Name" value="" required>
        </div>
        <div class="input-group">
            <label>IP_Node</label>
            <input type="text" name="IP_Node" value="" required>
        </div>
		<div class="input-group">
			<label>Category</label>
			<input type="text" name="Category" value="" required>
		</div>
        <div class="input-group">
            <label>Site</label>
            <input type="text" name="Site" value="" required>
        </div>
		<div class="input-group">
			<button class="btn" type="submit" name="save"   >Save</button>
		</div>
	</form>






<html>
<body>
<h2 ><center>Last added Node</h2>
<table >
    <thead>
    <tr>
        <th>ID_NODE</th>
        <th>Name</th>
        <th>IP_Node</th>
        <th>Category</th>
        <th>Site</th>
        

    </tr>
    </thead>



    <?php 
$db = mysqli_connect('localhost', 'root', '', 'iam_db');
$results = mysqli_query($db, "SELECT ID_NODE,Name,IP_Node,Category,Site FROM node order by  tdate desc limit 1 ");

    while ( $row = mysqli_fetch_array($results)) {  ?>
        <tr>
            <td><?php echo $row['ID_NODE']; ?></td>
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row['IP_Node']; ?></td>
            <td><?php echo $row['Category']; ?></td>
            <td><?php echo $row['Site']; ?></td>
            

        </tr>
    <?php  } ; ?>
</table>
</body>
</html>


