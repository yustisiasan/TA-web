<!DOCTYPE html>
<?php
	session_start();

	include '../controller/mahasiswa.php';
	$proses = new Mahasiswa();
  	if(!isset($_SESSION['username'])){
            echo '<script type="text/javascript">window.alert("Maaf Anda Harus Login Terlebih Dahulu!")
					  window.location.href="form_login.php";</script>';
    }
	
	if ($_SESSION['jenis_akses']!='user') {
		  echo '<script type="text/javascript">window.alert("Maaf Anda Bukan User!")
					  window.location.href="jurnal.php";</script>';
	}	
?>
<html>
	<head>
		<title>Data Mahasiswa</title>
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


