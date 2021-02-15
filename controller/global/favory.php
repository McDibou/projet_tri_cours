<?php

if (!$session->verify('auth')) {
    header("Location: ?p=login.user");
}

$user = $session->read('auth');
$favories = $app->getTable('Content')->favory([$user]);

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'global' . DIRECTORY_SEPARATOR . 'favory.php';