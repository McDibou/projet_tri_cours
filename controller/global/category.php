<?php

if (empty($_GET['id_subject'])) {
    $_GET['id_subject'] = null;
}

$contentNotSubject = $app->getTable('Content')->allJoin(['category_id'], [$_GET['id_category']]);
$contents = $app->getTable('Content')->allJoin(['category_id', 'subject_id'], [$_GET['id_category'], $_GET['id_subject']]);
$subjects = $app->getTable('Content')->group('id_subject', ['category_id'], [$_GET['id_category']]);

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'global' . DIRECTORY_SEPARATOR . 'category.php';