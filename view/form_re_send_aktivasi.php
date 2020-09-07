<!DOCTYPE html>
<?php
	session_start();
	include '../controller/akun.php';
	$proses = new akun();
	
		if(!isset($_SESSION['username'])){
				echo '<script type="text/javascript">window.alert("Maaf Anda Harus Login Terlebih Dahulu!")
						  window.location.href="form_login.php";</script>';
		}
		
		if ($_SESSION['jenis_akses']!='admin'){
			  echo '<script type="text/javascript">window.alert("Maaf anda bukan admin!")
						  window.location.href="data-mahasiswa.php";</script>';
		}
	
      if(isset($_GET['username']))
      {
            $data = $proses->data_user($_GET['username']);
      }
	  
      if (isset($_POST['submit'])) {
         $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
         $kode_aktivasi = substr( str_shuffle( $chars ), 0, 10 );
        
         $status = $proses->re_send($_GET['username'],$kode_aktivasi);
        
        if ($status) {
            $to =$_POST['email'];
            $subject = "Pengiriman Ulang Kode Aktivasi Akun Anda";
            $message = "Kode aktivasi : ".$kode_aktivasi." ";
            mail($to, $subject, $message);
			
             echo '<script type="text/javascript">window.alert("Pengiriman Ulang Kode Aktivasi Berhasil!")
            window.location.href="data_user.php";</script>'; 
        }else{
            echo '<script type="text/javascript">window.alert("Pengiriman Gagal!")
            window.location.href="form_re_send_aktivasi.php?username='.$_POST['username'].'";</script>';
        }
  }
?>
<html>
	<title>Form Re-send Activation Code</title>
	<head>
		<link href="../assets/style2.css" rel="stylesheet" />
	</head>
	<body style="margin-top: 80px;">
		<center>
			<form method="post" action="">
				<h1>Form Re-send Activation Code</h1>
				<h2>Type what you want</h2>
				<table>
					<tr>
						<td><label for="email">Email:</label></td>
						<td>
							<input type="email" name="email" value="<?php echo $data[0]['email'];?>" required>
						</td>
					</tr>
					<tr>
						<td colspan="2">
						<button  type="submit" value="submit" name="submit">Kirim</button>
						<a href="data_user.php"><button style="width: 80px; height:35px;" type="button">Back</button></a> 
					</tr>
				</table>
			</form>
		</center>
	</body>
</html>