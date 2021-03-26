<?php 
session_start();
if(isset($_SESSION["nome"])){

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $descricao = $_POST["descricao"];
    $idCategoria = $_POST["categoria"];


    if(isset($_FILES['imagem']) && !empty($_FILES['imagem']['name'])){
        $imagem_temp = $_FILES['imagem']['tmp_name'];
        $destino = 'img/' .$_FILES["imagem"]["name"];
        move_uploaded_file($imagem_temp, $destino);

        $nome_imagem = $_FILES["imagem"]["name"];
        
        $sql = "UPDATE produto SET nome='$nome', preco=$preco, descricao='$descricao', idCategoria=$idCategoria, imagem='$imagem' WHERE idProduto=$id";


    }else{
        $sql = "UPDATE produto SET nome='$nome', preco=$preco, descricao='$descricao', idCategoria=$idCategoria WHERE idProduto=$id";
    }


        include 'banco.php';
        $conn = conectar();

        //Atualizar Produto
        // $sql = "UPDATE produto SET nome='$nome', preco='$preco', descricao='$descricao', idCategoria='$idCategoria', imagem='$imagem' WHERE id=$id";
        $result = mysqli_query($conn, $sql);

        // Remover categorias do produto em questão
        // $sql = "DELETE FROM categoria WHERE idCategoria=$id";
        // $result = mysqli_query($conn, $sql);

        // Recuperar todos as categorias selecionadas e adicionar
        // foreach ($categoria as $cat){
        //     $sql = "INSERT INTO categoria (idCategoria, idProduto)  VALUES ($id, $cat)";
        //     $result = mysqli_query($conn, $sql);
        // }
        desconectar($conn);
        header('Location: produtos.php');
        // echo $sql;
}else{
    header('Location: login.php');
}
    ?>