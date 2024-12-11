<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doan1</title>
    <style>
    *{
        font-family: Arial, Helvetica, sans-serif;
    }
    </style>
</head>
<body>
    <?php
    // kiem tra tai khoan
        require_once "includes/connect.php";
        if(isset($_POST['POST'])){
            $uname=$_POST['uname'];
            $upass=$_POST['upass'];
            if($uname=='abc'){
                if($upass=='123'){
                    header("Location: admin.php");
                }else{
                    echo"Sai mk";
                }
            }elseif ($uname=='abcd') {
                if($upass=='1234'){
                    header("Location: admin.php");
                }else{
                    echo"Sai mk";
                }
            }
        }
    ?>
    <h2>Dang nhap </h2>
    <!-- form dang nhap -->
    <form action="#" method="POST">
        <table>
            <tr>
                <td>Tai Khoan:</td>
                <td><input type="text" name="uname"></td>
            </tr>
            <tr>
                <td>Mat Khau:</td>
                <td><input type="text" name="upass"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>