
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="style1.css" rel="stylesheet" type="text/css">
    <link href="bootstrap/css/bootstrap-grid.css" rel="stylesheet" type="text/css">
    <link href="bootstrap/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css">
    <link href="bootstrap/css/bootstrap-reboot.css" rel="stylesheet" type="text/css">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="bootstrap/css/bootstrap-grid.css.map" rel="stylesheet" type="text/css">
    <link href="bootstrap/css/bootstrap-grid.min.css.map" rel="stylesheet" type="text/css">
    <link href="bootstrap/css/bootstrap-reboot.css.map" rel="stylesheet" type="text/css">
    <link href="bootstrap/css/bootstrap-reboot.min.css.map" rel="stylesheet" type="text/css">
    <link href="bootstrap/css/bootstrap.css.map" rel="stylesheet" type="text/css">
</head>
<body>
<div class="login">
    <h1>Login</h1>
    <form method="post" action="authenticate.php" >
        <label for="username">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="username" placeholder="Username" id="username"  required>
        <label for="password">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="password" placeholder="Password" id="password" required>
        <input type="submit" value="Login">
    </form>
</div>
</body>
</html>
