<?php

use Adrien\Entity\ContentEntity;
use Adrien\HTML\FormHTML;

$error = $name_error = $link_error = $desc_error = $category_error = $subject_error = $format_error = $error_db = '';
$app->getAuth()->noConnect('user');

if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
    header('Location: ?p=space.user');
}

$content = $app->getTable('Content')->all(['id_content'], [$_GET['id']], true);
$categories = $app->getTable('Category')->extract('id_category', 'name_category');
$subjects = $app->getTable('Subject')->extract('id_subject', 'name_subject');
$formats = $app->getTable('Format')->extract('id_format', 'name_format');

if (isset($_POST['edit'])) {
    $datas = new ContentEntity($_POST);

    if (!empty($datas->getAllError())) {
        $error = $datas->getAllError();
        $name_error = !empty($error['name_content']) ? $error['name_content'] : '';
        $desc_error = !empty($error['desc_content']) ? $error['desc_content'] : '';
        $link_error = !empty($error['link_content']) ? $error['link_content'] : '';
        $category_error = !empty($error['category_id']) ? $error['category_id'] : '';
        $subject_error = !empty($error['subject_id']) ? $error['subject_id'] : '';
        $format_error = !empty($error['format_id']) ? $error['format_id'] : '';
    } else {
        try {
            $app->getTable('content')->update($datas->getAllContent(), ['id_content'], $_GET['id']);
            header('Location: ?p=edit.content.user&id=' . $_GET['id']);
        } catch (Exception $e) {
            $error_db = 'Une erreur c\'est produite, veuillez reeesayer plus tard';
        }
    }
}

$formContent = new FormHTML($content);

require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR . 'content' . DIRECTORY_SEPARATOR . 'editContentUser.php';