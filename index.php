<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/main.css" rel="stylesheet">
    <title>Registros</title>
</head>
<body>


    <main>
        
        <?php include "connection.php";?>

        <form method="GET" action="index.php" onsubmit="return checkSubmit()">

            <label for="#">Cargo</label>
            <select name="Cargo" id="cargo">
                <option value='selecione' class="op">Selecione</option>
                    <?php
                        $consulta = $cn->query("select DISTINCT Cargo from tbl_empregos");
                        while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {
                          $cargo = $exibe['Cargo'];
                          echo "<option value='$cargo'>$cargo</option>";
                        }
                    ?>
            </select>
                    
            <label for="#">Área</label>
            <select name="Area" id="area">
                <option value='selecione' class="op">Selecione</option>
                    <?php
                        $consulta = $cn->query("select DISTINCT Area from tbl_empregos");
                        while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {
                          $area = $exibe['Area'];
                          echo "<option value='$area'>$area</option>";
                        }
                    ?>
            </select>
                    
                    
          <button type="submit" class="btn-submit" id="submit-btn">Enviar</button>
                    
        </form>
                    
                    
        <table class="table">
                    
                    
            <?php
    
                function Wtd($var) {
                    return "<td>". $var ."</td>";
                }
            
            
               if(isset($_GET["Cargo"]) and isset($_GET["Area"])) {
            
                    $cargo = $_GET["Cargo"];
                    $area = $_GET["Area"];
            
                    $consulta = $cn->query("SELECT * FROM tbl_empregos WHERE Cargo = '$cargo' and Area = '$area'");
            
                    echo "
                        <tr> 
                            <th>Registro</th>
                            <th>Nome</th>
                            <th>Cargo</th>
                            <th>Area</th>
                            <th>Salario</th>
                            <th>Status</th>
                        </tr>
                    ";
            
            
                    while ($exibir = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    
                        echo "<tr>";
                        
                            echo Wtd($exibir['Registro']);
                            echo Wtd($exibir['Nome']);
                            echo Wtd($exibir['Cargo']);
                            echo Wtd($exibir['Area']);
                            echo Wtd($exibir['Salario']);
                            echo Wtd($exibir['eStatus']);
                            echo Wtd("Excluir");
                            echo Wtd("Alterar");
                        
                        echo "</tr>";
                        
                    }
                }
            
            
               else {
                    return null;
               }
           
           
           
            ?>             

        </table>
    </main>

    <script src="main.js"></script>

</body>
</html>