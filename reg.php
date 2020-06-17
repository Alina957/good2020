<?php

include_once 'connect.php';

class CreaterAccount {
    private $name_clacc;
    private $login_class;
    private $email_class;
    private $password_class;
    private $password2_class;
    private $maxLentghLogin;
    private $maxLentghPassword;
    private $maxLentghPassword2;
    private $minLentghLogin;
    private $minLentghPassword;
    private $minLentghPassword2;


    function __construct($name,$login,$email,$password,$password2,$maxLentghLogin)
    {
        $this->name_clacc = htmlspecialchars($name);
        $this->login_class = htmlspecialchars($login);
        $this->email_class = htmlspecialchars($email);
        $this->password_class = htmlspecialchars($password);
        $this->password2_class = htmlspecialchars($password2);
        $this->maxLentghLogin=12;
        $this->maxLentghPassword=32;
        $this->maxLentghPassword2=32;
        $this->minLentghLogin=6;
        $this->minLentghPassword=6;
        $this->minLentghPassword2=6;
    }

    public function register(){

        if ($this->checkLoginDB())
            return false;
        else {
            if ($this->checkLogin())
            {
               if ($this->checkPassword2())
               {
                   if ($this->checkPassword()){
                       if ($this->checkEmail()){
                           if ($this->checkName()){
                               if ($this->addAccountDB())
                                   return true;
                               else
                                   return false;
                           }
                           else
                               return false;
                       }
                       else
                           return false;
                   }
                   else
                       return false;
               }
               else
                   return false;
            }
            else
                return false;
        }

    }
    private function addAccountDB() //true-добавился, false- не добавился
    {
        $connect = new connectBD();
        $connect->connect();

        $add = $connect->pdo->prepare("INSERT INTO users (name,login,email,password,password2) VALUES (?,?,?,?,?) ");
        $add->execute(array($this->name_clacc,$this->login_class,$this->email_class,$this->password_class,$this->password2_class));
        if ($add)
            return true;
        else
            return false;

        $connect->closeConnect();

    }

    private function checkName(){
        if (filter_var($this->name_clacc,FILTER_VALIDATE_EMAIL))
            return true;
        else
            return false;

    }
    private function checkLogin() // true - подходит, false - не подходит
    {
        if (strlen($this->login_class)>=$this->minLentghLogin && strlen($this->login_class)<=$this->maxLentghLogin) {
            $notcorrectsymbolTwo = "!@\"#№;$%^:&?*()-_+=//|\\`.,";
            $reg = "/[a-Z0-9]/";
            $bool = false;
            for ($i = 0; $i < strlen($this->login_class); $i++) {
                for ($j = 0; $j < strlen($notcorrectsymbolTwo); $j++)
                    if ($this->login_class[$i] == $notcorrectsymbolTwo[$j])
                        $bool = true;
            }
            if ($bool) {
                if (preg_match($reg, $this->login_class))
                    return false;
                else
                    return true;
            } else
                return false;
        }
        else
            return false;
    }
    private function checkEmail(){
        if (filter_var($this->email_class,FILTER_VALIDATE_EMAIL))
            return true;
        else
            return false;

    }
    private function checkPassword(){

        if (strlen($this->password_class)>=$this->minLentghPassword && strlen($this->password_class)<=$this->maxLentghPassword)
        {
             $notcorrectsymbolTwo = "!@\"#№;$%^:&?*()-_+=//|\\`.,";
            $reg = "/[a-Z0-9]/";
            $bool = false;
            for ($i = 0; $i < strlen($this->password_class); $i++) {
                for ($j = 0; $j < strlen($notcorrectsymbolTwo); $j++)
                    if ($this->password_class[$i] == $notcorrectsymbolTwo[$j])
                        $bool = true;
        }
            if ($bool) {
                if (preg_match($reg, $this->password_class))
                    return false;
                else
                    return true;
            } else
                return false;
        }
        else
            return false;

    }
    private function checkPassword2()
    {
        if (strlen($this->password2_class) >= $this->minLentghPassword2 && strlen($this->password_class) <= $this->maxLentghPassword2) {
            $notcorrectsymbolTwo = "!@\"#№;$%^:&?*()-_+=//|\\`.,";
            $reg = "/[a-Z0-9]/";
            $bool = false;
            for ($i = 0; $i < strlen($this->password2_class); $i++) {
                for ($j = 0; $j < strlen($notcorrectsymbolTwo); $j++)
                    if ($this->password2_class[$i] == $notcorrectsymbolTwo[$j])
                        $bool = true;
            }
            if ($bool) {
                if (preg_match($reg, $this->password2_class))
                    return false;
                else
                    return true;
            } else
                return false;
        } else
            return false;

        if (strlen($this->password_class)!=strlen($this->password2_class)) {
            return false;}
        else
            return true;


    }

    private function checkLoginDB(){

        $connect = new connectBD();
        $connect ->connect();

        $query_1=$connect->pdo->prepare("SELECT * FROM users WHERE login=?");
        $query_1->execute();
        if (($row_1=$query_1->fetch())>0)
            return false;
        else
            return true;

        $connect ->closeConnect();

    }
}



?>
