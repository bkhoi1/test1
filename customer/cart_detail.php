<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="../webfonts/all.css">
	<title>Giỏ hàng</title>
</head>

<body>
	<?php require_once 'includes/connect.php'; ?>
<!--==========================================================    XÓA GIỎ HÀNG   =====================================================================-->
    <?php
        if(isset($_POST['cart_delete_btn'])){
            unset($_SESSION['cart']);
            unset($_SESSION['thanh_tien']);
            unset($_SESSION['quantity']);
            header("Location: cart_detail.php");
        }
    ?>
<!--==========================================================    UPDATE GIỎ HÀNG   =====================================================================-->
    <?php
        if(isset($_POST['update_cart'])){
            $amount = $_POST['amount'];
            foreach($amount as $key => $value)
            {
                $_SESSION['quantity'][$key] = $value;
            }
        }
    ?>
<!--=========================================================    THÔNG TIN NGƯỜI NHẬN  =====================================================================-->
    <?php require_once 'includes/header.php'; ?>

    <div class="container">
        <div class="cart-holder">
            <div class="shipping-info">
                <h2>Thông tin giao hàng</h2>
                <?php
                    if(!isset($_SESSION['id'])){
                ?>
                <h6>Đã có tài khoản? <a href="sign.php">Đăng nhập ngay</a></h6>
                <?php
                    }
                ?>
                <form action="payment.php" method="POST">
                <table>
                    <?php 
                        $ten = "";
                        $sdt = "";
                        $email = "";
                        $dia_chi = "";
                        if(isset($_SESSION['id'])){
                            $id = $_SESSION['id'];
                            $sql = "SELECT * FROM khach_hang 
                                WHERE id_khach_hang = $id";
                            $result = mysqli_query($connect, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                                $ten = $row['ten_kh'];
                                $sdt = $row['sdt'];
                                $email = $row['email'];
                                $dia_chi = $row['dia_chi'];
                            }
                        }
                    ?>

                    <tr>
                        <td>
                            <label for="">Họ và tên</label><br>
                            <input type="text" name="ten" value="<?php echo $ten; ?>" required>
                        </td>
                        <td>
                            <label for="">Số điện thoại</label><br>
                            <input type="text" name="sdt" value="<?php echo $sdt; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="">Email</label><br>
                            <input type="email" name="email" value="<?php echo $email; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="">Địa chỉ</label><br>
                            <textarea name="dia_chi" cols="50" rows="5" required><?php echo $dia_chi; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="">Ghi chú</label><br>
                            <textarea name="ghi_chu" cols="50" rows="5"></textarea>
                        </td>
                    </tr>
                    <?php
                        if (isset($_SESSION['cart'])) {
                            ?>
                    <tr>
                        <td colspan="2">
                            <button type="submit">Thanh toán</button>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
                </form>
                
            </div>
<!--===========================================================  HIỂN THỊ GIỎ HÀNG   ========================================================-->
            <div class="shipping-cart">
            <h2>Giỏ hàng của bạn</h2>
            <form action="" method="POST">
                <?php
                    if (isset($_SESSION['cart'])) {
                ?>
                <table cellspacing="0">
                <?php
                        $total_price = 0;
                        $in_cart_id = implode(',', $_SESSION['cart']);
                        //Biến mảng SESSION['cart'] thành chuỗi ngăn cách bởi dấu phẩy
                        $sql = "SELECT * FROM san_pham WHERE id IN ($in_cart_id);";
                        $result = mysqli_query($connect, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        
                        <td>
                            
                            <img width="100px" src="../images/product-picture/<?php echo $row['hinh_anh']; ?>" alt="hinh-anh-san-pham">
                        </td>
                        <td>
                            <b><?php echo $row['ten']; ?></b>
                            <br><br>
                            <input type="number" name="amount[<?php echo $row['id']; ?>]" 
                            value="<?php echo $_SESSION['quantity'][$row['id']];?>"><!--Số lượng từng sản phẩm-->
                        </td>
                        <td>
                            <?php echo number_format($row['gia'] * $_SESSION['quantity'][$row['id']], 0, ',', '.');?>đ
                        </td> <!--Thành tiền -->
                    </tr>
                <?php    
                                $total_price += ($row['gia'] *= $_SESSION['quantity'][$row['id']]);//Tính tổng tiền giỏ hàng
                                $_SESSION['thanh_tien'] = $total_price;
                            }
                        }
                ?>
                    </table>
                    <h4>Tổng tiền: <?php echo number_format($total_price, 0, ',', '.'); ?> VNĐ</h4>
                    
                    <br>
                <?php
                    }
                    else{
                ?>
                    <h4>Giỏ hàng trống!</h4>
                <?php
                    }
                ?>
                <button type="submit" name="update_cart">Cập nhật giỏ hàng</button>
                <button><a href="home.php">Tiếp tục mua sắm</a></button>
                <button name="cart_delete_btn" id='cart-delete'>Xóa giỏ hàng</button>
            </form>
            </div>
        </div>
        
    </div>

	<?php require_once 'includes/footer.php'; ?>
</body>
</html>