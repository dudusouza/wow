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
                                        <?php echo $table;   ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
<?php include_once '_sctructure/footer.php'; ?>
