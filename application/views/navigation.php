<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a id="top-left-logo" class="navbar-brand page-scroll" href="#page-top">Jimmy V's<br /><span class="smaller">German Village</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="click-close">
                    <a class="page-scroll" href="#portfolio">Menu</a>
                </li>
                <li class="dropdown" id="stop-close">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Delivery<span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><a href="https://www.ubereats.com/stores/b1c86c07-36b0-4457-8692-2a0135d325d0/?section=f16ef152-3baa-4006-a95c-201f1a30bea3">Uber Eats</a></li>
                        <li><a href="https://www.grubhub.com/restaurant/jimmy-vs-912-s-high-st-columbus/378244">GrubHub</a></li>
                    </ul>
                </li>
                <li class="click-close">
                    <a class="page-scroll" href="#contact">Contact</a>
                </li>
                <li class="click-close">
                    <a class="page-scroll" href="#about">About</a>
                </li>
                <?php 
                    if ($this->session->loggedin) {
                        echo '<li><a href="'.base_url('admin').'">Admin Tools</a></li>';
                        echo '<li><a href="'.base_url('logout').'">Logout</a></li>';
                    }
                ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
