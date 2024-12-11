<!DOCTYPE html>
<html>
<head>
	<title>XEM LAI SQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
        require_once 'includes/connect.php';
        $sql='';
        if(isset($_GET)){
            $gid=$_GET['id'];
            $sql="SELECT * FROM `san_pham` WHERE `id` = $gid ";
        }
        $result=mysqli_query($connect,$sql);
        $row=mysqli_fetch_assoc($result);

            $SQL='';
            if(isset($_GET['submit'])){
                // $id=$_GET['id'];
                $name=$_GET['name'];
                $po=$_GET['po'];
                $pi=$_GET['pi'];
                $grt=$_GET['grt'];
                $dir=$_GET['dir'];
                $mf=$_GET['mf'];
                $status=$_GET['status'];
                $ad=$_GET['adddate'];
                $SQL="UPDATE `san_pham` SET `ngay_nhap`='$ad',`ten`='$name',`gia`=$po,`gia_nhap`=$pi,`bao_hanh`=$grt,`id_danh_muc`=$dir,`id_hang`=$mf,`status`=$status  WHERE `id` = $gid";
                $RESULT=mysqli_query($connect,$SQL);
                ////////////////////////
                echo $SQL; 
                    if ($RESULT) {
                ?>
                    <script type="text/javascript">
                        alert("Successfully!");
                    </script>
                <?php
                }else{
                ?>
                    <script type="text/javascript">
                        alert("Fail!");
                    </script>
                <?php
                    }
                /////////////////////////
                // header('Location: manager_product.php');
            }

    ?>
	<?php require_once 'includes/header.php' ?>
	<div class="main">
		<div class="left"><?php require_once 'includes/menu.php' ?></div>
        <div class="right">
            <div class="right1">
                <h1>Update</h1><hr>
                <form action="#" method="get">
                    <table class="tableupddate">
                        <tr>
                            <td>ID</td>
                            <td><input readonly="" type="text" name="id" value="<?php echo $row['id'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><input type="text" name="name" value="<?php echo $row['ten'] ?>"></td>
                        </tr>
                        <tr>
                            <td>PriceOut</td>
                            <td><input type="text" name="po" value="<?php echo $row['gia'] ?>"></td>
                        </tr>
                        <tr>
                            <td>PriceIn</td>
                            <td><input type="text" name="pi" value="<?php echo $row['gia_nhap'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Guarantee</td>
                            <td><input type="number" name="grt" value="<?php echo $row['bao_hanh'] ?>"></td>
                        </tr>
                        <tr>
                            <td>AddDate</td>
                            <td><input type="date" name="adddate" value="<?php echo $row['ngay_nhap'] ?>"><td>
                        </tr>
                        <tr>
                            <td>Picture</td>
                            <td>-----</td>
                        </tr>
                        <tr>
                            <td>Directory</td>
                            <td>
                                <select name="dir">
                                    <?php 
                                        $sql = "SELECT * FROM danh_muc";
                                        $result = mysqli_query($connect, $sql);
                                        while($rowdm = mysqli_fetch_assoc($result)){
                                    ?>
                                    <!--  1 -->
                                    <?php if ($row["id_danh_muc"] == $rowdm['id']) {?>
                                    <option selected="" value="<?php echo $rowdm['id']; ?>">
                                        <?php echo $rowdm['ten_danh_muc']; ?>
                                    </option>
                                    <?php }else{ ?>
                                     <!--  2 -->   
                                    <option value="<?php echo $rowdm['id']; ?>"><?php echo $rowdm['ten_danh_muc']; ?>
                                        
                                    </option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Manufacrurer</td>
                            <td>
                                <select name="mf">
                                    <?php 
                                        $sql = "SELECT * FROM hang";
                                        $result = mysqli_query($connect, $sql);
                                        while($rowh = mysqli_fetch_assoc($result)){
                                    ?>
                                    <?php if ($row['id_hang']==$rowh['id']) { ?>
                                        <option selected="" value="<?php echo $rowh['id']; ?>">
                                            <?php echo $rowh['ten_hang']; ?>
                                        </option>
                                    <?php }else{ ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['ten_hang']; ?></option>
                                        <?php }; ?>
                                    <?php } ?>    
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Status</td>
                            <td>
                                <select name="status">
                                    <option value="1">ConHang</option>
                                    <option value="0">HetHang</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit"   name="submit" value="submit" style="width: 70px; border:solid 1px black; border-radius:10px"></td>
                        </tr>
                    </table>
                </form>    
            </div>
        </div>
    </div>
</body>
</html>