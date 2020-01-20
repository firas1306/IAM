<?php
session_start();

if ( $_SESSION['name'] !== 'master') {

    session_destroy();
    header('Location: login.php');

    exit();
}


?>
<html>

<link href="style.css" rel="stylesheet" type="text/css">
<link href="style2.css" rel="stylesheet" type="text/css">
<body class="loggedin" >
<nav class="navtop">
    <div>
        <h1>OOREDOO </h1>

        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>
</nav>


<form method="post" action="admin_backend.php" class="content" >

    <div class="inputg" >

        <label>id *</label><br>
        <input type="text" name="id" value="" required>
    <br>
        <br>
        <label>username *</label>
        <input type="text" name="username" value="" required>
   <br>
    <br>
        <label>password *</label><br>
        <input type="text" name="password" value="" required><br>
   <br>
        <label>email *</label><br>
        <input type="text" name="email" value="" required>
   <br><br>
        <label>account_type *</label><br>
        <input type="text" name="account_type" value="" required><br>
   <br>
        <label>privs</label><br>
        <input type="text" name="privs" value="" required><br><br>
    
        <button class="btn" type="submit" name="save"  >Save</button>
   
    </div>
</form>
</body>

</html>
