<?php

if (empty($_GET['id_category'])) {
    $_GET['id_category'] = null;
}

$contentNotCategory = $app->getTable('Content')->allJoin(['subject_id'], [$_GET['id_subject']]);
$contents = $app->getTable('Content')->allJoin(['category_id', 'subject_id'], [$_GET['id_category'], $_GET['id_subject']]);
$categories = $app->getTable('Content')->group('id_category',['subject_id'], [$_GET['id_subject']]);

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'global' . DIRECTORY_SEPARATOR . 'subject.php';