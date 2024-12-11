<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="../webfonts/all.css">
	<title>Computism</title>
</head>

<body>
	<?php require_once 'includes/connect.php'; ?>
	<?php require_once 'includes/header.php'; ?>
	<section>
		<div class="container">
			<div class="breadcrumb">
				<a href="home.php"></a>
			</div>
		</div>
	</section>
	<!--==========================================================    Sản phẩm tìm được    ===========================================================================-->
	<section>
		<div class="container">
			<div class="show">
                <?php
                    //Lấy giá trị trả về từ URL
                    $pro_name   = (isset($_GET['name']))    ? $_GET['name'] : "";
                    $pro_cat    = (isset($_GET['cat']))     ? $_GET['cat']  : "";
                    $pro_brand  = (isset($_GET['brand']))   ? $_GET['brand']: "";
                ?>
                <?php
                    //Viết câu lệnh SQL search  và kiểm tra điều kiện
                    $sql = "SELECT * FROM san_pham WHERE ten LIKE '%$pro_name%' ";
                    if($pro_cat != ""){
                        $sql .= "AND id_danh_muc = $pro_cat";
                    }
                    if($pro_brand != ""){
                        $sql .= "AND id_hang = $pro_brand";
                    }

                    $result = mysqli_query($connect, $sql);
                    if (mysqli_num_rows($result)) {
                        while ($row = mysqli_fetch_assoc($result)) {
				?>

				<div class="show-product">
					<a href="detail.php?id=<?php echo $row['id']; ?>">
						<img loading="lazy"src="../images/product-picture/<?php echo $row['hinh_anh']; ?>" alt="">
					</a>
					<a href="detail.php?id=<?php echo $row['id']; ?>">
						<p class="show-name"><?php echo $row['ten']; ?></p>
					</a>
                    <p class="show-price"><?php echo number_format($row['gia'], 0, ',', '.'); ?> VNĐ</p>
                    <a href="cart.php?id=<?php echo $row['id']; ?>"><button>Thêm giỏ hàng</button></a>
                    <a href="detail.php?id=<?php echo $row['id']; ?>"><button><i class="fas fa-eye"></i></button></a>
                </div>
                
				<?php
                        }
                    }
                    else{
                        echo "<h2 style='text-align: center; color: red;'>
                            <i class='far fa-frown-open'></i> Không tìm thấy kết quả, hãy thử tìm lại với từ khóa khác
                            </h2>";
                    }
				?>
			</div>
		</div>
	</section>
	<!--/Sản phẩm-->
    <!-- <div class="pages">

    </div> -->
	<?php require_once 'includes/footer.php'; ?>
</body>

</html>