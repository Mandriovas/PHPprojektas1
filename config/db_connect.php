<?php


 //connect to database
 define("DB_HOST", 'localhost');
 define("DB_USER", 'root');
 define("DB_PASSWORD", '');
 define("DB_DATABASE", 'ninja_pizza');



$conn = mysqli_connect(DB_HOST, DB_USER,DB_PASSWORD,DB_DATABASE);

//check connection
if (!$conn) {
	echo 'connection error: ' . mysqli_connect_error();
}

?>