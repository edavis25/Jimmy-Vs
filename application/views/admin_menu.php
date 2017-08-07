<?php include_once 'header.php' ?>

<!-- Main view for admin editing menu tools -->

<div class="admin-page-wrapper">
    <?php include_once 'admin-nav.php' ?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h2>Manage Menu</h2>
        </div>
    </div>

    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Add New Menu Item</h3>
        </div>
        <div class="panel-body">
            <?php include_once 'edit-menu-form.php' ?>
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Manage Menu Items</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered sortable">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dishes as $dish) : ?>
                            <tr>
                                <td><?= $dish->getName() ?></td>
                                <td><?= $dish->getDescription() ?></td>
                                <td><?= $dish->getPrice() ?></td>
                                <td><?= $dish->getCategory() ?></td>
                                <td style="white-space: nowrap;">
                                    <!-- Edit Dish -->
                                    <form class="edit-dish inline">
                                        <input type="submit" class="btn btn-warning" value="Edit" data-toggle="modal" data-target="#edit-dish" />
                                        <input type="hidden" name="dish-id" value="<?= $dish->getId() ?>" />
                                    </form>

                                    <!-- Delete Dish -->
                                    <div class="delete-wrapper">
                                        <a href="##" class="btn btn-danger delete-button">Delete</a>
                                        <div class="confirm-delete" style="display: none;"> 
                                            <form action="<?= base_url('dish/delete_dish') ?>" method="POST" class="inline">
                                                <input type="submit" class="btn" value="yes" />
                                                <input type="hidden" name='delete-id' value="<?= $dish->getId() ?>" />
                                            </form>
                                            /<a href="##" class="delete-button btn">no</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>


    <!-- Modal -->
    <div id="edit-dish" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <!-- This modal/div is populated with a view from an AJAX call -->
                    <div id="edit-dish-modal-content"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>



</div>

<?php include_once 'footer.php' ?>
