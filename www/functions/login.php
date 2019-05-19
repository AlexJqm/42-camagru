<?php
    function auth($login, $passwd) {
        if (!file_exists('../static/private/passwd')){
            return (FALSE);
        }
        $arr = unserialize(file_get_contents('../static/private/passwd'));
        foreach ($arr as $key => $var) {
            if ($var['login'] === $login && $var['passwd'] === $passwd) {
                $_SESSION['role'] = $var['role'];
                return (TRUE);
            }
        }
        return (FALSE);
    }

    session_start();
    if (auth($_GET['login'], hash('sha256', $_GET['passwd']))) {
        $_SESSION['authorized_user'] = $_GET['login'];
        $_SESSION['loggedin'] = TRUE;
        header('Location: /index.php');
        return 0;
    }
    else {
        echo 'Введены некорректные данные';
        return 1;
    }
?>