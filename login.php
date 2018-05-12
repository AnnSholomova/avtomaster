<?php
	if(true) 
	{
		header("Location: menu.php");
	} 
	else 
	{
		echo "<p>Вы ввели неправильный пароль или имя пользователя!</p>";
		echo "<p>Вернуться на <a href='index.php'>страницу авторизации</a>.</p>";
	}
?>
