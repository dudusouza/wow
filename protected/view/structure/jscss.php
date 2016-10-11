<?php
if (IS_DEV) {
    echo \system\core\JsCss::fetchCss('default', PUBLIC_URL);
    echo \system\core\JsCss::fetchJs('default', PUBLIC_URL);
} else {
    ?>
    <style>
    <?php echo \system\core\JsCss::getMinifyCss(SITE_PATH . 'public/'); ?>
    </style>
    <script>
    <?php echo \system\core\JsCss::getMinifyJs(SITE_PATH . 'public/'); ?>
    </script>
<?php } ?>