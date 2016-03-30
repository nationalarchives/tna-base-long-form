<?php
/*
Template Name: Long form template
*/
get_header(); ?>
<main role="main">
    <?php global $post ?>
    <section>
        <!--This will be the navigation section-->
        <!--<div id="cd-vertical-nav">
            <ul>
                <li>
                    <a href="#section1" data-title="Technology and the First World War" class="hover">
                        <span class="cd-dot active-dot"></span>
                        <span class="cd-label arrow_box active">Technology and the First World War</span>
                    </a>
                </li>
                <li>
                    <a href="#section2" data-title="Air warfare" class="hover">
                        <span class="cd-dot active-dot"></span>
                        <span class="cd-label arrow_box active">Air warfare</span>
                    </a>
                </li>
                <li>
                    <a href="#section3" data-title="Ships" class="hover">
                        <span class="cd-dot active-dot"></span>
                        <span class="cd-label arrow_box active">Ships</span>
                    </a>
                </li>
                <li>
                    <a href="#section4" data-title="Home front protection" class="hover">
                        <span class="cd-dot active-dot"></span>
                        <span class="cd-label arrow_box active">Home front protection</span>
                    </a>
                </li>
                <li>
                    <a href="#section5" data-title="Broadly - trenches" class="hover">
                        <span class="cd-dot active-dot"></span>
                        <span class="cd-label arrow_box active">Broadly - trenches</span>
                    </a>
                </li>
                <li>
                    <a href="#section6" data-title="Section 6" class="hover">
                        <span class="cd-dot active-dot"></span>
                        <span class="cd-label arrow_box active">Section 6</span>
                    </a>
                </li>
            </ul>
        </div>-->
    </section>
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

    <!--<section class="scrollable-section active-section" data-section-title="HTML">
        <h2><a href="#" class="sr-only sr-only-focusable">Some title</a></h2>
        <aside class="image-bg-fixed-height-2"></aside>
        <figure>
            <figcaption class="wp-caption-text">Caption: IMAGE%203</figcaption>
        </figure>
    </section>-->

    <!--<section>
        <div class="container-lf">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2><a href="#" class="sr-only sr-only-focusable">Some title</a></h2>
                        <p>comes from an Admiralty file containing intelligence photographs of Zeppelins and German Air Bases from 1918-1919.
                        </p>
                        <p>
                            The Engineering Department of the Post Office was tasked by the War Office to work on intercepting the wireless signals that were often used to navigate enemy aircraft, including the infamous ‘Zeppelins’ that killed over 500 people in Britain during the First World War. This fantastic map
                        </p>
                        <figure>
                            <img class="full-width" src="/wp-content/themes/tna-base-long-form/images/demo/Image%2012.jpg" alt="">
                            <figcaption class="wp-caption-text">Caption: IMAGE%203</figcaption>
                        </figure>
                        <p>
                            included in Sir William Slingo’s report on the Engineering Department’s work during the First World War indicates the routes of Zeppelins that took  part in the raid of 2nd and 3rd of May 1917. Upon the Engineering Department identifying the locaption of Enemy Aircraft this information would be wired to the Intelligence Department of the War Office immediately.  The signals were intercepted by the Engineering Department’s ‘Direction Finding Stations’ set up at Peterborough, Seaham Harbour, Westgate and, latterly, Falkirk in Scotland.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>-->

    <!--<section>
        <div class="container-lf">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2><a href="#" class="sr-only sr-only-focusable">Some title</a></h2>
                        <figure>
                            <img class="full-width img-responsive" src="/wp-content/themes/tna-base-long-form/images/demo/Image%2013.2.jpg" alt="#">
                            <figcaption class="wp-caption-text">Caption: IMAGE%203</figcaption>
                        </figure>
                        <figure>
                            <img class="full-width img-responsive" src="/wp-content/themes/tna-base-long-form/images/demo/Image%2013.1.jpg" alt="#">
                            <figcaption class="wp-caption-text">Caption: IMAGE%203</figcaption>
                        </figure>
                        <p>
                            The role of the Engineering Department of the Post Office in keeping Britain as safe as possible during a time of national crisis cannot be overstated. This wonderful map from a Ministry of Munitions file indicates, in red, the areas of the country where communicaptions would be suspended in times of an emergency, i.e. in the event the German army successfully landed in Great Britain. The wider document, which the map belongs to, states that in the event of invasion responsibility for communicaptions in the country would be ceded from the Engineering Department to the Army Signal Service. Interestingly, under emergency protocols all communicaptions would be suspended in Ireland if Britain was successfully invaded. In Great Britain itself, the map indicates that the East Coast of the country, from Dundee to the south coast would be without communicaptions, in an attempt to hinder the progress of any invading army.
                        </p>
                        <aside class="floated-quote">
                            <blockquote>
                                <p>
                                The role of the Engineering Department of the Post Office in keeping Britain as safe as possible during a time of national crisis cannot be overstated
                                </p>
                            </blockquote>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>-->

    <!--<section>
        <aside class="image-bg-fixed-height-3"></aside>
        <figure>
            <figcaption class="wp-caption-text">Caption: IMAGE%203</figcaption>
        </figure>
        <div class="container-lf">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2><a href="#" class="sr-only sr-only-focusable">Some title</a></h2>
                        <p>
                            Perhaps one of the more stirring and action-packed roles of the Engineering Department were the administration and staffing of Cable Ships throughout the First World War. These ships were responsible for laying the cables required for trans-channel telecommunicaptions to work. Such was the prominence of the cable ships of the Engineering Department, they even played a major part on the day war was declared. With war imminently due to be declared between the United Kingdom and Germany, according to Sir William Slingo’s report ‘the cables connecting England and Germany were disconnected on this side on the evening of the 4th and before War was declared, but on receipt of remonstrance from Germany, communicaption was temporarily restored’. The Engineering Department duly cut the cable again when war was announced officially just hours later.
                        </p>
                        <p>
                            The ship in this photograph is the ‘Monarch’ one of the Engineering Department’s cable ships from the First World War that was leased to the Grand Fleet of the Royal Navy and based at Scapa Flow. It struck a mine on 8th September 1915 whilst proceeding to repair the cable between Beachy Head and Havre sinking almost immediately and with the loss of three lives.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>-->

    <!--<section>
        <div class="container-lf">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2><a href="#" class="sr-only sr-only-focusable">Some title</a></h2>
                        <p>
                            Within The National Archives there are several references to the bravery and danger undertaken by the staff of the General Post Office’s Engineering Department who staffed these cable ships.
                        </p>
                        <div class="col-md-6">
                            <figure>
                                <img class="img-responsive full-width" src="/wp-content/themes/tna-base-long-form/images/demo/Image 15.1.jpg" />
                                <figcaption class="wp-caption-text">Caption: IMAGE%203</figcaption>
                            </figure>
                        </div>
                        <div class="col-md-6">
                            <figure>
                                <img src="/wp-content/themes/tna-base-long-form/images/demo/Image 15.2.jpg" class="img-responsive full-width"/>
                                <figcaption class="wp-caption-text">Caption: IMAGE%203</figcaption>
                            </figure>
                        </div>
                        <p>
                            These letters from the records of the Treasury highlight the responsibilities that were placed upon these men. In some cases, it became necessary for those of a relatively junior rank to essentially take on the role of ranks much higher than their own – e.g. Commander or Chief Officers for example. This was often undertaken for a reasonable period of time. Operations could be dangerous, with the risk of hostile action, meaning that these men had to be of a brave character. With such undertakings, it can be no surprise that it was deemed fair to provide these men with ‘substitution payments’ for their work.
                        </p>
                        <p>
                            With a great number of the Engineering Department’s workforce enlisting in the army, thousands of temporary workers were drafted in by the Post Office to replace them. Of great significance was the fact that many new recruits were female. Some employers refused to let married women work for them, so it tended to be single or widowed women who took up jobs outside of the home. However, within the Post Office, thousands of women, whether married or single, were employed. In such settings, these women were able to prove a variety of skills and aptitudes and the broad depth of capabilities. They now carried out a variety of tasks, including working a switchboard, instead of being confined to secretarial roles such as a typist.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>-->

    <!--<section>
        <h2><a href="#" class="sr-only sr-only-focusable">Some title</a></h2>
        <aside class="image-bg-fixed-height-4"></aside>
        <figure>
            <figcaption class="wp-caption-text">Caption: IMAGE%203</figcaption>
        </figure>
    </section>-->

    <!--<section>
        <div class="container-lf">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2><a href="#" class="sr-only sr-only-focusable">Some title</a></h2>
                        <p>
                            This document from BT Archives interestingly states that it was a well-regarded opinion that the female ‘night telephonist’ was more adept at the job than her male counterpart. Once males and females worked alongside one another, this comparison was much more easily identifiable. Such a description acts to quash ideas that women were not capable of undertaking the same duties as men, because of certain characteristics that they were perceived to possess. For example, women were deemed “too emotional” for certain tasks (including having the right to vote) yet it is this sex who is described, in this example, as responding more appropriately when under extreme pressure.
                        </p>
                        <figure>
                            <img class="full-width" src="/wp-content/themes/tna-base-long-form/images/demo/Image%2018.jpg" alt="">
                            <figcaption class="wp-caption-text">Caption: IMAGE%203</figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>-->

    <!--<section>
        <div class="container-lf">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2><a href="#" class="sr-only sr-only-focusable">Some title</a></h2>
                        <p>
                            Within Sir William Slingo’s report a fascinating and vivid graph exists appearing (at first glance)  to suggest that as the number of workmen in employment, below the rank of inspector, fell during the war, the number of female assistants rose above them. Looking closely at the graph axes indicates that this was not the case (male staff being measured in thousands and females in hundreds) but it interesting to note that the very existence of the graph implies that the female experience and contribution to work at the Engineering Department was worthy of note and comment at this time
                        </p>
                        <figure>
                            <img class="full-width" src="/wp-content/themes/tna-base-long-form/images/demo/Image%2019.jpg" alt="">
                            <figcaption class="wp-caption-text">Caption: IMAGE%203</figcaption>
                        </figure>
                        <p>
                            As the above information suggests, and the array of vivid and interesting documentation and images confirm, the Engineering Department of the General Post Office (the historical antecedent of British Telecom) played a major role during the First World War supplying the British military services and the civilian populace of Great Britain with the crucial means of communicaption, whilst playing a significant part in technological innovation. The legacy of this work lives on in the holdings and archival material relating to the Engineering Department of the General Post Office, held at BT Archives in High Holborn, and also throughout the vast array of First World War material held at The National Archives in Kew.
                        </p>
                        <aside class="floated-quote">
                            <blockquote>
                                <p>The legacy of this work lives on in the holdings and archival material relating to the Engineering Department of the General Post Office</p>
                            </blockquote>
                        </aside>
                        <figure>
                            <img class="full-width" src="/wp-content/themes/tna-base-long-form/images/demo/Image%2021.jpg" alt="">
                            <figcaption class="wp-caption-text">Caption: IMAGE%203</figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>-->

    <!--<section>
        <h2><a href="#" class="sr-only sr-only-focusable">Some title</a></h2>
        <aside class="image-bg-fixed-height-5"></aside>
        <figure>
            <figcaption class="wp-caption-text">Caption: IMAGE%2031234567</figcaption>
        </figure>
    </section>-->
</main>

<?php get_footer(); ?>