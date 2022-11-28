<?php


include 'connection.php';


$cd = $_GET['cd_excluir'];

$delete = $cn->query("DELETE FROM tbl_empregos where Registro = '$cd'");

header("location:index.php");


?>