<?php

$app->getAuth()->noConnect('user');

$user = $session->read('auth');
$user = $app->getTable('user')->all(['pseudo_user'], [$user], true);
$contents = $app->getTable('Content')->allJoin(['name_user'], [$user->name_user]);

require_once dirname(__DIR__, 2). DIRECTORY_SEPARATOR . 'view' .DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR . 'spaceUser.php';