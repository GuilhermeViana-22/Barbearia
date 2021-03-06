<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

   
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

 
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                      
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"><img src="img/undraw_secure_login_pdn4.svg" style=" width: 350px; margin-top:50px; margin-left:100px;"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bem Vindo!</h1>
                                    </div>
                                    <form class="user" action="crud_logar.php" method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Digite o email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="senha" name="senha" placeholder="Digite a sua senha">
                                        </div>
                                        <?php if (isset($_GET["erro"]) && $_GET["erro"] == 1) { ?>

                                            <div class="alert alert-danger">
                                                Erro ao fazer login.
                                            </div>

                                        <?php } else if (isset($_GET["erro"]) && $_GET["erro"] == 2) { ?>

                                            <div class="alert alert-danger">
                                                Você não está logado.<br />Faça o login.
                                            </div>
                                        <?php } ?>

                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Entrar</button>


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


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>