<!doctype html>
<html lang="en" class="no-js">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <?php
        $tblUsuario = admin\Login::getUser();
        ?>
        <title>Admin</title>

        <!-- Font awesome -->
        <link rel="stylesheet" href="<?php echo ADMIN_PUBLIC_URL ?>css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo ADMIN_PUBLIC_URL ?>css/moon.css">
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
        <link rel="stylesheet" href="<?php echo ADMIN_PUBLIC_URL ?>css/summernote.css">
        <!-- Admin Stye -->
        <link rel="stylesheet" href="<?php echo ADMIN_PUBLIC_URL ?>css/style.css">
        <link rel="shortcut icon" href="<?php echo ADMIN_PUBLIC_URL; ?>img/favicon.ico">

        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
        <script>
            var ADMIN_URL = '<?php echo ADMIN_URL; ?>';
            var SITE_URL = '<?php echo SITE_URL; ?>';
<?php if (defined('__ALIAS__MENU')) { ?>
                var SITE_MENU = '<?php echo ADMIN_URL . 'menu/' . __ALIAS__MENU . '/' ?>';
<?php } ?>
        </script>
    </head>

    <body>
        <div class="brand clearfix">
            <a href="<?php echo ADMIN_URL; ?>" class="logo"><img src="<?php echo ADMIN_PUBLIC_URL ?>img/logo.jpg" class="img-responsive" alt=""></a>
            <span class="menu-btn"><i class="fa fa-bars"></i></span>
            <ul class="ts-profile-nav">
                <li class="ts-account">
                    <a> 
                        <?php
                        if (!is_null($tblUsuario)) {
                            $reflect = new ReflectionObject($tblUsuario);
                            $name = $tblUsuario->getNome();
                            $arrName = explode(' ', $name);
                            echo $arrName[0];
                        }
                        ?>
                        <i class="fa fa-angle-down hidden-side"></i>
                    </a>
                    <ul>
                        <li><a href="<?php echo ADMIN_URL ?>minha-conta">Minha conta</a></li>
                        <li><a href="<?php echo ADMIN_URL ?>logoff">Sair</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="ts-main-content">
            <nav class="ts-sidebar">
                <ul class="ts-sidebar-menu">
                    <?php
                    $arrMenus = \admin\Menu::getArrMenus();
                    foreach ($arrMenus as $arrMenu) {
                        $isOpen = false;
                        if (isset($data['arrForm'])) {
                            if (isset($data['arrForm']['parent'])) {
                                $isOpen = $data['arrForm']['parent']['menu_id'] == $arrMenu['menu']['menu_id'];
                            }
                        }
                        ?>
                        <li class='<?php
                        if ($isOpen) {
                            echo 'open';
                        }
                        ?>'>
                            <a href="#"><?php echo $arrMenu['menu']['nome'] ?></a>
                            <?php
                            if (isset($arrMenu['submenu'])) {
                                ?>
                                <ul>
                                    <?php foreach ($arrMenu['submenu'] as $arrSubmenu) { ?>
                                        <li><a href="<?php echo ADMIN_URL, 'menu/', $arrSubmenu['menu']['alias']; ?>"><?php echo $arrSubmenu['menu']['nome'] ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </nav>