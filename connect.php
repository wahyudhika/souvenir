<?php
	$host = "localhost";
	$user = "postgres";
	$pass = "wahyudhika1313";
	$port = "5432";
	$dbname = "bkt_souvenir";
	$conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");
?>
