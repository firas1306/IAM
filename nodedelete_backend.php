<?php session_start();
// If the user is not logged in redirect to the login page...
if ( $_SESSION['name'] == NULL)  {
    session_destroy();
    header('Location: login.php');
    exit();

}?>
<?php


$db = mysqli_connect('localhost', 'root', '', 'iam_db');

// initialize variables
$ID_NODE   = "";

$IP_Node = "";



if (isset($_POST['save'])) {
    $ID_NODE=$_POST['ID_NODE'];

    $IP_Node=$_POST['IP_Node'];



    mysqli_query($db, "delete from node where ID_NODE='$ID_NODE' and IP_Node='$IP_Node'");
    $_SESSION['message'] = "Node  deleted";



    header('location: nodedelete.php');



}


