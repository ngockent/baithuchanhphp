<?php 
	session_start();
 ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>
<body>
	<form method="post">
    	<table align="center">
        	<tr>
            	<td colspan="2"> HỆ THỐNG ATM</td>
            </tr>
            <tr>
            	<td>Nhập Số Tài Khoản</td>
                <td><input type="text" name="txtTK"></td>
            </tr>
            <tr>
            	<td>Mật Khẩu</td>
                <td><input type="password" name="txtMK"></td>
            </tr>
            <tr>
            	<td colspan="2"><input type="submit" name="OK" value="Đăng Nhập"></td>
            </tr>
        </table>
    </form>    
    <?php
    	if(isset($_POST['OK']))
		{
			$username = $_POST['txtTK'];
			$passwd = $_POST['txtMK'];
			
			include 'connect.php';
			if ($con==null){
					echo "<script>alert('Không có kết nối')</script>";
				}
			else
			{				
				$query = "select * from login where UserName = '$username' and PassWord = '$passwd'"; 
				$result = mysqli_query($con, $query); 
				if (mysqli_num_rows($result)!=1){
					echo "<script>alert('Tên đăng nhập hoặc mật khẩu không hợp lệ')</script>";
				}
				else {
                    echo "<script>alert('Đăng nhập thành công')</script>";
					$_SESSION['txtTK'] = $username;
                    header("Location:menu.php");			
				}
			}

		}
	?>
</body>
</html>