<?php
if (isset($_GET['error']) && $_GET['error'] === 'ok') {
    echo '<div class="text-center mx-auto font-weight-bold text-danger m-3">vous ne pouvez pas supprimer ce champ il est asscociez à un article</div>';
}
if (isset($_GET['error']) && $_GET['error'] === 'article') {
    echo '<div class="text-center mx-auto font-weight-bold text-danger m-3">Vous ne pouvez pas supprimez cette article, il est en favorie</div>';
}
?>

<h1>Admin contenu</h1>
<a class="btn btn-light" href="?p=insert.content">Nouveau</a>

<table class="table">
    <thead>
    <tr>
        <td>Date</td>
        <td>Pseudo</td>
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
            <td><?= $content->pseudo_user ?></td>
            <td><?= $content->name_content ?></td>
            <td><?= $content->desc_content ?></td>
            <td><?= $content->link_content ?></td>
            <td><?= $content->name_subject ?></td>
            <td><?= $content->name_category ?></td>
            <td><?= $content->name_format ?></td>
            <td>
                <div>
                    <a class="btn btn-light" href="?p=edit.content&id=<?= $content->id_content ?>">Editer</a>
                    <a class="btn btn-light delete-confirm" href="?p=delete.content&id=<?= $content->id_content ?>">Supprimer</a>
                </div>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
</table>


<h1>Admin categories</h1>
<a class="btn btn-light" href="?p=insert.category">Nouveau</a>

<table class="table">
    <thead>
    <tr>
        <td>Nom</td>
        <td>Actions</td>

    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?= $category->name_category ?></td>
            <td>
                <div>
                    <a class="btn btn-light" href="?p=edit.category&id=<?= $category->id_category ?>">Editer</a>
                    <a class="btn btn-light delete-confirm" href="?p=delete.category&id=<?= $category->id_category ?>">Supprimer</a>
                </div>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
</table>

<h1>Admin sujet</h1>
<a class="btn btn-light" href="?p=insert.subject">Nouveau</a>

<table class="table">
    <thead>
    <tr>
        <td>Nom</td>
        <td>Actions</td>

    </tr>
    </thead>
    <tbody>
    <?php foreach ($subjects as $subject) : ?>
        <tr>
            <td><?= $subject->name_subject ?></td>
            <td>
                <div>
                    <a class="btn btn-light" href="?p=edit.subject&id=<?= $subject->id_subject ?>">Editer</a>
                    <a class="btn btn-light delete-confirm" href="?p=delete.subject&id=<?= $subject->id_subject ?>">Supprimer</a>
                </div>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
</table>

<h1>Admin format</h1>
<a class="btn btn-light" href="?p=insert.format">Nouveau</a>

<table class="table">
    <thead>
    <tr>
        <td>Nom</td>
        <td>Actions</td>

    </tr>
    </thead>
    <tbody>
    <?php foreach ($formats as $format) : ?>
        <tr>
            <td><?= $format->name_format ?></td>
            <td>
                <div>
                    <a class="btn btn-light" href="?p=edit.format&id=<?= $format->id_format ?>">Editer</a>
                    <a class="btn btn-light delete-confirm" href="?p=delete.format&id=<?= $format->id_format ?>">Supprimer</a>
                </div>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
</table>
