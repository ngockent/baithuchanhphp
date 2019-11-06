<?php 
	session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Rút Tiền</title>
</head>
	<form method="post">
    	<table align="center">
        	<tr>
            	<td>HỆ THỐNG ATM</td>
            </tr>
            <tr>
            	<td>Nhập Số Tiền</td>
                <td><input type="text" name="txtST"></td>
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
						$tienrut = $_POST['txtST'];
						$conlai = $num['Total'] - $tienrut;
                        $sqlruttien = "UPDATE login set Total = '$conlai' where UserName = '$username'";
						$execute = mysqli_query($con,$sqlruttien);
						if($execute){
				?>
					<script> alert('Bạn đã rút :<?php echo $tienrut.'\n';?>
									Tổng tài khoản: <?php echo $conlai;?>
					')</script>
						
                
                <?php } } }?>
<body>
</body>
</html>