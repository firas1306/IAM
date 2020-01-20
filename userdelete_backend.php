<?php session_start();
// If the user is not logged in redirect to the login page...
if ( $_SESSION['name'] == NULL)  {
    session_destroy();
    header('Location: login.php');
    exit();

}?>
<?php


$db = mysqli_connect('localhost', 'root', '', 'iam_db');
if ( mysqli_connect_errno() ) {
    // If there is an error with the connection, stop the script and display the error.
    die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// initialize variables
$id   = "";
$ip = "";

if (isset($_POST['save'])) {
    $id=$_POST['id'];
    $ip= $_POST['ip'];



    mysqli_query($db, "delete from user  where id='$id' and  ip= '$ip'");
    $_SESSION['message'] = "User deleted";



    header('location: userdelete.php');



}