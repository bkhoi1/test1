<?php
    require_once 'includes/connect.php';
    $id = $_GET['id'];
    $quantity = (isset($_GET['so_luong'])) ? $_GET['so_luong'] : 1;
    //Khi chưa có session(lần bấm thêm sản phẩm bất kì đầu tiên)
    if(empty($_SESSION['cart'])){
        $_SESSION['cart'] = array(); //Tạo session['cart'] dạng mảng rỗng
        
        $_SESSION['quantity'][$id] = $quantity;//Số lượng = 1
        //$_SESSION['quantity'] là biến session chỉ số lượng, $_SESSION['quantity'][$id] chỉ số lượng của sản phẩm có id = $id
    }
    //Khi đã có session
    else{
        $_SESSION['quantity'][$id] += $quantity;//Số lượng + 1
    }
    array_push($_SESSION['cart'], $id);// Đẩy id sản phẩm vào mảng(rỗng) Session['cart'] (ở dòng 7) đẩy id vào từng gt khác
    header('Location: cart_detail.php');//Sang bước 2