<?php
if (false) // тут проверка на наличие авторизации
{
	header("Location: index.php");
	die();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Автосервис : Главное меню</title>
		<style>
			a {
				display: block;
				background-color: lightblue;
				text-align: center;
				padding: 10px;
				border-radius: 10px;
				text-decoration: none;
				color: black;
			}
			a.menu {
				margin-top: 5px;
				margin-left: 100px;
				margin-right: 100px;
			}
			
			a.exit {
				bottom: 10px;
				right: 10px;
				position: absolute;
				background-color: #f182eeb3;
			}
		</style>
	</head>
	<body>
		<a class="menu" href="zapchasti.php">Просмотр прайс-листа "Запчасти"</a>
		<a class="menu" href="uslugi.php">Просмотр прайс-листа "Услуги"</a>
		<a class="menu" href="kadri.php">Просмотр, редактирование списка сотрудников</a>
		<a class="menu" href="remont.php">Поступление автомобиля на ремонт</a>
		<a class="menu" href="otchet_schet.php">Отчет о выписке счетов</a>
		<a class="menu" href="otchet_rab.php">Отчет о проделанной работе</a>
		<a class="menu" href="otchet_vr.php">Отчет о периоде времени</a>
		<a class="exit" href="index.php">Выход</a>
	</body>
</html>
