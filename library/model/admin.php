<?php

/* admin table */

class Admin {

    /* table fields */
    public $id;
    public $fullname;
    public $email;
    public $username;
    public $password;
    public $updateDate;

    /* set default value with constructor */
    function __construct()
    {
        $this->id = 0;
        $this->fullname = "";
        $this->email = "";
        $this->username = "";
        $this->password = "";
        $this->updateDate = date('Y-m-d H:i:s');
    }

}
