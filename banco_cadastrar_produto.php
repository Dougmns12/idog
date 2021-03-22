<?php 
session_start();
if(isset($_SESSION["nome"])){

        $nome = $_POST["nome"];
        $preco = $_POST["preco"];
        $descricao = $_POST["descricao"];
        $idCategoria = $_POST["categoria"];
        $imagem = $_POST["imagem"];

        
        include 'banco.php';
        $conn = conectar();

        $sql = "INSERT INTO produto (nome, preco, descricao, categoria, imagem) VALUES ('$nome', '$preco', '$descricao','$idCategoria', '$imagem')";
        $result = mysqli_query($conn, $sql);
        $produto = mysqli_insert_id($conn);

        if ($result) {
            // Recupera o ID do último produto cadastrado
            

            // Recuperar todos as categorias selecionadas
            echo "1";
            foreach ($Categoria as $cat){
                echo "2";
                echo $cat;
                $sql = "INSERT INTO Categoria (idproduto, idcategoria) VALUES ($produto, $cat)";
                $result2 = mysqli_query($conn, $sql);

                if (!$result2) {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    desconectar($conn);
                    echo "Erro1";
                    //header('Location: produto_adicionar.php');
                }
            }
            desconectar($conn);
            header('Location: produto.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            desconectar($conn);
            echo "Erro2";
            //header('Location: produto_adicionar.php');
        }
}else{
    header('Location: login.php');
}
    ?>