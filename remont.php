<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Автосервис : Сотрудники</title>
		<style>
			remonti {
				display: table;
			}
			remont {
				display: table-row;
			}
			remonti > form {
				display: table-row;
			}
			remonti > form > input {
				display: table-cell;
				padding: 10px;
				border: 1px solid darkblue;
			}
			remont > * {
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
$result = $db->query('SELECT rowid, name_car, regnumber, phone, vin, years, mileage, owner, state, price
                      FROM kadri 
                      ORDER BY name');
    
echo "<form action='edit_usl.php' method='post'>\n";
echo "<input name='id'     
             placeholder='№' />\n";
    
echo "<input name='name_car'   
			 placeholder='Марка машиины' />\n";
    
echo "<input name='regnumber' 
             placeholder='Регистрационный номер' />\n";
    
echo "<input name='phone'  
             placeholder='Номер телефона' />\n";
    
echo "<input name='vin'  
             placeholder='VIN' />\n";
    
echo "<input name='years'  
             placeholder='Год выпуска' />\n"; 

echo "<input name='mileage'  
             placeholder='Пробег' />\n";   
    
echo "<input name='owner'  
             placeholder='Владелец' />\n";  
    
echo "<input style='display: none' name='state' type=hidden value='В очереди'/>\n"; 
    
echo "<input style='display: none' name='price' type=hidden value='0'/>\n"; 
    
echo "<input name='new'
			 value='В очередь'
			 type='submit' />\n";
echo "</form>\n";
while ($row = $result->fetchArray())
{
	echo "<form action='edit_kadr.php' method='post'>\n";
	echo "<input name='id'     
	             value='".$row['rowid']."' />\n";
  
	echo "<input name='name_car'   
				 value='".$row['name_car']."' />\n";
  
	echo "<input name='regnumber' 
	             value='".$row['regnumber']."' />\n";
  
	echo "<input name='phone'  
	             value='".$row['phone']."' />\n";
  
  echo "<input name='vin'  
	             value='".$row['vin']."'  
	             placeholder='id' />\n";
  
  echo "<input name='years'  
	             value='".$row['years']."' />\n"; 
  
  echo "<input name='mileage'  
	             value='".$row['mileage']."' />\n"; 
  
   echo "<input name='owner'  
	             value='".$row['owner']."' />\n"; 
  
   echo "<input name='price'  
	             value='".$row['price']."' />\n"; 
  
	echo "<input name='add'
				 value='В ремонт'
				 type='submit' />\n";
	echo "<input name='finish'
				 value='Завершить ремонт'
				 type='submit' />\n";
	echo "</form>\n";
}
echo "</remonti>\n";
?>
	</body>
</html>
