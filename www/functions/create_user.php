<?php
    if ($_POST['submit'] === 'OK'){
            session_start();
            $login = $_POST['login'];
            $name= $_POST['name'];
            $surname= $_POST['surname'];
            if (!$login or !$_POST['passwd'] or !$_POST['passwd_repeat'] or !$_POST['name'] or !$_POST['surname']){
                echo "Заполните форму" ;
                return 1;
            }
            $pass = hash('sha256' ,$_POST['passwd']);
            $pass_repeat = hash('sha256' ,$_POST['passwd_repeat']);
            $email = $_POST['login'];
            if (!file_exists('../static/private/')){
                mkdir('../static/private/');
            }
            if (!file_exists('../static/private/passwd')){
                touch('../static/private/passwd');
                $root_pass = hash('sha256' , 'root');
                $root = array('login' => 'root', 'passwd' => $root_pass, 'email' => 'root@root', 'role' => 'admin', 'name' => 'root', 'surname' => 'root');
                $arr[] = $root;
            }
            $arr = unserialize(file_get_contents('../static/private/passwd'));
            if ($arr != NULL){
                foreach ($arr as $val){
                    if ($val['login'] === $login){
                        echo "Пользователь с таким именем уже существует" ;
                        return 1;
                    }
                }
            }
            if ($pass_repeat != $pass){
                return 'Пароли не совпадают' . PHP_EOL;
            }
            $new_usr = array('login' => $login, 'passwd' => $pass, 'email' => $email, 'role' => '', 'name' => $name, 'surname' => $surname);
            if ($arr) {
                array_push($arr, $new_usr);
            }
            else {
                $arr[] = $new_usr;
            }
            $_SESSION['authorized_user'] = $login;
            $_SESSION['loggedin'] = true;
            file_put_contents('../static/private/passwd', serialize($arr));
            header('Location: http://localhost:8101/index.php');
            return 0;
        }
        else {
            echo "Неверный запрос" ;
            return 1;
    }
?>