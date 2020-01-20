<?php
session_start();
if ( $_SESSION['name'] == NULL)  {
    session_destroy();
    header('Location: login.php');
    exit();

}

$id   = "";
$username = "";
$password = "";
$update = false;
$email ="";
$account_type ="";
$db = mysqli_connect('localhost', 'root', '', 'iam_db');
if (mysqli_connect_errno()) {
    die ('Failed to connect to MySQL: ' .mysqli_connect_error());}
// initialize variables




if (isset($_POST['save'])) {
    $id =$_POST['id'];
    $username= $_POST['username'];
    $password =md5($_POST['password']);
    $email = $_POST['email'];
    $account_type=$_POST['account_type'];
    $privs = $_POST['privs'];

    $db = mysqli_connect('localhost', 'root', '', 'iam_db');
    mysqli_query($db, "INSERT INTO accounts (id,username,password,email,acount_type,privs) VALUES ('$id', '$username', '$password', '$email', '$account_type', '$privs')");
    $_SESSION['message'] = "account saved";
    header('location: admin.php');
}
