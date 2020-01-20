
<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if ( $_SESSION['name'] == NULL)  {
    session_destroy();
    header('Location: login.php');
    exit();

}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'iam_db';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password,email FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
$stmt2 = $con->prepare('SELECT acount_type,privs FROM accounts WHERE id = ?');
$stmt2->bind_param('i', $_SESSION['id']);
$stmt2->execute();
$stmt2->bind_result($acount_type, $privs);
$stmt2->fetch();
$stmt2->close();


$stmt3 = $con->prepare('SELECT id,tel FROM accounts WHERE id = ?');
$stmt3->bind_param('i', $_SESSION['id']);
$stmt3->execute();
$stmt3->bind_result($id, $tel);
$stmt3->fetch();
$stmt3->close();









?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Profile Page</title>
    <link href="style2.css" rel="stylesheet" type="text/css">
    <link href="style.css" rel="stylesheet" type="text/css">

</head>


<body class="loggedin">
<nav class="navtop">
    <div>
        <h1>OOREDOO </h1>

        <a href="home.php"><i ></i>Home</a>
        <a href="index.php"><i class="fas fa-sign-out-alt"></i>Add Node</a>
        <a href="useradd.php"><i class="fas fa-sign-out-alt"></i>Add User</a>
        <a href="search.php"><i class="fas fa-sign-out-alt"></i>search for</a>

        <a href="nodedelete.php"><i class="fas fa-sign-out-alt"></i>Delete Node</a>
        <a href="userdelete.php"><i class="fas fa-sign-out-alt"></i>Delete User</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>
</nav>
<div >
    <h2>Profile </h2>
    <div>
        <p> Account details are below:</p>
        <table >
            <tr>
                <td >Username:</td>
                <td><?=$_SESSION['name']?></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><?=MD5($password)?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?=$email?></td>
            </tr>
            <tr>
                <td>account_type:</td>
                <td><?=$acount_type?></td>
            </tr>
            <tr>
                <td>privs:</td>
                <td><?=$privs?></td>
            </tr>
            <tr>
                <td>id:</td>
                <td><?=$id?></td>
            </tr>
            <tr>
                <td>tel:</td>
                <td><?=$tel?></td>
            </tr>

        </table>

    </div>

</body>
</html>
