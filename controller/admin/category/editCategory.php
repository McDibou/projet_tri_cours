<?php

use Adrien\Entity\CategoryEntity;
use Adrien\HTML\FormHTML;

$error = $name_error = $error_db = '';
$app->getAuth()->noConnect('admin');

if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
    header('Location: ?p=space.admin');
}

$category = $app->getTable('Category')->all(['id_category'], [$_GET['id']], true);

if (isset($_POST['edit'])) {
    $datas = new CategoryEntity($_POST);
    if (!empty($datas->getAllError())) {
        $error = $datas->getAllError();
        $name_error = !empty($error['name_category']) ? $error['name_category'] : '';
    } else {
        try {
            $app->getTable('category')->update($datas->getAllContent(), ['id_category'], $_GET['id']);
            header('Location: ?p=edit.category&id=' . $_GET['id']);
        } catch (Exception $e) {
            $error_db = 'Une erreur c\'est produite, veuillez reeesayer plus tard';
        }
    }
}

$formFormat = new FormHTML($category);

require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'category' . DIRECTORY_SEPARATOR . 'editCategory.php';