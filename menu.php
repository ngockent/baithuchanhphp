<?php 
	session_start();
 ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>MENU</title>
<link  type="text/css" href="style.css">
</head>
<body>
	<form method="post">
    	<table align="center">
        	<tr>
            	<td style="text-align:center" colspan="2">HỆ THỐNG ATM</td>
            </tr>
            <tr>
            	<td><input type="button" name="RutTien" value="Rút Tiền" onClick="location='ruttien.php'" class="btn"></td>
                <td><input type="button" name="ChuyenKhoan" value="Chuyển Khoản" onClick="location='chuyenkhoan.php'" class="btn"></td>
            </tr>
            <tr>
            	<td><input type="submit" name="VanTin" value="Vấn Tin" class="btn"></td>
                <td><input type="button" name="DoiMK" value="Đổi Mật Khẩu" onClick="location='doimatkhau.php'" class="btn"></td>
            </tr>
            <tr>
            	<td><input type="button" name="NapTien" value="Nạp Tiền" onClick="location='naptien.php'" class="btn"></td>
                <td><input type="button" name="Thoat" value="Thoát" onClick="location='index.php'" class="btn"></td>
            </tr>
               	<?php include 'connect.php';?>
				<?php
						$username = $_SESSION['txtTK'];
                        $sql="select * from login where UserName = '$username'";
                        $exeSql=mysqli_query($con, $sql);
                        while ($num =mysqli_fetch_array($exeSql)) {               
                ?>
                <?php
                    if(isset($_POST['VanTin']))
                    {
				?>
                	<script>
                    	alert('Tên tài khoản: <?php echo $num['Name'].'\n';?>
							   Số tài khoản: <?php echo $num['STK'].'\n';?>
							   Tổng số tiền: <?php echo $num['Total'];?>')
                    </script>

                <?php }} ?>
        </table>
    </form>
 
</body>
</html>