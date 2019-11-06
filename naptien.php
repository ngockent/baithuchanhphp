<?php 
	session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Nạp Tiền</title>
</head>
	<form method="post">
    	<table align="center">
        	<tr>
            	<td colspan="4" align="center">HỆ THỐNG ATM</td>
            </tr>
            <tr>
            	<td>500.000</td>
                <td><input type="number" name="500"  placeholder="Số Tờ"></td>
                <td>200.000</td>
                <td><input type="number" name="200"  placeholder="Số Tờ"></td>
            </tr>
            <tr>
            	<td>100.000</td>
                <td><input type="number" name="100" placeholder="Số Tờ"></td>
                <td>50.000</td>
                <td><input type="number" name="50" placeholder="Số Tờ"></td>
            </tr>
            <tr>
            	<td>20.000</td>
                <td><input type="number" name="20"  placeholder="Số Tờ"></td>
                <td>10.000</td>
                <td><input type="number" name="10" placeholder="Số Tờ"></td>
            </tr>
            <tr>
            	<td>5.000</td>
                <td><input type="number" name="5" placeholder="Số Tờ"></td>
                <td>2.000</td>
                <td><input type="number" name="2" placeholder="Số Tờ"></td>
            </tr>
            <tr>
            	<td>1.000</td>
                <td><input type="number" name="1" placeholder="Số Tờ"></td>
            </tr>
            <tr>
            <?php include 'connect.php';?>
				<?php
						$username = $_SESSION['txtTK'];
                        $sql="select * from login where UserName = '$username'";
                        $exeSql=mysqli_query($con, $sql);
                        while ($num =mysqli_fetch_array($exeSql)) {               
                ?>
                <?php
					$tongtien = 0;
                    if(isset($_POST['Tong']))
                    {
						$t500 = $_POST['500'];
						$t200 = $_POST['200'];
						$t100 = $_POST['100'];
						$t50 = $_POST['50'];
						$t20 = $_POST['20'];
						$t10 = $_POST['10'];
						$t5 = $_POST['5'];
						$t2 = $_POST['2'];
						$t1 = $_POST['1'];
						$tongtien = 500000*$t500 + 200000*$t200 + 100000*$t100
						 + 50000*$t50 + 20000*$t20 + 10000*$t10 + 5000*$t5 + 2000*$t2 + 1000*$t1;
					}
                ?>
                
            	<td><input type="submit" name="Tong" value="Tong Tien"></td>
                <td><input type="text" name="tongtien" value="<?php echo $tongtien;?>"></td>
            	<td colspan="2" align="center"><input type="submit" name="OK" value="Xác Nhận"></td>
                <td colspan="2" align="center"><input type="button" name="Return" value="Quay Lại" onClick="location='menu.php'"></td>
            </tr>
        </table>
    </form>
			<?php 
					if(isset($_POST['OK'])){
						$tongtien = $_POST['tongtien'];
						$Tong = $num['Total'] + $tongtien;
                        $sqlruttien = "UPDATE login set Total = '$Tong' where UserName = '$username'";
						$execute = mysqli_query($con,$sqlruttien);
						if($execute){
							echo "<script> alert('Nạp tiền thành công')</script>";
						}
					}
				?>
                <?php } 
				?>
<body>
</body>
</html>