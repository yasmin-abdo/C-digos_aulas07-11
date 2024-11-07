<?php
    include("conecta.php");

    $setor = $_POST["setor"];
    $prioridade = $_POST["prioridade"];
    $descricao = $_POST["descricao"];
    $status = $_POST["status"];

    $sql = "INSERT INTO tbl_tarefas(tar_setor, tar_prioridade, tar_descricao, tar_status)
            VALUES('$setor', '$prioridade', '$descricao', '$status')";

    if (mysqli_query($conn, $sql)) {
        echo "Registro inserido com Sucesso!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);

?>
<html>
    <a href="cad_tar.php">voltar</a>
</html>