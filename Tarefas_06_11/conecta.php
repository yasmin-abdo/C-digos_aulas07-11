<?php

$servername = "localhost";//não é igualdade, é atribução
$database = "tarefas";
$username = "root";
$password = "";

$conn = mysqli_connect($servername,$username,$password,$database); 

if(!$conn){
    die("Conexão falhou: ".mysqli_connect_error());
}

?>