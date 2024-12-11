<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="../webfonts/all.css">
    <title>Account</title>
</head>
<body style="background-color: #22d1ee;">
    <!-- Thông báo cập nhật thông tin -->
    <?php require_once 'includes/header.php'; ?>

    <div class="container">
        <div class="account-holder">
            <!--====================================================    MENU     ====================================================-->
            <div class="account-menu">
                <ul>
                    <li><a href="account.php"><i class="fas fa-user"></i> Thông tin cá nhân</a></li>
                    <li><a href="hoa_don.php"><i class="fas fa-file-invoice"></i> Tất cả đơn hàng</a></li>
                    <li><a href="sign_out.php"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
                </ul>
            </div>
            <!--====================================    HIỆN THÔNG TIN ĐƠN HÀNG CHI TIẾT    ===========================================-->
            <div class="invoice-detail">
                <?php
                    if(isset($_GET['don_hang'])){
                        $id_don_hang = $_GET['don_hang'];
                        $sql = "SELECT ngay_tao FROM don_hang 
                            WHERE id_don_hang = $id_don_hang";
                        $result = mysqli_query($connect, $sql);
                ?>

                <h2>Đơn hàng mã <?php echo $id_don_hang; ?></h2>
                <p>Ngày tạo: 
                    <?php 
                        $date = date_create(mysqli_fetch_assoc($result)['ngay_tao']); 
                        echo date_format($date,"s:i:H d/m/Y"); 
                    ?>
                </p>
                <!--Hiện thông tin sản phẩm trong đơn hàng chi tiết-->
                <table>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá bán</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                <?php
                        $tong_tien = 0;
                        $sql = "SELECT dhct.*, sp.*
                            FROM don_hang_chi_tiet dhct JOIN san_pham sp
                            ON dhct.id_san_pham = sp.id
                            WHERE id_don_hang = $id_don_hang;";
                        $result = mysqli_query($connect, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                        
                ?>
                    <tr>
                        <td>
                            <a href="detail.php?id=<?php echo $row['id']; ?>">
                                <?php echo $row['ten']; ?>
                            </a>
                        </td>
                        <td>
                            <?php echo number_format($row['gia'], 0, ',', '.'); ?> VNĐ
                        </td>
                        <td>
                            <?php echo $row['so_luong']; ?>
                        </td>
                        <td>
                            <?php echo number_format($row['gia'] * $row['so_luong'], 0, ',', '.'); ?> VNĐ
                        </td>
                    </tr>                            
                <?php
                            $tong_tien += ($row['gia'] * $row['so_luong']);
                        }
                    }
                ?>
                <tr>
                    <th colspan="3">Tổng giá trị đơn hàng:</th>
                    <th><?php echo number_format($tong_tien, 0, ',', '.') ?> VNĐ</th>
                </tr>
                <?php
                    $sql = "SELECT * FROM don_hang 
                        WHERE id_don_hang = $id_don_hang";
                    $result = mysqli_query($connect, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                    <tr>
                        <th colspan="4">
                            <h4>Thông tin người nhận</h4>
                        </th>
                    </tr>
                    <tr>
                        <td>Tên người nhận:</td>
                        <td colspan="3"><?php echo $row['ten']; ?></td>
                    </tr>
                    <tr>
                        <td>Số điện thoại:</td>
                        <td colspan="3"><?php echo $row['sdt']; ?></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ:</td>
                        <td colspan="3"><?php echo $row['dia_chi']; ?></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td colspan="3"><?php echo $row['email']; ?></td>
                    </tr>
                    <tr>
                        <td>Ghi chú:</td>
                        <td colspan="3"><?php echo $row['ghi_chu']; ?></td>
                    </tr>
                <?php
                    }
                ?>
                </table>
            </div>
        </div>  
    </div>
    
    <?php require_once 'includes/footer.php'; ?>
</body>
</html>