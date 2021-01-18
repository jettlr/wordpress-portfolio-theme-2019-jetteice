<?php
/*
Template Name: single-project
Template Post Type: project
*/
get_header();
?>
<div id="primary" class="site-content1">
<div id="content" role="main">

<div id="container">
<div id="content" class="pageContent">


  <?php  while ( have_posts() ) : the_post(); ?>
    <h1 class="title"><?php the_title(); ?></h1> <!-- Page Title -->
    <?php the_post_thumbnail('single_large'); ?>
        <div class="content1">
            <?php the_content(); ?> <!-- Page Content -->
        </div>
        <div class="taxonomies">
        <p>Project type:</p>
        <?php echo get_the_term_list( $post->ID, 'project_type', '<div class="ttype">', ', ', '</div>' ) ?>
        <p>Project skill:</p>
        <?php echo get_the_term_list( $post->ID, 'project_skill', '<div class="tskill">', ', ', '</div>' ) ?>
        </div>

    <?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
    ?>




</div>
</div>

</div>
</div>

<?php
get_footer();
?>
