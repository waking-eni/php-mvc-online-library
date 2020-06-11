<?php

require_once __DIR__.'/modelController.php';

class CategoryController {

    public function getController() {
        $controller = new ModelController();
        return $controller;
    }

    /* select all categories from the database */
    public function fetchCategories() {
        $controller = $this->getController();
        $sql = "SELECT id, name FROM category;";
        $result = $controller->fetchRecords($sql);
        return $result;
    }

    /* select category */
    public function selectCategory($id) {
        $controller = $this->getController();
        $sql = "SELECT id, name FROM category WHERE id = ?;";
        $result = $controller->selectRecord($sql, $id);
        return $result;
    }

    /* insert category */
    public function insertCategory($values) {
        $controller = $this->getController();
        $sql = "INSERT INTO category (name, creation_date) VALUES (?, ?);";
        $type = 'ss';
        $controller->insertRecord($sql, $values, $type);
    }

    /* update category */
    public function updateCategory($values) {
        $controller = $this->getController();
        $sql = "UPDATE category SET name = ?, update_date = ? WHERE id = ?;";
        $type = 'ss';
        $controller->insertRecord($sql, $values, $type);
    }

    /* delete category */
    public function deleteCategory($id) {
        $controller = $this->getController();
        $sql = "DELETE FROM category WHERE id = ?;";
        $controller->deleteRecord($sql, $id);
    }

}
