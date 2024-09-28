
<?php 
/*
Template Name: Single Recipe Post
Template Post Type: post
*/
 get_header(); ?>

<!-- Bootstrap Container -->
<div class="container mt-5">
    <!-- Recipe Title -->
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="recipe-title"><?php the_title(); ?></h1>
        </div>
    </div>

    <!-- Recipe Featured Image -->
    <div class="row my-4">
        <div class="col-12 text-center">
            <?php if (has_post_thumbnail()) : ?>
                <img src="<?php the_post_thumbnail_url('large'); ?>" class="img-fluid" alt="<?php the_title(); ?>">
            <?php endif; ?>
        </div>
    </div>

    <!-- Recipe Ingredients and Preparation Steps -->
    <div class="row">
        <!-- Ingredients -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4>Ingredients</h4>
                </div>
                <div class="card-body">
                    <?php
                    // Get the ingredients meta data
                    $ingredients = get_post_meta(get_the_ID(), 'ingredients', true);
                    if (!empty($ingredients)) :
                        echo wpautop($ingredients); // Output the ingredients
                    else :
                        echo '<p>No ingredients found.</p>';
                    endif;
                    ?>
                </div>
            </div>
        </div>

        <!-- Preparation Steps -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <h4>Preparation Steps</h4>
                </div>
                <div class="card-body">
                    <?php
                    // Get the preparation steps meta data
                    $preparation_steps = get_post_meta(get_the_ID(), 'preparation_steps', true);
                    if (!empty($preparation_steps)) :
                        echo wpautop($preparation_steps); // Output the steps
                    else :
                        echo '<p>No preparation steps found.</p>';
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
