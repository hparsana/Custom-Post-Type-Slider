<?php

if (!function_exists('testimonial_silder_shortcode')) {
    /**
     * Display testimonial slider.
     *
     * @return string The HTML content of the testimonial slider.
     */
    function testimonial_silder_shortcode()
    {
        // prepare query
        $testimonial_args = array(
            'post_type'      => 'testimonial',
            'publish_status' => 'published',
            'orderby'        => 'date',
            'order'          => 'ASC'

        );

        $testimonial_query = new WP_Query($testimonial_args);

        ob_start();

        if ($testimonial_query->have_posts()) :
?>
            <div class="our-clients-sec slider-testimonial">

                <?php while ($testimonial_query->have_posts()) :
                    $testimonial_query->the_post();
                ?>
                    <div class="client-white-box">
                        <div class="client-box">
                            <h6 class="client-name"><?php the_title(); ?></h6>
                            <div class="client-detail">
                                <img src="<?php echo site_url(); ?>/wp-content/uploads/2024/01/rating.png">
                                <p><?php echo wp_trim_words(get_the_content(), 15, '...'); ?></p>
                                <a href="javascript:void(0)" class="read-btn">Read More <img src="<?php echo site_url(); ?>/wp-content/uploads/2024/01/btn-arrow.png"></a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

        <?php else : ?>
            <p>No Testimonial found</p>

<?php endif;
        // wp_reset_query();
        wp_reset_postdata();

        $testimonial =  ob_get_clean();
        return $testimonial;
    }

    add_shortcode('testimonial_slider', 'testimonial_silder_shortcode');
}
