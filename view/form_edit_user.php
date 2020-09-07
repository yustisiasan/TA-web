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
		  echo '<script type="text/javascript">window.alert("Maaf Anda Bukan Asdmin!")
					  window.location.href="data-mahasiswa.php";</script>';
	}
	
	if (isset($_POST['submit']))
	{
		$username = $_POST['username'];
		$email = $_POST['email'];
		$noTelp = $_POST['noTelp'];
		$status = $_POST['status'];
		$status1 = $proses->update_user($username, $email, $noTelp, $status);
			if ($status1) 
			{
				echo '<script type="text/javascript">window.alert("Data Berhasil Diubah!")
					  window.location.href="data_user.php";</script>'; 
			}
			else
			{
				echo '<script type="text/javascript">window.alert("Daftar Gagal Diubah!")
					  window.location.href="form_edit_user.php?username='.$_GET['username'].'";</script>'; 
			}
	}
?>
<html>
	<title>Form Edit User</title>
	<head>
		<link href="../assets/style2.css" rel="stylesheet" />
	</head>
	<body style="margin-top: 80px;">
	<?php
			if(isset($_GET['username']))
			{
        		$data = $proses->data_user($_GET['username']);
			}
	?>
		<center>
			<form method="post" action="">
				<h1>FORM EDIT USER</h1>
				<h2>Type what you want</h2>
				<table>
					<tr>
						<td><label for="username">Username:</label></td>
						<td>
							<input type="text" name="username" readonly="readonly" value="<?php echo $data[0]['username'];?>" required>
						</td>
					</tr>
					<tr>
						<td><label for="email">Email:</label></td>
						<td>
							<input type="email" name="email" value="<?php echo $data[0]['email'];?>" required>
						</td>
					</tr>
					<tr>
						<td><label for="noTelp">No Telp:</label></td>
						<td>
							<input type="text" placeholder="Enter your phone number" name="noTelp" pattern="[0-9]{12}" title="The phone number can't more than 12 digit" value="<?php echo $data[0]['noTelp'];?>" required/>
						</td>
					</tr>
					<tr>
						<td><label for="status">Status:</label></td>
						
						<td>
							<input type="radio" name="status" value="aktif" <?php if($data[0]['status'] == 'aktif') {echo "checked";}?> /> Aktif
							<input type="radio"  name="status" value="non-aktif" <?php if($data[0]['status'] == 'non-aktif') {echo "checked";}?>/> Non Aktif
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