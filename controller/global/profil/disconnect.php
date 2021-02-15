<?php

use Adrien\HTML\FormHTML;

if (isset($_POST['disconnect']))
    if ($session->verify('auth')) {
        $session->destroy();
        header("Location: ./");
    }

$formDisconnect = new FormHTML($_POST);
require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'global' . DIRECTORY_SEPARATOR . 'profil' . DIRECTORY_SEPARATOR . 'disconnect.php';