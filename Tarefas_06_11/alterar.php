<?php

$servername = "localhost";
$database = "tarefas";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Verificar se o ID foi passado pela URL
if (isset($_GET['id'])) {
    $tar_codigo = $_GET['id'];

    // Consultar a tarefa pelo ID
    $sql = "SELECT * FROM tbl_tarefas WHERE tar_codigo = $tar_codigo";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        die("Tarefa não encontrada.");
    }
}

// Atualizar os dados da tarefa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $setor = $_POST["setor"];
    $prioridade = $_POST["prioridade"];
    $descricao = $_POST["descricao"];
    $status = $_POST["status"];

    // Atualizar os dados no banco de dados
    $update_sql = "UPDATE tbl_tarefas SET tar_setor = '$setor', tar_prioridade = '$prioridade', tar_descricao = '$descricao', tar_status = '$status' WHERE tar_codigo = $tar_codigo";

    if (mysqli_query($conn, $update_sql)) {
        echo "<script>alert('Tarefa atualizada com sucesso!');window.location='alterar_tar.php';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar tarefa: " . mysqli_error($conn) . "');</script>";
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
        <form action="alterar.php?id=<?php echo $tar_codigo; ?>" method="post" name="tarform" id="tarform">
            <fieldset class="usuario">
                <legend>Dados do Usuário</legend>
                <div>
                    <label for="setor">Setor</label>
                    <input type="text" id="setor" name="setor" value="<?php echo isset($row['tar_setor']) ? $row['tar_setor'] : ''; ?>" readonly>
                    <br>
                    <label for="prioridade">Prioridade</label>
                    <select name="prioridade" id="prioridade">
                        <option value="baixa" <?php echo (isset($row['tar_prioridade']) && $row['tar_prioridade'] == 'baixa') ? 'selected' : ''; ?>>Baixa</option>
                        <option value="média" <?php echo (isset($row['tar_prioridade']) && $row['tar_prioridade'] == 'média') ? 'selected' : ''; ?>>Média</option>
                        <option value="alta" <?php echo (isset($row['tar_prioridade']) && $row['tar_prioridade'] == 'alta') ? 'selected' : ''; ?>>Alta</option>
                    </select>
                    <br>
                    <label for="descricao">Descrição</label>
                    <input type="text" id="descricao" name="descricao" value="<?php echo isset($row['tar_descricao']) ? $row['tar_descricao'] : ''; ?>" required>
                    <br>
                    <label for="status">Status</label>
                    <input type="text" id="status" name="status" value="<?php echo isset($row['tar_status']) ? $row['tar_status'] : ''; ?>" required>
                    <br>
                </div>
            </fieldset>
            <div>
                <input type="submit" value="Atualizar" class="btn">
            </div>
        </form>
    </div>
</section>

<footer>
    <p>&copy; 2024 Agenda de Contatos</p>
</footer>
</body>
</html>

<?php
// Fechar a conexão
mysqli_close($conn);
?>
