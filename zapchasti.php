<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Автосервис : Прайс-лист запчастей</title>
		<style>
			zapchasti {
				display: table;
				width: 100%;
			}
			zapchasti > form {
				display: table-row;
			}
			zapchasti > form > input[type = 'text'] {
				display: table-cell;
			}
			zapchasti > form > input:nth-child(1) {
				width: 10%;
			}
			zapchasti > form > input:nth-child(2) {
				width: 40%;
			}
			zapchasti > form > input:nth-child(3) {
				width: 10%;
			}
			zapchasti > form > input:nth-child(4) {
				width: 10%;
			}
			zapchasti > form > input:nth-child(5) {
				width: 10%;
			}
			zapchasti > form > input:nth-child(6) {
				width: 10%;
			}
			
		</style>
	</head>
	<body>
<?php
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('db/avtomaster.db');
    }
}

$db = new MyDB();

$result = $db->query('SELECT rowid, name, number, price 
                      FROM zapchasti 
                      ORDER BY name');
                      
echo "<zapchasti>\n";
echo "<form action='edit_zch.php' method='post'>\n";
echo "<input type='text' 
			 name='id'
             placeholder='№' />\n";
echo "<input name='name'
			 type='text'
			 placeholder='Наименование' />\n";
echo "<input name='number'
			 type='text'
             placeholder='Число' />\n";
echo "<input name='price'
			 type='text'
             placeholder='Цена' />\n";
echo "<input name='new'
			 value='Создать'
			 type='submit' />\n";
echo "</form>\n";

while ($row = $result->fetchArray())
{
	echo "<form action='edit_zch.php' method='post'>\n";
	echo "<input name='id'
				 type='text'
	             value='".$row['rowid']."' />\n";
	echo "<input name='name'
				 type='text'
				 value='".$row['name']."' />\n";
	echo "<input name='number'
				 type='text'
	             value='".$row['number']."' />\n";
	echo "<input name='price'
				 type='text'
	             value='".$row['price']."' />\n";
	echo "<input name='delete'
				 value='Удалить'
				 type='submit' />\n";
	echo "<input name='edit'
				 value='Изменить'
				 type='submit' />\n";
	echo "</form>\n";
}
echo "</zapchasti>\n";

?>
	</body>
</html>