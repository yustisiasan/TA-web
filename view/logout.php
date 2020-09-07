<?php
	include '../controller/akun.php';
    $a = new akun();
    $data = $a->logout();
	
	header('Location: form_login.php');
?>