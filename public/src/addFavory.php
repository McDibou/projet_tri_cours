<?php

use Adrien\App;
use Adrien\Auth\Session;
use Adrien\Autoloader;

require dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'Autoloader.php';

Autoloader::registre();
$session = Session::getInstance();
$app = App::getInstance();

$response = file_get_contents('php://input');
$data = json_decode($response, true);

if ($session->verify('role')) {
    try {
        $app->getTable('favory')->insert(['user_id_favory' => $_SESSION['id'], 'content_id_favory' => $data['content_id_favory']]);
        echo json_encode(true);
    } catch (Exception $e) {
        echo  json_encode(false);
    }
}