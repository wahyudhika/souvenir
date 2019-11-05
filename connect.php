<?php
	$host = "127.0.0.1";
	$user = "postgres";
	$pass = "wahyu123";
	$port = "5432";
	$dbname = "bkt_souvenir";
	$conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");
?>
