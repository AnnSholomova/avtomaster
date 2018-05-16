<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Автосервис : Сотрудники</title>
		<style>
			kadri {
				display: table;
			}
			kadr {
				display: table-row;
			}
			kadri > form {
				display: table-row;
			}
			kadri > form > input {
				display: table-cell;
				padding: 10px;
				border: 1px solid darkblue;
			}
			kadr > * {
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
$result = $db->query('SELECT rowid, name, position, phone
                      FROM kadri 
                      ORDER BY name');
echo "<form action='edit_kadr.php' method='post'>\n";
echo "<input name='id'     
             placeholder='№' />\n";
echo "<input name='name'   
			 placeholder='ФИО' />\n";
echo "<input name='position' 
             placeholder='Занимаемая должность' />\n";
echo "<input name='phone'  
             placeholder='Номер телефона' />\n";
echo "<input name='new'
			 value='Создать'
			 type='submit' />\n";
echo "</form>\n";
while ($row = $result->fetchArray())
{
	echo "<form action='edit_kadr.php' method='post'>\n";
	echo "<input name='id'     
	             value='".$row['rowid']."' />\n";
	echo "<input name='name'   
				 value='".$row['name']."' />\n";
	echo "<input name='position' 
	             value='".$row['position']."' />\n";
	echo "<input name='phone'  
	             value='".$row['phone']."' />\n";
	echo "<input name='delete'
				 value='Удалить'
				 type='submit' />\n";
	echo "<input name='edit'
				 value='Изменить'
				 type='submit' />\n";
	echo "</form>\n";
}
echo "</kadri>\n";
?>
	</body>
</html>
