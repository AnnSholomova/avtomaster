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
				name varchar, 
				number int, 
				price int
			);');
					
$db->exec("insert into zapchasti 
			(name, number, price)
			values
			('запчасть1', 10, 10);");

$db->exec("insert into zapchasti 
			(name, number, price)
   				values
			('запчасть2', 20, 20);");
 
 
 
$result = $db->query('SELECT * FROM zapchasti');
var_dump($result->fetchArray());


$db->exec('drop table if exists uslugi;');
$db->exec('create table uslugi 
			(
				name varchar, 
				price_car varchar,
				price_jeep varchar
			);');
					
$db->exec("insert into uslugi 
			(name, price_car, price_jeep)
			values
			('Диагностика подвески', 'от 500 рублей', 'от 500 рублей');");
$db->exec("insert into uslugi 
			(name, number, price)
   				values
			('Диагностика заправочных емкостей', 'от 300 рублей', от '500 рублей');");
 
 
 
$result = $db->query('SELECT * FROM uslugi');
var_dump($result->fetchArray());

?>


