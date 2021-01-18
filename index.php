<?php
    get_header();
?>
    <div id="primary" class="site-content">
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

        </div>
      </div>

    </div><!-- #content -->
  </div><!-- #primary -->

<?php
    get_footer();
?>
