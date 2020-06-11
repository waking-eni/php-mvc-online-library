<?php

/* issued_books table */

class IssuedBooks {

    /* table fields */
    public $id;
    public $issuedDate;
    public $returnDate;
    public $fine;
    public $bookId;
    public $userId;

    /* set default value with constructor */
    function __construct()
    {
        $this->id = 0;
        $this->issuedDate = date('Y-m-d H:i:s');
        $this->returnDate = date('Y-m-d H:i:s');
        $this->fine = 0;
        $this->bookId = 0;
        $this->userId = 0;
    }

}
