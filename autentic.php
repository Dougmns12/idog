<?php
session_start();
include "banco.php";

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$conn = conectar();

$sql = "SELECT * FROM Usuario WHERE nome='$usuario' AND senha='$senha'";

$result = mysqli_query($conn, $sql);

if(!$result){
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['usuario'] = $row['usuario'];
    }
    desconectar($conn);
    header('location: index.php');
}else{
    desconectar($conn);
    header('location: login.php');
}
?>