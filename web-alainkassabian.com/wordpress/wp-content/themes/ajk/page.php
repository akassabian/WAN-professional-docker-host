<?php get_header(); ?>

    <div id="container content-main">

            <div class="section-1-parent">
                            <div class="section-1-child">
                    <div class="row-alain-contact-content">
                        <div class="col-12-alain-contact" align="center">
                            <?php if (have_posts()) : ?>
                            <?php while (have_posts()) :
                                the_post(); ?>
                            <h1 class="text-center"><?php the_title(); ?></h1>
                            <?php the_content(); ?>
                            <?php endwhile; ?>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>


    <?php get_footer();