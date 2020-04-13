<?php
	$host = "localhost";
	$user = "postgres";
	$pass = "wahyu123";
	$port = "5433";
	$dbname = "bkt_souvenir";
	$conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");
?>
