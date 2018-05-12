<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Автосервис : Прайс-лист запчастей</title>
		<style>
			zapchasti {
				display: table;
			}
			zapchast {
				display: table-row;
			}
			zapchasti > form {
				display: table-row;
			}
			zapchasti > form > input {
				display: table-cell;
				padding: 10px;
				border: 1px solid darkblue;
			}
			zapchast > * {
				display: table-cell;
				padding: 10px;
				border: 1px solid darkblue;
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
echo "<form action='edit_zch.php' method='post'>\n";
echo "<input name='id'     
             placeholder='№' />\n";
echo "<input name='name'   
			 placeholder='Наименование' />\n";
echo "<input name='number' 
             placeholder='Число' />\n";
echo "<input name='price'  
             placeholder='Цена' />\n";
echo "<input name='new'
			 value='Создать'
			 type='submit' />\n";
echo "</form>\n";
while ($row = $result->fetchArray())
{
	echo "<form action='edit_zch.php' method='post'>\n";
	echo "<input name='id'     
	             value='".$row['rowid']."'
	             placeholder='id' />\n";
	echo "<input name='name'   
				 value='".$row['name']."'   
				 placeholder='id' />\n";
	echo "<input name='number' 
	             value='".$row['number']."' 
	             placeholder='id' />\n";
	echo "<input name='price'  
	             value='".$row['price']."'  
	             placeholder='id' />\n";
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
