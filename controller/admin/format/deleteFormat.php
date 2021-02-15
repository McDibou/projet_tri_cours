<?php

$app->getAuth()->noConnect('admin');

if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    try {
        $app->getTable('format')->delete(['id_format'], [$_GET['id']]);
        header('Location: ?p=space.admin');
    } catch (Exception $e) {
        header('Location: ?p=space.admin&error=ok');
    }
}