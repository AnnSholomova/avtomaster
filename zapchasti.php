<?php
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('db/avtomaster.db');
    }
}

$db = new MyDB();

$result = $db->query('SELECT * FROM zapchasti');
var_dump($result->fetchArray());

?>


