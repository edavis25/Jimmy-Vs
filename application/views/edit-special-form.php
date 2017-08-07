<!-- Include file for for editing daily specials -->

<form action="<?=base_url('special/update_add_special')?>" method="POST" class="container-fluid">
    <!-- Description input -->
    <div class="row">
        <label for="description">Description:</label>
        <textarea name="description" class="form-control" required /><?= isset($special) ? $special->getDescription() : '' ?></textarea><br />
    </div>
    
    <!-- Price input -->
    <div class="row">
        <div class="col-sm-3 no-padding">
            <label for="price">Price:
                <a data-toggle="tooltip" data-html="true" title="Do <b>not</b> include dollar sign. Enter price exactly as you want it to appear otherwise."> 
                    <i class="fa fa-info-circle" aria-hidden="true" class="info-icon"></i>
                </a>
            </label>
            <input type="text" name="price" value="<?= isset($special) ? $special->getPrice() : '' ?>" class="form-control" /><br />
        </div>

        <!-- Day of week input -->
        <div class="col-sm-3 col-sm-offset-1 no-padding">
            <label for="day">Day:</label>
            <select name="day" class="form-control" required>
                <?php
                for ($i = 0; $i < 7; $i++) {
                    if (isset($special) && $special->getDay() == $i) {
                        echo "<option value='$i' selected='selected'>" . jddayofweek($special->getDay() - 1, 1) . "</option>";
                    } 
                    else {
                        echo "<option value='$i'>" . jddayofweek($i - 1, 1) . "</option>";
                    }
                }
                ?>  
            </select>
        </div>
        
        <!-- Recurring input -->
        <div class="col-sm-3 col-sm-offset-1 no-padding">
            <br />
            <?php if(isset($special) && $special->getRecurring()) : ?>
                <input type="checkbox" name="recurring" checked="checked">&nbsp;&nbsp;
                <label for="recurring">Recurring?
                    <a data-toggle="tooltip" data-html="true" title="Check only for permanent recurring specials."> 
                        <i class="fa fa-info-circle" aria-hidden="true" class="info-icon"></i>
                    </a>
                </label>
            <?php else: ?>
                <input type="checkbox" name="recurring">&nbsp;&nbsp;
                <label for="recurring">Recurring?
                    <a data-toggle="tooltip" data-html="true" title="Check only for permanent recurring specials."> 
                        <i class="fa fa-info-circle" aria-hidden="true" class="info-icon"></i>
                    </a>
                </label>
            <?php endif; ?>
        </div>
    </div>
    <br />
    <input type="hidden" name="id" value="<?= isset($special) ? $special->getId() : '' ?>" />

    <input type="submit" value="<?= isset($special) ? 'Save Changes' : 'Add New Special' ?>" class="btn btn-success" />

</form>