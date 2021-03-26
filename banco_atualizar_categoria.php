<?php 
session_start();
if(isset($_SESSION["nome"])){

        $id = $_POST["id"];
        $nome = $_POST["nome"];
        
        include 'banco.php';
        $conn = conectar();
        $sql = "UPDATE categoria SET nome='$nome' WHERE idCategoria=$id";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            desconectar($conn);
            header('Location: categorias.php');

        } else {
            //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            desconectar($conn);
            header('Location: editar_categoria.php');
        }
}else{
    header('Location: login.php');
}
    ?>