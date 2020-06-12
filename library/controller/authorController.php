<?php

require_once __DIR__.'/modelController.php';

class AuthorController {

    public function getController() {
        $controller = new ModelController();
        return $controller;
    }

    /* select all authors from the database */
    public function fetchAuthors() {
        $controller = $this->getController();
        $sql = "SELECT id, name FROM author;";
        $result = $controller->fetchRecords($sql);
        return $result;
    }

    /* select author */
    public function selectAuthor($id) {
        $controller = $this->getController();
        $sql = "SELECT id, name FROM author WHERE id = ?;";
        $result = $controller->oneParamRecord($sql, $id);
        return $result;
    }

    /* insert author */
    public function insertAuthor($values) {
        $controller = $this->getController();
        $sql = "INSERT INTO author (name, creation_date) VALUES (?, ?);";
        $type = 'ss';
        $controller->arrayParamRecord($sql, $values, $type);
    }

    /* update author */
    public function updateAuthor($values) {
        $controller = $this->getController();
        $sql = "UPDATE author SET name = ?, update_date = ? WHERE id = ?;";
        $type = 'ss';
        $controller->arrayParamRecord($sql, $values, $type);
    }

    /* delete author */
    public function deleteAuthor($id) {
        $controller = $this->getController();
        $sql = "DELETE FROM author WHERE id = ?;";
        $controller->oneParamRecord($sql, $id);
    }
    
}
