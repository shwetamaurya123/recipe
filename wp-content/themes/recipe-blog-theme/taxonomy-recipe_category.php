<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- Display the category name -->
            <h1 class="display-4"><?php single_term_title(); ?></h1>

            <!-- Row for the grid -->
            <div class="row">
                <!-- Start the WordPress loop to display posts -->
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <!-- Adjust the columns for responsiveness (3 columns on large screens, 2 on medium) -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <!-- Check if the post has a featured image and display it -->
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php the_post_thumbnail_url('medium'); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                            
                            <div class="card-body">
                                <!-- Post title as a link -->
                                <h5 class="card-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h5>
                                
                                <!-- Display post excerpt -->
                                <p class="card-text"><?php the_excerpt(); ?></p>
                                
                                <!-- Read More button linking to the full post -->
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; else : ?>
                    <!-- Message when no posts are found in the category -->
                    <p><?php _e('No recipes found for this category.'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
