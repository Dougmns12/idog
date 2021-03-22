<?php
session_start();
if(isset($_SESSION["nome"])){
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="img/icone.png" type="image/x-icon" />

    <title>Idog</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">


        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <ul class="navbar-nav ml-auto">

                            <!-- Topbar Navbar -->
                            <ul class="navbar-nav ml-auto">

                                <!-- item - sacola-->

                                <button class="btn" type="button">
                            <a href="index.php">
                            <i class="fas fa-home fa-lg"></i></a>
                        </button> 
                                <button class="btn" type="button">
                            <a href="404.html">
                            <i class="fas fa-shopping-bag fa-lg"></i></a>
                        </button>

                                <div class="topbar-divider d-none d-sm-block"></div>

                                <!-- usuário -->
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Gerente</span>
                                        <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                                    </a>
                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="categorias.php">
                                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i> Categorias
                                        </a>
                                        <a class="dropdown-item" href="produtos.php">
                                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i> Produtos
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Sair
                                        </a>
                                    </div>
                                </li>


                    </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row justify-content-center">

            <div class="col-xl-9 col-lg-9 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body  p-0 ">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Cadastrar produto</h1>
                                    </div>
                                    <form action="banco_cadastrar_produto.php" method="post" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="nome" placeholder="Nome do produto">
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="btn btn-secondary btn-user btn-block">
                                        </div>
                                        <div class="form-group">
                                            <h2 class="form-control h6 bg-danger text-white"><label>Selecione as Categorias:</h2>
<?php
            include 'banco.php';
            $conn = conectar();
            $sql = "SELECT * FROM Categoria ORDER BY nome";
            $result = mysqli_query($conn, $sql);
    
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<input type='checkbox' name='categoria[]' value='".$row["idCategoria"]."'>".$row["nome"]."<br />";
                }
                desconectar($conn);
                
            } else {
                desconectar($conn);
                echo "Erro";
            }
?>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="preco" placeholder="Preço">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="descricao" placeholder="Descrição">
                                        </div>
                                        <input type="submit" value="Cadastrar" class="btn btn-primary btn-user btn-block">
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
</div>

<br/>
<br/>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Realmente deseja encerrar a sessão?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Sair" abaixo se você estiver pronto para encerrar sua sessão atual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="login.php">Sair</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>

<?php
}else{
    header('location: login.php');
}
?>