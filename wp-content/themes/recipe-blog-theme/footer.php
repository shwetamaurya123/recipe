<footer class="bg-dark text-white py-3">
    <div class="container text-center">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'menu-2',
            'menu_class'     => 'navbar-nav ml-auto', // Align nav items to the right
            'container'      => false,
        ));
        ?>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
