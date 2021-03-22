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
        $sql = "SELECT * FROM Produtos where id=$id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $nome = $row["nome"];
                $fornecedor_id = $row["id_fornecedores"];
            }
            //desconectar($conn);

        } else {
            //desconectar($conn);
            echo "Erro";
        }

        // recuperar as categorias selcionadas
        //$conn = conectar();
        $sql = "SELECT id_categorias FROM Produtos_Categorias WHERE id_produtos=$id";
        $result = mysqli_query($conn, $sql);

        $categorias = null;

        while($row = mysqli_fetch_array($result)) {
            $categorias[] = $row[0];
        }

        //print_r($categorias);

        //if (mysqli_num_rows($result) > 0) {
            //while($row = mysqli_fetch_assoc($result)) {            

            //}

            //while($categorias = mysqli_fetch_array($result, MYSQLI_BOTH)) {}

            //print_r($categorias);

           //$categorias = mysqli_fetch_array($result);
           //echo $categorias[1];

            //desconectar($conn);
        //} else {
            //desconectar($conn);
           // echo "Não tem categorias";
        //}


    ?>

    <h1>Cadastrar Produto</h1>
    <form action="bd_atualizar_produto.php" method="post">
    <p><label>Digite o nome:<input type="text" name="nome" value="<?php echo $nome; ?>"></label></p>
    <input name="id" type="hidden" value="<?php echo $id; ?>">
    <p><label>Selecione as Categorias:<br />
    <?php
            //$conn3 = conectar();

            $sql = "SELECT * FROM Categorias order by nome";
            $result = mysqli_query($conn, $sql);
    
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<input type='checkbox' name='categorias[]' value='".$row["id"]."'";
                    foreach($categorias as $cat){
                        if($cat == $row["id"]){
                            echo " checked ";
                        }
                    }
                    echo ">".$row["nome"]."<br />";
                }
                //desconectar($conn);
                
            } else {
                //desconectar($conn);
                echo "Erro";
            }
    ?></label></p>


<p><label>Selecione o Fornecedor:<br />
    <?php
            //$conn = conectar();
            $sql = "SELECT * FROM Fornecedores order by nome";
            $result = mysqli_query($conn, $sql);
    
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<input type='radio' name='fornecedor' value='".$row["id"]."'";
                    if($row["id"] == $fornecedor_id){
                        echo " checked ";
                    }
                    echo ">".$row["nome"]."<br />";
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