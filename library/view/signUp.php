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
    <link href="../css/style.css" rel="stylesheet" />
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

<!--main-->
<main class="main">

<h1 class="text-center mt-5">Sign up</h1>

<form class="center-div" name="signupForm" action="../inc.scripts/signup.inc.php" method="post" onsubmit="return(validate());">
    <input class="d-block my-3" type="text" name="ufull" placeholder="Full name">
    <p id="userFullname"></p>    
    <input class="d-block my-3" type="text" name="uid" placeholder="Username">
    <p id="userName"></p>
    <input class="d-block my-3" type="text" name="mail" placeholder="E-mail">
    <p id="userMail"></p>
    <input class="d-block my-3" type="text" name="uphone" placeholder="Phone">
    <p id="userPhone"></p>
    <input class="d-block my-3" type="password" name="pwd" placeholder="Password">
    <p id="userPwdd"></p>
    <input class="d-block my-3" type="password" name="pwdrepeat" placeholder="Repeat password">
    <p id="userPwddRep"></p>
    <button class="d-block my-3 btn btn-dark float-right" type="submit" name="signup-submit">Sign Up</button>
</form>

</main>
<!--end of main-->

</div>
<!-- MAIN END -->

<script>

function validate() {
    if(document.forms["signupForm"]["ufull"].value == "") {
        document.getElementById("userFullname").innerHTML = "Please provide your Full Name";
        document.forms["signupForm"]["ufull"].focus();
        return false;
    }
    if(document.forms["signupForm"]["uphone"].value == "") {
        document.getElementById("userPhone").innerHTML = "Please provide your Phone";
        document.forms["signupForm"]["uid"].focus();
        return false;
    }
    if(document.forms["signupForm"]["uid"].value == "") {
        document.getElementById("userName").innerHTML = "Please provide your Username";
        document.forms["signupForm"]["uid"].focus();
        return false;
    }
    if(document.forms["signupForm"]["mail"].value == "") {
        document.getElementById("userMail").innerHTML = "Please provide your E-mail";
        document.forms["loginForm"]["mail"].focus();
        return false;
    }
    if(document.forms["signupForm"]["pwd"].value == "") {
        document.getElementById("userPwdd").innerHTML = "Please provide your Password";
        document.forms["signupForm"]["pwd"].focus();
        return false;
    }
    if(document.forms["signupForm"]["pwd-repeat"].value == "") {
        document.getElementById("userPwddRep").innerHTML = "Please repeat your Password";
        document.forms["signupForm"]["pwd-repeat"].focus();
        return false;
    }
}

</script>
</body>

</html>
