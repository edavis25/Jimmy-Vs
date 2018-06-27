<?php include_once 'header.php' ?>

<?php include_once 'navigation.php' ?>

<!-- Main Header -->
<header>
    <div class="header-content" id="main-heading">
        <div class="header-content-inner">
            <img src="img/jimmy-logo1.png" class="img img-responsive center-block" id="jimmy-logo" />
            <!-- h1 id="homeHeading"><span class="red greek">Jimmy V'<span class="smaller">s</span></span>
                <br />
                <span class="text-muted sub-heading roman">GERMAN VILLAGE</span>
            </h1 -->
            <hr>
            <h3> 912 S. High St. &bull; Columbus, OH &bull; (614)445-9090 </h3>
            <!-- Optional buttons for menu quick link button in the main heading area (currently removed) -->
            <!-- a href="#portfolio" class="btn btn-primary btn-xl page-scroll">Menu</a -->
            <!-- a href="##" data-toggle="modal" data-target="#menu-modal" class="btn btn-primary btn-xl page-scroll">Menu</a -->
        </div>
    </div>
</header>


<!-- Hours & Delivery Services -->
<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading"> Dine-in &bull; Takeout &bull; Delivery <a data-toggle="tooltip" title="All deliveries handled by 3rd-party services listed below!"> <i class="fa fa-info-circle" aria-hidden="true" class="info-icon" id="info-icon"></i> </a></h2>
                <hr class="primary">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-calendar text-primary sr-icons" id="hours-icon"></i>
                    <h3>Hours of Operation</h3>
                    <ul id="hours-list">
                        <li>
                            <b>Bar Hours</b><br />
                            Mon-Fri: 11am-2am<span class="smaller">*</span><br />
                            Sat &amp; Sun: 12pm-2am<span class="smaller">*</span>
                        </li>
                        <li>
                            <em class="smaller">*Kitchen closes at 12am</em>
                            <!-- Sat &amp; Sun Brunch: 10am-3pm -->
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="service-box">
                    <img src="img/grubhub1.jpg" id="grubhub" class="logo" class="img-responsive sr-img" />
                    <h3>Find us on <a href="https://www.grubhub.com/restaurant/jimmy-vs-912-s-high-st-columbus/378244" target="_blank">GrubHub!</a></h3>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="service-box">
                    <img src="img/ubereats.jpg" class="logo" id="ubereats" />
                    <h3>Now on <a href="https://www.ubereats.com/stores/b1c86c07-36b0-4457-8692-2a0135d325d0/?section=f16ef152-3baa-4006-a95c-201f1a30bea3">Uber Eats!</a></h3>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-glass text-primary sr-icons" id="happy-hour-icon"></i>
                    <h3>Happy Hour</h3>
                    <p class="larger-12x">
                        Mon-Fri: 2pm-6pm <br />
                        <span class="smaller">
                            Food &amp; Drink Specials
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Food Images/Menu -->
<section class="no-padding" id="portfolio">
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="col-md-4">
                <i class="fa fa-hand-pointer-o" aria-hidden="true" id="identify-click"></i>
                
                <a class="portfolio-box center-block" id="beer-container"><img src="img/beer-525x350.png" class="img img-responsive center-block" />
                    
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                <h3><b>Rotating Drafts:</b></h3>
                            </div>
                            <div class="project-name">
                                <?php if (isset($beers['drafts'])) : ?>
                                    <?php foreach($beers['drafts'] as $beer) : ?>
                                        <b class="hover-beer-name"><?= $beer->name ?></b>
                                        <i class="hidden-xs hover-beer-brewery"><?= $beer->brewery ?></i>
                                        <br>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <?php include 'errors.php' ?>
                                <?php endif; ?>

                            </div>
                        </div>
                        
                    </div>
                    
                </a>
                
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="row">
                    <div class="container-fluid">
                        <a class="portfolio-box center-block"> <img src="img/jimmy-gyro-525x350.jpg" class="img-responsive" alt="">
                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        <!-- Gyros &amp; Greek Cuisine -->
                                        <h3>Traditional Gyro with chips</h3>
                                    </div>
                                    <div class="project-name">
                                        Freshly roasted gyro meat, crumbled feta cheese, lettuce, tomato, onion, and creamy tzatziki sauce.
                                        <br />$6.99
                                    </div>
                                </div>
                            </div> 
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="container-fluid">
                        <a class="portfolio-box center-block"> <img src="img/jimmy-pasta-525x350.jpg" class="img-responsive" alt="">
                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        <h3>Traditional Albanian Linguini</h3>
                                    </div>
                                    <div class="project-name">
                                        Red onions, black olives, spinach, tomatoes, and feta tossed in extra virgin olive oil.
                                        <br />$12.99
                                    </div>
                                </div>
                            </div> 
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="row">
                    <div class="container-fluid">
                        <a class="portfolio-box center-block"> <img src="img/jimmy-salad-525x350.jpg" class="img-responsive" alt="">
                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        <h3>Gyro Salad</h3>
                                    </div>
                                    <div class="project-name">
                                        Gyro meat, lettuce, tomato, cucumbers, olives, onion, feta cheese, with a side of tzatziki.
                                        <br />$9.99
                                    </div>
                                </div>
                            </div> 
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="container-fluid">
                        <a class="portfolio-box center-block" > <img src="img/jimmy-burger-525x350.jpg" class="img-responsive" alt="">
                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        <h3>All-American Burger</h3>
                                    </div>
                                    <div class="project-name">
                                        8oz. of ground beef grilled to order! $8.49
                                        <br />Add bacon $1.49 or fried egg $1.29!
                                    </div>
                                </div>
                            </div> 
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- View Menu -->
<aside class="bg-dark">
    <div class="container text-center">
        <div class="call-to-action">
            <h2>View Full Menus!</h2>
            <!--input type="button" class="btn btn-default btn-xl sr-button" data-toggle="modal" data-target="#menu-modal" value="View Menu" id="full-menu-btn" /-->
            <button class="btn btn-default btn-xl sr-button" data-toggle="modal" data-target="#menu-modal" id="full-menu-btn"><i class="fa fa-map btn-icon" aria-hidden="true"></i> Full Menu</button>
            <!--input type="button" class="btn btn-default btn-xl sr-button" data-toggle="modal" data-target="#beer-modal" value="View Drink List" id="full-menu-btn" / -->
            <button class="btn btn-default btn-xl sr-button" data-toggle="modal" data-target="#beer-modal" id="drink-list-btn"><i class="fa fa-beer btn-icon" aria-hidden="true" id="beer-icon" ></i> Drink List</button>
        </div>
    </div>
