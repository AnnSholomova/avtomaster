<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Автосервис : Вход в систему</title>
		<style>
			form {
				margin-left: 40%;
				margin-right: 40%;
				margin-top: 15%;
				padding: 20px;
				border: 2px solid darkblue;
				border-radius: 10px;
			}
			input {
				display: block;
				margin: 10px;
			}
		</style>
	</head>
	<body>
		<form action="login.php" method="post">
			<input type="text" name="login" value="" placeholder="Логин" />
			<input type="password" name="pwd" value="" placeholder="Пассворд" />
			<input type="submit" name="" value="Вход в систему" />
		</form>
	</body>
</html>
