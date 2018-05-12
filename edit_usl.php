<?php
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('db/avtomaster.db');
    }
}
$db = new MyDB();
if(true) // Вошел в систему и имеет право редактировать
{
	$id = $_POST['id']; 
	$name = $_POST['name'];
	$price_car = $_POST['price_car']; 
	$price_jeep = $_POST['price_jeep'];
	
	if (isset($_POST['delete'])) 
	{
		echo "Удалить";
		$st=$db->prepare('delete from uslugi  where rowid = :id');
		$st->bindParam(':id', $id, SQLITE3_INTEGER);
		$st->execute();
	}
	if (isset($_POST['edit'])) 
	{
		echo "Редактировать";
		$st=$db->prepare('update uslugi set 
							name = :name, 
							price_car = :price_car,
							price_jeep = :price_jeep
						  where rowid = :id;');
		$st->bindParam(':id',     $id,     SQLITE3_INTEGER);
		$st->bindParam(':name',   $name,   SQLITE3_TEXT);
		$st->bindParam(':price_car', $price_car, SQLITE3_TEXT);
		$st->bindParam(':price_jeep',  $price_jeep,  SQLITE3_TEXT);
		$st->execute();
	}
	if (isset($_POST['new'])) 
	{
		echo "Создать";
		$st=$db->prepare('insert into uslugi 
			(name, price_car, price_jeep)
			values
			(:name, :price_car, :price_jeep);');
		$st->bindParam(':name',   $name,   SQLITE3_TEXT);
		$st->bindParam(':price_car', $price_car, SQLITE3_TEXT);
		$st->bindParam(':price_jeep',  $price_jeep,  SQLITE3_TEXT);
		$st->execute();
	}
	header("Location: uslugi.php");
} 
else 
{
	echo "<p>Вы ввели неправильный пароль или имя пользователя!</p>";
	echo "<p>Вернуться на <a href='index.php'>страницу авторизации</a>.</p>";
}
?>
