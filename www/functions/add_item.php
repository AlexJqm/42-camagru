<?php
    session_start();
    foreach($_POST as $val){
        if (!$val){
            header('Location: /add_item.php');
            return 0;
        }
    }
    if ($category_id > count($_SESSION['goods'])){
        echo 'Неверный ID категории';
        return 0;
    }
    foreach ($_SESSION['goods'] as $id => $categorie){
        if ($_SESSION['goods'][$id]['category_name'] == $_POST['category']){
            foreach($_SESSION['goods'][$id]['items'] as $var){
                if ($var['name'] == $_POST['name'] and $var['desc'] == $_POST['desc'] and 
                $var['price'] == $_POST['price']){
                    echo 'Такой товар уже существует';
                    return 0;
                }
            }
            $c = count($_SESSION['goods'][$id]['items']);
            $new_item = array('id' => $id ,'name' => $_POST['name'], 'desc' => $_POST['desc'], 'price' => $_POST['price'], 
            'stock' => $_POST['stock'], 'img' => $_POST['img'], 
            'url' => '/item.php?category_id='. $id . '&item_id=' . $c);
            array_push($_SESSION['goods'][$id]['items'], $new_item);
            file_put_contents('../static/goods.json', serialize($_SESSION['goods']));
            header('Location: /index.php');
        }
    }
    header('Location: /index.php');
    return (1);
?>