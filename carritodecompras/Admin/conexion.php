<?php
$servername="localhost";//ip o dominio
$username="root";
$password="";
$dbname="tienda2021_1";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
die("Error al conectar:".$conn->connect_error );
}

//echo ("conexion exitosa<br>");