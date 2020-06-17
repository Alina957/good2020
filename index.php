<!DOCTYPE html>
<html lang ="ru">
<head>
 <style>
        body{
            background: url('s1200.jpg') no-repeat;
            -moz-background-size: 100%;
            -webkit-background-size: 100%;
            -o-background-size: 100%;
            background-size: 100%;
        }
    </style>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, install-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
   <link rel="stylesheet" href="styly.css">
   <title>Добро пожаловать!</title>
</head>
<body>
     <div class="container" mt-4>
        <h1 style= "color: black; text-align:center;"> Форма регистрации </h1>

        <form action = "reg.php" method ="post">
          <input type="text" class="form-control" name ="name" id = "name" placeholder="Введите имя"><br>
          <input type="text" class="form-control" name ="login" id = "login" placeholder="Введите логин"><br>
          <input type="text" class="form-control" name ="email" id = "email" placeholder="Введите email"><br>
          <input type="password" class="form-control" name ="password" id = "password" placeholder="Введите пароль"><br>
          <input type="password" class="form-control" name ="password2" id = "password2" placeholder="Повторите пароль"><br>
          <button class="btn btn-success" type="submit"> Зарегистрироваться </button>
           <p style= "text-align:center;">
                      У вас уже есть аккаунт? - <a href="vhod.php">авторизуйтесь</a>!
                  </p>

     </div>
</body>
</html>