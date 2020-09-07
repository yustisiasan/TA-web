<!DOCTYPE html>
<?php
	session_start();

	include '../controller/akun.php';
	$proses = new Akun();
  	if(!isset($_SESSION['username'])){
            echo '<script type="text/javascript">window.alert("Maaf Anda Harus Login Terlebih Dahulu!")
					  window.location.href="form_login.php";</script>';
    
     }

    if ($_SESSION['jenis_akses']!='admin') {
		  echo '<script type="text/javascript">window.alert("Maaf Anda Bukan Admin!")
					  window.location.href="data-mahasiswa.php";</script>';
	}

	if (isset($_GET['delete'])) 
	{
		$status2 =$proses->delete_user($_GET['delete']);
			if ($status2) 
			{
				  echo '<script type="text/javascript">window.alert("Data Berhasil Di Hapus!")
					  window.location.href="data_user.php";</script>';
			}
			else
			{
				 echo '<script type="text/javascript">window.alert("Data Gagal Di Hapus!")
					  window.location.href="data_user.php";</script>';
			}
	}		
?>
<html>
	<head>
		<title>Data User</title>
		<link rel="stylesheet" type="text/css" href="../assets/style.css">
	</head>
	<body>
		<div id="header">
			<p><?php echo strtoupper($_SESSION['username']).' || '; ?>
				<a href="logout.php">Logout</a></p>
		</div>
		<?php
			echo "<center />";
			echo "<table border='0px' width='1000px'><thead><tr><th><h1>DATA USERS SGRACIAS TELKOM UNIVERSITY</h1></th></tr></thead>";
			echo "<tbody>
			<tr>
				<td><a href='jurnal.php'> Data Mahasiswa </a></td>
			</tr>
			<tr>
				<td><a href='tambah_user.php'> + Tambah Users </a></td>
			</tr>
			<tr>
				<td><a href='pdf_user.php'> Export to PDF </a></td>
			</tr>
			</tbody></table>";
		?>
		<table border="0px" width="1000px">
			<thead>
				<tr>
					<th>No.</th>
					<th>Username</th>
					<th>Email</th>
					<th>No Telp</th>
					<th>Jenis Akses</th>
					<th>Status</th>
					<th colspan='3'>Action</th>
				</tr>
			</thead>
			<?php
				$nomer=0;
				if (count($proses->ambil_data_kecuali_admin($_SESSION['username']))!='') {
					foreach ($proses->ambil_data_kecuali_admin($_SESSION['username']) as $value) {
						$nomer++;
						echo "<tr>
						<td>".$nomer."</td>
						<td style='text-align:center;'>".$value['username']."</td>
						<td>".$value['email']."</td>
						<td>".$value['noTelp']."</td>
						<td>".$value['jenis_akses']."</td>
						<td>".$value['status']."</td>
						<td><a href='form_edit_user.php?username=".$value['username']."'>Edit</a></td>
						<td><a href='?delete=".$value['username']."'>Delete</a></td>
						<td><a href='form_re_send_aktivasi.php?username=".$value['username']."'>Send Mail</a></td>
						</tr>";
					}
				}
				else
				{
					echo "<tr><td colspan='3'>Data Not Found</td></tr>";
				}
			?>
		</table>
	</body>
</html>