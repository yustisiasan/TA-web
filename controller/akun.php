<?php
	include '../model/database.php';
	class akun extends database{
		function __construct() 
		{
			parent::__construct();
			$this->setTabel('user');
		}
		function cek_code($email,$kode_aktivasi)
		{
			$where="email = '".$email."' and  kode_aktivasi='".$kode_aktivasi."'";
			//echo $where;
			$hasil=$this->get_data($where);
			$i=0;
			while (($row = mysql_fetch_array($hasil))!= false) {
				$data[$i]['username']=$row[0];
				$data[$i]['email']=$row[2];
				$data[$i]['noTelp']=$row[3];
				$data[$i]['jenis_akses']=$row[4];
				$data[$i]['status']=$row[5];
				$data[$i]['kode_aktivasi']=$row[6];
				$i++;
			}
			return $data;
				
		}
		function active($email,$kode_aktivasi){
			$where = "email = '".$email."' and kode_aktivasi ='".$kode_aktivasi."'";
			$values ="status ='aktif'";
			$temp=$this->update($values,$where);
			if ($temp) {
				return true;
			} else {
				return false;
			}
		}
		function re_send($username,$kode_aktivasi)
		{
			$where = "username = '".$username."'";
			$values ="kode_aktivasi ='".$kode_aktivasi."'";
			$temp=$this->update($values,$where);
			if ($temp) {
				return true;
			} else {
				return false;
			}
		}
		function insert_data_user($username, $password, $email, $noTelp,$jenis_akses,$status,$kode_aktivasi)
		{

			$values = "'".$username."', '".$password."', '".$email."', '".$noTelp."', '".$jenis_akses."', '".$status."','".$kode_aktivasi."'";
			$kolom = "username, password, email, noTelp,jenis_akses,status,kode_aktivasi";
			$temp=$this->insert($values,$kolom);
			if ($temp) {
				return true;
			} else {
				return false;
			}
		}
		function login($username,$password){
			//session_start();
			$where="username ='".$username."' and password='".$password."'";
			//echo $where;
			$hasil=$this->get_data($where);
			$i=0;
			while (($row = mysql_fetch_array($hasil))!= false) {
				$data[$i]['username']=$row[0];
				$data[$i]['email']=$row[2];
				$data[$i]['noTelp']=$row[3];
				$data[$i]['jenis_akses']=$row[4];
				$data[$i]['status']=$row[5];
				$data[$i]['kode_aktivasi']=$row[6];
				$i++;
			}
			return $data;
			
		}
		function get_column_table()
		{
			$hasil = $this->get_column();
			$i =0;
			while (($row = mysql_fetch_array($hasil))!= false) 
			{
				$data[$i]=$row[0];
				$i++;
			}			
			return $data;
		}
		function data_user($username=''){
			if ($username!='' ) {
				$where="username ='".$username."'";
			}else{
				$where ="";
			}
			$hasil=$this->get_data($where);
			$i=0;
			while (($row = mysql_fetch_array($hasil))!= false) {
				$data[$i]['username']=$row[0];
				$data[$i]['password']='not allowed';
				$data[$i]['email']=$row[2];
				$data[$i]['noTelp']=$row[3];
				$data[$i]['jenis_akses']=$row[4];
				$data[$i]['status']=$row[5];
				$data[$i]['kode_aktivasi']=$row[6];
				$i++;
			}
			return $data;
		}
		function delete_user($username){
			$where = "username = '".$username."'";
			$temp=$this->delete($where);
			if ($temp) {
				return true;
			} else {
				return false;
			}
		}
		function update_user($username,$email,$noTelp,$status,$kode_aktivasi){
			$where = "username = '".$username."'";
			$values ="email ='".$email."', noTelp ='".$noTelp."',status ='".$status."',kode_aktivasi ='".$kode_aktivasi."'";
			$temp=$this->update($values,$where);
			if ($temp) {
				return true;
			} else {
				return false;
			}
		}
		function ambil_data_kecuali_admin($username=''){
			if ($username!='' ) {
				$where="username !='".$username."'";
			}else{
				$where ="";
			}
			$hasil=$this->get_data($where);
			$i=0;
			while (($row = mysql_fetch_array($hasil))!= false) {
				$data[$i]['username']=$row[0];
				$data[$i]['password']='not allowed';
				$data[$i]['email']=$row[2];
				$data[$i]['noTelp']=$row[3];
				$data[$i]['jenis_akses']=$row[4];
				$data[$i]['status']=$row[5];
				$data[$i]['kode_aktivasi']=$row[6];
				$i++;
			}
			return $data;
		}


		function logout(){
			session_start();
			session_destroy();
		}

	}
?>