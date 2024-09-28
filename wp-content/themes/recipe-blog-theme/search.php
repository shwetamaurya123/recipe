<?php get_header(); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4">Search Results for: "<?php echo get_search_query(); ?>"</h1>

            <div class="row">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php the_post_thumbnail_url('medium'); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                            
                            <div class="card-body">
                                <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <p class="card-text"><?php the_excerpt(); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; else : ?>
                    <div class="col-md-12">
                        <div class="alert alert-warning" role="alert">
                            <?php _e('No recipes found matching your search.'); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
