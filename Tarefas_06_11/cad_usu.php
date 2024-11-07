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

    <h2>Cadastro de Usuário</h2>

    <section>
    <div class="box">
        <form action="inserir_usu.php" method="post" name="usuform" id="usuform">
            <fieldset class="usuario">
                <legend>Dados do Usuário</legend>
                <div>
                    <label for="nomeu" >Nome Completo</label>
                    <input type="text" name="nomeu" id="nomeu">
                    <br>
                    <label for="email" >Email</label>
                    <input type="text" name="email" id="email">
                </div>
            </fieldset>
            <div>
                <button type="submit" class="botao">Cadastrar</button>
            </div>
        </form>
    </section>

    <fieldset>
        <legend>Funcionário</legend>
        <table id="funcionarioTable">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>

                </tr>
            </thead>
            <tbody>

            <?php
              
               include("conecta.php");
               $sqlusuario = "Select * from tbl_usuarios order by usu_codigo";
               $queryusuario = mysqli_query($conn,$sqlusuario);
               $resulta = mysqli_num_rows($queryusuario); 					
                                               
                if ($resulta>0) {									  
                    $i = 0;
                    while ($linhausuario = mysqli_fetch_array($queryusuario)) {
                      $i++;
                ?>

                <tr>
                <?php 
                print"
                    <td>
                        <strong> $linhausuario[1]</strong>
                    </td>
                    <td>
                        <strong> $linhausuario[2]</strong>
                    </td>";
                       }
                     }
                    ?>
                </tr>
            </tbody>
            
        </table>
    </fieldset>
        
    </div>
    <footer>
        <p>&copy; 2024 Agenda de Contatos</p>
    </footer>
</body>
</html>