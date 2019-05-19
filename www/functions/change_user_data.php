<?php    
session_start();
if ($_POST['submit'] === 'OK'){
    $pass = hash('sha256' ,$_POST['passwd']);
    if (!file_exists('../static/private/passwd')){
        echo 'ERROR' . PHP_EOL;
        return 1;
    }
    $arr = unserialize(file_get_contents('../static/private/passwd'));
    if ($arr != NULL){
        foreach ($arr as $key => $val){
            if ($val['login'] === $_SESSION['authorized_user'] and $val['passwd'] === $pass){
                if ($_POST['name']){
                    $arr[$key]['name'] = $_POST['name'];
                }
                if ($_POST['surname']){
                    $arr[$key]['surname'] = $_POST['surname'];
                }
                if ($_POST['email']){
                    $arr[$key]['email'] = $_POST['email'];
                }
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