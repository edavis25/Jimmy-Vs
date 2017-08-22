<div>
    <?php if (isset($errors)) : ?>
        <i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i>
        <br>
        <?php foreach ($errors as $error) : ?>
            <?= $error ?>
            <br>
        <?php endforeach; ?>
    <?php endif; ?>
</div>