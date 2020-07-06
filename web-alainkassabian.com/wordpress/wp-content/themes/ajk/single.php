<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage ajk
 * @since 2017 4Q
 */
 
?>
 

 
<?php get_header(); ?>
    <!-- Slider Wrapper -->
    <div id="slider-wrapper">
        <div id="slider-1" class="rev_slider" data-version="5.0">
            <ul>
                <li data-transition="fade">
                    <!-- MAIN IMAGE -->
                    <img src="http://alainkassabian.com/wp-content/uploads/2017/03/01.jpg" alt="" width="100%" height="100%">
                </li>
                <li data-transition="fade">
                    <!-- MAIN IMAGE -->
                    <img src="http://alainkassabian.com/wp-content/uploads/2016/01/background.jpg" alt="" width="100%" height="100%">
                </li>
            </ul>
        </div>
    </div>
    <!-- / Slider Wrapper -->
    <div id="container content-main">

            <div class="section-1-parent">
                <div class="section-1-child">
                    <div class="row-alain-content">                     
                        <div class="col-12 col-md-10">
                            <?php while ( have_posts() ) : the_post(); ?>
                                <h3 class="post-title"><?php echo "&nbsp;&rsaquo;&nbsp;"; the_title(); ?></h3>
                                <?php the_content(); ?>
                            <?php endwhile; // end of the loop. ?>                                
                        </div>  
                        <div class="col-12 col-md-2">
                            


                            <?php     
                            
                            $categories =  get_categories();  
                            foreach  ($categories as $category) if ($tmp++ < 3) {
                                //Display the sub category information using $category values like $category->cat_name
                                echo '<h2 class="toc-headers">'.$category->name.'</h2>';
                                echo '<ul id="toc-items">';

                                $args = array( 'category' => $category->term_id, 'post_type' =>  'post', 'posts_per_page' => -1, 'post_status' => 'publish');
                                foreach (get_posts($args) as $post) {
                                    setup_postdata( $post );
                                    echo '<li><a href="'.get_permalink($post->ID).'">'.get_the_title().'</a></li>';   
                                }  
                                echo '</ul>';
                            }
                            
                            ?>

                        </div>                      
                    </div>
                </div>
            </div>
            
    <script>
    jQuery(document).ready(function() {
        revapi = jQuery("#slider-1").revolution({
            sliderLayout: "fullscreen",
            gridwidth: 1230,
            gridheight: 720
        });
    });
    </script>

    <?php get_footer();