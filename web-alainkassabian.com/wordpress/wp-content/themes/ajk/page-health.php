<?php /* Template Name: Health */ ?>
<?php get_header(); ?>
    <div id="container content-main">

            <div class="section-1-parent">
                            <div class="section-1-child">
                    <div class="row-alain-content">
                        <div class="col-12 col-md-10">

                                <?php
                                $args = array( 'category' => 2, 'post_type' =>  'post', 'posts_per_page' => -1, 'post_status' => 'publish' );
                                $postslist = get_posts($args);
                                foreach ($postslist as $post) :
                                    setup_postdata($post);
                            ?>
                                        <h2><a class="post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        <a class="sign-up" href="http://alainkassabian.com/?page_id=117">Click Here to Subscribe!</a>
                                        <?php the_excerpt(); ?>
                                        <?php endforeach; ?>
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

    <?php get_footer();