<?php

/* author table */

class Author {

    /* table fields */
    public $id;
    public $name;
    public $creationDate;
    public $updateDate;

    /* set default value with constructor */
    function __construct()
    {
        $this->id = 0;
        $this->name = "";
        $this->creationDate = date('Y-m-d H:i:s');
        $this->updateDate = date('Y-m-d H:i:s');
    }

}
