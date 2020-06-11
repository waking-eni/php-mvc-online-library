<?php

require_once __DIR__.'/modelController.php';

class UserController {

    public function getController() {
        $controller = new ModelController();
        return $controller;
    }

    /* select all userss from the database */
    public function fetchUsers() {
        $controller = $this->getController();
        $sql = "SELECT id, fullname, email, phone FROM user;";
        $result = $controller->fetchRecords($sql);
        return $result;
    }

    /* select user */
    public function selectUser($id) {
        $controller = $this->getController();
        $sql = "SELECT id, fullname, email, phone FROM user WHERE id = ?;";
        $result = $controller->selectRecord($sql, $id);
        return $result;
    }

    public function insertUser($values) {
        $controller = $this->getController();
        $sql = "INSERT INTO user (fullname, email, phone, register_date) VALUES (?, ?, ?, ?);";
        $type = 'ssss';
        $controller->insertRecord($sql, $values, $type);
    }

    public function updateUser($values) {
        $controller = $this->getController();
        $sql = "UPDATE user SET fullname = ?, email = ?, phone = ?, update_date = ? WHERE id = ?;";
        $type = 'ssss';
        $controller->insertRecord($sql, $values, $type);
    }

    public function deleteUser($id) {
        $controller = $this->getController();
        $sql = "DELETE FROM user WHERE id = ?;";
        $controller->deleteRecord($sql, $id);
    }

}
