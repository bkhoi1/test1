<!DOCTYPE html>
<html>
<head>
	<title>Quan Li Cua Hang</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php require_once 'includes/connect.php' ?>
	<?php require_once 'includes/header.php' ?>
    <?php 
        $SQL='';
        if(isset($_GET['submit'])){
            // $id=$_GET['id'];
            $name=$_GET['name'];
            $po=$_GET['po'];
            $pi=$_GET['pi'];
            $grt=$_GET['grt'];
            $dir=$_GET['dir'];
            $mf=$_GET['mf'];
            $ad=$_GET['ad'];
            $status=$_GET['status'];
            $SQL="INSERT INTO `san_pham`(`ngay_nhap`,`ten`, `gia`, `gia_nhap`, `bao_hanh`,`id_danh_muc`, `id_hang`,`status`) VALUES ('$ad','$name',$po,$pi,$grt,$dir,$mf,$status)";
            $RESULT=mysqli_query($connect,$SQL);
            
            

            header('Location: manager_product.php');
        }

    ?>
	<div class="main">
		<div class="left"><?php require_once 'includes/menu.php' ?></div>
        <div class="right"><div class="right1">
            <h1>Add Products</h1>
            <hr>
            <form action="#" method="GET">
                <table class="tableadd" style="width: 40%;">
                    <tr>
                        <td>Name:</td>
                        <td><input 	checked="" type="text" name="name"></td>
                    </tr>
                    <tr>
                        <td>PriceOut(VND):</td>
                        <td><input type="number" name="po"></td>
                    </tr>
                    <tr>
                        <td>PriceIn(VND):</td>
                        <td><input type="number" name="pi"></td>
                    </tr>
                    <tr>
                        <td>Guarantee(Month):</td>
                        <td><input type="text" name="grt"></td>
                    </tr>
                    <tr>
                        <td>AddDate:</td>
                        <td><input name="ad" type="date" style="width: 300px;"></td>
                    </tr>
                    <tr>
                        <td>Picture:</td>
                        <td>---</td>
                    </tr>
                    <tr>
                        <td>Directory:</td>
                        <td>
                            <select style="width: 200px;" name="dir">
                                <?php 
                                    $sql = "SELECT * FROM danh_muc";
                                    $result = mysqli_query($connect, $sql);
                                    while($rowdm = mysqli_fetch_assoc($result)){
                                ?>
                                    <option value="<?php echo $rowdm['id']; ?>"><?php echo $rowdm['ten_danh_muc']; ?></option>
                                <?php }?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Manufacture:</td>
                        <td>
                            <select style="width: 200px;" name="mf">
                                <?php 
                                    $sql = "SELECT * FROM hang";
                                    $result = mysqli_query($connect, $sql);
                                    while($rowh = mysqli_fetch_assoc($result)){
                                ?>
                                    <option value="<?php echo $rowh['id']; ?>"><?php echo $rowh['ten_hang']; ?></option>
                                <?php }?>
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Status:</td>
                        <td>
                            <select style="width: 200px;" name="status">
                                <option> Status</option>
                                <option value="1">ConHang</option>
                                <option value="0">HetHang</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input style="border: 1px solid black; border-radius:10px;" type="submit" value="Submit" name="submit" ></td>
                    </tr>
                </table>
        </form>        
        </div></div>
    </div>
</body>
</html>

