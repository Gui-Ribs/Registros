<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
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
    
                function Wtd($column) {
                    return "<td>". $column ."</td>";
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
                            echo Wtd($exibir['StatusUsuario']);
                            echo Wtd("<a href='delete.php ? cd_excluir=$exibir[Registro]'><i class='fa fa-remove'></i></a>");
                            echo Wtd("<a href='alterar.php ? cd_alterar=$exibir[Registro]'><i class='fa fa-pencil'></i</a>");
                        echo "</tr>";
                        
                    }
                }
            
            
               else {
                    return  error_log("F");
               }
           
           
           
            ?>             

        </table>
    </main>

    <script src="main.js"></script>

</body>
</html>