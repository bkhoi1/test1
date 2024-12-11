<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="../webfonts/all.css">
	<script src="js/main.js"></script>
	<title>Computism - login</title>
</head>

<?php require_once 'includes/connect.php'; ?>
<body style="background-color: #22d1ee;">
	
	<!--================================================ VALIDATE SIGN IN =================================================================-->
	<?php
		$sql = "SELECT * FROM khach_hang";
		$result = mysqli_query($connect, $sql);
		if(isset($_POST['sign-in-btn'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			while($row = mysqli_fetch_assoc($result)){
				if($row['username'] == $username && $row['password'] == $password ){
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['id'] = $row['id_khach_hang'];
                    header("Location: home.php");
				}
            }
            echo '<script> alert("Tài khoản hoặc mật khẩu sai"); </script>';
		}
	?>
    <!--================================================ VALIDATE SIGN UP =================================================================-->
    <?php
        if(isset($_POST['sign-up-btn'])){
            $flag = 0;
            $username = $_POST['sign_up_username'];
            $password = $_POST['sign_up_password'];
            if($password != $_POST['check_password']){
                echo '<script> alert("Mật khẩu nhập lại không khớp!"); </script>';
                $flag++;
            }
            while($row = mysqli_fetch_assoc($result)){
                if($row['username'] == $username){
                    $flag++;
                    echo "<script> alert('Tên tài khoản đã tồn tại, hãy đăng nhập'); </script>";
                }
            }
            if(0 == $flag){
                $new_account = "INSERT INTO khach_hang(username, password) VALUES ('$username', '$password')";
                $sign_up_result = mysqli_query($connect, $new_account);
                if($sign_up_result){
                    echo "<script> alert('Đăng kí thành công, hãy đăng nhập'); </script>";
                }
                else{
                    echo "<script> alert('Đăng kí thất bại'); </script>";
                }
            }
        }
    ?>
	<!--================================================ SIGN IN =================================================================-->
    <?php require_once 'includes/header.php'; ?>
    <div class="container">
        <div class="account">
            <form action="" method="POST" class="sign-in">
                <table>
                <caption>
                    <h2>Đăng nhập</h2><br>
                </caption>
                <tr>
                        <td> Tên tài khoản:</td>
                    <td><input type="text" name="username" placeholder="Username"></td>
                </tr>
                <tr>
                    <td>Mật khẩu:</td>
                    <td><input type="password" name="password" placeholder="Password"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="checkbox" name="remember"> Nhớ mật khẩu</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="sign-in-btn">Đăng nhập</button>
                    </td>
                </tr>
                </table>
            </form>
            <!--================================================== SIGN UP =================================================================-->

            <form action="" method="POST" class="sign-up">
                <table>
                    <caption>
                        <h2>Đăng kí</h2><br>
                    </caption>
                    <tr>
                        <td> Tên tài khoản:</td>
                        <td><input type="text" name="sign_up_username" placeholder="Username" required></td>
                    </tr>
                    <tr>
                        <td>Mật khẩu:</td>
                        <td><input type="password" name="sign_up_password" placeholder="Password" required></td>
                    </tr>
                    <tr>
                        <td>Nhập lại mật khẩu:</td>
                        <td><input type="password" name="check_password" placeholder="Password" required></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="checkbox" id="accept-checkbox" required>Tôi đồng ý với các điều khoản
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" name="sign-up-btn" onclick="validateSignUp()">Đăng kí</button>
                        </td>
                    </tr>
                </table>
            </form>
            
            <!--=================================================== SIGN MESSAGE ===========================================================-->
            <div class="curtain">
                <div class="sign-message">
                    <h2>Chào mừng bạn trở lại!</h2><br>
                    <p>
                        Để tiếp tục mua hàng một cách nhanh chóng cũng như sớm nhận được những thông báo vầ các đợt khuyến
                        mại mới nhất của
                        Computism, hãy đăng nhập bằng thông tin tài khoản và mật khẩu ở form đăng nhập bên cạnh
                    </p>
                    <br>
                    <br>
                    <p class="sign-question">Chưa có tài khoản?</p>
                    <button class="sign-btn" onclick="slideSignUp()">Đăng kí ngay</button>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'includes/footer.php'; ?>

</body>

</html>