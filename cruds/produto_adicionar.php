<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Cadastrar Produto</h1>
    <form action="bd_registro_produto.php" method="post">
    <p><label>Digite o nome:<input type="text" name="nome"></label></p>
    <p><label>Selecione as Categorias:<br />
    <?php
            include '../banco.php';
            $conn = conectar();
            $sql = "SELECT * FROM Categorias order by nome";
            $result = mysqli_query($conn, $sql);
    
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<input type='checkbox' name='categorias[]' value='".$row["id"]."'>".$row["nome"]."<br />";
                }
                desconectar($conn);
                
            } else {
                desconectar($conn);
                echo "Erro";
            }
    ?></label></p>


<p><label>Selecione o Fornecedor:<br />
    <?php
            $conn = conectar();
            $sql = "SELECT * FROM Fornecedores order by nome";
            $result = mysqli_query($conn, $sql);
    
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<input type='radio' name='fornecedor' value='".$row["id"]."'>".$row["nome"]."<br />";
                }
    
            } else {
                desconectar($conn);
                echo "erro";
            }
    ?></label></p>
    

    <p><input type="submit" value="Atualizar"></p>
    </form>
</body>
</html>