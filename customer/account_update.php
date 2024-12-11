<?php
    require_once 'includes/connect.php';
    $id = $_SESSION['id'];
    $ten = $_POST['ten_kh'];
    $sdt = $_POST['sdt'];
    $dia_chi = $_POST['dia_chi'];
    $ngay_sinh = $_POST['ngay_sinh'];
    echo $sql = "UPDATE khach_hang
        SET ten_kh = '$ten',
            sdt = '$sdt',
            dia_chi = '$dia_chi',
            ngay_sinh = '$ngay_sinh'
        WHERE id_khach_hang = $id";
    $result = mysqli_query($connect, $sql);
    header("Location: account.php?success=");

    
    