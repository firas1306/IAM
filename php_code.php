<?php

if (isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit();
}else{session_start();}
$db = mysqli_connect('localhost', 'root', '', 'iam_db');

// initialize variables
$ID_NODE   = "";
$Name = "";
$IP_Node = "";
$update = false;
$Category ="";
$Site ="";


if (isset($_POST['save'])) {
    $ID_NODE=$_POST['ID_NODE'];
    $Name= $_POST['Name'];
    $IP_Node=$_POST['IP_Node'];
    $Category = $_POST['Category'];
    $Site=$_POST['Site'];


    mysqli_query($db, "INSERT INTO node (ID_NODE,Name,IP_Node,Category,Site,tdate) VALUES ('$ID_NODE', '$Name', '$IP_Node', '$Category', '$Site',CURRENT_TIME())");
    $_SESSION['message'] = "Node saved";



    header('location: index.php');



}

