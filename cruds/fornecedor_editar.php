<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 
        $id = $_GET["id"];
        
        include '../banco.php';
        $conn = conectar();

        $sql = "SELECT * FROM Fornecedores where id=$id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $nome = $row["nome"];
            }
            desconectar($conn);

        } else {
            desconectar($conn);
            echo "Erro";
        }
    ?>

    <h1>Editar Fornecedor</h1>
    <form action="bd_atualizar_fornecedor.php" method="post">
    <p><label>Digite o nome:<input type="text" name="nome" value="<?php echo $nome; ?>"></label></p>
    <input name="id" type="hidden" value="<?php echo $id; ?>">
    <p><input type="submit" value="Atualizar"></p>
    </form>
</body>
</html>