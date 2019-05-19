<?php
if ($_POST['submit'] === 'OK'){
    session_start();
    $pass = hash('sha256' ,$_POST['passwd']);
    if (!file_exists('../static/private/passwd')){
        echo 'ERROR' . PHP_EOL;
        return 1;
    }
    $arr = unserialize(file_get_contents('../static/private/passwd'));
    if ($arr != NULL){
        foreach ($arr as $key => $val){
            if ($val['login'] === $_SESSION['authorized_user'] and $val['passwd'] === $pass){
                foreach ($arr as $key_new => $val_new){
                    if ($val_new['login'] === $_POST['login']){
                        if ($_POST['login'] === 'root'){
                            return 0;
                        }
                        else {
                            unset ($arr[$key_new ]);
                            file_put_contents('../static/private/passwd', serialize($arr));
                            header('Location: /index.php');
                            return 0;
                        }
                    }

                }
            }
        }
    }
    return 1;
    }
?>