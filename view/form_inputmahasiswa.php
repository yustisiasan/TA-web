<!DOCTYPE html>
<?php
	session_start();
	
	include '../controller/mahasiswa.php';
	$proses = new mahasiswa();
	if(!isset($_SESSION['username'])){
            echo '<script type="text/javascript">window.alert("Maaf Anda Harus Login Terlebih Dahulu!")
					  window.location.href="form_login.php";</script>';
    }
	
    if ($_SESSION['jenis_akses']!='admin') 
    {
		  echo '<script type="text/javascript">window.alert("Maaf anda bukan admin!")
					  window.location.href="data-mahasiswa.php";</script>';
	}
	
	if (isset($_POST['submit']))
	{
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$jenisKelamin = $_POST['jenisKelamin'];
		$hobi = implode(", ", $_POST['hobi']);  
		$status = $proses->insert_data_mahasiswa($nim, $nama, $alamat, $jenisKelamin, $hobi);
			if ($status) 
			{
				
				echo '<script type="text/javascript">window.alert("Data Berhasil Ditambah!")
					  window.location.href="jurnal.php";</script>'; 
			}
			else
			{
				echo '<script type="text/javascript">window.alert("Daftar Gagal Ditambah!")
					  window.location.href="form_inputmahasiswa.php";</script>'; 
			}
	}
?>
<html>
	<title>Form Input Mahasiswa</title>
	<head>
		<link href="../assets/style2.css" rel="stylesheet" />
	</head>
	<body style="margin-top: 80px;">
		<center>
			<form method="post" action="">
				<h1>FORM INPUT MAHASISWA</h1>
				<h2>Type what you want</h2>
				<table>
					<tr>
						<td><label for="nim">NIM:</label></td>
						<td>
							<input type="text" name="nim" pattern="[0-9]{10}" title="Nim hanya 10 digit" required>
						</td>
					</tr>
					<tr>
						<td><label for="nama">Nama:</label></td>
						<td>
							<input type="text" name="nama" required>
						</td>
					</tr>
					<tr>
						<td><label for="alamat">Alamat:</label></td>
						<td>
							<input type="text" name="alamat" required>
						</td>
					</tr>
					<tr>
						<td><label for="jenisKelamin">Jenis Kelamin:</label></td>
						<td>
							<input type="radio" name="jenisKelamin" value="Laki-laki" /> Laki-laki
							<input type="radio" name="jenisKelamin" value="Perempuan" /> Perempuan
						</td>
					</tr>
					<tr>
						<td><label for="hobi">Hobi:</label></td>
						<td>
							<input type="checkbox" name="hobi[]" value="Salto">Salto
							<input type="checkbox" name="hobi[]" value="Terbang">Terbang
							<input type="checkbox" name="hobi[]" value="Ngoding">Ngoding
						</td>
					</tr>
					<tr>
						<td colspan="2"><button type="submit" value="submit" name="submit">Submit</button><button type="reset" >Reset</button></td>
					</tr>
				</table>
			</form>
		</center>
	</body>
</html>