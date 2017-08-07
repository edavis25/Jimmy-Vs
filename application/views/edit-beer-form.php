<!-- Include file form for editing beer info -->

<form action="<?=base_url('beer/update_add_beer')?>" method="POST">
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?= isset($beer) ? $beer->getName() : '' ?>" class="form-control" required /> <br />
    
    <label for="type">Type:</label>
    <input type="text" name="type" value="<?= isset($beer) ? $beer->getType() : ''?>" class="form-control" required /><br />
    
    <div class="col-sm-4">
        <label for="price">Price:
            <a data-toggle="tooltip" data-html="true" title="Do <b>not</b> include dollar sign. Enter price as floating point number with 2 decimal places.<br />(example: 1.99)"> 
                <i class="fa fa-info-circle" aria-hidden="true" class="info-icon"></i>
            </a>
        </label>    
        <input type="text" name="price" value="<?= isset($beer) ? $beer->getPrice() : ''?>" class="form-control" placeholder="x.xx" required/><br />
    </div>
     
    <div class="col-sm-4">
        <label for="abv">ABV:
            <a data-toggle="tooltip" data-html="true" title="Do <b>not</b> include percentage sign. Enter price as floating point number with 1 decimal place.<br />(example: 4.5)"> 
                <i class="fa fa-info-circle" aria-hidden="true" class="info-icon"></i>
            </a>
        </label>

        <input type="text" name="abv" value="<?= isset($beer) ? $beer->getAbv() : ''?>" class="form-control" placeholder="x.x" required />
    </div>
    
    <div class="col-sm-4">
        <label for="category">Category:</label>
        <select name="category" class="form-control" required>
            <?php 
                foreach($categories as $cat) {
                    if (isset($beer) && $cat->getName() == $beer->getCategory()) {
                        echo "<option value='{$cat->getId()}' selected='selected'>{$cat->getName()}</option>";
                    }
                    else {
                        echo "<option value='{$cat->getId()}'>{$cat->getName()}</option>";
                    }
                }
            ?>  
        </select>
    </div>
    <br />
    <div class="col-xs-12">
        <input type="hidden" name="id" value="<?= isset($beer) ? $beer->getId() : ''?>" />
        <input type="submit" value="<?= isset($beer) ? 'Save Changes' : 'Add New Beer'?>" class="btn btn-success" />
    </div>

</form>

