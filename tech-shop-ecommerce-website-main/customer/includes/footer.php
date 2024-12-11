<footer>
    <div class="container">
        <div class="footer-about">
            <h2>Về Computism</h2>
            <p><i class="far fa-envelope"></i> Email: service@compsm.com</p>
        </div>
        <div class="footer-cat">
            <h2>Danh mục</h2>
            <p>
            <?php 
                $sql = "SELECT * FROM danh_muc";
                $result = mysqli_query($connect, $sql);
                while($row = mysqli_fetch_assoc($result)){
            ?>
                <a href="find.php?cat=<?php echo $row['id']; ?>">
                    <?php echo $row['ten_danh_muc']; ?>
                </a>
            <?php
                }
            ?>
            </p>
        </div>
        <div class="footer-service">
            <h2>Dịch vụ</h2>
                <p>
                <?php 
                    if (isset($_SESSION['username'])) {
                ?>
                    <a href='account.php'>
                        Tài khoản
                    </a>
                <?php
                    }else{
                ?>
                    <a href='sign.php'>
                        Tài khoản 
                    </a>
                <?php
                    }
                ?></p>
            <a href="cart_detail.php"><p>Giỏ hàng</p></a>
        </div>
    </div>
</footer>