<?php

if (!empty($error_db)) {
    echo '<div class="text-center mx-auto font-weight-bold text-danger m-3">' . $error_db . '</div>';
}

echo $formContent->startForm();
echo $formContent->input('name_content', 'Titre :', $name_error);
echo $formContent->text('desc_content', 'Description :', $desc_error);
echo $formContent->input('link_content', 'Lien du site :', $link_error);
echo $formContent->select('category_id', 'Categorie :', $categories, $category_error);
echo $formContent->select('subject_id', 'Sujet :', $subjects, $subject_error);
echo $formContent->select('format_id', 'Formaty :', $formats, $format_error);
echo $formContent->button('insert', 'Ajouter un nouveau contenu');
echo $formContent->back('space.admin', 'Retour');
echo $formContent->endForm();