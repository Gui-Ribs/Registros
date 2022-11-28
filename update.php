<?php

    include './connection.php';

    if(isset($_POST['upd'])) {

        $id = $_POST['txtRegistro'];
        $nome = $_POST['txtnome'];
        $cargo = $_POST['cargo'];
        $area = $_POST['area'];
        $status = $_POST['rdbStatus'];
        $salario = $_POST['txtSalario'];

        print_r($nome);

        $refresh = "UPDATE tbl_empregos SET Nome='$nome', Cargo='$cargo', Area='$area', eStatus='$status', Salario='$salario' WHERE Registro='$id' ";

        $finish = $cn->query($refresh);

        header("Location: index.php");

     
    }


?>