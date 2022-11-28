<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/sec.css" rel="stylesheet">
    <title>Alter</title>
</head>
<body>
    



    <?php
    
        include 'connection.php';
        $cd = $_GET ['cd_alterar'];
    
        $queryCargo = $cn->query("SELECT Cargo FROM tbl_empregos WHERE Registro='$cd'
        UNION SELECT cargo FROM tbl_empregos where registro!='$cd'");

        $queryArea = $cn->query("SELECT Area FROM tbl_empregos where Registro='$cd'
        UNION select area FROM tbl_empregos where Registro!='$cd'");

        $queryCampos = $cn->query("SELECT * FROM tbl_empregos where Registro='$cd'");
        $viewCampos = $queryCampos->fetch(PDO::FETCH_ASSOC);
    
    ?>

    <main>

        <form name="alter" action="update.php" method="post">
            <fieldset>
                <?php

                    function Winput($idInput, $name, $field, $only) {
                        return "<input type='text' id='$idInput' name='$name' $only value='$field'>";
                    }
                 
                    function Wlabel($nameLabel) {
                        return "<label for='$nameLabel'>".$nameLabel."</label>";
                    }
                 
                    echo "<div>";
                         echo Wlabel("Registro");
                         echo Winput("nome", "txtRegistro", $viewCampos['Registro'], "readonly");
                    echo "</div>";
                 
                    echo "<div>";
                        echo Wlabel("Nome");
                        echo Winput("nome", "txtnome", $viewCampos['Nome'], null);
                    echo "</div>";
             
                    echo "<div>";
                        echo Wlabel("Cargo");
                        echo "<select name='cargo' required>";
                            echo "<option value='0'>Selecione</option>";
                            while ($exibeCargo = $queryCargo->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option value='".$exibeCargo["Cargo"]."'>".$exibeCargo["Cargo"]."</option>";
                            }
                        echo "</select>";
                    echo "</div>";

                    echo "<div>";
                        echo Wlabel("Área");
                        echo "<select name='area' required>";
                            echo "<option value='0'>Selecione</option>";
                            while ($exibeArea = $queryArea->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='".$exibeArea["Area"]."'>".$exibeArea["Area"]."</option>";
                            }
                        echo "</select>";
                    echo "</div>";
                    
                    echo "<div>";
                        echo WLabel("Status");

                        if ($viewCampos['eStatus'] == "Ativo") {
                            echo "<input type='radio' name='rdbStatus' value='Ativo' checked>";
                            echo "Ativo";
                            echo "<input type='radio' name='rdbStatus' value='Inativo'>";
                            echo "Inativo";
                        }
                        else {
                            echo "<input type='radio' name='rdbStatus' value='Ativo'>";
                            echo "Ativo";
                            echo "<input type='radio' name='rdbStatus' value='Inativo' checked>";
                            echo "Inativo";
                        }

                    echo "</div>";
                    
                    echo "<div>";
                        echo Wlabel("Salário");
                        echo Winput("salario", "txtSalario", $viewCampos['Salario'], null);
                    echo "</div>";

                    echo 
                    "<div>
                        <button type='submit' name='upd'>Alterar</button>
                    </div>";

                ?>
            </fieldset>
        </form>
    </main>

</body>
</html>