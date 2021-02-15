<?php

if (!empty($error_db)) {
    echo '<div class="text-center mx-auto font-weight-bold text-danger m-3">' . $error_db . '</div>';
}

echo $formUser->startForm();
echo $formUser->input('name_user', 'Nom :', $name_error);
echo $formUser->input('username_user', 'Prenom', $username_error);
echo $formUser->mail('mail_user', 'Adresse mail :', $mail_error);
echo $formUser->input('pseudo_user', 'Pseudo :', $pseudo_error);
echo $formUser->button('modify', 'Modifier');
echo $formUser->endForm();

echo $formPassword->startForm();
echo $formPassword->password('validate_password', 'Ancien mot de passe :', $validate_password);
echo $formPassword->password('password_user1', 'Nouveau mot de passe :', $password_error1);
echo $formPassword->password('password_user2', 'Confirmer le mot de passe :', $password_error2);
echo $formPassword->button('modify', 'Modifier le mot de passe');
echo $formPassword->endForm();