<?php

if (!empty($error_db)) {
    echo '<div class="text-center mx-auto font-weight-bold text-danger m-3">' . $error_db . '</div>';
}

echo $formSubject->startForm();
echo $formSubject->input('name_subject', 'Nom du sujet :', $name_error);
echo $formSubject->button('insert', 'Ajouter un nouveau sujet');
echo $formSubject->back('space.admin', 'Retour');
echo $formSubject->endForm();