<!-- Include file for for editing menu items -->

<form action="<?=base_url('dish/update_add_dish')?>" method="POST">
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?= isset($dish) ? $dish->getName() : ''?>" class="form-control" required /> <br />
    
    <label for="type">Description:</label>
    <textarea name="description" class="form-control" required /><?= isset($dish) ? $dish->getDescription() : '' ?></textarea><br />
    
    <div class="col-sm-5 no-padding">
        <label for="price">Price:
            <a data-toggle="tooltip" data-html="true" title="Enter price <b>exactly</b> as you want it to appear in the menus."> 
                <i class="fa fa-info-circle" aria-hidden="true" class="info-icon"></i>
            </a>
        </label>    
        <input type="text" name="price" value="<?= isset($dish) ? $dish->getPrice() : ''?>" class="form-control" placeholder="x.xx" required/><br />
    </div>
    
    <div class="col-sm-5 col-sm-offset-1 no-padding">
        
        <label for="category">Category:</label>
        <select name="category" class="form-control" required>
            <?php 
                foreach($categories as $cat) {
                    if (isset($dish) && $cat->getId() == $dish->getCategory()) {
                        echo "<option value='{$cat->getId()}' selected='selected'>{$cat->getName()}</option>";
                    }
                    else {
                        echo "<option value='{$cat->getId()}'>{$cat->getName()}</option>";
                    }
                }
            ?>  
        </select>
        <br />
    </div>
    
    <input type="hidden" name="id" value="<?= isset($dish) ? $dish->getId() : ''?>" />
    
    <input type="submit" value="<?= isset($dish) ? 'Save Changes' : 'Add New Menu Item'?>" class="btn btn-success" />
</form>
