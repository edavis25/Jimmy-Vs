<?php $idx = 0; ?>
<?php foreach ($currentDishType as $dish) : ?>

    <!-- 2 items for each row. Create a new row if counter is even -->
    <?php if ($idx % 2 == 0) { echo "<div class='row'>"; } ?>
    <div class="container-fluid col-md-6">
        <div class="well well-sm menu-well">
            <b class="red"><?= $dish -> getName() ?></b><br />
            <?= html_entity_decode($dish -> getDescription()) ?><br />
            <i class="menu-price"><?= $dish -> getPrice() ?></i>
        </div>
    </div>
    <?php $idx += 1; ?>
    <!-- End row div if even (note: called after increment) -->
    <?php if ($idx % 2 == 0) { echo '</div>'; } ?>
    
<?php endforeach; ?>

<!-- End row div if loop ends on odd number of items -->
<?php if ($idx % 2 != 0) { echo '</div>'; } ?>