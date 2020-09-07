<!DOCTYPE html>
<?php
	session_start();
	
	include '../controller/mahasiswa.php';
	$proses = new mahasiswa();
	if(!isset($_SESSION['username'])){
            echo '<script type="text/javascript">window.alert("Maaf Anda Harus Login Terlebih Dahulu!")
					  window.location.href="form_login.php";</script>';
    }
    if ($_SESSION['jenis_akses']!='admin') {
		  echo '<script type="text/javascript">window.alert("Maaf Anda Bukan Admin!")
					  window.location.href="data-mahasiswa.php";</script>';
	}
	
	if (isset($_POST['submit']))
	{
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$jenisKelamin = $_POST['jenisKelamin'];
		$hobi = implode(", ", $_POST['hobi']); 
		$values = "nama = '".$nama."', alamat = '".$alamat."', jenisKelamin = '".$jenisKelamin."', hobi = '".$hobi."' ";
		$status = $proses->update_mahasiswa($values, $_GET['nim']);	
			if ($status) 
			{
				echo '<script type="text/javascript">window.alert("Data Berhasil Diubah!")
					  window.location.href="jurnal.php";</script>'; 
			}
			else
			{
				echo '<script type="text/javascript">window.alert("Daftar Gagal Diubah!")
					  window.location.href="form_inputmahasiswa.php";</script>'; 
			}
	}
?>
<html>
	<title>Form Update Mahasiswa</title>
	<head>
		<link href="../assets/style2.css" rel="stylesheet" />
	</head>
	<body style="margin-top: 80px;">
		<?php
			if(isset($_GET['nim']))
			{
        		$data = $proses->view_data_mahasiswa($_GET['nim']);
				$checked = explode(", ",$data[0]['hobi']);
			}
		?>
		<center>
			<form method="post" action="">
				<h1>FORM INPUT MAHASISWA</h1>
				<h2>Type what you want</h2>
				<table>
					<tr>
						<td><label for="nim">NIM:</label></td>
						<td>
							<input type="text" name="nim" readonly="readonly"  value="<?php echo $data[0]['nim']?>">
						</td>
					</tr>
					<tr>
						<td><label for="nama">Nama:</label></td>
						<td>
							<input type="text" name="nama" value="<?php echo $data[0]['nama']?>">
						</td>
					</tr>
					<tr>
						<td><label for="alamat">Alamat:</label></td>
						<td>
							<input type="text" name="alamat" value="<?php echo $data[0]['alamat']?>">
						</td>
					</tr>
					<tr>
						<td><label for="jenisKelamin">Jenis Kelamin:</label></td>
						<td>
							<input type="radio" name="jenisKelamin" value="Laki-laki" <?php if($data[0]['jenisKelamin'] == 'Laki-laki') {echo "checked";}?> /> Laki-laki
							<input type="radio" name="jenisKelamin" value="Perempuan" <?php if($data[0]['jenisKelamin'] == 'Perempuan') {echo "checked";}?>/> Perempuan
						</td>
					</tr>
					<tr>
						<td><label for="hobi">Hobi:</label></td>
						<td>
							<input type="checkbox" name="hobi[]" value="Salto" <?php if(in_array("Salto",$checked)){ echo "checked";}?>>Salto
							<input type="checkbox" name="hobi[]" value="Terbang" <?php if(in_array("Terbang",$checked)){ echo "checked";}?>>Terbang
							<input type="checkbox" name="hobi[]" value="Ngoding" <?php if(in_array("Ngoding",$checked)){ echo "checked";}?>>Ngoding
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