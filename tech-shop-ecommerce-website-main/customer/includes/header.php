
<?php 
    require_once 'C:\Users\ADMIN\Downloads\tech-shop-ecommerce-website-main\tech-shop-ecommerce-website-main\customer\includes/connect.php';

?>
<header>
<!--================================================= TOP HEADER  =======================================================================-->
    <div id="top-header">
        <div class="container">
            <ul id="header-links">
                <li><i class="fas fa-phone"></i> 0963366996</li>
                <li><i class="far fa-envelope"></i> nhatvu.ngtr@gmail.com</li>
            </ul>
        </div>
    </div>
<!--/TOP HEADER-->

<!--================================================  MAIN HEADER =======================================================================-->
    <div id="main-header">
        <div class="row">
            <div class="container">
                <!--=======   LOGO    =========-->
                <div class="logo">
                    <a href="home.php">
                        <img width="120px" src="../images/logo.png" alt="logo"/>
                    </a>
                </div>

                <!--=====   THANH TÌM KIẾM  =====-->
                <form class="search-bar" action="find.php" method="GET">
                    <!--TÌM DANH MỤC-->
                    <div class="search-cat">
                        <select name="cat">
                            <option value="">Mọi danh mục</option>
                            <?php 
                            $sql = "SELECT * FROM danh_muc";
                            $result = mysqli_query($connect, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['ten_danh_muc']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <!--Tìm theo hãng -->
                    <div class="search-brand">
                        <select name="brand">
                            <option value="">Mọi hãng</option>
                            <?php 
                            $sql = "SELECT * FROM hang";
                            $result = mysqli_query($connect, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['ten_hang']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <!--TÌM THEO TÊN SẢN PHẨM-->
                    <div class="search-pro">
                        <input type="text" placeholder="Nhập tên sản phẩm" name="name" />
                    </div>
                    <!--NÚT TÌM KIẾM-->
                    <div class="search-btn">
                        <button type="submit">Tìm kiếm</button>
                    </div>
                </form>
                
                <!--=====   GIỎ HÀNG    =====-->
                <div class="cart">
                    <a href="cart_detail.php">
                        <i class="fas fa-shopping-cart fa-2x"></i><br> Giỏ hàng
                    </a>
                </div>
                <!--=====   TÀI KHOẢN    =====-->
                <div class="account-btn">
                    <?php 
                        if (isset($_SESSION['username'])) {
                    ?>
                        <a href='account.php'>
                            <i class="far fa-user-circle fa-2x"></i>
                            <br> 
                            <?php echo $_SESSION['username']; ?>
                        </a>
                    <?php
                        }else{
                    ?>
                        <a href='sign.php'> 
                            <i class="far fa-user-circle fa-2x"></i>
                            <br> 
                            Tài khoản 
                        </a>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
            <!--=========   Menu    ==========-->             
            <ul class="nav-links">
                <div class="container">
                    <li><a href="home.php">Trang chủ</a></li>
                    <!--Danh mục-->
                    <li>Danh mục
                        <ul class="sub-menu">
                        <?php 
                            $sql = "SELECT * FROM danh_muc";
                            $result = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <li>
                                <a href="find.php?cat=<?php echo $row['id']; ?>"><?php echo $row['ten_danh_muc']; ?></a>
                            </li>
                        <?php
                            }
                        ?>
                        </ul>
                    </li>
                    <li>Hãng
                        <ul class="sub-menu">
                        <?php 
                            $sql = "SELECT * FROM hang";
                            $result = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <li>
                                <a href="find.php?brand=<?php echo $row['id']; ?>"><?php echo $row['ten_hang']; ?></a>
                            </li>
                        <?php
                            }
                        ?>
                        </ul>
                    </li>
                    <li><a href="#">Về chúng tôi</a></li>
                    <li><a href="#">Liên hệ</a></li>
               </div> 
            </ul>
    </div>    
<!--/MAIN HEADER-->
    
</header>

