<?php
/*
Template Name: Long form template
*/
get_header();
?>
    <main>
        <?php global $post; ?>

        <!--Navigation-->
        <div id="cd-vertical-nav" role="navigation" class="hidden-xs">
            <ul id="top-menu">
                <li>
                    <a href="#<?php echo sanitize_title_with_dashes(get_the_title()); ?>" class="sub-menu">
                        <span class="cd-dot"></span>
                        <span class="cd-label arrow_box">Introduction</span>
                    </a>
                </li>
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => -1,
                    'orderby' => 'menu_order'
                );
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()):
                    while ($the_query->have_posts()):
                        $the_query->the_post();
                        ?>
                        <li>
                            <a href="#<?php echo sanitize_title_with_dashes(get_the_title()); ?>" class="sub-menu">
                                <span class="cd-dot"></span>
                                <span class="cd-label arrow_box"><?php the_title(); ?></span>
                            </a>
                        </li>
                        <?php
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </ul>
        </div>
        <!--End Navigation-->

        <!--Get page content-->
        <?php
        if (have_posts()):
            while (have_posts()):
                the_post();
                ?>
                <section class="cd-section" data-section-title="<?php echo sanitize_title_with_dashes(get_the_title()); ?>" id="<?php echo sanitize_title_with_dashes(get_the_title()); ?>">
                    <?php
                    if (has_post_thumbnail($post->ID)): ?>
                    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');  ?>
                    <figure>
                        <div class="lf-image-bg-fixed-height" style="background-image: url('<?php echo make_path_relative($image[0]); ?>')">
                            <?php get_template_part('breadcrumb'); ?>
                            <div class="container-lf">
                                <div class="intro-text">
                                    <h1 class="intro-heading"><?php the_title();  ?></h1>
                                    <h2><a href="#" class="sr-only sr-only-focusable"><?php the_title(); ?></a></h2>
                                </div>
                            </div>
                        </div>
                        <?php
                        $get_description = get_post(get_post_thumbnail_id())->post_excerpt;
                        if (!empty($get_description))
                        {
                            echo '<figcaption class="wp-caption-text">' . $get_description . '</figcaption>';
                        }
                        ?>
                        <?php
                        endif;
                        ?>
                    </figure>
                    <div class="full-div">
                        <div class="container-lf">
                            <?php
                            $the_content = make_path_relative(apply_filters('the_content', get_the_content()));
                            echo $the_content;
                            ?>
                        </div>
                    </div>
                </section>
                <?php
            endwhile;
        else:
            ?>
            <p>Sorry, this page does not exist</p>
            <?php
        endif;
        ?>
        <!--End page content-->

        <!--Loop through posts-->
        <?php
        $args      = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'orderby' => 'menu_order'
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()):
            while ($the_query->have_posts()):
                $the_query->the_post();
                ?>
                <section id="<?php echo sanitize_title_with_dashes(get_the_title()); ?>" class="cd-section" data-section-title="<?php echo sanitize_title_with_dashes(get_the_title()); ?>">
                    <?php
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                    if (has_post_thumbnail($post->ID)):
                    ?>
                    <figure class="full-width">
                        <div class="image-bg-fixed-height-2" style="background-image: url(<?php echo make_path_relative($image[0]); ?>);')">
                        </div>
                        <?php endif; ?>
                        <?php
                        $get_description = get_post(get_post_thumbnail_id())->post_excerpt;
                        if (!empty($get_description))
                        {
                            echo '<figcaption class="wp-caption-text">' . $get_description . '</figcaption>';
                        }
                        ?>
                        <?php if (has_post_thumbnail($post->ID)): ?>
                    </figure>
                <?php endif; ?>
                    <div class="full-div">
                        <div class="container-lf">
                            <h2><a href="#" class="sr-only sr-only-focusable"><?php the_title(); ?></a></h2>
                            <?php
                            $the_content = make_path_relative(apply_filters('the_content', get_the_content()));
                            echo $the_content;
                            ?>
                        </div>
                    </div>
                </section>
                <?php
            endwhile;
        endif;
        wp_reset_postdata();
        ?>
        <!--End Loop through posts-->
        <div class="container-lf">
            <div class="center">
                <?php
                    $sub_heading = get_post_meta($post->ID, 'sub_heading_sub_heading', true);
                    if ($sub_heading) {
                        echo '<span class="sub-heading">'.$sub_heading.'</span>';
                    }
                ?>
                <img src="<?php echo make_path_relative(get_stylesheet_directory_uri()); ?>/images/bt_logo.png" alt="bt_logo" class="img-responsive logo" title="BT Archives">
            </div>
        </div>
    </main>

<?php get_footer(); ?>
