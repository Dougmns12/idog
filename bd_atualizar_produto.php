<?php 
session_start();
if(isset($_SESSION["apelido"])){

        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $categorias = $_POST["categorias"];
        $fornecedor = $_POST["fornecedor"];
        
        include '../banco.php';
        $conn = conectar();

        //Atualizar Produto
        $sql = "UPDATE Produtos SET nome='$nome', id_fornecedores=$fornecedor WHERE id=$id";
        $result = mysqli_query($conn, $sql);

        // Remover categorias do produto em questão
        $sql = "DELETE FROM Produtos_Categorias WHERE id_produtos=$id";
        $result = mysqli_query($conn, $sql);

        // Recuperar todos as categorias selecionadas e adicionar
        foreach ($categorias as $cat){
            $sql = "INSERT INTO Produtos_Categorias (id_produtos, id_categorias) VALUES ($id, $cat)";
            $result = mysqli_query($conn, $sql);
        }
        desconectar($conn);
        header('Location: produtos.php');
}else{
    header('Location: login.html');
}
    ?>