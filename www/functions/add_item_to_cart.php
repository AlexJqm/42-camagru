<?php
    session_start();
    if (!isset($_SESSION['cart_items'])){
        $_SESSION['cart_items'][] = array('category_id' => $_GET['category_id'], 'item_id' => $_GET['item_id'],
        'stock' => $_GET['stock'], 'price_id' => $_GET['price_id']);
        header('Location: /index.php');
        return;
    }
    else {
        foreach($_SESSION['cart_items'] as $id => $line){
            if ($_GET['category_id'] == $line['category_id'] and $_GET['item_id'] == $line['item_id']){
                $_SESSION['cart_items'][$id]['stock']++;
                header('Location: /index.php');
                return;
            }
        }
    }
    array_push($_SESSION['cart_items'], array('category_id' => $_GET['category_id'], 'item_id' => $_GET['item_id'], 
    'stock' => $_GET['stock'], 'price_id' => $_GET['price_id']));
    header('Location: /index.php');
    return;
?>  