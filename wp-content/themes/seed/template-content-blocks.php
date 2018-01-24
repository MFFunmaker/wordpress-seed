<?php
/**
 * Template Name: Content Blocks
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'block'); ?>
<?php endwhile; ?>
