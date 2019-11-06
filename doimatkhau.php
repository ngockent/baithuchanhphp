<?php 
	session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Đổi Mật Khẩu</title>
</head>
	<form method="post">
    
    	<table align="center">
        	<tr>
            	<td>HỆ THỐNG ATM</td>
            </tr>
            <tr>
            	<td>Mật Khẩu Cũ</td>
                <td><input type="password" name="txtOldPasswd"></td>
            </tr>
             <tr>
            	<td>Mật Khẩu Mới</td>
                <td><input type="password" name="txtNewPasswd"></td>
            </tr>
             <tr>
            	<td>Nhập Lại Mật Khẩu</td>
                <td><input type="password" name="txtPasswd"></td>
            </tr>
            <tr>
            	<td><input type="submit" name="OK" value="Xác Nhận"></td>
                <td><input type="button" name="Return" value="Quay Lại" onClick="location='menu.php'"></td>
            </tr>
        </table>
    </form>
    <?php include 'connect.php';?>
	<?php
		$username = $_SESSION['txtTK'];
        $sql="select * from login where UserName = '$username'";
        $exeSql=mysqli_query($con, $sql);
        while ($num =mysqli_fetch_array($exeSql)) {               
    ?>
	<?php
       if(isset($_POST['OK']))
       {
       	$mkcu = $_POST['txtOldPasswd'];
        $mkmoi = $_POST['txtNewPasswd'];
        $nlmk = $_POST['txtPasswd'];
        
		if($num['PassWord'] != $mkcu)
		{
			echo "<script>alert('Sai mật khẩu.Update thật bại')</script>";	
		}else{
			if($mkmoi != $nlmk){
				echo "<script> alert('password và nhập lại mật khẩu phải trùng nhau')</script>";
				die();
			}else{              
        $sqlupdate = "UPDATE login SET PassWord = '$mkmoi' WHERE UserName = '$username'";
        $ex = mysqli_query($con,$sqlupdate);
       	if($ex){
            echo "<script> alert('Update thanh cong')</script>";
        }
		}
      }}
   ?>
    <?php } ?>
<body>
</body>
</html>