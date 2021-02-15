<?php

use Adrien\Entity\FormatEntity;
use Adrien\HTML\FormHTML;

$error = $name_error = $error_db = '';
$app->getAuth()->noConnect('admin');

if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
    header('Location: ?p=space.admin');
}

$format = $app->getTable('Format')->all(['id_format'], [$_GET['id']], true);

if (isset($_POST['edit'])) {
    $datas = new FormatEntity($_POST);
    if (!empty($datas->getAllError())) {
        $error = $datas->getAllError();
        $name_error = !empty($error['name_format']) ? $error['name_format'] : '';
    } else {
        try {
            $app->getTable('format')->update($datas->getAllContent(), ['id_format'], $_GET['id']);
            header('Location: ?p=edit.format&id=' . $_GET['id']);
        } catch (Exception $e) {
            $error_db = 'Une erreur c\'est produite, veuillez reeesayer plus tard';
        }
    }
}

$formFormat = new FormHTML($format);

require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'format' . DIRECTORY_SEPARATOR . 'editFormat.php';