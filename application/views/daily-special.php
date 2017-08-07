<?php if ($special->getDescription()) : ?>
<section id="daily-special">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 bg-primary">
                <h3><?=date('l')?>'s Special</h3>
                <p>
                    <?=nl2br($special->getDescription())?><br />
                    <i class="float-right"><?=$special->getPrice()?>&nbsp;<span class="smaller">*dine-in only</span></i>
                    <br />
                </p>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
