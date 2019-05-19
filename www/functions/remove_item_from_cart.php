<?php
    session_start();
    foreach($_SESSION['cart_items'] as $id => $line){
        if ($_GET['category_id'] == $line['category_id'] and $_GET['item_id'] == $line['item_id']){
            unset($_SESSION['cart_items'][$id]);
            header('Location: /cart.php');
            exit;
        }
    }
?> 