<?php

require_once __DIR__.'/modelController.php';

class IssuedBooksController {

    public function getController() {
        $controller = new ModelController();
        return $controller;
    }

    /* select all issued books from the database */
    public function fetchIssuedBooks() {
        $controller = $this->getController();
        $sql = "SELECT * FROM issued_books;";
        $result = $controller->fetchRecords($sql);
        return $result;
    }

    /* select issued book*/
    public function selectIssuedBook($id) {
        $controller = $this->getController();
        $sql = "SELECT * FROM issued_books WHERE id = ?;";
        $result = $controller->oneParamRecord($sql, $id);
        return $result;
    }

    /* insert issued book */
    public function insertIssuedBook($values) {
        $controller = $this->getController();
        $sql = "INSERT INTO issued_books (issued_date, return_date, fine, book_id, user_id) 
                VALUES (?, ?, ?, ?, ?);";
        $type = 'sssii';
        $controller->arrayParamRecord($sql, $values, $type);
    }

    /* update issued book */
    public function updateIssuedBook($values) {
        $controller = $this->getController();
        $sql = "UPDATE issued_books SET issued_date = ?, return_date = ?, fine = ?, book_id = ?, user_id = ? 
                WHERE id = ?;";
        $type = 'sssii';
        $controller->arrayParamRecord($sql, $values, $type);
    }

    /* delete issued book */
    public function deleteIssuedBook($id) {
        $controller = $this->getController();
        $sql = "DELETE FROM issued_books WHERE id = ?;";
        $controller->oneParamRecord($sql, $id);
    }

}
