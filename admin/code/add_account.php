<!DOCTYPE html>
<html>
<head>
	<title>Quan Li Cua Hang</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php require_once 'includes/connect.php'; ?>
    <?php require_once 'includes/header.php'; ?>
    <?php
        $sql='';
        if(isset($_GET['submit'])){
            $name=$_GET['name'];
            $uname=$_GET['uname'];
            $upass=$_GET['upass'];
            $lv=$_GET['lv'];
            $sql="INSERT INTO `admin`(`ten`, `username`, `password`, `cap_bac`) VALUES ('$name','$uname','$upass',$lv)";
            $result=mysqli_query($connect,$sql);
            header('Location: manager_account.php');
        }
        
    ?>
	<div class="main">
		<div class="left"><?php require_once 'includes/menu.php' ?></div>
        <div class="right">
            <div class="right1">
                <h1>Add Account</h1><hr><br>
                <form action="#" method="GET">
                    <table class="tableadd">
                        <tr>
                            <td>Name:</td>
                            <td><input type="text" name="name"></td>
                        </tr>
                        <tr>
                            <td>UserName:</td>
                            <td><input type="text" name="uname"></td>
                        </tr>
                        <tr>
                            <td>UserPassword:</td>
                            <td><input type="text" name="upass"></td>
                        </tr>
                        <tr>
                            <td>Lever:</td>
                            <td>
                                <select name="lv">
                                    <option value="1">Sep</option>
                                    <option value="0">Sep cui</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input style="border: 1px solid black; border-radius:10px; margin-top:10px" type="submit" name="submit" value="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        </div>
</body>
</html>