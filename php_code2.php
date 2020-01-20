
<?php

if (isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit();
}else{session_start();}
$db = mysqli_connect('localhost', 'root', '', 'iam_db');
if ( mysqli_connect_errno() ) {
    // If there is an error with the connection, stop the script and display the error.
    die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// initialize variables
$id   = "";
$ip = "";
$Groupe = "";
$update = false;
$Name ="";
$Mail ="";
$Service ="";


if (isset($_POST['save'])) {
    $id=$_POST['id'];
    $ip= $_POST['ip'];
    $Groupe=$_POST['Groupe'];
    $Name = $_POST['Name'];
    $Mail=$_POST['Mail'];
    $Service=$_POST['Service'];


    mysqli_query($db, "INSERT INTO user (id,ip,Groupe,Name,Mail,Service) VALUES ('$id', '$ip', '$Groupe', '$Name', '$Mail', '$Service')");
    $_SESSION['message'] = "User saved";



    header('location: useradd.php');



}