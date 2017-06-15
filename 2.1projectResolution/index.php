<?php

require_once(__DIR__ . '/Autoload.php');
spl_autoload_register(['Autoload', 'loader']);

try {
    $cvConfig = require_once(__DIR__ . '/data.php');
    $data = (new \application\CV($cvConfig))->parse();
    (new \application\Template())->render(__DIR__ . '/application/templates/console.php', $data);
} catch (Exception $ex) {
    die($ex->getMessage());
}
