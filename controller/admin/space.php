<?php

$app->getAuth()->noConnect('admin');
$contents = $app->getTable('Content')->allJoin();
$categories = $app->getTable('Category')->all();
$subjects = $app->getTable('Subject')->all();
$formats = $app->getTable('Format')->all();

require_once dirname(__DIR__, 2) .DIRECTORY_SEPARATOR . 'view' .DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'space.php';