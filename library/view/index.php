<?php

session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- BOOTSTRAP JS -->
    <script href="../assets/js/bootstrap.min.js"></script>
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

</div>
<!-- MAIN END -->

<script href="../assets/js/effects.js"></script>
</body>

</html>
