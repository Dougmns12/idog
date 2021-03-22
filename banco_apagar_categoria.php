<?php 
session_start();
if(isset($_SESSION["nome"])){

        $id = $_GET["id"];
        
        include 'banco.php';
        $conn = conectar();

        // remover primeiro as dependências dele (produtos_categorias)
        
        $sql = "DELETE FROM categoria WHERE idCategoria=$id";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $sql2 = "DELETE FROM produto WHERE idProduto=$id";
            $result2 = mysqli_query($conn, $sql2);

            if(!$result2){
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                desconectar($conn);
                //header('Location: produtos.php');
            }
            desconectar($conn);
            header('Location: categorias.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            desconectar($conn);
            //header('Location: produtos.php');
        }
}else{
    header('Location: login.html');
}
    ?>