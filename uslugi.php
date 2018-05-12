<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Автосервис : Прайс-лист услуг</title>
		<style>
			uslugi {
				display: table;
			}
			usluga {
				display: table-row;
			}
			uslugi > form {
				display: table-row;
			}
			uslugi > form > input {
				display: table-cell;
				padding: 10px;
				border: 1px solid darkblue;
			}
			usluga > * {
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
$result = $db->query('SELECT rowid, name, price_car, price_jeep
                      FROM uslugi 
                      ORDER BY name');
echo "<form action='edit_usl.php' method='post'>\n";
echo "<input name='id'     
             placeholder='№' />\n";
echo "<input name='name'   
			 placeholder='Наименование' />\n";
echo "<input name='price_car' 
             placeholder='Цена для легковых автомобилей' />\n";
echo "<input name='price_jeep'  
             placeholder='Цена для джипов и минивенов' />\n";
echo "<input name='new'
			 value='Создать'
			 type='submit' />\n";
echo "</form>\n";
while ($row = $result->fetchArray())
{
	echo "<form action='edit_usl.php' method='post'>\n";
	echo "<input name='id'     
	             value='".$row['rowid']."'
	             placeholder='id' />\n";
	echo "<input name='name'   
				 value='".$row['name']."'   
				 placeholder='id' />\n";
	echo "<input name='price_car' 
	             value='".$row['price_car']."' 
	             placeholder='id' />\n";
	echo "<input name='price_jeep'  
	             value='".$row['price_jeep']."'  
	             placeholder='id' />\n";
	echo "<input name='delete'
				 value='Удалить'
				 type='submit' />\n";
	echo "<input name='edit'
				 value='Изменить'
				 type='submit' />\n";
	echo "</form>\n";
}
echo "</uslugi>\n";
?>
	</body>
</html>
