<?php
session_start();
if(isset($_SESSION["apelido"])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Categorias</h1>
    
    <p><a href="categoria_adicionar.php">Cadastrar</a></p>

    <?php 
        include '../banco.php';
        $conn = conectar();

        $sql = "SELECT * FROM Categorias order by nome";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo $row["nome"]." | <a href='categoria_editar.php?id=".$row["id"]."'>Editar</a> | <a href='bd_remover_categoria.php?id=".$row["id"]."'>Apagar</a>";
                echo "<br />";
            }
            desconectar($conn);

        } else {
            desconectar($conn);
            echo "Nenhuma categoria cadastrada";
        }
    ?>

        <p><a href="../perfil.php"><< Voltar</a>
</body>
</html>


<?php
}else{
    header('Location: login.html');
}
?>