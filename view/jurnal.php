<!DOCTYPE html>
<?php
	session_start();

	include '../controller/mahasiswa.php';
	$proses = new Mahasiswa();
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
		$status2 =$proses->delete_mahasiswa($_GET['delete']);
			if ($status2) 
			{
				echo '<script type="text/javascript">window.alert("Data Berhasil Di Hapus!")
					  window.location.href="jurnal.php";</script>';
			}
			else
			{
				echo '<script type="text/javascript">window.alert("Data Gagal Di Hapus!")
					  window.location.href="jurnal.php";</script>';
			
			}
	}	
?>
<html>
	<head>
		<title>Praktikum Web</title>
		<link rel="stylesheet" type="text/css" href="../assets/style.css">
	</head>
	<body>
		<div id="header">
			<p><?php echo strtoupper($_SESSION['username']).' || '; ?>
				<a href="logout.php">Logout</a></p>
		</div>
		<?php
			echo "<center />";
			echo "<table border='0px' width='1000px'><thead><tr><th><h1>DATA MAHASISWA TELKOM UNIVERSITY</h1></th></tr></thead>";
			echo "<tbody>
			<tr>
				<td><a href='form_inputmahasiswa.php'> + Tambah Mahasiswa </a></td>
			</tr>
			<tr>
				<td><a href='data_user.php'> Data Users </a></td>
			</tr>
			<tr>
				<td><a href='pdf_mahasiswa.php'> Export to PDF </a></td>
			</tr>
			</tbody></table>";
		?>
		<table border="0px" width="1000px">
			<thead>
				<tr>
					<th>No.</th>
					<th>NIM</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Jenis Kelamin</th>
					<th>Hobi</th>
					<th colspan='2'>Action</th>
				</tr>
			</thead>
		<?php
			$nomer=0;
			if (count($proses->view_data_mahasiswa())!='') {
				foreach ($proses->view_data_mahasiswa() as $value) {
					$nomer++;
					echo "<tr>
					<td>".$nomer."</td>
					<td style='text-align:center;'>".$value['nim']."</td>
					<td>".$value['nama']."</td>
					<td>".$value['alamat']."</td>
					<td>".$value['jenisKelamin']."</td>
					<td>".$value['hobi']."</td>
					<td><a href='form_updatemahasiswa.php?nim=".$value['nim']."'>Edit</a></td>
					<td><a href='jurnal.php?delete=".$value['nim']."'>Delete</a></td>
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


