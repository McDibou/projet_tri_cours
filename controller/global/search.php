<?php
$value = !empty($_GET['value']) ? $_GET['value'] : '';

if (preg_match("/^[a-zA-Z0-9' -]*$/", $value)) {
    $search = $app->getTable('content')->search($_GET['value']);
}

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'global' . DIRECTORY_SEPARATOR . 'search.php';