<?php

use Adrien\Entity\ContentEntity;
use Adrien\HTML\FormHTML;

$error = $name_error = $link_error = $desc_error = $category_error = $subject_error = $format_error = $error_db = '';
$app->getAuth()->noConnect('admin');

$user = $session->read('auth');
$user = $app->getTable('user')->all(['pseudo_user'], [$user], true);

$categories = $app->getTable('category')->extract('id_category', 'name_category');
$subjects = $app->getTable('subject')->extract('id_subject', 'name_subject');
$formats = $app->getTable('format')->extract('id_format', 'name_format');

if (isset($_POST['insert'])) {
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
            $app->getTable('content')->insert($datas->getAllContent());
            header('Location: ?p=edit.content&id=' . $app->getDatabase()->lastId());
        } catch (Exception $e) {
            if ($e->getCode() == 23000) {
                $error_db = 'le lien utiliser existe deja, veuillez en choisir un autre';
            } else {
                $error_db = 'Une erreur c\'est produite, veuillez reeesayer plus tard';
            }
        }
    }
}

$formContent = new FormHTML($_POST);

require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'content' . DIRECTORY_SEPARATOR . 'insertContent.php';