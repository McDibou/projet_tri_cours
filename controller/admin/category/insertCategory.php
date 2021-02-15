<?php

use Adrien\Entity\CategoryEntity;
use Adrien\HTML\FormHTML;

$error = $name_error = $error_db = '';
$app->getAuth()->noConnect('admin');

if (isset($_POST['insert'])) {
    $datas = new CategoryEntity($_POST);

    if (!empty($datas->getAllError())) {
        $error = $datas->getAllError();
        $name_error = !empty($error['name_category']) ? $error['name_category'] : '';
    } else {
        try {
            $app->getTable('category')->insert($datas->getAllContent());
            header('Location: ?p=edit.category&id=' . $app->getDatabase()->lastId());
        } catch (Exception $e) {
            $error_db = 'Une erreur c\'est produite, veuillez reeesayer plus tard';
        }
    }
}
$formCategory = new FormHTML($_POST);

require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'category' . DIRECTORY_SEPARATOR . 'insertCategory.php';