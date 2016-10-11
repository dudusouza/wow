<!doctype html>
<html lang="en" class="no-js">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin - Login</title>

        <!-- Font awesome -->
        <link rel="stylesheet" href="<?php echo ADMIN_PUBLIC_URL ?>css/font-awesome.min.css">
        <!-- Sandstone Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo ADMIN_PUBLIC_URL ?>css/bootstrap.min.css">
        <!-- Bootstrap Datatables -->
        <link rel="stylesheet" href="<?php echo ADMIN_PUBLIC_URL ?>css/dataTables.bootstrap.min.css">
        <!-- Bootstrap social button library -->
        <link rel="stylesheet" href="<?php echo ADMIN_PUBLIC_URL ?>css/bootstrap-social.css">
        <!-- Bootstrap select -->
        <link rel="stylesheet" href="<?php echo ADMIN_PUBLIC_URL ?>css/bootstrap-select.css">
        <!-- Bootstrap file input -->
        <link rel="stylesheet" href="<?php echo ADMIN_PUBLIC_URL ?>css/fileinput.min.css">
        <!-- Awesome Bootstrap checkbox -->
        <link rel="stylesheet" href="<?php echo ADMIN_PUBLIC_URL ?>css/awesome-bootstrap-checkbox.css">
        <!-- Admin Stye -->
        <link rel="stylesheet" href="<?php echo ADMIN_PUBLIC_URL ?>css/style.css">

        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    </head>

    <body>

        <div class="login-page bk-img" style="background: #ddd;">
            <div class="form-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <h1 class="text-center text-bold text-light mt-4x">Administração</h1>
                            <div class="well row pt-2x pb-3x bk-light">
                                <div class="col-md-8 col-md-offset-2">
                                    <form action="" class="mt" method="post">

                                        <label for="" class="text-uppercase text-sm">Usuario</label>
                                        <input type="text" placeholder="Username" name="usuario" class="form-control mb">

                                        <label for="" class="text-uppercase text-sm">Senha</label>
                                        <input type="password" placeholder="Password" name="senha" class="form-control mb">

                                        <button class="btn btn-primary btn-block" type="submit">LOGIN</button>

                                    </form>
                                </div>
                            </div>
                            <div class="text-center text-light">
                                <a href="#" class="text-light">Perdeu sua senha?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Loading Scripts -->
        <script src="<?php echo ADMIN_PUBLIC_URL ?>js/jquery.min.js"></script>
        <script src="<?php echo ADMIN_PUBLIC_URL ?>js/bootstrap-select.min.js"></script>
        <script src="<?php echo ADMIN_PUBLIC_URL ?>js/bootstrap.min.js"></script>
        <script src="<?php echo ADMIN_PUBLIC_URL ?>js/jquery.dataTables.min.js"></script>
        <script src="<?php echo ADMIN_PUBLIC_URL ?>js/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo ADMIN_PUBLIC_URL ?>js/Chart.min.js"></script>
        <script src="<?php echo ADMIN_PUBLIC_URL ?>js/fileinput.js"></script>
        <script src="<?php echo ADMIN_PUBLIC_URL ?>js/chartData.js"></script>
        <script src="<?php echo ADMIN_PUBLIC_URL ?>js/summernote.js"></script>
        <script src="<?php echo ADMIN_PUBLIC_URL ?>js/libs.js"></script>
        <script src="<?php echo ADMIN_PUBLIC_URL ?>js/main.js"></script>

    </body>

</html>