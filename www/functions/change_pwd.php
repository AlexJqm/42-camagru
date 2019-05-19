<?php
if ($_POST['submit'] === 'OK'){
    session_start();
    $old_pass = hash('sha256' ,$_POST['oldpw']);
    $new_pass = hash('sha256' ,$_POST['newpw']);
    $new_pass_again = hash('sha256' ,$_POST['newpw_repeat']);
    if ($new_pass != $new_pass_again){
        echo 'Введенные пароли не совпдают' . PHP_EOL;
        return 1;
    }
    if (!file_exists('../static/private/passwd')){
        echo 'ERROR' . PHP_EOL;
        return 1;
    }
    file_exists('../static/private/passwd');
    $arr = unserialize(file_get_contents('../static/private/passwd'));
    if ($arr != NULL){
        foreach ($arr as $key => $val){
            if ($val['login'] === $_SESSION['authorized_user'] and $val['passwd'] === $old_pass){
                $arr[$key]['passwd'] = $new_pass;
                file_put_contents('../static/private/passwd', serialize($arr));
                header('Location: /index.php');
                return 0;
            }
        }
    }
    echo 'ERROR' . PHP_EOL;
    return 1;
    }
?>