<div class="error text-center mx-auto font-weight-bold text-danger m-3">Une erreur c'est produite, veuillez vous
    connecter
</div>
<div class="row">
    <?php if (empty($_GET['id_subject'])) { ?>
        <div class="col-8">
            <?php foreach ($contentNotSubject as $content): ?>
                <?php readCard($content, $app); ?>
            <?php endforeach; ?>
        </div>

        <div class="col-3">
            <ul class="list-group">
                <li class="list-group-item text-right">Sujets</li>
                <?php foreach ($subjects as $subject): ?>
                    <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                       href="?p=subject.public&id.category=<?= $subject->id_category ?>&id.subject=<?= $subject->id_subject ?>">
                        <?= $subject->name_subject ?>
                        <span class="badge badge-light badge-pill"><?= $app = $app->getTable('Content')->count(['category_id', 'subject_id'], [$subject->id_category, $subject->id_subject]) ?></span>
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