<?php
	$host = "127.0.0.1";
	$user = "postgres";
	$pass = "Alasyu1234567";
	$port = "5432";
	$dbname = "bkt_souvenir";
	$conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");
?>
