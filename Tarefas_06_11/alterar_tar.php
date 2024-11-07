<?php

session_start();

if (isset($_GET["id"])){

$id = $_GET["id"];

if (!empty($id)) {
  
  include("conecta.php");

    $sqlexc= "delete from tbl_tarefas where tar_codigo ='$id'";
	$queryexc = mysqli_query($conn,$sqlexc);
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas</title>

</head>
<body>

    <?php
      include("conecta.php");
    ?>

    <header>
        <div>
            <td class="titulo"><h1>Cadastros</h1></td>
        </div>
    </header>
    <nav>
 
        <a href="cad_usu.php">Cadastro de Usuário</a>
        <a href="cad_tar.php">Cadastro Tarefass</a>
        <a href="alterar_tar.php">Gerenciar Tarefas</a>
        </nav>

    <h2>Cadastro de Tarefas</h2>

<fieldset>
        <legend>Tarefas</legend>
        <table id="funcionarioTable">
            <thead>
                <tr>
                    <th>Setor</th>
                    <th>Prioridade</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>

            <?php
              
               include("conecta.php");
               $sqltarefas = "Select * from tbl_tarefas order by tar_codigo";
               $querytarefas = mysqli_query($conn,$sqltarefas);
               $resulta = mysqli_num_rows($querytarefas); 					
                                               
                if ($resulta>0) {									  
                    $i = 0;
                    while ($linhatarefa = mysqli_fetch_array($querytarefas)) {
                      $i++;
                ?>

                <tr>
                <?php 
                print"
                    <td>
                        <strong> $linhatarefa[1]</strong>
                    </td>
                    <td>
                        <strong> $linhatarefa[2]</strong>
                    </td>
                    <td>
                        <strong> $linhatarefa[3]</strong>
                    </td>
                    <td>
                        <strong> $linhatarefa[4]</strong>
                    </td>
                    <td>
                    <a href=\"alterar.php?id=$linhatarefa[0]\">
                        <button type=\"button\" class=\"btna btn-remove\" >Alterar</button>
                    </td>
                    <td>
                     <a href=\"alterar_tar.php?id=$linhatarefa[0]\" onclick=\"return confirm('Confirmar exclusão do registro?');\">
                        <button type=\"button\" class=\"btn btn-remove\">Remover</button>
                     </a>
                    </td>";
                       }
                     }
                    ?>
                </tr>
            </tbody>
            
        </table>
    </fieldset>