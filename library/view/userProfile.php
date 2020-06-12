<?php
    session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
    require_once __DIR__.'/../controller/userController.php';
    require_once __DIR__.'/../controller/issuedBooksController.php';
?>

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
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Online Library</title>
</head>

<body>

<!-- HEADER -->
<?php
    include 'includes/header.php';
?>
<!-- HEADER END -->

<!-- WRAPPER -->
<div class="container-fluid wrapper-container">
    <div class="row row-wrapper mt-5">

        <!-- SIDEBAR -->
        <?php
            include 'includes/sidebar.php';
        ?>
        <!-- SIDEBAR END -->


        <!-- MAIN -->
        <main class="col-9 main">
            <div class="main-card row">

            <?php

            try {
                $issuedBookCon = new IssuedBooksController();
                $userCon = new UserController();
            } catch(Exception $e) {
                echo 'Caught exception: '.$e->getMessage();
            }

            $userId = $_SESSION['userId'];
            $user = $userCon->selectUser($userId);
            $userBooks = $issuedBookCon->selectUserIssuedBooks($id);

            /* user profile */
            if(!empty($user)) {
                echo '<ul class="list-group">';
                foreach($user as $key => $value) {
                    //fullname
                    echo '<li class="list-group-item list-group-item-success">';
                        echo stripslashes($value['fullname']);
                    echo '</li>';
                    //username
                    echo '<li class="list-group-item">';
                        echo stripslashes($value['username']);
                    echo '</li>';
                    //email
                    echo '<li class="list-group-item">';
                        echo stripslashes($value['email']);
                    echo '</li>';
                    //phone
                    echo '<li class="list-group-item">';
                        echo stripslashes($value['phone']);
                    echo '</li>';
                }
                echo '</ul>';
            }

            /* user issued books */
            if(!empty($userBooks)) {
                echo '<ul class="list-group">';
                foreach($userBooks as $key => $value) {
                    //name
                    echo '<li class="list-group-item list-group-item-secondary">';
                        echo stripslashes($value['name']);
                    echo '</li>';
                    //author
                    echo '<li class="list-group-item">';
                        echo stripslashes($value['author']);
                    echo '</li>';
                    //issued_date
                    echo '<li class="list-group-item list-group-item-success">';
                        echo stripslashes($value['issued_date']);
                    echo '</li>';
                    //return_date
                    echo '<li class="list-group-item">';
                        echo stripslashes($value['return_date']);
                    echo '</li>';
                    //fine
                    echo '<li class="list-group-item">';
                        echo stripslashes($value['fine']);
                    echo '</li>';
                }
                echo '</ul>';
            }

            ?>

            </div>
        </main>
        <!-- MAIN END -->

    </div>
</div>
<!-- WRAPPER END -->

</body>

</html>
