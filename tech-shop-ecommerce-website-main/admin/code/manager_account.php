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
        $sql='';
        if(isset($_GET['submit'])){
            $timkiem=$_GET["txtsearch"];
            $sql="SELECT * FROM `admin` WHERE `ten` LIKE '%".$timkiem."%'";
        }else{
            $sql="SELECT * FROM `admin`";
        }
        $result=mysqli_query($connect,$sql);
    ?>
	<?php require_once 'includes/header.php' ?>
	<div class="main">
		<div class="left"><?php require_once 'includes/menu.php' ?></div>
        <div class="right">
            <div class="right1">
                <h1>Manage Account</h1>
                <hr>
                <form action="manager_account.php" method="get">
                    <input type="text" name="txtsearch" placeholder="Search">
                    <input type="submit" value="Submit">
                    <button><a href="add_account.php">AddAccount</a></button>
                </form>
                <br>
                <table class="content-table">
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Username</td>
                        <td>Password</td>
                        <td>Lever</td>
                        <td>Delete</td>
                    </tr>
                    <?php
                        while ($row=mysqli_fetch_assoc($result)) {
                    ?>        
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['ten']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td><?php if($row['cap_bac']==1){echo "SuperAdmin";}else{echo "Admin";} ?></td>
                            <td><a href="delete_account.php?id=<?php echo $row['id'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <?php };?>    
                </table>
            </div>
        </div>
    </div>
</body>
</html>