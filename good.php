<?php
$login = filter_var(trim($_POST['login']),
FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),
FILTER_SANITIZE_STRING);

 $pass = md5($pass."qwerty11");
 $pass2 = md5($pass2."qwerty11");


 $mysql = new mysqli('localhost','alina','123583','kz');

 $result = $mysql->query("SELECT*FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
 $user = $result->fetch_assoc();
 if (count($user) == 0) { //oшибка: count(): Parameter must be an array or an object that implements
 echo "Пользователь не найден";
 exit();
 }
setcookie('user', $user['login'], time() + 3600, "/");

 $mysql->close();

 header('Location: menu.html');
?>