<?php
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('db/avtomaster.db');
    }
}

$db = new MyDB();

$db->exec('drop table if exists zapchasti;');
$db->exec('create table zapchasti 
			(
				id int, 
				name varchar, 
				number int, 
				price int
			);');
					
$db->exec("insert into zapchasti 
			(id, name, number, price)
			values
			(1, 'запчасть1', 10, 10);");

$db->exec("insert into zapchasti 
			(id, name, number, price)
   				values
			(2, 'запчасть2', 20, 20);");
 
 
 
$result = $db->query('SELECT * FROM zapchasti');
var_dump($result->fetchArray());

?>


