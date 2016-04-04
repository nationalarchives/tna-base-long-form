<?php
/*
Template Name: Long form template
*/
get_header(); ?>
<main role="main">
    <?php global $post ?>

    <!--Navigation-->
    <div id="cd-vertical-nav" role="navigation" class="hidden-xs">
        <ul id="top-menu">
             <li>
                 <a href="#<?php echo sanitize_title_with_dashes(get_the_title()); ?>" class="sub-menu">
                     <span class="cd-dot"></span>
                     <span class="cd-label arrow_box">Back to top</span>
                 </a>
             </li>
                <?php
                    $args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => - 1,
                        'orderby'        => 'menu_order'
                    );
                    $the_query = new WP_Query ( $args );

                    if ( $the_query->have_posts() ) :
                        while ( $the_query->have_posts() ) : $the_query->the_post();
                ?>
                            <li>
                                <a href="#<?php echo sanitize_title_with_dashes(get_the_title()); ?>" class="sub-menu">
                                    <span class="cd-dot"></span>
                                    <span class="cd-label arrow_box"><?php the_title(); ?></span>
                                </a>
                            </li>
                <?php endwhile; endif; wp_reset_postdata(); ?>
        </ul>
    </div>
        <!--End Navigation-->

    <!--Get page content-->
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <section class="cd-section" data-section-title="<?php echo sanitize_title_with_dashes(get_the_title()); ?>" id="<?php echo sanitize_title_with_dashes(get_the_title()); ?>">
    <?php if (has_post_thumbnail( $post->ID ) ):  ?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
        <aside class="lf-image-bg-fixed-height" style="background-image: url('<?php echo make_path_relative($image[0]); ?>')">
            <?php get_template_part('breadcrumb'); ?>
            <div class="container-lf">
                <div class="intro-text">
                    <h1 class="intro-heading"><?php the_title(); ?></h1>
                    <h2><a href="#" class="sr-only sr-only-focusable"><?php the_title(); ?></a></h2>
                    <p>In association with BT Archives</p>
                </div>
            </div>
        </aside>
        <?php
        $get_description = get_post(get_post_thumbnail_id())->post_excerpt;
        if(!empty($get_description)){
            echo '<figure><figcaption class="wp-caption-text">' . $get_description . '</figcaption></figure>';
        }
        ?>
        <?php endif; ?>
        <div class="container-lf">
            <?php $the_content = make_path_relative(apply_filters( 'the_content', get_the_content()));
                echo $the_content;
            ?>
        </div>
    </section>
    <?php endwhile; else: ?>
    <p>Sorry, this page does not exist</p>
    <?php endif; ?>
    <!--End page content-->

    <!--Loop through posts-->
        <?php $args = array(
                'post_type'      => 'post',
                'posts_per_page' => - 1,
                'orderby'        => 'menu_order'
                );
            $the_query = new WP_Query ( $args );

            if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();
        ?>
                <section id="<?php echo sanitize_title_with_dashes(get_the_title()); ?>" class="cd-section" data-section-title="<?php echo sanitize_title_with_dashes(get_the_title()); ?>">
                <?php if (has_post_thumbnail( $post->ID ) ):  ?>
                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                    <aside class="lazy image-bg-fixed-height-2" data-original="<?php echo make_path_relative($image[0]); ?>" style="background-image: url('wp-content/themes/tna-base-long-form/images/grey.gif'); ?>')">
                    </aside>
                <?php
                    $get_description = get_post(get_post_thumbnail_id())->post_excerpt;
                    if(!empty($get_description)){
                        echo '<figcaption class="wp-caption-text">'.$get_description.'</figcaption>';
                    }
                ?>
                <?php endif; ?>
                <div class="container-lf">
                    <h2><a href="#" class="sr-only sr-only-focusable"><?php the_title(); ?></a></h2>
                    <?php $the_content = make_path_relative(apply_filters( 'the_content', get_the_content()));
                       echo $the_content;
                    ?>
                </div>
            </section>
        <?php endwhile; endif; wp_reset_postdata(); ?>
    <!--End Loop through posts-->

</main>

<?php get_footer(); ?>