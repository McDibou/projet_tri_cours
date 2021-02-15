<?php
if (isset($_GET['error']) && $_GET['error'] === 'ok') {
    echo '<div class="text-center mx-auto font-weight-bold text-danger m-3">Vous ne pouvez pas supprimer ce champ il est asscociez à un article</div>';
}
?>
<h1>User contenu</h1>
<a class="btn btn-light" href="?p=insert.content.user">Nouveau</a>

<table class="table">
    <thead>
    <tr>
        <td>Date</td>
        <td>Titre</td>
        <td>Description</td>
        <td>URL</td>
        <td>Sujet</td>
        <td>Categorie</td>
        <td>Format</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($contents as $content) : ?>
        <tr>
            <td><?= $content->date_content ?></td>
            <td><?= $content->name_content ?></td>
            <td><?= $content->desc_content ?></td>
            <td><?= $content->link_content ?></td>
            <td><?= $content->name_subject ?></td>
            <td><?= $content->name_category ?></td>
            <td><?= $content->name_format ?></td>
            <td>
                <div>
                    <a class="btn btn-light" href="?p=edit.content.user&id=<?= $content->id_content ?>">Editer</a>
                    <a class="btn btn-light delete-confirm"
                       href="?p=delete.content.user&id=<?= $content->id_content ?>">Delete</a>
                </div>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
</table>