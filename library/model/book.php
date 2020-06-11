<?php

/* book table */

class Book {

    /* table fields */
    public $id;
    public $name;
    public $registerDate;
    public $updateDate;
    public $authorId;
    public $categoryId;

    /* set default value with constructor */
    function __construct()
    {
        $this->id = 0;
        $this->name = "";
        $this->registerDate = date('Y-m-d H:i:s');
        $this->updateDate = date('Y-m-d H:i:s');
        $this->authorId = 0;
        $this->categoryId = 0;
    }
    
}
