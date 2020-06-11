<?php

require_once __DIR__.'/../config.php';

/* class with methods that handle database data */

Class ModelController {

    public function connect()
    {
        $db = Database::getInstance();
        return $db;
    }

    public function fetchRecords($sql) {
        $db = $this->connect();
        $stmt = $db->stmt_init();
        if(!$stmt->prepare($sql)) {
            throw new \Exception( 'Prepare failed' );
        } else {
            $stmt->execute();
        }

        $result = $stmt->get_result();
        if($row = $result->fetch_array(MYSQLI_ASSOC)) {
            return $result;
        } else {
            return null;
        }
    }

    public function oneParamRecord($sql, $id) {
        $db = $this->connect();
        $stmt = $db->stmt_init();
        if(!$stmt->prepare($sql)) {
            throw new \Exception( 'Prepare failed' );
        } else {
            $stmt->bind_param("s", $id);
            $stmt->execute();
        }

        $result = $stmt->get_result();
        if($row = $result->fetch_array(MYSQLI_ASSOC)) {
            return $result;
        } else {
            return null;
        }
    }

    // values is an array, so call_user_func_array is used to bind parameters
    public function arrayParamRecord($sql, $values, $type) {
        $db = $this->connect();
        $stmt = $db->stmt_init();
        if(!$stmt->prepare($sql)) {
            throw new \Exception( 'Prepare failed' );
        } else {
            call_user_func_array(array($stmt, "bind_param"), array_merge(array($type), $values));
            $stmt->execute();
        }
    }

}
