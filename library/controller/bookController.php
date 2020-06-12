<?php

require_once __DIR__.'/modelController.php';

class BookController {

    public function getController() {
        $controller = new ModelController();
        return $controller;
    }

    /* select all books from the database */
    public function fetchBooks($offset, $total_records_per_page) {
        $controller = $this->getController();
        $sql = "SELECT id, name, author_id, category_id FROM book 
        ORDER BY name DESC LIMIT $offset, $total_records_per_page;";
        $result = $controller->fetchRecords($sql);
        return $result;
    }

    /* select book */
    public function selectBook($id) {
        $controller = $this->getController();
        $sql = "SELECT id, name, author_id, category_id FROM book WHERE id = ?;";
        $result = $controller->oneParamRecord($sql, $id);
        return $result;
    }

    /* select book by category */
    public function selectBookByCat($cat, $offset, $total_records_per_page) {
        $controller = $this->getController();
        $sql = "SELECT id, name, author_id FROM book WHERE category_id = ?
        ORDER BY name DESC LIMIT $offset, $total_records_per_page;";
        $result = $controller->oneParamRecord($sql, $cat);
        return $result;
    }

    /* insert book */
    public function insertBook($values) {
        $controller = $this->getController();
        $sql = "INSERT INTO book (name, register_date, author_id, category_id) VALUES (?, ?, ?, ?);";
        $type = 'ssii';
        $controller->arrayParamRecord($sql, $values, $type);
    }

    /* update book */
    public function updateBook($values) {
        $controller = $this->getController();
        $sql = "UPDATE book SET name = ?, author_id = ?, category_id = ?, update_date = ? WHERE id = ?;";
        $type = 'siis';
        $controller->arrayParamRecord($sql, $values, $type);
    }

    /* delete book */
    public function deleteBook($id) {
        $controller = $this->getController();
        $sql = "DELETE FROM book WHERE id = ?;";
        $controller->oneParamRecord($sql, $id);
    }

    /* get the number of books */
    public function getNumOfBooks() {
        $controller = $this->getController();
        $sql = "SELECT id FROM book ;";
        $result = $controller->numRows($sql);
        return $result;
    }

}
