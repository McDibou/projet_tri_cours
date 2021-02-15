<div class="error text-center mx-auto font-weight-bold text-danger m-3">Une erreur c'est produite, veuillez vous
    connecter
</div>
<div class="row">
    <?php if (empty($_GET['id_category'])) { ?>

        <div class="col-8">
            <?php foreach ($contentNotCategory as $content): ?>
                <?php readCard($content, $app); ?>
            <?php endforeach; ?>
        </div>

        <div class="col-3">
            <ul class="list-group">
                <li class="list-group-item text-right">Categories</li>
                <?php foreach ($categories as $scategory): ?>
                    <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                       href="?p=category.public&id.subject=<?= $scategory->id_subject ?>&id.category=<?= $scategory->id_category ?>">
                        <?= $scategory->name_category ?>
                        <span class="badge badge-light badge-pill"><?= $app->getTable('content')->count(['category_id', 'subject_id'], [$scategory->id_category, $scategory->id_subject]) ?></span>
                    </a>
                <?php endforeach; ?>
            </ul>
        </div>

    <?php } else { ?>

        <div class="col-8">
            <?php foreach ($contents as $content): ?>
                <?php readCard($content, $app); ?>
            <?php endforeach; ?>
        </div>

    <?php } ?>
</div>
