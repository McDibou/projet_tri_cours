<?php

if (!empty($error_db)) {
    echo '<div class="text-center mx-auto font-weight-bold text-danger m-3">' . $error_db . '</div>';
}

echo $formConnect->startForm();
echo $formConnect->input('pseudo_user', 'Pseudo :', $pseudo_error);
echo $formConnect->password('password_user', 'Mot de passe :', $password_error);
echo $formConnect->button('connect', 'Connexion');
echo $formConnect->endForm();

echo $formUser->startForm();
echo $formUser->input('name_user', 'Nom :', $name_error);
echo $formUser->input('username_user', 'Prenom :', $username_error);
echo $formUser->mail('mail_user', 'Adresse mail :', $mail_error);
echo $formUser->input('pseudo_user', 'Pseudo :', $pseudo_error);
echo $formUser->password('password_user1', 'Mot de passe :', $password_error1);
echo $formUser->password('password_user2', 'Confirmer le mot de passe :', $password_error2);
echo $formUser->hidden('key_user', $key);
echo $formUser->hidden('active_user', 1);
echo $formUser->hidden('role_id', 2);
echo $formUser->button('registration', 'S\'inscrire');
echo $formUser->endForm();