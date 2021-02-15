<h1>Admin format</h1>
<a class="btn btn-light" href="?p=insert.format">Nouveau</a>
<?php

if (!empty($error_db)) {
    echo '<div class="text-center mx-auto font-weight-bold text-danger m-3">' . $error_db . '</div>';
}

echo $formFormat->startForm();
echo $formFormat->input('name_format', 'Nom du format :', $name_error);
echo $formFormat->button('edit', 'Modifier le nom du format');
echo $formFormat->back('space.admin', 'Retour');
echo $formFormat->endForm();