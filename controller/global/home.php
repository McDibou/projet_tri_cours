<?php

$contents = $app->getTable('Content')->allJoin();
$categories = $app->getTable('Category')->all();
$subjects = $app->getTable('Subject')->all();

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'global' . DIRECTORY_SEPARATOR . 'home.php';