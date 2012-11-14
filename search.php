<?php
/**
 * @package WordPress
 * @subpackage oo-bento_Theme
 */
?>

<?php get_header(); ?>

<div id="content" class="container_16 ui-oo-content-wrapper">
    <div class="box box-shadow grid_12 alpha main">

<?php if (have_posts()) : ?>


  <div id="search-header">

  <h2 class="pagetitle text-shadow">Search Results</h2>

    <form action="<?php echo get_bloginfo('url'); ?>" id="searchform" method="get" role="search">
      <p>
        <label for="s" class="screen-reader-text">Search for:</label>
        <input type="text" id="s2" name="s" value="">
        <input type="submit" value="Search" id="searchsubmit">
      </p>
    </form> 
  </div>


  <div class="navigation">
    <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
    <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
  </div>


  <?php while (have_posts()) : the_post(); ?>

    <div <?php post_class() ?>>
      <h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
      <small><?php the_time('l, F jS, Y') ?></small>

      <p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
    </div>

  <?php endwhile; ?>

  <div class="navigation">
    <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
    <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
  </div>

<?php else : ?>

  <h2 class="center">No posts found. Try a different search?</h2>
  <?php get_search_form(); ?>

<?php endif; ?>

</div>

  <?php get_sidebar(); ?>

</div>
<!-- End: Main Content Area -->

<?php get_footer(); ?>