<?php

use Adrien\Entity\FormatEntity;
use Adrien\HTML\FormHTML;

$error = $name_error = $error_db = '';
$app->getAuth()->noConnect('admin');

if (isset($_POST['insert'])) {
    $datas = new FormatEntity($_POST);
    if (!empty($datas->getAllError())) {
        $error = $datas->getAllError();
        $name_error = !empty($error['name_format']) ? $error['name_format'] : '';
    } else {
        try {
            $app->getTable('format')->insert($datas->getAllContent());
            header('Location: ?p=edit.format&id=' . $app->getDatabase()->lastId());
        } catch (Exception $e) {
            $error_db = 'Une erreur c\'est produite, veuillez reeesayer plus tard';
        }
    }
}

$formFormat = new FormHTML($_POST);

require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'format' . DIRECTORY_SEPARATOR . 'insertFormat.php';