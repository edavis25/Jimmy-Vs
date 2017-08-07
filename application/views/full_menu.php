<!-- Appetizers -->
<div class="">
    <div class="panel-group">
        <div class="panel panel-default">
            <a data-toggle="collapse" href="#app-collapse">
                <div class="panel-heading">
                    <h2 class="panel-title">
                        <span class="roman larger">A</span>ppetizers<span class="glyphicon glyphicon-plus float-right v-center"></span>
                    </h2>
                </div>
            </a>
            <div id="app-collapse" class="panel-collapse collapse">
                <div class="panel-body">
                    <!-- Sets global variable to flag the desired dish type used in the include view. After changing the dish, 
                        load the menu-category view to display all the items & descriptions (pattern repeated throughout...DRY) --> 
                    <?php 
                        $currentDishType = $appetizers; 
                        include 'menu-category.php';
                    ?>
                        
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Salads & Soups -->
<div class="">
    <div class="panel-group">
        <div class="panel panel-default ">
            <a data-toggle="collapse" href="#salad-collapse" class="">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <span class="roman larger">S</span>alads &amp; <span class="roman larger">S</span>oups<span class="glyphicon glyphicon-plus float-right"></span>
                    </h4>
                </div>
            </a>
            <div id="salad-collapse" class="panel-collapse collapse">
                <div class="panel-body">
                    <p class="special-menu-info">
                        <i>
                            <b>Add to any salad:</b> Grilled Chicken, Southwestern Chicken, Gyro Meat 3.79 / Shrimp 6.99 / Salmon 7.99<br />
                            <b>Dressings:</b> House, Housemade Bleu Cheese, Ranch, Italian, Thousand Island, Honey Mustard, Caesar
                        </i>
                    </p>
                    <?php 
                        $currentDishType = $salads; 
                        include 'menu-category.php';
                        $currentDishType = $soups;
                        include 'menu-category.php';                        
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Gyros -->
<div class="">
    <div class="panel-group">
        <div class="panel panel-default ">
            <a data-toggle="collapse" href="#gyro-collapse" class="">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <span class="roman larger">G</span>yros<span class="glyphicon glyphicon-plus float-right"></span>
                    </h4>
                </div>
            </a>
            <div id="gyro-collapse" class="panel-collapse collapse">
                <div class="panel-body">
                    <?php 
                        $currentDishType = $gyros; 
                        include 'menu-category.php';               
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Sandwiches -->
<div class="">
    <div class="panel-group">
        <div class="panel panel-default ">
            <a data-toggle="collapse" href="#sandwich-collapse" class="">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <span class="roman larger">S</span>andwiches<span class="glyphicon glyphicon-plus float-right"></span>
                    </h4>
                </div>
            </a>
            <div id="sandwich-collapse" class="panel-collapse collapse">
                <div class="panel-body">
                    <?php 
                        $currentDishType = $sandwiches; 
                        include 'menu-category.php';               
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Burgers -->
<div class="">
    <div class="panel-group">
        <div class="panel panel-default ">
            <a data-toggle="collapse" href="#burger-collapse" class="">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <span class="roman larger">B</span>urgers<span class="glyphicon glyphicon-plus float-right"></span>
                    </h4>
                </div>
            </a>
            <div id="burger-collapse" class="panel-collapse collapse">
                <div class="panel-body">
                    <p class="special-menu-info">
                        <i>
                           Add bacon 1.49 or fried egg 1.29
                        </i>
                    </p>
                    <?php 
                        $currentDishType = $burgers; 
                        include 'menu-category.php';               
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Paninis -->
<div class="">
    <div class="panel-group">
        <div class="panel panel-default ">
            <a data-toggle="collapse" href="#panini-collapse" class="">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <span class="roman larger">P</span>aninis<span class="glyphicon glyphicon-plus float-right"></span>
                    </h4>
                </div>
            </a>
            <div id="panini-collapse" class="panel-collapse collapse">
                <div class="panel-body">
                    <?php 
                        $currentDishType = $paninis; 
                        include 'menu-category.php';       
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pastas -->
<div class="">
    <div class="panel-group">
        <div class="panel panel-default ">
            <a data-toggle="collapse" href="#pasta-collapse" class="">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <span class="roman larger">P</span>astas<span class="glyphicon glyphicon-plus float-right"></span>
                    </h4>
                </div>
            </a>
            <div id="pasta-collapse" class="panel-collapse collapse">
                <div class="panel-body">
                    <p class="special-menu-info">
                        <i>
                            Served with your choice of side salad or cup of soup.
                        </i>
                    </p>
                    <?php 
                        $currentDishType = $pastas; 
                        include 'menu-category.php';               
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Specialties & Platters -->
<div class="">
    <div class="panel-group">
        <div class="panel panel-default ">
            <a data-toggle="collapse" href="#special-collapse" class="">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <span class="roman larger">P</span>latters<span class="glyphicon glyphicon-plus float-right"></span>
                    </h4>
                </div>
            </a>
            <div id="special-collapse" class="panel-collapse collapse">
                <div class="panel-body">
                    <p class="special-menu-info">
                        <i >
                            Served with your choice of fresh-cut fries or lemon potatoes.
                        </i>
                    </p>
                    <?php 
                        $currentDishType = $platters; 
                        include 'menu-category.php';               
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Brunch -->
<div class="">
    <div class="panel-group">
        <div class="panel panel-default ">
            <a data-toggle="collapse" href="#brunch-collapse" class="">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <span class="roman larger">B</span>runch<span class="glyphicon glyphicon-plus float-right"></span>
                    </h4>
                </div>
            </a>
            <div id="brunch-collapse" class="panel-collapse collapse">
                <div class="panel-body">
                    <p class="special-menu-info">
                        <i >
                            Brunch served Saturday &amp; Sunday until 1pm
                        </i>
                    </p>
                    <?php 
                        $currentDishType = $brunch; 
                        include 'menu-category.php';               
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

