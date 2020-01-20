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
<html>
<head>
    <meta charset="utf-8">
    <title>Home Page</title>
    <link href="style2.css" rel="stylesheet" type="text/css">

</head>
<body class="loggedin">
<nav class="navtop">
    <div>
        <h1> OOREDOO </h1>
        <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>
</nav>
<div class="content">
    <h2>Home Page</h2>
    <p>Welcome back, <?=$_SESSION['name']?>!</p>
</div>
<div class="content">
    <h2>you have access to these nodes :</h2>
    <?php
    $a=$_SESSION['name'];
    $db = mysqli_connect('localhost', 'root', '', 'iam_db');
    $results = mysqli_query($db, "SELECT * FROM accountnode  , node  where username='$a'and accountnode.ID_NODE=node.ID_NODE ");?>
    <div class="hometable">
    <table>
        <thead>
        <tr>
            <th>id</th>
            <th>username</th>
            <th>ID_NODE</th>
            <th>IP_Node</th>

            <th>node name</th>
            <th>category</th>
            <th>site</th>


        </tr>
        </thead>



        <?php while ($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>

                <td><?php echo $row['ID_NODE']; ?></td>
                <td><?php echo $row['IP_Node']; ?></td>

                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['Category']; ?></td>
                <td><?php echo $row['Site']; ?></td>
            </tr>
        <?php  }   ?>
    </table>
    </div>

</div>
</body>

</html>