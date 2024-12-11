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
    <?php require_once 'includes/connect.php'; ?>

    <?php
        if(isset($_GET['success'])){
    ?>
    <script>
        alert("Cập nhật thông tin thành công!");
    </script>
    <?php
        }
    ?>
    <?php require_once 'includes/header.php'; ?>
    <div class="container">
        <div class="account-holder">
            <!--====================================================    MENU     ====================================================-->
            <div class="account-menu">
                <ul>
                    <li><a href="acoount.php"><i class="fas fa-user"></i> Thông tin cá nhân</a></li>
                    <li><a href="hoa_don.php"><i class="fas fa-file-invoice"></i> Tất cả đơn hàng</a></li>
                    <li><a href="sign_out.php"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
                </ul>
            </div>
            <!--================================================    HIỆN THÔNG TIN     ====================================================-->
            
            <?php
                $id = $_SESSION['id'];
                $sql = "SELECT * FROM khach_hang WHERE id_khach_hang = $id";
                $result = mysqli_query($connect, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
            <div class="account-info">
                <form action="account_update.php" method="POST">
                    <h2>Chào mừng <?php echo ($row['ten_kh'] != "") ? $row['ten_kh'] : $row['username']; ?>!</h2>
                    <table>
                        <tr>
                            <td>Họ và tên:</td>
                            <td><input type="text" name="ten_kh" value="<?php echo $row['ten_kh']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Username:</td>
                            <td><input type="text" name="username" value="<?php echo $row['username']; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại:</td>
                            <td><input type="text" name="sdt" value="<?php echo $row['sdt']; ?>" placeholder="+84"></td>
                        </tr>
                        <tr>
                            <td>Ngày sinh:</td>
                            <td><input type="date" name="ngay_sinh" value="<?php echo $row['ngay_sinh']; ?>" min="01-01-1900"></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ:</td>
                            <td><input type="text" name="dia_chi" value="<?php echo $row['dia_chi']; ?>"></td>
                        </tr>
                    </table>
                    <button type="submit">Cập nhật thông tin cá nhân</button>
                </form>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
    <?php require_once 'includes/footer.php'; ?>
</body>
</html>