</aside>

<!-- Daily Special -->
<?php include 'daily-special.php'; ?>

<!-- Contact Info -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="section-heading">Contact Us!</h2>
                <hr class="primary">
                <p>
                   
                </p>
            </div>
            <div class="col-lg-4 col-lg-offset-2 text-center">
                <i class="fa fa-phone fa-3x sr-contact"></i>
                <p>
                    (614)445-9090
                </p>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                <p>
                    <a href="mailto:feedback@jimmyvspub.com">feedback@jimmyvspub.com</a>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- About Us -->
<section class="bg-primary" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="section-heading">About Us</h2>
                <hr class="light">
                <p class="text-faded">
                    Welcome to Jimmy V's Grill &amp; Pub! Offering age-old tradition and timeless recipes that have been passed down through generations,
                    the restaurant successfully combines cuisine and atmosphere to create a dining experience that won't soon be forgotten.
                    The menu is vast and impressive showcasing both traditional specialties as well as modern adaptations. There is something here
                    sure to tempt every palate even the most discriminating of gourmets!
                    <br />
                    No matter what the occasion calls for or your appetite demands, the friendly staff at Jimmy V's Grill & Pub promises to make your next dining experience truly unforgettable.
                </p>
                <!-- a href="#services" class="page-scroll btn btn-default btn-xl sr-button">Get Started!</a -->
                <a href="https://www.facebook.com/jimmyvspub/" target="_blank"><i class="fa fa-4x fa-facebook-official white sr-icons social-media-icon"></i></a>
                <a href="https://www.instagram.com/jimmyvspub_germanvillage/" target="_blank"><i class="fa fa-4x fa-instagram white sr-icons social-media-icon"></i></a>
            </div>
        </div>
    </div>
