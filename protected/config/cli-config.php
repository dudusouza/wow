<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

define('IS_DEV', true);

$sitepath = realpath(dirname(__FILE__) . '/../../');

define('LOADER_SITE_PATH', $sitepath . '/');
define('PROTECTED_PATH', LOADER_SITE_PATH . 'protected/');
define('MODEL_PATH', PROTECTED_PATH . 'model/');

$arrIni = parse_ini_file(LOADER_SITE_PATH . 'config.ini', true);
foreach ($arrIni['dev'] as $var => $val) {
    $var = strtoupper(str_replace('-', '_', $var));
    define($var, trim($val));
}


// replace with file to your own project bootstrap

require_once PROTECTED_PATH . 'config/db.php';

// replace with mechanism to retrieve EntityManager in your app

return ConsoleRunner::createHelperSet($entityManager);
