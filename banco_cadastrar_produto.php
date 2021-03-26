<?php 
session_start();
if(isset($_SESSION["nome"])){

        $nome = $_POST["nome"];
        $preco = $_POST["preco"];
        $descricao = $_POST["descricao"];
        $idCategoria = $_POST["categoria"];
        $imagem = $FILES["imagem"];
        
        if(isset($_FILES['imagem']) && !empty($_FILES['imagem']['name'])){
            $imagem_temp = $_FILES['imagem']['tmp_name'];
            $destino = 'img/' .$_FILES["imagem"]["name"];
            move_uploaded_file($imagem_temp, $destino);

            $nome_imagem = $_FILES["imagem"]["name"];

        }else{
            $nome_imagmem = "sem_imagem.png";
        }
    

        include 'banco.php';
        $conn = conectar();

        $sql = "INSERT INTO produto (nome, preco, descricao, idcategoria, imagem) VALUES ('$nome', '$preco', '$descricao','$idCategoria', '$nome_imagem')";
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
            header('Location: produtos.php');
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