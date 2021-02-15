<?php

use Adrien\Entity\UserEntity;
use Adrien\HTML\FormHTML;

$error = $name_error = $username_error = $mail_error = $pseudo_error = $password_error1 = $password_error2 = $pseudo_error = $password_error = $error_db = '';

$auth = $app->getAuth();
$auth->verifyRole($session->read('role'));
$key = md5(uniqid(rand(), true));

if (isset($_POST['connect'])) {
    $datas = new UserEntity($_POST);

    if (!empty($datas->getAllError())) {
        $error = $datas->getAllError();
        $pseudo_error = !empty($error['pseudo_user']) ? $error['pseudo_user'] : '';
        $password_error = !empty($error['password_user']) ? $error['password_user'] : '';
    } else {
        try {
            $user = $auth->login($_POST['pseudo_user'], $_POST['password_user']);

            $session->write('auth', $user->pseudo_user);
            $session->write('role', $user->name_role);
            $session->write('id', $user->id_user);

            header("Location: ./");
        } catch (Exception $e) {
            $error_db = 'Un problème est survenu, veuillez réesayer plus tard';
        }
    }
}

if (isset($_POST['registration'])) {
    $datas = new UserEntity($_POST);

    if (!empty($datas->getAllError())) {
        $error = $datas->getAllError();
        $name_error = !empty($error['name_user']) ? $error['name_user'] : '';
        $username_error = !empty($error['username_user']) ? $error['username_user'] : '';
        $mail_error = !empty($error['mail_user']) ? $error['mail_user'] : '';
        $pseudo_error = !empty($error['pseudo_user']) ? $error['pseudo_user'] : '';
        $password_error1 = !empty($error['password_user1']) ? $error['password_user1'] : '';
        $password_error2 = !empty($error['password_user2']) ? $error['password_user2'] : '';
    } else {
        try {
            $app->getTable('user')->insert($datas->getAllContent());
            $user = $app->getAuth()->login($_POST['pseudo_user'], $_POST['password_user1']);

            $session->write('auth', $user->pseudo_user);
            $session->write('role', $user->name_role);
            $session->write('id', $user->id_user);

            header("Location: ./");
        } catch (Exception $e) {
            $error_db = 'Un problème est survenu, veuillez réesayer plus tard';
        }
    }
}

$formUser = new FormHTML($_POST);
$formConnect = new FormHTML($_POST);

require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'global' . DIRECTORY_SEPARATOR . 'profil' . DIRECTORY_SEPARATOR . 'login.php';