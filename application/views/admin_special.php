<?php include_once 'header.php' ?>

<!-- Main view for admin editing menu tools -->

<div class="admin-page-wrapper">
    <?php include_once 'admin-nav.php' ?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h2>Edit Daily Specials</h2>
        </div>
    </div>
    
    <!-- Add new special -->
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Add New Daily Special</h3>
        </div>
        <div class="panel-body">
           <?php include_once 'edit-special-form.php' ?>
        </div>
    </div>
    
    <!-- Edit Specials -->
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Edit Recurring Specials</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                <?php foreach($specials as $special) : ?>
                    
                    <tr>
                        <td><?=jddayofweek($special->getDay()-1, 1)?></td>
                        <td><?=$special->getDescription()?></td>
                        <td><?=$special->getPrice()?></td>
                        <td>
                            <!-- Edit Beer -->
                                <form class="edit-special inline">
                                    <input type="submit" class="btn btn-warning" value="Edit" data-toggle="modal" data-target="#edit-special" />
                                    <input type="hidden" name="special-id" value="<?= $special->getId() ?>" />
                                </form>
                            
                            <!-- Delete Special -->
                            <div class="delete-wrapper">
                                <a href="##" class="btn btn-danger delete-button">Delete</a>
                                <div class="confirm-delete" style="display: none;"> 
                                    <form action="<?= base_url('special/delete_special') ?>" method="POST" class="inline">
                                        <input type="submit" class="btn" value="yes" />
                                        <input type="hidden" name='delete-id' value="<?= $special->getId() ?>" />
                                    </form>
                                    /<a href="##" class="delete-button btn">no</a>
                                </div>
                            </div>
                            
                        </td>
                    </tr>
                <?php endforeach; ?>
                </table>
            </div>

        </div>
    </div>
    
    <!-- Modal for editing specific special -->
    <div id="edit-special" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <!-- This modal/div is populated with a view from an AJAX call -->
                    <div id="edit-special-modal-content"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include_once 'footer.php' ?>