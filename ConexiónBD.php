<?php
@$connection = new mysqli('localhost', 'root', '');
$connection->set_charset("utf8");

if (!$connection->connect_errno)
     $connection->select_db("cinemaplay") or die("Base de Datos no encontrada");
?>