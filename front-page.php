<?php
/*
Template Name: front-page
*/
get_header();
?>

<div id="primary" class="site-content1">
<div id="content" role="main">

<div id="container">
<div id="content" class="pageContent">

  <h1 class="title"><?php the_title(); ?></h1> <!-- Page Title -->
  <?php
  // TO SHOW THE PAGE CONTENTS
  while ( have_posts() ) : the_post(); ?>
      <div class="content">
          <?php the_content(); ?> <!-- Page Content -->
      </div>

  <?php
  endwhile; //resetting the page loop
  wp_reset_query(); //resetting the page query
  ?>

<?php
$loop = new WP_Query( array( 'post_type' => 'project', 'paged' => $paged, 'posts_per_page' => 3, 'posts_status' => 'publish' ) );
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
