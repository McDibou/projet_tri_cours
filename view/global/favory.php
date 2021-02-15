<div class="row">

    <div class="col-8">
        <?php if (!empty($favories)) : ?>
            <?php foreach ($favories as $favory): ?>
                <?php readCard($favory, $app); ?>
            <?php endforeach; ?>
        <?php else : ?>
            <div>Vous n'avez pas de favoris</div>
        <?php endif; ?>
    </div>

</div>