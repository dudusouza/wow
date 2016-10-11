<?php include_once '_sctructure/header.php'; ?>
<div class="content-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">

                <h2 class="page-title"><?php echo $arrForm['nome']; ?></h2>

                <!-- Zero Configuration Table -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <?php
                                    $i = 0;
                                    foreach ($form as $arrTab) {
                                        $i++;
                                        ?>
                                        <li role="presentation" <?php if ($i == 1) { ?>class="active"<?php } ?>>
                                            <a href="#<?php echo $arrTab['alias'] ?>" aria-controls="home" role="tab" data-toggle="tab"><?php echo $arrTab['label'] ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <form method="post" class="form-horizontal" enctype="multipart/form-data">

                                    <div class="tab-content">
                                        <?php
                                        $i = 0;
                                        foreach ($form as $arrTab) {
                                            $i++;
                                            ?>
                                            <div role="tabpanel" class="tab-pane <?php if ($i === (int) 1) { ?>active<?php } ?>" id="<?php echo $arrTab['alias'] ?>">
                                                <?php foreach ($arrTab['fields'] as $arrField) { ?>
                                                    <div class="form-group">
                                                        <?php if (!empty($arrField['label'])) { ?>
                                                            <label class="col-sm-2 control-label"><?php echo $arrField['label']; ?></label>
                                                            <div class="col-sm-10">
                                                                <?php echo $arrField['html']; ?>
                                                            </div>
                                                        <?php }else{ ?>
                                                            <div class="col-sm-12">
                                                                <?php echo $arrField['html']; ?>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="hr-dashed"></div>

                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <a class="btn btn-default" href='<?php echo ADMIN_URL . 'menu/' . __ALIAS__MENU; ?>'>Voltar</a>
                                            <button class="btn btn-primary" type="submit">Salvar</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once '_sctructure/footer.php'; ?>