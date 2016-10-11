<?php include_once 'structure/top.php'; ?>

<div class="container">
    <div class="col">
        <h1 style="text-align: center">Demonstração Editor Visual</h1>
        <div class="col-md-12" adm-form="FormAdmin">
            <adm type="structure">
                <div admitem>
                    <h2 adm-field="nome" adm-field-type="field\Text"><adm type="lorem"></adm></h2>
                    <span adm-field="email" adm-field-type="field\Text"><adm type="lorem"></adm></span>
                </div>
            </adm>
            <?php foreach ($arrUsuario as $arr) { ?>
                <div admitem adm-id="<?php echo $arr['usuarioId'] ?>">
                    <h2 adm-field="nome" adm-field-type="field\Text"><?php echo $arr['nome'] ?></h2>
                    <span adm-field="email" adm-field-type="field\Text"><?php echo $arr['email'] ?></span>
                </div>
                <hr/>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <hr style="width: 100%;border-bottom: 1px solid #666;"/>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="config" adm-config="FormConfig">
                <h2 style="text-align: center;">Form Config</h2>
                <div adm-field="config_email" adm-field-type="field\Text">
                    <?php echo system\core\Config::get('config_email'); ?>
                </div
            </div>
        </div>
    </div>
</div>
<?php include_once 'structure/footer.php'; ?>
