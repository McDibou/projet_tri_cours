<h1>Admin subjectt</h1>
<a class="btn btn-light" href="?p=insert.subject">Nouveau</a>
<?php

if (!empty($error_db)) {
    echo '<div class="text-center mx-auto font-weight-bold text-danger m-3">' . $error_db . '</div>';
}

echo $formSubject->startForm();
echo $formSubject->input('name_subject', 'Nom du sujet :', $name_error);
echo $formSubject->button('edit', 'Modifier le nom du sujet');
echo $formSubject->back('space.admin', 'Retour');
echo $formSubject->endForm();