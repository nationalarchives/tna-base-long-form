<?php
/*
Template Name: Long form template
*/
get_header(); ?>
<main role="main">
    <?php global $post ?>
    <section>
        <!--Navigation-->
        <div id="cd-vertical-nav">
           <ul>
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
                    <a href="#<?php echo sanitize_title_with_dashes(get_the_title()); ?>" data-title="<?php echo sanitize_title_with_dashes(get_the_title()); ?>" class="hover">
                        <span class="cd-dot active-dot"></span>
                        <span class="cd-label arrow_box active"><?php the_title(); ?></span>
                    </a>
                </li>
            <?php endwhile; endif; wp_reset_postdata(); ?>
           </ul>
        </div>
    </section>
    <!--End Navigation-->

    <!--Get page content-->
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <section class="scrollable-section active-section" data-section-title="<?php echo $post->post_name; ?>" id="<?php echo $post->post_name; ?>">
    <?php if (has_post_thumbnail( $post->ID ) ):  ?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
        <aside class="lf-image-bg-fixed-height" style="background-image: url('<?php echo make_path_relative($image[0]); ?>')">
            <div class="container-fluid">
                <div class="intro-text">
                    <h1 class="intro-heading"><?php the_title(); ?></h1>
                    <h2><a href="#" class="sr-only sr-only-focusable"><?php the_title(); ?></a></h2>
                    <h3 class="sub-heading">In association with<br> BT Archives</h3>
                </div>
            </div>
        </aside>
        <?php
        $get_description = get_post(get_post_thumbnail_id())->post_excerpt;
        if(!empty($get_description)){
            echo '<figcaption class="wp-caption-text">Caption: ' . $get_description . '</figcaption>';
        }
        ?>
        <?php endif; ?>
        <div class="container-lf">
            <div class="row">
                 <?php echo make_path_relative(get_the_content()); ?>
            </div>
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
            <section class="scrollable-section active-section" data-section-title="What is this">
                <?php if (has_post_thumbnail( $post->ID ) ):  ?>
                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                    <aside class="image-bg-fixed-height-2" style="background-image: url('<?php echo make_path_relative($image[0]); ?>')">
                    </aside>
                <?php
                    $get_description = get_post(get_post_thumbnail_id())->post_excerpt;
                    if(!empty($get_description)){
                        echo '<figcaption class="wp-caption-text">Caption: ' . $get_description . '</figcaption>';
                    }
                ?>
                <?php endif; ?>
                <div class="container-lf">
                    <div class="row">
                        <h2><a href="#" class="sr-only sr-only-focusable"><?php the_title(); ?></a></h2>
                        <?php echo make_path_relative(get_the_content()); ?>
                    </div>
                </div>
            </section>

        <?php endwhile; endif; wp_reset_postdata(); ?>
    <!--End Loop through posts-->
</main>

<?php get_footer(); ?>