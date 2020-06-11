<?php

/* user table */

class User {

    /* table fields */
    public $id;
    public $fullname;
    public $email;
    public $phone;
    public $username;
    public $password;
    public $registerDate;
    public $updateDate;

    /* set default value with constructor */
    function __construct()
    {
        $this->id = 0;
        $this->fullname = "";
        $this->email = "";
        $this->phone = '00000000000';
        $this->username = "";
        $this->password = "";
        $this->registerDate = date('Y-m-d H:i:s');
        $this->updateDate = date('Y-m-d H:i:s');
    }

}
