<?php
session_start();

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    if (!empty($id)) {
        include("conecta.php");

        $sqlexc = "DELETE FROM tbl_tarefas WHERE tar_codigo ='$id'";
        $queryexc = mysqli_query($conn, $sqlexc);
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
    <?php include("conecta.php"); ?>

    <header>
        <div>
            <h1>Cadastros</h1>
        </div>
    </header>
    <nav>
        <a href="cad_usu.php">Cadastro de Usuário</a>
        <a href="cad_tar.php">Cadastro Tarefas</a>
        <a href="alterar_tar.php">Gerenciar Tarefas</a>
    </nav>

    <h2>Cadastro de Tarefas</h2>

    <section>
        <div class="box">
            <form action="inserir_tar.php" method="post" name="tarform" id="tarform">
                <fieldset class="usuario">
                    <legend>Dados do Usuário</legend>
                    <div>
                        <label for="setor">Setor</label>
                        <input type="text" name="setor" id="setor">
                        <br>
                        <label for="prioridade">Prioridade</label>
                        <select name="prioridade" id="prioridade">
                            <option value="alta">Alta</option>
                            <option value="media">Média</option>
                            <option value="baixa">Baixa</option>
                        </select>
                        <br>
                        <label for="descricao">Descrição</label>
                        <input type="text" name="descricao" id="descricao">
                        <br>
                        <label for="status">Status</label>
                        <input type="text" name="status" id="status">
                        <br>
                    </div>
                </fieldset>
                <div>
                    <button type="submit" class="botao">Cadastrar</button>
                </div>
            </form>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Agenda de Contatos</p>
    </footer>
</body>
</html>
