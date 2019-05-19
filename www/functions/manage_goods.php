<?php
    function remove_item(){
        if (count($_POST) != 6){
            echo 'Заполнены не все поля' . PHP_EOL;
            return (0);
        }
        foreach ($_SESSION['goods'] as $id => $categorie){
            if ($_SESSION['goods'][$id]['category_name'] == $_POST['category']){
                foreach($_SESSION['goods'][$id]['items'] as $index => $var){
                    if ($var === $item){
                        unset($_SESSION['goods'][$id]['items'][$index]);
                        file_put_contents('./static/goods.json', serialize($_SESSION['goods']));
                        echo 'Товар удален' . PHP_EOL;
                        return (1);
                    }
                }
            }
        }
        echo 'Товар не найден' . PHP_EOL;
        return (0);
    }

    function modify_item($category_id, $item, $changed_item){
        if (count($item != 6)){
            echo 'Заполнены не все поля' . PHP_EOL;
            return (0);
        }
        if ($category_id > count($_SESSION['goods'])){
            echo 'Неверный ID категории' . PHP_EOL;
            return (0);
        }
        foreach ($_SESSION['goods'] as $id => $categorie){
            if ($_SESSION['goods'][$id]['category_id'] == $category_id){
                foreach($_SESSION['goods'][$id]['items'] as $var){
                    if ($var === $changed_item){
                        echo 'Такой товар уже существует' . PHP_EOL;
                        return (0);
                    }
                }
                foreach($_SESSION['goods'][$id]['items'] as $index => $var){
                    if ($var === $item){
                        $_SESSION['goods'][$id]['items'][$index] = $changed_item;
                        file_put_contents('./static/goods.json', serialize($_SESSION['goods']));
                        echo 'Товар изменен' . PHP_EOL;
                        return (1);
                    }
                }
            }
        }
        echo 'Товар не найден' . PHP_EOL;
        return (1);
    }
?>