</section>

<section id="events">
    <div class="container" id="promo-logos">
        <div class="row">
            <div class="container col-lg-8 col-lg-offset-2 text-center">
                <div class="row">
                    <img src="<?= base_url('img/st-patricks.jpg') ?>" class="img-responsive center-block" style="max-height: 425px; width: auto;" />
                </div>
                <br /><br /><br />
                <div class="row">
                    <img src="img/browns-backers.png" alt="Browns backers logo" class="img img-responsive sr-button" id="browns-backers-img" />
                    <h3>Home of the official Brewery District Browns Backers!</h3>
                    <a href="http://brownsbackerscolumbus.com/" target="_blank">Upcoming Events</a>
                </div>
                <br /><br /><br />
                <div class="row">
                    <i class="fa fa-8x fa-commenting-o red sr-button" aria-hidden="true"></i>
                    <h3>Join us for stand-up comedy provided by <a href="https://elandagal.com/" target="_blank">El &amp; a Gal Entertainment</a> every Tuesday night from 8pm-10pm!</h3>
                </div>
                <br /><br /><br />
                <div class="row">
                    <img src="<?= base_url('img/untappd-badge1.jpg') ?>" alt="Verified Untappd venue badge." class="img img-responsive center-block sr-button" id="untappd-img" />
                    <h3>Drink socially with <a href="https://untappd.com/v/jimmy-vs-grill-and-pub/28629" target="_blank">us!</a></h3>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Menu Modal -->
<div id="menu-modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title roman">JIMMY V's - Full Menu</h4>
            </div>
            <div class="modal-body">
                <!-- This div/content is populated from an AJAX call -->
                <div id="full-menu-div"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Beer List Modal -->
<div id="beer-modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title roman">JIMMY V's - Craft Beer List</h4>
            </div>
            <div class="modal-body">

                <!-- Drafts panel -->
                <div class="panel-group">
                    <div class="panel panel-default">
                        <a data-toggle="collapse" href="#draft-collapse">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <span class="roman larger">D</span>rafts<span class="glyphicon glyphicon-minus float-right v-center"></span>
                                </h2>
                            </div>
                        </a>
                        <div id="draft-collapse" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <?php if (isset($beers['drafts'])) : ?>
                                    <?php foreach($beers['drafts'] as $beer) : ?>
                                        <div class="container col-md-6">
                                            <img src="<?= $beer->icon ?>" alt="<?= $beer->name ?> logo" class="img img-responsive beer-logo" />
                                            <span class="beer-name"><?= $beer->name ?></span>
                                            <i class="beer-type"><?= $beer->type ?></i>
                                            <div class="beer-details">
                                                <?= $beer->location ?>
                                                &bull;
                                                <?= $beer->abv ?>%
                                                &bull;
                                                <?= $beer->brewery ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <?php include 'errors.php' ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div> <!-- /End drafts panel  -->

                <!-- Bottles and cans panel -->
                <div class="panel-group">
                    <div class="panel panel-default">
                        <a data-toggle="collapse" href="#bottles-collapse">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <span class="roman larger">B</span>ottles &amp; <span class="roman larger">C</span>ans<span class="glyphicon glyphicon-minus float-right v-center"></span>
                                </h2>
                            </div>
                        </a>
                        <div id="bottles-collapse" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <?php if (isset($beers['bottles'])) : ?>
                                    <?php foreach($beers['bottles'] as $beer) : ?>
                                        <div class="container col-md-6">
                                            <img src="<?= $beer->icon ?>" alt="<?= $beer->name ?> logo" class="img img-responsive beer-logo" />
                                            <span class="beer-name"><?= $beer->name ?></span>
                                            <i class="beer-type"><?= $beer->type ?></i>
                                            <div class="beer-details">
                                                <?= $beer->location ?>
                                                &bull;
                                                <?= $beer->abv ?>%
                                                &bull;
                                                <?= $beer->brewery ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <?php include 'errors.php' ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div> <!-- /End bottles panel -->

            </div> <!-- /End modal body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div> <!-- /End modal content -->
    </div>
</div> <!-- /End beer list modal -->

<?php include_once 'footer.php' ?>
