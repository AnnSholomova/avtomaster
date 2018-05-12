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
	$number = $_POST['number']; 
	$price = $_POST['price'];
	
	if (isset($_POST['delete'])) 
	{
		echo "Удалить";
		$st=$db->prepare('delete from zapchasti where rowid = :id');
		$st->bindParam(':id', $id, SQLITE3_INTEGER);
		$st->execute();
	}
	if (isset($_POST['edit'])) 
	{
		echo "Редактировать";
		$st=$db->prepare('update zapchasti set 
							name = :name, 
							number = :number,
							price = :price
						  where rowid = :id;');
		$st->bindParam(':id',     $id,     SQLITE3_INTEGER);
		$st->bindParam(':name',   $name,   SQLITE3_TEXT);
		$st->bindParam(':number', $number, SQLITE3_INTEGER);
		$st->bindParam(':price',  $price,  SQLITE3_INTEGER);
		$st->execute();
	}
	if (isset($_POST['new'])) 
	{
		echo "Создать";
		$st=$db->prepare('insert into zapchasti 
			(name, number, price)
			values
			(:name, :number, :price);');
		$st->bindParam(':name',   $name,   SQLITE3_TEXT);
		$st->bindParam(':number', $number, SQLITE3_INTEGER);
		$st->bindParam(':price',  $price,  SQLITE3_INTEGER);
		$st->execute();
	}
	header("Location: zapchasti.php");
} 
else 
{
	echo "<p>Вы ввели неправильный пароль или имя пользователя!</p>";
	echo "<p>Вернуться на <a href='index.php'>страницу авторизации</a>.</p>";
}
?>
