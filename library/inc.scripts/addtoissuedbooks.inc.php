<?php
session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
require_once __DIR__.'/../controller/issuedBooksController.php';

/* script for book issuing */

if(isset($_POST['addtoissuedbooks'])) {

    try {
        $issuedBooksCon = new IssuedBooksController();
    } catch(Exception $e) {
        echo 'Caught exception: '.$e->getMessage();
    }

    $userId = $_SESSION['userId'];
    $bookId = $_SESSION['bookId'];
    $fine = 0;
    $issuedDate = date('Y-m-d H:i:s');
    $returnDate = date("Y-m-d", strtotime('+1 month', $issuedDate));

    if(empty($userId) || empty($bookId) || empty($issuedDate) || empty($returnDate)) {
        header("Location: ../view/index.php?error=emptyfields");
	    exit();
    } else {
        $values = array($issuedDate, $returnDate, $fine, $bookId, $userId);
        $issuedBooksCon->insertIssuedBook($values);
        header("Location: ../view/index.php?add=success");
	    exit();
    }

} else {
    header("Location: ../view/index.php");
	exit();
}
