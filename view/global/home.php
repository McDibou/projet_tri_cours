<div class="error text-center mx-auto font-weight-bold text-danger m-3">Une erreur c'est produite, veuillez vous
    connecter
</div>
<div class="row">
    <div class="col-8">
        <?php if (!empty($contents)) : ?>
            <?php foreach ($contents as $content): ?>
                <?php readCard($content, $app); ?>
            <?php endforeach; ?>
        <?php else : ?>
            <div>Vous n'avez pas de favoris</div>
        <?php endif; ?>
    </div>

    <div class="col-3">
        <ul class="list-group">

            <li class="list-group-item text-right">Categories</li>

            <?php foreach ($categories as $category): ?>
                <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                   href="?p=category.public&id.category=<?= $category->id_category ?>">
                    <?= $category->name_category ?>
                    <span class="badge badge-light badge-pill"><?= $app->getTable('content')->count(['category_id'], [$category->id_category]) ?></span>
                </a>
            <?php endforeach; ?>

            <li class="list-group-item text-right">Sujets</li>

            <?php foreach ($subjects as $subject): ?>
                <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                   href="?p=subject.public&id.subject=<?= $subject->id_subject ?>">
                    <?= $subject->name_subject ?>
                    <span class="badge badge-light badge-pill"><?= $app->getTable('content')->count(['subject_id'], [$subject->id_subject]) ?></span>
                </a>
            <?php endforeach; ?>
        </ul>
    </div>
</div>