<?php while(have_posts()) : the_post(); ?>

    <?php if(has_post_thumbnail()) :
        the_post_thumbnail('blog', array('class' => 'imagen-destacada'));
    endif;
    ?>

<?php the_content(); ?>

<?php endwhile; ?>