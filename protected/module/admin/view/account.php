<?php include_once '_sctructure/header.php'; ?>
<form method="post" id="account">
    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <h2 class="page-title">Minha conta</h2>
                    <?php 
                    /* @var $tblUsuario TblAdminUsuario */
                    $nome = $tblUsuario->nome;
                    $email = $tblUsuario->email;
                    $usuario = $tblUsuario->usuario;
                    ?>
                    <!-- Zero Configuration Table -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <!-- Nav tabs -->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nome</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="<?php echo $nome; ?>" class="form-control" name="nome">
                                        </div>
                                    </div>
                                    <div class="hr-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="<?php echo $email; ?>" class="form-control" name="email">
                                        </div>
                                    </div>
                                    <div class="hr-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Usuário</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="<?php echo $usuario; ?>" class="form-control" name="usuario">
                                        </div>
                                    </div>
                                    <div class="hr-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Senha</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="senha">
                                        </div>
                                    </div>
                                    <div class="hr-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Confirmar Senha</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="confirmsenha" class="form-control">
                                        </div>
                                    </div>
                                    <div class="hr-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button class="btn btn-primary" type="submit">Salvar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
<?php include_once '_sctructure/footer.php'; ?>