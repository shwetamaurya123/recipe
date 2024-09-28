<?php get_header(); ?>
<div class="container my-5">
    <div class="row">
        <!-- Sidebar: Recipe Categories -->
        <div class="col-md-3">
            <h4>Categories</h4>
            <ul class="list-group">
                <?php
                // Fetch terms from the 'recipe_category' custom taxonomy
                $terms = get_terms(array(
                    'taxonomy' => 'recipe_category', 
                    'hide_empty' => true
                ));
                
                // Loop through each term (category) and display as a list
                foreach ($terms as $term) {
                    echo '<li class="list-group-item">
                            <a href="' . get_term_link($term) . '">' . $term->name . '</a>
                        </li>';
                }
                ?>
            </ul>
        </div>

        <!-- Recipe Grid -->
        <div class="col-md-9">
            <div class="row">
                <?php
                $args = array('post_type' => 'recipe', 'posts_per_page' => 10);
                $loop = new WP_Query($args);
                while ($loop->have_posts()) : $loop->the_post(); ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium', ['class' => 'card-img-top']);
                                } ?>
                            <div class="card-body">
                                <h5 class="card-title"><?php the_title(); ?></h5>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>