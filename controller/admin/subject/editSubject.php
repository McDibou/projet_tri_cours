<?php

use Adrien\Entity\SubjectEntity;
use Adrien\HTML\FormHTML;

$error = $name_error = $error_db = '';
$app->getAuth()->noConnect('admin');

if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
    header('Location: ?p=space.admin');
}

$subject = $app->getTable('Subject')->all(['id_subject'], [$_GET['id']], true);

if (isset($_POST['edit'])) {
    $datas = new SubjectEntity($_POST);

    if (!empty($datas->getAllError())) {
        $error = $datas->getAllError();
        $name_error = !empty($error['name_subject']) ? $error['name_subject'] : '';
    } else {
        try {
            $app->getTable('subject')->update($datas->getAllContent(), ['id_subject'], $_GET['id']);
            header('Location: ?p=edit.subject&id=' . $_GET['id']);
        } catch (Exception $e) {
            $error_db = 'Une erreur c\'est produite, veuillez reeesayer plus tard';
        }
    }
}

$formSubject = new FormHTML($subject);

require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'subject' . DIRECTORY_SEPARATOR . 'editSubject.php';