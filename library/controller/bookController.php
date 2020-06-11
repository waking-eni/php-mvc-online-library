<?php

require_once __DIR__.'modelController.php';

class BookController {

    public function getController() {
        $controller = new ModelController();
        return $controller;
    }

    /* select all books from the database */
    public function fetchBooks() {
        $controller = $this->getController();
        $sql = "SELECT id, name, author_id, category_id FROM book;";
        $result = $controller->fetchRecords($sql);
        return $result;
    }

    /* select book */
    public function selectBook($id) {
        $controller = $this->getController();
        $sql = "SELECT id, name, author_id, category_id FROM book WHERE id = ?;";
        $result = $controller->selectRecord($sql, $id);
        return $result;
    }

    /* insert book */
    public function insertBook($values) {
        $controller = $this->getController();
        $sql = "INSERT INTO book (name, register_date, author_id, category_id) VALUES (?, ?, ?, ?);";
        $type = 'ssii';
        $controller->insertRecord($sql, $values, $type);
    }

    /* update book */
    public function updateBook($values) {
        $controller = $this->getController();
        $sql = "UPDATE book SET name = ?, author_id = ?, category_id = ?, update_date = ? WHERE id = ?;";
        $type = 'siis';
        $controller->insertRecord($sql, $values, $type);
    }

    /* delete book */
    public function deleteBook($id) {
        $controller = $this->getController();
        $sql = "DELETE FROM book WHERE id = ?;";
        $controller->deleteRecord($sql, $id);
    }

}
