<?php
/*
Template Name: archive-project
*/
    get_header();
?>

<div id="primary" class="site-content1">
<div id="content" role="main">

  <div id="container">
    <div id="content" class="pageContent">
<?php
    $loop = new WP_Query( array( 'post_type' => 'project', 'paged' => $paged ) );
       if ( $loop->have_posts() ) :
           while ( $loop->have_posts() ) : $loop->the_post(); ?>
               <div class="project img-container">

                   <?php if ( has_post_thumbnail() ) { ?>
                       <div class="projectimage">
                           <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('grid_thumbnail'); ?></a>
                       </div>
                   <?php } ?>
                   <span class="img-content-hover">
                     <h2 class="title1"><?php the_title(); ?></h2>
                     <?php echo get_the_term_list( $post->ID, 'project_type', '<h3 class="category">', ', ', '</h3>' ) ?>
                   </span>

               </div>
           <?php endwhile;
           if (  $loop->max_num_pages > 1 ) : ?>
               <div id="nav-below" class="navigation">
                   <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Previous', 'domain' ) ); ?></div>
                   <div class="nav-next"><?php previous_posts_link( __( 'Next <span class="meta-nav">&rarr;</span>', 'domain' ) ); ?></div>
               </div>
           <?php endif;
       endif;
       wp_reset_postdata();
?>
</div>
</div>

</div>
</div>

<?php
    get_footer();
?>
