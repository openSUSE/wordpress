<?php
/**
 * @package WordPress
 * @subpackage oo-bento_Theme
 */
?>

<?php get_header(); ?>

<!-- Start: Main Content Area -->
<div id="content" class="container_16 ui-oo-content-wrapper">
  <div class="box box-shadow grid_12 alpha main">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
      <h2><?php the_title(); ?></h2>
      <small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?> </small>

      <div class="share-links">
	<div class="share-link">
              <a href="http://twitter.com/share" class="twitter-share-button"
                data-url="<?php echo get_permalink(); ?>"
                data-text="openSUSE News: <?php the_title() ?>"
                data-count="horizontal"
                data-hashtags="openSUSE"
                data-via="openSUSE">Tweet</a>
        </div>
        <div class="share-link">
          <iframe src="https://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink()); ?>&amp;layout=button_count&amp;show_faces=true&amp;width=100&amp;action=like&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe>
        </div>
	<div class="share-link">
	  <g:plusone size="medium"></g:plusone>
	</div>
        <div class="clear"></div>
      </div>
      
      
      <div class="entry">
        <?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>

        <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

        <p class="trackback-note">
        <?php /* == Trackback / Feedback stuff == */ ?>
        <?php if ( comments_open() && pings_open() ) {
          // Both Comments and Pings are open ?>
        <a href="#respond">Response</a> or <a href="<?php trackback_url(); ?>" rel="trackback">Trackback</a>.

        <?php } elseif ( !comments_open() && pings_open() ) {
            // Only Pings are Open ?>
          Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

        <?php } elseif ( comments_open() && !pings_open() ) {
              // Comments are open, Pings are not ?>
          You can skip to the end and leave a response. Pinging is currently not allowed.

        <?php } elseif ( !comments_open() && !pings_open() ) {
          // Neither Comments, nor Pings are open ?>
          Both comments and pings are currently closed.

        <?php } ?>
        </p>
        
        <ul class="postmetadata sorting">
          <li><strong>Tags:</strong><?php
	  $tags = get_the_tags();
	  if ( empty( $tags ) ) {
	      echo "No tags available";
	  } else {
	      the_tags( '', ' &middot; ', '');
	  }?>
	  </li>
          <li><strong>Category:</strong> <?php the_category(' &middot; '); ?></li>
        </ul>

        <div class="postmetadata alt">
          
          <ul>
            <li><strong>Posted:</strong> <?php the_time('Y-m-d'); ?> - <?php the_time(); ?></li>
            <li><strong>Author:</strong> <?php the_author_link(); ?></li>
            <li><strong>Feed:</strong> <?php post_comments_feed_link('RSS 2.0'); ?></li>
          </ul>

        </div>
        <p class="trackback-note">
          <?php edit_post_link('Edit this entry','',''); ?>
        </p>

      </div>
    </div>

    <div class="navigation post-navigation">
      <div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
      <div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
    </div>
  <a id="respond" name="respond"> </a>
  <?php comments_template(); ?>

  <?php endwhile; else: ?>

    <p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

  </div>

  <?php get_sidebar(); ?>

</div>
<!-- End: Main Content Area -->

<?php get_footer(); ?>
