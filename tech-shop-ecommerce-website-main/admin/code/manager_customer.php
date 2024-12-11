<!DOCTYPE html>
<html>
<head>
	<title>Quan Li Cua Hang</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="../../webfonts/all.css">
</head>
<body>
    <?php 
        require_once 'includes/connect.php'; 
        $sql="";
        if(isset($_POST["submit"])){
            $timkiem=$_POST["txtsearch"];
            $sql="SELECT * FROM `khach_hang` WHERE `ten_kh` LIKE '%$timkiem%'";
        }else{
            $sql="SELECT * FROM `khach_hang`";
        }
        $result=mysqli_query($connect,$sql);
    ?>
	<?php require_once 'includes/header.php' ?>
	<div class="main">
		<div class="left"><?php require_once 'includes/menu.php' ?></div>
        <div class="right">
            <div class="right1">
                <h1>Thong Tin Khach Hang</h1>
                <hr>
                <form action="#" method="POST">
                    <input type="text" name="txtsearch" placeholder="Search">
                    <input type="submit" name="submit" value="Search">
                    <button><a href="add_ctm.php">AddCustomer</a></button>
                </form>
                <br>
                <table class="content-table">
                    <tr>
                        <td>ID</td>
                        <td>Username</td>
                        <td>Password</td>
                        <td>Number</td>
                        <td>Address</td>
                        <td>Name</td>
                        <td>BirthDate</td>
                        <td>Update</td>
                        <td>Delete</td>
                    </tr>
                    <?php while($row=mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td><?php echo $row['id_khach_hang'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['password'] ?></td>
                        <td><?php echo $row['sdt'] ?></td>
                        <td><?php echo $row['dia_chi'] ?></td>
                        <td><?php echo $row['ten_kh'] ?></td>
                        <td><?php echo $row['ngay_sinh'] ?></td>
                        <td><a href="update_ctm.php?id=<?php echo $row['id_khach_hang'] ?>"><i class="far fa-edit"></i></a></td>
                        <td><a href="delete_ctm.php?id=<?php echo $row['id_khach_hang'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                    <?php } ?>    
                </table>
            </div>
        </div>
    </div>
</body>
</html>