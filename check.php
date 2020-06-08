<?php
    $name= $_POST['name'];
    $login= $_POST['login'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $password2=$_POST['password2'];
 $mysql = new mysqli('localhost','alinamust','123583','kuxko');
 $result = $mysql->query("SELECT*FROM `users` WHERE `login` = '$login'");
             $user = $result->fetch_assoc();
 $mysql = new mysqli('localhost','alinamust','123583','kuxko');
 $resuld = $mysql->query("SELECT*FROM `users` WHERE `password` = '$password'");
             $users = $resuld->fetch_assoc();


    if (mb_strlen($login)<5 || mb_strlen($login)>90){
    echo"Длина логина не корректна";
    exit ();
    }  else if (mb_strlen ($name)<3 || mb_strlen($name)>50)  {
    echo "Длина имени не корректна";
    exit;
    } else if (mb_strlen($password)<2 || mb_strlen($password)>6) {
    echo "Длина пароля не корректна (от 2 до 6 символов)";
    exit;
    } else if ($password!=$password2) {
    echo "Пароли не совпадают, повторите попытку";
    exit;
    }

    $password=md5($password."qwerty11");
    $password2=md5($password."qwerty11");

$mysql = new mysqli('localhost','alinamust','123583','kuxko');
$mysql->query("INSERT INTO `users` (`name`,`login`,`email`, `password`, `password2`)
VALUES('$name', '$login', '$email','$password', '$password2')");
$mysql->close();

header('Location: index.php');
?>





