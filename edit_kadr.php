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
	$position = $_POST['position']; 
	$phone = $_POST['phone'];
	
	if (isset($_POST['delete'])) 
	{
		echo "Удалить";
		$st=$db->prepare('delete from kadri where rowid = :id');
		$st->bindParam(':id', $id, SQLITE3_INTEGER);
		$st->execute();
	}
	if (isset($_POST['edit'])) 
	{
		echo "Редактировать";
		$st=$db->prepare('update kadri set 
							name = :name, 
							position = :position,
							phone = :phone
						  where rowid = :id;');
		$st->bindParam(':id',      $id,       SQLITE3_INTEGER);
		$st->bindParam(':name',    $name,     SQLITE3_TEXT);
		$st->bindParam(':position',$position, SQLITE3_TEXT);
		$st->bindParam(':phone',   $phone,    SQLITE3_TEXT);
		$st->execute();
	}
	if (isset($_POST['new'])) 
	{
		echo "Создать";
		$st=$db->prepare('insert into kadri 
			(name, position, phone)
			values
			(:name, :position, :phone);');
		$st->bindParam(':name',    $name,     SQLITE3_TEXT);
		$st->bindParam(':position',$position, SQLITE3_TEXT);
		$st->bindParam(':phone',   $phone,    SQLITE3_TEXT);
		$st->execute();
	}
	header("Location: kadri.php");
} 
else 
{
	echo "<p>Вы ввели неправильный пароль или имя пользователя!</p>";
	echo "<p>Вернуться на <a href='index.php'>страницу авторизации</a>.</p>";
}
?>
