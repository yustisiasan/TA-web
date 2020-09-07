<!DOCTYPE html>
<?php
	include '../controller/akun.php'; 
	$proses = new akun();
	if (isset($_POST['submit']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$noTelp = $_POST['noTelp'];
		$jenis_akses = 'user'; 
		$status ='non-aktif';
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$kode_aktivasi = substr( str_shuffle( $chars ), 0, 10 );
		
		$status = $proses->insert_data_user($username, $password, $email, $noTelp, $jenis_akses, $status, $kode_aktivasi);
			if ($status) 
			{
				 $to =$email;
				$subject = "Kode Aktivasi Akun";
				$message = "Kode Aktivasi Anda : ".$kode_aktivasi." ";
				mail($to, $subject, $message);
				echo '<script type="text/javascript">window.alert("Daftar Akun Berhasil!")
					window.location.href="form_login.php";</script>'; 
			}
			else
			{
				echo '<script type="text/javascript">window.alert("Daftar Akun Gagal!")
					window.location.href="buat_akun.php";</script>'; 
			}
	}
?>
<html>
	<title>Form Register</title>
	<head>
		<link href="../assets/style2.css" rel="stylesheet" /> 
	</head>
	<body style="margin-top: 130px;">
		<center>
			<form method="post" action="">
				<h1>FORM REGISTER SGRACIAS</h1>
				<h2>Type what you want</h2>
				<table>
					<tr>
						<td><label for="username">Username:</label></td>
						<td>
							<input type="text" name="username" placeholder="Username" required>
						</td>
					</tr>
					<tr>
						<td><label for="password">Password:</label></td>
						<td>
							<input type="password" name="password" placeholder="Password" required>
						</td>
					</tr>
					<tr>
						<td><label for="email">Email:</label></td>
						<td><input type="email" name="email" placeholder="example@mail.com" required/></td>
					</tr>
					<tr>
						<td><label for="phone">Phone:</label></td>
						<td><input type="text" placeholder="Enter your phone number" name="noTelp" pattern="[0-9]{12}" title="The phone number can't more than 12 digit" required/></td>
					</tr>
					<tr>
						<td colspan="2">
							<button  style="width: 100px;" type="submit" value="submit" name="submit">Submit</button>
							<button style="width: 100px;" type="reset" >Reset</button>
						</td>
					</tr>
				</table>
			</form>
		</center>
	</body>
</html>