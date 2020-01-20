<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if ( $_SESSION['name'] == NULL)  {
    session_destroy();
    header('Location: login.php');
    exit();

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Access Management</title>
    <link href="style2.css" rel="stylesheet" type="text/css">
    <link href="style.css" rel="stylesheet" type="text/css">

</head>
<body class="loggedin">
<nav class="navtop">
    <div>
        <h1>OOREDOO </h1>
        <a href="index.php"><i class="fas fa-sign-out-alt"></i>Add Node</a>

        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>
</nav>

<?php if (isset($_SESSION['message'])): ?>
    <div class="msg">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
<?php endif ?>




<div >
<form method="post" action="php_code2.php"   >
    <div class="input-group">
        <label>ID USER *</label>
        <input type="text" name="id" value="" required>
    </div>
    <div class="input-group">
        <label>IP address *</label>
        <input type="text" name="ip" value="" required>
    </div>
    <div class="input-group">
        <label>Group *</label>
        <input type="text" name="Groupe" value="" required>
    </div>
    <div class="input-group">
        <label>Name </label>
        <input type="text" name="Name" value="" required >
    </div>
    <div class="input-group">
        <label>Mail *</label>
        <input type="text" name="Mail" value="" required>
    </div>
    <div class="input-group">
        <label>Service *</label>
        <input type="text" name="Service" value="" required>
    </div>
    <div class="input-group">
        <button class="btn" type="submit" name="save"   >Save</button>
    </div>
</form>
</div>
</body>
</html>
<?php
$db=$db = mysqli_connect('localhost', 'root', '', 'iam_db');
$results = mysqli_query($db, "SELECT * FROM user ");?>
<html>
<body>

<table>
    <thead>
    <tr>
        <th>ID USER</th>
        <th>IP address</th>
        <th>Group</th>
        <th>Name</th>
        <th>Mail</th>
        <th>Service</th>

    </tr>
    </thead>




    <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['ip']; ?></td>
            <td><?php echo $row['Groupe']; ?></td>
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row['Mail']; ?></td>
            <td><?php echo $row['Service']; ?></td>
        </tr>
    <?php  }   ?>
</table>
</body>
</html>

