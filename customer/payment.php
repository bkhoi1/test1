<?php
    require_once 'includes/connect.php';
    
    $id_khach_hang  =   isset($_SESSION['id']) ? $_SESSION['id'] : 'null';
    $ten            =   $_POST['ten'];
    $sdt            =   $_POST['sdt'];
    $dia_chi        =   $_POST['dia_chi'];
    $email          =   isset($_POST['email']) ? $_POST['email'] : null;
    $ghi_chu        =   isset($_POST['ghi_chu']) ? $_POST['ghi_chu'] : null;

    //Tạo bản ghi cột hóa đơn
    $sql = "INSERT INTO don_hang(id_khach_hang, ngay_tao, ten, sdt, dia_chi, email, ghi_chu)
        VALUES  ($id_khach_hang, CURTIME(), '$ten', '$sdt', '$dia_chi', '$email', '$ghi_chu')";
    $result = mysqli_query($connect, $sql);

    //Lấy về id đơn hàng vừa tạo
    $id_don_hang =  mysqli_insert_id($connect);

    //Tạo hóa đơn chi tiết
    $sql = "";
    $thanh_tien = $_SESSION['thanh_tien'];

    for($i = 0; $i < count($_SESSION['cart']); $i++)
    {
        $id_san_pham = $_SESSION['cart'][$i];
        $so_luong = $_SESSION['quantity'][$id_san_pham] ;

        $sql .=  "INSERT INTO don_hang_chi_tiet(id_don_hang, id_san_pham, so_luong, thanh_tien)
            VALUES  ($id_don_hang, $id_san_pham, $so_luong, $thanh_tien);";
    }
    $result = mysqli_multi_query($connect, $sql);
    $sql;

    //Xóa giỏ hàng
    unset($_SESSION['cart']);
    unset($_SESSION['thanh_tien']);
    unset($_SESSION['quantity']);
    
    if(!headers_sent()){
        header("Location: home.php?success");
    }
    
?>