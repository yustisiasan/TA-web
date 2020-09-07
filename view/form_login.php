<!DOCTYPE html>
<?php
	session_start();
	include '../controller/akun.php';
	$proses = new akun();
	if(isset($_SESSION['username'])){
           
			if ($_SESSION['status']=='aktif') {
				if ($_SESSION['jenis_akses']=='admin') {
          header('Location: jurnal.php');
			
				}
				elseif($_SESSION['jenis_akses']=='user')
				{
					header('Location: data-mahasiswa.php');
				
        }
			}
			else
			{
				echo '<script type="text/javascript">window.alert("Maaf Akun Anda Tidak Aktif!")
					  window.location.href="jurnal.php";</script>';
			}
    }
	
	if (isset($_POST['login']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
	
		$status = $proses->login($username,$password);
			if ($status) 
			{
				if ($status[0]['status']=='aktif') 
				{
					if ($status[0]['jenis_akses']=='admin') 
					{
						$_SESSION['username']=$status[0]['username'];
						$_SESSION['email']=$status[0]['email'];
						$_SESSION['jenis_akses']=$status[0]['jenis_akses'];
						$_SESSION['status']=$status[0]['status'];
						echo '<script type="text/javascript">window.alert("Sukses Login!")
						window.location.href="jurnal.php";</script>'; 
					}
					elseif ($status[0]['jenis_akses']=='user') 
					{
						$_SESSION['username']=$status[0]['username'];
						$_SESSION['email']=$status[0]['email'];
						$_SESSION['jenis_akses']=$status[0]['jenis_akses'];
						$_SESSION['status']=$status[0]['status'];
						echo '<script type="text/javascript">window.alert("Sukses Login!")
						window.location.href="data-mahasiswa.php";</script>'; 
					}
				}
				else
				{
					echo "<h4 style='text-align:center;'>Maaf Akun Anda Tidak Aktif</h4>";
				}

			}
			else
			{
				echo '<script type="text/javascript">window.alert("Gagal!")
					window.location.href="form_login.php";</script>'; 
			}
	}
?>
<html>
	<head>
		<title>Form Login</title>
		<link href="../assets/style2.css" rel="stylesheet" />
	</head>
	<body style="margin-top: 130px;">
		<center>
		<div id="frame-login">
			<div id="login">
				<form method="post" action="">
				<h1>FORM LOGIN</h1>
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
					<td>
						<button style="width: 100px;" type="submit" value="login" name="login">Login</button>
					</td>
						<td colspan="2">
							<a href="buat_akun.php"><button style="width: 100px; height:35px;"  type="button" >Registrasi</button></a> 
							<a href="form_aktivasi_akun.php"><button style="width: 100px; height:35px;"  type="button" >Aktivasi</button></a> 
						</td>
					</tr>
				</table>
				</form>
			</div>
		</div>
		</center>
	</body>
</html>