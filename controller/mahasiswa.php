<?php
	include '../model/database.php';
	class mahasiswa extends database{
		function __construct() 
		{
			parent::__construct();
			$this->setTabel('mahasiswa');
		}
		
		function insert_data_mahasiswa($nim, $nama, $alamat, $jenisKelamin, $hobi)
		{
			$values = " '".$nim."', '".$nama."', '".$alamat."', '".$jenisKelamin."', '".$hobi."' ";
			$kolom = "nim, nama, alamat, jenisKelamin, hobi";
			$temp=$this->insert($values,$kolom);

			if ($temp) {
				return true;
			} else {
				return false;
			}
		}
		
		function view_data_mahasiswa($nim=''){
			if ($nim!='' ) {
				$where="nim='".$nim."'";
			}else{
				$where ="";
			}
			$hasil = $this->get_data($where);
			$i =0;
			while (($row = mysql_fetch_array($hasil))!= false) {
				$data[$i]['nim']=$row[0];
				$data[$i]['nama']=$row[1];
				$data[$i]['alamat']=$row[2];
				$data[$i]['jenisKelamin']=$row[3];
				$data[$i]['hobi']=$row[4];
				$i++;
			}
			return $data;
		}
		
		function update_mahasiswa($values,$nim){
			$where = "nim = '".$nim."'";
			$temp=$this->update($values,$where);
			if ($temp) {
				return true;
			} else {
				return false;
			}
		}
		
		function delete_mahasiswa($nim){
			$where = "nim = '".$nim."'";
			$temp=$this->delete($where);
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
				$data[$i]['nim']=$row[0];
				$data[$i]['nama']=$row[1];
				$data[$i]['alamat']=$row[2];
				$data[$i]['jenisKelamin']=$row[3];
				$data[$i]['hobi']=$row[4];
				$i++;
			}
			return $data;
			
		}	  
	}
?>