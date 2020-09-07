<!DOCTYPE html>
<?php
	session_start();
	include '../controller/akun.php';
	
	$proses = new akun();
	if(!isset($_SESSION['username'])){
            echo '<script type="text/javascript">window.alert("Maaf Anda Harus Login Terlebih Dahulu!")
					  window.location.href="form_login.php";</script>';
    }
	
    if ($_SESSION['jenis_akses']!='admin') 
    {
		  echo '<script type="text/javascript">window.alert("Maaf Anda Bukan Admin!")
					  window.location.href="data-mahasiswa.php";</script>';
	}
	
	if (isset($_POST['submit']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$noTelp = $_POST['noTelp'];
		$jenis_akses ='user';
		$status = $_POST['status'];
		$status1 = $proses->insert_data_user($username, $password, $email, $noTelp, $jenis_akses, $status);
			if ($status1) 
			{			
				echo '<script type="text/javascript">window.alert("Data Berhasil Ditambah!")
					  window.location.href="data_user.php";</script>'; 
			}
			else
			{
				echo '<script type="text/javascript">window.alert("Daftar Gagal Ditambah!")
					  window.location.href="tambah_user.php";</script>'; 
			}
	}
?>
<html>
	<title>Form Register</title>
	<head>
		<link href="../assets/style2.css" rel="stylesheet" />
	</head>
	<body style="margin-top: 80px;">
		<center>
			<form method="post" action="">
				<h1>FORM CREATE NEW USERS</h1>
				<h2>Type what you want</h2>
				<table>
					<tr>
						<td><label for="username">Username:</label></td>
						<td>
							<input type="text" name="username" required>
						</td>
					</tr>
					<tr>
						<td><label for="nama">Password:</label></td>
						<td>
							<input type="password" name="password" required>
						</td>
					</tr>
					<tr>
						<td><label for="email">Email:</label></td>
						<td>
							<input type="email" name="email" required>
						</td>
					</tr>
					<tr>
						<td><label for="noTelp">Phone:</label></td>
						<td>
							<input type="text" placeholder="Enter your phone number" name="noTelp" pattern="[0-9]{12}" title="The phone number can't more than 12 digit" required/>
						</td>
					</tr>
					<tr>
						<td><label for="status">Status:</label></td>
						<td>
							<input type="radio" name="status" value="aktif" /> Aktif
							<input type="radio" name="status" value="non-aktif" /> Non Aktif
						</td>
					</tr>
					<tr>
						<td colspan="2">
						<button type="submit" value="submit" name="submit">Submit</button>
						<a href="data_user.php"><button style="width: 100px; height:35px;"  type="button" >Back</button></a> 
					</tr>
				</table>
			</form>
		</center>
	</body>
</html>