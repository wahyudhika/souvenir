<?php
	$host = "localhost";
	$user = "wahyudhika";
	$pass = "Alasyu1234567";
	$port = "5432";
	$dbname = "bkt_souvenir";
	$conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");
?>
