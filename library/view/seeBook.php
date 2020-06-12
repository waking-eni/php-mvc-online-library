<?php
    session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
    require_once __DIR__.'/../controller/bookController.php';
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
                $bookController = new BookController();
            } catch(Exception $e) {
                echo 'Caught exception: '.$e->getMessage();
            }

            $idBook = $_GET['id'];
            $book = $bookController->selectBook($idBook);

            //show the book
            if(!empty($book)) {

                foreach($book as $key => $value) {

                    echo '<div class="col-sm-6">';
                        echo '<div class="card">';
                            echo '<div class="card-body">';
                                echo '<h2 class="card-header">'.stripslashes($value['name']).'</h2>';
                                echo '<form id="bookform" method="post" action="../inc.scripts/addtoissuedbooks.inc.php" >';
                                    echo '<div class="form-row">';
                                        echo '<div class="col">';
                                            //category
                                            echo '<div class="md-form">';
                                                echo '<p>Category: '.stripslashes($value['category_id']).'</p>';
                                            echo '</div';
                                            //id
                                            echo '<div class="md-form">';
                                                echo '<p>Book code: '.stripslashes($value['id']).'</p>';
                                            echo '</div';
                                            //author
                                            echo '<div class="md-form">';
                                                echo '<p>Author: '.stripslashes($value['author_id']).'</p>';
                                            echo '</div';
                                            //submit
                                            echo '<div class="md-form">';
                                                if(isset($_SESSION['userUsername'])) {
                                                    echo '<button class="d-block my-3 btn btn-warning float-right" type="submit" name="addtoissuedbooks">
                                                        LEND</button>';
                                                }
                                            echo '</div';
                                            //hidden id input field
                                            echo '<input type="hidden" id="bookId" name="bookId" value="'.stripslashes($value['id']).'">';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</form>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';

                    $_SESSION['bookId'] = stripslashes($value['id']);
                }
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
