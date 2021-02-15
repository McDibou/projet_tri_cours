<?php

$app->getAuth()->noConnect('user');

if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    try {
        $app->getTable('favory')->delete(['content_id_favory'], [$_GET['id']]);
        $app->getTable('content')->delete(['id_content'],[$_GET['id']]);
        header('Location: ?p=space.user');
    } catch (Exception $e) {
        header('Location: ?p=space.user&error=ok');
    }
}