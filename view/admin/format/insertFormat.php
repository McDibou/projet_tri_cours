<?php

if (!empty($error_db)) {
    echo '<div class="text-center mx-auto font-weight-bold text-danger m-3">' . $error_db . '</div>';
}

echo $formFormat->startForm();
echo $formFormat->input('name_format', 'Nom du format :', $name_error);
echo $formFormat->button('insert', 'Ajouter un nouveau format');
echo $formFormat->back('space.admin', 'Retour');
echo $formFormat->endForm();