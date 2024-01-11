<?php

if (!function_exists('custom_project_slider')) {

    /**
     * Display project slider.
     *
     * @return string The HTML content of the post slider.
     */
    function custom_project_slider(): string
    {
        // prepare query
        $args = array(
            'post_type'      => 'project',
            'publish_status' => 'published',
            'orderby'        => 'date',
            'order'          => 'ASC',

        );

        $query = new WP_Query($args);

        ob_start();

        if ($query->have_posts()) : ?>
            <div class='slider container'>
                <div class='our-latest-projects'>
                    <?php
                    $count = 1; // Initialize a counter for project numbering
                    while ($query->have_posts()) : $query->the_post();

                        $post_id = get_the_ID();

                        //$image_src = wp_get_attachment_thumb_url($post_id,'full');

                        $image_url = get_the_post_thumbnail_url($post_id, 'full') ?? wp_get_attachment_url(1414, 'full');

                        // Get the category for the current post
                        $categories = get_the_terms($post_id, 'project-category');
                        $selected_category = !empty($categories) ? $categories[0]->name : 'Uncategorized';

                        // Get the tags for the current post
                        $tags = get_the_terms($post_id, 'project-tag');
                    ?>

                        <a href="javascript:void(0)" class='our-projects'>
                            <div class='latest-projects'>
                                <div class='project-img'>
                                    <img src='<?php echo $image_url; ?>'>
                                </div>
                                <div class='project-detail'>
                                    <div class='project-col'>
                                        <div class='project-txts'>
                                            <h6 class='project-no'>Project <?php echo sprintf('%02d', $count); ?>/<?php echo sprintf('%02d', $query->post_count); ?></h6>
                                            <div class="project-label">
                                                <?php
                                                if (!empty($tags)) {
                                                    foreach ($tags as $tag) { ?>
                                                        <span><?php echo $tag->name; ?></span>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                            <div class="project-desc">
                                                <h3 class='project-title'><?php the_title(); ?></h3>
                                                <p class='project-p'><?php echo get_the_excerpt(); ?></p>
                                            </div>
                                            <div class='project-btn'>
                                                <p><?php echo $selected_category; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                    <?php
                        $count++; // Increment the counter for the next project
                    endwhile; ?>
                </div>
            </div>

        <?php else : ?>
            <p>No Projects found</p>

<?php endif;
        // wp_reset_query();
        wp_reset_postdata();
        return ob_get_clean();
    }
}
add_shortcode('project_slider', 'custom_project_slider');
