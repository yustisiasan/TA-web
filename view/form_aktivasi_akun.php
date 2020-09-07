<!DOCTYPE html>
<?php
	include '../controller/akun.php';
	$proses = new akun();
	if (isset($_POST['submit']))
	{
		$email = $_POST['email'];
    $kode_aktivasi = $_POST['kode_aktivasi'];
		$status = $proses->active($email,$kode_aktivasi);
			if ($status) 
			{
				echo '<script type="text/javascript">window.alert("Aktivasi Berhasil!")
					window.location.href="form_login.php";</script>'; 
			} 
			else
			{
				echo '<script type="text/javascript">window.alert("Aktivasi Gagal!")
					window.location.href="form_aktivasi_akun.php";</script>'; 
			}
	}
?>
<html>
	<title>Form Aktivasi Akun</title>
	<head>
		<link href="../assets/style2.css" rel="stylesheet" />
	</head>
	<body style="margin-top: 80px;">
		<center>
			<form method="post" action="">
				<h1>FORM AKTIVASI AKUN</h1>
				<h2>Type what you want</h2>
				<table>					
					<tr>
						<td><label for="email">Email:</label></td>
						<td>
							<input type="email" name="email" required>
						</td>
					</tr>
					<tr>
						<td><label for="kode_aktivasi">Activation Code:</label></td>
						<td>
							<input type="text" name="kode_aktivasi" required>
						</td>
					</tr>
					<tr>
						<td colspan="2">
						<button type="submit" value="submit" name="submit">Submit</button>
						<a href="form_login.php"><button style="width: 100px; height:35px;"  type="button" >Back</button></a> 
					</tr>
				</table>
			</form>
		</center>
	</body>
</html>