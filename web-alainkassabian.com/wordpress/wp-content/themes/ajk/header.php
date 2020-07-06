<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php bloginfo(); ?> | <?php if (is_front_page()) {
            print("Digital Media");
} else {
    the_title();
} ?></title>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
<script>

   </script>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo home_url(); ?>">
                      <?php bloginfo('name'); ?>
                   </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <!-- Bootstrap Example Links -->
                        <!--
                        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Link</a></li>
                        -->
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                                            <?php wp_nav_menu(array(
                                            'menu'              => 'header-menu',
                                            'theme_location'    => 'Header',
                                            'depth'             => 2,
                                            'container'         => 'div',
                                            'container_class'   => 'navbar-collapse',
                                            'menu_class'        => 'nav navbar-nav navbar-right',
                                            'walker'            => new wp_bootstrap_navwalker(),
                                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback'));?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <!-- Slider Wrapper -->
        <div id="slider-wrapper">
            <div id="slider-1" class="rev_slider" data-version="5.0">
                <ul>
                    <li data-transition="fade">
                        <!-- MAIN IMAGE -->
                        <img src="<?php echo get_template_directory_uri(); ?>/images/01.jpg" width="100%" height="100%">
                    </li>
                </ul>
            </div>
        </div>
        <!-- / Slider Wrapper -->
