<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
    crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" 
    crossorigin="anonymous"></script>
    <!-- STYLE -->
    <link href="../assets/css/style.css" rel="stylesheet" />
    <!-- JQUERY -->
    <script href="../assets/js/jquery-3.5.1.js"></script>
    <title>Online Library</title>
</head>

<body>

<!-- HEADER -->
<?php
    include 'includes/header.php';
?>
<!-- HEADER END -->

<!-- MAIN -->
<div class="wrapper">

<!-- SIDEBAR -->
<?php
    include 'includes/sidebar.php';
?>
<!-- SIDEBAR END -->

<!-- LOGIN -->
<main class="col-9 main">

<h1 class="text-center mt-5">Admin Log In</h1>

<form class="center-div" name="loginForm" action="../inc.scripts/loginadmin.inc.php" method="post" onsubmit="return(validate());">
    <input type="text" name="mailuid" placeholder="E-mail/Username">
    <p id="adminMailName"></p>
    <input class="d-block my-3" type="password" name="pwd" placeholder="Password">
    <p id="adminPwd"></p>
    <button class="d-block my-3 btn btn-dark float-right" type="submit" name="login-submit">Log In</button>
</form>

</main>
<!-- LOGIN END -->

</div>
<!-- MAIN END -->

<script href="../assets/js/effects.js"></script>
</body>

</html>
