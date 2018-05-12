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

$result = $db->query('SELECT * FROM zapchasti');
echo "<zapchasti>\n";
echo "<zapchast>\n";
echo "<id>1</id>\n";
echo "<name>2</name>\n";
echo "<number>3</number>\n";
echo "<price>4</price>\n";
echo "</zapchast>\n";

while ($row = $result->fetchArray())
{
	echo "<zapchast>\n";
	echo "<id>".$row['id']."</id>\n";
	echo "<name>".$row['name']."</name>\n";
	echo "<number>".$row['number']."</number>\n";
	echo "<price>".$row['price']."</price>\n";
	echo "</zapchast>\n";
}
echo "</zapchasti>\n";

?>
	</body>
</html>