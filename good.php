<?php
$login = $_POST['login'];
$password = $_POST['password'];

 $password = md5($password."qwerty11");
 $password2 = md5($password2."qwerty11");


 $mysql = new mysqli('localhost','alinamust','123583','kuxko');

 $result = $mysql->query("SELECT*FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
 $user = $result->fetch_assoc();
 if (count($user) == 0) { //oшибка: count(): Parameter must be an array or an object that implements
 echo "Пользователь не найден";
 exit();
 }
setcookie('user', $user['login'], time() + 3600, "/");

 $mysql->close();

 header('Location: menu.html');
?>