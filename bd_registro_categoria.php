<?php 
session_start();
if(isset($_SESSION["nome"])){

        $nome = $_POST["nome"];
        
        include '../banco.php';
        $conn = conectar();

        $sql = "INSERT INTO Categorias (nome) VALUES ('$nome')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            desconectar($conn);
            header('Location: categorias.php');

        } else {
            //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            desconectar($conn);
            header('Location: categoria_adicionar.php');
        }
}else{
    header('Location: login.html');
}
    ?>