<h1>Admin category</h1>
<a class="btn btn-light" href="?p=insert.category">Nouveau</a>
<?php

if (!empty($error_db)) {
    echo '<div class="text-center mx-auto font-weight-bold text-danger m-3">' . $error_db . '</div>';
}

echo $formFormat->startForm();
echo $formFormat->input('name_category', 'Nom de la categorie', $name_error);
echo $formFormat->button('edit', 'Modifier le nom de la categorie');
echo $formFormat->back('space.admin', 'Retour');
echo $formFormat->endForm();