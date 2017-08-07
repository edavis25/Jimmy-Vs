<?php include_once 'header.php' ?>

<div class="admin-page-wrapper">
    <a href="<?php echo base_url()?>index.php" id="home-link">Return Home</a>
    <h1>Login</h1>
    <br />
    <?php echo validation_errors(); ?>
    <form action="<?php echo base_url('login/user_login')?>" method="POST">
        <label for="username" class="form-text">Username:</label><br />
        <input type="text" name="username" id="username" class="form-control" /><br />
        <label for="password" class="form-text">Password:</label><br />
        <input type="password" name="password" id="password" class="form-control" /><br /><br />
        <input type="submit" id="login-submit" value="Login" class="btn btn-success" /><br />
    </form>
</div>

<?php include_once 'footer.php' ?>