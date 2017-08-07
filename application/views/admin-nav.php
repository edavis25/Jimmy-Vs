<!-- Include file for Admin navigation bar -->

<nav id="admin-nav" class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo base_url() ?>admin">Admin Tools</a></li>
                <li><a href="<?php echo base_url() ?>">View Site</a></li>
                <li><a href="<?php echo base_url() ?>logout">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>