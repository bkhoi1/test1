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
            <!--================================================    HIỆN THÔNG TIN     ====================================================-->
            <div class="invoice-info">
                <h2>Lịch sử đơn hàng của <?php echo $_SESSION['username']; ?></h2>
                <table cellspacing="0">
                    <tr>
                        <th>Mã đơn</th>
                        <th>Sản phẩm</th>
                        <th>Ngày tạo đơn</th>
                        <th>Thành tiền</th>
                        <th>Chi tiết</th>
                    </tr>
                
                    <?php 
                        $id = $_SESSION['id'];
                        $sql = "SELECT dhct.*, dh.ngay_tao
                            FROM don_hang_chi_tiet dhct JOIN don_hang dh
                            ON dhct.id_don_hang = dh.id_don_hang
                            WHERE dh.id_khach_hang = $id
                            GROUP BY dh.id_don_hang;";
                        $result = mysqli_query($connect, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['id_don_hang']; ?>
                        </td>
                        <td>
                            <?php 
                                $id_don_hang = $row['id_don_hang'];
                                $sub_sql = "SELECT sp.ten
                                FROM san_pham sp JOIN don_hang_chi_tiet dhct
                                ON dhct.id_san_pham = sp.id
                                WHERE dhct.id_don_hang = $id_don_hang;";
                                $sub_result = mysqli_query($connect, $sub_sql);
                                while($sub_row = mysqli_fetch_assoc($sub_result)){
                                    echo "- " . $sub_row['ten'] . "<br>";
                                }
                            ?>
                        </td>
                        <td>
                            <?php $date=date_create($row['ngay_tao']); echo date_format($date,"d/m/Y"); ?>
                        </td>
                        <td>
                            <?php echo number_format($row['thanh_tien'], 0, ',', '.'); ?> VNĐ
                        </td>
                        <td>
                            <a href="hoa_don_chi_tiet.php?don_hang=<?php echo $row['id_don_hang']; ?>"><i class="fas fa-eye"></i></a>
                        </td>
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