<?php

if (!empty($error_db)) {
    echo '<div class="text-center mx-auto font-weight-bold text-danger m-3">' . $error_db . '</div>';
}

echo $formCategory->startForm();
echo $formCategory->input('name_category', 'Nom de la categerie :', $name_error);
echo $formCategory->button('insert', 'Ajouter une nouvelle categorie');
echo $formCategory->back('space.admin', 'Retour');
echo $formCategory->endForm();