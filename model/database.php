<?php
	class database {
		public $query;
		public $tabel;
		public $conn;
		public $parsing;
			function __construct() {
			error_reporting(E_ALL ^ E_DEPRECATED);
				$this->conn= mysql_connect('mysql.idhostinger.com','u665316764_dbmhs','kudo19');
			 	mysql_select_db("u665316764_dbmhs",$this->conn);
			}

			function setTabel($tabel){
				$this->tabel=$tabel;
			}
			
			function eksQuery(){
				$parsing = mysql_query($this->query,$this->conn);
				//echo $this->query."<br>";
				return $parsing;
			}
			
			//Baru untuk praktikum Email & PDF
			function get_column()
			{
				$this->query = "SELECT upper(COLUMN_NAME) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='kuis_oop' AND TABLE_NAME='".$this->tabel."'";
				$hasil = $this->eksQuery();
				return $hasil;
			}
			
			function connectDB() {
			$conn = mysql_connect($this->host,$this->user,$this->password);
			return $conn;
			}
	
			function selectDB($conn) {
			mysql_select_db($this->database,$conn);
			}
	
			function runQuery($query) {
			$result = mysql_query($query);
			while($row=mysql_fetch_assoc($result)) {
			$resultset[] = $row;
			}		
			if(!empty($resultset))
			return $resultset;
			}
		
			function numRows($query) {
			$result  = mysql_query($query);
			$rowcount = mysql_num_rows($result);
			return $rowcount;	
			}

			function get_data($where='',$order=''){
				$this->query = "select * from ".$this->tabel;

				if ($where!='') {
					$this->query.=" where ".$where;
				} 
				if ($order!='') {
					$this->query.=" order by ".$order;
				}
				$hasil = $this->eksQuery();
				return $hasil;

			}
			function insert($values,$kolom=''){
				if ($kolom!='') {
					$this->query ="INSERT into ".$this->tabel."  (".$kolom.") values (".$values.")";
				} else {
					$this->query ="INSERT into ".$this->tabel."   values (".$values.")";
				}
				return $this->eksQuery();
			}
			function update($values,$where){
					$this->query= "update ".$this->tabel." set ".$values." where ".$where;
					return $this->eksQuery();
			}
			function delete($where){
				$this->query="delete from ".$this->tabel." where ".$where;
				return $this->eksQuery();
			}
			
			/*
			function get_column(){
				$this->query = "SELECT upper(COLUMN_NAME) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='u200146557_abcd' AND TABLE_NAME='".$this->tabel."'";
				$hasil = $this->eksQuery();
				return $hasil;
			}*/
	}
?>