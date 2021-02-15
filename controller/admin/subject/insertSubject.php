<?php

use Adrien\Entity\SubjectEntity;
use Adrien\HTML\FormHTML;

$error = $name_error = $error_db = '';
$app->getAuth()->noConnect('admin');

if (isset($_POST['insert'])) {
    $datas = new SubjectEntity($_POST);
    if (!empty($datas->getAllError())) {
        $error = $datas->getAllError();
        $name_error = !empty($error['name_subject']) ? $error['name_subject'] : '';
    } else {
        try {
            $app->getTable('subject')->insert($datas->getAllContent());
            header('Location: ?p=edit.subject&id=' . $app->getDatabase()->lastId());
        } catch (Exception $e) {
            $error_db = 'Une erreur c\'est produite, veuillez reeesayer plus tard';
        }
    }
}

$formSubject = new FormHTML($_POST);

require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'subject' . DIRECTORY_SEPARATOR . 'insertSubject.php';