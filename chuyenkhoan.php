<?php 
	session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Chuyển Khoản</title>
</head>
	<form method="post">
    	<table align="center">
        	<tr>
            	<td>HỆ THỐNG ATM</td>
            </tr>
            <tr>
            	<td>Tên Người Nhận</td>
                <td><input type="text" name="txtName"></td>
            </tr>
             <tr>
            	<td>Số Tài Khoản</td>
                <td><input type="text" name="txtSTK"></td>
            </tr>
             <tr>
            	<td>Số tiền</td>
                <td><input type="text" name="txtSTN"></td>
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
						$tiennhan = $_POST['txtSTN'];
						$conlai = $num['Total'] - $tiennhan;
                        $sqlguitien = "UPDATE login set Total = '$conlai' where UserName = '$username'";
						$execute = mysqli_query($con,$sqlguitien);
						if($execute){
							echo "<script> alert('Đang chuyển')</script>";
					}?>
					<?php	
						$stk = $_POST['txtSTK'];
						$sql1 = "select * from login where STK = '$stk'";
						$exeSql1=mysqli_query($con, $sql1);
                        while ($num =mysqli_fetch_array($exeSql1)) {  
						$totalnhan = $num['Total'] + $tiennhan;
						$sqlnhantien = "UPDATE login set Total = '$totalnhan' where STK = '$stk'";  
						$execute1 = mysqli_query($con,$sqlnhantien);   
						if($execute){
							echo "<script> alert('Nhận tiền thành công')</script>";
									}        							
							}
						}
                ?>
                <?php } ?>
	<h1> demo </h1>
<body>
</body>
</html>
