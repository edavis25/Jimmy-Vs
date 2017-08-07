<?php include_once 'header.php' ?>

<!-- Main view for admin editing beer tools -->

<div class="admin-page-wrapper">
    <?php include_once 'admin-nav.php' ?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h2>Manage Beer List</h2>
        </div>
    </div>

    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Add New Beer</h3>
        </div>
        <div class="panel-body">
            <?php include_once 'edit-beer-form.php' ?>
        </div>
    </div>


    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Manage Beers</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered sortable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>ABV</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($beers as $beer) : ?>
                            <tr>
                                <td><?= $beer->getName() ?></td>
                                <td><?= $beer->getType() ?></td>
                                <td>$<?= $beer->getPrice() ?></td>
                                <td><?= $beer->getAbv() ?>%</td>
                                <td><?= $beer->getCategory() ?></td>
                                <td>
                                    <!-- Edit Beer -->
                                    <form id="test-form" class="edit-beer inline">
                                        <input type="submit" class="btn btn-warning" value="Edit" data-toggle="modal" data-target="#edit-beer" />
                                        <input type="hidden" name="beer-id" value="<?= $beer->getId() ?>" />
                                    </form>

                                    <!-- Delete Beer -->
                                    <div class="delete-wrapper">
                                        <a href="##" class="btn btn-danger delete-button">Delete</a>
                                        <div class="confirm-delete" style="display: none;"> 
                                            <!-- a href=""> yes</a-->
                                            <form action="<?= base_url('beer/delete_beer') ?>" method="POST" class="inline">
                                                <input type="submit" class="btn" value="yes" />
                                                <input type="hidden" name='delete-id' value="<?= $beer->getId() ?>" />
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
    <div id="edit-beer" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <!-- This modal/div is populated with a view from an AJAX call -->
                    <div id="edit-beer-modal-content"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>




</div>



<?php include_once 'footer.php' ?>
