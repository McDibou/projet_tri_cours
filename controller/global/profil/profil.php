<?php

use Adrien\Entity\UserEntity;
use Adrien\HTML\FormHTML;

$error = $name_error = $username_error = $mail_error = $pseudo_error = $validate_password = $password_error1 = $password_error2 = '';
$user = $app->getTable('user')->all(['id_user'], [$_SESSION['id']], true);

if (isset($_POST['name_user'])) {
    $datas = new UserEntity($_POST);
    $error = $datas->getAllError();
    if (!empty($error)) {
        $name_error = !empty($error['name_user']) ? $error['name_user'] : '';
        $username_error = !empty($error['username_user']) ? $error['username_user'] : '';
        $mail_error = !empty($error['mail_user']) ? $error['mail_user'] : '';
        $pseudo_error = !empty($error['pseudo_user']) ? $error['pseudo_user'] : '';
    } else {
        try {
            $app->getTable('user')->update($datas->getAllContent(), ['id_user'], $_SESSION['id']);
            header('Location: ?p=profil.user');
        } catch (Exception $e) {
            $error_db = 'Un problème est survenu, veuillez réesayer plus tard';
        }
    }
}

if (isset($_POST['validate_password'])) {
    $datas = new UserEntity($_POST);
    if (password_verify($_POST['validate_password'], $user->password_user)) {
        $error = $datas->getAllError();
        if (!empty($error)) {
            $password_error1 = !empty($error['password_user1']) ? $error['password_user1'] : '';
            $password_error2 = !empty($error['password_user2']) ? $error['password_user2'] : '';
        } else {
            try {
                $app->getTable('user')->update($datas->getAllContent(), ['id_user'], $_SESSION['id']);
                header('Location: ?p=profil.user');
            } catch (Exception $e) {
                $error_db = 'Un problème est survenu, veuillez réesayer plus tard';
            }
        }
    } else {
        $validate_password = 'Le mot de passe n\'est pas valide';
    }
}

$formUser = new FormHTML($user);
$formPassword = new FormHTML($_POST);

require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'global' . DIRECTORY_SEPARATOR . 'profil' . DIRECTORY_SEPARATOR . 'profil.php';