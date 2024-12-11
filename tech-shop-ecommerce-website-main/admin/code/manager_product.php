<!DOCTYPE html>
<html>
<head>
	<title>Quan Li Cua Hang</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../webfonts/all.css">
<body>
    <?php 
        require_once 'includes/connect.php';
        $sql='';
        if(isset($_GET['submit'])){
            $timkiem=$_GET["txtsearch"];
            $sql="SELECT sp.*, dm.ten_danh_muc as 'danh_muc', h.ten_hang as 'hang' 
                FROM `san_pham` sp, `danh_muc` dm, `hang` h 
                WHERE sp.id_danh_muc = dm.id AND sp.id_hang = h.id AND sp.ten LIKE '%$timkiem%' OR sp.id = '$timkiem'";
        }else{
            $sql="SELECT sp.*, dm.ten_danh_muc as 'danh_muc', h.ten_hang as 'hang' 
                FROM `san_pham` sp, `danh_muc` dm, `hang` h 
                WHERE sp.id_danh_muc = dm.id AND sp.id_hang = h.id";
        }
        $result=mysqli_query($connect,$sql);
    ?>
	<?php require_once 'includes/header.php'; ?>
	<div class="main">
		<div class="left">
            <?php require_once 'includes/menu.php'; ?></div>
        <div class="right">
            <div class="right1">
                <h1>Manage Products</h1>
                <hr>
                <form action="manager_product.php" method="GET">
                    <input type="text" name="txtsearch" placeholder="Search">
                    <input type="submit" name="submit" value="Search">
                    <button><a href="add_prd.php">AddProduct</a></button>
                </form>
                <br>
                <table class="content-table">
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>PriceOut</td>
                        <td>PriceIn</td>
                        <td>Guarantee</td>
                        <td>Picture</td>
                        <td>Directory</td>
                        <td>Manufacturer</td>
                        <td>Status</td>
                        <td>AddDate</td>
                        <td>Update</td>
                        <td>Delete</td>
                    </tr>
                    <?php
                        while ($row=mysqli_fetch_assoc($result)) {
                    ?>        
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['ten']; ?></td>
                            <td><?php echo number_format($row['gia']); ?></td>
                            <td><?php echo number_format($row['gia_nhap']); ?></td>
                            <td><?php echo $row['bao_hanh']." Tháng"; ?></td>
                            <td><img width="55px" height="55px" src="../../images/product-picture/<?php echo $row['hinh_anh']; ?>"></td>
                            <td><?php echo $row['danh_muc']; ?></td>
                            <td><?php echo $row['hang']; ?></td>
                            <td><?php echo ($row['status'] == 1 ) ? "Còn hàng" : "----"; ?></td>
                            <td><?php echo $row['ngay_nhap'] ?></td>
                            <td><a href="update_prd.php?id=<?php echo $row['id'] ?>"><i class="far fa-edit"></i></a></td>
                            <td><a href="delete_prd.php?id=<?php echo $row['id'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                    <?php };?>    
                </table>
            </div>
        </div>
    </div>
</body>
</html>