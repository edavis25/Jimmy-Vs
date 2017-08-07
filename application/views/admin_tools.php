<?php include_once 'header.php' ?>

<!-- Main view for admin tools homepage -->

<div class="admin-page-wrapper">
    <?php include_once 'admin-nav.php' ?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-3">Admin Tools</h1>
        </div>
    </div>

    <div class="alert alert-warning">
        <h4>Update &amp; edit the beer list</h4>
        <a href="<?php echo base_url('beer/edit_beers')?>" class="btn btn-warning">Edit Beers</a>
        <a href="<?php echo base_url('beer/print_list')?>" class="btn btn-warning">Print Beer List</a>
    </div>
    
    <div class="alert alert-info">
        <h4>Update &amp; edit menu items</h4>
        <a href="<?= base_url('menu/edit_menu')?>" class="btn btn-info">Menu Items</a>
    </div>
    
    <div class="alert alert-success">
        <h4>Update &amp; edit daily specials</h4>
        <a href="<?= base_url('special/edit_specials')?>" class="btn btn-success">Edit Specials</a>
    </div>
</div>

<?php include_once 'footer.php' ?>
