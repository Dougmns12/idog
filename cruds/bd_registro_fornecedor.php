<?php 
session_start();
if(isset($_SESSION["apelido"])){

        $nome = $_POST["nome"];
        
        include '../banco.php';
        $conn = conectar();

        $sql = "INSERT INTO Fornecedores (nome) VALUES ('$nome')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            desconectar($conn);
            header('Location: fornecedores.php');

        } else {
            //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            desconectar($conn);
            header('Location: fornecedor_adicionar.php');
        }
}else{
    header('Location: login.html');
}
    ?>