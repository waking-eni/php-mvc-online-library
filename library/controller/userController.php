<?php

require_once __DIR__.'/modelController.php';

class UserController {

    public function getController() {
        $controller = new ModelController();
        return $controller;
    }

    /* select all users from the database */
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

    /* insert user */
    public function insertUser($values) {
        $controller = $this->getController();
        $sql = "INSERT INTO user (fullname, username, password, email, phone, register_date) VALUES (?, ?, ?, ?);";
        $type = 'ssss';
        $controller->insertRecord($sql, $values, $type);
    }

    /* update user */
    public function updateUser($values) {
        $controller = $this->getController();
        $sql = "UPDATE user SET fullname = ?, username = ?, password = ? email = ?, phone = ?, update_date = ? WHERE id = ?;";
        $type = 'ssssss';
        $controller->insertRecord($sql, $values, $type);
    }

    /* delete user */
    public function deleteUser($id) {
        $controller = $this->getController();
        $sql = "DELETE FROM user WHERE id = ?;";
        $controller->deleteRecord($sql, $id);
    }

    /* check username */
    public function checkUsername($username) {
        $controller = $this->getController();
        $sql = "SELECT username FROM user WHERE username = ?;";
        $result = $controller->selectRecord($sql, $username);
        return $result->num_rows;
    }

}
